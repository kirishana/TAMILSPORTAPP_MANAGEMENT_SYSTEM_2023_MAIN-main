@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    JS Charts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')


@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>JSCharts</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Charts</a></li>
            <li class="active">JS Charts</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">insert_chart</i> Bar Chart
                        </h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="bar-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">insert_chart</i> Polar Area Chart
                        </h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="polar-area-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">insert_chart</i> Line Chart
                        </h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="line-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">insert_chart</i> Radar Chart
                        </h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="radar-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">donut_large</i> Donut Chart
                        </h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="doughnut-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">pie_chart</i> Pie Charts
                        </h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <canvas id="pie-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/chartjs/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/chartjs.js') }}"></script>

@stop