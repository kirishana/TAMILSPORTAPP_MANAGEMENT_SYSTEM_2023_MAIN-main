<table class="table table-striped table-bordered prizeGiven" style="text-transform: capitalize;">
    <thead class="thead-Dark">
        <tr>
            <th style="width:10%">Event</th>
            <th style="width:10%">Gender</th>
            <th style="width:10%">Age</th>
            <th style="width:20%" colspan="3">First</th>
            <th style="width:20%" colspan="3">Second</th>
            <th style="width:30%" colspan="3">Third</th>

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
    <td style="width:10%">
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td style="width:10%">
        {{ $gender->gender->name }}
</td>

<td style="width:10%">
    {{ $gender->ageGroupEvent->ageGroup->name }}
    </td>
    <!-- event_cate//////-id==1-->
    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
   
        
        <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    
    
        ?>
    
    

       @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width:10%">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       <br>
                        @endforeach
                    </td>
                    <td style="width:10%">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                       <br>
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
                $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();

    ?>
                       
      
                <input type="checkbox" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven" {{ $genderUser->prize_given==1?'checked':'' }} >
                <br>
                        @endforeach
                    </td>
                       
                    @else
                       <td style="width:10%">
                       </td>
                       <td style="width:10%">
                    </td>
                    <td style="width:10%">
                    </td>
                    @endif
    
        
       @endif
        @if($users2)
                    @if($users2->count()>0)
    
                    <td style="width:10%">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       <br>
                        @endforeach
                    </td>
                    <td style="width:10%">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                       <br>
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
                $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();

    ?>
                       
      
                <input type="checkbox" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven" {{ $genderUser->prize_given==1?'checked':'' }} >
        <br>
                   
                        @endforeach
                    </td>
                       @else
                       <td style="width:10%">
                       </td>
                       <td style="width:10%">
                    </td>
                    <td style="width:10%">
                    </td>
                    @endif
    
        
       @endif
       @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width:10%">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       <br>
                        @endforeach
                    </td>
                    <td style="width:10%">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                       <br>
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
                $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();

    ?>
                       
      
                <input type="checkbox" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven" {{ $genderUser->prize_given==1?'checked':'' }} >
                <br>
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
 
                 
                   
                 <td style="width:10%">
                    @foreach($users1 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width:10%">
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
            <td style="width:5%">
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
               
            $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
            ?>
                    <input type="checkbox" title="Prize Given or not" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven"  {{ $genderUser->prize_given==1?'checked':'' }}>
           <br>
                    @endforeach
        </td>

        
    
        @endif
    
      
        @if($users2->count()>0)
    
        <td style="width:10%">
            @foreach($users2 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width:10%">
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
            <td style="width:5%">
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
               
            $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
            ?>
                    <input type="checkbox" title="Prize Given or not" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven"  {{ $genderUser->prize_given==1?'checked':'' }}>
<br>
                    @endforeach
        </td>
    @else

     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>

        @endif
    
    
      
        @if($users3->count()>0)
    
        <td style="width:10%">
            @foreach($users3 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} 
                        <br>
                        @endforeach
            </td>
            <td style="width:10%">
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}}
                 <br>
                @endforeach
            </td>
            
          
            <td style="width:5%">
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
               
            $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
            ?>
                    <input type="checkbox" title="Prize Given or not" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven"  {{ $genderUser->prize_given==1?'checked':'' }}>
           
            <br>
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
                    
                    <td style="width:10%">
                        @foreach($users1 as $use)
                       <?php 
                        $team=App\Models\Team::find($use->team_id);
                        ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width:10%">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}} <br>
                       
               
    
                        @endforeach
                    </td>
                                            
                                            <td style="width:5%">
                                                @foreach($users1 as $use)
                                                <?php 
    $team=App\Models\Team::find($use->team_id);
                $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                       
                <input type="checkbox"data-id="{{ $gender->id }}" data-user="{{ $team->id }}" class="toggle_btn prizeGroupGiven" {{ $genderTeam->prize_given==1?'checked':'' }}>
        <br>
    
                        @endforeach
                    </td>
                       
                    @endif
    @endif
                    @if($users2)
                    @if($users2->count()>0)
                    <td style="width:10%">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width:10%">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                        @endforeach
                    </td>
                   
                    <td style="width:5%">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
                    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                       
                <input type="checkbox"data-id="{{ $gender->id }}" data-user="{{ $team->id }}" class="toggle_btn prizeGroupGiven" {{ $genderTeam->prize_given==1?'checked':'' }}>
        <br>
                        @endforeach
                    </td>
                    @endif
                    @endif
                    @if($users3)
                    @if($users3->count()>0)

                    <td style="width:10%">
                        @foreach($users3 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   
                    <td style="width:10%">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                       
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                       
                <input type="checkbox"data-id="{{ $gender->id }}" data-user="{{ $team->id }}" class="toggle_btn prizeGroupGiven" {{ $genderTeam->prize_given==1?'checked':'' }}>
        <br>
                       
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
    <td style="width:10%">
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td style="width:10%">
        {{ $gender->gender->name }}
</td>

<td style="width:10%">
    {{ $gender->ageGroupEvent->ageGroup->name }}
    </td>
    <!-- event_cate//////-id==1-->
    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
   
        
        <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    
    
        ?>
    
    

       @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width:10%">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       <br>
                        @endforeach
                    </td>
                    <td style="width:10%">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                       <br>
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
                $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();

    ?>
                       
      
                <input type="checkbox" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven" {{ $genderUser->prize_given==1?'checked':'' }} >
                <br>
                        @endforeach
                    </td>
                       
                    @else
                       <td style="width:10%">
                       </td>
                       <td style="width:10%">
                    </td>
                    <td style="width:10%">
                    </td>
                    @endif
    
        
       @endif
        @if($users2)
                    @if($users2->count()>0)
    
                    <td style="width:10%">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       <br>
                        @endforeach
                    </td>
                    <td style="width:10%">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                       <br>
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
                $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();

    ?>
                       
      
                <input type="checkbox" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven" {{ $genderUser->prize_given==1?'checked':'' }} >
        <br>
                   
                        @endforeach
                    </td>
                       @else
                       <td style="width:10%">
                       </td>
                       <td style="width:10%">
                    </td>
                    <td style="width:10%">
                    </td>
                    @endif
    
        
       @endif
       @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width:10%">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        [{{$user->userId}}] 
                       <br>
                        @endforeach
                    </td>
                    <td style="width:10%">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                       <br>
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
                $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();

    ?>
                       
      
                <input type="checkbox" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven" {{ $genderUser->prize_given==1?'checked':'' }} >
                <br>
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
 
                 
                   
                 <td style="width:10%">
                    @foreach($users1 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width:10%">
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
            <td style="width:5%">
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
               
            $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
            ?>
                    <input type="checkbox" title="Prize Given or not" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven"  {{ $genderUser->prize_given==1?'checked':'' }}>
           <br>
                    @endforeach
        </td>

        
    
        @endif
    
      
        @if($users2->count()>0)
    
        <td style="width:10%">
            @foreach($users2 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width:10%">
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
            <td style="width:5%">
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
               
            $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
            ?>
                    <input type="checkbox" title="Prize Given or not" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven"  {{ $genderUser->prize_given==1?'checked':'' }}>
<br>
                    @endforeach
        </td>
    @else

     <td>&nbsp;</td>
     <td>&nbsp;</td>
     <td>&nbsp;</td>

        @endif
    
    
      
        @if($users3->count()>0)
    
        <td style="width:10%">
            @foreach($users3 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} 
                        <br>
                        @endforeach
            </td>
            <td style="width:10%">
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}}
                 <br>
                @endforeach
            </td>
            
          
            <td style="width:5%">
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
               
            $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
            ?>
                    <input type="checkbox" title="Prize Given or not" data-id="{{ $gender->id }}" data-user="{{ $user->id }}" class="toggle_btn prizeGiven"  {{ $genderUser->prize_given==1?'checked':'' }}>
           
            <br>
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
                    
                    <td style="width:10%">
                        @foreach($users1 as $use)
                       <?php 
                        $team=App\Models\Team::find($use->team_id);
                        ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width:10%">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}} <br>
                       
               
    
                        @endforeach
                    </td>
                                            
                                            <td style="width:5%">
                                                @foreach($users1 as $use)
                                                <?php 
    $team=App\Models\Team::find($use->team_id);
                $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                       
                <input type="checkbox"data-id="{{ $gender->id }}" data-user="{{ $team->id }}" class="toggle_btn prizeGroupGiven" {{ $genderTeam->prize_given==1?'checked':'' }}>
        <br>
    
                        @endforeach
                    </td>
                       
                    @else
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    @endif
    @endif
                    @if($users2)
                    @if($users2->count()>0)
                    <td style="width:10%">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width:10%">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                        @endforeach
                    </td>
                   
                    <td style="width:5%">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
                    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                       
                <input type="checkbox"data-id="{{ $gender->id }}" data-user="{{ $team->id }}" class="toggle_btn prizeGroupGiven" {{ $genderTeam->prize_given==1?'checked':'' }}>
        <br>
                        @endforeach
                    </td>
                    @else
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    @endif
                    @endif
                    @if($users3)
                    @if($users3->count()>0)

                    <td style="width:10%">
                        @foreach($users3 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   
                    <td style="width:10%">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                       
                        @endforeach
                    </td>
                    <td style="width:5%">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                       
                <input type="checkbox"data-id="{{ $gender->id }}" data-user="{{ $team->id }}" class="toggle_btn prizeGroupGiven" {{ $genderTeam->prize_given==1?'checked':'' }}>
        <br>
                       
                        @endforeach
                    </td>
                    @else
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    @endif
                    @endif
                    
                    
                    
                    
             @endif       
    @endif
   <!--end-->
        @endforeach
    </tbody>
    @endif
</table>

<script>
     $(".prizeGiven").on('change', function() {
        var gender=$(this).attr('data-id');
        var user=$(this).attr('data-user');
        
        $.ajax({
            type: 'POST',
            url: '/prizeGiven/' + gender,
            data: {
                "_token": "{{ csrf_token() }}",
                "gender": gender,
                "user":user
            },
            success: function(response) {
            }
        });

    }); 
    
    
    $(".prizeGroupGiven").on('change', function() {
        var gender=$(this).attr('data-id');
        var team=$(this).attr('data-user');
        // alert(team);
        $.ajax({
            type: 'POST',
            url: '/prizeGroupGiven/' + gender,
            data: {
                "gender": gender,
                "team":team
            },
            success: function(response) {
            }
        });

    }); 
</script>