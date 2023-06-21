@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    News Letter
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
@stop
<style>
    /*    .box {*/
    /*  width: 1000px;*/
    /*  height: 850px;*/
    /*  border: gray 1px solid;*/
    /*}*/
    .bgcolor {
        background-color: #dfe5ed;
    }

    .textbox {
        border: 1px solid #afb6ba;
        border-radius: 5px;
        line-height: 30px;
    }
</style>
{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>News Letter</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin/">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li> <a href="/organizations/view/{{ Auth::user()->id }}">
                    <i class="material-icons breadmaterial">spa</i>
                    Organizations
                </a></li>

            <li class="active">News Letter</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons  6:34 PM 9/24/2021">settings</i>
                            News Letter

                            <a style="float:right" href="/organizations/view/{{ Auth::user()->id }}"><i
                                    class="material-icons  leftsize">keyboard_backspace
                                </i>
                                Back</a>


                        </h4>

                    </div>
                    <div class="tab-content mar-top">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel-heading">

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="panel-body">

                                    <div class="bs-example">
                                        <div class="row">
                                            <div class="col-md-2">

                                            </div>
                                            <div class="col-md-10">
                                                <div id="myTabContent" class="tab-content">
                                                    <div class="tab-pane fade active in" id="home">

                                                        <form action="/organization/news-letter/store" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">

                                                                <div class="col-md-12 box">

                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <strong>Title:</strong>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="textbox"
                                                                                name="title"
                                                                                style="width:450px">
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <strong>Content:</strong>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <textarea id="ckeditor_full" name="content">

</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row" style="height:25%">
                                                                        <div class="col-md-2">
                                                                            <strong>Image</strong>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <div class="form-group">
                                                                                <div class="fileinput fileinput-new"
                                                                                    data-provides="fileinput">


                                                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                                                        style="max-width: 200px; max-height: 200px;">
                                                                                    </div>
                                                                                    <div>
                                                                                        <span
                                                                                            class="btn btn-primary btn-file">
                                                                                            <span
                                                                                                class="fileinput-new">Select
                                                                                                Image to Upload</span>
                                                                                            <span
                                                                                                class="fileinput-exists">Change</span>
                                                                                            <input type="file"
                                                                                                name="newsLetterImg">
                                                                                        </span>
                                                                                        <a href="#"
                                                                                            class="btn btn-primary fileinput-exists"
                                                                                            data-dismiss="fileinput">Remove</a>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-10">

                                                                    </div>
                                                                    <div class="col-md-2" style="margin-top:20px">
                                                                        <button class="btn btn-success"
                                                                            type="submit">Submit</button>

                                                                    </div>
                                                                </div>
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
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>

    <script src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/ckeditor/js/config.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/editor1.js') }}" type="text/javascript"></script>
@stop
