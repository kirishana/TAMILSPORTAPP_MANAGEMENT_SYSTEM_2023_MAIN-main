<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
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


<div id="printUsers">
    <div class="container">
        @include('reports.header')
        </div>
    <h2>{{$org->name}}'s Venues</h2>
<table class="table table-striped text-uppercase table-bordered"  width="100%">
<thead class="thead">
            <tr  style="text-align: center">
                <th class="email">Name</th>
                <th >E-mail</th>
                <th class="phone">Track details</th>
                <th class="email">field details</th>
                <th>contact no</th>
               

            </tr>
        </thead>
        <tbody style="text-transform:capitalize">

            @foreach($Venues as $key=>$venue)
            <tr>
                <td  style="text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;">{{$venue->name}}</td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;text-transform:none;">{{$venue->email}}</td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">@foreach($venue->venueDetails as $track)
                    {{$track->track_event_name}}&nbsp;-&nbsp;{{$track->track_event_count}}<br>
                
                @endforeach
            </td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">
                @foreach($venue->venueFieldDetails as $track)
                    {{$track->field_event_name}}<br>
                
                @endforeach
            </td>
                <td  style="text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;">{{ $venue->mobile }}</td>               
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
        $x = 370;
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