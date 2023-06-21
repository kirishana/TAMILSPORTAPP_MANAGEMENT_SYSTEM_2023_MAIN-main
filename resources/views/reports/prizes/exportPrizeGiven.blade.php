
    <table class="table table-striped table-bordered prizeGiven" >
    <thead class="thead-Dark">
        <tr>
            <th>Event</th>
            <th>Gender</th>
            <th >Age</th>
            <th  colspan="3">First</th>
            <th  colspan="3">Second</th>
            <th  colspan="3">Third</th>

        </tr>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th>ID No</th>
            <th>Name</th>
            <th>Prize Given</th>
            <th>ID No</th>
            <th>Name</th>
            <th>Prize Given</th>
            <th>ID No</th>
            <th>Name</th>
            <th>Prize Given</th>

        </tr>
      
    </thead>
    @if(Auth::user()->hasRole(4))
    <tbody>
        @foreach($genders as $gender)
        @if($gender->ageGroupEvent->Event->user_id==Auth::user()->id)

<tr>
    <td>
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td>
        {{ $gender->gender->name }}
</td>

    <td>
        {{ $gender->ageGroupEvent->ageGroup->name }}
    </td>
    <!-- event_cate//////-id==1-->
    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
   
        
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
                       
                        [{{$user->userId}}] 
                       
                        @endforeach
                    </td>
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                    <td>
                 @foreach($users1 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
                       
                    @endif
    
        
       @endif
        @if($users2)
                    @if($users2->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       
                        @endforeach
                    </td>
                    <td style="width: 20%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                   <td>
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
                       
                    @endif
    
        
       @endif
       @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       
                        @endforeach
                    </td>
                    <td style="width: 20%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                    <td>
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
                       
                    @endif
    
        
       @endif
        @endif
        
    <!--ebnd-->

    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
    {{-- <td>{{ $gender->id }} </td> --}}
    <?php
    $org=App\Models\Organization::find(Auth::user()->organization_id?Auth::user()->organization_id:$id);
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
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td> 
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td>
                 @foreach($users1 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>

        
    
        @endif
    
      
        @if($users2->count()>0)
    
        <td>
        @foreach($users2 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td> 
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td>
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
    @else

     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>

        @endif
    
    
      
        @if($users3->count()>0)
    
        <td>
        @foreach($users3 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} 
                        <br>
                        @endforeach
            </td>
            <td> 
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}}
                 <br>
                @endforeach
            </td>
            
          
           <td>
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>

      
@else
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>

    @endif
    @endif
        
  
   <!---cat3-->
   @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
   <?php
       $users1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_first_place)->get();
       $users2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_second_place)->get();
       $users3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_third_place)->get();
    ?>

                    @if($users1)
                    @if($users1->count()>0)
                    
 <td style="width: 15%;">
                        @foreach($users1 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
               
                       
    
                        @endforeach
                    </td>
                                            @foreach($users1 as $use)
                    <td style="width: 20%;">
    <?php 
    $team=App\Models\Team::find($use->team_id);
                $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

    
                        @endforeach
                    </td>
                       
                    @endif
    @endif
                    @if($users2)
                    @if($users2->count()>0)
       <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                        @endforeach
                    </td>
                   
                     <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
                    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

                        @endforeach
                    </td>
                    @endif
                    @endif
                    @if($users3)
                    @if($users3->count()>0)

 <td style="width: 15%;">
                        @foreach($users3 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                       
                        @endforeach
                    </td>
                   <td style="width: 15%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

                       
                        @endforeach
                    </td>
                    @endif
                    @endif
                    
                    
                    
                    
             @endif       
    @endif
   <!--end-->
        @endforeach
    </tbody>
    @else
     <tbody>
        @foreach($genders as $gender)
        @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)

<tr>
    <td>
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td>
        {{ $gender->gender->name }}
</td>

    <td>
        {{ $gender->ageGroupEvent->ageGroup->name }}
    </td>
    <!-- event_cate//////-id==1-->
    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
   
        
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
                       
                        [{{$user->userId}}] 
                       
                        @endforeach
                    </td>
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                    <td>
                 @foreach($users1 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
                       
                    @endif
    
        
       @endif
        @if($users2)
                    @if($users2->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       
                        @endforeach
                    </td>
                    <td style="width: 20%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                   <td>
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
                       
                    @endif
    
        
       @endif
       @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       
                        @endforeach
                    </td>
                    <td style="width: 20%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                    <td>
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
                       
                    @endif
    
        
       @endif
        @endif
        
    <!--ebnd-->

    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
    {{-- <td>{{ $gender->id }} </td> --}}
    <?php
    $org=App\Models\Organization::find(Auth::user()->organization_id?Auth::user()->organization_id:$id);
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
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td> 
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td>
                 @foreach($users1 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>

        
    
        @endif
    
      
        @if($users2->count()>0)
    
        <td>
        @foreach($users2 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td> 
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td>
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
    @else

     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>

        @endif
    
    
      
        @if($users3->count()>0)
    
        <td>
        @foreach($users3 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} 
                        <br>
                        @endforeach
            </td>
            <td> 
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}}
                 <br>
                @endforeach
            </td>
            
          
           <td>
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>

      
@else
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>

    @endif
    @endif
        
  
   <!---cat3-->
   @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
   <?php
       $users1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_first_place)->get();
       $users2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_second_place)->get();
       $users3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time','!=',null)->where('marks',$gender->group_third_place)->get();
    ?>

                    @if($users1)
                    @if($users1->count()>0)
                    
 <td style="width: 15%;">
                        @foreach($users1 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
               
                       
    
                        @endforeach
                    </td>
                                            @foreach($users1 as $use)
                    <td style="width: 20%;">
    <?php 
    $team=App\Models\Team::find($use->team_id);
                $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

    
                        @endforeach
                    </td>
                       
                    @endif
    @endif
                    @if($users2)
                    @if($users2->count()>0)
       <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                        @endforeach
                    </td>
                   
                     <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
                    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

                        @endforeach
                    </td>
                    @endif
                    @endif
                    @if($users3)
                    @if($users3->count()>0)

 <td style="width: 15%;">
                        @foreach($users3 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                       
                        @endforeach
                    </td>
                   <td style="width: 15%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

                       
                        @endforeach
                    </td>
                    @endif
                    @endif
                    
                    
                    
                    
             @endif       
    @endif
   <!--end-->
        @endforeach
    </tbody>
    @endif
</table>


