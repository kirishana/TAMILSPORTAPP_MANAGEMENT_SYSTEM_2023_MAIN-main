@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
    General Settings
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />


    <link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"
        rel="stylesheet" media="screen" />
    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/trumbowyg/css/trumbowyg.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/vendors/trumbowyg/css/trumbowyg.colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}"  rel="stylesheet" media="screen"/>
    <link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css"/>
@stop
{{-- Page content --}}
@section('content2')
    <section class="content-header">
        <!--section starts-->
        <h1>Settings</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Settings</a>
            </li>
            <li class="active">General</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons  6:34 PM 9/24/2021">settings</i>
                            General Settings <div style="float:right">
                               
                            </div>
                        </h4>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <form role="form" method="post" action="/admin/general-setting/update/{{ $general->id }}"
                                enctype="multipart/form-data" class="form_controls">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="panel-body">

                                    <!-- --------------- -->
                                    <div class="col-md-4">
                                        <div class="img-file">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 300px;">
                                                    @if ($general->dashboard_logo)

                                                        <img src="/general/{{ $general->dashboard_logo }}"
                                                            style="width:194px;" alt="Tamil Sangam Norway">
                                                    @else
                                                    <img src="{{ asset('assets/images/SuperAdmin/dashboardLogo.png') }}"
                                                            alt="..." class="img-responsive" />

                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                    style="max-width: 400px; max-height: 200px;"></div>
                                                <div>
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new"
                                                            style="text-transform:none;font-size:15px;">Upload Dashboard
                                                            Logo <span style="text-transform:none;font-size:10px;">(194px *
                                                                46px)</span></span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="dashboard_logo">
                                                    </span>
                                                    <a href="#" class="btn btn-primary fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 300px;">
                                                    @if ($general->signup_logo)
                                                        <img src="/general/signUp/{{ $general->signup_logo }}"
                                                            style="width:190px;" alt="Tamil Sangam Norway">
                                                    @else
                                                       <img src="{{ asset('assets/images/SuperAdmin/signinLogo.png') }}"
                                                            alt="..." class="img-responsive" />
                                                    @endif
                                                </div>

                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                    style="max-width: 400px; max-height: 200px;"></div>
                                                <div>
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new"
                                                            style="text-transform:none;font-size:15px;">Upload Sign In/Sign
                                                            Up Logo <span style="text-transform:none;font-size:10px;">(190px
                                                                * 73px)</span></span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="sign_logo">
                                                    </span>
                                                    <a href="#" class="btn btn-primary fileinput-exists"
                                                        data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                           
                                    <div class="col-md-1"></div>

                                    <div class="col-md-7">

                                        <div class="panel-body">

                                            <div class="form-group label-floating">
                                                <label for="textinput" class="control-label">Application Name</label>
                                                <input id="textinput" type="text" name="name" value="{{ $general->name }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group label-floating">
                                                <label for="textinput" class="control-label">Application Title</label>
                                                <input id="textinput" type="text" value="{{ $general->title }}"
                                                    name="title" class="form-control">
                                            </div>
                                            <div class="form-group label-floating">
                                                <label for="textinput" class="control-label">Address</label>
                                                <input id="textinput" type="text" value="{{ $general->address }}"
                                                    name="address" class="form-control">
                                            </div>
                                            <div class="form-group label-floating">
                                                <label for="textinput" class="control-label">Telephone</label>
                                                <input id="textinput" type="tel" name="telephone"
                                                    value="{{ $general->telephone }}" class="form-control">
                                            </div>
                                            <div class="form-group label-floating">
                                                <label for="textinput" class="control-label">Email</label>
                                                <input id="textinput" type="text" name="email" value="{{ $general->email }}"
                                                    class="form-control">
                                            </div>
                                            <div class="form-group label-floating">
                                                <label for="textinput" class="control-label">Website Url</label>
                                                <input id="textinput" type="text" name="url" value="{{ $general->website_url }}"
                                                    class="form-control">
                                            </div>

                                            <!-- <button style="float:right" type="submit" class="btn btn-responsive btn-success">Update</button> -->
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <div class="col-md-10">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail headerImage">
                                                @if ($general->header)
                                                    <img src="/general/header/{{ $general->header }}" class="img-responsive"
                                                         alt="Tamil Sangam Norway">
                                                @else
                                                    <img src="{{ asset('assets/images/SuperAdmin/header.jpg') }}"
                                                       alt="..."
                                                        class="img-responsive" />
                                                @endif
                                            </div>

                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                ></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new" style="text-transform:none">Upload Header Image
                                                        (705px*120px)</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="header">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                               
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bootstrap-admin-panel-content">
                                <label>Footer <span style="color:red;font-size:20px;">*</span></label>
                                    <textarea id="ckeditor_full" name="description">{{ $general->footer?$general->footer:'' }}</textarea>
                                </div>    
<br>
                                <button style="float:right" type="submit"
                                    class="btn btn-responsive btn-warning">Update</button>
                            </div>
                        </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>

    </section>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- Bootstrap WYSIHTML5 -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}


    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.base64.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.colors.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.noembed.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.pasteimage.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.preformatted.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.upload.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/editor2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    
    <script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}"  type="text/javascript" ></script>
    <script  src="{{ asset('assets/vendors/ckeditor/js/config.js') }}"  type="text/javascript"></script>
    <script  src="{{ asset('assets/js/pages/editor1.js') }}"  type="text/javascript"></script>
@stop
