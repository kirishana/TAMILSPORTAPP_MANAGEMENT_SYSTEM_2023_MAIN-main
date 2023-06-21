@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!-- <style>
::-webkit-scrollbar {
  width: 10px;
}
  </style> -->

<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}" />
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/morrisjs/morris.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/dashboard2.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

   <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
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
            background-color:none;
            color: black;
        }

        #previous {
            background-color: #f1f1f1;
            color: black;
            position:relative;
            bottom:0px;


        }
        #previous1 {
            background-color: #f1f1f1;
            color: black;
            position:relative;
            bottom:0px;


        }
        #previous2 {
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
        #pre {
            background-color: #f1f1f1;
            color: black;
            position:relative;
            bottom:0px;
        }

        #nex {
            background-color: #418bca;
            color: white;
            position:relative;
            bottom:0px;

        }
        #next1 {
            background-color: #418bca;
            color: white;
            position:relative;
            bottom:0px;

        }
        #next2 {
            background-color: #418bca;
            color: white;
            position:relative;
            bottom:0px;

        }
        
.pagination10 li.active a {
    z-index: 2;
   color: #fff;
   background-color:none;
   border-color: #20a8d8; 
}
.pagination20 li.active a {
    z-index: 2;
   color: #fff;
   background-color:none;
   border-color: #20a8d8; 
}
.paginate30 li.active a {
    z-index: 2;
   color: #fff;
   background-color:none;
   border-color: #20a8d8; 
}
.paginate40 li.active a {
    z-index: 2;
   color: #fff;
   background-color:none;
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
            background-color: white;
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
                                <span>Members</span>
                                <div class="number" id="myTargetElement3" style="color:white">
                                {{$clubMembers->count()}}
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
                                <span>Future Leagues</span>
                                <div class="number" id="myTargetElement1" style="color:white;">
                                    {{ $futureLeagues->count() }}
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
                                    {{ $ongoingLeagues2->count() }}
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
                    Upcoming Events
                    </h4>
                </div>
                <div class="panel-body example" style="overflow-x:scroll;height:400px">
                    <table class="table table-hover"  id="count">
                        <thead>
                            <tr>
                                    <th style="text-align: left;padding-bottom:27px">Organization</th>
                                    <th style="text-align: left;padding-bottom:27px">League </th>
                                    <th style="text-align: left">Event.Reg <br>Start Date</th>
                                    <th style="text-align: left">Event.Reg <br> Closing Date</th>
                            </tr>
                        </thead>


                        <tbody>
                                @foreach($Cluborganizations as $organization)
        @php ($first = true) @endphp
            <tr>
            {{--  {{ dd($organization->leagues->where('to_date','>',Carbon\Carbon::now())->where('from_date','>',Carbon\Carbon::now())->count()) }}  --}}
            @foreach($organization->leagues as $league)
        @if($league->to_date > Carbon\Carbon::now()&& $league->from_date > Carbon\Carbon::now())
            @if($first == true)
                <td rowspan="{{$organization->leagues->where('to_date','>',Carbon\Carbon::now())->where('from_date','>',Carbon\Carbon::now())->count()+1}}"> {{$organization->name}} </td>
                @php ($first = false) @endphp
            @endif
                <tr>
                <td> {{ $league->name}} </td>
                <td>{{ $league->reg_start_date }}</td>
                <td>{{ $league->reg_end_date }}</td>
                </tr>
                @endif
        @endforeach 
            </tr>
       
    @endforeach
                            </tbody>

                    </table>
                    <a href="#" style="float: right;bottom: 0;" class="pagination" id="pager3"></a>
                 </div>
            </div>
        </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                    <i class="fas fa-running"></i>
                                            Total single event registered players
                    </h4>
                </div>
                <div class="panel-body" id="singleRegPlayer" style="height:400px">
                   @include('admin.dashboard.latestLeaguespage')
                </div>
            </div>
        </div>
        
</div>
<div class="row ">
   <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary" >
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                    <i class="fas fa-users"></i>
                        Total group event registered teams
                    </h4>
                </div>
                <div class="panel-body" id="groupRegteams"  style="height:400px">
                @include('admin.dashboard.clubGeventsTotalTeams')
              
                </div>
            </div>
        </div>
   <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                    <i class="far fa-calendar-check"></i>                        
                    Ongoing League Event Status                    
                    </h4>
                </div>
                <div class="panel-body example" id="" style="height:400px;overflow-x:scroll;">
                @include('admin.dashboard.onLeagueEveStatus') 
                <div class="row">
                            <div class="col-md-12">
                                <div class="dataTables_paginate paging_simple_numbers" style="float:right"
                                    id="inline_edit_paginate">
                                    <span class="pull-right numbered">
                                        <a href="#" class="paginate30" id="previous1">Previous</a> &nbsp;
                                        <a href="#" class="paginate30" id="next1">Next</a>
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
                    Club Participants of individual events
                    </h4>
                </div>
                    <section class="content paddingleft_right15">
                    <select id="select21" class="form-control padding-right single">
                    <option disabled selected>Select League</option>
                            @foreach ($latestLeagues as $league)
                                @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif   
                                @endforeach

                        </select>
                </section>
                <div class="panel-body example" style="overflow-x:scroll;">
                @include('admin.dashboard.clubsingleeventchart')

               
                </div>
            </div>

           
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                    <i class="fas fa-chart-pie"></i>
                                         Club Participants of group events

                    </h4>
                </div>
                <section class="content paddingleft_right15">
                    <select id="select22" class="form-control padding-right select2">
                    <option disabled selected>Select League</option>
                            @foreach ($latestLeagues as $league)
                            @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif                                
                                @endforeach
                        </select>
                </section>
                <div class="panel-body example" style="overflow-x:scroll;">
                  
                @include('admin.dashboard.clubGroupeventchart')

               
                </div>
            </div>

           
        </div>
        </div>
<div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary ">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                    <i class="fas fa-award"></i>
                        Certificate Status Single Event    
                    </h4>
                </div>
                    <section class="content paddingleft_right15">
                    <select id="select25" class="form-control padding-right single_prize">
                    @foreach ($latestLeagues as $league)
                            @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif                                
                                @endforeach
                        </select>
                </section>
                <div class="panel-body example" style="overflow-x:scroll;">
                @include('admin.dashboard.prizeList')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dataTables_paginate paging_simple_numbers" style="float:right;"
                                    id="inline_edit_paginate">
                                    <span class="pull-right numbered">
                                        <a href="#" class="paginate10" id="previous">Previous</a>&nbsp;
                                        <a href="#" class="paginate10" id="next">Next</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                </div>
            </div>

           
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary" >
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="fas fa-award"></i>
                        Certificate  Status Group Event        

                    </h4>
                </div>
                <section class="content paddingleft_right15">
                <select id="select24" class="form-control  group_prize" >
                @foreach ($latestLeagues as $league)
                            @if($league->id ==$ongngLeagues->id)
                            <option  selected value="{{ $league->id }}">{{ $league->name }}</option>
                            @else
                                <option  value="{{ $league->id }}">{{ $league->name }}</option>
                                @endif                                
                                @endforeach
                </select>
                </section>
                <div class="panel-body example" style="overflow-x:scroll;">
                @include('admin.dashboard.prizeListGroup')     
                        <div class="row">
                            <div class="col-md-12">
                                <div class="dataTables_paginate paging_simple_numbers" style="float:right;"
                                    id="inline_edit_paginate">
                                    <span class="pull-right numbered">
                                        <a href="#" class="paginate20" id="pre">Previous</a> &nbsp;
                                        <a href="#" class="paginate20" id="nex">Next</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

           
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

       
  <script src="scripts.js"></script>

<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
    

    <script>
        
    //   single events prize
    var firstRecord = 0;
        var pageSize = 7;
        var tableRows = $("#ongEventStatus tbody tr");
        if(tableRows.length>7){
            $('.paginate10').show();
        }else{
            $('.paginate10').hide();

        }
    $("a.paginate10").click(function(e) {
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

    //     //end  
    var firstRecords = 0;
        var pageSizes = 4;
        var tableRowss = $("#num tbody tr");
        if(tableRowss.length>4){
            $('.paginate20').show();
        }else{
            $('.paginate20').hide();

        }
    $("a.paginate20").click(function(e) {
        // alert(tableRowss.length);
            e.preventDefault();
            var tmpRecs = firstRecords;
            if ($(this).attr("id") == "nex") {
                tmpRecs += pageSizes;
            } else {
                tmpRecs -= pageSizes;
            }
            if (tmpRecs < 0 || tmpRecs > tableRowss.length) return
            firstRecords = tmpRecs;
            paginates(firstRecords, pageSizes);
        });

        var paginates = function(start, size) {
            var end = start + size;
            tableRowss.hide();
            tableRowss.slice(start, end).show();
        }


        paginates(firstRecords, pageSizes);

    var firstRecords1 = 0;
        var pageSizes1 = 4;
        var tableRowss1 = $("#leagueStatus tbody tr");
        if(tableRowss1.length>4){
            $('.paginate30').show();
        }else{
            $('.paginate30').hide();

        }
    $("a.paginate30").click(function(e) {
            e.preventDefault();
            var tmpRecs1 = firstRecords1;
            if ($(this).attr("id") == "next1") {
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

       


    
    </script>
   
   

<script type="text/javascript">

        $(".single").change(function(){
            var value = $(".single option:selected").val()
            // alert(value);

            $.ajax({
                url: "/singleEvent/chart",
                method: 'POST',
                data: {
                        "_token": "{{ csrf_token() }}",
                        "value": value
                    },
                    success: function(response) {
                        $('#club-first-counts').html(response['html']);
                    }
            });
        });

        $(".single_prize").change(function(){
            var value = $(".single_prize option:selected").val()
            // alert(value);

            $.ajax({
                url: "/singleEvent/prize",
                method: 'POST',
                data: {
                        "_token": "{{ csrf_token() }}",
                        "value": value


                    },
                                // alert(data); 

                                success: function(response) {      
                $('.prizesingle').html(response['html'])
                var firstRecord = 0;
        var pageSize = 7;
        var tableRows = $("#ongEventStatus tbody tr");
        if(tableRows.length>7){
            $('.paginate10').show();
        }else{
            $('.paginate10').hide();

        }
    $("a.paginate10").click(function(e) {
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
            }
            });
        });
        $(".select2").change(function(){
            var value = $(".select2 option:selected").val()
            // alert(value);

            $.ajax({
                url: "/GroupEvent/chart",
                method: 'POST',
                data: {
                        "_token": "{{ csrf_token() }}",
                        "value": value


                    },
                                // alert(data); 

                                success: function(response) {
                $('#club').html(response['html'])
            }
            });
        });
    
        $(".group_prize").change(function(){
            var value = $(".group_prize option:selected").val()
            // alert(value);

            $.ajax({
                url: "/GroupEvent/prize",
                method: 'POST',
                data: {
                        "_token": "{{ csrf_token() }}",
                        "value": value


                    },
                                // alert(data); 

                                success: function(response) {
                $('.group').html(response['html'])
                var firstRecords = 0;
        var pageSizes = 4;
        var tableRowss = $("#num tbody tr");
        if(tableRowss.length>4){
            $('.paginate20').show();
        }else{
            $('.paginate20').hide();

        }
    $("a.paginate20").click(function(e) {
        // alert(tableRowss.length);
            e.preventDefault();
            var tmpRecs = firstRecords;
            if ($(this).attr("id") == "nex") {
                tmpRecs += pageSizes;
            } else {
                tmpRecs -= pageSizes;
            }
            if (tmpRecs < 0 || tmpRecs > tableRowss.length) return
            firstRecords = tmpRecs;
            paginates(firstRecords, pageSizes);
        });

        var paginates = function(start, size) {
            var end = start + size;
            tableRowss.hide();
            tableRowss.slice(start, end).show();
        }


        paginates(firstRecords, pageSizes);
            }
            });
        });

        $(document).on('click', '#page1 a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
            function fetch_data(page) {
            console.log(page);
            $.ajax({
                url: '/Pagination?page='+page,
              success:function(response)
              {
                $('#singleRegPlayer').html(response['html1']);
                // $('#groupRegteams').html(data);
              } 
            })
        }
        });
        $(document).on('click', '#page a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
            function fetch_data(page) {
            console.log(page);
            $.ajax({
                url: '/Pagination?page='+page,
              success:function(response)
              {
                $('#groupRegteams').html(response['html2']);
              } 
            })
        }
        });
        $(document).on('click', '#page3 a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
            function fetch_data(page) {
            console.log(page);
            $.ajax({
                url: '/dashboard?page='+page,
              success:function(response)
              {
                $('#onLeagueEveStatus').html(response['html3']);
              } 
            })
        }
        });
               
</script>  
  

       



    @stop
