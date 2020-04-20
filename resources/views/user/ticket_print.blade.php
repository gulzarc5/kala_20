<head>
    <link href="{{asset('kala/src/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('kala/src/css/style.css')}}" rel="stylesheet">
    <style type="text/css">
        .bor{
        background-color: #ffffff00; 
        border: 1px solid #e5e6e700;
        font-size: 14px; 
        }
        .table > tbody > tr > td{
        padding: 3px;
        }
        .watermark {
            width: 100%;
            height: auto;
            display: block;
            position:fixed ;
        }
        .watermark::after {
            content: "";
            background:url("{{url('kala/img/KALA.jpg')}}");
            background-repeat: no-repeat;
            background-position: center; /* Center the image */
            background-size: cover;
            opacity: 0.2;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            position: absolute;
            z-index: -1;   
        }
        @media print
        {
            * {-webkit-print-color-adjust:exact;}
        }   
    </style>
    <script>
        function convertNumberToWords(amount) {
            var words = new Array();
            words[0] = '';
            words[1] = 'One';
            words[2] = 'Two';
            words[3] = 'Three';
            words[4] = 'Four';
            words[5] = 'Five';
            words[6] = 'Six';
            words[7] = 'Seven';
            words[8] = 'Eight';
            words[9] = 'Nine';
            words[10] = 'Ten';
            words[11] = 'Eleven';
            words[12] = 'Twelve';
            words[13] = 'Thirteen';
            words[14] = 'Fourteen';
            words[15] = 'Fifteen';
            words[16] = 'Sixteen';
            words[17] = 'Seventeen';
            words[18] = 'Eighteen';
            words[19] = 'Nineteen';
            words[20] = 'Twenty';
            words[30] = 'Thirty';
            words[40] = 'Forty';
            words[50] = 'Fifty';
            words[60] = 'Sixty';
            words[70] = 'Seventy';
            words[80] = 'Eighty';
            words[90] = 'Ninety';
            amount = amount.toString();
            var atemp = amount.split(".");
            var number = atemp[0].split(",").join("");
            var n_length = number.length;
            var words_string = "";
            if (n_length <= 9) {
                var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
                var received_n_array = new Array();
                for (var i = 0; i < n_length; i++) {
                    received_n_array[i] = number.substr(i, 1);
                }
                for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
                    n_array[i] = received_n_array[j];
                }
                for (var i = 0, j = 1; i < 9; i++, j++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        if (n_array[i] == 1) {
                            n_array[j] = 10 + parseInt(n_array[j]);
                            n_array[i] = 0;
                        }
                    }
                }
                value = "";
                for (var i = 0; i < 9; i++) {
                    if (i == 0 || i == 2 || i == 4 || i == 7) {
                        value = n_array[i] * 10;
                    } else {
                        value = n_array[i];
                    }
                    if (value != 0) {
                        words_string += words[value] + " ";
                    }
                    if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Crores ";
                    }
                    if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Lakhs ";
                    }
                    if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                        words_string += "Thousand ";
                    }
                    if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                        words_string += "Hundred and ";
                    } else if (i == 6 && value != 0) {
                        words_string += "Hundred ";
                    }
                }
                words_string = words_string.split("  ").join(" ");
            }     
            return words_string;   
        }
    </script>
</head>

<body style="background-color:#fff; padding-top: 30px;" class="watermark">
    <div class="container-fluid" style="color: #000; ">
        <div class="col-md-12" style="display: flex; height: 620px">
            <div class="col-md-6" style="border: 3px dotted #000; ">
                <div class="col-md-12" style="display: flex; margin-top: 10px;" >
                    <div class="col-md-7">
                        <span><b style="font-size: 14px;" >No : GUW-SSK- 
                            @if (isset($ticket_det) && !empty($ticket_det))
                                {{$ticket_det->id}}
                            @endif
                        </b></span>
                    </div>
                    <div class="col-md-5"  style="float: right; font-size: 14px;">
                        <span><b style="color: #fff; background-color: gray;">VISITOR TICKET</b></span>
                    </div>
                </div>
                <center>
                    <div class="col-md-12">
                        <img src="{{asset('kala/img/logo.png')}}" style="width: 210px;height: 85px;">
                        <p style="margin-top: -20px;">
                            <h3><b style="font-size: 16px;">SRIMANTA SANKARDEVA KALAKHETRA</b></h3>
                            <h4 style=" margin-top: -12px;"><b style="font-size: 13px;">SRIMANTA SANKARDEVA KALAKHETRA PATH</b></h4>
                            <h4 style=" margin-top: -11px;"><b style="font-size: 13px;">PANJABARI, GUWAHATI - 781 037</b></h4>
                        </p>
                        <p>
                            <h3><b style="font-size: 15px;">Date : 
                            @php
                                echo date('Y-m-d');
                            @endphp, Time : 
                            @php
                                echo date("g:i:s A");
                            @endphp</b></h3>
                        </p>
                    </div>
                </center>

                <div class="col-md-12" style="margin-top: -16px;">
                    <div class="form-group">
                        <div class="form-row">
                            <label for="Name" class="col-sm-8 col-md-8" style="margin-top: 8px; font-size: 14px;">Name :  
                                @if (isset($ticket_det) && !empty($ticket_det))
                                    {{$ticket_det->name}}
                                @endif
                            </label>
                            <div class="col" >
                                <input type="disabled" class="form-control bor" value="" >
                            </div>
                        </div>
                    </div>

                    <div class=" stacked widget-table action-table" style="margin-top: -16px;">
                        <div>
                            <table class="table table-striped table-bordered ibox-content">
                                <thead>
                                    <tr class=" text-center">
                                        <th >Sl.</th>
                                        <th >Ticket Type</th>
                                        <th >QTY</th>
                                        <th >Rate</th>
                                        <th >AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
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
                        </div>
                    </div>
                </div>

                <center>
                    <div class="col-md-12" style="margin-top: 1px;">
                        <h4>                            
                            @if (isset($ticket_det) && !empty($ticket_det))
                                <b style="font-size: 16px; color: gray;" >(Rupees 
                                    <b> 
                                    <script>
                                        document.write(convertNumberToWords("{{$ticket_det->total}}"));
                                    </script>
                                    </b> Only )                             
                                </b>
                            @endif
                                
                        </h4>
                    </div>
                </center>

                <div class="col-md-12" style="margin-top: 50px; margin-left:215px;">
                    <b style="margin-left:90px;">Secretary</b><br><b>Srimanta Sankardeva Kalakshetra</b>
                </div>
            </div>
            
            <div class="col-md-6" style="border: 3px dotted #000; ">
                <center>
                    <div class="col-md-12">
                        <p style="margin-top: 100px;">
                            <h3><b class="c">WELCOME TO</b></h3>
                        </p>                            
                        <p style="margin-top: 50px;">
                            <h3><b style="font-size: 20px;">SRIMANTA SANKARDEVA KALAKHETRA </b></h3>
                        </p>
                        <p style="margin-top: 40px;">
                            <h4><b style="font-size: 15px;">SRIMANTA SANKARDEVA KALAKHETRA PATH</b></h4>
                            <h4><b style="font-size: 15px;">PANJABARI, GUWAHATI - 781 037</b></h4>
                        </p>            
                        <p style="margin-top: 30px;">
                            <h3><b>For any assistance please contact at</b></h3>
                        </p>
                        <p style="margin-top: 20px;">
                            <h3><b style="font-size: 20px; border: 4px solid #000; border-radius: 10px; padding: 3px 18px 3px 18px;">0361 233 2665</b></h3>
                        </p>
                    </div>
                </center>
                
                <div class="col-md-12">
                    <p>
                        <h3>Note :</h3>
                        <ul>
                            <li>Smoking, batel-nut, alcoholic drinks are strictly prohibited inside the SSK campus. Visitors are requested not carry these things inside.</li>
                            <li>Please retain the ticket with you till leave you the Kalakshetra Campus.</li>
                            <li>Photography & Videography inside the Museum are strictly prohibited.</li>
                            <li>Ticket once sold won't be return back</li>
                        </ul>
                    </p>
                </div>                    
            </div>
        </div>
        <center>
            <h4 >For any Software Assistance visit www.webinfotech.net.in</h4>
        </center>
    </div> 
</body>
@if (isset($page) && !empty($page) && ($page == '1'))
    <script type="text/javascript">
        window.print();
        window.onafterprint = function(event) {
        window.location.href="{{route('user.today_ticket_list')}}";
        };
    </script>
@else
    <script type="text/javascript">
        window.print();
        window.onafterprint = function(event) {
        window.location.href="{{route('user.deshboard')}}";
        };
    </script>
@endif

  
