<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Mylog;


class LineMessagingAPI extends Model
{
	public function send_lost_pet($data)
	{
		//SAVE LOG
        $data_CHECK = [
            "title" => "CHECK",
            "content" => json_encode($data, JSON_UNESCAPED_UNICODE),
        ];
        MyLog::create($data_CHECK);
	}
}