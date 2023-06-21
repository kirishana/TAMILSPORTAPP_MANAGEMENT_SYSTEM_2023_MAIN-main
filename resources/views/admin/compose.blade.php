@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Compose New Mail
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css"/>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Compose</h1>
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
            <li class="active">Compose</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row web-mail">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="whitebg">
                    <ul>
                        <li class="compose">
                            <a href="{{ URL::to('admin/compose') }}" class="btn_margin_top">
                                <i class="material-icons">mode_edit</i> &nbsp; &nbsp;Compose
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/inbox') }}" class="btn_margin_top">
                                <i class="material-icons">inbox</i> &nbsp; &nbsp;Inbox
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/sent') }}" class="btn_margin_top">
                                <i class="material-icons">check_circle</i> &nbsp; &nbsp; Sent
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/trash') }}" class="btn_margin_top">
                                <i class="material-icons">delete</i> &nbsp; &nbsp; Trash
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/spam') }}" class="btn_margin_top">
                                <i class="material-icons">visibility_off</i> &nbsp; &nbsp; Spam
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/draft') }}" class="btn_margin_top">
                                <i class="material-icons">drafts</i> &nbsp; &nbsp; Draft
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">

                <form>
                    <div class="panel">
                        <div class="panel-heading border-bottom whitebg">
                            <h4>
                                <strong>Compose</strong>
                            </h4>
                        </div>
                        <div class="panel-body">

                            <div class="compose row">
                                <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label" for="to1">To:</label>
                                    <input type="email" class="form-control" id="to1" tabindex="1" required>
                                </div>
                                <div class="clear"></div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="to">Subject:</label>
                                    <input type="text" class="form-control" id="to" tabindex="1">
                                </div>
                                </div>
                                <div class="clear"></div>
                                <div class='box-body pad col-sm-12'>
                                    <div id="summernote"></div>
                                </div>
                                <div class="col-xs-12">
                                    <a href="inbox" class="btn btn-raised btn-md btn-primary">
                                        <i class="material-icons mate-compose">send</i> Send
                                    </a>

                                    <a href="draft" class="btn btn-raised btn-md btn-success">
                                        <i class="material-icons mate-compose">drafts</i> Draft
                                    </a>

                                    <a href="inbox" class="btn btn-raised btn-md btn-warning">
                                        <i class="material-icons mate-compose">delete</i> Discard
                                    </a>
                                </div>
                            </div>


                        </div>

                    </div>

                </form>


            </div>
        </div>
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            placeholder: 'write content here...',
            fontNames: ['Lato', 'Arial', 'Courier New'],
        });

        $('body').on('click','.btn-fullscreen', '.btn-codeview', function (e) {
            setTimeout (function(){
                if ( $('.note-editor').hasClass("fullscreen") ) {
                    var windowHeight = $(window).height();
                    $('.note-editable').css('min-height',windowHeight);
                }else{
                    $('.note-editable').css('min-height','300px');
                }
            },500);

        });
        $('.note-link-url').on('keyup', function() {
            if($('.note-link-text').val() != '') {
                $('.note-link-btn').attr('disabled', false).removeClass('disabled');
            }
        });
        $('#slimscrollside').slimscroll({
            height: '700px',
            size: '3px',
            color: 'black',
            opacity: .3
        });
    </script>

@stop
