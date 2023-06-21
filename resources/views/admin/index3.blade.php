@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')



    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}" />
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dashboard2.css') }}" />
    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}"
        rel="stylesheet" />
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />

    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />


    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />

    <style>
        .card_material {
            font-size: 45px;
        }

        .numbered {
            padding: 10px;
        }

        a {
            text-decoration: none;
            display: inline-block;
            padding: 8px 16px;
        }

       

        #previous {
            background-color: #f1f1f1;
            color: black;
        }

        #next {
            background-color: #2b3bc9;
            color: white;
        }
  /*@media only screen and (max-width: 600px) {*/
  /*    body{*/
  /*        background-color:red;*/
  /*    }*/
  /*}*/
  body::-webkit-scrollbar {
  display: none;
}
body::-webkit-scrollbar {
    -ms-overflow-style: none;
  scrollbar-width: none; 
}

    </style>
@stop

{{-- Page content --}}
@section('content2')

    <section class="content-header">
        <h1>Welcome to Dashboard <span class="hidden-xs header_info">({{ Auth::user()->roles->pluck('name')[0] }})</span>
        </h1>

        <ol class="breadcrumb">
            <li class="active">
                <a href="#">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-2 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="goldbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Countries</span>
                                    <div class="number" id="myTargetElement3" style="color:white">
                                        0{{ $countries->count() }}
                                    </div>
                                </div>
                                <i class="material-icons pull-right square_material">archive</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>Organizations</span>
                                    <div class="number" id="myTargetElement1" style="color:white;">
                                        {{ $organizations->count() }}</div>
                                </div>
                                <i class="material-icons pull-right square_material">visibility</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="redbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Clubs</span>
                                    <div class="number" id="myTargetElement2" style="color:white">
                                        {{ $clubs->count() }}</div>
                                </div>
                                <i class="material-icons pull-right square_material">account_balance_wallet</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Users</span>
                                    <div class="number" id="myTargetElement4" style="color:white">
                                        {{ $users->count() }}</div>
                                </div>
                                <i class="material-icons pull-right square_material">group</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius" style="background-color:blueviolet">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Club Requests</span>
                                    <div class="number" id="myTargetElement4" style="color:white">
                                        <a href="/all-clubs" style="color:white">{{ $clubRequests->count() }}</a>
                                    </div>
                                </div>
                                <i class="material-icons pull-right square_material">group</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius" style="background-color:darkcyan">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>Day Visitors</span>
                                    <div class="number" id="myTargetElement4" style="color:white">
                                        {{ $todayActiveUsers->count() }}</div>
                                </div>
                                <i class="material-icons pull-right square_material">group</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                      Upcoming Leagues
                    </h4>
                </div>
                <div class="panel-body" style="height:400px">
                    <table class="table table-hover" id="UpcomingEvents">
                        <thead>
                            <tr>
                                <th style="text-align: left">Organization</th>
                                <th style="text-align: left">League </th>
                                <th style="text-align: left">Event Reg Start Date</th>
                                <th style="text-align: left">Event Reg Closing Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($organizations as $organization)
                            @php ($first = true) @endphp
                            @foreach($organization->leagues as $league)
                             @if($league->to_date > Carbon\Carbon::now() && $league->from_date > Carbon\Carbon::now()) 
                             <?php 
                             $future=$organization->leagues()->where('from_date','>',Carbon\Carbon::now())->where('to_date','>',Carbon\Carbon::now())->get();
                             ?>
                            <tr>
                                @if($first == true)
                                <td rowspan="{{$future->count()}}"> {{$organization->name}} </td>
                                @php ($first = false) @endphp
                                @endif
                                <td> {{ $league->name}} </td>
                                <td>{{ $league->to_date }}</td>
                                <td>{{ $league->reg_end_date }}</td>

                            </tr>
                            @endif
                            @endforeach
                            @endforeach
                        </tbody>
                  
                      </table>
                     
                <div class="row">
                    <div class="col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" style="float:right;" id="inline_edit_paginate">
                                                   
                        </div></div></div>
                </div>
            </div>

           
        </div>
        <!-- To do list -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary todolist">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                        User Roles
                    </h4>
                </div>
                <div class="panel-body" style="padding:0px;margin:0px;">
                    <div id="piechart" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>


    <!--/row-->
   
  <!--org,club members -->
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="panel panel-primary todolist">
            <div class="panel-heading border-light">
                <h4 class="panel-title">
                    <i class="material-icons text-info">trending_up</i>
                    Organization Members
                </h4>
            </div>
            <div class="panel-body">
                <div id="chart-full-content"></div>

            </div>
        </div>
    </div>
 
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="panel panel-primary todolist">
            <div class="panel-heading border-light">
                <h4 class="panel-title">
                    <i class="material-icons text-info">trending_up</i>
                    Club Members
                </h4>
            </div>
            <div class="panel-body">
                <div id="club-chart" ></div>

            </div>
        </div>
    </div>
 

</div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary todolist">
                <div class="panel-heading border-light">
                    <h3 class="panel-title">
                        <i class="material-icons text-danger">turned_in</i>
                        Country based Organizations
                    </h3>
                </div>
                <div class="panel-body">
                    <div id="clubChart"  style="width: 100%; height: 400px;"></div>

                </div>
            </div>
        </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                        Active Users
                    </h4>
                </div>
                <div class="panel-body" style="height:430px">
                    <table class="table table-hover" id="UpcomingEvents">
                        <thead>
                            <tr>
                               <th style="text-align: left">Name</th>
                                <th style="text-align: left">Country</th>
                                <th>Organization</th>
                            </tr>
                        </thead>

                        <tbody>
                           @foreach ($logs as $key => $log)
                                <?php
                                $user = App\User::find($log->user_id);
                                ?>
                            <tr>
                                <td >{{ $user->first_name }} {{ $user->last_name }}</td>
                                        <td >{{ $user->country ? $user->country->name : '' }}</td>
                                                                                <td>{{ $user->organization ? $user->organization->name : '' }}</td>


                            </tr>
                          @endforeach
                        </tbody>
                  
                      </table>
                     
                
                </div>
            </div>

           
        </div>
       

      

    </div>
  

   
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- <script src="https://www.pakainfo.com/jquery/js/jquery-1.12.4.js"></script> --}}
    <script src="https://www.pakainfo.com/jquery/js/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}">
    </script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}">
    </script>
    <script>
        var lengthy=$("#UpcomingEvents tbody tr").length;
        if(lengthy>7){
        $('#inline_edit_paginate').append(
         `<span class="pull-right numbered">
                                <a href="#" class="paginate" id="previous">Previous</a> |
                                <a href="#" class="paginate" id="next">Next</a>
                            </span>`  
        )  
                        }
        //upcoming events
        var firstRecord = 0;
        var pageSize = 7;
        var tableRows = $("#UpcomingEvents tbody tr");

        $("a.paginate").click(function(e) {
            e.preventDefault();
            var tmpRec = firstRecord;
            if ($(this).attr("id") == "next") {
                tmpRec += pageSize;
            } else {
                tmpRec -= pageSize;
            }
            if (tmpRec < 0 || tmpRec > tableRows.length)
                return
            firstRecord = tmpRec;
            paginate(firstRecord, pageSize);
        });

        var paginate = function(start, size) {
            var end = start + size;
            tableRows.hide();
            tableRows.slice(start, end).show();
        }


        paginate(firstRecord, pageSize);
        var organizationNames = <?php echo json_encode($dataPoints); ?>;
        var clubs = [];
        for (var i = 0; i < organizationNames.length; i++) {
            clubs.push(organizationNames[i])
        }
        var males = <?php echo json_encode($maleCounts); ?>;
        var maleCounts = [];
        for (var i = 0; i < males.length; i++) {
            maleCounts.push(males[i])
        }
        var maleTotalCounts = maleCounts.map(i => Number(i))
        var females = <?php echo json_encode($femaleCounts); ?>;
        var femaleCounts = [];
        for (var i = 0; i < females.length; i++) {
            femaleCounts.push(females[i])
        }
        var femaleTotalCounts = femaleCounts.map(i => Number(i))
        $('#chart-full-content').highcharts({

            chart: {
                type: 'column'
            },

            title: {
                text: 'Total fruit consumption, grouped by gender'
            },




            xAxis: {
                categories: clubs
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Users'
                }
            },

            tooltip: {
                formatter: function() {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            },

            plotOptions: {
                column: {
                    stacking: 'normal'
                }
            },

            series: [{
                name: 'Male',
                data: maleTotalCounts,
                stack: 'male'
            }, {
                name: 'Female',
                data: femaleTotalCounts,
                stack: 'male'
            }]
        });

        ///club members
        $(function() {
            var graphtype = {
                type: 'column'
            }
            var graphTitle = {
                text: 'Total fruit consumtion, grouped by gender'
            }

            var orgs = <?php echo json_encode($categories); ?>;
            var orgNames = [];
            for (var i = 0; i < orgs.length; i++) {
                orgNames.push(orgs[i])
            }

            var graphxaxis = {
                categories: orgNames
            }
            var graphyaxis = {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Users'
                }
            }
            var graphtooltip = {
                formatter: function() {
                    return '<b>' + this.x + '</b><br/>' +
                        this.series.name + ': ' + this.y + '<br/>' +
                        'Total: ' + this.point.stackTotal;
                }
            }
            var graphplotoptions = {
                column: {
                    stacking: 'normal'
                }
            }
            var clubMale = <?php echo json_encode($clubMaleCounts); ?>;
            var clubMaleCounts = [];
            for (var i = 0; i < clubMale.length; i++) {
                clubMaleCounts.push(clubMale[i])
            }
            var clubMaleTotalCounts = clubMaleCounts.map(i => Number(i))

            var clubFemale = <?php echo json_encode($clubFemaleCounts); ?>;
            var clubFemaleCounts = [];
            for (var i = 0; i < clubFemale.length; i++) {
                clubFemaleCounts.push(clubFemale[i])
            }
            var clubFemaleTotalCounts = clubFemaleCounts.map(i => Number(i))


            var graphseries = [{
                name: 'Male',
                data: clubMaleTotalCounts,
                stack: 'male'
            }, {
                name: 'Female',
                data: clubFemaleTotalCounts,
                stack: 'male'
            }, ]
            $('#club-chart').highcharts({
                chart: graphtype,
                title: graphTitle,
                xAxis: graphxaxis,
                yAxis: graphyaxis,
                tooltip: graphtooltip,
                plotOptions: graphplotoptions,
                series: graphseries
            });
        });
        // // //end
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Role', 'Registered User Count'],

                @php
                foreach ($roles as $d) {
                    echo "['" . $d->name . "', " . $d->count_row . '],';
                }
                @endphp
            ]);

            var options = {
                // title: 'User Roles',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));

            chart.draw(data, options);
        }

        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart2);

        function drawChart2() {

            var data = google.visualization.arrayToDataTable([
                ['Organization Name', 'Registered User Count'],

                @php
                foreach ($countryOrgCounts as $d) {
                    $org = DB::table('countries')
                        ->where('id', $d->country_id)
                        ->first();
                    echo "['" . $org->name . "', " . $d->count_row . '],';
                }
                @endphp
            ]);

            var options = {
                // title: 'Country Based Organizations',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('clubChart'));

            chart.draw(data, options);
        }
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <!--for calendar-->
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="{{ asset('assets/vendors/countUp.js/js/countUp.js') }}"></script>
    {{-- <script src="http://demo.lorvent.com/rare/default/vendors/raphael/js/raphael.min.js"></script> --}}
    <script src="{{ asset('assets/vendors/morrisjs/morris.min.js') }}"></script>


@stop
