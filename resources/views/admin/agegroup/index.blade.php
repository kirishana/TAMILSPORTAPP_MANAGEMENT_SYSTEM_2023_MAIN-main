@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Age Groups
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
    @stop
        {{-- Page content --}}
        @section('content')

        <section class="content-header">

            <!--section starts-->
            <h1>{{ __('sidebar.age_group') }}</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/admin/">
                        <i class="material-icons breadmaterial">home</i>
                        Dashboard
                    </a>
                </li>
                <li>Organizations</li>
                <li>Settings</li>
                <li class="active">Age Group</li>

            </ol>
        </section>
        <!--section ends-->
        <section class="content">
            <div class="row">
                <div class="col-md-6">
                <div class="alert alert-success" style="display:none;" id="successMessage"></div>
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="material-icons  6:34 PM 9/24/2021">person</i>
                               {{ __('masterdata.add_age_group') }}

                            </h4>

                        </div>

                        <div class="alert alert-danger" id="alert-danger" style="display:none"></div>

                        <div class="panel-body">


                            <div class="col-md-8">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                <div class="form-group label-floating">
                                    <label class="control-label"> {{ __('masterdata.age_group') }}</label>
                                    <input name="age" type="text" class="form-control age" style="width:100%;" onkeypress="return NumberAndHyphen(event)" maxlength="40" required />
                                    <span id="Message" style="color:red;"> Please type only numbers and "-"!</span>
                                    <input type="hidden" name="org_id" class="form-control org" value="{{ Auth::user()->organization?Auth::user()->organization->id:'' }}">
                                </div>
                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-2"></div>
                            <div class="col-md-1">
                                <button style="margin-top:20px;border-radius:30px;" type="submit"
                                    class="btn btn-success btn-sm age-add"> {{ __('masterdata.add') }}</button>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="col-md-12">
                    <div class="alert alert-warning" style="display:none;" id="updateMessage"></div>
                    <div class="alert alert-danger" style="display:none;" id="message"></div>
                <div class="alert alert-danger" style="display:none" id="Notmessage"></div>
                        <div class="panel panel-primary" id="hidepanel1">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="material-icons">person</i> {{ __('masterdata.view') }}
                                </h3>
                            </div>

                            <div class="table-responsive">
                                <div class="portlet box" style="min-height: 650px;">
                                    <div class="portlet-body">
                                        <div class="table-scrollable">
                                            <div class="col-md-6">
                                                <input type="text" name="search" placeholder="Search Age"
                                                    class="form-control search">
                                            </div>

                                            <section class="books">
                                                <table class="table table-hover" id="varna" style="border:grey;">
                                                    <thead class="thead-Dark">
                                                        <tr>
                                                            <th>#</th>
                                                            <th  class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer"><span style="float: left;" id="name_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp;  {{ __('dashboard.name') }}</th>
                                                            <th style="text-align:center;width:15px;"> {{ __('dashboard.actions') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            @include('admin.agegroup.table')
                                                    </tbody>
                                                </table>
                                                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="name" />
                                                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                                            </section>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            </div>
            </div>
            </div>

            </div>
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">
    
      
      <!--Body-->
      <div class="modal-body text-center mb-1">


        <div class="md-form ml-0 mr-0">
            <input type="hidden" id="deleted_id">
          Are You Sure!
        </div>
        <div class="modal-body">
        <p>You Want to Delete this AgeGroup Permanently?</p>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success deleteAgegroup">Yes</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login with Avatar Form-->
</div>
            <!--Modal: Login with Avatar Form-->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                    <!--Content-->
                    <div class="modal-content">

                        <div class="modal-header" style="border-bottom:none">
                            <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edit Age Group</h2>

                        </div>
                        <!--Body-->
                        <div class="modal-body text-center mb-1">


                            <div class="md-form ml-0 mr-0">
                                <input type="hidden" id="age-id">
                                <input name="_method" type="hidden" value="PUT">
                                <input type="text" name="age-group" id="age-group"
                                    class="form-control form-control-sm validate ml-0">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-success submit">Update</button>
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
            //         fetchagegroups();

            //         function fetchagegroups() {
            //             $.ajax({
            //                 type: "GET",
            //                 url: "/admin/all",
            //                 dataType: "json",
            //                 success: function(response) {
            //                     $('#age').html('');
            //                     $.each(response.AgeGroups, function(key, item) {
            //                         if (item.status == 1) {
            //                             $('#age').append(

            //                                 `<tr>
            //   <td>${key}</td>
            //   <td>${item.name}</td>

            //   <td style="text-align:center">

            //                                                      <button  class="btn btn-primary enable" style=" margin:0; padding: 2px 6px;text-transform:none;" id="${item.id}">Enable</button>
            //                                                 </td>
            // </tr>`
            //                             )
            //                         } else {
            //                             $('#age').append(
            //                                 `<tr>
            //   <td>${key}</td>
            //   <td>${item.name}</td>

            //   <td style="text-align:center">

            //                                                   <button class="btn btn-danger disable" style="padding: 2px 6px;text-transform:none;" id="${item.id}">Disable</button>   
            //                                                 </td>
            // </tr>`);

            //                         }
            //                     });
            //                 }
            //                 });


            //         }

            // end
            function clear_icon(){
            $('#name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
          
        }
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
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-up"></i></span>');

                
            }
            if (order_type=='desc') {
                $(this).data('sorting_type','asc');
                reverse_order='asc';
                clear_icon();
                    $('#'+column_name+'_icon').html('<span><i class="fas fa-angle-down"></i></span>');

        
              
            }
          
                var page=$('#hidden_page').val();
                var query=$('.search').val();
        
                fetch_customer_data(page,order_type,column_name,query);

        });
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            $('#hidden_page').val(page);
            var column_name=$('.sorting.active').data('column_name');
            var type=$('.sorting.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
            var query=$('.search').val();
            $('li').removeClass('active');
            $(this).parent().addClass('active');
            fetch_customer_data(page,sort_type,column_name,query);

        });

              $(document).on('keyup', '.search', function() {
                var query = $('.search').val();
                var column_name=$('.sorting.active').data('column_name');
                var type=$('.sorting.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
                var page=$('#hidden_page').val();
               
                fetch_customer_data(page,sort_type,column_name,query);
            });
        

            function fetch_customer_data(page,sort_type,sort_by,query) {
                $.ajax({
                    url: "/admin/age-groups?page="+page,
                    method: 'GET',
                    data: {
                        query: query,
                        'sortby':sort_by,
                        'sorttype':sort_type,

                    },
                }).done(function (AgeGroups) {
                    $('tbody').html(AgeGroups);
                }).fail(function () {
                    console.log("Failed to load data!");

                })

            }


            $(document).on('click', '.age-add', function (e) {
                 if($('.age').val()!=''){
                e.preventDefault();
                var name = $('.age').val();
                var org = $('.org').val();
                $.ajax({
                    type: "POST",
                    url: "/admin/age-group/create",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "name": name,
                        "org": org
                    },

                    dataType: "json",
                    success: function (response) {
                        jQuery('#alert-danger').empty();
                        if (response.errors) {
                            jQuery('#alert-danger').show();
                            jQuery('#alert-danger').fadeOut(8000);
                            jQuery('#alert-danger').append('<p>' + response.errors + '</p>');
                        } else {
                            $('#successMessage').html(response.message);
                                $('#successMessage').show();
                                $('#successMessage').fadeOut(6000);
                            jQuery('#alert-danger').hide();
                            $('.age').val('');
                            var page=$('#hidden_page').val();
                            fetch_customer_data(page);
                        }

                    }
                });
                 }else{
                      Swal.fire({
                title: 'Warning',
               text: 'Please type only numbers and "-"!',
                 });
                 }
            });
            //approve
            $(document).on('click', '.enable', function () {

                var id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: "/admin/age-group/activate",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id
                    },
                    success: function (res) {
                        $('#updateMessage').html(res.message);
                            $('#updateMessage').show();
                            $('#updateMessage').fadeOut(6000);
                        var page=$('#hidden_page').val();

                        fetch_customer_data(page);

                    },
                });

            });


            //decline


            $(document).on('click', '.disable', function () {
                var id = $(this).attr('id');

                $.ajax({
                    type: 'POST',
                    url: "/admin/age-group/deactivate",
                    method: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'id': id
                    },
                    success: function (res) {
                        $('#updateMessage').html(res.message);
                            $('#updateMessage').show();
                            $('#updateMessage').fadeOut(6000);
                        var page=$('#hidden_page').val();

                        fetch_customer_data(page);

                    },
                    error: function (response, status, error) {
                        if (response.status === 422) {

                        };
                    },
                });
            });
            $('#Message').hide();

            function NumberAndHyphen(event) {
            const charCode = event.which ? event.which : event.keyCode;
            if (charCode < 48 || charCode > 57) {
            if (charCode !== 45) {
                event.preventDefault();
                            $('#Message').show();

            return false;

            }
            }
           $('#Message').hide();

            return true;

            }
            $(document).on('click', '.delete', function() {
$('#myModal2').modal('show');
var id = $(this).attr('id');
$('#deleted_id').val(id);
});
$(document).on('click', '.deleteAgegroup', function() {
    var id = $('#deleted_id').val();

        $.ajax({
            type : 'POST',
            url: "/admin/age-group/delete",
            method:"POST", 
            data:  {        "_token": "{{ csrf_token() }}",
                    'id':id},
            success:function (res) {
               
                $('#myModal2').modal('hide');
                var page=$('#hidden_page').val();
                            fetch_customer_data(page);
                    if(res.status==1){
                        $('#message').html(res.message).show();
                        $('#message').fadeOut(8000);
                    }else{
                        $('#Notmessage').html(res.message).show();
                        $('#Notmessage').fadeOut(8000);
                    }
           

            },
            error: function (response, status, error) {
                if (response.status === 422) {
                   
                };
            },
        });
    
});
        </script>

        @endsection
