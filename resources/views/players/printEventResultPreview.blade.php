<style>
    table,
    th,
    td {
        border: 2px solid white;
        border-collapse: collapse;
        width: 100%;
        text-transform: capitalize;
    }

    th,
    td {
        border-color: #96D4D4;
    }

    th {
        width: 40%;
        font-size: 20px;
        margin-top: 15px;
        text-align: center;
    }

    td {
        width: 40%;
        font-size: 15px;
        padding-top: 5px;
        padding-bottom: 5px;
    }

    h3 {
        text-align: center;
    }
</style>
<div class="suvarna">
@if(Auth::user()->hasRole(7)||Auth::user()->hasRole(3))
    @else
@include('reports.PrintHeader')
    @endif
    <center><h3>Event result</h3></center>
<table class="table table-striped text-uppercase table-bordered genders">
    @if(Auth::user()->hasRole(7))

    <thead class="thead-Dark" >
        <tr>
            <th>League Name</th>
            <th>Event Name</th>
            <th>Organization</th>
            <th>Status</th>
            <th>Winners</th>

        </tr>
        <tr>


            <th >
            </th>
            <th >
            </th>
            <th>
            </th>
            <th style="center;padding-left:50px;padding-right:50px">
                First
            </th>
            <th style="center;padding-left:50px;padding-right:50px">
                Second
            </th>
            <th style="center;padding-left:50px;padding-right:50px">
                Third
            </th>

        </tr>
    </thead>
    @else
    <thead class="thead-Dark" >
        <tr>
            <th style="width: 15%;text-align: center;">League Name</th>
            <th style="width: 15%;text-align: center;">Event Name</th>
            <th style="text-align: center;">Gender</th>
            <th style="width: 10%;text-align: center;">Age Group</th>
            <th style="width: 10%;text-align: center;">Status</th>
            <th colspan="3" style="width:45%;" >Winners</th>

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
    @endif
    <tbody>
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
            <td>Not Started

            </td>
            @elseif($gender->status==0)
            <td>On Going 
            </td>
            @elseif($gender->status==3)
            <td>Finalizing
            </td>
            @elseif($gender->status==4)
            <td>Processing
            </td>
            @elseif($gender->status==10)
            <td>Cancelled
            </td>
            @else
            <td>Finished
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
                   Not Started

                </td>
                @elseif($gender->status==0)
                <td>On Going
                </td>
                @elseif($gender->status==3)
                <td>Finalizing
                </td>
                @elseif($gender->status==4)
                <td>Processing
                </td>
                @elseif($gender->status==10)
                <td>Cancelled
                </td>
                @else
                <td>Finished
                </td>
                @endif
                @if($gender->status==1)
                <?php
   $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
   $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
   $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                ?>

                @if($users1)

                <td style="width: 15%;">
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
                       Not Started

                    </td>
                    @elseif($gender->status==0)
                    <td style="width: 10%;">On Going 
                    </td>
                    @elseif($gender->status==3)
                    <td style="width: 10%;"> Finalizing 
                    </td>
                    @elseif($gender->status==10)
                    <td style="width: 10%;">Cancelled
                    </td>
                    @else
                    <td style="width: 10%;">Finishe
                    </td>
                    @endif
                    <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_third_place)->get();
            
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


      
                <!--starter-->
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
                 Not Started

                </td>
                @elseif($gender->status==0)
                <td>On Going 
                </td>
                @elseif($gender->status==3)
                <td>Finalizing 
                </td>
                @elseif($gender->status==4)
                <td> Processing
                </td>
                @elseif($gender->status==10)
                <td>Cancelled
                </td>
                @else
                <td>Finished
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
                   Not Started

                    </td>
                    @elseif($gender->status==0)
                    <td style="width: 10%;">On Going
                    </td>
                    @elseif($gender->status==3)
                    <td style="width: 10%;"> Finalizing
                    </td>
                    @elseif($gender->status==10)
                    <td style="width: 10%;">Cancelled 
                    </td>
                    @else
                    <td style="width: 10%;"> Finished
                    </td>
                    @endif
                    @if($gender->status==1)
                <?php
   $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
   $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
   $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                ?>

                @if($users1)

                <td style="width: 15%;">
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
                   >Not Started

                    </td>
                    @elseif($gender->status==0)
                    <td style="width: 10%;"> On Going 
                    </td>
                    @elseif($gender->status==3)
                    <td style="width: 10%;">Finalizing
                    </td>
                    @elseif($gender->status==10)
                    <td style="width: 10%;"> Cancelled 
                    </td>
                    @else
                    <td style="width: 10%;">Finished
                    </td>
                    @endif
                    <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
    
               
                @if($teams1)
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
               
                @if($teams2)
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
                @if($teams3)
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
               
    


                </tr>
                @endif
                @endif
                @endforeach
                @elseif(Auth::user()->hasRole(4))
                @foreach($genders as $gender)
                @if($gender->ageGroupEvent->Event->user_id==Auth::user()->id  )
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
                 Not Started

                </td>
                @elseif($gender->status==0)
                <td>On Going 
                </td>
                @elseif($gender->status==3)
                <td>Finalizing 
                </td>
                @elseif($gender->status==4)
                <td> Processing
                </td>
                @elseif($gender->status==10)
                <td>Cancelled
                </td>
                @else
                <td>Finished
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
                   Not Started

                    </td>
                    @elseif($gender->status==0)
                    <td style="width: 10%;">On Going
                    </td>
                    @elseif($gender->status==3)
                    <td style="width: 10%;"> Finalizing
                    </td>
                    @elseif($gender->status==10)
                    <td style="width: 10%;">Cancelled 
                    </td>
                    @else
                    <td style="width: 10%;"> Finished
                    </td>
                    @endif
                    @if($gender->status==1)
                <?php
   $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
   $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
   $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                ?>

                @if($users1)

                <td style="width: 15%;">
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
                   >Not Started

                    </td>
                    @elseif($gender->status==0)
                    <td style="width: 10%;"> On Going 
                    </td>
                    @elseif($gender->status==3)
                    <td style="width: 10%;">Finalizing
                    </td>
                    @elseif($gender->status==10)
                    <td style="width: 10%;"> Cancelled 
                    </td>
                    @else
                    <td style="width: 10%;">Finished
                    </td>
                    @endif
                    <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
    
               
                @if($teams1)
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
               
                @if($teams2)
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
                @if($teams3)
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
               
    


                </tr>
                @endif
                @endif
                @endforeach

                @else
                @foreach($genders as $gender)
                @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)
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
                   Not Started

                </td>
                @elseif($gender->status==0)
                <td>On Going 
                </td>
                @elseif($gender->status==3)
                <td>Finalizing 
                </td>
                @elseif($gender->status==4)
                <td>Processing
                </td>
                @elseif($gender->status==10)
                <td> Cancelled
                </td>
                @else
                <td>Finished
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
                     Not Started

                    </td>
                    @elseif($gender->status==0)
                    <td style="width: 10%;">On Going 
                    </td>
                    @elseif($gender->status==3)
                    <td style="width: 10%;">Finalizing 
                    </td>
                    @elseif($gender->status==10)
                    <td style="width: 10%;">Cancelled 
                    </td>
                    @else
                    <td style="width: 10%;">Finished
                    </td>
                    @endif
                    @if($gender->status==1)

                    <?php
   $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
   $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
   $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                ?>

                @if($users1)

                <td style="width: 15%;">
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
                     Not Started

                    </td>
                    @elseif($gender->status==0)
                    <td style="width: 10%;">On Going 
                    </td>
                    @elseif($gender->status==3)
                    <td style="width: 10%;">Finalizing 
                    </td>
                    @elseif($gender->status==10)
                    <td style="width: 10%;">Cancelled
                    </td>
                    @else
                    <td style="width: 10%;">Finished
                    </td>
                    @endif
                    <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
    
               
                @if($teams1)
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
               
                @if($teams2)
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
                @if($teams3)
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                <td>
                    {{$user->name}}
                </td>
                        @endforeach
                @endif
               
    

                </tr>
                @endif


                @endif

                @endforeach

                @endif


    </tbody>
</table>

    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>