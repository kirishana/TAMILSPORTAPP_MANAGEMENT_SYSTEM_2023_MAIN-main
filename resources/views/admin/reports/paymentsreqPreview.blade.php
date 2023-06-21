<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    table td,
    table th {
        border:solid #B2BABB;
        opacity:50;
        border-width: thin;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .table .thead-Dark th {
 
        color: white;
        background-color: #515763;
        text-transform: uppercase;
        padding-top: 5px;
        padding-bottom: 5px;

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F7;
}
h2 {
    text-align: center;
    text-transform: capitalize;
    font-size: 20px;

}
</style>
<div class="row" id="G-print">
@include('reports.PrintHeader')
   
    <h2>Group Events Payments</h2>
    <table class="table table-striped table-bordered   G-event" id="G-pdf" style="text-transform: capitalize;">
        <thead>
            <tr>
                <th>Club Name</th>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody >
            @foreach($groupregistration as $regist)
           

                <tr> 
                    <td>{{$regist->club->club_name}} 
                    </td>
                    <td>
                        {{ $regist->trans_id }}
                    </td>

                    @if($regist->status==3||$regist->status==4)
                                
                                <td>Pennding</td>
                            
                            @elseif($regist->status== 1)
                                <td>Processing</td>
                            @elseif($regist->status== 2)
                                <td>Paid</td>
                            @elseif($regist->status== 5)
                                <td>Rejected</td>
                            
                              @endif  


                    <td>{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
                    </td>
                </tr>

           
           
            @endforeach
        </tbody>
    </table>
   
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
