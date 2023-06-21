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
<div class="row" id="">
    <div class="container">
        @include('reports.header')
    
    
        </div>
    <h2>Group Events Payments</h2>
    <table class="table table-striped table-bordered" style="text-transform:capitalize;" id="">
                <thead class="thead-Dark">
                    <tr class="filters">
                        <th style="width: 30%;" >Club Name</th>
                        <th style="width:20%;">League</th>
                        <th style="width:10%;">Payment Method</th>
                        <th style="width:25%;">Transaction Id</th>
                        <th style="width: 15%;">Paid Amount</th>
                    </tr>
                </thead>
                <tbody>
@foreach($groupRegs as $key=>$group)
<tr>
  <td style="width:30%;">{{ $group->club->club_name }}</td>
  <td style="width:20%;">{{ $group->league->name }}</td>
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
  <td style="width:25%;">{{ $group->trans_id }}</td>
  <?php
                               
                               $paidAmount=DB::table('group_registrations')
                               ->select( DB::raw('sum(totalfee)'))
                               ->where('organization_id',Auth::user()->organization_id)
                               ->where('club_id',$group->club_id)
                               ->where('league_id',$group->league_id)
                               ->where('trans_id',$group->trans_id)
                               ->pluck('sum(totalfee)');
                                                ?>
  <td style="width:15%;">
  {{$group->organization->country->currency->currency_iso_code}}.{{ $paidAmount[0] }}
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
        $x = 380;
        $y = 560;
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
