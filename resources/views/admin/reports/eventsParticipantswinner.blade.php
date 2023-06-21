<div class="col-md-12">
<table class="table table-striped table-bordered text-uppercase  evePart" id="table10">

<thead class="thead-Dark">
    <tr>
        <th>Name</th>
        <th>User Id</th>
        <th>time</th>
        <th>First</th>
        <th> Second</th>
        <th> Third</th>

    </tr>
</thead>
@if( $agegroupgenders != null)
    <tbody>
    @if(Auth::user()->hasRole(6))
        @foreach($agegroupgenders as $agegroupgender)
        @if($agegroupgender->judge_id==Auth::user()->id)

            <?php
        $agegroupgenderusers=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->get();

        ?>


            @foreach( $agegroupgenderusers as $agegroupgenderuser)
                <?php
                $user = DB::table('users')->where('id', $agegroupgenderuser->user_id)->first();

                ?>
            
                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
                    <tr>
                        <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                        <td>[{{ $user->userId }}]</td>
                        <td>{{ $agegroupgenderuser->time }}s</td>
                        <td>{{ $agegroupgenderuser->one }}</td>
                        <td>{{ $agegroupgenderuser->two }}</td>
                        <td>{{ $agegroupgenderuser->third }}</td>

                    </tr>
                @endif
            
                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
                    <tr>
                        <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                        <td>[{{ $user->userId }}]</td>
                        <td>{{ $agegroupgenderuser->time }}</td>
                        <td>{{ $agegroupgenderuser->one }}m</td>
                        <td>{{ $agegroupgenderuser->two }}m</td>
                        <td>{{ $agegroupgenderuser->third }}m</td>

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
                
                ?>
                    <tr>
                        <td>{{ $team->name }}</td>
                        <td>[{{ $team->club_id }}]</td>
                        <td>{{ $agegroupgenderuser->time }}</td>
                        <td>{{ $agegroupgenderuser->one }}</td>
                        <td>{{ $agegroupgenderuser->two }}</td>
                        <td>{{ $agegroupgenderuser->third }}</td>

                    </tr>
                    @endforeach
                @endif
            @endforeach
            @endif
        @endforeach
        @endif
        @if(Auth::user()->hasRole(5))
        @foreach($agegroupgenders as $agegroupgender)
        @if($agegroupgender->starter_id==Auth::user()->id)

            <?php
        $agegroupgenderusers=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->get();

        ?>


            @foreach( $agegroupgenderusers as $agegroupgenderuser)
                <?php
                $user = DB::table('users')->where('id', $agegroupgenderuser->user_id)->first();

                ?>
            
                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
                    <tr>
                        <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                        <td>[{{ $user->userId }}]</td>
                        <td>{{ $agegroupgenderuser->time }}s</td>
                        <td>{{ $agegroupgenderuser->one }}</td>
                        <td>{{ $agegroupgenderuser->two }}</td>
                        <td>{{ $agegroupgenderuser->third }}</td>

                    </tr>
                @endif
            
                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
                    <tr>
                        <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                        <td>[{{ $user->userId }}]</td>
                        <td>{{ $agegroupgenderuser->time }}</td>
                        <td>{{ $agegroupgenderuser->one }}m</td>
                        <td>{{ $agegroupgenderuser->two }}m</td>
                        <td>{{ $agegroupgenderuser->third }}m</td>

                    </tr>
                @endif
            @endforeach
            @endif
        @endforeach
        @endif
        
    </tbody>
     
 </table>
        
        <table>


    <thead>
        <tr>
            <td>WINNERS</td>
        </tr>
        <tr>
            <td>First</td>
            <td>Second</td>
            <td>Third</td>
        </tr>

    </thead>

    <tbody>
    @if(Auth::user()->hasRole(6))
        @foreach($agegroupgenders as $agegroupgender)
        @if($agegroupgender->judge_id==Auth::user()->id)

            @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
                <?php
             $times = DB::table('age_group_gender_user')->where('age_group_gender_id','=',$agegroupgender->id)->orderBy('time','ASC')->limit(3)->get();
            //  echo $times;
            ?>

                <tr>
                    @foreach($times as $time)
                        <?php
                    // $one = DB::table('age_group_gender_user')->where('user_id', $time->user_id)->first();
                        $user = DB::table('users')->where('id', $time->user_id)->first();
                    // echo $times;

                        ?>
                        <td> @if($user->profile_pic)
                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam" width="50"
                                height="50" style="border-radius:50%">
                        @else
                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                            <br>
                            <span><strong>Time</strong>: {{ $time->time }}s</span>
                    @endif
                    </td>
            @endforeach
            </tr>
        @else
        @endif
        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
                <?php
    $gen = App\Models\AgeGroupGender::find($agegroupgender->id);
                                    $players = $agegroupgender->users;
                                    $max = array();
                                    $userIds = array();
                                    $times = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->get();
                                foreach ($times as $key => $time) {
                                    if ($time->one >= $time->two) {
                                        if ($time->one >= $time->third) {
                                         $max[] = $time->one;
                                        } else {
                                            $max[] = $time->third;
                                        }
                                    } elseif ($time->one <= $time->two) {
                                        if ($time->third <= $time->two) {
                                            $max[] = $time->two;
                                        } else {
                                            $max[] = $time->third;
                                        }
                                    }
                                }

  

                                arsort($max);
  
                                $userLists = array();
                                $results = array_slice($max, 0, 3);
                                foreach ($results as $result) {
                                    $users = DB::table('age_group_gender_user')
                                        ->where('age_group_gender_id', $agegroupgender->id)
                                        ->where(function ($query) use ($result) {
                                            $query->orwhere('one', $result)
                                                ->orWhere('two', $result)
                                                ->orWhere('third', $result);
                                        })->get();

                                    $userLists[] = $users;
                                }
                                $userListsUnique = array_unique($userLists);

                                ?>

                @if($userLists !==null)
                    @foreach($userListsUnique as $userLists )

                        @foreach($userLists as $userId)
                            <?php
                                $user = App\User::find($userId->user_id);
                                ?>

                            <td>
                                @if($user->profile_pic)
                                    <img src="/profile/{{ $fname->profile_pic }}" alt="Tamil Sangam"
                                        width="50" height="50" style="border-radius:50%">
                                @else
                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                    <br>
                                    <span class="round"> <strong> Round 1 </strong> {{ $userId->one }}
                                        m</span> <br>
                                    <span class="round"> <strong> Round 2 </strong> {{ $userId->two }}
                                        m</span><br>
                                    <span class="round"> <strong> Round 3 </strong> {{ $userId->third }}
                                        m</span>

                                @endif

                            </td>
                        @endforeach
                    @endforeach
                @endif
            </tr>
        @endif
        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==3)
            <tr>

                <?php
                $times = DB::table('age_group_gender_team')
                ->where('age_group_gender_id', $agegroupgender->id)
                ->orderBy('time', 'ASC')
                ->limit(3)
                ->get();
                    // print_r($times);
                ?>

                @foreach($times as $time)

                    <?php
                    $user = DB::table('teams')->where('id', $time->team_id)->first();

                    ?>
                    <td>
                        {{ $user->name }}
                    </td>
                @endforeach


            </tr>
        @endif
        @endif
@endforeach
@endif

@if(Auth::user()->hasRole(5))
        @foreach($agegroupgenders as $agegroupgender)
        @if($agegroupgender->starter_id==Auth::user()->id)

            @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
                <?php
             $times = DB::table('age_group_gender_user')->where('age_group_gender_id','=',$agegroupgender->id)->orderBy('time','ASC')->limit(3)->get();
            //  echo $times;
            ?>

                <tr>
                    @foreach($times as $time)
                        <?php
                    // $one = DB::table('age_group_gender_user')->where('user_id', $time->user_id)->first();
                        $user = DB::table('users')->where('id', $time->user_id)->first();
                    // echo $times;

                        ?>
                        <td> @if($user->profile_pic)
                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam" width="50"
                                height="50" style="border-radius:50%">
                        @else
                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                            <br>
                            <span><strong>Time</strong>: {{ $time->time }}s</span>
                    @endif
                    </td>
            @endforeach
            </tr>
        @else
        @endif
        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
                <?php
    $gen = App\Models\AgeGroupGender::find($agegroupgender->id);
                                    $players = $agegroupgender->users;
                                    $max = array();
                                    $userIds = array();
                                    $times = DB::table('age_group_gender_user')
                                    ->where('age_group_gender_id', $agegroupgender->id)
                                    ->get();
                                foreach ($times as $key => $time) {
                                    if ($time->one >= $time->two) {
                                        if ($time->one >= $time->third) {
                                         $max[] = $time->one;
                                        } else {
                                            $max[] = $time->third;
                                        }
                                    } elseif ($time->one <= $time->two) {
                                        if ($time->third <= $time->two) {
                                            $max[] = $time->two;
                                        } else {
                                            $max[] = $time->third;
                                        }
                                    }
                                }

  

                                arsort($max);
  
                                $userLists = array();
                                $results = array_slice($max, 0, 3);
                                foreach ($results as $result) {
                                    $users = DB::table('age_group_gender_user')
                                        ->where('age_group_gender_id', $agegroupgender->id)
                                        ->where(function ($query) use ($result) {
                                            $query->orwhere('one', $result)
                                                ->orWhere('two', $result)
                                                ->orWhere('third', $result);
                                        })->get();

                                    $userLists[] = $users;
                                }
                                $userListsUnique = array_unique($userLists);

                                ?>

                @if($userLists !==null)
                    @foreach($userListsUnique as $userLists )

                        @foreach($userLists as $userId)
                            <?php
                                $user = App\User::find($userId->user_id);
                                ?>

                            <td>
                                @if($user->profile_pic)
                                    <img src="/profile/{{ $fname->profile_pic }}" alt="Tamil Sangam"
                                        width="50" height="50" style="border-radius:50%">
                                @else
                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                    <br>
                                    <span class="round"> <strong> Round 1 </strong> {{ $userId->one }}
                                        m</span> <br>
                                    <span class="round"> <strong> Round 2 </strong> {{ $userId->two }}
                                        m</span><br>
                                    <span class="round"> <strong> Round 3 </strong> {{ $userId->third }}
                                        m</span>

                                @endif

                            </td>
                        @endforeach
                    @endforeach
                @endif
            </tr>
        @endif
        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==3)
            <tr>

                <?php
                $times = DB::table('age_group_gender_team')
                ->where('age_group_gender_id', $agegroupgender->id)
                ->orderBy('time', 'ASC')
                ->limit(3)
                ->get();
                    // print_r($times);
                ?>

                @foreach($times as $time)

                    <?php
                    $user = DB::table('teams')->where('id', $time->team_id)->first();

                    ?>
                    <td>
                        {{ $user->name }}
                    </td>
                @endforeach


            </tr>
        @endif
        @endif
@endforeach
@endif
            </tbody>
        </tbody>

        @endif

    </table>
</div>
</div>

