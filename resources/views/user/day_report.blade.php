@extends('user.template.user_master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title" style="color: white">
                <h5 style="float: left;">Day Report </h5>
                <h5 style="float: right;">Total Reprint Ticket = 
                    @if (isset($reprint_count))
                        {{$reprint_count}}
                    @endif
                </h5>
            </div>
            <div class="ibox-content">
                <table class="table table-hover" id="report_table">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Category</th>
                            <th>From Ticket No.</th>
                            <th>To Ticket No.</th>
                            <th>Quantity Indian</th>
                            <th>Quantity Foreigner</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sl_count = 1;
                            $total_indian = 0;
                            $total_foreigner = 0;
                            $total_amount = 0;
                        @endphp
                        @if (isset($adult) && !empty($adult))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Adult</td>
                                <td>
                                    @if (isset($adult['from_ticket_adult']->total_count) && isset($adult['from_ticket_adult']->quantity) && !empty($adult['from_ticket_adult']->total_count) && !empty($adult['from_ticket_adult']->quantity))
                                        {{($adult['from_ticket_adult']->total_count - $adult['from_ticket_adult']->quantity) +1}}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($adult['to_ticket_adult']->total_count) && !empty($adult['to_ticket_adult']->total_count) )
                                        {{$adult['to_ticket_adult']->total_count}}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($adult['qtty_indian_adult']) && !empty($adult['qtty_indian_adult']) )
                                        {{$adult['qtty_indian_adult']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($adult['qtty_foreigner_adult']) && !empty($adult['qtty_foreigner_adult']) )
                                        {{$adult['qtty_foreigner_adult']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($adult['amount_adult']) && !empty($adult['amount_adult']) )
                                    {{ number_format($adult['amount_adult'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $adult['qtty_indian_adult'];
                                $total_foreigner += $adult['qtty_foreigner_adult'];
                                $total_amount += $adult['amount_adult'];
                            @endphp
                        @endif

                        @if (isset($child) && !empty($child))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Children</td>
                                <td>
                                    @if (isset($child['from_ticket_child']->total_count) && isset($child['from_ticket_child']->quantity) && !empty($child['from_ticket_child']->total_count) && !empty($child['from_ticket_child']->quantity))
                                        {{($child['from_ticket_child']->total_count - $child['from_ticket_child']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($child['to_ticket_child']->total_count) && !empty($child['to_ticket_child']->total_count) )
                                        {{$child['to_ticket_child']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($child['qtty_indian_child']) && !empty($child['qtty_indian_child']) )
                                        {{$child['qtty_indian_child']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($child['qtty_foreigner_child']) && !empty($child['qtty_foreigner_child']) )
                                        {{$child['qtty_foreigner_child']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($child['amount_child']) && !empty($child['amount_child']) )
                                        {{number_format($child['amount_child'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $child['qtty_indian_child'];
                                $total_foreigner += $child['qtty_foreigner_child'];
                                $total_amount += $child['amount_child'];
                            @endphp
                        @endif
                        
                        @if (isset($camera) && !empty($camera))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Camera</td>
                                <td>
                                    @if (isset($camera['from_ticket_camera']->total_count) && isset($camera['from_ticket_camera']->quantity) && !empty($camera['from_ticket_camera']->total_count) && !empty($camera['from_ticket_camera']->quantity))
                                        {{($camera['from_ticket_camera']->total_count - $camera['from_ticket_camera']->quantity) +1}}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($camera['to_ticket_camera']->total_count) && !empty($camera['to_ticket_camera']->total_count) )
                                        {{$camera['to_ticket_camera']->total_count}}
                                    @else
                                        --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($camera['qtty_indian_camera']) && !empty($camera['qtty_indian_camera']) )
                                        {{$camera['qtty_indian_camera']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($camera['qtty_foreigner_camera']) && !empty($camera['qtty_foreigner_camera']) )
                                        {{$camera['qtty_foreigner_camera']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($camera['amount_camera']) && !empty($camera['amount_camera']) )
                                        {{number_format($camera['amount_camera'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            
                            @php
                                $total_indian += $camera['qtty_indian_camera'];
                                $total_foreigner += $camera['qtty_foreigner_camera'];
                                $total_amount += $camera['amount_camera'];
                            @endphp
                        @endif  

                        @if (isset($vhs) && !empty($vhs))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>VHS</td>
                                <td>
                                    @if (isset($vhs['from_ticket_vhs']->total_count) && isset($vhs['from_ticket_vhs']->quantity) && !empty($vhs['from_ticket_vhs']->total_count) && !empty($vhs['from_ticket_vhs']->quantity))
                                        {{($vhs['from_ticket_vhs']->total_count - $vhs['from_ticket_vhs']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($vhs['to_ticket_vhs']->total_count) && !empty($vhs['to_ticket_vhs']->total_count) )
                                        {{$vhs['to_ticket_vhs']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($vhs['qtty_indian_vhs']) && !empty($vhs['qtty_indian_vhs']) )
                                        {{$vhs['qtty_indian_vhs']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($vhs['qtty_foreigner_vhs']) && !empty($vhs['qtty_foreigner_vhs']) )
                                        {{$vhs['qtty_foreigner_vhs']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($vhs['amount_vhs']) && !empty($vhs['amount_vhs']) )
                                        {{number_format($vhs['amount_vhs'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $vhs['qtty_indian_vhs'];
                                $total_foreigner += $vhs['qtty_foreigner_vhs'];
                                $total_amount += $vhs['amount_vhs'];
                            @endphp
                        @endif

                        
                        @if (isset($bus_parking) && !empty($bus_parking))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Bus Parking</td>
                                <td>
                                    @if (isset($bus_parking['from_ticket_bus_parking']->total_count) && isset($bus_parking['from_ticket_bus_parking']->quantity) && !empty($bus_parking['from_ticket_bus_parking']->total_count) && !empty($bus_parking['from_ticket_bus_parking']->quantity))
                                        {{($bus_parking['from_ticket_bus_parking']->total_count - $bus_parking['from_ticket_bus_parking']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($bus_parking['to_ticket_bus_parking']->total_count) && !empty($bus_parking['to_ticket_bus_parking']->total_count) )
                                        {{$bus_parking['to_ticket_bus_parking']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($bus_parking['qtty_indian_bus_parking']) && !empty($bus_parking['qtty_indian_bus_parking']) )
                                        {{$bus_parking['qtty_indian_bus_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($bus_parking['qtty_foreigner_bus_parking']) && !empty($bus_parking['qtty_foreigner_bus_parking']) )
                                        {{$bus_parking['qtty_foreigner_bus_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($bus_parking['amount_bus_parking']) && !empty($bus_parking['amount_bus_parking']) )
                                        {{number_format($bus_parking['amount_bus_parking'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $bus_parking['qtty_indian_bus_parking'];
                                $total_foreigner += $bus_parking['qtty_foreigner_bus_parking'];
                                $total_amount += $bus_parking['amount_bus_parking'];
                            @endphp
                        @endif

                           
                        @if (isset($car_parking) && !empty($car_parking))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Car Parking</td>
                                <td>
                                    @if (isset($car_parking['from_ticket_car_parking']->total_count) && isset($car_parking['from_ticket_car_parking']->quantity) && !empty($car_parking['from_ticket_car_parking']->total_count) && !empty($car_parking['from_ticket_car_parking']->quantity))
                                        {{($car_parking['from_ticket_car_parking']->total_count - $car_parking['from_ticket_car_parking']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($car_parking['to_ticket_car_parking']->total_count) && !empty($car_parking['to_ticket_car_parking']->total_count) )
                                        {{$car_parking['to_ticket_car_parking']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($car_parking['qtty_indian_car_parking']) && !empty($car_parking['qtty_indian_car_parking']) )
                                        {{$car_parking['qtty_indian_car_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($car_parking['qtty_foreigner_car_parking']) && !empty($car_parking['qtty_foreigner_car_parking']) )
                                        {{$car_parking['qtty_foreigner_car_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($car_parking['amount_car_parking']) && !empty($car_parking['amount_car_parking']) )
                                        {{number_format($car_parking['amount_car_parking'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $car_parking['qtty_indian_car_parking'];
                                $total_foreigner += $car_parking['qtty_foreigner_car_parking'];
                                $total_amount += $car_parking['amount_car_parking'];
                            @endphp
                        @endif

                               
                        @if (isset($two_three_parking) && !empty($two_three_parking))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>2/3 Wheeler Parking</td>
                                <td>
                                    @if (isset($two_three_parking['from_ticket_two_three_parking']->total_count) && isset($two_three_parking['from_ticket_two_three_parking']->quantity) && !empty($two_three_parking['from_ticket_two_three_parking']->total_count) && !empty($two_three_parking['from_ticket_two_three_parking']->quantity))
                                        {{($two_three_parking['from_ticket_two_three_parking']->total_count - $two_three_parking['from_ticket_two_three_parking']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($two_three_parking['to_ticket_two_three_parking']->total_count) && !empty($two_three_parking['to_ticket_two_three_parking']->total_count) )
                                        {{$two_three_parking['to_ticket_two_three_parking']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($two_three_parking['qtty_indian_two_three_parking']) && !empty($two_three_parking['qtty_indian_two_three_parking']) )
                                        {{$two_three_parking['qtty_indian_two_three_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($two_three_parking['qtty_foreigner_two_three_parking']) && !empty($two_three_parking['qtty_foreigner_two_three_parking']) )
                                        {{$two_three_parking['qtty_foreigner_two_three_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($two_three_parking['amount_two_three_parking']) && !empty($two_three_parking['amount_two_three_parking']) )
                                        {{number_format($two_three_parking['amount_two_three_parking'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $two_three_parking['qtty_indian_two_three_parking'];
                                $total_foreigner += $two_three_parking['qtty_foreigner_two_three_parking'];
                                $total_amount += $two_three_parking['amount_two_three_parking'];
                            @endphp
                        @endif  

                        @if (isset($cycle_parking) && !empty($cycle_parking))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Cycle Parking</td>
                                <td>
                                    @if (isset($cycle_parking['from_ticket_cycle_parking']->total_count) && isset($cycle_parking['from_ticket_cycle_parking']->quantity) && !empty($cycle_parking['from_ticket_cycle_parking']->total_count) && !empty($cycle_parking['from_ticket_cycle_parking']->quantity))
                                        {{($cycle_parking['from_ticket_cycle_parking']->total_count - $cycle_parking['from_ticket_cycle_parking']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($cycle_parking['to_ticket_cycle_parking']->total_count) && !empty($cycle_parking['to_ticket_cycle_parking']->total_count) )
                                        {{$cycle_parking['to_ticket_cycle_parking']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($cycle_parking['qtty_indian_cycle_parking']) && !empty($cycle_parking['qtty_indian_cycle_parking']) )
                                        {{$cycle_parking['qtty_indian_cycle_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($cycle_parking['qtty_foreigner_cycle_parking']) && !empty($cycle_parking['qtty_foreigner_cycle_parking']) )
                                        {{$cycle_parking['qtty_foreigner_cycle_parking']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($cycle_parking['amount_cycle_parking']) && !empty($cycle_parking['amount_cycle_parking']) )
                                        {{number_format($cycle_parking['amount_cycle_parking'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $cycle_parking['qtty_indian_cycle_parking'];
                                $total_foreigner += $cycle_parking['qtty_foreigner_cycle_parking'];
                                $total_amount += $cycle_parking['amount_cycle_parking'];
                            @endphp
                        @endif

                        @if (isset($light_sound_a) && !empty($light_sound_a))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Light & Sound (A)</td>
                                <td>
                                    @if (isset($light_sound_a['from_ticket_light_sound_a']->total_count) && isset($light_sound_a['from_ticket_light_sound_a']->quantity) && !empty($light_sound_a['from_ticket_light_sound_a']->total_count) && !empty($light_sound_a['from_ticket_light_sound_a']->quantity))
                                        {{($light_sound_a['from_ticket_light_sound_a']->total_count - $light_sound_a['from_ticket_light_sound_a']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($light_sound_a['to_ticket_light_sound_a']->total_count) && !empty($light_sound_a['to_ticket_light_sound_a']->total_count) )
                                        {{$light_sound_a['to_ticket_light_sound_a']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($light_sound_a['qtty_indian_light_sound_a']) && !empty($light_sound_a['qtty_indian_light_sound_a']) )
                                        {{$light_sound_a['qtty_indian_light_sound_a']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($light_sound_a['qtty_foreigner_light_sound_a']) && !empty($light_sound_a['qtty_foreigner_light_sound_a']) )
                                        {{$light_sound_a['qtty_foreigner_light_sound_a']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($light_sound_a['amount_light_sound_a']) && !empty($light_sound_a['amount_light_sound_a']) )
                                        {{number_format($light_sound_a['amount_light_sound_a'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $light_sound_a['qtty_indian_light_sound_a'];
                                $total_foreigner += $light_sound_a['qtty_foreigner_light_sound_a'];
                                $total_amount += $light_sound_a['amount_light_sound_a'];
                            @endphp
                        @endif

                        @if (isset($light_sound_b) && !empty($light_sound_b))
                            <tr>
                                <td>{{$sl_count++}}</td>
                                <td>Light & Sound (B)</td>
                                <td>
                                    @if (isset($light_sound_b['from_ticket_light_sound_b']->total_count) && isset($light_sound_b['from_ticket_light_sound_b']->quantity) && !empty($light_sound_b['from_ticket_light_sound_b']->total_count) && !empty($light_sound_b['from_ticket_light_sound_b']->quantity))
                                        {{($light_sound_b['from_ticket_light_sound_b']->total_count - $light_sound_b['from_ticket_light_sound_b']->quantity) +1}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($light_sound_b['to_ticket_light_sound_b']->total_count) && !empty($light_sound_b['to_ticket_light_sound_b']->total_count) )
                                        {{$light_sound_b['to_ticket_light_sound_b']->total_count}}
                                    @else
                                         --
                                    @endif
                                </td>
                                <td>
                                    @if (isset($light_sound_b['qtty_indian_light_sound_b']) && !empty($light_sound_b['qtty_indian_light_sound_b']) )
                                        {{$light_sound_b['qtty_indian_light_sound_b']}}
                                    @else
                                        0
                                    @endif
                                </td>                                
                                <td>
                                    @if (isset($light_sound_b['qtty_foreigner_light_sound_b']) && !empty($light_sound_b['qtty_foreigner_light_sound_b']) )
                                        {{$light_sound_b['qtty_foreigner_light_sound_b']}}
                                    @else
                                        0
                                    @endif
                                </td>                                                               
                                <td>
                                    @if (isset($light_sound_b['amount_light_sound_b']) && !empty($light_sound_b['amount_light_sound_b']) )
                                        {{number_format($light_sound_b['amount_light_sound_b'],2,".",'')}}
                                    @else
                                        0.00
                                    @endif
                                </td>
                            </tr>
                            @php
                                $total_indian += $light_sound_b['qtty_indian_light_sound_b'];
                                $total_foreigner += $light_sound_b['qtty_foreigner_light_sound_b'];
                                $total_amount += $light_sound_b['amount_light_sound_b'];
                            @endphp
                        @endif
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total</td>
                            <td>{{$total_indian}}</td>
                            <td>{{$total_foreigner}}</td>
                            <td>{{ number_format($total_amount,2,".",'')}}</td>
                        </tr>
                    </tbody>
                </table>
                
                <div align="middle">
                    <a href="{{route('user.day_report_print')}}" class="btn btn-success" >Print Report</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection