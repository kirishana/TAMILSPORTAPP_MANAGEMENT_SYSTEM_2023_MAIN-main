@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit Venue
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
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.venues') }}</h1>
    <ol class="breadcrumb">

        <li><a href="#"> Leagues</a></li>
        <li><a href="/venues"> Venues</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">spa</i>
                       {{ __('venue.edit_venue')}} ({{$venue->name}})
                        <a style="float:right" href="/venues"><i class="material-icons  leftsize">keyboard_backspace
                            </i>
                            Back</a>
                    </h3>

                </div>

                <div class="panel-body">
                    <div class="row">
                        <form class="form_action6" action="{{route('venues.update',$venue->id)}}" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            <input type="hidden" name="_method" value="PUT">

                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                        <label class="control-label" for="firstName3">{{ __('venue.place')}}<span style="color:red;"> <b> * </b></span>

                                        </label>
                                        <input type="text" class="form-control" value="{{$venue->name}}" name="name" id="firstName3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('dashboard.address')}}</label>
                                        <input type="text" name="address" value="{{$venue->location}}" class="form-control" id="inputEmail3">
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                        <label class="control-label" for="firstName3">{{ __('dashboard.city')}}<span style="color:red;"> <b> * </b></span>

                                        </label>
                                        <input type="text" class="form-control" value="{{$venue->city}}" name="city" id="firstName3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('dashboard.state')}}</label>
                                        <input type="text" name="state" value="{{$venue->state}}" class="form-control" id="inputEmail3">
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                        <label class="control-label" for="firstName3">{{ __('club.mobile')}}<span style="color:red;"> <b> * </b></span>

                                        </label>
                                        <input type="number" maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" value="{{$venue->mobile}}" name="mobile" id="firstName3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('dashboard.phone_no')}}</label>
                                        <input type="number" name="tp"  maxlength="8" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{$venue->tp}}" class="form-control" id="inputEmail3">
                                    </div>

                                </div>

                            </div>

                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                        <label class="control-label" for="firstName3">{{ __('dashboard.email')}}<span style="color:red;"> <b> * </b></span>

                                        </label>
                                        <input type="text" class="form-control" value="{{$venue->email}}" name="email" id="firstName3">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('venue.contact_person')}}</label>
                                        <input type="text" name="person_name" value="{{$venue->person_name}}" class="form-control" id="inputEmail3">
                                    </div>

                                </div>

                            </div>
{{--  
                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                        <label class="control-label" for="firstName3">Latitude<span style="color:red;"> <b> * </b></span>

                                        </label>
                                        <input type="number" class="form-control" value="{{$venue->latitude}}" name="latitude" id="firstName3">
                                    </div>
                                </div>
                                <input type="hidden" name="season" value="{{$venue->season_id}}">

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">Longitude</label>
                                        <input type="number" name="longitude" value="{{$venue->longitude}}" class="form-control" id="inputEmail3">
                                    </div>

                                </div>

                            </div>  --}}
                            <input type="hidden" name="season" value="{{$venue->season_id}}">


                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->

                                <div class="col-md-12">

                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('venue.map')}}</label>
                                        <input type="text" name="map" value="{{$venue->map}}" class="form-control" id="inputEmail3">

                                    </div>
                                </div>

                            </div>




                            
                            @foreach ($venue->venueDetails as $key=>$venueDetail)
                            
                            <div class="order-detail-block">
                                <div class="row">
                                <div class="col-md-3">
                                <div class="form-group label-floating">
                                <label class="control-label" for="inputPassword4">{{ __('venue.nameT') }}</label>
                                <input type="text" name="venuesDetail[{{$venueDetail->id}}][track_event_name]"  value="{{$venueDetail->track_event_name}}" class="form-control append_agreedQuantity">
                                <input type="hidden" name="venuesDetail[{{$venueDetail->id}}][venue_id]"  value="{{$venueDetail->venue_id}}" class="form-control append_agreedQuantity">
                                </div>
                                </div>
                                <div class="col-md-3">
                            <div class="form-group label-floating">
                                <label class="control-label" for="inputPassword4">{{ __('venue.max_len') }}(100m,200m,400m)</label>
                                <input type="text" name="venuesDetail[{{$venueDetail->id}}][capacity]"  value="{{$venueDetail->max_length}}" class="form-control append_agreedQuantity">
                
                
                                </div>
                                </div>
                                <div class="col-md-3">
                                <div class="form-group label-floating">
                                <label class="control-label" for="inputPassword4">{{ __('venue.count') }}</label>
                                <input type="number" name="venuesDetail[{{$venueDetail->id}}][track]"  value="{{$venueDetail->track_event_count}}" class="form-control append_deliveredQuantity">
                                </div>
                                </div>
                
                                </div>
                
                                </div>
                                
@endforeach


                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        {{--  <label class="control-label" for="inputPassword4">Number Of Tracks<span style="color:red;"> <b> * </b></span> </label>  --}}
                                         <a class="btn btn-success add" data-toggle="tooltip" id="addServiceAssistance">
                                            {{ __('venue.track_details') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                    </div>
                                    <div class="order-details"></div>

                                </div>
                            </div> 
                            <input style="float:right" type="submit" class="btn btn-raised btn-warning" value="{{ __('staffs.update') }}">

                            <!-- <div class="col-md-6">
                                                                <div class="form-group label-floating">
                                                                    <label class="control-label" for="inputPassword4">Number Of Tracks<span style="color:red;"> <b> * </b></span> </label>
                                                                    <a class="btn btn-success  field" data-toggle="tooltip" id="addServiceAssistance">
                                                                        Add Field Event Details
                                                                    </a>                                        
                                                                </div> -->
                    </div>

                    <div class="col-md-6">
                        <div class="form-group label-floating">

                        </div>
                        <div class="venue-details"></div>

                    </div>


                    <div class="form-group form-actions">
                        <div class="col-md-11"></div>
                        <div class="col-md-1">
                        </div>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script>
    $(document).ready(function() {
        var i = 0;
        $('.add').click(function() {
            $('.order-details').append('<div class="order-detail-block">' +
                '<div class="row">' +
                '<div class="col-md-3">' +
                '<div class="form-group label-floating">' +
                '<label class="control-label" for="inputPassword4">Track Name*</label>' +
                '<input type="text" name="venues[' + i + '][track_event_name]" class="form-control append_agreedQuantity" >' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<div class="form-group label-floating">' +
                '<label class="control-label" for="inputPassword4">Max Track Length*(100m,200m,400m)</label>' +
                '<input type="text" name="venues[' + i + '][capacity]" class="form-control append_agreedQuantity" >' +


                '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<div class="form-group label-floating">' +
                '<label class="control-label" for="inputPassword4">Track Count*</label>' +
                '<input type="number" name="venues[' + i + '][track]" class="form-control append_deliveredQuantity" >' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3"><button type="button" class="btn btn-danger removeOrderDetails" id="removeOrderDetailsAssistance" style="padding: 2px 6px;text-transform:none;margin:0px;font-size:14px">Remove</button></div>' +

                '</div>' +

                '</div>');
            i = i + 1;
        });

        //remove append service-assistance
        $("body").on('click', '.removeOrderDetails', function(e) {
            e.preventDefault();
            $(this).closest('.order-detail-block').remove();

        });


    });
</script>
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
@stop