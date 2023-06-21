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
    <div class="container ">
        <div class="row vertical-offset-100">
            
                <div class="col-xs-12 col-xs-offset-1 col-sm-7 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-6 col-lg-offset-4">
                    
                    <div id="container_demo">
                        
                        <div id="wrapper">

                            <div id="login" class="animate form">
                                <!-- <?= session('message') ?> -->
                                <form action="/club_manager_form" id="register_here" autocomplete="on" method="post" role="form">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <h3 style="height:73px;">
                                        <img src="{{ asset('assets/img/web logo copy white bg.png') }}" class="img-responsive"  alt="logo">
                                       
                                    </h3>
                                    <br>
                                        <center> <h3 class="reg">Club Admin Registration </h3></center>
                                        <hr>
                                    <!-- ----------------------------------------------------- -->

                                    <section class="content">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('first_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="first_name">First Name<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="first_name" name="first_name" required type="text" class="form-control" value="{!! old('first_name') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('last_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <label class="control-label" for="last_name">Last Name<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="last_name" name="last_name" required type="text" class="form-control" value="{{ old('last_name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('country', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">assistant_photo</i></span>
                                                        <select id="country" name="country" class="form-control">
                                                            <option disabled selected>Select country<span style="color:red;"> <b> * </b></span></option>
                                                            @foreach ($countries as $country)
                                                            @if(old('country')==$country->id)
                                                             <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                                             @else
                                                             <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                             @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group  {{ $errors->first('organization', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">spa</i></span>
                                                        <select id="organization" name="organization" class="form-control">
                                                            <option disabled selected>Select Organization</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('tel-number', 'has-error') }} ">
                                                    <div class="input-group ">
                                                        <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                                        <label class="control-label " for="tel-number">Telephone Number<span style="color:red;"> <b> * </b></span></label>
                                                        <div class="row">
                                          <div class="col-md-1 code" style="margin-top:10%;display:hidden;"></div>
                                            <div class="col-md-10">

                                                        <input id="tel-number" name="tel-number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type= "number" maxlength = "15" required type="tel" class="form-control" value="{!! old('tel-number') !!}">
                                                    </div>
                                                    </div>

                                                </div>
                                            </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                                        <label class="control-label" for="email1">E-mail<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="email" name="email" required type="text" class="form-control" value="{!! old('email') !!}">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                                    <div class="input-group">
                                                    
                                                        <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                                        <label class="control-label" for="dob">DOB<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="" name="dob" required type="date" class="form-control" value="{!! old('dob') !!}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group {{ $errors->first('tel-number', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">wc</i></span>
                                                        <label class="control-label" for="gender">Gender<span style="color:red;"> <b> * </b></span></label>
                                                        <div class="radio">
                                                            <label><input type="radio" name="gender" id="optionsRadiosInline1" value="male" @if(old('gender')=='male') checked @endif>Male</label>
                                                            <label><input type="radio" name="gender" id="optionsRadiosInline2" value="female" @if(old('gender')=='female') checked @endif>Female</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                      
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                        <label for="password2" class="youpasswd control-label">Password<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="password2" name="password" required type="password" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                                <div class="form-group label-floating {{ $errors->first('password_confirmation', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                                                        <label for="password_confirmation" class="youpasswd control-label">Confirm Password<span style="color:red;"> <b> * </b></span></label>
                                                        <input id="password_confirmation" name="password_confirmation" required type="password" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" name="role" value="3">
                                        <div class="row">
                                            <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group label-floating {{ $errors->first('role', 'has-error') }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons">person</i></span>
                            <select id="disabledSelect" name="role" class="form-control">
                                <option>Register As</option>
                                <option>Roll 1</option>
                                <option>Roll 2</option>
                                <option>Roll 3</option>

                            </select>
                        </div>
                    </div>
                </div> -->
                                            <!-- <div class="col-xs-12 col-sm-6 col-md-6">
                    <div class="form-group label-floating {{ $errors->first('password_confirmation', 'has-error') }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="material-icons">vpn_key</i></span>
                            <label for="password_confirmation" class="youpasswd control-label">Confirm Password</label>
                            <input id="password_confirmation" name="password_confirmation" required type="password" class="form-control"/>
                        </div>
                    </div>
                </div> -->
                                        </div>

                                    </section>

                                    <p class="signin button" style="padding-top: 15px;">
                                        <input type="submit" class="btn btn-raised btn-success btn-block" value="Sign up" />
                                    </p>
                                    <p class="change_link">
                                        <a href="/login" class="to_clubregister">
                                            <button type="button" class="btn btn-raised btn-responsive botton-alignment btn-warning btn-sm">Back</button>
                                        </a>
                                    </p>

                                </form>



                                <!-- -------------------------------------------------------- -->
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
                 $('.code').empty();
                 $('.code').append(response.code);
                 $('#organization').append(
                     "<option value='" + 0 + "'>Select Organization</option>");
                   
                 $.each(response.organizations, function(key, item) {
                     
                     $('#organization').append(
                         "<option value='" + item.id + "'>" + item.name + "</option>");
                 });
                 $('#club').empty();
                 $('#club').append(
                     "<option value='" + 0 + "' >Select Club</option>");
                 $.each(response.clubs, function(key, item) {

                     $('#club').append(
                         "<option value='" + item.id + "'>" + item.club_name + "</option>");
                 });
             
                 
             
         }
     });

 });
});
                  
    </script>

</body>

</html>