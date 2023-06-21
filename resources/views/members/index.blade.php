@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Users List
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
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Members</a></li>
        <li class="active">Member Lists</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  leftsize">group</i>
                    Member Lists
                    <div  style="float:right">
                        <a href="/members/create" style="color:white"><i class="material-icons  leftsize">add_circle_outline</i>
                        Add New</a>
                        </div>
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-uppercase" id="table" width="100%">
                        <thead class="thead-Dark">
                            <tr class="filters" style="text-align: center">
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Registered Date</th>
                                @if(Auth::user()->organization)
                                @if(Auth::user()->organization->orgsetting)
                                @if(Auth::user()->organization->orgsetting->active==1) 
                                <th>Sil Member</th>
                                @endif
                                @endif
                                @endif
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            @if($user->is_approved==1)

                            <tr>
                                <td>{{$user->first_name}}</td>
                                <td>{{$user->last_name}}</td>
                                <td>@php echo Carbon\Carbon::parse($user->dob)->format('d.m.Y'); @endphp</td>
                                <td>@php echo Carbon\Carbon::parse($user->created_at)->format('d.m.Y'); @endphp</td>
                                @if(Auth::user()->organization)
                                @if(Auth::user()->organization->orgsetting)
                                @if(Auth::user()->organization->orgsetting->active==1) 
                                <td>{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                                @endif
                                @endif
                                @endif
                                <td>
                                    <a href="/events/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Events"><img style="margin-bottom:5px" src="{{ asset('assets/images/icons/event-white.png') }}"></button></a>
                                    <a href="/members/edit/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Events"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                                </td>

                            </tr>
@endif
                            @endforeach

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



<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>

@stop