@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Participants
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <style>
        .mt-100 {
            margin-top: 100px
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    @stop

        {{-- Page content --}}
        @section('content')

        <section class="content-header">
            <!--section starts-->
            <h1>Participants And Teams</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="">
                        <i class="material-icons breadmaterial">home</i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Reports</a>
                </li>
                <li class="active">Participants And Teams</li>
            </ol>
        </section>
        <!--section ends-->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Participants And Teams
                            </h3>
                        </div>
                        <div class="row">

<div>

    <ul style="background:none" class="nav nav-tabs ">
        <li class="active">
            <a class="panel-title" href="#tab1" data-toggle="tab">
            Individual Events</a>
        </li>
        <li>
            <a class="panel-title" href="#tab2" data-toggle="tab">
            Group Events</a>
        </li>


    </ul>
    <div class="tab-content">
     <div class="tab-pane fade active in" id="tab1">
       
     @if(Auth::user()->hasRole(7))
<div>
                            <div class="panel-body">
                             

                            <div class="row">
                            <div class="col-md-3">

                                <select id="organizationPlayer" class="form-control multiselect organization" placeholder="Select Organization">
                                    <option value="0">Select Organization</option>
                                    @foreach($organizations as $organization)
                                        <option value={{ $organization->id }}>{{ $organization->name }}</option>
                                     @endforeach
                                </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="leaguePlayer" class="form-control multiselect league" placeholder="Select League" >
                                        <option value="0">Select League</option>
                                        @foreach($leagues as $league)
                                            <option value={{ $league->id }}>{{ $league->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select id="eventPlayer" class="form-control multiselect event" placeholder="Select Event">
                                        <option value="0">Select Event</option>
                                        @foreach($userevents as $userevent)
                                        @foreach($userevent->events as $event)
                                            <option value={{ $event->id }}>{{ $event->mainEvent->name }}</option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-3"></div>
        <br>
                                    <div class="col-md-2 pull-right">
                                        <a href="/participants/excel"> <img
                                                src="{{ asset('assets/images/excel.png') }}"
                                                style="float: right;margin-right:5px;size: 25px;" class="img-responsive" />
                                        </a>
                                        <a href="/participants/export" target="_blank"> <img
                                                src="{{ asset('assets/images/pdf.png') }}"
                                                style="float: right;margin-right:5px;" class="img-responsive" />
                                        </a>
                                        <a id="btn1" style="cursor:pointer"><img
                                                src="{{ asset('assets/images/print.png') }}"
                                                style="float: right; margin-right:5px;" class="img-responsive" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div style="display:none;">
                                @include('admin.PDF.PartForPlayerPrint')
                            </div>
                            <div class="table-responsive">
                                @include('admin.PDF.participantsForPlayer')
                            </div>
                        </div>
                        @else
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2">
                                    <input id="user_name" data-name="user_name" name="user_name[]"
                                        placeholder=" Name" type="text" style="
        width: 100%;
        padding: 12px 20px;
        margin: 28px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    ">

                                </div>
                                <div class="col-md-2">
                                    <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                                    <select id="league" class="form-control multiselect league" placeholder="Select League">
                                        <option value="0">Select League</option>
                                        @foreach($leagues as $league)
                                            <option value={{ $league->id }}>{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="event" class="form-control multiselect event" placeholder="Select Event">
                                        <option value="0">Select Event</option>
                                        @foreach($list_main_events as $event)
                                        @if($event->event_category_id!=3)
                                            <option value={{ $event->id }}>{{ $event->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="club" class="form-control multiselect club" placeholder="Select Club">
                                        <option value="0">Select Club</option>
                                        @foreach($clubs as $club)
                                            <option value={{ $club->id }}>{{ $club->club_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="col-md-2">
                                        <select id="age_group" class="form-control multiselect age_group" placeholder="Select AgeGroup">
                                            <option value="0">Select AgeGroup</option>
                                            @foreach($ageGroups as $ageGroup)
                                                <option value={{ $ageGroup->name }}>{{ $ageGroup->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender">
                                            <option value="0">Select Gender</option>
                                            @foreach($genders as $gender)
                                                <option value={{ $gender->id }}>{{ $gender->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>
                            <div class="row ">
                            <div class="col-md-2 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                                <a id="btn10" style="cursor:pointer;float: right;margin-right:5px;"><img
                                        src="{{ asset('assets/images/print.png') }}"
                                        class="img-responsive" />
                                </a>
                                <a href="/participants/export" target="_blank"> <img
                                        src="{{ asset('assets/images/pdf.png') }}"
                                        style="float: right;margin-right:5px;" class="img-responsive" />
                                </a>
                                <a href="/participants/excel"> <img
                                        src="{{ asset('assets/images/excel.png') }}"
                                        style="float: right;margin-right:5px;" class="img-responsive" />
                                </a>
                                </div>
                            </div>
                            <br>
                            <div style="display:none;">
                                @include('admin.PDF.participantsPreview')
                            </div>
                            <div class="table-responsive">
                                @include('admin.PDF.participants')
                            </div>
                        </div>
                        @endif
        </div>
        @if(!Auth::user()->hasRole(7))
        <div class="tab-pane fade  in" id="tab2" disabled="disabled">      
        <div class="panel-body">
                               <div class="row">
                                   <div class="col-md-2">
                                       <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                       <select id="leagueGroup" class="form-control multiselect leagueGroup" placeholder="Select League">
                                           <option value="0">Select League</option>
                                           @foreach($leagues as $league)
                                               <option value={{ $league->id }}>{{ $league->name }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="col-md-3">
                                       <select id="eventGroup" class="form-control multiselect eventGroup" placeholder="Select Event">
                                           <option value="0">Select Event</option>
                                           @foreach($list_main_events as $event)
                                           @if($event->event_category_id==3)
                                               <option value={{ $event->id }}>{{ $event->name }}</option>
                                               @endif
                                           @endforeach
                                       </select>
                                   </div>
                                   <div class="col-md-3">
                                       <select id="clubGroup" class="form-control multiselect clubGroup" placeholder="Select Club">
                                           <option value="0">Select Club</option>
                                           @foreach($clubs as $club)
                                               <option value={{ $club->id }}>{{ $club->club_name }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                                       <div class="col-md-2">
                                           <select id="age_groupGroup" class="form-control multiselect age_groupGroup" placeholder="Select Age Group">
                                               <option value="0">Select AgeGroup</option>
                                               @foreach($ageGroups as $ageGroup)
                                                   <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                                               @endforeach
                                           </select>
                                       </div>
                                       <div class="col-md-2">
                                           <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                           <select id="genderGroup" class="form-control multiselect genderGroup" placeholder="Select Gender">
                                               <option value="0">Select Gender</option>
                                               @foreach($genders as $gender)
                                                   <option value={{ $gender->id }}>{{ $gender->name }}</option>
                                               @endforeach
                                           </select>
                                       </div>
                               </div>
                               <div class="row ">
                               <div class="col-md-2 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                                   <a id="btn50" style="cursor:pointer;float: right;margin-right:5px;"><img
                                           src="{{ asset('assets/images/print.png') }}"
                                           class="img-responsive" />
                                   </a>
                                   <a href="/group/export" target="_blank"> <img
                                           src="{{ asset('assets/images/pdf.png') }}"
                                           style="float: right;margin-right:5px;" class="img-responsive" />
                                   </a>
                                   <a href="/group/excel"> <img
                                           src="{{ asset('assets/images/excel.png') }}"
                                           style="float: right;margin-right:5px;" class="img-responsive" />
                                   </a>
                                   </div>
                               </div>
                               <br>
                               <div class="table-responsive">
                                   @include('admin.PDF.teams')
                               </div>
                               <div style="display:none;">
                                   @include('admin.PDF.TeamsPrint')
                               </div>
                           </div>
        </div>
</div>
@endif
</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- content -->
        @stop
            {{-- page level scripts --}}
            @section('footer_scripts')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
                integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                $(document).ready(function () {
                    var multipleCancelButton = new Choices('#gender', {
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
                    var multipleCancelButton = new Choices('#league', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });               
                    var multipleCancelButton = new Choices('#age_group', {
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
                $("#btn10").click(function () {
                    $("#suvarna").print();
                });
                var obj = {};
                var genderData;
                var clubData;
                var eventData;
                var leagueData;
                var age_groupData;
                var user_name;

                $("#user_name").on('keyup', function () {
                genderData=$(".gender option:selected").val();
                eventData=$(".event option:selected").val();
                leagueData=$(".league option:selected").val();
                age_groupData=$(".age_group option:selected").val();
                clubData=$(".club option:selected").val();
                user_name = document.getElementById('user_name').value;
                    obj['gender'] = genderData;
                    obj['event'] = eventData;
                    obj['name'] = user_name;
                    obj['league'] = leagueData;
                    obj['age_group'] = age_groupData;
                    obj['club'] = clubData;
                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.filter').html(response['html'])
                        }
                    });

                });


                $("#gender").on('change', function () {
                genderData=$(".gender option:selected").val();
                eventData=$(".event option:selected").val();
                leagueData=$(".league option:selected").val();
                age_groupData=$(".age_group option:selected").val();
                clubData=$(".club option:selected").val();
                user_name = document.getElementById('user_name').value;
                    obj['gender'] = genderData;
                    obj['event'] = eventData;
                    obj['name'] = user_name;
                    obj['league'] = leagueData;
                    obj['age_group'] = age_groupData;
                    obj['club'] = clubData;
                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.filter').html(response['html'])
                        }
                    });

                });



                //event
                $("#event").on('change', function () {
                    genderData=$(".gender option:selected").val();
                eventData=$(".event option:selected").val();
                leagueData=$(".league option:selected").val();
                age_groupData=$(".age_group option:selected").val();
                clubData=$(".club option:selected").val();
                user_name = document.getElementById('user_name').value;
                    obj['gender'] = genderData;
                    obj['event'] = eventData;
                    obj['name'] = user_name;
                    obj['league'] = leagueData;
                    obj['age_group'] = age_groupData;
                    obj['club'] = clubData;

                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },
                        success: function (response) {
                            $('.filter').html(response['html'])
                        }
                    });

                });

                $("#league").on('change', function () {
                    genderData=$(".gender option:selected").val();
                eventData=$(".event option:selected").val();
                leagueData=$(".league option:selected").val();
                age_groupData=$(".age_group option:selected").val();
                clubData=$(".club option:selected").val();
                user_name = document.getElementById('user_name').value;
                    obj['gender'] = genderData;
                    obj['event'] = eventData;
                    obj['name'] = user_name;
                    obj['league'] = leagueData;
                    obj['age_group'] = age_groupData;
                    obj['club'] = clubData;
                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.filter').html(response['html'])
                        }
                    });

                });
                $("#club").on('change', function () {
                    genderData=$(".gender option:selected").val();
                eventData=$(".event option:selected").val();
                leagueData=$(".league option:selected").val();
                age_groupData=$(".age_group option:selected").val();
                clubData=$(".club option:selected").val();
                user_name = document.getElementById('user_name').value;
                    obj['gender'] = genderData;
                    obj['event'] = eventData;
                    obj['name'] = user_name;
                    obj['league'] = leagueData;
                    obj['age_group'] = age_groupData;
                    obj['club'] = clubData;
                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.filter').html(response['html'])
                        }
                    });

                });
                $("#age_group").on('change', function () {
                    genderData=$(".gender option:selected").val();
                eventData=$(".event option:selected").val();
                leagueData=$(".league option:selected").val();
                age_groupData=$(".age_group option:selected").val();
                clubData=$(".club option:selected").val();
                user_name = document.getElementById('user_name').value;
                    obj['gender'] = genderData;
                    obj['event'] = eventData;
                    obj['name'] = user_name;
                    obj['league'] = leagueData;
                    obj['age_group'] = age_groupData;
                    obj['club'] = clubData;
                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.filter').html(response['html'])
                        }
                    });

                });
                $(document).ready(function () {

                   
                    var multipleCancelButton = new Choices('#organizationPlayer', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                 
                    var multipleCancelButton = new Choices('#eventPlayer', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                   
                    var multipleCancelButton = new Choices('#leaguePlayer', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                 


                });
                $("#btn1").click(function () {
                    $("#player").print();
                });
                var obj = {};
                var eventPlayerData;
                var leaguePlayerData;
                var organizationPlayerData;

                $("#organizationPlayer").on('change', function () {
                    organizationPlayerData=$(".organization option:selected").val();
                    eventPlayerData=$(".event option:selected").val();
                    leaguePlayerData=$(".league option:selected").val();
                    obj['event'] = eventPlayerData;
                    obj['league'] = leaguePlayerData;
                    obj['organization'] = organizationPlayerData;
                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.part').html(response['html'])
                        }
                    });

                });
                $("#leaguePlayer").on('change', function () {
                    organizationPlayerData=$(".organization option:selected").val();
                    eventPlayerData=$(".event option:selected").val();
                    leaguePlayerData=$(".league option:selected").val();
                    obj['event'] = eventPlayerData;
                    obj['league'] = leaguePlayerData;
                    obj['organization'] = organizationPlayerData;

                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.part').html(response['html'])
                        }
                    });

                });
                $("#eventPlayer").on('change', function () {
                    organizationPlayerData=$(".organization option:selected").val();
                    eventPlayerData=$(".event option:selected").val();
                    leaguePlayerData=$(".league option:selected").val();
                    obj['event'] = eventPlayerData;
                    obj['league'] = leaguePlayerData;
                    obj['organization'] = organizationPlayerData;

                    $.ajax({
                        type: 'POST',
                        url: '/participants/search',
                        // dataType: 'json',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.part').html(response['html'])
                        }
                    });

                });
///////


               $(document).ready(function () {

                    var multipleCancelButton = new Choices('#genderGroup', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                 
                    var multipleCancelButton = new Choices('#eventGroup', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                   
                    var multipleCancelButton = new Choices('#leagueGroup', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                 
                    var multipleCancelButton = new Choices('#age_groupGroup', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                 
                    var multipleCancelButton = new Choices('#clubGroup', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });


                });
                $("#btn50").click(function () {
                    $("#teamPrint").print();
                });
                var obj = {};
                var genderGroupData;
                var clubGroupData;
                var eventGroupData;
                var leagueGroupData;
                var age_groupGroupData;
             
                $("#eventGroup").on('change', function () {
                    genderGroupData=$(".genderGroup option:selected").val();
                    eventGroupData=$(".eventGroup option:selected").val();
                    leagueGroupData=$(".leagueGroup option:selected").val();
                    age_groupGroupData=$(".age_groupGroup option:selected").val();
                    clubGroupData=$(".clubGroup option:selected").val();

                    obj['genderGroup'] = genderGroupData;
                    obj['eventGroup'] = eventGroupData;
                    obj['leagueGroup'] = leagueGroupData;
                    obj['age_groupGroup'] = age_groupGroupData;
                    obj['clubGroup'] = clubGroupData;

                    $.ajax({
                        type: 'POST',
                        url: '/group/search',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },
                        success: function (response) {
                            $('.teams').html(response['html'])
                            $('.t').html(response['html2'])

                        }
                    });

                });

                $("#leagueGroup").on('change', function () {
                    genderGroupData=$(".genderGroup option:selected").val();
                    eventGroupData=$(".eventGroup option:selected").val();
                    leagueGroupData=$(".leagueGroup option:selected").val();
                    age_groupGroupData=$(".age_groupGroup option:selected").val();
                    clubGroupData=$(".clubGroup option:selected").val();

                    obj['genderGroup'] = genderGroupData;
                    obj['eventGroup'] = eventGroupData;
                    obj['leagueGroup'] = leagueGroupData;
                    obj['age_groupGroup'] = age_groupGroupData;
                    obj['clubGroup'] = clubGroupData;

                    $.ajax({
                        type: 'POST',
                        url: '/group/search',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.teams').html(response['html'])
                            $('.t').html(response['html2'])
                        }
                    });

                });
                $("#clubGroup").on('change', function () {
                    genderGroupData=$(".genderGroup option:selected").val();
                    eventGroupData=$(".eventGroup option:selected").val();
                    leagueGroupData=$(".leagueGroup option:selected").val();
                    age_groupGroupData=$(".age_groupGroup option:selected").val();
                    clubGroupData=$(".clubGroup option:selected").val();

                    obj['genderGroup'] = genderGroupData;
                    obj['eventGroup'] = eventGroupData;
                    obj['leagueGroup'] = leagueGroupData;
                    obj['age_groupGroup'] = age_groupGroupData;
                    obj['clubGroup'] = clubGroupData;

                    $.ajax({
                        type: 'POST',
                        url: '/group/search',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.teams').html(response['html'])
                            $('.t').html(response['html2'])
                        }
                    });

                });
                $("#age_groupGroup").on('change', function () {
                    genderGroupData=$(".genderGroup option:selected").val();
                    eventGroupData=$(".eventGroup option:selected").val();
                    leagueGroupData=$(".leagueGroup option:selected").val();
                    age_groupGroupData=$(".age_groupGroup option:selected").val();
                    clubGroupData=$(".clubGroup option:selected").val();

                    obj['genderGroup'] = genderGroupData;
                    obj['eventGroup'] = eventGroupData;
                    obj['leagueGroup'] = leagueGroupData;
                    obj['age_groupGroup'] = age_groupGroupData;
                    obj['clubGroup'] = clubGroupData;

                    $.ajax({
                        type: 'POST',
                        url: '/group/search',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },
                        success: function (response) {
                            $('.teams').html(response['html'])
                            $('.t').html(response['html2'])
                        }
                    });

                });
                $("#genderGroup").on('change', function () {
                    genderGroupData=$(".genderGroup option:selected").val();
                    eventGroupData=$(".eventGroup option:selected").val();
                    leagueGroupData=$(".leagueGroup option:selected").val();
                    age_groupGroupData=$(".age_groupGroup option:selected").val();
                    clubGroupData=$(".clubGroup option:selected").val();

                    obj['genderGroup'] = genderGroupData;
                    obj['eventGroup'] = eventGroupData;
                    obj['leagueGroup'] = leagueGroupData;
                    obj['age_groupGroup'] = age_groupGroupData;
                    obj['clubGroup'] = clubGroupData;

                    $.ajax({
                        type: 'POST',
                        url: '/group/search',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },
                        success: function (response) {
                            $('.teams').html(response['html'])
                            $('.t').html(response['html2'])
                        }
                    });
                    
                });
            </script>
            @stop