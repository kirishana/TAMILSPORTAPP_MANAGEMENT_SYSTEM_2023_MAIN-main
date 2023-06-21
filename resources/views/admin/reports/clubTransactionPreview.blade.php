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
<div class="container">
@include('reports.PrintHeader')
    </div>
    <br>
    <br>
    <br>
    <table class="table table-striped table-bordered" id="filter1">
                                            <thead class="thead-Dark">
                                                <th>Club Name</th>
                                                <th>total &nbsp; amount</th>
                                                <th>Paid &nbsp; amount</th>
                                                <th>Payable &nbsp; amount</th>
                                                <th>Status</th>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>