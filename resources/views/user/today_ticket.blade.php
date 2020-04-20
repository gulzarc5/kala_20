@extends('user.template.user_master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Day Report </h5>
                <h5 style="float: right;">Total Reprint Ticket = 
                    @if (isset($reprint_count))
                        {{$reprint_count}}
                    @endif
                </h5>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Ticket_id</th>
                            <th>Total Amount</th>
                            <th>Reprint</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($ticket_det) && !empty($ticket_det) && (count($ticket_det) > 0))
                            @php
                                $count = 1;
                            @endphp
                            @foreach ($ticket_det as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->total}}</td>
                                    <td>{{$item->reprint}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <a href="{{route('user.ticket_view',['ticket_id'=>$item->id])}}" class="btn btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">No Tickets Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection