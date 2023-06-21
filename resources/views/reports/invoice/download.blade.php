
<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
    }
  
    table th {
        padding-bottom: 5px;
        line-height: 2;
        border: 1px solid rgb(7, 3, 3);

        /* border: 1px solid #ddd; */

    }

     td {
        width: 1px;
    }
  .thead {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
/* tr:nth-child(even) {
  background-color: #F4F6F6;
} */
h2 {
    text-align: center;
}
.tbody td{
    padding:5px;
    border: 1px solid rgb(7, 3, 3);

}
</style>       
<table class="table" id="table">

        
                <tr>
                    @if ($league->organization)
                    @if ($league->organization->orgsetting)
                        <img src="{{ public_path('organization/invoice/'.$league->organization->orgsetting->invoice_logo .'')}}"
                            class="img-responsive" style="width:320px;" alt="Tamil Sangam">
                    @endif
                @else
                    <img src="{{ asset('assets/img/web logo copy black bg small.png') }}"
                        alt="Tamil Sangam Norway" class="img-responsive" />
                @endif
                    
                    </td>
                    <td>
                        <strong>Invoice From:</strong>
                        {{ $league->organization->name }}<br>
                        <strong>Tele phone:</strong>{{ $league->organization->tpnumber }}<br>
                        <strong>E-mail:</strong> {{ $league->organization->email }}


                    </td>
                                       
                </tr>
         
                <tr>
                    <td>
                        <strong>Invoice To:</strong><br>
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<br>
                        <strong>Tele phone:</strong>{{ Auth::user()->tel_number }}<br>
                        <strong>E-mail:</strong>{{ Auth::user()->email }}<br>
                    </td>
                    <td>
                        <div id="invoice" style="background-color: #eee;text-align:right;padding:5px;border-bottom-left-radius: 6px;border-top-left-radius: 6px;">

                        <h2>INVOICE</h2>
                    </div>
                   
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        
                        <h4><strong>

                                <?php echo 'INV' . ' ' . str_pad($inv, 6, '0', STR_PAD_LEFT); ?></strong></h4>

                        <h4><strong>{{ Carbon\Carbon::now()->format('Y-m-d') }}</strong></h4>
                    </td>
                </tr>


</table>
                              
                           
                                   
                                
                               

                            
                               
                           
                           

                                <center> <strong
                                        style="font-size:25px;padding-left:auto;padding-right:auto;">{{ $league->name }}</strong>
                                </center>

                            
                        @php
                            $totalFee = 0;
                            foreach ($regs as $group) {
                                if ($group->user->club_id == Auth::user()->club_id) {
                                    if ($group->is_approved == 1) {
                                        $totalFee = $totalFee + $group->totalfee;
                                    }
                                }
                            }
                        @endphp

                    
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
                                        <tbody class="tbody">

                                            @foreach ($regs as $registration)
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
                      
