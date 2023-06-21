<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: uppercase;
    }

    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;
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

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
h2{
    text-align: center;
    text-transform: capitalize;
}
</style>
<div class="row" id="print">
@include('reports.adminHeader')
<br>
    <h2>Payments</h2>
    <table class="table table-striped table-bordered  play" id="pay-pdf">
        <thead class="thead-Dark">
        <tr>
                <th>Organization</th>
                <th>League</th>
                <th>Participant's Name</th>
                <th>Events</th>
                <th>Method of payment</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registration as $regist)
           

                <tr> 
                    
                    <td>{{$regist->organization->name}}
                    </td>
                    <td>{{$regist->league->name}} 
                    </td>
                    <td>{{$regist->user->first_name}} &nbsp;{{$regist->user->last_name}} 
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
                    @if($regist->user->club)
                    <td>Paid by club</td>
                    @else
                    @if($regist->payment_method== 1)
                    <td>Vipps</td>
                    @endif
                    @if($regist->payment_method== 2)
                    <td>Bank</td>
                    @endif
                    @endif
                  

                    @if($regist->status== 2)
                                
                                    <td><span class="badge bg-success">approved</span></td>
                                
                                @else
                                    <td><span class="badge bg-warning text-dark">pending</span></td>
                                
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
        $x = 360;
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