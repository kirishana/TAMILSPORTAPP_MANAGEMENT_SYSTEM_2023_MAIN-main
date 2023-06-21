@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Club Teams
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />


@stop
<!--  -->

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Reports</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Reports</a></li>
        <li class="active">Club Events</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  ">group</i>
                    Club Events
                    
                </h4>
            </div>
        <div class="panel-body">

            <ul style="background:none" class="nav  nav-tabs">
                <li class="active">
                    <a class="panel-title" href="#tab1" data-toggle="tab">
                        Group Events</a>
                </li>
                <li>
                    <a class="panel-title" href="#tab2" data-toggle="tab">
                       Individual Events</a>
                </li>



            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab1">
                    <div class="row">
                        <div class="panel-body">
                            <div class="row">
                            <div class="col-md-3">
                        <select id="organization" class="form-control multiselect organization" placeholder="Select Organization">
                            <option value="0">Select Organization</option>
                            @foreach($organizations as $organization)
                            <option value={{ $organization->id }}>{{ $organization->name }}</option>
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
                        <select id="status" class="form-control multiselect state" placeholder="Select Event Status">
                            <option value="5">Select Event Status</option>
                            <option value="0">On Going</option>
                            <option value="2">Not Started</option>
                            <option value="1">Finished</option>
                            <option value="10">Cancelled</option>

                        </select>
                    </div>


<div class="col-md-3 export-button" style="margin-top: 35px; display:flex; justify-content:flex-end;">
    <a id="eventbtn"  style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;right;margin-right:5px;"class="img-responsive" /> </a>
    <a href="/report/clubevent/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/report/clubevent/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
<div class="panel-body">
            @include('admin.reports.clubteam.clubevents_table')
            </div>
            <div style="display:none;">
    @include('admin.reports.clubteam.clubevents_print')
</div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" id="tab2">
                    <div class="row">
                        <div class="panel-body">
                            <div class="row">
            <ul style="background:none" class="nav  nav-tabs">
                <li class="active">
                    <a class="panel-title" href="#tab3" data-toggle="tab">
                        Self Registered Events</a>
                </li>
                <li>
                    <a class="panel-title" href="#tab4" data-toggle="tab">
                        Club Admin Registered Events</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="tab3">
                    <div class="row">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input id="name" value="" name="search" placeholder="Search Name" type="text" style="
        width: 100%;
        padding: 10px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
                                </div>
                                <div class="col-md-2">
                                <select id="AgeGroup" class="form-control multiselect AgeGroup" placeholder="Select AgeGroup">
                                        <option value="0">Select AgeGroup</option>
                                        <?php $ageGroups=\App\Models\AgeGroup::all(); ?>
                                        @foreach($ageGroups as $ageGroup)
                                            <option value={{ $ageGroup->name }}>{{ $ageGroup->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select id="League" class="form-control multiselect league" placeholder="Select League">
                                        <option value="0">Select League</option>
                                        @foreach($leagues as $league)
                                            <option value={{ $league->id }}>{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="Gender" class="form-control multiselect Gender" placeholder="Select Gender">
                                        <option value="0">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="Event" class="form-control multiselect Event" placeholder="Select Event">
                                        <option value="0">Select Event</option>
                                        @foreach($events as $event)
                                            @if($event->event_category_id!=3)
                                                <option value={{ $event->id }}>{{ $event->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 export-button pull-right"
                                    style="margin-top:2px; display:flex; justify-content:flex-end;">
                                    <a id="eventbtn10" style="cursor:pointer"><img
                                            src="{{ asset('assets/images/print.png') }}"
                                            style="float: right;right;margin-right:5px;" class="img-responsive" /> </a>
                                    <a href="/report/individualSelf/export" target="_blank"> <img
                                            src="{{ asset('assets/images/pdf.png') }}"
                                            style="float: right;margin-right:5px;" class="img-responsive" /></a>
                                    <a href="/report/individualSelf/excel"> <img
                                            src="{{ asset('assets/images/excel.png') }}"
                                            style="float: right;margin-right:5px;" class="img-responsive" /></a>
                                </div>
                            </div>
                            <br>



                            <div class="">
                            @include('admin.reports.clubteam.individualEventsFilter')
                            </div>
                            <div style="display: none;">
                            @include('admin.reports.clubteam.individualEvSelfRegisterPreview')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab4">
                    <div class="row">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <input id="userName" value=" " name="name" placeholder="" type="text" style="
        width: 100%;
        padding: 10px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
                                </div>
                                <div class="col-md-2">
                                <select id="AgeGroup1" class="form-control multiselect AgeGroup1" placeholder="Select AgeGroup">
                                        <option value="0">Select AgeGroup</option>
                                        <?php $ageGroups=\App\Models\AgeGroup::all(); ?>
                                        @foreach($ageGroups as $ageGroup)
                                            <option value={{ $ageGroup->name }}>{{ $ageGroup->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select id="League1" class="form-control multiselect League1" placeholder="Select League">
                                        <option value="0">Select League</option>
                                        @foreach($leagues as $league)
                                            <option value={{ $league->id }}>{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="Gender1" class="form-control multiselect Gender1" placeholder="Select Gender">
                                        <option value="0">Select Gender</option>
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="Event1" class="form-control multiselect Event1" placeholder="Select Event">
                                        <option value="0">Select Event</option>
                                        @foreach($events as $event)
                                            @if($event->event_category_id!=3)
                                                <option value={{ $event->id }}>{{ $event->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 export-button pull-right"
                                    style="margin-top:2px; display:flex; justify-content:flex-end;">
                                    <a id="eventbtn20" style="cursor:pointer"><img
                                            src="{{ asset('assets/images/print.png') }}"
                                            style="float: right;right;margin-right:5px;" class="img-responsive" /> </a>
                                    <a href="/report/individualclubReg/export" target="_blank"> <img
                                            src="{{ asset('assets/images/pdf.png') }}"
                                            style="float: right;margin-right:5px;" class="img-responsive" /></a>
                                    <a href="/report/individualclubReg/excel"> <img
                                            src="{{ asset('assets/images/excel.png') }}"
                                            style="float: right;margin-right:5px;" class="img-responsive" /></a>
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                @include('admin.reports.clubteam.individualClubRegFilter')
                            </div>
                        </div>
                        <div style="display: none;">
                                @include('admin.reports.clubteam.individualClubRegPreview')
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
$(document).ready(function() {

      
var multipleCancelButton = new Choices('#organization', {
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

var multipleCancelButton = new Choices('#status', {
    removeItemButton: true,
    maxItemCount: 10000,
    searchResultLimit: 10000,
    renderChoiceLimit: 10000
});


});


$("#eventbtn").click(function() {
        $("#eventprnt").print();
    });

    var obj = {};
    var leagueData;
    var organizationData;
    var statusData;
    

    $("#organization").on('change', function() {
        organizationData=$(".organization option:selected").val();
        leagueData=$(".league option:selected").val();
        statusData=$("#status option:selected").val();
        obj['organization'] = organizationData;
        obj['league'] = leagueData;
        obj['status'] = statusData;
        $.ajax({
            type: 'POST',
            url: '/report/clubevent/filter',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('#clubEvents').html(response['html'])
                $('.clubEvents').html(response['html2'])
            }
        });
    });
    $("#league").on('change', function() {
        organizationData=$(".organization option:selected").val();
        leagueData=$(".league option:selected").val();
        statusData=$("#status option:selected").val();
        obj['organization'] = organizationData;
        obj['league'] = leagueData;
        obj['status'] = statusData;
        $.ajax({
            type: 'POST',
            url: '/report/clubevent/filter',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('#clubEvents').html(response['html'])
                $('.clubEvents').html(response['html2'])

            }
        });
    });
   
    
      //country
      $("#status").on('change', function() {
        organizationData=$(".organization option:selected").val();
        leagueData=$(".league option:selected").val();
        statusData=$("#status option:selected").val();
        obj['organization'] = organizationData;
        obj['league'] = leagueData;
        obj['status'] = statusData;
        $.ajax({
            type: 'POST',
            url: '/report/clubevent/filter',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('#clubEvents').html(response['html'])
                $('.clubEvents').html(response['html2'])

            }
        });
    });
    

                        $(document).ready(function () {


                            var multipleCancelButton = new Choices('#Event', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });

                            var multipleCancelButton = new Choices('#League', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });

                            var multipleCancelButton = new Choices('#Gender', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });
                            var multipleCancelButton = new Choices('#AgeGroup', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });


                        });


                        $("#eventbtn10").click(function () {
                            $("#eventprnt10").print();
                        });

                        var obj = {};
                        var LeagueData2;
                        var EventData;
                        var GenderData;
                        var user_name;
                        var AgeGroupData;
                        $("#Event").on('change', function () {
                            EventData=$("#Event option:selected").val();
                            LeagueData2=$("#League option:selected").val();
                            GenderData=$("#Gender option:selected").val();
                            AgeGroupData=$("#AgeGroup option:selected").val();
                            user_name = document.getElementById('name').value;
                            obj['Event'] = EventData;
                            obj['League'] = LeagueData2;
                            obj['Gender'] = GenderData;
                            obj['name'] = user_name;
                            obj['AgeGroup'] = AgeGroupData;
                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividual/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#individual').html(response['html'])
                                    $('.individual').html(response['html2'])
                                }
                            });
                        });
                        $("#name").on('keyup', function () {
                            EventData=$("#Event option:selected").val();
                            LeagueData2=$("#League option:selected").val();
                            GenderData=$("#Gender option:selected").val();
                            AgeGroupData=$("#AgeGroup option:selected").val();
                            user_name = document.getElementById('name').value;
                            obj['Event'] = EventData;
                            obj['League'] = LeagueData2;
                            obj['Gender'] = GenderData;
                            obj['name'] = user_name;
                            obj['AgeGroup'] = AgeGroupData;

                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividual/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#individual').html(response['html'])
                                    $('.individual').html(response['html2'])

                                }
                            });
                        });
                        $("#AgeGroup").on('change', function () {
                            EventData=$("#Event option:selected").val();
                            LeagueData2=$("#League option:selected").val();
                            GenderData=$("#Gender option:selected").val();
                            AgeGroupData=$("#AgeGroup option:selected").val();
                            user_name = document.getElementById('name').value;
                            obj['Event'] = EventData;
                            obj['League'] = LeagueData2;
                            obj['Gender'] = GenderData;
                            obj['name'] = user_name;
                            obj['AgeGroup'] = AgeGroupData;

                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividual/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#individual').html(response['html'])
                                    $('.individual').html(response['html2'])

                                }
                            });
                        });

                        //country
                        $("#League").on('change', function () {
                            EventData=$("#Event option:selected").val();
                            LeagueData2=$("#League option:selected").val();
                            GenderData=$("#Gender option:selected").val();
                            AgeGroupData=$("#AgeGroup option:selected").val();
                            user_name = document.getElementById('name').value;
                            obj['Event'] = EventData;
                            obj['League'] = LeagueData2;
                            obj['Gender'] = GenderData;
                            obj['name'] = user_name;
                            obj['AgeGroup'] = AgeGroupData;
                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividual/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#individual').html(response['html'])
                                    $('.individual').html(response['html2'])

                                }
                            });
                        });
                        //country
                        $("#Gender").on('change', function () {
                            EventData=$("#Event option:selected").val();
                            LeagueData2=$("#League option:selected").val();
                            GenderData=$("#Gender option:selected").val();
                            AgeGroupData=$("#AgeGroup option:selected").val();
                            user_name = document.getElementById('name').value;
                            obj['Event'] = EventData;
                            obj['League'] = LeagueData2;
                            obj['Gender'] = GenderData;
                            obj['name'] = user_name;
                            obj['AgeGroup'] = AgeGroupData;
                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividual/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#individual').html(response['html'])
                                    $('.individual').html(response['html2'])

                                }
                            });
                        });
                        $(document).ready(function () {
                            var multipleCancelButton = new Choices('#Event1', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });

                            var multipleCancelButton = new Choices('#League1', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });

                            var multipleCancelButton = new Choices('#Gender1', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });
                            var multipleCancelButton = new Choices('#AgeGroup1', {
                                removeItemButton: true,
                                maxItemCount: 10000,
                                searchResultLimit: 10000,
                                renderChoiceLimit: 10000
                            });


                        });


                        $("#eventbtn20").click(function () {
                            $("#eventprnt20").print();
                        });

                        var obj = {};
                        var LeagueData1;
                        var EventData1;
                        var GenderData1;
                        var user_name1;
                        var AgeGroupData1;


                        $("#Event1").on('change', function () {
                            EventData1=$("#Event1 option:selected").val();
                            LeagueData1=$("#League1 option:selected").val();
                            GenderData1=$("#Gender1 option:selected").val();
                            AgeGroupData1=$("#AgeGroup1 option:selected").val();
                            user_name1 = document.getElementById('userName').value;
                            obj['Event1'] = EventData1;
                            obj['League1'] = LeagueData1;
                            obj['Gender1'] = GenderData1;
                            obj['userName'] = user_name1;
                            obj['AgeGroup1'] = AgeGroupData1;

                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividualclubReg/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#self').html(response['html'])
                                    $('.self').html(response['html2'])
                                }
                            });
                        });
                        $("#userName").on('keyup', function () {
                            EventData1=$("#Event1 option:selected").val();
                            LeagueData1=$("#League1 option:selected").val();
                            GenderData1=$("#Gender1 option:selected").val();
                            AgeGroupData1=$("#AgeGroup1 option:selected").val();
                            user_name1 = document.getElementById('userName').value;
                            obj['Event1'] = EventData1;
                            obj['League1'] = LeagueData1;
                            obj['Gender1'] = GenderData1;
                            obj['userName'] = user_name1;
                            obj['AgeGroup1'] = AgeGroupData1;

                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividualclubReg/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#self').html(response['html'])
                                    $('.self').html(response['html2'])
                                }
                            });
                        });
                        $("#AgeGroup1").on('change', function () {
                            EventData1=$("#Event1 option:selected").val();
                            LeagueData1=$("#League1 option:selected").val();
                            GenderData1=$("#Gender1 option:selected").val();
                            AgeGroupData1=$("#AgeGroup1 option:selected").val();
                            user_name1 = document.getElementById('userName').value;
                            obj['Event1'] = EventData1;
                            obj['League1'] = LeagueData1;
                            obj['Gender1'] = GenderData1;
                            obj['userName'] = user_name1;
                            obj['AgeGroup1'] = AgeGroupData1;

                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividualclubReg/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#self').html(response['html'])
                                    $('.self').html(response['html2'])
                                }
                            });
                        });

                        //country
                        $("#League1").on('change', function () {
                            EventData1=$("#Event1 option:selected").val();
                            LeagueData1=$("#League1 option:selected").val();
                            GenderData1=$("#Gender1 option:selected").val();
                            AgeGroupData1=$("#AgeGroup1 option:selected").val();
                            user_name1 = document.getElementById('userName').value;
                            obj['Event1'] = EventData1;
                            obj['League1'] = LeagueData1;
                            obj['Gender1'] = GenderData1;
                            obj['userName'] = user_name1;
                            obj['AgeGroup1'] = AgeGroupData1;
                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividualclubReg/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#self').html(response['html'])
                                    $('.self').html(response['html2'])

                                }
                            });
                        });


                        //country
                        $("#Gender1").on('change', function () {
                            EventData1=$("#Event1 option:selected").val();
                            LeagueData1=$("#League1 option:selected").val();
                            GenderData1=$("#Gender1 option:selected").val();
                            AgeGroupData1=$("#AgeGroup1 option:selected").val();
                            user_name1 = document.getElementById('userName').value;
                            obj['Event1'] = EventData1;
                            obj['League1'] = LeagueData1;
                            obj['Gender1'] = GenderData1;
                            obj['userName'] = user_name1;
                            obj['AgeGroup1'] = AgeGroupData1;

                            $.ajax({
                                type: 'POST',
                                url: '/report/clubIndividualclubReg/filter',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "obj": obj,
                                },
                                success: function (response) {
                                    $('#self').html(response['html'])
                                    $('.self').html(response['html2'])
                                }
                            });
                        });
                    </script>

@stop
