@extends('admin/layouts/default')


{{-- Page title --}}
@section('title')
Payments
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
@section('content')
<section class="content-header">
    <h1>Payments</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Payments</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payments
                    </h3>

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


                            <div>

                                <ul style="background:none" class="nav nav-tabs ">
                                    <li class="active">
                                        <a class="panel-title" href="#tab1" data-toggle="tab">
                                            Past Payments</a>
                                    </li>
                                    <li>
                                        <a class="panel-title" href="#tab2" data-toggle="tab">
                                            To Do Payments</a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab1">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <table class="table table-striped text-uppercase table-bordered" id="table2">
                                            <thead class="thead-Dark">
                                                <tr>
                                                    <th style="text-align: center;">Organization Name</th>
                                                    <th style="text-align: center;">Player Name</th>
                                                    <th style="text-align: center;">Payment method</th>
                                                    <th style="text-align: center;">Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @if($children->count()>0)
                                                @foreach($children as $child)
                                                <?php
                                                $user = App\User::where('id', $child->id)->first();
                                                $eventslists = $user->registrations->where('status', 2);
                                                ?>
                                                @foreach($eventslists as $todoPayment)
                                                <tr>
                                                    <td>{{ $todoPayment->organization->name }}</td>
                                                    <td>{{ $user->first_name }}&nbsp;{{ $user->last_name }}</td>
                                                    @if($todoPayment->payment_method== 0)
                                                    <td>Vipps</td>
                                                        @endif
                                                        @if($todoPayment->payment_method== 1)
                                                    <td>Bank</td>
                                                        @endif
                                                        @if($todoPayment->payment_method== 2)
                                                    <td>SIL Member</td>
                                                        @endif
                                                    <td>{{ $iso }} {{ $todoPayment->totalfee }}</td>
                                                    <!-- <td><a href="/invoice/{{$todoPayment->id}}/{{ $todoPayment->organization->id }}/past"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Invoice"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td> -->
                                                </tr>
                                                @endforeach
                                                @endforeach
                                                @if (Auth::user()->registrations)
                                                @foreach($pastPayments as $todoPayment)
                                                <tr>
                                                    <td>{{ $todoPayment->organization->name }}</td>
                                                    <td>{{Auth::user()->first_name}}&nbsp;{{Auth::user()->last_name}}</td>
                                                    @if($todoPayment->payment_method== 0)
                                                    <td>Vipps</td>
                                                        @endif
                                                        @if($todoPayment->payment_method== 1)
                                                    <td>Bank</td>
                                                        @endif
                                                        @if($todoPayment->payment_method== 2)
                                                    <td>SIL Member</td>
                                                        @endif
                                                    <td>{{ $iso }} {{ $todoPayment->totalfee }}</td>
                                                    <!-- <td><a href="/invoice/{{$todoPayment->id}}/{{ $todoPayment->organization->id }}/past"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Invoice"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td> -->
                                                </tr>
                                                @endforeach
                                                @endif
                                                @else
                                                @foreach($pastPayments as $todoPayment)
                                                <tr>
                                                    <td>{{ $todoPayment->organization->name }}</td>
                                                    <td>{{$todoPayment->user->first_name}}&nbsp;{{$todoPayment->user->last_name}}</td>

                                                    <td>{{ $iso }} {{ $todoPayment->totalfee }}</td>
                                                    <!-- <td><a href="/invoice/{{$todoPayment->id}}/{{ $todoPayment->organization->id }}/past"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Invoice"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td> -->
                                                </tr>
                                                @endforeach
                                                @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                       


                                    </div>
                                    <div class="tab-pane" id="tab2" disabled="disabled">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <table class="table table-striped text-uppercase table-bordered" id="table2">
                                            <thead class="thead-Dark">
                                                <tr>
                                                    <th>Organization Name</th>
                                                    <th>Player Name</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($children->count()>0)
                                                @foreach($children as $child)
                                                <?php
                                                $user = App\User::where('id', $child->id)->first();
                                                $eventslists = $user->registrations->whereIn('status', [1,4]);
                                                ?>
                                                @foreach($eventslists as $todoPayment)
                                                <tr>
                                                    <td>{{ $todoPayment->organization->name }}</td>
                                                    <td>{{$todoPayment->user->first_name}}</td>
                                                    <td>{{ $iso }} {{ $todoPayment->totalfee }}</td>
                                                    <td>
                                                        @if($todoPayment->status==3||$todoPayment->status==4)
                                                        <button class="btn btn-warning">Pending</button>
                            @elseif($todoPayment->status==1)
                            <button class="btn btn-primary">Processing</button>
                           
                            @else
                            <button class="btn btn-success">Paid</button>
                            
                            @endif
                                                    </td>                                                    <td><a href="/invoice/{{$todoPayment->id}}/{{ $todoPayment->organization->id }}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Invoice"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td>
                                                </tr>
                                                @endforeach
                                                @endforeach
                                                @if (Auth::user()->registrations)
                                                @foreach (Auth::user()->registrations->where('status',4) as $todoPayment)
                                                <tr>
                                                    <td>{{ $todoPayment->organization->name }}</td>
                                                    <td>{{Auth::user()->first_name}}</td>
                                                    <td>{{ $iso }} {{ $todoPayment->totalfee }}</td>
                                                    <td>
                                                    @if($todoPayment->status==3||$todoPayment->status==4)
                                                        <button class="btn btn-warning">Pending</button>
                            @elseif($todoPayment->status==1)
                            <button class="btn btn-primary">Processing</button>
                           
                            @else
                            <button class="btn btn-success">Paid</button>
                            
                            @endif
                                                    </td>
                                                    <td><a href="/invoice/{{$todoPayment->id}}/{{ $todoPayment->organization->id }}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Invoice"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td>
                                                </tr>
                                                @endforeach

                                                @endif

                                                @else
                                                @foreach($todoPayments as $todoPayment)
                                                <tr>
                                                    <td>{{ $todoPayment->organization->name }}</td>
                                                    <td>{{$todoPayment->user->first_name}}</td>
                                                    <td>{{ $iso }} {{ $todoPayment->totalfee }}</td>
                                                    <td>
                                                    @if($todoPayment->status==3||$todoPayment->status==4)
                                                        <button class="btn btn-warning">Pending</button>
                            @elseif($todoPayment->status==1)
                            <button class="btn btn-primary">Processing</button>
                           
                            @else
                            <button class="btn btn-success">Paid</button>
                            
                            @endif
                                                    </td>
                                                    <td><a href="/invoice/{{$todoPayment->id}}/{{ $todoPayment->organization->id }}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Invoice"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td>
                                                </tr>
                                                @endforeach
                                                @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                        {{-- <a class="next" href="#tab1" data-toggle="tab">
                                            &laquo; Previous
                                        </a> --}}


                                    </div>




                                </div>
                            </div>
                        </div>
                    </div>
                    <!--main content end-->
                </div>
            </div>
        </div>
    </div>

    <!--row end-->
</section>
@stop

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('assets/js/pages/edituser.js') }}" type="text/javascript"></script> -->
@stop