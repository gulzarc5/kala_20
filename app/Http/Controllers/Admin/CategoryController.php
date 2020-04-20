<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function categoryList()
    {
        $category = DB::table('category')->get();
        return view('admin.category_list',compact('category'));
    }
}
