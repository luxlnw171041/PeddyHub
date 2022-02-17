<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\API\LineApiController;
use App\Models\Sos_map;

class LocationController extends Controller
{
    
    public function change_country($user_id)
    {
        $data_user = DB::table('users')->where('id', $user_id)->get();

        foreach ($data_user as $item) {
                
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
               $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';

            $ip = $ipaddress; // your ip address here
            $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

            if($query && $query['status'] == 'success')
            {
                DB::table('users')
                    ->where('id', $user_id)
                    ->update([
                        'country' => $query['countryCode'],
                        'time_zone' => $query['timezone'],
                        'ip_address' => $query,
                ]);
            }
        }
       
        return $user_id;
    }

    public function user_language($language, $user_id)
    {
        $data_user = DB::table('users')->where('id', $user_id)->get();

        DB::table('users')
            ->where('id', $user_id)
            ->update([
                'language' => $language,
        ]);

        $user = DB::table('users')->where('id', $user_id)->get();   

        $lineAPI = new LineApiController();
        $lineAPI->check_language_user($user);
       
        return $user_id;
    }

    public function show_location_P()
    {
        $location_P = DB::table('lat_longs')
                        ->select('changwat_th')
                        ->groupBy('changwat_th')
                        ->orderBy('changwat_th', 'asc')
                        ->get();

        return $location_P;
    }

    public function show_location_A($province)
    {
        $location_A = DB::table('lat_longs')
                        ->select('amphoe_th')
                        ->where('province', $province)
                        ->groupBy('amphoe_th')
                        ->orderBy('amphoe_th', 'asc')
                        ->get();
        return $location_A;
    }

}
