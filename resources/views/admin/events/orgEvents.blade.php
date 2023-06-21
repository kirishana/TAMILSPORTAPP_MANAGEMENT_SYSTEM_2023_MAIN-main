@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
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
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />

@stop
<?php  
session_start();
?>
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.events') }}</h1>
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
                    <i class="material-icons  6:34 PM 9/24/2021">event</i>
                 {{ __('event.all_events') }}
                    <div style="float:right">
                        <a href="/event/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                            {{ __('sidebar.add_new') }}</a>
                    </div>
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="col-md-3">

                        <select id="season" class="form-control multiselect season" placeholder="">
                            <option value="0">{{ __('event.select_season') }}</option>
                            @foreach($seasons as $season)
                            <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="Select League">
                            <option value="0">{{ __('event.select_league') }}</option>

                            @foreach($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="event" class="form-control multiselect event" placeholder="Select Event" >
                            <option value="0">{{ __('event.select_event') }}</option>
                            @foreach($mainEvents as $mainEvent)
                            <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select Age Group" >
                            <option value="0">{{ __('event.select_age') }}</option>
                            @foreach($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3">
                        <select id="gender" class="form-control multiselect gender" placeholder="Select Gender" >
                            <option value="-1">{{ __('event.select_gender') }}</option>
                            @foreach($gender as $gender1)
                            <option value={{ $gender1->id }}>{{ $gender1->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="prize" class="form-control multiselect prize" placeholder="Prize Status" >
                            <option value="-1">{{ __('event.select_prize_status') }}</option>

                            <option value="1">Prize Given</option>
                            <option value="0">Prize Not Given</option>

                        </select>

                    </div>
                    <div class="col-md-3">
                        <select id="status" class="form-control multiselect status" placeholder="Event Status" >
                            <option value="0">{{ __('event.select_event_status') }}</option>

                            <option value="2">Not Started</option>
                            <option value="0">Pending</option>
                            <option value="1">Finished</option>
                            <option value="3">Heats Finalized</option>
                            <option value="10">Cancelled</option>


                        </select>

                    </div>
            

                    <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                        <a id="btn" style="cursor:pointer;margin-right:5px;"><img src="{{ asset('assets/images/print.png') }}" style="float: right;" class="img-responsive" />
                        </a>
                        <a href="/all-events/export" target="_blank"> <img src="{{ asset('assets/images/pdf.png') }}" style="float: right;margin-right:5px;" class="img-responsive" />
                        </a>

                        <a href="/all-events/excel"> <img src="{{ asset('assets/images/excel.png') }}" style="float: right;margin-right:5px;" class="img-responsive">
                        </a>
                    </div>
                </div>
                <br>
                <div class="row">        
                    <div class="col-md-3 pull-right">

                <a href="participant/export"  title="Export All Participants"> 
                    <button  class="btn btn-success" ><span  style="padding: 2px 6px;text-transform:none;color:white;"><img style="margin-top:0px" src="{{ asset('assets/images/icons/pdf.png') }}"> &nbsp; {{ __('event.export_all') }} </span></button>

                </a>
                    </div>
                </div>
                
                <div class="panel-body table-responsive">
                <table class="table table-striped table-bordered table-hover text-uppercase" id="leagues" width="100%">
    <thead class="thead-Dark">
        <tr>
            <th class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer"><span style="float: left;" id="name_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('event.event') }}</th>
            <th>{{ __('league.league') }}</th>
            <th>{{ __('event.event_org') }}</th>
            <th class="sorting" data-sorting_type="asc" data-column_name="gender" style="cursor: pointer"><span style="float: left;" id="gender_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('dashboard.gender') }}</th>
            <th class="sorting" data-sorting_type="asc" data-column_name="age_group" style="cursor: pointer"><span style="float: left;" id="age_group_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('sidebar.age_group') }}</th>
            <th>{{ __('event.date') }}</th>
            <th>{{ __('event.status') }}</th>
                <th>{{ __('event.judge') }}</th>
                <th>{{ __('event.starter') }}</th>
                <th class="sorting" data-sorting_type="asc" data-column_name="time" style="cursor: pointer"><span style="float: left;" id="time_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;{{ __('event.time') }}</th>
            <th class="participant">{{ __('event.rules') }}</th>
            <th class="participant">{{ __('event.prize_given') }}</th>
            <th class="participant">{{ __('event.export') }}</th>
           {{-- <th>Excel Expor</th> --}}
        </tr>
    <tbody id="sortUsers" class="events">
                    @include('admin.events.index3')
                    </tbody>
                </table>
                                            
                </div>
               

            </div>
</section>
  <div style="display:none;">
   @include('admin.events.printAllEvents')

  
</div>  
<?php
session_destroy();
?>
@stop
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
     function clear_icon(){
            $('#name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#age_group_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#gender_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
          
        }
    $(document).on('click', '.sorting', function () {
            $('.sorting.active').removeClass('active');
            $(this).addClass("active");  

            var column_name=$(this).data('column_name');
            var order_type=$(this).data('sorting_type');
            console.log(order_type);
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

//   $(".sorting").on('click', function() {
//        var value=$(this).val();
//         $.ajax({
//             type: 'GET',
//             url: '/event/sortBy',
//             data: {
                
//                 "value":value,

//             },
//             success: function(response) {
//                 $('.events').html(response['html']);
//                 $('#printLegaueEvents').html(response['html2']);
               
//             }
//         });
//     });

//   $(document).on('change', '#prizeGiven', function(e) {
//         e.preventDefault();
//         var id = $(this).attr('data-id');
//         var prize = $(this).val();
//         $.ajax({
//             type: "POST",
//             url: "/event/assign/prize/" + id,
//             data: {
//                 "prize": prize,
//                 "id": id,
//             },
//             success: function(response) {}
//         });
//     });

    $(document).on('change', '.toggle_btn', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var cancel = $(this).val();
        $.ajax({
            type: "POST",
            url: "/event/cancel/" + id,
            data: {
                "cancel": cancel,
                "id": id,
            },
            success: function(response) {}
        });
    });



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
        var multipleCancelButton = new Choices('#prize', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
        var multipleCancelButton = new Choices('#status', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });
       
    $("#btn").click(function() {
        $("#printLegaueEvents").print();
    });
    var obj = {};
    var leagueData;
    var seasonData ;
    var genderData ;
    var eventData ;
    var ageData ;
    var prizeData;
    var statusData;
    
    $("#season").on('change', function() {
       seasonData=$(".season option:selected").val();           
        leagueData=$(".league option:selected").val();

       ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
       
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
       
        
      
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
               
            }
        });
    });

    //country
    $("#league").on('change', function() {
    seasonData=$(".season option:selected").val();           
        leagueData=$(".league option:selected").val();

       ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
       
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
       
        
      
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
               
            }
        });
});
    
    //gender

    $("#gender").on('change', function() {
          seasonData=$(".season option:selected").val();           
        leagueData=$(".league option:selected").val();

       ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
       
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
       
        
      
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
               
            }
        });
    });
    //name

    //country
    $("#age").on('change', function() {
           seasonData=$(".season option:selected").val();           
        leagueData=$(".league option:selected").val();

       ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
       
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
       
        
      
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
               
            }
        });
    });
    $("#event").on('change', function() {

           seasonData=$(".season option:selected").val();           
        leagueData=$(".league option:selected").val();

       ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
       
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
       
        
      
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
               
            }
        });
    });
    //prize
    $(".prize").on('change', function() {
           seasonData=$(".season option:selected").val();           
        leagueData=$(".league option:selected").val();

       ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
       
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
       
        
      
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
               
            }
        });
    });
   

//status
$(".status").on('change', function() {
            seasonData=$(".season option:selected").val();           
        leagueData=$(".league option:selected").val();

       ageData=$(".age option:selected").val();
        eventData=$(".event option:selected").val();
        genderData=$(".gender option:selected").val();
        prizeData=$(".prize option:selected").val();
        statusData=$(".status option:selected").val();
       
        // alert(Data);
        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
        obj['prize'] = prizeData;
        obj['status'] = statusData;
       
        
      
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
               
            }
        });
    });

    </script>
    @stop

