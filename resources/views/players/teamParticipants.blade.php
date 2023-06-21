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
                    {{-- <div style="float:right">
                        <a href="/event/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                            Add New</a>
                    </div> --}}
                </h4>

            </div>
            <br />
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row" style="padding-left:80%;">
                    
                    <div class="col-md-12 togglebutton">
                        <label>
                            Cancel Event
                            <input type="checkbox" class="toggle_btn" data-id="{{ $AgeGroupGender->id }}">
                        </label>
                    </div>
                 </div>
                 
<div class="row">
     <div class="col-md-4" style="margin-bottom:25px;">

                     <input type="hidden" class="ageGroupGender" value="{{ $AgeGroupGender->id }}">

                 <form name="submitForm" id="submitForm" method="post" action="javascript:void(0)">
                        <p class="h4"><strong>Please select the relevant ground/track</strong></p>

                        <select id="select24" class="ground" name="ground" required style="width:55%;">
                        <option value="none">Select Ground</option>
                        @foreach($venueDetails as $detail)
                        <option id="{{ $detail->id }}" value="{{ $detail->id }}">{{ $detail->track_event_name }} ({{ $detail->track_event_count }} {{ "tracks" }})</option>
                        @endforeach
                    </select>
                        <h4 class="gr" style="display:none;color:red">Please Select the Ground*</h4>
                    </div>
                    <div class="col-md-8 panel-body table-responsive">

                        <table class="table table-striped table-bordered events" id="">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Team</th>
                                    <th>Club</th>


                                </tr>
                            </thead>
                            <tbody>
                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                @php $count=0; @endphp
                                @foreach($registrations as $registration)

                               
                                    <input type="hidden" name="ageGroupGender" value="{{ $AgeGroupGender->id }}">

                                   @foreach ($registration->teams as $team)
                                   @php $count+=$team->users->count(); @endphp
 <tr>
    <td><input type="checkbox" name="attendances[]" @if($team->users->count()==0) disabled @endif value="{{ $team->id}}" data-name="{{$team->name}}"></td>

                                   <td>
                                       {{ $team->name }}@if($team->users->count()==0) &nbsp; <span style="color:red;">team has no members</span>  @endif
                                    
                                   </td>
                                   <td>
                                    {{ $team->club->club_name }}
                                 
                                </td>

                                   </tr>
                                   @endforeach
                                      
                                        
                                       
                                          
                                

                                @endforeach

                            </tbody>
                        </table>

                    </div>
               
               
            </div>
            
            <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <button type="button" @if($count==0) disabled  @endif  class="btn btn-labeled btn-primary finalize">
                        Next
                        <span class="btn-label cool_btn_right">
                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                        </span>
                    </button>
                </div>

            </div>
            </form>

</section>

<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Selected Participants</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <table class="table table-striped table-bordered events" id="">
                        <tr>
                            <th>Team Name</th>

                        </tr>
                        <tbody id="team"></tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success register">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>

@stop



{{-- page level scripts --}}
@section('footer_scripts')
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}">
    </script>
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<script>
        window.history.forward();

   $(document).on('click', '.finalize', function(e) {
        var ground=$('.ground').find(":selected").val();
        
        if(ground=='none'){
            $('.gr').show();
        }else{
               $('#myModal2').modal('show');
        var selectedLanguage = new Array();
        $("#team").empty();
        $("input[name='attendances[]']").filter(':checked').each(function() {
            var name=$(this).attr('data-name')
            $("#team").append("<tr>" +
                "<td>" +name  + "</td>" +
                             

                "</tr>");
            // selectedLanguage.push(pushedValue);
        }); 
        }
    
    });
     $(document).on('click', '.toggle_btn', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $('#static').modal('show');
     
    });
    $(document).on('click', '.yes', function(e) {
        e.preventDefault();
        var ageGroupGender = $('.ageGroupGender').val();      
        $.ajax({
            type: "POST",
            url: "/event/cancel/starter/" + ageGroupGender,
            data: {
                "_token": "{{ csrf_token() }}",
                "ageGroupGender": ageGroupGender,
              
            },

            dataType: "json",
            success: function(response) {
                window.location.href = response.url;

            }
        });
     
    });
    $(document).on('click', '.register', function(e) {
            $(this).prop('disabled',true);
            e.preventDefault();
            $.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
            $.ajax({
            type: "POST",
            url: "/event/group-participated-players",
            data: 
                $("#submitForm").serialize(),
            dataType: "json",
            success: function(response) {
                        $('#myModal2').modal('hide');

                        window.location.href = response.url;

            }
        });
            
        })
           
</script>


<div class="modal fade in" id="static" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <p>Are You Sure! You Want to cancel this Event?</p>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-danger yes">Yes</button>
                <button type="button" data-dismiss="modal" class="btn btn-primary">No</button>
            </div>
        </div>
    </div>
</div>
@stop