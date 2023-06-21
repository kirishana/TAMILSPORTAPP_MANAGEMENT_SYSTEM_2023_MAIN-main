@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
SMS Settings
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
    <h1>SMS Settings</h1>
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

        <li class="active">SMS Settings</li>
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
                        SMS Settings

                        <a style="float:right" href="/organizations/view/{{Auth::user()->id}}"><i class="material-icons  leftsize">keyboard_backspace
                            </i>
                            Back</a>


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
<h2>Future Implementation</h2>
                               
</section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
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