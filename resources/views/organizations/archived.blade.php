@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Organizations
Tamil Sangam
@stop

{{-- page level styles --}}
<style>
  div.dataTables_wrapper  div.dataTables_filter {
  width: 100%;
  float: none;
  padding-right: 53px;

  text-align: left;
  /* padding-right: 10px; */
      /* font-size: 20px; */
}
</style>
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
@stop


{{-- Page content --}}
@section('content2')
<section class="content-header">
    <h1>Archived Organizations</h1>
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
                    Archived Organizations
                    <div  style="float:right">
                    <a href="/organizations/create" style="color:white"><i class="material-icons  leftsize">add_circle</i>
                    Add New</a>
                    </div>
                     
                </h4>
                
            </div>
            <br>              
            <div class="row">
  <div class="col-md-9"></div>

<div class="col-md-3 export-button" style="margin-top: 5px; display:flex; justify-content:flex-end;">
    <a id="btn12"  style="cursor:pointer;margin-right:5px;"><img src="{{asset('assets/images/print.png')}}" style="float: right;"class="img-responsive" /> </a>
    <a href="/organizations-arch-pdf" target="_blank"> <img src="{{asset('assets/images/pdf.png')}}" style="float: right;margin-right:5px;" class="img-responsive" /></a>
    <a href="/Arch-organizationsExcel"> <img src="{{asset('assets/images/excel.png')}}"  style="float: right;margin-right:18px;"class="img-responsive" /></a>
</div>
  </div>
            <div class="panel-body table-responsive" style="overflow:hidden;">
              
              <table class="table table-striped table-bordered" style="width: 100%;" id="table3">

                <thead class="thead-Dark">
                    <tr>
                        <th></th>
                        <th >Org No</th>
                        <th margin:0px;>Name</th>
                        <th style="text-transform: none;">E-mail</th>
                        <th margin:0px;>Mobile</th>
                        <th margin:0px;>City</th>
                        <th margin:0px;>Country</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody style="text-transform:capitalize">
                </tbody>
            </table>
            </div>
            <div style="display: none;">
    @include('organizations.archived_org_print')
  </div>     
        </div>
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}

<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js"
    integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(function() {
        function format(d) {
    // `d` is the original data object for the row
    return (
      '<table class="table table-striped table-bordered" cellpadding="5" style="padding-left:50px;">' +
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
      "<td>Postal Code:</td>" +
      "<td>"+d.postalcode+"</td>" +
      "</tr>" +
      "<tr>" +
      "<td>Tel Number:</td>" +
      "<td>"+d.tpnumber+"</td>" +
      "</tr>" +
      "<tr>" +
      "<td>Created Date:</td>" +
      "<td>"+d.created_at+"</td>" +
      "</tr>" +
      "</table>"
    );
  }
       var table3= $("#table3").DataTable({
        rowCallback: function(row, data, index) {
        $(row).find('td:eq(0)').css('width', '2%');
        $(row).find('td:eq(1)').css('width', '8%');
        $(row).find('td:eq(2)').css('width', '25%');
        $(row).find('td:eq(3)').css('width', '25%');
        $(row).find('td:eq(4)').css('width', '15%');
        $(row).find('td:eq(5)').css('width', '15%');
        $(row).find('td:eq(6)').css('width', '10%');
        $(row).find('td:eq(6)').css('padding-bottom','0px');
        $(row).find('td:eq(6)').css('margin-top','200px');

    },
              
    ajax: "/organizations/data/archived",
    columns: [
      {
        className: "details-control",
        orderable: false,
        searchable: false,
        info:false,
        data: null,
        defaultContent: "",
      },
      { data: "orgnum" },
      { data: "name" },
      { data: "email" },
      { data: "mobile" },
      { data: "city" },
      { data: "country.name" },
      { data: "actions" },
    ],
    order: [[1, "asc"]],
    responsive: true,
     dom: 'Bfrtip',
        // buttons: [
        //      'excel', 'pdf', 'print'
        // ],
  });

    // Add event listener for opening and closing details
  $("#table3 tbody").on("click","td.details-control",function () {
     
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
});
</script>

<div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content"></div>
  </div>
</div>
<script>
    $('#table3').on('click', '.delete' ,function(){
        var id=$(this).attr('data-id');
                    $('#deleted_id').val(id);

             $('#deleteModal').modal('show');

});

$(document).on('click','.yes',function(e){
            e.preventDefault();
            var id=$('#deleted_id').val();
            var method=$('#_method').val();

            $.ajax({
                type:"POST",
                url:"/organizations/revert/"+id,
                dataType:"json",
                data:  {       
                    'id':id},
                success:function(response){
                    window.location.href=response.url;

                }
                });
                

});
//em=nd
</script>
<script>
  $(document).on('keyup', '.search', function(e) {
    e.preventDefault();
     var query = $(this).val()
    //  alert(query);
     $.ajax({
                // type: "GET",
                url: "/organizations",
                data:{
                  query:query

                },
                      
            });
    // alert(query);
  });
  $(document).on('click', '#btn12', function() {
// alert();
     $.ajax({
                type: "GET",
                url: "/organizationsprint-arch",
                // data:{
                //   // query:query

                // },
                        success: function(response) {
                $('#arch-orgprint').html(response['html']);
                $("#arch-orgprint").print();
            }

            });
  });

</script>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"> 
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>             
            <h4 class="modal-title" id="myModalLabel"> Revert Organization</h4>
        </div>
        <input type="hidden" id="deleted_id">
         <input type='hidden' name='data_id' id="del_id"/>   
         <input name="_method" type="hidden" value="PUT">

          <div class="modal-body">   
                Are you sure you want to revert this organization?            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <input type="submit" class="btn btn-danger yes" value='Yes'/>
          </div>
    </div>
  </div>
</div>
@stop
