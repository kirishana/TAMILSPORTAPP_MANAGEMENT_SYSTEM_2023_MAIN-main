@extends('admin/layouts/menu')

{{-- Page title --}}
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="all" href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}" />
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrapDatetimePicker/css/bootstrap-datetimepicker.min.css') }}">
<style>
    .todocancel .trash {
        color: #F00 !important;
        padding-left: 3px;
    }

    .todocancel .trash:hover {
        color: #F00 !important;
        text-decoration: none;
    }

    .datetimepicker-dropdown-bottom-left:before {
        right: inherit;
    }
</style>
@stop

{{-- Page content --}}
@section('content2')

<section class="content-header">
    <h1>Welcome to Dashboard </h1>
    <ol class="breadcrumb">
        <li class="active">
            <a href="#">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
            <!-- Trans label pie charts strats here-->
            <div class="lightbluebg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 text-right">
                                <span>Views Today</span>
                                <div class="number" id="myTargetElement1"></div>
                            </div>
                            <i class="material-icons pull-right square_material">visibility</i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">Last Week</small>
                                <h4 id="myTargetElement1.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <small class="stat-label">Last Month</small>
                                <h4 id="myTargetElement1.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
            <!-- Trans label pie charts strats here-->
            <div class="redbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Today's Sales</span>
                                <div class="number" id="myTargetElement2"></div>
                            </div>
                            <i class="material-icons pull-right square_material">account_balance_wallet</i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">Last Week</small>
                                <h4 id="myTargetElement2.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <small class="stat-label">Last Month</small>
                                <h4 id="myTargetElement2.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
            <!-- Trans label pie charts strats here-->
            <div class="goldbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Subscribers</span>
                                <div class="number" id="myTargetElement3"></div>
                            </div>
                            <i class="material-icons pull-right square_material">archive</i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">Last Week</small>
                                <h4 id="myTargetElement3.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <small class="stat-label">Last Month</small>
                                <h4 id="myTargetElement3.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
            <!-- Trans label pie charts strats here-->
            <div class="palebluecolorbg no-radius">
                <div class="panel-body squarebox square_boxs">
                    <div class="col-xs-12 pull-left nopadmar">
                        <div class="row">
                            <div class="square_box col-xs-7 pull-left">
                                <span>Registered Users</span>
                                <div class="number" id="myTargetElement4"></div>
                            </div>
                            <i class="material-icons pull-right square_material">group</i>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <small class="stat-label">Last Week</small>
                                <h4 id="myTargetElement4.1"></h4>
                            </div>
                            <div class="col-xs-6 text-right">
                                <small class="stat-label">Last Month</small>
                                <h4 id="myTargetElement4.2"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/row-->
    <div class="row ">
        <div class="col-md-8 col-sm-6">
            <div class="panel panel-border">
                <div class="panel-heading">
                    <h3 class="panel-title title-color">
                        <i class="material-icons realtimer">av_timer</i> Realtime Server Load
                        <small>- Load on the Server</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <div id="realtimechart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="panel blue_gradiant_bg">
                <div class="panel-heading blue_bg">
                    <h3 class="panel-title">
                        <i class="material-icons">show_chart</i> Server Stats
                        <small class="white-text">- Monthly Report</small>
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="sparkline-chart">
                                <div class="number" id="sparkline_bar"></div>
                                <h3 class="title">Network</h3>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="margin-bottom-10 visible-sm"></div>
                        <div class="col-sm-6">
                            <div class="sparkline-chart">
                                <div class="number" id="sparkline_line"></div>
                                <h3 class="title">Load Rate</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- BEGIN Percentage monitor -->
            <div class="panel green_gradiante_bg ">
                <div class="panel-heading green_bg">
                    <h3 class="panel-title">
                        <i class="material-icons">donut_large</i> Result vs Target
                    </h3>
                </div>
                <div class="panel-body nopadmar">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <h4 class="small-heading">Sales</h4>
                            <span class="chart cir chart-widget-pie widget-easy-pie-1" data-percent="45"><span class="percent">45</span>
                            </span>
                        </div>
                        <!-- /.col-sm-4 -->
                        <div class="col-sm-6 text-center">
                            <h4 class="small-heading">Reach</h4>
                            <span class="chart cir chart-widget-pie widget-easy-pie-3" data-percent="25">
                                <span class="percent">25</span>
                            </span>
                        </div>
                        <!-- /.col-sm-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- END BEGIN Percentage monitor-->
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-border">
                <div class="panel-heading border-light">
                    <h4 class="panel-title title-color">
                        <i class="material-icons">event</i> Calendar
                    </h4>
                </div>
                <div class="panel-body">
                    <div id='external-events'></div>
                    <div id="calendar"></div>
                    <div id="fullCalModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
                                    <h4 id="modalTitle" class="modal-title"></h4>
                                </div>
                                <div id="modalBody" class="modal-body">
                                    <i class="mdi-action-alarm-on"></i>&nbsp;&nbsp;Start: <span id="startTime"></span>&nbsp;&nbsp;- End: <span id="endTime"></span>
                                    <h4 id="eventInfo"></h4>
                                    <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer pad-5">
                        <a href="#" class="btn btn-success btn-block createevent_btn" data-toggle="modal" data-target="#myModal">Create event</a>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        <i class="material-icons create_event">add</i> Create Event
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <div class="input-group">
                                        <input type="text" id="new-event" class="form-control" placeholder="New Event">
                                        <div class="input-group-btn">
                                            <button type="button" id="color-chooser-btn" class="color-chooser btn btn-raised dropdown-toggle" data-toggle="dropdown">
                                                Type
                                                <i class="material-icons drop">arrow_drop_down</i>
                                            </button>
                                            <ul class="dropdown-menu pull-right" id="color-chooser">
                                                <li>
                                                    <a class="palette-primary" href="#">Primary</a>
                                                </li>
                                                <li>
                                                    <a class="palette-success" href="#">Success</a>
                                                </li>
                                                <li>
                                                    <a class="palette-info" href="#">Info</a>
                                                </li>
                                                <li>
                                                    <a class="palette-warning" href="#">warning</a>
                                                </li>
                                                <li>
                                                    <a class="palette-danger" href="#">Danger</a>
                                                </li>
                                                <li>
                                                    <a class="palette-default" href="#">Default</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- /btn-group -->
                                    </div>
                                    <!-- /input-group -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-raised btn-danger pull-right" data-dismiss="modal">
                                        Close
                                        <i class="material-icons event">clear</i>
                                    </button>
                                    <button type="button" class="btn btn-raised btn-success pull-left" id="add-new-event" data-dismiss="modal">
                                        <i class="material-icons event">add</i> Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- To do list -->
        <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="panel panel-primary todolist">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">card_membership</i> Tasks
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="row list_of_items">                         
                    </div>               
                    <div class="todolist_list adds">
                        {!! Form::open(['class'=>'form', 'id'=>'main_input_box']) !!}
                        <div class="form-group label-floating">
                            {!! Form::text('task_description', null, ['class' => 'form-control','placeholder'=>'Add List item here','id'=>'task_description', 'required' => 'required']) !!}                            
                        </div>                           
                        <div class="form-group label-floating date_pick pull-left">
                            {!! Form::text('task_deadline', null, ['class' => 'form-control datepicker','placeholder'=>'Deadline', 'id'=>'task_deadline', 'data-date-format'=> 'YYYY/MM/DD', 'required' => 'required','autocomplete'=>'off']) !!}                            
                        </div>                        
                        <button type="submit" class="btn btn-primary add_button pull-left">Add Task</button>
                        {!! Form::close() !!}                 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row ">
        <div class="col-md-4 col-sm-12">
            <div class="panel panel-danger">
                <div class="panel-heading border-light">
                    <h4 class="panel-title">
                        <i class="material-icons">email</i> Quick Mail
                    </h4>
                </div>
                <div class="panel-body no-padding">
                    <div class="compose row">
                        <div class=" col-xs-offset-1 col-xs-10">
                            <div class="form-group label-floating ">
                                <label for="inputEmail" class="control-label">To:</label>
                                <input type="email" class="form-control" id="inputEmail">
                            </div>
                            <div class="clear"></div>
                            <div class="form-group label-floating">
                                <label for="subject" class="control-label">Subject:</label>
                                <input type="text" class="form-control" id="subject">
                            </div>
                            <div class="clear"></div>
                            <div class="form-group label-floating">
                                <label for="textarea" class="control-label">Text area:</label>
                                <textarea id="textarea" class="form-control"></textarea>
                            </div>
                        </div>
                        <br />
                        <div class="pull-right">
                            <a href="#" class="btn btn-raised btn-danger">Send</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
            <div class="panel panel-border">
                <div class="panel-heading">
                    <div class="col-md-9 map-head">
                        <h4 class="panel-title pull-left map_title title-color">
                            <i class="material-icons">map</i> Visitors Map
                        </h4>
                    </div>
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-default dropdown-toggle btn_settings" data-toggle="dropdown">
                            <i class="material-icons map_icon">settings_input_component</i>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a class="panel-collapse collapses" href="#">
                                    <i class="fa fa-angle-up"></i>
                                    <span>Collapse</span>
                                </a>
                            </li>
                            <li>
                                <a class="panel-refresh" href="#">
                                    <i class="fa fa-redo"></i>
                                    <span>Refresh</span>
                                </a>
                            </li>
                            <li>
                                <a class="panel-config" href="#panel-config" data-toggle="modal">
                                    <i class="fa fa-wrench"></i>
                                    <span>Configurations</span>
                                </a>
                            </li>
                            <li>
                                <a class="panel-expand" href="#">
                                    <i class="fa fa-expand"></i>
                                    <span>Fullscreen</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body nopadmar">
                    <div id="world-map-markers"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="editConfirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alert</h4>
            </div>
            <div class="modal-body">
                <p>You are already editing a row, you must save or cancel that row before edit/delete a new row</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="evt_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close reset" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h6 class="modal-title" id="myModalLabel">
                    <i class="fa fa-plus"></i>
                    Edit Event
                </h6>

            </div>
            <div class="modal-body">
                <div class="input-group">
                    <input type="text" id="event_title" class="form-control" placeholder="Event">
                    <div class="input-group-btn">
                        <button type="button" id="color-chooser-btn_edit" class="color-chooser btn dropdown-toggle " data-toggle="dropdown">
                            Type
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" id="color-chooser">
                            <li>
                                <a class="palette-primary" href="#">Primary</a>
                            </li>
                            <li>
                                <a class="palette-success" href="#">Success</a>
                            </li>
                            <li>
                                <a class="palette-info" href="#">Info</a>
                            </li>
                            <li>
                                <a class="palette-warning" href="#">warning</a>
                            </li>
                            <li>
                                <a class="palette-danger" href="#">Danger</a>
                            </li>
                            <li>
                                <a class="palette-default" href="#">Default</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /btn-group -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger float-right" data-dismiss="modal">
                    Close
                    <i class="fa fa-times"></i>
                </button>
                <button type="button" class="btn btn-success pull-left text_save" data-dismiss="modal">
                    Update
                </button>
            </div>
        </div>
    </div>
</div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/bootstrapDatetimePicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- EASY PIE CHART JS -->
<script src="{{ asset('assets/vendors/bower-jquery-easyPieChart/js/easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bower-jquery-easyPieChart/js/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jqueryeasing/js/jquery.easing.min.js') }}"></script>
<!--for calendar-->
<script src="{{ asset('assets/vendors/fullcalendar/js/fullcalendar.min.js') }}" type="text/javascript"></script>
<!--   Realtime Server Load  -->
<script src="{{ asset('assets/vendors/flotchart/js/jquery.flot.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/flotchart/js/jquery.flot.resize.js') }}" type="text/javascript"></script>
<!--Sparkline Chart-->
<script src="{{ asset('assets/vendors/sparklinecharts/jquery.sparkline.js') }}"></script>
<!-- Back to Top-->
<script type="text/javascript" src="{{ asset('assets/vendors/countUp.js/js/countUp.js') }}"></script>
<!--   maps -->
<script src="{{ asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bower-jvectormap/js/jquery-jvectormap-world-mill-en.js') }}"></script>
<!--  todolist-->
<script src="{{ asset('assets/js/pages/todolist.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>
@stop