@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
User Lists
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
@section('content')
<section class="content-header">
    <h1>{{ __('sidebar.users') }}</h1>
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
                   {{ __('staffs.import_user_details') }}
     
                </h4>
               
            </div>

    
            <div class="panel-body">
                @if (count($errors) > 0)

                <div class="row">
    
                    <div class="col-md-12">
    
                      <div class="alert alert-danger alert-dismissible">
    
    
    
                          @foreach($errors->all() as $error)
    
                          {{ $error }} <br>
    
                          @endforeach      
    
                      </div>
    
                    </div>
    
                </div>
    
                @endif
                @if($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                 <button type="button" class="close" data-dismiss="alert"></button>
                        <strong>{{ $message }}</strong>
                </div>
                @endif
            <div class="row">
        <div style="margin:40px">
            <h3>                   {{ __('staffs.instructions') }}
</h3>
            <ol>
                <li style="margin-top:12px;"> {{ __('staffs.1') }}</li>
                <li style="margin-top:12px;">{{ __('staffs.2') }}</li>
                <li style="margin-top:12px;">{{ __('staffs.3') }}</li>
                <li style="margin-top:12px;">{{ __('staffs.4') }}
                <ol>
                    <br>
                    <button class="btn btn-primary"><a style="color:white" href="/export_excel/export">{{ __('staffs.download') }}</a></button>
                </div>
                        <div  style="margin:40px">
            <h3>{{ __('staffs.more') }}</h3>
            <ol>
                <li style="margin-top:12px;">{{ __('staffs.5') }}</li>
                <li style="margin-top:12px;">{{ __('staffs.6') }}
                <ol>
                </div>  
                <div  style="margin:40px">
            <h3>{{ __('staffs.upload_mem') }}</h3>

            <hr style="color:black">
       
          <div class="row">
              <div class="col-md-4">
                  <h5>{{ __('staffs.upload_file') }} <span style="color:red">*</span></h5>
              </div>
              <div class="col-md-4">

        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
            {{ csrf_field() }}
          
          
                <input type="file" name="select_file" />
              
        </div>  
           <div class="col-md-4">
            <input type="submit" name="upload" class="btn btn-primary" value="{{ __('staffs.upload') }}">

           </div>
        </form>
          </div>
    
       </div>
    </div> 
</section>

@stop


