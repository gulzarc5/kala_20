@extends('user.template.user_master')
@section('style')
<style type="text/css">
    .ibox{
        margin-bottom: 0px;
    }
    .table > tbody > tr > td{
            padding: 4px;
          }
    .foc_but:hover, .foc_but:focus{
        background-color:#ffc107;
        border-color:#ffc107;
    }
</style>
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>Entry Panel</h5>
            </div>
            
            <div class="ibox-content">
                {{ Form::open(['method' => 'post','route'=>'user.temp_ticket'])}}
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Name</label>
                        <div class="col-lg-3">
                            <input  id="name" name="name" type="text" placeholder="Enter Number" class="form-control">
                        </div>
                        <label class="col-lg-1 col-form-label">Nationality</label>
                        <div class="col-lg-3">
                            <select class="form-control" id="nationality" name="nationality">
                                <option selected value="1">Indian</option>
                                <option value="2">Foreigner</option>
                            </select>
                            @if($errors->has('nationality'))
                                <span role="alert" style="color:red">
                                    <strong>{{ $errors->first('nationality') }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Ticket Type</label>
                        <div class="col-lg-3">
                            <select class="form-control"  id="categories" name="cat_id" autofocus>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                            
                            @if($errors->has('cat_id'))
                                <span role="alert" style="color:red">
                                    <strong>{{ $errors->first('cat_id') }}</strong>
                                </span>
                            @enderror
                        </div>
                                    
                        <label class="col-lg-1 col-form-label">Quantity</label>
                        <div class="col-lg-2">
                            <input value="1" id="quantity" name="quantity" type="number" placeholder="Enter Number" class="form-control" min="1">
                            @if($errors->has('quantity'))
                                <span role="alert" style="color:red">
                                    <strong>{{ $errors->first('quantity') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <label class="col-lg-1 col-form-label">Price</label>
                        <div class="col-lg-2" id="cat_price_show">
                            
                            <input disabled type="text" placeholder="₹ " value="30.00" class="form-control">
                        </div>
                        <div class="col-lg-1">
                           <input type="submit" value="Add" name="Add" class="btn btn-success foc_but">
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    
    <div class="col-lg-12">
        <div class="ibox ">
            
            <div class="ibox-title">
                <h5>Ticket </h5>
            </div>
            <div class="ibox-content" >
                @if (Session::has('message'))
                    <div class="alert alert-success" >{{ Session::get('message') }}</div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-danger" >{{ Session::get('error') }}</div>
                @endif
                <table class="table table-hover" id="ticket_list_table">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($temp_data) && !empty($temp_data) && count($temp_data))
                            @php
                                $count = 1;
                                $total = 0;
                            @endphp
                            @foreach ($temp_data as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$item->cat_name}}
                                        @if ($item->nationality == '2')
                                            ( Foreigner ) 
                                        @endif
                                    </td>
                                    <td>{{$item->quantity}}</td>
                                    <td>{{$item->rate}}</td>
                                    <td>{{$item->quantity * $item->rate }}</td>
                                    <td><a href="{{route('user.temp_ticket_remove',['id'=>$item->id])}}" class="btn btn-danger">Remove</a></td>
                                </tr>
                                @php
                                    $total+=($item->quantity * $item->rate);
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="4" align="right" style="font-weight: bold;padding-right: 20px;">Total : </td>
                                <td colspan="2" style="font-weight: bold;">{{$total}}</td>
                            </tr>
                        @else
                            <td colspan="6" align="center">No Data Found</td>
                        @endif
                       
                    </tbody>
                </table>
                        
             
				<div align="middle">
                    @if (isset($temp_data) && !empty($temp_data) && count($temp_data))
                        <a href="{{route('user.ticket_book')}}" class="btn btn-success">Print</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

 @endsection

 @section('script')
<script src="{{asset('kala/ticket_add.js')}}"></script>
<script>
    function price_fetch(nationality,category,quantity){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$.ajax({
		type:"POST",
		url:"{{ route('user.ticket_price_fetch')}}",
		data:{ _token:'{{ csrf_token() }}', cat_id : category, nationality: nationality, quantity: quantity},
		success:function(data){
			if (data != "2") {
				$("#cat_price_show").html('<input disabled type="text" placeholder="₹ '+data+'.00" class="form-control">');
			}
		}
	});
}
</script>
 @endsection