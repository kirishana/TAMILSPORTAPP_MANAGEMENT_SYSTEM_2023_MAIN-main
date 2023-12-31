@extends('admin/layouts/default')

{{-- Web site Title --}}
@section('title')
@lang('groups/title.management')
@parent
@stop

{{-- Content --}}
@section('content')
<section class="content-header">
    <h1>@lang('groups/title.management')</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="material-icons breadmaterial">home</i>
                @lang('general.dashboard')
            </a>
        </li>
        <li><a href="#"> @lang('groups/title.groups')</a></li>
        <li class="active">@lang('groups/title.groups_list')</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"> <i class="material-icons">group</i>
                        @lang('groups')
                    </h4>
                    <div class="pull-right">
                    <a href="{{ route('admin.groups.create') }}" class="btn btn-sm btn-success"><i class="material-icons">add</i> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    @if ($roles->count() >= 1)
                        <div class="table-responsive">
                        <table class="table table-bordered text-uppercase">
                            <thead>
                                <tr>
                                    <th>@lang('groups/table.id')</th>
                                    <th>@lang('groups/table.name')</th>
                                    <th>@lang('groups/table.users')</th>
                                    <th>@lang('groups/table.created_at')</th>
                                    <th>@lang('groups/table.actions')</th>
                                </tr>
                            </thead>
                            <tbody class="text-uppercase">

                                @foreach ($roles as $role)
                                <tr>
                                    <td>{!! $role->id !!}</td>
                                    <td>{!! $role->name !!}</td>
                                    <td>{!! $role->users()->count() !!}</td>
                                    <td>{!! $role->created_at->diffForHumans() !!}</td>
                                    <td>
                                        <a href="{{ route('admin.groups.edit', $role->id) }}">
                                            <i class="material-icons task_icons pencil" title="@lang('groups/form.edit_group')">edit</i>
                                            </a>
                                            <!-- let's not delete 'Admin' group by accident -->
                                            @if ($role->id !== 1)
                                                @if($role->users()->count())
                                                    <a href="#" data-toggle="modal" data-target="#users_exists" data-name="{!! $role->name !!}" class="users_exists">
                                                        <i class="material-icons task_icons pencil text-danger" title="@lang('groups/form.delete_group')">info</i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.groups.confirm-delete', $role->id) }}" data-toggle="modal" data-target="#delete_confirm">
                                                        <i class="material-icons task_icons text-danger" title="@lang('groups/form.delete_group')">delete</i>

                                                    </a>
                                                @endif

                                            @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    @else
                        @lang('general.noresults')
                    @endif   
                </div>
            </div>
        </div>
    </div>    <!-- row-->
</section>




@stop

{{-- Body Bottom confirm modal --}}
@section('footer_scripts')
<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    </div>
  </div>
</div>
<div class="modal fade" id="users_exists" tabindex="-2" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                @lang('groups/message.users_exists')
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {$('body').on('hidden.bs.modal', '.modal', function () {$(this).removeData('bs.modal');});});
    $(document).on("click", ".users_exists", function () {

        var group_name = $(this).data('name');
        $(".modal-header h4").text( group_name+" Group" );
    });</script>
@stop
