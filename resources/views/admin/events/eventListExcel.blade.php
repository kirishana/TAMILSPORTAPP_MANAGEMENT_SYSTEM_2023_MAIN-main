<table class="table table-striped table-bordered showall text-uppercase" id="table2">
        <tr>
            <th>League</th>
            <th>Event</th>
            <th>Venue</th>
            <th style="width: 100px;">Event Org</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>Date</th>

        </tr>
    <tbody>

        @foreach($events as $event)
       @if($event->league->to_date>Carbon\Carbon::now())
        <tr>
            <td>
                {{ $event->league->name }}
            </td>
            <td>
                {{ $event->mainEvent->name }}
            </td>
            <td>{{ $event->league->venue->name }}</td>
            <td>
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

            <td>
                @foreach ($AgeGroupIds as $AgeGroupId)

                {{ $AgeGroupId->gender->name }}<br>
                @endforeach

            </td>


            <td>
                @foreach($event->ageGroups as $ageGroup)
                {{ $ageGroup->name }}<br>
                @endforeach
            </td>

            <td>
                @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
            </td>



        </tr>
        @endif
        @endforeach


    </tbody>
</table>