@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Judges
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<style>
    @media (max-width:340px) {
        .button-group .button {
            padding: 0 10px !important;
        }
    }
</style>
@stop



@section('content')
<section class="content-header">
    <h1>Starters  &  Judges</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href=""> Reports</a></li>
        <li class="active">Starters  &  Judges</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Starters  &  Judges
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive" style="min-height:800px;">
                <div class="row">
                    <div class="col-md-2">

                        <select id="season" class="form-control multiselect season" placeholder="Select Season">
                            <option value="0">Select Season</option>
                            @foreach($seasons as $season)
                            <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="Select League">
                            <option value="0">Select League</option>
                            @foreach($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="event" class="form-control multiselect event" placeholder="Select Event">
                            <option value="0">Select Event</option>
                            @foreach($mainEvents as $mainEvent)
                            <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender" >
                            <option value="0">Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select AgeGroup">
                            <option value="0">Select AgeGroup</option>
                            @foreach($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="league" class="form-control multiselect judge" placeholder="Select Judge">
                            <option value="0">Select Judge</option>
                            @foreach($judges as $judge)
                            <option value={{ $judge->id }}>{{ $judge->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="starter" class="form-control multiselect starter" placeholder="Select Starter">
                            <option value="0">Select Starter</option>
                            @foreach($starters as $starter)
                            <option value={{ $starter->id }}>{{ $starter->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                            <a id="btn" style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                            <a href="/report/judges/generate" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                            <a href="/report/judges/export"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                        </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered" style="text-transform: capitalize;">
                        <thead class="thead-Dark">
                            <tr>
                                <th class="sorting" data-sorting_type="asc" data-column_name="league" style="cursor: pointer"><span style="float: left;" id="league_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; League</th>
                                <th class="sorting" data-sorting_type="asc" data-column_name="event" style="cursor: pointer"><span style="float: left;" id="event_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;Event</th>
                                <th style="width:10%" class="sorting" data-sorting_type="asc" data-column_name="gender" style="cursor: pointer"><span style="float: left;" id="gender_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;Gender</th>
                                <th style="width:8%" class="sorting" data-sorting_type="asc" data-column_name="age" style="cursor: pointer"><span style="float: left;" id="age_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;Age Group</th>
                                <th style="width:10%">Status</th>
                                <th style="width:10%" class="sorting" data-sorting_type="asc" data-column_name="starter" style="cursor: pointer"><span style="float: left;" id="starter_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;Starter</th>
                                <th style="width:10%" class="sorting" data-sorting_type="asc" data-column_name="judge" style="cursor: pointer"><span style="float: left;" id="judge_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;Judge</th>
                                <th style="width:10%" class="sorting" data-sorting_type="asc" data-column_name="date" style="cursor: pointer"><span style="float: left;" id="date_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;Date</th>
                                <th style="width:10%" class="sorting" data-sorting_type="asc" data-column_name="time" style="cursor: pointer"><span style="float: left;" id="time_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;Time</th>
                    
                            </tr>
                          
                        </thead>
                        <tbody class="judges">
                    @include('reports.judges.search')
                        </tbody>
                    </table>

                </div>
                <div class="panel-body table-responsive" style="display:none">
                    @include('reports.judges.export')


                </div>
</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   
    $(document).ready(function() {

        var multipleCancelButton = new Choices('#season', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#league', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#gender', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#age', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#event', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#starter', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
    });
    $("#btn").click(function() {
        $("#judges").print();
    });
    var obj = {};
    var leagueData ;
    var seasonData ;
    var genderData ;
    var eventData ;
    var ageData ;
    var judgeData ;
    var starterData ;
    $("#season").on('change', function() {

        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        starterData=$(".starter option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['starter'] = starterData;
      

        $.ajax({
            type: 'POST',
            url: '/report/judges/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.judges').html(response.html);
                $('#judges').html(response.html2);
            }
        });
    });

    //country
    $("#league").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        starterData=$(".starter option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['starter'] = starterData;

        $.ajax({
            type: 'POST',
            url: '/report/judges/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.judges').html(response.html);
                $('#judges').html(response.html2);            }
        });
    });
    //gender

    $("#gender").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        starterData=$(".starter option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['starter'] = starterData;

        $.ajax({
            type: 'POST',
            url: '/report/judges/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.judges').html(response.html);
                $('#judges').html(response.html2);            }
        });

    });
    //name

    //country
    $("#age").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        starterData=$(".starter option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['starter'] = starterData;
        $.ajax({
            type: 'POST',
            url: '/report/judges/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.judges').html(response.html);
                $('#judges').html(response.html2);            }
        });

    });
    $("#event").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        starterData=$(".starter option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['starter'] = starterData;
        $.ajax({
            type: 'POST',
            url: '/report/judges/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.judges').html(response.html);
                $('#judges').html(response.html2);            
            }
        });
    });
    //judge
    $(".starter").on('change', function() {
        seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        starterData=$(".starter option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['starter'] = starterData;
        $.ajax({
            type: 'POST',
            url: '/report/judges/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {

                $('.judges').html(response.html);
                $('#judges').html(response.html2);    
                    }
        });
    });
  
        $(".judge").on('change', function() {
            seasonData=$(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        starterData=$(".starter option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['starter'] = starterData;

        $.ajax({
            type: 'POST',
            url: '/report/judges/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.judges').html(response.html);
                $('#judges').html(response.html2);            }
        });
    });


    function clear_icon(){
            $('#league_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#event_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#gender_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#age_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#starter_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#judge_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#date_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#time_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
          
        }
    $(document).on('click', '.sorting', function () {
             $('.sorting.active').removeClass('active');
             $(this).addClass("active");  

            var column_name=$(this).data('column_name');
            var order_type=$(this).data('sorting_type');
            console.log(order_type);
            if (order_type=='asc') {

                $(this).data('sorting_type', 'desc');
                
                clear_icon();
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-up"></i></span>');
                
            }
            if (order_type=='desc') {
                $(this).data('sorting_type','asc');
                reverse_order='asc';
                $(this).attr('data-sorting_type', reverse_order);
                clear_icon();
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-down"></i></span>');

            }
            $.ajax({
            type: 'GET',
            url: '/judge-starter/sortBy',
            data: {
                
                "order_type":order_type,
                "column_name":column_name,

            },
            success: function(response) {
                $('.judges').html(response.html);
                $('#judges').html(response.html2);   
               
            }
        });
        });
</script>
@stop