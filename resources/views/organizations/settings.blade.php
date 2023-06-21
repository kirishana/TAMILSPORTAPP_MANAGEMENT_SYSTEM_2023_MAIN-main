@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Settings
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />


<link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" media="screen" />
<link href="{{ asset('assets/vendors/summernote/summernote.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/vendors/trumbowyg/css/trumbowyg.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/vendors/trumbowyg/css/trumbowyg.colors.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />

<link href="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/css/bootstrap3-wysihtml5.min.css') }}" rel="stylesheet" media="screen" />
<link href="{{ asset('assets/css/pages/editor.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/buttons.css') }}" />

@stop
{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>{{ __('sidebar.settings') }} </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin/">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li> <a href="/organizations/view/{{Auth::user()->id}}">
                <i class="material-icons breadmaterial">spa</i>
                Settings
            </a></li>

        <li class="active">General</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="material-icons  6:34 PM 9/24/2021">settings</i>
                        {{ __('sidebar.general') }}

                        <a style="float:right" href="/organizations/view/{{Auth::user()->id}}"><i class="material-icons  leftsize">keyboard_backspace
                            </i>
                            {{ __('staffs.back') }}</a>


                    </h4>

                </div>
                <div class="tab-content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="panel-heading">

                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <form id="example-form" method="post" enctype="multipart/form-data" action="/organizations/ownership/{{$organization}}">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" name="id" value="{{$organization}}">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 250px;background-color:grey; ">
                                                    <?php
                                                    $org = App\Models\Organization::find($organization);
                                                    ?>
                                                    @if($org->orgsetting)
                                                    @if(Auth::user()->organization_id )
                                                    <img src="/organization/{{ Auth::user()->organization->orgsetting->org_logo }}" style="width:250px;" alt="">
                                                    @else
                                                    <img src="/organization/{{ $org->orgsetting->org_logo }}" style="width:300px;" alt="">

                                                    @endif
                                                    @else


                                                    <img src="{{asset('assets/noimages/dashboard.png')}}" alt="Tamil Sangam Association" class="img-responsive" />
                                                    @endif
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="width:250px;height:50px;"></div>
                                                <div>
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new" style="text-transform:none;font-size:15px;">{{ __('settings.org_logo') }} <br><span style="text-transform:none;font-size:10px;">(250px * 50px)</span></span>
                                                        <span class="fileinput-exists">Change</span>
                                                        <input type="file" name="org_logo" class="image">
                                                    </span>
                                                    <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-3">
                                    
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 250px;">
                                                <?php
                                                $org = App\Models\Organization::find($organization);
                                                ?>
                                                @if($org->orgsetting)
                                                @if(Auth::user()->organization_id )
                                                <img src="/organization/invoice/{{ Auth::user()->organization->orgsetting->invoice_logo }}"  alt="">
                                                @else
                                                <img src="/organization/invoice/{{ $org->orgsetting->invoice_logo }}"  alt="">

                                                @endif
                                                @else


                                                <img src="{{asset('assets/noimages/invoice.png')}}" alt="Tamil Sangam Association" class="img-responsive" />
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="width:250px;"></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new" style="text-transform:none;font-size:15px;">{{ __('settings.invoice_logo') }} <br><span style="text-transform:none;font-size:10px;">(250px * 50px)</span></span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="invoice_logo" class="image">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width:250px;">
                                                <?php
                                                $org = App\Models\Organization::find($organization);
                                                ?>
                                                @if($org->orgsetting)
                                                
                                                
                                                <img src="/organization/player/{{ $org->orgsetting->player_number_logo }}"  alt="">
                                               
                                              
                                                @else


                                                <img src="{{asset('assets/noimages/playerNumber.jpg')}}" alt="Tamil Sangam Association" class="img-responsive" />
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="width:250px;"></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new" style="text-transform:none;font-size:15px;">{{ __('settings.player_number') }} <br> <span style="text-transform:none;font-size:10px;">(2480px * 1504px)</span></span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="player_number_logo" class="image">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width:250px;">
                                                <?php
                                                $org = App\Models\Organization::find($organization);
                                                ?>
                                                @if($org->orgsetting)
                                                
                                                
                                                <img src="/organization/staffId/{{ $org->orgsetting->staff_id }}"  alt="">
                                               
                                              
                                                @else


                                                <img src="{{asset('assets/noimages/staffId.jpg')}}" alt="Tamil Sangam Association" class="img-responsive" />
                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="width:250px;"></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new" style="text-transform:none;font-size:15px;">{{ __('settings.staff_id_card') }} <br><span style="text-transform:none;font-size:10px;">(874px * 1241px)</span></span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="staffId" class="image">
                                                </span>
                                                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width:700px;">
                                            <div class="fileinput-new thumbnail" style="width:1100px;">
                                                <?php
                                                $organization = App\Models\Organization::find($organization);
                                                ?>

                                                @if($organization->orgsetting)
                                                <img src="/organization/header/{{ $org->orgsetting->header }}" style="width:1100px;" alt="Tamil Sangam Norway">
                                                @else
                                                <img src="{{ asset('assets/noimages/header.jpg') }}" style="width:1100px;" alt="..." class="img-responsive" />
                                                @endif
                                            </div>
                                        </div>

                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width:1100px;"></div>
                                        <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new" style="text-transform:none">{{ __('settings.header') }} (705px*120px)</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="header">
                                            </span>
                                            <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-12">
                                  <label class="control-label" for="firstName3">{{ __('settings.footer') }} 
                                        </label>
                                    <div class="bootstrap-admin-panel-content">
                                        <textarea id="ckeditor_full" name="description">{{ $org->orgsetting?$org->orgsetting->footer:'' }}</textarea>
                                    </div>
                                    
                                </div>
                            </div>
                            <br>
                             <div class="row">
                          <div class="col-md-6 togglebutton">
                             <label>
                                {{ __('settings.two_factor') }}
                                 @if($org->orgsetting!=null)
                                <input type="checkbox" class="toggle_btn" name="twofactor" {{$org->orgsetting->two_factor_auth== 1? 'checked' : ''}}>
                                @else
                                 <input type="checkbox" class="toggle_btn" name="twofactor">
                                 @endif
                            </label>
                        </div>
                        </div>
                    
                            <div class="row">
                            <div class="col-md-6 togglebutton">
                            <label>
                               {{ __('settings.optional_que') }}
                                @if($org->orgsetting)
                                <input type="checkbox" name="active" id="toggle"  class="toggle_btn optional"  {{$org->orgsetting->active== 1? 'checked' : ''}}>
                                @else
                                <input type="checkbox" name="active" id="toggle"  class="toggle_btn optional" >
                                @endif
                            </label>
                        </div>
                            </div>
                            <div class="row optionalQuestions" id="optionalQuestions" style="display:none;">
                                <div class="col-md-12 form-group label-floating">
                                        <input type="text" class="form-control" name="question" id="firstName3" value="{{ $org->orgsetting?$org->orgsetting->extra_question:'' }}">
                                        
                                </div>
                                <div class="col-md-12">
                                    <div class="bootstrap-admin-panel-content">
                                    <label class="control-label" for="firstName3">{{ __('staffs.yes') }}
                                        </label>
                                        <textarea id="ckeditor_full" name="yes">{{ $org->orgsetting?$org->orgsetting->yes:'' }}</textarea>
                                    </div>
                                    
                                </div>
                                <div class="col-md-12">
                                    <div class="bootstrap-admin-panel-content">
                                    <label class="control-label" for="firstName3">{{ __('staffs.no') }}
                                        </label>
                                        <textarea id="ckeditor_full" name="no">{{ $org->orgsetting?$org->orgsetting->no:'' }}</textarea>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="col-md-12 form-group">
                                <label class="control-label" for="discount">{{ __('settings.discount') }}</label>
                                        <input type="text" class="form-control" name="discount" id="" value="{{$org->orgsetting?$org->orgsetting->discount:''}}">   
                                </div>
                               
                           
                             
                            </div>
                            <div class="col-md-12">
                                    <div class="bootstrap-admin-panel-content">
                                    <label class="control-label" for="firstName3">{{ __('settings.terms') }}
                                        </label>
                                        <textarea id="ckeditor_full" name="terms">{{ $org->orgsetting?$org->orgsetting->terms_conditions:'' }}</textarea>
                                    </div>
                                    
                                </div>
                            <button style="float:right;margin-top:10px;" type="submit" class="btn btn-responsive btn-warning submit submit">{{ __('settings.update') }}</button>

                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
    </div>


</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script src="{{ asset('assets/vendors/ckeditor/js/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/ckeditor/js/jquery.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/ckeditor/js/config.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/editor1.js') }}" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>

<script src="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrap3-wysihtml5-bower/js/bootstrap3-wysihtml5.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/summernote/summernote.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.base64.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.colors.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.noembed.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.pasteimage.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.preformatted.min.js') }}" type="text/javascript">
</script>
<script src="{{ asset('assets/vendors/trumbowyg/js/trumbowyg.upload.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/editor2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>

<script src="{{asset('assets/vendors/tinymce/tinymce.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/buttons.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function(){
        if($('#toggle').prop('checked')==true){
        $('#optionalQuestions').show();
     }else{
        $('#optionalQuestions').hide();
     }
    });
    $(document).on('click', '.yes', function(e) {
        e.preventDefault();
        var id = $('#deleted_id').val();
        var data = $('#data').val();
        var image = $('#image').val();


        $.ajax({
            type: "post",
            url: "/organizations/ownership/" + id,
            dataType: "json",
            data: {
                'id': id,
                'data': data,
                'image': image
            },
            success: function(response) {
                $('#myModalDelete').modal('hide');
                window.location.reload();
                // fetchroles();
            }
        });

    });
    $('.optional').on('change', function() {
     if(this.checked==true){
        $('#optionalQuestions').show();
     }else{
        $('#optionalQuestions').hide();

     }
    });



$('#cropHeader').click(function(){
    canvasHeader = cropperHeader.getCroppedCanvas({
        width:705,
        height:120,
    });
    canvasHeader.toBlob(function(blob){
        url = URL.createObjectURL(blob);
        $('#loaded_header').attr('src',url);
        var reader = new FileReader();
        reader.readAsDataURL(blob);
        reader.onloadend = function(){
            var base64data1 = reader.result;
            $('.header').val(base64data1);
                    $modalHeader.modal('hide');
        };
    });
});



$('#toggle').on('change',function(){
     if (this.checked){

                       $("#optionalQuestions").show();
    }

                    
                    

    else{
              

                                $("#optionalQuestions").hide();

    }
 
        });    
</script>
<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"> Change Ownership</h4>
            </div>
            <input type="hidden" id="deleted_id">
            <input type="hidden" id="data">
            <input type="hidden" id="image">

            <div class="modal-body">
                Are you sure you want to change ownership?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-danger yes" value='Change' />
            </div>
        </div>
    </div>
</div>
@stop