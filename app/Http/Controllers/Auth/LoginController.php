<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
  
class LoginController extends Controller
{
  
    use AuthenticatesUsers;
    
    protected $redirectTo = '/home';
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
            return redirect()->route('home');
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
    //All providers login
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    //All providers callback
    public function handleProviderCallback($provider)
    {
        $data= Socialite::driver($provider)->user();
        // print_r($user);
        $this->_registerOrLoginUser($data, $provider);
        // Return home after login
        return redirect()->intended();
    }
    //Register or Login
    protected function _registerOrLoginUser($data, $provider)
    {
        //GET USER 
        $user = User::where('email', $data->email)->first();
        
        //Create if not exists
        if (!$user) {
            //CREATE NEW USER
            $user = new User();
            $user->name = $data->name;
            $user->provider_id = $data->id;
            $user->provider = $data->provider;
            $user->email = empty($data->email)?"":$data->email;
            $user->avatar = empty($data->avatar)?"":$data->avatar;
            $user->save();
        }
        //LOGIN by object user
        Auth::login($user);
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

        $this->_registerOrLoginUser($user, "google");

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
        $this->_registerOrLoginUser($user,"facebook");

        // Return home after login
        return redirect()->intended();
    }

    // Line login
    public function redirectToLine(Request $request)
    {
        // echo $_SERVER['HTTP_REFERER'];
        // exit();
        $request->session()->put('redirectTo', $request->get('redirectTo'));

        return Socialite::driver('line')->redirect();
    }
    // Line callback
    public function handleLineCallback(Request $request)
    {

        $user = Socialite::driver('line')->user();
        // print_r($user);
        $this->_registerOrLoginUser($user,"line");
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
}