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


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Add New Event</h1>
        <ol class="breadcrumb">
           
            <li><a href="#"> Events</a></li>
            <li class="active">Add New</li>
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
                            Add New Event
                        </h3>
                        <span class="pull-right clickable">
                                    Back
                                </span>
                    </div>
                    
                    <div class="panel-body">

                                    
                                        <div>
                                        <form action="{{route('event.store')}}" method="POST">
                                                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                                                                    <div class="row">
                                               
                                               <input type="hidden" name="org" value="{{Auth::user()->organization->id}}">

                                                   <div class="col-md-5">
                                                   <div class="form-group">
                                                      
                                                       <label class="control-label" for="firstName3">Select League<span style="color:red;"> <b> * </b></span>
                                                       </label>
                                                       <select id="league" name="league" class="form-control">
                                                <option disabled selected>Select League</option>                                                           @foreach($leagues as $league)
                                                           @if (old('league') == $league->id)
                                                <option value="{{ $league->id }}" selected>{{ $league->name }}</option>
                                            @else
                                                <option value="{{ $league->id }}">{{ $league->name }}</option>
                                                @endif
                                                           
                                                           @endforeach
                                                       </select>
                                                   </div>
                                                       </div>
                                                       <div class="col-md-2">
</div>
                                                       <div class="col-md-5">
                                                       <div class="form-group label-floating">
                                                      
                                                      <label class="control-label" for="firstName3">Select Event Organizer<span style="color:red;"> <b> * </b></span>
                                                      </label>
                           <select  class="form-control" name="organizer">
                           @foreach($eventorganizers as $eventorganizer)
                           @if(old('eventorganizer')==$eventorganizer->id)
                           <option value="{{$eventorganizer->id}}" selected>{{$eventorganizer->first_name}}</option>
                           @else
                           <option value="{{$eventorganizer->id}}">{{$eventorganizer->first_name}}</option>
                           @endif
                           @endforeach
                           </select>
</div>
                                                       </div>                                                    
                                                 
                                               </div>
</div>

                                                <div class="row">
                                               
                                                <input type="hidden" name="org" value="{{Auth::user()->organization->id}}">
                                                <input type="hidden" name="league" value="{{$league->id}}">

                                                    <div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                       
                                                        <label class="control-label" for="firstName3">Name<span style="color:red;"> <b> * </b></span>
                                                        </label>
                                                        <input type="text" class="form-control" name="name" value="{{$mainEvent->name}}" id="firstName3">
                                                    </div>
                                                        </div>
                                                        <div class="col-md-2">
</div>
                                                        <div class="col-md-5">
                                                        <div class="form-group label-floating">
                                                       
                                                       <label class="control-label" for="firstName3">Select Event Organizer<span style="color:red;"> <b> * </b></span>
                                                       </label>
                            <select  class="form-control" name="organizer">
                            @foreach($eventorganizers as $eventorganizer)
                           @if(old('eventorganizer')==$eventorganizer->id)
                           <option value="{{$eventorganizer->id}}" selected>{{$eventorganizer->first_name}}</option>
                           @else
                           <option value="{{$eventorganizer->id}}">{{$eventorganizer->first_name}}</option>
                           @endif
                           @endforeach
                           </select>
</div>
                                                        </div>                                                    
                                                  
                                                </div>
</div>
                                                <br>
                                                <div class="row">
                                                <div class="col-md-5">
                                                        <label class="control-label" for="firstName3">Select Age Groups<span style="color:red;"> <b> * </b></span>
 
                            <div class="form-group">
                                <select id="multiselect2" name="ages[]" multiple="multiple" class="form-control">
                                @foreach($agegroups as $agegroup)
                            <option value="{{$agegroup->id}}">{{$agegroup->name}}</option>
                            @endforeach
                                </select>
                            </div>      
                        </div>         
                        <div class="col-md-2">
</div>
               
<div class="col-md-5">
                                                        <label for="select22" class="control-label">
                                Select Gender<span style="color:red;"> <b> * </b></span>
                            </label>
                            <br>                                                                                   <div class="row">

                                                                                   @foreach ($genders as $gender)
                                                                                   <div class="col-md-6">

                                                        <input name="genders[]"  type="checkbox" value="{{ $gender->id }}" @if( is_array(old('genders')) && in_array($gender->id, old('genders'))) checked @endif>{{ $gender->name }}
</div>
<!-- <div class="col-md-6">

                                                        <input name="times[]" type="time">
</div> -->

                                                    @endforeach   
</div>                                                  
                                                </div>
                                                        </div>
                                                    <div class="row">
                                                    <div class="col-md-5">
                                                    <input type="hidden" name="season" value="1">

                                                    <div class="form-group">
                                                        <label class="control-label"
                                                               for="inputPassword4">Date <span style="color:red;"> <b> * </b></span></label>
                                                        <input type="date" name="date" class="form-control" id="inputPassword4">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-2">
</div>
        
<div class="col-md-5">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="lastName4">Event Rules <span style="color:red;"> <b> * </b></span>
                                                        </label>
                                                        <textarea id="w3review" name="rules" rows="4" cols="80">{{ old('rules') }}
                                                            </textarea>
                                                    </div>
                                                        </div>
                          
                                       
                                                        </div>


                                                <div class="form-group form-actions">
                                                    <div class="row">
                                                        <div class="col-md-10"></div>
                                                        <div class="col-md-2"><input style="float:right" type="submit" class="btn btn-raised btn-primary" value="Submit"></div>
                                                    </div>
                                                    </div>
                                                </div>
                                            </form>
                                            
                                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script  type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script  type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}" ></script>
    <script  type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>


    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"
            type="text/javascript"></script>

   
@stop
