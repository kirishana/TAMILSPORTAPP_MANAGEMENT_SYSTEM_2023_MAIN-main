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
    <h1>Club Requests</h1>
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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  leftsize">group</i>
                    Club Requests
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-uppercase" id="table" width="100%">
                        <thead class="thead-Dark">
                            <tr class="filters" >
                                <th style="text-align: center">User Name</th>
                                <th style="text-align: center">Old Club</th>
                                <th style="text-align: center">New Club</th>
                                <th style="text-align: center">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="clubRequests">
                            @if($clubRequests->count()>0)
                            @foreach ($clubRequests as $clubRequest)
                            @if($clubRequest->status==0  && $clubRequest->old_club_id==Auth::user()->club_id)
                            <tr>
                                <td>{{ $clubRequest->user->first_name }} - {{ $clubRequest->user->last_name }}</td>
                                <td>{{$clubRequest->oldClub->club_name}}</td>
                                <td>{{$clubRequest->newClub->club_name}}</td>
                                @if($clubRequest->status==0)
                                <td>
                                    <button  class="btn btn-success approve" data-id="{{$clubRequest->old_club_id}}"  value="{{ $clubRequest->id }}"  style=" margin:0; padding: 2px 6px;text-transform:none;">Approve</button>
                                    <button  class="btn btn-danger decline" data-id="{{$clubRequest->old_club_id}}"  value="{{ $clubRequest->id }}" style=" margin:0; padding: 2px 6px;text-transform:none;" >Decline</button>

                                </td>
                                @elseif($clubRequest->status==2)
                                <td>
                                    <button  class="btn btn-success approve" data-id="{{$clubRequest->old_club_id}}" value="{{ $clubRequest->id }}" style=" margin:0; padding: 2px 6px;text-transform:none;" >Approve</button>

                                </td>
                                @elseif($clubRequest->status==1)
                                <td>
                                <button  class="btn btn-danger decline" data-id="{{$clubRequest->old_club_id}}"  value="{{ $clubRequest->id }}" style=" margin:0; padding: 2px 6px;text-transform:none;" >Decline</button>
                                </td>
                                @endif
                                
                            </tr>
                            @endif
                            @if($clubRequest->status==3 && $clubRequest->new_club_id==Auth::user()->club_id)
                            <tr>
                                <td>{{ $clubRequest->user->first_name }} - {{ $clubRequest->user->last_name }}</td>
                                <td>{{$clubRequest->oldClub->club_name}}</td>
                                <td>{{$clubRequest->newClub->club_name}}</td>
                                @if($clubRequest->status==3)
                                <td>
                                    <button  class="btn btn-success approve" data-id="{{$clubRequest->new_club_id}}"  value="{{ $clubRequest->id }}"  style=" margin:0; padding: 2px 6px;text-transform:none;">Approve</button>
                                    <button  class="btn btn-danger decline" data-id="{{$clubRequest->new_club_id}}"  value="{{ $clubRequest->id }}" style=" margin:0; padding: 2px 6px;text-transform:none;" >Decline</button>

                                </td>
                                @elseif($clubRequest->status==1)
                                <td>
                                    <button  class="btn btn-danger decline" data-id="{{$clubRequest->new_club_id}}" value="{{ $clubRequest->id }}"  style=" margin:0; padding: 2px 6px;text-transform:none;" >Decline</button>

                                </td>
                                @elseif($clubRequest->status==2)
                                <td>
                                    Declined

                                </td>
                                @elseif($clubRequest->status==0)
                                <td>
                                    <button  class="btn btn-warning pending" data-id="{{$clubRequest->new_club_id}}" value="{{ $clubRequest->id }}" style=" margin:0; padding: 2px 6px;text-transform:none;" >Pending</button>

                                </td>
                                @endif
                                
                            </tr>
                            @endif
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



<script>
    
    $(document).on('click','.approve',function(){
        var Request =   $(this).val();
        var id=$(this).attr('data-id');
        
        $.ajax({
            type: "POST",
            url: "/club-request/approve",
            data: {
                "_token": "{{ csrf_token() }}",
                "Request": Request,
                "id": id,
            },

            dataType: "json",
            success: function(response) {
                window.location.href=response.url;
               

            }
        });

    });

    $(document).on('click','.decline',function(){
        var Request =   $(this).val();
        var id=$(this).attr('data-id');
        $.ajax({
            type: "POST",
            url: "/club-request/decline",
            data: {
                "_token": "{{ csrf_token() }}",
                "Request": Request,
                "id": id,
            },

            dataType: "json",
            success: function(response) {
                window.location.href=response.url;
               

            }
        });

    });
    </script>

@stop