@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Users List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/thead.css') }}" rel="stylesheet" type="text/css" />

<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<style>
    .table-responsive{
        overflow-x: visible;
    }
    .example::-webkit-scrollbar {
  display: none;
}

.example {
  -ms-overflow-style: none;
}
</style>
@stop
<!--  -->

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.users') }}</h1>
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
        <div class="panel panel-primary" style="min-height: 900px;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  ">group</i>
                   {{ __('staffs.user_lists') }}
                    @if (Auth::guard('web')->user()->can('Create-user2'))

                    <div style="float:right">
                        <a href="/users/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                           {{ __('sidebar.add_new') }}</a>
                    </div>
                    @endif
                </h4>
            </div>
            <br />

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
    <a id="orgpbtn"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/org/user-list/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/org/user-list/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
</div>
<br>           
@if (count($users) > 0)
    <section class="books example" style="overflow-x:scroll;">
    <table class="table table-striped table-bordered table-hover users" style="width:100%"  id="users">
        <thead class="thead-Dark">
            <tr class="filters" style="text-align: center">

                <th class="sorting" data-sorting_type="asc" data-column_name="first_name" style="cursor: pointer"><span style="float: left;" id="first_name_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('staffs.f_name') }}</th>
                <th class="sorting" data-sorting_type="asc" data-column_name="last_name" style="cursor: pointer"><span style="float:left;" id="last_name_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('staffs.l_name') }}</th>
                <th class="sorting" data-sorting_type="asc" data-column_name="email" style="cursor: pointer"><span style="float:left;" id="email_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('dashboard.email') }}</th>
                <th>{{ __('staffs.role') }}</th>
                <th class="sorting" data-sorting_type="desc" data-column_name="dob" style="cursor: pointer"><span style="float:left;" id="dob_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('staffs.age') }}</th>
                <th class="sorting" data-sorting_type="asc" data-column_name="gender" style="cursor: pointer"><span style="float:left;" id="gender_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('dashboard.gender') }}</th>
                <th>{{ __('dashboard.phone_no') }}</th>
                <th class="sorting" data-sorting_type="asc" data-column_name="club" style="cursor: pointer"><span style="float:left;" id="club_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('dashboard.club') }}</th>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th>{{ __('staffs.sil_mem') }}</th>
                @endif
                @endif
                @endif
                <th style="width: 15%;">{{ __('dashboard.actions') }}</th>
            </tr>
        </thead>
        <tbody>
        @include('admin.users.org_userlist')
        </tbody>
    </table>

    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="first_name" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
        </section>
@else
    No data found :(
@endif
       </div>
        {{-- </div> --}}
    </div> 
</section>
        </div>
    </div> <!-- row-->
</section>
<div style="display:none;" id="orgPrint" >
    @include('admin.users.org-userlist-print')
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}">
</script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}">
</script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}">
</script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}">
</script>




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
    //approve
    $(document).on('click', '.approve', function() {

        var id = $(this).val();

        $('#showModal').modal('hide');

        $.ajax({
            type: 'POST',
            url: "/new-user/org/approve/" + id,
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
        $("#resonDecline").val('');
        $('#id').val(id);
        $('#deleteModal').modal('show');
    });
    $(document).on('click', '.DeclineYes', function() {
        var id=  $('#id').val();
        var remark = $("#resonDecline").val();

        if (remark.trim().length != 0) {
            $.ajax({
                type: 'POST',
                url: "/new-user/org/decline/" + id,
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
                // alert(id);
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



    function clear_icon(){
            $('#first_name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#last_name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#email_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#dob_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#gender_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#club_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#role_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
        }
        function fetch_data(page,sort_type,sort_by,query5) {
            $.ajax({
                url: 'users?page='+page,
                data:{
                    'query5':query5,
                    'sortby':sort_by,
                    'sorttype':sort_type,

                },
              
            }).done(function (users) {
                $('tbody').html(users);
            }).fail(function () {
                console.log("Failed to load data!");

            });
        }       

          $(document).on('keyup', '#search', function() {
        var query5 = $('#search').val();
        var column_name=$('.sorting.active').data('column_name');
        var type=$('.sorting.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
        var page=$('#hidden_page').val();
      
               fetch_data(page,sort_type,column_name,query5);
            });

        $(document).on('click', '.sorting', function () {
            $('.sorting.active').removeClass('active');
            $(this).addClass("active");  

            var column_name=$(this).data('column_name');
            var order_type=$(this).data('sorting_type');
            var reverse_order='';
            if (order_type=='asc') {
                $(this).data('sorting_type','desc');
                reverse_order='desc';
                clear_icon();
                if(column_name=='dob'){
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-down"></i></span>');

                }else{
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-up"></i></span>');

                }
                
            }
            if (order_type=='desc') {
                $(this).data('sorting_type','asc');
                reverse_order='asc';
                clear_icon();
                if(column_name=='dob'){
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-up"></i></span>');

                }else{
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-down"></i></span>');

                }
              
            }
            // $(this).removeClass("active");

            // $('#hiden_column_name').val(column_name);
            //     $('#hiden_sort_type').val(reverse_order);
                var page=$('#hidden_page').val();
                var query5=$('#search').val();
                fetch_data(page,order_type,column_name,query5);

        });
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            var column_name=$('.sorting.active').data('column_name');
            var type=$('.sorting.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
            var query5=$('#search').val();
            console.log(column_name);
            fetch_data(page,sort_type,column_name,query5);

        });
       
        $("#orgpbtn").click(function() {
           
            $.ajax({
                type: "GET",
                url: "/org/user-list/print",
                // data:{
                //   // query:query

                // },
                        success: function(response) {
                $('#orgPrint').html(response['html']);
                $("#orgPrint1").print();

                // $('.printUsers').html(response['html']);
               

            }      
  
            });
 
    });
</script>
@stop