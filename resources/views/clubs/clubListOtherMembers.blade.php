@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Clubs List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />
<link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/advmodals.css') }}" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
@stop
<style>
   .example::-webkit-scrollbar {
  display: none;
}

.example {
  -ms-overflow-style: none;
}
.content2 {
    display: block;
    width: auto;
}
#table2 {
    width: 100%;
    overflow-x: scroll;
  }
  div.dataTables_wrapper  div.dataTables_filter {
  width: 99%;
  padding-right: 45px;
  float:inline-end;
  text-align: left;
  /* padding-right: 10px; */
      /* font-size: 20px; */
}
</style>


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
        <li class="active">Clubs List</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons">group</i>
                    {{ __('sidebar.clubs') }}
                    <div style="float:right">
                        <a href="/club/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                            {{ __('sidebar.add_new') }}</a>
                    </div>
                </h4>
            </div>

 
            <div class="panel-body" >

            <div class="row">
      <div class="col-md-9"></div>

<div class="col-md-3 export-button" style="margin-top: 15px; display:flex; justify-content:flex-end;">
    <a id="btn10"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/club-pdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/clubexcel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:5px;margin-right:13px"class="img-responsive" /></a>
</div>
                    </div>
                    <br>
                    <div class="table-responsive">
                    <table class="table table-striped table-bordered table-responsive " id="table2">
                        <thead class="thead-Dark">
                            <tr class="filters" style="text-align: center">
                                <th> </th>
                                <!-- <th>ID</th> -->
                                <th >{{ __('club.club_name') }}</th>
                                <th >{{ __('club.reg_no') }}</th>
                                <th style="text-transform: none;">{{ __('dashboard.email') }}</th>
                                <th >{{ __('club.mobile') }}</th>
                                <th >{{ __('club.members') }}</th>
                                <th > {{ __('club.establish_date') }}</th>
                                <th > {{ __('dashboard.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>
                    </div>

                <div style="display: none;">
                    @include('clubs.All_club_print')
                </div>
        </div>
</div>
</div>
</div>
</section>
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
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

<script>
    $(function() {
        function format(d) {
            // `d` is the original data object for the row
            return (
                '<table class="table table-striped table-bordered" cellpadding="5" style="padding-left:50px;">' +
                    "<tr>" +
                "<td>Club Admin {{ __('dashboard.email') }}:</td>" +
                "<td>" +
                d.admin +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>{{ __('dashboard.address') }}:</td>" +
                "<td>" +
                d.address +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>{{ __('dashboard.city') }}:</td>" +
                "<td>" +
                d.city +
                "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>{{ __('club.country') }}:</td>" +
                "<td>" + d.country.name + "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>{{ __('dashboard.postal_code') }}:</td>" +
                "<td>" + d.postal + "</td>" +
                "</tr>" +
                "<tr>" +
                "<td>{{ __('club.created_date') }}:</td>" +
                "<td>" + d.created_at + "</td>" +
                "</tr>" +
                "</table>"
            );
        }
        var table2 = $("#table2").DataTable({
            rowCallback: function(row, data, index) {
        $(row).find('td:eq(0)').css('width', '4%');
        $(row).find('td:eq(1)').css('width', '25%');
        $(row).find('td:eq(2)').css('width', '12%');
        $(row).find('td:eq(3)').css('width', '25%');
        $(row).find('td:eq(4)').css('width', '12%');
        $(row).find('td:eq(5)').css('width', '2%');
        $(row).find('td:eq(6)').css('width', '13%');
        $(row).find('td:eq(7)').css('width', '5%');

    },

            ajax: "club/data",
            columns: [{
                    className: "details-control",
                    orderable: false,
                    searchable: false,
                    info: false,
                    data: null,
                    defaultContent: "",
                },
                // {
                //     data: 'id'
                // },
                {
                    data: 'club_name'
                },
                {
                    data:'club_registation_num' 
                },
                {
                    data: 'club_email'
                },
                {
                    data: 'mobile'
                },
                {
                    data:'members'
                },
               
                {
                    data: 'club_start_date'
                },
                {
                    data: 'actions',
                    name: 'actions',
                    orderable: false,
                    searchable: false
                }

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
    });
    
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
</script>



<script type="text/javascript">
    //approve
    $(document).on('click', '.approve', function() {

        var id = $(this).val();

        $('#showModal').modal('hide');

        $.ajax({
            type: 'POST',
            url: "/new-club/approve/" + id,
            method: "POST",
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
            // ------------------------
            // $role = Auth::user()->roles->pluck('name')[0];
            // if($role!='ClubAdmin'){
            // $user->removeRole($role);
            // $user->assignRole('ClubAdmin');
            // $user->save();
            // };
            // ----------------------------
        });

    });


    //decline


    $(document).on('click', '.decline', function() {
        var id = $(this).val();

        $('#id').val(id);
        $('#deleteModal').modal('show');
       
    });
    $(document).on('click', '.DeclineYes', function() {
        var remark = $("#resonDecline").val();
        var id=$('#id').val();

        if (remark.trim().length != 0) {


            $.ajax({
                type: 'POST',
                url: "/new-club/decline/" + id,
                method: "POST",
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
    $(document).on('keyup', '.search', function(e) {
    e.preventDefault();
     var query = $(this).val()
    //  alert(query);
     $.ajax({
                // type: "GET",
                url: "/all-clubs",
                data:{
                  query:query

                },
                      
            });
    // alert(query);
  });
  $(document).on('click', '#btn10', function() {
// alert();
     $.ajax({
                type: "GET",
                url: "/club-print",
                // data:{
                //   // query:query

                // },
                        success: function(response) {
                $('#clubprint').html(response['html']);
                $("#clubprint").print();
            }

            });
  });

</script>

@stop