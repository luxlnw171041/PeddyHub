<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pet;
use App\Models\Post;

class Home_pageController extends Controller
{
    public function home_page()
    {
        // นับผู้ใช้
        $users = User::get();
        $count_user = count($users);
        //นับสัตว์เลี้ยง
        $pets = Pet::get();
        $count_pet = count($pets);
        //post
        $data_post = Post::inRandomOrder()->limit(6)->get();
        
        return view('welcome' ,compact('count_user','count_pet' ,'data_post'));
    }

    
}
