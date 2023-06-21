@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.css' />
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
        <li class="active">Event Calender</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Event Calender
                </h4>

            </div>
            <br />
            <div class="panel-body table-responsive">

                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                  <div id="calender"></div>
                  <div class="col-md-1"></div>

                  </div>
                </div>

            </div>
</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/jquery.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/jquery-ui.min.js'></script>
<script src='https://fullcalendar.io/js/fullcalendar-3.1.0/fullcalendar.min.js'></script>

<script>
  $(document).ready(function(){
var eves=@json($events); 
console.log(eves); 
  $('#calender').fullCalendar({
    editable: true,
    displayEventTime: true,
    header:{
      left:'prev,next today',
      right:'month,agendaWeek,agendaDay',
      center:'title',
      

    },
   
    selectable: true,
   selectHelper: true,
    events:eves,
        timezone: 'UTC',
  });
 });
</script>


@stop