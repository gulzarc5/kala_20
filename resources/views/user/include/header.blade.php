
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KALASHETRA | Dashboard</title>
    <link href="{{asset('kala/src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/css/style.css')}}" rel="stylesheet"> 
</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element" align="middle">
                        <img style="width: 50px;" alt="image" class="rounded-circle" src="{{asset('kala/src/img/kala.jpg')}}"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">Kalashetra</span>
                            <span class="text-muted text-xs block">Employee Panel </span>
                        </a>
                    </div>
                    <div class="logo-element">
                        K+
                    </div>
                </li>
                <li class="active">
                    <a href="{{route('user.deshboard')}}"><i class="fa fa-book"></i> <span class="nav-label">Entry Panel</span></a>
                </li>
                <li class="special_link">
                    <a href="{{route('user.today_ticket_list')}}"><i class="fa fa-list-ul"></i> <span class="nav-label">Todays Tickets</span></a>
                </li>
                <li class="special_link">
                    <a href="{{route('user.day_report_view')}}"><i class="fa fa-table"></i> <span class="nav-label">Day Report</span></a>
                </li>
                <li class="special_link">
                    <a href="{{route('user.total_day_report_view')}}"><i class="fa fa-table"></i> <span class="nav-label">Total Day Report</span></a>
                </li>
                <li class="special_link">
                  <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log Out</a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="wrapper wrapper-content">
        @auth            
            <div align="Center" style="font-size: 15px; font-weight: bold; padding-bottom: 5px;" id="employee_info">Login As An Employee 
                @if (Auth::guard('user')->user()->gender == 'M')
                    Mr. {{Auth::guard('user')->user()->name}}
                @else
                    Mrs. {{Auth::guard('user')->user()->name}}
                @endif
            </div>
        @endauth