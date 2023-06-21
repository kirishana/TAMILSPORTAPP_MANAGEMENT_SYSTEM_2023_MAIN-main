@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
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
    <h1>Prize Lists</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href=""> Reports</a></li>
        <li class="active">Prize Lists</li>
    </ol>
</section>
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Prize Lists
                </h4>
            </div>
            <br />
            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-3">

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
                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender">
                            <option value="0">Select Gender</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select AgeGroup" >
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
                    {{-- <div class="col-md-3">
                        <select id="prize" class="form-control multiselect prize" placeholder="Prize Status">
                            <option value="5">Prize Status</option>
                            <option value="1">Prize Given</option>
                            <option value="0">Prize Not Given</option>
                        </select>
                    </div> --}}                   
                </div>
                <div class="row">
                <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                            <a id="btn" style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                            <a href="/report/prize-list/generate" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                            <a href="/report/prize-list/export"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                        </div>
                </div>
                <div class="panel-body table-responsive">
                    @include('reports.prizes.search')


                </div>
                <div class="panel-body table-responsive" style="display:none">
                    @include('reports.prizes.export')


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
        var multipleCancelButton = new Choices('#prize', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

    });
    $("#btn").click(function() {
        $("#prizeGivenLists").print();
    });
    var obj = {};
    var leagueData ;
    var seasonData ;
    var genderData ;
    var eventData ;
    var ageData ;
    var judgeData ;
    var prizeGivenData;

    $("#season").on('change', function() {

        seasonData=$(".season option:selected").val();
        prizeGivenData=$(".prize option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['prizeGiven']=prizeGivenData;
    
        $.ajax({
            type: 'POST',
            url: '/report/prize-list/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.prizeGiven').html(response.html)
                $('#prizeGivenLists').html(response.html2)
            }
        });
    });

    //country
    $("#league").on('change', function() {
        seasonData=$(".season option:selected").val();
        prizeGivenData=$(".prize option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['prizeGiven']=prizeGivenData;
        $.ajax({
            type: 'POST',
            url: '/report/prize-list/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.prizeGiven').html(response.html)
                $('#prizeGivenLists').html(response.html2)

            }
        });
    });
    //gender

    $("#gender").on('change', function() {
        seasonData=$(".season option:selected").val();
        prizeGivenData=$(".prize option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['prizeGiven']=prizeGivenData;
        $.ajax({
            type: 'POST',
            url: '/report/prize-list/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.prizeGiven').html(response.html)
                $('#prizeGivenLists').html(response.html2)

            }
        });

    });
    //name

    //country
    $("#age").on('change', function() {
        seasonData=$(".season option:selected").val();
        prizeGivenData=$(".prize option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['prizeGiven']=prizeGivenData;;
        $.ajax({
            type: 'POST',
            url: '/report/prize-list/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.prizeGiven').html(response.html)
                $('#prizeGivenLists').html(response.html2)

            }
        });

    });
    $("#event").on('change', function() {
        seasonData=$(".season option:selected").val();
        prizeGivenData=$(".prize option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['prizeGiven']=prizeGivenData;
        $.ajax({
            type: 'POST',
            url: '/report/prize-list/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.prizeGiven').html(response.html)
                $('#prizeGivenLists').html(response.html2)

            }
        });
    });
    //judge
    $(".judge").on('change', function() {
        seasonData=$(".season option:selected").val();
        prizeGivenData=$(".prize option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['prizeGiven']=prizeGivenData;
        $.ajax({
            type: 'POST',
            url: '/report/prize-list/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.prizeGiven').html(response.html)
                $('#prizeGivenLists').html(response.html2)

            }
        });
    });
        //prizegiven
    $(".prize").on('change', function() {
        seasonData=$(".season option:selected").val();
        prizeGivenData=$(".prize option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        judgeData=$(".judge option:selected").val();
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        obj['prizeGiven']=prizeGivenData;
        $.ajax({
            type: 'POST',
            url: '/report/prize-list/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.prizeGiven').html(response.html)
                $('#prizeGivenLists').html(response.html2)

            }
        });
    });

</script>
@stop