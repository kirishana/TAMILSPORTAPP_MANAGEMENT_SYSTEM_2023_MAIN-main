@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Show Notification
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />

    @stop
        {{-- Page content --}}
        @section('content2')
        <section class="content-header">

            <!-- section starts -->
            <h1>Show Notifications</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/admin/">
                        <i class="material-icons breadmaterial">home</i>
                        Dashboard
                    </a>
                </li>
                <li>Notifications</li>
                <li class="active">Show Notifications</li>

            </ol>
        </section>
        <section class="content paddingleft_right15">
            <div class="row">
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <div class="active"></div>
                            <i class="bi bi-chat-square"></i>
                            Notifications


                            <div style="float:right">
                                <a href="{{ URL::to('/msg') }}" style="color:white"><i
                                        class="material-icons  leftsize">add_circle</i>
                                    Add New </a>
                            </div>
                        </h4>
                    </div>
                    <div class="table-responsive" style="overflow: hidden">
                        <div class="panel-body">
                            <div class="row">
                                <!-- <div class="col-md-5"> -->
                                <div class="col-md-12">

                                    <table class="table table-bordered text-uppercase table-striped ">
                                        <thead class="thead-Dark">
                                        <tr>

                                            <th class="col-md-3 text-center" style="width:20px"></th>
                                            <th class="col-md-3 text-center">Title</th>
                                            <th class="col-md-6 text-center">Information</th>
                                            <th class="col-md-3 text-center">User Group</th>
                                        </tr>
                                        </thead>
                                        <tr>
                                        <td style="width:20px" >
<button style="padding: 2px 4px;margin-left:9px;" class=" btn btn-danger delete" title="Cancel"><i class="material-icons" style="margin-bottom:5px;">delete</i></button>
<input type="checkbox" class="deleteAll" style="width: 18px;
margin-left:10px;" title="Select All"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        @foreach($message as $msg)
                                            <tr>

<td >
        <div>
            <div class="col-md-6">
                <label style="text-align: center;">
                    <input type="checkbox" 
                        data-id="{{ $msg->id }}" class="toggle_btn" name="deleteIds[]">
                </label>
            </div>

        </div>
</td>


                                                <td class="col-md-3">{{ $msg->content_title }}</td>
                                                <td class="col-md-6 text-justify">{{ $msg->content }}</td>
                                                <td class="col-md-3">
                                                    <ul class="text-left">
                                                        @foreach($msg->roles as $role)
                                                            <li>
                                                                {{ $role->name }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </td>

                                            </tr>


                                        @endforeach
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            </div>
        </section>
        <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
 aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal"><span
                     aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
             <h4 class="modal-title" id="myModalLabel"> Notification Delete</h4>
         </div>
         <input type="hidden" id="id">

         <div class="modal-body">
             Are you sure you want to Delete this Notification?
         </div>
         <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
             <input type="submit" class="btn btn-danger cancel" value='Yes' />
         </div>
     </div>
 </div>
</div>
        @endsection
        @section('footer_scripts')

        <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
        integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>

    $('.deleteAll').on('change', function() {
        var ids=$("input[name='deleteIds[]']").prop('checked', $(this).prop("checked"));
    });
    $(document).on('click', '.delete', function(e) {
        var checkedValues = new Array();
        $("input[name='deleteIds[]']").filter(':checked').each(function() {          
            var id = $(this).attr('data-id');
            checkedValues.push(id);
        }); 
        $('#id').val(checkedValues);  
             if(checkedValues.length>0){
                $('#myModalDelete').modal('show');
             }else{
                Swal.fire({
                    title: 'Warning',
                    text: 'Please Select Atleast one Notification!',
                });

             }
    });
    
    $(document).on('click', '.cancel', function(e) {
        e.preventDefault();
        var id = $('#id').val();
        $.ajax({
            type: "POST",
            url: "/notification/delete",
            data: {
                "id": id,
            },
            success: function(response) {
                window.location.reload();
                // $("#leagues").load(location.href + " #leagues");
             

            }
        });
    });
    </script>
    @stop