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
        <h1>My Profile</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin/">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            
            <li class="active">My Profile</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content2">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs ">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="material-icons tab_icons">supervisor_account</i>
                            My Profile</a>
                    </li>
                    
                </ul>
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
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
    
<div class="row">
    <div class="col-md-4">
    <div class="panel-body">
    <div>
    @if($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic}}" class="img-responsive" alt="Tamil Sangam"  style="align:center;">
                                                 @else
                                                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."
                                                                     class="img-responsive" style="border-radius: 50%; width:150px;height:150px;"/>
                                                            @endif
                                            
                                            </div>
                                            <br>
        <div class="table-responsive">
                                                    <table class="table text-uppercase table-bordered" id="users">

                                                        <tr>
                                                            <td>First Name</td>
                                                            <td>
                                                                {{ $user->first_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Last Name</td>
                                                            <td>
                                                                {{ $user->last_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                              <td>  {{ $user->email }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Gender
                                                            </td>
                                                            <td>
                                                                {{ $user->gender }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    
                                                    </div>
                        
    </div>
    </div>
    
    
    <div class="col-md-1"></div>
    <div class="col-md-7">
    
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2" style="text-align:right;">
    <a href="/users/edit/{{ $user->id }}">
            <button class="btn btn-primary" style="text-transform:none;float:right">Edit</button>
        </a>
</div>
</div>

     
                                                <div class="table-responsive">
                                                    <table class="table table-bordered text-uppercase" id="users">
                                                        
                                                        <tr>
                                                            <td>DOB</td>

                                                            @if($user->dob=='0000-00-00')
                                                                <td>
                                                                </td>
                                                            @else
                                                                <td>
                                                                {{ $user->dob }}
                                                            </td>
                                                             @endif
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td>
                                                                {{ $user->address?$user->address:'' }}
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>City</td>
                                                            <td>
                                                                {{ $user->city?$user->city:'' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <td>
                                                                {{ $user->state ?$user->state:''}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Postal/Zip Code</td>
                                                            <td>
                                                                {{ $user->postal?$user->postal:'' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <td>
                                                                {{ $user->country->name }}
                                                            </td>
                                                        </tr>
                                                       
                                                        
                                                        
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>

                                                                @if($user->is_approved==1)
                                                                    Activated
                                                                
                                                                @elseif($user->is_approved==null)
                                                                    Pending
                                                                @else
                                                                    Dinied
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @if($user->guardian_name)
                                                        <tr>
                                                            <td>Guardian Name</td>
                                                            <td>
                                                                {{$user->guardian_name}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($user->guardian_mail)
                                                        <tr>
                                                            <td>Guardian Email</td>
                                                            <td>
                                                                {{$user->guardian_mail}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($user->guardian_number)
                                                        <tr>
                                                            <td>Guardian Contact Number</td>
                                                            <td>
                                                                {{$user->guardian_number}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td>Created Date</td>
                                                            <td>
                                                                {!! $user->created_at?$user->created_at->diffForHumans() :''!!}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                   
                                                </div>
                                            </div>

    </div>

    
</div>


<!--
                                    <div class="panel-body">
                                        <div class="col-md-4">
                                            <div class="img-file">
                                            @if($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic}}" class="img-responsive" alt="Tamil Sangam">
                                                 @else
                                                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."
                                                                     class="img-responsive" style="border-radius: 50%;/>
                                                            @endif
                                            </div>

                                            
                                           
                                          
                                        </div>
                                        
                                        <a href="{{ route('users.edit', Auth::user()->id) }}">
                                <button class="btn btn-primary" style="text-transform:none;float:right">Edit</button>
                            </a>
                                        <div class="col-md-8">
                                        
                                            <div class="panel-body">
                                            
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="users">

                                                        <tr>
                                                            <td>First Name</td>
                                                            <td>
                                                                {{ $user->first_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Last Name</td>
                                                            <td>
                                                                {{ $user->last_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td>
                                                                {{ $user->email }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Gender
                                                            </td>
                                                            <td>
                                                                {{ $user->gender }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    </div>
                                                    </div>

                                        <a href="{{ route('users.edit', Auth::user()->id) }}">
                                            <button class="btn btn-primary" style="text-transform:none;float:right">Edit</button>
                                        </a>
                                        <div class="col-md-7">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="users">
                                                        
                                                        <tr>
                                                            <td>DOB</td>

                                                            @if($user->dob=='0000-00-00')
                                                                <td>
                                                                </td>
                                                            @else
                                                                <td>
                                                                {{ $user->dob }}
                                                            </td>
                                                             @endif
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td>
                                                                {{ $user->address?$user->address:'' }}
                                                            </td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>City</td>
                                                            <td>
                                                                {{ $user->city?$user->city:'' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>State</td>
                                                            <td>
                                                                {{ $user->state ?$user->state:''}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Postal/Zip Code</td>
                                                            <td>
                                                                {{ $user->postal?$user->postal:'' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <td>
                                                                {{ $user->country->name }}
                                                            </td>
                                                        </tr>
                                                       
                                                        
                                                        
                                                        <tr>
                                                            <td>Status</td>
                                                            <td>

                                                                @if($user->is_approved==1)
                                                                    Activated
                                                                
                                                                @elseif($user->is_approved==null)
                                                                    Pending
                                                                @else
                                                                    Dinied
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        @if($user->guardian_name)
                                                        <tr>
                                                            <td>Guardian Name</td>
                                                            <td>
                                                                {{$user->guardian_name}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($user->guardian_mail)
                                                        <tr>
                                                            <td>Guardian Email</td>
                                                            <td>
                                                                {{$user->guardian_mail}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        @if($user->guardian_number)
                                                        <tr>
                                                            <td>Guardian Contact Number</td>
                                                            <td>
                                                                {{$user->guardian_number}}
                                                            </td>
                                                        </tr>
                                                        @endif
                                                        <tr>
                                                            <td>Created Date</td>
                                                            <td>
                                                                {!! $user->created_at?$user->created_at->diffForHumans() :''!!}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                   
                                                </div>
                                            </div>
                                        </div> 
                                    </div> -->

                                </div>
                            </div>
                        </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
@stop

            
      </div>
    </div>
  </div>

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script>
     
$(document).on('click', '.upload' ,function(){
        var id=$(this).attr('data-id');
        $('#id').val(id);            
});


        $("#updateForm").on('submit',function(e){
            e.preventDefault();
           var form=new FormData();
           form.append('userId',$("#userId").val());
           form.append('report',$('#report').val());
           form.append('tab',$('#tab').val());
            $.ajax({
                enctype: 'multipart/form-data',
                    url:$(form).attr('action'),
                    method:$(form).attr('method'),
                    data:form,
                    processData:false,
                    dataType:'json',
                    contentType:false,

                    success:function(response){
                        $(form)[0].reset();
                    }
                });
        })
             
$(document).on('click', '.view' ,function(){
        var id=$(this).attr('data-id');
            $.ajax({
                type:"GET",
                url:"/user-report/"+id,

                success:function(response){
                    $('#user-reports').attr('src', '/user-reports/'+response.userReport2);
                    $('#reportId').val(response.reportId);
                    }
                });
        });
//edit
$("#updateReport").on('submit',function(e){
            e.preventDefault();
           var form1=new FormData($("#reportImage")[0]);
           form1.append('userId',$("#userId").val());
            $.ajax({
                enctype: 'multipart/form-data',
                    url:$(form1).attr('action'),
                    method:$(form1).attr('method'),
                    
                    data:form1,
                    processData:false,
                    dataType:'json',
                    contentType:false,

                    success:function(response){
                        $(form1)[0].reset();
                    }
                });
        })
</script>
<div class="modal fade" id="pwdConfirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Password Success</h4>
            </div>
            <div class="modal-body">
                <p>You have successfully updated your password</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
</section>
<!--Modal: Login with Avatar Form-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
<!--Content-->
<div class="modal-content">

<div class="modal-header" style="border-bottom:none">
<h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Upload Documents</h2>

</div>
<!--Body-->
<div class="modal-body text-center mb-1">
<form action="/report/{{ $user->id }}" method="POST" enctype="multipart/form-data" id="updateForm">
@csrf
<div class="md-form ml-0 mr-0">
   <input type="hidden" name="userId" id="userId" value="{{ $user->id }}">
   <input type="hidden" name="tab" value="tab3" id="tab">
   <div class="row">
    <div class="col-md-12" >
        <select id="report" name="report" style="width: 500px; height: 50px;">
            <option>Select Uploaded Report</option>
            @foreach($reports as $report)
            <option value="{{ $report->id }}">{{ $report->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-new thumbnail" style="width: 500px; height: 50px;">
                                             <div>
                                                <span>
                                                    <span class="fileinput-new" style="text-transform:none;font-size:45px;"><i class="material-icons" style="margin-bottom:5px">update</i></span>                                                       
                                                <input type="file" name="reportImage" id="reportImage"class="image">
                                                </span>
                                    </div>
            </div>
            <div class="fileinput-preview fileinput-exists thumbnail" style="width:550px;height:100px;"></div>
            <div>
                        <span class="btn btn-primary fileinput-exists">Change</span>
                        <input type="file" name="report" class="image">
                <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
       
    </div>
                </div>
   
</div>

<div class="modal-footer">
<button type="submit" class="btn btn-success update">Update</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
</div>

</div>
</form>
<!--/.Content-->
</div>
</div>
<!--Modal: Login with Avatar Form-->





@stop
