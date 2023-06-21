@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Edit Event
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

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Edit {{ $event->mainEvent->name }}</h1>
        <ol class="breadcrumb">
           
            <li><a href="#"> Leagues</a></li>
            <li><a href="#"> All Leagues</a></li>

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
                            Edit {{ $event->mainEvent->name }}    
                            
                            <div  style="float:right">
                                <a href="/all" style="color:white">
                                Back</a>
                                </div>
                         </h3>
                         
                    </div>
                    
                    <div class="panel-body">

                                    
                                        <div>
                                        <form action="/event/update/date/{{ $event->id }}" method="POST">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                            <input type="hidden" name="_method" value="PUT">
                                                 <div class="row">
                                               
                                               <input type="hidden" name="org" value="{{Auth::user()->organization_id?Auth::user()->organization->id:$orgId}}">


                                               <div class="row">
                                                    <div class="col-md-5 form-group">
                                                        <div class="form-group label-floating">
                                                      
                                                            <label class="control-label" for="firstName3">League Name<span style="color:red;"> <b> * </b></span>
                                                            </label>
                                                               <input type="text" class="form-control"  value="{{ $event->league->name }}" disabled>
                                                               <input type="hidden" id="" class="form-control" name="league" value="{{ $event->league->id }}">
                                                               <input type="hidden" id="league_to" class="form-control" name="" value="{{ $event->league->to_date }}">
                                                               <input type="hidden" id="league_from" class="form-control" name="" value="{{ $event->league->from_date }}">

                                                           </div>
                                                    </div>

                                                    <div class="col-md-2"></div>

                                                    <div class="col-md-5 form-group">
                                                        <div class="form-group label-floating">
                                                       
                                                            <label class="control-label" for="firstName3">Event Name<span style="color:red;"> <b> * </b></span>
                                                            </label>
                                                            <input type="text" class="form-control"  value="{{$event->mainEvent->name}}" id="firstName3" disabled>
                                                            <input type="hidden" class="form-control" name="name" value="{{$event->mainEvent->id}}" id="firstName3">

                                                        </div>
                                                    </div>
                                               </div>

                                               <input type="hidden" name="org" value="{{Auth::user()->organization_id?Auth::user()->organization->id:$orgId}}">

                                               <div class="row">
                                                    <div class="col-md-5 form-group">
                                                        <div class="form-group label-floating">
                                                       
                                                            <label class="control-label" for="firstName3">Select Event Organizer<span style="color:red;"> <b> * </b></span>
                                                            </label>
                                 <select  class="form-control" name="organizer" disabled>
                                 @foreach($eventorganizers as $eventorganizer)
                                                                  @if($eventorganizer->hasRole(4))

                                 <option value="{{$eventorganizer->id}}"{{ $eventorganizer->id==$event->user->id?'selected':'' }}  >{{ $eventorganizer->first_name}}</option>
                                 @endif
                                 @endforeach
                                 </select>
                                 <input type="hidden" name="organizer" value="{{$event->user->id}}">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-5 form-group">

                                                        <label class="control-label" for="inputPassword4">Date <span style="color:red;"> <b> * </b></span><span style="display:;color:red;"  id="Msg" > -</span> </label>
                                                        <input type="date" name="date" value="{{  $event->date}}"class="form-control" min="" max="" id="eventDate">
                                                    </div>
                                               </div>

                                               
                                               <div class="row">
                                                    <div class="col-md-5 form-group">
                                                        <label class="control-label" for="firstName3">Select Age Groups<span style="color:red;"> <b> * </b></span>
                                                        <div class="form-group" style="width:1000px;">
                                                            <select id="multiselect2" name="ages[]" multiple="multiple" class="form-control" disabled>
                                                                @foreach($agegroups as $agegroup)
                                                            <option value="{{$agegroup->id}}"  @foreach($event->agegroups as $age){{$age->pivot->age_group_id == $agegroup->id ? 'selected': ''}}   @endforeach >{{$agegroup->name}}</option>
                                                            @endforeach
                                                                </select>
                                                        </div>
                                            </div>

                                                    <div class="col-md-2"></div>

                                                    <div class="col-md-5 form-group">
                                                        <label for="select22" class="control-label">Select Gender<span style="color:red;"> <b> * </b></span></label>
                                                        <br>                           
                                                        
                                                            @foreach ($genders as $gender)
                                                                <div class="col-md-6">
                                                                    <input  disabled name="genders[]"  type="checkbox" value="{{ $gender->id }}" @foreach($agegenders  as $gen){{$gen->gender_id == $gender->id ? 'checked': ''}}   @endforeach>{{ $gender->name }}
                                                                </div>
                                                            @endforeach   
                                                        
                                                    </div>
                                               </div>

                                               <div class="row">
                                                    <div class="col-md-5">
                                                        <input type="hidden" name="season" value="1">
                                                        <div class="form-group label-floating">
                                                            <label class="control-label" for="lastName4">Event Rules <span style="color:red;"> <b> * </b></span></label>
                                                            <textarea id="w3review" name="rules" rows="4" cols="80" value="">{{ $event->rules }}</textarea>
                                                        </div>
                                                        <div class="form-group"></div>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-10"></div>
                                                        <div class="col-md-2"><input style="float:right" type="submit" class="btn btn-raised btn-primary" value="Submit"></div>
                                                    </div>
                                                </div>

                                        </div>
                                        </form>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 
<script type="text/javascript">
    jQuery(document).ready(function($){
        var leagueFrom=$('#league_from').val();
        var leagueTo=$('#league_to').val();
        $('#Msg').html(leagueFrom+'-'+leagueTo);
        $('#eventDate').prop('min',leagueFrom);
        $('#eventDate').prop('max',leagueTo);
    });
</script>