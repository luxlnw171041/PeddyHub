<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\LineApiController;
use Intervention\Image\ImageManagerStatic as Image;
  
class LoginController extends Controller
{
  
    use AuthenticatesUsers;
    
    // protected $redirectTo = '/home';

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
  
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
        {
            // return redirect()->route('home');
            $backurl = $_SERVER['HTTP_REFERER'] ;

            $redirectTo = parse_url($backurl, PHP_URL_QUERY);

            if (!empty($redirectTo)) {
                $backurl_split = explode('redirectTo=', $redirectTo, 2);
                $back = $backurl_split[1];
                // return $back;
                return redirect($back);
            }else{
                // return $backurl;
                return redirect($backurl);
            }

        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
    

    // Google login
    public function redirectToGoogle(Request $request)
    {
        $request->session()->put('redirectTo', $request->get('redirectTo'));

        return Socialite::driver('google')->redirect();
    }

    // Google callback
    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user, "google",null);

        $value = $request->session()->get('redirectTo');
        $request->session()->forget('redirectTo');

        // Return home after login
        return redirect()->intended($value);
    }

    // Facebook login
    public function redirectToFacebook()
    {   
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
        // print_r($user);
        $this->_registerOrLoginUser($user,"facebook",null);

        // Return home after login
        return redirect()->intended();
    }

    // Line login
    public function redirectToLine(Request $request)
    {
        // echo $_SERVER['HTTP_REFERER'];
        // exit();
        $request->session()->put('redirectTo', $request->get('redirectTo'));
        $request->session()->put('from', $request->get('from'));

        return Socialite::driver('line')->redirect();
    }
    // Line callback
    public function handleLineCallback(Request $request)
    {

        // $user = Socialite::driver('line')->user();

        try {
            $user = Socialite::driver('line')->user();
        } catch (InvalidStateException $e) {
            $user = Socialite::driver('line')->stateless()->user();
        }
        
        $from = $request->session()->get('from');

        // print_r($user);
        $this->_registerOrLoginUser($user,"line",$from);
        // echo $_SERVER['HTTP_REFERER'];
        // exit();
        // Return home after login
        $value = $request->session()->get('redirectTo');
        $request->session()->forget('redirectTo');
        // echo $value;
        // exit();
        //return redirect($value);
        return redirect()->intended($value);

    }

    protected function _registerOrLoginUser($data, $type , $from)
    {
        //GET USER 
        $user = User::where('provider_id', '=', $data->id)->first();
        // echo "<pre>";
        // print_r($data) ;
        // echo "<pre>";
        // exit();

        if (!$user) {
            //CREATE NEW USER
            $user = new User();

            $user->provider_id = $data->id;
            $user->username = $data->name;
            // E-MAIL
            if (!empty($data->email)) {
                $user->email = $data->email;
            }
            else if (empty($data->email)) {
                $user->email = "กรุณาเพิ่มอีเมล";
            } 
            // AVATAR
            if (!empty($data->avatar)) {
                $user->avatar = $data->avatar;

                $url = $data->avatar;
                $img = storage_path("app/public")."/uploads". "/" . 'photo' . $data->id . '.png';
                // Save image
                file_put_contents($img, file_get_contents($url));
                $photo = "uploads". "/" . 'photo' . $data->id . '.png';
            }
            else if (empty($data->avatar)) {
                $user->avatar = "กรุณาเพิ่มรูปโปรไฟล์";
                $photo = null ;
            }
            $user->save();

            //CREATE NEW PROFILE
            $data_user = User::where('provider_id', '=', $data->id)->first();
            $profile = [
                "user_id" => $data_user->id,
                "name" => $data->name,
                "type" => $type,
                "photo" => $photo,
            ];
            Profile::create($profile);
        }else{
            // AVATAR
            if (!empty($data->avatar)) {
                $avatar = $data->avatar;

                $url = $data->avatar;
                $img = storage_path("app/public")."/uploads". "/" . 'photo' . $data->id . '.png';
                // Save image
                file_put_contents($img, file_get_contents($url));
                $photo = "uploads". "/" . 'photo' . $data->id . '.png';
            }
            else if (empty($data->avatar)) {
                $avatar = "กรุณาเพิ่มรูปโปรไฟล์";
                $photo = null ;
            }

            DB::table('profiles')
                ->where('user_id', $user->id)
                ->update([
                    'name' => $data->name,
                    'photo' => $photo,
                ]);

             DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'avatar' => $avatar,
                ]);
        }

        //LOGIN
        Auth::login($user);

        if ($type == "line") {

            $provider_id = $user->provider_id ;

            $data_users = User::where('provider_id', $provider_id)->get();

            $lineAPI = new LineApiController();
            $lineAPI->check_language_user($data_users);

        }

        if (!empty($from)) {

            if ($from == "line_oa") {

                DB::table('users')
                    ->where([ 
                            ['provider_id', $user->provider_id],
                        ])
                    ->update(['add_line' => 'Yes']);
            }
        }
    }
}