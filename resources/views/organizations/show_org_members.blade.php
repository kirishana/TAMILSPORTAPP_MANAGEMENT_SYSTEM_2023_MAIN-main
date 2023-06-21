@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Organization Members
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<style>
    div.dataTables_wrapper  div.dataTables_filter {
  width: 80%;
  float: left;
  text-align: right;
  padding-right: 80px;
  padding-left: 8px;
  padding-top: 20px;
      /* font-size: 20px; */
}
/* .dataTables_filter {
display: none;
} */
    .example::-webkit-scrollbar {
            display: none;
        }

        .example {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
  </style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>{{ __('dashboard.members') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Organization</a></li>
        <li class="active">Members List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="material-icons">group</i>
                        {{ __('sidebar.members_lists') }}
 @if (Auth::guard('web')->user()->can('Create-org-member'))
                         <div style="float:right">
                            <a href="/organizations/create_org_member" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                               {{ __('staffs.add_new') }}</a>
                        </div>
                        @endif
                    </h4>   
                </div>

                <div class="row">
                <div class="col-md-3">
                    <input id="search" value="" name="search" placeholder="Search" type="text" style="
        width: 100%;
        padding: 10px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
                    </div>
                    <br>
                <div class="col-md-6"></div>

<div class="col-md-3 export-button" style="margin-top: 5px; display:flex; justify-content:flex-end;">
    <a id="btn10"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/org_member_pdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/org_member_excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
  </div>
            <div class="panel-body table-responsive example" style="overflow-x:scroll">
            <table class="table table-striped table-bordered table-hover table-capitalized" style="width: 100%;
                border-collapse: collapse;" id="table1">               
                 <thead class="thead-Dark">
                        <tr>
                            <th class="sorting" data-sorting_type="asc" data-column_name="first_name" style="cursor: pointer"><span style="float:left;" id="first_name_icon"><i class="fas fa-arrows-alt-v"></i></span> {{ __('staffs.f_name') }}</th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="last_name" style="cursor: pointer"><span style="float:left;" id="last_name_icon"><i class="fas fa-arrows-alt-v"></i></span> {{ __('staffs.l_name') }}</th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="email" style="cursor: pointer"><span style="float:left;" id="email_icon"><i class="fas fa-arrows-alt-v"></i></span> {{ __('dashboard.email') }}</th>
                            <th>{{ __('dashboard.phone_no') }}</th>
                            <th class="sorting" data-sorting_type="desc" data-column_name="dob" style="cursor: pointer"><span style="float:left;" id="dob_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('staffs.age') }}</th>
                            <th class="sorting" data-sorting_type="asc" data-column_name="created_at" style="cursor: pointer"><span style="float:left;" id="created_at_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('dashboard.reg_date') }}</th>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1)
                            <th>{{ __('staffs.sil_mem') }}</th>
                            @endif
                            @endif
                            @endif
                            <th class="sorting" data-sorting_type="asc" data-column_name="club" style="cursor: pointer"><span style="float:left;" id="club_icon"><i class="fas fa-arrows-alt-v"></i></span>{{ __('dashboard.club') }}</th>
                            <th class="sorting">{{ __('dashboard.actions') }}</th>
                        </tr>
                    </thead>

 <tbody>
    @include('organizations.show_org_members_table')
    </tbody>
            </table>
    <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
    <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="first_name" />
    <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
            </div>
            <div style="display:none;">
                @include('organizations.org_member_print')
            </div>
        </div>
    </div>   
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- <script type="text/javascript" src="{{ asset('assets/js/pages/table-advanced.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
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
        url: "/new-user/approve/organization/"+id,
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

$(document).on('click', '.decline', function() {
    var remark = prompt("Please enter reason for decline");
    if(remark.trim().length != 0){
        var id = $(this).val();
        $.ajax({
            type : 'POST',
            url: "/new-user/decline/organization/"+id,
            method:"POST", 
            data:  {        
                "_token": "{{ csrf_token() }}",
                    'id':id},
            success:function (res) {
                Swal.fire({
                    title: 'Declined',
                    text: 'Declined Successfully!',
                    });
                    window.location=res.url;   
            },
            error: function (response, status, error) {
                if (response.status === 422) {                  
                };
            },
        });
    }else{
        Swal.fire({
                    title: 'Alert',
                    text: 'Please Enter the Reason',
                    });
    }
});

  $(document).on('click', '#btn10', function() {
    $.ajax({
           type: "GET",
           url: "/org_member_print",
        
                   success: function(response) {
           $('.memberPrint').html(response['html']);
           $("#printmember").print();
       }

       });
  });
  
  function clear_icon(){
            $('#first_name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#last_name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#dob_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#email_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#club_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#created_at_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
        }
  $(document).on('keyup', '#search', function() {
        var query2 = $('#search').val();
        var column_name=$('.sorting.active').data('column_name');
            var type=$('.sorting.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
        var page=$('#hidden_page').val();
      
               fetch_data(page,sort_type,column_name,query2);
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

                }            }
                var page=$('#hidden_page').val();
                var query2=$('#search').val();
                fetch_data(page,order_type,column_name,query2);

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
            var query2=$('#search').val();
            console.log(column_name);
            fetch_data(page,sort_type,column_name,query2);

        });

        function fetch_data(page,sort_type,sort_by,query2) {
            console.log(page);
            $.ajax({
                // type: "GET",
                url: "org_member_data?page="+page,
                data:{
                    'query':query2,
                    'sorttypeMember':sort_type,
                    'sortbyMember':sort_by,
                },
                      
            }).done(function (users) {
                $('tbody').html(users);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
</script>

@stop
