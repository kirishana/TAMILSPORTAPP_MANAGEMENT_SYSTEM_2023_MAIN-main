<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
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
    .thead-Dark{
 
        color: white;
        background-color: #3A3B3C;;
        text-transform: uppercase;
        /* line-height:2; */
        padding-bottom: 5px;
        padding-top: 5px;


 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F7;
}
h2 {
    text-align: center;
    text-transform: uppercase;

}
.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
}
</style>

<div class="row"  id="G-payprint">
<div class="container">
@include('reports.PrintHeader')
    </div>
    <h2>Group Events Payments</h2>
    <table class="table table-striped table-bordered">
                <thead class="thead-Dark">
                    <tr class="filters">
                        <th>Club Name</th>
                        <th style="width:30%;">League</th>
                        <th style="width:30%;">Payment Method</th>
                        <th style="width:20%;">Transaction Id</th>
                        <th style="width: 20%;">Paid Amount</th>
                    </tr>
                </thead>
                <tbody>
@foreach($groupRegsPrint as $key=>$group)
<tr>
  <td style="width:30%;">{{ $group->club->club_name }}</td>
  <td style="width:30%;">{{ $group->league->name }}</td>
  <td style="width:10%;"> 
@if($group->payment_method==1)
    {{'Bank'}}
    @endif
    @if($group->payment_method==2)
    {{'Vipps'}}
    @endif
    @if($group->payment_method==4)
    {{'Stripe'}}
    @endif                  
    @if($group->payment_method==5)
    {{'Qr Payments'}}
    @endif                  
  </td>
  <td style="width:20%;">{{ $group->trans_id }}</td>
  <?php
                               
                               $paidAmount=DB::table('group_registrations')
                               ->select( DB::raw('sum(totalfee)'))
                               ->where('organization_id',Auth::user()->organization_id)
                               ->where('club_id',$group->club_id)
                               ->where('league_id',$group->league_id)
                               ->where('trans_id',$group->trans_id)
                               ->pluck('sum(totalfee)');
                                              //   $a=trim($paidAmount, '[]');
                                              // dd($paidAmount);

                                                  //  $keyIncrease=$key++;
                                                ?>
  <td style="width:20%;">
  {{$group->organization->country->currency->currency_iso_code}}.{{ $paidAmount[0] }}
  </td>
 

</tr>
@endforeach
                </tbody>
              </table>
    <section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($setting?$setting->footer:'') !!}


        </div>
    </section>


</div>

