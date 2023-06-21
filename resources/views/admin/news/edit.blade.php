@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    @lang('news/title.edit')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/blog.css') }}" rel="stylesheet" type="text/css">

    <!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>@lang('news/title.edit')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="material-icons breadmaterial">home</i>
                @lang('general.home')
            </a>
        </li>
        <li>
            <a href="#">@lang('news/title.news')</a>
        </li>
        <li class="active">@lang('news/title.edit')</li>
    </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="row">
        <div class="the-box no-border">
           {!! Form::model($news, array('url' => URL::to('admin/news/' . $news->id), 'method' => 'put', 'class' => 'bf', 'files'=> true)) !!}
                <div class="row">
                    <div class="col-sm-8">
                        <div class="form-group {{ $errors->first('title', 'has-error') }}">
                            {!! Form::text('title', null, array('class' => 'form-control input-lg', 'placeholder'=>trans('blog/form.ph-title'))) !!}
                            <span class="help-block">{{ $errors->first('title', ':message') }}</span>
                        </div>
                        <div class='box-body pad {{ $errors->first('content', 'has-error') }}'>
                            {!! Form::textarea('content', null, array('class' => 'textarea form-control','rows'=>'5','placeholder'=>trans('blog/form.ph-content'), 'style'=>'style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"')) !!}
                            <span class="help-block">{{ $errors->first('content', ':message') }}</span>
                        </div>
                    </div>
                    <!-- /.col-sm-8 -->
                    <div class="col-sm-4">
                        {{--<div class="form-group {{ $errors->first('blog_category_id', 'has-error') }}">--}}
                            {{--{!! Form::label('blog_category_id', trans('blog/form.ll-postcategory')) !!}--}}
                            {{--{!! Form::select('blog_category_id',$blogcategory ,null, array('class' => 'form-control select2', 'placeholder'=>trans('blog/form.select-category')))!!}--}}
                            {{--<span class="help-block">{{ $errors->first('blog_category_id', ':message') }}</span>--}}
                        {{--</div>--}}

                        <div class="form-group {{ $errors->first('category', 'has-error') }}">
                            <label for="blog_category" class="">News Category</label>
                            {!! Form::select('category',['popular'=>'popular','hotnews'=>'Hot News','world'=>'Wolrd News','lifestyle'=>'Life Style','business'=>'Business','sports'=>'Sports'], null, array('class' => 'form-control', 'id'=>'blog_category' ,'placeholder'=>trans('blog/form.select-category'))) !!}
                            <span class="help-block">{{ $errors->first('category', ':message') }}</span>
                        </div>

                        <div class="form-group {{ $errors->first('image', 'has-error') }}">
                            <label>@lang('news/form.lb-featured-img')</label>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-primary btn-file">
                                    <span class="fileupload-new">@lang('blog/form.select-file')</span>
                                    <span class="fileupload-exists">@lang('blog/form.change')</span>
                                     {!! Form::file('image', null, array('class' => 'form-control')) !!}
                                </span>
                                @if(!empty($news->image))
                                    <span class="fileupload-preview">
                                        <img src="{{URL::to('uploads/news/'.$news->image)}}" class="img-responsive" alt="Image">
                                    </span>
                                @endif
                            </div>
                            <span class="help-block">{{ $errors->first('image', ':message') }}</span>

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">@lang('blog/form.publish')</button>
                            <a href="{{ URL::to('admin/news') }}" class="btn btn-danger">@lang('news/form.discard')</a>
                        </div>
                    </div>
                    <!-- /.col-sm-4 --> </div>
                <!-- /.row -->
                {!! Form::close() !!}
        </div>
    </div>
    <!--main content ends-->
</section>
@stop
{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/summernote/summernote.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    <script src="{{ asset('assets/vendors/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}" ></script>
    {{--<script type="text/javascript" src="{{ asset('assets/js/pages/add_newblog.js') }}" ></script>--}}
    <script>
        $(document).ready(function() {
            $.material.init();
            $('.textarea').summernote({
                placeholder: 'write content here...',
                fontNames: ['Lato', 'Arial', 'Courier New'],

            });
            $('body').on('click', '.btn-codeview', function (e) {

                if ( $('.note-editor').hasClass("fullscreen") ) {
                    var windowHeight = $(window).height();
                    $('.note-editable').css('min-height',windowHeight);
                }else{
                    $('.note-editable').css('min-height','300px');
                }
            });
            $('body').on('click','.btn-fullscreen', function (e) {
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

        });


    </script>
@stop
