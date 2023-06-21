@extends('admin/layouts/menu')
{{-- Page title --}}
@section('title')
Assign Permission
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />
@stop
{{-- Page content --}}
@section('content2')
<section class="content-header">
    <!--section starts-->
    <h1>Assign Permission({{$role->name}})</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin/">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>

        <li>Settings</li>
        <li>Roles & Permissions</li>
        <li class="active">Assign Permission</li>

    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                            <i class="material-icons">person</i> Add Role
                                Assign Permission
                                <div style="float:right">
                                    <a href="" style="color:white">
                                        <i class="material-icons">keyboard_arrow_left</i>
            
                                        <a href="/admin/roles" style="color:white">
                                            Back</a>
                                        </div>
                            

                            </h3>
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
                            <div class="col-md-12">
                                <form action="/admin/permission-store/{{$role->id}}" method="post">
                                    <input type="hidden" name="tab" value="tab2">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                    @php
                                    $orgpermissions = App\User::getpermissionsByGroupName('Add New-org');
                                    $orgpermissions2 = App\User::getpermissionsByGroupName('All Organizations');
                                   $orgpermissions3 = App\User::getpermissionsByGroupName('All Staffs');
                                   $orgpermissions4 = App\User::getpermissionsByGroupName('All Members');
                                    $orgpermissions5= App\User::getpermissionsByGroupName('Settings-org');
                                     $orgpermissions6 = App\User::getpermissionsByGroupName('masterData');
                                     $venuepermissions = App\User::getpermissionsByGroupName('Add New-venue');
                                    $venuepermissions2 = App\User::getpermissionsByGroupName('All Venues');
                                    $leaguepermissions= App\User::getpermissionsByGroupName('Add New-league');
                                    $leaguepermissions2 = App\User::getpermissionsByGroupName('All Leagues');
                                    $userpermissions = App\User::getpermissionsByGroupName('Add New-user');
                                    $userpermissions2 = App\User::getpermissionsByGroupName('All Users');
                                    $userpermissions3 = App\User::getpermissionsByGroupName('ImportUsers');
                                    $eventpermissions= App\User::getpermissionsByGroupName('Add New-event');
                                    $eventpermissions2= App\User::getpermissionsByGroupName('Events List');
                                    $eventpermissions3 = App\User::getpermissionsByGroupName('participants');
                                    $eventpermissions4 = App\User::getpermissionsByGroupName('groupEventRegs');
                                    $eventpermissions5 = App\User::getpermissionsByGroupName('cancellation');
                                    $eventpermissions6 = App\User::getpermissionsByGroupName('marathon');
                                    $eventpermissions7 = App\User::getpermissionsByGroupName('Event Results');
                                    $paymentRequestPermissins = App\User::getpermissionsByGroupName('payment requests');
                                    $iframesPermissins = App\User::getpermissionsByGroupName('iframes');

                                    $clubpermissions = App\User::getpermissionsByGroupName('Add New-club');
                                    $clubpermissions2 = App\User::getpermissionsByGroupName('All Clubs');
                                     $clubpermissions3 = App\User::getpermissionsByGroupName('Add New-team');
                                    $clubpermissions4= App\User::getpermissionsByGroupName('All Teams');
                                    $clubpermissions5= App\User::getpermissionsByGroupName('Add New-member');
                                    $clubpermissions6= App\User::getpermissionsByGroupName('AllClubMembers');
                                    $clubpermissions7= App\User::getpermissionsByGroupName('Settings-club');
                                     $clubpermissions8= App\User::getpermissionsByGroupName('importClubMember');
                                    
                                  
                                   $payments = App\User::getpermissionsByGroupName('Payments');

                                    $eventApproval = App\User::getpermissionsByGroupName('eventApprovals');

                                    $familyMembers1 = App\User::getpermissionsByGroupName('CreateFamilyMember');
                                    
                                    $familyMembers = App\User::getpermissionsByGroupName('FamilyMembers');
                                    @endphp
                                    <div class="portlet box primary">

                                        <div class="portlet-body">
                                            <div class="table-scrollable">
                                                <table class="table table-hover text-uppercase">
                                                    <thead>
                                                        <tr>
                                                            <th>Module</th>
                                                            <th>Sub Module</th>
                                                            <th>Add</th>
                                                            <th>View</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                        <tr>
                                                            <td>Organization</td>
                                                            <td>All Organizations</td>
<td></td>
                                                            @foreach ($orgpermissions2 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach
<td></td>
                                                        </tr>
                             <tr>
                                                            <td></td>
                                                            <td>Organization Staffs</td>

                                                            @foreach ($orgpermissions3 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                        </tr>
                                                                <tr>
                                                            <td></td>
                                                            <td>Organization Members</td>

                                                            @foreach ($orgpermissions4 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Settings</td>
                                                            <td></td>
                                                            @foreach ($orgpermissions5 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                        </tr>
        <tr>
                                                            <td></td>
                                                            <td>Master Data</td>

                                                            @foreach ($orgpermissions6 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach
<td></td>
                                                        </tr>
<!--end-->
<!--venue-->
                                                        <tr>
                                                            <td>Venues</td>
                                                            <td>Add New</td>
                                                            <td>
                                                                @foreach ($venuepermissions as $permission)
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>

                                                                @endforeach
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>All Venues</td>

                                                            @foreach ($venuepermissions2 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                        </tr>

                                                        </tr>
                                                        <!--END-->
                                                        <!--CLUB-->
                                                        <tr>
                                                            <td>Leagues</td>
                                                            <td>Add New</td>
                                                            <td>
                                                                @foreach ($leaguepermissions  as $permission)
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>

                                                                @endforeach
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>All Leagues</td>
                                                            @foreach ($leaguepermissions2 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach


                                                        </tr>

                                                        </tr>
                                                        <!--END-->


<tr>
                                                            <td>Users</td>
                                                            <td>Add New</td>
                                                            <td>
                                                                @foreach ($userpermissions as $permission)
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>

                                                                @endforeach
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>All Users</td>

                                                            @foreach ($userpermissions2 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach
                                                        </tr>
                                                           <tr>
                                                            <td></td>
                                                            <td>Import Users</td>
                                                            <td></td>
                                                            @foreach ($userpermissions3 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <!--END-->

 <!--CLUB-->
                                                        <tr>
                                                            <td>Events</td>
                                                            <td>Add New</td>
                                                            <td>
                                                                @foreach ($eventpermissions as $permission)
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>

                                                                @endforeach
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                       
   <tr>
                                                            <td></td>
                                                            <td>Event Lists</td>
                                                            <td></td>
                                                            @foreach ($eventpermissions2 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach


                                                        </tr>
                                                         <tr>
                                                            <td></td>
                                                            <td>Participants</td>
                                                            <td></td>
                                                            @foreach ($eventpermissions3 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                             <tr>
                                                            <td></td>
                                                            <td>Group Event Registrations</td>
                                                            <td></td>
                                                            @foreach ($eventpermissions4 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Event Cancellation</td>
                                                            <td></td>
                                                            @foreach ( $eventpermissions5 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td></td>
                                                            <td>Marathon</td>
                                                            <td></td>
                                                            @foreach ( $eventpermissions6 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Event Results</td>
                                                            <td></td>
                                                            @foreach ($eventpermissions7 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                            <td></td>
                                                     
                                                       
                                                        <!--END-->

  <tr>
                                                            <td>Payment Requests</td>
                                                            <td></td>
                                                            <td></td>
                                                            @foreach ($paymentRequestPermissins  as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>

                                                            </td>

                                                            @endforeach
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Iframes</td>
                                                            <td></td>
                                                            <td></td>
                                                            @foreach ($iframesPermissins   as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>

                                                            </td>

                                                            @endforeach
                                                            <td></td>
                                                            <td></td>
                                                        </tr>




                                                        <!--CLUB-->
                                                        <tr>
                                                            <td>Club</td>
                                                            <td>Add New</td>
                                                            <td>
                                                                @foreach ($clubpermissions as $permission)
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>

                                                                @endforeach
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>All Clubs</td>

                                                            @foreach ($clubpermissions2 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                        </tr>
 <tr>
                                                            <td></td>
                                                            <td>Club Members</td>
                                                            @foreach ($clubpermissions6 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach
                                                           
                                                        </tr>
                                                           <tr>
                                                            <td></td>
                                                            <td>Club Teams</td>

                                                            @foreach ( $clubpermissions4 as $permission)
                                                            <td>
                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Settings</td>
                                                            <td></td>
                                                            @foreach ($clubpermissions7 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                        </tr>
                                                         <tr>
                                                            <td></td>
                                                            <td>Import ClubMembers</td>
                                                            <td></td>
                                                            @foreach ($clubpermissions8 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <!--END-->
<tr>
                                                            <td></td>
                                                            <td>Payments</td>
                                                            <td></td>
                                                            @foreach ($payments as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Event Approvals</td>
                                                            <td></td>
                                                            @foreach ($eventApproval as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                                                                                                                 
                                                        </tr>
                                                        <tr>
                                                            <td>Family Members</td>
                                                            <td>Add New</td>
                                                            <td></td>
                                                            @foreach ($familyMembers1 as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td>Family Members</td>
                                                            @foreach ($familyMembers  as $permission)
                                                            <td>

                                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                            </td>
                                                            @endforeach

                                                            <td></td>
                                                        </tr>


                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END SAMPLE TABLE PORTLET-->
                                    <button type="submit" style="float:right" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
                                </form>
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- <script>
$(document).ready(function () {
$('#myTab a[href="#{{ old('tab') }}"]').tab('show')
});


</script> -->
@stop