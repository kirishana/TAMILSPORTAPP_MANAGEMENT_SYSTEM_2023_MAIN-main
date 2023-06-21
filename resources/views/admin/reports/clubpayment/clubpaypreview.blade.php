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
    .thead{
        text-align: center;
        text-transform: uppercase;
    }
    h4{
        text-align: center;
        text-transform: capitalize;
    }
</style>
<div class="row printcpay" id="print">
@include('reports.adminPrintHeader')
<h4>Individual payments</h4>
    <br>
    <table class="table table-striped table-bordered" style="text-transform: capitalize;">
        <thead class="thead">
            <tr>
                <th>Player Name</th>
                <th>Events</th>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="">
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
                        {{ $regist->trans_id  }}
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