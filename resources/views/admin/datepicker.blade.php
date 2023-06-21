@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Date Picker
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/materialdate/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datepicker.css') }}">
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Date pickers</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Forms</a>
                    </li>
                    <li class="active">Date pickers</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">event_note</i> Date Range Picker
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>
                                Default:
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">date_range</i>
                                </div>
                                <input type="text" class="form-control" id="daterange1" />
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>
                                Date and Time:
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">call</i>
                                </div>
                                <input type="text" class="form-control" id="daterange2" />
                            </div>
                        </div>
                        <!-- /.input group -->
                        <!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>
                                Predefined Range:
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">call</i>
                                </div>
                                <input type="text" class="form-control" id="daterange3" />
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Single Date Picker:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">today</i>
                                </div>
                                <input type="text" class="form-control" id="rangepicker4" />
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
            </div>
            <!--select2 starts-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">notifications</i> Material Date Time Picker
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body material_datetime_picker">
                    <div class="form-group">
                        <label class="control-label" for="date">Date Picker:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons date_pick">date_range</i></span>
                            <input type="text" id="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="time">Time Picker:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons date_pick">schedule</i></span>
                            <input type="text" id="time" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="date">Date Time Picker:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons date_pick">date_range</i></span>
                            <input type="text" id="date-format" class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="date">Min Date set:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons date_pick">date_range</i></span>
                            <input type="text" id="min-date" class="form-control">
                        </div>
                    </div>
                    <label class="events">Events:</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group event_date">
                                <label class="control-label" for="date">Start Date:</label>
                                <div class="input-group">
                                                <span class="input-group-addon"><i
                                                            class="material-icons date_pick">today</i></span>
                                    <input type="text" id="date-start" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group event_date">
                                <label class="control-label" for="date">End Date:</label>
                                <div class="input-group">
                                                <span class="input-group-addon"><i
                                                            class="material-icons date_pick">event</i></span>
                                    <input type="text" id="date-end" class="form-control">
                                </div>
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.input group -->
                </div>
                <!--ends-->
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">access_alarms</i> Clock Picker
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>
                                Default:
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">query_builder</i>
                                </div>
                                <input type="text" class="form-control" id="clockface1" value="2:30 PM" data-format="hh:mm A" />
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group">
                            <label>
                                Read only:
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick" id="toggle-btn">query_builder</i>
                                </div>
                                <input type="text" class="form-control" id="clockface2" value="14:30" readonly="">
                            </div>
                        </div>
                        <!-- /.input group -->
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>
                                Inline:
                            </label>
                            <div id="clockface3">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div>
                </div>
            </div>
            <!--select2 starts-->
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">notifications</i> Masking
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Time Mask:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">event</i>
                            </div>
                            <input type="text" class="form-control" data-mask="99:99:99" placeholder="HH:MM:SS">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Date Mask:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">event</i>
                            </div>
                            <input type="text" class="form-control" data-mask="99/99/9999" placeholder="MM/DD/YYYY">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Date-Time Mask:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">event</i>
                            </div>
                            <input type="text" class="form-control" data-mask="99/99/9999 99:99:99" placeholder="MM/DD/YYYY HH:mm:ss">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Phone Mask:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">event</i>
                            </div>
                            <input type="text" class="form-control" data-mask="(999)999-9999" placeholder="(999)999-9999">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.input group -->
                </div>
                <!--ends-->
            </div>
        </div>
    </div>
    <!--select2 ends-->
    <!--main content ends-->
</section>
<!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

            <!-- begining of page level js -->
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
{{--<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>--}}
<script src="{{ asset('assets/vendors/materialdate/js/bootstrap-material-datetimepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>
<!-- end of page level js -->
@stop
