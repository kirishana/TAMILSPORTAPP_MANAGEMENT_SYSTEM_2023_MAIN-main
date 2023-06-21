@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Events
    Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
    <style>
        @media (max-width:340px) {
            .button-group .button {
                padding: 0 10px !important;
            }
        }

    </style>
@stop



@section('content')
    <section class="content-header">
        <h1>Events</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href=""> Events</a></li>
            <li class="active">All Events</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">

                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="material-icons">spa</i>
                        Events

                    </h4>

                </div>
                <br />
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                       
                    <div class="col-md-6"></div>
                    <div class="col-md-4">
                <div class="text-center pdf-btn">

                    <a href="{{ route('pdf.participants') }}" class="btn btn-primary">Generate PDF</a>
                </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    
                    <div class="row">
                       
                        <div class="col-md-2"></div>
                        <div class="col-md-4">
                            <table class="table table-striped table-bordered events" id="">
                                <thead>
                                    <tr>

                                        <th>Participants</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                    @foreach ($event->registrations as $registration)
                                    @if($registration->is_approved==1)
                                    @if($registration->user->is_approved==1
                                        <tr>
                                            <input type="hidden" name="ageGroupGender" value="{{ $AgeGroupGender->id }}">
                                            <input type="hidden" name="event" value="{{ $event->id }}">
                                            <?php
                                    // $age = Carbon\Carbon::parse($registration->user->dob)->diff($event->league->to_date)->y;
                                    // echo $age;
                                    $mine=Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                                     $league1=Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                                     $age=$league1-$mine;
                                     $gen=$registration->user->gender=="male" ? 1:2;
                                    $exp = preg_split("/-/", $Agegroup->name);
                                    if (isset($exp[1])){
                                
                                        if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                            $user=$registration->user;
                                    ?>
                                            @if ($AgeGroupGender->gender_id == $gen)

                                                <td>{{ $registration->user->userId }}</td>

                                            @endif
                                            <?php

                                        }
                                    }
                                    
                                        
                                      elseif ($exp[0] == $age) {
                                        

                                        ?>
                                            <td>{{ $registration->user->userId }}</td>


                                            <?php }
                                        ?>
                                        @endif
                                        @endif
                                    @endforeach


                                    </tr>
                        </div>
                        </tbody>
                        </table>
                        <div class="col-md-4"></div>


                    </div>
                </div>
            </div>

        </div>


    </section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}">
    </script>
    <script language="javascript" type="text/javascript"
        src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}">
    </script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}">
    </script>
@stop
