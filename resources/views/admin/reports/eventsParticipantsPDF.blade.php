<style type="text/css">
    table {
        width: 100%;
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
    text-align: left;
    border: 1px solid #ddd;width: 30%;
    padding:5px;
}
</style>
<!-- header -->
<div class="row" id="ep-print">

   @if (Auth::user()->hasRole(6) || Auth::user()->hasRole(5) || Auth::user()->hasRole(4)||Auth::user()->hasRole(2))

   <div class="container">

    @include('reports.header')

    </div>
    @endif
    @if(Auth::user()->hasRole(7)||Auth::user()->hasRole(8))
   @include('reports.adminHeader')
    <br>
    @endif
    @if($eventTitle!=null||$AgeTitle!=null||$GenTitle!=null)
<div style="text-align:center;"> <strong>@if($eventTitle) <span style="font-size:30px;">{{$eventTitle->name}}</span> @endif
               @if($AgeTitle) <span style="font-size:30px;">({{$AgeTitle->name}})@endif
               @if($GenTitle)
              @if($GenTitle->name=="Male") <span style="color:green;font-size:20px;">{{$GenTitle->name}}  </span>
              @else
              <span style="color:red;font-size:20px;">{{$GenTitle->name}}                </span>

                @endif
               
                @endif</strong>
                </div>
@endif
<!--  -->
<table class="table table-striped text-uppercase  table-bordered evePart" id="table10">

    <thead class="thead">
        <tr>
            <th>Name</th>
            <th>User Id/Club</th>
            <th>time</th>
            <th>First</th>
            <th> Second</th>
            <th> Third</th>

        </tr>
    </thead>
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
                                    <td >{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                    <td>{{ $user->userId }}</td>
                                    <td>{{ $agegroupgenderuser->time }}</td>
                                    <td>{{ $agegroupgenderuser->one }}</td>
                                    <td>{{ $agegroupgenderuser->two }}</td>
                                    <td>{{ $agegroupgenderuser->third }}</td>

                                </tr>
                            @endif

                            @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
                                <tr>
                                    <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                    <td>{{ $user->userId }}</td>
                                    <td>{{ $agegroupgenderuser->time }}</td>
                                    <td>{{ $agegroupgenderuser->one }}m</td>
                                    <td>{{ $agegroupgenderuser->two }}m</td>
                                    <td>{{ $agegroupgenderuser->third }}m</td>

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
                                        $club=App\Models\Club::find($team->club_id);
                                    
                                    ?>
                                    <tr>
                                        <td>{{ $team->name }}</td>
                                        <td>{{ $club->club_name }}</td>
                                        <td>{{ $time->time }}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                @endforeach
                            @endif
                    @endif
                @endforeach
            @endif
          
            @if (Auth::user()->hasRole(7))
                @foreach ($agegroupgenders as $agegroupgender)


                    <?php
                    $agegroupgenderusers = DB::table('age_group_gender_user')
                        ->where('age_group_gender_id', $agegroupgender->id)
                        ->get();
                    
                    ?>


                    @foreach ($agegroupgenderusers as $agegroupgenderuser)
                        @if ($agegroupgenderuser->user_id == Auth::user()->id)
                            <?php
                            $user = DB::table('users')
                                ->where('id', $agegroupgenderuser->user_id)
                                ->first();
                            
                            ?>

                            @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
                                <tr>
                                    <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                    <td>{{ $user->userId }}</td>
                                    <td>{{ $agegroupgenderuser->time }}</td>
                                    <td>{{ $agegroupgenderuser->one }}</td>
                                    <td>{{ $agegroupgenderuser->two }}</td>
                                    <td>{{ $agegroupgenderuser->third }}</td>

                                </tr>
                            @endif

                            @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
                                <tr>
                                    <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                    <td>{{ $user->userId }}</td>
                                    <td>{{ $agegroupgenderuser->time }}</td>
                                    <td>{{ $agegroupgenderuser->one }}m</td>
                                    <td>{{ $agegroupgenderuser->two }}m</td>
                                    <td>{{ $agegroupgenderuser->third }}m</td>

                                </tr>
                            @endif
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
                                        <td colspan="3">{{ $team->name }}</td>
                                        <td colspan="1">{{ $team->club->club_name }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->time }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->one }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->two }}</td>
                                        <td colspan="2">{{ $agegroupgenderuser->third }}</td>

                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    @endforeach
                @endforeach
                @elseif(Auth::user()->hasRole(2)|| Auth::user()->hasRole(8))
                @foreach ($agegroupgenders as $agegroupgender)
                @if($agegroupgender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $agegroupgender->ageGroupEvent->Event->organization_id==$id)

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
                                <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                <td>{{ $user->userId }}</td>
                                <td>{{ $agegroupgenderuser->time }}</td>
                                <td>{{ $agegroupgenderuser->one }}</td>
                                <td>{{ $agegroupgenderuser->two }}</td>
                                <td>{{ $agegroupgenderuser->third }}</td>

                            </tr>
                        @endif

                        @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
                            <tr>
                                <td>{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                <td>{{ $user->userId }}</td>
                                <td>{{ $agegroupgenderuser->time }}</td>
                                <td>{{ $agegroupgenderuser->one }}m</td>
                                <td>{{ $agegroupgenderuser->two }}m</td>
                                <td>{{ $agegroupgenderuser->third }}m</td>

                            </tr>
                        @endif
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
                                    <td colspan="4">{{ $team->name }}</td>
                                    <td colspan="1">{{ $team->club->club_name }}</td>
                                    <td colspan="2">{{ $agegroupgenderuser->time }}</td>
                                    <td colspan="2">{{ $agegroupgenderuser->one }}</td>
                                    <td colspan="2">{{ $agegroupgenderuser->two }}</td>
                                    <td colspan="2">{{ $agegroupgenderuser->third }}</td>

                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    @endif
                @endforeach
            @endif


        </tbody>

</table>
<br>
<br>
<br>

<h3 style="text-align: center;" >Winners</h3>

<table class="table table-striped table-bordered evePart">


    <thead  class="thead" >
        <tr>
            <td style="width: 168px;text-align:center;">Event Nmae</td>
            <td style="width: 168px;text-align:center;">First</td>
            <td style="width: 168px;text-align:center;">Second</td>
            <td style="width: 168px;text-align:center;">Third</td>
        </tr>

    </thead>
   @if(Auth::user()->hasRole(7))

@foreach($agegroupgenders as $agegroupgender)
<?php

$event =$agegroupgender->ageGroupEvent->Event;

?>
  @foreach ($event->registrations as $registration)
        @if($registration->user_id==Auth::user()->id)
       @foreach($registration->events as $eventReg)
     
        @if($eventReg->id ==  $agegroupgender->ageGroupEvent->Event->id)
        <?php
      
        $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
        $age = $league1 - $mine;
       
        $exp = preg_split("/-/", $agegroupgender->ageGroupEvent->ageGroup->name);
        
        if (isset($exp[1])) {

            if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
        ?>
              @if($agegroupgender->gender_id==$registration->gender)
              @if($eventReg->mainEvent->event_category_id == 1)


<tr>

            <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
                   ?>
                                   <td style="width:168px" >{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td style="width:168px" >
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
   <td style="width:168px" >
   
   @if($users2)
   
   
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
   
   @endif
   </td>
   
   <td style="width:168px" >
   
   
   @if($users3)
   
   
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
   @endif
   </td>
   
               </tr>
@endif
<!-- // -->
@if($eventReg->mainEvent->event_category_id==2)          
        <tr>
               
               <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->third_place)->get();
                   ?>
                   <td  style="width: 168px;">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td style="width:168px;">
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
   <td style="width:168px;">
   
   @if($users2)
   
   
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
   
   @endif
   </td>
   
   <td style="width:168px;">
   
   
   @if($users3)
   
   
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
   @endif
   </td>
   
               </tr>
                    @endif


<!-- / -->

<!--  -->
@endif


<?php 
        }
    }
    elseif ($exp[0] == $age) {
    ?>
  @if($agegroupgender->gender_id==$registration->gender)
        @if($eventReg->mainEvent->event_category_id == 1)


<tr>

            <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
                   ?>
                                   <td style="width:168px" >{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td style="width:168px" >
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
   <td style="width:168px" >
   
   @if($users2)
   
   
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
   
   @endif
   </td>
   
   <td style="width:168px" >
   
   
   @if($users3)
   
   
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
   @endif
   </td>
   
               </tr>
@endif
<!-- // -->
@if($eventReg->mainEvent->event_category_id==2)
<tr>
               
               <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->third_place)->get();
                   ?>
                   <td  style="width: 168px;">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>
                   <td style="width:168px;">
      @if($users1)
      <td style="width:168px;">

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
   <td style="width:168px;">
   
   @if($users2)
   
   
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
   
   @endif
   </td>
   
   <td style="width:168px;">
   
   
   @if($users3)
   
   
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
   @endif
   </td>
   
               </tr>
                    @endif


<!-- / -->

<!--  -->
@endif

<?php }
?>

                    @endif
                @endforeach
            @endif
        @endforeach
    @endforeach
    @endif

    @if(Auth::user()->hasRole(6)||Auth::user()->hasRole(5)||Auth::user()->hasRole(4))
        @foreach($agegroupgenders as $agegroupgender)     
            @if($agegroupgender->judge_id==Auth::user()->id||$agegroupgender->starter_id==Auth::user()->id
            ||$agegroupgender->ageGroupEvent->Event->user_id==Auth::user()->id)
            @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
<tr>
            <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
                   ?>
                                   <td style="width:168px" >{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td style="width:168px" >
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
   <td style="width:168px" >
   
   @if($users2)
   
   
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
   
   @endif
   </td>
   
   <td style="width:168px" >
   
   
   @if($users3)
   
   
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
   @endif
   </td>
   
               </tr>
        @endif
        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
        <tr>
               
               <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
                   ?>
                   <td  style="width: 168px;">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td style="width: 168px;">
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
   <td style="width: 168px;">
   
   @if($users2)
   
   
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
   
   @endif
   </td>
   
   <td style="width: 168px;">
   
   
   @if($users3)
   
   
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
   @endif
   </td>
   
               </tr>
        @endif
        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==3)
        <tr>

<?php
$users1=DB::table('age_group_gender_team')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=',null)->where('marks',$agegroupgender->group_first_place)->get();
$users2=DB::table('age_group_gender_team')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=',null)->where('marks',$agegroupgender->group_second_place)->get();
$users3=DB::table('age_group_gender_team')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=',null)->where('marks',$agegroupgender->group_third_place)->get();

?>
     <td style="width: 168px;">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}} &nbsp; [{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>
<td style="width: 168px;">


     @if($users1)

         @foreach($users1 as $use)
        <?php 
$team=App\Models\Team::find($use->team_id);
?>
        
         {{$team->name}}<br>[ {{$team->club->club_name}}]
         <br>
         @endforeach
@endif
             </td>
              <td style="width: 168px;">


     @if($users2)

         @foreach($users2 as $use)
        <?php 
$team=App\Models\Team::find($use->team_id);
?>
        
         {{$team->name}}<br>[ {{$team->club->club_name}}]
         <br>
         @endforeach
@endif
             </td>


<td style="width: 168px;">

     @if($users3)

         @foreach($users3 as $use)
        <?php 
$team=App\Models\Team::find($use->team_id);
?>
        
         {{$team->name}}<br>[ {{$team->club->club_name}}]
         <br>
         @endforeach
@endif
             </td>


 
            




</tr>
        @endif
        @endif
@endforeach

@else 
        @foreach ($agegroupgenders as $agegroupgender)
        @if($agegroupgender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $agegroupgender->ageGroupEvent->Event->organization_id==$id)

        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
        <tr>


<?php
$users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
$users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
$users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
       ?>
                       <td style="width:168px" >{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

@if($users1)

<td style="width:168px" >
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
<td style="width:168px" >

@if($users2)


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

@endif
</td>

<td style="width:168px" >


@if($users3)


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
@endif
</td>

   </tr>
@endif
            @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 2)
               <tr>       
               <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->third_place)->get();
                   ?>
<td  style="width: 168px;">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td style="width: 168px;">
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
   <td style="width: 168px;">
   
   @if($users2)
   
   
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
   
   @endif
   </td>
   
   <td style="width: 168px;">
   
   
   @if($users3)
   
   
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
   @endif
   </td>
   
               </tr>
        @endif

            @if ($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id == 3)
                <tbody>

                <tr>

<?php
$users1=DB::table('age_group_gender_team')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=',null)->where('marks',$agegroupgender->group_first_place)->get();
$users2=DB::table('age_group_gender_team')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=',null)->where('marks',$agegroupgender->group_second_place)->get();
$users3=DB::table('age_group_gender_team')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=',null)->where('marks',$agegroupgender->group_third_place)->get();

?>
     <td style="width: 168px;">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}} &nbsp; [{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>
<td style="width: 168px;">


     @if($users1)

         @foreach($users1 as $use)
        <?php 
$team=App\Models\Team::find($use->team_id);
?>
        
         {{$team->name}}<br>[ {{$team->club->club_name}}]
         <br>
         @endforeach
@endif
             </td>
              <td style="width: 168px;">


     @if($users2)

         @foreach($users2 as $use)
        <?php 
$team=App\Models\Team::find($use->team_id);
?>
        
         {{$team->name}}<br>[ {{$team->club->club_name}}]
         <br>
         @endforeach
@endif
             </td>


<td style="width: 168px;">

     @if($users3)

         @foreach($users3 as $use)
        <?php 
$team=App\Models\Team::find($use->team_id);
?>
        
         {{$team->name}}<br>[ {{$team->club->club_name}}]
         <br>
         @endforeach
@endif
             </td>


 
            




</tr>
                    </tbody>

            @endif
            @endif
        @endforeach

    @endif
    @endif

</table>
@if(Auth::user()->hasRole(6)||Auth::user()->hasRole(5)||Auth::user()->hasRole(4))
    
    <section class="content-footer">
    <div class="col-md-1">
        @if($setting){!! html_entity_decode($setting->footer) !!}@endif


    </div>
</section>
@endif
@if(Auth::user()->hasRole(7)||Auth::user()->hasRole(8))
    
    <section class="content-footer">
    <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


    </div>
</section>    
@endif

</div>
<script type="text/php">
    if (isset($pdf)) {
        $x = 250;
        $y = 820;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>