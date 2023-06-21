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
    .table .thead-Dark th {
 
        color: white;
        background-color: #3A3B3C;
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
  width: 70%;
}
</style>
<div class="row" id="print">
    <div class="container">
        @include('reports.header')
    
    
        </div>
    <h2>Single Events Payments</h2>
    <table class="table table-striped table-bordered text-uppercase  request " id="pdf">
        <thead class="thead-Dark">
            <tr>
                <th>Club//Player Name</th>
                <th>League</th>
                <th>Payment Method</th>
                <th>Trans.ID</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
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
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>


</div>
<script type="text/php">
    if (isset($pdf)) {
        $x = 390;
        $y = 570;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>