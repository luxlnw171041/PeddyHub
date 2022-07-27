<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Lost_Pet;
use App\Models\Pet_Category;
use App\Models\Pet;

class Check_day_lost_pet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'command:name'; ($signature ชื่อสำหรับเรียกใช้ command)
    protected $signature = 'cron:check_15days_lost__pets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check_15days_lost__pets';

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
        // 7 วัน ถามข้อมูล ค้นหาสัตว์
        $date_now = date("Y-m-d");
        $date_delete_7 = strtotime("-7 days");
        $date_7 = date("Y-m-d" , $date_delete_7);

        // ส่งไลน์ถามเจ้าของ เจอยัง ? 

        // $check_7days = Lost_Pet::where('updated_at' , "<=" , $date_7)->get();

        // foreach ($check_7days as $item) {
        //     DB::table('lost__pets')
        //         ->where([ 
        //                 ['id', $item->id],
        //             ])
        //         ->update(['status' => "expire"]);
        // }
        
    }

}
