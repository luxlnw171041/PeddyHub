<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use App\Models\Adoptpet;
use App\Models\Partner;
use App\Models\Pet_Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdoptpetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 25;
        $category  = $request->get('pet_category_id');

        $keyword =  !empty($category);
        if (!empty($keyword)) {
            $adoptpet = Adoptpet::where('pet_category_id',    'LIKE', '%' .$category.'%')
                ->latest()->paginate($perPage);
        } else {
            $adoptpet = Adoptpet::latest()->paginate($perPage);
        }

        return view('adoptpet.index', compact('adoptpet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {   
        if (!empty(Auth::User()->partner)) {
            $partner_id = Auth::User()->partner;
            $data_partners = Partner::where('id' , $partner_id)->first();

            $link_line = $data_partners->link_line;
        }else{
            $link_line = "" ;
        }

        $category = Pet_Category::groupBy('name')->get();

        return view('adoptpet.create' , compact('category','link_line'));
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
        $requestData['user_id'] = Auth::id();  
        $partner_id = Auth::User()->partner; 
 
        $requestData = $request->all();      

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo2')) {
            $requestData['photo2'] = $request->file('photo2')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo3')) {
            $requestData['photo3'] = $request->file('photo3')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo4')) {
            $requestData['photo4'] = $request->file('photo4')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo4')) {
            $requestData['photo4'] = $request->file('photo4')
                ->store('uploads', 'public');
        } if ($request->hasFile('photo5')) {
            $requestData['photo5'] = $request->file('photo5')
                ->store('uploads', 'public');
        }

        if (!empty($requestData['phone_user'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'phone' => $requestData['phone_user'],
                ]);
        }  

        if (!empty($requestData['link_line'])) {
            DB::table('partners')
                ->where([ 
                        ['id', $partner_id],
                    ])
                ->update([
                    'link_line' => $requestData['link_line'],
                ]);
        }  

        Adoptpet::create($requestData);

        return redirect('adoptpet')->with('flash_message', 'Adoptpet added!');
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
        $user_id = Auth::id();
        $adoptpet = Adoptpet::findOrFail($id);
        // id คนลง
        $adoptpet_user_id = $adoptpet->user_id ;
        $data_adoptpet_user = User::where('id' , $adoptpet_user_id)->first();

        if (!empty($data_adoptpet_user->partner)) {

            $partner_id = $data_adoptpet_user->partner ;
            $data_partners = Partner::where('id' , $partner_id)->first();

        }else{
            $partner_id = "";
            $data_partners = "";
        }

        return view('adoptpet.show', compact('adoptpet','user_id','partner_id','data_partners'));
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
        $adoptpet = Adoptpet::findOrFail($id);

        if ( $adoptpet->user_id != Auth::id() ) {
            return redirect('/404');
        }else{

            if (!empty(Auth::User()->partner)) {
                $partner_id = Auth::User()->partner;
                $data_partners = Partner::where('id' , $partner_id)->first();

                $link_line = $data_partners->link_line;
            }else{
                $link_line = "" ;
            }

            $category = Pet_Category::groupBy('name')->get();

            return view('adoptpet.edit', compact('adoptpet','category','link_line'));

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
        
        $requestData['user_id'] = Auth::id();  
        $partner_id = Auth::User()->partner; 

        $requestData = $request->all();      
        
       
        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo2')) {
            $requestData['photo2'] = $request->file('photo2')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo3')) {
            $requestData['photo3'] = $request->file('photo3')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo4')) {
            $requestData['photo4'] = $request->file('photo4')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo4')) {
            $requestData['photo4'] = $request->file('photo4')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo5')) {
            $requestData['photo5'] = $request->file('photo5')
                ->store('uploads', 'public');
        }

        if (!empty($requestData['phone_user'])) {
            DB::table('profiles')
                ->where([ 
                        ['user_id', $requestData['user_id']],
                    ])
                ->update([
                    'phone' => $requestData['phone_user'],
                ]);
        }  

        if (!empty($requestData['link_line'])) {
            DB::table('partners')
                ->where([ 
                        ['id', $partner_id],
                    ])
                ->update([
                    'link_line' => $requestData['link_line'],
                ]);
        }  

        if (!empty($requestData['status'])) {
            DB::table('adoptpets')
            ->where([ 
                    ['id', $id],
                ])
            ->update([
                'status' => $requestData['status'],
            ]);
        }  

        $adoptpet = Adoptpet::findOrFail($id);
        $adoptpet->update($requestData);

        return redirect('adoptpet/' . $id)->with('flash_message', 'Adoptpet updated!');
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
        DB::table('adoptpets')
                ->where([ 
                        ['id', $id],
                    ])
                ->update([
                    'status' => "delete",
                ]);
        

        return redirect('adoptpet')->with('flash_message', 'Adoptpet deleted!');
    }

  
}
