@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Payment Requests
@stop

{{-- page level styles --}}
@section('header_styles')
<!-- <link href="https://nightly.datatables.net/css/jquery.dataTables.css" rel="stylesheet" type="text/css" /> -->
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
@stop
<style>
  /* .dataTables_wrapper .dataTables_paginate .paginate_button {
box-sizing: border-box;
  display: inline-block;
  border-radius: 50%;

  min-width: 1.5em;
  padding: 0.5em 1em;
  margin-left: 2px;
  text-align: center;
  text-decoration: none !important;
  cursor: pointer;
  *cursor: hand;
  color: #333 !important;
  border: 1px solid transparent;

  
} */
div.dataTables_wrapper  div.dataTables_filter {
  width: 95%;
  float:inline-start;
  text-align: left;
  /* padding-right: 510px; */
      /* font-size: 20px; */
      
}
.example::-webkit-scrollbar {
  display: none;
}

.example {
  -ms-overflow-style: none;
}
  </style>

{{-- Page content --}}
@section('content')
<section class="content-header">
  <h1>Payment Requests</h1>
  <ol class="breadcrumb">
    <li>
      <a href="/admin">
        <i class="material-icons breadmaterial">home</i>
        Dashboard
      </a>
    </li>
    
    <li class="active">>Payment Requests</li>
  </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
  <div class="row">
    <div class="panel panel-primary " style="min-height: 500px;">
      <div class="panel-heading">
        <h4 class="panel-title">
            <i class="material-icons  leftsize">group</i>
            Payment Requests
        </h4>
      </div>
      <br />

      <div>

        <ul style="background:none" class="nav  nav-tabs " id="myTab">
          <li class="active">
            <a class="panel-title" href="#tab1" data-toggle="tab">
              Single Events
            </a>
          </li>
          <li>
            <a class="panel-title" href="#tab2" data-toggle="tab">
              Group Events</a>
          </li>



        </ul>
      </div>
        <div class="tab-content">
          <div class="tab-pane fade active in" id="tab1">
            <br>
          <div class="row">
          <div class="col-md-9"></div>

<div class="col-md-3 export-button" style="margin-top: 5px; display:flex; justify-content:flex-end;">
    <a id="btn2"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/payment-requests/pdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/payment_req_excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
  </div>
            <div class="panel-body table-responsive example" style="overflow-x:scroll">
<table class="table table-striped table-bordered" style="width: 100%;" id="table2">
    <thead class="thead-dark">
        <tr class="filters">
            <th class="sortingg" data-sorting_type="asc" data-column_name="name_i" style="cursor: pointer">Player/Club</th>
            <th class="sortingg" data-sorting_type="asc" data-column_name="league.name" style="cursor: pointer">League</th>
            <th class="sortingg" data-sorting_type="asc" data-column_name="total_i" style="cursor: pointer">Paid Amount</th>
            <th class="sortingg" data-sorting_type="asc" data-column_name="payment_method" style="cursor: pointer">Payment Method</th>
            <th class="sortingg" data-sorting_type="asc" data-column_name="trans_id" style="cursor: pointer">Transaction Id</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="name_i" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
  </table>

            </div>
             <div style="display: none;" class="printpay">
              @include('paymentRequests.PaymentsRegPrint')
            </div>
          </div>
      
          <div class="tab-pane" id="tab2">
          <br>
          <div class="row">
          <div class="col-md-9 col-sm-9"></div>

<div class="col-md-3 col-sm-3 export-button" style="margin-top: 5px; display:flex; justify-content:flex-end;">
    <a id="btn20"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/G-pay_request/pdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/G-pay_request/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;"class="img-responsive" /></a>
</div>
  </div>
          <div class="row">
          <div class="col-md-12 col-sm-12">
    <!-- <input type="text" name="search" id="search" class="form-control" placeholder="Search Events" /> -->
    <input id="search3" value="" name="search" placeholder="Search" type="text" style="
        width: 25%;
        padding: 7px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
</div>
</div>
         
    <div class="panel-body table-responsive example" style="overflow-x:scroll">
              <table class="table table-striped table-bordered " id="" style="text-transform: capitalize;">
                <thead class="thead-dark">
                    <tr class="filters">
                        <th class="sortingInd" data-sorting_type="asc" data-column_name="club_name" style="cursor: pointer"><span style="float:left;" id="club_name_icon"><i class="fas fa-arrows-alt-v"></i></span>Club Name</th>
                        <th class="sortingInd" data-sorting_type="asc" data-column_name="league" style="cursor: pointer"><span style="float:left;" id="league_icon"><i class="fas fa-arrows-alt-v"></i></span>League</th>
                        <th class="sortingInd" data-sorting_type="asc" data-column_name="totalfee" style="cursor: pointer"><span style="float:left;" id="totalfee_icon"><i class="fas fa-arrows-alt-v"></i></span>Paid Amount</th>
                        <th class="sortingInd" data-sorting_type="asc" data-column_name="Payment" style="cursor: pointer"><span style="float:left;" id="Payment_icon"><i class="fas fa-arrows-alt-v"></i></span>Payment Method</th>
                        <th class="sortingInd" data-sorting_type="asc" data-column_name="trans_id" style="cursor: pointer"><span style="float:left;" id="trans_id_icon"><i class="fas fa-arrows-alt-v"></i></span>Transaction Id</th>

                        <th style="width:10%;">Actions</th>
                    </tr>
                </thead>
                <tbody class="tbody">
                @include('paymentRequests.pay_group_filter')
                </tbody>
                </table>
                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="club_name" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                </div>
      
</section>
          
          </div>
        </div>
      </div>

<div style="display:none;" class="G">
@include('paymentRequests.G-pay-ReqPrint')
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
        <input type="hidden" id="league" value="">
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
<div class="modal fade" id="deleteModalGroup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            <input type="text" value="" name="Decline" id="resonDeclineGroup" style="width:100%;padding: 7px 20px;margin-top:27px;display: inline-block;
        border: 1px solid #ccc;border-radius: 4px; box-sizing: border-box;" />
        <input type="hidden" id="G-league" value="">
        <input type="hidden" id="G-trans_id" value="">
        <input type="hidden" id="G-id" value="">
                </form>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-danger DeclineYesGroup" value='Yes' />
            </div>
        </div>
    </div>
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>

<script>
  $(function() {

    var table2 = $("#table2").DataTable({

        processing: true,
            serverSide: true,
            ajax: "members/data",
            columns: [
              
                {
                    data: "name"
                },
               
               
                {
                    data: "league.name"
                },
                {
                    data: "Paid Amount"
                },
                {
                    data:"method"
                },
               
                {
                    data: "trans_id"
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                },
            ],
           
            order: [
        [0, "desc"]
      ],
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
        'excel', 'pdf', 'print'
      ],         
        });
    });
</script>
<script>
//approve
$(document).on('click', '.approve', function() {
    var id = $(this).attr('id');
    var league=$(this).attr('league');


    $('#showModal').modal('hide');
    $.ajax({
        type: 'POST',
        url: "{{ route('payment.approve') }}",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id,
            'league': league
        },
        success: function(res) {
            Swal.fire({
                title: 'Approved',
                text: 'Approved Successfully!',
            });
            window.location = res.url;
        },
        error: function(response, status, error) {
            if (response.status === 422) {

            };
        },
    });
});
//decline
$(document).on('click', '.decline', function() {
        var id = $(this).attr('id');
        var league=$(this).attr('league');
        $('#league').val(league);
        $('#id').val(id);
        $('#deleteModal').modal('show');
  
});
$(document).on('click', '.DeclineYes', function() {
    var league=$('#league').val();
    var id=  $('#id').val();
        var remark = $("#resonDecline").val();
    if (remark.trim().length != 0) {
       
        $.ajax({
            type: 'POST',
            url: "{{ route('payment.decline') }}",
            method: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                'id': id,
                'league': league
            },
            success: function(res) {
                Swal.fire({
                    title: 'Declined',
                    text: 'Declined Successfully!',
                });
                window.location = res.url;
            },
            error: function(response, status, error) {
                if (response.status === 422) {

                }
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
//approve
$(document).on('click', '.accept', function() {
var id = $(this).attr('id');
var league=$(this).attr('league');
var transId=$(this).attr('transId');
$.ajax({
    type: 'POST',
    url: "{{ route('group.approve') }}",
    method: "POST",
    data: {
        "_token": "{{ csrf_token() }}",
        'id': id,
        'league':league,
        'transId':transId
    },
    success: function(response) {
        Swal.fire({
            title: 'Approved',
            text: 'Approved Successfully!',
        });
        window.location=response.url;
    },
    error: function(response, status, error) {
        if (response.status === 422) {

        };
    },
});
});
//decline
$(document).on('click', '.reject', function() {
    var id = $(this).attr('id');
var league=$(this).attr('league');
var transId=$(this).attr('transId');
        $('#G-league').val(league);
        $('#G-trans_id').val(transId);
        $('#G-id').val(id);
    $('#deleteModalGroup').modal('show');
   
});
$(document).on('click', '.DeclineYesGroup', function() {
        var remarkG = $("#resonDeclineGroup").val();
        var league=$('#G-league').val();
        var transId=$('#G-trans_id').val();
        var id=$('#G-id').val();
if (remarkG.trim().length != 0) {
    $.ajax({
        type: 'POST',
        url: "{{ route('group.decline') }}",
        method: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            'id': id,
            'league':league,
            'transId':transId

        },
        success: function(res) {
            Swal.fire({
                title: 'Declined',
                text: 'Declined Successfully!',
            });
            window.location = res.url;
        },
        error: function(response, status, error) {
            if (response.status === 422) {

            };
        },
    });
} else {
    $('#deleteModalGroup').modal('hide');

    Swal.fire({
        title: 'Alert',
        text: 'Please Enter the Reason',
    });
}
    });
  $(document).on('click', '#btn2', function() {
    $("#payprint").print();
  });
  $(document).on('keyup', '.input-sm', function() {
        var query = $('.input-sm').val();
        var column_name=$('.sortingg.active').data('column_name');
            var type=$('.sortingg.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
               fetch_data_individual(sort_type,column_name,query);
            });
        $(document).on('click', '.sortingg', function () {
            $('.sortingg.active').removeClass('active');
            $(this).addClass("active");  
            var column_name=$(this).data('column_name');
            var order_type=$(this).data('sorting_type');
            var reverse_order='';
            if (order_type=='asc') {
                $(this).data('sorting_type','desc');
                reverse_order='desc';
            }
            if (order_type=='desc') {
                $(this).data('sorting_type','asc');
                reverse_order='asc';
            }
                var query=$('.input-sm').val();
                fetch_data_individual(order_type,column_name,query);

        });
        function fetch_data_individual(sort_type,sort_by,query) {
            $.ajax({
                url: '/payment-requests/print',
                data:{
                    query:query,
                    'sorttypepay':sort_type,
                    'sortbypay':sort_by,
                },
                success: function(response) {

                $('.printpay').html(response['html']);

                }

            });
        }

        $(document).on('click', '#btn20', function() {
     $.ajax({
                type: "GET",
                url: "/G-pay_request/print",
           
                        success: function(response) {

                $('.G').html(response['html']);
                $("#G-payprint").print();
              
            }

            });
  });

  function clear_icon(){
            $('#club_name_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#league_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#trans_id_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#Payment_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
            $('#totalfee_icon').html('<span><i class="fas fa-arrows-alt-v"></i></span>');
        }
        $(document).on('keyup', '#search3', function() {
        var query3 = $('#search3').val();
        var column_name=$('.sortingInd.active').data('column_name');
            var type=$('.sortingInd.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
        var page=$('#hidden_page').val();
      
               fetch_data(page,sort_type,column_name,query3);
            });
        $(document).on('click', '.sortingInd', function () {
            $('.sortingInd.active').removeClass('active');
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
                var query3=$('#search3').val();
                fetch_data(page,order_type,column_name,query3);

        });
        $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            var column_name=$('.sortingInd.active').data('column_name');
            var type=$('.sortingInd.active').data('sorting_type');
            if(type=="asc"){
                var sort_type="desc";
            }else{
                var sort_type="asc";
            }
            var query3=$('#search3').val();
            console.log(column_name);
            fetch_data(page,sort_type,column_name,query3);

        });

        function fetch_data(page,sort_type,sort_by,query3) {
            console.log(page);
            $.ajax({
                url: '/payment-requests?page='+page,
                data:{
                    query3:query3,
                    'sorttypeGpay':sort_type,
                    'sortbyGpay':sort_by,
                }
            }).done(function (groupRegs) {
                $('.tbody').html(groupRegs);
            }).fail(function () {
                console.log("Failed to load data!");
            });
        }
</script>

@stop