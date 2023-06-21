@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
View User Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
@stop
{{-- Page content --}}
@section('content2')
    <section class="content-header">
        <!--section starts-->
        <h1>User Profile</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Users</a>
            </li>
            <li class="active">User Profile</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                            User Profile
                                        </h3>

                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-2">
                                            <div class="img-file">
                                              
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            
                                        <div class="panel-body">
                        <form role="form" method="post" action="/admin/general-setting/update/{{$general->id}}"class="form_controls" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group label-floating">
                                <label for="textinput" class="control-label">Application Name</label>
                                <input id="textinput" type="text" name="name" value="{{$general->name}}" class="form-control">
                            </div>
                            <div class="form-group label-floating">
                                <label for="textinput" class="control-label">Application Title</label>
                                <input id="textinput" type="text" value="{{$general->title}}"name="title" class="form-control">
                            </div>
                            <div class="form-group label-floating">
                                <label for="textinput" class="control-label">Address</label>
                                <input id="textinput" type="text"  value="{{$general->address}}" name="address" class="form-control">
                            </div>
                            <div class="form-group label-floating">
                                <label for="textinput" class="control-label">Telephone</label>
                                <input id="textinput" type="tel"  name="telephone" value="{{$general->telephone}}" class="form-control">
                            </div>
                           
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">

                                                            @if($general->dashboard_logo)
                                                            <img src="/general/{{ $general->dashboard_logo }}" style="width:300px;" alt="josh logo">
                                @else
                                                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @endif>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px;">
                                
                                </div>
                                    <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select Dashboard Logo</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="dashboard_logo">
                                                </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                               
                            </div>

                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; ">
                                    @if($general->signup_logo)
                                    <img src="/general/{{ $general->signup_logo }}" style="width:300px;" alt="josh logo">
                                    @else
                                                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."
                                                                     class="img-responsive"/>
                                                            @endif>
                                    </div>
                                    
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"></div>
                                    <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select Sign In/Sign Up Logo</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="sign_logo">
                                                </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                
                               
                            </div>
                            <button style="float:right" type="submit" class="btn btn-responsive btn-warning">Update</button>
                        </form>
                    </div>                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                            <div class="img-file">
                                              
                                            </div>
                                        </div>
                                
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
@stop
