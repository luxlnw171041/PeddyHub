<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Lost_Pet;
use App\Models\Pet;
use Illuminate\Support\Facades\Auth;

class API_Lost_PetController extends Controller
{
    public function select_img_pet($pet_id)
    {
        $data_pet = DB::table('pets')->where('id', $pet_id)->get();
       
        return $data_pet;
    }

    public function check_lost_pet($pet_id)
    {
        $data_lost_pet = Lost_Pet::where('pet_id' , $pet_id)->where('status' , 'show')->get();

        return $data_lost_pet ;
    }

}
