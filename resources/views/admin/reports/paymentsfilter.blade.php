<div class="col-md-12">

    <table class="table table-striped table-bordered  request" id="table10" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr>
                <th>Player Name</th>
                <th>User Id</th>
                <th>club Name</th>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registration as $regist)
           

                <tr> 
                    <td>{{$regist->user->first_name}} &nbsp; {{$regist->user->last_name}}
                    </td>
                    <td>{{$regist->user->userId}} 
                    </td>
                    <td>
                    {{$regist->user->club?$regist->user->club->club_name:'-'}} 
                    </td>
                    
                    <td>
                        {{ $regist->trans_id }}
                    </td>
                   @if($regist->status==1)
                                
                                <td style="width:10%;"><span class="badge warning">Pending</span></td>
                            
                         
                            @elseif($regist->status== 2)
                                <td style="width:10%;"><span class="badge success text-dark">Approved</span></td>
                            @elseif($regist->status==3)
                                <td style="width:10%;"><span class="badge danger text-dark">Declined</span></td>
                            
                              @endif  
                    <td>{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
                    </td>
                </tr>

           
           
            @endforeach
        </tbody>
</table>
