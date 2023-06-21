<ul id="menu">
    <br>
    {{-- <br>
    <br>
<?php 
$orgs=App\Models\Organization::where('status',1)->get();
$countryOrgs=App\Models\Organization::where('status',1)->where('country_id',Auth::user()->country_id)->get();
?> --}}
{{-- 
    <li>
        @if(Auth::user()->hasRole(8))
        <select name="org" class="org" id="org" style="width: 250px;height:35px;">
            <option disabled selected>select organization</option>
            @foreach($orgs as $organization)
            <option id="{{$organization->id}}" value="{{$organization->id}}">
                {{$organization->name}}
            </option>
            @endforeach
        </select>
        @else
        <select name="org" class="org" id="org" style="width: 250px;height:35px;">
            <option disabled selected>select organization</option>
            @foreach($countryOrgs as $organization)
            <option id="{{$organization->id}}" value="{{$organization->id}}">
                {{$organization->name}}
            </option>
            @endforeach
        </select>
        @endif

    </li> --}}
    {{-- <br> --}}
  
    <?php
    $count = App\User::where('is_approved', 2)->where('organization_id',null)->where('club_id',null)->count();
    ?>
     <li {!! (Request::is('dashboard') )!!}>
        <a class="hover" href="/admin">
            <i class="material-icons text-light leftsize">home</i>
            <span class="title">Dashboard</span>
            <!-- <span class="fa arrow"></span> -->
        </a>
    </li>

    <li {!! (Request::is('user/create')  || Request::is('user-lists') || Request::is('user/view/*') ? 'class="active"' : '' ) !!}>
        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">person</i>
            <span class="title">Users <span class="label label-danger" style="border-radius:50px 50px;"><?php echo $count ?></span></span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            {{-- @if (Auth::guard('web')->user()->can('Create-season')) --}}

            <li {!! (Request::is('user/create') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/user/create">
                    Add New
                </a>
            </li>
            {{-- @endif --}}

            {{--  <li {!! (Request::is('user-lists') || Request::is('user/view/*') ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/user-lists">
                    User Lists
                </a>
            </li>  --}}
        </ul>
    </li>
    <li {!! (Request::is('organizations/create')  || Request::is('organizations') || Request::is('organizations/archived')  ? 'class="active"' : '' ) !!}>
        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">spa</i>
            <span class="title">{{ __('sidebar.organization') }}</span>
            <span class="fa arrow"></span>
        </a>

        <ul class="sub-menu">

            <li {!! (Request::is('organizations/create')    ? 'class="active"' : '' ) !!}>                
                <a class="hover" href="/organizations/create">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.add_new') }}</span>
                </a>
            </li>
            

            <li {!! ( Request::is('organizations')  ? 'class="active"' : '' ) !!}>                
                <a class="hover" href="/organizations">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.all_organizations') }}</span>
                </a>
            </li>
        </ul>
    </li>
 
    <?php
    $count2 = App\Models\Club::where('is_approved', 2)->count();
    ?>
      <li {!! (Request::is('club/create')  || Request::is('all-clubs')  ? 'class="active"' : '' ) !!}>

        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">people</i>
            <span class="title">Clubs <span class="label label-danger" style="border-radius:50px 50px;"><?php echo $count2 ?></span></span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('club/create')   ? 'class="active"' : '' ) !!}>
                <a class="hover" href="{{ URL::to('club/create') }}">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.add_new') }}</span>
                </a>
            </li>
           
            <li {!! (  Request::is('all-clubs')  ? 'class="active"' : '' ) !!}>
                <a class="hover" href="/all-clubs">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.all_clubs') }}</span>
                </a>
            </li>
        </ul>
    </li>
   
    <li {!! (Request::is('admin/general-setting')  || Request::is('admin/roles') || Request::is('admin/seasons') || Request::is('admin/countries')|| Request::is('admin/permission/*') ? 'class="active"' : '' ) !!}>
        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">settings</i>
            <span class="title">{{ __('sidebar.settings') }}</span>
            <span class="fa arrow"></span>

        </a>
        <ul class="sub-menu">

            <li {!!  (Request::is('admin/general-setting')? 'class="active"' : '' ) !!}>
                <a class="hover" href="/admin/general-setting">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.general') }}</span>
                </a>
            </li>
            <li {!!Request::is('admin/roles') ||Request::is('admin/permission/*') ?'class="active"' : '' !!}>
                <a class="hover" href="/admin/roles">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.roles_permission') }}</span>
                </a>
            </li>


            <li {!! Request::is('admin/seasons') ? 'class="active"' : '' !!}>
                <a class="hover" href="/admin/seasons">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.seasons') }}</span>
                </a>
            </li>
            <li {!! Request::is('admin/countries') ? 'class="active"' : '' !!}>
                <a class="hover" href="/admin/countries">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">{{ __('sidebar.country') }}</span>
                </a>
            </li>

        </ul>
    </li>
    <!-- --------------------------------------------------------------- -->

    <!-- --------------------------------------------------------------- -->
    <li {!! (Request::is('report/organizations')  || Request::is('clubs')  ? 'class="active"' : '' ) !!}>
        <a class="hover" href="#">
            <i class="material-icons text-light leftsize">insert_drive_file</i>
            <span class="title">Reports</span>
            <span class="fa arrow"></span>

        </a>
        <ul class="sub-menu">

            <li {!! (Request::is('report/organizations')   ? 'class="active"' : '' ) !!}>                <a class="hover" href="/report/organizations">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">Organizations</span>
                </a>
            </li>
            
            <li {!! (Request::is('clubs')  ? 'class="active"' : '' ) !!}>                <a class="hover" href="/clubs">
                    <!-- <i class="material-icons">keyboard_arrow_right</i> -->
                    <span class="title">Clubs</span>
                </a>
            </li>

        </ul>
    </li>
</li> 


    
<li {!! (Request::is('msg-show')  ? 'class="active"' : '' ) !!}>
        
        <a class="hover" href="{{ URL::to('/msg-show') }}">
        <i class="material-icons text-light leftsize">notifications</i>
            <span class="title">Notifications</span>
            <span class="#"></span>
        </a>
       
</li> 


        <li>
                <a class="hover" href="{{asset('assets/documentation/SuperAdmin.pdf')}}" target="_blank">
                    <i class="material-icons text-light leftsize">live_help</i>
                    <span class="title">Documentation</span>
                </a>
        </li>
        
        <li>
                <a class="hover" href="{{ URL::to('/activity') }}">
                    <i class="far fa-eye"></i>
                    <span class="title">ActivityLog</span>
                </a>
        </li>
        
</ul> 


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function($) {
        $("#org").on('change', function() {
            var org = $(this).val();
            $.ajax({
                type: 'POST',
                url: '/organization/' + org,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "org": org
                },
                success: function(response) {
                    window.location.href = response.url;
                }
            });

        });
    });
</script>