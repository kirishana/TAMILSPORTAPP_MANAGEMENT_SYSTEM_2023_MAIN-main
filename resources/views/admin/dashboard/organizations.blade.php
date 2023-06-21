@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @parent
@stop
<?php 
$general = App\generalSetting::first();
$url=$general->website_url."assets/images/icons/loadingIcon.gif";
?>
<style>
.loader {
position: fixed;
top: 50%;
left:10%;
right:10%;
bottom: 0;
width: 50%;
/* background-image: url(<?php echo $url ?>); */
background-image:url("http:127.0.0.1:8000//media2.giphy.com/media/3oEjI6SIIHBdRxXI40/200.gif");
background-repeat: no-repeat;
background-size: 75px 75px;
z-index: 99999;
}
body::-webkit-scrollbar {
  display: none;
}
body::-webkit-scrollbar {
    -ms-overflow-style: none;
  scrollbar-width: none; 
}
.example::-webkit-scrollbar {
            display: none;
        }

        .example {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
 </style>
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
            padding: 5px 20px;
        }

        a:hover {
            background-color: #ddd;
            color: black;
        }

        #previous {
            background-color: #f1f1f1;
            color: black;
            position:relative;
            bottom:0px;
        }

        #next {
            background-color: #418bca;
            color: white;
            position:relative;
            bottom:0px;
        }
        .example::-webkit-scrollbar {
            display: none;
        }

        .example {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .tableFixHead thead th {
            position: sticky;
            top: 0;
            background-color: white;
        }


    </style>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>{{ __('dashboard.welcome_to_dashboard') }}                    </h4>
<span class="hidden-xs header_info">({{ Auth::user()->roles->pluck('name')[0] }})</span>
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
                                    <span>{{ __('dashboard.members') }}</span>
                                    <div class="number" id="myTargetElement3" style="color:white">
                                        {{ $orgs->count() }}
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
                                    <span>{{ __('dashboard.future_leagues') }}</span>
                                    <div class="number" id="myTargetElement1" style="color:white;">
                                        @if ($futureLeagues)
                                            {{ $futureLeagues->count() }}
                                        @endif
                                    </div>
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
                                    <span>{{ __('dashboard.past_leagues') }}</span>
                                    <div class="number" id="myTargetElement2" style="color:white">
                                        {{ $pastLeagues->count() }}
                                    </div>
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
                                    <span>{{ __('dashboard.ongng_leagues') }}</span>
                                    <div class="number" id="myTargetElement4" style="color:white">
                                        {{ $ongngLeaguesCount ? $ongngLeaguesCount->count() : 0 }}
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
                <div class="palebluecolorbg no-radius" style="background-color:blueviolet">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>{{ __('dashboard.league_active_players') }}</span>
                                    <div class="number" id="myTargetElement4" style="color:white">
                                        {{ $ongngLeagues ? $ongngLeagues->registrations->count() : 0 }}
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
                                    <span>{{ __('dashboard.ongng_games') }}</span>
                                    <?php
                                    $count = 0;
                                    ?>
                                    @if ($ongngLeagues != null)
                                        @foreach ($genders as $gender)
                                            @if ($gender->ageGroupEvent->Event->organization_id == Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                                                @if ($gender->ageGroupEvent->Event->league_id == $ongngLeagues->id)
                                                    @if ($gender->status == 0)
                                                        <?php
                                                        $count++;
                                                        ?>
                                                    @endif
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    <div class="number" id="myTargetElement4" style="color:white">
                                        {{ $count }}
                                    </div>
                                </div>
                                <i class="material-icons pull-right square_material">group</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="row ">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                     {{ __('dashboard.on_gng_status') }}
                    </h4>
                </div>
                <div class="panel-body example" style="overflow-x:scroll;height:405px">
                @include('admin.dashboard.OngoingEventsStatus')
                    @if ($ongngLeagues1 != null)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dataTables_paginate paging_simple_numbers" style="float:right;"
                                    id="inline_edit_paginate">
                                    <span class="pull-right numbered">
                                        <a href="#" class="paginate" id="previous">Previous</a> &nbsp;
                                        <a href="#" class="paginate" id="next">Next</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>


        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary todolist" style="height:440px;">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                      {{ __('dashboard.event_reg') }}
                    </h4>
                </div>
                <div class="form-group">
                    <section class="content paddingleft_right15">
                        <select id="select22" class="form-control padding-right search">
                            @foreach ($leagues as $league)
                            @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </section>
                </div>
                <div class="panel-body " style="padding:0px;margin:0px;">
                    
                    @include('admin.dashboard.leagueSearch')

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                      {{ __('dashboard.active_users') }}
                    </h4>
                </div>
                <div class="panel-body example" style="height:400px;overflow-x: scroll;">
                    <table class="table table-hover " id="activeUsers">
                        <thead>
                            <tr>
                               <th style="text-align: left">Name</th>
                                        <th style="text-align: left">Email</th>
                                        <th style="text-align: left">Role</th>
                                        <th style="text-align: left">Club</th>
                            </tr>
                        </thead>

                       <tbody>
                       <?php 
                       $total=0;
                       ?>
                                    @if ($logs->count())

                                        @foreach ($logs as $key => $log)
                                            <?php
                                            $user = App\User::find($log->user_id);
                                            $total=0;
                                            ?>
                                            @if ($user->organization_id == Auth::user()->organization_id && $user->roles->pluck('name')[0] != 'OrganizationAdmin')
                                            <?php 
                                            $total++;
                                            ?>
                                                <tr>
                                                    <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->roles->pluck('name')[0] }}</td>
                                                    <td>{{ $user->club ? $user->club->club_name : '' }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                </tbody>
                  
                      </table>
                     @if ($total>8)
                <div class="row">
                    <div class="col-md-12">
                        <div class="dataTables_paginate paging_simple_numbers" style="float:right;" id="inline_edit_paginate">
                            <span class="pull-right numbered">
                                <a href="#" class="paginate1" id="previous">Previous</a> &nbsp;
                                <a href="#" class="paginate1" id="next">Next</a>
                            </span>                            </div></div></div>
@endif
                </div>
            </div>

           
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary todolist" style="height:440px;">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                        {{ __('sidebar.club_points') }}
                    </h4>
                </div>
                <div class="form-group" style="width:100%;">
                    <section class="content paddingleft_right15">
                        <select id="select26" class="form-control padding-right points">
                            <option disabled selected>Select League</option>
                            @foreach ($leagues as $league)
                            
                            @if($league->id ==$ongLeague->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </section>
                </div>
                <div class="panel-body example" style="overflow-y: scroll; height:300px;overflow-x:scroll;">
                    
                    @include('admin.dashboard.clubPoints')

                </div>
            </div>
        </div>

    </div>





    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                        {{ __('dashboard.club_part_single_events') }}
                    </h4>
                </div>
                    <section class="content paddingleft_right15">
                    <select id="select25" class="form-control padding-right singleEvent">
                    @foreach ($leagues as $league)
                    @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif
                            @endforeach
                    </select>
                </section>
                <div class="panel-body">
                    @include('admin.dashboard.SingleEventClubParticipants')

               
                </div>
            </div>

           
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                                             {{ __('dashboard.club_part_group_events') }}

                    </h4>
                </div>
                <section class="content paddingleft_right15">
                    <select id="select24" class="form-control padding-right groupEvent">
                    @foreach ($leagues as $league)
                    @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif
                            @endforeach
                    </select>
                </section>
                <div class="panel-body" >
                @include('admin.dashboard.groupEventClubParticipants')
                </div>
            </div>

           
        </div>
               


    </div>
    <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary todolist">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">turned_in</i>
                    {{ __('dashboard.ong_league_payment_status') }}
                    </h4>
                </div>
                <div class="panel-body" style="padding:0px;margin:0px;">
                 
<div id="club-payments" style="width: 100%; height: 450px;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary todolist">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">trending_up</i>
{{ __('dashboard.club_part_res_ind_events') }}                    </h4>
                </div>
                <section class="content paddingleft_right15">
                    <select id="select21" class="form-control padding-right singlePlace">
                    @foreach ($leagues as $league)
                    @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif
                            @endforeach
                    </select>
                </section>
                <div class="panel-body" style="padding:0px;margin:0px;">
                @include('admin.dashboard.individualPlaceHighChart')
                </div>
            </div>
        </div>
    </div>

    <div class='loader'></div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    {{-- <script src="https://www.pakainfo.com/jquery/js/jquery-1.12.4.js"></script> --}}
    <script src="https://www.pakainfo.com/jquery/js/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>

    <!--  -->

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
        //active users
        var firstRecord1 = 0;
        var pageSize1 = 8;
        var tableRows1 = $("#activeUsers tbody tr");

        $("a.paginate1").click(function(e) {
            e.preventDefault();
            var tmpRec1 = firstRecord1;
            if ($(this).attr("id") == "next1") {
                tmpRec1 += pageSize1;
            } else {
                tmpRec1 -= pageSize1;
            }
            if (tmpRec1 < 0 || tmpRec1 > tableRows1.length) return
            firstRecord1 = tmpRec1;
            paginate1(firstRecord1, pageSize1);
        });

        var paginate1 = function(start1, size1) {
            var end1 = start1 + size1;
            tableRows1.hide();
            tableRows1.slice(start1, end1).show();
        }


        //reults
        var clubs = <?php echo json_encode($clubNames); ?>;
        var clubNames = [];
        for (var j = 0; j < clubs.length; j++) {
            clubNames.push(clubs[j])
        }
        var firstPlaceCount = <?php echo json_encode($firstPlaceCount); ?>;
        var firstPlaceCounts = [];
        for (var i = 0; i < firstPlaceCount.length; i++) {
            firstPlaceCounts.push(firstPlaceCount[i])
        }
        var firstPlaceClubCounts = firstPlaceCounts.map(i => Number(i))
        var secondPlaceCount = <?php echo json_encode($secondPlaceCount); ?>;
        var secondPlaceCounts = [];
        for (var i = 0; i < secondPlaceCount.length; i++) {

            secondPlaceCounts.push(secondPlaceCount[i])
        }
        var secondPlaceClubCounts = secondPlaceCounts.map(i => Number(i));

        var thirdPlaceCount = <?php echo json_encode($thirdPlaceCount); ?>;
        var thirdPlaceCounts = [];
        for (var i = 0; i < thirdPlaceCount.length; i++) {

            thirdPlaceCounts.push(thirdPlaceCount[i])
        }
        var thirdPlaceClubCounts = thirdPlaceCounts.map(i => Number(i));

        $('#club-first-counts').highcharts({

            chart: {
                type: 'column'
            },

            title: {
                text: 'Total fruit consumption, grouped by gender'
            },




            xAxis: {
                categories: clubNames
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of WinCounts'
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
                    name: 'First Place',
                    data: firstPlaceClubCounts,
                    stack: 'yes'
                },
                {
                    name: 'Second Place',
                    data: secondPlaceClubCounts,
                    stack: 'no'
                },

                {
                    name: 'Third Place',
                    data: thirdPlaceClubCounts,
                    stack: 'notneed'
                },
               
            ]
        });

        //end
        var leagues = <?php echo json_encode($dataPoints); ?>;
        var league = <?php echo json_encode($category); ?>;
        var leagueNames = [];
        for (var j = 0; j < league.length; j++) {
            leagueNames.push(league[j])
        }
        var singleEvents = <?php echo json_encode($singleEventCounts); ?>;
        var singleEventCounts = [];
        for (var i = 0; i < singleEvents.length; i++) {
            singleEventCounts.push(singleEvents[i])
        }
        var singleEventTotalCounts = singleEventCounts.map(i => Number(i))
        var groupEvents = <?php echo json_encode($groupEventCounts); ?>;
        var groupEventCounts = [];
        for (var j = 0; j < groupEvents.length; j++) {
            groupEventCounts.push(groupEvents[j])
        }
        var groupEventTotalCounts = groupEventCounts.map(i => Number(i));
        //grp event
        var singleGroupEvents = <?php echo json_encode($singleEventGroupCount); ?>;
        var singleEventGroupCounts = [];
        for (var k = 0; k < singleGroupEvents.length; k++) {
            singleEventGroupCounts.push(singleGroupEvents[k])
        }
        var singleEventTotalGroupCounts = singleEventGroupCounts.map(i => Number(i))

        var groupGroupEvents = <?php echo json_encode($groupEventGroupCount); ?>;
        var groupEventGroupCounts = [];
        for (var l = 0; l < groupGroupEvents.length; l++) {
            groupEventGroupCounts.push(groupGroupEvents[l])
        }
        var groupEventTotalGroupCounts = groupEventGroupCounts.map(i => Number(i));

        $('#club-payments').highcharts({

            chart: {
                type: 'column'
            },

            title: {
                text: 'Total fruit consumption, grouped by gender'
            },




            xAxis: {
                categories: [league]
            },

            yAxis: {
                allowDecimals: false,
                min: 0,
                title: {
                    text: 'Number of Requests'
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
                    name: 'Paid SingleEvent',
                    data: singleEventTotalCounts,
                    stack: 'paid'
                }, {
                    name: 'Not Paid SingleEvent',
                    data: groupEventTotalCounts,
                    stack: 'paid'
                },

                {
                    name: 'Paid GroupEvent',
                    data: singleEventTotalGroupCounts,
                    stack: 'notpaid'
                }, {
                    name: 'Not Paid GroupEvent',
                    data: groupEventTotalGroupCounts,
                    stack: 'notpaid'
                },
            ]
        });




        var firstRecord = 0;
        var pageSize = 7;
        var tableRows = $("#count tbody tr");

        $("a.paginate").click(function(e) {
            e.preventDefault();
            var tmpRec = firstRecord;
            if ($(this).attr("id") == "next") {
                tmpRec += pageSize;
            } else {
                tmpRec -= pageSize;
            }
            if (tmpRec < 0 || tmpRec > tableRows.length) return
            firstRecord = tmpRec;
            paginate(firstRecord, pageSize);
        });

        var paginate = function(start, size) {
            var end = start + size;
            tableRows.hide();
            tableRows.slice(start, end).show();
        }


        paginate(firstRecord, pageSize);

        // document.getElementById("countGames").innerHTML = $('#count tbody tr').length;

        //clubpoints
        $(".points").on('change', function() {
            var value = $(".points option:selected").val();
            $('.loader').show();
            $.ajax({
                type: 'GET',
                url: '/league/club-points/' + value,
                data: {
                    "_token": "{{ csrf_token() }}",


                },
                success: function(response) {
                    $('.loader').hide();
                    $('#champions').html(response['html']);

                }
            });
        });
        //end
        //status
        $(".search").on('change', function() {
            var value = $(".search option:selected").val()
            $.ajax({
                type: 'POST',
                url: '/league/chart/' + value,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "value": value


                },
                success: function(response) {
                    $('.chart').html(response['html']);

                }
            });
        });
        //singleevent
        $(".singleEvent").on('change', function() {
            var value = $(".singleEvent option:selected").val()
            $.ajax({
                type: 'POST',
                url: '/league/singleEvent/' + value,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "value": value


                },
                success: function(response) {
                    $('.clubchart').html(response['html']);
                }
            });
        });


        //groupEvent
        $(".groupEvent").on('change', function() {
            var value = $(".groupEvent option:selected").val()
            $.ajax({
                type: 'POST',
                url: '/league/groupEvent/' + value,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "value": value
                },
                success: function(response) {
                    $('#club-group-event').html(response['html']);

                }
            });
        });

        //individualEvents Places
        $(".singlePlace").on('change', function() {
            var value = $(".singlePlace option:selected").val()
            $.ajax({
                type: 'POST',
                url: '/singleEventPlace/HighChart/' + value,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "value": value
                },
                success: function(response) {
                    $('#club-first-counts').html(response['html']);

                }
            });
        });



        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Role', 'Registered User Count'],

                @php
                
                foreach ($venues as $venue) {
                    //$venue->leagues->pluck('name')->implode(' ')
                    echo "['" . $venue->name . "', " . $venue->leagues->count() . ',],';
                }
                
                @endphp
            ]);

            var options = {
                title: "Venues",
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('venues'));

            chart.draw(data, options);
        }

    </script>
@stop
