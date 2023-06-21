@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Inquaries
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Inquaries</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial active">home</i>
                Inquaries
            </a>
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  leftsize">group</i>
                    Inquaries
                    {{-- <div  style="float:right">
                        <a href="#" style="color:white" class="addRequest"><i class="material-icons  leftsize">add_circle_outline</i>
                        Add Request</a>
                       
                </button>
                        </div> --}}
                </h4>
            </div>
            <br />
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table" width="100%" style="text-transform: capitalize;">
                        <thead class="thead-Dark">
                            <tr class="filters text-center">
                                <th>Organization/Club</th>
                                <th colspan="2">Leave</th>
                                <th colspan="2">Delete</th>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Leave</th>
                                <th>Status</th>
                                <th>Delete</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                           @if(Auth::user()->organization)
                           <tr class="text-center">
                               <td><strong>{{ Auth::user()->organization->name }}</strong></td>
                               <td>
                                <button  class="btn btn-warning leave"  data-name="org" data-orgclub="{{ Auth::user()->organization->name }}" value="{{ Auth::user()->organization_id }}"  style="padding: 2px 6px;text-transform:none;">Leave</button>
                               </td>
                               <td>
                                <button class="btn btn-info" value="pending">Pending</button>
                               </td>
                               <td>
                                <button  class="btn btn-danger delete"  data-name="org" data-orgclub="{{ Auth::user()->organization->name }}" value="{{ Auth::user()->organization_id }}" style="padding: 2px 6px;text-transform:none;" >Delete Data</button>

                            </td>
                            <td></td>
                           </tr>
                           @endif
                           @if(Auth::user()->club)
                           <tr class="text-center">
                               <td><strong>{{ Auth::user()->club->club_name }}</strong></td>
                               <td>
                                <button  class="btn btn-warning leave"  data-name="club" data-orgclub="{{ Auth::user()->club->club_name }}" value="{{ Auth::user()->club_id }}"  style=" margin:0; padding: 2px 6px;text-transform:none;">Leave</button>
                               </td>
                               <td></td>
                               <td>
                                <button  class="btn btn-danger delete"  data-name="club" data-orgclub="{{ Auth::user()->club->club_name }}" value="{{ Auth::user()->club_id }}"  style=" margin:0; padding: 2px 6px;text-transform:none;" >Delete Data</button>

                            </td>
                            <td></td>
                           </tr>
                           @endif


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- row-->
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<div class="modal fade pullDown" id="modal-4" role="dialog" aria-labelledby="modalLabelnews">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title" id="modalLabelnews">Leaving from <span id="orgorclub"></span></h4>
            </div>
            <div class="modal-body">
                <p>
                    Are you sure!
                    you want to  leave from  <span id="orgorclub1"></span> ?
                </p>
                <input type="hidden" id="hidden" name="orgorclub">
                <input type="hidden" id="name" >

            </div>
            <div class="modal-footer">
                <button class="btn  btn-success yes" >Yes</button>
                <button class="btn  btn-danger no" data-dismiss="modal">No</button>

            </div>
        </div>
    </div>
</div>

<script>
 var table = document.getElementById('tbody'), 
    rows = table.getElementsByTagName('tr'),
    i, j, cells, customerId;

for (i = 0, j = rows.length; i < j; ++i) {
    cells = rows[i].getElementsByTagName('td');
    if (!cells.length) {
        continue;
    }
    var button=cells[2].innerText;
    if(button=='PENDING'){
        // $('.leave').prop('disabled',true);
        //  cells[1].addClass('disabled');
        console.log(cells[1]);
        $( cells[1] ).prop( "disabled", true );

        // var new_row = '<td><button class="btn btn-warning leave"  data-name="org"  style="padding: 2px 6px;text-transform:none;">Leave</button></td>';
        // cells[1].replaceWith(new_row);
    }
}
    $(document).on('click','.leave',function(){
        $('#modal-4').modal('show');
        $('#orgorclub').empty();
        $('#orgorclub1').empty();
        var orgorclub=$(this).attr('data-orgclub');
        var value=$(this).val();
        var name=$(this).attr('data-name');
        $('#orgorclub').append(orgorclub);
        $('#orgorclub1').append(orgorclub);
        $('#hidden').val(value);
        $('#name').val(name);



    });
    $(document).on('click','.yes',function(e){
        e.preventDefault();
        var orgclub = $('#hidden').val();
        var name=$('#name').val();
        $.ajax({
            type: "POST",
            url: "/orgorclub/leave",
            data: {
                "_token": "{{ csrf_token() }}",
                "orgclub": orgclub,
                "name":name
            },

            dataType: "json",
            success: function(response) {
                $('#modal-4').modal('hide');
                Swal.fire({
                    title: "Leave Request",
     text: "Leave Request has been sent successfully!",
    type: "success"
}).then(function() {
    window.location.href=response.url;
});

            }
        });

    });
    </script>

@stop