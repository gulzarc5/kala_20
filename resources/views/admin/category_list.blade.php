@extends('admin.template.admin_master')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="ibox ">  
            <div class="ibox-title">
                <h5>Package View and Update</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Name</th>
                            <th>Indian Price</th>
                            <th>Foreigner Price</th>
                        </tr>
                    </thead>
                    <tbody id="package_update">
                        @if (isset($category) && !empty($category))
                        @php
                            $count = 1;
                        @endphp
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{$count++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price_indian}}</td>
                                    <td>{{$item->price_foreigner}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 @endsection

 @section('script')

 @endsection