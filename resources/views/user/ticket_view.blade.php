@extends('user.template.user_master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Ticket Details of Ticket Id :
                    @if (isset($ticket_det) && !empty($ticket_det))
                        <b style="color:black">{{$ticket_det->id}}</b>
                    @endif
                </h5>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $count_ticket = 1;
                        @endphp
                        @if (isset($adult) && !empty($adult))
                            @foreach ($adult as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                                                                  
                        @endif

                        @if (isset($child) && !empty($child))
                            @foreach ($child as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr>   
                            @endforeach                                                                
                        @endif

                        @if (isset($camera) && !empty($camera))
                            @foreach ($camera as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                                                                  
                        @endif

                        @if (isset($vhs) && !empty($vhs))
                            @foreach ($vhs as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                                      
                        @endif

                        @if (isset($bus_parking) && !empty($bus_parking))
                            @foreach ($bus_parking as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                      
                        @endif

                        @if (isset($car_parking) && !empty($car_parking))
                            @foreach ($car_parking as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach    
                        @endif

                        @if (isset($two_three_parking) && !empty($two_three_parking))
                            @foreach ($two_three_parking as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                                    
                        @endif

                        @if (isset($cycle_parking) && !empty($cycle_parking))
                            @foreach ($cycle_parking as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                                    
                        @endif

                        @if (isset($light_sound_a) && !empty($light_sound_a))
                            @foreach ($light_sound_a as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                                    
                        @endif

                        @if (isset($light_sound_b) && !empty($light_sound_b))
                            @foreach ($light_sound_b as $item)
                                <tr>
                                    <td>{{ $count_ticket++ }}</td>
                                    @if ($item->nationality == '2')
                                        <td>{{$item->cat_name}} (Foreigner)</td>
                                    @else
                                        <td>{{$item->cat_name}} </td>
                                    @endif                                            
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$item->total_price}}</td>
                                </tr> 
                            @endforeach                                   
                        @endif
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <b style="font-size: 13px;"> Total Rs.</b>
                            </td>
                            <td> 
                                <b id="total">
                                    @if (isset($ticket_det) && !empty($ticket_det))
                                        {{$ticket_det->total}}
                                    @endif
                                </b>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div align="middle">
                    <a href="{{route('user.today_ticket_list')}}" class="btn btn-warning">Back</a>
                    @if (isset($ticket_det) && !empty($ticket_det))
                        <a href="{{route('user.ticket_re_print',['ticket_id' => $ticket_det->id,'page'=>1])}}" class="btn btn-success">Re Print</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection