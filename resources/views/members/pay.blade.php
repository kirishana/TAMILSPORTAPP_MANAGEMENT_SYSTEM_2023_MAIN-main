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
    <div class="col-md-4" >
    <div class="card text-white mb-4" style="max-width: 40rem;">
  <div class="card-header text-center " style="font-size: 25px;background-color: #A9B6BC;">Payment</div>
  <div class="card-body">
    <h3 class="card-title text-center">Payable Amount</h3>
    <p class="card-text text-center" style="font-size: 25px;">{{ $iso }} {{ $reg->totalfee }}</p>
  </div>
</div>
</div>
  
        <div class="col-md-8">
            <form action="/transaction/update" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input type="hidden" name="org" value="{{ $organization->id }}">
                <input type="hidden" name="reg" value="{{ $reg->id }}">


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
                                $bank=$organization->bankTransfer?App\Models\ActivePaymentMethod::where("organization_id",$organization->id)->where('bank_transfer_id',$organization->bankTransfer->id)->first():'';
                                $vipps=$organization->Vipps?App\Models\ActivePaymentMethod::where("organization_id",$organization->id)->where('vipps_id',$organization->Vipps->id)->first():'';
        
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
                                                    <input type="text" class="form-control" name="transId" id="id" required>
                                                    <input type="hidden" name="method" value="bank">
    
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
                        </form>
                        @if($vipps)
                        <form action="/transaction/update" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input type="hidden" name="org" value="{{ $organization->id }}">
                <input type="hidden" name="reg" value="{{ $reg->id }}">
                            <input type="hidden" name="method" value="Vipps">
    
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
                                            <br>
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
                                                <input type="text" class="form-control"  name="transId2" id="id" required>
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
                    </form>    
                       
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