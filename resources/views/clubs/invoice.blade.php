@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Invoice
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/css/pages/invoice.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <h1>Invoice</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Events</a></li>
        <li class="active">All Events</li>
    </ol>
</section>
<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                    
                <div class="panel-body" style="border:1px solid #ccc;padding:0;margin:0;">
                  
                 
                    <form action="/group-event/register" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />


                        <div class="row" style="padding:15px;">
                            <div class="col-md-12 col-xs-12">
                                <div class="table-responsive">

                                    <table class="table" id="table">
                                        <thead>
                                            <tr>
                                                <th>Team Name</th>
                                                <th>Event Name</th>
                                                <th>Event Unit Price </th>
                                                <th class="totalprice"> Total</th>
                                            </tr>
                                        </thead>

                                        <tbody>


                                            <tr>

                                                <td>
                                                    @foreach($teams as $team)
                                                    <?php
                                                    $name = App\Models\Team::find($team)->name;
                                                    ?>
                                                    {{$name}}
                                                    <br>
                                                    @endforeach
                                                </td>

                                                <td>{{ $event->mainEvent->name}}</td>
                                                <td>{{ $iso }} {{ $event->mainEvent->price}}</td>

                                                @if(Auth::User()->organization)
                                                <?php

                                                $subtotal = ($event->mainEvent->price) * count($teams);

                                                ?>
                                                <td> {{ $iso }} {{ $subtotal }}</td>
                                                @else
                                                <?php
                                                $subtotal = ($event->mainEvent->price) * count($teams);
                                                ?>
                                                <td>{{ $iso }} {{ $subtotal }}</td>

                                                @endif
                                                <input type="hidden" name="total" value={{ $subtotal}}>

                                            </tr>

                                        </tbody>
                                    </table>

                                    <input type="hidden" name="event" value={{ $event->id}}>
                                    <input type="hidden" name="org" value={{ $org->id}}>
                                    <input type="hidden" name="gender" value={{ $genderId}}>
                                    <input type="hidden" name="reg" value={{ $reg}}>


                                    @if($teams)
                                    @foreach($teams as $team)
                                    <input type="hidden" name="teams[]" value="{{ $team }}">
                                    @endforeach

                                    @endif

                                    <div class="pull-right">
                                        <a href=""><button type="submit" class="btn btn-labeled btn-primary">
                                                Register
                                                <span class="btn-label cool_btn_right">
                                                    <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                                </span>
                                            </button>
                                        </a>

                                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div style="background-color: #eee;padding:15px;" id="footer-bg">
            <div class="row">
                <div class="col-md-6">
                    <strong>Payment Details</strong><br>
                    @if($org->bankTransfer)

                    <strong>Bank: </strong>{{$org->bankTransfer?$org->bankTransfer->bank_name:''}}<br>
                    <strong>Account Holder Name:</strong>{{ $org->bankTransfer?$org->bankTransfer->account_holder_name:'' }}<br>
                    <strong>Account Number:</strong>{{$org->bankTransfer?$org->bankTransfer->account_number:'' }}<br>
                    <strong>Account Branch:</strong>{{ $org->bankTransfer?$org->bankTransfer->account_branch:'' }}<br>
                    <br>
                    <br>
                    @endif
                    @if($org->Vipps)
                    <strong>Vipps Name: </strong>{{$org->Vipps?$org->Vipps->vipps_name:''}}<br>
                    <strong>Vipps Number:</strong>{{ $org->Vipps?$org->Vipps->vipps_no:'' }}<br>

                    @endif

                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <strong>Other Information</strong><br>
                        <strong>Company Registration Number</strong>{{ $org->postal_code}}<br>
                        <strong>Contact</strong>:{{ $org->tpnumber }}
                    </div>
                </div>
            </div>
            <hr>
            <div style="margin:10px 20px;text-align:center;" class="btn-section">
                <button type="button" class="btn btn-raised btn-responsive button-alignment btn-info" data-toggle="button">
                    <a style="color:#fff;" onclick="javascript:window.print();">
                        <i class="material-icons">print</i>
                        Print
                    </a>
                </button>

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

<script src="{{ asset('assets/js/pages/invoice.js') }}" type="text/javascript"></script>


@stop