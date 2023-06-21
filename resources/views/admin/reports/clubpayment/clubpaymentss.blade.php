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

    @stop

        {{-- Page content --}}
        @section('content')

        <section class="content-header">
            <!--section starts-->
            <h1>Payment </h1>
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
                <li class="active">Payment </li>
            </ol>
        </section>
        <!--section ends-->

        <section class="content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Payment
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
    </select>
</div>
<div class="col-md-2">
    <select id="membership" class="form-control multiselect membership" placeholder="Select Membership">
        <option value="5">Select Membership</option>
        <option value='0'>Others</option>
        <option value='1'>SIL Member</option>
    </select>
</div> 
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2 pull-right">
                                                <a href="/clubpay/excel"> <img
                                                            src="{{ asset('assets/images/excel.png') }}"
                                                            style="float: right;margin-right:5px;"
                                                            class="img-responsive" />
                                                    </a>
                                                <a href="/clubpay/export" target="_blank"> <img
                                                            src="{{ asset('assets/images/pdf.png') }}"
                                                            style="float: right;margin-right:5px;"
                                                            class="img-responsive" />
                                                    </a>
                                                    <a id="btn-cpay" style="cursor:pointer"><img
                                                            src="{{ asset('assets/images/print.png') }}"
                                                            style="float: right;margin-right:5px;" class="img-responsive" />
                                                    </a>  
                                                </div>
</div>
<br>

                                        <div style="display:none;">
                                        @include('admin.reports.clubpayment.clubpaypreview')
                                        </div>
                                        <div class="table-responsive">
                                        @include('admin.reports.clubpayment.clubpayfilter')
                                        </div>
                                    </div>
                                    </div>
                                    <div class="tab-pane" id="tab2">
                                    <div class="row">
                                          <!-- <div class="col-md-2">
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

                                            </div> -->
                                            <div class="col-md-3">
    <input id="G-trans_id"  maxlength="11" name="G-trans_id[]"
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
                                            <div class="col-md-3">
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
                                                    <option value='2'>Approved</option>
                                                    <option value='1'>Pending</option>
                                                </select>
                                            </div>
                                </div>
                                        <div class="row">
                                        <div class="col-md-2 pull-right">
                                    <a href="/G-pay/excel"> <img
                                                src="{{ asset('assets/images/excel.png') }}"
                                                style="float: right;margin-right:5px;" class="img-responsive" />
                                        </a>
                                    <a href="/G-pay/export" target="_blank"> <img
                                                src="{{ asset('assets/images/pdf.png') }}"
                                                style="float: right;margin-right:5px;" class="img-responsive" />
                                        </a>
                                        <a id="group-btn" style="cursor:pointer"><img
                                                src="{{ asset('assets/images/print.png') }}"
                                                style="float: right;margin-right:5px;" class="img-responsive" />
                                        </a>
                                    </div>
                                        </div>
                                        <br>
                                        <div style="display:none;">
                                        @include('admin.reports.clubpayment.groupPaypreview')
                                        </div>
                                        <div class="table-responsive">
                                        @include('admin.reports.clubpayment.groupPayment')
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
                $("#btn-cpay").click(function () {
                    $("#print").print();
                });
                var obj = {};
                var trans_id ;
                var statusData ;
                var leagueData ;
                var membershipData ;
                var seasonData ;
                var player_name ;

                $("#player_name").on('change', function () {
                    membershipData=$(".membership option:selected").val();
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
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
                        url: '/clubpaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.cpay').html(response['html'])
                            $('.printcpay').html(response['html2'])
                        }
                    });

                });


                $("#trans_id").on('change', function () {
                    membershipData=$(".membership option:selected").val();
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
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
                        url: '/clubpaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.cpay').html(response['html'])
                            $('.printcpay').html(response['html2'])

                        }
                    });

                });


                $("#status").on('change', function () {
                    membershipData=$(".membership option:selected").val();
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
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
                        url: '/clubpaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.cpay').html(response['html'])
                            $('.printcpay').html(response['html2'])
                        }
                    });

                });

                $("#season").on('change', function () {
                    membershipData=$(".membership option:selected").val();
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
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
                        url: '/clubpaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.cpay').html(response['html'])
                            $('.printcpay').html(response['html2'])
                        }
                    });

                });

                $("#league").on('change', function () {
                    membershipData=$(".membership option:selected").val();
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
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
                        url: '/clubpaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.cpay').html(response['html'])
                            $('.printcpay').html(response['html2'])

                        }
                    });

                });
                $("#membership").on('change', function () {
                    membershipData=$(".membership option:selected").val();
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    seasonData=$(".season option:selected").val();
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
                        url: '/clubpaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.cpay').html(response['html'])
                            $('.printcpay').html(response['html2'])
                        }
                    });
                });
                //group event
                $(document).ready(function () {
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
                $("#group-btn").click(function () {
                    $("#G-print").print();
                });
                var Gobj = {};
                var Gtrans_id ;
                var statusData ;
                var leagueData ;
             



                $("#G-status").on('change', function () {
                    Gtrans_id = document.getElementById('G-trans_id').value;
                    statusData=$(".G-status option:selected").val();
                    leagueData=$("#G-league option:selected").val();
                    Gobj['G-status'] = statusData;
                    Gobj['G-league'] = leagueData;
                    Gobj['G-trans_id'] = Gtrans_id;
                   
                    $.ajax({
                        type: 'POST',
                        url: '/G-paysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "Gobj": Gobj,
                        },

                        success: function (response) {
                            $('.anton').html(response['html'])
                            $('.printgrouppay').html(response['html2'])

                        }
                    });

                });

            

                $("#G-league").on('change', function () {
                    Gtrans_id = document.getElementById('G-trans_id').value;
                    statusData=$(".G-status option:selected").val();
                    leagueData=$("#G-league option:selected").val();
                    Gobj['G-status'] = statusData;
                    Gobj['G-league'] = leagueData;
                    Gobj['G-trans_id'] = Gtrans_id;
                    $.ajax({
                        type: 'POST',
                        url: '/G-paysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "Gobj": Gobj,
                        },

                        success: function (response) {
                            $('.anton').html(response['html'])
                            $('.printgrouppay').html(response['html2'])

                        }
                    });

                });

            $("#G-trans_id").on('change', function () {
                Gtrans_id = document.getElementById('G-trans_id').value;
                    statusData=$(".G-status option:selected").val();
                    leagueData=$("#G-league option:selected").val();
                    Gobj['G-status'] = statusData;
                    Gobj['G-league'] = leagueData;
                    Gobj['G-trans_id'] = Gtrans_id;
                $.ajax({
                    type: 'POST',
                    url: '/G-paysearch',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "Gobj": Gobj,
                    },

                    success: function (response) {
                        $('.anton').html(response['html'])
                        $('.printgrouppay').html(response['html2'])

                    }
                });
                });
            </script>
            @stop
