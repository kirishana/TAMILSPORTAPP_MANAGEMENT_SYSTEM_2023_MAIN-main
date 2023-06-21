@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Leagues
Tamil Sangam
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
  div.dataTables_wrapper div.dataTables_filter {
    width: 100%;
    float: right;
    text-align: right;
    padding-right: 60px;
    /* font-size: 20px; */
  }
</style>
@stop
{{-- Page content --}}
@section('content')
<section class="content-header">
  <h1>{{ __('sidebar.leagues') }}</h1>
  <ol class="breadcrumb">
    <li>
      <a href="/admin">
        <i class="material-icons breadmaterial">home</i>
        Dashboard
      </a>
    </li>
    <li><a href="#"> Leagues</a></li>
    <li class="active">All Leagues</li>
  </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
<div class="alert alert-success" style="display:none;" id="successMessage">
    </div>
<div class="alert alert-danger" style="display:none;" id="DeletedMessage">
    </div>
  <div class="row">
    <div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title">
          <i class="material-icons  6:34 PM 9/24/2021">golf_course</i>
          {{ __('sidebar.leagues') }}
          <div style="float:right">
            @if (Auth::guard('web')->user()->can('Create-league2'))

            <a href="/leagues/create" style="color:white"><i class="material-icons  leftsize">add_circle_outline</i>
            {{ __('sidebar.add_new') }}</a>
            @endif
          </div>
        </h4>

      </div>
      <br />

      <div>

        <ul style="background:none" class="nav  nav-tabs ">
          <li class="active">
            <a class="panel-title" href="#tab1" data-toggle="tab">
              {{ __('league.future_leagues') }}</a>
          </li>
          <li>
            <a class="panel-title" href="#tab2" data-toggle="tab">
              {{ __('league.past_leagues') }}</a>
          </li>



        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="tab2">

            <div class="panel-body table-responsive" style="overflow:hidden ">
              <div class="row">
                <div class="col-md-3">
                  <input id="search" value="" name="search" placeholder="Search" type="text" style="
                    width: 65%;
                    padding: 7px 20px;
                    margin-top:27px;
                    display: inline-block;
                    border: 1px solid #ccc;
                    border-radius: 4px; 
                    box-sizing: border-box;">
                </div>
                <div class="col-md-9 export-button" style="margin-top: 5px; display:flex; justify-content:flex-end;">
                  <a id="btn10" style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;" class="img-responsive" /> </a>
                  <a href="/leaguespdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
                  <a href="/leaguesexcel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
                </div>
              </div>
              <br>
              <table class="table table-striped table-hover table-bordered" style="width: 100%;" id="table2">
                <thead class="thead-Dark">
                  <tr>
                    <th></th>
                    <th>{{ __('league.league') }}</th>
                    <th>{{ __('league.venue') }}</th>
                    <th class="country">{{ __('league.season') }}</th>
                    <th>{{ __('league.duration') }}</th>
                    <th>{{ __('league.reg_end_date') }}</th>
                    @if (Auth::user()->hasAnyPermission(['Edit-league','view-leagues']))
                    <th>{{ __('dashboard.actions') }}</th>
                    @endif
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
              <div style="display:none">
                @include('admin.leagues.leaguePrint')

              </div>
            </div>
          </div>
          <div class="tab-pane fade active in" id="tab1">
            <div class="panel-body table-responsive" style="overflow:hidden ">
              <div class="row">
                <div class="col-md-3">
                  <!-- <input type="text" name="search" id="search" class="form-control" placeholder="Search Events" /> -->
                  <input id="search1" value="" name="search" placeholder="Search" type="text" style="
        width: 65%;
        padding: 7px 20px;
        margin-top:27px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px; 
        box-sizing: border-box;">
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3 export-button" style="margin-top: 5px;display:flex; justify-content:flex-end;">
                  <a id="btn11" style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;" class="img-responsive" /> </a>
                  <a href="/futureleaguespdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
                  <a href="/futureleagueexcel"> <img src="{{asset('assets/images/excel.png')}}" style="float: right;margin-right:0px;" class="img-responsive" /></a>
                </div>
              </div>
              <br>
              <table class="table table-striped table-bordered table-hover" id="table3" style="width:100%">
                <thead class="thead-Dark">
                  <tr>
                    <th style="width:5px;" class=""></th>
                    <th>{{ __('league.league') }}</th>
                    <th>{{ __('league.venue') }}</th>
                    <th class="country">{{ __('league.season') }}</th>
                    <th>{{ __('league.duration') }}</th>
                    <th>{{ __('league.reg_end_date') }}</th>
                    @if (Auth::user()->hasAnyPermission(['Edit-league','view-leagues']))
                    <th>{{ __('dashboard.actions') }}</th>
                    @endif
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
            <div style="display:none">
              @include('admin.leagues.futureleaguePrint')

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
<script>
  $(function() {
    function format(d) {
      // `d` is the original data object for the row
      return (
        '<table class="table table-striped table-bordered" cellpadding="5" style="padding-left:50px;">' +
        "<tr>" +
        "<td>{{ __('league.st_date') }}:</td>" +
        "<td>" +
        d.reg_start_date+
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('league.champ_method') }}:</td>" +
        "<td>" +
        d.champion +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('sidebar.created_date') }}:</td>" +
        "<td>" + d.created_at + "</td>" +
        "</tr>" +
        "</table>"
      );
    }
    fill_datatable_pastLeague();

    function fill_datatable_pastLeague(filter_past_league = '') {

      var table2 = $("#table2").DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "leagues/data",
          data: {
            filter_past_league: filter_past_league
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
            data: "venue.name"
          },
          {
            data: "season.name"
          },
          {
            data: "duration"
          },
          {
            data: "reg_end_date"
          },
          {
            data: "actions"
          },
        ],
        order: [
          [1, "desc"]
        ],
        responsive: true,
        bFilter: false,
        dom: 'Bfrtip',
        buttons: [
          'excel', 'pdf', 'print'
        ],
      });
      // Add event listener for opening and closing details
      $("#table2 tbody").on("click", "td.details-control", function() {

        var tr = $(this).closest("tr");
        $("#table2.DataTable").removeClass("collapsed");
        var row = table2.row(tr);

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
    $(document).on('keyup', '#search', function(e) {
      e.preventDefault();
      var filter_past_league = $(this).val();
      if (filter_past_league != '') {
        $('#table2').DataTable().destroy();
        fill_datatable_pastLeague(filter_past_league);
      } else {
        $('#table2').DataTable().destroy();
        fill_datatable_pastLeague(filter_past_league);
      };

    });

  });

  //table3
  $(function() {
    function format(d) {
      // `d` is the original data object for the row
      return (
        '<table class="table table-striped table-bordered" cellpadding="5" style="padding-left:50px;">' +
        "<tr>" +
        "<td>{{ __('league.st_date') }}:</td>" +
        "<td>" +
        d.reg_start_date +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('league.champ_method') }}:</td>" +
        "<td>" +
        d.champion +
        "</td>" +
        "</tr>" +
        "<tr>" +
        "<td>{{ __('sidebar.created_date') }}:</td>" +
        "<td>" + d.created_at + "</td>" +
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
          url: "future-leagues/data",
          data: {
            filter_league: filter_league
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
            data: "venue.name"
          },
          {
            data: "season.name"
          },
          {
            data: "duration"
          },
          {
            data: "reg_end_date"
          },
          {
            data: "actions"
          },
        ],
        order: [
          [1, "desc"]
        ],
        responsive: true,
        bFilter: false,
        bInfo: false,
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
    //em=nd
    $(document).on('keyup', '#search1', function(e) {
      e.preventDefault();
      var filter_league = $(this).val();
      if (filter_league != '') {
        $('#table3').DataTable().destroy();
        fill_datatable(filter_league);
      } else {
        $('#table3').DataTable().destroy();
        fill_datatable(filter_league);
        // alert('Select Both filter option');
      };
    });

  });
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"></div>
  </div>
</div>
<script>
  $('#table2').on('click', '.delete', function() {
    var id = $(this).attr('data-id');
    $('#deleted_id').val(id);

    // $('#myModalDelete').modal('show');

  });

  
  $(document).on('click', '#cancelled', function(e) {
    var id = $(this).attr('data-id');
    $('#Delete_league_id').val(id);
    $('#Delete').modal('show');
  });
  $(document).on('click', '.cancel', function() {
    var id = $('#Delete_league_id').val();
    $('#Delete').modal('hide');

      $.ajax({
      type: "POST",
      url: "/leagues/cancel/"+id,
      dataType: "json",
      data: {
        "_token": "{{ csrf_token() }}",
        'id': id,
      },
      success: function(response) {
        $("#table2").DataTable().ajax.reload();
        $("#table3").DataTable().ajax.reload();
        $('#DeletedMessage').html(response.message);
        $('#DeletedMessage').show();
        $('#DeletedMessage').fadeOut(6000);
        var id=response.league;
        Send_Mail_Delete(id);

      }
    });
  });
  $(document).on('click', '#postponed', function(e) {
    $('#errordateperiod').hide();
    $('#errorfromDate').hide();


    var id = $(this).attr('data-id');
    $('#postponedModal').modal('show');

    $.ajax({
      type: "GET",
      url: "/leagues/Postponed/" + id,
      dataType: "json",
      data: {
        'id': id
      },
      success: function(response) {
      
          $('#from_date').val(response.league_from);
        $('#to_date').val(response.league_to);
        $('#leagename').html(response.leagueName);
        $('#league_id').val(response.league_id);
      }
    });


  });

 
  $(document).on('click', '.post', function() {
    $('#errordateperiod').hide();
    $('#errorfromDate').hide();

    var id = $('#league_id').val();
    var fromDate = $('#from_date').val();
    var toDate = $('#to_date').val();
    if(fromDate=='' || toDate==''){
      $('#errorfromDate').show();
      $('#postponedModal').modal('show');
    }else{
      $('#postponedModal').modal('hide');

      $.ajax({
      type: "POST",
      url: "/postponed/sendMail",
      dataType: "json",
      data: {
        "_token": "{{ csrf_token() }}",
        'id': id,
        'fromDate': fromDate,
        'toDate': toDate,
      },
      success: function(response) {
        $("#table3").DataTable().ajax.reload();
        $('#successMessage').html(response.message);
        $('#successMessage').show();
        $('#successMessage').fadeOut(6000);
        var id=response.league;
        Send_Mail(id);

        console.log(id);

      }
    });
    }
  });
  function Send_Mail(id) {
                $.ajax({
                    url: "/mail/" + id,
                    method: 'POST',
                    data: {
                        'id':id,
                    },
                    success: function(response) {
        $("#table3").DataTable().ajax.reload();
        $('#successMessage').html(response.message);
        $('#successMessage').show();
        $('#successMessage').fadeOut(6000);

      }
                })

            }
  function Send_Mail_Delete(id) {
                $.ajax({
                    url: "/mailDeleteLeague/" + id,
                    method: 'POST',
                    data: {
                        'id':id,
                    },
                    success: function(response) {
        $("#table3").DataTable().ajax.reload();
        $('#successMessage').html(response.message);
        $('#successMessage').show();
        $('#successMessage').fadeOut(6000);

      }
                })

            }


  $(document).on('click', '.yes', function(e) {
    e.preventDefault();
    var id = $('#deleted_id').val();
    $.ajax({
      type: "DELETE",
      url: "/leagues/delete/" + id,
      dataType: "json",
      data: {
        'id': id
      },
      success: function(response) {
        window.location.reload();
        // fetchroles();
      }
    });

  });

  $(document).on('click', '#btn10', function() {

    $.ajax({
      type: "GET",
      url: "/leaguesprint",
      // data:{
      //   // query:query

      // },
      success: function(response) {
        $('#printleagues').html(response['html']);
        $("#printleagues").print();
      }

    });
  });

  $(document).on('click', '#btn11', function() {
    $.ajax({
      type: "GET",
      url: "/leaguesFutureprint",
      // data:{
      //   // query:query

      // },
      success: function(response) {
        $('#printleaguesf').html(response['html']);
        $("#printleaguesf").print();
      }

    });
  });
</script>
<!-- postponeModal -->
<div class="modal fade" id="postponedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Postpone League [<span id="leagename"></span>]</h4>
      </div>
     
      
      <div class="modal-body">
      <span id="errordateperiod" style="color: red;font-weight:6px;">*Please choose Date after yesterday</span>
      <span id="errorfromDate" style="color: red;font-weight:6px;">*Please fill both fields</span>
      <input class="form-control" type="hidden" name='league_id' id="league_id">
        <table style="border: none;">
        <tr>
          <td style="border: none;width:20%">From Date</td>
          <td style="border: none;width:80%"> <input class="form-control"   required type="date" name='from_date' id="from_date">
         

      </td>
        </tr>
        <tr>
          <td style="border: none;width:20%">To Date</td>
          <td style="border: none;width:80%"><input class="form-control" required type='date' name='to_date' id="to_date" /></td>
        </tr>
        </table>
      <br>
        Are you sure you want to postpone this league?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-danger post" id="button" value='PostPone' />
      </div>
    </div>
  </div>
</div>
<!-- deletemodal -->
<div class="modal fade" id="Delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Delete League</h4>
      </div>
      <input type='hidden' name='Delete_league_id' id="Delete_league_id" />
      <div class="modal-body">
        Are you sure you want to delete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <input type="submit" class="btn btn-danger cancel" value='Delete' />
      </div>
    </div>
  </div>
</div>

<!--  -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> Delete League</h4>
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