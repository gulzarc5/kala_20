<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' =>  ['required', 'string','unique:users'],
            'mobile' => 'required|numeric',
            'password' => ['required', 'string', 'min:8'],
            'gender' => 'required',
        ]);

        DB::table('users')
            ->insert([
                'name' => $request->input('name'),
                'username' => $request->input('username'),
                'mobile' => $request->input('mobile'),
                'gender' => $request->input('gender'),
                'password' => Hash::make($request->input('password')),
                'pass_info' => $request->input('password'),
                'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);
        return redirect()->back()->with('message','User Added Successfully');
    }

    public function updateStatus($user_id,$status)
    {
        DB::table('users')
            ->where('id',$user_id)
            ->update([
                'status'=>$status,
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);
        return redirect()->back();
    }
}
