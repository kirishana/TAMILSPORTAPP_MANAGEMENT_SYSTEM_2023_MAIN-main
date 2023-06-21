@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Add Event
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />





@stop

<style>
    .panel-heading a:hover{
        display:block;
        color:white;
    }
    </style>
{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.events') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Events</a></li>
        <li class="active">Add New Events</li>
    </ol>
    <!-- <ol class="breadcrumb">

        <li><a href="#"> Events</a></li>
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
                @if(session()->has('success'))
                    <div class="alert alert-success" id="success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons ">event</i>
                        {{ __('event.add_new_event') }}
                        <a style="float:right;display:block" href="/events" style="color:white"><i class="material-icons  leftsize">keyboard_backspace
                        </i>
                            {{ __('staffs.back') }}</a>
                    </h3>
                   
                </div>

                <div class="panel-body">


                    <div>
                        <form action="{{route('event.store')}}" method="POST">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            <div class="row">

                                <input type="hidden" name="org" value="{{Auth::user()->organization_id?Auth::user()->organization_id:$id}}">


                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label class="control-label" for="firstName3"> {{ __('event.select_league') }}<span style="color:red;"> <b> * </b></span>
                                        </label>
                                        <select id="league2" class="form-control" name="league" required>
                                            <option  disabled selected>Select League</option>
                                            @foreach($leagues as $league)
                                            @if (old('league') == $league->id)
                                                <option value="{{ $league->id }}" selected>{{ $league->name }}</option>
                                            @else
                                            <option value="{{$league->id}}">
                                                {{$league->name}}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                         @if ($errors->has('league'))
                    <span class="help-block">{{ $errors->first('league') }}.</span>
                @endif
                                    </div>

                                    <div class="col-md-2"></div>

                                    <div class="col-md-5 form-group">
                                        <!-- <label class="control-label" for="firstName3">Select Event<span style="color:red;"> <b> * </b></span>

                                        </label>
                                        
                                        <select class="form-control " name="event" id="event">
                                        
                                            <option disabled selected>Select Event </option>
                                            

                                        </select>
                                        
                                        <button class="btn btn-primary add" style="padding: 2px 6px" data-toggle="tooltip" data-placement="bottom" title="Add New Event" value=""><i class="material-icons text-light ">edit</i></button> -->
                                        <div class="form-group">
                                            <label for="select26" class="control-label">
                                                 {{ __('event.select_event') }} <span style="color:red;"> <b> * </b></span>
                                            </label>
                                            <div class="input-group select2-bootstrap-append">

                                                <select name="event" id="select24" class="form-control" required>
                                                    <option disabled selected>Select Event </option>
                                                    @foreach($events as $event)
                                                    <option value="{{ $event->id }}" @if(old('event')==$event->id)selected @endif>{{ $event->name }}</option>
                                                    @endforeach
                                                </select>
                                                 @if ($errors->has('event'))
                    <span class="help-block">{{ $errors->first('event') }}.</span>
                @endif
                                                <div class="input-group-btn">
                                                    <button class="btn btn-primary add"  style="padding: 2px 4px"  data-toggle="tooltip" data-placement="bottom" title="Add New Event" value="" type="button" data-select2-open="multi-append">
                                                        <span><i class="material-icons">edit</i></span>
                                                    </button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ---------------------->
                                    <!-- <div class="form-group">
                        <label for="select26" class="control-label">
                        Select Event <span style="color:red;"> <b> * </b></span>
                        </label>
                        <div class="input-group select2-bootstrap-append">
                        <select class="form-control " name="event" id="event">
                                        <option disabled selected>Select Event </option>
                                    </select>
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="button" data-select2-open="multi-append">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </div>
                        </div>
                    </div> -->
                                    <!-- ------------------------ -->
                                </div>
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label class="control-label" for="firstName3"> {{ __('event.select_event_org') }}<span style="color:red;"> <b> * </b></span>
                                        </label>
                                        @if(auth()->user()->hasRole(4))
                                            <select class="form-control" name="organizer">
                                            <option value="{{auth()->user()->id}}">{{auth()->user()->first_name}}</option>
                                        </select>
                                        @else
                                        <select class="form-control" name="organizer">
                                            @foreach($eventorganizers as $eventorganizer)                                            
                                            <option value="{{$eventorganizer->id}}">{{$eventorganizer->first_name}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                         @if ($errors->has('organizer'))
                    <span class="help-block">{{ $errors->first('organizer') }}.</span>
                @endif
                                    </div>

                                    <div class="col-md-2"></div>

                                    <div class="col-md-5 form-group">
                                        <label class="control-label" for="inputPassword4"> {{ __('event.date') }} <span style="color:red;"> <b> * </b>
                                        <span style="display: none;"  id="suvarna1" > -</span> 
                                    </label>
                                     <span style="display:none" id="fromDate"></span>
                                     <span style="display:none" id="toDate"></span>

                                        <input type="date" name="date" class="form-control date"  id="eventDate" pattern="/^[0-9]{2}[/][0-9]{2}/[0-9]{4}"  min="" max="" value="{!! old('date') !!}">
                                        <span style="color:red;display:none;" class="leagueDate">Date is not belonging to the league duration</span> 
                                     @if ($errors->has('date'))
                    <span class="help-block">{{ $errors->first('date') }}.</span>
                @endif
                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label class="control-label" for="firstName3"> {{ __('event.select_ages') }}<span style="color:red;"> <b> * </b></span>
                                            <div class="form-group" style="width:1000px;">
                                                <select id="multiselect2" name="ages[]" multiple="multiple" class="form-control" >
                                                    @foreach($agegroups as $agegroup)
                                                    <option value="{{$agegroup->id}}" @if( is_array(old('ages')) && in_array($agegroup->id, old('ages'))) checked @endif >{{$agegroup->name}}</option>
                                                    @endforeach
                                                </select>
                                                 @if ($errors->has('ages'))
                    <span class="help-block">{{ $errors->first('ages') }}.</span>
                @endif
                                            </div>
                                    </div>

                                    <div class="col-md-2"></div>

                                    <div class="col-md-5 form-group">
                                        <label for="select22" class="control-label"> {{ __('event.select_gender') }}<span style="color:red;"> <b> * </b></span></label>
                                        <br>
<div class="form-group">
                                        @foreach ($genders as $gender)
                                       
                                            <input name="genders[]" type="checkbox" value="{{ $gender->id }}"  @if( is_array(old('genders')) && in_array($gender->id, old('genders'))) checked @endif> &nbsp; &nbsp; {{ $gender->name }}
                                                        
                                        
                                        @endforeach
                                        @if ($errors->has('genders'))
                    <span class="help-block">{{ $errors->first('genders') }}.</span>
                @endif
</div>
                                    </div>
                    
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="season" value="1">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="lastName4"> {{ __('event.rules') }} </label>
                                            <textarea id="w3review" name="rules" rows="4" cols="80" >{{ old('rules') }}</textarea>
                                        </div>

                                    </div>

                                    {{-- <div class="col-md-5" id="hide" style="display:none;">
                                        <div class="form-group label-floating">
                                            <label class="control-label" for="lastName4">No Of Participants <span style="color:red;"> <b> * </b></span></label>
                                            <input type="number" class="form-control" name="particpants">
                                        </div>
                                    </div> --}}
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-10" id="trackEvent" style="display:none;">
                                            <label class="control-label" for="firstName3">Select Track<span style="color:red;"> <b> * </b></span>

                                            </label>
                                            <select class="form-control" name="track" id="track">
                                                <option disabled selected>Select Track</option>

                                            </select>
                                        </div>
                                        <div class="col-md-2 pull-right"><input style="float:right" type="submit" class="btn btn-raised btn-primary" value=" {{ __('dashboard.submit') }}"></div>
                                    </div>
                                </div>

                            </div>
                        </form>
</section>

<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Add MainEvent</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <select id="cat" name="eventcat" class="form-control">
                        <option disabled selected>Select Category*</option>
                        @foreach ($eventCategories as $country)
                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="age" id="age" placeholder="Event" class="form-control form-control-sm validate ml-0">
                    <input type="text" name="price" id="price" placeholder="Price" class="form-control form-control-sm validate ml-0">
                    <input type="text" name="discount" id="discount" placeholder="Discount(%)" class="form-control form-control-sm validate ml-0">
                    <input type="hidden" name="org_id" id="org" class="form-control org" value="{{Auth::user()->organization_id?Auth::user()->organization_id:$id}}">

                </div>
                <div class="md-form ml-0 mr-0">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success submit">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>
<!--Modal: Login with Avatar Form-->
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script>
$(document).ready(function(){
setTimeout(function () {
        $("#success").hide();
    }, 1000);
})

    $(document).on('keyup','.date',function(){
    var date=$(this).val();
    var leagueFromDate=$('#fromDate').html();
    var leagueToDate=$('#toDate').html();
   
if(!(date>=leagueFromDate && date<=leagueToDate)){
    $('.leagueDate').show();

}else{
    $('.leagueDate').hide();
}

    });
    $(document).on('click', '.add', function(e) {
        e.preventDefault();
        $('#myModal2').modal('show');
    });
  
    $(document).on('click', '.submit', function(e) {
        e.preventDefault();
        var name = $('#age').val();
        // alert(name);
        var cat = $('#cat').val();
        var price = $('#price').val();
        var discount = $('#discount').val();
        var org = $('#org').val();
        $.ajax({
            type: "POST",
            url: "/main-event/create",
            data: {
                "_token": "{{ csrf_token() }}",
                "name": name,
                "cat": cat,
                "price": price,
                "discount": discount,
                "org": org
            },

            dataType: "json",
            success: function(response) {
                window.location.href = response.url;

            }
        });
    });
    $("#league2").on('change', function() {
        var league = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/leagues/' + league,
            data: {
                "_token": "{{ csrf_token() }}",
                "league": league
            },
            success: function(response) {
                $("#suvarna").empty();
                $("#suvarna1").empty();
                $("#fromDate").empty();
                $("#toDate").empty();
            console.log(response)
                // var x = document.getElementById("suvarna");
                // if (x.style.display === "none") {
                //     x.style.display = "block";
                // } else {
                //     x.style.display = "none";web
                // }
                // var y = document.getElementById("suvarna1");
                // if (y.style.display === "none") {
                //     y.style.display = "block";
                // } else {
                //     y.style.display = "none";
                // }
                $("#suvarna1").show();

                $('#suvarna1').append(response.date);
                $('#fromDate').append(response.leagueNameEnd);
                $('#toDate').append(response.leagueName);
                $('#eventDate').prop('max',response.leagueName);
                $('#eventDate').prop('min',response.leagueNameEnd);
                if(response.leagueNameEnd == response.leagueName){
                        $('#eventDate').val(response.leagueNameEnd);
                }
                else{
                    $('#eventDate').val();
                }

            }
        });
    });
        var league=$("#league2 option:selected").val();
        $.ajax({
            type: 'POST',
            url: '/leagues/' + league,
            data: {
                "_token": "{{ csrf_token() }}",
                "league": league
            },
            success: function(response) {
                $("#suvarna").empty();
                $("#suvarna1").empty();
                $('#eventDate').prop('max',response.leagueName);
                $('#eventDate').prop('min',response.leagueNameEnd);
                $.each(response.mainEvents, function(key, item) {
                    $('.event').append("<option value='" + item.id + "'>" + item.name + "</option>");

                });
                // var x = document.getElementById("suvarna");
                // if (x.style.display === "none") {
                //     x.style.display = "block";
                // } else {
                //     x.style.display = "none";web
                // }
                // var y = document.getElementById("suvarna1");
                // if (y.style.display === "none") {
                //     y.style.display = "block";
                // } else {
                //     y.style.display = "none";
                // }
                $("#suvarna1").show();

                $('#suvarna1').append(response.date);

            }
        });
    $(".event").on('change', function() {
        var event = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/events/' + event,
            data: {
                "_token": "{{ csrf_token() }}",
                "event": event
            },
            success: function(response) {
                if (response.event.event_category_id == 3) {
                    $("#hide").show();


                } else {
                    $("#hide").hide();
                }
            }
        });




    });
</script>
<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>


<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>


@stop