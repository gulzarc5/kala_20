<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $users = DB::table('users')->get();
        return view('admin.dashboard',compact('users'));
    }
}
