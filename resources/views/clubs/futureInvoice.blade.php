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
<section class="content paddingleft_right15 invoice">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">
                </div>
                <div class="panel-body invoice" style="border:1px solid #ccc;padding:0;margin:0;">
                    <div class="row" style="padding: 15px;margin-top:5px;">
                        <div class="col-md-6">
                            @if($org)
                            @if($org->orgsetting)

                            <img src="/organization/invoice/{{ $org->orgsetting->invoice_logo }}" style="width:320px;" class="img-responsive"  alt="Tamil Sangam">
                            @endif
                            @else
                            <img src="{{ asset('assets/img/web logo copy black bg small.png') }}" alt="Tamil Sangam Norway" class="img-responsive" />
                            @endif
                        </div>
                        <div class="col-md-6">
                        <div class="pull-right" style="font-size:16px;">
                                <strong>Invoice From:</strong><br>
                             {{ $org->name }}<br>
                                <strong>{{ $org->address }},{{ $org->city }}<br></strong>
                                <strong>Mobile Number:</strong>{{ $org->mobile }}<br>
                                <strong>Email:</strong>{{ $org->email }}<br>

                            </div>
                        </div>
                    </div>
                    <div class="row" style="padding: 15px;">
                        <div class="col-md-6 col-xs-6" style="margin-top:5px;font-size:16px;">
                        <strong>Invoice To:</strong><br>
                          {{ Auth::user()->first_name }} {{ Auth::user()->first_name }}<br>
                            <strong>Phone:</strong>{{ Auth::user()->tel_number }}<br>
                            <strong>Email:</strong>{{ Auth::user()->email }}<br>

                        </div>
                        <?php 
                        $group1=null;
                        ?>
                        @foreach ($groupRegistrations as $group)
                        @if($group->club_id==Auth::user()->club_id)
                        <?php 

                        $group1=$group;
                        ?>

                        @endif                         
                        @endforeach
         

                                               
                       

                        <div class="col-md-3 col-xs-6" style="float: right;">
                            <div id="invoice" style="background-color: #eee;text-align:right;padding:5px;border-bottom-left-radius: 6px;border-top-left-radius: 6px;">
                                
                               <h2>INVOICE</h2>
                            </div>
                            <div style="float:right;">
                            <h4 ><strong>
                                <?php
                                        $count = App\Models\GroupRegistration::orderBy('inv_no','desc')->first();
                                        $inv = $count->inv_no;

                                        ?>            
                                        <?php echo "INV"." "."GR"." " . str_pad(($inv + 1), 6, '0', STR_PAD_LEFT)?></strong></h4>
                                
                        <h4><strong>{{ Carbon\Carbon::now()->format('Y-m-d') }}</strong></h4>
                            </div>
                        </div>
                    </div>
  

                    <div class="row">
                        <div class="col-md-4">


                        </div>
                        <div class="col-md-4">

                        <center><strong style="font-size:25px;">{{ $league->name }}</strong></center>

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                    <div class="row" style="padding:15px;">
                        <div class="col-md-12 col-xs-12">
                            <div class="table-responsive">

                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th>Organization</th>
                                            <th>Events</th>
                                            <th>Teams</th>
                                            <th>AgeGroup</th>
                                            <th>Gender</th>
                                            <th>Event Unit Price </th>
                                            <th>Event Discount</th>
                                            <th class="totalprice">Sub Total</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
                                        <form action="/next/payment" method="GET">
{{-- {{ dd($groupRegistrations) }} --}}
                                            @foreach ($groupRegistrations as  $group)
                                            <input type="hidden" name="trans" value="{{ $group->trans_id }}">                                             

                                            <input type="hidden" name="league" value="{{$group->league_id}}">
                                            <input type="hidden" name="org" value="{{$group->organization_id}}">
                                            <input type="hidden"value="{{ $inv+1 }}" name="invNo">

                                            <tr>

                                                <td>

                                                    {{ $group->organization->name }}
                                                  
                                                </td>
                                             
                                                <td>
                                                    {{ $group->event->mainEvent->name}} <br>
                                                </td>

                                                        

                                                        <td>
                                                            @foreach ($group->teams as $team)
                                                        {{$team->name}} <br>
                                                            @endforeach
                                                        </td>
                                                    
                                                    

                                                    @php
                                                    $ageGroupEvent=App\Models\AgeGroupGender::where('id',$group->age_group_gender_id)->first()->age_group_event_id;
                                                    $ageGroup=App\Models\AgeGroupEvent::where('id',$ageGroupEvent)->first()->age_group_id;
                                                    $name=App\Models\AgeGroup::where('id',$ageGroup)->first()->name;
                                                    @endphp

                                                    <td>
                                                    {{ $name}} <br>
                                                </td>

                                                <td>
                                                    @php
                                                    $ageGroupEvent=App\Models\AgeGroupGender::where('id',$group->age_group_gender_id)->first()->gender_id;
                                                    @endphp
                                                    @if($ageGroupEvent==1)
                                                    {{"Male"}}
                                                    @else
                                                    {{"Female"}}
                                                    @endif
                                                </td>
                                             
                                              
                                                    <td>
                                                    {{ $iso }} {{ $group->event->mainEvent->price}}<br>
                                                </td>
                                               
                                               <td>
                                                    {{ $group->event->mainEvent->discount}}%<br>
                                                </td>
                                                @if($group->club_id==Auth::user()->club_id)

                                                <?php
                                               
                                                    $subtotal = ($group->event->mainEvent->price - (($group->event->discount / 100) * $group->event->mainEvent->price))*count($group->teams);
                                                
                                                ?>
                                                <td>
                                                {{ $iso }} {{ $subtotal }} 
                                                </td>
                                                <br>


                                              
@endif
                                           

                                            </tr>
                                            @endforeach
                                            <tr>
<td></td>                                                
<td></td>
<td></td>
<td></td>
<td></td>
 <td style="text-align:right;font-size:20px;"><strong>Total : </strong></td>                                        
                                               
<td>
    <?php
    $total = 0;
    foreach ($groupRegistrations as $group) {
        if ($group->club_id == Auth::user()->club_id) {
            $total = $total + $group->totalfee;
        }
    }
    ?>
     <td style="font-size:20px;"><strong>{{ $iso }} {{ $total }}</strong></td>

</td>

<input type="hidden" name="total" value="{{ $total }}">
                                            </tr>
                                    </tbody>

                                </table>
                                <?php 
                                $group1=null;
                                ?>
                                @foreach ($league->groupRegistrations as $group)
                                @if($group->club_id==Auth::user()->club_id)
                                <?php 
        
                                $group1=$group;
                                ?>
                                @endif
                                                        @endforeach
        
                                @if($group1!=null&& $group1->status==0)
                                <div class="pull-right">
                                    <a href=""><button type="submit" class="btn btn-labeled btn-primary">
                                            Next
                                            <span class="btn-label cool_btn_right">
                                                <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                            </span>
                                        </button>
                                    </a>

                                </div>
                                @else
                                @endif
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
                        <br>
            <div class="row">
            
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