@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Participants
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <style>
        .mt-100 {
            margin-top: 100px
        }

        /* body {
        background: #00B4DB;
        background: -webkit-linear-gradient(to right, #0083B0, #00B4DB);
        background: linear-gradient(to right, #0083B0, #00B4DB);
        color: #514B64;
        min-height: 100vh
    } */

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
    
    @stop

        {{-- Page content --}}
        @section('content')

        <section class="content-header">
            <!--section starts-->
            <h1>Club Transactions</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="">
                        <i class="material-icons breadmaterial">home</i>

                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#">Reports</a>
                </li>
                <li class="active">Club Transactions</li>
            </ol>
        </section>
        <!--section ends-->

        <section class="content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                Club Transactions
                            </h3>
                        </div>
                            <div class="panel-body">
                                    <ul style="background:none" class="nav  nav-tabs">
                                        <li class="active">
                                            <a class="panel-title" href="#tab1" data-toggle="tab">
                                                Single Events</a>
                                        </li>
                                        <li>
                                            <a class="panel-title" href="#tab2" data-toggle="tab">
                                                Group Events</a>
                                        </li>



                                    </ul>
                                    <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab1">
                                   
                        
<div class="row">
<div class="col-md-12 export-button" style="margin-top: 35px; display:flex; justify-content:flex-end;">
    <a id="I-10"  style="cursor:pointer"><img src="{{asset('assets/images/print.png')}}" style="float: right;margin-right:5px;"class="img-responsive " /> </a>
    <a href="/Brief/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/Brief/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
                                            </div>
                                            <br>

                                        <div style="display:none;" id="">
                                        @include('admin.reports.brief_invoicePrint')

                                     
                                        </div>

                                        <div class="table-responsive">
                                        <table class="table table-striped table-bordered">
                                            <thead class="thead-Dark">
                                                <th>Player Name</th>
                                                <th>Event</th>
                                                <th>Event Unit Price</th>
                                                <th>Event Discount</th>
                                                <th class=""> Sub Total</th>
                                                <th>Org Discount</th>
                                                <th>total</th>
                                                <th>status</th>
                                            </thead>
                                            @if($registrations->count()>0)
                                            @foreach($registrations as $registration)
                                            @if($registration->events->count()>0)
                                            <?php
                  $total=App\Models\Registration::where('league_id',$league)->where('status','!=',3)->where('is_approved',1)->wherehas('user',function($q) use($registration){
                    $q->where('club_id',$registration->user->club_id);
                   })->sum('totalfee');
                  $paid=App\Models\Registration::where('league_id',$league)->whereIn('status',[1,2])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                    $q->where('club_id',$registration->user->club_id);
                   })->sum('totalfee');
                  $payable=App\Models\Registration::where('league_id',$league)->whereNotIn('status',[1,2,3])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                    $q->where('club_id',$registration->user->club_id);
                   })->sum('totalfee');

                ?>
                                            <tr>
                                                <td>{{$registration->user->first_name}} &nbsp;{{$registration->user->last_name}}
                                                @if($registration->organization->orgsetting)
                                                 @if($registration->organization->orgsetting->active==1)
                                         @if($registration->user->member_or_not==1)
                                         [SIL Member]
                                            @endif
                                            @endif
                                            @endif

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
                                                  {{ $event->discount }}%
                                                    <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                @foreach ($registration->events as $event )
                                                    <?php
                                                        $subtotal =($event->mainEvent->price - (($event->discount / 100) * $event->mainEvent->price));
                                                    ?>
                                                    {{ $iso }} {{ $subtotal }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                               
                                         @if($registration->user->member_or_not==1)
                                            {{$registration->discount }}%
                                           @else
                                           0%
                                            @endif
                                         
                                                </td>
                                                <?php
                                                 $totalFee=0;
                                                 if($registration->user->club_id == $club){
                                                    $totalFee=$totalFee+$registration->totalfee;
                                                   
                                                    }                                               

                                                 ?>
                                                <td><strong>{{ $iso }} {{ $totalFee }}</strong></td>
                                                @if($registration->status== 2)
                                
                                <td><span class="label primary">Approved</span></td>
                            
                            @elseif($registration->status== 4)
                                <td><span class="label warning text-dark">pending</span></td>
                            @elseif($registration->status== 3)
                                <td><span class="label danger">rejected</span></td>
                            @elseif($registration->status== 1)
                                <td><span class="label success">Paid</span></td>
                            
                              @endif  
                                            </tr>
                                            @endif  

                                            @endforeach
            </table>
            <table class="table table-striped table-bordered">
                <tr>
                    <th style="text-align:left">Total Amount</th>
                    <td>{{$iso}}&nbsp;{{$total}}</td>
                </tr>
                <tr>
                    <th style="text-align:left">Total Paid Amount</th>
                    <td>{{$iso}}&nbsp;{{$paid}}</td>
                </tr>
                <tr>
                    <th style="text-align:left">Total Payable Amount</td>
                    <td>{{$iso}}&nbsp;{{$payable}}</td>
                </tr>
            </table>
            @endif  
                       
                                        </div>
                                    </div>
                                    <div class="tab-pane fade in" id="tab2"> 
<div class="row">
    <br>
    <br>
                           <div class="col-md-2 pull-right">                                                

                                           <a href="/BriefGroup/excel"> <img
                                                   src="{{ asset('assets/images/excel.png') }}"
                                                   style="float: right;"
                                                   class="img-responsive" />
                                           </a>
                                           <a href="/BriefGroup/export" target="_blank"> <img
                                                   src="{{ asset('assets/images/pdf.png') }}"
                                                   style="float: right;margin-right:5px"
                                                   class="img-responsive" />
                                           </a>
                                           <a id="btn" style="cursor:pointer"><img
                                                   src="{{ asset('assets/images/print.png') }}"
                                                   style="float: right;margin-right:5px" class="img-responsive"/>
                                           </a>
                                       </div>
                                   </div>
                                   <br>

                               <div style="display:none;">
                               @include('admin.reports.clubTransactionGroupPrint')
                               </div>

                               <div class="table-responsive">
                               @include('admin.reports.clubTransactionfilterGroup')
                               </div>
                           </div>
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
            @stop


{{-- page level scripts --}}
@section('footer_scripts')
@stop
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 

<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){
    $('#I-10').click(function(){
        $("#print30").print();
    });
    });
    jQuery(document).ready(function($){
    $('#btn').click(function(){
        $("#print40").print();
    });
    });
</script>


