@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<style>
    @media (max-width:340px) {
        .button-group .button {
            padding: 0 10px !important;
        }
    }
</style>
@stop



@section('content')
<section class="content-header">
    <h1>Events</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href=""> Events</a></li>
        <li class="active">Results</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    {{ $reg->organization->name }}'s Events
                                            <div style="float:right">

                      <a href="" style="color:white">
                            <i class="material-icons">keyboard_arrow_left</i>
                            <a href="/events" style="color:white">
                                Back</a>
                            </div>

                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3"></div>

                    <div class="col-md-4"></div>
                </div>

                <div class="panel-body table-responsive">
                  
                        @if(Auth::user()->club)
                                            <form action="/event/register/not-pay" method="POST">

                         <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="org" value="{{ $organization_id }}">
                                        <input type="hidden" name="league" value="{{ $league_id }}">
                                        <input type="hidden" name="user" value="{{ $user }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                        <input type="hidden" name="reg" value="{{$reg->id}}">
                        @else
                          <form action="/event/payment/{{$reg->id}}" method="POST">
                          <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                        @endif
                        <input type="hidden" name="discount" value="{{$reg->discount}}">

                        <div class="panel-heading">

                        </div>
                        <div class="panel-body">
                            <h4 class="panel_main panel-heading" style="background-color:brown">
                                <a data-toggle="collapse">
                                    <h4 class="panel-title" style="color:white; font-weight:600;">
                                        {{ $reg->league->name }} 
                                    </h4>
                                </a>
                            </h4>
                            <div class="row main" style="margin-bottom:20px">

                                {{-- Left column Track events --}}
                                <div class="col-md-6 left-col">

                                    <h5 class="track-col">
                                        <i class="fa fa-align-justify" aria-hidden="true" style="margin-right:8px;"></i>Track
                                        Events
                                    </h5>

                                 
                                   
                                    <?php
                                    $evens = array();
                                    foreach ($reg->events as $event) {
                                        $evens[] = $event->id;
                                    }
                                    ?>
                                   
                                    @foreach($reg->league->events as $event)
                                    @foreach ($event->ageGroups as $ageGroup)



                                    @if($reg->organization->athelaticsetting)
                                    @if($event->mainEvent->event_category_id==1)
                                    <?php
                                    $userGender = Auth::user()->gender == 'male' ? 1 : 2;
                                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->dob)->format('Y');
                                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $reg->league->to_date)->format('Y');
                                    $age = $league1 - $mine;

                                    $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                                    $userGender = Auth::user()->gender == 'male' ? 1 : 2;

                                    $exp = preg_split("/-/", $ageGroup->name);
                                    if (isset($exp[1])) {
                                        if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                    ?>
                                            <?php
                                            $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                            ?>


                                            @foreach($genders as $gender)
                                            @if($gender->gender_id==$userGender)
                                            @if($gender->status!=10)



                                            <input type="checkbox" name="events[]" id="events" class="live" data-field="{{$reg->organization->athelaticsetting->field_events}}" data-track="{{$reg->organization->athelaticsetting->track_events}}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $reg->organization->athelaticsetting->total_events ?>" value="{{ $event->id }}" {{ in_array($event->id , $evens)? "checked":"" }}>{{$event->mainEvent->name}} - @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp

                                            <br>
                                            @endif
                                            @endif
                                            @endforeach
                                        <?php
                                        }
                                    }

                                    if ($exp[0] == $age) {

                                        ?>
                                        <?php
                                        $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                        ?>


                                        @foreach($genders as $gender)
                                        @if($gender->gender_id==$userGender)
                                        @if($gender->status!=10)

                                        <input type="checkbox" name="events[]" id="events" class="live" data-field="{{$reg->organization->athelaticsetting->field_events}}" data-track="{{$reg->organization->athelaticsetting->track_events}}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $reg->organization->athelaticsetting->total_events ?>" value="{{ $event->id}}" {{ in_array($event->id , $evens)? "checked":"" }}>{{$event->mainEvent->name}} - @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                        <br>
@endif
                                        @endif
                                        @endforeach
                                    <?php
                                    }
                                    ?>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                </div>



                                <div class="col-md-6 right-col">

                                    <h5 class="field-col">
                                        <i class="fa fa-align-justify" aria-hidden="true" style="margin-right:8px;"></i>Field
                                        Events
                                    </h5>
                                    @foreach($reg->league->events as $event)

                                    @foreach ($event->ageGroups as $ageGroup)
                                    @if($reg->organization->athelaticsetting)
                                    @if($event->mainEvent->event_category_id==2)
                                    <?php
                                    $userGender = Auth::user()->gender == 'male' ? 1 : 2;
                                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->dob)->format('Y');
                                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $reg->league->to_date)->format('Y');
                                    $age = $league1 - $mine;

                                    $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                                    $userGender = Auth::user()->gender == 'male' ? 1 : 2;

                                    $exp = preg_split("/-/", $ageGroup->name);
                                    if (isset($exp[1])) {
                                        if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                    ?>
                                            <?php
                                            $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                            ?>


                                            @foreach($genders as $gender)
                                            @if($gender->gender_id==$userGender)
@if($gender->status!=10)
                                            <input type="checkbox" name="events2[]" id="events" class="live" data-track="{{$reg->organization->athelaticsetting->track_events}}" data-field="{{$reg->organization->athelaticsetting->field_events}}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $reg->organization->athelaticsetting->total_events ?>" value="{{ $event->id }}" {{ in_array($event->id , $evens)? "checked":"" }}>{{$event->mainEvent->name}} - @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                            <br>
@endif

                                            @endif
                                            @endforeach
                                        <?php
                                        }
                                    }

                                    if ($exp[0] == $age) {

                                        ?>
                                        <?php
                                        $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                        ?>


                                        @foreach($genders as $gender)
                                        @if($gender->gender_id==$userGender)
@if($gender->status!=10)
                                        <input type="checkbox" name="events2[]" class="live" data-field="{{$reg->organization->athelaticsetting->field_events}}" data-track="{{$reg->organization->athelaticsetting->track_events}}"  data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $reg->organization->athelaticsetting->total_events ?>" id="events" value="{{ $event->id }}" {{ in_array($event->id , $evens)? "checked":"" }}>{{$event->mainEvent->name}} - @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                        <br>

@endif
                                        @endif
                                        @endforeach
                                    <?php
                                    }
                                    ?>
                                    @endif
                                    @endif
                                    @endforeach
                                    @endforeach
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                </div>
                                <div class="col-md-6">
                                    @if(Auth::user()->club)
                                        <button type="submit" class="btn btn-labeled btn-primary">
                                        Update
                                        <span class="btn-label cool_btn_right">
                                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                        </span>
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-labeled btn-primary">
                                        Next
                                        <span class="btn-label cool_btn_right">
                                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                        </span>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>

        </div>

    </div>
</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>

 <script>
 document.addEventListener('contextmenu', (e) => e.preventDefault());

function ctrlShiftKey(e, keyCode) {
  return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
}

document.onkeydown = (e) => {
  // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
  if (
    event.keyCode === 123 ||
    ctrlShiftKey(e, 'I') ||
    ctrlShiftKey(e, 'J') ||
    ctrlShiftKey(e, 'C') ||
    (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
  )
    return false;
};
//       $(document).ready(function($) {
//         var $checkboxes = $("input[name='events[]']");
//         var org1 = $checkboxes.attr('data-org');
//          $achecked = $("input[name='events[]']").filter(':checked').length;
//          $bchecked = $("input[name='events2[]']").filter(':checked').length;
// if(org1==($achecked+$bchecked)){
//     $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//         $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
// }

// var totalGuest = 0;
// var field = 0;
// var track = 0;
// var $checkboxes = $("input[name='events[]']");
        
// $checkboxes.change(function() {
//     var chkbx = $(this);
//         chkbx.attr('data-id');
//         var fieldeve = chkbx.attr('data-field');
//         var trackeve = chkbx.attr('data-track');
//         var org = chkbx.attr('data-org');
//         track = $("input[name='events[]']").filter(':checked').length;
//         field = $("input[name='events2[]']").filter(':checked').length;
//     var length = track + field;
//     if (track == trackeve&&length == org) {
//         $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//         $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

//     }
//     else if(track == trackeve) {

//         $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//     }
//     else if (length == org) {

//         $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//          $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

//     }
//     else{

//         $("input[name='events[]']").not(':checked').attr("disabled", false);
//         $("input[name='events2[]']").not(':checked').attr("disabled", false); 
//     }
// });

// var $checks = $("input[name='events2[]']");
// $checks.change(function() {
//     var chkbx = $(this);

//     var fieldeve = chkbx.attr('data-field');
//         var trackeve = chkbx.attr('data-track');
//         var org = chkbx.attr('data-org');
//         field = $("input[name='events2[]']").filter(':checked').length;
//         track = $("input[name='events[]']").filter(':checked').length;
// length=field+track;
// if (field == fieldeve&&length == org) {

//         $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//         $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

//     }
//     else if(field == fieldeve) {

//         $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
//     }
//     else if (length == org) {

//         $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//         $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

//     }
             
//     else if(track==trackeve){

//         $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//         $("input[name='events2[]']").not(':checked').attr("disabled", false);


//     }
//     else{
//         $("input[name='events[]']").not(':checked').attr("disabled", false);
//         $("input[name='events2[]']").not(':checked').attr("disabled", false); 
//     }
// });


// });

//     // $(document).ready(function($) {
//     //     $length = $("input[type=checkbox]").filter(':checked').length;
//     //    if( $("input[name='events[]']").filter(':checked').length){ 
//     //     $no=$("input[name='events[]']").filter(':checked').length;
//     //     $no2=$("input[name='events2[]']").filter(':checked').length;
//     //     $("input[type=checkbox]").not(':checked').attr("disabled", "disabled");
//     //     // var totalGuest = 0;
//     // var field = $no2;
//     // var track = $no;
//     // // alert( field);

//     // var $checkboxes = $("input[name='events[]']");
//     // $checkboxes.click(function() {

//     //     if (this.checked) {
//     //         // $a = $("input[name='events[]']").filter(':checked').length;
//     //         // $b = $("input[name='events2[]']").filter(':checked').length;
//     //         // totalGuest++
//     //         // alert( $a);

//     //         var chkbx = $(this);

//     //         chkbx.attr('data-id');
//     //         var fieldeve = chkbx.attr('data-field');
//     //         var trackeve = chkbx.attr('data-track');
//     //         var org = chkbx.attr('data-org');
//     //         track++
//     //     } else {
//     //         var fieldeve = $("input[name='events[]']").attr('data-field');
//     //         var trackeve = $("input[name='events[]']").attr('data-track');
//     //         track--
//     //     }
//     //     // console.log(track);
//     //     // console.log(trackeve);
//     //     // $checkboxes.filter(":not(:checked)").prop("disabled", (track == trackeve) ? true : false);
//     //     if (track == trackeve&&length == org) {
//     //             $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//     //             $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

//     //         }
//     //         else if(track == trackeve) {
//     //             $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//     //         }
//     //         else if (length == org) {
//     //             $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//     //             // $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

//     //         }
//     //         else{
//     //             $("input[name='events[]']").not(':checked').attr("disabled", false);
//     //             $("input[name='events2[]']").not(':checked').attr("disabled", false); 
//     //         }
//     //     // $length = track + field;
//     //     // if ($length == org) {
//     //     //     $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
//     //     //     $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

//     //     // } else {
//     //     //     $("input[name='events2[]']").not(':checked').attr("disabled", false);
//     //     //     $("input[name='events[]']").not(':checked').attr("disabled", false);
//     //     // }
//     // });

//     // var $checks = $("input[name='events2[]']"); 
//     // $checks.change(function() {
//     //     if (this.checked) {
//     //         $b = $("input[name='events2[]']").filter(':checked').length;
//     //         $a = $("input[name='events[]']").filter(':checked').length;

//     //         // totalGuest++
//     //         var chkbx = $(this);
//     //         chkbx.attr('data-id');
//     //         var fieldeve = chkbx.attr('data-field');
//     //         var trackeve = chkbx.attr('data-track');
//     //         var org = chkbx.attr('data-org');

//     //         field++
//     //     } else {
//     //         $b = ($("input[name='events2[]']").filter(':checked').length) - 1;
//     //         field--
//     //     }
//     //     $checks.filter(":not(:checked)").prop("disabled", (field == fieldeve) ? true : false);
//     //     $length = field + track;
//     //     // alert($length);

//     //     if ($length == org) {
//     //         $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
//     //         $("input[name='events[]']").not(':checked').attr("disabled", "disabled");

//     //     } else {
//     //         $("input[name='events2[]']").not(':checked').attr("disabled", false);
//     //         $("input[name='events[]']").not(':checked').attr("disabled", false);
//     //     }
//     // });
    
//     //    }
       
  
//     // });
// </script>

<script>
      $(document).ready(function($) {
        var $checkboxes = $("input[name='events[]']");
        var org1 = $checkboxes.attr('data-org');
         $achecked = $("input[name='events[]']").filter(':checked').length;
         $bchecked = $("input[name='events2[]']").filter(':checked').length;
if(org1==($achecked+$bchecked)){
    $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
        $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
}

var totalGuest = 0;
var field = 0;
var track = 0;
var $checkboxes = $("input[name='events[]']");
        
$checkboxes.change(function() {
    var chkbx = $(this);
        chkbx.attr('data-id');
        var fieldeve = chkbx.attr('data-field');
        var trackeve = chkbx.attr('data-track');
        var org = chkbx.attr('data-org');
        track = $("input[name='events[]']").filter(':checked').length;
        field = $("input[name='events2[]']").filter(':checked').length;
    var length = track + field;
    if (track == trackeve&&length == org) {
        $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
        $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

    }
    else if(track == trackeve) {

        $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
    }
    else if (length == org) {

        $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
        $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

    }
    else{
                $("input[name='events[]']").not(':checked').attr("disabled", false);

                if(field == fieldeve) {
                $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
            }else{
                $("input[name='events2[]']").not(':checked').attr("disabled", false); 

            }
    }
});

var $checks = $("input[name='events2[]']");
$checks.change(function() {
    var chkbx = $(this);

    var fieldeve = chkbx.attr('data-field');
        var trackeve = chkbx.attr('data-track');
        var org = chkbx.attr('data-org');
        field = $("input[name='events2[]']").filter(':checked').length;
        track = $("input[name='events[]']").filter(':checked').length;
length=field+track;
if (field == fieldeve&&length == org) {

        $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
        $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

    }
    else if(field == fieldeve) {

        $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
    }
    else if (length == org) {

        $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
        $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

    }
             
    else if(track==trackeve){

        $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
        $("input[name='events2[]']").not(':checked').attr("disabled", false);


    }
    else{
        if(track==trackeve){
                    $("input[name='events[]']").not(':checked').attr("disabled", "disabled");

                }else{
                    $("input[name='events[]']").not(':checked').attr("disabled", false);

                }
                $("input[name='events2[]']").not(':checked').attr("disabled", false); 
            }
    
});
  
    });
</script>
@stop