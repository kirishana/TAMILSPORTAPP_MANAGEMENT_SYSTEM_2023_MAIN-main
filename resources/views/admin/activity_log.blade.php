@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Activity Log
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
        <h1>Activity Log</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li class="active">Activity Log</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="material-icons ">visibility</i>
                        Activity Log
                    </h4>
                </div>
                <br />
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table text-uppercase table-bordered " id="table">
                            <thead>
                            <tr class="filters">
                                <th>UserID</th>
                                <th>User Name</th>
                                <th>Description</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>

    <script>
        $(function() {
            var table = $('#table').DataTable({
                "order": [[3, "desc"]],
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.activity_log.data') !!}',
                columns: [
                    { data: 'causer_id', name: 'causer_id' },
                    { data: 'log_name', name: 'log_name' },
                    { data: 'description', name: 'description' },
                    { data: 'created_at', name:'created_at'}
                ]
            });
        });
    </script>

@stop
