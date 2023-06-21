<table class="table table-striped table-bordered events" id="leagues" width="100%">
    <thead class="thead-Dark">
        <tr>
            <th>Event Name</th>
            <th>League Name</th>
            <th>Gender</th>
            <th style="width:4%">Age Group</th>
            <th>Date</th>
            <th>Status</th>         
            <th style="width:4%" >Participants</th>
        </tr>
    <tbody id="sortUsers" class="text-uppercase">


        @foreach ($genders as $gender)
            @if ($gender->ageGroupEvent->Event->organization_id == Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id == $id)
            @if($gender->ageGroupEvent->Event->season->status==1)
            @if($gender->status==2)
                <?php 
            if($gender->ageGroupEvent->Event->league->to_date >=$today)
            {   
            ?>
                <tr class="users2">
                    <td>
                        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                    </td>
                    <td>
                        {{ $gender->ageGroupEvent->Event->league->name }}
                    </td>

                 
                    <td>
                        {{ $gender->gender->name }}
                    </td>

                    <td>
                        {{ $gender->ageGroupEvent->ageGroup->name }}
                    </td>

                    <td>
                        {{ $gender->ageGroupEvent->Event->date }}
                    </td>
                    @if ($gender->status == 2)
                        <td>
                            <h5><span class="label label-primary">Not Started</span></h5>

                        </td>
                    @elseif($gender->status == 0)
                        <td> <span class="label label-warning">On Going </span>
                        </td>
                    @elseif($gender->status == 3)
                        <td> <span class="label label-warning">Finalizing </span>
                        </td>
                    @elseif($gender->status == 10)
                        <td> <span class="label label-danger">Cancelled </span>
                        </td>
                    @else
                        <td> <span class="label label-success">Finished</span>
                        </td>
                    @endif
                 
                  
 <?php
 $AgeGroupGender = App\Models\AgeGroupGender::where('id', $gender->id)->first();
 $AgegroupEvent = App\Models\AgeGroupEvent::where('id', $AgeGroupGender->age_group_event_id)->first();
   $Agegroup = App\Models\AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
   $event = App\Models\Event::where('id', $AgegroupEvent->event_id)->first();
  $count=0;
 $count1=0;
 $count2=0;
            if ($event->mainEvent->event_category_id == 3) {
            
            $grpregistrations = App\Models\GroupRegistration::where('age_group_gender_id', $gender->id)->get();
           foreach($grpregistrations as $registartion){
               foreach($registartion->teams->where('status',1) as $team){
                                           $count++;
               }
           }
        } 
        else{
                $registrations = $event->registrations;
                foreach ($registrations as $registration) {
                    if($registration->is_approved==1){
                        if($registration->user->is_approved==1){
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                    $age = $league1 - $mine;
                    $exp = preg_split("/-/", $Agegroup->name);
                    $users = array();
                    if (isset($exp[1])) {
                        if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                            if ($gender->gender_id == $registration->gender) {
                                $ageUsers = $registration->user;
                                $count1++;

          

                            }
                        }
                        ?>



                            <?php
                    } elseif ($exp[0] == $age) {
                        if ($gender->gender_id == $registration->gender) {
                            $ageUsers = $registration->user;
                            $count2++

                            ?>





            <?php }
                    }
                }
            }
                }
            }
            

            ?>
<td style="text-align: center">
@if($count)
{{ $count }}
@elseif($count1)
{{ $count1 }}
@else
{{ $count2 }}
@endif
        </td>
                 

                   

                  

                </tr>
                <?php 
    }
    ?>
    @endif
    @endif
            @endif
        @endforeach


    </tbody>
    
</table>
