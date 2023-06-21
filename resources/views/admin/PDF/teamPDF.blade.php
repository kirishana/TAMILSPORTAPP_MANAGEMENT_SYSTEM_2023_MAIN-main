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
    text-transform: uppercase;
}
td{
    border: 1px solid #ddd;
    padding:5px;
}
</style>
<div class="row" id="suvarna">
   @include('reports.header')
    @if($eventTitle!=null||$AgeTitle!=null||$GenTitle!=null||$leagueTitle!=null)
<div style="text-align:center;">
 <strong>@if($leagueTitle) <span style="font-size:30px;text-transform:capitalize">{{$leagueTitle->name}}-</span> @endif
 <strong>@if($eventTitle) <span style="font-size:30px;">{{$eventTitle->name}}</span> @endif
               @if($AgeTitle) <span style="font-size:30px;">({{$AgeTitle->name}})@endif
               @if($GenTitle)
              @if($GenTitle->name=="Male") <span style="color:green;font-size:20px;">{{$GenTitle->name}}  </span>
              @else
              <span style="color:red;font-size:20px;">{{$GenTitle->name}}                </span>

                @endif
               
                @endif</strong>
                </div>
@else
<h2>Teams</h2>
@endif
<table class="table table-striped text-uppercase table-bordered teams" style="width: 100%;" id="exp">
        <thead class="thead">
            <tr>
                <th>Club Name </th>
                <th>Team Name </th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Event</th>
              
            </tr>
        </thead>
      
        <tbody style="text-transform:capitalize">

@foreach($groupRegistrations as $groupRegistration)

    <tr>
        <td style="width: 20%;">{{$groupRegistration->club->club_name}}</td>
        <td style="width: 20%;">
            @foreach($groupRegistration->teams as $team)
            <ul>
                <li>
                {{$team->name}}
                </li>
            </ul>
            @endforeach
</td>
<td style="width: 10%;">{{$groupRegistration->ageGroupGender->gender->name}}</td>
<td style="width: 8%;">{{$groupRegistration->ageGroupGender->ageGroupEvent->ageGroup->name}}</td>
<td style="width: 20%;">{{$groupRegistration->ageGroupGender->ageGroupEvent->Event->mainEvent->name}}</td>

    </tr>
    @endforeach
  
      </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
    <body>      
    <script type="text/php">
    if (isset($pdf)) {
        $x = 380;
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
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

</script>