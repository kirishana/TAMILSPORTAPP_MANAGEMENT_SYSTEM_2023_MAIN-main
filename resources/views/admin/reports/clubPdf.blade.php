

<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
    }
td{
    border: 1px solid #ddd;
    padding:5px;
}
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
h3 {
    text-align: center;
}
</style>
<div class="row" id="ex">
        <div class="container">
          @include('reports.adminHeader')

    </div>
 <h3>CLUBS</h3>
    <table class="table table-striped table-bordered text-uppercase  organizations" id="table10">
        <thead class="thead">
            <tr>
                <th>Club Name</th>
                <th>Club NO</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>City</th>
                <th>Country</th>
                <th>Season</th>
            </tr>
        </thead>
        <tbody>

            @foreach($clubs as $org)
            <tr>
                <td style="width:25%;">{{ $org->club_name }}</td>
                <td style="width:12%;">{{ $org->club_registation_num }}</td>
                <td style="width:25%">{{ $org->club_email }}</td>
                <td style="width:10%;">{{$org->tpnumber}}</td>
                <td style="width:10%;">{{ $org->city }}</td>
                <td style="width:10%;">{{ $org->country->name }}</td>
                <td style="width:10%;">{{ $org->season->name }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($general->footer) !!}


        </div>
    </section>
</div>
<script type="text/php">
    if (isset($pdf)) {
        $x = 400;
        $y = 550;
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