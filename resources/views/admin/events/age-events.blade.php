
    <table class="table table-striped table-bordered text-uppercase" id="showall">

        <thead class="thead-Dark">
            <tr>
            <th>{{ __('sidebar.age_group') }}</th>
            <th>{{ __('league.event_name') }}</th>
            <th>{{ __('league.time') }}</th>
            <th>{{ __('league.date') }}</th>

        </tr>
    </thead>
    <tbody class="text-uppercase">
        @foreach ($AgeGroups as $ageGroup)
        @if($ageGroup->events->count()>0)
        @if($league->events->count()>0)
         @foreach($ageGroup->events as $event)
         @if($event->league_id==$league->id)
        <tr>
            <td>{{$ageGroup->name}} {{ __('staffs.male') }}</td>


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
            <td>{{$ageGroup->name}} {{ __('staffs.female') }}</td>

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
