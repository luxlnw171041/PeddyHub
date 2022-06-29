<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Models\Pet;
use App\Models\Pet_Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {   
        $user = Auth::user();
        $keyword = $request->get('search');
        $perPage = 25;



        if (!empty($keyword)) {
            $pet = Pet::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('birth', 'LIKE', "%$keyword%")
                ->orWhere('photo', 'LIKE', "%$keyword%")
                ->orWhere('gender', 'LIKE', "%$keyword%")
                ->orWhere('size', 'LIKE', "%$keyword%")
                ->orWhere('age', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pet = Pet::where('user_id', $user->id)
            ->latest()->paginate($perPage);
        }

        return view('pet.index', compact('pet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $category = Pet_Category::all(['id', 'name']);

        $user = Auth::user();
        return view('pet.create' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_2')) {
            $requestData['photo_2'] = $request->file('photo_2')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_3')) {
            $requestData['photo_3'] = $request->file('photo_3')->store('uploads', 'public');
        }
        if ($request->hasFile('certificate')) {
            $requestData['certificate'] = $request->file('certificate')->store('uploads', 'public');
        }
        if ($request->hasFile('certificate_2')) {
            $requestData['certificate_2'] = $request->file('certificate_2')->store('uploads', 'public');
        }
        if ($request->hasFile('certificate_3')) {
            $requestData['certificate_3'] = $request->file('certificate_3')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_passport')) {
            $requestData['photo_passport'] = $request->file('photo_passport')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_vaccine')) {
            $requestData['photo_vaccine'] = $request->file('photo_vaccine')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_vaccine_2')) {
            $requestData['photo_vaccine_2'] = $request->file('photo_vaccine_2')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_vaccine_3')) {
            $requestData['photo_vaccine_3'] = $request->file('photo_vaccine_3')->store('uploads', 'public');
        }
       
        if ($request->hasFile('photo_medical_certificate')) {
            $requestData['photo_medical_certificate'] = $request->file('photo_medical_certificate')->store('uploads', 'public');
        }
        $requestData['user_id'] = Auth::id(); 

        if (!empty($requestData['select_province'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'changwat_th' => $requestData['select_province'],
                    'amphoe_th' => $requestData['select_amphoe'],
                    'tambon_th' => $requestData['select_tambon'],
                    'phone' => $requestData['phone_user'],
                ]);
        }  
        if (!empty($requestData['photo_id_card'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'photo_id_card' => $requestData['photo_id_card'] = $request->file('photo_id_card')->store('uploads', 'public')
                ]);
        } 

        if (!empty($requestData['photo_passport'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'photo_passport' => $requestData['photo_passport'] = $request->file('photo_passport')->store('uploads', 'public')
                ]);
        } 
        
        
        Pet::create($requestData);

        $data_pet_last = Pet::latest()->first();
        $url = "https://chart.googleapis.com/chart?cht=qr&chl=https://www.peddyhub.com/user_pet/" . $data_pet_last->id . "&chs=500x500&choe=UTF-8" ;

        $img = storage_path("app/public")."/uploads". "/" . 'pet_id_' . $data_pet_last->id  . '.png';
        // Save image
        file_put_contents($img, file_get_contents($url));

        DB::table('pets')
              ->where('id', $data_pet_last->id)
              ->update([
                'qr_code' => "uploads/" . 'pet_id_' . $data_pet_last->id  . '.png',
          ]);


        return redirect('user')->with('flash_message', 'Pet added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        $year = Pet::where('id' , '=' ,$id)->get();

        return view('pet.show', compact('pet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user_id = Auth::id();
        $check_user = Pet::where('user_id',$user_id )->where('id',$id )->get();
        $category = Pet_Category::all(['id', 'name']);

        foreach ($check_user as $key ) {
            $user = $key->id ;
        }
        if (empty($user)) {

            return view('/errors/404');

       }else{
            $pet = Pet::findOrFail($id);
            return view('pet.edit', compact('pet' ,'category'));
       }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();
        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_2')) {
            $requestData['photo_2'] = $request->file('photo_2')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_3')) {
            $requestData['photo_3'] = $request->file('photo_3')->store('uploads', 'public');
        }
        if ($request->hasFile('certificate')) {
            $requestData['certificate'] = $request->file('certificate')->store('uploads', 'public');
        }
        if ($request->hasFile('certificate_2')) {
            $requestData['certificate_2'] = $request->file('certificate_2')->store('uploads', 'public');
        }
        if ($request->hasFile('certificate_3')) {
            $requestData['certificate_3'] = $request->file('certificate_3')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_medical_certificate')) {
            $requestData['photo_medical_certificate'] = $request->file('photo_medical_certificate')->store('uploads', 'public');
        } 
        if ($request->hasFile('photo_vaccine')) {
            $requestData['photo_vaccine'] = $request->file('photo_vaccine')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_vaccine_2')) {
            $requestData['photo_vaccine_2'] = $request->file('photo_vaccine_2')->store('uploads', 'public');
        }
        if ($request->hasFile('photo_vaccine_3')) {
            $requestData['photo_vaccine_3'] = $request->file('photo_vaccine_3')->store('uploads', 'public');
        }   
        

        $requestData['user_id'] = Auth::id();
        if (!empty($requestData['select_province'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'changwat_th' => $requestData['select_province'],
                    'amphoe_th' => $requestData['select_amphoe'],
                    'tambon_th' => $requestData['select_tambon']
                ]);
        } 
        if (!empty($requestData['photo_id_card'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'photo_id_card' => $requestData['photo_id_card'] = $request->file('photo_id_card')->store('uploads', 'public')
                ]);
        } 

        if (!empty($requestData['photo_passport'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'photo_passport' => $requestData['photo_passport'] = $request->file('photo_passport')->store('uploads', 'public')
                ]);
        } 
        

        $pet = Pet::findOrFail($id);
        $pet->update($requestData);
        
       $login  = $request->get('login');
       
        if(!empty($login)){
            return Redirect("https://lin.ee/Bvi9Zr9");
        }
        else{
            return redirect('user')->with('flash_message', 'Pet updated!');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Pet::destroy($id);

        return redirect()->back()->with('flash_message', 'Pet deleted!');
    }

    public function welcome_line()
    {
        if(Auth::check()){
            return redirect('pet/create');
        }else{
            return redirect('/login/line?redirectTo=pet/create');
        }
    }

    public function welcome_line_pet()
    {
        if(Auth::check()){
            return redirect('user#pets');
        }else{
            return redirect('/login/line?redirectTo=user#pets');
        }
    }

    public function welcome_line_Hospital_near()
    {
        if(Auth::check()){
            return redirect('/hospital_near');
        }else{
            return redirect('/login/line?redirectTo=hospital_near');
        }
    }
    public function edit_pet_login(Request $request , $pet_id)
    {
        if(Auth::check()){
                return redirect('pet/' . $pet_id . '/edit?login=linea');
        }else{
                return redirect('login/line?redirectTo=pet/' . $pet_id . '/edit?login=linea');
        }
    }
    public function edit_pet_airplane_login(Request $request , $pet_id)
    {
        if(Auth::check()){
                return redirect('pet/' . $pet_id . '/edit?login=line&edit=airplane');
        }else{
                return redirect('login/line?redirectTo=pet/' . $pet_id . '/edit?login=line&edit=airplane');
        }
    }
}
