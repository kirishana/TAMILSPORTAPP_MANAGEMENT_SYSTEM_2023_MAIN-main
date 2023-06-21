@extends('admin/layouts/menu')

{{-- Page title --}}
@section('title')
    View User Details
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{-- <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" /> --}}
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />


@stop
{{-- Page content --}}
@section('content2')
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
            <div class="col-lg-12 col-md-12">
                <ul class="nav  nav-tabs " id="myTab">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">
                            <i class="material-icons tab_icons">supervisor_account</i>
                            My Profile</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">
                            <i class="material-icons tab_icons">vpn_key</i>
                            Change Password</a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">
                            <i class="material-icons tab_icons">card_giftcard</i>
                            Documents</a>
                    </li>

                </ul>
              
                <div class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="panel-heading">
                                    @if ($user->first_login == null)
                                     @if($user->id== Auth::user()->id)
                                        <div class="alert alert-danger" role="alert">
                                            Please complete your profile <a href="#tab3" data-toggle="tab"
                                                class="alert-link">by uploading the required documnets</a>.
                                        </div>
                                        @endif
                                    @endif
                                     @if ($message!=null)
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{{ $message }}</li>
                                    </ul>
                                </div>
                                @endif
                                    @if ($errors->any())
                                    @if (!$errors->password)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="">
                                        <div class="panel-body">
                                            <div class="row">
                                                <div class="profile-section">
                                                    <div class="row">
                                                        <div class="row">
                                                            <div class="profile-basic">
                                                                <div class="card text-center">
                                                                    <div class="card-body" style="margin-top: 12px;">
                                                                        <div class="row">
                                                                        <div class="col-md-4 col-sm-12">
                  <div class="d-flex flex-column align-items-center text-center">
                  @if($user->profile_pic)
                  <img src="/profile/{{ $user->profile_pic}}" alt="Card image cap" class="rounded-circle">
                @elseif($user->gender=="male")
                <img src="{{ asset('assets/images/authors/malelogo.png') }}" alt="..." class="card-img-top prf-img img-responsive">
                @else
                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..." class="card-img-top prf-img img-responsive"/>
                @endif
                    <div class="mt-3">
                    <h3 class="card-title">{{ $user->first_name }}{{ $user->last_name }}</h3>
                      <p class="text-secondary mb-1">{{ $user->roles->pluck('name')[0]}}</p>
                      <p class="text-muted font-size-sm"> <i class="flag flag-norway c-flag"></i>{{ $user->country->name}}</p>
                      <a class="edit-profile" href="/users/edit/{{Crypt::encrypt($user->id)}}" title="Edit profile details"><i class="fas fa-user-edit edit-icon fa-2x"></i></a>
                    </div>
                  </div>
              </div>
                                                                            {{-- <div class="col-md-4 user-prf">
                                                                                <div class="profile-basic">

                                                                                 <img class="card-img-top" src="/profile/{{ $user->profile_pic }}" alt="profile picture"> 

                                                                                   <center> @if ($user->profile_pic)
                                                                                        <img class="card-img-top prf-img img-responsive"
                                                                                            src="/profile/{{ $user->profile_pic }}"
                                                                                            alt="profile picture">
                                                                                          
                                                                                            @elseif($user->gender=="male")
                                                                <img src="{{ asset('assets/images/authors/malelogo.png') }}" alt="..." class="img-circle  img-responsive pull-left" style="width:250px;height:250px;"  class="img-circle" />
                                                                @else
                                                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..." class="img-circle  img-responsive pull-left" style="width:250px;height:250px;" class="img-circle" />
                                                                @endif
                                                                </center>
                                                                                    <h3 class="card-title pull-left" style="text-align: center;">
                                                                                        {{ $user->first_name }}
                                                                                        {{ $user->last_name }}
                                                                                        <a class="edit-profile"
                                                                                            href="/users/edit/{{Crypt::encrypt($user->id)}}"
                                                                                            title="Edit profile details"><i
                                                                                                class="fas fa-user-edit edit-icon"></i></a>

                                                                                    </h3>
                                                                                    <p class="card-title">
                                                                                        {{ $user->roles->pluck('name')[0] }}
                                                                                    </p>
                                                                                    <p class="card-text"> <i
                                                                                            class="flag flag-norway c-flag"></i>
                                                                                        {{ $user->country->name }}</p>

                                                                                </div>
                                                                            </div> --}}
                                                                            <div class="col-md-8 col-md-offset-1 profile-details">
                                                                                <!-- Personal Information -->
                                                                                <div class="col-sm-12 row">
                                                                                    <h4 class="text-left main-header">
                                                                                        Personal Information</h4>
                                                                                    <div class="col-sm-6 col-md-6 row">

                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i class="fa fa-user prf-edit-icon"
                                                                                                    aria-hidden="true"></i>Gender
                                                                                            </p>
                                                                                            <p class="prf-detail-text">
                                                                                                @if ($user->gender)
                                                                                                    {{ $user->gender }}
                                                                                                @else
                                                                                                    <span>
                                                                                                        <p
                                                                                                            class="card-subtitle text-muted prf-detail-text">
                                                                                                            N/A</p>
                                                                                                    </span>
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>
                                                                                        <?php
                                                                                        $age = Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->dob)->format('Y');
                                                                                        ?>

                                                                                        @if ($age < 18)
                                                                                            <div
                                                                                                class="text-left data-field">
                                                                                                <p
                                                                                                    class="font-weight-light text-left prf-detail-header">
                                                                                                    <i class="fa fa-user prf-edit-icon"
                                                                                                        aria-hidden="true"></i>Parent
                                                                                                    / Gardian</p>
                                                                                                <p class="prf-detail-text">
                                                                                                    @if ($user->guardian_name)
                                                                                                        {{ $user->guardian_name }}
                                                                                                    @else
                                                                                                        <span>
                                                                                                            <p
                                                                                                                class="card-subtitle text-muted prf-detail-text">
                                                                                                                N/A</p>
                                                                                                        </span>
                                                                                                    @endif
                                                                                                </p>
                                                                                            </div>


                                                                                            <div
                                                                                                class="text-left data-field">
                                                                                                <p
                                                                                                    class="font-weight-light text-left prf-detail-header">
                                                                                                    <i class="fa fa-user prf-edit-icon"
                                                                                                        aria-hidden="true"></i>Parent
                                                                                                    / Gardian Phone number
                                                                                                </p>
                                                                                                <p class="prf-detail-text">
                                                                                                    @if ($user->guardian_number)
                                                                                                        {{ $user->guardian_number }}
                                                                                                    @else
                                                                                                        <span>
                                                                                                            <p
                                                                                                                class="card-subtitle text-muted prf-detail-text">
                                                                                                                N/A</p>
                                                                                                        </span>
                                                                                                    @endif
                                                                                                </p>
                                                                                            </div>
                                                                                        @endif




                                                                                    </div>

                                                                                    <div class="col-sm-6 col-md-6 row">

                                                                                        <div class="text-left"
                                                                                            id="data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i
                                                                                                    class="fas fa-calendar-alt prf-edit-icon"></i>DOB
                                                                                            </p>
                                                                                            <p class="prf-detail-text">
                                                                                                {{ $user->dob ? $user->dob : 'N/A' }}
                                                                                            </p>
                                                                                        </div>

                                                                                        <?php
                                                                                        $age = Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->dob)->format('Y');
                                                                                        ?>

                                                                                        @if ($age < 18)
                                                                                            <div
                                                                                                class="text-left data-field">
                                                                                                <p
                                                                                                    class="font-weight-light text-left prf-detail-header">
                                                                                                    <i class="fa fa-user prf-edit-icon"
                                                                                                        aria-hidden="true"></i>Parent
                                                                                                    / Gardian Email address
                                                                                                </p>
                                                                                                <p class="prf-detail-text">
                                                                                                    @if ($user->guardian_mail)
                                                                                                        {{ $user->guardian_mail }}
                                                                                                    @else
                                                                                                        <span>
                                                                                                            <p
                                                                                                                class="card-subtitle text-muted prf-detail-text">
                                                                                                                N/A</p>
                                                                                                        </span>
                                                                                                    @endif
                                                                                                </p>
                                                                                            </div>
                                                                                        @endif




                                                                                    </div>
                                                                                </div>








                                                                                <!-- Contact Information -->
                                                                                <div class="col-sm-12 row">
                                                                                    <h4 class="text-left main-header">
                                                                                        Contact Information</h4>
                                                                                    <div class="col-sm-6 col-md-6 row">

                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i
                                                                                                    class="fas fa-envelope prf-edit-icon"></i>Email
                                                                                                Address</p>
                                                                                            <p class="prf-detail-text">
                                                                                                {{ $user->email }}</p>
                                                                                        </div>

                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i class="fa fa-phone prf-edit-icon"
                                                                                                    aria-hidden="true"></i>Phone
                                                                                                Number</p>
                                                                                            <p class="prf-detail-text">
                                                                                                @if ($user->tel_number)
                                                                                                    {{ $user->tel_number }}
                                                                                                @else
                                                                                                    <span>
                                                                                                        <p
                                                                                                            class="card-subtitle text-muted prf-detail-text">
                                                                                                            N/A</p>
                                                                                                    </span>
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>


                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i class="fa fa-map-marker prf-edit-icon"
                                                                                                    aria-hidden="true"></i>City
                                                                                            </p>
                                                                                            <p class="prf-detail-text">
                                                                                                @if ($user->city)
                                                                                                    {{ $user->city }}
                                                                                                @else
                                                                                                    <span>
                                                                                                        <p
                                                                                                            class="card-subtitle text-muted prf-detail-text">
                                                                                                            N/A</p>
                                                                                                    </span>
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>






                                                                                    </div>

                                                                                    <div class="col-sm-6 col-md-6 row">


                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i class="fa fa-map-marker prf-edit-icon"
                                                                                                    aria-hidden="true"></i>Address
                                                                                            </p>
                                                                                            <p class="prf-detail-text">
                                                                                                @if ($user->address)
                                                                                                    {{ $user->address }}
                                                                                                @else
                                                                                                    <span>
                                                                                                        <p
                                                                                                            class="card-subtitle text-muted prf-detail-text">
                                                                                                            N/A</p>
                                                                                                    </span>
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i class="fa fa-map-marker prf-edit-icon"
                                                                                                    aria-hidden="true"></i>State
                                                                                            </p>
                                                                                            <p class="prf-detail-text">
                                                                                                @if ($user->state)
                                                                                                    {{ $user->state }}
                                                                                                @else
                                                                                                    <span>
                                                                                                        <p
                                                                                                            class="card-subtitle text-muted prf-detail-text">
                                                                                                            N/A</p>
                                                                                                    </span>
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>

                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i class="fa fa-address-card prf-edit-icon"
                                                                                                    aria-hidden="true"></i>Postal
                                                                                                Code</p>
                                                                                            <p class="prf-detail-text">
                                                                                                @if ($user->postal)
                                                                                                    {{ $user->postal }}
                                                                                                @else
                                                                                                    <span>
                                                                                                        <p
                                                                                                            class="card-subtitle text-muted prf-detail-text">
                                                                                                            N/A</p>
                                                                                                    </span>
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>





                                                                                    </div>
                                                                                </div>


                                                                                <!-- Member Details -->
                                                                                <div class="col-sm-12 row">
                                                                                    <h4 class="text-left main-header">
                                                                                        Membership Information</h4>
                                                                                    <div class="col-sm-6 col-md-6 row">
                                                                                        @if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8))
                                                                                        @else
                                                                                            <div
                                                                                                class="text-left data-field">
                                                                                                <p
                                                                                                    class="font-weight-light text-left prf-detail-header">
                                                                                                    <i
                                                                                                        class="fas fa-spa prf-edit-icon"></i>Organization
                                                                                                </p>
                                                                                                <p class="prf-detail-text">
                                                                                                    {{ $user->organization ? $user->organization->name : 'N/A' }}
                                                                                                </p>
                                                                                            </div>
                                                                                        @endif
                                                                                        <div class="text-left data-field">
                                                                                            <p
                                                                                                class="font-weight-light text-left prf-detail-header">
                                                                                                <i class="fa fa-calendar-check prf-edit-icon"
                                                                                                    aria-hidden="true"></i>Registered
                                                                                                Date</p>
                                                                                            <p class="prf-detail-text">
                                                                                                @if ($user->created_at)
                                                                                                    {{ $user->created_at }}
                                                                                                @else
                                                                                                    <span>
                                                                                                        <p
                                                                                                            class="card-subtitle text-muted prf-detail-text">
                                                                                                            N/A</p>
                                                                                                    </span>
                                                                                                @endif
                                                                                            </p>
                                                                                        </div>




                                                                                    </div>

                                                                                    <div class="col-sm-6 col-md-6 row">
                                                                                        @if (Auth::user()->hasRole(2) || Auth::user()->hasRole(8))
                                                                                        @else
                                                                                            <div
                                                                                                class="text-left data-field">
                                                                                                <p
                                                                                                    class="font-weight-light text-left prf-detail-header">
                                                                                                    <i
                                                                                                        class="fas fa-users prf-edit-icon"></i>Club
                                                                                                </p>
                                                                                                <p class="prf-detail-text">
                                                                                                    {{ $user->club ? $user->club->club_name : 'N/A' }}
                                                                                                </p>
                                                                                            </div>
                                                                                        @endif
                                                                                        @if (Auth::user()->hasRole(7))
                                                                                            <div
                                                                                                class="text-left data-field">
                                                                                                <p
                                                                                                    class="font-weight-light text-left prf-detail-header">
                                                                                                    <i class="fa fa-id-badge prf-edit-icon"
                                                                                                        aria-hidden="true"></i>Player
                                                                                                    ID</p>
                                                                                                <p class="prf-detail-text">
                                                                                                    @if ($user->userId)
                                                                                                        {{ $user->userId }}
                                                                                                    @else
                                                                                                        <span>
                                                                                                            <p
                                                                                                                class="card-subtitle text-muted prf-detail-text">
                                                                                                                N/A</p>
                                                                                                        </span>
                                                                                                    @endif
                                                                                                </p>
                                                                                            </div>
                                                                                        @endif




                                                                                    </div>
                                                                                </div>




                                                                                <div class="col-sm-12 row">
                                                                                    <div class="col-sm-6 col-md-6 row">
                                                                                        @if (Auth::user()->hasRole(1) || Auth::user()->hasRole(8))
                                                                                        @else
                                                                                            <div
                                                                                                class="text-left data-field">
                                                                                                <p
                                                                                                    class="font-weight-light text-left prf-detail-header">
                                                                                                    <i
                                                                                                        class="fas fa-spa prf-edit-icon"></i>Existing
                                                                                                    UserIds</p>
                                                                                                <p class="prf-detail-text">
                                                                                                    @foreach ($user->clubRequests as $request)
                                                                                                        {{ $request->userIds }}
                                                                                                        <br>
                                                                                                    @endforeach
                                                                                                </p>
                                                                                            </div>
                                                                                        @endif





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

                                                <br>
                                              

                                            </div>

                                        </div>



                                       


                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <div class="row" style="height:350px;">
                        @if ($errors->any())
            @if ($errors->password)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @endif
                            <br><br>
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                            <div class=" card text-center">
                                <div class="card-body">
                                    <div class="row">
                        <div class="col-md-1"></div>
                                        <div class="col-md-10">
                                <form method="post" action="/user/password/change" class="form-horizontal">
                                    <!-- CSRF Token -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                    <input type="hidden" name="id" value="{{Crypt::encrypt($user->id)}}">
                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="inputpassword" class="col-md-3 control-label">
                                                Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">vpn_key</i>
                                                    </span>
                                                    <input type="password" id="password" name="password"
                                                        placeholder="Password" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputnumber" class="col-md-3 control-label">
                                                Confirm Password
                                                <span class='require'>*</span>
                                            </label>
                                            <div class="col-md-9">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">vpn_key</i>
                                                    </span>
                                                    <input type="password" name="password_confirmation"
                                                        id="password-confirmation" placeholder="Confirm Password"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="col-md-offset-3 col-md-9 btn_subm">
                                            <button type="submit" class="btn btn-primary " id="change-password">Submit
                                            </button>
                                            &nbsp;
                                            <input type="reset" class="btn btn-default reset_btn" value="Reset">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-1"></div>

                        </div>
                    </div>
                    </div>
                        </div>
                    </div>
                    </div>
                    <div id="tab3" class="tab-pane fade">
                        <div class="row" style="height:350px;">
                            <br>
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                            <div class=" card text-center">
                                <div class="card-body">
                                   
                                       
                        <div class="row">
                            <div class="col-md-2">
                                <a href="#" data-id="{{ $user->id }}" class="btn btn-primary upload"
                                    data-toggle="modal" data-target="#myModal" style="text-transform:none">Upload
                                    Documents</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pd-top">
                                <table class="table table-striped  table-bordered  " id="table" width="100%">
                        <thead class="thead-Dark">
                                        <tr class="filters">
                                            <th>Title</th>
                                            <th>Name</th>
                                            <th>Upload Time</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($userReports != null)
                                            @foreach ($userReports as $report)
                                                <tr>
                                                    <td>{{ $report->reportName->name }}</td>
                                                    {{-- <img src="/user-reports/{{ $report->reports}}" class="img-responsive"
                                alt="Tamil Sangam"> --}}
                                                    <td>{{ $report->reports }}</td>
                                                    <td>{{ $report->updated_at }}</td>
                                                    <td><a href="/download/{{ $report->id }}"
                                                            class="btn btn-primary btn-xs view" title="Download"
                                                            style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;"><i
                                                                class="fa fa-download" style="right:-60px;top:-2.8px;"
                                                                aria-hidden="true"></i></a>
                                                        <button type="button" class="btn btn-primary btn-xs  edit"
                                                            data-toggle="tooltip" data-placement="bottom" title="Edit"
                                                            value="{{ $report->id }}"
                                                            style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;"><i
                                                                class="material-icons text-light"
                                                                style="font-size:14px;left:-6px;top:-2.8px;">edit</i></button>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                </div>
                <div class="modal-body">
                    <form action="/report/edit/{{ $user->id }}" method="POST" enctype="multipart/form-data"
                        id="updateReport">
                        @csrf
                        <div class="md-form ml-0 mr-0">
                            <input type="hidden" name="userId" id="userId" value="{{ $user->id }}">
                            <input type="hidden" name="reportId" id="reportId">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 500px; height: 500px;">
                                                <div>
                                                    <span>
                                                        <span class="fileinput-new"
                                                            style="text-transform:none;font-size:45px;"><img src=""
                                                                style="width:550px;height:500px;" class="img-responsive"
                                                                id="user-reports" alt="Tamil Sangam">
                                                            {{-- <i class="material-icons" style="margin-bottom:5px">File Present</i></span> --}}
                                                            <input type="file" name="reportImage" id="reportImage"
                                                                class="image">
                                                        </span>
                                                </div>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                style="width:550px;height:400px;"></div>
                                            <div>
                                                <span class="btn btn-primary fileinput-exists">Change</span>
                                                <input type="file" name="reportImage" id="reportImage"
                                                    class="image">
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                </div>
                </form>

            </div>

        </div>
    </div>
    </div>
    <!-- edit-->
    <!--Modal: Login with Avatar Form-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
            <!--Content-->
            <div class="modal-content">

                <div class="modal-header" style="border-bottom:none">
                    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edi Document</h2>

                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">
                    <form action="/report/{{ Auth::user()->id }}" method="POST" enctype="multipart/form-data"
                        id="updateReport">
                        @csrf
                        <div class="md-form ml-0 mr-0">
                            <input type="hidden" name="userId" id="userId" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="tab" value="tab3" id="tab">
                            <div class="row">
                                <div class="col-md-12">

                                    <input type="hidden" name="report2" id="report2">
                                    <select id="report" name="report" style="width: 500px; height: 50px;">
                                        {{-- <option selected disabled>Select Uploaded Report</option> --}}
                                        {{-- @foreach ($reports as $report)
                                    <option value="{{ $report->id }}">{{ $report->name }}</option>
                                    @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 500px; height: 70px;">
                                                <div>
                                                    <span>
                                                        <div class="imageName">
                                                        </div>
                                                        <span class="fileinput-new"
                                                            style="text-transform:none;font-size:45px;"></span>
                                                        <input type="file" name="reportImage" id="reportImage"
                                                            class="image">
                                                            <span class="fileinput-new" style="text-transform:none;font-size:45px;"><i class="material-icons" style="margin-bottom:5px">file_upload</i></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="width:550px;height:100px;"></div>
                                            <div>
                                                <span class="btn btn-primary fileinput-exists">Change</span>
                                                <input type="file" name="report" id="exitimage" class="image">
                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success update2">Update</button>
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

{{-- page level scripts --}}
@section('footer_scripts')
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
    <script>
      $('#myTab a[href="#{{ old('tab') }}"]').tab('show')
        $(document).on('click', '.upload', function() {
            var id = $(this).attr('data-id');
            $('#id').val(id);
        });
        $(document).on('click', '.edit', function(e) {
            // alert("hi");
            e.preventDefault();
            var id = $(this).val();
            $('#editModal').modal('show');
            $.ajax({
                type: "GET",
                url: "/user-report/edit/" + id,

                success: function(response) {
                    // alert(response);
                    $('#report').empty();
                    $('.imageName').empty();
                    $('.imageName').append(response.userReport2);
                    // $('#user-reports2').attr('src', '/user-reports/' + response.userReport2);
                    $('#report2').val(response.report.id);
                    $('#report').append(
                        "<option value='" + response.report.id + "'>" + response.report.name +
                        "</option>");
                }



            });
        });


        $("#updateForm").on('submit', function(e) {
            e.preventDefault();
            var form = new FormData();
            form.append('userId', $("#userId").val());
            form.append('report', $('#report').val());
            form.append('tab', $('#tab').val());
            $.ajax({
                enctype: 'multipart/form-data',
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: form,
                processData: false,
                dataType: 'json',
                contentType: false,
                success: function(response) {
                    $(form)[0].reset();
                }
            });
        });

        $(document).on('click', '.view', function() {
            var id = $(this).attr('data-id');
            $.ajax({
                type: "GET",
                url: "/user-report/" + id,

                success: function(response) {
                    $('#user-reports').attr('src', '/user-reports/' + response.userReport2);
                    $('#reportId').val(response.reportId);
                }
            });
        });
        //edit
        $("#updateReport").on('submit', function(e) {
            e.preventDefault();
            var form1 = new FormData($("#reportImage")[0]);
            form1.append('userId', $("#userId").val());
            $.ajax({
                enctype: 'multipart/form-data',
                url: $(form1).attr('action'),
                method: $(form1).attr('method'),

                data: form1,
                processData: false,
                dataType: 'json',
                contentType: false,

                success: function(response) {
                    $(form1)[0].reset();
                }
            });
        })
    </script>
    <div class="modal fade" id="pwdConfirmModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
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

 <!--Modal: Login with Avatar Form-->
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-md" role="document">
            <!--Content-->
            <div class="modal-content">
                <div class="modal-header" style="border-bottom:none">
                    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Upload Documents</h2>

                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">

                    <form action="/report/{{ $user->id }}" method="POST" enctype="multipart/form-data" id="updateForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="md-form ml-0 mr-0">
                            <input type="hidden" name="userId" id="userId" value="{{ $user->id }}">
                            <input type="hidden" name="tab" value="tab3" id="tab">
                            <div class="row">
                                <div class="col-md-12">
                                <span style="color:red;display:none;" id="error">Select the report name</span>
                                    <select id="report" class="changeReport" name="report" style="width: 500px; height: 50px;">
                                        <option value="0">Select Uploaded Report</option>
                                        @foreach ($reports as $report)
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
                                                        <span class="fileinput-new"
                                                            style="text-transform:none;font-size:45px;"><i
                                                                class="material-icons"
                                                                style="margin-bottom:5px">file_upload</i></span>
                                                        <input type="file"  name="reportImage" id="reportImage"
                                                            class="image">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                style="width:550px;height:100px;"></div>
                                            <div>
                                                <span class="btn btn-primary fileinput-exists">Change</span>
                                                <input type="file" required name="report" class="image">
                                                <a href="#" class="btn btn-primary fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                        <span class="text-danger" id="reportImageError"></span>


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
            </form>
            <!--/.Content-->
        </div>
    </div>
  


   
    <!--Modal: Login with Avatar Form-->
    <script>
     $(".image").on('change', function() {
        if($(".changeReport").val()==0){
            $('.update').prop('disabled',true);
            $('#error').show();
        }           
        });
     $(".changeReport").on('change', function() {
        if($(".changeReport").val()==0){
            $('.update').prop('disabled',true);
            $('#error').show();
        }else{
            $('.update').prop('disabled',false);
            $('#error').hide();
        }        
        });
        $('.update2').prop('disabled',true);
     $("#exitimage").on('change', function() {
        $('.update2').prop('disabled',false);

        });
</script>
@stop
