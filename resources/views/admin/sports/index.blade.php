@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View Roles Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
@stop
{{-- Page content --}}
@section('content')

<section class="content-header">
        <!--section starts-->
        <h1>My Profile</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin/">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>Settings</li>

            
            <li class="active">Roles & Permissions</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
               
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

Roles                                        </h3>
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
                                    <div class="col-md-3">
                                        
                                    <li style="list-style-type:none">
            
            <span class="title">Settings</span>
        <ul class="sub-menu">
            <li style="list-style-type:none">
            <a href="#tab2" data-toggle="tab">
                    <i class="material-icons">keyboard_arrow_right</i>
                    General
                </a>
            </li>
            <li style="list-style-type:none">
            <a href="#tab1" data-toggle="tab">

                    <i class="material-icons">keyboard_arrow_right</i>
                    Rols & Permissions
                </a>
            </li>
            <li style="list-style-type:none">
            <a href="#age" data-toggle="tab">
                    <i class="material-icons">keyboard_arrow_right</i>
                    Age Group
                </a>
            </li>
            
        
        </ul>
    </li>
</div>
<div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                          
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



        <div id="tab2" class="tab-pane fade">
                        <div class="row">
        <div class="col-lg-12">
                @if($general!==null)
                &nbsp
                @else
            <a href="general-setting/create"><button  class="btn btn-info">create </button></a>
@endif
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-2">
                                            <div class="img-file">
                                               
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                        <div class="portlet-body">
                    <div class="table-scrollable">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                
                                <th>System Name</th>
                                <th>{{$general!==null?$general->name:''}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                
                                <th>System Title</th>
                                <td>{{$general!==null?$general->title:''}}</td>
                            </tr>
                            <tr>
                                
                                <th>Telephone</th>
                                <td>{{$general!==null?$general->telephone:''}}</td>
                            </tr>
                            <tr>
                                
                                <th>Address</th>
                                <td>{{$general!==null?$general->address:''}}</td>
                            </tr>
                            <tr>
                               
                                <th>Sign In/Sign UpLogo</th>
                                <td> 
                                @if($general!==null)<img src="{{Illuminate\Support\Facades\Storage::url($general->signup_logo)}}" style="width:300px;height:100px;" alt="josh logo">
                                @else
                                <img src="{{asset('assets/img/logo.png')}}" style="width:300px;height:100px;" alt="josh logo">
                                @endif</td>
                            </tr>
                            <tr>
                               
                                <th>Dashboard Logo</th>
                                <td> 
                                @if($general!==null)<img src="{{Illuminate\Support\Facades\Storage::url($general->dashboard_logo)}}" style="width:300px;height:100px;" alt="josh logo">
                                @else
                                <img src="{{asset('assets/img/logo.png')}}" style="width:300px;height:100px;" alt="josh logo">
                                @endif</td>
                            </tr>
                            </tbody>
                        </table>
                        @if($general!==null)
                        <a href="general-setting/edit/{{$general->id}}"><button style="float:right;border-radius:5px" class="btn btn-info">Edit </button></a>
                @else
@endif

                    </div>
                </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="img-file">
                                               
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
    
@endsection