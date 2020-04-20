@extends('admin.template.admin_master')

@section('content')

<div class="row">
  <div class="container">
      <center>    
          <div id="loginbox" style="margin-top:20px;" class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">                   
          <div class="panel panel-info" >
              <div class="panel-heading" style="background-color: #9c9e9d;">
                  <center><div class="panel-title" style="font-size: 20px;">Add New User</div></center>
              </div>     

                  <div style="padding-top:30px" class="panel-body" >
                    @if (Session::has('message'))
                        <div class="alert alert-success">{{ Session::get('message') }}</div>
                    @endif @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    {{ Form::open(array('route' => 'admin.add_user', 'method' => 'post')) }}
                          <div class="form-group">
                              <div class="form-row">
                                    <label for="Name" class="col-sm-3 control-label" style="color:black;">Name :</label>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                        @error('name')
                                            <span  role="alert">
                                                <strong style="color:red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                              </div>
                          </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <label for="Name" class="col-sm-3 control-label" style="color:black;">User Name :</label>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="User Name " name="username">
                                        @error('username')
                                            <span  role="alert">
                                                <strong style="color:red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <label for="Name" class="col-sm-3 control-label" style="color:black;">Password :</label>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Password " name="password">
                                        @error('password')
                                            <span  role="alert">
                                                <strong style="color:red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <label for="Name" class="col-sm-3 control-label" style="color:black;">Phone Number :</label>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Phone Number " name="mobile">
                                        @error('mobile')
                                            <span  role="alert">
                                                <strong style="color:red">{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-row">
                                    <label for="Name" class="col-sm-3 control-label" style="color:black;">Gender :</label>
                                    <div >
                                        Male  <input type="radio" value="M" name="gender" checked>
                                        FeMale  <input type="radio" value="F" name="gender">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col">
                                        <!--  <input type="text" class="form-control" placeholder="Password " id="password"> -->
                                        <button  class="btn btn-success" style="width: 122px;" id="add_new_user">Add User </button>
                                    </div>
                                </div>
                            </div>
                        {{Form::close()}}                    
                </div>
            </div>
        </div>
      </center>
  </div>
</div>

<div class="span7">   
  <div class="widget stacked widget-table action-table">
      <div class="widget-header">
          <div  style="background-color: #9c9e9d;">
              <center><div class="panel-title" style="font-size: 20px; color: #fff;"> User List</div></center>
          </div>
      </div> 
      <div class="widget-content">
          <table class="table table-striped table-bordered">
              <thead>
                  <tr class=" text-center">
                      <th >Sl</th>
                      <th >Name</th>
                      <th >User Name</th>
                      <th >Phone Number</th>
                      <th >Gender</th>
                      <th >Password</th>
                      <th class="td-actions ">Action</th>
                  </tr>
              </thead>
              <tbody class=" text-center" id="user_list">
                  @if (isset($users) && !empty($users) && count($users) > 0)
                  @php
                      $count = 1;
                  @endphp
                    @foreach ($users as $item)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->username}}</td>
                            <td>{{$item->mobile}}</td>
                            <td>
                                @if ($item->gender == 'M')
                                    Male
                                @else
                                    Female
                                @endif
                            </td>
                            <td>{{$item->pass_info}}</td>                            
                            <td>
                                @if ($item->status == '1')
                            <a href="{{route('admin.update_status',['user_id'=>$item->id,'status'=>2])}}" class="btn btn-danger">Disable</a>
                                @else
                                    <a href="{{route('admin.update_status',['user_id'=>$item->id,'status'=>1])}}" class="btn btn-info">Enable</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                  @else
                  <tr>
                      <td colspan="6">No Users Found</td>
                  </tr>
                  @endif
              </tbody>
          </table>
      </div>
  </div>
</div>

 @endsection

 @section('script')

 @endsection