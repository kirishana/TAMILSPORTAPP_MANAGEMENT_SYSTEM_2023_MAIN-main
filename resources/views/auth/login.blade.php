<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/app_auth.css') }}" rel="stylesheet" type="text/css" />
    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
    <!-- end of global level css -->
   <style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
   </style>
</head>
<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <!-- Notifications -->
            <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-4  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <a class="hiddenanchor" id="toclub_register"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="/login" autocomplete="on" method="post" role="form" id="authentication">
                                <div class="logo_login">
                                    @if($general->signup_logo!==null)<img src="/general/signUp/{{ $general->signup_logo }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                    @else
                                    <img src="{{ asset('assets/img/web logo copy white bg.png') }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                    @endif
                                    <br>
                                </div>
                                <div id="notific">
                                    @include('notifications')
                                </div>

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <label style="margin-bottom:0px;" for="email1" class="uname control-label">
                                            E-mail
                                        </label>
                                        <input id="email1" name="email" required type="email" class="form-control" value="{!! old('email') !!}" />
                                        <div class="col-sm-12">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                        <label style="margin-bottom:0px;" for="password1" class="youpasswd control-label">
                                            Password
                                        </label>
                                        <input id="login_password" name="password" required type="password" class="form-control" value="{!! old('password') !!}" />
                                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}

                                    </div>
                                </div>


                                <p class="change_link">
                                    <label>
                                        <!-- <input type="checkbox"> &nbsp;Keep me logged in -->
                                    </label>
                                    <!-- <button type="button" class="btn btn-raised botton-alignment btn-warning btn-sm" style="float:right;">Forgot password</button> -->
                                    <!-- <h5 style="float:right;">Forgot password ?</h5> -->
                                    <label style="float:right;">
                                        <a href="#toforgot">Forgot password ?</a>
                                    </label>
                                </p>


                                <div class="form-group login button">
                                    <button type="submit" class="btn btn-raised btn-success btn-block">Login</button>
                                </div>

                                <br>
                                <div>
                                    <p class="change_link">

                                        <a href="{{asset('assets/images/Player.pdf')}}" target="_blank">
                                            <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-primary btn-sm" style="float:left;">User Guide</button>
                                        </a>
                                    </p>
                                    <p class="change_link">

                                        <a href="#toregister">
                                            <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm registerBut" style="float:right;">Register New User</button>
                                        </a>
                                    </p>
                                </div>
                                <br>
                                <br>

                                {{-- <div>
                                    <a href="/club_login" class="toclub_register" style="font-size:16px;text-align: center;">
                                        <h5>Managing a Club? Register your Club.</h5>
                                    </a>

                                </div> --}}
                            </form>
                            <div class="footer" style="font-weight: bold;font-size:12px;text-align:center"> &copy; Copyrights and Powered By <a href="https://www.norwaytamilsangam.com/" target="_blank" style="color:black;text-decoration:none;">Norway Tamil Sangam </a> <br> Developed By <a href="https://maestrois.com/" target="_blank" style="color:black;text-decoration:none;">Maestro Innovative Solution (Pvt) Ltd </a></div>

                        </div>

                        <div id="register" class="animate form">

                            <form action="/register" id="register_here" autocomplete="on" method="post" role="form">

                                <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <h3>
                                    @if($general->signup_logo!==null)<img src="/general/signUp/{{ $general->signup_logo }}" style="width:290px;height:73px;" alt="logo">
                                    @else
                                    <img src="{{ asset('assets/img/web logo copy white bg.png') }}" style="width:290px; height:73px;" alt="logo">
                                    @endif
                                    <br>
                                </h3>

                                <fieldset>
                                    <div id="notific">
                                        @include('notifications')
                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                            <label class="control-label" for="first_name">First Name<span style="color:red;"> <b> * </b></span></label>
                                            <input id="name" name="first-name" type="text" class="form-control" value="{!! old('first-name') !!}">

                                        </div>

                                        {!! $errors->first('first-name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group label-floating ">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                            <label class="control-label" for="first_name">Last Name<span style="color:red;"> <b> * </b></span></label>
                                            <input id="name" name="last-name" type="text" class="form-control" value="{!! old('last-name') !!}">

                                        </div>

                                        {!! $errors->first('last-name', '<span class="help-block">:message</span>') !!}

                                    </div>
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">email</i></span>
                                            <label class="control-label" for="email1">E-mail<span style="color:red;"> <b> * </b></span></label>
                                            <input id="mail" name="email" type="email" class="form-control" value="{!! old('email') !!}">
                                        </div>
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">wc</i></span>
                                            <label class="control-label" for="Gender">Gender<span style="color:red;"> <b> * </b></span></label>
                                            <div class="radio">
                                                <label><input type="radio" name="gender" id="optionsRadiosInline1" value="male" @if(old('gender')=='male' ) checked @endif>Male</label>
                                                <label><input type="radio" name="gender" id="optionsRadiosInline2" value="female" @if(old('gender')=='female' ) checked @endif>Female</label>
                                            </div>
                                        </div>
                                        {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                            <label class="control-label" for="dob">Date Of Birth<span style="color:red;"> <b> * </b></span></label>
                                            <input name="dob" type="date" class="form-control" id="dateofbirth" max={{ $today }} value="{!! old('dob') !!}">
                                            <span class="alert2" style="font-size:12px;color:red"></span>

                                        </div>
                                        {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}

                                    </div>
                                    <div class="form-group">
                                        <!--</div>-->
                                        <input type="hidden" name="country" value="{{$organizations->country->id}}"/>
                                        <div class="form-group">
                                             @if($organizations!=null)
                                            <div class="input-group">
                                                 
                                                <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                                <label class="control-label" for="tel-number">Mobile Number</label>
                                              
                                                <div class="row">
                                                    <div class="col-md-1" style="margin-top:5%;">
                                                        {{$organizations->country->countryCode?$organizations->country->countryCode->name:'' }}
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input id="tel" name="tel"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" type="number" class="form-control" value="{!! old('tel') !!}">

                                                    </div>


                                                </div>
                                                @endif
                                                {!! $errors->first('tel', '<span class="help-block">:message</span>') !!}
                                            </div>
                                             @if($organizations!=null)
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="hidden" name="organization" value="{{$organizations->id}}">
                                                </div>
                                                <!--{!! $errors->first('organization', '<span class="help-block">:message</span>') !!}-->
                                            </div>
                                            @endif
                                            <div class="form-group">
                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="material-icons">group</i></span>
                                                    <label class="control-label" for="tel-number">Club <span style="color:red;"> <b> * </b></span></label>

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

                                            <div class="form-group label-floating ">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                    <label for="password_confirmation" class="youpasswd control-label">Password<span style="color:red;"> <b> * </b></span></label>
                                                    <input id="password" name="password" required type="password" class="form-control" value="{!! old('password') !!}" />
                                                </div>
                                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <div class="form-group label-floating ">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                    <label for="password_confirmation" class="youpasswd control-label">Confirm Password<span style="color:red;"> <b> * </b></span></label>
                                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" value="{!! old('password_confirmation') !!}" />
                                                </div>
                                                {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}

                                            </div>
                                        </div>
                                         @if($organizations!=null)
                                        @if($organizations->orgsetting)
                                        @if($organizations->orgsetting->active==1)
                                        <div class="form-group">
                                            <div class="input-group">
                                                <label class="control-label" for="Gender" style="font-size:15px;">{{$organizations->orgsetting->extra_question}}<span style="color:red;"> <b> * </b></span></label>
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
                                            @if($organizations->orgsetting)
                                            @if($organizations->orgsetting->active==1)
                                            <p>{!! html_entity_decode($organizations->orgsetting->no) !!}</p>
                                            @endif
                                            @endif



                                        </div>
                                        <div class="row" style="display:none" id="memberInfoYes">
                                            @if($organizations->orgsetting)
                                            @if($organizations->orgsetting->active==1)
                                            <p>{!! html_entity_decode($organizations->orgsetting->yes) !!}</p>
                                            @endif
                                            @endif



                                        </div>
                                    </div>
@endif
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="input-group">
                                                <span class="input-group-addon"><input id="name" name="checkbox" required type="checkbox">
                                                </span>

                                            </div>


                                        </div>
                                        <div class="col-md-8">
                                            <a class="terms" data-toggle="modal" data-href="#full-width" href="#full-width"> By signing up, you agree to our Terms , Data Policy and Cookies Policy .
                                            </a>

                                        </div>
                                    </div>

                                    <p class="signin button" style="padding-top: 15px;">
                                        <input type="submit" class="btn btn-raised btn-success btn-block registerButton" value="Register" />
                                    </p>
                                    <p class="change_link">
                                        <a href="#tologin" class="to_register">
                                            <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                        </a>
                                    </p>
                                    <div class="footer" style="font-weight: bold;font-size:12px;text-align:center"> &copy; Copyrights and Powered By <a href="https://www.norwaytamilsangam.com/" target="_blank" style="color:black;text-decoration:none;">Norway Tamil Sangam </a> <br> Developed By <a href="https://maestrois.com/" target="_blank" style="color:black;text-decoration:none;">Maestro Innovative Solution (Pvt) Ltd </a></div>


                                </fieldset>
                            </form>
                        </div>

                        <!-- Forgot password -->
                        <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-3  col-md-9 col-md-offset-1 col-lg-9 col-lg-offset-1" id="fpassword">
                            <div class="panel panel-info">
                                <div id="forgot" class="animate form">
                                    <form action="password/email" autocomplete="on" id="reset_pw" method="post" role="form">
                                        @csrf
                                        <div class="logo_login">
                                            @if($general->signup_logo!==null)<img src="/general/signUp/{{ $general->signup_logo }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                            @else
                                            <img src="{{ asset('assets/img/web logo copy white bg.png') }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                            @endif
                                            <br>
                                        </div>
                                        <p class="text-justify" style="font-size:13px;">
                                            Enter your email address below and we'll send unique password reset link to your mail address.
                                        </p>
                                        <!-- CSRF Token -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <div class="form-group label-floating  {{ $errors->first('email', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">mail</i></span>
                                                <label class="control-label youmai" for="email2"> Your email</label>
                                                <input class="form-control" id="email2" name="email" required type="email" value="{!! old('email') !!}" />
                                            </div>
                                            <div class="col-sm-12">
                                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <p class="login button" style="margin-top: 10px;">
                                            <input type="submit" value="Reset password" class="btn btn-raised btn-success btn-block" />
                                        </p>
                                        <p class="change_link">
                                            <a href="#tologin" class="to_register">
                                                <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm" style="float:left;">Back</button>
                                            </a>
                                        </p>
                                    </form>
                                    <div class="footer" style="font-weight: bold;font-size:12px;text-align:center"> &copy; Copyrights and Powered By <a href="https://www.norwaytamilsangam.com/" target="_blank" style="color:black;text-decoration:none;">Norway Tamil Sangam </a> <br> Developed By <a href="https://maestrois.com/" target="_blank" style="color:black;text-decoration:none;">Maestro Innovative Solution (Pvt) Ltd </a></div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
    <!-- Bootstrap -->
    <!-- end of global js -->
    <script>
  
        $('#member input[type=radio]').change(function() {
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
            var country = $("#countries option:selected").val();

            $.ajax({
                type: 'GET',
                url: '/countriess/' + country,
                data: {
                    "country": country
                },
                success: function(response) {

                    $('.code').empty();
                    $('.organization').empty();
                    $('.code').append(response.code);
                    $('.organization').append(
                        "<option value='" + 0 + "'>Select Organization</option>");

                    $.each(response.organizations, function(key, item) {
                        console.log(item);
                        $('.organization').append(
                            "<option selected value='" + item.id + "'>" + item.name + "</option>");

                    });
                    $('.club').empty();
                    $('.club').append(
                        "<option value='" + ' ' + "'>Select Club</option>");
                    $.each(response.clubs, function(key, item) {

                        $('.club').append(
                            "<option value='" + item.id + "'>" + item.club_name + "</option>");
                    });

                }
            });
            $('#dateofbirth').change(function() {
                var date = $("#dateofbirth").val();
                var year = date.split("-");
                console.log(year[0]);

                var currentTime = new Date()
                var currentYear = currentTime.getFullYear();
                var age = currentYear - year[0];
                console.log(age);
                if (age < 16) {
                    $(".alert2").empty();

                    $(".alert2").show();

                    $(".alert2").append("Children Under the age of 16 must be added as family members");
                    $(".registerButton").attr('disabled',true);
                } else if (age > 100) {
                    $(".alert2").empty();

                    $(".alert2").show();

                    $(".alert2").append("your age should be less than 100");
                                        $(".registerButton").attr('disabled',true);

                } else {
                    $(".alert2").empty();
                    $(".alert2").hide();
                                        $(".registerButton").attr('disabled',false);

                }
            });
            $("#countries").on('change', function() {
                var country = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '/countriess/' + country,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country": country
                    },
                    success: function(response) {


                        $('.organization').empty();
                        $('.code').empty();

                        $('.code').append(response.code);
                        $('.organization').append(
                            "<option value='" + 0 + "'>Select Organization</option>");

                        $.each(response.organizations, function(key, item) {
                            console.log(item);
                            $('.organization').append(
                                "<option selected value='" + item.id + "'>" + item.name + "</option>");

                        });
                        $('.club').empty();
                        $('.club').append(
                            "<option value='" + ' ' + "'>Select Club</option>");
                        $.each(response.clubs, function(key, item) {

                            $('.club').append(
                                "<option value='" + item.id + "'>" + item.club_name + "</option>");
                        });



                    }
                });

            });
        });


        $('.registerBut').on('click',function() {
            

        });
        $('#date_validate').keyup(function() {
            // alert("hi");
            $("#alert2").hide();
            $("#alert3").hide();
            value = $('#date_validate').val();
            year = value.split('-');
            now = new Date().getFullYear()
            console.log(now);

            if (year[0] > now || year[0] < 1940) {
                $("#alert2").html('Please Check Your Date of Birth Year.');
                $("#alert2").show();
                $("#alert3").hide();
            } else {
                $("#alert2").hide();
                $("#alert3").show();
            }
        });
    </script>
</body>
<div class="modal fade in" id="full-width" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title"> Vilkår:</h4>
            </div>
            <div class="modal-body">

            <div class="row"  id="memberInfoYes">
                 @if($organizations!=null)
                                            @if($organizations->orgsetting)
                                            @if($organizations->orgsetting->terms_conditions)
                                            <p>{!! html_entity_decode($organizations->orgsetting->terms_conditions) !!}</p>
                                            @endif
                                            @endif
@endif


                                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>

</html>