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
   
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <!-- Notifications -->
            <div class="col-xs-12 col-xs-offset-0 col-sm-6 col-sm-offset-4  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div id="container_demo">
                  
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            
                                <div class="logo_login">
                                    @if($general->signup_logo!==null)<img src="/general/signUp/{{ $general->signup_logo }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                    @else
                                    <img src="{{ asset('assets/img/web logo copy white bg.png') }}" class="img-responsive" style="width:290px;height:73px;" alt="logo">
                                    @endif
                                    <br>
                                </div>
                              
                    @if(session()->has('success'))
                    <div class="alert alert-success" id="success">
                        {{ session()->get('success') }}
                    </div>
                @endif     
               <form method="POST" action="{{ route('verify.store') }}">
    {{ csrf_field() }}
    <h3><center>Authorize Login</center></h3>
  <div class="alert alert-info" role="alert">
  We sent a message with the verification code to your mail. It may take a few minutes for the code to arrive.
</div>
       
   
<div class="row" style="margin-right:auto;margin-left:auto;">
                                    <div class="col-md-6" style="padding:0px;">
                                      
                                                <label class="control-label" for="club_name"style="font-size:15px;">Verification Code<span style="color:red;font-size:15px;"> <b> * </b></span></label>
                                               
                                            

                                    </div>
                                    <div class="col-md-6">
                                      
                                                
                                                 <input name="two_factor_code" type="text" 
            class="{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" 
            required autofocus placeholder="Two Factor Code" style="
        width: 100%;
        padding: 10px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
        
                                            

                                    </div>
                                    </div>
                                    <div class="row">
                                  <div class="col-md-2"></div>
                                    @if($errors->has('two_factor_code'))
            <span class="help-block">
                {{ $errors->first('two_factor_code') }}
            </span>
        @endif
        @if($errors->has('message'))
            <span class="help-block">
                {{ $errors->first('message') }}
            </span>
        @endif
        </div>
        <br>
        <div class="row">
        <div class="col-md-12">
      <input type="checkbox" name="twoFactorAuth"> Dont't ask again for 12hrs
        </div>
        </div>
           <br>
     
           <div class="row">
        <div class="col-md-12">
         <center> <button type="submit" class="btn btn-success btn-block">
                Verify
            </button>
            </center>
        </div>

    </div>
 <h5 style="text-align:center">Didn't get the code! click <a href="{{ route('verify.resend') }}">here</a></h5> 
 <br>
</form>

                               
                            <div class="footer" style="font-weight: bold;font-size:12px;text-align:center"> &copy; Copyrights and Powered By <a href="https://www.norwaytamilsangam.com/" target="_blank" style="color:black;text-decoration:none;">Norway Tamil Sangam </a> <br> Developed By <a href="https://maestrois.com/" target="_blank" style="color:black;text-decoration:none;">Maestro Innovative Solution (Pvt) Ltd </a></div>

                        </div>


                       
                    </div>
                </div>

            </div>

        </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
$(document).ready(function(){
setTimeout(function () {
        $("#success").hide();
    }, 1500);
})
</script>
</body>

</html>
