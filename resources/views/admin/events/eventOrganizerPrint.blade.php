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

    }
    
  
</style>
<div class="row" id="printLegaueEvents">
<div class="container">
@include('reports.PrintHeader')
</div>
    <br>

    <br>

    <table class="table table-striped table-bordered text-uppercase events" id="leagues">
    <thead class="thead-Dark">
        <tr>
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
 @if($gender->ageGroupEvent->Event->league->to_date >= Carbon\Carbon::now()->format('Y-m-d'))


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
<section class="content-footer">
                <div class="col-md-1">
                    @if($setting){!! html_entity_decode($setting->footer) !!}@endif
        
        
                </div>
            </section>
<script>
    $(document).on('change', '.judge', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var judge = $(this).val();
        $.ajax({
            type: "POST",
            url: "/event/assign/" + id,
            data: {
                "judge": judge,
                "id": id,
            },
            success: function(response) {}
        });
    });
    $(document).on('change', '.starter', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var starter = $(this).val();
        // alert(starter);
        $.ajax({
            type: "POST",
            url: "/event/assign/starter/" + id,
            data: {
                "starter": starter,
                "id": id,
            },
            success: function(response) {}
        });
    });
    $(document).on('change', '.time', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var time = $(this).val();
        $.ajax({
            type: "POST",
            url: "/event/assign/time/" + id,
            data: {
                "time": time,
                "id": id,
            },
            success: function(response) {}
        });
    });
    // $("#judge").on('change', function() {
    //         alert("hi");
    //         var gender = $(this).attr('data-id');
    //         alert(gender);
    //         var method = $('#_method').val();


    //             success: function(response) {
    //                 // alert(response.organiation);
    //                 // $('#org option[value='+response.organization+']').prop('selected', true);
    //                 window.location.href = response.url;
    //                 // $('#org option').filter('[value="' + response.organization + '"]').prop('selected', 'selected');                  
    //                   $('#org option[value='+response.organization+']').attr('selected', 'selected');
    //                 // document.getElementById("org").innerHTML = response.organization;
    //             }
    //         });
</script>