@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Simple Tables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    <!--end of page level css-->
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Simple Tables</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">DataTables</a>
                    </li>
                    <li class="active">Simple Tables</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">camera_alt</i> Simple Table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Airi Satou</td>
                                <td>Kelly</td>
                                <td>Satou124</td>
                                <td>
                                    <span class="label label-sm label-success">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Angelica</td>
                                <td>Ramos</td>
                                <td>Angelica343</td>
                                <td>
                                    <span class="label label-sm label-info">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ashton</td>
                                <td>Cox</td>
                                <td>Cox111</td>
                                <td>
                                    <span class="label label-sm label-warning">Suspended</span>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Bradley</td>
                                <td>Greer</td>
                                <td>Bradley</td>
                                <td>
                                    <span class="label label-sm label-danger">Blocked</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
        <div class="col-md-6">
            <!-- BEGIN BORDERED TABLE PORTLET-->
            <div class="portlet box danger">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">wifi</i> Bordered Table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>RoleName</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Airi Satou</td>
                                <td>Kelly</td>
                                <td>Satou124</td>
                                <td>
                                    <span class="label label-sm label-success">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Angelica</td>
                                <td>Ramos</td>
                                <td>Angelica343</td>
                                <td>
                                    <span class="label label-sm label-info">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ashton</td>
                                <td>Cox</td>
                                <td>Cox111</td>
                                <td>
                                    <span class="label label-sm label-warning">Suspended</span>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Bradley</td>
                                <td>Greer</td>
                                <td>Bradley</td>
                                <td>
                                    <span class="label label-sm label-danger">Blocked</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END BORDERED TABLE PORTLET-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box info">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">timer</i> Striped Rows Table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Airi Satou</td>
                                <td>Kelly</td>
                                <td>Satou124</td>
                                <td>
                                    <span class="label label-sm label-success">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Angelica</td>
                                <td>Ramos</td>
                                <td>Angelica343</td>
                                <td>
                                    <span class="label label-sm label-info">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ashton</td>
                                <td>Cox</td>
                                <td>Cox111</td>
                                <td>
                                    <span class="label label-sm label-warning">Suspended</span>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Bradley</td>
                                <td>Greer</td>
                                <td>Bradley</td>
                                <td>
                                    <span class="label label-sm label-danger">Blocked</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
        <div class="col-md-6">
            <!-- BEGIN CONDENSED TABLE PORTLET-->
            <div class="portlet box warning">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">movie_filter</i> Condensed Table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-condensed table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Username</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>Airi Satou</td>
                                <td>Kelly</td>
                                <td>Satou124</td>
                                <td>
                                    <span class="label label-sm label-success">Approved</span>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Angelica</td>
                                <td>Ramos</td>
                                <td>Angelica343</td>
                                <td>
                                    <span class="label label-sm label-info">Pending</span>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ashton</td>
                                <td>Cox</td>
                                <td>Cox111</td>
                                <td>
                                    <span class="label label-sm label-warning">Suspended</span>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Bradley</td>
                                <td>Greer</td>
                                <td>Bradley</td>
                                <td>
                                    <span class="label label-sm label-danger">Blocked</span>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Bradley</td>
                                <td>Greer</td>
                                <td>Bradley</td>
                                <td>
                                    <span class="label label-sm label-danger">Blocked</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END CONDENSED TABLE PORTLET-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box danger">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">filter_tilt_shift</i> Color Rows
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Class Name</th>
                                <th>Column</th>
                                <th>Column</th>
                                <th>Column</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="active">
                                <td>1</td>
                                <td>active</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                            </tr>
                            <tr class="success">
                                <td>2</td>
                                <td>success</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                            </tr>
                            <tr class="warning">
                                <td>3</td>
                                <td>warning</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                            </tr>
                            <tr class="danger">
                                <td>4</td>
                                <td>danger</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                                <td>Column heading</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
        <div class="col-md-6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box default">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">edit</i> Advanced Table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <i class="material-icons">card_travel</i> From
                                </th>
                                <th>
                                    <i class="material-icons">assignment</i> Description
                                </th>
                                <th>
                                    <i class="material-icons">account_balance_wallet</i> Total
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <a href="#">Pixel Ltd</a>
                                </td>
                                <td>Server Purchase</td>
                                <td>
                                    52560.10$
                                    <span class="label label-sm label-success label-mini">Paid</span>
                                </td>
                                <td>
                                    <a href="#" class="btn default btn-xs green-stripe">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">Smart House</a>
                                </td>
                                <td>Furniture Purchase</td>
                                <td>
                                    5760.00$
                                    <span class="label label-sm label-warning label-mini">Pending</span>
                                </td>
                                <td>
                                    <a href="#" class="btn default btn-xs yellow-stripe">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">FoodMaster Ltd</a>
                                </td>
                                <td>Annual Expenses</td>
                                <td>
                                    12400.00$
                                    <span class="label label-sm label-primary label-mini">Paid</span>
                                </td>
                                <td>
                                    <a href="#" class="btn default btn-xs blue-stripe">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#">WaterPure Ltd</a>
                                </td>
                                <td>Payment 2013</td>
                                <td>
                                    610.50$
                                    <span class="label label-sm label-danger label-mini">Overdue</span>
                                </td>
                                <td>
                                    <a href="#" class="btn default btn-xs red-stripe">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">fullscreen_exit</i> Columns Table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Column</th>
                                <th>Column</th>
                                <th>Column</th>
                                <th>Column</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td class="active">active</td>
                                <td class="success">success</td>
                                <td class="warning">warning</td>
                                <td class="danger">danger</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="active">active</td>
                                <td class="success">success</td>
                                <td class="warning">warning</td>
                                <td class="danger">danger</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="active">active</td>
                                <td class="success">success</td>
                                <td class="warning">warning</td>
                                <td class="danger">danger</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="active">active</td>
                                <td class="success">success</td>
                                <td class="warning">warning</td>
                                <td class="danger">danger</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
        <div class="col-md-6">
            <!-- BEGIN SAMPLE TABLE PORTLET-->
            <div class="portlet box danger">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">edit</i> Bootstrap Table
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="table-responsive">
                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <i class="material-icons">card_travel</i> Company
                                </th>
                                <th>
                                    <i class="material-icons">person</i> Contact
                                </th>
                                <th>
                                    <i class="material-icons">shopping_cart</i> Total
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="highlight">
                                    <div class="success"></div>
                                    <a href="#">HP</a>
                                </td>
                                <td>Ramos</td>
                                <td>2560.60$</td>
                                <td>
                                    <a href="#" class="btn default btn-xs purple">
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="highlight">
                                    <div class="info"></div>
                                    <a href="#">Google</a>
                                </td>
                                <td>Adam</td>
                                <td>560.60$</td>
                                <td>
                                    <a href="#" class="btn default btn-xs black">
                                        <i class="material-icons">delete</i> Delete
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="highlight">
                                    <div class="success"></div>
                                    <a href="#">Apple</a>
                                </td>
                                <td>Daniel</td>
                                <td>3460.60$</td>
                                <td>
                                    <a href="#" class="btn default btn-xs purple">
                                        <i class="material-icons">edit</i> Edit
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="highlight">
                                    <div class="warning"></div>
                                    <a href="#">Microsoft</a>
                                </td>
                                <td>Nick</td>
                                <td>2560.60$</td>
                                <td>
                                    <a href="#" class="btn default btn-xs blue">
                                        <i class="material-icons">share</i> Share
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
            <!-- END SAMPLE TABLE PORTLET-->
        </div>
    </div>
</section>
<!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
@stop
