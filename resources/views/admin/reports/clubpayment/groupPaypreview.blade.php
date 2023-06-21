<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

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
  .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;
 font-size: 12px;

 /* border-color: #792700; */

}
h4{
        text-align: center;
        text-transform: capitalize;
    }
</style>
<div class="row printgrouppay" id="G-print">
@include('reports.adminPrintHeader')
<h4>Group event payments</h4>
    <table class="table table-striped table-bordered">
        <thead class="thead-Dark">
            <tr>
                <th>Events</th>
                <th>Transaction ID</th>
                <th>Payment Method</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="">
            @foreach($groupregistration as $regist)
           

                <tr> 
                <td>
                        {{ $regist->event->mainEvent->name }}
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>