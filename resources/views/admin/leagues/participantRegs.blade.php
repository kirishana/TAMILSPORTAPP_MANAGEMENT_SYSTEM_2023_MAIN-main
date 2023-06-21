@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Champions
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Participants</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/leagues">
                <i class="material-icons breadmaterial">home</i>
                Leagues
            </a>
        </li>
        <li class="active">Participants</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Participants
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
               
                <table class="table table-striped table-bordered" id="showall">
                    <thead>
                        <tr>
                            <th>Participant Name</th>
                            <th>Events</th>
                            <th>Actions</th>

                        </tr>
                    </thead>

                    @foreach ($league->registrations as $registration)
                   @if($registration->user->is_approved==1)
                   @if($registration->events->count()>0)
                    <tr>
                        <td>{{$registration->user->first_name}} {{$registration->user->last_name}} [{{$registration->user->userId}}]</td>
                      
                       
                        <td> @foreach ($registration->events as $eventName )
                        {{$eventName->mainEvent->name}}
                        <br>
                                                @endforeach

                        </td>
                        <td>
                                                 <a href="/event/admin/{{Crypt::encrypt($registration->id)}}/edit">
                                                                            <button type="button" class="btn btn-primary"
                                                                                id="btn15">Edit</button></a></td>
                      
                    </tr>
                    @endif
                    @endif
                                            @endforeach

                    <tbody>

                        <!-- second tab -->


            </div>
        </div>

    </div>

</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
{{-- <script src="https:code.jquery.com/jquery-3.5.1.js"></script>  --}}

<script src="https:cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https:cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https:cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https:cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>

<script>
 
    // alert(sornam);
</script>




@stop