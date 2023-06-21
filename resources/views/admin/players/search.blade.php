<style>
     .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: uppercase;
    }

</style>
<table class="table table-striped text-uppercase table-bordered results" id="">
    <thead class="thead-Dark">
        <tr>
            <th>#</th>
            <th>Event Name</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>Status</th>
            <th colspan="3">Winners</th>
        </tr>
        <tr>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>

            </td>
            <td>
                First
            </td>
            <td>
                Second
            </td>
            <td>
                Third
            </td>

        </tr>
    </thead>
    <tbody class="text-uppercase">

        <tr>

            @foreach($events as $event)
            @php
            $ages=App\Models\AgeGroupEvent::where('event_id',$event->id)->get();

            @endphp
            @foreach($ages as $age)
            @php
            $genders=App\Models\AgeGroupGender::where('age_group_event_id',$age->id)->latest()->get();
            @endphp
            @foreach($genders as $gender)
@if($event->mainEvent->event_category_id==1)

        <tr>
            <td>{{$gender->id}}</td>

            <td>
                {{ $event->mainEvent->name }}
            </td>
            <td>
                {{ $gender->gender->name }}
            </td>
            @php
            $ageGroup=App\Models\AgeGroup::where('id',$age->age_group_id)->first();
            @endphp
            <td>
                {{ $ageGroup->name }}
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
                $org= $event->organization;

            ?>
        
             
            @if($event->mainEvent->event_category_id == 1)
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
                {{$user->userId}} 
                @endif
            </td>
                @endif
            @endforeach
            @else
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
                $users = DB::table('age_group_gender_user')
                    ->where('age_group_gender_id', $gender->id)
                    ->where('one', $result)
                    ->orWhere('two', $result)
                    ->orWhere('third', $result)
                   
                    ->get();
                $userLists[] = $users;
            }
            $uniqueUsers = array_unique($userLists);
            // print_r($uniqueUsers);
            $first_names = array();
            foreach ($uniqueUsers as $key=>$user) {
                
                       foreach ($user as $id) {
                        if($key==0){
                    $ageGroupGender = DB::table('age_group_gender_user')->where('id', $id->id)->update(['marks' => $org->athelaticsetting->first_place]);

                }
         if($key==1){
            $ageGroupGender = DB::table('age_group_gender_user')->where('id', $id->id)->update(['marks' => $org->athelaticsetting->second_place]);

         } 
         if($key==2){
            $ageGroupGender = DB::table('age_group_gender_user')->where('id', $id->id)->update(['marks' => $org->athelaticsetting->third_place]);

         }

                    $first_names[] = DB::table('users')
                        ->where('id', $id->user_id)
                        ->first();
                }
            }
            ?>
            {{-- @foreach ($first_names as $fname )

                
            @endforeach --}}
            @foreach($first_names as $fname)
            
            <td>
                @if($fname->profile_pic)
                <img src="/profile/{{ $fname->profile_pic}}" alt="Tamil Sangam" width="50" height="50" style="border-radius:50%">
                @else
                {{$fname->userId}} @endif
                 </td>
            @endforeach
            @endif

        </tr>
        @endif
      
@if($event->mainEvent->event_category_id==3)
<tr>
    <td>{{$gender->id}}</td>

    <td>
        {{ $event->mainEvent->name }}
    </td>
    <td>
        {{ $gender->gender->name }}
    </td>
    @php
    $ageGroup=App\Models\AgeGroup::where('id',$age->age_group_id)->first();
    @endphp
    <td>
        {{ $ageGroup->name }}
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
        $org= $event->organization;
// print_r($times);
    ?>

     {{--  {{ $ }}  --}}
    @foreach($times as $key=>$time)
    @if($key==0)
    <?php 
    $ageGroupGender = DB::table('age_group_gender_team')->where('id', $time->id)->update(['marks' => $org->athelaticsetting->first_place]);
  ?>
  @endif
 
 @if($key==1)
    <?php 
    $ageGroupGender = DB::table('age_group_gender_team')->where('id', $time->id)->update(['marks' => $org->athelaticsetting->second_place]);
  ?>
 @endif
 @if($key==2)
    <?php 
    $ageGroupGender = DB::table('age_group_gender_team')->where('id', $time->id)->update(['marks' => $org->athelaticsetting->third_place]);
  ?>
  @endif
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
@endforeach
@endforeach
@endforeach
        </tr>
    </tbody>
</table>