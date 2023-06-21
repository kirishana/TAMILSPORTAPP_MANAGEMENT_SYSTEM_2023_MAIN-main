<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="{{ asset('assets/css/pages/login2.css') }}" rel="stylesheet"/>
    <!-- styles of the page ends-->
</head>

<body>
<div class="container">
    <div class="row vertical-offset-100">
        <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">SIGN IN</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('signin') }}" autocomplete="on" method="post" role="form"
                          id="authentication">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="material-icons">mail</i></span>
                                <input class="form-control" placeholder="E-mail" name="email" type="text"
                                       value="{!! old('email') !!}" required/>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->first('password', 'has-error') }}">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                       required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox keeplogin">
                                <label>
                                    <input type="checkbox"><span class="checkbox-material"></span> &nbsp;Remember Me
                                </label>
                            </div>
                        </div>

                        <input type="submit" value="SIGN IN" class="btn btn-primary btn-block btn-lg"/>
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
<script src="{{ asset('assets/js/pages/login2.js') }}" type="text/javascript"></script>
<!-- end of page level js-->
</body>
</html>