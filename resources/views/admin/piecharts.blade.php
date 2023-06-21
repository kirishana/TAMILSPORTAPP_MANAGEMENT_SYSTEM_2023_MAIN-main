@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Pie Charts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/c3/c3.min.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/morrisjs/morris.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/pages/piecharts.css') }}" rel="stylesheet" type="text/css"/>


@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Pie Charts</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Charts</a></li>
            <li class="active">Pie Charts</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row ">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">pie_chart</i> D3 Basic Pie chart
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body text-center">
                        <div id="pie1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">pie_chart</i> D3 Pie chart with tooltips
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body text-center">
                        <div id="pie2"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">pie_chart</i> D3 Pie chart with small segment
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body text-center">
                        <div id="pie3"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">donut_large</i> D3 Donut chart
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body text-center">
                        <div id="pie4"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <!-- Trans label pie charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">pie_chart</i> C3 Pie chart
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body text-center">
                        <div class="demo-container">
                            <div id="chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Trans label pie charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">donut_large</i> Morris Donut chart
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body text-center">
                        <div class="demo-container">
                            <div id="morris-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <!-- Trans label pie charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">pie_chart</i> Interactive Charts
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body">
                        <div class="demo-container">
                            <div class="col-lg-6">
                                <div id="placeholderradiuslabel" class="demo-placeholder1"></div>
                            </div>
                            <div class="col-lg-6">
                                <div id="placeholdertiltedpie" class="demo-placeholder1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="col-lg-6">
                <!-- Trans label pie charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">pie_chart</i> Hidden Labels &amp; Rectangular Pie
                        </h3>
                        <span class="pull-right">
                        <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                    </span>
                    </div>
                    <div class="panel-body">
                        <div class="demo-container">
                            <div id="placeholderrectangularpie" class="demo-placeholder1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <!-- Trans label pie charts strats here-->
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">donut_large</i> Donut Hole
                    </h3>
                    <span class="pull-right">
                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                class="material-icons removepanel clickable">clear</i>
                </span>
                </div>
                <div class="panel-body">
                    <div class="demo-container">
                        <div class="col-lg-6">
                            <div id="placeholderdonuthole" class="demo-placeholder1"></div>
                        </div>
                        <div class="col-lg-6">
                            <div id="placeholdernolegend" class="demo-placeholder1"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.pie.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/flotchart/js/jquery.flot.resize.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/d3/d3.min.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/d3pie/d3pie.min.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/c3/c3.min.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/morrisjs/morris.min.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/raphael/js/raphael-min.js') }}"></script>
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/js/pages/custompiecharts.js') }}"></script>

@stop