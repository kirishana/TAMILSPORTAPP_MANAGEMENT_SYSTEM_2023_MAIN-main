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
                                    <form action="reset/userid" autocomplete="on" id="reset_pw" method="post" role="form">
                                        @csrf
                                        <div class="logo_login">
                                            @if($general->signup_logo!==null)<img src="/general/signUp/{{ $general->signup_logo }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                            @else
                                            <img src="{{ asset('assets/img/web logo copy white bg.png') }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                            @endif
                                            <br>
                                        </div>
                                        <p class="text-justify" style="font-size:13px;">
                                            Enter your email address below and we'll send your UserId to your email address.
                                        </p>
                                        <!-- CSRF Token -->
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                        <div class="form-group label-floating  {{ $errors->first('email', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">mail</i></span>
                                                <label class="control-label youmai" for="email2"> Your email</label>
                                                <input class="form-control email" id="email2" name="email" required type="email" value="{!! old('email') !!}" />
                                            </div>
                                            <div class="col-sm-12">
                                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                        <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">email</i></span>
                                               
                                                <select  class="form-control  userIds" name="UserId">
                                                    <option selected> Select Organization/Club</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <p class="login button" style="margin-top: 10px;">
                                            <input type="submit" value="Get UserId" class="btn btn-raised btn-success btn-block" />
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



</html>
<script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>
                $(".email").on('keyup', function() {
                var email = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '/email/userIds',
                    data: {
                        "email": email
                    },
                    success: function(response) {
                 

                 $('.userIds').empty();
                 $('.userIds').append(
                     "<option value='" + 0 + "' >Select Organization/Club</option>");
                   
                 $.each(response.clubs, function(key, item) {
                     
                     $('.userIds').append(
                         "<option value='" + item.id +" club" +"'>" + item.club_name + "</option>");
                 });
                 $.each(response.orgs, function(key, item) {
                     
                     $('.userIds').append(
                         "<option value='" + item.id +" org"+ "'>" + item.name + "</option>");
                 });       
             
         }
     });

 })
    </script>