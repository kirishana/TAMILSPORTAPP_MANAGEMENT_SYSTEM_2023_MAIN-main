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
<style>
.invoiceLogo{
    width:400px;
}
</style>
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
                </div>
                <div class="panel-body" style="border:1px solid #ccc;padding:0;margin:0;">
                    <div class="row" style="padding: 15px;margin-top:5px;">
                        <div class="col-md-6">
                            @if($org)
                            @if($org->orgsetting)

                            <img src="/organization/invoice/{{ $org->orgsetting->invoice_logo }}" class="img-responsive invoiceLogo" alt="InvoiceLogo">
                            @endif
                            @else
                            <img src="{{ asset('assets/img/web logo copy black bg small.png') }}" alt="InvoiceLogo" class="img-responsive invoiceLogo" />
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right" style="font-size:16px;">
                                <strong>Invoice From:</strong><br>
                                {{ $org->name }}<br>
                                <strong>Tele phone:</strong>{{ $org->tpnumber }}<br>
                                <strong>E-mail:</strong> {{ $org->email }}<br>

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
                            <div id="invoice" style="background-color: #eee;text-align:right;padding:5px;border-bottom-left-radius: 6px;border-top-left-radius: 6px;">
                                
                               <h2>INVOICE</h2>
                            </div>
                            <div style="float:right;">
                            <h4 ><strong>
                                <?php
                                        $count = App\Models\Registration::orderBy('inv_no','desc')->first();
                                        $inv = $count->inv_no;

                                        ?>            
                                        <?php echo "INV". " " . str_pad(($inv + 1), 6, '0', STR_PAD_LEFT)?></strong></h4>
                                
                        <h4><strong>{{ Carbon\Carbon::now()->format('Y-m-d') }}</strong></h4>
                            </div>
                        </div>
                       
                    </div>
                    <div class="row" style="padding: 15px;">
                        <div class="col-md-4" style="margin-top:5px;">


                        </div>
                        <div class="col-md-4" style="margin-top:5px;">

                       <center> <strong style="font-size:25px;padding-left:auto;padding-right:auto;">{{ $league->name }}</strong></center>

                        </div>
                        <div class="col-md-4 col-xs-6" style="padding-right:0">

                        </div>
                    </div>
                    @php
                    $totalFee=0;
                    foreach($league->registrations->where('payment_method',0) as $group){
                   if($group->user->club_id == Auth::user()->club_id){
                    if($group->is_approved==1){
                   $totalFee=$totalFee+$group->totalfee;
                    }    
}
}
                    @endphp
                    @if($totalFee==0)
                    <form action="/single-event-payment/edit" method="POST">
                        <input type="hidden" class="form-control" name="transId" id="id" value="silMember">
                        <input type="hidden" class="form-control" name="club" id="id" value="0">
                    @else
                    <form action="/group-event/pay" method="GET">

                    @endif
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                        <input type="hidden"value="{{ str_pad(($inv + 1), 6, '0', STR_PAD_LEFT)}}" name="invNo">
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
                                            @php
                                                $users=array();
                                            @endphp
                                            @foreach($league->registrations->where('payment_method',0) as $registration)
                                                @if($registration->user->club_id == Auth::user()->club_id)
                                                @if($registration->is_approved==1)

                                                <input type="hidden" name="regs[]" value="{{$registration->id}}">
                                               <?php
                                               $users[]=$registration->user->club_id;
                                               ?>
                                            <tr>
                                                <td>
                                                    {{ $registration->user->first_name }} {{ $registration->user->last_name }}
                                                    @if($registration->user->member_or_not==1)
                                                    <span>(SIL Member)</span>
                                                    @endif
                                                    <br>
                                                </td>
                                                <td>
                                                    @foreach ($registration->events as $event )
                                                    {{ $event->mainEvent->name }}
                                                    <br>
                                                    @endforeach
                                                </td>

                                                <td>
                                                    @foreach ($registration->events as $event )
                                                    {{ $iso }} {{ $event->mainEvent->price }}
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
                                                   
                                                    {{ $iso }} {{ $subtotal }}<br>
                                                  
                                                    @endforeach
                                                

                                                </td>
                                                <td>
                                                 @if($org->orgsetting)
                                                 @if($org->orgsetting->active==1)
                                         @if($registration->user->member_or_not==1)
                                            {{$org->orgsetting->discount }}%
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
                                                <td>
                                                {{ $iso }} {{ $registration->totalfee }}
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
                                                <td style="font-size:20px;"><strong>{{ $iso }} {{ $totalFee }}</strong></td>


                                            </tr>


                                        </tbody>

                                    </table>
                                    <input type="hidden" name="total" value="{{ $totalFee}}">
                                    <input type="hidden" name="org" value={{ $org->id}}>
                                    <input type="hidden" name="league" value="{{ $registration->league->id }}">
                                    <input type="hidden" name="season" value="{{ $season->id }}">

                                    <input type="hidden" name="reg" value="{{ $registration->id }}">
                                    <div class="pull-right">
                                        <h4></h4>
                                    </div>
                                    <div class="pull-right">
                                        @if($totalFee==0)
                                        <a href=""><button type="submit" class="btn btn-labeled btn-primary">
                                            Finish
                                            
                                        </button>
                                    </a>
                                    @elseif($registration->status==3||$registration->status==4)

                                        <a href=""><button type="submit" class="btn btn-labeled btn-primary">
                                                Pay
                                                <span class="btn-label cool_btn_right">
                                                    <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                                </span>
                                            </button>
                                        </a>
                                        @endif

                                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div style="background-color: #eee;padding:15px;" id="footer-bg">
            <div class="row">
                <div class="col-md-6">
                    <strong>Payment Details</strong><br>
                    <strong>Bank:</strong>{{ $org->bankTransfer?$org->bankTransfer->bank_name:'' }}<br>
                    <strong>Account Holder Name:</strong>{{ $org->bankTransfer?$org->bankTransfer->account_holder_name:'' }}<br>
                    <strong>Account Number:</strong>{{$org->bankTransfer?$org->bankTransfer->account_number:'' }}<br>
                    <strong>Account Branch:</strong>{{ $org->bankTransfer?$org->bankTransfer->account_branch:'' }}<br>

                </div>
                <div class="col-md-6">
                    <div class="pull-right">
                        <strong>Other Information</strong><br>
                        @if($org->orgnum)
                        <strong>Company Registration Number</strong>{{ $org->orgnum}}<br>
                        @endif
                        <strong>Contact</strong>:{{ $org->tpnumber }}
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
            @if($org->Vipps)
                <div class="col-md-6">
                    <strong>Vipps Details:</strong></br>
                    <strong>Vipps Name:</strong>{{$org->Vipps->vipps_name}}<br>
                    <strong>Vipps Number:</strong>{{$org->Vipps->vipps_no}}
                </div>
            @endif
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
<script>
    var table = document.getElementById("table"),
  sumVal = 0;
for (var i = 1; i < table.rows.length; i++) {
  sumVal = sumVal + parseFloat(table.rows[i].cells[4].innerHTML);
}

console.log(sumVal);
</script>

@stop