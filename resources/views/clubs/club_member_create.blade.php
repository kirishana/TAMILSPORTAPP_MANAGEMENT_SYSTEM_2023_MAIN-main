@extends('admin/layouts/default')


@section('title')
Add New Club Member
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
    <h1>{{ __('sidebar.clubs') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Clubs</li>
        <li class="active">Club Members</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="material-icons">person_add</i>
                        {{ __('club.add_new_club_mem') }}
                    </h3>
                </div>


                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                      


                            <!-- ----------------------------------------------------- -->
                            <form class="form_action6" action="/store/club-member" method="POST">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                <section class="content">
                                    <div class="alert alert-danger" style="display:none"></div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5 col-md-6">
                                            <div class="form-group label-floating {{ $errors->first('first_name', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                    <label class="control-label" for="first_name">{{ __('staffs.f_name') }}<span style="color:red;"> <b> * </b></span></label>
                                                    <input id="first_name" required name="first_name" type="text" class="form-control" value="{!! old('first_name') !!}">
                                                </div>
                                                 <div class="col-sm-12">
                                                    {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                       
                                        <div class="col-xs-12 col-sm-5 col-md-6">
                                            <div class="form-group label-floating {{ $errors->first('last_name', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                    <label class="control-label" for="last_name">{{ __('staffs.l_name') }}<span style="color:red;"> <b> * </b></span></label>
                                                    <input id="last_name" required name="last_name" type="text" class="form-control" value="{{ old('last_name') }}">
                                                </div>
                                                 <div class="col-sm-12">
                                                    {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-5 col-md-6">
                                            <div class="form-group{{ $errors->first('dob', 'has-error') }}">
                                                <div class="input-group">
                                                    
                                                    <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                                                                         <label class="control-label" for="email">{{ __('dashboard.dob') }}<span style="color:red;"> <b> * </b></span></label>

                                                    <input id="dob" name="dob" required type="date" class="form-control" value="{!! old('dob') !!}">
                                                </div>
                                                 <div class="col-sm-12">
                                                    {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-12 col-sm-5 col-md-6">
                                            <div class="form-group{{ $errors->first('gender', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons">wc</i></span>
                                                                                                                                                            <label class="control-label" for="email">{{ __('dashboard.gender') }}<span style="color:red;"> <b> * </b></span></label>

                                                    <div class="radio">
                                                        <label><input type="radio" name="gender" id="optionsRadiosInline1" value="male" @if(old('gender')=='male') checked @endif>{{ __('staffs.male') }}</label>
                                                        <label><input type="radio" name="gender" id="optionsRadiosInline2" value="female" @if(old('gender')=='female') checked @endif>{{ __('staffs.female') }}</label>
                                                    </div>
                                                </div>
                                                 <div class="col-sm-12">
                                                    {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $org=App\Models\Organization::find(Auth::user()->organization_id);
                                    @endphp
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
<script src="{{ asset('assets/js/pages/adduser.js') }}"></script>



<!-- ---------------------------------------------------------------------------------------- -->
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
</script>
@stop