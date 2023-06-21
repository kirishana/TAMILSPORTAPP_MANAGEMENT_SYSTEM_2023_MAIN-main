<table class="table table-striped table-bordered">
                                            <tr>
                                                <th>Player Name</th>
                                                <th>Event</th>
                                                <th>Event Unit Price</th>
                                                <th>Event Discount</th>
                                                <th class=""> Sub Total</th>
                                                <th>Org Discount</th>
                                                <th>total</th>
                                                <th>status</th>
</tr>
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
                <tbody>
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
                                
                                <td>Approved</td>
                            
                            @elseif($registration->status== 4)
                                <td>pending</td>
                            @elseif($registration->status== 3)
                                <td>rejected</td>
                            @elseif($registration->status== 1)
                                <td>Paid</td>
                            
                              @endif  
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif

        </tbody>
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