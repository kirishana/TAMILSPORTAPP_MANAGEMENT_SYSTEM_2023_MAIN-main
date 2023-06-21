@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Organizations
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}"/>
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Organizations</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Organization</a></li>
        <li class="active">All Organizations</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    Organizations
                    <div  style="float:right">
                    <a href="/organizations/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                    Add New</a>
                    </div>
                </h4>
                
            </div>
            <br />
            
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>

<script>
    $(function() {
        function format(d) {
    // `d` is the original data object for the row
    return (
      '<table class="table table-striped" cellpadding="5" style="padding-left:50px;">' +
      "<tr>" +
      "<td>Address:</td>" +
      "<td>" +
      d.address +
      "</td>" +
      "</tr>" +
      "<tr>" +
      "<td>State:</td>" +
      "<td>" +
      d.state +
      "</td>" +
      "</tr>" +
      "<tr>" +
      "<td>Mobile:</td>" +
      "<td>"+d.mobile+"</td>" +
      "</tr>" +
      "<tr>" +
      "<td>Postal Code:</td>" +
      "<td>"+d.postalcode+"</td>" +
      "</tr>" +
      "</table>"
    );
  }
       var table2= $("#table2").DataTable({
        
    ajax: "organizations/data",
    columns: [
      {
        className: "details-control",
        orderable: false,
        searchable: false,
        info:false,
        data: null,
        defaultContent: "",
      },
      { data: "id" },
      { data: "name" },
      { data: "email" },
      { data: "tpnumber" },
      { data: "country.name" },
      { data: "created_at" },
      { data: "actions" },
    ],
    order: [[1, "asc"]],
    responsive: true,
    dom: 'Bfrtip',
        buttons: [
             'excel', 'pdf', 'print'
        ],
  });

    // Add event listener for opening and closing details
  $("#table2 tbody").on("click","td.details-control",function () {
     
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
    $('#table2').on('click', '.delete' ,function(){
        var id=$(this).attr('data-id');
                    $('#deleted_id').val(id);

            // $('#myModalDelete').modal('show');

});

$(document).on('click','.yes',function(e){
            e.preventDefault();
            var id=$('#deleted_id').val();
            $.ajax({
                type:"DELETE",
                url:"/organizations/delete/"+id,
                dataType:"json",
                data:  {       
                    'id':id},
                success:function(response){
                    window.location.reload();
                    // fetchroles();
                    }
                });

});
//em=nd
</script>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    
    <div class="modal-content">
      <div class="modal-header"> 
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>             
            <h4 class="modal-title" id="myModalLabel"> Delete Organization</h4>
        </div>
        <input type="hidden" id="deleted_id">

         <input type='hidden' name='data_id' id="del_id"/>   
          <div class="modal-body">   
                Are you sure you want to delete?            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-danger yes" value='Delete'/>
          </div>
    </div>
  </div>
</div>
@stop
