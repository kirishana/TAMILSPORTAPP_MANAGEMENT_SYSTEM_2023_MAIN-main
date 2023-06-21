<div class="col-md-12">

    <table class="table table-striped table-bordered  text-uppercase G-event" id="table10">
        <thead class="thead-Dark">
            <tr>
                <th>Club Name</th>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="text-uppercase">
            @foreach($groupregistration as $regist)
           

                <tr> 
                    <td>{{$regist->club->club_name}} 
                    </td>
                    <td>
                        {{ $regist->trans_id }}
                    </td>

                    @if($regist->status==3||$regist->status==4)
                                
                                <td><span class="badge bg-warning">Pennding</span></td>
                            
                            @elseif($regist->status== 1)
                                <td><span class="badge primary">Processing</span></td>
                            @elseif($regist->status== 2)
                                <td><span class="badge bg-success text-dark">Paid</span></td>
                            @elseif($regist->status==5)
                                <td><span class="badge bg-danger text-dark">Rejected</span></td>
                            
                              @endif  

                    <td>{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
                    </td>
                </tr>

           
           
            @endforeach
        </tbody>
</table>
