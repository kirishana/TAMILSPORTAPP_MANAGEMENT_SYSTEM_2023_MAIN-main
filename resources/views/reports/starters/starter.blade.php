@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Starters
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
    <h1>Starters</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href=""> Reports</a></li>
        <li class="active">Starters</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Starters

                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-2">

                        <select id="season" class="form-control multiselect season" placeholder="Select Season" multiple>
                            <option value="duplicate">all</option>
                            @foreach($seasons as $season)
                            <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="Select League" multiple>
                            <option value="duplicate2">all</option>

                            @foreach($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="event" class="form-control multiselect event" placeholder="Select Event" multiple>
                            <option value="duplicate3">all</option>
                            @foreach($mainEvents as $mainEvent)
                            <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender" multiple>
                            <option value="duplicate5">all</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>

                        </select>

                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select Age Group" multiple>
                            <option value="duplicate5">all</option>
                            @foreach($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>

                    </div>


                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect judge" placeholder="Select Starter" multiple>
                            <option value="duplicateJudge">all</option>

                            @foreach($judges as $judge)
                            <option value={{ $judge->id }}>{{ $judge->first_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                            <a id="btn" style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                            <a href="/report/starters/generate" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>

                            <a href="/report/starters/export"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                            </a>
                        </div>
                </div>
                <div class="panel-body table-responsive">
                    @include('reports.starters.search')


                </div>
                <div class="panel-body table-responsive" style="display:none">
                    @include('reports.starters.export')


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

    });
    $("#btn").click(function() {
        $("#starters").print();
    });
    var obj = {};
    var leagueData = [];
    var seasonData = [];
    var genderData = [];
    var eventData = [];
    var ageData = [];
    var judgeData = [];

    $("#season").on('change', function() {
        $.each($(".season option:selected").map(function() {

            seasonData.push($(this).val());
        }));
        // alert(seasonData);
        $.each($(".league option:selected").map(function() {

            leagueData.push($(this).val());
        }));

        $.each($(".age option:selected").map(function() {

            ageData.push($(this).val());
        }));
        $.each($(".event option:selected").map(function() {

            eventData.push($(this).val());
        }));

        $.each($(".gender option:selected").map(function() {

            genderData.push($(this).val());
        }));
        $.each($(".judge option:selected").map(function() {

            judgeData.push($(this).val());
        }));
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        var length = seasonData.length;
        var length2 = leagueData.length;
        var length3 = genderData.length;
        var length4 = ageData.length;
        var length5 = eventData.length;
        var length6 = judgeData.length;
        $.ajax({
            type: 'POST',
            url: '/report/starters/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
                "length3": length3,
                "length4": length4,
                "length5": length5,
                "length6": length6,
                "seasonData": seasonData,
                "leagueData": leagueData,
                "ageData": ageData,
                "eventData": eventData


            },
            success: function(response) {
                $('.judges').html(response.html)
                $('#starters').html(response.html2)

            }
        });
    });

    //country
    $("#league").on('change', function() {
        $.each($(".season option:selected").map(function() {

            seasonData.push($(this).val());
        }));
        // alert(seasonData);
        $.each($(".league option:selected").map(function() {

            leagueData.push($(this).val());
        }));

        $.each($(".age option:selected").map(function() {

            ageData.push($(this).val());
        }));
        $.each($(".event option:selected").map(function() {

            eventData.push($(this).val());
        }));

        $.each($(".gender option:selected").map(function() {

            genderData.push($(this).val());
        }));
        $.each($(".judge option:selected").map(function() {

            judgeData.push($(this).val());
        }));
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        var length = seasonData.length;
        var length2 = leagueData.length;
        var length3 = genderData.length;
        var length4 = ageData.length;
        var length5 = eventData.length;
        var length6 = judgeData.length;
        $.ajax({
            type: 'POST',
            url: '/report/starters/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
                "length3": length3,
                "length4": length4,
                "length5": length5,
                "length6": length6,
                "seasonData": seasonData,
                "leagueData": leagueData,
                "ageData": ageData,
                "eventData": eventData


            },
            success: function(response) {
                $('.judges').html(response.html)
                $('#starters').html(response.html2)

            }
        });
    });
    //gender

    $("#gender").on('change', function() {
        $.each($(".season option:selected").map(function() {

            seasonData.push($(this).val());
        }));
        // alert(seasonData);
        $.each($(".league option:selected").map(function() {

            leagueData.push($(this).val());
        }));

        $.each($(".age option:selected").map(function() {

            ageData.push($(this).val());
        }));
        $.each($(".event option:selected").map(function() {

            eventData.push($(this).val());
        }));

        $.each($(".gender option:selected").map(function() {

            genderData.push($(this).val());
        }));
        $.each($(".judge option:selected").map(function() {

            judgeData.push($(this).val());
        }));
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        var length = seasonData.length;
        var length2 = leagueData.length;
        var length3 = genderData.length;
        var length4 = ageData.length;
        var length5 = eventData.length;
        var length6 = judgeData.length;
        $.ajax({
            type: 'POST',
            url: '/report/starters/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
                "length3": length3,
                "length4": length4,
                "length5": length5,
                "length6": length6,
                "seasonData": seasonData,
                "leagueData": leagueData,
                "ageData": ageData,
                "eventData": eventData


            },
            success: function(response) {
                $('.judges').html(response.html)
                $('#starters').html(response.html2)

            }
        });

    });
    //name

    //country
    $("#age").on('change', function() {
        $.each($(".season option:selected").map(function() {

            seasonData.push($(this).val());
        }));
        // alert(seasonData);
        $.each($(".league option:selected").map(function() {

            leagueData.push($(this).val());
        }));

        $.each($(".age option:selected").map(function() {

            ageData.push($(this).val());
        }));
        $.each($(".event option:selected").map(function() {

            eventData.push($(this).val());
        }));

        $.each($(".gender option:selected").map(function() {

            genderData.push($(this).val());
        }));
        $.each($(".judge option:selected").map(function() {

            judgeData.push($(this).val());
        }));
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        var length = seasonData.length;
        var length2 = leagueData.length;
        var length3 = genderData.length;
        var length4 = ageData.length;
        var length5 = eventData.length;
        var length6 = judgeData.length;
        $.ajax({
            type: 'POST',
            url: '/report/starters/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
                "length3": length3,
                "length4": length4,
                "length5": length5,
                "length6": length6,
                "seasonData": seasonData,
                "leagueData": leagueData,
                "ageData": ageData,
                "eventData": eventData


            },
            success: function(response) {
                $('.judges').html(response.html)
                $('#starters').html(response.html2)

            }
        });

    });
    $("#event").on('change', function() {
        $.each($(".season option:selected").map(function() {

            seasonData.push($(this).val());
        }));
        // alert(seasonData);
        $.each($(".league option:selected").map(function() {

            leagueData.push($(this).val());
        }));

        $.each($(".age option:selected").map(function() {

            ageData.push($(this).val());
        }));
        $.each($(".event option:selected").map(function() {

            eventData.push($(this).val());
        }));

        $.each($(".gender option:selected").map(function() {

            genderData.push($(this).val());
        }));
        $.each($(".judge option:selected").map(function() {

            judgeData.push($(this).val());
        }));
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        var length = seasonData.length;
        var length2 = leagueData.length;
        var length3 = genderData.length;
        var length4 = ageData.length;
        var length5 = eventData.length;
        var length6 = judgeData.length;
        $.ajax({
            type: 'POST',
            url: '/report/starters/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
                "length3": length3,
                "length4": length4,
                "length5": length5,
                "length6": length6,
                "seasonData": seasonData,
                "leagueData": leagueData,
                "ageData": ageData,
                "eventData": eventData


            },
            success: function(response) {
                $('.judges').html(response.html)
                $('#starters').html(response.html2)

            }
        });
    });
    //judge
    $(".judge").on('change', function() {
        $.each($(".season option:selected").map(function() {

            seasonData.push($(this).val());
        }));
        // alert(seasonData);
        $.each($(".league option:selected").map(function() {

            leagueData.push($(this).val());
        }));

        $.each($(".age option:selected").map(function() {

            ageData.push($(this).val());
        }));
        $.each($(".event option:selected").map(function() {

            eventData.push($(this).val());
        }));

        $.each($(".gender option:selected").map(function() {

            genderData.push($(this).val());
        }));
        $.each($(".judge option:selected").map(function() {

            judgeData.push($(this).val());
        }));
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['judge'] = judgeData;
        var length = seasonData.length;
        var length2 = leagueData.length;
        var length3 = genderData.length;
        var length4 = ageData.length;
        var length5 = eventData.length;
        var length6 = judgeData.length;
        $.ajax({
            type: 'POST',
            url: '/report/starters/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
                "length": length,
                "length2": length2,
                "length3": length3,
                "length4": length4,
                "length5": length5,
                "length6": length6,
                "seasonData": seasonData,
                "leagueData": leagueData,
                "ageData": ageData,
                "eventData": eventData


            },
            success: function(response) {
                $('.judges').html(response.html)
                $('#starters').html(response.html2)

            }
        });
    });
</script>
<!-- <script>
    fetch_customer_data();

    function fetch_customer_data(query = '') {
        $.ajax({
            url: "/search/results",
            method: 'GET',
            data: {
                query: query
            },
            dataType: 'json',
            success: function(response) {
                $('.results').html(response['html'])
            }
        })
    }

    $(document).on('keyup', '#search', function() {
        var query = $(this).val();
        fetch_customer_data(query);
    });
</script> -->
@stop