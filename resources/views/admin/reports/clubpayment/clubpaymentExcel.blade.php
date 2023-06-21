<div class="col-md-12">

    <table class="table table-striped table-bordered  cpay " id="table10" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr>
                <th>Player Name</th>
                <th>Events</th>
                <th>Transaction ID</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach($registration as $regist)

                <tr> 
                    <td>{{$regist->user->first_name}} &nbsp; {{$regist->user->last_name}}
                    </td>
                    <td>
                            <ul class="text-left">

                                @foreach($regist->events as $event)
                                    <li>
                                        {{ $event->mainEvent->name }}
                                    </li>
                                @endforeach


                            </ul>
                    </td>
                    <td>
                        {{ $regist->trans_id }}
                    </td>
                    <td>
                    @if($regist->payment_method == 1)
                           {{'Bank'}}
                    @endif
                        @if($regist->payment_method == 2)
                        {{'Vipps'}}
                        @endif

                        @if($regist->payment_method == 3)
                        {{'Sil Member'}}
                        @endif

                        @if($regist->payment_method == 4)
                        {{'Stripe'}}
                        @endif

                        @if($regist->payment_method == 5)
                        {{'qrPayment'}}
                        @endif
                    </td>
                    @if($regist->status== 2)
                                
                                    <td><span class="badge bg-success">approved</span></td>
                                
                                @else
                                    <td><span class="badge bg-warning text-dark">pending</span></td>
                                
                                  @endif  
                                  

                    <td>
                        {{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
                    </td>
                </tr>

           
            @endforeach
        </tbody>
</table>
