@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Events
    Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}"
        rel="stylesheet" />
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

        td.checkbox-col {
            display: flex;
            justify-content: center;
        }

        .h4 {
            margin-bottom: 12px;

        }

        .panel-heading a:hover {
            display: block;
            color: white;
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
                        {{ $event->mainEvent->name }}-{{ $AgeGroupGender->gender->name }}-({{ $AgeGroupGender->ageGroupEvent->ageGroup->name }})
                        <a style="float:right;display:block" href="/events" style="color:white"><i
                                class="material-icons  leftsize">keyboard_backspace
                            </i>
                            Back</a>
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
                    <div class="row" style="padding-left:80%;">
                    </div>
                    <input type="hidden" class="ageGroupGender" value="{{ $AgeGroupGender->id }}">
                    <form name="submitForm" id="submitForm" method="post" action="javascript:void(0)">
                        @csrf
                        @if ($event->mainEvent->event_category_id == 1)
                            <div class="col-md-4" style="margin-bottom:25px;">
                                <p class="h4"><strong>Please select the relevant ground/track</strong></p>

                                <select id="select24" class="form-control ground" name="ground">
                                    <option selected value="none">Select Ground</option>
                                    @foreach ($venueDetails as $detail)
                                        <option id="{{ $detail->id }}" value="{{ $detail->id }}">
                                            {{ $detail->track_event_name }}  ({{ $detail->track_event_count }} {{ "tracks" }})</option>
                                    @endforeach
                                </select>
                                <h4 class="gr" style="display:none;color:red">Please Select the Ground*</h4>
                            </div>
                        @endif
                        <div class="col-md-8">
                            <p class="h4"><strong>Please mark available participants</strong></p>
                            <div class="table-responsive">

                                <table class="table table-striped table-bordered events" id="">
                                    <thead>

                                        <tr>


                                            <th style="text-align: center"><input type="checkbox" class="suvarna"
                                                    style="width: 18px;
                                            height: 18px;margin:5px;margin-top:10px;"
                                                    title="Select All"></th>
                                            <th>User Id</th>
                                            <th>Player Name</th>
                                            <th>Contact Number</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        @foreach ($event->registrations as $registration)
                                            @if ($registration->is_approved == 1)
                                                @if ($registration->user->is_approved == 1)
                                                    <tr>
                                                        <input type="hidden" name="ageGroupGender"
                                                            value="{{ $AgeGroupGender->id }}">
                                                        <input type="hidden" name="event" value="{{ $event->id }}">
                                                        <?php
                                        
                                        $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                                        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                                        $age = $league1 - $mine;
                                        $exp = preg_split("/-/", $Agegroup->name);
                                        if (isset($exp[1])) {

                                            if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                        ?>
                                                        <?php
                                                        $gen = $registration->user->gender == 'male' ? 1 : 2;
                                                        ?>
                                                        @if ($AgeGroupGender->gender_id == $gen)
                                                            <td class="checkbox-col"><input type="checkbox"
                                                                    class="messageCheckbox" name="attendances[]"
                                                                    data-name="{{ $registration->user->first_name }} -{{ $registration->user->last_name }}"
                                                                    data-id="{{ $registration->user->userId }}"
                                                                    value="{{ $registration->user->id }}"
                                                                    style="width: 20px;
                                                    height: 20px;">
                                                            <td>{{ $registration->user->userId }}</td>

                                                            <td>{{ $registration->user->first_name }}
                                                                {{ $registration->user->last_name }}
                                                                <br>
                                                            </td>

                                                            <td>{{ $registration->user->tel_number }}</td>
                                                        @endif
                                                        <?php

                                            }
                                        } elseif ($exp[0] == $age) {


                                            ?>
                                                        <?php
                                                        $gen = $registration->user->gender == 'male' ? 1 : 2;
                                                        ?>
                                                        @if ($AgeGroupGender->gender_id == $gen)
                                                            <td class="checkbox-col"><input type="checkbox"
                                                                    class="messageCheckbox" name="attendances[]"
                                                                    data-name="{{ $registration->user->first_name }} -{{ $registration->user->last_name }}"
                                                                    data-id="{{ $registration->user->userId }}"
                                                                    value="{{ $registration->user->id }}"
                                                                    style="width: 20px;
                                                height: 20px;">
                                                            <td>{{ $registration->user->userId }}</td>

                                                            <td>{{ $registration->user->first_name }}
                                                                {{ $registration->user->last_name }}
                                                                <br>
                                                            </td>
                                                            <td>{{ $registration->user->tel_number }}</td>
                                                        @endif
                                                        <?php }
                                        ?>
                                                @endif
                                            @endif
                                        @endforeach


                                        </tr>



                                    </tbody>
                                                                    <h4 class="participant" style="display:none;color:red">Please Check the Participants*</h4>

                                </table>

                            </div>
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

                </div>
                </form>
                <div style="display:none">
                    @include('admin.events.starterIncludeEvents')
                </div>

    </section>

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



{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}">
    </script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}">
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        window.history.forward();
        // function noBack(){
        //     window.history.forward();

        // }
        $(document).ready(function() {

            var pusher = new Pusher('86da804dfa2c9602384d', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                if(data.cat==2){

}
else{
                if (data.id) {
                    var table = document.getElementById('judge');
                    var t = document.getElementById('judge');
                    var i = 0;
                    $("#judge tr").each(function() {
                        var val1 = $(t.rows[i].cells[0]).text();
                        if (val1 == data.id) {
                            // var suvar=$(t.rows[i].cells[0]).text();
                            //     $(t.rows[i].cells[8]).text().hide();
                            //    $(t.rows[i].cells[8]).append(data.id);

                            $(t.rows[i].cells[8]).empty();
                            if (data.status == 2) {
                                swal({
  title: "Event Started",
  text: data.event+" "+data.ageGroup+" "+data.gender+" "+"has been started",
  icon: "success",
  button: "Ok",
});
                                var new_row = '<tr class="new_row"><td>' + data.ageGender.id +
                                    '</td><td>' + data.event + '</td><td>' + data.league +
                                    '</td><td>' + data.organizer + '</td><td>' + data.gender +
                                    '</td><td>' + data.ageGroup + '</td><td>' + data.date +
                                    '</td><td>' + data.time +
                                    '</td><td><span class="label label-warning">On Going</span></td><td><a href="/players/' +
                                    data.ageGender.id + '/' + data.eventId +
                                    '"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td></tr>';
                                $(t.rows[i]).replaceWith(new_row);
                            } else if (data.status == 4) {
                                 swal({
  title: "Event Started", 
  text: data.event+" "+data.ageGroup+" "+data.gender+" "+"has been started",
  icon: "success",
  button: "Ok",
});
                                var new_row = '<tr class="new_row"><td>' + data.ageGender.id +
                                    '</td><td>' + data.event + '</td><td>' + data.league +
                                    '</td><td>' + data.organizer + '</td><td>' + data.gender +
                                    '</td><td>' + data.ageGroup + '</td><td>' + data.date +
                                    '</td><td>' + data.time +
                                    '</td><td><span class="label label-warning">On Going</span></td><td><a href="/track/heats/' +
                                    data.ageGender.id +
                                    '"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td></tr>';
                                $(t.rows[i]).replaceWith(new_row);
                                 
                            } else if (data.status == 10) {
                                var new_row = '<tr class="new_row"><td>' + data.ageGender.id +
                                    '</td><td>' + data.event + '</td><td>' + data.league +
                                    '</td><td>' + data.organizer + '</td><td>' + data.gender +
                                    '</td><td>' + data.ageGroup + '</td><td>' + data.date +
                                    '</td><td>' + data.time +
                                    '</td><td><span class="label label-danger">Cancelled</span></td><td></td></tr>';
                                $(t.rows[i]).replaceWith(new_row);

                            }
                        }

                        i++;
                    });

                }
            }
            });
            $('.suvarna').on('change', function() {
                $("input[name='attendances[]']").prop('checked', $(this).prop("checked"));
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

            $(document).on('click', '.finalize', function(e) {
                 var participants= $("input[name='attendances[]']").filter(':checked').length;
                var ground = $('.ground').find(":selected").val();
                if (ground == 'none' && participants == 0) {
                    $('.gr').show();
                    $('.participant').show();
                } 
               else if (participants == 0) {
                    $('.participant').show();
                     $('.gr').hide();
                } 
                else if(ground=='none'){
                                        $('.gr').show();
                                        $('.participant').hide();

                }
                else {
                     $('.participant').hide();
                    $('.gr').hide();
                    $('#myModal2').modal('show');
                    var selectedLanguage = new Array();
                    $("#age-group").empty();
                    $("input[name='attendances[]']").filter(':checked').each(function() {
                        var pushedValue = $(this).attr('data-id');
                        var name = $(this).attr('data-name')
                        $("#age-group").append("<tr>" +
                            "<td>" + name + "</td>" +
                            "<td>" + pushedValue + "</td>" +

                            "</tr>");
                        // selectedLanguage.push(pushedValue);
                    });
                }

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
                    url: "/event/participated-players",
                    data: $("#submitForm").serialize(),
                    dataType: "json",
                    success: function(response) {
                        $('#myModal2').modal('hide');

                        window.location.href = response.url;

                    }
                });

            });

        });
    </script>

    <div class="modal fade in" id="static" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are You Sure! You Want to cancel this Event?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger yes">Yes</button>
                    <button type="button" data-dismiss="modal" class="btn btn-primary">No</button>
                </div>
            </div>
        </div>
    </div>
@stop
