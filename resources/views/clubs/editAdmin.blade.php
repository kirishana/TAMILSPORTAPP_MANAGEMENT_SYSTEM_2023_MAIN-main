@extends('admin/layouts/menu')


@section('title')
Edit Club
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<!--page level css -->
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
<!--end of page level css-->
@stop


{{-- Page content --}}
@section('content2')
<section class="content-header">
    <h1>{{ __('sidebar.clubs') }}</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Clubs</li>
        <li class="active">Edit Club</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="material-icons">person_add</i>
                        {{ __('club.editing_club') }}: <span class="user_name_max">{!! $club->club_name!!}</span>
                    </h3>
                    <span class="pull-right">
                        <i class="material-icons">keyboard_arrow_left</i>

                                    <a href="/all-clubs" style="color:white">
                            {{ __('staffs.back') }}</a>                                </span>
                </div>

                
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            @if($errors->any())
                                <div id="notification_remove">
                                @foreach ($errors->all() as $error)
                                    <div class="text-danger">{{ $error }}</div>
                                @endforeach
                                </div>
                            @endif

                            
                            <form name="commentForm" id="commentForm" action="/club/update/{{$club->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                <!-- <input type="hidden" name="_method" value="PUT"/> -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                                <!-- ------------------------------------------------------------------------------ -->

                                    <section class="content">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating {{ $errors->first('club_registation_num', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="club_registation_num">{{ __('club.reg_no') }}</label>
                                                        <input id="club_registation_num" name="club_registation_num"  type="text" class="form-control" value="{{$club->club_registation_num}}" >
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating {{ $errors->first('club_name', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">person</i></span>
                                                        <label class="control-label" for="club_name">{{ __('club.club_name') }}</label>
                                                        @if($club->users->count() > 0)
                                                        <input type="text" disabled value="{{$club->club_name}}" class="form-control">
                                                        <input id="club_name" name="club_name" required type="hidden" class="form-control" value="{{$club->club_name}}">
                                                        @else
                                                        <input id="club_name" name="club_name" required type="text" class="form-control" value="{{$club->club_name}}">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group  {{ $errors->first('club_email', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">email</i></span>
                                                        <label class="control-label" for="club_email">{{ __('dashboard.email') }}</label>
                                                        <input id="club_email" name="club_email" required type="text" class="form-control" value="{{$club->club_email}}">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        {!! $errors->first('club_email', '<span class="help-block">:message</span>') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>

                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group  {{ $errors->first('club_start_date', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">event_note</i></span>
                                                                                                                <label class="control-label" for="club_email">{{ __('club.establish_date') }}</label>
                                                        <input id="club_start_date" name="club_start_date"  type="date" class="form-control" value="{{$club->club_start_date}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating {{ $errors->first('mobile', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                                        <label class="control-label" for="mobile">{{ __('club.mobile') }}</label>
                                                        <input id="mobile" name="mobile" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" required type="number" class="form-control" value="{{$club->mobile}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating {{ $errors->first('tpnumber', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_in_talk</i></span>
                                                        <label class="control-label" for="tpnumber">{{ ('dashboard.phone_no') }}</label>
                                                        <input id="tpnumber" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="8" name="tpnumber" type="number" class="form-control" value="{{$club->tpnumber}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating {{ $errors->first('address', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="address">{{ __('dashboard.address') }}</label>
                                                        <input id="address" name="address" required type="text" class="form-control" value="{{$club->address}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating {{ $errors->first('city', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="city">{{ __('dashboard.city') }}</label>
                                                        <input id="city" name="city" required type="text" class="form-control" value="{{$club->city}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                                <div class="form-group label-floating {{ $errors->first('postal', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <label class="control-label" for="postal">{{ __('dashboard.postal_code') }}</label>
                                                        <input id="postal" name="postal" required type="number" class="form-control" value="{{$club->postal}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-2 col-md-2"></div>

                                            <div class="col-xs-12 col-sm-5 col-md-5">
                                            <div class="form-group label-floating">
                                                <div class="form-group label-floating {{ $errors->first('country', 'has-error') }}">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons text-light">person</i></span>
                                                        <!-- <label class="control-label" for="country">Country</label>
                                                        <input id="country" name="country" required type="text" class="form-control" value="{{$club->country}}"> -->
                                                        <select id="disabledSelect" name="country" class="form-control">
                                                            <option disabled selected>Select country</option>
                                                             @foreach ($countries as $country)
                                                            <option  value="{{ $country->id }}" {{$country->id==$club->country_id?'selected':''}}>{{ $country->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <section>

                                    <div class="pull-right">
                                    <a href="">
                                        <p class="signin button" style="padding-top: 15px;">
                                        <button type="submit" class="btn btn-success" style="float:right">{{ __('settings.update') }}</button>

                                        <!-- <input type="submit" class="btn btn-raised btn-success btn-block" value="Update" /> -->
                                        </p>
                                        </a>
                                    </div>

                                    <!-- <a href="/club/edit/{{$club->id}}">                                                
                                                    <button  class="btn btn-primary" style="float:right">Edit</button>
                                                </a> -->
                                </form>

                </div>


            </div>
        </div>
    </div>
    </div>
    </div>
    <!--row end-->
</section>

                          @stop



                   
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>
  $(function () {
    $('.reportImage').hide();

    //show it when the checkbox is clicked
    $('input[name="checkbox"]').on('click', function () {
        if ($(this).prop('checked')) {
            $('.reportImage').fadeIn();
        } else {
            $('.reportImage').hide();        }
    });
});
    </script>
{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('assets/js/pages/edituser.js') }}" type="text/javascript"></script> -->
@stop
