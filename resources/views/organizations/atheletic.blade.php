@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Athletic Settings
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
@stop
{{-- Page content --}}
@section('content')
<section class="content-header">
    <!--section starts-->
    <h1>{{ __('sidebar.athletic_settings') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin/">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li> <a href="/organizations/view/{{Auth::user()->id}}">
                <i class="material-icons breadmaterial">spa</i>
                Organizations
            </a></li>

        <li class="active">Athletic Settings</li>
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
                       {{ __('sidebar.athletic_settings') }}

                        {{-- <a style="float:right" href="/organizations/view/{{Auth::user()->id}}"><i class="material-icons  leftsize">keyboard_backspace
                            </i>
                            Back</a> --}}


                    </h4>

                </div>
                <div class="tab-content mar-top">
                    <div class="row">
                        <div class="col-lg-12">
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

                                @if(isset($athletic))
                                <form class="form_action6" action="/athletic-setting/{{ $athletic->id }}/update" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                    @else

                                    <form class="form_action6" action="/athletic-setting/store" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                        @endif

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.total_events') }} <span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="total" class="form-control" id="inputEmail3" value="{{ $athletic?$athletic->total_events:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <input type="hidden" name="org_id" value="{{ Auth::user()->organization_id }}">
                                                    <label class="control-label" for="firstName3">{{ __('settings.max_track') }}<span style="color:red;"> <b> * </b></span>
                                                    </label>
                                                    <input type="number" class="form-control" name="trackCount" id="firstName3" value="{{ $athletic?$athletic->track_events:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.max_field') }} <span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="fieldCount" class="form-control" id="inputEmail3" value="{{ $athletic?$athletic->field_events:'' }}">
                                                </div>
                                            </div>


                                        </div>


                                        @if($athletic)

                                    

                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group" id="members">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.ind_points') }} <span style="color:red;"> <b> * </b></span></label>
                                                    
                                                </div>
                                            </div>
</div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.first_place') }}<span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="first_place" class="form-control" id="inputEmail3" value="{{ $athletic?$athletic->first_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <input type="hidden" name="org_id" value="{{ Auth::user()->organization_id }}">
                                                    <label class="control-label" for="firstName3">{{ __('settings.second_place') }}<span style="color:red;"> <b> * </b></span>
                                                    </label>
                                                    <input type="number" class="form-control" name="second_place" id="firstName3" value="{{ $athletic?$athletic->second_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.third_place') }}<span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="third_place" class="form-control" id="inputEmail3" value="{{ $athletic?$athletic->third_place:'' }}">
                                                </div>
                                            </div>


                                        </div>
                               
                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group" id="members">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.group_points') }} <span style="color:red;"> <b> * </b></span></label>
                                                    
                                                </div>
                                            </div>
</div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.first_place') }}<span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="group_first_place" class="form-control" id="inputEmail3" value="{{ $athletic?$athletic->group_first_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <input type="hidden" name="org_id" value="{{ Auth::user()->organization_id }}">
                                                    <label class="control-label" for="firstName3">{{ __('settings.second_place') }}<span style="color:red;"> <b> * </b></span>
                                                    </label>
                                                    <input type="number" class="form-control" name="group_second_place" id="firstName3" value="{{ $athletic?$athletic->group_second_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">{{ __('settings.third_place') }} <span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="group_third_place" class="form-control" id="inputEmail3" value="{{ $athletic?$athletic->group_third_place:'' }}">
                                                </div>
                                            </div>


                                        </div>
                                        @endif
  @if (Auth::guard('web')->user()->can('EditSettings'))
                                        <div class="form-group form-actions">
                                            <div class="row">
                                                <div class="col-md-10"></div>
                                                <div class="col-md-2"><input style="float:right" type="submit" class="btn btn-raised btn-primary" value="{{ __('staffs.register') }}"></div>
                                            </div>
                                        </div>
                                        @endif

                            </div>
                            </form>
                        </div>
                    </div>
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
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script>
 var mamber=$('#members input[type=radio]:checked').val();
                if (mamber == 0) {
                    $("#heatsMethod").show();
                } else {
                    $("#heatsMethod").hide();
                }

         
      $('#members input[type=radio]').change(function(){   
      var mamber = $(this).val();
                if (mamber == 0) {
                    $("#heatsMethod").show();
                } else {
                    $("#heatsMethod").hide();
                }

            });
</script>
<!-- <script>
    $(document).on('click','#example-form',function{
        var formData = new FormData($(this)[0]);
        var id=$(this).val();
        var data=$('.admin').val();
        var image=$('.image').val();
                    $('#deleted_id').val(id);
                    $('#data').val(data);
                    $('#image').val(formData);



            $('#myModalDelete').modal('show');

});

$(document).on('click','.yes',function(e){
            e.preventDefault();
            var id=$('#deleted_id').val();
            var data= $('#data').val();
            var image= $('#image').val();


            $.ajax({
                type:"post",
                url:"/organizations/ownership/"+id,
                dataType:"json",
                data:  {       
                    'id':id,
                    'data':data,
                    'image':image},
                success:function(response){
                    $('#myModalDelete').modal('hide');
                    window.location.reload();
                    // fetchroles();
                    }
                });

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
            <input type="submit" class="btn btn-danger yes" value='Change'/>
          </div>
    </div>
  </div>
</div> -->
@stop