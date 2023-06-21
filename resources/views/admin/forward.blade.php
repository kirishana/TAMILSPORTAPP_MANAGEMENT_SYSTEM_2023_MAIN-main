@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Forward
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css" />

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Forward</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/inbox') }}">Email</a>
                    </li>
                    <li class="active">Inbox</li>
                </ol>
            </section>
<!-- Main content -->
<section class="content">
    <div class="row web-mail">
        <div class="col-lg-2 col-md-3 col-sm-4">
            <div class="whitebg">
                <ul>
                    <li class="compose">
                        <a href="{{ URL::to('admin/compose') }}">
                            <i class="material-icons">mode_edit</i> &nbsp; &nbsp;Compose
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/inbox') }}">
                            <i class="material-icons">inbox</i> &nbsp; &nbsp;Inbox
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/sent') }}">
                            <i class="material-icons">check_circle</i> &nbsp; &nbsp; Sent
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/trash') }}">
                            <i class="material-icons">delete</i> &nbsp; &nbsp; Trash
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/spam') }}">
                            <i class="material-icons">visibility_off</i> &nbsp; &nbsp; Spam
                        </a>
                    </li>
                    <li>
                        <a href="{{ URL::to('admin/draft') }}">
                            <i class="material-icons">drafts</i> &nbsp; &nbsp; Draft
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-10 col-md-9 col-sm-8">
            <div class="whitebg">
                <table class="table table-striped table-advance">
                    <thead>
                    <tr>
                        <td colspan="4">
                            <div class="col-md-8">
                                <h4>
                                    <strong>Inbox</strong>
                                </h4>
                            </div>
                        </td>
                    </tr>
                    <tr></tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">
                            <div class="compose row">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="to1">To:</label>
                                    <input type="email" class="form-control" id="to1" tabindex="1" required>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="to">Subject:</label>
                                    <input type="text" class="form-control" id="to" tabindex="1"
                                           value="Fwd: New server for datacenter needed ">
                                </div>
                                <div class="clear"></div>
                                <div id="ccb">
                                    <div class="form-group">
                                        <label class="control-label">Cc:</label>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div id="cci" style="display:none">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="to">Cc:</label>
                                        <input type="text" class="form-control" tabindex="1">
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div id="bccb">
                                    <div class="form-group">
                                        <label class="control-label">Bcc:</label>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <div id="bcci" style="display:none">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="to">Bcc:</label>
                                        <input type="text" class="form-control" tabindex="1">
                                    </div>
                                </div>
                                <div class='box-body pad col-sm-12'>
                                    <form>
                                        <p>
                                        <div id="summernote"></div>
                                        </p>
                                        <p>
                                            <input type="file" class="default">
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td width="100%">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-md-4">
                                        <a href="inbox" class="btn btn-raised btn-block btn-primary">
                                            <i class="material-icons">send</i>
                                            Send
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="draft" class="btn btn-raised btn-block btn-success">
                                            <i class="material-icons">drafts</i>
                                            Draft
                                        </a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="trash" class="btn btn-raised btn-block btn-warning">
                                            <i class="material-icons">delete</i>
                                            Discard
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td width="3%"></td>
                        <td width="13%" class="view-message text-right">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- content -->

    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript">
    $('#slimscrollside').slimscroll({
        height: '700px',
        size: '3px',
        color: 'black',
        opacity: .3

    });
    $("#ccb").click(function() {
        $("#cci").toggle(500);
        $("#ccb").hide();

    });
    $("#bccb").click(function() {
        $("#bcci").toggle(500);
        $("#bccb").hide();

    });
    </script>
    <!-- begining of page level js-->
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#summernote').summernote();
        $('.note-link-url').on('keyup', function() {
            if($('.note-link-text').val() != '') {
                $('.note-link-btn').attr('disabled', false).removeClass('disabled');
            }
        });
    </script>
    <!-- end of page level js-->
@stop
