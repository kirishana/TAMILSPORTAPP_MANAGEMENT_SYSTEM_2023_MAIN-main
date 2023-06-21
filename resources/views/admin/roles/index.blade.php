@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
View Roles
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />


@stop
{{-- Page content --}}
@section('content2')

<section class="content-header">

    <!--section starts-->
    <h1>Settings</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin/">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Settings</li>
        <li class="active">Roles & Permissions</li>

    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">

        <div class="col-md-5">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">person</i> Add Role
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" action="#" method="post">
                        <fieldset>
                            <div class="col-md-11">
                                <div>
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                    <div class="form-group label-floating">
                                        <label class="control-label">Role Name</label>
                                        <input name="role" type="text" class="form-control role" maxlength="40" required />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button style="margin-top:30px;border-radius:30px;" type="submit" class="btn btn-success btn-sm add pull-right">ADD</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-md-7">
            <div class="panel panel-primary" id="hidepanel1">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">person</i> View Roles
                    </h3>
                </div>
                <div class="panel-body">

                    <fieldset>
                        <div class="col-md-12">
                            <div class="table-scrollable">
                                <table class="table table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">#</th>
                                            <th style="text-align:center">Name</th>
                                            <th style="text-align:center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="role">
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                        </div>
                    </fieldset>

                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
    </div>
    </div>

    </div>

    <!--Modal: Login with Avatar Form-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

                <div class="modal-header" style="border-bottom:none">
                    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edit Role</h2>

                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">


                    <div class="md-form ml-0 mr-0">
                        <input type="hidden" id="id">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="text" name="name" id="name" class="form-control form-control-sm editname validate ml-0">
                        <div style="display:none;color:red;" id="successMessage">Please fill the field</div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success update">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login with Avatar Form-->
    </div>

</section>
<br />
<br />

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
    $(document).ready(function() {
        fetchroles();
        fetchagegroups();


        function fetchroles() {
            $.ajax({
                type: "GET",
                url: "/admin/roles/all",
                dataType: "json",
                success: function(response) {
                    $('#role').html('');
                    $.each(response.roles, function(key, item) {
                        if (item.status == 1) {
                            $('#role').append(

                                `<tr>
  <td style="text-align:center">${item.id}</td>
  <td style="text-align:left">${item.name}</td>
  <td style="text-align:center">
  
  <button type="button" class="btn btn-primary btn-xs edit" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" data-toggle="tooltip" data-placement="bottom" title="Edit"   value="${item.id}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">edit</i></button>
  <a type="button" class="btn btn-success btn-xs activate" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" role="button"aria-pressed="true" href="/admin/permission/${item.id}" data-toggle="tooltip" data-placement="bottom"title="Assign Permission"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">group</i></a>
  <button type="button" class="btn btn-primary btn-xs activate" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" id="${item.id}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;" data-toggle="tooltip" data-placement="bottom"title="Activate">thumb_up</i></button>
                                                      
                                                </td>  
</tr>`
                            )
                        } else {
                            $('#role').append(
                                `<tr>
  <td style="text-align:center">${item.id}</td>
  <td style="text-align:left">${item.name}</td>
  <td style="text-align:center">
  
  <button type="button" class="btn btn-primary btn-xs edit" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" data-toggle="tooltip" data-placement="bottom" title="Edit"   value="${item.id}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">edit</i></button>
  <a type="button" class="btn btn-success btn-xs activate" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" role="button"aria-pressed="true" href="/admin/permission/${item.id}" data-toggle="tooltip" data-placement="bottom"title="Assign Permission"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">group</i></a>
  <button type="button" class="btn btn-danger btn-xs deactivate" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" id="${item.id}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;" data-toggle="tooltip" data-placement="bottom"title="Deactivate">thumb_down</i></button>   
                                                </td>
</tr>`);

                        }


                    });
                }
            });
        }


        //approve
        $(document).on('click', '.activate', function() {

            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: "/admin/roles/activate",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    // Swal.fire({
                    //     title: 'Disabled',
                    //     text: 'Disabled Successfully!',
                    //     });
                    fetchroles();
                },
            });

        });


        //decline


        $(document).on('click', '.deactivate', function() {

            var id = $(this).attr('id');

            $.ajax({
                type: 'POST',
                url: "/admin/roles/deactivate",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    // Swal.fire({
                    //     title: 'Enabled',
                    //     text: 'Enabled Successfully!',
                    //     });
                    fetchroles();
                },
                error: function(response, status, error) {
                    if (response.status === 422) {

                    };
                },
            });

        });


        $(document).on('keyup', '.editname', function() {
               $('#successMessage').hide();
        });
        $(document).on('click', '.add', function(e) {
            if($('.role').val()!=''){
                            e.preventDefault();

                    var data = $('.role').val();
            $.ajax({
                type: "POST",
                url: "/admin/roles/create",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": data
                },

                dataType: "json",
                success: function(response) {
                    $('.role').val('');
                    fetchroles();
                }
            });
            }else{
                 Swal.fire({
                title: 'Warning',
               text: 'Please type any text!',
                 });
            }
        
        });

        $(document).on('click', '.edit', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#myModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/roles/edit/" + id,
                success: function(response) {
                    $('#name').val(response.role.name);

                    $('#id').val(id);
                }
            });
        });
        $(document).on('click', '.update', function(e) {
          var data = $('#name').val();
    if(data!=''){
    $('#successMessage').hide();
  e.preventDefault();
            var id = $('#id').val();
            var data = $('#name').val();
            var method = $('#_method').val();
            $.ajax({
                type: "POST",
                url: "/admin/roles/update/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": data
                },

                dataType: "json",
                success: function(response) {
                    $('#myModal').modal('hide');
                    fetchroles();
                }
            });
    }else{
     $('#successMessage').show();

    }
          
        });



        //age group





        function fetchagegroups() {
            $.ajax({
                type: "GET",
                url: "/admin/age-groups/",
                dataType: "json",
                success: function(response) {
                    $('#age').html('');
                    $.each(response.AgeGroups, function(key, item) {
                        if (item.status == 1) {
                            $('#age').append(

                                `<tr>
  <td>${item.id}</td>
  <td>${item.name}</td>
  <td style="text-align:center">

  <button class="btn btn-primary change" style="padding: 2px 6px"data-toggle="tooltip" data-placement="bottom" title="Edit"   value="${item.id}"><i class="material-icons text-light ">edit</i></button>
                                                     <button  class="btn btn-primary enable" style="padding: 2px 6px;text-transform:none;" id="${item.id}">Enable</button>
                                                </td>
</tr>`
                            )
                        } else {
                            $('#age').append(
                                `<tr>
  <td>${item.id}</td>
  <td>${item.name}</td>
  <td style="text-align:center">

  <button class="btn btn-primary change" style="padding: 2px 6px"data-toggle="tooltip" data-placement="bottom" title="Edit"   value="${item.id}"><i class="material-icons text-light ">edit</i></button>
                                                  <button class="btn btn-danger disable" style="padding: 2px 6px;text-transform:none;" id="${item.id}">Disable</button>   
                                                </td>
</tr>`);

                        }


                    });
                }
            });
        }


        //approve
        $(document).on('click', '.enable', function() {

            var id = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: "/admin/age-group/activate",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    // Swal.fire({
                    //     title: 'Disabled',
                    //     text: 'Disabled Successfully!',
                    //     });
                    fetchagegroups();
                },
            });

        });


        //decline


        $(document).on('click', '.disable', function() {

            var id = $(this).attr('id');

            $.ajax({
                type: 'POST',
                url: "/admin/age-group/deactivate",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    'id': id
                },
                success: function(res) {
                    // Swal.fire({
                    //     title: 'Enabled',
                    //     text: 'Enabled Successfully!',
                    //     });
                    fetchagegroups();
                },
                error: function(response, status, error) {
                    if (response.status === 422) {

                    };
                },
            });
        });
        $(document).on('click', '.change', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#myModal2').modal('show');
            $.ajax({
                type: "GET",
                url: "/admin/age-group/edit/" + id,

                success: function(response) {
                    $('#age-group').val(response.AgeGroup.name);
                    $('#age-id').val(id);

                }
            });
        });


        $(document).on('click', '.age-add', function(e) {
            e.preventDefault();
            var data = $('.age').val();
            $.ajax({
                type: "POST",
                url: "/admin/age-group/create",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": data
                },

                dataType: "json",
                success: function(response) {
                    $('.age').val('');
                    fetchagegroups();
                }
            });
        });




        $(document).on('click', '.submit', function(e) {
            e.preventDefault();
            var id = $('#age-id').val();
            var data = $('#age-group').val();
            var method = $('#_method').val();
            $.ajax({
                type: "POST",
                url: "/admin/age-group/update/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": data
                },

                dataType: "json",
                success: function(response) {
                    $('#myModal2').modal('hide');
                    fetchagegroups();
                }
            });
        });

    });
    //end
</script>

@endsection