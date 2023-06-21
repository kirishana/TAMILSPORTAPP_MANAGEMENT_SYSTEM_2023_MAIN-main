<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <?php
    $general = App\generalSetting::first();
    $id = Session::get('id');
    $org = App\Models\Organization::find($id);
    ?>
    <title>
        @section('title')
        @if($general) {{$general->name}} | {{$general->title}} @endif
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('assets/img/logo_small.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/thead.css') }}" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" /> -->
    <link rel="icon" href="{{ asset('assets/img/logo_small.png') }}" type="image/x-icon">
    <!-- <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" /> -->
    <!-- <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />  -->
{{-- 
    <style>
        a:hover {
            background-color: rgb(31, 28, 28);
            color: black;
        }
    </style> --}}
    <style>
        @media screen and (max-width: 1024px) {
           
            #returnToTop {
                display: none;
            }
        }
        .hover:hover {
        background-color: rgb(31, 28, 28);
        color: black;
    }
    </style>
     {{-- font Awesome  --}}


    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->

<body class="skin-josh">
    <header class="header">
        @if (Auth::user()->id==1)
        <a href="/admin" class="logo"><img id="superAdminLogo" src="{{asset('assets/img/web logo copy black bg small.png')}}" style="width:250px;height:50px;" alt="Tamil Sangam Norway" class="img-responsive" />
        </a> 
        @elseif ( Auth::user()->hasRole(1))
        <a href="" class="logo"> <img src="{{asset('assets/img/web logo copy black bg small.png')}}" style="width:250px;height:50px;" alt="Tamil Sangam Norway">
        </a>
        @elseif(Auth::user()->organization)
        @if(Auth::user()->organization->orgsetting)
        <a href="" class="logo"> <img id="superAdminLogo" src="/organization/{{ Auth::user()->organization->orgsetting->org_logo }}" style="width:200px;height:50px;" alt="Tamil Sangam">
        </a> 
        @else
        <a href="" class="logo"> <img id="superAdminLogo" src="{{ asset('assets/img/web logo copy black bg small.png') }}" style="width:250px;height:50px;" alt="Tamil Sangam Norway" class="img-responsive" />
        </a> @endif
        @elseif(Auth::user()->club)
        @if(Auth::user()->club->club_logo)
        <a href="" class="logo"> <img id="superAdminLogo" src="/club/{{ Auth::user()->club->club_logo }}" style="width:200px;height:50px;" alt="Tamil Sangam">
        </a> @else
        <a href="" class="logo"> <img id="superAdminLogo" src="{{ asset('assets/img/web logo copy black bg small.png') }}" style="width:250px;height:50px;" alt="Tamil Sangam Norway" class="img-responsive" />
        </a> @endif
        @else
        <?php
        $general=App\generalSetting::first();
        ?>
         @if($general->dashboard_logo)
           
        <a href="" class="logo">  <img src="/general/{{ $general->dashboard_logo }}" style="padding:3px;width:178px;height:45px;" alt="Tamil Sangam Norway" class="img-responsive">
        </a>
        @endif
        @endif



        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <!-- {{$org}} -->
            <div class="navbar-right">
                <ul class="nav navbar-nav">


                    <li class="dropdown notifications-menu">
                        
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        
                       
                          <select class="changeLang">
                          
                       
                         <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>EN</option>    
                        <option value="ta" {{ session()->get('locale') == 'ta' ? 'selected' : '' }}>TA</option>
                           <option value="no" {{ session()->get('locale') == 'no' ? 'selected' : '' }}>NO</option>   </select>
                        </a>
                    </li>


                    {{-- @include('admin.layouts._messages') --}}
                    @include('admin.layouts._notifications')
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->profile_pic)
                            <img src="/profile/{{ Auth::user()->profile_pic}}" alt="Tamil Sangam" class="img-circle  img-responsive pull-left" width="35" height="35">
                            @elseif(Auth::user()->gender=="male")
                            <img src="{{ asset('assets/images/authors/malelogo.png') }}" alt="..." class="img-circle  img-responsive pull-left" class="img-circle" />
                            @else
                            <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..." class="img-circle  img-responsive pull-left" class="img-circle" />
                            @endif

                            <div class="riot">

                                <p class="user_name_max" id="user_nav">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                <span>
                                    <i class="caret"></i>
                                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header bg-light-blue">
                                @if(Auth::user()->profile_pic)
                               <img src="/profile/{{ Auth::user()->profile_pic}}" alt="josh logo" class="img-circle">
                                @elseif(Auth::user()->gender=="male")
                                <img src="{{ asset('assets/images/authors/malelogo.png') }}" alt="..."  class="img-circle" />
                                @else
                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..." class="img-circle" />
                                @endif
                                <p class=" topprofiletext">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>

                            </li>
                            

                                @if(Auth::user()->hasRole(8)||Auth::user()->hasRole(1))
                            <li>
                                <a href="/user/{{Auth::user()->id}}">
                                    <i class="material-icons">person</i>
                                   {{ __('dashboard.my_profile') }}
                                </a>
                            </li>

                            @else
                            <li>
                                
                                <a href="{{ URL::route('users.show',Crypt::encrypt(Auth::user()->id)) }}">
                                    <i class="material-icons">person</i>
                                    {{ __('dashboard.my_profile') }}
                                </a>
                            </li>
                            @endif
                           
                            <li>

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i>
                                       {{ __('dashboard.logout') }} </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>

                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">

                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    @include('admin.layouts._left_menu')

                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        <aside class="right-side">

            {{-- <div id="notification_remove">
                @include('notifications')
            </div> --}}

            <!-- Content -->
            @yield('content')

        </aside>
        <!-- right-side -->
    </div>
    <div id="returnToTop">
    <a id="back-to-top" href="#" class="btn btn-primary  back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="material-icons btn_tak fsize">flight_takeoff</i>
    </a>
    <!-- global js -->
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
    <script>
        function myFunction() {
            location.replace("https://www.w3schools.com")
        }
    </script>
    <script type="text/javascript">
        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>
</body>

</html>