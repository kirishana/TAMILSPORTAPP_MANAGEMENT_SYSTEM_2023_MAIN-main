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
                                {{ $organization->name }}<br>
                              {{ $organization->city }} {{ $organization->country->name }}<br>
                              <strong>Tele phone:</strong>{{ $organization->tpnumber }}<br>
                              <strong>E-mail:</strong>{{ $organization->email }}<br>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 15px;">
                        <div class="col-md-9 col-xs-6" style="margin-top:5px;">
                            <strong>Invoice To:</strong><br>
                           {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br>
                           <strong>Tele phone:</strong>{{ Auth::user()->tel_number }}<br>
                           <strong>E-mail:</strong>{{ Auth::user()->email }}<br>

                        </div>
                     {{--   <div class="col-md-3 col-xs-6" style="margin-top:5px;">
                            @if($reg->status==4)
                            <img src="{{ asset('assets/images/pending.jpg') }}" style="width:50%;height:50%;">
                            @elseif($reg->status==2)
                            <img src="{{ asset('assets/images/paid.jpg') }}" style="width:50%;height:50%;">

                            @else
                            <h2>Processing</h2>
                            @endif
                        </div>--}}

                        <div class="col-md-3 col-xs-6" style="padding-right:0">
                            <div id="invoice" style="background-color: #eee;text-align:right;padding: 15px;padding-bottom:23px;border-bottom-left-radius: 6px;border-top-left-radius: 6px;">
                                <h4><strong>
                                        <?php
                                        $invoice = 'INV' . '-' . str_pad($invoiceCount+1, 6, '0', STR_PAD_LEFT); ?>
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

                     <center>  <strong style="font-size:25px;">{{ $reg->league->name }}</strong></center>

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
                                            <th>Name</th>

                                            <th>Events</th>
                                            <th>Event Unit Price </th>
                                            <th>Event Discount </th>
                                            <th class=""> Subtotal</th>
                                            <th>Organization Discount </th>
                                            <th class="totalprice">total</th>
                                        </tr>
                                        <!-- <tr>
                                            <th>Total:</th>
                                        </tr> -->
                                    </thead>
                                    <tbody>

                                        
                                            @foreach ( $reg->events as $event)
                                        <tr>
                                            <td>{{$reg->user->first_name}} {{$reg->user->last_name}}</td>

                                            <td>{{ $event->mainEvent->name}}</td>
                                            <td>{{ $iso }} {{ $event->mainEvent->price}}</td>
                                            <td>{{ $event->discount}}</td>
                                          
                                            <td>
                                                @foreach ($reg->events as $event )
                                                    <?php
                                                        $subtotal =($event->mainEvent->price - (($event->discount / 100) * $event->mainEvent->price));
                                                    ?>
                                                    {{ $iso }} {{ $subtotal }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                @if($event->mainEvent->organization->orgsetting)
                                                 @if($event->mainEvent->organization->orgsetting->active==1)
                                         @if($reg->user->member_or_not==1)
                                            {{$reg->discount }}%
                                           @else
                                           0%
                                            @endif
                                            @else
                                            0%
                                            @endif
                                            @else
                                            0%
                                            @endif
                                                </td>
                                                <?php
                                                 $totalFee=0;
                                                    $totalFee=$totalFee+$reg->totalfee;
                                                 ?>
                                                <td><strong>{{ $iso }} {{ $totalFee }}</strong></td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                                  @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)

                                                <tr>


                                                    <td><strong>Total : </strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$reg->totalfee}}
                                                    </td>

                                                </tr>
                                                @else

                                                <tr>


                                                    <td><strong>Total : </strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>{{$reg->totalfee}}
                                                    </td>


                                                </tr>
                                                @endif
                                                @else
                                                <td><strong>Total : </strong></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{$reg->totalfee}}
                                                    </td>
                                                @endif
                                        </tbody>

                                    </table>

                                   


                                @if(Auth::user()->children->count()<=0) @else <div class="pull-right">
                                    @if($reg->status==4 || $reg->status==3)
                                    <a href="/pay/{{ $reg->organization->id }}/{{ $reg->id }}"><button type="button" class="btn btn-labeled btn-primary">
                                            Pay
                                            <span class="btn-label cool_btn_right">
                                                <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                            </span>
                                        </button>
                                    </a>
                                    @endif

                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div style="background-color: #eee;padding:15px;" id="footer-bg">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Payment Details</strong><br>
                            <strong>Bank: </strong><br>{{$organization->bankTransfer?$organization->bankTransfer->bank_name:''}}<br>
                            {{ $organization->bankTransfer?$organization->bankTransfer->account_holder_name:'' }}<br>
                            {{$organization->bankTransfer?$organization->bankTransfer->account_number:'' }}<br>
                           {{ $organization->bankTransfer?$organization->bankTransfer->account_branch:'' }}<br>

                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <strong>Other Information</strong><br>
                                {{ $organization->postal_code}}<br>
                                {{ $organization->tpnumber }}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                    <div class="col-md-6">
                    @if($organization->Vipps)
                    <strong>Vipps Details:</strong></br>
                    <strong>Vipps Name:</strong>{{$organization->Vipps->vipps_name}}<br>
                    <strong>Vipps Number:</strong>{{$organization->Vipps->vipps_no}}
            @endif
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