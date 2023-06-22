@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Event Cancellation
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')

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
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
@stop
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
        <li class="active">Event Cancellation</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15" >
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">event</i>
                    {{ __('sidebar.event_cancel') }}
                </h4>
            </div>
            <br />
                <div class="row">
                   
                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="">
                            <option value="0">Select League</option>

                            @foreach($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="event" class="form-control multiselect event" placeholder="" >
                            <option value="0">Select Event</option>
                            @foreach($mainEvents as $mainEvent)
                            <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="" >
                            <option value="0">Select Age Group</option>
                            @foreach($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-3">
                        <select id="gender" class="form-control multiselect gender" placeholder="" >
                            <option value="0">Select Gender</option>
                            @foreach($gender as $gender1)
                            <option value={{ $gender1->id }}>{{ $gender1->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    {{-- <div class="col-md-2">
                        <select id="gender" class="form-control multiselect status" placeholder="Select Status" multiple>
                            <option value="duplicate7">all</option>

                            <option value="2">Not Started</option>
                            <option value="0">Pending</option>
                            <option value="1">Finished</option>
                            <option value="10">Cancelled</option>


                        </select>

                    </div>
 --}}
<div class="row">
    <div class="col-md-9">
    </div>
                    <div class="col-md-3 pull-right" style="margin-top: 35px; display:flex; justify-content:flex-end;">
                       <a id="print" style="cursor:pointer"><img src="{{ asset('assets/images/print.png') }}" style="float: right;margin-right:5px;" class="img-responsive" />
                        </a>
                        <a href="/all-events/cancel/export" target="_blank"> <img src="{{ asset('assets/images/pdf.png') }}" style="float: right;margin-right:5px;" class="img-responsive" />
                        </a>

                        <a href="/all-events/cancel/excel"> <img src="{{ asset('assets/images/excel.png') }}" style="float: right;margin-right:5px;" class="img-responsive" />
                        </a>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table table-bordered text-uppercase table-striped table-responsive"  id="leagues" width="100%">
    <thead style="background-color: #515763; color: white;">
        <tr class="filters" style="text-align: center">
<tr>
   
    <th class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer"><span style="float: left;" id="name_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('event.event') }}</th>
    <th class="sorting" data-sorting_type="asc" data-column_name="league_id" style="cursor: pointer"><span style="float: left;" id="league_id_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('league.league') }}</th>
    <th class="sorting" data-sorting_type="asc" data-column_name="gender_id" style="cursor: pointer"><span style="float: left;" id="gender_id_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('dashboard.gender') }}</th>
    <th style="width:10%"  class="sorting" data-sorting_type="asc" data-column_name="age_group_id" style="cursor: pointer"><span style="float: left;" id="age_group_id_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;  {{ __('masterdata.age_group') }}</th>
    <th class="sorting" data-sorting_type="asc" data-column_name="date" style="cursor: pointer"><span style="float: left;" id="date_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('sidebar.date') }}</th>
    <th>{{ __('sidebar.status') }}</th>    
    <th>{{ __('sidebar.participants') }}</th>

    <!-- <th style="width:10%" class="sorting" data-sorting_type="asc" data-column_name="count" style="cursor: pointer"><span style="float: left;" id="count_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; Participants</th> -->
           @if (Auth::guard('web')->user()->can('edit-cancellation'))     
    <th style="width:4%">{{ __('sidebar.event_cancel') }}</th>
    @endif
</tr>
<tbody id="sortUsers" class="events" style="text-transform:capitalize;">
                    @include('admin.events.eventCancel.filter')
                    </tbody>
                    </table>
                </div>
                </section>
 <div style="display:none;">
    @include('admin.events.eventCancel.print')
</div> 
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal"><span
                     aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <h4 class="modal-title" id="myModalLabel"> Event Cancellation</h4>
         </div>
         <input type="hidden" id="id">
         <input type="hidden" id="value">

         <div class="modal-body">
             Are you sure you want to cancel this event?
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
             <input type="submit" class="btn btn-danger cancel" value='Yes' />
         </div>
     </div>
 </div>
</div>

@stop
@section('footer_scripts')

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
        integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
$('.deleteAll').on('change', function() {
        var ids=$("input[name='deleteIds[]']").prop('checked', $(this).prop("checked"));
    });
    $(document).on('click', '.delete', function(e) {
            $('#myModalDelete').modal('show');
        var checkedValues = new Array();
        $("input[name='deleteIds[]']").filter(':checked').each(function() {          
            var id = $(this).attr('data-id');
            checkedValues.push(id);
        }); 
        $('#id').val(checkedValues);  
   
             
    });
    

    function clear_icon(){
            $('#name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#age_group_id_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#gender_id_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#date_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#count_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#league_id_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
          
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
            url: '/eventCancel/sortBy',
            data: {
                
                "order_type":order_type,
                "column_name":column_name,

            },
            success: function(response) {
                $('.events').html(response['html']);
                $('.cancelledEvents').html(response['html2']);
               
            }
        });
        });

    $(document).on('click', '.cancel', function(e) {
        e.preventDefault();
        var id = $('#id').val();
        $.ajax({
            type: "POST",
            url: "/event/cancel",
            data: {
                "id": id,
            },
            success: function(response) {
                window.location.reload();
                // $("#leagues").load(location.href + " #leagues");
             

            }
        });
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
       
    $("#print").click(function() {
        // alert("ji");
        $(".cancelledEvents").print();
    });
    var obj = {};
    var leagueData;
    var genderData;
    var eventData;
    var ageData;
    var statusData;
    var starterData;
    var judgeData;


    //country
    $("#league").on('change', function() {
       
leagueData=$(".league option:selected").val();

ageData=$(".age option:selected").val();
eventData=$(".event option:selected").val();
genderData=$(".gender option:selected").val();


obj['league'] = leagueData;
obj['gender'] = genderData;
obj['age'] = ageData;
obj['event'] = eventData;


$.ajax({
type: 'POST',
url: '/event-cancel/search',
data: {
    "_token": "{{ csrf_token() }}",

    "obj": obj,

},
success: function(response) {
    $('.events').html(response['html']);
     $('.cancelledEvents').html(response['html2']);
  
}
});
    });

    //gender

    $("#gender").on('change', function() {
      leagueData=$(".league option:selected").val();

ageData=$(".age option:selected").val();
eventData=$(".event option:selected").val();
genderData=$(".gender option:selected").val();


obj['league'] = leagueData;
obj['gender'] = genderData;
obj['age'] = ageData;
obj['event'] = eventData;


$.ajax({
type: 'POST',
url: '/event-cancel/search',
data: {
    "_token": "{{ csrf_token() }}",

    "obj": obj,

},
success: function(response) {
   
    $('.events').html(response['html']);
    $('.cancelledEvents').html(response['html2']);
}
});
    });
    //name

    //country
    $("#age").on('change', function() {
        leagueData=$(".league option:selected").val();

ageData=$(".age option:selected").val();
eventData=$(".event option:selected").val();
genderData=$(".gender option:selected").val();


obj['league'] = leagueData;
obj['gender'] = genderData;
obj['age'] = ageData;
obj['event'] = eventData;


$.ajax({
type: 'POST',
url: '/event-cancel/search',
data: {
    "_token": "{{ csrf_token() }}",

    "obj": obj,

},
success: function(response) {
    $('.events').html(response['html']);
    $('.cancelledEvents').html(response['html2']);
  
}
});

    });
    $("#event").on('change', function() {
       leagueData=$(".league option:selected").val();

ageData=$(".age option:selected").val();
eventData=$(".event option:selected").val();
genderData=$(".gender option:selected").val();


obj['league'] = leagueData;
obj['gender'] = genderData;
obj['age'] = ageData;
obj['event'] = eventData;


$.ajax({
type: 'POST',
url: '/event-cancel/search',
data: {
    "_token": "{{ csrf_token() }}",

    "obj": obj,

},
success: function(response) {
  
    $('.events').html(response['html']);
    $('.cancelledEvents').html(response['html2']);
}
});
    });

    </script>

    @stop

