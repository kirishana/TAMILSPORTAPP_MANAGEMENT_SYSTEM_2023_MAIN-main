@extends('admin/layouts/default')


@section('title')
Add New Organization Member
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Organization</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Organizations</li>
        <li class="active">Organization Members</li>
        <li class="active">Add New</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="material-icons">person_add</i>
                        Add New Organization Member
                    </h3>
                </div>

                
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            @if($errors->any())
                                <div id="notification_remove">
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                                </div>
                            @endif

                                
                                    <!-- ----------------------------------------------------- -->
                                    <form class="form_action6" action="/organization/staff_Store" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                    <section class="content">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('first_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="first_name">First Name</label>
                                                        <input id="first_name" name="first_name"  type="text" class="form-control" value="{!! old('first_name') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('last_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <label class="control-label" for="last_name">Last Name</label>
                                                        <input id="last_name" name="last_name"  type="text" class="form-control" value="{{ old('last_name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('tel_number', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone</i></span>
                                                        <label class="control-label" for="club_email">Phone Number</label>
                                                        <input id="tel_number" name="tel_number"  type="number" class="form-control">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                            
                                                <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                                        <label class="control-label" for="email">E-Mail</label>
                                                        <input id="email" name="email"  type="email" class="form-control">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('dob', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                                        <input id="dob" name="dob"  type="date" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('gender', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">wc</i></span> 
                                                        <div class="radio">
                                                            <label><input type="radio" name="gender" id="optionsRadiosInline1" value="male">Male</label>
                                                            <label><input type="radio" name="gender" id="optionsRadiosInline2" value="female">Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating ">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <select id="disabledSelect" name="role" class="form-control">
                                                            <option value="7" >Player</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('country', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">assistant_photo</i></span>
                                                        <!-- <select id="country" name="country" class="form-control">
                                                            <option  selected>Select country</option>
                                                            
                                                        </select> -->
                                                        <label class="control-label" for="lastName4">Country <span style="color:red;"> <b> * </b></span></label>
                                    <select id="disabledSelect" name="country" class="form-control">
                                        <option disabled selected>Select country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{$country->id==Auth::user()->country->id?'selected':''}}>{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group  {{ $errors->first('organization', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">spa</i></span>
                                                        <label>Organization<span style="color:red;"> <b> * </b></span></label>

                                                <select id="disabledSelect" name="organization" class="form-control">
<?php $org=App\Models\Organization::find($id);
?>
                                                    <option selected value="{{ $org->id }}">{{ $org->name }}</option>
                                                </select>
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('club', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">group</i></span>
                                                        <select id="disabledSelect" name="club" class="form-control">
                                                        <option disabled selected>Select Club</option>
                                                        @foreach ($clubs as $club)
                                                        <option value="{{ $club->id }}">{{ $club->club_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    </div> 
                                                </div>
                                            </div>
                                            </div>

                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                        <label for="password2" class="youpasswd control-label">Password</label>
                                                        <input id="password2" name="password"  type="password"class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('password_confirmation', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                        <label for="password_confirmation" class="youpasswd control-label">Confirm Password</label>
                                                        <input id="password_confirmation" name="password_confirmation"  type="password" class="form-control"/>
                                                    </div>
                                                </div>
                                            </div>

                                    </section>

                                     <!-- <p class="signin button" style="padding-top: 15px;">
                                        <a href="/club_register" class="to_clubregister">
                                            <input type="submit" class="btn btn-raised btn-success btn-block" value="Register" />
                                        </a>
                                    </p> -->
                                   <!-- <p class="change_link">
                                        <a href="/login" class="to_clubregister">
                                            <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                        </a>
                                    </p> -->
                                    <!-- <div class="pull-right">
                            <p class="signin button" style="padding-top: 15px;">
                                <input type="submit" class="btn btn-raised btn-success btn-block" value="Register" />
                            </p>
                        </div> -->
                                    <div class="pull-right">
                            <p class="signin button" style="padding-top: 15px; padding-right: 15px; padding-bottom: 15px;">
                            <a href="">
                                            <button type="submit" class="btn btn-raised btn-success btn-block">Create</button>
                                        </a>
                            </p>
                        </div>

                                </form>

                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
    <!--row end-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/adduser.js') }}"></script>

@stop

<!-- ---------------------------------------------------------------------------------------- -->







