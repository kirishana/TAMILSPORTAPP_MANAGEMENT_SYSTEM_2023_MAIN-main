@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Advanced Date and Time pickers
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/pickadate/css/default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/pickadate/css/default.date.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/pickadate/css/default.time.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/air-datepicker/css/datepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/flatpickr/css/flatpickr.min.css') }}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datepicker.css') }}">
@stop


{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Advanced Date pickers</h1>
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
                    <li class="active">Advanced Date and Time pickers</li>
                </ol>
            </section>
            <!--section ends-->
<!-- Main content -->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">today</i> Date Pickers
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>
                                Date Selector :
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="livicon" data-name="calendar" data-size="16" data-c="#555555"
                                       data-hc="#555555" data-loop="true"></i>
                                </div>
                                <input class="flatpickr flatpickr-input form-control" type="text" placeholder="select date">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- Date dd/mm/yyyy -->
                        <div class="form-group">
                            <label>
                                 Textual Format :
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">date_range</i>
                                </div>
                                <input class="form-control flatpickr" data-dateFormat="l, F j, Y" id="textual" placeholder="Textual format">
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>
                                MinDate and MaxDate:  (from today to next 14days)
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">date_range</i>
                                </div>
                                <input class="form-control" id="min_max" placeholder="from today to next 14days">
                            </div>
                        </div>
                        <!-- /.input group -->
                        <!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>
                                Custom Elements and Input Groups :
                            </label>
                            <div>
                                <p class="flatpickr input-group" data-wrap="true" data-clickOpens="false">
                                    <input class="form-control" placeholder="Pick date" data-input>
                                    <span class="input-group-addon add-on">
                                        <a class="input-btn" data-toggle> <i class="material-icons date_pick">date_range</i></a>
                                    </span>
                                    <span class="input-group-addon add-on">
                                        <a class="input-btn" data-clear> <i class="material-icons date_pick">close</i></a>
                                    </span>
                                </p>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>DateTime Picker With 24 Hour Mode:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">date_range</i>
                                </div>
                                <input class="form-control flatpickr"  id="datetimepicker" >
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <div class="form-group">
                            <label>Multiple Dates</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">date_range</i>
                                </div>
                                <input class="form-control flatpickr flatpickr-input active" type="text" data-id="multiple" placeholder="select multiple dates" id="multiple">
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
            </div>
            <!--select2 starts-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">today</i> Advanced Date Pickers
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="box-body">
                        <!--  Multiple Dates -->
                        <div class="form-group">
                            <label>
                                Multiple Dates
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">call</i>
                                </div>
                                <input type="text" class="datepicker-here form-control" data-language='en' data-multiple-dates="4" data-multiple-dates-separator=", " data-position='bottom left' />
                            </div>
                        </div>
                        <!-- /.input group -->
                        <!-- Disabled Days -->
                        <div class="form-group">
                            <label>
                                Disabled Days:
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">date_range</i>
                                </div>
                                <input type="text" class="form-control" id="disabled-days" />
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <!-- phone mask -->
                        <div class="form-group">
                            <label>
                                Actions with time:
                            </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">call</i>
                                </div>
                                <input type="text" class="form-control" id='timepicker-actions-exmpl' />
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                        <!-- IP mask -->
                        <div class="form-group">
                            <label>Custom cells content:</label>
                            <div class="example">
                                <div class="example--label"></div>
                                <div class="example-content">
                                    <div class="list-inline">
                                        <div>
                                            <div id="custom-cells"></div>
                                        </div>
                                        <div id="custom-cells-events"><strong></strong><p class="light-color"></p></div>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!--select2 starts-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">date_range</i> Custom Date Pickers
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Disable Date Intervals: (3rd, 5th, 7th-10 dates from today are disabled)</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">date_range</i>
                            </div>
                            <input class="form-control" id="disableRangeMultiple" placeholder="3rd, 5th, 7th-10 dates from today are disabled">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Check-In, Check-out Date Picker:</label>
                        <div class="clearfix"></div>
                        <div class="col-md-5 mt-5 pad-0-res">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">today</i>
                                </div>
                                <input class="form-control" id="check_in_date" placeholder="Check-In Date">
                            </div>
                        </div>
                        <div class="col-md-5 mt-5 pad-0-res">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="material-icons date_pick">event</i>
                                </div>
                                <input class="form-control" id="check_out_date" placeholder="Check Out Date">
                            </div>
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Display Week Numbers:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">date_range</i>
                            </div>
                            <input class="form-control flatpickr" data-weeknumbers=true placeholder="Enabled week numbers" id="display">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Preload Date and Time:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">date_range</i>
                            </div>
                            <input class="form-control flatpickr"  id="preload">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.input group -->
                    <div class="form-group">
                        <label>Range Slider</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="livicon" data-name="calendar" data-size="16" data-c="#555555"
                                   data-hc="#555555" data-loop="true"></i>
                            </div>
                            <input class="form-control flatpickr flatpickr-input active" type="text" data-id="range" placeholder="select range" id="rangeflat">
                        </div>
                        <!-- /.input group -->
                    </div>
                </div>
                <!--ends-->
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">av_timer</i> Fancy Picker
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>
                            Time Picker:
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">access_time</i>
                            </div>
                            <input class="form-control flatpickr" data-enabletime=true data-nocalendar=true
                                   value="09:00" id="timepicker">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Human-friendly Date Output:
                        </label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">access_time</i>
                            </div>
                            <input class="form-control flatpickr" data-dateFormat=" F j, Y" id="alt" placeholder="The real input is hidden :^)" />
                        </div>
                        <strong>Selected date</strong>: <span id="realdate">nothing yet</span>
                    </div>
                </div>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">access_time</i> Date and Time Picker
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Date Picker:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">laptop</i>
                            </div>
                            <input class="form-control datepicker1" type="text" placeholder="Try me..">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label>Time Picker:</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="material-icons date_pick">laptop</i>
                            </div>
                            <input class="form-control timepicker" type="text" placeholder="Try me..">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.input group -->
                </div>
                <!--ends-->
            </div>
        </div>
    </div>
    <!--main content ends-->
</section>
<!-- content -->

    @stop

{{-- page level scripts --}}
@section('footer_scripts')
 <!-- begining of page level js -->
<script src="{{ asset('assets/vendors/pickadate/js/picker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/pickadate/js/picker.date.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/pickadate/js/picker.time.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/flatpickr/js/flatpickr.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/air-datepicker/js/datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/air-datepicker/js/datepicker.en.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/custom_datepicker.js') }}" type="text/javascript"></script>
@stop
