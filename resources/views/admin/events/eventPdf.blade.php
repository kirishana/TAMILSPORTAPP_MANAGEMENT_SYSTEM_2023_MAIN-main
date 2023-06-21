<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
    }
    table td,
    table th {
        padding-top: 5px;
        padding-bottom: 5px;
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
td{
    border: 1px solid #ddd;
    padding:5px;
}
</style>
<div class="row" id="e-print">
    <div>
        <div class="container">
            @include('reports.header')
        
        
            </div>
        </div>

    </div>
  <h2>EVENTS</h2>
    <table class="table table-striped table-bordered eve" id="export-p">
        <thead class="thead">
            <tr>
                <th>Event Name</th>
                <th>League</th>
                <th>Venue</th>
                <th>Event Org</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Date</th>


            </tr>
        </thead>
        <tbody style="text-transform:capitalize">

            @foreach($events as $event)
            @if(Auth::user()->hasRole(4))
            @if($event->user_id==Auth::user()->id)
            <tr>
                <td style="width:15%;">
                    {{ $event->mainEvent->name }}
                </td>
                <td style="width:20%;">{{ $event->league->name }}</td>
    
                <td style="width:20%;">{{ $event->league->venue->name }}</td>
                <td style="width:10%;">
                    {{ $event->user->first_name }} {{ $event->user->last_name }}
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
                $genders=array();
                $AgeGroupIds = App\Models\AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
                $genders[]=$AgeGroupIds;
                @endphp
                @endforeach
                @endforeach
                <td style="width:8%;">
                    @foreach ($genders as $gender)
                    @foreach ($gender as $AgeGroupId )
                    {{ $AgeGroupId->gender->name }}<br>
                    @endforeach
                    @endforeach
                </td>
    
                <td style="width:7%;">
                    @foreach($event->ageGroups as $ageGroup)
                    {{ $ageGroup->name }}<br>
                    @endforeach
                </td>
    
                <td style="width:8%;">
                    {{$event->date}}
                </td>
          
    
            </tr>
            @endif
            @else
            <tr>
                <td style="width:15%;">
                    {{ $event->mainEvent->name }}
                </td>
                <td style="width:20%;">{{ $event->league->name }}</td>
    
                <td style="width:20%;">{{ $event->league->venue->name }}</td>
                <td style="width:10%;">
                    {{ $event->user->first_name }} {{ $event->user->last_name }}
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
                $genders=array();
                $AgeGroupIds = App\Models\AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
                $genders[]=$AgeGroupIds;
                @endphp
                @endforeach
                @endforeach
                <td style="width:8%;">
                    @foreach ($genders as $gender)
                    @foreach ($gender as $AgeGroupId )
                    {{ $AgeGroupId->gender->name }}<br>
                    @endforeach
                    @endforeach
                </td>
    
                <td style="width:7%;">
                    @foreach($event->ageGroups as $ageGroup)
                    {{ $ageGroup->name }}<br>
                    @endforeach
                </td>
    
                <td style="width:8%;">
                    {{$event->date}}
                </td>
           
                
    
            </tr>
            @endif
            @endforeach


        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>