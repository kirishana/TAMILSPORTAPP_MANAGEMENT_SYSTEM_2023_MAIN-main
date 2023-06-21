<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/app_auth.css') }}" rel="stylesheet" type="text/css" />

    <!-- end of global level css -->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-xs-11 col-xs-offset-0 col-sm-6 col-sm-offset-4  col-md-6 col-md-offset-3 col-lg-5 col-lg-offset-4">
                
                    <div id="container_demo">
                        <a class="hiddenanchor" id="toregister"></a>
                        <a class="hiddenanchor" id="tologin"></a>
                        <a class="hiddenanchor" id="toforgot"></a>
                        <!-- <a class="hiddenanchor" id="toclub_register"></a> -->
                        <div id="wrapper">

                            <div id="login" class="animate form">
                                <form action="/login" autocomplete="on" method="post" role="form" id="authentication">
                                    <h3>
                                        <center>
                                            <img src="{{ asset('assets/img/web logo copy white bg.png') }}" class="img-responsive" style="width:290px;height:73px;" alt="Norway tamil sangam logo">
                                        </center>
                                    </h3>
                                    <br>
                                    <div class="panel panel">
                                        <div class="panel-heading" style="background-color: #D7DBDD;"> If you already have an account click on "LOGIN", If you don't have an account already then click on "SIGNUP" </div>
                                        <!-- <div class="panel-body" style="background-color: #D7DBDD;">Panel Content</div> -->
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
                                            <a href="/login" class="to_clubregister">
                                                <button type="button" class="btn btn-raised botton-alignment btn-warning btn-sm" style="float:left;">Back</button>
                                            </a>
                                            <a href="/club-manager">
                                                <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-success btn-sm" style="float:right;">Sign up</button>
                                            </a>
                                        </p>
                                    </div>
                                    <br>
                                    <br>


                                </form>




                            </div>
                            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-8 col-lg-offset-2">
                                <div class="panel panel-info">
                                    <div id="forgot" class="animate form">
                                        <form action="password/email" autocomplete="on" id="reset_pw" method="post" role="form">
                                            <h3>
                                                <Center>

                                                    <img src="{{ asset('assets/img/web logo copy white bg.png') }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                                    <br>
                                                </Center>
                                            </h3>
                                            <p style="font-size:13px;">
                                                Enter your email address below and we'll send a special reset password link to your inbox.
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
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>
                
            </div>
        </div>
    </div>






    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <!-- end of global js -->
    <script>
        $(document).ready(function($) {
            $("#country").on('change', function() {
                var country = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '/countries/' + country,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country": country
                    },
                    success: function(response) {
                        $('#organization').empty();
                        $.each(response.organizations, function(key, item) {
                            $('#organization').append("<option value='" + item.id + "'>" + item.name + "</option>");
                        });
                    }
                });

            });
        });
    </script>

</html>