@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
View Roles
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
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
            <li class="active">Country</li>  

              </ol>
    </section>
    <!--section ends-->
    <section class="content">
	<div class="row">

		<div class="col-md-4">
			<div class="panel panel-primary" id="hidepanel1">
				<div class="panel-heading">
					<h3 class="panel-title">
  						<i class="material-icons">flag</i> Add Country
				</div>

				<div class="panel-body">
					<!-- <form class="" role="form" action="#" method="post"> -->
						<fieldset>
							<div class="col-md-12">
								<div class="form-group label-floating">
								<div class="col-md-11">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group label-floating">
                                <label class="control-label">Country Name</label>
                                <input name="country" type="text" class="form-control country" maxlength="40" required/>
                            </div>
                            <br>
                            <div>
							
                            
                            
                            <label>Currency</label>
                            <select id="select26" class="form-control select2 currency">
                                <option disabled selected>Select Currency</option>
                                @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->currency_iso_code }} </option>
                                @endforeach
                            </select>

                            </div>
                            <br>
                            <div>
                                <label>Country Code</label>
                                <select id="select22" class="form-control select2 code">
                                    <option disabled selected>Select Country Code</option>
                                    @foreach($countryCodes as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }} </option>
                                    @endforeach
                                </select>
    
                                </div>
                        </div>	  
                        	  
                        <div class="col-md-9"></div>       
                        <div class="col-md-3">
                            <button style="margin-top:30px;border-radius:30px;"type="submit" class="btn btn-success btn-sm add">ADD</button>
                            		
                        </div>

								</div>
							</div>
						</fieldset>
					<!-- </form> -->
				</div>

			</div>
		</div>



<div class="col-md-8">
<div class="alert alert-success" style="display:none;" id="message"></div>
                <div class="alert alert-danger" style="display:none" id="Notmessage"></div>
			<div class="panel panel-primary" id="hidepanel1">
				<div class="panel-heading">
					<h3 class="panel-title">
  						<i class="material-icons">flag</i> View Country
					</h3>
				</div>

				<div class="panel-body">
					<!-- <form class="form-horizontal" role="form" action="#" method="post"> -->
						<fieldset>
							<div class="col-md-12">
								<div>
								<div class="table-scrollable">
                        <table class="table table-striped table-bordered table-responsive">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Country Name</th>                               
                                {{-- <th>Country Admin</th> --}}
                                <th>Currency</th>
                                <th>Country Code</th>
                                {{-- <th>Email</th> --}}
                                
                                <th style="text-align:center">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="country">  
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$country->id}}</td>
                                    <td>{{$country->name}}</td>
                                    
                                    {{-- <td>
                                        @php
                                    $countryAdmin =App\User::role('CountryAdmin')->where('country_id',$country->id)->where('is_approved',1)->first('first_name');
                                    $obj = json_decode($countryAdmin);
                                    $countryAdmin?print $obj->{'first_name'}:''
                                    @endphp
                                         </td> --}}
                                         <td>{{$country->currency?$country->currency->currency_iso_code:''}}</td>
                                         <td>{{$country->countryCode?$country->countryCode->name:''}}</td>     
                                    {{-- <td>
                                        @php
                                    $contact =App\User::role('CountryAdmin')->where('country_id',$country->id)->where('is_approved',1)->first('email');
    
                                    $obj1 = json_decode($contact);
                                    $contact?print $obj1->{'email'}:''

                                @endphp
                                </td> --}}
                                
                                <td> <center> 
                                 <!-- <button class="edit" style="padding: 2px 6px;  background-color: Transparent; border: none;"data-tog gle="tooltip" data-placement="bottom" title="Edit"   value="{{$country->id}}"><i class="material-icons text-primary">edit</i></button> -->
                                 <button type="button" class="btn btn-primary btn-xs edit" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" data-toggle="tooltip" data-placement="bottom" title="Edit"   value="{{$country->id}}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">edit</i></button>
                                 <button type="button" class="btn btn-danger btn-xs delete" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" data-toggle="tooltip" data-placement="bottom" title="Delete"   value="{{$country->id}}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;">highlight_off</i></button>

                                <!-- <button class="btn btn-primary edit" style="padding: 2px 6px"data-toggle="tooltip" data-placement="bottom" title="Edit"   value="{{$country->id}}"><i class="material-icons text-light ">edit</i></button> -->
								</center></td>
                                </tr>

                                @endforeach   
                            </tbody>
                        </table>

                        
                        
                    </div>
								

									
								</div>
							</div>
						</fieldset>
					<!-- </form> -->
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
        <p>You Want to Delete this Country Permanently?</p>
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-success deleteCountry">Yes</button>
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
    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edit Country</h2>

    </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">


     

        <div class="form-group">
        <input type="hidden" id="id">
            <input name="_method" type="hidden" value="PUT">
            <div class="form-group">
                <label class="control-label">Country Name</label>
                <input name="country" type="text" class="form-control countryEdit" maxlength="40" required/>
            </div>
            <br>
            <div>
            
            
            
            <label>Currency</label>
            <select id="select24" class="form-control select2 currencyEdit">
               
            </select>

            </div>
            <br>
            <div>
                <label>Country Code</label>
                <select id="select25" class="form-control select2 codeEdit">
                   
                </select>

                </div>
        </div>	     
                    </div>
<br>
    
        <div class="modal-footer">
        <button type="button" class="btn btn-success update">Update</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>



      </div>

    </div>
    
    <!--/.Content-->
  </div>
  
</div>
</section>


<br/>
<br/>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}" ></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}" ></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>

$(document).ready(function () {
     
$(document).on('click','.add',function(e){
            e.preventDefault();
            var data=$('.country').val();
            var isoCode=$('.currency').val();
            var countryCode=$('.code').val();

            $.ajax({
                type:"POST",
                url:"/admin/country/create",
                data: {
        "_token": "{{ csrf_token() }}",
        "data": data,
        "isoCode":isoCode,
        "countryCode":countryCode
        },
                
                dataType:"json",
                success:function(response){
                    $('.country').val('');
                    $('.currency').val('');
                    $('.code').val('');

                    window.location="{{ route('countries') }}";
                    }
                });
        });

            $(document).on('click','.edit',function(e){
            e.preventDefault();
            var id=$(this).val();
            $('#myModal').modal('show');
            $.ajax({
                type:"GET",
                url:"/admin/country/edit/"+id,
                success:function(response){                        
                        $('#id').val(id);
                        $('.countryEdit').val(response.country.name)
                        $('.currencyEdit').empty(); 
                        $('.currencyEdit').append(
                                "<option> Select Currency</option>");
                        $.each(response.currencies, function(key, item) {
                            if(response.country.currency_id==item.id){
                                $('.currencyEdit').append(
                                    "<option value='" + item.id + "' selected>" + item.currency_iso_code + "</option>")

                                }
                            $('.currencyEdit').append(
                                "<option value='" + item.id + "'>" + item.currency_iso_code + "</option>");
                        });
                        $('.codeEdit').empty(); 
                        $('.codeEdit').append(
                                "<option> Select Country Code</option>");
                        $.each(response.countryCodes, function(key, item) {
                            if(response.country.country_code_id==item.id){
                                $('.codeEdit').append(
                                    "<option value='" + item.id + "' selected>" + item.name + "</option>")

                                }
                            $('.codeEdit').append(
                                
                                "<option value='" + item.id + "'>" + item.name + "</option>");
                        });
                    }
                });
        });
        $(document).on('click','.update',function(e){
            e.preventDefault();
            var id=$('#id').val();
            var name=$('.countryEdit').val();
            var countryCode=$('.codeEdit').val();
            var currency=$('.currencyEdit').val();
            var method=$('#_method').val();
            $.ajax({
                type:"POST",
                url:"/admin/country/membership/"+id,
                data: {
        "_token": "{{ csrf_token() }}",
        "countryCode": countryCode,
        "id":id,
        "currency":currency,
        "name":name,
        "method":method
        },
                
                dataType:"json",
                success:function(response){
                    $('#myModal').modal('hide');
                    window.location.href=response.url;

                    }
                });
        });
    


});
$(document).on('click', '.delete', function() {
$('#myModal2').modal('show');
var id = $(this).val();
$('#deleted_id').val(id);
});
$(document).on('click', '.deleteCountry', function() {
    var id = $('#deleted_id').val();

        $.ajax({
            type : 'POST',
            url: "/admin/country/delete",
            method:"POST", 
            data:  {        "_token": "{{ csrf_token() }}",
                    'id':id},
            success:function (res) {
                // Swal.fire({
                //     title: 'Enabled',
                //     text: 'Enabled Successfully!',
                //     });
                $('#myModal2').modal('hide');

                    if(res.status==1){
                       
                        $('#Notmessage').html(res.message).show();
                        $('#Notmessage').fadeOut(8000);
                    }else{
                        $('#message').html(res.message).show();
                        $('#message').fadeOut(6000);

                    }
                    window.location.href=res.url;


            },
            error: function (response, status, error) {
                if (response.status === 422) {
                   
                };
            },
        });
    
});
    </script>
   
@endsection