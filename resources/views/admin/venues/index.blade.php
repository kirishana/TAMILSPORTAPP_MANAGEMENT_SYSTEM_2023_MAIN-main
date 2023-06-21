@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Venues
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <style>
/* 
.dataTables_filter input[type="search"]{
    float:right;
    text-align: left;

} */
div.dataTables_wrapper  div.dataTables_filter {
  width: 100%;
  float: none;
  text-align: left;
  display: none;
  
  
}
  </style>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
 <h1>{{ __('sidebar.venues') }}</h1>
  <ol class="breadcrumb">
    <li>
      <a href="/admin">
        <i class="material-icons breadmaterial">home</i>
        Dashboard
      </a>
    </li>
    <li class="active">All Venues</li>
  </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
  <div class="row">
    <div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title">
          <i class="material-icons  6:34 PM 9/24/2021">room</i>
          {{ __('sidebar.all_venues') }}
          <div style="float:right">
            <a href="/venues/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
              {{ __('staffs.add_new') }}</a>
          </div>
        </h4>

      </div>
      <div class="panel-body table-responsive" style="overflow:hidden " >

      <div class="row">
                <div class="col-md-3">
                  <!-- <input type="text" name="search" id="search" class="form-control" placeholder="Search Events" /> -->
                  <input id="search1" class="search" value="" name="search" placeholder="Search" type="text" style="
        width: 65%;
        padding: 7px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
                </div>
      <div class="col-md-6"></div>

<div class="col-md-3 export-button" style="margin-top: 35px; display:flex; justify-content:flex-end;">
    <a id="btn2"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/venues/pdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="venues/excel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:20px;"class="img-responsive" /></a>
</div>
                    </div>

              <table class="table table-striped table-bordered table-hover" id="table3" style="width:100%">
                <thead class="thead-Dark">
                  <tr>
                  <th style="width:10%;"></th>
              <th class="sortingg" data-sorting_type="asc" data-column_name="name">{{ __('venue.place') }}</th>
              <th class="sortingg" data-sorting_type="asc" data-column_name="email">{{ __('dashboard.email') }}</th>
              <th class="sortingg" data-sorting_type="asc" data-column_name="track_event_name">{{ __('venue.track') }}</th>
              <th class="sortingg" data-sorting_type="asc" data-column_name="field_event_name">{{ __('venue.field') }}</th>
              <th class="sortingg" data-sorting_type="asc" data-column_name="mobile">{{ __('club.mobile') }}</th>
              <th>{{ __('dashboard.actions') }}</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="name" />
                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
            
            <div class="row" style="display:none;">
              @include('admin.venues.venues_print')
            </div>
         </div>
      </div>
    </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
  
  $(function() {
    function format(d) {
      return (
        '<table class="table table-striped table-bordered" cellpadding="5" style="padding-left:50px;">' +
        "<tr>" +
        "<td>{{ __('dashboard.address') }}:</td>" +
        "<td>" +
        d.location +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('dashboard.city') }}:</td>" +
        "<td>" +
        d.city +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('venue.contact_person') }}:</td>" +
        "<td>" + d.person_name + "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('dashboard.phone_no') }}:</td>" +
        "<td>" + d.tp + "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('venue.lattitude') }}:</td>" +
        "<td>" + d.latitude + "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('venue.longitude') }}:</td>" +
        "<td>" + d.longitude + "</td>" +
        "</tr>" +
      
        "<td>{{ __('club.created_date') }}:</td>" +
        "<td>" +
        d.created_at +
        "</td>" +
        "</tr>" +
        "</table>"
      );
    }
    fill_datatable();

function fill_datatable(filter_league = '') {
     var table3 = $("#table3").DataTable({
      processing: true,
        serverSide: true,
        ajax: {
          url: "venues/data",
          data: {
            filter_league: filter_league,
          }
        },
      columns: [{
        className: "details-control",
          orderable: false,
          searchable: false,
          info: false,
          data: null,
          defaultContent: "",
        },
       
        {
          data: "name"
        },
        {
          data: "email"
        },
        {
          data: "tracks"
        },

        {
          data: "fields"
        },
        {
          data: "mobile"
        },
        {
          data: "actions"
        },
      ],
      order: [
        [1, "desc"]
      ],
      responsive: true,
      dom: 'Bfrtip',
      buttons: [
        'excel', 'pdf', 'print'
      ],
      

     
    });

    // Add event listener for opening and closing details
    $("#table3 tbody").on("click", "td.details-control", function() {

      var tr = $(this).closest("tr");
      $("#table3.DataTable").removeClass("collapsed");
      var row = table3.row(tr);

      if (row.child.isShown()) {
        // This row is already open - close it
        row.child.hide();
        tr.removeClass("shown");
      } else {
        // Open this row
        row.child(format(row.data())).show();
        tr.addClass("shown");
        tr.next().children().css("pointer-events", "none");
      }
    });
 
}

$(document).on('keyup', '#search1', function(e) {
      e.preventDefault();
      var filter_league = $(this).val();
        $('#table3').DataTable().destroy();
        fill_datatable(filter_league);
    
    });

  });  
  $('#table3').on('click', '.delete', function() {
    var id = $(this).attr('data-id');
    $('#deleted_id').val(id);

    // $('#myModalDelete').modal('show');

  });
  $(document).on('click', '#btn2', function() {
                $("#printVenues").print();
  });
  $(document).on('keyup', '.search', function() {
        var query = $('.search').val();
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
                var query=$('.search').val();
                fetch_data_individual(order_type,column_name,query);

        });
        function fetch_data_individual(sort_type,sort_by,query) {
            $.ajax({
                url: '/venues/print',
                data:{
                    query:query,
                    'sorttype':sort_type,
                    'sortby':sort_by,
                },
                success: function(response) {

                $('.venue').html(response['html']);

                }

            });
        }

        
  $(document).on('click', '.yes', function(e) {
    e.preventDefault();
    var id = $('#deleted_id').val();
    $.ajax({
      type: "DELETE",
      url: "/venues/delete/" + id,
      dataType: "json",
      data: {
        'id': id
      },
      success: function(response) {
        $('#myModalDelete').modal('hide');
        window.location.reload();
        // fetchroles();
      }
    });

  });
</script>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Delete Venue</h4>
      </div>
      <input type="hidden" id="deleted_id">

      <input type='hidden' name='data_id' id="del_id" />
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-danger yes" value='Delete' />
      </div>
    </div>
  </div>
</div>

@stop