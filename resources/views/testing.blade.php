
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