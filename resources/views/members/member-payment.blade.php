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
                                <strong>Address:</strong>{{ $organization->city }} {{ $organization->country->name }}<br>
                                <strong>Mobile Number:</strong>{{ $organization->tpnumber }}<br>
                                <strong>Email:</strong>{{ $organization->email }}<br>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 15px;">
                        <div class="col-md-9 col-xs-6" style="margin-top:5px;">
                            <strong>Invoice To:</strong><br>
                            <strong>Name:</strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br>
                            <strong>Mobile Number:</strong>{{ Auth::user()->tel_number }}<br>
                            <strong>Email:</strong>{{ Auth::user()->email }}<br>

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

                            <strong style="font-size:25px;">{{ $org->league->name }}</strong>

                        </div>
                        <div class="col-md-4 col-xs-6" style="padding-right:0">

                        </div>
                    </div>

                    <div class="row" style="padding:15px;">
                        <div class="col-md-12 col-xs-12">
                            <div class="table-responsive">
                                <form action="/event/register/child-pay" method="POST">
                               
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="org" value="{{ $organization_id }}">
                                    <input type="hidden" name="league" value="{{ $league_id }}">
                                    <input type="hidden" name="user" value="{{ $user }}">

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
                                    <table class="table" id="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Event Name</th>
                                                <th>Price </th>
                                                @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)
                                                <th>Discount</th>
                                                @endif
                                                @endif
                                                <th class="totalprice"> NetSubtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($fieldEvents)
                                            @foreach ( $fieldEvents as $key=>$fieldEvent)
                                            <?php
                                            $event = App\Models\Event::where('id', $fieldEvent)->first();
                                            ?>
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $event->mainEvent->name}}</td>
                                                <td>{{ $iso }} {{ $event->mainEvent->price}}</td>
                                                @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)

                                                <td>{{ $event->mainEvent->discount}}%</td>
                                                @endif
                                                @endif
                                                @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)

                                                <?php
                                                if ($event->mainEvent->discount > 0) {


                                                    $subtotal = $event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                } else {
                                                    $subtotal = $event->mainEvent->price;
                                                }
                                                ?>
                                                @if(Auth::User()->member_or_not==0)
                                                <td>{{ $subtotal }}</td>
                                                @endif
                                                @if(Auth::User()->member_or_not==1)
                                                <td>0</td>
                                                @endif
                                                @else
                                                @if(Auth::User()->member_or_not==0)
                                                <td>{{ $event->mainEvent->price }}</td>
                                                @endif
                                                @if(Auth::User()->member_or_not==1)
                                                <td>0</td>
                                                @endif                                                
                                                @endif
                                                @else
                                                @if(Auth::User()->member_or_not==0)
                                                <td>{{ $event->mainEvent->price }}</td>
                                                @endif
                                                @if(Auth::User()->member_or_not==1)
                                                <td>0</td>
                                                @endif
                                                @endif
                                            </tr>
                                            </tr>
                                            @endforeach
                                            @endif
                                            @if($trackEvents)
                                            @foreach ( $trackEvents as $key=>$trackEvent)
                                            <?php
                                            $event = App\Models\Event::where('id', $trackEvent)->first();
                                            ?>
                                            <tr>
                                                <td>{{ ++$key }}</td>
                                                <td>{{ $event->mainEvent->name}}</td>
                                                <td>{{ $iso }} {{ $event->mainEvent->price}}</td>
                                                @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)

                                                <td>{{ $event->mainEvent->discount}}%</td>
                                                @endif
                                                @endif
                                                @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)

                                                <?php
                                                if ($event->mainEvent->discount > 0) {


                                                    $subtotal = $event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price);
                                                } else {
                                                    $subtotal = $event->mainEvent->price;
                                                }
                                                ?>
                                                @if(Auth::User()->member_or_not==0)
                                                <td>{{ $subtotal }}</td>
                                                @endif
                                                @if(Auth::User()->member_or_not==1)
                                                <td>0</td>
                                                @endif                                                
                                                @else
                                                @if(Auth::User()->member_or_not==0)
                                                <td>{{ $event->mainEvent->price }}</td>
                                                @endif
                                                @if(Auth::User()->member_or_not==1)
                                                <td>0</td>
                                                @endif
                                                @endif
                                                @else
                                                @if(Auth::User()->member_or_not==0)
                                                <td>{{ $event->mainEvent->price }}</td>
                                                @endif
                                                @if(Auth::User()->member_or_not==1)
                                                <td>0</td>
                                                @endif
                                                @endif
                                            </tr>
                                            @endforeach
                                            @endif
                                            @if(Auth::User()->organization!=null)
                                                @if(Auth::User()->organization_id==$organization->id)

                                                <tr>


                                                    <td><strong>Total : </strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td id="total">
                                                    </td>

                                                </tr>
                                                @else

                                                <tr>


                                                    <td><strong>Total : </strong></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td id="total">
                                                    </td>


                                                </tr>
                                                @endif
                                                @else
                                                <td><strong>Total : </strong></td>
                                                <td></td>
                                                <td></td>
                                                <td id="total">
                                                </td>
                                                @endif
                                        </tbody>

                                    </table>

                                    <?php
                                        if (Auth::User()->organization_id!=null) {
                                            if(Auth::User()->organization_id==$organization->id){

                                        ?>
                                            <script>
                                                var table = document.getElementById("table"),
                                                    sumVal = 0;
                                                for (var i = 1; i < table.tBodies[0].rows.length; i++) {
                                                    sumVal = sumVal + parseInt(table.rows[i].cells[4].innerHTML);
                                                }
                                                var iso = <?php echo json_encode($iso); ?>

                                                document.getElementById("total").innerHTML = iso.concat(" ", sumVal);
                                            </script>
                                            <input type="hidden" name="total" id="total1" value="">
                                            <script>
                                                var a = $('#total1').val($('#total').text());
                                                
                                            </script>

                                        <?php

                                        }
                                    
                                        else if(Auth::User()->organization_id!=$organization->id){

?>
<script>
                                                var table = document.getElementById("table"),
                                                    sumVal = 0;
                                                for (var i = 1; i < table.tBodies[0].rows.length; i++) {
                                                    sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
                                                }
                                                var iso = <?php echo json_encode($iso); ?>

                                                document.getElementById("total").innerHTML = iso.concat(" ", sumVal);
                                            </script>
                                            <input type="hidden" name="total" id="total1" value="">
                                            <script>
                                                var a = $('#total1').val($('#total').text());
                                               
                                            </script>
                                            <?php
                                        }
                                    }
                                      else {
                                        ?>
                                            <script>
                                                var table = document.getElementById("table"),
                                                    sumVal = 0;
                                                for (var i = 1; i < table.tBodies[0].rows.length; i++) {
                                                    sumVal = sumVal + parseInt(table.rows[i].cells[3].innerHTML);
                                                }
                                                var iso = <?php echo json_encode($iso); ?>

                                                document.getElementById("total").innerHTML = iso.concat(" ", sumVal);
                                            </script>
                                            <input type="hidden" name="total" id="total1" value="">
                                            <script>
                                                var a = $('#total1').val($('#total').text());
                                               
                                            </script>

                                        <?php }
                                        ?>


                                    <div class="pull-right">

                                        <button type="submit" class="btn btn-labeled btn-primary">
                                            Register
                                            <span class="btn-label cool_btn_right">
                                                <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                            </span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div style="background-color: #eee;padding:15px;" id="footer-bg">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>Payment Details</strong><br>
                                <strong>Bank: </strong>{{$organization->bankTransfer?$organization->bankTransfer->bank_name:''}}<br>
                                <strong>Account Holder Name:</strong>{{ $organization->bankTransfer?$organization->bankTransfer->account_holder_name:'' }}<br>
                                <strong>Account Number:</strong>{{$organization->bankTransfer?$organization->bankTransfer->account_number:'' }}<br>
                                <strong>Account Branch:</strong>{{ $organization->bankTransfer?$organization->bankTransfer->account_branch:'' }}<br>

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