<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;


class API_language extends Controller
{
    public function change_language($language , $user_id)
    {
        DB::table('profiles')
              ->where('user_id', $user_id)
              ->update([
                'language' => $language,
        ]);

        // $data_users = DB::table('users')
        //         ->where('id', $user_id)
        //         ->where('status', "active")
        //         ->get();

        // $lineAPI = new LineApiController();
        // $lineAPI->check_language_user($data_users);

        // return $language;
    }

}