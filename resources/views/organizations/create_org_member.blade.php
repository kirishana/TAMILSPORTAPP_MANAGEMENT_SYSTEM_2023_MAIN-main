@extends('admin/layouts/default')
@section('title')
Add New Organization Member
@parent
@stop
{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
{{--  <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">  --}}
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/thead.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<style>
        input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
    </style>
<!--end of page level css-->
@stop
{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('dashboard.members') }}</h1>
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
{{ __('staffs.add_new_member') }}
                        <div style="float:right">
                            <a href="" style="color:white">
                                <i class="material-icons">keyboard_arrow_left</i>
    
                                <a href="/org_member_data" style="color:white">
                                    {{ __('staffs.back') }}</a>
                                </div>
                    </h3>
                </div>

                
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">
                        <div class="col-md-12">
                                    <!-- ----------------------------------------------------- -->
                                    <form class="form_action6" action="/organization/memberStore" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                    <section class="content">
                                                                <div class="alert alert-danger" style="display:none"></div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('first_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="first_name">{{ __('staffs.f_name') }}
<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="first_name" name="first_name"   type="text" class="form-control" value="{!! old('first_name') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('last_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <label class="control-label" for="last_name">{{ __('staffs.l_name') }}
<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="last_name" name="last_name"  type="text" class="form-control" value="{{ old('last_name') }}">
                                                    </div>
                                                                                                                                                                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group {{ $errors->first('tel_number', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone</i></span>
                                                        <?php 
                                                        $org=App\Models\Organization::find(Auth::user()->organization_id?Auth::user()->organization_id:$id);
                                                        ?>
                                                        <label class="control-label" for="club_email">{{ __('dashboard.phone_no') }}
</label>
                                                        <div class="row">
                                                        <div class="col-sm-1 code" style="margin-top:4%;">{{ $org->country->countryCode->name }}</div>
                                                        <div class="col-sm-10">

                                                        <input id="tel_number" name="tel_number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "8"  type="number" class="form-control" value="{!! old('tel_number') !!}">

                                                    </div>
                                                    </div>
                                                    </div>
                                                                                                                                                                            {!! $errors->first('tel_number', '<span class="help-block">:message</span>') !!}

                                                    
                                                </div>
                                            </div>


                                                     
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                            
                                                <div class="form-group  {{ $errors->first('email', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                                        <label class="control-label" for="email">{{ __('dashboard.email') }}<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="email" name="email"  type="email" class="form-control" value="{!! old('email') !!}">
                                                    </div>
                                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                                        <label class="control-label" for="dob">{{ __('dashboard.dob') }}<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="dob" name="dob" max={{$today}} type="date" class="form-control" value="{!! old('dob') !!}">
                                                    </div>
                                                                                                                                                                            {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group  ">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">wc</i></span>
                                                        <label class="control-label" for="gender">{{ __('dashboard.gender') }}<span style="color:red;"> <b> * </b></span></label>
                                                        <div class="radio">
                                                            <label><input type="radio" name="gender" id="optionsRadiosInline1" value="male" @if(old('gender')=='male') checked @endif>{{ __('staffs.male') }}</label>
                                                            <label><input type="radio" name="gender" id="optionsRadiosInline2" value="female" @if(old('gender')=='female') checked @endif>{{ __('staffs.female') }}</label>
                                                        </div>
            
                                                    </div>
                                                    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}

                                                </div>
                                            </div>
                                            
                                        </div>

                                      

                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group  {{ $errors->first('organization', 'has-error') }}">
                                                   
                                                   
<div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <label class="control-label" for="dob">{{ __('staffs.role') }}</label>

                                                        <select id="disabledSelect" name="role" class="form-control">
                                                            <option value="7" >Player</option>
                                                        </select>
                                                    </div>
                                                   
                                                    
                                                </div>
                                            </div>
                                                                                                   

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('club', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">group</i></span>
                                                        <?php $org=App\Models\Organization::find(Auth::user()->organization_id?Auth::user()->organization_id:$id);
?>
                                                        <label>{{ __('dashboard.club') }}</label>
                                                        <select id="select24" name="club" class="form-control select2">
                                                        <option disabled selected style="margin-top: 5%;">Select Club</option>
                                                        @foreach ($org->country->clubs->where('is_approved','=', 1) as $club)
                                                        @if(old('club')==$club->id)
                                                        <option value="{{ $club->id }}" selected>{{ $club->club_name }}</option>
                                                        @else
                                                        <option value="{{ $club->id }}">{{ $club->club_name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    </div> 
                                                    {!! $errors->first('club', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                            </div>

                                        <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                        <label for="password2" class="youpasswd control-label">{{ __('dashboard.pw') }} <span style="color:red;"> <b> * </b></label>
                                                        <input id="password2" name="password"  type="password"class="form-control" value="{!! old('password') !!}"/>
                                                    </div>
                                                                                                                                                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}

                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('password_confirmation', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                        <label for="password_confirmation" class="youpasswd control-label">{{ __('dashboard.confirm_pw') }}<span style="color:red;"> <b> * </b></label>
                                                        <input id="password_confirmation" name="password_confirmation"  type="password" class="form-control" value="{!! old('password_confirmation') !!}"/>
                                                    </div>
                                                                                                                                                                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}

                                                </div>
                                            </div>
                                           
                                </div>
                                    </section>

                                    <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                @if($org->orgsetting)
                                        @if($org->orgsetting->active==1)
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="control-label" for="Gender" style="font-size:15px;">{{$org->orgsetting->extra_question}}<span style="color:red;"> <b> * </b></span></label>
                                                <div class="radio" id="member">
                                                    <label><input type="radio" name="member" id="optionsRadiosInline1" value="1" @if(old('member')=='1' ) checked @endif>{{ __('staffs.yes') }}</label>
                                                    <label><input type="radio" name="member" id="optionsRadiosInline2" value="0" @if(old('member')=='0' ) checked @endif>{{ __('staffs.no') }}</label>
                                                </div>
                                            </div>
                                            {!! $errors->first('member', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        @endif
                                        @endif
                                        <div class="row" style="display:none" id="memberInfo">
                                        @if($org->orgsetting)
                                        @if($org->orgsetting->active==1)
                                        <p>{!! html_entity_decode($org->orgsetting->no) !!}</p>
                                        @endif
                                        @endif



                                        </div>
                                        <div class="row" style="display:none" id="memberInfoYes">
                                        @if($org->orgsetting)
                                        @if($org->orgsetting->active==1)
                                        <p>{!! html_entity_decode($org->orgsetting->yes) !!}</p>
                                        @endif
                                        @endif



                                        </div>
                                    </div>
                                </div>
                    </div>
                                    <div class="pull-right">
                            <p class="signin button" style="padding-top: 15px; padding-right: 15px; padding-bottom: 15px;">
                            <a href="">
                                            <button type="submit" class="btn btn-raised btn-success btn-block">{{ __('staffs.register') }}</button>
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
{{--  <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>  --}}
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>

@stop

<!-- ---------------------------------------------------------------------------------------- -->
{{--  <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>  --}}
    <!-- Bootstrap -->
    <!-- end of global js -->
    <script>
           $("#dob").on('change', function() {
    var date = $("#dob").val();
    var year=date.split("-");
    console.log(year[0]);

    var currentTime = new Date()
var currentYear = currentTime.getFullYear();
var age=currentYear-year[0];
console.log(age);
if(age<5){
        $(".alert-danger").empty();

        $(".alert-danger").show();

                 $(".alert-danger").append("Your age Should be above 5");
}
else if(age>120){
        $(".alert-danger").empty();

        $(".alert-danger").show();

                 $(".alert-danger").append("Your age Should be less than 120");
}
else{
    $(".alert-danger").empty();
    $(".alert-danger").hide();
}
}); 
        $(document).ready(function($) {
            $("#country").change(function() {
                var country = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '/countries/' + country,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country": country
                    },
                    success: function(response) {
                 

                 $('.code').empty();
                 $('.code').append(response.code);
                   
                 
             
         }
     });

 });
});
$(document).ready(function($) {
$('#member input[type=radio]').change(function(){   
      var mamber = $(this).val();
                if (mamber == 0) {
                    $("#memberInfo").show();
                    $("#memberInfoYes").hide();

                } else {
                    $("#memberInfo").hide();
                    $("#memberInfoYes").show();

                }

            });
            });
             
    </script>







