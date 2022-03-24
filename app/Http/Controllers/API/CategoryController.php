<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Pet_Category;

class CategoryController extends Controller
{
    public function category()
    {
        $pet_cat = DB::table('pet__categories')
            ->select('id','name')
            ->groupBy('name')
            ->orderBy('name', 'asc')
            ->get();

        return $pet_cat;
    }
    public function sub_category($category)
    {
        $pets = Pet_Category::where('id' , $category)->get();
        foreach ($pets as $pet) {
                $name_cat = $pet->name ;
            
        }
        $sub_cat = DB::table('pet__categories')
                        ->select('sub_category')
                        ->where('name', $name_cat)
                        ->where('sub_category', "!=", null)
                        ->groupBy('sub_category')
                        ->orderBy('sub_category', 'asc')
                        ->get();
        return $sub_cat;
    }
}