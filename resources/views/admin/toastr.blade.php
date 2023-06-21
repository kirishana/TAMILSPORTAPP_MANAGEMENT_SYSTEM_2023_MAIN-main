@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Toastr
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/snackbar/css/snackbar.min.css') }}">
    <link href="{{ asset('assets/vendors/toastr/css/toastr.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/css/pages/toastr.css') }}" rel="stylesheet"/>


@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Toastr Notification</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">UI features</a>
            </li>
            <li class="active">Toastr Notification</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">notifications</i>
                            Toastr Notification
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label" for="title">Title</label>
                                        <input id="title" type="text" class="form-control" value="Toastr Notifications"
                                               placeholder="Enter a title ...">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="message">Message</label>
                                        <textarea class="form-control" id="message" rows="3"
                                                  placeholder="Enter a message ...">Gnome &amp; Growl type non-blocking notifications</textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox-list">
                                            <div class="checkbox checker" id="uniform-closeButton">
                                                <label for="closeButton">
                                                    <input id="closeButton" type="checkbox" value="checked" checked=""
                                                           class="input-small"> Close Button
                                                </label>
                                            </div>
                                            <div class="checkbox checker" id="uniform-addBehaviorOnToastClick">
                                                <label for="addBehaviorOnToastClick">
                                                    <input id="addBehaviorOnToastClick" type="checkbox" value="checked"
                                                           class="input-small"> Add behavior on toast click
                                                </label>
                                            </div>
                                            <div class="checkbox checker" id="uniform-debugInfo">
                                                <label for="debugInfo">
                                                    <input id="debugInfo" type="checkbox" value="checked"
                                                           class="input-small"> Debug
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 ">
                                    <div class="form-group" id="toastTypeGroup">
                                        <label class="toast_type">Toast Type</label>
                                        <div class="radio-list padding-right10">
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="toasts" value="success" checked="">Success
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="toasts" value="info">Info
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="toasts" value="warning">Warning
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="toasts" value="error">Error
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="positionGroup">
                                        <label class="toast-position">Position</label>
                                        <div class="radio-list">
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="positions" value="toast-top-right"
                                                           checked="">Top Right
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="positions" value="toast-top-left"> Top
                                                    Left
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="positions" value="toast-top-full-width">
                                                    Top Full Width
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="positions"
                                                           value="toast-bottom-full-width"> Bottom Full Width
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="positions" value="toast-bottom-right">
                                                    Bottom Right
                                                </label>
                                            </div>
                                            <div class="radio  ">
                                                <label>
                                                    <input type="radio" name="positions" value="toast-bottom-left">
                                                    Bottom Left
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="controls">
                                        <div class="form-group">
                                            <label class="control-label" for="showEasing">Show Easing</label>
                                            <select class="form-control input-small" id="showEasing">
                                                <option>swing</option>
                                                <option>linear</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="hideEasing">Hide Easing</label>
                                            <select id="hideEasing" class="form-control input-small">
                                                <option>swing</option>
                                                <option>linear</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="showMethod">Show Method</label>
                                            <select id="showMethod" class="form-control input-small">
                                                <option value="show">show</option>
                                                <option value="fadein">fadeIn</option>
                                                <option value="slideDown">slideDown</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="hideMethod">Hide Method</label>
                                            <select class="form-control input-small" id="hideMethod">
                                                <option value="hide">hide</option>
                                                <option value="fadeOut">fadeOut</option>
                                                <option value="slideUp">slideUp</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="controls">
                                        <div class="form-group">
                                            <label class="control-label" for="showDuration">Show Duration</label>
                                            <input id="showDuration" type="text" placeholder="ms"
                                                   class="form-control input-small" value="1000">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="hideDuration">Hide Duration</label>
                                            <input id="hideDuration" type="text" placeholder="ms"
                                                   class="form-control input-small" value="1000">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="timeOut">Time out</label>
                                            <input id="timeOut" type="text" placeholder="ms"
                                                   class="form-control input-small" value="5000">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label" for="timeOut">Extended time out</label>
                                            <input id="extendedTimeOut" type="text" placeholder="ms"
                                                   class="form-control input-small" value="1000">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-default btn-raised toastrshow" id="showtoast">
                                        Show Toast
                                    </button>
                                    <button type="button" class="btn btn-default btn-raised toastrshow"
                                            id="cleartoasts">
                                        Clear Toasts
                                    </button>
                                    <button type="button" class="btn btn-default btn-raised toastrshow"
                                            id="clearlasttoast">Clear Last Toast
                                    </button>
                                </div>
                            </div>
                            <br/>
                            <div class="row margin-top-10">
                                <div class="col-md-12">
                                    <pre id="toastrOptions">Code... </pre>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 toast_material">
                                    <label class="toast_label">Material Toast and Snackbars</label>
                                    <div class="snackbar_toaster">
                                        <button type="button" class="btn btn-default snack_bar"
                                                data-content="This is a snackbar! Lorem lipsum dolor sit amet..."
                                                data-toggle="snackbar" data-timeout="0">Show snackbar
                                        </button>
                                        <button type="button" class="btn btn-default toaster" data-style="toast"
                                                data-content="This is a toast! Lorem lipsum dolor sit amet..."
                                                data-toggle="snackbar" data-timeout="0">Show toast
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- material list group -->
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="panel panel-info">--}}
                    {{--<div class="panel-heading">--}}
                        {{--<h3 class="panel-title">--}}
                            {{--<i class="material-icons">subject</i>--}}
                            {{--Material List Groups--}}
                        {{--</h3>--}}
                    {{--</div>--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="portlet-body material_list_body">--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<div class="list-group">--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-action-primary">--}}
                                                {{--<i class="material-icons">folder</i>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<div class="least-content">15m</div>--}}
                                                {{--<h4 class="list-group-item-heading">Tile with a label</h4>--}}
                                                {{--<p class="list-group-item-text">Donec id elit non mi porta gravida at--}}
                                                    {{--eget metus.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-action-primary">--}}
                                                {{--<i class="material-icons">folder</i>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<div class="least-content">10m</div>--}}
                                                {{--<h4 class="list-group-item-heading">Tile with a label</h4>--}}
                                                {{--<p class="list-group-item-text">Maecenas sed diam eget risus varius--}}
                                                    {{--blandit.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-action-primary">--}}
                                                {{--<i class="material-icons">folder</i>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<div class="least-content">8m</div>--}}
                                                {{--<h4 class="list-group-item-heading">Tile with a label</h4>--}}
                                                {{--<p class="list-group-item-text">Maecenas sed diam eget risus varius--}}
                                                    {{--blandit.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<div class="list-group">--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-action-primary">--}}
                                                {{--<i class="material-icons">folder</i>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<div class="action-secondary"><i class="material-icons">info</i></div>--}}
                                                {{--<h4 class="list-group-item-heading">Tile with an icon</h4>--}}
                                                {{--<p class="list-group-item-text">Donec id elit non mi porta gravida at--}}
                                                    {{--eget metus.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-action-primary">--}}
                                                {{--<i class="material-icons">folder</i>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<div class="action-secondary"><i class="material-icons">info</i></div>--}}
                                                {{--<h4 class="list-group-item-heading">Tile with an icon</h4>--}}
                                                {{--<p class="list-group-item-text">Maecenas sed diam eget risus varius--}}
                                                    {{--blandit.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-action-primary">--}}
                                                {{--<i class="material-icons">folder</i>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<div class="action-secondary"><i class="material-icons">info</i></div>--}}
                                                {{--<h4 class="list-group-item-heading">Tile with an icon</h4>--}}
                                                {{--<p class="list-group-item-text">Maecenas sed diam eget risus varius--}}
                                                    {{--blandit.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<div class="list-group">--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-picture">--}}
                                                {{--<img class="circle"--}}
                                                     {{--src="{{ asset('assets/img/authors/avatar3.jpg') }}"/>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<h4 class="list-group-item-heading">Tile with avatar</h4>--}}
                                                {{--<p class="list-group-item-text">Donec id elit non mi porta gravida at--}}
                                                    {{--eget metus</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-picture">--}}
                                                {{--<img class="circle"--}}
                                                     {{--src="{{ asset('assets/img/authors/avatar4.jpg') }}"/>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content">--}}
                                                {{--<h4 class="list-group-item-heading">Tile with avatar</h4>--}}
                                                {{--<p class="list-group-item-text">Maecenas sed diam eget risus varius--}}
                                                    {{--blandit.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                        {{--<div class="list-group-item">--}}
                                            {{--<div class="row-action-primary checkbox">--}}
                                                {{--<label>--}}
                                                    {{--<input type="checkbox">--}}
                                                {{--</label>--}}
                                            {{--</div>--}}
                                            {{--<div class="row-content list_checkbox">--}}
                                                {{--<h4 class="list-group-item-heading">Tile with a checkbox</h4>--}}
                                                {{--<p class="list-group-item-text">Donec id elit non mi risus varius--}}
                                                    {{--blandit.</p>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="list-group-separator"></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </section>
    <!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/toastr/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/toastr/js/pages/ui-toastr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/snackbar/js/snackbar.min.js') }}"></script>

@stop