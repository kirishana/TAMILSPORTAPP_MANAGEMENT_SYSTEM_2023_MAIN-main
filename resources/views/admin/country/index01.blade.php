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
    <section class="content paddingleft_right15">


    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">person</i>
                    Currency
                    
                </h4>
            </div>

            <div class="panel-body">
            
				<div class="col-md-4">
                        <div class="col-md-10">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                            <div class="form-group label-floating">
                                <label class="control-label">Country Name</label>
                                <input name="country" type="text" class="form-control country" maxlength="40" required/>
                            </div>
                            <br>
                            <div>
                            
                            
                            <label>Currency</label>
                            <select id="name" name="currency" class="form-control">
                                <option disabled selected>Select Currency</option>
                                @foreach($currencies as $currency)
                                <option value="{{ $currency->id }}">{{ $currency->currency_iso_code }} </option>
                                @endforeach
                            </select>

                            </div>
                        </div>	  
                        	  
                        <div class="col-md-7"></div>       
                        <div class="col-md-5">
                            <button style="margin-top:30px;border-radius:30px;"type="submit" class="btn btn-success btn-sm add">ADD</button>		
                        </div>
                </div>
 
                           <div class="col-md-6">
                             <div class="panel-body">
                               <div class="table-responsive">
                               <div class="portlet box primary">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="material-icons">person</i>Country Lists
                    </div>
                </div>

                
                <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-hover" style="border:grey;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Country Name</th>
                                
                                <th>Country Admin</th>
                                <th>Currency</th>
                                <th>Email</th>
                                
                                <th style="text-align:center">Actions</th>
                            </tr>
                            </thead>
                            <tbody id="country">  
                            @foreach($countries as $country)
                                <tr>
                                    <td>{{$country->id}}</td>
                                    <td>{{$country->name}}</td>
                                    
                                    <td>
                                        @php
                                    $countryAdmin =App\User::role('CountryAdmin')->where('country_id',$country->id)->where('is_approved',1)->first('first_name');
                                    $obj = json_decode($countryAdmin);
                                    $countryAdmin?print $obj->{'first_name'}:''
                                    @endphp
                                         </td>
                                         <td>
                                         
                                         {{$country->currency?$country->currency->currency_iso_code:''}}
                                         
                                         </td>

                                         
                                    <td>
                                        @php
                                    $contact =App\User::role('CountryAdmin')->where('country_id',$country->id)->where('is_approved',1)->first('email');
    
                                    $obj1 = json_decode($contact);
                                    $contact?print $obj1->{'email'}:''

                                @endphp
                                </td>
                                
                                <td>  <button class="btn btn-primary edit" style="padding: 2px 6px"data-toggle="tooltip" data-placement="bottom" title="Edit"   value="{{$country->id}}"><i class="material-icons text-light ">edit</i></button>
</td>
                                </tr>

                                @endforeach   
                            </tbody>
                        </table>

                        
                        
                    </div>

                    
                </div>
            </div>

       
            <!-- <label for="select23" class="control-label">
                                Select2 select with country flag
                            </label>
                            <select id="select23" class="form-control select2">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                            </select> -->
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

    <div class="modal-header" style="border-bottom:none">
    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Change Membership</h2>

    </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">


        <div class="md-form ml-0 mr-0">
            <input type="hidden" id="id">
            <input name="_method" type="hidden" value="PUT">
            <select id="name" name="name">
                <option>Select Country Admin</option>
                @foreach($countryAdmins as $coiuntryAdmin)
                <option value="{{ $coiuntryAdmin->id }}">{{ $coiuntryAdmin->first_name }} - {{ $coiuntryAdmin->country->name }} </option>
                @endforeach
            </select>
            
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
            var isoCode=$('#name').val();
            $.ajax({
                type:"POST",
                url:"/admin/country/create",
                data: {
        "_token": "{{ csrf_token() }}",
        "data": data,
        "isoCode":isoCode
        },
                
                dataType:"json",
                success:function(response){
                    $('.country').val('');
                    $('.name').val('');

                    window.location.href=response.url;
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

                    }
                });
        });
        $(document).on('click','.update',function(e){
            e.preventDefault();
            var id=$('#id').val();
            var data=$('#name').val();
            var method=$('#_method').val();
            $.ajax({
                type:"POST",
                url:"/admin/country/membership/"+id,
                data: {
        "_token": "{{ csrf_token() }}",
        "data": data,
        "id":id,
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
    </script>
   
@endsection