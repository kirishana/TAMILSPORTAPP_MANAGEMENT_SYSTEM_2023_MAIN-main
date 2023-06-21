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
<div class="container" style="width:705px;height:120px;">
    @if($header)
            <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('organization/header/'.$header .'') }}">

            @else
            <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('assets/images/authors/avatar5.png')}}">
            @endif

    </div>
    <h2>Group Event Payments</h2>

    <table class="table table-striped table-bordered  text-uppercase G-event" id="G-pdf">
        <thead class="thead-Dark">
            <tr>
                <th>Club Name</th>
                <th>Transaction ID</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="text-uppercase">
            @foreach($groupregistration as $regist)
           

                <tr> 
                    <td>{{$regist->club->club_name}} 
                    </td>
                    <td>
                        {{ $regist->trans_id }}
                    </td>

                  @if($regist->status==4)
                                
                                <td style="width:10%;"><span class="badge warning">Pending</span></td>
                            
                            @elseif($regist->status== 1)
                                <td style="width:10%;"><span class="badge primary">Processing</span></td>
                            @elseif($regist->status== 2)
                                <td style="width:10%;"><span class="badge success text-dark">Approved</span></td>
                            @elseif($regist->status==3)
                                <td style="width:10%;"><span class="badge danger text-dark">Declined</span></td>
                            
                              @endif  

                    <td>{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
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