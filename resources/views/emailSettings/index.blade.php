@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Email Settings
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
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
        <h1>{{ __('sidebar.email_settings') }}</h1>
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

            <li class="active">Email Settings</li>
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
{{ __('sidebar.email_settings') }}
                            <a style="float:right" href="/organizations/view/{{ Auth::user()->id }}"><i
                                    class="material-icons  leftsize">keyboard_backspace
                                </i>
                                {{ __('staffs.back') }}</a>


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
                                                <ul class="nav nav-pills nav-stacked">
                                                    <li class="active">
                                                        <a href="#home" data-toggle="tab" class="bgcolor">{{ __('settings.email_verify') }}</a>
                                                    </li>
                                                    <li>
                                                        <a href="#profile" data-toggle="tab" class="bgcolor">{{ __('settings.pw_reset') }}</a>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="col-md-10">
                                                <div id="myTabContent" class="tab-content">
                                                    <div class="tab-pane fade active in" id="home">
                                                        @if (Auth::user()->organization->emailVerificationSetting)
                                                            <form
                                                                action="/organization/email-verify-setting/update/{{ Auth::user()->organization->emailVerificationSetting->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                            @else
                                                                <form action="/organization/email-verify-setting/store"
                                                                    method="POST" enctype="multipart/form-data">
                                                        @endif
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <strong>{{ __('settings.subject') }}:</strong>
                                                            </div>

                                                            <div class="col-md-10">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                    </div>
                                                                    <div class="col-md-10">

                                                                        <input type="text" class="textbox" name="subject"
                                                                            @if (Auth::user()->organization->emailVerificationSetting) value="{{ Auth::user()->organization->emailVerificationSetting->subject ? Auth::user()->organization->emailVerificationSetting->subject : '' }}" @endif
                                                                            style="width:680px">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <strong>{{ __('settings.body') }}:</strong>
                                                                </div>
                                                                <div class="col-md-10 box">
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <strong>{{ __('settings.logo') }}:</strong>
                                                                        </div>
                                                                        <div class="col-md-10" style="margin-top:5px">


                                                                            <input type="file" name="logo" />
                                                                            @if (Auth::user()->organization->emailVerificationSetting)
                                                                                {{ Auth::user()->organization->emailVerificationSetting->logo }}
                                                                            @endif


                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <strong>{{ __('settings.title') }}:</strong>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <input type="text" class="textbox"
                                                                                name="title"
                                                                                @if (Auth::user()->organization->emailVerificationSetting) value="{{ Auth::user()->organization->emailVerificationSetting->title ? Auth::user()->organization->emailVerificationSetting->title : '' }}" @endif
                                                                                style="width:450px">
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row">
                                                                        <div class="col-md-2">
                                                                            <strong>{{ __('settings.content') }}:</strong>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <textarea id="ckeditor_full" name="content">
@if (Auth::user()->organization->emailVerificationSetting)
{{ Auth::user()->organization->emailVerificationSetting->content ? Auth::user()->organization->emailVerificationSetting->content : '' }}
@endif
</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <br>
                                                                    <div class="row" style="height:25%">
                                                                        <div class="col-md-2">
                                                                            <strong>{{ __('settings.footer') }}:</strong>
                                                                        </div>
                                                                        <div class="col-md-10">
                                                                            <textarea id="ckeditor_full" name="footer">
@if (Auth::user()->organization->emailVerificationSetting)
{{ Auth::user()->organization->emailVerificationSetting->footer ? Auth::user()->organization->emailVerificationSetting->footer : '' }}
@endif
</textarea>

                                                                        </div>
                                                                    </div>
  @if (Auth::guard('web')->user()->can('EditSettings'))
                                                                    <div class="row">
                                                                        <div class="col-md-10">

                                                                        </div>
                                                                        <div class="col-md-2" style="margin-top:20px">
                                                                            <button class="btn btn-success"
                                                                                type="submit">{{ __('staffs.register') }}</button>

                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                        <div class="tab-pane fade" id="profile">
                                                            @if(Auth::user()->organization->emailVerificationSetting)
                                                            <form
                                                                action="/organization/email-verify-setting/reset-pw-update/{{ Auth::user()->organization->emailVerificationSetting->id }}"
                                                                method="POST" enctype="multipart/form-data">
@endif

                                                                @csrf

                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <strong>{{ __('settings.subject') }}:</strong>
                                                                    </div>
                                                                    <div class="col-md-10">
                                                                        <div class="row">
                                                                            <div class="col-md-2"></div>
                                                                                <div class="col-md-10">

                                                                        <input type="text" class="textbox"
                                                                            name="reset_pw_subject"
                                                                            @if (Auth::user()->organization->emailVerificationSetting) value="{{ Auth::user()->organization->emailVerificationSetting->reset_pw_subject ? Auth::user()->organization->emailVerificationSetting->reset_pw_subject : '' }}" @endif
                                                                            style="width:680px">
                                                                    </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <strong>{{ __('settings.body') }}:</strong>
                                                                    </div>
                                                                    <div class="col-md-10 box">

                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <strong>{{ __('settings.content') }}:</strong>
                                                                            </div>
                                                                            <div class="col-md-10">
                                                                                <textarea id="ckeditor_full" name="reset_pw_content">
@if (Auth::user()->organization->emailVerificationSetting)
{{ Auth::user()->organization->emailVerificationSetting->reset_pw_content ? Auth::user()->organization->emailVerificationSetting->reset_pw_content : '' }}
@endif
</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <br>
  @if (Auth::guard('web')->user()->can('EditSettings'))

                                                                        <div class="row">
                                                                            <div class="col-md-10">

                                                                            </div>
                                                                            <div class="col-md-2" style="margin-top:20px">
                                                                                <button class="btn btn-success"
                                                                                    type="submit">{{ __('staffs.register') }}</button>

                                                                            </div>
                                                                        </div>
                                                                        @endif
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
    <!-- <script src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/editor1.js') }}" type="text/javascript"></script> -->
@stop
