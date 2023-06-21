
    <table class="table table-striped table-bordered text-uppercase" style="width: 705px;" id="">
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
@foreach($groupRegs as $key=>$group)
<tr>
  <td style="width:30%;">{{ $group->club->club_name }}</td>
  <td style="width:30%;">{{ $group->league->name }}</td>
  <td>
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
                                                ?>
  <td style="width:20%;">
  {{$group->organization->country->currency->currency_iso_code}}.{{ $paidAmount[0] }}
  </td>
 

</tr>
@endforeach
                </tbody>
              </table>

