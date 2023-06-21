<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }
    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;
        border: 1px solid #ddd;

    }

     td {
        width: 1px;
    }
  .thead {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
h2 {
    text-align: center;
}
</style>

<div id="">
    <div class="container">
        @include('reports.header')
    
    
        </div>
    <h2>{{$org->name}}'s Future League</h2>
<table class="table table-striped text-uppercase table-bordered"  width="100%">
<thead class="thead">
            <tr  style="text-align: center">
<th>NO.</th>
                <th>Name</th>
                <th >Location</th>
                <th>Season</th>
                <th> Duration</th>
                <th>reg.End date</th>
               

            </tr>
        </thead>
        <tbody style="text-transform:none;">

            @foreach($fuleagues as $key=>$league)
            <tr>
                <td>{{++$key}}</td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;">{{$league->name}}</td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;">{{$league->venue->name}}</td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;" >
                    {{$league->season->name}}<br>
                
            </td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">
                {{$league->from_date}} &nbsp;-&nbsp;{{$league->to_date}}
                
            </td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">{{$league->reg_end_date}}</td>               
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
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