@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Session Timeout
@parent
@stop

{{-- page level styles --}}
@section('header_styles')    
    
	<link rel="stylesheet" href="{{ asset('assets/css/pages/session_timeout.css') }}" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Session Timeout</h1>
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
                    <li class="active">Session Timeout</li>
                </ol>
            </section>
<!-- Main content -->
<section class="content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">Widget settings form goes here</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-raised btn-primary">Save changes</button>
                    <button type="button" class="btn btn-raised btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">local_offer</i>
                        Session Timeout
                    </h3>
                   <span class="pull-right clickable">
                            <i class="material-icons">keyboard_arrow_up</i>
                        </span>
                </div>
                <div class="panel-body">
                    <div class="note note-success">
                        <p>
                            After a set amount of time(10 seconds set for demo), a dialog is shown to the user with the option to either log out now, or stay connected. If log out now is selected, the page is redirected to a logout URL. If stay connected is selected, a keep-alive URL is requested through AJAX. If no options is selected after another set amount of time, the page is automatically redirected to a timeout URL. To learn more please check out
                            <a href="https://github.com/maxfierke/jquery-sessionTimeout-bootstrap" target="_blank">the plugin's official homepage</a>
                        </p>
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

    <script src="{{ asset('assets/js/pages/jquery.sessionTimeout.min.js') }}" ></script>
    <script>
    jQuery(document).ready(function() {
        // initialize session timeout settings
        $.sessionTimeout({
            title: 'Session Timeout Notification',
            message: 'Your session is about to expire.',
            keepAliveUrl: 'session_timeout',
            redirUrl:'{!! Sentinel::getUser()->id !!}'+ '/lockscreen',
            logoutUrl: 'logout',
            warnAfter: 5000, //warn after 5 seconds
            redirAfter: 10000 //redirect after 10 secons
        });
    });
    </script>
    
@stop
