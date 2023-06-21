<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/app_auth.css') }}" rel="stylesheet" type="text/css"/>
    <!-- end of global level css -->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <!-- Notifications -->
           <div id="notific">
               @include('notifications')
           </div>
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form" id="authentication">
                                <h3 class="black_bg">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="josh logo">
                                    <br>LOG IN</h3>
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <label style="margin-bottom:0px;" for="email1" class="uname control-label">
                                            E-mail
                                        </label>
                                        <input id="email1" name="email" required type="email"  class="form-control"
                                               value="{!! old('email') !!}"/>
                                        <div class="col-sm-12">
                                            {!! $errors->first('email', '<span class="help-block bmd-help">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                        <label style="margin-bottom:0px;" for="password1" class="youpasswd control-label">
                                            Password
                                        </label>
                                            <input id="password1" name="password" required type="password"  class="form-control" value="{!! old('password') !!}" />
                                            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="checkbox keeplogin">
                                    <label>
                                        <input type="checkbox"> &nbsp;Keep me logged in
                                    </label>
                                </div>
                                <div class="form-group login button">
                                    <button type="submit" class="btn btn-raised btn-success btn-block">Login</button>
                                </div>
                                <p class="change_link">
                                    <a href="#toforgot">
                                        <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm">Forgot password</button>
                                    </a>
                                    <a href="#toregister">
                                        <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Sign up</button>
                                    </a>
                                </p>
                            </form>
                        </div>
                        <div id="register" class="animate form">
                            <form action="{{ route('signup') }}" id="register_here" autocomplete="on" method="post" role="form">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <h3 class="black_bg">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="josh logo">
                                    <br>SIGN UP</h3>
                                <div class="form-group label-floating {{ $errors->first('first_name', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                        <label class="control-label" for="first_name">First Name</label>
                                        <input id="first_name" name="first_name" required type="text" class="form-control" value="{!! old('first_name') !!}">
                                    </div>
                                    <div class="col-sm-12">
                                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group label-floating {{ $errors->first('last_name', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                        <label class="control-label" for="last_name">Last Name</label>
                                        <input id="last_name" name="last_name" required type="text" class="form-control" value="{{ old('last_name') }}">
                                        <div class="col-sm-12">
                                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <label class="control-label" for="email1">E-mail</label>
                                        <input id="email" name="email" required type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-12">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group label-floating {{ $errors->first('email_confirm', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <label class="control-label" for="cemail">Confirm E-mail</label>
                                        <input id="email_confirm" name="email_confirm" required type="text" class="form-control">
                                    </div>
                                    <div class="col-sm-12">
                                        {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                        <label for="password2" class="youpasswd control-label">Password</label>
                                        <input id="password2" name="password" required type="password"
                                               class="form-control"/>
                                    </div>
                                    <div class="col-sm-12">
                                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <div class="form-group label-floating {{ $errors->first('password_confirm', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                        <label for="password_confirm" class="youpasswd control-label">Confirm Password</label>
                                        <input id="password_confirm" name="password_confirmation" required type="password"
                                               class="form-control"/>
                                    </div>
                                    <div class="col-sm-12">
                                        {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <p class="signin button" style="padding-top: 15px;">
                                    <input type="submit" class="btn btn-raised btn-success btn-block" value="Sign up"/>
                                </p>
                                <p class="change_link">
                                    <a href="#tologin" class="to_register">
                                        <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                    </a>
                                </p>
                            </form>
                        </div>
                        <div id="forgot" class="animate form">
                            <form action="{{ route('forgot-password') }}" autocomplete="on" id="reset_pw" method="post" role="form">
                                <h3 class="black_bg">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="josh logo"><br>FORGOT PASSWORD</h3>
                                <p>
                                    Enter your email address below and we'll send a special reset password link to your inbox.
                                </p>
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div class="form-group label-floating  {{ $errors->first('email', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">mail</i></span>
                                        <label class="control-label youmai" for="email2"> Your email</label>
                                        <input class="form-control" id="email2" name="email" required type="email"
                                               value="{!! old('email') !!}"/>
                                    </div>
                                    <div class="col-sm-12">
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                                <p class="login button" style="margin-top: 10px;">
                                    <input type="submit" value="Reset password" class="btn btn-raised btn-success btn-block"/>
                                </p>
                                <p class="change_link">
                                    <a href="#tologin" class="to_register">
                                        <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                    </a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/pages/login.js') }}" type="text/javascript"></script>
    <!-- end of global js -->

</body>
</html>
