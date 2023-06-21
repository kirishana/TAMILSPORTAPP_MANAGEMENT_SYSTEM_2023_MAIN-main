@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Laravel Charts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Database Charts</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Laravel Charts</a>
            </li>
            <li class="active">Database Charts</li>
        </ol>
    </section>

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i> Google bar chart
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        {!! $google->html() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i> Pie chart
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        {!! $group_chart->html() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i> Database Chart
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        {!! $db_chart->html() !!}
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i>  Bar Chart
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        {!! $multi_db->html() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i> Line Chart
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        {!! $material->html() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i>  Area Chart
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        {!! $area->html() !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <!-- Stack charts strats here-->
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">insert_chart</i> Donut Chart
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i
                                    class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        {!! $donut->html() !!}
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

    {!! Charts::scripts() !!}
    {!! $db_chart->script() !!}
    {!! $multi_db->script() !!}
    {!! $group_chart->script() !!}
    {!! $material->script() !!}
    {!! $google->script() !!}
    {!! $area->script() !!}
    {!! $donut->script() !!}
@stop