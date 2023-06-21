<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        margin-right: 5px;
       
    }
    table td,
    table th {
        padding-top: 5px;
        padding-bottom: 5px;
        border: 1px solid #ddd;

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

.page-break {
page-break-after: always;
}


</style>
<div class="row" id="usr">
<div class="container">
 @include('reports.header')

    </div>

      @if($league!=null)
  <h2 style="text-align:center;"><strong>{{$league->name}}</strong></h2>

    <h2>Single Events</h2>

    <table class="table table-striped table-bordered" style="width: 100%;" id="showall">
    <thead class="thead">
                        <tr>
                            <th style="text-align: center;">Age Group</th>
                            <th style="text-align: center;">Gender </th>
                            @if($league->champions==1)
                            <th style="text-align: center;">Points</th>
                            @endif
                            <th style="text-align: center;">champions</th>

                        </tr>
                    </thead>
                    <tbody>
                               @foreach ($AgeGroups as $ageGroup )
  
                               <?php 
                               $age=App\Models\AgeGroupEvent::where('age_group_id',$ageGroup->id)->get();
                    $count=0;
                    foreach($age as $ag){
                        if($ag->Event->league_id==$league->id){
                            if($ag->Event->mainEvent->event_category_id!=3){
                            $count=$count+1;
                        }
                    }
                    }
                    $league3=array();
                    $league1=App\Models\League::wherehas('events',function($q) use($ageGroup) {
                     $q->wherehas('ageGroups',function($q) use($ageGroup){
                         $q->where('age_group_id',$ageGroup->id);
                     });
                    })->get();
                    foreach ($league1 as $key => $league2) {
                     $league3[]=$league2->id;
                    }
                   ?>
                                                
                        
<?php 
$users=array();
?>
                               @if($count>0)
                               @if(in_array($league->id,$league3))
                               @if($league->champions==1)
                               <?php
                                       
                                       $players= DB::table('age_group_gender_user')->where('league_id',$league->id)->where('marks','!=',null)
                                         ->join('age_group_genders','age_group_gender_user.age_group_gender_id','=','age_group_genders.id')  
                                                 ->select('age_group_genders.*', 'age_group_gender_user.*')                                     
                                          ->having(DB::raw('count(age_group_gender_user.user_id)'),'=',DB::raw('total_events'))                                  
                                         ->groupBy('age_group_gender_user.user_id')->get();
$champs=array();
                                         foreach($players as $player){
                                            $user=App\User::find($player->user_id);
                                            $reg=$user->registrations()->where('league_id',$player->league_id)->first();
                                           $events=$reg->events;
                                           $field=0;
                                            $track=0;
                                           foreach($events as $event){
                                            
                                            if($event->mainEvent->event_category_id==1){
                                                $track++;
                                            }
                                            elseif($event->mainEvent->event_category_id==2){
                                                $field++;
                                            }
                                           }
                                           if($field>0 && $track>0){
$champs[]=$player;
                                           }
                                         }
                                         ?>
                               <tr>
                                   <td style="width:25%">{{$ageGroup->name}}</td>
                                   <td style="width:25%">male</td>
                                <td style="width:25%" id="">
                               
                                <?php
                                         $marks = array();
                                         $userlists = array();
                                         $users1 = array();
                                         ?>
                                         <?php 
                                         if(count($champs) != 0){
                                             ?>
                                              @foreach($ageGroup->events as $event)
                                         @if($event->league_id==$league->id)
                                         @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                         @if ($ageGroupGender->gender_id==1)
                                         @foreach($champs as $champ)
                                        
                                         @if ($ageGroupGender->id==$champ->age_group_gender_id)
  
                                         
                                         <?php
                                         $marks[] = DB::table('age_group_gender_user')->where('league_id',$league->id)->where('user_id', $champ->user_id)->get()->SUM('marks');
                                        
                                         ?>
                                         @endif
                                         @endforeach
                                           @endif
  
                                         @endforeach
  
                                         @endif
                                         @endforeach
  
  
  
                                         <?php
                                         if (count($marks) > 0) {
                                              echo (max($marks));
                                         }
                                         ?>
<?php 
                                       }
                                       ?>
                                   </td>
                              
                                   
                                   <td style="width:25%">
                                   <?php
                                         $marks = array();
                                         $userlists = array();
                                         $users1 = array();
                                         ?>
                                         <?php 
                                         if(count($champs) != 0){
                                             ?>
                                              @foreach($ageGroup->events as $event)
                                         @if($event->league_id==$league->id)
                                         @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                         @if ($ageGroupGender->gender_id==1)
                                         @foreach($champs as $champ)
                                         @if ($ageGroupGender->id==$champ->age_group_gender_id)
  
                                         
                                         <?php
                                         $marks[] = DB::table('age_group_gender_user')->where('league_id',$league->id)->where('user_id', $champ->user_id)->get()->SUM('marks');
                                        
                                         ?>
                                         @endif
                                         @endforeach
                                           @endif
  
                                         @endforeach
  
                                         @endif
                                         @endforeach
  
  
  
                                         <?php
                                         if (count($marks) > 0) {
                                              max($marks);
                                         }
                                         ?>
  
                                        
                                      @foreach($ageGroup->events as $event)
                                         @if($event->league_id==$league->id)
                                         @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                         @if ($ageGroupGender->gender_id==1)
                                         @foreach ($champs as $champ) 
                                         @if ($ageGroupGender->id==$champ->age_group_gender_id)
  
                                              <?php
                                                 $userlists[] = DB::table('age_group_gender_user')
                                                 ->where('league_id',$league->id)
                                                     ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                     ->where('user_id', $champ->user_id)
                                                     ->groupBy(DB::raw('user_id'))
                                                     ->having('total','=',max($marks))
                                                     ->get();
                                             ?>
                                         @endif
  
                                         @endforeach
                                         @endif
                                         @endforeach
                                         @endif
                                         @endforeach
                                         <?php
                                         $userUniqueists = array_unique($userlists);
                                         foreach ($userUniqueists as $users) {
  
                                             foreach ($users as $user) {
  
                                                 $winner = App\User::find($user->user_id);
                                                 echo $winner->first_name  .'   '.'['. $winner->userId.']';
                                                 echo "<br>";
                                                 echo $winner->club?'<div style="color:black;font-weight:bold;">CLUB: 
                                                 <span style="color:black;font-weight:bold;">'.$winner->club->club_name.'</span></div>':'';
  
                                                 echo "<br>";
                                             }
                                         }
  
                                         ?>
  <?php
                                         
                                         }
                                         ?>
                                   </td>

                               </tr>
<?php 
$users=array();
?>
                                       <tr>
                                   <td style="width:25%">{{$ageGroup->name}}</td>
                                   <td style="width:25%">female</td>
                                   <td style="width:25%" id="">
                               
                               <?php
                                        $marks = array();
                                        $userlists = array();
                                        $users1 = array();
                                        ?>
                                        <?php 
                                        if(count($champs) != 0){
                                            ?>
                                             @foreach($ageGroup->events as $event)
                                        @if($event->league_id==$league->id)
                                        @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                        @if ($ageGroupGender->gender_id==2)
                                        @foreach($champs as $champ)
                                       
                                        @if ($ageGroupGender->id==$champ->age_group_gender_id)
 
                                        
                                        <?php
                                        $marks[] = DB::table('age_group_gender_user')->where('league_id',$league->id)->where('user_id', $champ->user_id)->get()->SUM('marks');
                                       
                                        ?>
                                        @endif
                                        @endforeach
                                          @endif
 
                                        @endforeach
 
                                        @endif
                                        @endforeach
 
 
 
                                        <?php
                                        if (count($marks) > 0) {
                                             echo (max($marks));
                                        }
                                        ?>
<?php 
                                      }
                                      ?>
                                  </td>
                             
                                  
                                  <td style="width:25%">
                                  <?php
                                        $marks = array();
                                        $userlists = array();
                                        $users1 = array();
                                        ?>
                                        <?php 
                                        if(count($champs) != 0){
                                            ?>
                                             @foreach($ageGroup->events as $event)
                                        @if($event->league_id==$league->id)
                                        @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                        @if ($ageGroupGender->gender_id==2)
                                        @foreach($champs as $champ)
                                        @if ($ageGroupGender->id==$champ->age_group_gender_id)
 
                                        
                                        <?php
                                        $marks[] = DB::table('age_group_gender_user')->where('league_id',$league->id)->where('user_id', $champ->user_id)->get()->SUM('marks');
                                       
                                        ?>
                                        @endif
                                        @endforeach
                                          @endif
 
                                        @endforeach
 
                                        @endif
                                        @endforeach
 
 
 
                                        <?php
                                        if (count($marks) > 0) {
                                             max($marks);
                                        }
                                        ?>
 
                                       
                                     @foreach($ageGroup->events as $event)
                                        @if($event->league_id==$league->id)
                                        @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                        @if ($ageGroupGender->gender_id==2)
                                        @foreach ($champs as $champ) 
                                        @if ($ageGroupGender->id==$champ->age_group_gender_id)
 
                                             <?php
                                                $userlists[] = DB::table('age_group_gender_user')
                                                ->where('league_id',$league->id)
                                                    ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                    ->where('user_id', $champ->user_id)
                                                    ->groupBy(DB::raw('user_id'))
                                                    ->having('total','=',max($marks))
                                                    ->get();
                                            ?>
                                        @endif
 
                                        @endforeach
                                        @endif
                                        @endforeach
                                        @endif
                                        @endforeach
                                        <?php
                                        $userUniqueists = array_unique($userlists);
                                        foreach ($userUniqueists as $users) {
 
                                            foreach ($users as $user) {
 
                                                $winner = App\User::find($user->user_id);
                                                echo $winner->first_name  .'   '.'['. $winner->userId.']';
                                                echo "<br>";
                                                echo $winner->club?'<div style="color:black;font-weight:bold;">CLUB: 
                                                <span style="color:black;font-weight:bold;">'.$winner->club->club_name.'</span></div>':'';
 
                                                echo "<br>";
                                            }
                                        }
 
                                        ?>
 <?php
                                        
                                        }
                                        ?>
                                  </td>

                               </tr>
                              
                               @endif  
                               @if($league->champions==0)
                               <?php
                                       
                                       $players= DB::table('age_group_gender_user')->where('league_id',$league->id)->where('marks','!=',null)
                                         ->join('age_group_genders','age_group_gender_user.age_group_gender_id','=','age_group_genders.id')  
                                                 ->select('age_group_genders.*', 'age_group_gender_user.*')                                     
                                          ->having(DB::raw('count(age_group_gender_user.user_id)'),'=',DB::raw('total_events'))                                  
                                         ->groupBy('age_group_gender_user.user_id')->get();
$champs=array();
                                         foreach($players as $player){
                                            $user=App\User::find($player->user_id);
                                            $reg=$user->registrations()->where('league_id',$player->league_id)->first();
                                           $events=$reg->events;
                                           $field=0;
                                            $track=0;
                                           foreach($events as $event){
                                            
                                            if($event->mainEvent->event_category_id==1){
                                                $track++;
                                            }
                                            elseif($event->mainEvent->event_category_id==2){
                                                $field++;
                                            }
                                           }
                                           if($field>0 && $track>0){
$champs[]=$player;
                                           }
                                         }
                                         ?>
                               <tr>
                                   <td style="width:25%">{{$ageGroup->name}}</td>
                                   <td style="width:25%">male</td>
                                   <td style="width:25%">
                                   <?php
                                         $marks = array();
                                         $userlists = array();
                                         $users1 = array();
                                         ?>
                                         <?php 
                                         if(count($champs) != 0){
                                             ?>
                                              @foreach($ageGroup->events as $event)
                                         @if($event->league_id==$league->id)
                                         @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                         @if ($ageGroupGender->gender_id==1)
                                         @foreach($champs as $champ)
                                         @if ($ageGroupGender->id==$champ->age_group_gender_id)
  
                                         
                                         <?php
                                         $marks[] = DB::table('age_group_gender_user')->where('league_id',$league->id)->where('user_id', $champ->user_id)->get()->SUM('marks');
                                        
                                         ?>
                                         @endif
                                         @endforeach
                                           @endif
  
                                         @endforeach
  
                                         @endif
                                         @endforeach
  
  
  
                                         <?php
                                         if (count($marks) > 0) {
                                              max($marks);
                                         }
                                         ?>
  
                                        
                                      @foreach($ageGroup->events as $event)
                                         @if($event->league_id==$league->id)
                                         @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                         @if ($ageGroupGender->gender_id==1)
                                         @foreach ($champs as $champ) 
                                         @if ($ageGroupGender->id==$champ->age_group_gender_id)
  
                                              <?php
                                                 $userlists[] = DB::table('age_group_gender_user')
                                                 ->where('league_id',$league->id)
                                                     ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                     ->where('user_id', $champ->user_id)
                                                     ->groupBy(DB::raw('user_id'))
                                                     ->having('total','=',max($marks))
                                                     ->get();
                                             ?>
                                         @endif
  
                                         @endforeach
                                         @endif
                                         @endforeach
                                         @endif
                                         @endforeach
                                         <?php
                                         $userUniqueists = array_unique($userlists);
                                         foreach ($userUniqueists as $users) {
  
                                             foreach ($users as $user) {
  
                                                 $winner = App\User::find($user->user_id);
                                                 echo $winner->first_name  .'   '.'['. $winner->userId.']';
                                                 echo "<br>";
                                                 echo $winner->club?'<div style="color:black;font-weight:bold;">CLUB: 
                                                 <span style="color:black;font-weight:bold;">'.$winner->club->club_name.'</span></div>':'';
  
                                                 echo "<br>";
                                             }
                                         }
  
                                         ?>
  <?php
                                         
                                         }
                                         ?>
                                   </td>

                               </tr>
<?php 
$users=array();
?>
                                       <tr>
                                   <td style="width:25%">{{$ageGroup->name}}</td>
                                   <td style="width:25%">female</td>
                                  <td style="width:25%">
                                  <?php
                                        $marks = array();
                                        $userlists = array();
                                        $users1 = array();
                                        ?>
                                        <?php 
                                        if(count($champs) != 0){
                                            ?>
                                             @foreach($ageGroup->events as $event)
                                        @if($event->league_id==$league->id)
                                        @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                        @if ($ageGroupGender->gender_id==2)
                                        @foreach($champs as $champ)
                                        @if ($ageGroupGender->id==$champ->age_group_gender_id)
 
                                        
                                        <?php
                                        $marks[] = DB::table('age_group_gender_user')->where('league_id',$league->id)->where('user_id', $champ->user_id)->get()->SUM('marks');
                                       
                                        ?>
                                        @endif
                                        @endforeach
                                          @endif
 
                                        @endforeach
 
                                        @endif
                                        @endforeach
 
 
 
                                        <?php
                                        if (count($marks) > 0) {
                                             max($marks);
                                        }
                                        ?>
 
                                       
                                     @foreach($ageGroup->events as $event)
                                        @if($event->league_id==$league->id)
                                        @foreach($event->pivot->ageGroupGenders as $ageGroupGender)
                                        @if ($ageGroupGender->gender_id==2)
                                        @foreach ($champs as $champ) 
                                        @if ($ageGroupGender->id==$champ->age_group_gender_id)
 
                                             <?php
                                                $userlists[] = DB::table('age_group_gender_user')
                                                ->where('league_id',$league->id)
                                                    ->select(DB::raw('user_id'), DB::raw('sum(marks) as total'))
                                                    ->where('user_id', $champ->user_id)
                                                    ->groupBy(DB::raw('user_id'))
                                                    ->having('total','=',max($marks))
                                                    ->get();
                                            ?>
                                        @endif
 
                                        @endforeach
                                        @endif
                                        @endforeach
                                        @endif
                                        @endforeach
                                        <?php
                                        $userUniqueists = array_unique($userlists);
                                        foreach ($userUniqueists as $users) {
 
                                            foreach ($users as $user) {
 
                                                $winner = App\User::find($user->user_id);
                                                echo $winner->first_name  .'   '.'['. $winner->userId.']';
                                                echo "<br>";
                                                echo $winner->club?'<div style="color:black;font-weight:bold;">CLUB: 
                                                <span style="color:black;font-weight:bold;">'.$winner->club->club_name.'</span></div>':'';
 
                                                echo "<br>";
                                            }
                                        }
 
                                        ?>
 <?php
                                        
                                        }
                                        ?>
                                  </td>

                               </tr>
                              
                               @endif                  
                               @endif
                               @endif
                               @endforeach                                              
                           </tbody>
</table>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <h2>Club points</h2>
                <!-- <h2>
                                         Highest Points Club: <a href="#" id="champion" class="button button-success"></a>
                               </h2> -->
                               <table class="table table-striped table-bordered">
                <thead class="thead">
                                <tr>
                                    <th>Clubs</th>
                                    <th colspan="5">Points</th>

                                </tr>
                                <tr class="thead">
                                    <th></th>
                                    <th>Individual&nbsp; Events &nbsp; Points</th>
                                    <th>Group &nbsp; Events &nbsp; Points</th>
                                    <th>Marathon &nbsp; Points</th>
                                    <th>Club &nbsp; Participantion &nbsp; Points</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                            @if($league!=null)
                            <tbody id="clubs" style="text-transform:capitalize;">
                                <?php
                                $genders = array();
                                ?>
                                @foreach($events as $event)
                                @if($event->mainEvent->event_category_id==3)
                                @php
                                $ageGroupEvents=App\Models\AgeGroupEvent::where('event_id',$event->id)->get();
                                foreach($ageGroupEvents as $ageEvent){
                                $ageGroupgenders=App\Models\AgeGroupGender::where('age_group_event_id',$ageEvent->id)->get();
                                foreach($ageGroupgenders as $gender){
                                $genders[]=$gender;
                                }
                                }
                                @endphp
                                @endif
                                @endforeach
                                <?php
                                        
                                        $teams = DB::table('age_group_gender_team')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '!=', null)
                                            ->get();

                                        $clubs = [];
                                        $compareClubs = [];
                                        
                                        ?>
                                        @if ($teams->count() > 0)
                                            @foreach ($teams as $team)
                                                <?php
                                                $cls = App\Models\Team::find($team->team_id);
                                                $clubs[] = $cls;
                                                $compareClubs[] = $cls->club_id;
                                                $total = [];
                                                ?>
                                            @endforeach
                                        @else
                                            <?php
                                            $clubs[] = null;
                                            $compareClubs[] = null;
                                            ?>
                                        @endif
                                        <?php
                                        $result = collect($clubs)->groupBy('club_id');
                                        ?>
                                        
                                        <?php
                                        
                                        $participatedTeams = DB::table('age_group_gender_team')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '=', null)
                                            ->get();
                                            
                                        $participatedClubs = [];
                                        $compareParticipatedClubs = [];
                                        
                                        ?>
                                        @if ($participatedTeams->count() > 0)
                                            @foreach ($participatedTeams as $team)
                                                <?php
                                                $cls1 = App\Models\Team::find($team->team_id);
                                                $participatedClubs[] = $cls1;
                                                $compareParticipatedClubs[] = $cls1->club_id;
                                                $total = [];
                                                ?>
                                            @endforeach
                                        @else
                                            <?php
                                            $participatedClubs[] = null;
                                            $compareParticipatedClubs[] = null;
                                            ?>
                                        @endif
                                        <?php
                                        $participatedResult = collect($participatedClubs)->groupBy('club_id');
                                        ?>




                                        <?php
                                        $users = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '!=', null)
                                            ->get();
                                            $participatedUsers = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '=', null)
                                            ->get();
                                        $allUsers = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->get()
                                            ->unique('user_id');
                                        // dd($allUsers->count());
                                        $userClubs = [];
                                        $userCompareClubs = [];
                                        $userParticipatedClubs = [];
                                        $userParticipatedCompareClubs = [];
                                        ?>

                                        @foreach ($participatedUsers as $user)
                                            <?php
                                            $cls1 = App\User::find($user->user_id);
                                            $userParticipatedClubs[] = $cls1;
                                            $userParticipatedCompareClubs[] = $cls1->club_id;
                                            ?>
                                        @endforeach

                                        @foreach ($users as $user)
                                            <?php
                                            $cls1 = App\User::find($user->user_id);
                                            $userClubs[] = $cls1;
                                            $userCompareClubs[] = $cls1->club_id;
                                            $total = [];
                                            ?>
                                        @endforeach




                                        <?php
                                        $result1 = collect($userClubs)->groupBy('club_id');

                                        $intersects = array_intersect($compareClubs, $userCompareClubs);
                                        $merge=array_merge($compareClubs, $userCompareClubs);
                                        $intersects2 = array_intersect($compareParticipatedClubs, $userParticipatedCompareClubs);                                        
                                        $differ=array_diff($intersects2,$merge);
                                        $participatedUnique=array_unique($differ);
                                        $unique = array_unique($intersects);
                                        $marathonPoints = App\Models\MarathonPoint::where('league_id', $league->id)->get();
                                        
                                        ?>
                                        @php
                                            
                                            $check = [];
                                        @endphp
                                        @foreach ($unique as $club)
                                            @php
                                                $total = 0;
                                                $total1 = 0;
                                                $total4 = 0;
                                                $total7 = 0;
                                                $cl = App\Models\Club::find($club);
                                            @endphp
                                            <tr>
                                                <td>

                                                    {{ $cl->club_name }}

                                                </td>
                                                <?php
                                                ?>


                                                @foreach ($teams as $user)
                                                    @php
                                                        $userDet = App\Models\Team::find($user->team_id);
                                                    @endphp
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total += $user->marks;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @php
                                                    
                                                @endphp
                                                @foreach ($users as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total1 += $user->marks;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($marathonPoints as $marathonPoint)
                                                    @if ($marathonPoint->club_id == $cl->id)
                                                        @php
                                                            $total4 += $marathonPoint->points;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($allUsers as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total7 += 1;
                                                            // $check[]=$userDet->userId
                                                        @endphp
                                                    @endif
                                                @endforeach





                                                <td> @php echo $total1 @endphp </td>
                                                <td> @php echo $total @endphp </td>
                                                <td> @php echo $total4 @endphp </td>
                                                <td> @php echo $total7 @endphp </td>
                                                <td> @php echo $total+$total1+$total4+$total7 @endphp </td>

                                            </tr>
                                        @endforeach
                                        <?php
                                        
                                        $all = array_merge($compareClubs, $userCompareClubs);
                                        $uniqueAll = array_unique($all);
                                        $diff = array_diff($uniqueAll, $unique);
                                        $marathonPoints = App\Models\MarathonPoint::where('league_id', $league->id)->get();
                                        
                                        ?>
                                        @php
                                            
                                        @endphp
                                        @foreach ($diff as $club)
                                            @if ($club != null)
                                                @php
                                                    $total3 = 0;
                                                    $total2 = 0;
                                                    $total5 = 0;
                                                    $total6 = 0;
                                                    $cl = App\Models\Club::find($club);
                                                @endphp
                                                <tr>
                                                    <td>

                                                        {{ $cl->club_name }}

                                                    </td>
                                                    @if ($teams != null)
                                                        @foreach ($teams as $user)
                                                            @php
                                                                $userDet = App\Models\Team::find($user->team_id);
                                                            @endphp
                                                            @if ($userDet->club_id == $cl->id)
                                                                @php
                                                                    $total3 += $user->marks;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @foreach ($users as $user)
                                                        @php
                                                            $userDet = App\User::find($user->user_id);
                                                        @endphp
                                                        @if ($userDet->club_id == $cl->id)
                                                            @php
                                                                $total2 += $user->marks;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @foreach ($allUsers as $user)
                                                        @php
                                                            $userDet = App\User::find($user->user_id);
                                                        @endphp
                                                        @if ($userDet->club_id == $cl->id)
                                                            @php
                                                                $total6 += 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach


                                                    @foreach ($marathonPoints as $marathonPoint)
                                                        @if ($marathonPoint->club_id == $cl->id)
                                                            @php
                                                                $total5 += $marathonPoint->points;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <td> @php echo $total2 @endphp</td>
                                                    <td> @php echo $total3 @endphp </td>
                                                    <td> @php echo $total5 @endphp </td>
                                                    <td> @php echo $total6 @endphp </td>
                                                    <td>
                                                        @if ($total3 == 0)
                                                            @php echo $total2+$total5+$total6 @endphp
                                                        @else
                                                            @php echo $total3+$total5+$total6 @endphp
                                                        @endif
                                                    </td>

                                                    {{-- @php echo $total3+$total5 @endphp --}}
                                                    {{-- @php echo $total2 @endphp @endif --}}




                                                </tr>
                                            @endif
                                        @endforeach
<!--participated club -->
 @foreach ($participatedUnique as $club)
                                            @php
                                                $total8 = 0;
                                                $total9 = 0;
                                                
                                                $cl = App\Models\Club::find($club);
                                            @endphp
                                            <tr>
                                                <td>

                                                    {{ $cl->club_name }}

                                                </td>
                                                <?php
                                                ?>


                                               
                                                
                                                @foreach ($marathonPoints as $marathonPoint)
                                                    @if ($marathonPoint->club_id == $cl->id)
                                                        @php
                                                            $total8 += $marathonPoint->points;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($allUsers as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total9 += 1;
                                                            // $check[]=$userDet->userId
                                                        @endphp
                                                    @endif
                                                @endforeach





                                                <td> @php echo 0 @endphp </td>
                                                <td> @php echo 0 @endphp </td>
                                                <td> @php echo $total8 @endphp </td>
                                                <td> @php echo $total9 @endphp </td>
                                                <td> @php echo $total8+$total9 @endphp </td>

                                            </tr>
                                        @endforeach
<!--end-->

                               
                            </tbody>
                            @endif
                        </table>
                @endif


                <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting?$setting->footer:'') !!}@endif


        </div>
    </section>
    
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
                <script>
                      $(document).ready(function() {
            $(".showall tr td").each(function() {
            var cellText = $.trim($(this).text());
            if (cellText.length == 0) {
            $(this).parent().hide();
            }
            });
            });
                </script>