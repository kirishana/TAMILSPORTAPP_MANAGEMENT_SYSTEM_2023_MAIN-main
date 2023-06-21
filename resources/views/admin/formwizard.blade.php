@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Form Wizard
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
    {{--<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
    <!--section starts-->
    <h1>Form Wizards</h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ route('admin.dashboard') }}">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
        <li class="active">Form Wizards</li>
    </ol>
</section>
<!--section ends-->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">notifications</i> Bootstrap Wizard
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <form id="commentForm" method="post" action="#">
                        <div id="rootwizard">
                            <ul>
                                <li>
                                    <a href="#tab1" data-toggle="tab">First</a>
                                </li>
                                <li>
                                    <a href="#tab2" data-toggle="tab">Second</a>
                                </li>
                                <li>
                                    <a href="#tab3" data-toggle="tab">Third</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="tab1">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group label-floating">
                                        <label for="userName" class="control-label">User name *</label>
                                        <input id="userName" name="username" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="email" class="control-label">Email *</label>
                                        <input id="email" name="email" type="text" class="form-control required email">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="password" class="control-label">Password *</label>
                                        <input id="password" name="password" type="password" class="form-control required">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="confirm" class="control-label">Confirm Password *</label>
                                        <input id="confirm" name="confirm" type="password" class="form-control required">
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab2" disabled="disabled">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group label-floating">
                                        <label for="name" class="control-label">First name *</label>
                                        <input id="name" name="fname" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="surname" class="control-label">Last name *</label>
                                        <input id="surname" name="lname" type="text" class="form-control required">
                                    </div>
                                    <div class="form-group">
                                        <label for="genderb" class="control-label">Gender</label>
                                        <select id="genderb" class="form-control">
                                            <option disabled selected>Select</option>
                                            <option>MALE</option>
                                            <option>FEMALE</option>
                                        </select>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="address" class="control-label">Address</label>
                                        <input id="address" name="address" type="text" class="form-control">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label for="age" class="control-label">Age *</label>
                                        <input id="age" name="age" type="text" maxlength="3" class="form-control required number" data-bv-greaterthan-inclusive="false"  data-bv-lessthan-inclusive="true">
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab3" disabled="disabled">
                                    <div class="form-group">
                                        <label class="control-label">Home number *</label>
                                        <input type="text" class="form-control" id="phone1" name="phone1" placeholder="(999)999-9999">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Personal number *</label>
                                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="(999)999-9999">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Alternate number *</label>
                                        <input type="text" class="form-control" id="phone3" name="phone3" placeholder="(999)999-9999">
                                    </div>
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input id="acceptTerms" name="acceptTerms" type="checkbox"> I agree with the Terms and Conditions.
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <ul class="pager wizard">
                                    <li class="previous">
                                        <a href="#">Previous</a>
                                    </li>
                                    <li class="next">
                                        <a href="#">Next</a>
                                    </li>
                                    <li class="next finish">
                                        <a href="javascript:;">Finish</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">User Register</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>You Submitted Successfully.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" ></script>
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    <script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/form_wizard.js') }}"  type="text/javascript"></script>

@stop