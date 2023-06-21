@extends('layouts/default')

{{-- Page title --}}
@section('title')
    User Account
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/iCheck/css/minimal/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/user_account.css') }}">

@stop

{{-- Page content --}}
@section('content')
    <hr class="content-header-sep">
    <div class="container">
        <div class="welcome">
            <h3>My Account</h3>
        </div>
        <hr>

            <div class="row">
                <div class="col-md-12">
                    <!--main content-->
                    <div class="position-center">
                        <!-- Notifications -->
                        @include('notifications')

                        <div class="col-lg-11 col-sm-offset-1">
                            <h3 class="text-primary" id="title">Personal Information:</h3>
                        </div>
                        {!! Form::model($user, ['url' => URL::to('my-account'), 'method' => 'put', 'class' => 'form-horizontal','id'=>"tryitForm",'enctype'=>"multipart/form-data"]) !!}
                        {{ csrf_field() }}
                        <span class="help-block text-danger">{{ $errors->first('pic', ':message') }}</span>

                        <div class="form-group {{ $errors->first('pic', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <label class="control-label col-sm-2">Avatar:</label>
                                        <div class="fileinput fileinput-new  col-sm-10" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="max-width: 200px; max-height: 150px;">
                                                @if($user->pic)
                                                    <img src="{!! url('/').'/uploads/users/'. Sentinel::getUser()->pic !!}" alt="img"
                                                         class="img-responsive"/>
                                                @elseif($user->gender === "male")
                                                    <img src="{{ asset('assets/images/authors/avatar3.png') }}" alt="..."
                                                         class="img-responsive"/>
                                                @elseif($user->gender === "female")
                                                    <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..."
                                                         class="img-responsive"/>
                                                @else
                                                    <img src="{{ asset('assets/images/authors/no_avatar.jpg') }}" alt="..."
                                                         class="img-responsive"/>

                                                @endif
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                    <span class="fileinput-exists">Change</span>
                                                    <input type="file" name="pic" id="pic" accept="image/png, image/jpeg, image/jpg"/>
                                                </span>
                                                <span class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</span>
                                            </div>
                                        </div>

                                </div>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('first_name', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-primary">person</i>
                                        </span>
                                        <label class="control-label" for="first_name">First Name</label>
                                        <input id="first_name" name="first_name" required type="text" class="form-control" value="{!! old('first_name',$user->first_name) !!}">
                                    </div>
                                    <span class="help-block">{{ $errors->first('first_name', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('last_name', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-primary">person</i>
                                        </span>
                                        <label class="control-label" for="u-name">Last Name</label>
                                        <input type="text" name="last_name" id="u-name" class="form-control"
                                               value="{!! old('last_name',$user->last_name) !!}"></div>
                                    <span class="help-block">{{ $errors->first('last_name', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('email', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-primary">mail</i>
                                        </span>
                                        <label class="control-label" for="email">Email</label>
                                        <input type="email" required placeholder=" " id="email" name="email" class="form-control"
                                               value="{!! old('email',$user->email) !!}"></div>
                                    <span class="help-block">{{ $errors->first('email', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('password', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <p class="text-warning"><strong>If you don't want to change password... please leave them empty</strong></p>
                                </div>
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-primary">vpn_key</i>
                                            </span>
                                        <label class="control-label" for="pwd">Password</label>
                                        <input type="password" name="password" id="pwd" class="form-control"></div>
                                    <span class="help-block">{{ $errors->first('password', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('password_confirm', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-primary">vpn_key</i>
                                            </span>
                                        <label class="control-label" for="cpwd">Confirm Password</label>
                                        <input type="password" name="password_confirm" id="cpwd" class="form-control"></div>
                                    <span class="help-block">{{ $errors->first('password_confirm', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-sm-offset-2">
                                <label class=" col-lg-2 control-label">Gender: </label>
                                    <div class="col-lg-10">
                                        <div>
                                            <label>
                                                <input type="radio" name="gender" value="male" @if($user->gender === "male") checked="checked" @endif />
                                                Male
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="radio" name="gender" value="female" @if($user->gender === "female") checked="checked" @endif />
                                                Female
                                            </label>
                                        </div>
                                        <div>
                                            <label>
                                                <input type="radio" name="gender" value="other" @if($user->gender === "other") checked="checked" @endif />
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-11 col-sm-offset-1">
                                <h3 class="text-primary" id="title">Contact Details: </h3>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('address', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <label class="control-label">Address:</label>
                                    <textarea rows="3" cols="30" class="form-control" id="add1"
                                              name="address">{!! old('address',$user->address) !!}</textarea>
                                </div>
                                <span class="help-block">{{ $errors->first('address', ':message') }}</span>
                            </div>

                            <div class="form-group {{ $errors->first('country', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <label class="control-label">Select Country: </label>
                                    <div>
                                        {!! Form::select('country', $countries, $user->country,['class' => 'form-control select2', 'id' => 'countries']) !!}
                                        <span class="help-block">{{ $errors->first('country', ':message') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('user_state', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-primary">add_circle</i>
                                        </span>
                                        <label class="control-label" for="state">State</label>
                                        <input type="text" placeholder=" " id="state" class="form-control" name="user_state"
                                               value="{!! old('user_state',$user->user_state) !!}"/>
                                    </div>
                                </div>
                                <span class="help-block">{{ $errors->first('user_state', ':message') }}</span>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('city', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-primary">add_circle</i>
                                        </span>
                                        <label class="control-label" for="city">City</label>
                                        <input type="text" placeholder=" " id="city" class="form-control" name="city"
                                               value="{!! old('city',$user->city) !!}"/>
                                    </div>
                                </div>
                                <span class="help-block">{{ $errors->first('city', ':message') }}</span>
                            </div>

                            <div class="form-group label-floating {{ $errors->first('postal', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <i class="material-icons text-primary">add_circle</i>
                                        </span>
                                        <label class="control-label" for="postal">Postal</label>
                                        <input type="text" placeholder=" " id="postal" class="form-control"
                                               name="postal" value="{!! old('postal',$user->postal) !!}"/>
                                    </div>
                                    <span class="help-block">{{ $errors->first('postal', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->first('dob', 'has-error') }}">
                                <div class="col-lg-6 col-sm-offset-2">
                                    <label class="control-label">DOB</label>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons text-primary">date_range</i>
                                            </span>
                                        @if($user->dob === "0000-00-00")
                                            {!!  Form::text('dob', '', array('id' => 'datepicker','class' => 'form-control'))  !!}
                                            @elseif($user->dob === null)
                                                {!!  Form::text('dob', '', array('id' => 'datepicker','class' => 'form-control'))  !!}
                                        @else
                                                {!!  Form::text('dob', old('dob',$user->dob), array('id' => 'datepicker','class' => 'form-control', 'data-date-format'=> 'YYYY-MM-DD'))  !!}
                                        @endif
                                    </div>
                                    <span class="help-block">{{ $errors->first('dob', ':message') }}</span>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-10">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>

                        </form>{{--{!!  Form::close()  !!}--}}
                    </div>
                </div>
            </div>
        </div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/frontend/user_account.js') }}"></script>

@stop
