<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }
    tr:nth-child(even) {
  background-color: #F4F6F7;
}
    table td,
    table th {
        padding-bottom: 5px;
        line-height: 1.5;
        border: 1px solid #ddd;
    }

     td {
        width: 1px;
    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
h2 {
    text-align: center;
}
</style>
<div class="row" id="ex">
        @include('reports.header')
    <h2>Judges</h2>
    <table class="table table-striped text-uppercase table-bordered judges">
    <thead class="thead-Dark">
        <tr>
            <th>League</th>
            <th>Event</th>
            <th style="width:10%;">Gender</th>
            <th style="width:8%">Age Group</th>
            <th style="width:10%">Status</th>
            <th style="width:10%">Starter</th>
            <th style="width:10%">Judge</th>

        </tr>
      
    </thead>
    <tbody>
        @foreach($genders as $gender)
        @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)

<tr>
<td style="width: 20%;">{{$gender->ageGroupEvent->Event->league->name}}</td>
    <td style="width:15% ;">
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td style="width:8% ;">
        {{ $gender->gender->name }}
    </td>

    <td style="width: 8%;">
        {{ $gender->ageGroupEvent->ageGroup->name }}
    </td>
    @if($gender->status==2)
    <td style="width:10% ;">
    <span class="label label-primary">Not Started</span>

    </td>
    @elseif($gender->status==0)
    <td style="width:10% ;"> <span class="label label-warning">On Going </span>
    </td>
    @elseif($gender->status==3)
    <td style="width:10% ;"> <span class="label label-warning">Finalizing </span>
    </td>
    @else
    <td style="width:10% ;"> <span class="label label-success">Finished</span>
    </td>
    @endif
    <td style="width:19% ;">{{$gender->starter?$gender->starter->first_name:''}}</td>

  <td style="width:19% ;">{{$gender->judge?$gender->judge->first_name:''}}</td>

</tr>
        @endif
        @endforeach
    </tbody>
</table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting?$setting->footer:'') !!}@endif


        </div>
    </section>
    
<script type="text/php">
    if (isset($pdf)) {
        $x = 390;
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