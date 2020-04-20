<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $category = DB::table('category')->where('status',1)->get();
        $user_id = Auth::guard('user')->id();
        $temp_data = DB::table('temp_data')
            ->select('temp_data.*','category.name as cat_name')
            ->leftjoin('category','category.id','=','temp_data.cat_id')
            ->where('temp_data.user_id',$user_id)
            ->get();
        return view('user.dashboard',compact('category','temp_data'));
    }

    public function tempTicket(Request $request)
    {
        $this->validate($request, [
            'nationality'   => 'required',
            'cat_id' => 'required',
            'quantity' => 'required',
        ]);
        $user_id = Auth::guard('user')->id();
        $cat_id = $request->input('cat_id');
        $nationality = $request->input('nationality');
        $quantity = $request->input('quantity');
        
        $validation = DB::table('temp_data')->where('user_id',$user_id)->where('cat_id',$cat_id)->where('nationality',$nationality)->count();
        if ($validation > 0) {
            return redirect()->back()->with('error','Category already added Please Remove It First');
        }

        $total_count = DB::table('temp_data')->where('user_id',$user_id)->count();
        if ($total_count >= 6) {
            return redirect()->back()->with('error','Maximum Ticket Addition Limit is Over ! You Can Only add Maximum of 6 Ticket');
        }

        $category = DB::table('category')->where('id',$cat_id)->first();
        if ($category) {
            $cat_price = $category->price_indian;
            if ($nationality == '2') {
                $cat_price = $category->price_foreigner;
            }

            DB::table('temp_data')
                ->insert([
                    'cat_id' => $cat_id,
                    'user_id' => $user_id,
                    'name' => $request->input('name'),
                    'quantity' => $quantity,
                    'nationality' => $nationality,
                    'rate' => $cat_price,
                    'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                ]);
            return redirect()->back();
        } else {
            return redirect()->back()->with('error','Category Price Not Found Try Agaion');
        }
        
        
    }

    public function tempTicketRemove($id)
    {
        DB::table('temp_data')->where('id',$id)->delete();
        return redirect()->back();
    }
}
