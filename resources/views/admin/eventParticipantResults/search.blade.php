    <table class="table table-striped  table-bordered evePart" style="text-transform: capitalize;" id="table10">

        <thead class="thead-Dark">
            <tr>
                <th colspan="2">Name</th>
                <th colspan="1">User Id/Club</th>
                <th colspan="1">Gender</th>
                <th colspan="2">Event</th>
                <th colspan="1">Age Group</th>
                <th colspan="1">time/rank</th>
                <th colspan="2">First Round</th>
                <th colspan="1"> Second Round</th>
                <th colspan="1"> Third Round</th>

            </tr>
        </thead>
        @if( $agegroupgenders != null)
        <tbody>
            @foreach($agegroupgenders as $agegroupgender)


            <?php
            $agegroupgenderusers = DB::table('age_group_gender_user')->where('age_group_gender_id', $agegroupgender->id)->get();

            ?>
            @foreach( $agegroupgenderusers as $agegroupgenderuser)


            <?php
            $user = DB::table('users')->where('id', $agegroupgenderuser->user_id)->first();

            ?>
            @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)

            <tr>
                <td colspan="2">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                <td colspan="1">[{{ $user->userId }}]</td>
                <td colspan="1">{{ $user->gender }}</td>
                <td colspan="2">{{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                <td colspan="1"><input type="text" data-gender="{{$agegroupgender->id}}" data-id="{{$agegroupgenderuser->id}}" class="varu" value="{{$agegroupgenderuser?$agegroupgenderuser->time:''}}"></td>
                <td colspan="2"><input type="text" data-id="{{$agegroupgenderuser->id}}" class="varu" data-field="one" value="{{$agegroupgenderuser?$agegroupgenderuser->one:'' }}"></td>
                <td colspan="1"><input type="text" data-id="{{$agegroupgenderuser->id}}"  data-field="two" class="varu" value="{{$agegroupgenderuser?$agegroupgenderuser->two:''}}"></td>
                <td colspan="1"><input type="text" data-id="{{$agegroupgenderuser->id}}"  data-field="third" class="varu" value="{{$agegroupgenderuser?$agegroupgenderuser->third:''}}"></td>


            </tr>
            @endif
            @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
                <td colspan="2">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                <td colspan="1">[{{ $user->userId }}]</td>
                <td colspan="1">{{ $user->gender }}</td>
                <td colspan="2">{{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                <td colspan="1"></td>
                <td colspan="2"><input type="text" data-gender="{{$agegroupgender->id}}" data-id="{{$agegroupgenderuser->id}}" class="varu" data-field="one" value="{{$agegroupgenderuser?$agegroupgenderuser->one:'' }}"></td>
                <td colspan="1"><input type="text" data-gender="{{$agegroupgender->id}}" data-id="{{$agegroupgenderuser->id}}"  data-field="two" class="varu" value="{{$agegroupgenderuser?$agegroupgenderuser->two:''}}"></td>
                <td colspan="1"><input type="text" data-gender="{{$agegroupgender->id}}" data-id="{{$agegroupgenderuser->id}}"  data-field="third" class="varu" value="{{$agegroupgenderuser?$agegroupgenderuser->third:''}}"></td>

            </tr>
        @endif
        @endforeach

        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==3)
        <?php
            $times = DB::table('age_group_gender_team')->where('age_group_gender_id', $agegroupgender->id)->get();
        ?>
        @foreach($times as $time)
        <?php
        $team = DB::table('teams')->where('id', $time->team_id)->first();
        $club=App\Models\Club::find($team->club_id);
        ?>
            <tr>
                <td colspan="2">{{ $team->name }}</td>
                <td colspan="1">[{{ $club->club_name }}]</td>
                <td colspan="1">{{ $agegroupgender->gender->name }}</td>
                <td colspan="2">{{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                <td colspan="1"><input type="text" data-id="{{$time->id}}" data-gender="{{$agegroupgender->id}}" class="varu" value="{{$time?$time->time:''}}"></td>
                <td colspan="2"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>


            </tr>
            @endforeach
        @endif


            @endforeach




        </tbody>
        @endif

    </table>
