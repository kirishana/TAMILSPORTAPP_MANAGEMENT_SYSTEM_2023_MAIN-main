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
        background-color: #3A3B3C;
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
    text-transform: uppercase;

}
</style>
<div class="row" id="print">
    <div class="container">
        @include('reports.header')
    
    
        </div>
    <h2>{{$league?$league->name:''}}--Club Payments</h2>

    <table class="table table-striped table-bordered" id="filter1">
                                            <thead class="thead-Dark">
                                                <th>Club Name</th>
                                                <th>total &nbsp; amount</th>
                                                <th>Paid &nbsp; amount</th>
                                                <th>Payable &nbsp; amount</th>
                                                <th>status</th>
                                            </thead>
                                            <?php 
                                            ?>
                                        @foreach($registrations as $registration)
                                            <tr>
                                                <td>{{$registration->club_name}}</td>
                                                <?php 
                                                $total=App\Models\Registration::where('league_id',$league->id)->where('status','!=',3)->where('is_approved',1)->wherehas('user',function($q) use($registration){
                                                    $q->where('club_id',$registration->id);
                                                })->sum('totalfee');
                                                $total2=App\Models\GroupRegistration::where('league_id',$league->id)->where('status','!=',3)->where('club_id',$registration->id)->sum('totalfee');
                                                $sum=App\Models\Registration::where('league_id',$league->id)->whereIn('status',[1,2])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                                                    $q->where('club_id',$registration->id);
                                                })->sum('totalfee');
                                                $sum2=App\Models\GroupRegistration::where('league_id',$league->id)->whereIn('status',[1,2])->where('club_id',$registration->id)->sum('totalfee');
                                                $unpaid=App\Models\Registration::where('league_id',$league->id)->whereNotIn('status',[1,2,3])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                                                    $q->where('club_id',$registration->id);
                                                })->sum('totalfee');
                                                $unpaid2=App\Models\GroupRegistration::where('league_id',$league->id)->whereNotIn('status',[1,2,3])->where('club_id',$registration->id)->sum('totalfee');
                                                $totalPaidAmount=$sum+$sum2;
                                                $totaluserAmount=$total+$total2;
                                                ?>

                                                <td>{{$league->organization->country->currency->currency_iso_code}} .&nbsp;{{$total+$total2}}</td>
                                                <td>{{$league->organization->country->currency->currency_iso_code}} .&nbsp;{{$sum+$sum2}}</td>
                                                <td>{{$league->organization->country->currency->currency_iso_code}} .&nbsp;{{$unpaid+$unpaid2}}</td>
                                                <td>
                                                    @if($totaluserAmount==$totalPaidAmount && $totaluserAmount!=0 && $totalPaidAmount!=0)
                                                    <span class="label success">Paid</span>
                                                    @endif
                                                    @if($totaluserAmount>$totalPaidAmount && $totalPaidAmount!=0)
                                                    <span class="label primary">partially</span>
                                                    @endif
                                                    @if($totaluserAmount>$totalPaidAmount && $totalPaidAmount==0)
                                                    <span class="label warning">Due</span>
                                                    @endif

                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>


</div>
<script type="text/php">
    if (isset($pdf)) {
        $x = 250;
        $y = 820;
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