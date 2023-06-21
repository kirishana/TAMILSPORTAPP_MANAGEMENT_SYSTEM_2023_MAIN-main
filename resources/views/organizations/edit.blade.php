@extends('admin/layouts/menu')


@section('title')
Edit Organization
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
@stop


{{-- Page content --}}
@section('content2')
<section class="content-header">
    <h1>Edit Organization</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Clubs</li>
        <li class="active">Edit Organization</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="material-icons">person_add</i>
                        Editing : <span class="user_name_max" >{{ $organization->name}}</span>
                    </h3>
                    <span class="pull-right">
                        <i class="material-icons">keyboard_arrow_left</i>

                                    <a href="/organizations" style="color:white">
                            {{ __('staffs.back') }}</a>                                </span>

                </div>

                
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            @if($errors->any())
                                <div id="notification_remove">
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                                </div>
                            @endif

                            
                            <form name="commentForm" id="commentForm" action="/organization/update-org/{{$organization->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <!-- <input type="hidden" name="_method" value="PUT"/> -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <!-- ------------------------------------------------------------------------------ -->

                                    <section class="content">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating">
                                                   <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <label class="control-label" for="firstName3">Name<span style="color:red;"> <b> * </b></span>
                                                        </label>
                                                        <input type="text" disabled value="{{$organization->name}}" class="form-control">
                                                                                                                <input type="hidden"  value="{{$organization->name}}" class="form-control" name="name" id="firstName3">

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating">
                                                     <div class="input-group">
                                            <span class="input-group-addon"><i class="material-icons">email</i></span>
                                                        <label class="control-label" for="inputEmail3">Email<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="email" name="email" value="{{$organization->email}}" class="form-control" id="inputEmail3">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating ">
                                                    <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons text-light">location_city</i></span>
                                                        <label class="control-label" for="inputEmail3">City</label>
                                                        <input type="text" name="city" value="{{$organization->city}}" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>

                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating ">
                                                     <div class="input-group">
                                            <span class="input-group-addon"><i
                                                    class="material-icons">phone_in_talk</i></span>
                                                        <label class="control-label" for="inputEmail3">Telephone Number<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="tel" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$organization->tpnumber}}"class="form-control" maxLength="15" name="tp">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating ">
                                                    <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons">phone_iphone</i></span>
                                                        <label class="control-label" for="inputEmail3">Mobile Number</label>
                                                        <input type="tel" name="mobile" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$organization->mobile}}" maxLength="15" class="form-control" id="inputEmail3">
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating ">
                                                     <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons text-light">room</i></span>
                                                        <label class="control-label"
                                                        
                                                               for="inputPassword4">Address<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="text" name="address" value="{{$organization->address}}" class="form-control" id="inputPassword4">
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating">
                                                     <div class="input-group">
                                    <span class="input-group-addon"><i
                                            class="material-icons text-light">location_city</i></span>
                                                        <label class="control-label" for="lastName4">State/Province<span style="color:red;"> <b> * </b></span>
                                                        </label>
                                                        <input type="text" class="form-control"value="{{$organization->state}}" name="state" id="lastName4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating">
                                                     <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="material-icons">assistant_photo</i></span>
                                                        <label class="control-label" for="phoneNumber4">Country<span style="color:red;"> <b> * </b></span></label>
                                                        <select id="disabledSelect" name="country" class="form-control" disabled>
                                                            <option disabled selected>Select country</option>
                                                             @foreach ($countries as $country)
                                                            <option  value="{{ $country->id }}" {{$country->id==$organization->country_id?'selected':''}}>{{ $country->name }}</option>
                                                            @endforeach
                                                    </select>
                                                        </div> 
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating ">
                                                     <div class="input-group">
                                        <span class="input-group-addon"><i
                                                class="material-icons text-light">near_me</i></span>
                                                    <label class="control-label" for="phoneNumber4">Postal Code<span style="color:red;"> <b> * </b></span></label>
                                                        <input type="number" name="postal" value="{{$organization->postalcode}}"class="form-control" id="phoneNumber4">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>

                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                            <div class="form-group label-floating">
                                                <div class="form-group label-floating ">
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <div class="pull-right">
                                    <a href="">
                                        <p class="signin button" style="padding-top: 15px;">
                                        <button type="submit" class="btn btn-success" style="float:right">Update</button>

                                        </p>
                                        </a>
                                    </div>

                                    
                                </form>

                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
    <!--row end-->
</section>

                          @stop



                   
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>


    </script>
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('assets/js/pages/edituser.js') }}" type="text/javascript"></script> -->
@stop
