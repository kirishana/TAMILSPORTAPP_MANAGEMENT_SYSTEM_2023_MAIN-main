@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Main Events
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
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>
    @stop
        {{-- Page content --}}
        @section('content')

        <section class="content-header">
       
            <!--section starts-->
            <h1> {{ __('sidebar.main_events') }}</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/admin/">
                        <i class="material-icons breadmaterial">home</i>
                        Dashboard
                    </a>
                </li>
                <li>Organizations</li>
                <li>Master Data</li>
                <li class="active">Events</li>

            </ol>
        </section>
        <!--section ends-->
        <section class="content">
            <div class="row">
                <div class="col-md-5">
                <div class="alert alert-success" style="display:none;" id="successMessage"></div>
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="material-icons  6:34 PM 9/24/2021">person</i>
                                {{ __('masterdata.add_event') }}
                            </h3>
                        </div>
                        <div class="alert alert-danger" style="display:none"></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                    <div class=" label-floating">
                                        <label class="control-label">{{ __('masterdata.event_cat') }} <span style="color:red;"> <b> *
                                                </b></span> </label>
                                        <select id="disabledSelect" name="eventcat" class="form-control cat">
                                            <option disabled selected>Select Category</option>
                                            @foreach($eventCategories as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="hidden" name="org_id" class="form-control org"
                                            value="{{ Auth::user()->organization?Auth::user()->organization->id:'' }}">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">{{ __('masterdata.event_name') }} </label>
                                        <input name="event" type="text" class="form-control eventName" maxlength="40"  required/>
                                    </div>

                                </div>


                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">{{ __('masterdata.price') }} </label>
                                        <input name="price" type="number" class="form-control price" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  required />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label">{{ __('masterdata.discount') }} (%) </label>
                                        <input name="discount" type="number" class="form-control discount" maxlength="3" max="100" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                            required />
                                    </div>
                                </div>




                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <button style="margin-top:30px;border-radius:30px;" type="submit"
                                        class="btn btn-success btn-sm age-add">{{ __('masterdata.add') }}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-7">
                <div class="alert alert-warning" style="display:none;" id="updateMessage"></div>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="material-icons">person</i> {{ __('masterdata.view_events') }}
                            </h3>
                        </div>
                        <div class="table-responsive">
                            <div class="portlet box " style="min-height: 650px;">
                                <div class="portlet-body">
                                    <div class="table-scrollable">
                                        <div class="col-md-6">
                                            <input type="text" name="search" placeholder="Search Event"
                                                class="form-control search">
                                        </div>
                                        <section class="">
                                            <table class="table table-hover mainEvents" style="border:grey;">
                                                <thead class="thead-Dark">
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer"><span style="float: left;" id="name_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('dashboard.name') }}</th>
                                                        <th>{{ __('masterdata.price') }}</th>
                                                        <th>{{ __('masterdata.discount') }}</th>
                                                        <th class="sorting" data-sorting_type="asc" data-column_name="event_category_id" style="cursor: pointer"><span style="float: left;" id="event_category_id_icon"><i class="fas fa-arrows-alt-v"></i></span> &nbsp; {{ __('masterdata.event_cat') }}</th>
                                                        <th>{{ __('dashboard.actions') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @include('mainEvents.table')
                                                </tbody>
                                            </table>
                                            <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                            <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="name" />
                                            <input type="hidden" name="hidden_sort_type" id="hidden_sort_type"  value="asc" />

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

            <!--Modal: Login with Avatar Form-->
            <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
                    <!--Content-->
                    <div class="modal-content">

                        <div class="modal-header" style="border-bottom:none">
                            <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edit MainEvent</h2>

                        </div>
                        <!--Body-->
                        <div class="modal-body text-center mb-1">


                            <div class="md-form ml-0 mr-0">
                                <input type="hidden" id="age-id">
                                <input name="_method" type="hidden" value="PUT">
                                <input type="text" name="age-group" id="age-group"
                                    class="form-control form-control-sm validate ml-0">
                                <input type="text" name="price" id="price"
                                    class="form-control form-control-sm validate ml-0">
                                <input type="text" name="discount" id="discount"
                                    class="form-control form-control-sm validate ml-0">
                                {{-- <div class="percentage">%</div> --}}

                            </div>
                            <div class="md-form ml-0 mr-0">
                                <select id="cat" name="eventcat" class="form-control">
                                    <option selected>Select Category <span style="color:red;"> <b>* </span></option>
                                    @foreach($eventCategories as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
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
            $(document).ready(function () {

          
                $(document).on('click', '.change', function (e) {
                    e.preventDefault();
                    // var id_projet = $(this).find("option:selected").data("id");
                    // alert(id_projet);
                    var id = $(this).val();
                    $('#myModal2').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "/main-event/edit/" + id,

                        success: function (response) {
                            // alert(response.Discount);
                            $('#age-group').val(response.AgeGroup.name);
                            $('#age-id').val(id);
                            $('#price').val(response.AgeGroup.price);
                            $('#discount').val(response.Discount);
                            $('#cat').val(response.AgeGroup.event_category_id);
                          

                        }
                    });
                });


                $(document).on('click', '.age-add', function (e) {
                    e.preventDefault();
                    var name = $('.eventName').val();
                    var org = $('.org').val();
                    var cat = $('.cat').val();
                    var price = $('.price').val();
                    var discount = $('.discount').val();

                    $.ajax({
                        type: "POST",
                        url: "/main-event/create",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "name": name,
                            "org": org,
                            "cat": cat,
                            "price": price,
                            "discount": discount
                        },

                        dataType: "json",
                        success: function (response) {
                            jQuery('.alert-danger').empty();

                            if (response.errors) {
                                jQuery('.alert-danger').show();
                                jQuery('.alert-danger').append('<p>' + response.errors +
                                    '</p>');
                            } else {

                                jQuery('.alert-danger').hide();
                                $('.eventName').val('');
                                $('.cat').val('');
                                $('.price').val('');
                                $('.discount').val('');
                                $('#successMessage').html(response.message);
                                $('#successMessage').show();
                                $('#successMessage').fadeOut(6000);
                                var page=$('#hidden_page').val();
                                fetch_customer_data(page);
                            }



                        }
                    });
                });
                $(document).on('click', '.submit', function (e) {
                    e.preventDefault();
                    var id = $('#age-id').val();
                    var data = $('#age-group').val();
                    var cat = $('#cat').val();
                    var price = $('#price').val();
                    var discount = $('#discount').val();


                    var method = $('#_method').val();
                    $.ajax({
                        type: "POST",
                        url: "/main-event/update/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "data": data,
                            "cat": cat,
                            "price": price,
                            "discount": discount
                        },

                        dataType: "json",
                        success: function (response) {
                            $('#myModal2').modal('hide');
                            $('#updateMessage').html(response.message);
                            $('#updateMessage').show();
                            $('#updateMessage').fadeOut(6000);
                            var page=$('#hidden_page').val();
                            fetch_customer_data(page);
                        }
                    });
                });

            });
            //end
            function clear_icon(){
            $('#name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#event_category_id_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
          
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
                    url: "/main-events?page=" + page,
                    method: 'GET',
                    data: {
                        query: query,
                        'sortby':sort_by,
                        'sorttype':sort_type,
                    },
                }).done(function (AgeGroups) {
                    // alert(AgeGroups);
                    $('tbody').html(AgeGroups);
                }).fail(function () {
                    console.log("Failed to load data!");

                })

            }

        </script>

        @endsection
