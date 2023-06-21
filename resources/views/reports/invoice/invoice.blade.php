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
            <li><a href="#"> Reports</a></li>
            <li class="active">Invoices</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="col-md-12">
                <div class="panel">

                    <div class="panel-body" style="border:1px solid #ccc;padding:0;margin:0;">
                        <div class="row" style="padding: 15px;margin-top:5px;">
                            <div class="col-md-6">
                                @if ($league->organization)
                                    @if ($league->organization->orgsetting)
                                        <img src="/organization/invoice/{{ $league->organization->orgsetting->invoice_logo }}"
                                            class="img-responsive" style="width:320px;" alt="Tamil Sangam">
                                    @endif
                                @else
                                    <img src="{{ asset('assets/img/web logo copy black bg small.png') }}"
                                        alt="Tamil Sangam Norway" class="img-responsive" />
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="pull-right" style="font-size:16px;">
                                    <strong>Invoice From:</strong><br>
                                    {{ $league->organization->name }}<br>
                                    <strong>Tele phone:</strong>{{ $league->organization->tpnumber }}<br>
                                    <strong>E-mail:</strong> {{ $league->organization->email }}<br>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xs-6" style="margin-top:5px;font-size:16px;">
                                <strong>Invoice To:</strong><br>
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br>
                                <strong>Tele phone:</strong>{{ Auth::user()->tel_number }}<br>
                                <strong>E-mail:</strong>{{ Auth::user()->email }}<br>

                            </div>
                            <div class="col-md-3 col-xs-6" style="float: right;">
                                <div id="invoice"
                                    style="background-color: #eee;text-align:right;padding:5px;border-bottom-left-radius: 6px;border-top-left-radius: 6px;">

                                    <h2>INVOICE</h2>
                                </div>
                                <div style="float:right;">
                                    <h4><strong>

                                            <?php echo 'INV' . ' ' . str_pad($inv, 6, '0', STR_PAD_LEFT); ?></strong></h4>

                                    <h4><strong>{{ Carbon\Carbon::now()->format('Y-m-d') }}</strong></h4>
                                </div>
                            </div>

                        </div>
                        <div class="row" style="padding: 15px;">
                            <div class="col-md-4" style="margin-top:5px;">


                            </div>
                            <div class="col-md-4" style="margin-top:5px;">

                                <center> <strong
                                        style="font-size:25px;padding-left:auto;padding-right:auto;">{{ $league->name }}</strong>
                                </center>

                            </div>
                            <div class="col-md-4 col-xs-6" style="padding-right:0">

                            </div>
                        </div>
                        @php
                            $totalFee = 0;
                            foreach ($regs as $group) {
                                if ($group->user->club_id == Auth::user()->club_id) {
                                    if($group->events->count()>0){
                                    if ($group->is_approved == 1) {
                                        $totalFee = $totalFee + $group->totalfee;
                                    }
                                }
                            }
                            }
                        @endphp

                        <div class="row" style="padding:15px;">
                            <div class="col-md-12 col-xs-12">
                                <div class="table-responsive">
                                    <table class="table" id="table">
                                        <thead>
                                            <tr>
                                               <th>Player Name</th>
                                                <th>Events</th>
                                                <th>Event unit Price </th>
                                                <th>Event Discount</th>
                                                <th class="totalprice"> Sub Total</th>
                                                <th>Org Member<br>Discount</th>
                                                <th>Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($regs as $registration)
                                            @if($registration->events->count()>0)
                                                @if ($registration->is_approved == 1)
                                                    <tr>
                                                        <td>
                                                            {{ $registration->user->first_name }}
                                                            {{ $registration->user->last_name }}
                                                            @if($registration->user->member_or_not==1)
                                                            <span>(SIL Member)</span>
                                                            @endif
                                                            <br>
                                                        </td>
                                                        <td>
                                                            @foreach ($registration->events as $event)
                                                                {{ $event->mainEvent->name }}
                                                                <br>
                                                            @endforeach
                                                        </td>

                                                        <td>
                                                            @foreach ($registration->events as $event)
                                                                {{ Auth::user()->country->currency->currency_iso_code }}
                                                                {{ $event->mainEvent->price }}
                                                                <br>
                                                            @endforeach

                                                        </td>
                                                        <td>
                                                    @foreach ($registration->events as $event )
                                                  {{ $event->mainEvent->discount }}%
                                                    <br>
                                                    @endforeach
                                                   
                                                </td>
                                             
                                                         <td>
                                                   
                                                    @foreach ($registration->events as $event )


                                                    <?php
                                           
                                                        $subtotal =($event->mainEvent->price - (($event->mainEvent->discount / 100) * $event->mainEvent->price));
                                                    
                                                    ?>
                                                   
                                                     {{ Auth::user()->country->currency->currency_iso_code }}{{ $subtotal }}<br>
                                                  
                                                    @endforeach
                                                

                                                </td>
                                                <td>
                                                 @if($league->organization->orgsetting->extra_question!=null)
                                         @if($registration->user->member_or_not==1)
{{$league->organization->orgsetting->discount }}%
                                           @else
                                           0%
                                            @endif
                                            @endif
                                                </td>
                                                <td>
                                                {{ Auth::user()->country->currency->currency_iso_code }} {{ $registration->totalfee }}
                                                </td>
                                                    </tr>
                                                    @endif
                                                @endif
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>    
                                                <td></td>   
                                                <td></td>
                                                <td style="text-align:right;font-size:20px;"><strong>Total : </strong></td>                                        
                                                <td style="font-size:20px;"><strong>{{ Auth::user()->country->currency->currency_iso_code }} {{ $totalFee }}</strong></td>


                                            </tr>


                                        </tbody>

                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>Payment Method:</strong>
                                        @if ($reg->payment_method == 1)
                                       <strong><span style="font-size:20px;">Bank</span></strong>
                                       @elseif ($reg->payment_method == 2)
                                       <strong><span style="font-size:20px;">Vipps</span></strong>
                                       @elseif ($reg->payment_method == 4)
                                       <strong><span style="font-size:20px;">Stripe</span></strong>
                                    @elseif($reg->payment_method == 3)
                                       
                                    @endif
                                        <br>
                                        <br>
                                        <strong>Payment Status:</strong>
                                        @if ($reg->status == 1 && $reg->payment_method == 3)
                                       <button class="btn btn-default">SIL Member</button>
                                    @elseif($reg->status == 1)
                                        <button class="btn btn-success">Paid</button>
                                    @elseif($reg->status == 2)
                                        <button class="btn btn-success">Approved</button>
                                    @elseif($reg->status == 3)
                                        <button class="btn btn-danger">Rejected</button>
                                    @elseif($reg->status == 4)
                                        <button class="btn btn-warning">Pending</button>
                                    @endif<br>
                                       
                                    </div>
                                    <div class="col-md-6">
                                        <div class="pull-right">
                                            <strong>Other Information</strong><br>
                                            @if ($league->organization->orgnum)
                                                <strong>Company Registration
                                                    Number</strong>{{ $league->organization->orgnum }}<br>
                                            @endif
                                            <strong>Contact</strong>:{{ $league->organization->tpnumber }}
                                        </div>
                                    </div>
                                </div>
                                <div style="text-align:center;" class="btn-section">
                                    <button type="button" class="btn btn-raised btn-responsive button-alignment btn-primary"
                                        data-toggle="button">
                                        <a style="color:#fff;" onclick="javascript:window.print();">
                                            <i class="material-icons">print</i>
                                            Print
                                        </a>
                                    </button>
                                   
                                    <a style="color:#fff;" href="/report/{{ $reg->league_id }}/invoice/{{ $reg->trans_id }}/download">
                                        <button type="button" class="btn btn-raised btn-responsive button-alignment btn-success"
                                        ><img style="margin-top:0px" src="{{ asset('assets/images/icons/pdf.png') }}">
                                        Download
                                    </button>
                                    </a>
                                

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

    <script src="{{ asset('assets/js/pages/invoice.js') }}" type="text/javascript"></script>
    <script>
        var table = document.getElementById("table"),
            sumVal = 0;
        for (var i = 1; i < table.rows.length; i++) {
            sumVal = sumVal + parseFloat(table.rows[i].cells[4].innerHTML);
        }

        console.log(sumVal);
    </script>

@stop
