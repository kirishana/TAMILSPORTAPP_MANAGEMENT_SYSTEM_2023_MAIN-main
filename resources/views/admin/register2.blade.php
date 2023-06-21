<!DOCTYPE html>
<html>

<head>
    <title>Register | Josh Admin Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/app_auth.css') }}" rel="stylesheet" type="text/css"/>
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="{{ asset('assets/css/pages/login2.css') }}" rel="stylesheet" />
    <!-- styles of the page ends-->
</head>

<body>

<div class="container">
    <div class="row vertical-offset-100">
        <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">REGISTER</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" id="register_here" method="post" action="{{ route('register2') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <fieldset>

                            <div class="form-group label-floating {{ $errors->first('first_name', 'has-error') }}">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">person</i></span>
                                    <label class="control-label" for="fname"></label>
                                    <input id="fname" name="first_name" placeholder="First Name" required
                                           type="text" class="form-control" value="{!! old('first_name') !!}">
                                </div>
                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group label-floating {{ $errors->first('last_name', 'has-error') }}">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">person</i></span>
                                    <label class="control-label" for="lname"></label>
                                    <input id="lname" name="last_name" placeholder="Last Name" required type="text"
                                           class="form-control" value="{!! old('last_name') !!}">
                                </div>
                                {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}

                            </div>
                            <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">email</i></span>
                                    <label class="control-label" for="email"></label>
                                    <input id="email" name="email" placeholder="E-mail" required type="text"
                                           class="form-control"  value="{!! old('email') !!}">
                                </div>
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group label-floating  {{ $errors->first('email_confirm', 'has-error') }}">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">email</i></span>
                                    <label class="control-label" for="cemail"></label>
                                    <input id="cemail" name="email_confirm" placeholder=" Confirm E-mail" required
                                           type="text" class="form-control"  value="{!! old('email_confirm') !!}">
                                </div>
                                {!! $errors->first('email_confirm', '<span class="help-block">:message</span>') !!}
                            </div>
                            <div class="form-group label-floating  {{ $errors->first('password', 'has-error') }}">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                    <label for="password" class="youpasswd control-label"></label>
                                    <input id="password" name="password" required type="password"
                                           class="form-control" placeholder="Password" value="{!! old('password') !!}"/>
                                </div>
                                {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                            </div>
                           <div class="form-group label-floating  {{ $errors->first('password_confirm', 'has-error') }}">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                    <label for="cpassword" class="youpasswd control-label"></label>
                                    <input id="cpassword" name="password_confirm" required type="password"
                                           class="form-control" placeholder=" Confirm Password" value="{!! old('password_confirm') !!}"/>
                                </div>
                                    {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}

                            </div>
                            <div class="checkbox keeplogin">
                                <label>
                                    <input type="checkbox"><span class="checkbox-material" {!! old('terms')?"checked='checked'":"" !!}></span> &nbsp;I Agree for terms
                                </label>
                            </div>
                            <p class="signin button" style="padding-top: 15px;">
                                <input type="submit" class="btn btn-raised btn-primary btn-block" value="Register"/>
                            </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- global js -->
<script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
<!-- end of global js -->
<!-- begining of page level js-->
<script src="{{ asset('assets/js/TweenLite.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/register2.js') }}"></script>

<!-- end of page level js-->
</body>
</html>