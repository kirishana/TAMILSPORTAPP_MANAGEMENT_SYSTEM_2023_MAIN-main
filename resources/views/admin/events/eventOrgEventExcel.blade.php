

    <table class="table table-striped table-bordered text-uppercase events" id="leagues">
    <thead class="thead-Dark">
        <tr>
            <th>#</th>
            <th>Event Name</th>
            <th>League Name</th>
            <th>Event Organizer</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>No. of Part</th>
            <th>Date</th>
            @if (Auth::user()->hasAnyPermission(['view','Assign-event']))

            <th >Judge</th>
            <th>Starter</th>
            <th>Time</th>

            @endif
        </tr>
    </thead>
    <tbody class="text-uppercase">

            @foreach($genders as $gender)
 @if(($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)&&( $gender->ageGroupEvent->Event->user_id==Auth::user()->id))            <tr>
 @if($gender->ageGroupEvent->Event->league->to_date>Carbon\Carbon::now())

            <td>{{$gender->id}}</td>

            <td>
                {{ $gender->ageGroupEvent->Event->mainEvent->name }}
            </td>
            <td>
                {{ $gender->ageGroupEvent->Event->league->name }}
            </td>

            <td>
                {{ $gender->ageGroupEvent->Event->user->first_name }}
            </td>
            <td>
                {{ $gender->gender->name }}
            </td>

            <td>
                {{ $gender->ageGroupEvent->ageGroup->name }}
            </td>
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
                   $count++;
                   
                   
               }
            } 
            else{
                    $registrations = $event->registrations;
                    foreach ($registrations as $registration) {
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
                

                ?>
 <td style="width: 50px;">
    @if($count)
    {{ $count }}
    @elseif($count1)
{{ $count1 }}
@else
{{ $count2 }}
@endif
            </td>
            <td  style="width: 100px;">
                {{ $gender->ageGroupEvent->Event->date }}
            </td>
        
            <td>
            {{$gender->judge?$gender->judge->first_name:''}}

            </td>
            <td>
            {{$gender->starter?$gender->starter->first_name:''}}

            </td>
            <td>
                        {{ $gender->time?$gender->time:''}}
                    </td>

            
        </tr>
        @endif
        @endif 
        @endforeach

    </tbody>
</table>
