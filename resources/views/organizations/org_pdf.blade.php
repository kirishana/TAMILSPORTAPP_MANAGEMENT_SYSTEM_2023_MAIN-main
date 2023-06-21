
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
        padding-bottom: 5px;
    }

    table tr,
    table td {
        padding: 3px;
        width: 1%;
        text-align: left;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    .thead{
        color: white;
        background-color: #3A3B3C;
        text-transform: uppercase;
        line-height:2;
       

}
h2 {
    text-align: center;
}
</style>
<div id="">
<div>
   <div class="container">
          @include('reports.adminHeader')

    </div>
    </div>

   <h2 style="text-align:center">Organizations</h2>
<table class="table table-striped text-uppercase table-bordered" id=""  width="100%" style="border: 1px solid #ddd;border-collapse: collapse;
">
<thead class="thead">
    <tr  style="text-align: center">

                <th style="border: 1px solid #ddd;">Org.No</th>
                <th style="border: 1px solid #ddd;">Name</th>
                <th style="border: 1px solid #ddd;" >email</th>
                <th style="border: 1px solid #ddd;">mobile</th>
                <th style="border: 1px solid #ddd;"> city</th>
                <th style="border: 1px solid #ddd;">country</th>
               

            </tr>
        </thead>
        <tbody style="text-transform:capitalize">

            @foreach($organizations as $organization)
            <tr>
                <td style=" text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;">{{$organization->orgnum?$organization->orgnum:''}}</td>
                <td style=" text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;">{{$organization->name}}</td>
                <td style="text-transform: none; text-align: left;border: 1px solid #ddd;padding:5px;width:25%">
                    {{$organization->email}}<br>
                
            </td>
                <td style=" text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;">
                {{$organization->mobile}}
                
            </td>
                <td style=" text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;">{{$organization->city}}</td>               
                <td style=" text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;">{{$organization->country->name}}</td>               
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($general?$general->footer:'') !!}


        </div>
    </section>
<script type="text/php">
    if (isset($pdf)) {
        $x = 260;
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