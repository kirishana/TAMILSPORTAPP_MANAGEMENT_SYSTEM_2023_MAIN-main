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
        /* line-height:2; */
        padding-bottom: 5px;
        padding-top: 5px;


 /* border-color: #792700; */

}
h2 {
    text-align: center;
    text-transform: uppercase;

}

tr:nth-child(even) {
  background-color: #F4F6F7;
}

</style>
<div class="row" id="payprint">
<div class="container">
@include('reports.PrintHeader')
    </div>
    <h2 style="text-align: center;text-transform:uppercase">Single Events Payments</h2>
    <table class="table table-striped table-bordered " >
        <thead class="thead-Dark">
            <tr>
                <th>Player/Club Name</th>
                <th>League</th>
                <th>Payment Method</th>
                <th>Trans.ID</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody>
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
                      </td>
                    <td style="width:25%;">
                        {{ $regist->trans_id }}
                    </td>
                    <?php
                                $paidAmount=DB::table('registrations')
                               ->select( DB::raw('sum(totalfee)'))
                               ->where('organization_id',Auth::user()->organization_id)
                            //    ->where('league_id',$regist->league_id)
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
        {!! html_entity_decode($setting?$setting->footer:'') !!}


        </div>
    </section>


</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>