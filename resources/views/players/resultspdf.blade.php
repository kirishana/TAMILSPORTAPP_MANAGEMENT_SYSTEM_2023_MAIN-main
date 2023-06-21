<style type="text/css">
    table {
        width:100%;
        border-collapse: collapse;
       
    }
    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;
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

<div class="">
    @if(Auth::user()->hasRole(7)||Auth::user()->hasRole(3))
    {{--@include('reports.adminHeader')--}}
    @else
@include('reports.header')
    @endif
    <br>
@if($eventTitle!=null||$AgeTitle!=null||$GenTitle!=null||$leagueTitle!=null)
<div style="text-align:center;"> 
<strong>
    @if($leagueTitle) <span style="font-size:30px;">{{$leagueTitle->name}}</span> @endif
    @if($eventTitle) <span style="font-size:30px;">{{$eventTitle->name}}</span> @endif
               @if($AgeTitle) <span style="font-size:30px;">({{$AgeTitle->name}})@endif
               @if($GenTitle)
              @if($GenTitle->name=="Male") <span style="color:green;font-size:20px;">{{$GenTitle->name}}  </span>
              @else
              <span style="color:red;font-size:20px;">{{$GenTitle->name}}                </span>
                @endif
               
                @endif</strong>

                </div>
@else

<h2>Participants Result</h2>
@endif
<br>
<table class="table table-striped  table-bordered genders" style="width: 100%;">
    @if(Auth::user()->hasRole(7))

    <thead class="thead" >
        <tr>
            <th>Event Name</th>
            <th>Organization</th>
            <th class="td10">Status</th>
            <th>winners</th>

        </tr>
        <tr style=" background-color: #3A3B3C;
        text-transform: uppercase;">

            <th>
            </th>
            <th >
            </th>
            <th>
            </th>
            <th style="padding-left:50px;padding-right:50px">
                First
            </th>
            <th style="padding-left:50px;padding-right:50px">
                Second
            </th>
            <th style="padding-left:50px;padding-right:50px">
                Third
            </th>

        </tr>
    </thead>
    @else
    <thead class="thead" >
        <tr>
            <th style="width: 15%;text-align: center;">Event Name</th>
            <th style="text-align: center;">Gender</th>
            <th style="width: 10%;text-align: center;">Age Group</th>
            <th style="width: 10%;text-align: center;">Status</th>
            <th colspan="3" style="width:45%;" >winners</th>

        </tr>
        <tr style=" background-color: #3A3B3C;
        text-transform: uppercase;">

            <th>

            </th>
            <th>

            </th>
            <th>

            </th>
            <th>

            </th>
            <th style="padding-left:50px;padding-right:50px">
                First
            </th>
            <th style="padding-left:50px;padding-right:50px">
                Second
            </th>
            <th style="padding-left:50px;padding-right:50px">
                Third
            </th>

        </tr>
    </thead>
    @endif
    <tbody style="width: 100%;">
        <!--judge-->
        @if(Auth::user()->hasRole(6))
        
        @foreach($genders as $gender)
        @if($gender->judge_id==Auth::user()->id )
        @if($gender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
        <tr>
          
            <td style="width: 10%;">
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
        @elseif($gender->status==4)
        <td style="width: 10%;"> <span class="label label-warning">Processing</span>
        </td>
        @elseif($gender->status==10)
        <td style="width: 10%;"> <span class="label label-danger">Cancelled</span>
        </td>
        @else
        <td style="width: 10%;"> <span class="label label-success">Finished</span>
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


                <td style="width:20%;">
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


                <td style="width:20%;">
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
            <td style="width: 10%;">
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
            $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
            $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
            $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                         ?>
    
            @if($users1)
    @if($users1->count()>0)
            <td style="width: 20%;">
                @foreach($users1 as $users)
    
              <?php 
              $user=App\User::find($users->user_id)
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
    <td style="width: 20%;">&nbsp;</td>
    @endif
            @endif
    
            @if($users2)
    @if($users2->count()>0)
    
            <td style="width: 20%;">
                @foreach($users2 as $users)
                <?php 
              $user=App\User::find($users->user_id)
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
            <td style="width: 20%;">&nbsp;</td>
            @endif
            @endif
    
    
            @if($users3)
            @if($users3->count()>0)
          
            <td style="width:20%;">
            @foreach($users3 as $users)
            <?php 
            $user=App\User::find($users->user_id)
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
            <td style="width: 20%;">&nbsp;</td>
    @endif
            @endif
        </tr>
        @endif


        @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
        <tr>
    
    <td style="width: 10%;">
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
    <td style="width: 10%;">
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
    <td style="width: 10%;">&nbsp;</td>
    @endif
    @endif

   
    @if($teams2)
    @if($teams2->count()>0)
    <td style="width: 10%;">
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
    <td style="width: 10%;">&nbsp;</td>
    @endif
    @endif
    @if($teams3)
    @if($teams3->count()>0)
    <td style="width: 10%;">
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
    <td style="width: 10%;">&nbsp;</td>
    @endif
    @endif
   


</tr>
    

        @endif






        @endif
        @endforeach


        @elseif(Auth::user()->hasRole(4))
        @foreach($genders as $gender)
        @if($gender->ageGroupEvent->Event->user_id==Auth::user()->id )
        @if($gender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
        <tr>
          
            <td style="width: 10%;">
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
   $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->hird_place)->get();
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


                <td style="width:20%;">
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


                <td style="width:20%;">
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
            <td style="width:10%;">
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
            $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
            $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
            $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                         ?>
    
            @if($users1)
    @if($users1->count()>0)
            <td style="width: 20%;">
                @foreach($users1 as $users)
    
              <?php 
              $user=App\User::find($users->user_id)
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
    <td style="width: 20%;">&nbsp;</td>
    @endif
            @endif
    
            @if($users2)
    @if($users2->count()>0)
    
            <td style="width: 20%;">
                @foreach($users2 as $users)
                <?php 
              $user=App\User::find($users->user_id)
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
            <td style="width: 20%;">&nbsp;</td>
            @endif
            @endif
    
    
            @if($users3)
            @if($users3->count()>0)
            <td style="width: 20%;">
            @foreach($users3 as $users)
            <?php 
            $user=App\User::find($users->user_id)
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
    <td style="width: 20%;">&nbsp;</td>
    @endif
            @endif
        </tr>
        @endif


        @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
        <tr>
    
    <td style="width: 10%;">
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
    <td style="width: 20%;">
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
    <td style="width: 20%;">&nbsp;</td>
    @endif
    @endif

   
    @if($teams2)
    @if($teams2->count()>0)
    <td style="width: 20%;">
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
    <td style="width: 20%;">&nbsp;</td>
    @endif
    @endif
    @if($teams3)
    @if($teams3->count()>0)
    <td style="width: 20%;">
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
    <td style="width: 20%;">&nbsp;</td>
    @endif
    @endif
   


</tr>
    

        @endif






        @endif
        @endforeach

     
                @elseif(Auth::user()->hasRole(5))
                @foreach($genders as $gender)
                @if($gender->starter_id==Auth::user()->id )
                @if($gender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
                <tr>
                  
                    <td style="width: 10%;">
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
                    <td style="width: 10%;">
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
                    $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
                    $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
                    $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                                 ?>
            
                    @if($users1)
            @if($users1->count()>0)
                    <td style="width: 20%;">
                        @foreach($users1 as $users)
            
                      <?php 
                      $user=App\User::find($users->user_id)
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
            <td style="width: 20%;">&nbsp;</td>
            @endif
                    @endif
            
                    @if($users2)
            @if($users2->count()>0)
            
                    <td style="width: 20%;">
                        @foreach($users2 as $users)
                        <?php 
                      $user=App\User::find($users->user_id)
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
                    <td style="width: 20%;">&nbsp;</td>
                    @endif
                    @endif
            
            
                    @if($users3)
                    @if($users3->count()>0)
                    <td style="width: 20%;">
            @foreach($users3 as $users)
            <?php 
            $user=App\User::find($users->user_id)
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
            <td style="width: 20%;">&nbsp;</td>
            @endif
                    @endif
                </tr>
                @endif


                @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
                <tr>

                    <td style="width: 10%;">
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
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
    
               
                @if($teams1)
                @if($teams1->count()>0)
                <td style="width: 20%;">
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                    {{$user->name}}              
                        @endforeach
                        </td>

                        @else
                        <td style="width: 20%;">&nbsp;</td>
                        @endif
                @endif
                @if($teams2)
                @if($teams2->count()>0)
                <td style="width: 20%;">
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                    {{$user->name}}              
                        @endforeach
                        </td>

                        @else
                        <td style="width: 20%;">&nbsp;</td>
                        @endif
                @endif
                @if($teams3)
                @if($teams3->count()>0)
                <td style="width: 20%;">
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                    {{$user->name}}              
                        @endforeach
                        </td>

                        @else
                        <td style="width: 20%;">&nbsp;</td>
                        @endif
                @endif
               
                </tr>
            

                @endif






                @endif
                @endforeach

                <!--event org-->
                @else
                @foreach($genders as $gender)
                @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)
                @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)

                <tr>
                  
                    <td style="width: 10%;">
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
                @elseif($gender->status==4)
                <td style="width: 10%;"> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td style="width: 10%;"> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td style="width: 10%;"> <span class="label label-success">Finished</span>
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
                    <td style="width: 10%;">
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
                    $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
                    $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
                    $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                                 ?>
            
                    @if($users1)
            @if($users1->count()>0)
                    <td style="width: 20%;">
                        @foreach($users1 as $users)
            
                      <?php 
                      $user=App\User::find($users->user_id)
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
            <td style="width: 20%;">&nbsp;</td>
            @endif
                    @endif
            
                    @if($users2)
            @if($users2->count()>0)
            
                    <td style="width:20%">
                        @foreach($users2 as $users)
                        <?php 
                      $user=App\User::find($users->user_id)
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
                    <td style="width:20%">&nbsp;</td>
                    @endif
                    @endif
            
            
                    @if($users3)
                    @if($users3->count()>0)
                    <td style="width: 20%;">
            @foreach($users3 as $users)
            <?php 
            $user=App\User::find($users->user_id)
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
            <td style="width:20%">&nbsp;</td>
            @endif
                    @endif
                </tr>
                @endif

                @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
                <tr>

                    <td style="width: 10%;">
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
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_third_place)->get();
            
                $org = $gender->ageGroupEvent->Event->organization;
                ?>
    
    
               
                @if($teams1)
                @if($teams1->count()>0)
                <td style="width: 20%;">
                @foreach($teams1 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                    {{$user->name}}              
                        @endforeach
                        </td>

                        @else
                        <td style="width: 20%;">&nbsp;</td>
                        @endif
                @endif
                @if($teams2)
                @if($teams2->count()>0)
                <td style="width: 20%;">
                @foreach($teams2 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                    {{$user->name}}              
                        @endforeach
                        </td>

                        @else
                        <td style="width: 20%;">&nbsp;</td>
                        @endif
                @endif
                @if($teams3)
                @if($teams3->count()>0)
                <td style="width: 20%;">
                @foreach($teams3 as $team)
                <?php
                $user = DB::table('teams')->where('id', $team->team_id)->first();
    
                ?>
    
                    {{$user->name}}              
                        @endforeach
                        </td>

                        @else
                        <td style="width: 20%;">&nbsp;</td>
                        @endif
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
        @if(Auth::user()->hasRole(7)||Auth::user()->hasRole(3))
    @if($general){!! html_entity_decode($general->footer) !!}@endif
    @else
    @if($setting){!! html_entity_decode($setting->footer) !!}@endif
    @endif


        </div>
    </section>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 370;
            $y = 560;
            $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
            $font = null;
            $size = 12;
            $color = array(0,0,0);
            $word_space = 0.0;  //  default
            $char_space = 0.0;  //  default
            $angle = 0.0;   //  default
            $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
        }
    </script>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
