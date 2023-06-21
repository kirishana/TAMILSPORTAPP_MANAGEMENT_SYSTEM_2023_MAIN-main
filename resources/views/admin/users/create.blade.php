@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add User
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<!-- <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"> -->
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet"> -->
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<!-- <link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" /> -->
<!--end of page level css-->
<style>
        input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
    </style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.users') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Users</a></li>
        <li class="active">Add New User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">person_add</i>
                        {{ __('sidebar.add_new') }}
                        <div style="float:right">
                            <a href="/users" style="color:white">
                                {{ __('staffs.back') }}</a>
                        </div>
                    </h3>
                    {{-- <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span> --}}
                </div>
                <div class="panel-body">

                    <form class="form_action6" action="/user/userStore" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                        <section class="content">

                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                            <label class="control-label" for="first_name">{{ __('staffs.f_name') }} <span style="color:red;"> <b> * </b></span></label>
                                            <input id="first_name" name="first_name"  type="text" class="form-control" value="{!! old('first_name') !!}">
                                        </div>
                                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">person</i></span>
                                            <label class="control-label" for="last_name">{{ __('staffs.l_name') }}<span style="color:red;"> <b> * </b></span></label>
                                            <input id="last_name" name="last_name"  type="text" class="form-control" value="{{ old('last_name') }}">
                                        </div>
                                        {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                            <label class="control-label" for="dob">{{ __('dashboard.dob') }}<span style="color:red;"> <b> * </b></span></label>
                                            <input id="dateOfBirth" name="dob"  type="date" class="form-control" max={{$today}} value="{{ old('dob') }}">
                                        </div>
                                        {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">email</i></span>
                                            <label class="control-label" for="email1">{{ __('dashboard.email') }}<span style="color:red;"> <b> * </b></span></label>
                                            <input id="email" name="email"  type="email" class="form-control" value="{{ old('email') }}">
                                        </div>
                                       {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">person</i></span>
                                            <label>{{ __('staffs.reg_as') }}<span style="color:red;"> <b> * </b></span></label>

                                            <select id="role" name="role" class="form-control">
                                                <option disabled selected value="null">Register As</option>

                                                @foreach ($roles as $role)
                                                 @if (old('role') == $role->id)
                                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                            @else
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        {!! $errors->first('role', '<span class="help-block">:message</span>') !!}
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

                            <div class="row">   
                

            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group label-floating {{ $errors->first('club', 'has-error') }}">
                    <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">group</i></span>
                                                <?php $org=App\Models\Organization::find(Auth::user()->organization_id?Auth::user()->organization_id:$id);
?>
                                                <label>{{ __('dashboard.club') }}<span style="color:red;"> <b> * </b></span></label>
                                                <select id="select24" name="club" class="form-control select2">
                                                    <option disabled selected value="null">Select Club</option>
                                                    @foreach ($org->country->clubs as $club)
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

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                            <?php $org=App\Models\Organization::find(Auth::user()->organization_id?Auth::user()->organization_id:$id);
                                            ?>
                                          
                                            <label class="control-label" for="tel-number">{{ __('dashboard.phone_no') }}</label>
                                            <div class="row">
                                                <div class="col-md-1 code" style="margin-top:3%;">
{{ $org->country->countryCode->name }}
                                                </div>
                                                    <div class="col-md-10">
  <input id="tel-number" name="tel-number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type= "number" maxlength = "8" class="form-control" value="{!! old('tel-number') !!}">                                                    </div>
                                        </div>
                                    </div>
                                    {!! $errors->first('tel-number', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                                   
                          
                                    
                                </div>


                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                <label for="password2" class="youpasswd control-label">{{ __('dashboard.pw') }}<span style="color:red;"> <b> * </b></span></label>
                                                <input id="password2" name="password"  type="password" class="form-control"  value="{!! old('password') !!}"/>
                                            </div>
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group label-floating {{ $errors->first('password_confirmation', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                <label for="password_confirmation" class="youpasswd control-label">{{ __('dashboard.confirm_pw') }}<span style="color:red;"> <b> * </b></span></label>
                                                <input id="password_confirmation" name="password_confirmation"  type="password" class="form-control"  value="{!! old('password_confirmation') !!}" />
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




                         <div class="row">
                         <div class="col-md-10"></div>
                         <div class="col-md-2">
                        <div class="pull-right">
                            <p class="signin button" style="padding-top: 15px;">
                                <input type="submit" class="btn btn-raised btn-success btn-block " value="{{ __('staffs.register') }}" />
                            </p>
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
<script>
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
    $(document).ready(function($) {

        $("#role").on('change', function() {
            var role = $(this).val();
            if (role == 1) {
                $("#hide").hide();

            } else {
                $("#hide").show();
            }

        });

        $("#country").on('change', function() {
            // alert('hi');
            var country = $(this).val();
            // alert("hi");
            $.ajax({
                type: 'POST',
                url: '/countries/' + country,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "country": country
                },
                success: function(response) {
                    // $('#organization').empty(); 
                    $.each(response.organizations, function(key, item) {
                        $('#organization1').append(
                            "<option value='" + item.id + "'>" + item.name + "</option>");
                    });
                }
            });

        });
    });
       

        $('#dateOfBirth').change(function() {
    var date = $("#dateOfBirth").val();
    var year=date.split("-");
    console.log(year[0]);

    var currentTime = new Date()
var currentYear = currentTime.getFullYear();
var age=currentYear-year[0];
console.log(age);
if(age<16){
        $(".alert-danger").empty();

        $(".alert-danger").show();

                 $(".alert-danger").append("Children Under the age of 16 must be added as family members");
}
else if(age>100){
        $(".alert-danger").empty();

        $(".alert-danger").show();

                 $(".alert-danger").append("Please enter valid Date");
}
else{
    $(".alert-danger").empty();
    $(".alert-danger").hide();
}
});
 
    

</script>
<script>
     $("#role").on('change', function() {
            var role = $(this).val();
            if(role==3){
            $.ajax({
                type: 'POST',
                url: '/role/' + role,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "role": role
                },
                success: function(response) {
                    console.log(response);
                    $('#select24').empty(); 
                    $('#select24').append(
                     "<option value='" +' '+ "'>Select Club</option>");
                   $.each(response.clubs, function(key, item) {
                    "<option value='" + null + "'>" +'Select Club'+ "</option>"
                        $('#select24').append(
                            "<option value='" + item.id + "'>" + item.club_name + "</option>");
                    }); 
                }
            });
        }else{
            $.ajax({
                type: 'POST',
                url: '/role/' + role,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "role": role
                },
                success: function(response) {
                    console.log(response);
                    $('#select24').empty(); 
                    $('#select24').append(
                     "<option value='" +' '+ "'>Select Club</option>");
                   $.each(response.clubs, function(key, item) {
                    "<option value='" + null + "'>" +'Select Club'+ "</option>"
                        $('#select24').append(
                            "<option value='" + item.id + "'>" + item.club_name + "</option>");
                    }); 
                }
            });
        }
        });
</script>

@stop