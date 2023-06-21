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
                    {{ $event->mainEvent->name }} - {{ $Agegroup->name }} - ({{ $AgeGroupGender->gender->name }})
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
            <div class="panel-body table-responsive">

                <div class="col-md-12">
                    <div class="panel-body table-responsive">
                        <div class="col-md-12">
                            <p class="h4"><strong>Please mark available participants</strong></p>
                            <form name="submitForm" id="submitForm" method="post" action="javascript:void(0)">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                <input type="hidden" name="ageGroupGender"
                                value="{{ $AgeGroupGender->id }}">
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered events" id="">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" class="parties"
                                                    style="width: 18px;
                                            height: 18px;margin:5px;margin-top:10px;"
                                                    title="Select All"></th>
                                            <th>Team</th>
                                            <th>Club</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($teams as $team)
                                        <tr>
        
                                            
                                       
                                                            <td class="checkbox-col"><input type="checkbox"
                                                                    class="messageCheckbox" name="users[]"
                                                                    data-name="{{ $team->name }}"
                                                                    data-id="{{ $team->club->club_name }}"
                                                                    value="{{ $team->id }}"
                                                                    style="width: 20px;
                                                    height: 20px;">

<td>{{ $team->name }}</td>
<td>{{ $team->club->club_name}}</td>
                                                            </tr>
                                                            @endforeach
                                                      



                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-labeled btn-primary finalize">
                                    Finalize
                                    <span class="btn-label cool_btn_right">
                                        <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                    </span>
                                </button>
                            </div>
                        </form>
                        </div>

                    </div>
                </div>

            </div>


</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>
                window.history.forward()

</script>
<script>
     $('.parties').on('change', function() {
                $("input[name='users[]']").prop('checked', $(this).prop("checked"));
            });
            $(document).on('click', '.finalize', function(e) {
                
                    $('#myModal2').modal('show');
                    var selectedLanguage = new Array();
                    $("#age-group").empty();
                    $("input[name='users[]']").filter(':checked').each(function() {
                        var pushedValue = $(this).attr('data-id');
                        var name = $(this).attr('data-name')
                        $("#age-group").append("<tr>" +
                            "<td>" + name + "</td>" +
                            "<td>" + pushedValue + "</td>" +

                            "</tr>");
                        // selectedLanguage.push(pushedValue);
                    });
                

            });
            $(document).on('click', '.register', function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "/event/finalParticipants",
                    data: $("#submitForm").serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#myModal2').modal('hide');

                        window.location.href = response.url;

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
</script>

<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
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
                        <th>Participant Name</th>
                        <th>Participant Number</th>

                    </tr>
                    <tbody id="age-group"></tbody>
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

<!--Modal: Login with Avatar Form-->

@stop