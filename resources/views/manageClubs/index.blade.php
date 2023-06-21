@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Manage Clubs
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Manage Clubs</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Inquaries
            </a>
        </li>
        <li class="active">Manage Club</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  leftsize">group</i>
                    Club Requests
                    <div  style="float:right">
                        <a href="#" style="color:white" class="addRequest"><i class="material-icons  leftsize">add_circle_outline</i>
                        Add Request</a>
                       
                </button>
                        </div>
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table" width="100%" style="text-transform: capitalize;">
                        <thead class="thead-Dark">
                            <tr class="filters" style="text-align: center">
                                <th>Old Club</th>
                                <th>New Club</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="clubRequests">
                            @if($clubRequests->count()>0)
                            @foreach ($clubRequests as $clubRequest)
                            <tr>
                                <td>{{$clubRequest->oldClub->club_name}}</td>
                                <td>{{$clubRequest->newClub->club_name}}</td>
                                    @if($clubRequest->status==1)
                                    <td>Approved</td>
@elseif($clubRequest->status==2)
<td>Declined</td>           
@else
<td>Pending</td>
@endif                     
                            </tr>

                            @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<div class="modal fade" id="modal-17" role="dialog" aria-labelledby="modalLabelinfo">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title" id="modalLabelinfo">Change Club</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="col-md-6">Current Club:</div><div class="col-md-6"> {{ Auth::user()->club?Auth::user()->club->club_name:'' }}</div>
                        <br>
                        <br>
                        <div class="col-md-4">New Club:</div><div class="col-md-8"> <select  id="disabledSelect" name="newClub" class="form-control newClub">
                            <option disabled selected>Select Club </option>
                            @foreach ($clubs as $club)
                            <option value="{{ $club->id }}">{{ $club->club_name }}</option>
                            @endforeach
                        </select></div>
                    </div>
                    <div class="col-md-2">
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button class="btn  btn-info change" data-dismiss="modal">Change</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click','.addRequest',function(){
        $('#modal-17').modal('show');
    });
    $(document).on('click','.change',function(e){
        e.preventDefault();
        var newClub = $('.newClub').val();
        $.ajax({
            type: "POST",
            url: "/manage-club/store",
            data: {
                "_token": "{{ csrf_token() }}",
                "newClub": newClub,
            },

            dataType: "json",
            success: function(response) {
                $('#modal-17').modal('hide');
                Swal.fire({
                    title: "Club Request",
     text: "Club Request has been sent successfully!",
    type: "success"
}).then(function() {
    window.location.href=response.url;
});


                
               

            }
        });

    });
    </script>

@stop