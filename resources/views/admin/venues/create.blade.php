@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Venue
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
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Venues</a></li>
        <li class="active">Add New Venue</li>
    </ol>
    <!-- <ol class="breadcrumb">

        <li><a href="#"> Events</a></li>
        <li><a href="#"> Venues</a></li>
        <li class="active">Add New</li>
    </ol> -->
</section>
<section class="content">

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                {{--  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif  --}}
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">room</i>
                        {{ __('venue.add_new_venue') }}
                        <div style="float:right">
                            <a href="" style="color:white">
                                <i class="material-icons">keyboard_arrow_left</i>
    
                                <a href="/venues" style="color:white">
                                    {{ __('staffs.back') }}</a>
                                </div>
                       
                    </h3>

                </div>
                <div class="panel-body">
                    <div class="row">
                        <form class="form_action6" action="{{route('venues.store')}}" id="formId" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                        <label class="control-label" for="firstName3">                        {{ __('venue.place') }}
<span style="color:red;"> <b> * </b></span> 
                                        </label>
                                        <input type="text" class="form-control" name="name" id="firstName3" value="{!! old('name') !!}">
                                            <span class="help-block venueName" style="display:none">Venue Name is required</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('dashboard.address') }}<span style="color:red;"> <b> * </b></span> </label>
                                        <input type="text" name="address" class="form-control" id="inputEmail3" value="{!! old('address') !!}">
                    <span class="help-block address" style="display:none">Address is required</span>
                                    </div>

                                </div>

                            </div>


                            <div class="col-md-12">
                                <!-- <h4  style="text-align:center;font-weight:bold;">Organization's Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">

                                        <label class="control-label" for="firstName3">{{ __('dashboard.city') }}<span style="color:red;"> <b> * </b></span> 
                                        </label>
                                        <input type="text" class="form-control" name="city" id="firstName3" value="{!! old('city') !!}">
                    <span class="help-block city" style="display:none">City is required</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('dashboard.state') }}</label>
                                        <input type="text" name="state" class="form-control" id="inputEmail3" value="{!! old('state') !!}">
                                        
                                    </div>

                                </div>

                            </div>
                          
                            <div class="col-md-12">
                                <!-- <h4 style="text-align:center;font-weight:bold;">Organization's Contact Information</h4> -->
                                

                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('club.mobile') }}<span style="color:red;"> <b> * </b></span> </label>
                                        <input  class="form-control" name="mobile" id="inputEmail3" value="{!! old('mobile') !!}"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type= "number" maxlength = "8">
                    <span class="help-block mobile"style="display:none">Mobile is required</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('dashboard.phone_no') }}</label>
                                        <input name="tp" class="form-control" id="inputEmail3" value="{!! old('tp') !!}"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            type= "number" maxlength = "8">
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-md-12">
                                <!-- <h4 style="text-align:center;font-weight:bold;">Organization's Contact Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('dashboard.email') }}<span style="color:red;"> <b> * </b></span> </label>
                                        <input type="email" name="email" class="form-control" id="inputEmail3" value="{!! old('email') !!}">
                    <span class="help-block email" style="display:none">Email is required</span>
                
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">
                                <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('venue.contact_person') }}<span style="color:red;"> <b> * </b></span> </label>
                                        <input type="text" name="person_name" class="form-control" id="inputEmail3" value="{!! old('person_name') !!}">
                    <span class="help-block person_name" style="display:none">Contact Person Name is required</span>
                                    </div>
                                    
                                </div>
                            </div>

                            {{--  <div class="col-md-12">
                                <!-- <h4 style="text-align:center;font-weight:bold;">Organization's Contact Information</h4> -->
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">Latitude </label>
                                        <input type="number"  step="0.00000000000001" name="latitude" class="form-control" id="inputEmail3" value="{!! old('latitude') !!}" 
                                       
                                            type= "number" >
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">
                                <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">Longitude </label>
                                        <input type="number" step="0.00000000000001" name="longitude" class="form-control" id="inputEmail3" value="{!! old('longitude') !!}"
                                            type= "number" >
                                    </div>
                                    
                                </div>
                            </div>  --}}

                            <div class="col-md-12">
                                <!-- <h4 style="text-align:center;font-weight:bold;">Organization's Contact Information</h4> -->
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputEmail3">{{ __('venue.map') }}</label>
                                        <input type="text" name="map" class="form-control" id="inputEmail3" value="{!! old('map') !!}">
                                    </div>
                                    
                                </div>
                            </div>
                                


                                <div class="col-md-12">
                                    <div class="col-md-12 ">
                                    <div class="form-group">
                                            {{-- <label class="control-label" for="inputPassword4">Number Of Tracks<span style="color:red;"> <b> * </b></span> </label> --}}
                                            <a class="btn btn-success required add" data-toggle="tooltip" id="addServiceAssistance">
                                            
                                                <i class="material-icons leftsize">add_circle</i>
                                         
                                                {{ __('venue.track_details') }}
                                            </a> <br>
                                            <h6>( {{ __('venue.track_details_desc') }} )</h6>                                       
                                        </div>
                                                                            <span id="TDetails" style="color:red;display:none;">Please Add Track Details</span> 

                                        
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group label-floating">
                                          
                                        </div>
                                        <div class="order-details"></div>

                                    </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="col-md-12">
                                        <div class="form-group label-floating">
                                            {{-- <label class="control-label" for="inputPassword4">Number Of Tracks<span style="color:red;"> <b> * </b></span> </label> --}}
                                            <a class="btn btn-success required  field" required data-toggle="tooltip" id="addServiceAssistance1"><i class="material-icons leftsize">add_circle</i>
                                                {{ __('venue.field_details') }}
                                            </a> <br>
                                            <h6>( {{ __('venue.field_details_desc') }} )</h6>                                       
                                        </div>
                            <span id="FDetails" style="color:red;display:none;">Please Add Field Details</span> 
                                    </div>

                                     <div class="col-md-6">
                                        <input type="hidden" name="season" value="{{$season->id}}">
                                        <div class="form-group label-floating">
                                          
                                        </div>
                                        <div class="venue-details"></div>

                                    </div>
                                    

                                    <div class="form-group form-actions">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-2">
                                            <input style="float:right"  id="sub" type="button" name="submit" class="btn btn-raised btn-primary" value="{{ __('staffs.register') }}">
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
<script type="text/javascript">
   
    $(document).ready(function() {
        var j=0;
        var i=0;
      $('.field').click(function(){
     $('.venue-details').append('<div class="order-detail-block">'+
            '<div class="row">'+
                '<div class="col-md-6">'+
                    '<div class="form-group label-floating">'+
                     '<label class="control-label" for="inputPassword4">Field Name<span style="color:red;"> <b> * </b></span></label>'+
                        '<input type="text"  name="venueFieldDetails['+j+'][field_event_name]" class="form-control append_agreedQuantity"  required>'+
               '</div>'+
               '</div>'+
             
               '<div class="col-md-6"><button type="button" class="btn btn-danger removeDetails" id="removeOrderDetailsAssistance" style="padding: 2px 6px;text-transform:none;margin:0px;font-size:14px">Remove</button></div>'+

            '</div>'+
            
            '</div>'); 
         j=j+1;  
         if((j == 1)){
        
        $('.removeDetails').prop('disabled', true);
        
        }
                 else if(j > 1){
        
        //remove append service-assistance
        $("body").on('click','.removeDetails',function(e) {  
           e.preventDefault();  
           $(this).closest('.order-detail-block').remove();
        
        } );
        j--
        }                
     }); 
    
     //remove append service-assistance
    //  $("body").on('click','.removeDetails',function(e) {  
    //     e.preventDefault();  
    //     $(this).closest('.order-detail-block').remove();
   
    //  } );




     var minField=1;
      
    
      $('.add').click(function(){
     $('.order-details').append('<div class="order-detail-block">'+
            '<div class="row">'+
               '<div class="col-md-3">'+
                '<div class="form-group label-floating">'+
                     '<label class="control-label" for="inputPassword4">Track Name <span style="color:red;" required> <b> * </b></label>'+
                     '<input type="text" name="venueDetails['+i+'][track_event_name]" class="form-control append_agreedQuantity" required >'+
                  '</div>'+
               '</div>'+
               '<div class="col-md-3">'+
                '<div class="form-group label-floating">'+
                     '<label class="control-label" for="inputPassword4">Max Track Length <span style="color:red;"> <b> * </b></span>(100m,200m,400m)</label>'+
                     '<input type="text" name="venueDetails['+i+'][capacity]" class="form-control append_agreedQuantity" required>'+

                      
               '</div>'+
               '</div>'+
               '<div class="col-md-3">'+
                '<div class="form-group label-floating">'+
                     '<label class="control-label" for="inputPassword4">Track Count <span style="color:red;"> <b> * </b></label>'+                  
                     '<input type="number" name="venueDetails['+i+'][track]" class="form-control append_deliveredQuantity" required>'+
                  '</div>'+
                  '</div>'+
               '<div class="col-md-3"><button type="button" class="btn btn-danger removeOrderDetails" id="removeOrderDetailsAssistance" style="padding: 2px 6px;text-transform:none;margin:0px;font-size:14px">Remove</button></div>'+

            '</div>'+

            '</div>'); 
         i=i+1;    
         if((i == 1)){
        
$('.removeOrderDetails').prop('disabled', true);

}
         else if(i > 1){

//remove append service-assistance
$("body").on('click','.removeOrderDetails',function(e) {  
   e.preventDefault();  
   $(this).closest('.order-detail-block').remove();

} );
i--
}           
     }); 
    
  
         
         var remove=$('#removeOrderDetailsAssistance').length;
         $('input[name="submit"]').click(function() {
            var track=$('.add').length;
         var field=$('#addServiceAssistance').length;
          if($('input[name="name"]').val()==''){
            $('.venueName').show();
          }
          if($('input[name="address"]').val()==''){
            $('.address').show();
          }
        if($('input[name="city"]').val()==''){
            $('.city').show();
          }
          if($('input[name="mobile"]').val()==''){
            $('.mobile').show();
          }
           if($('input[name="email"]').val()==''){
            $('.email').show();
          }
          if($('input[name="person_name"]').val()==''){
            $('.person_name').show();
          }
          
            
        //  alert(track);
        if(i==0 && j==0) {
          
            $('#TDetails').show();
            $('#FDetails').show();

        }else if(i>0 && j==0){
            $('#TDetails').hide();
            $('#FDetails').show();
        }else if(i==0 && j>0){
            $('#TDetails').show();
            $('#FDetails').hide();
        }else if(i>0 && j>0){
                $('input[name="submit"]').removeAttr("type").attr("type", "submit");

                $("#formId").submit();
            }


         });
    //  $(':input[type="submit"]').prop('disabled', true);
    //  $('#addServiceAssistance').click(function() {
    //     if(track != 0 ) {
    //         $('#addServiceAssistance1').click(function() {
    //             if(field != 0 ) {
    //        $(':input[type="submit"]').prop('disabled', false);
          

    //     }
    // });
    //     }
    //  });
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