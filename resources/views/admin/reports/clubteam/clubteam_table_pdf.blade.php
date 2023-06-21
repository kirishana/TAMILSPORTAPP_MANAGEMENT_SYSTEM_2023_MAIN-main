<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    table td,
    table th {
        padding-bottom: 5px;
        line-height: 1.5;
        border: 1px solid #ddd;
    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    table tr,
    table td {
        padding: 3px;
        width: 1%;
        text-align: left;

    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
</style>
<div class="row" id="">
<div class="container">
@include('reports.adminHeader')
    </div>
<h3 style="text-align: center;">CLUB TEAMS</h3>

    <table class="table table-striped   table-bordered club-t" id="export">
        <thead class="thead-Dark">
            <tr>

                <th  style="text-align: center">Club Team Name</th>
                <th  style="text-align: center">Members</th>
                <th  style="text-align: center">Age Group</th>
                <th  style="text-align: center">Gender</th>
                

            </tr>
        </thead>
        <tbody>

                @foreach($teams as $team)
            <tr>
                <td  style="width:25%;">{{$team->name}}</td>
                
                <td style="width:25%;">
                @foreach ($team->users as $user)
                {{$user->first_name}}  {{$user->last_name}}<br>
                 @endforeach
                </td>

                <td style="width:10%;">{{ $team->ageGroup->name }}</td>
                <td style="width:10%;">{{ $team->gender->name }}</td>
                
            </tr>
            @endforeach
            

        </tbody>
    </table>
    
</div>
<section class="content-footer">
        <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


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

 


