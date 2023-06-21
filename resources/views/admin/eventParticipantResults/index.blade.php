@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <style>
        .mt-100 {
            margin-top: 100px
        }

        /* body {
        background: #00B4DB;
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
        background: linear-gradient(to right, #0083B0, #00B4DB);
        color: #514B64;
        min-height: 100vh
    } */

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />

    @stop

        {{-- Page content --}}
        @section('content')

        <section class="content-header">
            <!--section starts-->
            <h1>Event Participants Results</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="">
                        <i class="material-icons breadmaterial">home</i>

                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li class="active">Event Participants Results</li>
            </ol>
        </section>
        <!--section ends-->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable" style="min-height:900px;">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                               Event Participants Results
                            </h3>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <!-- <div class="col-md-2">

                                    <select id="club" class="form-control multiselect club" placeholder="Select Club"
                                        multiple>
                                        <option value="duplicate5">all</option>
                                        @foreach($clubs as $club)
                                            <option value={{ $club->id }}>{{ $club->club_name }}</option>
                                        @endforeach

                                    </select>
                                </div> -->
                                <div class="col-md-3">

                                <select id="league" class="form-control multiselect league"
                                 placeholder="">
                                    <option value="0">Select League</option>

                                    @foreach($leagues as $league)
                                        <option value={{ $league->id }}>{{ $league->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-3">

                                <select id="event" class="form-control multiselect event" placeholder=""
                                    >
                                    <option value="0">Select Event</option>
                                    @foreach($mainEvents as $mainEvent)
                                        <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-md-2">
                                <select id="age" class="form-control multiselect age" placeholder=""
                                    >
                                    <option value="0">Select Age Group</option>
                                    @foreach($ageGroups as $ageGroup)
                                        <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                                    @endforeach
                                </select>

                                </div>
                                <div class="col-md-2">

                                    <select id="gender" class="form-control multiselect gender"
                                        placeholder="" >
                                        <option value="0">Select Gender</option>
                                        @foreach($genders as $gender)
                                            <option value={{ $gender->id }}>{{ $gender->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                               
                             




                            </div>
                            
                            <br>
                            <div class="table-responsive">


                                @include('admin.eventParticipantResults.search')

                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Basic Table Ends Here-->
        </section>

       
        <!-- content -->
        @stop

            {{-- page level scripts --}}
            @section('footer_scripts')


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
                integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                 $(document).on('keyup', '.varu', function(e) {
                   var agegroupgenderuser=$(this).data('id');
                   var field=$(this).data('field');
                   var value=$(this).val();
                   var gender=$(this).data('gender');
                    $.ajax({
                        type: 'POST',
                        url: '/event/participant/changeResults/'+agegroupgenderuser,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "value":value,
                            "field":field,
                            'gender':gender
                        },
                        success: function (response) {
                        }
                    });
                });
                $(document).ready(function () {


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
                    var multipleCancelButton = new Choices('#club', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });

                });
 
                $("#btn").click(function () {
                    $("#ep-print").print();
                });
                var obj = {};
                var leagueData ;
                var genderData ;
                var eventData ;
                var ageData ;
                var clubData ;


                $("#league").on('change', function () {
                    genderData=$(".gender option:selected").val();
                    leagueData=$(".league option:selected").val();
                    ageData=$(".age option:selected").val();
                    eventData=$(".event option:selected").val();
                    clubData=$(".club option:selected").val();
                    obj['gender'] = genderData;
                    obj['league'] = leagueData;
                    obj['age'] = ageData;
                    obj['event'] = eventData;
                    obj['club'] = clubData;
                   
                    $.ajax({
                        type: 'POST',
                        url: '/event/participantResults/search',
                        data: {
                            "_token": "{{ csrf_token() }}",

                            "obj": obj,
                        },
                        success: function (response) {
                            $('.evePart').html(response['html'])
                        }
                    });
                });
                //gender

                $("#gender").on('change', function () {
                    genderData=$(".gender option:selected").val();
                    leagueData=$(".league option:selected").val();
                    ageData=$(".age option:selected").val();
                    eventData=$(".event option:selected").val();
                    clubData=$(".club option:selected").val();
                    obj['gender'] = genderData;
                    obj['league'] = leagueData;
                    obj['age'] = ageData;
                    obj['event'] = eventData;
                    obj['club'] = clubData;
                   
                    $.ajax({
                        type: 'POST',
                        url: '/event/participantResults/search',
                        data: {
                            "_token": "{{ csrf_token() }}",

                            "obj": obj,
                        },
                        success: function (response) {
                            $('.evePart').html(response['html'])
                        }
                    });
                });
                //name

                //country
                $("#age").on('change', function () {
                    genderData=$(".gender option:selected").val();
                    leagueData=$(".league option:selected").val();
                    ageData=$(".age option:selected").val();
                    eventData=$(".event option:selected").val();
                    clubData=$(".club option:selected").val();
                    obj['gender'] = genderData;
                    obj['league'] = leagueData;
                    obj['age'] = ageData;
                    obj['event'] = eventData;
                    obj['club'] = clubData;
                   
                    $.ajax({
                        type: 'POST',
                        url: '/event/participantResults/search',
                        data: {
                            "_token": "{{ csrf_token() }}",

                            "obj": obj,
                        },
                        success: function (response) {
                            $('.evePart').html(response['html'])
                        }
                    });
                });
                $("#event").on('change', function () {
                    genderData=$(".gender option:selected").val();
                    leagueData=$(".league option:selected").val();
                    ageData=$(".age option:selected").val();
                    eventData=$(".event option:selected").val();
                    clubData=$(".club option:selected").val();
                    obj['gender'] = genderData;
                    obj['league'] = leagueData;
                    obj['age'] = ageData;
                    obj['event'] = eventData;
                    obj['club'] = clubData;
                   
                    $.ajax({
                        type: 'POST',
                        url: '/event/participantResults/search',
                        data: {
                            "_token": "{{ csrf_token() }}",

                            "obj": obj,
                        },
                        success: function (response) {
                            $('.evePart').html(response['html'])
                        }
                    });
                });
                $("#club").on('change', function () {
                    genderData=$(".gender option:selected").val();
                    leagueData=$(".league option:selected").val();
                    ageData=$(".age option:selected").val();
                    eventData=$(".event option:selected").val();
                    clubData=$(".club option:selected").val();
                    obj['gender'] = genderData;
                    obj['league'] = leagueData;
                    obj['age'] = ageData;
                    obj['event'] = eventData;
                    obj['club'] = clubData;
                   
                    $.ajax({
                        type: 'POST',
                        url: '/event/participantResults/search',
                        data: {
                            "_token": "{{ csrf_token() }}",

                            "obj": obj,
                        },
                        success: function (response) {
                            $('.evePart').html(response['html'])
                        }
                    });
                });
               
            </script>
            @stop
