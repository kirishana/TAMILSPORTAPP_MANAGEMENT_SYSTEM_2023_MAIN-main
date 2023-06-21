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
    <h1>Champion Lists</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="/leagues"> Leagues</a></li>
        <li class="active">Champion Lists</li>
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
                <div class="col-md-1 pull-right" style="margin-top:15px;">

                    <a href="/participnats/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" />
                    </a>
                </div>
                <table class="table table-striped table-bordered" id="showall">
                    <thead>
                        <tr>
                            <th>Age Groups</th>
                            <th>Participant No</th>
                            <th>First Name</th>
                            <th>Last Name</th>

                            <th>Events</th>

                        </tr>
                    </thead>

                    @foreach ($registrations as $registration)
                    <?php
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $league->to_date)->format('Y');
                    $age = $league1 - $mine;
                    $events = array();
                    $regs = array();
                    ?>

                    <tr>
                        <td>{{$age}} {{$registration->user->gender}}</td>
                        <td>{{$registration->user->userId}}</td>
                        <td>{{$registration->user->first_name}}</td>
                        <td>{{$registration->user->last_name}}</td>
                        @foreach ($registration->events as $eventName )
                        <td>{{$eventName->mainEvent->name}}</td>
                        @endforeach
                        @endforeach
                        <?php

                        // var_dump($regs);
                        ?>
                    </tr>
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
    var table = document.getElementById("clubs");
    var values = [];
    for (var r = 0, n = table.rows.length; r < n; r++) {
        var points = table.rows[r].cells[1].innerHTML;
        values.push(points);
    }
    var sornam = Math.max(...values);
    for (var r = 0, n = table.rows.length; r < n; r++) {
        var point = table.rows[r].cells[1].innerHTML;
        if (sornam == point) {
            //    alert(table.rows[r].cells[0].innerHTML)
            $champion = document.getElementById('champion');
            $champion.innerHTML = table.rows[r].cells[0].innerHTML;

        }
    }
    // alert(sornam);
</script>




@stop