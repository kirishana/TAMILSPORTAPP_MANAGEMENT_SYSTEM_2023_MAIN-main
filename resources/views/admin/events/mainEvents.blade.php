@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Add Event
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
    <!--end of page level css-->
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
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    
                    <div class="panel-body">
                                        <div class="row">

                                                <div class="col-md-12">
                                                    @if($league->sports_category_id==1)
                                                    @foreach($mainEvents as $mainEvent)
                                                    <div class="col-md-4">
                                                    <div class="form-group label-floating">
                                                      
                                                    <a href="/league/{{$league->id}}/main-event/{{$mainEvent->id}}" class="button button-border button-success button-pill">{{$mainEvent->name}}</a>
                                                    <input type="hidden" name="league" value="{{$league->id}}">
                                                </div>
                                                        </div>
                                                        @endforeach
                                                       
                                                </div>
                                                @else
                                                @endif
                                               
                                            
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

    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/adduser.js') }}"></script>
@stop
