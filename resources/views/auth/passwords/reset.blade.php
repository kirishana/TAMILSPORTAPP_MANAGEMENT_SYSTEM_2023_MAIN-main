<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="{{ asset('assets/css/app_auth.css') }}" rel="stylesheet" type="text/css"/>
    <!-- end of global level css -->
</head>

<body >
    <div class="container">
        <div class="row vertical-offset-100">
            <!-- Notifications -->
           <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-11 col-lg-offset-1">
            <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-8 col-lg-offset-2">
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <a class="hiddenanchor" id="toforgot"></a>
                    <div id="wrapper">

                        <div id="login" class="animate form">
                            <form method="POST" action="{{ route('user.password.update') }}">  
                            @php
                            		$general = App\generalSetting::first();
                            		@endphp

                                @csrf                              <h3>
                                                                                                   @if($general->signup_logo!==null)<img src="/general/signUp/{{ $general->signup_logo }}" style="width:290px;height:73px;" alt="logo">
                                                                    @else
                                                                    <img src="{{ asset('assets/img/web logo copy white bg.png') }}" style="width:290px; height:73px;" alt="logo">
                                                                    @endif
                                                                    <br>
                                <br>Reset Password</h3>

                                    <!-- CSRF Token -->
                                <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <label style="margin-bottom:0px;" for="email1" class="uname control-label">
                                            E-mail
                                        </label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                        <div class="col-sm-12">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                        <label style="margin-bottom:0px;" for="password1" class="youpasswd control-label">
                                            Password
                                        </label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                            
                                    </div>
                                </div>

                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                        <label style="margin-bottom:0px;" for="password1" class="youpasswd control-label">
                                            Confirm Password
                                        </label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                                            
                                    </div>
                                </div>
                                
                                <div class="form-group login button">
                                  <button type="submit"
                                        class="btn btn-raised btn-success btn-block">Reset</button>
                                </div>
                                
                            </form>
                       

                    </div>
                

                       
                        
            
                </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- Bootstrap -->
    <!-- end of global js -->

</body>
</html>