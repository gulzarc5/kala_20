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
                            <span class="text-muted text-xs block">Admin Panel </span>
                        </a>
                    </div>
                    <div class="logo-element">
                        K+
                    </div>
                </li>
                <li class="active">
                    <a href="{{route('admin.deshboard')}}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                
                <li class="special_link">
                    <a href="{{route('admin.category_list')}}"><i class="fa fa-database"></i> <span class="nav-label">Package</span></a>
                </li>

                {{-- <li class="special_link">
                    <a href="report.php"><i class="fa fa-database"></i> <span class="nav-label">Report</span></a>
                </li>

                <li class="special_link">
                    <a href="report_employee_wise.php"><i class="fa fa-database"></i> <span class="nav-label">Report Employee Wise</span></a>
                </li>

                <li class="special_link">
                    <a href="reprint_list.php"><i class="fa fa-database"></i> <span class="nav-label">Reprint Ticket List</span></a>
                </li>

                <li class="special_link">
                    <a href="admin_ticket_list.php"><i class="fa fa-database"></i> <span class="nav-label">Ticket List</span></a>
                </li> --}}
                
                <li class="special_link">
                    <a href="" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Log Out</a>
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
      <div class="wrapper wrapper-content">
          <div style="padding: 5px;" align="middle">
          <img src="{{asset('kala/src/img/kala.jpg')}}" style="width: 25%">
      </div>