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
                <div  class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">

                                            Assign Permission
                                            <a style="float:right"href="/admin/settings"><img src="https://img.icons8.com/flat-round/15/000000/back--v1.png"/>Back</a>

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
                                        <form action="/admin/roles/permission-store/{{$role->id}}" method="post">
                                        <input type="hidden" name="tab" value="tab2">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                                        @php
                                            $orgpermissions = App\User::getpermissionsByGroupName('organization');
                                            $clubpermissions = App\User::getpermissionsByGroupName('club');
                                            $eventspermissions = App\User::getpermissionsByGroupName('event');
                                            $teampermissions = App\User::getpermissionsByGroupName('team');
                                            $playerspermissions = App\User::getpermissionsByGroupName('player');
                                            $staffspermissions = App\User::getpermissionsByGroupName('staff');
                                            $seasonspermissions = App\User::getpermissionsByGroupName('season');
                                            $userspermissions = App\User::getpermissionsByGroupName('user');
                                            $statpermissions = App\User::getpermissionsByGroupName('statistics');
                                            $paypermissions = App\User::getpermissionsByGroupName('payment');
                                            $newspermissions = App\User::getpermissionsByGroupName('news');
                                            $inqpermissions = App\User::getpermissionsByGroupName('inquaries');
                                            $setpermissions = App\User::getpermissionsByGroupName('settings');
                                            $reppermissions = App\User::getpermissionsByGroupName('report');
                                            

                                        @endphp
                                        <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">organization</h4>

                                        @foreach ($orgpermissions as $permission)
                                        <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                            <div class="col-md-12">
                                            <div class="col-md-4" >
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                </div>
                                                <div class="col-md-4" >
                                                <label style="float:right;width:1000px;"class="form-check-label" for="checkPermission{{ $permission->id }}">{{$exp[0]}}</label>
                                                </div>    
                                            </div>
                                        @endforeach
                                        </div>   
                                        <div class="col-md-1"></div>                                  
                                        <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Club</h4>
                                        @foreach ($clubpermissions as $permission)
                                        <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                            <div class="col-md-12">
                                                <div class="col-md-4" >
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                </div>
                                                <div class="col-md-4" >
                                                <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0] }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-1"></div>                                  
                                    
                                    <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Event</h4>
                                        @foreach ($eventspermissions as $permission)
                                        <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                            <div class="col-md-12">
                                                <div class="col-md-2" >
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                </div>
                                                <div class="col-md-2" >
                                                <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-1"></div>
                                    <br>
                                    
                                        <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">News</h4>
                                @foreach ($newspermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                        <div class="col-md-1"></div>                                  

                                        <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Staff</h4>
                                @foreach ($staffspermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                <div class="col-md-1"></div>                                  

                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Season</h4>

                                @foreach ($seasonspermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Inquary</h4>
                                @foreach ($inqpermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                               
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Settings</h4>
                                @foreach ($setpermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Report</h4>
                                @foreach ($reppermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Player</h4>
                                        @foreach ($playerspermissions as $permission)
                                        <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                            <div class="col-md-12">
                                                <div class="col-md-2" >
                                                <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                                </div>
                                                <div class="col-md-2" >
                                                <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                        </div>
                                
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Payment</h4>
                                @foreach ($paypermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Statistics</h4>
                                @foreach ($statpermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">User</h4>
                                @foreach ($userspermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                
                                <div class="col-md-1"></div>    
                                
                                <div class="col-md-1"></div>                                  
                                <div class="col-md-3" style="border:solid grey;border-radius:20%;margin-bottom:10px;margin-top:10px;">
                                        <h4 style="text-align:center">Teams</h4>
                                @foreach ($teampermissions as $permission)
                                <?php
                                                    $exp=explode('-',$permission->name);
                                                    ?>
                                    <div class="col-md-12">
                                        <div class="col-md-2" >
                                        <input type="checkbox" class="form-check-input" name="permission[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}" {{$role->hasPermissionTo($permission)?'checked':''}}>
                                        </div>
                                        <div class="col-md-2" >
                                        <label style="float:right"class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $exp[0]}}</label>
                                        </div>
                                        
                                    </div>
                                @endforeach
                                </div>
                                
                                <div class="col-md-1"></div>  
</div>
<button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Submit</button>
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
</div>
</div>
</div>
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<!-- Bootstrap WYSIHTML5 -->
<script  src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function () {
$('#myTab a[href="#{{ old('tab') }}"]').tab('show')
});


</script>
@stop
