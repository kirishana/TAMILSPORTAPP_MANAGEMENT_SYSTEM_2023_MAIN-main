

<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
    }

    table th {
        padding-bottom: 5px;
        line-height: 1.5;

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


<div id="clubprint">
<div class="container">
          @include('reports.adminHeader')

    </div>
<table class="table table-striped text-uppercase table-bordered" id="clubprint"  style="width:100%">
<thead class="thead">
            <tr  style="text-align: center">

                <th style="border: 1px solid #ddd;
                ">Club Name</th>
                <th style="border: 1px solid #ddd;
                ">Club NO</th>
                <th style="border: 1px solid #ddd;
                " >club email</th>
                <th style="border: 1px solid #ddd;
                ">mobile</th>
                <th style="border: 1px solid #ddd;
                "> Members</th>
                <th style="border: 1px solid #ddd;
                ">Est.Date</th>
               

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($clubs as $club)
            <tr>
                <td style="text-align: left;border: 1px solid #ddd;width: 30%;padding:5px;">{{$club->club_name}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;">{{$club->club_registation_num}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;" >
                    {{$club->club_email}}<br>
                
            </td>
                <td style="text-align: left;border: 1px solid #ddd;width: 12%;padding:5px;">
                {{$club->mobile}}
                
            </td>
            <td style="text-align: left;border: 1px solid #ddd;width: 8%;padding:5px;">{{$club->users->count()}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">
                    <?php 

                    $estdate=preg_split('/ /',$club->created_at);
                    
                    ?>{{$estdate[0]}}</td>               
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($general->footer) !!}


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


