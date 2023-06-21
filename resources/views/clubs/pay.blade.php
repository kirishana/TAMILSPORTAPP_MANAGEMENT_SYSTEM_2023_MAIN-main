@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Payment Methods
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />

@stop
<style>
.toast-top-right {
position: absolute;
margin-top:200px;
left: 30%;
font-size:20px;
}
.myButton{
    background:url(./images/but.png) no-repeat;
    cursor:pointer;
    border:none;
    width:100px;
    height:100px;
}
    </style>
{{-- Page content --}}
@section('content')
@php

$stripe_key = $org->Stripe?$org->Stripe->public_key:'';
@endphp
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
    <div class="col-md-4 col-sm-4" >
    <div class="card text-white mb-4" style="max-width: 40rem;">
  <div class="card-header text-center " style="font-size: 25px;background-color: #A9B6BC;">Payment</div>
  <div class="card-body">
    <h3 class="card-title text-center">Payable Amount</h3>
    <p class="card-text text-center" style="font-size: 25px;">{{ $iso }} {{ $total }}</p>
  </div>
</div>
</div>
   
        <div class="col-md-8 col-sm-8">
            <form action="/single-event-payment/edit" method="POST">
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input type="hidden" name="invNo" value="{{ $invNo}}" />

  @if($regs)
                                        @foreach ( $regs as $reg)
                                        <input type="hidden" name="regs[]" value="{{ $reg }}">

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
                    <div class="panel-body">
                        <div class="panel-group" id="accordion" role="tablist">
                            <div class="panel panel-default">
                                <?php 
                                $bank=$org->bankTransfer?App\Models\ActivePaymentMethod::where("organization_id",$org->id)->where('bank_transfer_id',$org->bankTransfer->id)->first():'';
                                $vipps=$org->Vipps?App\Models\ActivePaymentMethod::where("organization_id",$org->id)->where('vipps_id',$org->Vipps->id)->first():'';
                                $QrPayment=$org->qrPayment?App\Models\ActivePaymentMethod::where("organization_id",$org->id)->where('qr_payment_id',$org->qrPayment->id)->first():'';
                                $stripe=App\Models\ActivePaymentMethod::where("organization_id",$org->id)->where('stripe_id',$org->Stripe?$org->Stripe->id:'')->first();
        
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
                    @if($QrPayment)
                    <form action="/single-event-payment/edit" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                        <input type="hidden" name="method" value="QrPayments">
                        <input type="hidden" name="invNo" value="{{ $invNo}}" />
  @if($regs)
                                        @foreach ( $regs as $reg)
                                        <input type="hidden" name="regs[]" value="{{ $reg }}">

                                        @endforeach
                                        @endif
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <h4 class="panel-title">
                                    QR Payments
                                </h4>
                            </a>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                               <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="row" style=font-size:18px;>
                                            <div class="col-md-6 col-sm-6"><strong>Organization Name</strong></div>
                                          
                                            <div class="col-md-6 col-sm-6">{{$QrPayment->qrPayment->name }}</div>
                                        </div>
                                        <br>
                                        <div class="row" style=font-size:18px;>
                                            <div class="col-md-6 col-sm-6"><strong>QR Number</strong></div>
                                            <div class="col-md-6 col-sm-6">{{$QrPayment->qrPayment->no }}</div>
                                        </div>

                                    </div>
                                    
                                </div>
                                <div class="row">
                                <div class="col-md-12 col-sm-12">
                                        <img src="/organization/vipps/{{ $QrPayment->qrPayment->qr_code }}" style="width:200px;height:200px;" alt="">
                                        <br>
                                        <label style="margin-left:50px;" ><strong>Scan Me</strong></label>
                                    </div>
                                </div>
                                <div class="row">
                                      <div class="col-md-6">
                                        <div class="form-group label-floating">

                                           <label class="control-label" for="firstName3">Transaction Id<span style="color:red;"> <b> * </b></span>
                                            </label> 
                                             <input type="text" class="form-control" name="transId" id="id" required>
                                            {{--  <input type="hidden" class="form-control"  name="mobile" value="{{Auth::user()->tel_number}}" id="">
                                            <input type="hidden" class="form-control"  name="total" value="{{$total}}" id="id">  --}}
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
                
            


@if($stripe)
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title">
                                Stripe
                            </h4>
                        </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="row">
                                <form role="form" action="{{ route('stripe.edit') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                    @csrf
                                    <input type="hidden" name="stripeAmount" value="{{ $total }}">
                                    <input type="hidden" name="invNo" value="{{ $invNo}}" />
                                    <input type="hidden" name="trans_id" value="{{ $charge->id}}" />
                                    <input type="hidden" name="charge" value="{{ $charge}}" />
                                    <input type="hidden" class="results" name="results">
                                    <input type="hidden" class="org" name="org" value="{{ $org->id }}">

                                    <input type="hidden" name="method" value="Stripe">
                                    @if($regs)
                                        @foreach ( $regs as $reg)
                                        <input type="hidden" name="regs[]" value="{{ $reg }}">

                                        @endforeach
                                        @endif
                                        {{-- <div style="float:right;">
                                            <img src="{{ asset('assets/images/icons/stripe.png') }}" style="width:200px;">
                                        </div> --}}
                                        <div class="form-group">
                                            <div class="card-header">
                                                <div style="float:right;"><img src="{{ asset('assets/images/icons/stripe.png') }}" style="width:200px;"></div>

                                                <label for="card-element">
                                                     
                                                     
                                                     
                                                     <br> <br>
                                                     Enter your credit card information
                                                </label>
                                            </div>
                                               
                                            <br>
                                            <div class="card-body">
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>
                                                <!-- Used to display form errors. -->
                                                <input type="hidden" name="plan" value="" />
                                            </div>
                                        </div>
                                    <hr>
                                    <div id="card-errors" role="alert" style="color:red;font-size:20px;"></div>
                                        <br>
                                        <div class="card-footer">
                                          <button
                                          id="card-button"
                                          class="btn btn-labeled btn-primary"
                                          type="submit"
                                          data-secret="{{ $intent}}"
                                          > <span style="font-size:20px">Pay: {{ $iso }} {{ $total }} </span></button>
                                      </div>
                                 </form>
                            </div>
                          
                        </div>
                    </div>
                </div>
                @endif
                @if($vipps)
                    <form action="/VippsPay" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                        <input type="hidden" name="method" value="Vipps">
                        <input type="hidden" name="invNo" value="{{ $invNo}}" />

                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <h4 class="panel-title">
                                    Vipps 
                                </h4>
                            </a>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <div class="row">
                                      <div class="col-md-6">
                                         <!-- <button type="submit" class="btn btn-labeled btn-warning"> -->
                                         <input type="image" src="{{asset('assets/images/continue_vipps.png')}}" alt="Submit" width="240" height="50">

                                            <!-- Pay with Vipps
                                            <span class="btn-label cool_btn_right">
                                                <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                            </span> -->
                                        <!-- </button>  -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </form> 
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<script src="https://js.stripe.com/v3/"></script>
  <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                border:'5px solid black',
                '::placeholder': {
                    color: 'black',
                   
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { hidePostalCode: true,style: style }); // Create an instance of the card Element.
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        
        cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.
        
        // Handle real-time validation errors from the card Element.
        cardElement.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        
        // Handle form submission.
        var form = document.getElementById('payment-form');
        var cardNumber=  $("input[name='cardnumber']").val();
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            
            stripe.handleCardPayment(clientSecret, cardElement, {
                // payment_method_data: {
                //     billing_details: { 
                //         name:"suvarna"
                    
                //     }
                // }
            })
            .then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    $('.results').val(result.paymentIntent.payment_method);
                    toastr.options.timeOut = 1000;
                    toastr.success('Payment is  done successfully');
                    form.submit();
                }
            });
        });
    </script>
@stop