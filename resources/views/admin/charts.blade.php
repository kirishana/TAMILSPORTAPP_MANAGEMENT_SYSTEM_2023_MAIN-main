@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Charts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/pages/flot.css') }}"/>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Flot Charts</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Charts</a>
            </li>
            <li class="active">Flot Charts</li>
        </ol>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i> Stacked Bar Charts
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div id="basicFlotLegend" class="flotLegend"></div>
                        <div id="bar-chart-stacked" class="flotChart1"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- toggling series charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i> Bar Charts
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div id="basicFlotLegend0" class="flotLegend"></div>
                        <div id="bar-chart" class="flotChart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Tracking charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">multiline_chart</i> Spline Chart
                        </h3>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="basicFlotLegend1" class="flotLegend"></div>
                        <div id="spline-chart" class="flotChart1"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">show_chart</i> Line Chart
                        </h3>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="basicFlotLegend2" class="flotLegend"></div>
                        <div id="line-chart" class="flotChart1"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Real time charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">show_chart</i> Area Chart
                        </h3>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="area-chart" class="flotChart3"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">show_chart</i> Spline Area Chart
                        </h3>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="chart-spline" class="flotChart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <!-- Interacting charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">show_chart</i> Real Time Chart
                        </h3>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="realtime" class="flotChart3"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </section>
    <!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.stack.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.crosshair.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.time.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.selection.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.symbol.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.resize.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.categories.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/splinecharts/jquery.flot.spline.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flot.tooltip/js/jquery.flot.tooltip.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/customcharts.js') }}"></script>

@stop