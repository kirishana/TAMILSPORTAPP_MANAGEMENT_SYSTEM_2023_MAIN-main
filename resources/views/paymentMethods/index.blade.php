@extends('admin/layouts/default')


{{-- Page title --}}
@section('title')
    Payment Methods
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>{{ __('sidebar.payment_methods') }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>Organizations</li>
            <li>Settings</li>
            <li class="active">Payment Methods</li>
        </ol>
    </section>
    @if(request()->query('error'))
    <div class="alert alert-danger">{{ request()->query('error') }}</div>
@endif
    <section class="content">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="material-icons">payment</i>
                            {{ __('sidebar.payment_methods') }} </h3>

                    </div>
                    <div class="panel-body">
                        <!--main content-->
                        <div class="row">

                            <div class="col-md-12">



                                <div>

                                    <ul style="background:none" class="nav nav-tabs " id="myTab">
                                        <li class="active">
                                            <a class="panel-title" href="#tab1" data-toggle="tab">
                                                {{ __('settings.bank') }}</a>
                                        </li>
                                        <li>
                                            <a class="panel-title" href="#tab4" data-toggle="tab">
                                                {{ __('settings.qr') }}</a>
                                        </li>
                                        <li>
                                            <a class="panel-title" href="#tab2" data-toggle="tab">
                                                {{ __('settings.vipps') }}</a>
                                        </li>
                                        <li>
                                            <a class="panel-title" href="#tab3" data-toggle="tab">
                                                {{ __('settings.stripe') }}</a>
                                        </li>


                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1">
                                            <h2 class="hidden">&nbsp;</h2>
                                            @if ($bank)
                                                <?php
                                                $organization = App\Models\Organization::find($id);
                                                ?>
                                                <form action="/organization/bank-transfer/update/{{ $bank->id }}"
                                                    method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                @else
                                                    <form action="/organization/bank-transfer" method="POST">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                            @endif

                                            <div class="row">


                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.bank_name') }}<span
                                                                style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" class="form-control" name="bank"
                                                            value="{{ $bank ? $bank->bank_name : '' }}" id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('bank'))
                                                        <span class="help-block">{{ $errors->first('bank') }}.</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-2"></div>
                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.account_holder_name') }}<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="holder"
                                                            value="{{ $bank ? $bank->account_holder_name : '' }}"
                                                            class="form-control" id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('holder'))
                                                        <span class="help-block">{{ $errors->first('holder') }}.</span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.acc_number') }}<span
                                                                style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="number" class="form-control"
                                                            value="{{ $bank ? $bank->account_number : '' }}"id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('number'))
                                                        <span class="help-block">{{ $errors->first('number') }}.</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-2"></div>

                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.branch') }} <span
                                                                style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="branch" class="form-control"
                                                            value="{{ $bank ? $bank->account_branch : '' }}"id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('branch'))
                                                        <span class="help-block">{{ $errors->first('branch') }}.</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.code') }}</label>
                                                        <input type="text" name="swiftCode"
                                                            class="form-control"value="{{ $bank ? $bank->swift_code : '' }}"id="inputEmail3">
                                                    </div>
                                                </div>
                                                <div class="col-md-2"></div>

                                                <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.additional_info') }}</label>
                                                        <textarea cols="55" rows="4" name="info" class="form-control">{{ $bank ? $bank->info : '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                              @if (Auth::guard('web')->user()->can('EditSettings'))
                                            @if ($bank)
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.update') }}</button>
                                                </div>
                                            @else
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.add') }}</button>
                                                </div>
                                            @endif
                                            @endif
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="tab2" disabled="disabled">
                                            <h2 class="hidden">&nbsp;</h2>
                                            @if ($vipps)
                                                <form action="/organization/vi/update/{{ $vipps->id }}" method="POST"
                                                    enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                @else
                                                    <form action="/organization/vi" method="POST"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                            @endif

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.client_id') }}
                                                            <span style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="clientId" class="form-control"
                                                            value="{{ $vipps ? $vipps->client_id : '' }}"
                                                            id="inputEmail3">

                                                    </div>
                                                    @if ($errors->has('clientId'))
                                                        <span class="help-block">{{ $errors->first('clientId') }}.</span>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.client_secret') }}<span style="color:red;"> <b> *
                                                                </b></span></label>
                                                        <input type="text" name="clientSecret" class="form-control"
                                                            value="{{ $vipps ? $vipps->client_secret : '' }}"
                                                            id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('clientSecret'))
                                                        <span
                                                            class="help-block">{{ $errors->first('clientSecret') }}.</span>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.merchant') }}<span style="color:red;"> <b> *
                                                                </b></span></label>
                                                        <input type="text" name="merchantSerial" class="form-control"
                                                            value="{{ $vipps ? $vipps->merchant_serial : '' }}"
                                                            id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('merchantSerial'))
                                                        <span
                                                            class="help-block">{{ $errors->first('merchantSerial') }}.</span>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.key') }}<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="subKey" class="form-control"
                                                            value="{{ $vipps ? $vipps->subscription_key : '' }}"
                                                            id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('subKey'))
                                                        <span class="help-block">{{ $errors->first('subKey') }}.</span>
                                                    @endif

                                                </div>


                                                <div class="col-md-6 " style="width:200px;">
                                                    <img src="{{ asset('assets/images/Vipps_Logo.png') }}"
                                                        style="margin-top:40px;" class="img-responsive pull-right" />
                                                </div>
                                            </div>

  @if (Auth::guard('web')->user()->can('EditSettings'))
                                            @if ($vipps)
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.change') }}</button>
                                                </div>
                                            @else
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.add') }}</button>
                                                </div>
                                            @endif
                                            @endif
                                            </form>
                                        </div>


                                        <div class="tab-pane" id="tab3" disabled="disabled">
                                            @if ($stripe)
                                                <form action="/organization/stripe/update/{{ $stripe->id }}"
                                                    method="POST">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                @else
                                                    <form action="/organization/stripe" method="POST">
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                            @endif
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.stripe_key') }} <span style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="secret" class="form-control"
                                                            value="{{ $stripe ? $stripe->secret_key : '' }}"id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('secret'))
                                                        <span class="help-block">{{ $errors->first('secret') }}.</span>
                                                    @endif
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.stripe_public_key') }}<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="publish" class="form-control"
                                                            value="{{ $stripe ? $stripe->public_key : '' }}"id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('publish'))
                                                        <span class="help-block">{{ $errors->first('publish') }}.</span>
                                                    @endif

                                                </div>

                                                <div class="col-md-6" style="width:200px;">
                                                    <img src="{{ asset('assets/images/stripe.png') }}"
                                                        style="margin-top:40px;" class="img-responsive pull-right" />

                                                </div>
                                            </div>
  @if (Auth::guard('web')->user()->can('EditSettings'))
                                            @if ($stripe)
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.change') }}</button>
                                                </div>
                                            @else
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.add') }}</button>
                                                </div>
                                            @endif
                                            @endif
                                        </div>
                                        </form>

                                        <div class="tab-pane" id="tab4" disabled="disabled">
                                            <h2 class="hidden">&nbsp;</h2>
                                            @if ($qrPayment)
                                                <form action="/organization/qrPayment/update/{{ $qrPayment->id }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                @else
                                                    <form action="/organization/qrPayment" method="POST"
                                                        enctype="multipart/form-data">
                                                        <input type="hidden" name="_token"
                                                            value="{{ csrf_token() }}" />
                                            @endif

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.org_name') }}<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $qrPayment ? $qrPayment->name : '' }}"
                                                            id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">{{ $errors->first('name') }}.</span>
                                                    @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">{{ __('settings.number') }} <span
                                                                style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="number" class="form-control"
                                                            value="{{ $qrPayment ? $qrPayment->no : '' }}"
                                                            id="inputEmail3">
                                                    </div>
                                                    @if ($errors->has('number'))
                                                        <span class="help-block">{{ $errors->first('number') }}.</span>
                                                    @endif
                                                </div>
                                                <div class="row">



                                                </div>
                                                <div class="col-md-6  form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail"
                                                            style="width: 200px; height: 200px;">
                                                            <?php
                                                            $org = App\Models\QrPayment::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
                                                            ?>
                                                            @if($org)
                                                                <img src="/organization/vipps/{{ $org->qr_code }}"
                                                                    style="width:200px;height:200px;" alt="">
                                                            @else
                                                                <img src={{ asset('assets/noimages/qr.jpg') }}
                                                                    alt="Tamil Sangam Association"
                                                                    class="img-responsive" />
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                            style="width:200px;height:200px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"
                                                                    style="text-transform:none;font-size:15px;">{{ __('settings.qr_code') }}<span
                                                                        style="text-transform:none;font-size:10px;">(250px
                                                                        * 50px)</span></span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="qrCode" class="image">
                                                            </span>
                                                            <a href="#" class="btn btn-primary fileinput-exists"
                                                                data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                        @if ($errors->has('qrCode'))
                                                            <span
                                                                class="help-block">{{ $errors->first('qrCode') }}.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pull-right form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new"
                                                            style="width: 200px; height: 200px;">
                                                            <?php
                                                            $org = App\Models\QrPayment::where('organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id)->first();
                                                            ?>
                                                            @if ($org)
                                                                <img src="/organization/vipps/logo/{{ $org->qr_logo }}"
                                                                    style="width:200px;" alt="">
                                                            @else
                                                                <img src="{{ asset('assets/noimages/merchant-logo.png') }}"
                                                                    alt="Tamil Sangam Association"
                                                                    class="img-responsive" />
                                                            @endif
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                            style="width:200px;height:200px;"></div>
                                                        <div>
                                                            <span class="btn btn-primary btn-file">
                                                                <span class="fileinput-new"
                                                                    style="text-transform:none;font-size:15px;">{{ __('settings.qr_logo') }}<span
                                                                        style="text-transform:none;font-size:10px;">(250px
                                                                        * 50px)</span></span>
                                                                <span class="fileinput-exists">Change</span>
                                                                <input type="file" name="qrLogo" class="image">
                                                            </span>
                                                            <a href="#" class="btn btn-primary fileinput-exists"
                                                                data-dismiss="fileinput">Remove</a>
                                                        </div>
                                                        @if ($errors->has('qrLogo'))
                                                            <span
                                                                class="help-block">{{ $errors->first('qrLogo') }}.</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

  @if (Auth::guard('web')->user()->can('EditSettings'))
                                            @if ($qrPayment)
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.change') }}</button>
                                                </div>
                                            @else
                                                <div class="pull-right">
                                                    <button class="btn btn-success" type="submit">{{ __('settings.add') }}</button>
                                                </div>
                                            @endif
                                            @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--main content end-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="material-icons">payment</i>
                          {{ __('settings.active_payments') }}
                        </h3>

                    </div>
                    <div class="panel-body">
                        <?php
                        $orgId = Auth::user()->organization_id ? Auth::user()->organization_id : $id;
                        $organization = App\Models\Organization::find($orgId);
                        if ($organization->ActivePayment) {
                            if ($organization->bankTransfer) {
                                $active = 1;
                            } else {
                                $active = 0;
                            }
                        } else {
                            $active = 0;
                        }
                        if ($organization->ActivePayment) {
                            if ($organization->Vipps) {
                                $active1 = 1;
                            } else {
                                $active1 = 0;
                            }
                        } else {
                            $active1 = 0;
                        }
                        if ($organization->ActivePayment) {
                            if ($organization->Stripe) {
                                $active2 = 1;
                            } else {
                                $active2 = 0;
                            }
                        } else {
                            $active2 = 0;
                        }
                        if ($organization->ActivePayment) {
                            if ($organization->qrPayment) {
                                $active3 = 1;
                            } else {
                                $active3 = 0;
                            }
                        } else {
                            $active3 = 0;
                        }
                        $activeChecked = null;
                        $active1checkd = null;
                        $active2checkd = null;
                        $active3checkd = null;
                        if ($active == 1) {
                            $activeChecked = App\Models\ActivePaymentMethod::where('organization_id', $orgId)->where('bank_transfer_id', $organization->bankTransfer->id)
                                ? App\Models\ActivePaymentMethod::where('organization_id', $orgId)
                                    ->where('bank_transfer_id', $organization->bankTransfer->id)
                                    ->first()
                                : '';
                        }
                        if ($active1 == 1) {
                            $active1checkd = App\Models\ActivePaymentMethod::where('organization_id', $orgId)->where('vipps_id', $organization->Vipps->id)
                                ? App\Models\ActivePaymentMethod::where('organization_id', $orgId)
                                    ->where('vipps_id', $organization->Vipps->id)
                                    ->first()
                                : '';
                        }
                        if ($active2 == 1) {
                            $active2checkd = App\Models\ActivePaymentMethod::where('organization_id', $orgId)->where('stripe_id', $organization->Stripe->id)
                                ? App\Models\ActivePaymentMethod::where('organization_id', $orgId)
                                    ->where('stripe_id', $organization->stripe->id)
                                    ->first()
                                : '';
                        }
                        if ($active3 == 1) {
                            $active3checkd = App\Models\ActivePaymentMethod::where('organization_id', $orgId)->where('qr_payment_id', $organization->qrPayment->id)
                                ? App\Models\ActivePaymentMethod::where('organization_id', $orgId)
                                    ->where('qr_payment_id', $organization->qrPayment->id)
                                    ->first()
                                : '';
                        }
                        ?>
                        <!--main content-->
                        <form action="/organization/active-payment-methods" method="POST">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            @if ($organization->BankTransfer || $organization->Vipps || $organization->Stripe || $organization->qrPayment)
                                <div class="row">


                                    <div class="col-md-2">
                                        <input type="checkbox" name="bank"
                                            {{ $activeChecked != null ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                       {{ __('settings.bank') }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="checkbox" name="vipps"
                                            {{ $active1checkd != null ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        {{ __('settings.vipps') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="checkbox" name="stripe"
                                            {{ $active2checkd != null ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        {{ __('settings.stripe') }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <input type="checkbox" name="qrPayment"
                                            {{ $active3checkd != null ? 'checked' : '' }}>
                                    </div>
                                    <div class="col-md-6">
                                        {{ __('settings.qr') }}
                                    </div>
                                </div>

                    </div>
                      @if (Auth::guard('web')->user()->can('EditSettings'))

                    <div class="row">
                        <div class="col-md-12 ">
                            <button class="btn btn-success pull-right" type="submit">{{ __('settings.change') }}</button>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>

            </div>
        </div>

        </div>

        </form>

        <!--row end-->
    </section>
@stop





<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript">
    </script>
    <!-- <script src="{{ asset('assets/js/pages/edituser.js') }}" type="text/javascript"></script> -->
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#myTab a[href="' + activeTab + '"]').tab('show');
            }
        });
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut();
            }, 5000); // 5 seconds
        });
    </script>
@stop
