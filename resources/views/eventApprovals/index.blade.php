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
<style>
    .example::-webkit-scrollbar {
            display: none;
        }

        .example {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
</style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Individual Event Approvals</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Individual Event Approvals</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Individual Event Approvals
                    </h3>

                </div>
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif


                            <div>

                             
                                <div class="tab-content example" style="overflow-x:scroll">
                                
                                        <table class="table table-striped table-bordered" id="table2" style="text-transform: capitalize;">
                                            <thead class="thead-Dark">
                                                <tr>
                                                    <th style="text-align: center;">League</th>
                                                    <th style="text-align: center;">Organization Name</th>
                                                    <th style="text-align: center;">Player</th>
                                                    <th style="text-align: center;">Age</th>
                                                    <th style="text-align: center;">Gender</th>
                                                    <th style="text-align: center;">Amount</th>
                                                    <th style="text-align: center;">Registered Events</th>
                                                    <th style="text-align: center;">Payment Status</th>
                                                    <th style="text-align: center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($approvals as $approval)
                                                @if($approval->user->club_id==Auth::user()->club_id)
                                              
                                                <tr>
                                                    <td>{{ $approval->league->name }}</td>
                                                    <td>
                                                        {{ $approval->organization->name }}
                                                    </td>
                                                    <td>{{$approval->user->first_name}} {{$approval->user->last_name}}</td>
                                                    <td><?php
                
                                                        $mine = Carbon\Carbon::createFromFormat('Y-m-d', $approval->user->dob)->format('Y');
                                                                                                            $today = Carbon\Carbon::now()->format('Y');
                                                                                                            $age = $today - $mine; ?>{{ $age }}</td>                                                    <td>{{$approval->user->gender}}</td>

                                                    <td>
                                                      {{  Auth::user()->country->currency->currency_iso_code }} {{ $approval->totalfee }}
                                                    </td>
                                            
                                                   <td>
                                                         @foreach($approval->events as $event)
                                                         
                                                            {{ $event->mainEvent->name }}
                                                            <br>
                                                                                                                
                                                         @endforeach
                                                   </td>
                                                   <td>
                                                    @if($approval->status==3||$approval->status==4)
                                                    <span class="badge bg-warning" >Pending</span>
                        @elseif($approval->status==1)
                        <span class="badge bg-info" >Processing</span>

                        @else
                        <span class="badge bg-success" >Paid</span>
                        
                        @endif
                                                    </td>
                                                   <td>
                                                   @if($approval->is_approved==2)
                                                   <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{$approval->id}}" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                                                   <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{$approval->id}}" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                                                   
                                                  
                                               
                                                @else  
                                                @if($approval->status==3||$approval->status==4)
                                              <a href="/info/single-events/{{$approval->id}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Invoice"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td>
                                                 @endif
                                                   </td>
                                                   @endif
                                                   @endif
                                                    @endforeach

                                                </tr>
                                            </tbody>
                                        </table>
                                   
                            




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
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"> Decline</h4>
            </div>
            <input name="_method" type="hidden" value="PUT">

            <div class="modal-body">
                <form action="">
                <label for="Decline">Please enter reason for decline</label></br>
            <input type="text" value="" name="Decline" id="resonDecline" style="width:100%;padding: 7px 20px;margin-top:27px;display: inline-block;
        border: 1px solid #ccc;border-radius: 4px; box-sizing: border-box;" />
        <input type="hidden" id="id" value="">
                </form>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-danger DeclineYes" value='Yes' />
            </div>
        </div>
    </div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- <script src="{{ asset('assets/js/pages/edituser.js') }}" type="text/javascript"></script> -->
<script>

//     //approve
    $(document).on('click', '.approve', function() {

        var id = $(this).val();

        $.ajax({
            type: 'POST',
            url: "/event/approve/" + id,
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id
            },
            success: function(response) {
                Swal.fire({
                    title: 'Approved',
                    text: 'Approved Successfully!',
                });
                window.location = response.url;
            },
            error: function(response, status, error) {
                if (response.status === 422) {

                };
            },
        });

    });

    $(document).on('click', '.decline', function() {
        var id = $(this).val();
        $('#id').val(id);
        $("#resonDecline").val('');
        $('#deleteModal').modal('show');

  
});

$(document).on('click', '.DeclineYes', function() {
        var remark = $("#resonDecline").val();
        if (remark.trim().length != 0) {
            var id=  $('#id').val();
            $.ajax({
                type: 'POST',
                url: "/event/decline/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Declined',
                        text: 'Declined Successfully!',
                    });
                    window.location = response.url;
                },
                error: function(response, status, error) {
                    if (response.status === 422) {

                    };
                },
            });
        } else {
            $('#deleteModal').modal('hide');

            Swal.fire({
                title: 'Alert',
                text: 'Please Enter the Reason',
            });
        }
    });
    $(document).on('click','.invoice',function(){
        var transId=$(this).attr('data-transId');
        var league=$(this).val();
            $.ajax({
            type: "GET",
            data: {
                "transId": transId,
                "league":league,
            },
            url: "/invoice/future",

            success: function(response) {
                window.location.href = response.url;
            }
        });  
        
    });
    </script>
@stop