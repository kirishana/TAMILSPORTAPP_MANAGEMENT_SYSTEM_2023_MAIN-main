@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
Users List
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<style>
::-webkit-scrollbar {
  width: 10px;
}
  </style>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">

<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
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
    <h1>Users</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href="#"> Users</a></li>
        <li class="active">Import User Details</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  ">group</i>
                    Import User Details
     
                </h4>
               
            </div>

            
            <div class="panel-body">
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                 <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
            <div class="row">
        <div style="margin:40px">
            <h3>Instructions</h3>
            <ol>
                <li style="margin-top:12px;">Download The Sample Excel File And Fill It With Data.</li>
                <li style="margin-top:12px;">You Can Download The Example File To Understand How The Data Must Be Filled</li>
                <li style="margin-top:12px;">Once You Have Downloaded And Filled The Excel File , Upload It In The Form Below And Submit.</li>
                <li style="margin-top:12px;">File format should be <strong> .xlsx or .xls </strong>
                <ol>
                    <br>
                    <button class="btn btn-primary"><a style="color:white" href="/export_excel/export">Download Sample Excel File</a></button>
                </div>
                        <div  style="margin:40px">
            <h3>More Instructions</h3>
            <ol>
                <li style="margin-top:12px;">DOB format should be <strong>yyyy.mm.dd</strong></li>
                <li style="margin-top:12px;">File format should be <strong>.xlsx or .xls</strong>
                <ol>
                </div>  
                <div  style="margin:40px">
            <h3>Upload Members</h3>

            <hr style="color:black">
       
          <div class="row">
              <div class="col-md-4">
                  <h5>Upload File <span style="color:red">*</span></h5>
              </div>
              <div class="col-md-4">

        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
            {{ csrf_field() }}
          
              
                <input type="file" name="select_file" />
              
        </div>  
           <div class="col-md-4">
            <input type="submit" name="upload" class="btn btn-primary" value="Upload">

           </div>
        </form>
          </div>
    
       </div>
    </div> 
</section>

@stop


