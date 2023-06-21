<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    table td,
    table th {
        padding-bottom: 5px;
        padding-top: 5px;
        line-height: 1;
        border: 1px solid #ddd;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
h2{
        text-align: center;
        text-transform: capitalize;
    }
</style>
<div class="row" id="print">
@include('reports.adminHeader')
<h2>Individual payments</h2>
<br>
    <table class="table table-striped table-bordered text-uppercase  cpay" id="cpaypdf">
        <thead class="thead-Dark"> 
            <tr>
                <th>Player Name</th>
                <th>Events</th>
                <th>Transaction ID</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="text-uppercase">
            @foreach($registration as $regist)
           

                <tr> 
                    <td>{{$regist->user->first_name}} &nbsp; {{$regist->user->last_name}}
                    </td>
                    <td>
                            <ul class="text-left">

                                @foreach($regist->events as $event)
                                    <li>
                                        {{ $event->mainEvent->name }}
                                    </li>
                                @endforeach


                            </ul>
                    </td>
                    <td>
                        {{ $regist->trans_id }}
                    </td>
                    <td>
                    @if($regist->payment_method == 1)
                           {{'Bank'}}
                    @endif
                        @if($regist->payment_method == 2)
                        {{'Vipps'}}
                        @endif

                        @if($regist->payment_method == 3)
                        {{'Sil Member'}}
                        @endif

                        @if($regist->payment_method == 4)
                        {{'Stripe'}}
                        @endif

                        @if($regist->payment_method == 5)
                        {{'qrPayment'}}
                        @endif
                    </td>
                   
                    @if($regist->status== 2)
                                
                                    <td>approved</td>
                                
                                @else
                                    <td>pending</td>
                                
                                  @endif  

                    <td>{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
                    </td>
                </tr>

           
           
            @endforeach
        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($general){!! html_entity_decode($general->footer) !!}@endif


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