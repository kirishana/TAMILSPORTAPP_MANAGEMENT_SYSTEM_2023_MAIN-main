@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Add Organization
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
<style>
        input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
    </style>
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content2')
<section class="content-header">
    <h1>Organization</h1>
    <ol class="breadcrumb">

        <li><a href="#"> Organization</a></li>
        <li class="active">Add New</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
               {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif --}}
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">spa</i>
                        Add New Organization
                        <div style="float:right">
                        <a href="" style="color:white">
                            <i class="material-icons">keyboard_arrow_left</i>

                            <a href="/organizations" style="color:white">
                                Back</a>
                            </div>
                     
                    </h3>

                </div>

                <div class="panel-body">


                        <form class="form_action6" action="/organizations/store" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">person</i></span>
                                        <label class="control-label" for="firstName3">Name<span style="color:red;"> <b> * </b></span>
                                        </label>
                                        <input type="text" class="form-control" name="name" id="firstName3" value="{!! old('name') !!}">
                                        </div>
                                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">email</i></span>
                                        <label class="control-label" for="inputEmail3">Email <span style="color:red;"> <b> * </b></span></label>
                                        <input type="email" name="email" class="form-control" id="inputEmail3" value="{!! old('email') !!}">
                                        </div>
                                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                    </div>
                                </div>
                            </div>
                            
                        
                    
                    <div class="row">
                    <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="material-icons text-light">person</i></span>
                                        <label class="control-label" for="inputEmail3">Org Reg No </label>
                                        <input type="text" name="orgnum" class="form-control" id="inputEmail3" value="{!! old('orgnum') !!}">
                                        </div>
                                    </div>
                                    </div>
                        <div class="col-md-6">
                            
                            <div class="form-group label-floating">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons text-light">room</i></span>
                                <label class="control-label" for="inputPassword4">Address <span style="color:red;"> <b> * </b></span></label>
                                <input type="text" name="address" class="form-control" id="inputPassword4" value="{!! old('address') !!}">
                                </div>
                            </div>
                            {!! $errors->first('address', '<span class="help-block">:message</span>') !!}

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons text-light">location_city</i></span>
                                <label class="control-label" for="inputEmail3">City <span style="color:red;"> <b> * </b></span></label>
                                <input type="text" name="city" class="form-control" id="inputEmail3" value="{!! old('city') !!}">
                                </div>
                                {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                            </div>
                            <input type='hidden' name="season" value="{{$season->id}}">
                        </div>
                        
                        
                        <div class="col-md-6">
                           
                            <div class="form-group label-floating">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons text-light">location_city</i></span>
                                    <label class="control-label" for="lastName4">State/Province <span style="color:red;"> <b> * </b></span>
                                    </label>
                                    <input type="text" class="form-control" name="state" id="lastName4" value="{!! old('state') !!}">
                                </div>
                                {!! $errors->first('state', '<span class="help-block">:message</span>') !!}

                                </div>
                         </div>
                    
                    </div>

                    <div class="row">

                            <div class="col-md-6">
                                <!-- <div class="form-group label-floating">
                                    <label class="control-label" for="lastName4">State/Province <span style="color:red;"> <b> * </b></span>
                                    </label>
                                    <input type="text" class="form-control" name="state" id="lastName4">
                                </div> -->
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="material-icons text-light">near_me</i></span>
                                    <label class="control-label" for="phoneNumber4">Postal Code <span style="color:red;"> <b> * </b></span></label>
                                    <input type="number" name="postal" class="form-control" id="phoneNumber4" value="{!! old('postal') !!}">
                                    </div>
                                    {!! $errors->first('postal', '<span class="help-block">:message</span>') !!}

                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                <!-- <label class="control-label" for="lastName4">State/Province <span style="color:red;"> <b> * </b></span>
                                    </label> -->
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="material-icons">assistant_photo</i></span>
                                    <label class="control-label" for="lastName4">Country <span style="color:red;"> <b> * </b></span></label>
                                    <select id="country"  name="country" class="form-control">
                                    <option disabled selected >Select country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}"  @if(old('country')==$country->id)selected @endif>{{ $country->name }}</option>                   
                                        @endforeach
                                    </select>
                                    </div>
                                    {!! $errors->first('country', '<span class="help-block">:message</span>') !!}

                                </div>
                            </div>
                            </div>
                            <div class="row">

                            <input type="hidden" name="orgId">
                            <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons">phone_iphone</i></span>
                                <label class="control-label " for="inputEmail3">Mobile Number<span style="color:red;"> <b> * </b></span></label>
                                <div class="row">
                                                        <div class="col-sm-1  code" style="margin-top:4%;"></div>
                                                        <div class="col-sm-11">
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type= "number" maxlength = "15"  name="mobile" class="form-control" id="inputEmail3" value="{!! old('mobile') !!}">
                                                        </div>
                                                        {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}

                            </div>
                        </div>
                        </div>
                        </div>
                                <!-- <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">Org Reg No: </label>
                                        <input type="text" name="orgnum" class="form-control" id="inputEmail3">
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="material-icons">phone_in_talk</i></span>
                                        <label class="control-label" for="inputEmail3">Telephone Number </label>
                                        <input type="number" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type= "number" maxlength = "15" name="tp" id="inputEmail3" value="{!! old('tp') !!}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="col-xs-12 col-sm-6 col-md-6" id="Prefix">
                                               <div
                                                class="form-group label-floating {{ $errors->first('postal', 'has-error') }}">
                                                <div class="input-group"  style="margin-top:2%;">
                                                    <span class="input-group-addon"><i class="fab fa-autoprefixer"></i></span>
                                                    <label class="control-label" for="postal"> Prefix<span
                                                            style="color:red;"> <b> * </b></span></label>
                                                            <input type="text" class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                         maxlength = "3" name="prefix" id="prefixInput" value="{!! old('prefix') !!}">
                                         <span id="error" style="color:red;" >This prefix is already exits</span>

                                                </div>
                                            </div>
                                               
                                            </div>
                        <div class="form-group form-actions">
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2"><input style="float:right" id="submit" type="submit" class="btn btn-raised btn-primary" value="Submit"></div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/adduser.js') }}"></script>

@stop
    <!-- Bootstrap -->
    <!-- end of global js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>


    <script>
                
var country=$("#country option:selected").val();
                $.ajax({
                    type: 'POST',
                    url: '/countries/' + country,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country": country
                    },
                    success: function(response) {
                 $('.code').empty();
                 $('.code').append(response.code);
             
         }
     });
     $(document).ready(function($) {
            $("#country").change(function() {
                var country = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '/countries/' + country,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country": country
                    },
                    success: function(response) {
                 

                 $('.code').empty();
                 $('.code').append(response.code);
                   
                 
             
         }
     });

 });
});

$(document).ready(function(){
    $("#Prefix").hide();
    $("#error").hide();
  $("#firstName3").keyup(function(){
    name=$(this).val();
    // console.log(name);
    $.ajax({
                    type: 'POST',
                    url: '/prefix',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name": name
                    },
                    success: function(response) {
                 console.log(response.alreadyExists)
                        if(response.alreadyExits==1){
                            $("#Prefix").show();
                            $('#prefixInput').attr("required","required");

                        }
                 
                        if(response.alreadyExits==0){
                            $("#Prefix").hide();
                            $('input[type="submit"]').prop('disabled',false);

                        }
         }
                });
  });


  $("#prefixInput").keyup(function(){
    name=$(this).val();
    console.log(name);

    $.ajax({
                    type: 'POST',
                    url: '/prefix',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name": name
                    },
                    success: function(response) {
                 
                        if(response.alreadyExits==1){
                            $("#error").show();
                            $('input[type="submit"]').prop('disabled',true);

                        }
                 
                        if(response.alreadyExits==0){
                            $("#error").hide();
                            $('input[type="submit"]').prop('disabled',false);

                        }
         }
                });
  });
  $("#prefixInput").keydown(function(){
    $("#error").hide();

});             
    prefix=document.getElementById('prefixInput').value;     
    if(prefix !=''){
        $("#Prefix").show();

    }
  
});             
    </script>
