<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
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
</style>
<div class="row eve" id="print-event-preview">
@include('reports.PrintHeader')
    <br>
    <br>
    <br>

    <table class="table table-striped table-bordered" id="export-p">
        <thead>
            <tr>
                <th>EventName</th>
                <th>League</th>
                <th>Venue</th>
                <th>EventOrganizer</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Date</th>

            </tr>
        </thead>
        <tbody>

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
</div>

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>