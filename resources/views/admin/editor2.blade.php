@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Form Editors
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/trumbowyg/css/trumbowyg.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/trumbowyg/css/trumbowyg.colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Form Editors2</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Forms</a>
                    </li>
                    <li class="active">Editors 2</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content paddingleft_right15">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title editor-clr">
                <h3 class="panel-title ">
                    <i class="material-icons">local_offer</i> Bootstrap WYSIHTML5
                </h3>
            </div>
        </div>
        <!--main content-->
        <div class="row">
            <!-- /.box -->
            <div class='box well well-sm'>
                <div class='box-header'>
                    <h3 class='box-title text-primary'>
                        Bootstrap WYSIHTML5
                        <small>Simple editor</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools"></div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class='box-body'>
                    <form>
                        <textarea class="textarea editor-cls" placeholder="Place some text here"></textarea>
                    </form>
                </div>
            </div>
            <!-- /.col-->
        </div>
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title editor-clr">
                    <h3 class="panel-title">
                        <i class="material-icons">local_offer</i> Summer Note
                    </h3>
                </div>
            </div>
            <div class="panel-body panel_bgcolor">
                <div class="bootstrap-admin-panel-content  summer_noted">
                    <div id="summernote"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="text-muted bootstrap-admin-box-title editor-clr">
                    <h3 class="panel-title">
                        <i class="material-icons">business_center</i> Flip Editor</h3>
                </div>
            </div>
            <div class="panel-body panel_bgcolor">
                <div class="bootstrap-admin-panel-content flip_editing">
                    <textarea id="split_editor"></textarea>
                </div>
            </div>
        </div>
    </div>
    <!--main content ends-->
</section>
<!-- content -->
</aside>
<!-- right-side -->
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <!-- Bootstrap WYSIHTML5 -->
    <script  src="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/summernote/summernote.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.base64.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.colors.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.noembed.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.pasteimage.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.preformatted.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.upload.min.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/js/pages/editor2.js') }}"  type="text/javascript"></script>

@stop