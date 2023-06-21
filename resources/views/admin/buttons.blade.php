@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Buttons
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    
	<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Buttons</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">UI Features</a>
                    </li>
                    <li class="active">Buttons</li>
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
                        <i class="material-icons">notifications</i> Basic Buttons
                    </h3>
                    <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <button type="button" class="btn btn-raised btn-primary" data-toggle="button">Button 1</button>
                    <button type="button" class="btn btn-raised btn-success" data-toggle="button">Button 2</button>
                    <button type="button" class="btn btn-raised btn-info" data-toggle="button">Button 3</button>
                    <button type="button" class="btn btn-raised btn-warning" data-toggle="button">Button 4</button>
                    <button type="button" class="btn btn-raised btn-danger" data-toggle="button">Button 5</button>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">check</i> Custom buttons
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="tags">
                        <a href="#" class="success">CSS</a>
                        <a href="#" class="primary">Java Script</a>
                        <a href="#" class="info">jQuery</a>
                        <a href="#" class="danger">HTML5</a>
                        <a href="#" class="warning">CSS3</a>
                        <a href="#" class="success">WORDPRESS</a>
                        <a href="#" class="danger">ORACLE</a>
                        <a href="#" class="info">ASP.Net</a>
                        <a href="#" class="primary">C#</a>
                        <a href="#" class="warning">JOOMLA</a>
                        <a href="#" class="primary">JAVA</a>
                        <a href="#" class="success">Bootstrap</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">wb_iridescent</i> Wells
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="well well-sm">
                            Look, I'm in a small well!
                        </div>
                        <div class="well">
                            Look, I'm in a well!
                        </div>
                        <div class="well well-lg">
                            Look, I'm in a large well!
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">hourglass_full</i> Icon picker
                    </h3>
                    <span class="pull-right clickable">
                                <i class="material-icons">keyboard_arrow_up</i>
                            </span>
                </div>
                <div class="panel-body">
                    <div id="wraper1">
                        <div class="row">
                            <div class="form-group">
                                <form method="post">
                                    <input type="text" name="someName" class="icon-picker" placeholder="Click on icon and then search........ " />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">notifications</i> Badges
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="well">
                        <div class="panel badge_nav">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="javascript:void(0)">Home <span class="badge">12</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Profile <span class="badge"></span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Messages <span class="badge">4</span></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Settings <span class="badge"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">visibility</i> Button Size
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <div class="btn-group btn-group-lg">
                        <button type="button" class="btn btn-primary btn_sizes ">Button 1</button>
                        <button type="button" class="btn btn-success btn_sizes">Button 2</button>
                        <button type="button" class="btn btn-danger btn_sizes">Button 3</button>
                        <button type="button" class="btn btn-warning btn_sizes">Button 4</button>
                    </div>
                    <br/>
                    <br/>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn_sizes">Button 1</button>
                        <button type="button" class="btn btn-success btn_sizes">Button 2</button>
                        <button type="button" class="btn btn-danger btn_sizes">Button 3</button>
                        <button type="button" class="btn btn-warning btn_sizes">Button 4</button>
                    </div>
                    <br/>
                    <br/>
                    <div class="btn-group btn-group-sm">
                        <button type="button" class="btn btn-primary btn_sizes">Button 1</button>
                        <button type="button" class="btn btn-success btn_sizes">Button 2</button>
                        <button type="button" class="btn btn-danger btn_sizes">Button 3</button>
                        <button type="button" class="btn btn-warning btn_sizes">Button 4</button>
                    </div>
                    <br/>
                    <br/>
                    <div class="btn-group btn-group-xs">
                        <button type="button" class="btn btn-primary btn_sizes">Button 1</button>
                        <button type="button" class="btn btn-success btn_sizes">Button 2</button>
                        <button type="button" class="btn btn-danger btn_sizes">Button 3</button>
                        <button type="button" class="btn btn-warning btn_sizes">Button 4</button>
                    </div>
                </div>
            </div>
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">note_add</i> Breadcrumbs
                    </h3>
                    <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <div class="bs-example">
                        <ul class="breadcrumb">
                            <li class="next">
                                <a href="#">
                                    <i class="material-icons">home</i> Home
                                </a>
                            </li>
                            <li class="next">
                                <a href="#">UI Features</a>
                            </li>
                            <li>Pickers</li>
                        </ul>
                        <ul class="breadcrumb">
                            <li class="next1">
                                <a href="#">
                                    <i class="material-icons">home</i> Dashboard
                                </a>
                            </li>
                            <li>Tables</li>
                        </ul>
                        <ul class="breadcrumb">
                            <li class="next2">
                                <a href="#">
                                    <i class="material-icons">home</i> Dashboard
                                </a>
                            </li>
                            <li class="next2">
                                <a href="#">Tables</a>
                            </li>
                            <li>Data Tables</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">card_giftcard</i> Poll
                    </h3>
                    <span class="pull-right clickable">
                                <i class="material-icons">keyboard_arrow_up</i>
                            </span>
                </div>
                <div class="panel-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="material-icons">check_box</i> Who will win this year Football?
                            </h3>
                        </div>
                        <div class="panel-body">
                            <div class="checkbox col-md-12">
                                <label>
                                    <input type="checkbox" value="">&nbsp; Brazil</label>
                            </div>
                            <div class="checkbox col-md-12">
                                <label>
                                    <input type="checkbox" value="">&nbsp; Netherlands</label>
                            </div>
                            <div class="checkbox col-md-12">
                                <label>
                                    <input type="checkbox" value="">&nbsp; France</label>
                            </div>
                            <div class="checkbox col-md-12">
                                <label>
                                    <input type="checkbox" value="">&nbsp; Germany</label>
                            </div>
                            <div class="checkbox col-md-12">
                                <label>
                                    <input type="checkbox" value="">&nbsp; Others</label>
                            </div>
                        </div>
                        <div class="panel-footer text-center">
                            <button type="button" class="btn btn-raised btn-primary btn-block btn-sm">Vote</button>
                            <a href="#" class="small view_resulttext">View Result</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">build</i> Toggle Button
                    </h3>
                    <span class="pull-right clickable">
                                <i class="material-icons">keyboard_arrow_up</i>
                            </span>
                </div>
                <div class="panel-body">
                    <div class="well toggle_well">
                        <div class="col-md-6 togglebutton">
                            <label>
                                Wi-Fi
                                <input type="checkbox" class="toggle_btn" checked="">
                            </label>
                        </div>
                        <div class="col-md-6 togglebutton">
                            <label>
                                Bluetooth
                                <input type="checkbox" class="toggle_btn">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <!--icon picker-->
    <script src="{{ asset('assets/js/pages/buttons.js') }}" type="text/javascript"></script>
    
@stop
