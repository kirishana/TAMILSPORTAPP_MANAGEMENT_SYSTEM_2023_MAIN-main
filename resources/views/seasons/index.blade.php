@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
View Seasons Lists
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />

@stop
{{-- Page content --}}
@section('content2')

<section class="content-header">

        <!--section starts-->
        <h1>Settings</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin/">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>Settings</li>  
            <li class="active">Seasons</li>  

              </ol>
    </section>
    <!--section ends-->
    <section class="content">
    <div class="row">
    <div class="col-md-6">

    <div class="panel panel-primary" id="hidepanel1">
        <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">brightness_4</i>
                    Add Season
                    
                </h3>
                
            </div>
            <div class="alert alert-danger" style="display:none"></div>
                <div class="panel-body">
							
								
                                <div class="col-md-11">
                                 <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                 <div class="form-group label-floating">
                                    <label class="control-label">Season Name</label>
                                    <input name="role" type="text" class="form-control role" maxlength="40" required/>
                                </div>
                                </div>	
                                <div class="col-md-11">
                                    <button style="margin-top:30px;border-radius:30px;"type="submit" class="btn btn-success btn-sm add pull-right">ADD</button>
								</div>
                            </div>
                            </div>
                            </div>
                <div class="col-md-6">
                <div class="alert alert-danger" style="display:none;" id="message"></div>
                <div class="alert alert-danger" style="display:none" id="Notmessage"></div>

                <div class="panel panel-primary" id="hidepanel1">
				<div class="panel-heading">
					<h3 class="panel-title">
  						<i class="material-icons">brightness_4</i> View Seasons
					</h3>
				</div>




                <div class="panel-body">
                <fieldset>
                <div class="col-md-12">

                    <div class="table-scrollable">
                        <table class="table table-striped table-bordered table-responsive ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th style="text-align:center">Status</th>
                                <th style="text-align:center">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="role">                           
                            </tbody>
                        </table>
                        
                    </div>
                    </fieldset>
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
        <p>You Want to Delete this Season Permanently?</p>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success deleteSeason">Yes</button>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->

    <div class="modal-content">

    <div class="modal-header" style="border-bottom:none">
    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edit Season</h2>

    </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">

       

        <div class="md-form ml-0 mr-0">
            <div class="alert edit-danger" style="display:none;background-color:red"></div>
            <input type="hidden" id="id">
            <input name="_method" type="hidden" value="PUT">
          <input type="text" name="name" id="name" class="form-control form-control-sm validate ml-0">
        </div>

        <div class="modal-footer">
        <button type="button" class="btn btn-success update">Update</button>
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
<br/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>

$(document).ready(function () {
     fetchroles();

     function fetchroles()
    {
        $.ajax({
                type:"GET",
                url:"/admin/season/all",
                dataType:"json",
                success:function(response){
                    $('#role').html('');
                    $.each(response.seasons,function(key,item){
                        if(item.status==1){
                        $('#role').append(
                            
                                `<tr> 
  <td style="text-align:center">${item.id}</td>
  <td style="text-align:left">${item.name}</td>
  <td style="text-align:center"> 
  
  <button type="button" class="btn btn-primary btn-xs activate" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" id="${item.id}" data-toggle="tooltip" data-placement="bottom" title="Activate"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">thumb_up</i></button>
  
  </td>
  <td style="text-align:center"> 
  <button type="button" class="btn btn-primary btn-xs edit" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" data-toggle="tooltip" data-placement="bottom" title="Edit"   value="${item.id}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">edit</i></button>

  </td>
</tr>`)}
                            else{
                                $('#role').append(
                                `<tr>
  <td style="text-align:center">${item.id}</td>
  <td style="text-align:left">${item.name}</td>
  <td style="text-align:center">   
  <button type="button" class="btn btn-danger btn-xs deactivate" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" id="${item.id}" data-toggle="tooltip" data-placement="bottom" title="Deactivate"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">thumb_down</i></button> 
                                                </td>
  <td style="text-align:center">
  <button type="button" class="btn btn-primary btn-xs edit" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" data-toggle="tooltip" data-placement="bottom" title="Edit"   value="${item.id}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">edit</i></button>
  <button type="button" class="btn btn-danger btn-xs decline" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" data-toggle="tooltip" data-placement="bottom" title="Delete"   value="${item.id}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">highlight_off</i></button>

                                                </td>
</tr>`);
                            }
                    });
                    }
                });
    }
//approve
$(document).on('click', '.activate', function() {
    
    var id = $(this).attr('id');
    $.ajax({
        type : 'POST',
        url: "/admin/season/activate",
        method:"POST", 
        data:  {        "_token": "{{ csrf_token() }}",
                'id':id},
        success:function (res) {
            // Swal.fire({
            //     title: 'Disabled',
            //     text: 'Disabled Successfully!',
            //     });
                fetchroles();
                                     },
    });

});


//decline


$(document).on('click', '.deactivate', function() {

        var id = $(this).attr('id');

        $.ajax({
            type : 'POST',
            url: "/admin/season/deactivate",
            method:"POST", 
            data:  {        "_token": "{{ csrf_token() }}",
                    'id':id},
            success:function (res) {
                // Swal.fire({
                //     title: 'Enabled',
                //     text: 'Enabled Successfully!',
                //     });
                    fetchroles();
            },
            error: function (response, status, error) {
                if (response.status === 422) {
                   
                };
            },
        });
    
});
$(document).on('click', '.decline', function() {
$('#myModal2').modal('show');
var id = $(this).val();
$('#deleted_id').val(id);
});
$(document).on('click', '.deleteSeason', function() {
    var id = $('#deleted_id').val();

        $.ajax({
            type : 'POST',
            url: "/admin/season/delete",
            method:"POST", 
            data:  {        "_token": "{{ csrf_token() }}",
                    'id':id},
            success:function (res) {
                // Swal.fire({
                //     title: 'Enabled',
                //     text: 'Enabled Successfully!',
                //     });
                $('#myModal2').modal('hide');

                    fetchroles();
                    if(res.status==1){
                        $('#message').html(res.message).show();
                        $('#message').fadeOut(8000);
                    }else{
                        $('#Notmessage').html(res.message).show();
                        $('#Notmessage').fadeOut(6000);
                    }
           

            },
            error: function (response, status, error) {
                if (response.status === 422) {
                   
                };
            },
        });
    
});


$(document).on('click','.add',function(e){
            e.preventDefault();
            var name=$('.role').val();
            $.ajax({
                type:"POST",
                url:"/admin/season/create",
                data: {
        "_token": "{{ csrf_token() }}",
        "name": name
        },
                
                dataType:"json",
                success:function(response){
                    if(response.errors){
                    jQuery.each(response.errors, function(key, value){
                  			jQuery('.alert-danger').show();
                  			jQuery('.alert-danger').append('<p>'+value+'</p>');
                  		});
                    }
                    else{

                        jQuery('.alert-danger').hide();
                    $('.role').val('');
                    fetchroles();
                    }
                }
        });
    });


        

            $(document).on('click','.edit',function(e){
            e.preventDefault();
            var id=$(this).val();
            $('#myModal').modal('show');
            $.ajax({
                type:"GET",
                url:"/admin/season/edit/"+id,

                success:function(response){
                    jQuery('.edit-danger').hide();
                        $('#name').val(response.season.name);
                        $('#id').val(id);

                    }
                });
        });
        $(document).on('click','.update',function(e){
            e.preventDefault();
            var id=$('#id').val();
            var name=$('#name').val();
            var method=$('#_method').val();
            $.ajax({
                type:"POST",
                url:"/admin/season/update/"+id,
                data: {
        "_token": "{{ csrf_token() }}",
        "name": name
        },
                
                dataType:"json",
                success:function(response){
                    if(response.errors){
                    jQuery.each(response.errors, function(key, value){
                  			jQuery('.edit-danger').show();
                  			jQuery('.edit-danger').append('<p>'+value+'</p>');
                    fetchroles();
                  		});
                    }
                    else{

                        jQuery('.edit-danger').hide();
                        $('#myModal').modal('hide');
                    fetchroles();
                    }
                   
                    }
                });
        });
    
});  

    </script>
   
@endsection