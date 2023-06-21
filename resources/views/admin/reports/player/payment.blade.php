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
                <li class="active"> Payment</li>
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
                            <div class="row">
                                <div class="col-md-2">

                                    <select id="organization" class="form-control multiselect organization" placeholder="Select Organization">
                                        <option value="0">Select Organization</option>
                                        @foreach($organizations as $organization)
                                            <option value={{ $organization->id }}>{{ $organization->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select id="league" class="form-control multiselect league" placeholder="Select League">
                                        <option value="0">Select League</option>
                                        @foreach($leagues as $league)
                                            <option value={{ $league->id }}>{{ $league->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select id="status" class="form-control multiselect status" placeholder="Select Status">
                                        <option value="0">Select Status</option>
                                        <option value='2'>Approved</option>
                                        <option value='1'>Pending</option>

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <input id="amount" data-name="amount" name="amount[]" placeholder=" Amount&nbsp;in&nbsp;{{$currency->country->currency->currency_iso_code
}} "
                                        type="text" style="
width: 100%;
padding: 12px 20px;
margin: 28px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
">

                                </div>
                                <!-- <div class="col-md-3">
                                    <input id="trans_id" data-name="trans_id" maxlength="11" name="trans_id[]"
                                        placeholder="Transaction ID" type="text" style="
width: 100%;
padding: 12px 20px;
margin: 28px 0;
display: inline-block;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
">

                                </div> -->



                            </div>
                            <div class="row">
                                <div class="col-md-1 pull-right"
                                    style="margin-top: 35px; display:flex; justify-content:flex-end;">
                                    <a id="btn-play" style="cursor:pointer;margin-right:5px;"><img
                                            src="{{ asset('assets/images/print.png') }}">
                                    </a>
                                    <a href="/pay_play/export" style="margin-right:5px;" target="_blank"> <img
                                            src="{{ asset('assets/images/pdf.png') }}">
                                    </a>

                                    <a href="/pay_play/excel" style="margin-right:5px;"> <img
                                            src="{{ asset('assets/images/excel.png') }}">
                                    </a>
                                </div>
                            </div>
                            <br>
                            <div class="table-responsive">
                                @include('admin.reports.player.pay-filter')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Third Basic Table Ends Here-->
        </section>

        <div style="display:none;">
            @include('admin.reports.player.pay-preview')

        </div>
        <!-- content -->
        @stop

            {{-- page level scripts --}}
            @section('footer_scripts')


            <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
                integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                $(document).ready(function () {

                    var multipleCancelButton = new Choices('#organization', {
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

                });
                $("#btn-play").click(function () {
                    $("#print").print();
                });
                var obj = {};
                var statusData ;
                var leagueData;
                var organizationData;
                var amount;

                $("#amount").on('keyup', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    organizationData=$(".organization option:selected").val();
                    amount = document.getElementById('amount').value;
                    obj['status'] = statusData;
                    obj['organization'] = organizationData;
                    obj['league'] = leagueData;
                    obj['amount'] = amount;
                    
                    $.ajax({
                        type: 'POST',
                        url: '/paymentplaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.play').html(response['html'])
                        }
                    });

                });

                $("#status").on('change', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    organizationData=$(".organization option:selected").val();
                    amount = document.getElementById('amount').value;
                    obj['status'] = statusData;
                    obj['organization'] = organizationData;
                    obj['league'] = leagueData;
                    obj['amount'] = amount;

                    $.ajax({
                        type: 'POST',
                        url: '/paymentplaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.play').html(response['html'])
                        }
                    });

                });

                $("#organization").on('change', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    organizationData=$(".organization option:selected").val();
                    amount = document.getElementById('amount').value;
                    obj['status'] = statusData;
                    obj['organization'] = organizationData;
                    obj['league'] = leagueData;
                    obj['amount'] = amount;
                    $.ajax({
                        type: 'POST',
                        url: '/paymentplaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.play').html(response['html'])
                        }
                    });

                });

                $("#league").on('change', function () {
                    statusData=$(".status option:selected").val();
                    leagueData=$(".league option:selected").val();
                    organizationData=$(".organization option:selected").val();
                    amount = document.getElementById('amount').value;
                    obj['status'] = statusData;
                    obj['organization'] = organizationData;
                    obj['league'] = leagueData;
                    obj['amount'] = amount;
                    $.ajax({
                        type: 'POST',
                        url: '/paymentplaysearch',
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "obj": obj,
                        },

                        success: function (response) {
                            $('.play').html(response['html'])
                        }
                    });
                });
            </script>
            @stop
