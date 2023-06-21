<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
</style>
<div class="row" id="print30">
<div class="container">
@include('reports.PrintHeader')
    </div>
    <br>
    <br>
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
                                            @endif
            </table>
            @if($registrations->count()>0)

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
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
