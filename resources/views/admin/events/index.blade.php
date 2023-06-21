@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')


<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />
<link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/advmodals.css') }}" rel="stylesheet" />
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
<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}" />
<link href="{{ asset('assets/css/pages/buttonbuilder2.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
<style>
    @media (max-width:340px) {
        .button-group .button {
            padding: 0 10px !important;
        }
    }

    .modal-body {
        word-break: break-all;
    }

    .tooltip {
        position: relative;
        display: inline-block;
        border-bottom: 1px dotted black;
    }

    .tooltip .tooltiptext {
        visibility: hidden;
        width: 120px;
        background-color: black;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px 0;

        /* Position the tooltip */
        position: absolute;
        z-index: 1;
    }

    .tooltip:hover .tooltiptext {
        visibility: visible;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
@stop


{{-- Page content --}}

@if (Auth::user()->hasRole(7))
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
        <div class="panel panel-primary " style="min-height: 900px;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Events
                </h4>

            </div>
            <br />
                                        @php
  $registeredDate=Auth::user()->created_at->format('Y');
    $currentYear=Carbon\Carbon::now()->format('Y');
    $membershipUpdatedYear=Auth::user()->membership_updated_year?Carbon\Carbon::parse(Auth::user()->membership_updated_year)->format('Y'):'';
    @endphp
    <input type="hidden" class="registeredDate" value="{{ $registeredDate }}">
     <input type="hidden" class="currentYear" value="{{ $currentYear }}">
     <input type="hidden" class="membership_updated_year" value="{{ $membershipUpdatedYear}}">
     @if(Auth::user()->organization->orgSetting)
     @if(Auth::user()->organization->orgSetting->active==1)
     <form action="/user/update/member-ship" method="POST">
      <input type="hidden" name="_method" value="PATCH" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
   <div class="modal fade pullUp" id="modal-7" role="dialog" aria-labelledby="modalLabelsticky">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title" id="modalLabelsticky">Membership Renewal</h4>
                    </div>
                    <div class="modal-body" style="margin-left:35px;">
                        <h4 >
                            {{Auth::user()->organization->orgSetting->extra_question }}
                        </h4>

                        <div class="radio" id="member">
                                                    <label><input type="radio" name="member" id="optionsRadiosInline1" value="1">Yes</label>
                                                    <label><input type="radio" name="member" id="optionsRadiosInline2" value="0">No</label>
                                                </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn  btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        @endif
        @endif
            <div class="panel-body table-responsive">
                <div class="row">


                    <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs custom_tab" id="nav-tab">
                            <li class="active">
                                <a class="panel-title" href="#tab1" data-toggle="tab">
                                    <span style="color:Black;">Future Events</span></a>
                            </li>

                            <li>
                                <a class="panel-title" href="#tab2" data-toggle="tab">
                                    <span style="color:Black;">Upcoming Events</span></a>
                            </li>
                            <li>
                                <a class="panel-title" href="#tab3" data-toggle="tab">
                                    <span style="color:Black;">Past Events</span></a>
                            </li>

                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tab3">
                                <div class="panel-body table-responsive">

                                    <table class="table table-striped text-uppercase table-bordered" id="table2">
                                        <thead class="thead-Dark">
                                            <tr>
                                                <th style="text-align:center;">Organization</th>
                                                <th style="text-align:center;">League</th>
                                                <th style="text-align:center;">Events</th>
                                                <th style="text-align:center;">Points</th>


                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($upcomingEventsOld as $upcomingEvent)
                                            <tr>

                                                @if ($upcomingEvent->league->to_date < Carbon\Carbon::now()) <td>
                                                    {{ $upcomingEvent->organization->name }}


                                                    </td>
                                                    <td>{{ $upcomingEvent->league->name }}</td>
                                                    <td>
                                                        @foreach ($upcomingEvent->events as $event)
                                                        {{ $event->mainEvent->name }} -
                                                        @php echo Carbon\Carbon::parse($event->league->to_date)->format('d.m.Y'); @endphp
                                                        <br>
                                                        @endforeach


                                                    </td>


                                                    <?php
                                                    $users = DB::table('age_group_gender_user')
                                                        ->where('league_id', $upcomingEvent->league_id)
                                                        ->where('user_id', Auth::user()->id)
                                                        ->get();
                                                    $total = 0;
                                                    ?>
                                                    @foreach ($users as $user)
                                                    <?php
                                                    $total += $user->marks;
                                                    ?>
                                                    <br>
                                                    @endforeach
                                                    <td>
                                                        {{ $total }}


                                                    @endif

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="tab-pane" id="tab2" disabled="disabled">
                                <h2 class="hidden">&nbsp;</h2>
                              
                                <div class="panel-body table-responsive">
                                    @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                    <table class="table table-striped table-bordered text-uppercase" id="table2">
                                        <thead class="thead-Dark">
                                            <tr>
                                                <th style="text-align: center;width:25%">Member</th>
                                                <th style="text-align: center;">Organization</th>
                                                <th style="text-align: center;">League</th>
                                                <th style="text-align: center;">Events</th>
                                                <th style="text-align: center;">Venue</th>
                                                <th style="text-align: center;">Payment Status</th>
                                                <th style="text-align: center;">Event Status</th>
                                                <th style="text-align: center;">Actions</th>


                                            </tr>
                                        </thead>
                                        <tbody class="text-uppercase">

                                            @foreach ($upcomingEvents as $upcomingEvent)
                                            @if ($upcomingEvent->league->to_date > Carbon\Carbon::now())
                                        <tr>
                                            <td style="width:25%">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</td>
                                            <td>
                                                {{ $upcomingEvent->organization->name }}
                                            </td>
                                            <td>
                                                {{ $upcomingEvent->league->name }}
                                            </td>
                                            <td>
                                                @foreach ($upcomingEvent->events as $event)
                                                {{ $event->mainEvent->name }} -  @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                                @php
                                                    $ageGroups=App\Models\AgeGroup::where('organization_id',Auth::user()->organization_id)->where('status',1)->get();
                                                    $ids=array();
                                                    foreach($ageGroups as $ageGroup){
                                                                $mine = Carbon\Carbon::createFromFormat('Y-m-d',  Auth::user()->dob)->format('Y');
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
        if($gender->status==2){

if(in_array($gender->ageGroupEvent->age_group_id,$ids)){
$time[]=$gender;
}
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
                                                    @if ($upcomingEvent->status == 4)
                                                    <button class="btn btn-info">Pending</button>
                                                    @endif
                                                    @if ($upcomingEvent->status == 1)
                                                    <button class="btn btn-primary">Processing</button>
                                                    @endif
                                                    @if ($upcomingEvent->status == 2)
                                                    <button class="btn btn-success">Paid</button>
                                                    @endif
                                                    @if ($upcomingEvent->status == 3)
                                                    <button class="btn btn-danger">Rejected</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($upcomingEvent->is_approved == 2)
                                                    <button class="btn btn-primary">Waiting for Club Admin Approval</button>
                                                    @endif
                                                    @if ($upcomingEvent->is_approved == 1)
                                                    <button class="btn btn-success">Approved</button>
                                                    @endif
                                                   
                                                </td>
  @if($upcomingEvent->is_approved == 2)
@if($upcomingEvent->status==4 )
@if ($upcomingEvent->league->reg_end_date > Carbon\Carbon::now()->format('Y-m-d') || $upcomingEvent->league->reg_end_date == Carbon\Carbon::now()->format('Y-m-d'))
                                                <td>
                                                    <a href="/event/{{ $upcomingEvent->id }}/edit">
                                                        <button type="button" class="btn btn-primary" id="btn15">Edit</button></a>
                                                    <button type="button" class=" btn btn-danger deltedRegister" data-id="{{ $upcomingEvent->id }}">Delete</button>
                                                </td>
                                                @endif
                                                @endif
                                                @endif
                                                @endif
                                                @endforeach
                                            </tr>
                                            @if (Auth::user()->children)
                                            @php
                                            $members = Auth::user()->children;
                                            @endphp
                                            @foreach ($members as $member)
                                            @php
                                            $upcomingEves = App\User::find($member->id) ? App\User::find($member->id)->registrations : '';

                                            @endphp
                                            @foreach ($upcomingEves as $upcomingEvent)
                                            @if ($upcomingEvent->league->to_date > Carbon\Carbon::now())
                                            <tr>
                                                <td style="width:25%">{{ $member->first_name }}
                                                    {{ $member->last_name }}
                                                </td>
                                                <td>
                                                    {{ $upcomingEvent->organization->name }}


                                                </td>
                                                <td>
                                                    {{ $upcomingEvent->league->name }}


                                                </td>
                                                <td>
                                                    @foreach ($upcomingEvent->events as $event)
                                                    {{ $event->mainEvent->name }} -
                                                    @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp

                                                   
                                                    @php
                                                    $userGender = $member->gender == 'male' ? 1 : 2;

                                                    $genders=App\Models\AgeGroupGender::where('gender_id',$userGender)->get();
                                                    $ageGroups=App\Models\AgeGroup::where('organization_id',Auth::user()->organization_id)->where('status',1)->get();
                                                    $ids=array();
                                                    foreach($ageGroups as $ageGroup){
                                                                $mine = Carbon\Carbon::createFromFormat('Y-m-d',  $member->dob)->format('Y');
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
                                                    @if ($upcomingEvent->status == 0)
                                                    <button class="btn btn-info">Not
                                                        Paid</button>
                                                    @endif
                                                    @if ($upcomingEvent->status == 1)
                                                    <button class="btn btn-primary">Processing</button>
                                                    @endif
                                                    @if ($upcomingEvent->status == 2)
                                                    <button class="btn btn-success">Paid</button>
                                                    @endif
                                                    @if ($upcomingEvent->status == 4)
                                                    <button class="btn btn-info">Pending</button>
                                                    @endif
                                                    @if ($upcomingEvent->status == 3)
                                                    <button class="btn btn-danger">Rejected</button>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($upcomingEvent->is_approved == 2)
                                                    <button class="btn btn-primary">Waiting for Club Admin Approval</button>
                                                    @endif
                                                    @if ($upcomingEvent->is_approved == 1)
                                                    <button class="btn btn-success">Approved</button>
                                                    @endif
                                                   
                                                </td>
                                                <!--                                            @if ($upcomingEvent->status == 4)
    -->
                                                <!--                                            <td> <a href="/event/{{ $upcomingEvent->id }}/edit/{{ $upcomingEvent->user_id }}">Edit</a></td>-->
                                                <!--
    @endif-->
                                                @endif
                                                @endforeach
                                                @endforeach
                                                @endif
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>

                            <div class="tab-pane fade active in" id="tab1">


                                <div class="panel-group" id="accordion1">
                                    @foreach ($organizations as $org)
                                    @if ($org->leagues->count() != null)
                                    {{-- <form id="myFormId" action="/event/payment/{{ $org->id }} /register" method="POST"> --}}
                                        <form action="/event/register/not-pay" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="totalEvents" class="totalEvents">
                                        <div class="fadInLeft">
                                            <div class="panel_main panel-heading org ">
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
                                                    $count = 0;
                                                    ?>
                                                    @foreach ($leagues as $league)
                                                    <?php
                                                    $regs = array();
                                                    ?>
                                                    @foreach(Auth::user()->registrations as $registration)
                                                    <?php
                                                    $regs[] = $registration->league_id;
                                                    ?>
                                                    @endforeach
                                                    <?php
                                                    if (!in_array($league->id, $regs)) {
                                                        $userGender = Auth::user()->gender == 'male' ? 1 : 2;

                                                        $genders=App\Models\AgeGroupGender::where('gender_id',$userGender)->get();
                                                        $ageGroups=App\Models\AgeGroup::where('organization_id',$org->id)->where('status',1)->get();
                                                        $ids=array();
                                                        foreach($ageGroups as $ageGroup){
                                                            $mine = Carbon\Carbon::createFromFormat('Y-m-d',  Auth::user()->dob)->format('Y');
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
// dd(count($vars));
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
                                                                    @if ($event->mainEvent->event_category_id == 1)

                                                                    <?php
                                                                    $userGender = Auth::user()->gender == 'male' ? 1 : 2;
                                                                    // dd($userGender);
                                                                    $mine = Carbon\Carbon::createFromFormat('Y-m-d',  Auth::user()->dob)->format('Y');
                                                                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $league->to_date)->format('Y');
                                                                    $age = $league1 - $mine;
                                                                    $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                                                                    $exp = preg_split("/-/", $ageGroup->name);
                                                                    if (isset($exp[1])) {
                                                                        if (($exp[0] < $age ) && ($exp[1] == $age || $exp[1] > $age)) {
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

                                                                        <input type="checkbox" name="events[]" id="events" class="live" data-track="{{ $org->athelaticsetting->track_events }}" data-league="{{ $league->id }}" data-id="{{ $event->mainEvent->event_category_id }}" data-field="{{ $org->athelaticsetting->field_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $org->athelaticsetting->total_events; ?>" value="{{ $event->id }}">{{ $event->mainEvent->name }}
                                                                        @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                                                        <br>
                                                                        @endif
                                                                        @endif
                                                                        @endforeach
                                                                    <?php
                                                                    }
                                                                    ?>
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
                                                                @if ($event->mainEvent->event_category_id == 2)
                                                                <?php
                                                                $userGender =  Auth::user()->gender == 'male' ? 1 : 2;
                                                                $mine = Carbon\Carbon::createFromFormat('Y-m-d',  Auth::user()->dob)->format('Y');
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

                                                                        <input type="checkbox" name="events2[]" id="events" class="live" data-track="{{ $org->athelaticsetting->track_events }}" data-league="{{ $league->id }}" data-field="{{ $org->athelaticsetting->field_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $org->athelaticsetting->total_events; ?>" value="{{ $event->id }}">{{ $event->mainEvent->name }}
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

                                                                    <input type="checkbox" name="events2[]" id="events" class="live" data-track="{{ $org->athelaticsetting->track_events }}" data-league="{{ $league->id }}" data-field="{{ $org->athelaticsetting->field_events }}" data-id="{{ $event->mainEvent->event_category_id }}" data-org="<?php echo $org->athelaticsetting->total_events; ?>" value="{{ $event->id }}">{{ $event->mainEvent->name }}
                                                                    @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                                                                    <br>
                                                                    @endif
                                                                    @endif
                                                                    @endforeach
                                                                <?php
                                                                }
                                                                ?>
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


                                        <div style="padding-bottom:10px"></div>
                                        @endif
                                        @endforeach
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="modal-1" role="dialog" aria-labelledby="modalLabelfade" aria-hidden="true">
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
    <div class="modal fade" id="mine" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
            <!--Content-->
            <div class="modal-content">

                <div class="modal-header" style="border-bottom:none">
                    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">
                        confirmation</h2>

                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">


                    <div class="md-form ml-0 mr-0">
                        <div class="row">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">

                            </div>
                        </div>

                    </div>
                    <br>
                    <br>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox">Agree terms &
                            conditions
                        </div>
                    </div>
                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login with Avatar Form-->
    </div>
    </div>
    </div>
    </div>
    </div>

</section>
@stop
@elseif(Auth::user()->hasRole(4))
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
                    Events
                    <div style="float:right">
                        <a href="/event/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                            Add New</a>
                    </div>
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <div class="row">

                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="Select League">
                            <option value="0">Select League</option>

                            @foreach ($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="event" class="form-control multiselect event" placeholder="Select Event" >
                            <option value="0">Select Event</option>
                            @foreach ($mainEvents as $mainEvent)
                            <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select Age Group" >
                            <option value="0">Select AgeGroup</option>
                            @foreach ($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3">
                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender">
                            <option value="0">Select Gender</option>
                            @foreach ($gender as $gender1)
                            <option value={{ $gender1->id }}>{{ $gender1->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="starterid" class="form-control multiselect starterid" placeholder="Select Starter">
                            <option value="0">Select Starter</option>
                            @foreach ($starters as $judge)
                            <option value={{ $judge->id }} data-name={{ $judge->first_name }}>
                                {{ $judge->first_name }}
                            </option>
                            @endforeach


                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="judgeid" class="form-control multiselect judgeid" placeholder="Select judge" >
                            <option value="0">Select Judge</option>
                            @foreach ($judges as $judge)
                            <option value={{ $judge->id }} data-name={{ $judge->first_name }}>
                                {{ $judge->first_name }}
                            </option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-md-3">
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search Events" />
                        </div> -->

                    <div class="col-md-3 pull-right" style="margin-top:30px;">
                        <a href="/all-events/excel"> <img src="{{ asset('assets/images/excel.png') }}" style="float: right;margin-right:5px;" class="img-responsive" />
                        </a>
                        <a href="/all-events/export" target="_blank"> <img src="{{ asset('assets/images/pdf.png') }}" style="float: right;margin-right:5px;" class="img-responsive" />
                        </a>
                        <a id="btn" style="cursor:pointer"><img src="{{ asset('assets/images/print.png') }}" style="float: right;margin-right:5px;" class="img-responsive" />
                        </a>
                    </div>

                </div>
                {{-- <div class="row">
                    <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">

                        <a href="participant/export" title="Export All Participants">
                            <button class="btn btn-primary"><span style="padding: 2px 6px;text-transform:none;color:white;">Export All
                                    Participants </span></button>

                        </a>
                    </div>
                </div> --}}
                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered text-uppercase " id="leagues">
    <thead class="thead-Dark">
        <tr>
        <th class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer"><span style="float: left;" id="name_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; Event Name</th>
            <th>League Name</th>
            <th class="sorting" data-sorting_type="asc" data-column_name="gender" style="cursor: pointer"><span style="float: left;" id="gender_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; Gender</th>
            <th class="sorting" data-sorting_type="asc" data-column_name="age_group" style="cursor: pointer"><span style="float: left;" id="age_group_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; Age Group</th>
            <th>Date</th>
            <th>Status</th>
            @if (Auth::user()->hasAnyPermission(['view','Assign-event']))

            <th >Judge</th>
            <th>Starter</th>
            <th>Time</th>

            @endif
            <th>Rules</th>
            <th>Prize Given</th>
            <th>Export Participants</th>
        </tr>
    </thead>
    <tbody class="events">
                    @include('admin.events.eventOrganizer')
                    </tbody>

</table>
                </div>
                <div style="display:none;">
                    @include('admin.events.eventOrganizerPrint')

                </div>

            </div>
</section>


<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Assign People</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <input type="hidden" id="id">
                    <input name="_method" type="hidden" value="PUT">
                    <div class="row">
                        <div class="col-md-6">
                            <select id="judge" name="judge">
                                <option>Select Judge</option>
                                @foreach ($judges as $judge)
                                <option value="{{ $judge->id }}">{{ $judge->first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select id="starter" name="starter">
                                <option>Select Starter</option>
                                @foreach ($starters as $judge)
                                <option value="{{ $judge->id }}">{{ $judge->first_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="control-label" for="inputEmail3">Starting Time*</label>
                            <input type="time" name="time" class="form-control" id="time">
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login with Avatar Form-->

@stop
@else
@endif
@section('footer_scripts')

<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}">
</script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}">
</script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}">
</script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}">
</script>

<script type="text/javascript" src="{{ asset('assets/vendors/modal/js/classie.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>

<script>
            window.history.forward();

    $(document).ready(function(){
        var currentYear=$('.currentYear').val();
        var registeredDate=$('.registeredDate').val();
        var membershipUpdatedYear=$('.membership_updated_year').val();
        if(registeredDate!=currentYear){
            if(membershipUpdatedYear!=currentYear){
        $("#modal-7").modal('show');
        }
        }
    });
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
$('.deltedRegister').on('click', function() {
        var id = $(this).data('id');
        $('#deleted_id').val(id);
         $('#varu').modal('show');

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

   function clear_icon(){
            $('#name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#age_group_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#gender_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
          
        }
    $(document).on('click', '.sorting', function () {
            // $('.sorting.active').removeClass('active');
            // $(this).addClass("active");  

            var column_name=$(this).data('column_name');
            var order_type=$(this).data('sorting_type');
            var reverse_order='';
            if (order_type=='asc') {
                $(this).data('sorting_type','desc');
                reverse_order='desc';
                clear_icon();
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-up"></i></span>');
                
            }
            if (order_type=='desc') {
                $(this).data('sorting_type','asc');
                reverse_order='asc';
                clear_icon();
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-down"></i></span>');

            }
          
            $.ajax({
            type: 'GET',
            url: '/event/sortBy',
            data: {
                
                "order_type":order_type,
                "column_name":column_name,

            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
               
            }
        });
        });
    
     $(document).ready(function() {
        $('#nav-tab a[href="#{{ old('tab') }}"]').tab('show')
    });
    //             $(document).ready(function() {

    //    $('.suvarna').each(function () { //select current collapsed (some versions could be .show instead of .in
    //             // $(this).find('h1').each(function () {
    //                 var len=$(this).find('div').length;
    //                 var div=$(this).find('div');
    //                if(len==0){
    //                 $(this).parent().find('h5').hide();
    //                 $(this).children().find('h6').css('color','red');

    //                }

    //     });

    //     $('.suvarna1').each(function () { //select current collapsed (some versions could be .show instead of .in
    //             // $(this).find('h1').each(function () {
    //                 var len1=$(this).find('div').length;
    //                 var div=$(this).find('div');
    //                 $(this).children().find('h6').css("color", "red");
    //                 // $(this).child().find('h6').css('color','red');

    //                if(len1==0){
    //                 $(this).parent().find('h5').hide();
    //                 // $(this).find('h6').css('color','red');

    //                }

    //     });
    // });
   
    $(document).ready(function() {

        var multipleCancelButton = new Choices('#season', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#league', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#gender', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#age', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#event', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#starterid', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#judgeid', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

    });
    $("#btn").click(function() {
        $("#printLegaueEvents").print();
    });
    var obj = {};
    var leagueData;
    var seasonData;
    var genderData;
    var eventData;
    var ageData;
    var prizeData;
    var statusData;
    var starterData;
    var judgeData;
    $("#season").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
      
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });

    //country
    $("#league").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
     

        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
              

            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });
    //gender

    $("#gender").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
      

        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
               

            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });
    //name

    //country
    $("#age").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
       
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
               


            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });

    });
    $("#event").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
      
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });
    //prize
    $(".prize").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
       
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });
    $("#starterid").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
       
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });
    $("#judgeid").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
     
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });

    //status
    $(".status").on('change', function() {
        seasonData= $(".season option:selected").val();
        leagueData=$(".league option:selected").val();
        ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
        starterData=$(".starterid option:selected").val();
        judgeData=$(".judgeid option:selected").val();
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
        obj['starterid'] = starterData;
        obj['judgeid'] = judgeData;
       
        $.ajax({
            type: 'POST',
            url: '/search',
            data: {
                "_token": "{{ csrf_token() }}",

                "obj": obj,
               
            },
            success: function(response) {
                $('.events').html(response['html']);
                $('#printLegaueEvents').html(response['html2']);
                var table = document.getElementById("sortUsers");
                for (var i = 0; i < table.rows.length; i++) {

                    var len = table.rows[i].cells[11].textContent.replace(/\s{2,}/g, ' ');

                    table.rows[i].cells[12].innerHTML = parseInt(len.length / 8);
                }
                var print = document.getElementById("printEvents");

                for (var i = 0; i < print.rows.length; i++) {

                    var len = print.rows[i].cells[3].textContent.replace(/\s{2,}/g, ' ');
                    print.rows[i].cells[4].innerHTML = parseInt(len.length / 8);


                }
            }
        });
    });
    $("#printBtn").click(function() {
        $("#users").print();
    });





    $(document).on('click', '.update', function(e) {
        e.preventDefault();
        var id = $('#id').val();
        var judge = $('#judge').val();
        var starter = $("#starter").val();
        var time = $("#time").val();
        var method = $('#_method').val();
        $.ajax({
            type: "POST",
            url: "/event/assign/" + id,
            data: {
                "_token": "{{ csrf_token() }}",
                "judge": judge,
                "starter": starter,
                "id": id,
                "time": time,
                "method": method
            },

            dataType: "json",
            success: function(response) {
                // window.location.href = response.url;
                $('#rules').hide();

            }
        });
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


<div class="modal fade" id="varu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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