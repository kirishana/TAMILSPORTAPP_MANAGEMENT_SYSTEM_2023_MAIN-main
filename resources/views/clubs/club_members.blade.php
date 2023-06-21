@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clubs List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

 </head>

@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.clubs') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Club</a></li>
        <li class="active">Clubs Members List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary" style="min-height: 800px;">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  leftsize">group</i>
                    {{ __('sidebar.club_members') }}
                    <div style="float:right">
                    <a href="/add/club_member" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                    {{ __('sidebar.add_new') }}</a>
                    </div>
                </h4>
            </div>
            <br/>
            <div class="panel-body">
            <div class="row">
            <div class="col-md-3">
                        <input type="text" placeholder="Search" name="search" value="" id="search" style="
        width: 100%;
        padding: 12px 20px;
        margin: 28px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    " />
                      
                    </div>
                    <div class="col-md-6"></div>

<div class="col-md-3 export-button" style="margin-top: 35px; display:flex; justify-content:flex-end;">
    <a id="btn2"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/club-members/export" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/club-members/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
                    </div>
                <div class="table-responsive ">
                    
                @if (count($users) > 0)
                <table class="table table-bordered table-striped" width="100%" style="text-transform: capitalize;">
                    <thead class="thead-Dark">
                        <tr>
                            <th style="text-align: center" class="sorting" data-sorting_type="asc" data-column_name="first_name" style="cursor: pointer"><span style="float: left;" id="first_name_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('staffs.f_name') }}</th>
                            <th style="text-align: center" class="sorting" data-sorting_type="asc" data-column_name="last_name" style="cursor: pointer"><span style="float: left;" id="last_name_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('staffs.l_name') }}</th>
                            <th style="text-align: center" class="sorting" data-sorting_type="desc" data-column_name="dob" style="cursor: pointer"><span style="float: left;" id="dob_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('club.age') }}</th>
                            <th style="text-align: center" class="sorting" data-sorting_type="asc" data-column_name="gender" style="cursor: pointer"><span style="float: left;" id="gender_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('dashboard.gender') }}</th>
                            <th style="text-align: center;" class="sorting" data-sorting_type="asc" data-column_name="email" style="cursor: pointer"><span style="float: left;" id="email_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('dashboard.email') }}</th>
                            <th style="text-align: center">{{ __('club.status') }}</th>
                            <th style="text-align: center">{{ __('dashboard.reg_date') }}</th>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
                            <th style="text-align: center">{{ __('staffs.sil_mem') }}</th>
                            @endif
                            @endif
                            @endif
                            <th style="text-align: center">{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    @include('clubs.club_member_filter')
                    </tbody>
                </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="first_name" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />

@else
  <table class="table table-bordered table-striped" width="100%" style="text-transform: capitalize;">
                    <thead class="thead-Dark">
                        <tr>
                        <th style="text-align: center">ID</th>
                            <th style="text-align: center">First Name</th>
                            <th style="text-align: center">Last Name</th>
                            <th style="text-align: center">Age</th>
                            <th style="text-align: center;">E-mail</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Registered Date</th>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
                            <th style="text-align: center">SIL Member</th>
                            @endif
                            @endif
                            @endif
                            <th style="text-align: center">Actions</th>
                        </tr>
                    </thead>
                    </table>
@endif
</div>

<div style="display:none;" >
    @include('clubs.club_member_print')
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
                    <h4 class="modal-title" id="myModalLabel"> Delete Member</h4>
                </div>
                <input type="hidden" id="deleted_id">
                <input type='hidden' name='data_id' id="del_id" />
                <input name="_method" type="hidden" value="PUT">

                <div class="modal-body">
                    Are you sure you want to delete this member?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger yes" value='Yes' />
                </div>
            </div>
        </div>
    </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<!-- <script>
    $(function() {
        var table = $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('clubs.data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'first_name', name: 'first_name' },
                { data: 'last_name', name: 'last_name' },
                { data: 'email', name: 'email' },
                { data: 'role', name: 'role' },
                { data: 'status', name: 'status'},
                { data: 'created_at', name:'created_at'},
                { data: 'actions', name: 'actions', orderable: false, searchable: false }
            ]
        });
    });

</script> -->

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
  </div>
</div>
<script>
$(function () {
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
	});
});
</script>
 
<script type="text/javascript">
//approve
$(document).on('click', '.approve', function() {
    
    var id = $(this).val();
   
    $('#showModal').modal('hide');
    $.ajax({
        type : 'POST',
        url: "/new-user/approve/"+id,
        method:"POST", 
        data:  {        "_token": "{{ csrf_token() }}",
                'id':id},
        success:function (res) {
            Swal.fire({
                title: 'Approved',
                text: 'Approved Successfully!',
                });
                window.location=res.url;   
                     },
        error: function (response, status, error) {
            if (response.status === 422) {
               
            };
        },
    });
});
function clear_icon(){
            $('#first_name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#last_name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#email_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#dob_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#gender_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#is_approved_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
        }
        $(document).on('keyup', '#search', function() {
        var query = $('#search').val();
        var column_name=$('.sorting.active').data('column_name');
            var type=$('.sorting.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
        var page=$('#hidden_page').val();
      
               fetch_data(page,sort_type,column_name,query);
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
                var page=$('#hidden_page').val();
                var query=$('#search').val();
                fetch_data(page,order_type,column_name,query);

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
            var query=$('#search').val();
            console.log(column_name);
            fetch_data(page,sort_type,column_name,query);

        });

        function fetch_data(page,sort_type,sort_by,query) {
            console.log(page);
            $.ajax({
                url: '/club-members?page='+page,
                data:{
                    query:query,
                    'sorttype':sort_type,
                    'sortby':sort_by,
                }
            }).done(function (users) {
                $('tbody').html(users);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
        $(document).on('click', '#btn2', function() {

            // var query = $('#search').val();

            $.ajax({
                type: "GET",
                url: "/club-members-print",
                        success: function(response) {
                $('#printUsers').html(response['html']);
                $("#printUsers").print();
            }

            });
            //
    });
    
</script>

@stop
