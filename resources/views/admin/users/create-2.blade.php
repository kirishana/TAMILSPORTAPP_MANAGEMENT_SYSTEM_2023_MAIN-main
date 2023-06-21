@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Add User
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
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />

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
@section('content2')
<section class="content-header">
    <h1>Add New User</h1>
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
                        Add New User
                        <div style="float:right">
                            <a href="" style="color:white">
                                <i class="material-icons">keyboard_arrow_left</i>

                                <a href="/user-lists" style="color:white">
                                    Back</a>
                        </div>
                    </h3>
                    {{-- <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span> --}}
                </div>

                <div class="panel-body">


                    <form class="form_action6" id="myForm" action="/user/store" method="POST">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />


                        <div class="alert alert-danger" style="display:none"></div>

                    


                        <section class="content">
                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                            <label class="control-label" for="first_name">First Name<span style="color:red;"> <b> * </b></span></label>
                                            <input id="first_name" name="first_name"  type="text" class="form-control" value="{!! old('first_name') !!}">
                                        </div>
                                                                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}

                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">person</i></span>
                                            <label class="control-label" for="last_name">Last Name<span style="color:red;"> <b> * </b></span></label>
                                            <input id="last_name" name="last_name"  type="text" class="form-control" value="{{ old('last_name') }}">
                                        </div>
                                                                                {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}

                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group label-floating ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                            <label>Date of birth<span style="color:red;"> <b> * </b></span></label>

                                            <input id="dob" name="dob"  type="date" class="form-control"  value="{!! old('dob') !!}">
                                        </div>
                                                                                {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}

                                    </div>
                                </div>


                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">email</i></span>
                                            <label class="control-label" for="email1">E-mail<span style="color:red;"> <b> * </b></span></label>
                                            <input id="email" name="email"  type="text" class="form-control"  value="{!! old('email') !!}">
                                        </div>
                                        <div class="col-sm-12">
                                                                                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group ">
                                      
                                         <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                            <label class="control-label" for="tel-number">Mobile Number</label>
                                            <div class="row">
                                            @if($countries!=null)
                                            <div class="col-md-1 code" style="margin-top:3%;">
                                    {{$countries->countryCode?$countries->countryCode->name:''  }}               
                    </div>     
                    @endif                                    
                                                <div class="col-md-10">
                                            <input id="tel-number" name="tel-number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type= "number" maxlength = "8"  type="tel" class="form-control" value="{!! old('tel-number') !!}">
                                                </div>
                                            </div>
                                                

                                    </div>
                                    </div>

                             

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group label-floating ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">wc</i></span>
                                            <label>Gender<span style="color:red;"> <b> * </b></span></label>
                                            <div class="radio">
                                                <label><input type="radio" name="gender" id="optionsRadiosInline1" value="male" @if( old('gender')=='male') checked @endif>Male</label>
                                                <label><input type="radio" name="gender" id="optionsRadiosInline2" value="female" @if( old('gender')=='female') checked @endif>Female</label>
                                            </div>
                                                                                    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($countries!=null)
                                           <input type="hidden" name="country" value="{{$countries->id}}">
                            @endif
                            <div class="row">
       <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">group</i></span>
                                                <label class="control-label">Role</label>

                                                <select id="select26" name="role" class="form-control select2 club">
                                            <option disabled selected>Select Role</option>
                                            @foreach($roles as $club)
                                             @if(old('role')==$club->id)
                                            <option value="{{$club->id}}" selected>{{$club->name}}</option>
                                            @else
                                            <option value="{{$club->id}}">{{$club->name}}</option>
                                            @endif
                                            @endforeach

                                        </select>
                                          
                                    </div>
                                                                                                                    {!! $errors->first('role', '<span class="help-block">:message</span>') !!}

                                  
                                </div>
                            </div>

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                        <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">group</i></span>
                                                <label class="control-label">Club</label>

                                                <select id="select24" name="club" class="form-control select2 club">
                                            <option disabled selected>Select Club</option>
                                            @foreach($clubs as $club)
                                             @if(old('club')==$club->id)
                                            <option value="{{$club->id}}" selected>{{$club->club_name}}</option>
                                            @else
                                            <option value="{{$club->id}}">{{$club->club_name}}</option>
                                            @endif
                                            @endforeach

                                        </select>
                                          
                                    </div>
                                                                                                                    {!! $errors->first('club', '<span class="help-block">:message</span>') !!}

                                  
                                </div>
                            </div>
                            </div>

                            @if(Auth::user()->hasRole(2))
                            <div class="row" id="hide">

                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group label-floating {{ $errors->first('tel-number', 'has-error') }}">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">spa</i></span>
                                            <option disabled selected>Select country</option>
                                            <select  name="organization" class="form-control">
                                                @foreach ($organizations as $org) 
                                                <option value="{{ $org->id }}" {{$org->id==Auth::user()->organization->id?'selected':''}}>{{ $org->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @else

                                <div class="row" id="hide">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group  {{ $errors->first('organization', 'has-error') }}">

                                           <input type="hidden" name="organization" value="{{$orgs?$orgs->id:''}}">
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-xs-12 col-sm-6 col-md-6" id="hidden">
                                        
      

                                        </div>
                                                                              @if ($message = Session::get('clubError'))
<div class="alert alert-danger text-left alert-dismissable margin5">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Error:</strong> {{ $message }}
</div>
@endif


                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                <label for="password2" class="youpasswd control-label">Password<span style="color:red;"> <b> * </b></span></label>
                                                <input id="password2" name="password"  type="password" class="form-control"  value="{!! old('password') !!}"/>
                                            </div>
                                                                                                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}

                                        </div>
                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group label-floating {{ $errors->first('password_confirmation', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                <label for="password_confirmation" class="youpasswd control-label">Confirm Password<span style="color:red;"> <b> * </b></span></label>
                                                <input id="password_confirmation" name="password_confirmation"  type="password" class="form-control"  value="{!! old('password_confirmation') !!}"/>
                                            </div>
                                                                                                                            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                @if($orgs)
                                @if($orgs->orgsetting)
                                        @if($orgs->orgsetting->active==1)
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="control-label" for="Gender" style="font-size:15px;">{{$orgs->orgsetting->extra_question}}<span style="color:red;"> <b> * </b></span></label>
                                                <div class="radio" id="member">
                                                    <label><input type="radio" name="member" id="optionsRadiosInline1" value="1" @if(old('member')=='1' ) checked @endif>Yes</label>
                                                    <label><input type="radio" name="member" id="optionsRadiosInline2" value="0" @if(old('member')=='0' ) checked @endif>No</label>
                                                </div>
                                            </div>
                                            {!! $errors->first('member', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        @endif
                                        @endif
                                        <div class="row" style="display:none" id="memberInfo">
                                        @if($orgs->orgsetting)
                                        @if($orgs->orgsetting->active==1)
                                        <p>{!! html_entity_decode($orgs->orgsetting->no) !!}</p>
                                        @endif
                                        @endif



                                        </div>
                                        <div class="row" style="display:none" id="memberInfoYes">
                                        @if($orgs->orgsetting)
                                        @if($orgs->orgsetting->active==1)
                                        <p>{!! html_entity_decode($orgs->orgsetting->yes) !!}</p>
                                        @endif
                                        @endif
                                        @endif



                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">

                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group label-floating {{ $errors->first('password_confirmation', 'has-error') }}">
                                            <div class="pull-right">
                                                <p class="signin button" style="padding-top: 15px;">
                                                    <input type="submit" class="btn btn-raised btn-success btn-block" value="Sign up" />
                                                </p><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                        </section>



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
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>
    $(document).ready(function($) {

        $("#role").on('change', function() {
            var role = $(this).val();
            if (role == 1) {
            
                $("#hide").hide();

            } else {
                $("#hide").show();
            }
            if (role == 2) {
            
            $("#hidden").hide();

        } else {
            $("#hidden").show();
        }

        });

    //     $("#country").on('change', function() {
    //         var country = $(this).val();
    //         // alert(country);
    //         $.ajax({
    //             type: 'GET',
    //             url: '/countriess/' + country,
    //             data: {
    //                 "_token": "{{ csrf_token() }}",
    //                 "country": country
    //             },
    //             success: function(response) {
                 

    //                     $('.organization').empty();
    //                     $('.code').empty();
    //                     $('.code').append(response.code);
    //                     $('.organization').append(
    //                         "<option value='" + 0 + "'>Select Organization</option>");
                          
    //                     $.each(response.organizations, function(key, item) {
                            
    //                         $('.organization').append(
    //                             "<option value='" + item.id + "'>" + item.name + "</option>");
    //                     });
    //                     $('.club').empty();
    //                     $('.club').append(
    //                         "<option value='" +' '+ "'>Select Club</option>");
    //                     $.each(response.clubs, function(key, item) {

    //                         $('.club').append(
    //                             "<option value='" + item.id + "'>" + item.club_name + "</option>");
    //                     });
                    
                        
                    
    //             }
    //         });

    //     });
    // var country =  $("#country option:selected").val();
    //             $.ajax({
    //                 type: 'GET',
    //                 url: '/countriess/' + country,
    //                 data: {
    //                     "_token": "{{ csrf_token() }}",
    //                     "country": country
    //                 },
    //             success: function(response) {   
    //               $('.organization').empty();
    //                     $('.code').empty();
    //                     $('.code').append(response.code);
    //                     $('.organization').append(
    //                         "<option value='" + 0 + "'>Select Organization</option>");
                          
    //                     $.each(response.organizations, function(key, item) {
                            
    //                         $('.organization').append(
    //                             "<option value='" + item.id + "'>" + item.name + "</option>");
    //                     });
    //                     $('.club').empty();
    //                     $('.club').append(
    //                         "<option value='" +' '+ "'>Select Club</option>");
    //                     $.each(response.clubs, function(key, item) {

    //                         $('.club').append(
    //                             "<option value='" + item.id + "'>" + item.club_name + "</option>");
    //                     });
                 
             
    //      }
    //  });
      
        });
          $("#dob").on('change', function() {
              var date = $("#dob").val();
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

                 $(".alert-danger").append("Your age should be less than 100");
}
else{
    $(".alert-danger").empty();
    $(".alert-danger").hide();
}
});
      
</script>
@stop