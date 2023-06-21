@extends('admin/layouts/default')


{{-- Page title --}}
@section('title')
Edit User
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
    <script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>


		<link rel="stylesheet" href="https://unpkg.com/dropzone/dist/dropzone.css" />
		<link href="https://unpkg.com/cropperjs/dist/cropper.css" rel="stylesheet"/>
		<script src="https://unpkg.com/dropzone"></script>
		<script src="https://unpkg.com/cropperjs"></script>
<!--end of page level css-->
@stop
<style>
    .panel-heading a:hover{
        display:block;
        color:white;
    }
		.image_area {
		  position: relative;
		}

		img {
		  	display: block;
		  	max-width: 100%;
		}

		.preview {
  			overflow: hidden;
  			width: 250px; 
  			height: 250px;
  			margin: 10px;
  			border: 1px solid red;
		}

		.modal-lg{
  			max-width: 1000px !important;
		}

		.overlay {
		  position: absolute;
		  bottom: 5px;
		  left: 0;
		  right: 0;
		  background-color: rgba(255, 255, 255, 0.5);
		  overflow: hidden;
		  height: 0;
		  transition: .5s ease;
		  width: 100%;
		}

		.image_area:hover .overlay {
		  height: 50%;
		  cursor: pointer;
		}

		.text {
		  color: #333;
		  font-size: 20px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  -webkit-transform: translate(-50%, -50%);
		  -ms-transform: translate(-50%, -50%);
		  transform: translate(-50%, -50%);
		  text-align: center;
		}
		
    </style>

{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Edit user</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Users</li>
        <li class="active">Edit User</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="material-icons">person_add</i>
                        Editing user : <span class="user_name_max">{!! $user->first_name!!} {!! $user->last_name!!}</span>
                        <a style="float:right;display:block" href="/users/{{Crypt::encrypt($user->id)}}" style="color:white"><i class="material-icons  leftsize">keyboard_backspace
                        </i>
                            Back</a> 
                        </h3>
                    </h3>

                </div>
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            @if($errors->any())
                            <div id="notification_remove">
                                @foreach ($errors->all() as $error)
                                <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                            @endif
                            <form name="commentForm" id="commentForm" action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_method" value="PATCH" />
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <div>

                                    <ul style="background:none" class="nav nav-tabs ">
                                        <li class="nav-item active" test="#tab1">
                                            <a class="panel-title" href="#tab1" data-toggle="tab">
                                                My Profile</a>
                                        </li>
                                        <li class="nav-item" test="#tab2">
                                            <a class="panel-title" href="#tab2" data-toggle="tab">
                                                Bio</a>
                                        </li>
                                        <li test="#tab3">
                                            <a class="panel-title" href="#tab3" data-toggle="tab">
                                                Contact Info</a>
                                        </li>

                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active in" id="tab1">
                                            <h2 class="hidden">&nbsp;</h2>

                                            <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                                <label for="first_name" class="col-sm-2 control-label">First Name <span style="color:red;"><b> *</b></span></label>
                                                <div class="col-sm-10">
                                                    <input id="first_name" name="first_name" type="text" placeholder="First Name" class="form-control required" value="{!! old('first_name', $user->first_name) !!}" />
                                                </div>
                                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                            </div>

                                             <div class="form-group {{ $errors->first('first_name', 'has-error') }}">
                                                <label for="first_name" class="col-sm-2 control-label">Last Name <span style="color:red;"><b> *</b></span></label>
                                                <div class="col-sm-10">
                                                    <input id="last_name" name="last_name" type="text" placeholder="Last Name" class="form-control required" value="{!! old('last_name', $user->last_name) !!}" />
                                                </div>
                                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                                            </div>

                                            <div class="form-group {{ $errors->first('email', 'has-error') }}">
                                                <label for="email" class="col-sm-2 control-label">Email <span style="color:red;"><b> *</b></span></label>
                                                <div class="col-sm-10">
                                                    <input id="email" name="email" disabled placeholder="E-Mail" type="text" class="form-control required email" value="{!! old('email', $user->email) !!}" />
                                                </div>
                                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                                            </div>

                                           

                                        
                                            <a class="previous" style="float:right" href="#tab2" data-toggle="tab"> Next &raquo;</a>

                                        </div><br>

                                        <div class="tab-pane" id="tab2" disabled="disabled">
                                            <h2 class="hidden">&nbsp;</h2>
                                            <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                                <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                                                <div class="col-sm-10">
                                                    <input id="dob" name="dob" type="date" class="form-control" disabled value="{!! old('dob', $user->dob) !!}" placeholder="yyyy-mm-dd" />
                                                </div>
                                                {!! $errors->first('dob', '<span class="help-block">:message</span>') !!}
                                            </div>
                                            <!-- guardian -->

                                            @if ($age<18) 
                                            <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                                <label for="dob" class="col-sm-2 control-label">Guardian Name</label>
                                                <div class="col-sm-10">
                                                    <input id="dob" name="gu_name" type="text" class="form-control" value="{!! old('dob', $user->guardian_name) !!}" />
                                                </div>
                                        </div>

                                        <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                            <label for="dob" class="col-sm-2 control-label">Guardian Email</label>
                                            <div class="col-sm-10">
                                                <input id="dob" name="gu_email" type="text" class="form-control" value="{!! old('dob', $user->guardian_mail) !!}" />
                                            </div>
                                        </div>


                                        <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                            <label for="dob" class="col-sm-2 control-label">Guardian Contact Number</label>
                                            <div class="col-sm-10">
                                                <input id="dob" name="gu_number" type="text" class="form-control" value="{!! old('dob', $user->guardian_number) !!}" />
                                            </div>
                                        </div>
                                        @endif
                                        <!-- end guardian -->
                                        <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                                            <label for="email" class="col-sm-2 control-label">Gender </label>
                                            <div class="col-sm-10">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="radio" name="gender" class="flat-red" value="male" @if($user->gender === 'male') checked="checked" @endif/>
                                                        <label>Male</label>
                                                    </label>
                                                    <label>
                                                        <input type="radio" name="gender" class="flat-red" value="female" @if($user->gender === 'female') checked="checked" @endif/>
                                                        <label>Female</label>
                                                    </label>

                                                </div>
                                            </div>
                                            {!! $errors->first('gender', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group" style="margin-left:100px ;" >
                                        <!-- <label for="pic" style="text-align:left ;" class="col-sm-12 control-label">Profile picture (250px x 250px)</label> -->

                                            <div class="col-sm-12">

                                                <div class="fileinput fileinput-new image_area"   data-provides="fileinput">
                                                    <form method="post">
							<label for="upload_image">
                            @if($user->profile_pic)
                            <img src="/profile/{{ $user->profile_pic}}" id="uploaded_image"  class="img-responsive img-circle" alt="Tamil Sangam">
                           
                            @elseif($user->gender=="male")
                            <img src="{{ asset('assets/images/authors/malelogo.png') }}" id="uploaded_image" class="img-responsive img-circle" alt="..." class="img-circle  img-responsive pull-left" style="width:250px;height:250px;"  class="img-circle" />
                          
                            @else
                            <img src="{{ asset('assets/images/authors/avatar5.png') }}" id="uploaded_image" class="img-responsive img-circle" alt="..." class="img-circle  img-responsive pull-left" style="width:250px;height:250px;" class="img-circle" />
                           
                            @endif
								<div class="overlay">
									<div class="text">Click to Change Profile Picture</div>
								</div>
								<input type="file" name="" class="image upload_image" id="upload_image"  style="display:none" />
								<input type="hidden" name="" class="" id="userId" value="{{$user->id}}" style="display:none" />
								<input type="hidden" name="ImageUrl" class="ImageUrl" value="{!! old('ImageUrl', $user->ImageUrl) !!}"/>
							</label>

						</form>
                                                   
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <a class="next" href="#tab1" data-toggle="tab">
                                                &laquo; Previous
                                            </a>

                                            <a class="previous" style="float:right" href="#tab3" data-toggle="tab">
                                                Next &raquo;</a>
                                    </div>


                                    <div class="tab-pane" id="tab3" disabled="disabled">
                                        <div class="form-group {{ $errors->first('state', 'has-error') }}">
                                            <label for="state" class="col-sm-2 control-label">Tel Number </label>
                                            <div class="col-sm-10">
                                                <input id="state" name="tel" type="tel" class="form-control" value="{!! old('tel',$user->tel_number) !!}" />
                                            </div>
                                            {!! $errors->first('tel', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group required {{ $errors->first('country', 'has-error') }}">
                                            <label for="country" class="col-sm-2 control-label">Country </label>
                                            <div class="col-sm-10">
                                                <select name="country" class="form-control">
                                                    @foreach($countries as $country)
                                                    <option name="country" value="{{$country->id}}" {{$user->country->name==$country->name?'selected':''}}>{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                        </div>
                                          <div class="form-group required {{ $errors->first('country', 'has-error') }}">
                                            <label for="country" class="col-sm-2 control-label">Organization </label>
                                            <div class="col-sm-10">
                                                <select name="organization" class="form-control">
                                                    @foreach($orgs as $org)
                                                    <option name="organization" value="{{$org->id}}" {{$user->organization_id?$user->organization_id==$org->id?'selected':'':''}}>{{$org->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        {{--  @if(Auth::user()->hasRole(3))
                                        @else
                                         <div class="form-group">
                                            <label for="country" class="col-sm-2 control-label">Club </label>
                                            <div class="col-sm-10">
                                                <select name="club" class="form-control">
                                                    <option selected value="0">Select Club</option>
                                                    @foreach($clubs as $club)
                                                    <option name="club" value="{{$club->id}}" {{$user->club_id?$user->club_id==$club->id?'selected':'':''}}>{{$club->club_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                        </div>
@endif  --}}
                                        <div class="form-group {{ $errors->first('state', 'has-error') }}">
                                            <label for="state" class="col-sm-2 control-label">State </label>
                                            <div class="col-sm-10">
                                                <input id="state" name="state" type="text" class="form-control" value="{!! old('state', $user->state) !!}" />
                                            </div>
                                            {!! $errors->first('state', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group {{ $errors->first('city', 'has-error') }}">
                                            <label for="city" class="col-sm-2 control-label">City </label>
                                            <div class="col-sm-10">
                                                <input id="city" name="city" type="text" class="form-control" value="{!! old('city', $user->city) !!}" />
                                            </div>
                                            {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group {{ $errors->first('address', 'has-error') }}">
                                            <label for="address" class="col-sm-2 control-label">Address </label>
                                            <div class="col-sm-10">
                                                <input id="address" name="address" type="text" class="form-control" value="{!! old('address', $user->address) !!}" />
                                            </div>
                                            {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                        </div>

                                        <div class="form-group {{ $errors->first('postal', 'has-error') }}">
                                            <label for="postal" class="col-sm-2 control-label">Postal/zip</label>
                                            <div class="col-sm-10">
                                                <input id="postal" name="postal" type="text" class="form-control" value="{!! old('postal', $user->postal) !!}" />
                                            </div>
                                            {!! $errors->first('postal', '<span class="help-block">:message</span>') !!}
                                        </div>
                                        <a class="previous" style="float:right">
                                            <button type="submit">Finish</button></a>

                                        <a class="next" href="#tab2" data-toggle="tab">
                                            &laquo; Previous
                                        </a>
                                    </div>



                                </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!--main content end-->
            </div>
        </div>
    </div>
    </div>

    <!--row end-->
</section>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			  	<div class="modal-dialog modal-lg" role="document">
			    	<div class="modal-content">
			      		<div class="modal-header">
			        		<h5 class="modal-title">Crop and set your image</h5>
			        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          			<span aria-hidden="true">×</span>
			        		</button>
			      		</div>
			      		<div class="modal-body">
			        		<div class="img-container">
			            		<div class="row">
			                		<div class="col-md-8">
			                    		<img src="" id="sample_image" />
			                		</div>
			                		<div class="col-md-4">
			                    		<div class="preview"></div>
			                		</div>
			            		</div>
			        		</div>
			      		</div>
			      		<div class="modal-footer">
			      			<button type="button" id="crop" class="btn btn-primary">Crop</button>
			        		<button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
			      		</div>
			    	</div>
                    </div>
			</div>			
		</div>
@stop

<!--  -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 

<script type="text/JavaScript" src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.0/jQuery.print.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){
var img=$('.ImageUrl').val();
if(img.length!=0){
    $('#uploaded_image').attr('src',img);
}
});
    jQuery(document).ready(function($){
$('.previous').click(function(){
    var href=$(this).attr('href');
    $('.nav-tabs li').removeClass('active');
    $('.nav-tabs li').each(function(i)
{

   var active=$(this).attr('test'); 
   if(active==href){
    $(this).addClass("active");
   }

});
});
$('.next').click(function(){
    var href=$(this).attr('href');
    $('.nav-tabs li').removeClass('active');
    $('.nav-tabs li').each(function(i)
{

   var active=$(this).attr('test'); 
   if(active==href){
    $(this).addClass("active");
   }

});});
    $(function() {
        $('.reportImage').hide();

        //show it when the checkbox is clicked
        $('input[name="checkbox"]').on('click', function() {
            if ($(this).prop('checked')) {
                $('.reportImage').fadeIn();
            } else {
                $('.reportImage').hide();
            }
        });
    });
    });

    $('#modal').modal({
    backdrop: 'static',
    keyboard: false
})

    $(document).ready(function(){

var $modal = $('#modal');

var image = document.getElementById('sample_image');

var cropper;

$('#upload_image').on('change',function(event){
    
    var files = event.target.files;
    var done = function(url){
        image.src = url;
        $modal.modal('show');
    };

    if(files && files.length > 0)
    {
        file=files[0];
        if(URL){
            done(URL.createObjectURL(file));

        }else if(FileReader){
            reader = new FileReader();
        reader.onload = function(event)
        {
            done(reader.result);
        };
        reader.readAsDataURL(file);
        }
       
    }
});

$modal.on('shown.bs.modal', function() {
    cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview:'.preview'
    });
}).on('hidden.bs.modal', function(){
    cropper.destroy();
       cropper = null;

});
$('#crop').click(function(){
    canvas = cropper.getCroppedCanvas({
        width:250,
        height:250,
    });

    canvas.toBlob(function(blob){
        url = URL.createObjectURL(blob);
        $('#uploaded_image').attr('src',url);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function(){
            var base64data = reader.result;
            var id=$('#userId').val();
            $('.ImageUrl').val(base64data);
                    $modal.modal('hide');
        };
    });
});

});
</script>
{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<!-- <script src="{{ asset('assets/js/pages/edituser.js') }}" type="text/javascript"></script> -->
@stop