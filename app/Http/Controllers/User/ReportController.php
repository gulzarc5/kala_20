<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Auth;

class ReportController extends Controller
{
    public function todayTicketList()
    {
        $user_id = Auth::guard('user')->id();
        $date = Carbon::now()->setTimezone('Asia/Kolkata');
        $ticket_det = DB::table('ticket')->where('user_id',$user_id)
        ->whereDate('created_at',$date)->paginate(20);
        $reprint_count = DB::table('ticket')
        ->where('user_id',$user_id)
        ->whereDate('created_at',$date)
        ->sum('reprint');
        return view('user.today_ticket',compact('ticket_det','reprint_count'));
    }

    public function dayReportView()
    {
        $user_id = Auth::guard('user')->id();
        $date = Carbon::now()->setTimezone('Asia/Kolkata');
        $reprint_count = DB::table('ticket')
            ->where('user_id',$user_id)
            ->whereDate('created_at',$date)
            ->sum('reprint');
        /////////////Adult/////////////////////
            $from_ticket_adult = DB::table('adult')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_adult =  DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $adult = compact('from_ticket_adult','to_ticket_adult','qtty_indian_adult','qtty_foreigner_adult','amount_adult');
        
        /////////////child/////////////////////
            $from_ticket_child = DB::table('child')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_child =  DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $child = compact('from_ticket_child','to_ticket_child','qtty_indian_child','qtty_foreigner_child','amount_child');

        /////////////camera/////////////////////
            $from_ticket_camera = DB::table('camera')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_camera =  DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $camera = compact('from_ticket_camera','to_ticket_camera','qtty_indian_camera','qtty_foreigner_camera','amount_camera');
        /////////////vhs/////////////////////
            $from_ticket_vhs = DB::table('vhs')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_vhs =  DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $vhs = compact('from_ticket_vhs','to_ticket_vhs','qtty_indian_vhs','qtty_foreigner_vhs','amount_vhs');
        
        /////////////bus_parking/////////////////////
            $from_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_bus_parking =  DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $bus_parking = compact('from_ticket_bus_parking','to_ticket_bus_parking','qtty_indian_bus_parking','qtty_foreigner_bus_parking','amount_bus_parking');
        /////////////car_parking/////////////////////
            $from_ticket_car_parking = DB::table('car_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_car_parking =  DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $car_parking = compact('from_ticket_car_parking','to_ticket_car_parking','qtty_indian_car_parking','qtty_foreigner_car_parking','amount_car_parking');
        /////////////two_three_parking/////////////////////
            $from_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_two_three_parking =  DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $two_three_parking = compact('from_ticket_two_three_parking','to_ticket_two_three_parking','qtty_indian_two_three_parking','qtty_foreigner_two_three_parking','amount_two_three_parking');
        /////////////cycle_parking/////////////////////
            $from_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_cycle_parking =  DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $cycle_parking = compact('from_ticket_cycle_parking','to_ticket_cycle_parking','qtty_indian_cycle_parking','qtty_foreigner_cycle_parking','amount_cycle_parking');
        /////////////light_sound_a/////////////////////
            $from_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_a =  DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $light_sound_a = compact('from_ticket_light_sound_a','to_ticket_light_sound_a','qtty_indian_light_sound_a','qtty_foreigner_light_sound_a','amount_light_sound_a');
        /////////////light_sound_b/////////////////////
            $from_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_b =  DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $light_sound_b = compact('from_ticket_light_sound_b','to_ticket_light_sound_b','qtty_indian_light_sound_b','qtty_foreigner_light_sound_b','amount_light_sound_b');


  
        return view('user.day_report',compact('light_sound_b','light_sound_a','cycle_parking','two_three_parking','car_parking','bus_parking','vhs','camera','child','adult','reprint_count'));
    }

    public function dayReportPrint()
    {       
        $user_id = Auth::guard('user')->id();
        $date = Carbon::now()->setTimezone('Asia/Kolkata');
        
        $reprint_count = DB::table('ticket')
            ->where('user_id',$user_id)
            ->whereDate('created_at',$date)
            ->sum('reprint');
        /////////////Adult/////////////////////
            $from_ticket_adult = DB::table('adult')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_adult =  DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $adult = compact('from_ticket_adult','to_ticket_adult','qtty_indian_adult','qtty_foreigner_adult','amount_adult');
        
        /////////////child/////////////////////
            $from_ticket_child = DB::table('child')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_child =  DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $child = compact('from_ticket_child','to_ticket_child','qtty_indian_child','qtty_foreigner_child','amount_child');

        /////////////camera/////////////////////
            $from_ticket_camera = DB::table('camera')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_camera =  DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $camera = compact('from_ticket_camera','to_ticket_camera','qtty_indian_camera','qtty_foreigner_camera','amount_camera');
        /////////////vhs/////////////////////
            $from_ticket_vhs = DB::table('vhs')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_vhs =  DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $vhs = compact('from_ticket_vhs','to_ticket_vhs','qtty_indian_vhs','qtty_foreigner_vhs','amount_vhs');
        
        /////////////bus_parking/////////////////////
            $from_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_bus_parking =  DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $bus_parking = compact('from_ticket_bus_parking','to_ticket_bus_parking','qtty_indian_bus_parking','qtty_foreigner_bus_parking','amount_bus_parking');
        /////////////car_parking/////////////////////
            $from_ticket_car_parking = DB::table('car_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_car_parking =  DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $car_parking = compact('from_ticket_car_parking','to_ticket_car_parking','qtty_indian_car_parking','qtty_foreigner_car_parking','amount_car_parking');
        /////////////two_three_parking/////////////////////
            $from_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_two_three_parking =  DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $two_three_parking = compact('from_ticket_two_three_parking','to_ticket_two_three_parking','qtty_indian_two_three_parking','qtty_foreigner_two_three_parking','amount_two_three_parking');
        /////////////cycle_parking/////////////////////
            $from_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_cycle_parking =  DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $cycle_parking = compact('from_ticket_cycle_parking','to_ticket_cycle_parking','qtty_indian_cycle_parking','qtty_foreigner_cycle_parking','amount_cycle_parking');
        /////////////light_sound_a/////////////////////
            $from_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_a =  DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $light_sound_a = compact('from_ticket_light_sound_a','to_ticket_light_sound_a','qtty_indian_light_sound_a','qtty_foreigner_light_sound_a','amount_light_sound_a');
        /////////////light_sound_b/////////////////////
            $from_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_b =  DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('user_id',$user_id)
                ->sum('total_price');
            $light_sound_b = compact('from_ticket_light_sound_b','to_ticket_light_sound_b','qtty_indian_light_sound_b','qtty_foreigner_light_sound_b','amount_light_sound_b');

        
        return view('user.report_print',compact('light_sound_b','light_sound_a','cycle_parking','two_three_parking','car_parking','bus_parking','vhs','camera','child','adult','reprint_count'));
    }

    public function totalDayReportView()
    {
        $date = Carbon::now()->setTimezone('Asia/Kolkata');
        $reprint_count = DB::table('ticket')
            ->whereDate('created_at',$date)
            ->sum('reprint');
        /////////////Adult/////////////////////
            $from_ticket_adult = DB::table('adult')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_adult = DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_adult =  DB::table('adult')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $adult = compact('from_ticket_adult','to_ticket_adult','qtty_indian_adult','qtty_foreigner_adult','amount_adult');
        
        /////////////child/////////////////////
            $from_ticket_child = DB::table('child')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_child = DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_child =  DB::table('child')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $child = compact('from_ticket_child','to_ticket_child','qtty_indian_child','qtty_foreigner_child','amount_child');

        /////////////camera/////////////////////
            $from_ticket_camera = DB::table('camera')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_camera = DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_camera =  DB::table('camera')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $camera = compact('from_ticket_camera','to_ticket_camera','qtty_indian_camera','qtty_foreigner_camera','amount_camera');
        /////////////vhs/////////////////////
            $from_ticket_vhs = DB::table('vhs')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_vhs =  DB::table('vhs')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $vhs = compact('from_ticket_vhs','to_ticket_vhs','qtty_indian_vhs','qtty_foreigner_vhs','amount_vhs');
        
        /////////////bus_parking/////////////////////
            $from_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_bus_parking =  DB::table('bus_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $bus_parking = compact('from_ticket_bus_parking','to_ticket_bus_parking','qtty_indian_bus_parking','qtty_foreigner_bus_parking','amount_bus_parking');
        /////////////car_parking/////////////////////
            $from_ticket_car_parking = DB::table('car_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_car_parking =  DB::table('car_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $car_parking = compact('from_ticket_car_parking','to_ticket_car_parking','qtty_indian_car_parking','qtty_foreigner_car_parking','amount_car_parking');
        /////////////two_three_parking/////////////////////
            $from_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_two_three_parking =  DB::table('two_three_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $two_three_parking = compact('from_ticket_two_three_parking','to_ticket_two_three_parking','qtty_indian_two_three_parking','qtty_foreigner_two_three_parking','amount_two_three_parking');
        /////////////cycle_parking/////////////////////
            $from_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_cycle_parking =  DB::table('cycle_parking')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $cycle_parking = compact('from_ticket_cycle_parking','to_ticket_cycle_parking','qtty_indian_cycle_parking','qtty_foreigner_cycle_parking','amount_cycle_parking');
        /////////////light_sound_a/////////////////////
            $from_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_a =  DB::table('light_sound_a')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $light_sound_a = compact('from_ticket_light_sound_a','to_ticket_light_sound_a','qtty_indian_light_sound_a','qtty_foreigner_light_sound_a','amount_light_sound_a');
        /////////////light_sound_b/////////////////////
            $from_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count','quantity')
                ->whereDate('created_at',$date)
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_b =  DB::table('light_sound_b')
                ->select('total_count')
                ->whereDate('created_at',$date)
                ->sum('total_price');
            $light_sound_b = compact('from_ticket_light_sound_b','to_ticket_light_sound_b','qtty_indian_light_sound_b','qtty_foreigner_light_sound_b','amount_light_sound_b');


  
        return view('user.total_day_report',compact('light_sound_b','light_sound_a','cycle_parking','two_three_parking','car_parking','bus_parking','vhs','camera','child','adult','reprint_count'));
    }

    public function totalReportSearch(Request $request)
    {
        
        $this->validate($request, [
            'sdate'   => 'required',
            'edate' => 'required',
        ]);
        
        $s_date = $request->input('sdate');
        $e_date = $request->input('edate');
        if (Carbon::parse($s_date)->gt(Carbon::parse(Carbon::parse($e_date)))){         
            return redirect()->route('user.total_day_report_view')->with('error','Please Select End Date Greater Then Start Date');
        }

        $date_from = Carbon::parse($s_date)->startOfDay();
        $date_to = Carbon::parse($e_date)->endOfDay();
        $user_id = Auth::guard('user')->id();

        $reprint_count = DB::table('ticket')
            ->whereBetween('created_at', [$date_from,$date_to])
            ->sum('reprint');
        /////////////Adult/////////////////////
            $from_ticket_adult = DB::table('adult')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_adult = DB::table('adult')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_adult = DB::table('adult')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_adult = DB::table('adult')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_adult =  DB::table('adult')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $adult = compact('from_ticket_adult','to_ticket_adult','qtty_indian_adult','qtty_foreigner_adult','amount_adult');
        
        /////////////child/////////////////////
            $from_ticket_child = DB::table('child')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_child = DB::table('child')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_child = DB::table('child')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_child = DB::table('child')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_child =  DB::table('child')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $child = compact('from_ticket_child','to_ticket_child','qtty_indian_child','qtty_foreigner_child','amount_child');

        /////////////camera/////////////////////
            $from_ticket_camera = DB::table('camera')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_camera = DB::table('camera')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_camera = DB::table('camera')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_camera = DB::table('camera')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_camera =  DB::table('camera')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $camera = compact('from_ticket_camera','to_ticket_camera','qtty_indian_camera','qtty_foreigner_camera','amount_camera');
        /////////////vhs/////////////////////
            $from_ticket_vhs = DB::table('vhs')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_vhs = DB::table('vhs')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_vhs =  DB::table('vhs')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $vhs = compact('from_ticket_vhs','to_ticket_vhs','qtty_indian_vhs','qtty_foreigner_vhs','amount_vhs');
        
        /////////////bus_parking/////////////////////
            $from_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_bus_parking = DB::table('bus_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_bus_parking =  DB::table('bus_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $bus_parking = compact('from_ticket_bus_parking','to_ticket_bus_parking','qtty_indian_bus_parking','qtty_foreigner_bus_parking','amount_bus_parking');
        /////////////car_parking/////////////////////
            $from_ticket_car_parking = DB::table('car_parking')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_car_parking = DB::table('car_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_car_parking =  DB::table('car_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $car_parking = compact('from_ticket_car_parking','to_ticket_car_parking','qtty_indian_car_parking','qtty_foreigner_car_parking','amount_car_parking');
        /////////////two_three_parking/////////////////////
            $from_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_two_three_parking = DB::table('two_three_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_two_three_parking =  DB::table('two_three_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $two_three_parking = compact('from_ticket_two_three_parking','to_ticket_two_three_parking','qtty_indian_two_three_parking','qtty_foreigner_two_three_parking','amount_two_three_parking');
        /////////////cycle_parking/////////////////////
            $from_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_cycle_parking = DB::table('cycle_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_cycle_parking =  DB::table('cycle_parking')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $cycle_parking = compact('from_ticket_cycle_parking','to_ticket_cycle_parking','qtty_indian_cycle_parking','qtty_foreigner_cycle_parking','amount_cycle_parking');
        /////////////light_sound_a/////////////////////
            $from_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_a = DB::table('light_sound_a')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_a =  DB::table('light_sound_a')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $light_sound_a = compact('from_ticket_light_sound_a','to_ticket_light_sound_a','qtty_indian_light_sound_a','qtty_foreigner_light_sound_a','amount_light_sound_a');
        /////////////light_sound_b/////////////////////
            $from_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count','quantity')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_b = DB::table('light_sound_b')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_b =  DB::table('light_sound_b')
                ->select('total_count')
                ->whereBetween('created_at', [$date_from,$date_to])
                ->sum('total_price');
            $light_sound_b = compact('from_ticket_light_sound_b','to_ticket_light_sound_b','qtty_indian_light_sound_b','qtty_foreigner_light_sound_b','amount_light_sound_b');

  
        return view('user.total_day_report',compact('light_sound_b','light_sound_a','cycle_parking','two_three_parking','car_parking','bus_parking','vhs','camera','child','adult','reprint_count','s_date','e_date'));
    }

    public function totalReportPrint($page,$s_date = null,$e_date = null)
    {
        if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
            $date_from = Carbon::parse($s_date)->startOfDay();
            $date_to = Carbon::parse($e_date)->endOfDay();
            if (Carbon::parse($s_date)->gt(Carbon::parse(Carbon::parse($e_date)))){         
                return redirect()->route('user.total_day_report_view')->with('error','Please Select End Date Greater Then Start Date');
            }
        }else{
            $date = Carbon::now()->setTimezone('Asia/Kolkata');
        }

        $reprint_count = DB::table('ticket');
        if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
            $reprint_count->whereBetween('created_at', [$date_from,$date_to]);              
        } else {
            $reprint_count->whereDate('created_at',$date);
        }                
        $reprint_count = $reprint_count->sum('reprint');
        /////////////Adult/////////////////////
            $from_ticket_adult = DB::table('adult')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_adult->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_adult->whereDate('created_at',$date);
                }                
                $from_ticket_adult = $from_ticket_adult->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_adult = DB::table('adult')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_adult->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_adult->whereDate('created_at',$date);
                }                
                $to_ticket_adult = $to_ticket_adult->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_adult = DB::table('adult')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_adult->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_adult->whereDate('created_at',$date);
                }                
                $qtty_indian_adult = $qtty_indian_adult->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_adult = DB::table('adult')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_adult->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_adult->whereDate('created_at',$date);
                }                
                $qtty_foreigner_adult = $qtty_foreigner_adult->where('nationality',2)
                ->sum('quantity');
            $amount_adult =  DB::table('adult')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_adult->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_adult->whereDate('created_at',$date);
                }                
                $amount_adult = $amount_adult->sum('total_price');
            $adult = compact('from_ticket_adult','to_ticket_adult','qtty_indian_adult','qtty_foreigner_adult','amount_adult');
        
        /////////////child/////////////////////
            $from_ticket_child = DB::table('child')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_child->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_child->whereDate('created_at',$date);
                }  
                $from_ticket_child = $from_ticket_child->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_child = DB::table('child')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_child->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_child->whereDate('created_at',$date);
                }  
                $to_ticket_child = $to_ticket_child->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_child = DB::table('child')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_child->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_child->whereDate('created_at',$date);
                }  
                $qtty_indian_child = $qtty_indian_child->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_child = DB::table('child')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_child->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_child->whereDate('created_at',$date);
                }  
                $qtty_foreigner_child = $qtty_foreigner_child->where('nationality',2)
                ->sum('quantity');
            $amount_child =  DB::table('child')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_child->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_child->whereDate('created_at',$date);
                }  
                $amount_child = $amount_child->sum('total_price');
            $child = compact('from_ticket_child','to_ticket_child','qtty_indian_child','qtty_foreigner_child','amount_child');

        /////////////camera/////////////////////
            $from_ticket_camera = DB::table('camera')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_camera->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_camera->whereDate('created_at',$date);
                }  
                $from_ticket_camera = $from_ticket_camera->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_camera = DB::table('camera')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_camera->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_camera->whereDate('created_at',$date);
                }  
                $to_ticket_camera = $to_ticket_camera->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_camera = DB::table('camera')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_camera->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_camera->whereDate('created_at',$date);
                }  
                $qtty_indian_camera = $qtty_indian_camera->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_camera = DB::table('camera')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_camera->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_camera->whereDate('created_at',$date);
                }  
                $qtty_foreigner_camera = $qtty_foreigner_camera->where('nationality',2)
                ->sum('quantity');
            $amount_camera =  DB::table('camera')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_camera->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_camera->whereDate('created_at',$date);
                }  
                $amount_camera = $amount_camera->sum('total_price');
            $camera = compact('from_ticket_camera','to_ticket_camera','qtty_indian_camera','qtty_foreigner_camera','amount_camera');
        /////////////vhs/////////////////////
            $from_ticket_vhs = DB::table('vhs')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_vhs->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_vhs->whereDate('created_at',$date);
                }  
                $from_ticket_vhs = $from_ticket_vhs->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_vhs = DB::table('vhs')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_vhs->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_vhs->whereDate('created_at',$date);
                }  
                $to_ticket_vhs = $to_ticket_vhs->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_vhs = DB::table('vhs')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_vhs->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_vhs->whereDate('created_at',$date);
                }  
                $qtty_indian_vhs = $qtty_indian_vhs->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_vhs = DB::table('vhs')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_vhs->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_vhs->whereDate('created_at',$date);
                }  
                $qtty_foreigner_vhs = $qtty_foreigner_vhs->where('nationality',2)
                ->sum('quantity');
            $amount_vhs =  DB::table('vhs')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_vhs->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_vhs->whereDate('created_at',$date);
                }  
                $amount_vhs = $amount_vhs->sum('total_price');
            $vhs = compact('from_ticket_vhs','to_ticket_vhs','qtty_indian_vhs','qtty_foreigner_vhs','amount_vhs');
        
        /////////////bus_parking/////////////////////
            $from_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_bus_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_bus_parking->whereDate('created_at',$date);
                }  
                $from_ticket_bus_parking = $from_ticket_bus_parking->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_bus_parking = DB::table('bus_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_bus_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_bus_parking->whereDate('created_at',$date);
                }  
                $to_ticket_bus_parking = $to_ticket_bus_parking->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_bus_parking = DB::table('bus_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_bus_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_bus_parking->whereDate('created_at',$date);
                }  
                $qtty_indian_bus_parking = $qtty_indian_bus_parking->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_bus_parking = DB::table('bus_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_bus_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_bus_parking->whereDate('created_at',$date);
                }  
                $qtty_foreigner_bus_parking = $qtty_foreigner_bus_parking->where('nationality',2)
                ->sum('quantity');
            $amount_bus_parking =  DB::table('bus_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_bus_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_bus_parking->whereDate('created_at',$date);
                }  
                $amount_bus_parking = $amount_bus_parking->sum('total_price');
            $bus_parking = compact('from_ticket_bus_parking','to_ticket_bus_parking','qtty_indian_bus_parking','qtty_foreigner_bus_parking','amount_bus_parking');
        /////////////car_parking/////////////////////
            $from_ticket_car_parking = DB::table('car_parking')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_car_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_car_parking->whereDate('created_at',$date);
                }  
                $from_ticket_car_parking = $from_ticket_car_parking->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_car_parking = DB::table('car_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_car_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_car_parking->whereDate('created_at',$date);
                }  
                $to_ticket_car_parking = $to_ticket_car_parking->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_car_parking = DB::table('car_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_car_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_car_parking->whereDate('created_at',$date);
                }  
                $qtty_indian_car_parking = $qtty_indian_car_parking->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_car_parking = DB::table('car_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_car_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_car_parking->whereDate('created_at',$date);
                }  
                $qtty_foreigner_car_parking = $qtty_foreigner_car_parking->where('nationality',2)
                ->sum('quantity');
            $amount_car_parking =  DB::table('car_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_car_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_car_parking->whereDate('created_at',$date);
                }  
                $amount_car_parking = $amount_car_parking->sum('total_price');
            $car_parking = compact('from_ticket_car_parking','to_ticket_car_parking','qtty_indian_car_parking','qtty_foreigner_car_parking','amount_car_parking');
        /////////////two_three_parking/////////////////////
            $from_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_two_three_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_two_three_parking->whereDate('created_at',$date);
                }  
                $from_ticket_two_three_parking = $from_ticket_two_three_parking->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_two_three_parking = DB::table('two_three_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_two_three_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_two_three_parking->whereDate('created_at',$date);
                }  
                $to_ticket_two_three_parking = $to_ticket_two_three_parking->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_two_three_parking = DB::table('two_three_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_two_three_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_two_three_parking->whereDate('created_at',$date);
                }  
                $qtty_indian_two_three_parking = $qtty_indian_two_three_parking->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_two_three_parking = DB::table('two_three_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_two_three_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_two_three_parking->whereDate('created_at',$date);
                }  
                $qtty_foreigner_two_three_parking = $qtty_foreigner_two_three_parking->where('nationality',2)
                ->sum('quantity');
            $amount_two_three_parking =  DB::table('two_three_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_two_three_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_two_three_parking->whereDate('created_at',$date);
                }  
                $amount_two_three_parking = $amount_two_three_parking->sum('total_price');
            $two_three_parking = compact('from_ticket_two_three_parking','to_ticket_two_three_parking','qtty_indian_two_three_parking','qtty_foreigner_two_three_parking','amount_two_three_parking');
        /////////////cycle_parking/////////////////////
            $from_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_cycle_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_cycle_parking->whereDate('created_at',$date);
                }  
                $from_ticket_cycle_parking = $from_ticket_cycle_parking->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_cycle_parking = DB::table('cycle_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_cycle_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_cycle_parking->whereDate('created_at',$date);
                }  
                $to_ticket_cycle_parking = $to_ticket_cycle_parking->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_cycle_parking = DB::table('cycle_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_cycle_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_cycle_parking->whereDate('created_at',$date);
                }  
                $qtty_indian_cycle_parking = $qtty_indian_cycle_parking->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_cycle_parking = DB::table('cycle_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_cycle_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_cycle_parking->whereDate('created_at',$date);
                }  
                $qtty_foreigner_cycle_parking = $qtty_foreigner_cycle_parking->where('nationality',2)
                ->sum('quantity');
            $amount_cycle_parking =  DB::table('cycle_parking')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_cycle_parking->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_cycle_parking->whereDate('created_at',$date);
                }  
                $amount_cycle_parking = $amount_cycle_parking->sum('total_price');
            $cycle_parking = compact('from_ticket_cycle_parking','to_ticket_cycle_parking','qtty_indian_cycle_parking','qtty_foreigner_cycle_parking','amount_cycle_parking');
        /////////////light_sound_a/////////////////////
            $from_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_light_sound_a->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_light_sound_a->whereDate('created_at',$date);
                }  
                $from_ticket_light_sound_a = $from_ticket_light_sound_a->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_a = DB::table('light_sound_a')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_light_sound_a->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_light_sound_a->whereDate('created_at',$date);
                }  
                $to_ticket_light_sound_a = $to_ticket_light_sound_a->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_a = DB::table('light_sound_a')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_light_sound_a->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_light_sound_a->whereDate('created_at',$date);
                }  
                $qtty_indian_light_sound_a = $qtty_indian_light_sound_a->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_a = DB::table('light_sound_a')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_light_sound_a->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_light_sound_a->whereDate('created_at',$date);
                }  
                $qtty_foreigner_light_sound_a = $qtty_foreigner_light_sound_a->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_a =  DB::table('light_sound_a')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_light_sound_a->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_light_sound_a->whereDate('created_at',$date);
                }  
                $amount_light_sound_a = $amount_light_sound_a->sum('total_price');
            $light_sound_a = compact('from_ticket_light_sound_a','to_ticket_light_sound_a','qtty_indian_light_sound_a','qtty_foreigner_light_sound_a','amount_light_sound_a');
        ///////////light_sound_b/////////////////////
            $from_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count','quantity');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $from_ticket_light_sound_b->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $from_ticket_light_sound_b->whereDate('created_at',$date);
                }  
                $from_ticket_light_sound_b = $from_ticket_light_sound_b->orderBy('id','asc')
                ->limit(1)
                ->first();
            $to_ticket_light_sound_b = DB::table('light_sound_b')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $to_ticket_light_sound_b->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $to_ticket_light_sound_b->whereDate('created_at',$date);
                }  
                $to_ticket_light_sound_b = $to_ticket_light_sound_b->orderBy('id','desc')
                ->limit(1)
                ->first();
            $qtty_indian_light_sound_b = DB::table('light_sound_b')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_indian_light_sound_b->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_indian_light_sound_b->whereDate('created_at',$date);
                }  
                $qtty_indian_light_sound_b = $qtty_indian_light_sound_b->where('nationality',1)
                ->sum('quantity');
            $qtty_foreigner_light_sound_b = DB::table('light_sound_b')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $qtty_foreigner_light_sound_b->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $qtty_foreigner_light_sound_b->whereDate('created_at',$date);
                }  
                $qtty_foreigner_light_sound_b = $qtty_foreigner_light_sound_b->where('nationality',2)
                ->sum('quantity');
            $amount_light_sound_b =  DB::table('light_sound_b')
                ->select('total_count');
                if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
                    $amount_light_sound_b->whereBetween('created_at', [$date_from,$date_to]);              
                } else {
                    $amount_light_sound_b->whereDate('created_at',$date);
                }  
                $amount_light_sound_b = $amount_light_sound_b->sum('total_price');
            $light_sound_b = compact('from_ticket_light_sound_b','to_ticket_light_sound_b','qtty_indian_light_sound_b','qtty_foreigner_light_sound_b','amount_light_sound_b');

        if (isset($s_date) && !empty($s_date) && isset($e_date) && !empty($e_date) ) {
            return view('user.report_print',compact('light_sound_b','light_sound_a','cycle_parking','two_three_parking','car_parking','bus_parking','vhs','camera','child','adult','reprint_count','s_date','e_date','page'));              
        } else {
            return view('user.report_print',compact('light_sound_b','light_sound_a','cycle_parking','two_three_parking','car_parking','bus_parking','vhs','camera','child','adult','reprint_count','page'));
        }  
        // return view('user.total_day_report',compact('light_sound_b','light_sound_a','cycle_parking','two_three_parking','car_parking','bus_parking','vhs','camera','child','adult','reprint_count','s_date','e_date'));
    }
}
