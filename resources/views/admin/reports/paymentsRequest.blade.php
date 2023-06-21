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
            <h1>Payment Request</h1>
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
                <li class="active">Payment Request</li>
            </ol>
        </section>
        <!--section ends-->

        <section class="content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Payment Request
                            </h3>
                        </div>
                            <div class="panel-body">
                                <div>

                                    <ul style="background:none" class="nav  nav-tabs">
                                        <li class="active">
                                            <a class="panel-title" href="#tab1" data-toggle="tab">
                                                Single Events</a>
                                        </li>
                                        <li>
                                            <a class="panel-title" href="#tab2" data-toggle="tab">
                                                Group Events</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab1">
                                   
                                            <div class="row">
<div class="col-md-2">
    <input id="player_name" data-name="player_name" name="player_name[]"
        placeholder="Player Name" type="text" style="
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
    <input id="trans_id" data-name="trans_id" maxlength="11"
        name="trans_id[]" placeholder="Transaction ID" type="text"
        style="
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

    <select id="season" class="form-control multiselect season" placeholder="Select Season">
        <option value="0">Select Season</option>
        @foreach($seasons as $season)
            <option value={{ $season->id }}>{{ $season->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-md-2">
    <select id="league" class="form-control multiselect league" placeholder="Select League">
        <option value="0">Select League</option>
        @foreach($leagues as $league)
            <option value={{ $league->id }}>{{ $league->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="col-md-2">
    <select id="status" class="form-control multiselect status" placeholder="Select Status">
        <option value="0">Select Status</option>
        <option value='2'>Approved</option>
        <option value='1'>Pending</option>
        <option value='3'>Rejected</option>
    </select>
</div>
<div class="col-md-2">

    <select id="membership" class="form-control multiselect membership" placeholder="Select Membership">
        <option value="5">Select Membership</option>
        <option value='1'>SIL Member</option>
        <option value='0'>others</option>
    </select>
</div>
</div>
<div class="row">
                                    <div class="col-md-2 pull-right">                                                
                                                    <a href="/pay_request/excel"> <img
                                                            src="{{ asset('assets/images/excel.png') }}"
                                                            style="float: right;"
                                                            class="img-responsive" />
                                                    </a>
                                                    <a href="/pay_request/export" target="_blank"> <img
                                                            src="{{ asset('assets/images/pdf.png') }}"
                                                            style="float: right;margin-right:5px"
                                                            class="img-responsive" />
                                                    </a>
                                                    <a id="btn" style="cursor:pointer"><img
                                                            src="{{ asset('assets/images/print.png') }}"
                                                            style="float: right;margin-right:5px" class="img-responsive" />
                                                    </a>
                                                </div>
                                            </div>
                                            <br>

<div style="display:none;">
                                            @include('admin.reports.paymentsPreview')

                                        </div>

                                        <div class="table-responsive">
                                            @include('admin.reports.paymentsfilter')

                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                <div class="row">

<div class="col-md-2">
    <input id="club_name" data-name="club_name" name="club_name[]"
        placeholder="Club Name" type="text" style="
width: 100%;
padding: 12px 20px;
margin: 28px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
">
</div>
<div class="col-md-3">
    <input id="G-trans_id" data-name="G-trans_id" maxlength="11" name="G-trans_id[]"
        placeholder="Transaction ID" type="text" style="
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
    <select id="G-season" class="form-control multiselect G-season" placeholder="Select Season">
        <option value="0">Select Season</option>
        @foreach($seasons as $season)
            <option value={{ $season->id }}>{{ $season->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-2">
    <select id="G-league" class="form-control multiselect G-league" placeholder="Select League">
        <option value="0">Select League</option>
        @foreach($leagues as $league)
            <option value={{ $league->id }}>{{ $league->name }}</option>
        @endforeach
    </select>
</div>
<div class="col-md-3">
    <select id="G-status" class="form-control multiselect G-status" placeholder="Select Status">
        <option value="0">Select Status</option>
        <option value='1'>Processing</option>
        <option value='2'>Paid</option>
        <option value='3'>Pending</option>
        <option value='5'>Rejected</option>

    </select>
</div>

</div>
<div class="row">
                                    <div class="col-md-2 pull-right">                                      
                                        <a href="/G-participants/excel"> <img
                                                src="{{ asset('assets/images/excel.png') }}"
                                                style="float: right;margin-right:5px;" class="img-responsive" />
                                        </a>
                                        <a href="/G-participants/export" target="_blank"> <img
                                                src="{{ asset('assets/images/pdf.png') }}"
                                                style="float: right;margin-right:5px;" class="img-responsive" />
                                        </a>
                                        <a id="G-btn"> <img
                                                src="{{ asset('assets/images/print.png') }}"
                                                style="float: right;margin-right:5px;" class="img-responsive" />
                                        </a>  
                                                                                                              
                                  </div>
                                </div>
                                <br>
<div style="display:none;">
                                @include('admin.reports.paymentsreqPreview')

                            </div>

                            <div class="table-responsive">
                                @include('admin.reports.paymentsreqGroup')

                            </div>
                                </div>
                                    </div>
                                    </div>
                                </div>
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

                    var multipleCancelButton = new Choices('#season', {
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
                    var multipleCancelButton = new Choices('#league', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                    var multipleCancelButton = new Choices('#membership', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });

                });
                $("#btn").click(function () {
                    $("#print").print();
                });
                var obj = {};
                var trans_id;
                var statusData;
                var leagueData;
                var seasonData;
                var membershipData;
                var player_name;

                $("#player_name").on('keyup', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
                    membershipData=$(".membership option:selected").val();
                    trans_id = document.getElementById('trans_id').value;
                    player_name = document.getElementById('player_name').value;

                    obj['status'] = statusData;
                    obj['season'] = seasonData;
                    obj['league'] = leagueData;
                    obj['membership'] = membershipData;
                    obj['player_name'] = player_name;
                    obj['trans_id'] = trans_id;

                    $.ajax({
                        type: 'POST',
                        url: '/paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.request').html(response['html'])
                        }
                    });

                });


                $("#trans_id").on('keyup', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
                    membershipData=$(".membership option:selected").val();
                    trans_id = document.getElementById('trans_id').value;
                    player_name = document.getElementById('player_name').value;

                    obj['status'] = statusData;
                    obj['season'] = seasonData;
                    obj['league'] = leagueData;
                    obj['membership'] = membershipData;
                    obj['player_name'] = player_name;
                    obj['trans_id'] = trans_id;
                    $.ajax({
                        type: 'POST',
                        url: '/paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.request').html(response['html'])
                        }
                    });

                });


                $("#status").on('change', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
                    membershipData=$(".membership option:selected").val();
                    trans_id = document.getElementById('trans_id').value;
                    player_name = document.getElementById('player_name').value;

                    obj['status'] = statusData;
                    obj['season'] = seasonData;
                    obj['league'] = leagueData;
                    obj['membership'] = membershipData;
                    obj['player_name'] = player_name;
                    obj['trans_id'] = trans_id;
                    $.ajax({
                        type: 'POST',
                        url: '/paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.request').html(response['html'])
                        }
                    });

                });

                $("#season").on('change', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
                    membershipData=$(".membership option:selected").val();
                    trans_id = document.getElementById('trans_id').value;
                    player_name = document.getElementById('player_name').value;

                    obj['status'] = statusData;
                    obj['season'] = seasonData;
                    obj['league'] = leagueData;
                    obj['membership'] = membershipData;
                    obj['player_name'] = player_name;
                    obj['trans_id'] = trans_id;

                    $.ajax({
                        type: 'POST',
                        url: '/paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.request').html(response['html'])
                        }
                    });

                });

                $("#league").on('change', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
                    membershipData=$(".membership option:selected").val();
                    trans_id = document.getElementById('trans_id').value;
                    player_name = document.getElementById('player_name').value;

                    obj['status'] = statusData;
                    obj['season'] = seasonData;
                    obj['league'] = leagueData;
                    obj['membership'] = membershipData;
                    obj['player_name'] = player_name;
                    obj['trans_id'] = trans_id;
                    $.ajax({
                        type: 'POST',
                        url: '/paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.request').html(response['html'])
                        }
                    });

                });
                $("#membership").on('change', function () {

                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
                    membershipData=$(".membership option:selected").val();
                    trans_id = document.getElementById('trans_id').value;
                    player_name = document.getElementById('player_name').value;

                    obj['status'] = statusData;
                    obj['season'] = seasonData;
                    obj['league'] = leagueData;
                    obj['membership'] = membershipData;
                    obj['player_name'] = player_name;
                    obj['trans_id'] = trans_id;

                    $.ajax({
                        type: 'POST',
                        url: '/paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.request').html(response['html'])
                        }
                    });

                });

          //group event
                $(document).ready(function () {

                    var multipleCancelButton = new Choices('#G-season', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                    var multipleCancelButton = new Choices('#G-status', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });
                    var multipleCancelButton = new Choices('#G-league', {
                        removeItemButton: true,
                        maxItemCount: 10000,
                        searchResultLimit: 10000,
                        renderChoiceLimit: 10000
                    });

                });
                $("#G-btn").click(function () {
                    $("#G-print").print();
                });
                var obj = {};
                var trans_id;
                var statusData;
                var leagueData;
                var seasonData;
                var club_name;

                $("#club_name").on('keyup', function () {

                    statusData=$(".G-status option:selected").val();
                    leagueData=$(".G-league option:selected").val();
                    seasonData=$(".G-season option:selected").val();
                    trans_id = document.getElementById('G-trans_id').value;
                    club_name = document.getElementById('club_name').value;

                    obj['G-status'] = statusData;
                    obj['G-season'] = seasonData;
                    obj['G-league'] = leagueData;
                    obj['club_name'] = club_name;
                    obj['G-trans_id'] = trans_id;

                    $.ajax({
                        type: 'POST',
                        url: '/G-paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.G-event').html(response['html'])
                        }
                    });

                });


                $("#G-trans_id").on('keyup', function () {
                    statusData=$(".G-status option:selected").val();
                    leagueData=$(".G-league option:selected").val();
                    seasonData=$(".G-season option:selected").val();
                    trans_id = document.getElementById('G-trans_id').value;
                    club_name = document.getElementById('club_name').value;

                    obj['G-status'] = statusData;
                    obj['G-season'] = seasonData;
                    obj['G-league'] = leagueData;
                    obj['club_name'] = club_name;
                    obj['G-trans_id'] = trans_id;
                    $.ajax({
                        type: 'POST',
                        url: '/G-paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.G-event').html(response['html'])
                        }
                    });

                });


                $("#G-status").on('change', function () {
                    statusData=$(".G-status option:selected").val();
                    leagueData=$(".G-league option:selected").val();
                    seasonData=$(".G-season option:selected").val();
                    trans_id = document.getElementById('G-trans_id').value;
                    club_name = document.getElementById('club_name').value;

                    obj['G-status'] = statusData;
                    obj['G-season'] = seasonData;
                    obj['G-league'] = leagueData;
                    obj['club_name'] = club_name;
                    obj['G-trans_id'] = trans_id;
                    $.ajax({
                        type: 'POST',
                        url: '/G-paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.G-event').html(response['html'])
                        }
                    });

                });

                $("#G-season").on('change', function () {
                    statusData=$(".G-status option:selected").val();
                    leagueData=$(".G-league option:selected").val();
                    seasonData=$(".G-season option:selected").val();
                    trans_id = document.getElementById('G-trans_id').value;
                    club_name = document.getElementById('club_name').value;

                    obj['G-status'] = statusData;
                    obj['G-season'] = seasonData;
                    obj['G-league'] = leagueData;
                    obj['club_name'] = club_name;
                    obj['G-trans_id'] = trans_id;

                    $.ajax({
                        type: 'POST',
                        url: '/G-paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.G-event').html(response['html'])
                        }
                    });

                });

                $("#G-league").on('change', function () {
                    statusData=$(".G-status option:selected").val();
                    leagueData=$(".G-league option:selected").val();
                    seasonData=$(".G-season option:selected").val();
                    trans_id = document.getElementById('G-trans_id').value;
                    club_name = document.getElementById('club_name').value;

                    obj['G-status'] = statusData;
                    obj['G-season'] = seasonData;
                    obj['G-league'] = leagueData;
                    obj['club_name'] = club_name;
                    obj['G-trans_id'] = trans_id;
                    $.ajax({
                        type: 'POST',
                        url: '/G-paymentsearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.G-event').html(response['html'])
                        }
                    });

                });
            </script>
            @stop
