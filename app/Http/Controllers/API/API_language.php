<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\LineApiController;
// use App\Models\LineMessagingAPI;


class API_language extends Controller
{
    public function change_language($language , $user_id)
    {
        DB::table('profiles')
              ->where('user_id', $user_id)
              ->update([
                'language' => $language,
        ]);

        $data_users = User::where('id', $user_id)->get();

        $lineAPI = new LineApiController();
        $lineAPI->check_language_user($data_users);

        return $language;
    }

}