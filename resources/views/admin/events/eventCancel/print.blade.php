<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
        border:1px solid black;
    }
    
    .table .thead-Dark th {

color: #fffffc;
/* opacity: 0.8; */
background-color: #3A3B3C;

/* border-color: #792700; */

}
</style>


<div class="row cancelledEvents">
<div class="container">
@include('reports.PrintHeader')
    </div>
  
    <br>
    <table class="table table-striped table-bordered users text-uppercase" id="table10">
        <thead class="thead-Dark">
            <tr>
                <th>Event Name</th>
                <th>League Name</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Date</th>
                <th>Participants</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="users" class="text-uppercase">

            @foreach($genders as $gender)
            @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)
            @if($gender->status==2)

            <?php 
        if($gender->ageGroupEvent->Event->league->to_date >=$today)
        {   
        ?>
            <tr>
                <h1 id="su"></h1>
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
                

                       @if ($gender->status == 2)
                       <td>
                           Not Started

                       </td>
                   @elseif($gender->status == 0)
                       <td> On Going
                       </td>
                   @elseif($gender->status == 3)
                       <td>Finalizing
                       </td>
                   @elseif($gender->status == 10)
                       <td>Cancelled
                       </td>
                   @else
                       <td>Finished
                       </td>
                   @endif
              

            
            </tr>
            <?php 
        }
        ?>
        @endif
            @endif

            @endforeach


        </tbody>
       

      
    </table>
    <section class="content-footer">
            <div class="col-md-1">
                @if($setting){!! html_entity_decode($setting->footer) !!}@endif
    
    
            </div>
        </section>
</div>
