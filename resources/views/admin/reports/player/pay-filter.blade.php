<div class="col-md-12">

    <table class="table table-striped table-bordered  play " id="table10">
        <thead class="thead-Dark">
            <tr>
                <th>Organization</th>
                <th>League</th>
                <th>Participant's Name</th>
                <th>Events</th>
                <th>payment Method</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="text-uppercase">
            @foreach($registration as $regist)
           

                <tr> 
                    
                    <td>{{$regist->organization->name}}
                    </td>
                    <td>{{$regist->league->name}} 
                    </td>
                    <td>{{$regist->user->first_name}} &nbsp;{{$regist->user->last_name}} 
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
                  
                    @if($regist->user->club)
                    <td>Paid by club</td>
                    @else
                    @if($regist->payment_method== 1)
                    <td>Vipps</td>
                    @endif
                    @if($regist->payment_method== 2)
                    <td>Bank</td>
                    @endif
                    @endif
                  
                    @if($regist->status== 2)
                                
                                    <td><span class="badge bg-success">approved</span></td>
                                
                                @else
                                    <td><span class="badge bg-warning text-dark">pending</span></td>
                                
                                  @endif  

                    <td>{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
                    </td>
                </tr>

           
           
            @endforeach
        </tbody>
</table>
