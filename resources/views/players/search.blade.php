 
    <table class="table table-striped  table-bordered genders" style="width:100%;text-transform:capitalize;">
        @if(Auth::user()->hasRole(7))
    
        <thead class="thead-Dark" >
            <tr>
                <th style="width:10px">Event Name</th>
                <th class="td">Organization</th>
                <th class="t10">Status</th>
                <th colspan="3" class="td45">Winners</th>
    
            </tr>
            <tr>
    
    
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th style="center;padding-left:80px;padding-right:80px">
                    First
                </th>
                <th style="center;padding-left:80px;padding-right:80px">
                    Second
                </th>
                <th style="center;padding-left:80px;padding-right:80px">
                    Third
                </th>
    
            </tr>
        </thead>
        @else
        <thead class="thead-Dark" >
            <tr>
                <th>League</th>
                <th class="fixed">Event Name</th>
                <th style="text-align: center;">Gender</th>
                <th style="width: 10%;text-align: center;">Age Group</th>
                <th style="width: 10%;text-align: center;">Status</th>
                <th colspan="3"> Winners
                </th>
    
            </tr>
            <tr>
    
                <th>
    
                </th>
                <th>
    
                </th>
                <th>
    
                </th>
                <th>
    
                </th>
                <th>
    
                </th>
                <th style="text-align: center;padding-left:80px;padding-right:80px">
                    First
                </th>
                <th style="text-align: center;padding-left:80px;padding-right:80px">
                    Second
                </th>
                <th style="text-align: center;padding-left:80px;padding-right:80px">
                    Third
                </th>
    
            </tr>
        </thead>
        @endif
        <tbody style="text-transform: capitalize;">
            <!--judge-->
            @if(Auth::user()->hasRole(6))
            @foreach($genders as $gender)
            @if($gender->judge_id==Auth::user()->id )
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                <td>
                    <span class="label label-primary">Not Started</span>
    
                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
                @if($gender->status==1)
     <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                    @endif

                    @endif
    
                    @if($users2)
                    @if($users2->count()>0)
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
    
                  
                    @if($users3)
                    @if($users3->count()>0)

    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
              
                
                @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>

                @endif
              
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                    <td>
                        <span class="label label-primary">Not Started</span>
    
                    </td>
                    @elseif($gender->status==0)
                    <td> <span class="label label-warning">On Going </span>
                    </td>
                    @elseif($gender->status==3)
                    <td> <span class="label label-warning">Finalizing </span>
                    </td>
                    @elseif($gender->status==4)
                    <td> <span class="label label-warning">Processing</span>
                    </td>
                    @elseif($gender->status==10)
                    <td> <span class="label label-danger">Cancelled</span>
                    </td>
                    @else
                    <td> <span class="label label-success">Finished</span>
                    </td>
                    @endif
                    <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
                    
                    @if($users2)
                    @if($users2->count()>0)

    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
    
                  
                    @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
    
    
    
    
    
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                        <td style="width: 10%;">
                            <span class="label label-primary">Not Started</span>
    
                        </td>
                        @elseif($gender->status==0)
                        <td style="width: 10%;"> <span class="label label-warning">On Going </span>
                        </td>
                        @elseif($gender->status==3)
                        <td style="width: 10%;"> <span class="label label-warning">Finalizing </span>
                        </td>
                        @elseif($gender->status==10)
                        <td style="width: 10%;"> <span class="label label-danger">Cancelled </span>
                        </td>
                        @else
                        <td style="width: 10%;"> <span class="label label-success">Finished</span>
                        </td>
                        @endif
              
                @if($gender->status==1)
    
     <?php
       $users1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_first_place)->get();
       $users2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_second_place)->get();
       $users3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_third_place)->get();
    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
               
                       
    
                        @endforeach
                    </td>
                        @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
                    @if($users2)
                    @if($users2->count()>0)

    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                        @endforeach
                    </td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
    
                  
                    @if($users3)
                    @if($users3->count()>0)

    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                       
                        @endforeach
                    </td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
              
                
                @else
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                @endif
    
    
    
            </tr>
            @endif
            @endif
            @endforeach
    
                    @elseif(Auth::user()->hasRole(5))
                    @foreach($genders as $gender)
                    @if($gender->starter_id==Auth::user()->id )
                    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                <td>
                    <span class="label label-primary">Not Started</span>
    
                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
           
    
              
     <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
    @else
    <td>&nbsp;</td>
                    @endif
                    @endif
    
                    @if($users2)
    
    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
    
    
                  
                    @if($users3)
    
    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
    
              
                
    
              
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                    <td>
                        <span class="label label-primary">Not Started</span>
    
                    </td>
                    @elseif($gender->status==0)
                    <td> <span class="label label-warning">On Going </span>
                    </td>
                    @elseif($gender->status==3)
                    <td> <span class="label label-warning">Finalizing </span>
                    </td>
                    @elseif($gender->status==4)
                    <td> <span class="label label-warning">Processing</span>
                    </td>
                    @elseif($gender->status==10)
                    <td> <span class="label label-danger">Cancelled</span>
                    </td>
                    @else
                    <td> <span class="label label-success">Finished</span>
                    </td>
                    @endif
                    <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
       ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
                    
                    @if($users2)
    
    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
    
    
                  
                    @if($users3)
    
    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
                    @endif
    
    
    
    
    
    
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                        <td style="width: 10%;">
                            <span class="label label-primary">Not Started</span>
    
                        </td>
                        @elseif($gender->status==0)
                        <td style="width: 10%;"> <span class="label label-warning">On Going </span>
                        </td>
                        @elseif($gender->status==3)
                        <td style="width: 10%;"> <span class="label label-warning">Finalizing </span>
                        </td>
                        @elseif($gender->status==10)
                        <td style="width: 10%;"> <span class="label label-danger">Cancelled </span>
                        </td>
                        @else
                        <td style="width: 10%;"> <span class="label label-success">Finished</span>
                        </td>
                        @endif
             
                    <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
    
               
                @if($teams1)
                @if($teams1->count()>0)
                <td>
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif

               
                @if($teams2)
                @if($teams2->count()>0)
                <td>
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif
                @if($teams3)
                @if($teams3->count()>0)
                <td>
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif
    
            </tr>
                    @endif
                    @endforeach
    
                    @elseif(Auth::user()->hasRole(4))
                    @foreach($genders as $gender)
                    @if($gender->ageGroupEvent->Event->user_id==Auth::user()->id )
                    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                <td>
                    <span class="label label-primary">Not Started</span>
    
                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
           
    
              
     <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    ?>
    
                    @if($users1)
                    @if($users1->count()>0)    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                        @endif
                    @endif
    
                    @if($users2)
    
    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
    
    
                  
                    @if($users3)
    
    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
    
    
              
                
                @else
    
                @endif
              
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                    <td>
                        <span class="label label-primary">Not Started</span>
    
                    </td>
                    @elseif($gender->status==0)
                    <td> <span class="label label-warning">On Going </span>
                    </td>
                    @elseif($gender->status==3)
                    <td> <span class="label label-warning">Finalizing </span>
                    </td>
                    @elseif($gender->status==4)
                    <td> <span class="label label-warning">Processing</span>
                    </td>
                    @elseif($gender->status==10)
                    <td> <span class="label label-danger">Cancelled</span>
                    </td>
                    @else
                    <td> <span class="label label-success">Finished</span>
                    </td>
                    @endif
                    <?php
        $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
        $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
        $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                    @endif
                    @endif

                    @if($users2)
                    @if($users2->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                    @endif
                    @endif

                    @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
                    
                  
    
    
    
    
    
    
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                        <td style="width: 10%;">
                            <span class="label label-primary">Not Started</span>
    
                        </td>
                        @elseif($gender->status==0)
                        <td style="width: 10%;"> <span class="label label-warning">On Going </span>
                        </td>
                        @elseif($gender->status==3)
                        <td style="width: 10%;"> <span class="label label-warning">Finalizing </span>
                        </td>
                        @elseif($gender->status==10)
                        <td style="width: 10%;"> <span class="label label-danger">Cancelled </span>
                        </td>
                        @else
                        <td style="width: 10%;"> <span class="label label-success">Finished</span>
                        </td>
                        @endif
                        <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
       
    @if($teams1)
                @if($teams1->count()>0)
                <td>
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif

               
                @if($teams2)
                @if($teams2->count()>0)
                <td>
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif
                @if($teams3)
                @if($teams3->count()>0)
                <td>
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif
               
    
    
            </tr>
            @endif
                    @endif
                    @endforeach
                    @elseif(Auth::user()->hasRole(7))
                    @foreach($genders as $gender)
                    <?php 
                    $child_id=array();
                      if(Auth::user()->children){
                        $user_ids=Auth::user()->children;
                        foreach($user_ids as $user_id){
                            $child_id[]=$user_id->id;
                        }                 
                    }else{
                            $child_id[]=null;
                    }
                      array_push($child_id,Auth::user()->id);
                     $all=$gender->wherehas('users',function($q) use($child_id){
                        $q->whereIn('user_id',$child_id);
                    })->get();
                    $genderArray=array();
                    foreach($all as $one){
                        $genderArray[]=$one->id;
                    }
                    // $all=DB::table('age_group_gender_user')->where('user_id','=',1186)->get();
                    // echo Auth::user()->id;
                    // $genderArray=array();
                    // foreach($all as $one){
                    //     $genderArray[]=$one->age_group_gender_id;
                    // }
                    if(in_array($gender->id,$genderArray)) {

                    
                    ?>
                    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
            <tr>
    
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td>{{ $gender->ageGroupEvent->Event->organization->name }}</td>
               
                @if($gender->status==2)
                <td>
                    <span class="label label-primary">Not Started</span>
    
                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
           
    
              
     <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    ?>
    
                    @if($users1)
                    @if($users1->count()>0)    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
                        @else
                        <td>&nbsp;</td>
                        @endif
                    @endif
    
                    @if($users2)
    
    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
    
    
                  
                    @if($users3)
    
    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
    
              
                
                
              
            </tr>
    
          @endif
          <?php 
        }
        ?>
        @endforeach
                    <!-- end-->
    
                    <!--event org-->
                    @else
                    @foreach($genders as $gender)
                    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
            <tr>
    
            <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name}}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                <td>
                    <span class="label label-primary">Not Started</span>
    
                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
           
    
              
                @if($gender->status==1)
     <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    ?>
    
                    @if($users1)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
    
                    @if($users2)
    
    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
    
    
                  
                    @if($users3)
    
    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
    
              
                
                @else
    
                @endif
              
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
            <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name}}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                    <td>
                        <span class="label label-primary">Not Started</span>
    
                    </td>
                    @elseif($gender->status==0)
                    <td> <span class="label label-warning">On Going </span>
                    </td>
                    @elseif($gender->status==3)
                    <td> <span class="label label-warning">Finalizing </span>
                    </td>
                    @elseif($gender->status==4)
                    <td> <span class="label label-warning">Processing</span>
                    </td>
                    @elseif($gender->status==10)
                    <td> <span class="label label-danger">Cancelled</span>
                    </td>
                    @else
                    <td> <span class="label label-success">Finished</span>
                    </td>
                    @endif
                    @if($gender->status==1)
                    <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                    ?>
    
                    @if($users1)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
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
    
                    
                    @if($users2)
    
    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                        <?php 
    $user=App\User::find($use->user_id);
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
    
    
                  
                    @if($users3)
    
    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                        <?php 
                        $user=App\User::find($use->user_id);
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
                    @endif
    
    
    
    
    
    
            </tr>
            @endif
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
            <tr>
    
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->league->name}}
                </td>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                        <td style="width: 10%;">
                            <span class="label label-primary">Not Started</span>
    
                        </td>
                        @elseif($gender->status==0)
                        <td style="width: 10%;"> <span class="label label-warning">On Going </span>
                        </td>
                        @elseif($gender->status==3)
                        <td style="width: 10%;"> <span class="label label-warning">Finalizing </span>
                        </td>
                        @elseif($gender->status==10)
                        <td style="width: 10%;"> <span class="label label-danger">Cancelled </span>
                        </td>
                        @else
                        <td style="width: 10%;"> <span class="label label-success">Finished</span>
                        </td>
                        @endif
                        <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
    
              
    @if($teams1)
                @if($teams1->count()>0)
                <td>
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif

               
                @if($teams2)
                @if($teams2->count()>0)
                <td>
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif
                @if($teams3)
                @if($teams3->count()>0)
                <td>
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <span>
                    {{$user->name}}
                </span>
                        @endforeach
                </td>
                @else
                <td>&nbsp;</td>
                @endif
                @endif
    
    
            </tr>
            @endif
    
    
                    @endforeach
    
                    @endif
    
    
        </tbody>
    </table>
