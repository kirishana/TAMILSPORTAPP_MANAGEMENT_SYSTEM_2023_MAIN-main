<style type="text/css">
    .table {
        width:100%;
        border-collapse: collapse;
        text-transform: capitalize;
        font-size:13px ;
        margin-right: 5px;
         
    }

    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;
        border: 1px solid #ddd;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
     td {
        width: 1px;
        border: 1px solid black;

        
    }
    tr{
        border: 1px solid black;

    }

    .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;
font-size: 12px;
 /* border-color: #792700; */

}
h2{
    text-align: center;
    text-transform: uppercase;
}
</style>
<div class="row" id="ex" style="font-family:DejaVu Sans;">
@if($header!=null)
    <div>
        <div class="container">
           @include('reports.header')
        </div>
    </div>
    @endif
    <br>
@if($eventTitle!=null||$AgeTitle!=null||$GenTitle!=null)
                <div style="text-align:center;"><strong><span style="font-size:30px;">{{$eventTitle[0]}}</span> 
                <span style="font-size:30px;">({{$AgeTitle[0]}}
              @if($GenTitle[0]=="Male") <span style="color:green;">{{$GenTitle[0]}}  </span>)
              @else
              <span style="color:red;">{{$GenTitle[0]}}
                </span>)</strong>
                @endif
                </div>
                @else
                <h2>Prize given status</h2>
@endif
<br>
    <table class="table table-striped table-bordered results" >
    <thead class="thead-Dark">
        <tr>
            <th style="width:15%;">Event</th>
            <th style="width:5%;">Gender</th>
            <th  style="width:5%;">AgeGroup</th>
            <th style="width:25%;" colspan="3">First</th>
            <th style="width:25%;" colspan="3">Second</th>
            <th style="width:25%;" colspan="3">Third</th>

        </tr>
        <tr>
            <th style="width:15%;"></th>
            <th style="width:5%;"></th>
            <th style="width:5%;"></th>
            <th style="width:6%;">ID No</th>
            <th style="width:15%;">Name</th>
            <th style="width:4%;">Prize Given</th>
            <th style="width:6%;">ID No</th>
            <th style="width:15%;">Name</th>
            <th style="width:4%;">Prize Given</th>
            <th style="width:6%;">ID No</th>
            <th style="width:15%;">Name</th>
            <th style="width:4%;">Prize Given</th>

        </tr>
      
    </thead>
    @if(Auth::user()->hasRole(4))
    <tbody>
        @foreach($genders as $gender)
        @if($gender->ageGroupEvent->Event->user_id==Auth::user()->id)

<tr>
    <td style="width: 15%;">
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td style="width:5%;">
        {{ $gender->gender->name }}
</td>

    <td style="width: 5%;">
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
    
                    <td style="width:6%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        {{$user->userId}}</br>
                       
                        @endforeach
                    </td>
                    <td style="width:15%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}</br>
                        @endforeach
                    </td>
                    <td style="width:4%;">
                 @foreach($users1 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>
           @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
    
        
       @endif
        @if($users2)
                    @if($users2->count()>0)
    
                    <td style="width:6%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        {{$user->userId}}</br>
                       
                        @endforeach
                    </td>
                    <td style="width:15%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}</br>
                        @endforeach
                    </td>
                   <td style="width: 4%;">
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>
                       
           @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
    
        
       @endif
       @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width:6%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        {{$user->userId}}</br>
                       
                        @endforeach
                    </td>
                    <td style="width:15%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}</br>
                        @endforeach
                    </td>
                    <td style="width: 4%;">
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>
                       
           @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

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
 
                 
                   
        <td style="width:6%;">
            @foreach($users1 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width: 15%;"> 
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td style="width: 4%;">
                 @foreach($users1 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>

        
    
        @endif
    
      
        @if($users2->count()>0)
    
        <td style="width: 6%;">
        @foreach($users2 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width: 15%;"> 
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td style="width: 4%;">
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>
    @else

     <td style="width:6%;">&nbsp;</td>
     <td style="width: 15%;">&nbsp;</td>
     <td style="width: 4%;">&nbsp;</td>

        @endif
    
    
      
        @if($users3->count()>0)
    
        <td style="width: 6%;">
        @foreach($users3 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} </br>
                        <br>
                        @endforeach
            </td>
            <td style="width: 15%;"> 
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}}</br>
                 <br>
                @endforeach
            </td>
            
          
           <td style="width:4%;">
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>

      
@else
    <td style="width:6%;">&nbsp;</td>
     <td style="width: 15%;">&nbsp;</td>
     <td style="width: 4%;">&nbsp;</td>


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
                    
 <td style="width: 6%;">
                        @foreach($users1 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}</br>
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width: 15%;">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
               
                       
    
                        @endforeach
                    </td>
                                            @foreach($users1 as $use)
                    <td style="width:4%;">
    <?php 
    $team=App\Models\Team::find($use->team_id);
                $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }} </br>


    
                        @endforeach
                    </td>
                       
                    @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
    @endif
                    @if($users2)
                    @if($users2->count()>0)
       <td style="width: 6%;">
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
                   
                     <td style="width:4%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
                    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }} </br>

                        @endforeach
                    </td>
                    @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
                    @endif
                    @if($users3)
                    @if($users3->count()>0)

 <td style="width:6%;">
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
                   <td style="width:4%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }} </br>

                       
                        @endforeach
                    </td>
                    @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

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
    <td style="width:15%;">
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td style="width:5%;">
        {{ $gender->gender->name }}
</td>

    <td style="width:5%;">
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
    
                    <td style="width:6%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        {{$user->userId}}</br>
                       
                        @endforeach
                    </td>
                    <td style="width:15%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}} </br>
                        @endforeach
                    </td>
                    <td style="width:4%;">
                 @foreach($users1 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>
                       
           @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
    
        
       @endif
        @if($users2)
                    @if($users2->count()>0)
    
                    <td style="width:6%;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        {{$user->userId}}</br>
                       
                        @endforeach
                    </td>
                    <td style="width:15;">
                        @foreach($users2 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                   <td style="width:4%;">
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}    </br>
             @endforeach
  
           </td>
                       
           @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
    
        
       @endif
       @if($users3)
                    @if($users3->count()>0)
    
                    <td style="width:6%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                        {{$user->userId}} </br>
                       
                        @endforeach
                    </td>
                    <td style="width:15%;">
                        @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                       
                       {{$user->first_name}} {{$user->last_name}}
                        @endforeach
                    </td>
                    <td style="width:4%;">
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}   </br>
             @endforeach
  
           </td>
                       
           @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

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
 
                 
                   
        <td style="width:6%;">
            @foreach($users1 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width:15%;"> 
                @foreach($users1 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td style="width:4%;">
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
    
        <td style="width:6%;">
        @foreach($users2 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} <br>
                        @endforeach
            </td>
            <td style="width:15%;"> 
                @foreach($users2 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}} <br>
                @endforeach
            </td>
            
          
           <td style="width:4%;">
                 @foreach($users2 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>
    @else

     <td style="width:6%;">&nbsp;</td>
     <td style="width:15%;">&nbsp;</td>
     <td style="width:4%;">&nbsp;</td>

        @endif
    
    
      
        @if($users3->count()>0)
    
        <td style="width:6%;">
        @foreach($users3 as $use)
            <?php 
            $user=App\User::find($use->user_id);
            ?>
                        {{$user->userId}} 
                        <br>
                        @endforeach
            </td>
            <td style="width:15%;"> 
                @foreach($users3 as $use)
                <?php 
                $user=App\User::find($use->user_id);
                ?>
                {{$user->first_name}} {{$user->last_name}}
                 <br>
                @endforeach
            </td>
            
          
           <td style="width:4%;">
                 @foreach($users3 as $use)
                 <?php 
                 $user=App\User::find($use->user_id);
                
             $genderUser=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('user_id',$user->id)->first();
             ?>
             {{ $genderUser->prize_given==1?'✓':'X' }}</br>
             @endforeach
  
           </td>

      
@else
<td style="width:6%;">&nbsp;</td>
     <td style="width:15%;">&nbsp;</td>
     <td style="width:4%;">&nbsp;</td>

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
                    
 <td style="width: 10%;">
                        @foreach($users1 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width:10%;">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
               
                       
    
                        @endforeach
                    </td>
                                            @foreach($users1 as $use)
                    <td style="width:4%;">
    <?php 
    $team=App\Models\Team::find($use->team_id);
                $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>
 

    
                        @endforeach
                    </td>
                       
                    @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
    @endif
                    @if($users2)
                    @if($users2->count()>0)
       <td style="width: 10%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   

                    <td style="width: 10%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                        @endforeach
                    </td>
                   
                     <td style="width: 10%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
                    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

                        @endforeach
                    </td>
                    @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
                    @endif
                    @if($users3)
                    @if($users3->count()>0)

 <td style="width:10%;">
                        @foreach($users3 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->club->club_name}}
                        <br>
                        @endforeach
                    </td>
                   
                    <td style="width: 10%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                       
                        @endforeach
                    </td>
                   <td style="width:10%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    $genderTeam=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('team_id',$team->id)->first();

    ?>
                                    {{ $genderTeam->prize_given==1?'✓':'X' }}   </br>

                       
                        @endforeach
                    </td>
                    @else

<td style="width:6%;">&nbsp;</td>
<td style="width:15%;">&nbsp;</td>
<td style="width:4%;">&nbsp;</td>

   @endif 
                    @endif
                    
                    
                    
                    
             @endif   
   </tr>
    @endif
   <!--end-->
        @endforeach
    </tbody>
    @endif
</table>
@if($setting!=null)
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}
            @endif


        </div>
    </section>
    @endif
</div>
<script type="text/php">
    
    if (isset($pdf)) {
        $x = 360;
        $y = 570;
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