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

<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
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
                    {{ $event->mainEvent->name }} - {{ $gender->gender->name }}
                </h4>

            </div>
            <br />
            <div class="nav-tabs-custom">

                <ul class="nav nav-tabs custom_tab">
                    <li class="active">
                        <a class="panel-title-primary" href="#tab1" data-toggle="tab">
                            Round 1</a>
                    </li>
                    <li>
                        <a class="panel-title" href="#tab2" data-toggle="tab">
                            Round 2</a>
                    </li>
                    <li>
                        <a class="panel-title" href="#tab3" data-toggle="tab">
                            Round 3</a>
                    </li>
                    <li>
                        <a class="panel-title" href="#tab4" data-toggle="tab">
                            Results</a>
                    </li>

                </ul>
                <form action="/field-event/results" method="GET">
                    <!-- CSRF Token -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <div class="tab-content">

                        <div class="tab-pane fade active in" id="tab1">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <table class="table table-striped table-bordered events" id="">
                                        <thead class="thead-Dark">
                                            <tr>
                                                <th>Players</th>
                                                @if(Auth::user()->hasRole(6))

                                                <th>1st Round </th>
                                                @endif

                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach ($players as $player)
                                            <tr>
                                                <td>{{ $player->userId }}</td>
                                                @if(Auth::user()->hasRole(6))

                                                <td>
                                                    <div class="row">


                                                        <input type="text" class="first" id="first" name="first" data-id="{{$player->id}}" value="{{ $player->pivot->one? $player->pivot->one:''}}" style="width:100px;"><br>

                                                        <br>
                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                        <input name="_method" type="hidden" value="PUT">

                                                        <input type="hidden" value="{{ $gender->id }}" id="gender">
                                                        <input type="hidden" value="{{ $event->id }}" id="event">




                                                    </div>
                                                </td>
                                                @endif


                                            </tr>


                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                </div>
                                <div class="col-md-2">
                                    <a class="previous" style="float:right" href="#tab2" data-toggle="tab">
                                        Next &raquo;</a>
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab2">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <table class="table table-striped table-bordered events" id="">
                                        <thead>
                                            <tr>
                                                <th>Players</th>
                                                @if(Auth::user()->hasRole(6))

                                                <th>2nd Round </th>
                                                @endif
                                            </tr>
                                        </thead>


                                        <tbody>

                                            @foreach ($players as $player)
                                            <tr>
                                                <td>{{ $player->userId }}</td>
                                                @if(Auth::user()->hasRole(6))

                                                <td>
                                                    <div class="row">


                                                        <input type="text" class="second" id="second" name="second" data-id="{{$player->id}}" value="{{ $player->pivot->two? $player->pivot->two:''}}" style="width:100px;"><br>

                                                        <br>
                                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                        <input type="hidden" value="{{ $gender->id }}" id="gender">
                                                        <input type="hidden" value="{{ $event->id }}" id="event">




                                                    </div>
                                                </td>
                                                @endif

                                            </tr>


                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <a class="next" href="#tab1" data-toggle="tab">
                                        &laquo; Previous
                                    </a>
                                </div>
                                <div class="col-md-2">
                                    <a class="previous" style="float:right" href="#tab3" data-toggle="tab">
                                        Next &raquo;</a>

                                </div>

                            </div>

                        </div>

                        <form action="/field-event/results" methhod="get">

                            <div class="tab-pane fade" id="tab3">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <table class="table table-striped table-bordered events" id="">
                                            <thead>
                                                <tr>
                                                    <th>Players</th>
                                                    @if(Auth::user()->hasRole(6))

                                                    <th>3rd Round </th>
                                                    @endif

                                                </tr>
                                            </thead>


                                            <tbody>

                                                @foreach ($players as $player)
                                                <tr>
                                                    <td>{{ $player->userId }}</td>

                                                    @if(Auth::user()->hasRole(6))

                                                    <td>
                                                        <div class="row">


                                                            <input type="text" class="third" id="third" name="third" data-id="{{$player->id}}" value="{{ $player->pivot->third? $player->pivot->third:''}}" style="width:100px;"><br>

                                                            <br>
                                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                            <input type="hidden" value="{{ $gender->id }}" id="gender">
                                                            <input type="hidden" value="{{ $event->id }}" id="event">




                                                        </div>
                                                    </td>
                                                    @endif

                                                </tr>


                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <a class="next" href="#tab2" data-toggle="tab">
                                            &laquo; Previous
                                        </a>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="submit" style="float:right">
                                            Finish</button>
                                        <input type="hidden" value="{{ $gender->id }}" id="gender" name="gender">
                                        <input type="hidden" value="{{ $event->id }}" id="event" name="event">
                                    </div>

                                </div>

                            </div>
                        </form>


                        <div class="tab-pane fade" id="tab4">
                            <div class="row">
                                <div class="col-md-8">
                                    <table class="table table-striped table-bordered events" id="">
                                        <thead>
                                            <tr>
                                                <th>Players</th>
                                                <th>1st Round </th>
                                                <th>2nd Round </th>
                                                <th>3rd Round </th>

                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ( $players as $player )
                                            <tr>
                                                <td>{{ $player->userId }}</td>
                                                <td>{{ $player->pivot->one }}</td>
                                                <td>{{ $player->pivot->two }}</td>
                                                <td>{{ $player->pivot->third }}</td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>

                                </div>
                                <div class="col-md-4">

                                    <table class="table table-striped table-bordered events" id="">
                                        <strong>
                                            <p style="text-align:center">Winners</p>
                                        </strong>
                                        <thead>
                                            <tr>
                                                <th>Players</th>
                                            </tr>
                                        </thead>
                                        <tbody id="players">
                                            @if($first_names!==null)

                                            @foreach($first_names as $fname)

                                            <tr>
                                                <td>{{ $fname->userId }}</td>


                                            </tr>
                                            @endforeach

                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-10">
                                        <a class="next" href="#tab3" data-toggle="tab">
                                            &laquo; Previous
                                        </a>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script>
    $(document).ready(function($) {

        $(".finish").on('click', function() {
            var gender = $("#gender").val();
            var event = $("#event").val();
            $.ajax({
                url: "/field-event/results",
                type: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "gender": gender,
                    "event": event
                },
                success: function(response) {
                    //  window.location.href = response.url;
                    //  tbody.html

                    $.each(response.first_names, function(key, item) {
                        $('#players').append(

                            `<tr>
  <td>${item.id}</td>
  <td>${item.first_name}</td>
</tr>`
                        )


                    });

                }
            });

        });
        $(".first").on('change', function() {
            var first = $(this).val();
            var player = $(this).data("id");
            var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "first": first,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });

        });



        $(".second").on('change', function() {
            var second = $(this).val();
            var player = $(this).data("id");
            var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/second/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "second": second,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });

        });




        $(".third").on('change', function() {
            var third = $(this).val();
            var player = $(this).data("id");
            var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/third/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "third": third,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });

        });
    });
</script>

@stop