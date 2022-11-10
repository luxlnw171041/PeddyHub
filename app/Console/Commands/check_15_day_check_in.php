<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Profile;
use App\Models\Check_in;


class Check_15_day_delete extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:check_15day_sendcovid_and_check_in';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check_15day_sand_covid=null_and_delete_check_in';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    // public $channel_access_token = env('CHANNEL_ACCESS_TOKEN');

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date_now = date("Y-m-d");

        // 15 วัน send covid = null
        $date_15_delete = strtotime("-15 days");
        $date_15 = date("Y-m-d" , $date_15_delete);

        $check_15days_null = Profile::where('send_covid' , "<=" , $date_15)->get();

        foreach ($check_15days_null as $item) {
            DB::table('profiles')
                ->where('id', $item->id)
                ->update(['send_covid' => null,]);
        }

        // -----------------------------------------------------

        // 60 days update status check in
        $date_2_month_delete = strtotime("-2 month");
        $date_use = date("Y-m-d" , $date_2_month_delete);

        $check_in_60_update = Check_in::where('created_at' , "<=" , $date_use)
        ->where('status' , 'show')
        ->get();

        foreach ($check_in_60_update as $item) {
            // Check_in::where('id' , $item->id)->delete();
            DB::table('check_ins')
                ->where('id', $item->id)
                ->update(['status' => 'No',]);
        }
    }

}
