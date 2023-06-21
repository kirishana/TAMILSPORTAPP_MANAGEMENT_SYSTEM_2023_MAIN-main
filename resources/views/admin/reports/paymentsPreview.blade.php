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
<div class="row" id="print">
@include('reports.PrintHeader')
    <br>
    <br>
    <br>
    <table class="table table-striped table-bordered request " id="pdf" style="text-transform: capitalize;">
        <thead>
            <tr>
                <th>Player Name</th>
                <th>User Id</th>
                <th> club name</th>
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
                    <td>  {{$regist->user->club?$regist->user->club->club_name:'-'}} 
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
   
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
