@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Member
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Add New Member</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Members</a></li>
        <li class="active">Add New</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">person_add</i>
                        Add New Member
                    </h3>
                    {{-- <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span> --}}
                </div>
                <div class="panel-body">

                    <form class="form_action6" action="/member/store" method="POST">
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
                                            <label>DOB<span style="color:red;"> <b> * </b></span></label>
                                            <input name="dob"  type="date" class="form-control dob" id="dobId" max={{ $today }}  value="{!! old('dob') !!}">
                                        </div>
                                        {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6">
                                    <div class="form-group label-floating ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">wc</i></span>
                                            <label>Gender<span style="color:red;"> <b> * </b></span></label>
                                            <div class="radio" id="gender">
                                                <label><input type="radio" name="gender" id="gender" value="male" @if(old('gender')=='male') checked @endif>Male</label>
                                                <label><input type="radio" name="gender" id="gender" value="female" @if(old('gender')=='female') checked @endif>Female</label>
                                            </div>
                                        </div>
                                        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <input type="hidden" name="country" value="{{Auth::user()->country_id}}">
                               
                                <!--<div class="col-xs-12 col-sm-6 col-md-6">-->
                                <!--    <div class="form-group label-floating {{ $errors->first('country', 'has-error') }}">-->
                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="material-icons">assistant_photo</i></span>-->
                                <!--            <p>Country<span style="color:red;"> <b> * </b></span></p>-->
                                <!--            <select id="country" name="country" class="form-control">-->
                                <!--               <option selected value={{ Auth::user()->country_id }}>{{ Auth::user()->country->name }}</option>-->
                                <!--            </select>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            <!--    <div class="col-xs-12 col-sm-6 col-md-6">-->
                            <!--        <div class="form-group">-->
                            <!--            <div class="input-group">-->
                            <!--                <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>-->
                            <!--                <label class="control-label" for="tel-number">Mobile Number<span style="color:red;"> <b> * </b></span></label>-->
                            <!--                <div class="row">-->
                            <!--                            <div class="col-sm-1  code" style="margin-top:4%;">{{ Auth::user()->country->countryCode?Auth::user()->country->countryCode->name:'' }}</div>-->
                            <!--                            <div class="col-sm-11">-->
                            <!--                <input id="tel-number" name="tel-number"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"-->
                            <!--                type= "tel" maxlength = "8" class="form-control" value="{!! old('tel-number') !!}">-->
                            <!--            </div>-->
                            <!--            </div>-->
                            <!--            </div>-->
                            <!--            {!! $errors->first('tel-number', '<span class="help-block">:message</span>') !!}-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
@if(Auth::user()->organization)
<!--                            <div class="row">-->
<!--                                <div class="col-xs-12 col-sm-6 col-md-6">-->
<!--                                     <div class="form-group label-floating">-->
<!--                                        <div class="input-group">-->
<!--                                            <span class="input-group-addon"><i class="material-icons text-light">person</i></span>-->
<!--                                            <label class="control-label" for="first_name">Organization<span style="color:red;"> <b> * </b></span></label>-->
<!--                                            <input id="organization"  disabled type="text" value="{{Auth::user()->organization->name}}" class="form-control" value="{!! old('organization') !!}">-->
                                                                                        <input id="organization" name="organization"  type="hidden" value="{{Auth::user()->organization_id}}" class="form-control" value="{!! old('organization') !!}">

                                       
                                @else
                                @endif

@if(Auth::user()->club)

                                <!--<div class="col-xs-12 col-sm-6 col-md-6">-->
                                <!--      <div class="form-group label-floating">-->
                                <!--        <div class="input-group">-->
                                <!--            <span class="input-group-addon"><i class="material-icons text-light">person</i></span>-->
                                <!--            <label class="control-label" for="first_name">Club<span style="color:red;"> <b> * </b></span></label>-->
                                <!--            <input id="club" disabled type="text" value="{{Auth::user()->club->club_name}}" class="form-control" value="{!! old('club') !!}">-->
                                                                                        <input id="club" name="club"  type="hidden" value="{{Auth::user()->club_id}}" class="form-control" value="{!! old('club') !!}">

                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                @else
                                @endif
<?php
$org=App\Models\Organization::find(Auth::user()->organization_id);
?>

                                @if($org->orgsetting)
                                        @if($org->orgsetting->active==1)
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="control-label" for="Gender" style="font-size:15px;">{{$org->orgsetting->extra_question}}<span style="color:red;"> <b> * </b></span></label>
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

                        
                                   
                                    <div class="pull-right" style="margin-right:200px;">
                                        <p class="signin button" style="padding-top: 15px;">
                                            <input type="submit" class="btn btn-raised btn-success btn-block submit" value="Add" />
                                        </p>
                                    </div>
                
                                    <!--ends-->
                                </div>

                      

                    </form>
                </div>
            </section>


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
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>

       $("#dobId").on('change', function() {
    var date = $("#dobId").val();
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
    $("#tel-number").on('change', function() {
        

                        jQuery('.alert-danger').hide();
                        $("input[type='submit']").attr("disabled",false);

                       
                    
             
    });
    $('#member input[type=radio]').change(function(){   
      var mamber = $(this).val();
                if (mamber == 0) {
                    $("#memberInfo").show();
                    $("#memberInfoYes ").hide();

                } else {
                    $("#memberInfo").hide();
                    $("#memberInfoYes").show();

                }

            });
    
</script>
@stop


