<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
        @if($general) {{$general->name}} | {{$general->title}} @endif
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <link rel="icon" href="{{ asset('assets/img/logo_small.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />

    <!-- font Awesome -->


    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->

<body class="skin-josh">
    <header class="header">
        <a href="" class="logo">
            @if ( Auth::user()->id==1)
            <img src="{{Illuminate\Support\Facades\Storage::url(Auth::user()->general->dashbaord_logo)}}"  alt="josh logo">
            @elseif(Auth::user()->organization)
            @if(Auth::user()->organization->orgsetting)
            <img src="{{Illuminate\Support\Facades\Storage::url(Auth::user()->organization->orgsetting->org_logo)}}" style="width:200px;height:50px;" alt="josh logo">
            @else
            <img src="{{ asset('assets/images/logo.png') }}" alt="..." class="img-responsive" />
            @endif
            @else


            <img src="{{ asset('assets/images/logo.png') }}" alt="..." class="img-responsive" />
            @endif

            <!-- <img src="{{ asset('assets/img/logo.png') }}" alt="logo"> -->
        </a>

        <nav class="navbar navbar-static-top" role="navigation">

            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>

            <div class="navbar-right">
                <ul class="nav navbar-nav">

                    <!-- <li class="nav-item dropdown">
            <ul>

            <select class="changeLang" >
  <option  value="ta" {{ session()->get('locale') == 'ta' ? 'selected' : '' }}>Tamil</option>
  <option  value="ta" {{ session()->get('locale') == 'ta' ? 'selected' : '' }}>Tamil</option>

</select>
    </ul>
      </li>   -->
                    @include('admin.layouts.msg2')
                    @include('admin.layouts._notifications')

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">



                            @if(Auth::user()->profile_pic)
                            <img src="{{Illuminate\Support\Facades\Storage::url(Auth::user()->profile_pic)}}" alt="josh logo" class="img-circle  img-responsive pull-left" width="35" height="35">
                            @else
                            <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..." class="img-circle  img-responsive pull-left" class="img-circle" />
                            @endif

                            <div class="riot">
                                <div>
                                    <p class="user_name_max" id="user_nav">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>

                        
                        <ul class="dropdown-menu">

                        <li class="user-header bg-light-blue">

<img src="http://material.joshadmin.com/assets/images/authors/avatar5.png" alt="..."
class="img-circle "/>
<p class="topprofiletext">admin admin</p>
</li>
<!-- Menu Body -->
<li>
                        

                            <!-- Menu Body -->
                            <li>
                                <a href="{{ URL::route('users.show',Auth::user()->id) }}">
                                    <i class="material-icons">person</i>
                                    <span class="title">{{ __('sidebar.my_profile') }}</span>
                                </a>
                            </li>
                            <li role="presentation"></li>
                            <!-- <li>
                            <a href="{{ route('users.edit', Auth::user()->id) }}">
                                <i class="material-icons">settings</i>
                                Account Settings
                            </a>
                        </li> -->
                            <!-- Menu Footer-->
                            <li class="user-footer">

                                <div class="pull-left">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i>
                                        <span class="title">{{ __('sidebar.logout') }}</span> </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}

                                    </form>

                                </div>
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

                    @include('admin.layouts._miniLeftMenu')

                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside>
        <aside class="right-side">

            {{--<!-- Notifications -->--}}
            <div id="notification_remove">
                @include('notifications')
            </div>

            <!-- Content -->
            @yield('content2')

        </aside>
        <!-- right-side -->
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary  back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="material-icons btn_tak fsize">flight_takeoff</i>
    </a>
    <!-- global js -->
    <script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begin page level js -->
    @yield('footer_scripts')
    <!-- end page level js -->
    <script type="text/javascript">
        var url = "{{ route('changeLang') }}";

        $(".changeLang").change(function() {
            window.location.href = url + "?lang=" + $(this).val();
        });
    </script>
</body>

</html>