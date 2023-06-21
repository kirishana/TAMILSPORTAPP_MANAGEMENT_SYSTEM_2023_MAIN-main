<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: left;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .thead-dark{
        border: 1px  white;
background-color: black;
    }
  
</style>
<div class="row" id="ep-print">
@if (Auth::user()->hasRole(6) || Auth::user()->hasRole(5) || Auth::user()->hasRole(4)||Auth::user()->hasRole(2))

<div class="container">
@include('reports.PrintHeader')
    </div>
    @elseif(Auth::user()->hasRole(7)||Auth::user()->hasRole(8))
    <div class="container">
@include('reports.AdminHeader')
    </div>
    @endif
    <br>
    <br>
    <table class="table table-striped table-bordered  evePart" id="export-ep">
    <thead class="thead-Dark">
            <tr>
                <th colspan="3">Name</th>
                <th colspan="1">User Id</th>
                <th colspan="2">Time</th>
                <th colspan="2">First</th>
                <th colspan="2"> Second</th>
                <th colspan="2"> Third</th>

            </tr>
        </thead>
        @if( $agegroupgenders != null)

            <tbody>
            @if(Auth::user()->hasRole(6)||Auth::user()->hasRole(5)||Auth::user()->hasRole(4))
                @foreach($agegroupgenders as $agegroupgender)
                @if($agegroupgender->judge_id==Auth::user()->id||$agegroupgender->starter_id==Auth::user()->id
            ||$agegroupgender->ageGroupEvent->Event->user_id==Auth::user()->id)

                    <?php
                $agegroupgenderusers=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->get();

                ?>


                    @foreach( $agegroupgenderusers as $agegroupgenderuser)
                        <?php
                        $user = DB::table('users')->where('id', $agegroupgenderuser->user_id)->first();

                        ?>
                        
                        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
                            <tr>
                                <td colspan="3">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                <td colspan="1">[{{ $user->userId }}]</td>
                                <td colspan="2">{{ $agegroupgenderuser->time }}s</td>
                                <td colspan="2">{{ $agegroupgenderuser->one }}</td>
                                <td colspan="2">{{ $agegroupgenderuser->two }}</td>
                                <td colspan="2">{{ $agegroupgenderuser->third }}</td>

                            </tr>
                        @endif
                        
                        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
                            <tr>
                                <td colspan="3">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                                <td colspan="1">[{{ $user->userId }}]</td>
                                <td colspan="2">{{ $agegroupgenderuser->time }}</td>
                                <td colspan="2">{{ $agegroupgenderuser->one }}m</td>
                                <td colspan="2">{{ $agegroupgenderuser->two }}m</td>
                                <td colspan="2">{{ $agegroupgenderuser->third }}m</td>

                            </tr>

                        @endif
                        @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==3)
                <?php
                    $times = DB::table('age_group_gender_team')->where('age_group_gender_id', $agegroupgender->id)->get();
                ?>
                @foreach($times as $time)
                <?php
                $team = DB::table('teams')->where('id', $time->team_id)->first();
                
                ?>
                    <tr>
                        <td colspan="3">{{ $team->name }}</td>
                        <td colspan="1">[{{ $team->club_id }}]</td>
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

                @if(Auth::user()->hasRole(7))
        @foreach($agegroupgenders as $agegroupgender)
       

            <?php
        $agegroupgenderusers=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->get();

        ?>


            @foreach( $agegroupgenderusers as $agegroupgenderuser)
            @if($agegroupgenderuser->user_id==Auth::user()->id)
                <?php
                $user = DB::table('users')->where('id', $agegroupgenderuser->user_id)->first();

                ?>
            
                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
                    <tr>
                        <td colspan="3">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                        <td colspan="1">[{{ $user->userId }}]</td>
                        <td colspan="2">{{ $agegroupgenderuser->time }}</td>
                        <td colspan="2">{{ $agegroupgenderuser->one }}</td>
                        <td colspan="2">{{ $agegroupgenderuser->two }}</td>
                        <td colspan="2">{{ $agegroupgenderuser->third }}</td>

                    </tr>
                @endif
            
                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
                    <tr>
                        <td colspan="3">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
                        <td colspan="1">[{{ $user->userId }}]</td>
                        <td colspan="2">{{ $agegroupgenderuser->time }}</td>
                        <td colspan="2">{{ $agegroupgenderuser->one }}m</td>
                        <td colspan="2">{{ $agegroupgenderuser->two }}m</td>
                        <td colspan="2">{{ $agegroupgenderuser->third }}m</td>

                    </tr>
                @endif
                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==3)
                <?php
                    $times = DB::table('age_group_gender_team')->where('age_group_gender_id', $agegroupgender->id)->get();
                ?>
                @foreach($times as $time)
                <?php
                $team = DB::table('teams')->where('id', $time->team_id)->first();
                
                ?>
                    <tr>
                        <td colspan="3">{{ $team->name }}</td>
                        <td colspan="1">[{{ $team->club_id }}]</td>
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
        @foreach($agegroupgenders as $agegroupgender)

<?php
$agegroupgenderusers=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->get();

?>


@foreach( $agegroupgenderusers as $agegroupgenderuser)
    <?php
    $user = DB::table('users')->where('id', $agegroupgenderuser->user_id)->first();

    ?>
    
    @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)
        <tr>
            <td colspan="3">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
            <td colspan="1">[{{ $user->userId }}]</td>
            <td colspan="2">{{ $agegroupgenderuser->time }}s</td>
            <td colspan="2">{{ $agegroupgenderuser->one }}</td>
            <td colspan="2">{{ $agegroupgenderuser->two }}</td>
            <td colspan="2">{{ $agegroupgenderuser->third }}</td>

        </tr>
    @endif
    
    @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==2)
        <tr>
            <td colspan="3">{{ $user->first_name }} &nbsp; {{ $user->last_name }}</td>
            <td colspan="1">[{{ $user->userId }}]</td>
            <td colspan="2">{{ $agegroupgenderuser->time }}</td>
            <td colspan="2">{{ $agegroupgenderuser->one }}m</td>
            <td colspan="2">{{ $agegroupgenderuser->two }}m</td>
            <td colspan="2">{{ $agegroupgenderuser->third }}m</td>

        </tr>
    @endif
    @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==3)
<?php
$times = DB::table('age_group_gender_team')->where('age_group_gender_id', $agegroupgender->id)->get();
?>
@foreach($times as $time)
<?php
$team = DB::table('teams')->where('id', $time->team_id)->first();

?>
<tr>
    <td colspan="3">{{ $team->name }}</td>
    <td colspan="1">[{{ $team->club_id }}]</td>
    <td colspan="2">{{ $agegroupgenderuser->time }}</td>
    <td colspan="2">{{ $agegroupgenderuser->one }}</td>
    <td colspan="2">{{ $agegroupgenderuser->two }}</td>
    <td colspan="2">{{ $agegroupgenderuser->third }}</td>

</tr>
@endforeach
@endif
@endforeach
@endforeach
@endif
      
    </tbody> 
            </tbody>

</table>
<table id="export-ep">

            <thead class="font-weight-bold">
                <tr>
                    <td colspan="12" class="text-center">champions</td>
                </tr>
                <tr>
                <tr>
                    <td colspan="3">First</td>
                    <td colspan="3">First</td>
                    <td colspan="3">Second</td>
                    <td colspan="3">Third</td>
                </tr>
                </tr>

            </thead>

            <tbody>
            @if(Auth::user()->hasRole(6)||Auth::user()->hasRole(5)||Auth::user()->hasRole(4))
                @foreach($agegroupgenders as $agegroupgender)
                @if($agegroupgender->judge_id==Auth::user()->id||$agegroupgender->starter_id==Auth::user()->id
            ||$agegroupgender->ageGroupEvent->Event->user_id==Auth::user()->id)

            @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)

<?php
$users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
$users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
$users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
       ?>
                       <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

@if($users1)

<td colspan="3">
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
<td colspan="3">

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

<td colspan="3">


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
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->third_place)->get();
                   ?>
                   <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td colspan="3">
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
   <td colspan="3">
   
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
   
   <td colspan="3">
   
   
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
                    <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}} &nbsp; [{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>
 <td colspan="3">


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
                             <td colspan="3">


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

        
         <td colspan="3">

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
        @endif

        @if(Auth::user()->hasRole(8))
                @foreach($agegroupgenders as $agegroupgender)

                @if($agegroupgender->ageGroupEvent->Event->mainEvent->event_category_id==1)

<?php
$users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
$users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
$users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
       ?>
                       <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

@if($users1)

<td colspan="3">
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
<td colspan="3">

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
<br>
@endforeach

@endif
</td>

<td colspan="3">


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
    $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_first_place)->get();
$users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_second_place)->get();
$users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_third_place)->get();
                   ?>
                   <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td colspan="3">
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
   <td colspan="3">
   
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
   
   <td colspan="3">
   
   
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
     <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}} &nbsp; [{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>
<td colspan="3">


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
              <td colspan="3">


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


<td colspan="3">

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
        @endforeach
        @endif
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


            <?php
      $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
      $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
      $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
                   ?>
                                   <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td colspan="3">
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
   <td colspan="3">
   
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
   
   <td colspan="3">
   
   
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
    $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_first_place)->get();
$users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_second_place)->get();
$users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_third_place)->get();
                   ?>
                   <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td colspan="3">
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
   <td colspan="3">
   
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
   
   <td colspan="3">
   
   
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


<?php
$users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->first_place)->get();
$users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->second_place)->get();
$users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('time','!=','')->where('marks',$agegroupgender->third_place)->get();
       ?>
                       <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

@if($users1)

<td colspan="3">
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
<td colspan="3">

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

<td colspan="3">


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
    $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_first_place)->get();
$users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_second_place)->get();
$users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$agegroupgender->id)->where('marks',$agegroupgender->field_third_place)->get();
                   ?>
                   <td colspan="3">{{$agegroupgender->ageGroupEvent->Event->mainEvent->name}}&nbsp;[{{$agegroupgender->ageGroupEvent->ageGroup->name}}]</td>

      @if($users1)
   
   <td colspan="3">
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
   <td colspan="3">
   
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
   
   <td colspan="3">
   
   
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

<!--  -->
@endif
@endforeach
@endif

@endforeach
@endforeach
@endif
        </tbody>

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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>