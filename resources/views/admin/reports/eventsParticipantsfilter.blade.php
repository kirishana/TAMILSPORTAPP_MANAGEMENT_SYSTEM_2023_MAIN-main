<div class="col-md-12">
    <table class="table table-striped  table-bordered evePart" style="text-transform: capitalize;" id="table10">
        @if (Auth::user()->hasRole(7))

            <thead class="thead-Dark">
                <tr>
                    <th colspan="3">Name</th>
                    <th colspan="1">User Id</th>
                    <th colspan="2">time</th>
                    <th colspan="2">First</th>
                    <th colspan="2"> Second</th>
                    <th colspan="2"> Third</th>

                </tr>
            </thead>
        @else
            <thead class="thead-Dark">
                <tr>
                    <th colspan="2">Name</th>
                    <th colspan="1">User Id/Club</th>
                    <th colspan="1">Gender</th>
                    <th colspan="2">Event</th>
                    <th colspan="1">Age Group</th>
                    <th colspan="1">time/rank</th>
                    <th colspan="2">First</th>
                    <th colspan="1"> Second</th>
                    <th colspan="1"> Third</th>

                </tr>
            </thead>
        @endif
        @if ($agegroupgenders != null)
            <tbody>
                @if (Auth::user()->hasRole(6) || Auth::user()->hasRole(5) || Auth::user()->hasRole(4))
                    @foreach ($agegroupgenders as $agegroupgender)

                        @if ($agegroupgender->judge_id == Auth::user()->id || $agegroupgender->starter_id == Auth::user()->id || $agegroupgender->ageGroupEvent->Event->user_id == Auth::user()->id)

                            <?php
                            $agegroupgenderusers = DB::table('age_group_gender_user')
                                ->where('age_group_gender_id', $agegroupgender->id)
                                ->get();
                            
                            ?>
                            @foreach ($agegroupgenderusers as $agegroupgenderuser)
                                <?php
                                $user = DB::table('users')
                                    ->where('id', $agegroupgenderuser->user_id)
                                    ->first();
                                
                                ?>

                                @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
                                    <tr>
                                        <td colspan="2">{{ $user->first_name }} &nbsp; {{ $user->last_name }}
                                        </td>
                                        <td colspan="1">[{{ $user->userId }}]</td>
                                        <td colspan="1">{{ $user->gender }}</td>
                                        <td colspan="2">
                                            {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                                        <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->time }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->one }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->two }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->third }}</td>

                                    </tr>
                                @endif

                                @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
                                    <tr>
                                        <td colspan="2">{{ $user->first_name }} &nbsp; {{ $user->last_name }}
                                        </td>
                                        <td colspan="1">[{{ $user->userId }}]</td>
                                        <td colspan="1">{{ $user->gender }}</td>
                                        <td colspan="2">
                                            {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                                        <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->time }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->one }}m</td>
                                        <td colspan="1">{{ $agegroupgenderuser->two }}m</td>
                                        <td colspan="1">{{ $agegroupgenderuser->third }}m</td>

                                    </tr>
                                @endif
                            @endforeach

                            @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 3)
                                <?php
                                $times = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->get();
                                ?>
                                @foreach ($times as $time)
                                    <?php
                                    $team = DB::table('teams')
                                        ->where('id', $time->team_id)
                                        ->first();
                                    $club = App\Models\Club::find($team->club_id);
                                    ?>
                                    <tr>
                                        <td colspan="2">{{ $team->name }}</td>
                                        <td colspan="1">{{ $club->club_name }}</td>
                                        <td colspan="1">{{ $agegroupgender->gender->name }}</td>
                                        <td colspan="2">
                                            {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                                        <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                                        <td colspan="1">{{ $time->time }}</td>
                                        <td colspan="2"></td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>

                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                @endif
               
                @if (Auth::user()->hasRole(2) || Auth::user()->hasRole(8))
                    @foreach ($agegroupgenders as $agegroupgender)
                        @if ($agegroupgender->ageGroupEvent->Event->organization_id == Auth::user()->organization_id || $agegroupgender->ageGroupEvent->Event->organization_id == $id)



                            <?php
                            $agegroupgenderusers = DB::table('age_group_gender_user')
                                ->where('age_group_gender_id', $agegroupgender->id)
                                ->get();
                            
                            ?>


                            @foreach ($agegroupgenderusers as $agegroupgenderuser)
                                <?php
                                $user = DB::table('users')
                                    ->where('id', $agegroupgenderuser->user_id)
                                    ->first();
                                
                                ?>

                                @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
                                    <tr>
                                        <td colspan="2">{{ $user->first_name }} &nbsp; {{ $user->last_name }}
                                        </td>
                                        <td colspan="1">[{{ $user->userId }}]</td>
                                        <td colspan="1">{{ $user->gender }}</td>
                                        <td colspan="2">
                                            {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                                        <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->time }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->one }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->two }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->third }}</td>

                                    </tr>
                                @endif

                                @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
                                    <tr>
                                        <td colspan="2">{{ $user->first_name }} &nbsp; {{ $user->last_name }}
                                        </td>
                                        <td colspan="1">[{{ $user->userId }}]</td>
                                        <td colspan="1">{{ $user->gender }}</td>
                                        <td colspan="2">
                                            {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                                        <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                                        <td colspan="1">{{ $agegroupgenderuser->time }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->one }}m</td>
                                        <td colspan="1">{{ $agegroupgenderuser->two }}m</td>
                                        <td colspan="1">{{ $agegroupgenderuser->third }}m</td>

                                    </tr>
                                @endif
                            @endforeach
                            @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 3)
                                <?php
                                $times = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->get();
                                ?>
                                @foreach ($times as $time)
                                    <?php
                                    $team = DB::table('teams')
                                        ->where('id', $time->team_id)
                                        ->first();
                                    
                                    ?>
                                    <tr>
                                        <td colspan="2">{{ $team->name }}</td>
                                        <td colspan="1">[{{ $team->club_id }}]</td>
                                        <td colspan="1">{{ $agegroupgender->gender->name }}</td>
                                        <td colspan="2">{{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}</td>
                                        <td colspan="1">{{ $agegroupgender->ageGroupEvent->ageGroup->name }}</td>
                                        <td colspan="1">{{ $time->time }}</td>
                                        <td colspan="2"></td>
                                        <td colspan="1"></td>
                                        <td colspan="1"></td>

                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                @endif
      

        </tbody>

    </table>

    <table class="table table-striped table-bordered">


        <thead style="background-color: #515763;color:white;">

            <tr>
                <td colspan="12" class="text-center"><strong>Winners</strong></td>
            </tr>
            <tr>
                <td colspan="3" class="text-center"><strong>Event name</strong></td>
                <td colspan="3" class="text-center"><strong>First</strong></td>
                <td colspan="3" class="text-center"><strong>Second</strong></td>
                <td colspan="3" class="text-center"><strong>Third</strong></td>
            </tr>

        </thead>
        <tbody>
        </tbody>
        @if (Auth::user()->hasRole(6) || Auth::user()->hasRole(5) || Auth::user()->hasRole(4))
                @foreach ($agegroupgenders as $agegroupgender)
                    @if ($agegroupgender->judge_id == Auth::user()->id || $agegroupgender->starter_id == Auth::user()->id || $agegroupgender->ageGroupEvent->Event->user_id == Auth::user()->id)
                        @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
                            <tr>
                                <?php
                                $users1 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', '')
                                    ->where('marks', $agegroupgender->first_place)
                                    ->get();
                                $users2 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', '')
                                    ->where('marks', $agegroupgender->second_place)
                                    ->get();
                                $users3 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', '')
                                    ->where('marks', $agegroupgender->third_place)
                                    ->get();
                                ?>
                                <td colspan="3">
                                    {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}&nbsp;[{{ $agegroupgender->ageGroupEvent->ageGroup->name }}]
                                </td>
                                <td colspan="3">

                                    @if ($users1)
                                        @foreach ($users1 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                            @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                            @endif
                                            <br>
                                        @endforeach
                                    @endif
                                </td>

                                <td colspan="3">

                                    @if ($users2)
                                        @foreach ($users2 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                            @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
                                        <br>
                                        @endforeach
                                    @endif
                                </td>

                                <td colspan="3">


                                    @if ($users3)
                                        @foreach ($users3 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                            @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
                                        <br>
                                        @endforeach
                                    @endif
                                </td>

                            </tr>
                        @endif
                        @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
                            <tr>

                                <?php
                                $users1 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('marks', $agegroupgender->first_place)
                                    ->get();
                                $users2 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('marks', $agegroupgender->second_place)
                                    ->get();
                                $users3 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('marks', $agegroupgender->third_place)
                                    ->get();
                                ?>
                                <td colspan="3">
                                    {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}&nbsp;[{{ $agegroupgender->ageGroupEvent->ageGroup->name }}]
                                </td>

                                @if ($users1)
                                    <td colspan="3">
                                        @foreach ($users1 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                             @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
                                            <br>
                                        @endforeach
                                    </td>
                                @endif
                                <td colspan="3">

                                    @if ($users2)
                                        @foreach ($users2 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                             @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
                                            <br>
                                        @endforeach
                                    @endif
                                </td>

                                <td colspan="3">


                                    @if ($users3)
                                        @foreach ($users3 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                              @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
                                            <br>
                                        @endforeach
                                    @endif
                                </td>

                            </tr>
                        @endif
                        @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 3)
                            <tr>

                                <?php
                                $users1 = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', null)
                                    ->where('marks', $agegroupgender->group_first_place)
                                    ->get();
                                $users2 = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', null)
                                    ->where('marks', $agegroupgender->group_second_place)
                                    ->get();
                                $users3 = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', null)
                                    ->where('marks', $agegroupgender->group_third_place)
                                    ->get();
                                
                                ?>
                                <td colspan="3">{{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}
                                    &nbsp; [{{ $agegroupgender->ageGroupEvent->ageGroup->name }}]</td>
                                <td colspan="3">


                                    @if ($users1)
                                        @foreach ($users1 as $use)
                                            <?php
                                            $team = App\Models\Team::find($use->team_id);
                                            ?>

                                            {{ $team->name }}<br>[ {{ $team->club->club_name }}]
                                            <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td colspan="3">


                                    @if ($users2)
                                        @foreach ($users2 as $use)
                                            <?php
                                            $team = App\Models\Team::find($use->team_id);
                                            ?>

                                            {{ $team->name }}<br>[ {{ $team->club->club_name }}]
                                            <br>
                                        @endforeach
                                    @endif
                                </td>


                                <td colspan="3">

                                    @if ($users3)
                                        @foreach ($users3 as $use)
                                            <?php
                                            $team = App\Models\Team::find($use->team_id);
                                            ?>

                                            {{ $team->name }}<br>[ {{ $team->club->club_name }}]
                                            <br>
                                        @endforeach
                                    @endif
                                </td>

                            </tr>
                        @endif
                    @endif
                @endforeach
                @endif


                <!-- admin-->
                @if (Auth::user()->hasRole(2) || Auth::user()->hasRole(8))
                @foreach ($agegroupgenders as $agegroupgender)
                    @if ($agegroupgender->ageGroupEvent->Event->organization_id == Auth::user()->organization_id || $agegroupgender->ageGroupEvent->Event->organization_id == $id)
                        @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 1)

                            <?php
                            $users1 = DB::table('age_group_gender_user')
                                ->where('age_group_gender_id', $agegroupgender->id)
                                ->where('time', '!=', '')
                                ->where('marks',$agegroupgender->first_place)
                                ->get();
                            $users2 = DB::table('age_group_gender_user')
                                ->where('age_group_gender_id', $agegroupgender->id)
                                ->where('time', '!=', '')
                                ->where('marks', $agegroupgender->second_place)
                                ->get();
                            $users3 = DB::table('age_group_gender_user')
                                ->where('age_group_gender_id', $agegroupgender->id)
                                ->where('time', '!=', '')
                                ->where('marks',$agegroupgender->third_place)
                                ->get();
                            ?>
                            <td colspan="3">
                                {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}&nbsp;[{{ $agegroupgender->ageGroupEvent->ageGroup->name }}]
                            </td>

                            @if ($users1)
                                <td colspan="3">
                                    @foreach ($users1 as $use)
                                        <?php
                                        $user = App\User::find($use->user_id);
                                        ?>
                                        @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
                                        <br>
                                    @endforeach
                                </td>
                            @endif
                            <td colspan="3">

                                @if ($users2)
                                    @foreach ($users2 as $use)
                                        <?php
                                        $user = App\User::find($use->user_id);
                                        ?>
                                        @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
                                        <br>
                                    @endforeach
                                @endif
                            </td>

                            <td colspan="3">


                                @if ($users3)
                                    @foreach ($users3 as $use)
                                        <?php
                                        $user = App\User::find($use->user_id);
                                        ?>
                                         @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
                                        <br>
                                    @endforeach
                                @endif
                            </td>

                            </tr>
                        @endif
                        @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
                            <tr>

                                <?php
                                $users1 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('marks',$agegroupgender->first_place)
                                    ->get();
                                $users2 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('marks',$agegroupgender->second_place)
                                    ->get();
                                $users3 = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('marks',$agegroupgender->third_place)
                                    ->get();
                                ?>
                                <td colspan="3">
                                    {{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}&nbsp;[{{ $agegroupgender->ageGroupEvent->ageGroup->name }}]
                                </td>
                                @if ($users1)
                                    <td colspan="3">
                                        @foreach ($users1 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                            @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
                                            <br>
                                        @endforeach
                                    </td>
                                @endif
                                <td colspan="3">

                                    @if ($users2)
                                        @foreach ($users2 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                            @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
                                            <br>
                                        @endforeach
                                    @endif
                                </td>

                                <td colspan="3">


                                    @if ($users3)
                                        @foreach ($users3 as $use)
                                            <?php
                                            $user = App\User::find($use->user_id);
                                            ?>
                                           @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
                                            <br>
                                        @endforeach
                                    @endif
                                </td>

                            </tr>
                        @endif
                        @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 3)
                            <tr>

                                <?php
                                $users1 = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', null)
                                    ->where('marks',$agegroupgender->group_first_place)
                                    ->get();
                                $users2 = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', null)
                                    ->where('marks',$agegroupgender->group_second_place)
                                    ->get();
                                $users3 = DB::table('age_group_gender_team')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->where('time', '!=', null)
                                    ->where('marks',$agegroupgender->group_third_place)
                                    ->get();
                                
                                ?>
                                <td colspan="3">{{ $agegroupgender->ageGroupEvent->Event->mainEvent->name }}
                                    &nbsp; [{{ $agegroupgender->ageGroupEvent->ageGroup->name }}]</td>
                                <td colspan="3">


                                    @if ($users1)
                                        @foreach ($users1 as $use)
                                            <?php
                                            $team = App\Models\Team::find($use->team_id);
                                            ?>

                                            {{ $team->name }}<br>[ {{ $team->club->club_name }}]
                                            <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td colspan="3">


                                    @if ($users2)
                                        @foreach ($users2 as $use)
                                            <?php
                                            $team = App\Models\Team::find($use->team_id);
                                            ?>

                                            {{ $team->name }}<br>[ {{ $team->club->club_name }}]
                                            <br>
                                        @endforeach
                                    @endif
                                </td>


                                <td colspan="3">

                                    @if ($users3)
                                        @foreach ($users3 as $use)
                                            <?php
                                            $team = App\Models\Team::find($use->team_id);
                                            ?>

                                            {{ $team->name }}<br>[ {{ $team->club->club_name }}]
                                            <br>
                                        @endforeach
                                    @endif
                                </td>

                            </tr>
                        @endif
                    @endif

                @endforeach
            @endif
                <!--end -->
                <!-- player -->

                <!-- end -->
                        </tbody>
                        @endif

    </table>
    
</div>
</div>
