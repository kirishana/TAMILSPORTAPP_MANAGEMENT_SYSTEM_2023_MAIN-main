@extends('admin/layouts/default')


{{-- Page title --}}
@section('title')
Edit User
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
<style>
    .panel-heading a:hover{
        display:block;
        color:white;
    }
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    /* display: none; <- Crashes Chrome on hover */
    -webkit-appearance: none;
    margin: 0; /* <-- Apparently some margin are still there even though it's hidden */
}

input[type=number] {
    -moz-appearance:textfield; /* Firefox */
}
    </style>

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Edit user</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Users</li>
        <li class="active">Edit User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="material-icons">person_add</i>
                        Editing user : <span class="user_name_max">{!! $user->first_name!!} {!! $user->last_name!!}</span>
                         @if(Auth::user()->hasRole(3))
 <a style="float:right;display:block" href="/club-members" style="color:white"><i class="material-icons  leftsize">keyboard_backspace
                        </i>
                            Back</a> 
        
        @else
 <a style="float:right;display:block" href="/members" style="color:white"><i class="material-icons  leftsize">keyboard_backspace
                        </i>
                            Back</a> 
        @endif
                       
                        </h3>
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
                            <form name="commentForm" id="commentForm" action="{{ route('members.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div>


                                            <h2 class="hidden">&nbsp;</h2>

                                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                                <label for="first_name" class="col-sm-2 control-label">First Name <span style="color:red;"><b> *</b></span></label>
                                                <div class="col-sm-10">
                                                    <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control required" value="{!! old('first_name', $user->first_name) !!}" />
                                                </div>
                                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                            </div>

                                             <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                                <label for="first_name" class="col-sm-2 control-label">Last Name <span style="color:red;"><b> *</b></span></label>
                                                <div class="col-sm-10">
                                                    <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control required" value="{!! old('last_name', $user->last_name) !!}" />
                                                </div>
                                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                                <label for="email" class="col-sm-2 control-label">Email </label>
                                                <div class="col-sm-10">
                                                    <input id="email" name="email"  placeholder="E-Mail" type="text" class="form-control required email" value="{!! old('email', $user->email) !!}" />
                                                </div>
                                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                            </div>

                                          


                                            <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                                <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input id="dob" name="dob" type="date" class="form-control"  value="{!! old('dob', $user->dob) !!}" placeholder="yyyy-mm-dd" />
                                                </div>
                                                {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <!-- guardian -->

                                            @if ($age<18) 
                                            <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                                <label for="dob" class="col-sm-2 control-label">Guardian Name</label>
                                                <div class="col-sm-10">
                                                    <input id="dob" name="gu_name" type="text" class="form-control" value="{!! old('dob', $user->guardian_name) !!}" />
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                            <label for="dob" class="col-sm-2 control-label">Guardian Email</label>
                                            <div class="col-sm-10">
                                                <input id="dob" name="gu_email" type="text" class="form-control" value="{!! old('dob', $user->guardian_mail) !!}" />
                                            </div>
                                        </div>


                                        <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                            <label for="dob" class="col-sm-2 control-label">Guardian Contact Number</label>
                                            <div class="col-sm-10">
                                                <input id="dob" name="gu_number" type="text" class="form-control" value="{!! old('dob', $user->guardian_number) !!}" />
                                            </div>
                                        </div>
                                        @endif
                                        <!-- end guardian -->
                                        <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                                            <label for="email" class="col-sm-2 control-label">Gender </label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="radio" name="gender" class="flat-red" value="male" @if($user->gender === 'male') checked="checked" @endif/>
                                                        <label>Male</label>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="gender" class="flat-red" value="female" @if($user->gender === 'female') checked="checked" @endif/>
                                                        <label>Female   </label>
                                                    </label>

                                                </div>
                                            </div>
                                            {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        <div class="form-group {{ $errors->first('state', 'has-error') }}">
                                            <label for="state" class="col-sm-2 control-label">Tel Number </label>
                                            <div class="col-sm-10">
                                                <input id="state" name="tel" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" class="form-control" value="{!! old('tel',$user->tel_number) !!}" />
                                            </div>
                                            {!! $errors->first('tel', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group required {{ $errors->first('country', 'has-error') }}">
                                            <label for="country" class="col-sm-2 control-label">Country </label>
                                            <div class="col-sm-10">
                                                <select name="country" class="form-control">
                                                    @foreach($countries as $country)
                                                    <option name="country" value="{{$country->id}}" {{$user->country->name==$country->name?'selected':''}}>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                        </div>
                                          <div class="form-group required {{ $errors->first('country', 'has-error') }}">
                                            <label for="country" class="col-sm-2 control-label">Organization </label>
                                            <div class="col-sm-10">
                                                <select name="organization" class="form-control">
                                                    @foreach($orgs as $org)
                                                    <option name="organization" value="{{$org->id}}" {{$user->organization_id?$user->organization_id==$org->id?'selected':'':''}}>{{$org->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                        </div>
                                      
                                         {{--  <div class="form-group">
                                            <label for="country" class="col-sm-2 control-label">Club </label>
                                            <div class="col-sm-10">
                                                <select name="club" class="form-control">
                                                    <option selected value="0">Select Club</option>
                                                    @foreach($clubs as $club)
                                                    <option name="club" value="{{$club->id}}" {{$user->club_id?$user->club_id==$club->id?'selected':'':''}}>{{$club->club_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                        </div>  --}}

                                     
                                        <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                            <label for="city" class="col-sm-2 control-label">City </label>
                                            <div class="col-sm-10">
                                                <input id="city" name="city" type="text" class="form-control" value="{!! old('city', $user->city) !!}" />
                                            </div>
                                            {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                            <label for="address" class="col-sm-2 control-label">Address </label>
                                            <div class="col-sm-10">
                                                <input id="address" name="address" type="text" class="form-control" value="{!! old('address', $user->address) !!}" />
                                            </div>
                                            {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                        </div>

                                       
                                    </div>
                                    <div style="margin-right:50px;">
                                            <button class="btn btn-success" type="submit">Finish</button></a>
</div>


                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!--main content end-->
            </div>
        </div>
    </div>
    </div>

    <!--row end-->
</section>
@stop


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
      $('.previous').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});
$('.next').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
    $(function() {
        $('.reportImage').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox"]').on('click', function() {
            if ($(this).prop('checked')) {
                $('.reportImage').fadeIn();
            } else {
                $('.reportImage').hide();
            }
        });
    });
</script>
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('assets/js/pages/edituser.js') }}" type="text/javascript"></script> -->
@stop