<table class="table table-striped table-bordered users text-uppercase" id="table10">
    <thead>
        <tr>
            <th>Event Name</th>
            <th>League Name</th>
            <th>Event Organizer</th>
            <th>Gender</th>
            <th>Age Group</th>
            <th>Judge</th>
            <th>Starter</th>
            <th>Time</th>
            <th>Participants</th>
        </tr>
    </thead>
    <tbody id="users" class="text-uppercase">
        @foreach($genders as $gender)
        @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)
         @if($gender->ageGroupEvent->Event->league->to_date>Carbon\Carbon::now())

        <tr>
            <h1 id="su"></h1>
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


            <td>
                {{$gender->starter?$gender->starter->first_name:''}}
            </td>

            <td>
                {{$gender->judge?$gender->judge->first_name:''}}

            </td>
            <td>
                {{ $gender->time?$gender->time:''}}
            </td>

@php
$AgeGroupGender = App\Models\AgeGroupGender::where('id', $gender->id)->first();
$AgegroupEvent = App\Models\AgeGroupEvent::where('id', $AgeGroupGender->age_group_event_id)->first();
$Agegroup = App\Models\AgeGroup::where('id', $AgegroupEvent->age_group_id)->first();
$event = App\Models\Event::where('id', $AgegroupEvent->event_id)->first();
$count=0;
$count1=0;
$count2=0;
@endphp
@foreach ($event->registrations as $registration)
     
@if ($AgeGroupGender->gender_id == $registration->gender)              
@php
$mine=Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
$league1=Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
$age=$league1-$mine;
$exp = preg_split("/-/", $Agegroup->name);
if (isset($exp[1])){

if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
$count1++ ;


}
}
elseif ($exp[0] == $age) {

$count2++;





}
@endphp
@endif

@endforeach
<td>
@if($count)
{{ $count }}
@elseif($count1)
{{ $count1 }}
@else
{{ $count2 }}
@endif
</td>
@endif
        
        </tr>
        @endif
        @endforeach


    </tbody>

</table>
