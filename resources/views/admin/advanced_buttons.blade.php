@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Advanced Buttons
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
    <style>
        @media (max-width:340px){
        .button-group .button{
            padding: 0 10px !important;
        }
        }
    </style>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Advanced Buttons</h1>
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
            <li class="active">Advanced Buttons</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">edit</i> Flat Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="flatbuttons">
                            <div class="text-left">
                                Raised Buttons
                                <br/>
                                <ul>
                                    <li>
                                        <a href="#" class="btn btn-raised btn-default">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-raised btn-primary">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-raised btn-success">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-raised btn-info">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-raised btn-warning">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-raised btn-danger">Button</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-left">
                                Flat Buttons
                                <br/>
                                <ul>
                                    <li>
                                        <a href="#" class="btn btn-default btn_flat">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-primary btn_flat">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-success btn_flat">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-info btn_flat">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-warning btn_flat">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="btn btn-danger btn_flat">Button</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-left">
                                Disabled Buttons
                                <br/>
                                <fieldset disabled>
                                    <ul>
                                        <li>
                                            <a href="#" class="btn btn-default">Button</a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-primary">Button</a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-success">Button</a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-info">Button</a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-warning">Button</a>
                                        </li>
                                        <li>
                                            <a href="#" class="btn btn-danger">Button</a>
                                        </li>
                                    </ul>
                                </fieldset>
                            </div>
                            <div class="text-left">
                                Radiused Buttons
                                <br/>
                                <ul>
                                    <li>
                                        <a href="#" class="button button-rounded button-flat-default btn-default">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-rounded button-flat btn-primary">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-rounded button-flat btn-success">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-rounded button-flat btn-info">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-rounded button-flat btn-warning">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-rounded button-flat btn-danger">Button</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-left">
                                Rounded Buttons
                                <br/>
                                <ul>
                                    <li>
                                        <a href="#" class="button button-pill button-default">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-pill button-primary">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-pill button-success">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-pill button-info">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-pill button-warning">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-pill button-danger">Button</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-left">
                                Rectangle Box
                                <br/>
                                <ul>
                                    <li>
                                        <a href="#" class="button button-default">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-primary">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-success">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-info">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-warning">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-danger">Button</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="text-left">
                                Cirlce Buttons
                                <br/>
                                <ul>
                                    <li>
                                        <a href="#" class="button button-circle button-large button-default">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-circle button-large button-primary">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-circle button-large button-success">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-circle button-large button-info">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-circle button-large button-warning">Button</a>
                                    </li>
                                    <li>
                                        <a href="#" class="button button-circle button-large button-danger">Button</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">done</i> Border Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="flatbuttons">
                            <ul>
                                <li>
                                    <a href="#" class="button button-border button-default">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-primary button-border button-rounded">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-border button-success button-pill">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-border button-info button-large button-circle">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-border button-warning btn-icon">
                                        <i class="fa fa-camera"></i> Button
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="button button-border button-danger">Button</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">equalizer</i> Glow Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="text-left">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="button button-glow button-rounded button-default">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-glow button-rounded button-primary">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-glow button-rounded button-success">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-glow button-rounded button-info">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-glow button-rounded button-warning">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-glow button-rounded button-danger">Button</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">share</i> Rounded Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="text-left">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="button button-default button-rounded">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-rounded button-primary">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-rounded button-success">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-rounded button-warning">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-rounded button-danger">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-rounded button-info">Button</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">location_on</i> Pill Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="text-left">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="button button-default button-pill">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-pill button-primary">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-pill button-success">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-pill button-warning">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-pill button-danger">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-pill button-info">Button</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">crop_square</i> Square Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="text-left">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="button button-default">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-primary">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-success">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-warning">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-danger">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-info">Button</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">3d_rotation</i> 3-D Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="text-left">
                            <ul class="list-inline">
                                <li>
                                    <a href="#" class="button button-3d button-default">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-3d button-primary button-rounded">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-3d button-success button-pill">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-3d button-info button-circle button-large">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button button-3d button-warning">
                                        <i class="fa fa-camera"></i> Button
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="button button-3d btn-danger">Button</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">note_add</i> Button Wrapper
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="flatbuttons">
                            <ul>
                                <li>
                                            <span class="button-wrap">
                                                <a href="#" class="button button-circle button-default button-large">Button</a>
                                            </span>
                                </li>
                                <li>
                                            <span class="button-wrap">
                                                <a href="#" class="button button-circle button-primary button-large">Button</a>
                                            </span>
                                </li>
                                <li>
                                            <span class="button-wrap">
                                                <a href="#" class="button button-default button-pill ">Button</a>
                                            </span>
                                </li>
                                <li>
                                            <span class="button-wrap">
                                                <a href="#" class="button button-pill button-primary">Button</a>
                                            </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">more_horiz</i> Button size
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="flatbuttons_size">
                            <ul>
                                <li>
                                    <a href="#" class="button btn-raised button-rounded button-primary button-jumbo">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button btn-raised button-rounded button-primary button-large">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button btn-raised button-rounded button-primary">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button btn-raised button-rounded button-primary button-small">Button</a>
                                </li>
                                <li>
                                    <a href="#" class="button btn-raised button-rounded button-primary button-tiny">Button</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">pin_drop</i> Dropdown Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div>
                            <div class="btn-toolbar bs-component list-inline">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-default btn-raised">Default raised</a>
                                    <a href="#" data-target="#" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="#" class="btn btn-primary btn-raised">Primary raised</a>
                                    <a href="#" data-target="#" class="btn btn-primary btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-success">Success</a>
                                    <a href="#" data-target="#" class="btn btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-info">Info</a>
                                    <a href="#" data-target="#" class="btn btn-info dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-warning">Warning</a>
                                    <a href="#" data-target="#" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-danger">Danger</a>
                                    <a href="#" data-target="#" class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">Action</a>
                                        </li>
                                        <li>
                                            <a href="#">Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                        <div class="dorpdown-buttons">
                            <ul class="list-inline">
                                <li>
                                    <div class="button-dropdown" data-buttons="dropdown">
                                        <button class="button button-rounded button-primary">
                                            Select Me <i class="fa fa-caret-down"></i>
                                        </button>
                                        <ul class="button-dropdown-list">
                                            <li>
                                                <a href="#">Option Link 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 2</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 3</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-dropdown button-dropdown-primary" data-buttons="dropdown">
                                        <button class="button button-warning button-large">
                                            <i class="fa fa-bars"></i> Select Me
                                        </button>
                                        <ul class="button-dropdown-list is-below">
                                            <li>
                                                <a href="#">Option Link 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 2</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 3</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-dropdown button-dropdown-action" data-buttons="dropdown">
                                        <button class="button button-success">
                                            Select Me <i class="fa fa-caret-up"></i>
                                        </button>
                                        <ul class="button-dropdown-list is-above">
                                            <li>
                                                <a href="#">Option Link 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 2</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 3</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-dropdown button-dropdown-plain" data-buttons="dropdown">
                                        <button class="button button-danger button-pill">
                                            Select Me <i class="fa fa-caret-down"></i>
                                        </button>
                                        <ul class="button-dropdown-list">
                                            <li>
                                                <a href="#">Option Link 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 2</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 3</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-dropdown button-dropdown-info" data-buttons="dropdown">
                                        <a href="#" class="button button-info">
                                            <i class="fa fa-envelope"></i> Select Me <i class="fa fa-caret-down"></i>
                                        </a>
                                        <ul class="button-dropdown-list is-below">
                                            <li>
                                                <a href="#">Option Link 1</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 2</a>
                                            </li>
                                            <li>
                                                <a href="#">Option Link 3</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">adjust</i> Block Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="bs-component">
                            <a href="#" class="btn btn-default btn-lg btn-block btn-raised">Block level button</a>
                            <a href="#" class="btn btn-primary btn-lg btn-block btn-raised">Block level button</a>
                            <a href="#" class="btn btn-success btn-lg btn-block btn-raised">Block level button</a>
                            <a href="#" class="btn btn-info btn-lg btn-block btn-raised">Block level button</a>
                            <a href="#" class="btn btn-warning btn-lg btn-block btn-raised">Block level button</a>
                            <a href="#" class="btn btn-danger btn-lg btn-block btn-raised">Block level button</a>
                            <fieldset disabled>
                                <a href="#" class="btn btn-default btn-lg btn-block btn-raised">Block level button disabled</a>
                            </fieldset>
                        </div>
                        <div class="flatbuttons_small1">
                            <a href="#" class="button button-block button-rounded button-large">Button</a>
                            <br/>
                            <a href="#" class="button button-block button-rounded button-primary button-large">Button</a>
                            <br/>
                            <a href="#" class="button button-block button-rounded button-success button-large">Button</a>
                            <br/>
                            <a href="#" class="button button-block button-rounded button-warning button-large">Button</a>
                            <br/>
                            <a href="#" class="button button-block button-rounded button-danger button-large">Button</a>
                            <br/>
                            <a href="#" class="button button-block button-rounded button-info button-large">Button</a>
                        </div>
                    </div>
                </div>
                <div class="panel  panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">dashboard</i> Social Dashboard
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-lg-6 col-xs-12 col-sm-12">
                                <div class="list-group">
                                    <a href="#" class="list-group-item visitor">
                                        <p class="pull-right">
                                            <i class="fa fa-eye f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text">Profile Views</p>
                                    </a>
                                    <a href="#" class="list-group-item facebook-like">
                                        <p class="pull-right">
                                            <i class="fab fa-facebook-f f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text">Facebook Likes</p>
                                    </a>
                                    <a href="#" class="list-group-item google-plus">
                                        <p class="pull-right">
                                            <i class="fab fa-google-plus-g f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text">Google+</p>
                                    </a>
                                    <a href="#" class="list-group-item twitter">
                                        <p class="pull-right">
                                            <i class="fab fa-twitter f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text ">Twitter Followers</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6 col-xs-12 col-sm-12">
                                <div class="list-group">
                                    <a href="#" class="list-group-item tumblr">
                                        <p class="pull-right">
                                            <i class="fab fa-tumblr f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text">Tumblr</p>
                                    </a>
                                    <a href="#" class="list-group-item linkedin">
                                        <p class="pull-right">
                                            <i class="fab fa-linkedin-in f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text ">Linkedin</p>
                                    </a>
                                    <a href="#" class="list-group-item youtube">
                                        <p class="pull-right">
                                            <i class="fab fa-youtube f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text ">Youtube Play</p>
                                    </a>
                                    <a href="#" class="list-group-item vimeo">
                                        <p class="pull-right">
                                            <i class="fab fa-vimeo-v f"></i>
                                        </p>
                                        <h4 class="list-group-item-heading count">1000</h4>
                                        <p class="list-group-item-text">Vimeo</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">blur_linear</i> Button Group
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="buttongroup">
                            <ul class="p-l-0-res">
                                <li>
                                    <div class="btn-group btn-group-justified btn-group-raised btn_option">
                                        <a href="#" class="btn">Option 1</a>
                                        <a href="#" class="btn">Option 2</a>
                                        <a href="#" class="btn">Option 3</a>
                                    </div>
                                </li>
                                <li>
                                    <fieldset disabled>
                                        <div class="btn-group btn-group-justified btn-group-raised material-group">
                                            <a href="#" class="btn">Option 1</a>
                                            <a href="#" class="btn">Option 2</a>
                                            <a href="#" class="btn">Option 3</a>
                                        </div>
                                    </fieldset>
                                </li>
                                <li>
                                    <div class="button-group">
                                        <button type="button" class="button">Option 1</button>
                                        <button type="button" class="button">Option 2</button>
                                        <button type="button" class="button">Option 3</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-group">
                                        <button type="button" class="button button-primary">Option 1</button>
                                        <button type="button" class="button button-primary">Option 2</button>
                                        <button type="button" class="button button-primary">Option 3</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-group">
                                        <button type="button" class="button button-pill button-success button-action">Option 1</button>
                                        <button type="button" class="button button-pill button-success  button-action">Option 2</button>
                                        <button type="button" class="button button-pill button-success  button-action">Option 3</button>
                                    </div>
                                </li>
                                <li>
                                    <div class="button-group">
                                        <button type="button" class="button button-flat-primary">Option 1</button>
                                        <button type="button" class="button button-flat-primary">Option 2</button>
                                        <button type="button" class="button button-flat-primary">Option 3</button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-success button-width-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">queue</i> Quick Shortcuts
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-6 col-md-6">
                                <a href="#" class="btn btn-danger btn-sm btn-responsive" role="button">
                                    <span class="material-icons">apps</span>
                                    <br/> Apps
                                </a>
                                <br/>
                                <a href="#" class="btn btn-primary btn-sm btn-responsive" role="button">
                                    <i class="material-icons">equalizer</i>
                                    <br/> Reports
                                </a>
                                <br/>
                                <a href="#" class="btn btn-warning btn-sm btn-responsive" role="button">
                                    <span class="material-icons">bookmark</span>
                                    <br/> Bookmarks
                                </a>
                                <br/>
                                <a href="#" class="btn btn-primary btn-sm btn-responsive" role="button">
                                    <span class="material-icons">comment</span>
                                    <br/> Comments
                                </a>
                            </div>
                            <div class="col-xs-6 col-md-6">
                                <a href="#" class="btn btn-success btn-sm btn-responsive" role="button">
                                    <span class="material-icons">person</span>
                                    <br/> Users
                                </a>
                                <br/>
                                <a href="#" class="btn btn-info btn-sm btn-responsive" role="button">
                                    <span class="material-icons">note_add</span>
                                    <br/> Notes
                                </a>
                                <br/>
                                <a href="#" class="btn btn-warning btn-sm btn-responsive" role="button">
                                    <span class="material-icons">photo</span>
                                    <br/> Photos
                                </a>
                                <br/>
                                <a href="#" class="btn btn-primary btn-sm btn-responsive" role="button">
                                    <span class="material-icons">local_offer</span>
                                    <br/> Tags
                                </a>
                            </div>
                        </div>
                        <a href="#" class="btn btn-success btn-lg btn-block" role="button">
                            <span class="material-icons web-site">web</span> Website
                        </a>
                    </div>
                </div>
                <div class="panel panel-info button-width-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">group_work</i> Group buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="ui-group-buttons">
                                    <a href="#" class="btn btn-success" role="button">
                                        <span class="material-icons">thumb_up</span>
                                    </a>
                                    <div class="or"></div>
                                    <a href="#" class="btn btn-danger" role="button">
                                        <span class="material-icons">thumb_down</span>
                                    </a>
                                </div>
                                <div class="ui-group-buttons">
                                    <a href="#" class="btn btn-success" role="button">
                                        <span class="material-icons">folder</span>
                                    </a>
                                    <div class="or"></div>
                                    <a href="#" class="btn btn-danger" role="button">
                                        <span class="material-icons">delete</span>
                                    </a>
                                </div>
                                <br/>
                                <br/>
                                <div class="ui-group-buttons">
                                    <a href="#" class="btn btn-success" role="button">
                                        <i class="material-icons mate_icons">done</i> Sign Up
                                    </a>
                                    <div class="or"></div>
                                    <a href="#" class="btn btn-default" role="button">
                                        <i class="material-icons mate_icons">clear</i> Reset
                                    </a>
                                </div>
                                <br/>
                                <br/>
                                <div class="ui-group-buttons">
                                    <button type="button" class="btn btn-raised btn-primary btn-lg">Large button</button>
                                    <div class="or or-lg"></div>
                                    <button type="button" class="btn btn-raised btn-success btn-lg">Large button</button>
                                </div>
                                <br/>
                                <br/>
                                <div class="ui-group-buttons">
                                    <button type="button" class="btn btn-raised btn-primary">Default</button>
                                    <div class="or"></div>
                                    <button type="button" class="btn btn-raised btn-success">Success</button>
                                </div>
                                <br/>
                                <br/>
                                <div class="ui-group-buttons">
                                    <button type="button" class="btn btn-raised btn-primary btn-sm">Small button</button>
                                    <div class="or or-sm"></div>
                                    <button type="button" class="btn btn-raised btn-success btn-sm">Small button</button>
                                </div>
                                <br/>
                                <br/>
                                <div class="ui-group-buttons">
                                    <button type="button" class="btn btn-raised btn-primary btn-xs">Extra small button</button>
                                    <div class="or or-xs"></div>
                                    <button type="button" class="btn btn-raised btn-success btn-xs">Extra small button</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">cloud_circle</i> Buttons With Labels
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <h2>Cool Buttons With Labels</h2>
                            <div class="col-lg-6 col-xs-12 col-sm-6 buttons_labels">
                                <button type="button" class="btn btn-labeled btn-success">
                                            <span class="btn-label">
                                                <span class="material-icons">done</span>
                                            </span>
                                    Success
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-warning">
                                            <span class="btn-label">
                                                <span class="material-icons">bookmark</span>
                                            </span>
                                    Bookmark
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-default">
                                            <span class="btn-label">
                                                <span class="material-icons">keyboard_arrow_left</span>
                                            </span>
                                    Left
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-success">
                                            <span class="btn-label">
                                                <i class="material-icons">keyboard_arrow_up</i>
                                            </span> Up
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-info">
                                            <span class="btn-label">
                                                <i class="material-icons">refresh</i>
                                            </span> Refresh
                                </button>
                                <br/>
                                <a class="btn btn-success btn-labeled" role="button">
                                            <span class="btn-label">
                                                <i class="material-icons">info</i>
                                            </span> Info Web
                                </a>
                            </div>
                            <div class="col-lg-6 col-xs-12 col-sm-6">
                                <button type="button" class="btn btn-labeled btn-danger">
                                            <span class="btn-label">
                                                <i class="material-icons">clear</i>
                                            </span> Cancel
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-primary">
                                            <span class="btn-label">
                                                <i class="material-icons">camera</i>
                                            </span> Camera
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-default">
                                    Right
                                    <span class="btn-label cool_btn_right">
                                                <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                                            </span>
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-danger">
                                            <span class="btn-label">
                                                <i class="material-icons">keyboard_arrow_down</i>
                                            </span> Down
                                </button>
                                <br/>
                                <button type="button" class="btn btn-labeled btn-danger">
                                            <span class="btn-label">
                                                <i class="material-icons">delete</i>
                                            </span> Trash
                                </button>
                                <br/>
                                <a class="btn btn-success btn-labeled" role="button">
                                            <span class="btn-label">
                                                <i class="material-icons">web</i>
                                            </span> Web
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">vertical_align_bottom</i> Vertical buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="btn-group-vertical">
                            <a href="#" class="btn btn-raised">Button</a>
                            <a href="#" class="btn btn-raised">Button</a>
                            <a href="#" class="btn btn-raised">Button</a>
                            <a href="#" class="btn btn-raised">Button</a>
                        </div>
                        <div class="btn-group-vertical primary_vertical">
                            <a href="#" class="btn btn-primary btn-raised">Button</a>
                            <a href="#" class="btn btn-primary btn-raised">Button</a>
                            <a href="#" class="btn btn-primary btn-raised">Button</a>
                            <a href="#" class="btn btn-primary btn-raised">Button</a>
                        </div>
                        <div class="btn-group-vertical">
                            <a href="#" class="btn btn-success btn-raised">Button</a>
                            <a href="#" class="btn btn-success btn-raised">Button</a>
                            <a href="#" class="btn btn-success btn-raised">Button</a>
                            <a href="#" class="btn btn-success btn-raised">Button</a>
                        </div>
                        <div class="btn-group-vertical">
                            <a href="#" class="btn btn-info btn-raised">Button</a>
                            <a href="#" class="btn btn-info btn-raised">Button</a>
                            <a href="#" class="btn btn-info btn-raised">Button</a>
                            <a href="#" class="btn btn-info btn-raised">Button</a>
                        </div>
                        <div class="btn-group-vertical">
                            <a href="#" class="btn btn-warning btn-raised">Button</a>
                            <a href="#" class="btn btn-warning btn-raised">Button</a>
                            <a href="#" class="btn btn-warning btn-raised">Button</a>
                            <a href="#" class="btn btn-warning btn-raised">Button</a>
                        </div>
                        <div class="btn-group-vertical">
                            <a href="#" class="btn btn-danger btn-raised">Button</a>
                            <a href="#" class="btn btn-danger btn-raised">Button</a>
                            <a href="#" class="btn btn-danger btn-raised">Button</a>
                            <a href="#" class="btn btn-danger btn-raised">Button</a>
                        </div>
                    </div>
                </div>
                <div class="panel  panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">stars</i> Floating action buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <p class="bs-component">
                            <a href="#" class="btn btn-default btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-primary btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-success btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-info btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-warning btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-danger btn-fab"><i class="material-icons">grade</i></a>
                        </p>
                        <br>
                        <p class="bs-component btn-group-sm">
                            <a href="#" class="btn btn-default btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-primary btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-success btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-info btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-warning btn-fab"><i class="material-icons">grade</i></a>
                            <a href="#" class="btn btn-danger btn-fab"><i class="material-icons">grade</i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="paddingleft_right15">
            <div class="row">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">info_outline</i> Jumbotrons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="bs-component container">
                                <div class="jumbotron">
                                    <h3>Jumbotron</h3>
                                    <p>This is a simple hero unit,lightweight, flexible component that can optionally extend the entire viewport to showcase key marketing messages on your site.</p>
                                    <p>
                                        <a class="btn btn-primary btn-lg">Learn more</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="paddingleft_right15">
            <div class="row">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">done</i> Social Buttons
                        </h3>
                        <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body social_btn">
                        <div class="row">
                            <!--start-->
                            <div class="col-sm-4 social-buttons">
                                <h3>The Buttons</h3>
                                <a class="btn btn-block btn-social btn-bitbucket">
                                    <i class="fab fa-bitbucket"></i> Sign in with Bitbucket
                                </a>
                                <a class="btn btn-block btn-social btn-dropbox">
                                    <i class="fab fa-dropbox"></i> Sign in with Dropbox
                                </a>
                                <a class="btn btn-block btn-social btn-facebook">
                                    <i class="fab fa-facebook"></i> Sign in with Facebook
                                </a>
                                <a class="btn btn-block btn-social btn-flickr">
                                    <i class="fab fa-flickr"></i> Sign in with Flickr
                                </a>
                                <a class="btn btn-block btn-social btn-github">
                                    <i class="fab fa-github"></i> Sign in with GitHub
                                </a>
                                <a class="btn btn-block btn-social btn-google">
                                    <i class="fab fa-google"></i> Sign in with Google
                                </a>
                                <a class="btn btn-block btn-social btn-instagram">
                                    <i class="fab fa-instagram"></i> Sign in with Instagram
                                </a>
                                <a class="btn btn-block btn-social btn-linkedin">
                                    <i class="fab fa-linkedin"></i> Sign in with LinkedIn
                                </a>
                                <a class="btn btn-block btn-social btn-pinterest">
                                    <i class="fab fa-pinterest"></i> Sign in with Pinterest
                                </a>
                                <a class="btn btn-block btn-social btn-tumblr">
                                    <i class="fab fa-tumblr"></i> Sign in with Tumblr
                                </a>
                                <a class="btn btn-block btn-social btn-twitter">
                                    <i class="fab fa-twitter"></i> Sign in with Twitter
                                </a>
                                <a class="btn btn-block btn-social btn-vk">
                                    <i class="fab fa-vk"></i> Sign in with VK
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <h3>Available Classes</h3>
                                <ul class="social-class list-unstyled">
                                    <li data-code="bitbucket" data-name="Bitbucket">
                                        <code>btn-bitbucket</code>
                                        <span class="social-hex">#205081</span>
                                    </li>
                                    <li data-code="dropbox" data-name="Dropbox">
                                        <code>btn-dropbox</code>
                                        <span class="social-hex">#1087DD</span>
                                    </li>
                                    <li data-code="facebook" data-name="Facebook">
                                        <code>btn-facebook</code>
                                        <span class="social-hex">#418BC1</span>
                                    </li>
                                    <li data-code="flickr" data-name="Flickr">
                                        <code>btn-flickr</code>
                                        <span class="social-hex">#2BA9E1</span>
                                    </li>
                                    <li data-code="github" data-name="GitHub">
                                        <code>btn-github</code>
                                        <span class="social-hex">#444444</span>
                                    </li>
                                    <li data-code="google" data-name="Google">
                                        <code>btn-google</code>
                                        <span class="social-hex">#EF6F61</span>
                                    </li>
                                    <li data-code="instagram" data-name="Instagram">
                                        <code>btn-instagram</code>
                                        <span class="social-hex">#517FA4</span>
                                    </li>
                                    <li data-code="linkedin" data-name="LinkedIn">
                                        <code>btn-linkedin</code>
                                        <span class="social-hex">#007BB6</span>
                                    </li>
                                    <li data-code="pinterest" data-name="Pinterest">
                                        <code>btn-pinterest</code>
                                        <span class="social-hex">#4875B4</span>
                                    </li>
                                    <li data-code="tumblr" data-name="Tumblr">
                                        <code>btn-tumblr</code>
                                        <span class="social-hex">#CB2027</span>
                                    </li>
                                    <li data-code="twitter" data-name="Twitter">
                                        <code>btn-twitter</code>
                                        <span class="social-hex">#2C4762</span>
                                    </li>
                                    <li data-code="vk" data-name="VK">
                                        <code>btn-vk</code>
                                        <span class="social-hex">#587EA3</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4">
                                <div class="social-sizes">
                                    <h3>Different Sizes</h3>
                                    <a class="btn btn-block btn-social btn-lg">
                                        <i class="fab fa-google-plus"></i> Sign in with Google
                                    </a>
                                    <a class="btn btn-block btn-social btn-md">
                                        <i class="fab fa-google-plus"></i> Sign in with Google
                                    </a>
                                    <a class="btn btn-block btn-social btn-sm">
                                        <i class="fab fa-google-plus"></i> Sign in with Google
                                    </a>
                                    <a class="btn btn-block btn-social btn-xs ">
                                        <i class="fab fa-google-plus"></i> Sign in with Google
                                    </a>
                                    <hr>
                                    <div class="text-center">
                                        <a class="btn btn-social-icon btn-lg ">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                        <a class="btn btn-social-icon btn-md">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                        <a class="btn btn-social-icon btn-sm btn-google-plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                        <a class="btn btn-social-icon btn-xs">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end-->
                    </div>
                </div>
            </div>
        </div>
        <!--main content ends-->
    </section>
    <!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/scrollto.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/Buttons/js/buttons.js') }}" ></script>
    <!--social dashboard-->
    <script src="{{ asset('assets/js/pages/adv_buttons.js') }}" type="text/javascript"></script>

@stop
