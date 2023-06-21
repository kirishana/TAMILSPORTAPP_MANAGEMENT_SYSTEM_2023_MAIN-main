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
    {{-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}


    <link rel="icon" href="{{ asset('assets/img/logo_small.png') }}" type="image/x-icon">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/thead.css') }}" rel="stylesheet" type="text/css" />

    <!-- <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" /> -->
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet" />
    {{-- <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" /> --}}
    
    <!-- font Awesome -->
 <style>
    .hover:hover {
        background-color: rgb(31, 28, 28);
        color: black;
    }
</style> 

    <!-- end of global css -->
    <!--page level css-->
    @yield('header_styles')
    <!--end of page level css-->

<body class="skin-josh">
    <header class="header">
        <a href="" class="logo">
            @if ( Auth::user()->id==1)
            @if($general->dashboard_logo)
            <img src="/general/{{ $general->dashboard_logo }}" style="padding:3px;width:178px;height:45px;" alt="Tamil Sangam Norway">
            @else
<img src="{{ asset('assets/images/SuperAdmin/dashboardLogo.png') }}"
                                                            alt="..." class="img-responsive" />
            @endif
            @elseif(Auth::user()->organization)
            @if(Auth::user()->organization->orgsetting)
            <img src="/general/{{ $general->dashboard_logo }}" style="width:250px;height:50px;" alt="Tamil Sangam Norway">
            @else
            <img src="{{asset('assets/img/web logo copy black bg small.png')}}" style="width:250px;height:50px;" alt="">
            @endif
            @else


            <img src="{{ asset('assets/img/web logo copy white bg.png') }}" alt="..." class="img-responsive" />

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
                   
                    @include('admin.layouts._notifications')
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @if(Auth::user()->profile_pic)
                                                        <img src="/profile/{{ Auth::user()->profile_pic}}"  class="img-circle  img-responsive pull-left" alt="..">
                                                        @elseif(Auth::user()->gender=="male")
                            <img src="{{ asset('assets/images/authors/malelogo.png') }}" alt="..." class="img-circle  img-responsive pull-left" />
                            @else
                            <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..." class="img-circle  img-responsive pull-left"  />
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
                                @if(Auth::user()->profile_pic)
                                <img src="/profile/{{ Auth::user()->profile_pic}}" alt="" class="img-circle">
                                 @elseif(Auth::user()->gender=="male")
                            <img src="{{ asset('assets/images/authors/malelogo.png') }}" alt="..."  class="img-circle"  />
                            @else
                            <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."  class="img-circle"  />
                            @endif
                                <p class=" topprofiletext">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</p>
                            </li>
                            <!-- Menu Body -->

                                <!-- Menu Body -->
                            <li>
                                <a href="/user/{{Crypt::encrypt(Auth::user()->id)}}">
                                    <i class="material-icons">person</i>
                                    <span class="title">{{ __('sidebar.my_profile') }}</span>
                                </a>
                            </li>
                             <!-- Menu Footer-->
                             <li>

                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="material-icons">exit_to_app</i>
                                        <span class="title">{{ __('sidebar.logout') }}</span>
                                    </a>

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
        <aside class="left-side" style="height: 1000px;">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">

                    <div class="clearfix"></div>

                    <!-- BEGIN SIDEBAR MENU -->

                    @include('admin.layouts._miniLeftMenu')


                </div>
               
                    
            </section>
            {{-- <footer>
                    <div class=" container">
                        <div class="footer-text">
                            <!-- About Us Section Start -->
                           
                        </div>
                    </div>
                    <!-- //Footer Section End -->
                    <div class=" col-6 copyright" style="">
                        <div style="color:white;margin-left:5px;">
                            <p>All rights reserved © <br>Maestro Innovative Solution</p>
                        </div>
                    </div>
                </footer> --}}
        </aside>
        <aside class="right-side">

            {{--<!-- Notifications -->--}}
            <!-- <div id="notification_remove">
                @include('notifications')
            </div> -->

            <!-- Content -->
            @yield('content2')

        </aside>
        <!-- right-side -->
    </div>
   
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
