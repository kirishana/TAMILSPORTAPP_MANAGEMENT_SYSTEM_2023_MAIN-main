<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: left;
    }

    table tr,
    table td {
        padding: 5px;
    }
    .center{
        margin-left: auto;
        margin-right: auto;

    }
</style>
<div class="row" id="printLegaueEvents">
<div class="container">
@include('reports.PrintHeader')
</div>
        <br>
<table class="table table-striped table-bordered  text-uppercase printEvents" id="sortUsers">

    <tr >
        <th style="text-align: center;">Event Name</th>
        <th style="text-align: center;">League</th>
        <th style="text-align: center;">Age Group</th>
        <th style="text-align: center;">Gender</th>
        <th style="text-align: center;">judge</th>
        <th style="text-align: center;">Starter</th>
        <th style="text-align: center;">time</th>
        <th style="text-align: center;">Participants Count</th>

    </tr>
    <tbody id="printEvents" class="text-uppercase">
        @foreach($genders as $gender)

        @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id)
        @if($gender->ageGroupEvent->Event->league->to_date >= Carbon\Carbon::now()->format('Y-m-d'))
        {{-- {{ dd($gender) }} --}}

        <tr class="users2">
        <td>
            {{ $gender->ageGroupEvent->Event->mainEvent->name }}
        </td>
        <td>
            {{ $gender->ageGroupEvent->Event->league->name }}
        </td>
      
        <td style="width: 10%;">
            {{ $gender->ageGroupEvent->ageGroup->name }}
        </td>
        <td style="width: 10%;">
            {{ $gender->gender->name }}
        </td>
        <td style="width:10%">
                        {{$gender->starter?$gender->starter->first_name:''}}
                    </td>

                    <td style="width:10%">
                        {{$gender->judge?$gender->judge->first_name:''}}

                    </td>
                    <td style="width:10%">
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
   @if($registration->is_approved==1)
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
@endif
 
@endforeach
<td style="width: 10%;">
@if($count)
{{ $count }}
@elseif($count1)
{{ $count1 }}
@else
{{ $count2 }}
@endif
</td>

   
    </tr>
  @endif

    @endif
    @endforeach

   
</tbody>

<script>
       $(document).ready(function() {
     

 var table = document.getElementById("printEvents");
 
 for (var i = 0; i < table.rows.length; i++) {
     
     var len= table.rows[i].cells[3].textContent.replace(/\s{2,}/g,' ');
     table.rows[i].cells[4].innerHTML = parseInt(len.length/8);


 }


});

if (isset($pdf)) {
        $x = 250;
        $y = 800;
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
</table>
<section class="content-footer">
    <div class="col-md-1">
        {!! html_entity_decode($setting?$setting->footer:'') !!}


    </div>
</section>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
$(document).ready(function() {
    $('.ckeditor').ckeditor();
});
</script>