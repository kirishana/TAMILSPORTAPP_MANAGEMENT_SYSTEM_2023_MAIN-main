<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
        line-height:25px;
    }

    table td,
    table th {
        border:solid #B2BABB;
        opacity:50;
        border-width: thin;
    }

    table tr,
    table td {
        text-align: left;
    }
   .thead-Dark th {
 
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

}
</style>
<div class="row" id="print">
        @include('reports.header')
        <center>
        <strong>@if($leagueTitle) <span style="font-size:25px;text-transform:capitalize;">{{$leagueTitle->name}}-Single Events Payments</span>
         @else
        <h2>Single Events Payments</h2>
        @endif
        </strong>
        </center>
       
    <table class="table table-striped table-bordered text-uppercase  request " id="pdf">
        <thead class="thead-Dark">
            <tr>
                <th>Player Name</th>
                <th>User Id</th>
                <th>club name </th>
                <th>Trans. ID</th>
                <th>Status</th>
                <th>Paid Amount</th>
            </tr>
        </thead>
        <tbody class="text-uppercase">
            @foreach($registration as $regist)
           

                <tr> 
                    <td style="width: 30%;">{{$regist->user->first_name}} &nbsp; {{$regist->user->last_name}}
                    </td>
                    <td style="width: 9%;">{{$regist->user->userId}}
                    </td>
                    <td style="width: 20%;">  {{$regist->user->club?$regist->user->club->club_name:'-'}} 
                    </td>
                    <td style="width: 10%;">
                        {{ $regist->trans_id }}
                    </td>

                   @if($regist->status==1)
                                
                                <td style="width:10%;"><span class="badge warning">Pending</span></td>
                            
                           
                            @elseif($regist->status== 2)
                                <td style="width:10%;"><span class="badge success text-dark">Approved</span></td>
                            @elseif($regist->status==3)
                                <td style="width:10%;"><span class="badge danger text-dark">Declined</span></td>
                            
                              @endif  
                    <td style="width: 15%;" >{{$regist->organization->country->currency->currency_iso_code}}.{{ $regist->totalfee }}
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
        $x = 270;
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