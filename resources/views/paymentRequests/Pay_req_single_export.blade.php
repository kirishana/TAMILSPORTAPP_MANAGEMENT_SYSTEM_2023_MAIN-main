<table class="table table-striped table-bordered text-uppercase"  id="printpay">
            <tr>
                <th>Club/Player Name</th>
                <th>League</th>
                <th>Payment Method</th>
                <th>Trans.ID</th>
                <th>Paid Amount</th>
            </tr>
        <tbody class="text-uppercase">
        @foreach($regs as $regist)
           

           <tr> 
               <td style="width: 20%;">{{$regist->user->club?$regist->user->club->club_name:$regist->user->first_name}}
               </td>
               <td style="text-transform: none;width:20%">{{$regist->league->name}}
               </td>
               <td style="width:10%;"> 
               @if($regist->payment_method==1)
    {{'Bank'}}
    @endif
    @if($regist->payment_method==2)
    {{'Vipps'}}
    @endif
    @if($regist->payment_method==3)
    {{'Sil-Member'}}
    @endif
    @if($regist->payment_method==4)
    {{'Stripe'}}
    @endif     
    @if($regist->payment_method==5)
    {{'Qr Payments'}}
    @endif                
</td>
               <td style="width:25%;">
                   {{ $regist->trans_id }}
               </td>
               <?php
                           $paidAmount=DB::table('registrations')
                          ->select( DB::raw('sum(totalfee)'))
                          ->where('organization_id',Auth::user()->organization_id)
                        //   ->where('league_id',$regist->league_id)
                          ->where('trans_id',$regist->trans_id)
                          ->pluck('sum(totalfee)');
               ?>
                 <td style="width: 12%;">{{$regist->organization->country->currency->currency_iso_code}}.{{ $paidAmount[0] }}
               </td>
           </tr>

      
      
       @endforeach
        </tbody>
    </table>
  