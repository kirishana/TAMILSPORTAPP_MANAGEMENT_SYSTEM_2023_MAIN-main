@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dashboard2.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}" />
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dashboard2.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link type="text/css"
        href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}"
        rel="stylesheet" />
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
            background-color: none;
            color: black;
        }

        #previous {
            background-color: #f1f1f1;
            color: black;
        }

        #next {
            background-color: #418bca;
            color: white;
            position:relative;
            bottom:0px;
        }

    
        .pagination li.active a {
            z-index: 2;
            color: #fff;
            background-color: none;
            border-color: #20a8d8;
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
        background-color:white;
      }
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
        @section('content')

        <section class="content-header">

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
                <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                    <!-- Trans label pie charts strats here-->
                    <div class="goldbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Total Participated Events</span>
                                        <div class="number" id="myTargetElement3" style="color:white">
                                            {{ $participatedEventsCount->count() }}
                                        </div>
                                    </div>
                                    <i class="material-icons pull-right square_material">archive</i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                    <!-- Trans label pie charts strats here-->
                    <div class="lightbluebg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 text-right">
                                        <span>Total events Won</span>
                                        <div class="number" id="myTargetElement1" style="color:white;">
                                            {{ $WonEventsCount->count() }}
                                        </div>
                                    </div>
                                    <i class="material-icons pull-right square_material">visibility</i>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                    <!-- Trans label pie charts strats here-->
                    <div class="redbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Past Leagues</span>
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

                <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                    <!-- Trans label pie charts strats here-->
                    <div class="palebluecolorbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">
                                <div class="row">
                                    <div class="square_box col-xs-7 pull-left">
                                        <span>Ongoing Leagues</span>
                                        <div class="number" id="myTargetElement4" style="color:white">
                                        {{ $ongngLeaguesCount->count()}}
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
                            <i class="fas fa-calendar-alt"></i>
                            Ongoing Events
                        </h4>
                    </div>
                    <div class="panel-body example " id="" style="height:400px;overflow-y:scroll;">
                        <table class="table table-hover tableFixHead" id="count" style="background-color:#fff;">
                            <thead>
                                <tr>
                                    <th style="text-align: left;padding-bottom:27px">League </th>
                                    <th style="text-align: left">Participants <br>Name</th>
                                    <th style="text-align: left;padding-bottom:27px">Events</th>
                                    <th style="text-align: left;padding-bottom:27px">Status</th>
                                    <th style="text-align: left;padding-bottom:27px">Points</th>
                                </tr>
                            </thead>


                            <tbody>
                            @if ($ongoingLeagues != null)
                                @foreach($ongoingLeagues as $ongoingLeague)
                                    <?php
                $count1=null;
                $child_id=array();
                $child_id1=array();
                $user_ids=Auth::user()->children?Auth::user()->children:'';
                foreach($user_ids as $user_id){
                    $child_id[]=$user_id->id;
                    $child_id1[]=$user_id->id;
                }
                array_push($child_id,Auth::user()->id);
                $ageUsercount=DB::table('age_group_gender_user')->whereIn('user_id',$child_id)->get();
                $counts=$ongoingLeague->registrations->whereIn('user_id',$child_id);
                if($counts->count()!=null){
                    foreach($counts as $count){
                        foreach($count->events as $event){
                            $count1=$event->mainEvent->count();
                        }
                    }
                }else{
                    // dd('ji');
                    $count1=null;
                }
            //    dd($count1);
                ?>
                @if($count1!=null)
                @php ($first = true) @endphp
                @php ($second = true) @endphp

                                    <tr>
                                    @if($first == true)
                                        <td rowspan="{{ $count1*$counts->count()}}">{{ $ongoingLeague->name }}</td>
                                        @php ($first = false) @endphp
                                    @endif
                                        @foreach($ongoingLeague->registrations->whereIn('user_id',$child_id) as $registration)
                                    <tr>
                                        <td rowspan="{{ $registration->events->count()+1}}">
                                            {{ $registration->user->first_name }}
                                        </td>
                                        @foreach($registration->events as $event)

                                            @foreach($event->ageGroups as $ageGroup)

                                                <?php 
                                    $userGender = $registration->user->gender == 'male' ? 1 : 2;
                                    $mine = Carbon\Carbon::createFromFormat('Y-m-d',  $registration->user->dob)->format('Y');
                                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $ongoingLeague->to_date)->format('Y');
                                    $age = $league1 - $mine;
                                    $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                                    $exp = preg_split("/-/", $ageGroup->name);

                                    
                                if (isset($exp[1])) {
                        if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                        ?>
                                                <?php
                         $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>
                                    <tr>

                                        @foreach($genders as $gender)
                                            @if($gender->gender_id==$userGender)
                                                <td>
                                                    {{ $event->mainEvent->name }}<br>

                                                </td>
                                                @if($gender->status == 2)
                                                    <td>
                                                        <span class="label label-primary">Not Started</span>

                                                    </td>
                                                @elseif($gender->status == 0)
                                                    <td> <span class="label label-warning">On Going </span>
                                                    </td>
                                                @elseif($gender->status == 3)
                                                    <td> <span class="label label-warning">Finalizing </span>
                                                    </td>
                                                @elseif($gender->status == 4)
                                                    <td> <span class="label label-warning">Processing</span>
                                                    </td>
                                                @elseif($gender->status == 10)
                                                    <td> <span class="label label-danger">Cancelled</span>
                                                    </td>
                                                @else
                                                    <td> <span class="label label-success">Finished</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <?php $ageUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('league_id',$ongoingLeague->id)->where('user_id',$registration->user->id)->first();?>
                                                    @if($ageUser!=null)
                                                    {{ $ageUser->marks }}
                                                    @endif
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <?php
                        }
                    }
                    if ($exp[0] == $age) {
                        ?>
                                    <?php
                         $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>
                                    <tr>

                                        @foreach($genders as $gender)
                                            @if($gender->gender_id==$userGender)
                                                <td>
                                                    {{ $event->mainEvent->name }}

                                                </td>
                                                @if($gender->status == 2)
                                                    <td>
                                                        <span class="label label-primary">Not Started</span>

                                                    </td>
                                                @elseif($gender->status == 0)
                                                    <td> <span class="label label-warning">On Going </span>
                                                    </td>
                                                @elseif($gender->status == 3)
                                                    <td> <span class="label label-warning">Finalizing </span>
                                                    </td>
                                                @elseif($gender->status == 4)
                                                    <td> <span class="label label-warning">Processing</span>
                                                    </td>
                                                @elseif($gender->status == 10)
                                                    <td> <span class="label label-danger">Cancelled</span>
                                                    </td>
                                                @else
                                                    <td> <span class="label label-success">Finished</span>
                                                    </td>
                                                @endif
                                                <td>
                                                <?php $ageUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('league_id',$ongoingLeague->id)->where('user_id',$registration->user->id)->first();?>
                                                @if($ageUser!=null)
                                                    {{ $ageUser->marks}}
                                                    @endif                                                
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                    <?php
                    }
                    ?>
                                @endforeach

    @endforeach

    </tr>
@endforeach
</tr>
@endif
@endforeach
@endif
</tbody>

</table>
</div>
</div>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
    <div class="panel panel-primary">
        <div class="panel-heading border-light">
            <h4 class="panel-title">
                <i class="fas fa-running"></i>
                Future Leagues
            </h4>
        </div>
        <div class="panel-body" id="" style="height:400px;">
        @include('admin.dashboard.futureLeaguePlayer')  
        <div class="row">
                            <div class="col-md-12">
                                <div class="dataTables_paginate paging_simple_numbers" style="float:right;"
                                    id="inline_edit_paginate">
                                    <span class="pull-right numbered">
                                        <a href="#" class="paginate20" id="previous">Previous</a> &nbsp;
                                        <a href="#" class="paginate20" id="next">Next</a>
                                    </span>
                                </div>
                            </div>
                        </div>
      
        </div>
    </div>
</div>

</div>


<!-- // -->
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading border-light">
                <h4 class="panel-title">
                    <i class="fas fa-chart-pie"></i>
                    Point By Leagues
                </h4>
            </div>
            <div class="panel-body">
                @include('admin.dashboard.leaguePoints')


            </div>
        </div>


    </div>
    {{--  <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="panel panel-primary">
            <div class="panel-heading border-light">
                <h4 class="panel-title">
                    <i class="fas fa-chart-pie"></i>
                    <----------->
                </h4>
            </div>
            <section class="content paddingleft_right15">
                <select id="select22" class="form-control padding-right select2">
                    <option disabled selected>Select League</option>
                        <option value=""></option>
                </select>
            </section>
            <div class="panel-body">
            </div>
        </div>
    </div>  --}}
</div>
</div>
</div>
</div>
</div>



@stop

    {{-- page level scripts --}}
    @section('footer_scripts')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.pakainfo.com/jquery/js/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>


    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}">
    </script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>

var firstRecords1 = 0;
        var pageSizes1 = 2;
        var tableRowss1 = $("#futureLeague tbody tr");
        if(tableRowss1.length>2){
            $('.paginate20').show();
        }else{
            $('.paginate20').hide();

        }
    $("a.paginate20").click(function(e) {
            e.preventDefault();
            var tmpRecs1 = firstRecords1;
            if ($(this).attr("id") == "next") {
                tmpRecs1 += pageSizes1;
            } else {
                tmpRecs1 -= pageSizes1;
            }
            if (tmpRecs1 < 0 || tmpRecs1 > tableRowss1.length) return
            firstRecords1 = tmpRecs1;
            paginate1(firstRecords1, pageSizes1);
        });

        var paginate1 = function(start, size) {
            var end = start + size;
            tableRowss1.hide();
            tableRowss1.slice(start, end).show();
        }


        paginate1(firstRecords1, pageSizes1);

    $(document).ready(function() {
    $(".tr td").each(function() {
        var cellText = $.trim($(this).text());
        if (cellText.length == 0) {
            $(this).parent().hide();
          

        }
    });
});
</script>

    @stop
