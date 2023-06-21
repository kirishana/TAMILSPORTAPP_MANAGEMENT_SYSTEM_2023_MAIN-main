@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Users List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
@stop

{{-- Page content --}}
@section('content2')
<section class="content-header">
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Users</a></li>
        <li class="active">Users List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
          
                <h4 class="panel-title">
                    <i class="material-icons  ">group</i>
                    Users List

                    <div style="float:right">
                        <a href="/user/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                            Add New</a>
                            
                    </div>
                    
                </h4>
                
            </div>

            
            <div class="panel-body">
<div class="row">
<div class="col-md-3">
    <!-- <input type="text" name="search" id="search" class="form-control" placeholder="Search Events" /> -->
    <input id="search" value="" name="search" placeholder="Search" type="text" style="
        width: 100%;
        padding: 10px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
</div>
<div class="col-md-6"></div>

<div class="col-md-3 export-button" style="margin-top: 35px; display:flex; justify-content:flex-end;">
    <a id="pbtn"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/user-list/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/user-list/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
</div>
       <br> 
                   <section class="books">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                    @include('admin.users.user-list-filter')
                    </div>
                   </section>
          
    
       </div>
    </div> 
</section>
<div style="display:none;">
    @include('admin.users.printUsers')
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"> Decline</h4>
            </div>
            <input type="hidden" id="deleted_id">
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

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"></div>
    </div>
</div>
<script>
    $(function() {
        $('body').on('hidden.bs.modal', '.modal', function() {
            $(this).removeData('bs.modal');
        });
    });
</script>

 <script type="text/javascript">

//     //approve
    $(document).on('click', '.approve', function() {

        var id = $(this).val();

        // $('#action').modal('hide');

        $.ajax({
            type: 'POST',
            url: "/new-user/approve/" + id,
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
        $("#resonDecline").val('')
        $('#id').val(id);
        $('#deleteModal').modal('show');
    });

        $(document).on('click', '.DeclineYes', function() {
        var id=  $('#id').val();
        var remark = $("#resonDecline").val();
        if (remark.trim().length != 0) {

            $.ajax({
                type: 'POST',
                url: "/new-user/decline/" + id,
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


           $(document).on('change', '.role2', function(e) {
                e.preventDefault();
                var id = $(this).attr('data-user');
                //  alert(id);
                var role = $(this).val();
                var user = $(this).val();
                $.ajax({
                type: "POST",
                url: "/user-role/change/" + id,
                data: {
                "role": role,
                "id": id, 
            },
            success: function(response) {} 
            });
        });
    
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page, $('#search').val());

        });
                
        $(document).on('keyup', '#search', function() {
        var query = $('#search').val();
        var page=$('.pagination a').attr('href')?$('.pagination a').attr('href').split('page=')[1] :'1';
        console.log(page);
               fetch_data(page,query);
    });
        function fetch_data(page,query) {
            console.log(page);
            $.ajax({
                url: '/user-lists?page='+page,
                data:{
                    query:query
                }
            }).done(function (data) {
                $('.books').html(data);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
    


    //  $(document).on('click', '.pagination a', function (e) {
    //         e.preventDefault();
    //         var page=$(this).attr('href').split('page=')[1];
    //         fetch_data(page);

       
    //     function fetch_data(page,query='') {
    //         $.ajax({
    //             url: '/user-lists?page='+page,
    //             data:{
    //                 query:query
    //             }
    //         }).done(function (data) {
    //             $('.books').html(data);
    //         }).fail(function () {
    //             console.log("Failed to load data!");
    //         });
    //     }
    // });
    //     function fetch_data(page) {
    //     $.ajax({
    //         url:page,
           
    //         dataType: 'html',
    //         success: function(response) {
    //             $('#users').html(response);
    // // $('#table_data').html(response['html']);
    // // $('#printUsers').html(response['html2']);




    //         }
  
    //     })
    // }

   

    $("#pbtn").click(function() {
        $("#printUsers").print();
    });
     
    // $(document).ready(function(){
    // $('#btn').printPage();
    // });

    
    // $(document).ready(function(){
    // $('#pbtn').printPage();
    // });

           </script>
@stop
