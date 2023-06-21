<style  type="text/css">
    
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;

 /* border-color: #792700; */

}
</style>
<div class="row">
<div class="container">
@include('reports.header')
</div>
        <br>
<h2>
    <center>{{ $league->name }}'s Events-{{ $league->season->name }}</center>
</h2>
<table class="table table-striped table-bordered text-uppercase users"  width="100%" style="width: 100%;
border-collapse: collapse;" id="showall"> 
    <thead class="thead-Dark">
        <tr  style="text-align: center;padding: 3px;
        width: 1%;
        text-align: left;">
        <tr>
            <th>Age Group</th>
            <th>Event Name</th>
            <th>Time</th>
            <th>Date</th>

        </tr>
    </thead>
     <tbody class="text-uppercase">
        @foreach ($AgeGroups as $ageGroup)
        @if($ageGroup->events->count()>0)
        @if($league->events->count()>0)
         @foreach($ageGroup->events as $event)
         @if($event->league_id==$league->id)
        <tr>
            <td>{{$ageGroup->name}} Male</td>


            <td>
                @foreach($ageGroup->events as $event)
                @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                @if ($ageGroupGender->gender_id==1)
                @php
                $AgeGroupEventIds=App\Models\AgeGroupEvent::where('id',$ageGroupGender->age_group_event_id)->get();
                @endphp
                @foreach ( $AgeGroupEventIds as $AgeGroupEventId)
                @php
                $EventIds=App\Models\Event::where('id',$AgeGroupEventId->event_id)->where('league_id',$league->id)->get();
                @endphp
                @foreach ( $EventIds as $EventId)

                {{$EventId->mainEvent->name}}

                <br>
                @endforeach
                @endforeach
                @endif
                @endforeach
                @endforeach
            </td>
            <td>
                @foreach($ageGroup->events->where('league_id',$league->id) as $event)
                @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                @if ($ageGroupGender->gender_id==1)


                {{$ageGroupGender->time}}

                <br>

                @endif
                @endforeach
                @endforeach
            </td>
            <td>
                @foreach($ageGroup->events as $event)
                @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                @if ($ageGroupGender->gender_id==1)
                @php
                $AgeGroupEventIds=App\Models\AgeGroupEvent::where('id',$ageGroupGender->age_group_event_id)->get();
                @endphp
                @foreach ( $AgeGroupEventIds as $AgeGroupEventId)
                @php
                $EventIds=App\Models\Event::where('id',$AgeGroupEventId->event_id)->where('league_id',$league->id)->get();
                @endphp
                @foreach ( $EventIds as $EventId)

                {{$EventId->date}}

                <br>
                @endforeach
                @endforeach
                @endif
                @endforeach
                @endforeach
            </td>
        </tr>
        <tr>
            <td>{{$ageGroup->name}} Female</td>

            <td>
                @foreach($ageGroup->events as $event)
                @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                @if ($ageGroupGender->gender_id==2)
                @php
                $AgeGroupEventIds=App\Models\AgeGroupEvent::where('id',$ageGroupGender->age_group_event_id)->get();
                @endphp
                @foreach ( $AgeGroupEventIds as $AgeGroupEventId)
                @php
                $EventIds=App\Models\Event::where('id',$AgeGroupEventId->event_id)->where('league_id',$league->id)->get();
                @endphp
                @foreach ( $EventIds as $EventId)

                {{$EventId->mainEvent->name}}

                <br>
                @endforeach
                @endforeach
                @endif
                @endforeach
                @endforeach
            </td>
            <td>
                @foreach($ageGroup->events->where('league_id',$league->id) as $event)
                @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                @if ($ageGroupGender->gender_id==2)


                {{$ageGroupGender->time}}

                <br>

                @endif
                @endforeach
                @endforeach
            </td>
               <td>
                @foreach($ageGroup->events as $event)
                @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                @if ($ageGroupGender->gender_id==1)
                @php
                $AgeGroupEventIds=App\Models\AgeGroupEvent::where('id',$ageGroupGender->age_group_event_id)->get();
                @endphp
                @foreach ( $AgeGroupEventIds as $AgeGroupEventId)
                @php
                $EventIds=App\Models\Event::where('id',$AgeGroupEventId->event_id)->where('league_id',$league->id)->get();
                @endphp
                @foreach ( $EventIds as $EventId)

                {{$EventId->date}}

                <br>
                @endforeach
                @endforeach
                @endif
                @endforeach
                @endforeach
            </td>
        </tr>
        @endif
        <?php
        break;
        ?>
        @endforeach
        @endif
        @endif
        @endforeach


    </tbody>
</table>
<section class="content-footer">
    <div class="col-md-1">
        {!! html_entity_decode($setting?$setting->footer:'') !!}


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