<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use Auth;

class TicketController extends Controller
{
    public function priceFetch(Request $request)
    {
        $this->validate($request, [
            'cat_id'   => 'required',
            'nationality' => 'required',
            'quantity' => 'required',
        ]);
        $price = 0;
        $category = DB::table('category')->where('id',$request->input('cat_id'))->first();
        if ($category) {
            if ($request->input('nationality') == '1') {
                $price+=($category->price_indian * $request->input('quantity'));
                return $price;
            }else{
                $price+=($category->price_foreigner * $request->input('quantity'));
                return $price;
            }
        } else {
            return  2;
        }        
    }

    public function ticketBook()
    {
        $user_id = Auth::guard('user')->id();
        $validation = DB::table('temp_data')->where('user_id',$user_id)->count();
        if ($validation <= 0) {
            return redirect()->back()->with('error','Please add ticket first then print');
        }
        $total_value = 0;
        $ticket = null;
        try {
            DB::transaction(function () use($user_id,$total_value,&$ticket) {
                $temp_ticket = DB::table('temp_data')->where('user_id',$user_id)->get();
                $ticket = DB::table('ticket')
                    ->insertGetId([
                        'user_id' => $user_id,
                        'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    ]);
                
                foreach ($temp_ticket as $key => $temp) {

                    $total_value+=  ($temp->rate * $temp->quantity);
                    //////////////////////////////Adult Ticket//////////////////////////
                    if ($temp->cat_id == '1') {
                        $last_count_adult = DB::table('adult')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_adult) {
                            $cnt_total_adult = $last_count_adult->total_count;
                        }else{
                            $cnt_total_adult = 0;
                        }
                        DB::table('adult')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_adult+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// Child Ticket//////////////////////////
                    if ($temp->cat_id == '2') {
                        $last_count_child = DB::table('child')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_child) {
                            $cnt_total_child = $last_count_child->total_count;
                        }else{
                            $cnt_total_child = 0;
                        }
                        DB::table('child')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_child+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// Camera Ticket//////////////////////////
                    if ($temp->cat_id == '3') {
                        $last_count_camera = DB::table('camera')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_camera) {
                            $cnt_total_camera = $last_count_camera->total_count;
                        }else{
                            $cnt_total_camera = 0;
                        }
                        DB::table('camera')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_camera+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// vhs Ticket//////////////////////////
                    if ($temp->cat_id == '4') {
                        $last_count_vhs = DB::table('vhs')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_vhs) {
                            $cnt_total_vhs = $last_count_vhs->total_count;
                        }else{
                            $cnt_total_vhs = 0;
                        }
                        DB::table('vhs')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_vhs+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// bus_parking Ticket//////////////////////////
                    if ($temp->cat_id == '5') {
                        $last_count_bus_parking = DB::table('bus_parking')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_bus_parking) {
                            $cnt_total_bus_parking = $last_count_bus_parking->total_count;
                        }else{
                            $cnt_total_bus_parking = 0;
                        }
                        DB::table('bus_parking')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_bus_parking+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// car_parking Ticket//////////////////////////
                    if ($temp->cat_id == '6') {
                        $last_count_car_parking = DB::table('car_parking')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_car_parking) {
                            $cnt_total_car_parking = $last_count_car_parking->total_count;
                        }else{
                            $cnt_total_car_parking = 0;
                        }
                        DB::table('car_parking')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_car_parking+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// two_three_parking Ticket//////////////////////////
                    if ($temp->cat_id == '7') {
                        $last_count_two_three_parking = DB::table('two_three_parking')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_two_three_parking) {
                            $cnt_total_two_three_parking = $last_count_two_three_parking->total_count;
                        }else{
                            $cnt_total_two_three_parking = 0;
                        }
                        DB::table('two_three_parking')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_two_three_parking+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// cycle_parking Ticket//////////////////////////
                    if ($temp->cat_id == '8') {
                        $last_count_cycle_parking = DB::table('cycle_parking')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_cycle_parking) {
                            $cnt_total_cycle_parking = $last_count_cycle_parking->total_count;
                        }else{
                            $cnt_total_cycle_parking = 0;
                        }
                        DB::table('cycle_parking')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_cycle_parking+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                     ////////////////////////////// light_sound_a Ticket//////////////////////////
                     if ($temp->cat_id == '9') {
                        $last_count_light_sound_a = DB::table('light_sound_a')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_light_sound_a) {
                            $cnt_total_light_sound_a = $last_count_light_sound_a->total_count;
                        }else{
                            $cnt_total_light_sound_a = 0;
                        }
                        DB::table('light_sound_a')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_light_sound_a+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }

                    ////////////////////////////// light_sound_b Ticket//////////////////////////
                    if ($temp->cat_id == '10') {
                        $last_count_light_sound_b = DB::table('light_sound_b')->select('total_count')->orderBy('id','desc')->limit(1)->lockForUpdate()->first();
                        if ($last_count_light_sound_b) {
                            $cnt_total_light_sound_b = $last_count_light_sound_b->total_count;
                        }else{
                            $cnt_total_light_sound_b = 0;
                        }
                        DB::table('light_sound_b')
                        ->insert([
                            'ticket_id' => $ticket,
                            'category_id' => $temp->cat_id,
                            'user_id' => $user_id,
                            'quantity' => $temp->quantity,
                            'total_count' => ($cnt_total_light_sound_b+$temp->quantity),
                            'price' => $temp->rate,
                            'total_price' => ($temp->rate * $temp->quantity),
                            'nationality' => $temp->nationality,
                            'nationality' => $temp->nationality,
                            'created_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                            'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                        ]);
                    }
                }

                $ticket_update = DB::table('ticket')
                    ->where('id',$ticket)
                    ->update([
                        'total' => $total_value,
                        'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
                    ]);
                DB::table('temp_data')->where('user_id',$user_id)->delete();
            });
            
            return redirect()->route('user.ticket_print',['ticket_id'=>$ticket]);
        }catch (\Exception $e) {
            return redirect()->back()->with('error','Something Went Wrong Please try Again Transaction');  
        }
    }

    public function ticketPrint($ticket,$page=null)
    {
        $ticket_det = DB::table('ticket')->where('id',$ticket)->first();
        $adult = DB::table('adult')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','adult.*')
            ->leftjoin('category','category.id','=','adult.category_id')
            ->get();
        $child = DB::table('child')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','child.*')
            ->leftjoin('category','category.id','=','child.category_id')
            ->get();
        $camera = DB::table('camera')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','camera.*')
            ->leftjoin('category','category.id','=','camera.category_id')
            ->get();
        $vhs =  DB::table('vhs')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','vhs.*')
            ->leftjoin('category','category.id','=','vhs.category_id')
            ->get();
        $bus_parking = DB::table('bus_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','bus_parking.*')
            ->leftjoin('category','category.id','=','bus_parking.category_id')
            ->get();
        $car_parking =  DB::table('car_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','car_parking.*')
            ->leftjoin('category','category.id','=','car_parking.category_id')
            ->get();
        $two_three_parking = DB::table('two_three_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','two_three_parking.*')
            ->leftjoin('category','category.id','=','two_three_parking.category_id')
            ->get();
        $cycle_parking = DB::table('cycle_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','cycle_parking.*')
            ->leftjoin('category','category.id','=','cycle_parking.category_id')
            ->get();
        $light_sound_a = DB::table('light_sound_a')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','light_sound_a.*')
            ->leftjoin('category','category.id','=','light_sound_a.category_id')
            ->get();

        $light_sound_b = DB::table('light_sound_b')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','light_sound_b.*')
            ->leftjoin('category','category.id','=','light_sound_b.category_id')
            ->get();

        return view('user.ticket_print',compact('ticket_det','adult','child','camera','vhs','bus_parking','car_parking','two_three_parking','cycle_parking','light_sound_a','light_sound_b','page'));
        
    }

    public function ticketView($ticket)
    {
        $ticket_det = DB::table('ticket')->where('id',$ticket)->first();
        $adult = DB::table('adult')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','adult.*')
            ->leftjoin('category','category.id','=','adult.category_id')
            ->get();
        $child = DB::table('child')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','child.*')
            ->leftjoin('category','category.id','=','child.category_id')
            ->get();
        $camera = DB::table('camera')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','camera.*')
            ->leftjoin('category','category.id','=','camera.category_id')
            ->get();
        $vhs =  DB::table('vhs')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','vhs.*')
            ->leftjoin('category','category.id','=','vhs.category_id')
            ->get();
        $bus_parking = DB::table('bus_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','bus_parking.*')
            ->leftjoin('category','category.id','=','bus_parking.category_id')
            ->get();
        $car_parking =  DB::table('car_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','car_parking.*')
            ->leftjoin('category','category.id','=','car_parking.category_id')
            ->get();
        $two_three_parking = DB::table('two_three_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','two_three_parking.*')
            ->leftjoin('category','category.id','=','two_three_parking.category_id')
            ->get();
        $cycle_parking = DB::table('cycle_parking')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','cycle_parking.*')
            ->leftjoin('category','category.id','=','cycle_parking.category_id')
            ->get();
        $light_sound_a = DB::table('light_sound_a')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','light_sound_a.*')
            ->leftjoin('category','category.id','=','light_sound_a.category_id')
            ->get();

        $light_sound_b = DB::table('light_sound_b')->where('ticket_id',$ticket)
            ->select('category.name as cat_name','light_sound_b.*')
            ->leftjoin('category','category.id','=','light_sound_b.category_id')
            ->get();

        return view('user.ticket_view',compact('ticket_det','adult','child','camera','vhs','bus_parking','car_parking','two_three_parking','cycle_parking','light_sound_a','light_sound_b'));
    }

    public function ticketRePrint($ticket,$page)
    {
        DB::table('ticket')
            ->where('id',$ticket)
            ->update([
                'reprint' => DB::raw("`reprint`+".(1)),
                'updated_at' => Carbon::now()->setTimezone('Asia/Kolkata')->toDateTimeString(),
            ]);
        return redirect()->route('user.ticket_print',['ticket_id'=>$ticket,'page'=>$page]);
    }
}
