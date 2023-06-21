
@foreach($groupRegs as $key=>$group)
<tr>
  <td>{{ $group->club->club_name }}</td>
  <td>{{ $group->league->name }}</td>
  <?php
                               
                               $paidAmount=DB::table('group_registrations')
                                                                             ->select( DB::raw('sum(totalfee)'))
                                                                             ->where('organization_id',Auth::user()->organization_id)
                                                                             ->where('club_id',$group->club_id)
                                                                             ->where('league_id',$group->league_id)
                                                                             ->where('trans_id',$group->trans_id)
                                                                             ->pluck('sum(totalfee)');
                                                                               // dd($paidAmount);
                                                                             ?>
                               <td>
                               {{$group->organization->country->currency->currency_iso_code}} {{ $paidAmount[0]}}
                               </td>
  <td>
    @if($group->payment_method==1)
    {{'Bank'}}
    @endif
    @if($group->payment_method==2)
    {{'Vipps'}}
    @endif
    @if($group->payment_method==3)
    {{'Sil-Member'}}
    @endif
    @if($group->payment_method==4)
    {{'Stripe'}}
    @endif
    @if($group->payment_method==5)
    {{'Qr Payments'}}
    @endif

    </td>
  <td>{{ $group->trans_id }}</td>
 
  @if($group->status==0)
  <td><button  style="padding: 2px 3px" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Not PAID"><i class="material-icons" style="margin-bottom:5px">highlight_off</i> </button></td>
  @endif
  @if($group->status==1)            
  <td><button  style="padding: 2px 3px" class="btn btn-success accept" transId="{{ $group->trans_id }}" league="{{ $group->league_id }}" id="{{ $group->club_id }}" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i> </button>
    <button class="btn btn-danger reject" transId="{{ $group->trans_id }}" league="{{ $group->league_id }}" id="{{ $group->club_id }}" style="padding: 2px 3px;" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i> </button>
</td>
  @endif
  @if($group->status==5)
  <td><button  style="padding: 2px 3px" class="btn btn-success accept" transId="{{ $group->trans_id }}" league="{{ $group->league_id }}" id="{{ $group->club_id }}" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i> </button>
  </td>
  @endif
  @if($group->status==2)
  <td>    <button class="btn btn-danger reject" transId="{{ $group->trans_id }}" league="{{ $group->league_id }}" id="{{ $group->club_id }}" style="padding: 2px 3px;" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i> </button>
  </td>
  @endif

</tr>
@endforeach
<tr>
        <td colspan="9">
        <span style="float: left;margin-top:10px;">Showing {{ $groupRegs->firstItem() }} to {{ $groupRegs->lastItem() }} of {{ $groupRegs->total() }} entries</span>
        <span style="float: right;">{{$groupRegs->links('vendor.pagination')}}</span>
        </td>
    </tr>        

