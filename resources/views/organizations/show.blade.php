@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View User Details
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
        <h1>{{$organization->name}}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/dashboard/{{ Auth::user()->id }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>Organizations</li>

            <li class="active">View</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    {{$organization->name}}

 

                     
                </h4>
                
            </div> 
                                
                                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                                    <div class="panel-body">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4">
                                        <a href="/organizations/edit/{{ $organization->id }}" style="float:right">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                        </div>
                                        </div>


                                        <div class="row">
                                        <div class="col-md-4">
                                        <!-- ---------------------------------------- -->
@if($organization->orgsetting)
@if($organization->orgsetting->invoice_logo)
  <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 250px; height: 50px;">  
                                                <img src="/organization/invoice/{{ Auth::user()->organization->orgsetting->invoice_logo }}" alt="Tamil Sangam" class="img-responsive" />
                                                </div>
                                            </div>
                                        </div>
                                        @else

                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 250px; height: 50px;">  
                                                <img src="{{asset('assets/img/web logo copy black bg small.png')}}" alt="Tamil Sangam" class="img-responsive" />
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endif

                                        <!-- ------------------------------------------- -->

                                        </div>
                                        <div class="col-md-8">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                
                                                    <table class="table table-bordered table-striped" id="users">
                                                        <tr>
                                                            <th>Organization Name</th>
                                                            <td>{{$organization->name}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>Email</th>
                                                            <td>{{$organization->email}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>Telephone Number</th>
                                                            <td>{{$organization->tpnumber}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>Mobile</th>
                                                            <td>{{$organization->mobile?$organization->mobile:''}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>Address</th>
                                                            <td>{{$organization->address}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>State</th>
                                                            <td>{{$organization->state}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>County</th>
                                                            <td>{{$organization->country->name}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>PostalCode</th>
                                                            <td>{{$organization->postalcode}}</td>
                                                        </tr> 
                                                        <tr>
                                                        <th>Created Date</th>
                                                            <td>{{$organization->created_at->diffForHumans()}}</td>
                                                        </tr>   
                                                       
                                                    </table>
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
       
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    
@stop
