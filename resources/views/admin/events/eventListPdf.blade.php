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
<div class="row" id="usr">
    <div class="container">
        @include('reports.header')
    
    
        </div>
       
        <h2>{{$org->name}}'s Events</h2>
<table class="table table-striped table-bordered showall text-uppercase" id="table2">
    <thead class="thead">
        <tr>
            <th>League</th>
            <th>Event</th>
            <th>Venue</th>
            <th style="width: 100px;">Event Org</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>Date</th>

        </tr>
    </thead>
    <tbody class="text-uppercase">
@php
    $count=0;
@endphp
        @foreach($events as $event)
       @if($event->league->to_date>Carbon\Carbon::now())
        <tr>
            <td style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">{{$event->league->name}}</td>

            <td  style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">
                {{ $event->mainEvent->name }}
            </td>
            <td  style="text-align: left;border: 1px solid #ddd;width: 20%;padding:5px;">{{ $event->league->venue->name }}</td>
            <td  style="text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;">
                {{ $event->user->first_name }}  {{ $event->user->last_name }}
            </td>
            @php
            $ages = $event->ageGroups;

            @endphp
            @foreach ($ages as $age)
            {{-- {{ $age}} --}}
            @php
            $eventAgeGroupIds = App\Models\AgeGroupEvent::where('event_id', $event->id)->get();
            @endphp
            @foreach ($eventAgeGroupIds as $eventAgeGroupId)

            @php
            $AgeGroupIds = App\Models\AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();

            @endphp
            @endforeach
            @endforeach

            <td  style="text-align: left;border: 1px solid #ddd;width: 8%;padding:5px;">
                @foreach ($AgeGroupIds as $AgeGroupId)

                {{ $AgeGroupId->gender->name }}<br>
                @endforeach

            </td>


            <td  style="text-align: left;border: 1px solid #ddd;width: 7%;padding:5px;">
                @foreach($event->ageGroups as $ageGroup)
                {{ $ageGroup->name }}<br>
                @endforeach
            </td>

            <td  style="text-align: left;border: 1px solid #ddd;width: 25%;padding:5px;">
                @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
            </td>



        </tr>
       @endif
        @endforeach


    </tbody>
</table>
@if($setting!=null)
<script type="text/php">
    if (isset($pdf)) {
        $x = 600;
        $y = 1500;
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
<section class="content-footer">
    <div class="col-md-1">
        @if($setting){!! html_entity_decode($setting->footer) !!}@endif


    </div>
</section>
@endif
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
$(document).ready(function() {
    $('.ckeditor').ckeditor();
});
</script>