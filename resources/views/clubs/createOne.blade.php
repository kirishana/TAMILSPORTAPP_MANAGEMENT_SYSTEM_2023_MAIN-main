@extends('admin/layouts/default')


{{-- Page title --}}
@section('title')
    Add Club
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
    <!--end of page level css-->
    <style>
        input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
    </style>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>{{ __('sidebar.clubs') }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Clubs</a></li>
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
                @endif--}}
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons ">person_add</i>
                            {{ __('sidebar.add_new') }}
                            <div style="float:right">
                                <a href="" style="color:white">
                                    <i class="material-icons">keyboard_arrow_left</i>

                                    <a href="/all-clubs" style="color:white">
                                        {{ __('staffs.back') }}</a>
                            </div>


                        </h3>



                    </div>





                    <div class="panel-body">

                        <form action="/club/store" id="register_here" autocomplete="on" method="POST" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <section class="content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div
                                            class="form-group label-floating {{ $errors->first('club_registation_num', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                <label class="control-label" for="club_name">{{ __('club.club_name') }}<span
                                                        style="color:red;"> <b> * </b></span></label>
                                                <input id="club_name" name="club_name" type="text"
                                                    class="form-control" value="{{ old('club_name') }}">
                                            </div>
                                        </div>
                                        {!! $errors->first('club_name', '<span class="help-block">:message</span>') !!}

                                    </div>

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div
                                            class="form-group label-floating {{ $errors->first('club_name', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="material-icons text-light">person</i></span>
                                                <label class="control-label" for="club_registation_num">{{ __('club.reg_no') }}</label>
                                                <input id="club_registation_num" name="club_registation_num" type="text"
                                                    class="form-control" value="{!! old('club_registation_num') !!}">


                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group {{ $errors->first('club_start_date', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="material-icons">event_note</i></span>
                                                <label class="control-label" for="postal">{{ __('club.establish_date') }}</label>
                                                <input id="club_start_date" name="club_start_date" type="date"
                                                    class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <div class="form-group label-floating {{ $errors->first('club_email', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">email</i></span>
                                                <label class="control-label" for="club_email">{{ __('dashboard.email') }}<span
                                                        style="color:red;"> <b> * </b></span></label>
                                                <input id="club_email" name="club_email"  type="text"
                                                    class="form-control" style="margin-top:5%;"
                                                    value="{!! old('club_email') !!}">
                                            </div>
                                          
                                        </div>
                                        {!! $errors->first('club_email', '<span class="help-block">:message</span>') !!}

                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-xs-12 col-sm-6 col-md-6">
                                        <!-- <div class="form-group label-floating {{ $errors->first('mobile', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">phone_iphone</i></span>
                                                <label class="control-label" for="mobile">Mobile Number<span style="color:red;"> <b> * </b></span></label>
                                                <input id="mobile" name="mobile" required type="number" class="form-control" value="{!! old('mobile') !!}">
                                            </div>
                                        </div> -->
                                        <div
                                            class="form-group label-floating {{ $errors->first('tpnumber', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="material-icons">phone_in_talk</i></span>
                                                <label class="control-label" for="tpnumber">{{ __('dashboard.phone_no') }}</label>
                                                <input id="tpnumber" name="tpnumber"
                                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                    type="number" maxlength="8" class="form-control"
                                                    value="{!! old('tpnumber') !!}">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-12">
                                            <!-- <div class="form-group label-floating {{ $errors->first('address', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons text-light">room</i></span>
                                                <label class="control-label" for="address">Address<span style="color:red;"> <b> * </b></span></label>
                                                <input id="address" name="address" required type="text" class="form-control" value="{!! old('address') !!}">
                                            </div>
                                        </div> -->
                                            <div
                                                class="form-group label-floating {{ $errors->first('city', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="material-icons text-light">location_city</i></span>
                                                    <label class="control-label" for="city">{{ __('dashboard.city') }}<span style="color:red;">
                                                            <b> * </b></span></label>
                                                    <input id="city" name="city"  type="text" class="form-control"
                                                        value="{!! old('city') !!}">
                                                </div>
                                            </div>
                                            {!! $errors->first('city', '<span class="help-block">:message</span>') !!}

                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <!-- <div class="form-group label-floating {{ $errors->first('tpnumber', 'has-error') }}">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                                <label class="control-label" for="tpnumber">Telephone Number</label>
                                                <input id="tpnumber" name="tpnumber" type="number" class="form-control" value="{!! old('tpnumber') !!}">
                                            </div>
                                        </div> -->
                                            <div
                                                class="form-group label-floating {{ $errors->first('address', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="material-icons text-light">room</i></span>
                                                    <label class="control-label" for="address">{{ __('dashboard.address') }}<span
                                                            style="color:red;"> <b> * </b></span></label>
                                                    <input id="address" name="address" type="text"
                                                        class="form-control" value="{!! old('address') !!}">
                                                </div>
                                                {!! $errors->first('address', '<span class="help-block">:message</span>') !!}

                                            </div>

                                        </div>

                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div
                                                class="form-group label-floating {{ $errors->first('state', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="material-icons text-light">location_city</i></span>
                                                    <label class="control-label" for="state">{{ __('dashboard.state') }}<span style="color:red;">
                                                            <b> * </b></span></label>
                                                    <input id="city" name="state" type="text"
                                                        class="form-control" value="{!! old('state') !!}">
                                                </div>

                                            </div>
                                            {!! $errors->first('state', '<span class="help-block">:message</span>') !!}

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            
                                            <div class="form-group  {{ $errors->first('country', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="material-icons">assistant_photo</i></span>
                                                            <label class="control-label" for="mobile">{{ __('club.select_country') }}<span
                                                                style="color:red;"> <b> * </b></span></label>
                                                    @if (Auth::user()->hasRole(1))
                                                        <select id="country" name="country" class="form-control">
                                                            <option disabled selected>Select country
                                                                    </option>
                                                            @foreach ($countries as $country)
                                                                <option value="{{ $country->id }}"
                                                                    {{ $country->id == Auth::user()->country_id ? 'selected' : '' }}>
                                                                    {{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    @else
                                                        <select id="country" name="country" class="form-control">
                                                            <option disabled selected>Select country</option>
                                                            @foreach ($countries as $country)
                                                                @if (old('country') == $country->id)
                                                                    <option value="{{ $country->id }}" selected>
                                                                        {{ $country->name }}</option>
                                                                @else
                                                                    <option value="{{ $country->id }}">
                                                                        {{ $country->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    @endif

                                                </div>
                                                {!! $errors->first('country', '<span class="help-block">:message</span>') !!}

                                            </div>




                                        </div>
                                    






                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group  {{ $errors->first('mobile', 'has-error') }}">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="material-icons">phone_iphone</i></span>
                                                    <label class="control-label" for="mobile">{{ __('club.mobile') }}<span
                                                            style="color:red;"> <b> * </b></span></label>
                                                        <div class="col-sm-1  code"
                                                            style="margin-top:4%;display:hidden;"></div>
                                                        <div class="col-sm-11">
                                                            <input
                                                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                                                type="number" maxlength="8" name="mobile"
                                                                class="form-control" id="inputEmail3"
                                                                value="{!! old('mobile') !!}">
                                                        </div>

                                                </div>
                                                {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-6">
                                               <div
                                                class="form-group label-floating {{ $errors->first('postal', 'has-error') }}">
                                                <div class="input-group"  style="margin-top:2%;">
                                                    <span class="input-group-addon"><i
                                                            class="material-icons text-light">near_me</i></span>
                                                    <label class="control-label" for="postal">{{ __('dashboard.postal_code') }}<span
                                                            style="color:red;"> <b> * </b></span></label>
                                                    <input id="postal" name="postal"  type="number"
                                                        class="form-control" value="{!! old('postal') !!}">
                                                </div>
                                                {!! $errors->first('postal', '<span class="help-block">:message</span>') !!}

                                            </div>
                                               
                                            </div>
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

                                        
                                </div>

                            </section>

                            <div class="pull-right">
                                <p class="signin button"
                                    style="padding-top: 15px; padding-right: 15px; padding-bottom: 15px;">
                                    <input type="submit" class="btn btn-raised btn-success btn-block" value="{{ __('staffs.register') }}" />
                                </p>
                            </div>

                        </form>

                    </div>
                </div>
                </div>


            </div>
        </div>
        </div>
        </div>
        </div>
        <!--row end-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
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
  $("#club_name").keyup(function(){
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
                 
                        if(response.alreadyExists==1){
                            $("#Prefix").show();
                            $('#prefixInput').attr("required","required");

                        }
                 
                        if(response.alreadyExists==0){
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
                 
                        if(response.alreadyExists==1){
                            $("#error").show();
                            $('input[type="submit"]').prop('disabled',true);

                        }
                 
                        if(response.alreadyExists==0){
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
