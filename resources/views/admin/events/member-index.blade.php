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


{{-- Page content --}}
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
        <li class="active">All Events</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Events (Registering for {{$userDet->first_name}} {{$userDet->last_name}})

                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <div class="row">


                    <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs custom_tab" id="menu">
                            <li class="active">
                                <a class="panel-title" href="#tab1" data-toggle="tab">
                                    Future Events</a>
                            </li>
                            <li>
                                <a class="panel-title" href="#tab2" data-toggle="tab">
                                    Upcoming Events</a>
                            </li>
                            <li>
                                <a class="panel-title" href="#tab3" data-toggle="tab">
                                    Past Events</a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab3">
                                <div class="panel-body table-responsive">

                                    <table class="table table-striped table-bordered" id="table2">
                                        <thead class="thead-Dark">
                                        <tr>
                                            <th>Organization</th>
                                            <th>League</th>
                                            <th>Events</th>
                                            <th>Points</th>

                                        </tr>
                                        </thead>
                                      
                                        @if($upcomingEvents)
                                        <tr>
                                            @foreach($upcomingEvents as $upcomingEvent)
                                            @if ($upcomingEvent->league->to_date < Carbon\Carbon::now()) <td>
                                                {{ $upcomingEvent->organization->name }}
                                                </td>
                                                <td>
                                                    {{ $upcomingEvent->league->name }}
                                                    </td>
                                                <td>
                                                    @foreach($upcomingEvent->events as $event)
                                                    {{ $event->mainEvent->name }} - @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                                    <br>
                                                    @endforeach


                                                </td>
                                                
                                                <?php
                                                    $users = DB::table('age_group_gender_user')
                                                        ->where('league_id', $upcomingEvent->league_id)
                                                        ->where('user_id', $upcomingEvent->user->id)
                                                        ->get();
                                                        $total=0
                                                    ?>
                                                    @foreach ($users as $user)
                                                     <?php
                                                     $total+=$user->marks
                                                     ?>
                                                    <br>
                                                                                           
                                                    @endforeach
                                                    <td>  
{{ $total }}


                                                    </td>
                                               
                                                @endif
                                                @endforeach
                                        </tr>
                                        @endif

                                    </table>
                                </div>



                            </div>
                            <div class="tab-pane" id="tab2" disabled="disabled">
                                <h2 class="hidden">&nbsp;</h2>
                                <div class="panel-body table-responsive">
                                    <table class="table table-striped table-bordered" id="table2">
                                        <thead class="thead-Dark">
                                        <tr>
                                            <th>Organization</th>
                                            <th>League</th>
                                            <th>Events</th>
                                            <th>Venue</th>
                                            <th>Status</th>
                                            <th>Actions</th>

                                        </tr>
                                        </thead>
                                       
                                        @if($upcomingEvents)
                                        @foreach($upcomingEvents as $upcomingEvent)
                                        @if ($upcomingEvent->league->to_date > Carbon\Carbon::now())
                                        <tr>
                                            <td>
                                                {{ $upcomingEvent->organization->name }}


                                            </td>
                                            <td>
                                                {{ $upcomingEvent->league->name }}


                                            </td>
                                            <td>
                                                @foreach($upcomingEvent->events as $event)
                                                {{ $event->mainEvent->name }} - @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                                @php
                                                $userGender = $upcomingEvent->user->gender == 'male' ? 1 : 2;

                                                $genders=App\Models\AgeGroupGender::where('gender_id',$userGender)->get();
                                                $ageGroups=App\Models\AgeGroup::where('organization_id',Auth::user()->organization_id)->where('status',1)->get();
                                                $ids=array();
                                                foreach($ageGroups as $ageGroup){
                                                            $mine = Carbon\Carbon::createFromFormat('Y-m-d',  $upcomingEvent->user->dob)->format('Y');
                                                            $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                                                            $age = $league1 - $mine;
                                                            $exp = preg_split("/-/", $ageGroup->name);
                                                            if (isset($exp[1])) {
                                                                if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                                    $ids[]=$ageGroup->id;
                                                }
                                            }
                                            if ($exp[0] == $age) {
                                                $ids[]=$ageGroup->id;
                                            }
                                        }
                                        $time=array();
foreach($genders as $gender){
if($gender->ageGroupEvent->Event->id==$event->id){
if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1||$gender->ageGroupEvent->Event->mainEvent->event_category_id==2){

if(in_array($gender->ageGroupEvent->age_group_id,$ids)){
$time[]=$gender;
}

}
}
}
@endphp
                                               

@foreach($time as $ti)
@if($ti->time=="00:00:00")
@else
- ({{ $ti->time }})
@endif
@endforeach
<br>
@endforeach



                                            </td>
                                            <td>
                                                {{ $upcomingEvent->league->venue->name }}

                                            </td>
                                            <td>
                                                @if($upcomingEvent->status==0)
                                                <button class="btn btn-info">Not Paid</button>
                                                @endif
                                                @if($upcomingEvent->status==1)
                                                <button class="btn btn-primary">Processing</button>

                                                @endif
                                                @if($upcomingEvent->status==2)
                                                <button class="btn btn-success">Paid</button>

                                                @endif
                                                @if($upcomingEvent->status==4)
                                                <button class="btn btn-warning">Pending</button>

                                                @endif
                                                @if($upcomingEvent->status==3)
                                                <button class="btn btn-danger">Rejected</button>

                                                @endif
                                            </td>
                                            @if($upcomingEvent->status==4)
                                                                                                @if($upcomingEvent->league->reg_end_date > Carbon\Carbon::now()->format('Y-m-d')||$upcomingEvent->league->reg_end_date == Carbon\Carbon::now()->format('Y-m-d'))

                                           <td>
                                             <a
                                                                            href="/event/member/{{ $upcomingEvent->id }}/edit/{{$upcomingEvent->user_id}}">
                                                                            <button type="button" class="btn btn-primary"
                                                                                id="btn15">Edit</button></a>
                                                                                <button type="button" class=" btn btn-danger deltedRegister" data-id="{{ $upcomingEvent->id }}" >Delete</button>
                                           </td>
@endif
@endif
                                            @endif
                                            @endforeach
                                            @endif
                                        </tr>


                                    </table>

                                </div>
                            </div>
                            <div class="tab-pane fade active in" id="tab1">

                                <div class="panel-body">
                                    <div class="panel-group" id="accordion">
                                        @foreach ($organizations as $org)
                                        @if ($org->leagues->count() != null)
                                        {{-- <form id="myFormId" action="/event/member/payment/{{ $org->id }}/register" method="POST"> --}}
                                            <form action="/event/register/member/not-pay" method="POST">
                                              <input type="hidden" name="totalEvents" class="totalEvents">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" name="user" value="{{$userDet->id}}">

                                            <div class="fadInLeft">
                                                <div class="panel_main panel-heading org">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#{{ $org->id }}" data-id="{{ $org->id }}">
                                                            <div class="row">
                                                                <h4 class="panel-title" style="color:white; font-weight:600;">
                                                                    <span class="fa arrow">
   
                                                                    </span>
                                                                    <i class="material-icons text-light leftsize" style="color:white; margin-right:4px;">spa</i>{{ $org->name }}
                                                                </h4>
                                                            </div>
                                                        </a>
                                                </div>
                                                <div id="{{ $org->id }}" class="panel-collapse collapse show">
                                                    <div class="panel-body">
                                                        <?php
                                                    $leagues = $org->leagues->where('reg_start_date','<=',Carbon\Carbon::now()->format('Y-m-d'))->where('reg_end_date','>=',Carbon\Carbon::now()->format('Y-m-d'));
                                                        $count=0;
                                                        ?>
                                                            @foreach ($leagues as $league)

                                                            <?php
                                                            $regs = array();
                                                            ?>
                                                            @foreach($userDet->registrations as $registration)
                                                            <?php
                                                            $regs[] = $registration->league_id;
                                                            ?>
                                                            @endforeach
                                                            <?php
                                                            if (!in_array($league->id, $regs)) {
                                                                $userGender = $userDet->gender == 'male' ? 1 : 2;

                                                                $genders=App\Models\AgeGroupGender::where('gender_id',$userGender)->get();
                                                                $ageGroups=App\Models\AgeGroup::where('organization_id',$org->id)->where('status',1)->get();
                                                                $ids=array();
                                                                foreach($ageGroups as $ageGroup){
                                                                    $mine = Carbon\Carbon::createFromFormat('Y-m-d',  $userDet->dob)->format('Y');
                                                                            $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $league->to_date)->format('Y');
                                                                            $age = $league1 - $mine;
                                                                            $exp = preg_split("/-/", $ageGroup->name);
                                                                            if (isset($exp[1])) {
                                                                                if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                                                    $ids[]=$ageGroup->id;
                                                                }
                                                            }
                                                            if ($exp[0] == $age) {
                                                                $ids[]=$ageGroup->id;
                                                            }
                                                        }
                                                        $ages=array();
        foreach($genders as $gender){
            if($gender->ageGroupEvent->Event->league_id==$league->id){
                if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1||$gender->ageGroupEvent->Event->mainEvent->event_category_id==2){
                    if($gender->status==2){
        $ages[]=$gender->ageGroupEvent->age_group_id;
            }
                    
        }
        }
        }
        $vars=array();
        foreach($ages as $age){
            if(in_array($age,$ids)){
        $vars[]=$age;
            }
        }
        if(count($vars)>=1){
        
                                                            ?>
        
        
        
                                                                <h4 class="panel_main panel-heading" style="background-color:brown">
                                                                    <a data-toggle="collapse" data-parent="#{{$league->id}}" href="#{{ $league->id }}">
                                                                        <h4 class="panel-title" style="color:white; font-weight:600;">
                                                                            {{$league->name}}
                                                                        </h4>
                                                                    </a>
                                                                </h4>
                                                                <div class="row main" style="margin-bottom:20px">
        
                                                                    {{-- Left column Track events --}}
                                                                    <div class="col-md-6 left-col" style="padding: 20px;">
        
                                                                        <h5 class="track-col">
                                                                            <i class="fa fa-align-justify" aria-hidden="true" style="margin-right:8px;"></i>Track
                                                                            Events
                                                                        </h5>
        
        
                                                                        <div>
                                                                           
                                                                            @foreach ($league->events as $event)
                                                                            @foreach ($event->ageGroups as $ageGroup)
                                                                            @if ($org->athelaticsetting)
                                                                            @if ($event->mainEvent->event_category_id == 1)
        
                                                                            <?php
                                                                            $userGender = $userDet->gender == 'male' ? 1 : 2;
                                                                            // dd($userGender);
                                                                            $mine = Carbon\Carbon::createFromFormat('Y-m-d',  $userDet->dob)->format('Y');
                                                                            $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $league->to_date)->format('Y');
                                                                            $age = $league1 - $mine;
                                                                            $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                                                                            $exp = preg_split("/-/", $ageGroup->name);
                                                                            if (isset($exp[1])) {
                                                                                if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                                            ?>
                                                                                    <?php
                                                                                    $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                                                                    ?>
        
                                                                                    @foreach($genders as $gender)
                                                                                    @if($gender->gender_id==$userGender)
                                                                                    @if($gender->status==2)
                                                                                    <input type="hidden" name="gender" value="{{ $gender->id }}">
                                                                                    <input type="checkbox" name="events[]" id="events" class="live" data-league="{{ $league->id }}" data-track="{{ $org->athelaticsetting->track_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-field="{{ $org->athelaticsetting->field_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $org->athelaticsetting->total_events; ?>" value="{{ $event->id }}">{{ $event->mainEvent->name }}
                                                                                    -
                                                                                    @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
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
                                                                                @if($gender->status==2)
                                                                                <input type="hidden" name="gender" value="{{ $gender->id }}">
        
                                                                                <input type="checkbox" name="events[]" id="events" class="live" data-league="{{ $league->id }}" data-track="{{ $org->athelaticsetting->track_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-field="{{ $org->athelaticsetting->field_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $org->athelaticsetting->total_events; ?>" value="{{ $event->id }}">{{ $event->mainEvent->name }}
                                                                                @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
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
        
        
        
                                                                    <div class="col-md-6 col-sm-12 right-col" style="padding: 20px;">
        
                                                                        <h5 class="field-col col-sm-12">
                                                                            <i class="fa fa-align-justify" aria-hidden="true" style="margin-right:8px;"></i>Field
                                                                            Events
                                                                        </h5>
        
                                                                        @foreach ($league->events as $event)
        
                                                                        @foreach ($event->ageGroups as $ageGroup)
                                                                        @if ($org->athelaticsetting)
                                                                        @if ($event->mainEvent->event_category_id == 2)
                                                                        <?php
                                                                        $userGender =  $userDet->gender == 'male' ? 1 : 2;
                                                                        $mine = Carbon\Carbon::createFromFormat('Y-m-d',  $userDet->dob)->format('Y');
                                                                        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $league->to_date)->format('Y');
                                                                        $age = $league1 - $mine;
                                                                        $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                                                                        $exp = preg_split("/-/", $ageGroup->name);
                                                                        if (isset($exp[1])) {
                                                                            if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                                        ?>
                                                                                <?php
                                                                                $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                                                                ?>
        
                                                                                @foreach($genders as $gender)
                                                                                @if($gender->gender_id==$userGender)
                                                                                @if($gender->status==2)
        
                                                                                <input type="hidden" name="gender" value="{{ $gender->id }}">
        
                                                                                <input type="checkbox" name="events2[]" id="events" class="live" data-league="{{ $league->id }}" data-track="{{ $org->athelaticsetting->track_events }}" data-field="{{ $org->athelaticsetting->field_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $org->athelaticsetting->total_events; ?>" value="{{ $event->id }}">{{ $event->mainEvent->name }}
                                                                                -
                                                                                @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
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
                                                                            @if($gender->status==2)
        
                                                                            <input type="hidden" name="gender" value="{{ $gender->id }}">
        
                                                                            <input type="checkbox" name="events2[]" id="events" class="live" data-league="{{ $league->id }}" data-track="{{ $org->athelaticsetting->track_events }}" data-field="{{ $org->athelaticsetting->field_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $org->athelaticsetting->total_events; ?>" value="{{ $event->id }}">{{ $event->mainEvent->name }}
                                                                            @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
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
                                                                    <div class="row">
                                                                        <div class="pull-right">
                                                                            <button type="button" class="btn btn-labeled btn-primary terms">
                                                                                Next
                                                                                <span class="btn-label cool_btn_right">
                                                                                    <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
        
        
        
                                                            <?php
                                                            }
            
                                                               
                                                            }

         
                                                            ?>
                                                            @endforeach
   
   
                                                    </div>
                                                </div>
                                            </div>
                                     
                                         
                                               


                                                   
                                                       
                                                                <!--Modal: Login with Avatar Form-->
                                        <div style="padding-bottom:10px"></div>

                                        @endif


                                        @endforeach
                                    </form>

                                    </div>

                                </div>
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>
                    </div>





                </div>


            </div>
        </div>
    </div>
    </div>
    <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="modal-1" role="dialog"
    aria-labelledby="modalLabelfade" aria-hidden="true">
   <div class="modal-dialog" role="document">
       <div class="modal-content">
           <div class="modal-header bg-primary">
               <h4 class="modal-title" id="modalLabelfade">Event Registration confirmation</h4>
           </div>
           <div class="modal-body">
               <h4>Are you sure, you want to register below events?</h4>
              <table>
                                       <tbody id="rules"></tbody>
                                   </table>
             
           </div>
            <div class="modal-footer">
                   <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                   <button type="button" class="btn btn-primary yes" name="terms">Register</button>
               </div>
       </div>
   </div>
</div>
    <!--main content end-->
    </div>
    </div>
    </div>
    </div>
    </div>

</section>
@stop




{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->

<script>
        window.history.forward();
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
$(document).ready(function () {
$('#menu a[href="#{{ old('tab') }}"]').tab('show')
});
   $(document).ready(function($) {

        var totalGuest = 0;
        var field = 0;
        var track = 0;
        var $checkboxes = $("input[name='events[]']");
        var totalCheckboxes=new Array();
        var totalFields=new Array();
        var ids=new Array();
        var count=0;
        var count1=0;
        var fieldIds=new Array();
        $checkboxes.change(function() {
                            var league=$(this).attr('data-league');

            if (this.checked) {
                var league=$(this).attr('data-league');
                count++;
                if(count==1){
                    totalCheckboxes.push(league);
                    ids.push($(this).val());
                }
                else if(totalCheckboxes.includes(league)){
                    totalCheckboxes.push(league);
                    ids.push($(this).val());
                }
                else{
                    "chumma";
                }
                $a = $("input[name='events[]']").filter(':checked').length;
                $b = $("input[name='events2[]']").filter(':checked').length;

                // totalGuest++
                var chkbx = $(this);
                chkbx.attr('data-id');
                var fieldeve = chkbx.attr('data-field');
                var trackeve = chkbx.attr('data-track');
                var org = chkbx.attr('data-org');
                track++
            } else {
                if(totalCheckboxes.includes(league)){
                totalCheckboxes.splice($.inArray($(this).attr('data-league'),totalCheckboxes),1)
                                ids.splice($.inArray($(this).val(),ids),1)

                }
                  count--;
                
                $a = ($("input[name='events2[]']").filter(':checked').length) - 1;
                // totalGuest++
                var chkbx = $(this);
                chkbx.attr('data-id');
                var fieldeve = chkbx.attr('data-field');
                var trackeve = chkbx.attr('data-track');
                var org = chkbx.attr('data-org');
                track--
            }

            var length = totalCheckboxes.length + totalFields.length;

            if (totalCheckboxes.length == trackeve && length == org) {
                $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
                $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

            } else if (totalCheckboxes.length  == trackeve) {
                $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
            } else if (length == org) {
                $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
                $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

            } else {
                $("input[name='events[]']").not(':checked').attr("disabled", false);

                if (totalFields.length == fieldeve) {
                    $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
                } else {
                    $("input[name='events2[]']").not(':checked').attr("disabled", false);

                }
            }
            console.log(length);
 {{--  console.log(totalFields.length);    --}}
        });

        var $checks = $("input[name='events2[]']");
        $checks.change(function() {
                                        var league=$(this).attr('data-league');

            if (this.checked) {
                 var league=$(this).attr('data-league');
                count1++;
                if(count1==1){
                    totalFields.push(league);
                    fieldIds.push($(this).val());
                }
                else if(totalFields.includes(league)){
                    totalFields.push(league);
                    fieldIds.push($(this).val());
                }
                else{
                    "chumma";
                }
                $b = $("input[name='events2[]']").filter(':checked').length;
                $a = $("input[name='events[]']").filter(':checked').length;

                var chkbx = $(this);
                chkbx.attr('data-id');
                var fieldeve = chkbx.attr('data-field');
                var trackeve = chkbx.attr('data-track');
                var org = chkbx.attr('data-org');

                field++
            } else {
                if(totalFields.includes(league)){
                totalFields.splice($.inArray($(this).attr('data-league'),totalFields),1)
                                fieldIds.splice($.inArray($(this).val(),fieldIds),1)

                }
                  count1--;
                $b = ($("input[name='events2[]']").filter(':checked').length) - 1;
                var chkbx = $(this);
                chkbx.attr('data-id');
                var fieldeve = chkbx.attr('data-field');
                var trackeve = chkbx.attr('data-track');
                var org = chkbx.attr('data-org');
                field--
            }
            length = totalFields.length + totalCheckboxes.length;
            if (totalFields.length == fieldeve && length == org) {
                $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
                $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

            } else if (totalFields.length == fieldeve) {
                $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");
            } else if (length == org) {
                $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
                $("input[name='events2[]']").not(':checked').attr("disabled", "disabled");

            } else if ( totalCheckboxes.length == trackeve) {
                $("input[name='events[]']").not(':checked').attr("disabled", "disabled");
                $("input[name='events2[]']").not(':checked').attr("disabled", false);


            } else {
                if ( totalCheckboxes.length == trackeve) {
                    $("input[name='events[]']").not(':checked').attr("disabled", "disabled");

                } else {
                    $("input[name='events[]']").not(':checked').attr("disabled", false);

                }
                $("input[name='events2[]']").not(':checked').attr("disabled", false);
            }
            console.log(length);
 {{--  console.log(totalFields.length);    --}}
        });


    
    $(document).on('click', '.terms', function(e) {
        e.preventDefault();
        var sub_array = [];

        var inputElements = ids.concat(fieldIds);
 
        $.ajax({
            type: "GET",
            data: {
                "ids": inputElements
            },
            url: "/event/show/",

            success: function(response) {
                $("#rules").empty();
                $.each(response.events, function(key, item) {
                   var date=new Date(item.date);
                   var year=date.getFullYear();
                   var month=date.getMonth()+1;
                   var day=date.getDate();
                   var finalDate=(day+"."+month+"."+year);

                    var tr =
                        "<ul><li style='width:50%;font-size:15px;padding-right:15px;'>" +
                        item.main_event.name +'&nbsp' +'&nbsp' +'&nbsp' +'&nbsp' +'&nbsp' + finalDate+ "</li>";
                    $("#rules").append(tr);
                });
                $('#modal-1').modal('show');

            }
        });

    });
    $(document).on('click', '.yes', function() {
        
        $('.totalEvents').val(ids.concat(fieldIds));
         $(".yes").attr('disabled',true);
        $("form").submit();

    });
     });
$('.deltedRegister').on('click',  function() {
            var id = $(this).data('id');
            $('#deleted_id').val(id);
             $('#myModalDelete').modal('show');

        });

        $(document).on('click', '.deleted', function(e) {
            e.preventDefault();
            var id = $('#deleted_id').val();
            $.ajax({
                type: "GET",
                url: "/event/delete-register/" + id,
                data: {
                    'id': id
                },
                success: function(response) {
                    window.location.reload();
                }
            });

        });
</script>

<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Delete Registered Event</h4>
                </div>
                <input type="hidden" id="deleted_id">
                <input type='hidden' name='data_id' id="del_id" />
                <input name="_method" type="hidden" value="DELETE">

                <div class="modal-body">
                    Are you sure you want to delete this Registered Event?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger deleted" value='Yes' />
                </div>
            </div>
        </div>
    </div>
@stop

