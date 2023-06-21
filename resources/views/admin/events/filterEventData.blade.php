<table class="table table-striped table-bordered eve" id="export-p" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr>
                <th style="width:15%">EventName</th>
                <th style="width:20%">League</th>
                <th  style="width:20%">Venue</th>
                <th style="width:10%">EventOrganizer</th>
                <th style="width:8%">Gender</th>
                <th style="width:8%">Age Group</th>
                <th style="width:8%">Date</th>


            </tr>
        </thead>
        <tbody>

            @foreach($events as $event)
@if(Auth::user()->hasRole(4))
@if($event->user_id==Auth::user()->id)

            <tr>

                <td>
                    {{ $event->mainEvent->name }}
                </td>
                <td>
                    {{$event->league->name}}

                </td>
                <td>{{ $event->league->venue->name }}</td>
                <td>
                    {{ $event->user->first_name }} &nbsp; {{ $event->user->last_name }}
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
                <td>
                    @foreach ($genders as $gender)
                    @foreach ($gender as $AgeGroupId )

                    {{ $AgeGroupId->gender->name }}<br>
                    @endforeach
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
            @else
            
            <tr>

                <td>
                    {{ $event->mainEvent->name }}
                </td>
                <td>
                    {{$event->league->name}}

                </td>
                <td>{{ $event->league->venue->name }}</td>
                <td>
                    {{ $event->user->first_name }} &nbsp; {{ $event->user->last_name }}
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
                <td>
                    @foreach ($genders as $gender)
                    @foreach ($gender as $AgeGroupId )

                    {{ $AgeGroupId->gender->name }}<br>
                    @endforeach
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