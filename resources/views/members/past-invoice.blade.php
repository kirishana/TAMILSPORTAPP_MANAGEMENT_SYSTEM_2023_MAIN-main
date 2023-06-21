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
                <div class="panel-heading">
                    <h3 class="panel-title">
                        {{-- <i class="material-icons">payment</i>
                        Invoice from <bold>JOSH</bold></h3>
                             <span class="pull-right">
                                 <ul class="list-inline colors">
                                     <li class="bg-default"></li>
                                     <li class="bg-primary"></li>
                                     <li class="bg-success"></li>
                                     <li class="bg-warning"></li>
                                     <li class="bg-danger"> </li>
                                     <li class="bg-info"></li>
                                 </ul>
                                    </span>  --}}
                </div>
                <div class="panel-body" style="border:1px solid #ccc;padding:0;margin:0;">
                    <div class="row" style="padding: 15px;margin-top:5px;">
                        <div class="col-md-6">
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)

                            <img src="/organization/invoice/{{ Auth::user()->organization->orgsetting->invoice_logo }}" class="img-responsive" style="width:200px;height:100px;" alt="Tamil Sangam">
                            @endif
                            @else
                            <img src="{{ asset('assets/img/web logo copy black bg small.png') }}" alt="Tamil Sangam Norway" class="img-responsive" />
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <strong>Invoice From:</strong><br>
                                <strong>Organization Name:</strong>{{ $organization->name }}<br>
                                <strong>Mobile Number:</strong>{{ $organization->mobile }}<br>
                                <strong>Email:</strong>{{ $organization->email }}<br>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 15px;">
                        <div class="col-md-6 col-xs-6" style="margin-top:5px;">
                            <strong>Invoice To:</strong><br>
                            <strong>Name:</strong>{{ Auth::user()->first_name }} {{ Auth::user()->first_name }}<br>
                            <strong>Mobile Number:</strong>{{ Auth::user()->dob }}<br>
                            <strong>Email:</strong>{{ Auth::user()->email }}<br>

                        </div>

                        <div class="col-md-3 col-xs-6">
                            <img src="{{ asset('assets/images/paid.jpg') }}" style="width:50%;height:50%;">

                        </div>

                        <div class="col-md-3 col-xs-6" style="padding-right:0">
                            <div id="invoice" style="background-color: #eee;text-align:right;padding: 15px;padding-bottom:23px;border-bottom-left-radius: 6px;border-top-left-radius: 6px;">
                                <h4><strong>
                                        <?php
                                        $invoice = 'INV' . '-' . str_pad(1, 5, '0', STR_PAD_LEFT); ?>
                                        {{ $invoice }}</strong></h4>
                                <h4><strong>{{ Carbon\Carbon::now()->format('Y-m-d') }}</strong></h4>
                                {{-- Payment Terms: 15days<br>
                                Payment Due by 01 Jan 2016<br>  --}}
                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 15px;">
                        <div class="col-md-4" style="margin-top:5px;">


                        </div>
                        <div class="col-md-4" style="margin-top:5px;">

                            {{-- <strong style="font-size:25px;">{{ $organization->league->name }} - {{ $organization->league->from_date }}</strong> --}}

                        </div>
                        <div class="col-md-4 col-xs-6" style="padding-right:0">

                        </div>
                    </div>

                    <div class="row" style="padding:15px;">
                        <div class="col-md-12 col-xs-12">
                            <div class="table-responsive">

                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Player Name</th>

                                            <th>Event Name</th>
                                            <th>Price </th>
                                            @if(Auth::User()->organization)
                                            <th>Discount</th>
                                            @endif
                                            <th class="totalprice"> NetSubtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                            {{-- <td>{{ $reg->user->first_name }} {{ $reg->user->last_name }}</td> --}}
                                            @foreach ( $reg->events as $event)
                                        <tr>
                                            <td>{{ $reg->user->first_name }} {{ $reg->user->last_name }}</td>

                                            <td>{{ $event->mainEvent->name}}</td>
                                            <td>{{ $iso }} {{ $event->mainEvent->price}}</td>
                                            @if(Auth::User()->organization)

                                            <td>{{ $event->mainEvent->discount}}%</td>
                                            @endif
                                            @if(Auth::User()->organization)
                                            <?php
                                            if ($event->mainEvent->discount > 0) {

                                                $subtotal = $event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                            } else {
                                                $subtotal = $event->mainEvent->price;
                                            }
                                            ?>
                                            <td>{{$iso}} {{ $subtotal }}</td>
                                            @else
                                            <td>{{$iso}} {{ $event->mainEvent->price }}</td>

                                            @endif
                                        </tr>
                                        @endforeach



                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div style="background-color: #eee;padding:15px;" id="footer-bg">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Payment Details</strong><br>
                                <strong>Peoples' Bank</strong><br>
                                <strong>Account Holder Name:</strong>{{ $organization->orgsetting?$organization->orgsetting->account_holder_name:'' }}<br>
                                <strong>Account Number:</strong>{{$organization->orgsetting?$organization->orgsetting->account_number:'' }}<br>
                                <strong>Account Branch:</strong>{{ $organization->orgsetting?$organization->orgsetting->account_branch:'' }}<br>

                            </div>
                            <div class="col-md-6">
                                <div class="pull-right">
                                    <strong>Other Information</strong><br>
                                    <strong>Company Registration Number</strong>{{ $organization->postal_code}}<br>
                                    <strong>Contact</strong>:{{ $organization->tpnumber }}
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