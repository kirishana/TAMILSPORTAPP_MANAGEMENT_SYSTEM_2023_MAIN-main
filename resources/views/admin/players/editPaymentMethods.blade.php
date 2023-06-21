@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Payment Methods
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Payment Methods</h1>
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
<!--section ends-->
<section class="content">

    <!--main content-->
    <div class="row">
        <div class="col-md-4">
            <center><strong>Payable Amount</strong></center>
            <br>

            <h3>
                <h4>
                    <center>Total {{$total}}</center>
                </h4>
                @if($reg->status==1)
                <h4>
                    <center>Paid {{$iso}} {{$reg->totalfee}}</center>
                </h4>
                @endif
                <h4>
                    <center>Payable {{$iso}} {{$pay}}</center>
                </h4>
            </h3>
        </div>
        <div class="col-md-8">
            <form action="/event/register" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input type="hidden" name="org" value="{{ $organization }}">
                <input type="hidden" name="league" value="{{ $league }}">
                <input type="hidden" name="total" value="{{ $total }}">
                <input type="hidden" name="user" value="{{$user}}">

                @if($fieldEvents)
                @foreach ( $fieldEvents as $fieldEvent)
                <input type="hidden" name="fieldevents[]" value="{{ $fieldEvent }}">

                @endforeach
                @endif
                @if($trackEvents)
                @foreach ( $trackEvents as $trackEvent)
                <input type="hidden" name="trackEvents[]" value="{{ $trackEvent }}">

                @endforeach
                @endif
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">assessment</i> Payment Methods
                        </h3>
                        <span class="pull-right clickable">
                            <i class="material-icons">keyboard_arrow_up</i>
                        </span>
                    </div>
                    <?php

                    ?>
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist">
                            <div class="panel panel-default">
                                <?php
                                $org = App\Models\Organization::find($organization);
                                $bank = App\Models\ActivePaymentMethod::where("organization_id", $organization)->where('bank_transfer_id', $org->bankTransfer->id)->first();
                                $vipps = App\Models\ActivePaymentMethod::where("organization_id", $organization)->where('vipps_id', $org->bankTransfer->id)->first();
                                $stripe = App\Models\ActivePaymentMethod::where("organization_id", $organization)->where('stripe_id', $org->bankTransfer->id)->first();

                                ?>
                                @if($bank)
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="panel-title">Direct Bank Transfer</h4>
                                    </a>


                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="row" style=font-size:18px;>
                                                    <div class="col-md-6"><strong>Bank</strong></div>
                                                    <div class="col-md-6">{{ $bank->bankTransfer->bank_name }}</div>
                                                    <div class="col-md-6"><strong>Account Holder Name</strong></div>
                                                    <div class="col-md-6">{{ $bank->bankTransfer->account_holder_name }}</div>
                                                    <div class="col-md-6"><strong>Account Number</strong></div>
                                                    <div class="col-md-6">{{ $bank->bankTransfer->account_number }}</div>
                                                    <div class="col-md-6"><strong>Branch</strong></div>
                                                    <div class="col-md-6">{{ $bank->bankTransfer->account_branch }}</div>
                                                    @if($bank->bankTransfer->swift_code)
                                                    <div class="col-md-6"><strong>SwiftCode</strong></div>
                                                    <div class="col-md-6">{{ $bank->bankTransfer->swift_code }}</div>
                                                    @endif
                                                    @if($bank->bankTransfer->info)
                                                    <div class="col-md-6"><strong>Info</strong></div>
                                                    <div class="col-md-6">{{ $bank->bankTransfer->info }}</div>
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">

                                                <label class="control-label" for="firstName3">Transaction Id<span style="color:red;"> <b> * </b></span>
                                                </label>
                                                <input type="text" class="form-control" name="transId" id="id">
                                            </div>


                                            <button type="submit" class="btn btn-labeled btn-primary">
                                                Register
                                                <span class="btn-label cool_btn_right">
                                                    <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($vipps)

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h4 class="panel-title">
                                        Vipps
                                    </h4>
                                </a>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="row" style=font-size:18px;>
                                                <div class="col-md-6"><strong>Organization Vipps Name</strong></div>
                                                <div class="col-md-6">{{$vipps->Vipps->vipps_name }}</div>
                                            </div>
                                            <div class="row" style=font-size:18px;>
                                                <div class="col-md-6"><strong>Vipps Number</strong></div>
                                                <div class="col-md-6">{{$vipps->Vipps->vipps_no }}</div>
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <img src="/organization/vipps/{{ $vipps->Vipps->qr_code }}" style="width:200px;height:200px;" alt="">
                                            <br>
                                            <center><label><strong>Scan Me</strong></label></center>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group label-floating">

                                                <label class="control-label" for="firstName3">Transaction Id<span style="color:red;"> <b> * </b></span>
                                                </label>
                                                <input type="text" class="form-control" name="name" id="id">
                                            </div>


                                            <button type="submit" class="btn btn-labeled btn-primary">
                                                Register
                                                <span class="btn-label cool_btn_right">
                                                    <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($stripe)

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h4 class="panel-title"> Stripe</h4>
                                </a>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" class="btn btn-labeled btn-primary">
                                            Register
                                            <span class="btn-label cool_btn_right">
                                                <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- nav-tabs-custom -->
                </div>
        </div>
        <div class="col-md-2"></div>

    </div>
    </div>

    <!--main content ends-->
</section>
<!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
@stop