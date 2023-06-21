@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
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

                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive" style="min-height:800px ;">
                <div class="row">
                    <div class="col-md-3">

                        <select id="season" class="form-control multiselect season" placeholder="Select Season">
                            <option value="0">Select Season</option>
                            @foreach($seasons as $season)
                            <option value={{ $season->id }} data-name={{ $season->name }}>{{ $season->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="league" class="form-control multiselect league" placeholder="Select League" >
                            <option value="0">Select League</option>

                            @foreach($leagues as $league)
                            <option value={{ $league->id }}>{{ $league->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">

                        <select id="event" class="form-control multiselect event" placeholder="Select Event" >
                            <option value="0">Select Event</option>
                            @foreach($mainEvents as $mainEvent)
                            <option value={{ $mainEvent->id }}>{{ $mainEvent->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select id="age" class="form-control multiselect age" placeholder="Select AgeGroup" >
                            <option value="0">Select AgeGroup</option>
                            @foreach($ageGroups as $ageGroup)
                            <option value={{ $ageGroup->id }}>{{ $ageGroup->name }}</option>
                            @endforeach
                        </select>

                    </div>
                   
                   
                   

                </div>
                @include('admin.events.starterIncludeEvents')

            </div>
</section>

<div class="modal fade pullDown" id="modal-4" role="dialog" aria-labelledby="modalLabelnews">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="modalLabelnews">Event Status</h4>
            </div>
            <div class="modal-body ">
                <p>
                    Sorry!
                    The Event is not started Yet
                    Please be patient
                </p>

            </div>
            <div class="modal-footer">
                <button class="btn  btn-primary" data-dismiss="modal">Close me!</button>
            </div>
        </div>
    </div>
</div>
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
                           
                        </div>
                        <div class="col-md-6">
                          
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



{{-- page level scripts --}}
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
        $(document).ready(function($) {
           
   


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

    });
    $("#btn").click(function() {
        $("#allEvents").print();
    });
    var obj = {};
    var leagueData;
    var seasonData ;
    var genderData;
    var eventData ;
    var ageData ;
    $("#season").on('change', function() {

            seasonData=$(".season option:selected").val();
            leagueData=$(".league option:selected").val();
            ageData=$(".age option:selected").val();
            eventData=$(".event option:selected").val();
            genderData=$(".gender option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
     
        $.ajax({
            type: 'POST',
            url: '/starter-event/search',
            data: {
                "_token": "{{ csrf_token() }}",
                "obj": obj,
            },
            success: function(response) {
                $('.events').html(response['html']);
                $('.printEvents').html(response['html2']);
            
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

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'POST',
url: '/starter-event/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.events').html(response['html']);
    $('.printEvents').html(response['html2']);
 
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

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'POST',
url: '/starter-event/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,

},
success: function(response) {
    $('.events').html(response['html']);
    $('.printEvents').html(response['html2']);
  
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

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'POST',
url: '/starter-event/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.events').html(response['html']);
    $('.printEvents').html(response['html2']);
 
}
});

    });
    $("#event").on('change', function() {
        seasonData=$(".season option:selected").val();
            leagueData=$(".league option:selected").val();
            ageData=$(".age option:selected").val();
            eventData=$(".event option:selected").val();
            genderData=$(".gender option:selected").val();

        obj['season'] = seasonData;
        obj['league'] = leagueData;
        obj['gender'] = genderData;
        obj['age'] = ageData;
        obj['event'] = eventData;
$.ajax({
type: 'POST',
url: '/starter-event/search',
data: {
    "_token": "{{ csrf_token() }}",
    "obj": obj,
},
success: function(response) {
    $('.events').html(response['html']);
    $('.printEvents').html(response['html2']);
 
}
});
    });
   


    $(document).on('click', '.event', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "/gender/" + id,
            data: {
                "_token": "{{ csrf_token() }}",

            },

            dataType: "json",
            success: function(response) {
                if (response.gender.status == 2) {
                    $('#modal-4').modal('show');
                } else {

                }

            }
        });



    });
    $(document).on('click', '.edit', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $('#id').val(id);
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
                window.location.href = response.url;

            }
        });
    });
    $(document).on('click', '.event', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "/gender/" + id,
            data: {
                "_token": "{{ csrf_token() }}",

            },

            dataType: "json",
            success: function(response) {
                if (response.gender.status == 2) {
                    $('#modal-4').modal('show');
                } else {

                }

            }
        });



    });
</script>



@stop