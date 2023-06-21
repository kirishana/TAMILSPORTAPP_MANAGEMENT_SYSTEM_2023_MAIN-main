<table class="table table-bordered table-hover genders">
        <tr>
            <th>Event Name</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>Status</th>
            <th colspan="3">Winners</th>


        </tr>
     
    <tbody>
        
           
            @foreach($genders as $gender)
            @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)

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
            @if($gender->status==2)
            <td>
                <h5><span class="label label-primary">Not Started</span></h5>

            </td>
            @elseif($gender->status==0)
            <td> <span class="label label-warning">On Going </span>
            </td>
            @else
            <td> <span class="label label-success">Finished</span>
            </td>
            @endif
            <?php
            $times = DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->orderBy('time', 'ASC')
                ->limit(3)
                ->get();
                $org= $gender->ageGroupEvent->Event->organization;

            ?>
        
             
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id == 1)
            @foreach($times as $key=>$time)
            @if($key==0)
            <?php 
            $ageGroupGender = DB::table('age_group_gender_user')->where('id', $time->id)->update(['marks' => $org->athelaticsetting->first_place]);
          ?>
          @endif
         
         @if($key==1)
            <?php 
            $ageGroupGender = DB::table('age_group_gender_user')->where('id', $time->id)->update(['marks' => $org->athelaticsetting->second_place]);
          ?>
         @endif
         @if($key==2)
            <?php 
            $ageGroupGender = DB::table('age_group_gender_user')->where('id', $time->id)->update(['marks' => $org->athelaticsetting->third_place]);
          ?>
          @endif
            <?php
            $user = DB::table('users')->where('id', $time->user_id)->first();

            ?>
            @if($gender->status==1)

            <td> @if($user->profile_pic)
                <img src="/profile/{{ $user->profile_pic}}" alt="Tamil Sangam" width="50" height="50" style="border-radius:50%">
                @else
                {{ $user->first_name }}          
                @endif
            </td>
                @endif
            @endforeach
            @else
    
            @endif
            
        </tr>
        @endif
      


        @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
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
            @if($gender->status==2)
            <td>
                <h5><span class="label label-primary">Not Started</span></h5>
        
            </td>
            @elseif($gender->status==0)
            <td> <span class="label label-warning">On Going </span>
            </td>
            @else
            <td> <span class="label label-success">Finished</span>
            </td>
            @endif
            <?php
            $players = $gender->users;
            $max = array();
            $userIds = array();
            foreach ($players as $user) {
                $times = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where('user_id', $user->id)
                    ->first();

                    if ($times->one >= $times->two) {
                if ($times->one >= $times->third) {
                    $max[] = $times->one;
                } else {
                    $max[] = $times->third;
                }
            } elseif ($times->one <= $times->two) {
                if ($times->third <= $times->two) {
                    $max[] = $times->two;
                } else {
                    $max[] = $times->third;
                }
            }
                $userIds[] = $user->id;
            }

            arsort($max);
           
            $userLists = array();
            $results = array_slice($max, 0, 3);
            foreach ($results as $result) {
                $user = DB::table('age_group_gender_user')
                ->where('age_group_gender_id', $gender->id)
                ->where(function($query) use ($result){
                    $query->orwhere('one', $result)
                ->orWhere('two', $result)
                ->orWhere('third', $result);
                        })->first();
                        $userLists[]=$user;
            }
       
            ?>  
            @if($userLists !==null)

            @foreach($userLists as $userId)
                <?php 
            $user=App\User::find($userId->user_id)
                ?>            
              <td>
                  @if($user->profile_pic)
                  <img src="/profile/{{ $user->profile_pic}}" alt="Tamil Sangam" width="50" height="50" style="border-radius:50%">
                  @else
                {{ $user->first_name }}
                @endif
                   </td>
                   @endforeach
  
                   @endif      
                         </tr>
          
        
          
          
        </tr>
        @endif

@if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
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
    @if($gender->status==2)
    <td>
        <h5><span class="label label-primary">Not Started</span></h5>

    </td>
    @elseif($gender->status==0)
    <td> <span class="label label-warning">On Going </span>
    </td>
    @else
    <td> <span class="label label-success">Finished</span>
    </td>
    @endif
    <?php
    $times = DB::table('age_group_gender_team')
        ->where('age_group_gender_id', $gender->id)
        ->orderBy('time', 'ASC')
        ->limit(3)
        ->get();
        $org= $gender->ageGroupEvent->Event->organization;
// print_r($times);
    ?>

    @foreach($times as $key=>$time)
    
    <?php
    $user = DB::table('teams')->where('id', $time->team_id)->first();

    ?>
    @if($gender->status==1)

    <td> 
        {{$user->name}} 
    </td>
         @endif
    @endforeach
    

</tr>
@endif
@endif
@endforeach

    </tbody>
</table>