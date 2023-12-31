@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    GUI CRUD Builder
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/sweetalert/css/sweetalert2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/jquery_steps/css/jquery.steps.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/custom_gui_builder.css') }}" rel="stylesheet" />
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>GUI CRUD Generator</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Generator Builder</a></li>
            <li class="active">GUI CRUD Generator</li>
        </ol>
    </section>
    <section class="content paddingleft_right15">
        <div id="info" style="display: none"></div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="box-title">Laravel Generator Builder</h4>
            </div>
            <div class="panel-body">


                <form id="form" action="#" class="basic_steps">
                    <h6>Model Details</h6>
                    <div class="mt-2 mb-3">
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <ul class="instructions">
                                    <li>Model Name: based on model name CRUD generates model, controller and table</li>
                                    <li>Command Type: Select Command type scaffold Generator</li>
                                    <li>Table Name: If you want custom table name change the table name.</li>

                                </ul>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtModelName">Model Name<span class="required">*</span></label>
                                <input type="text" class="form-control text-capitalize" required name="model_name" id="txtModelName" placeholder="Enter name">

                            </div>
                            <div class="form-group col-md-4">
                                <label style="margin-bottom: 20px;" for="drdCommandType">Command Type</label>
                                <select id="drdCommandType" class="form-control" style="width: 100%">
                                    {{--<option value="infyom:api_scaffold">API Scaffold Generator</option>
                                    <option value="infyom:api">API Generator</option>--}}
                                    <option value="infyom:scaffold">Scaffold Generator</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="txtCustomTblName">Table Name</label> <i class="fa fa-info" data-toggle="tooltip" title="Following Laravel Table Convention"></i>
                                <input type="text" class="form-control" id="txtCustomTblName" required placeholder="Enter table name">
                            </div>
                        </div>
                    </div>
                    <h6>Options</h6>
                    <div class="mt-2 mb-3">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <ul class="instructions">
                                    <li>Options : Selectr options what you want.</li>
                                    <li>Prefix : Prefix added to models, controllers, requests, repositories.</li>
                                    <li>Paginate : If you want change paginate enter paginate length.</li>
                                </ul>
                            </div>

                            <div class="form-group col-md-12">
                                <label for="txtModelName">Options</label>
                                <div class="form-inline form-group chk-align" style="border-color: transparent">
                                    <label>
                                        <input type="checkbox" class="flat-red" id="chkDelete"><span
                                                class="chk-label-margin"> Soft Delete </span>
                                    </label>

                                    <label id="chDataTable">
                                        <input type="checkbox" class="flat-red" id="chkDataTable" checked> <span
                                                class="chk-label-margin">Datatables</span>
                                    </label>

                                    <label id="chMigrate">
                                        <input type="checkbox" class="flat-red" id="chkMigrate" checked> <span
                                                class="chk-label-margin">Migrate</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="txtPrefix">Prefix</label>
                                <input type="text" class="form-control" id="txtPrefix" placeholder="Enter prefix">
                            </div>

                            <div class="form-group col-md-2 col-sm-6">
                                <label for="leftMenuIcons">Icon</label>
                                <input type="text" name="icon_name" class="form-control" data-toggle="modal"
                                       data-target="#iconsModal" id="leftMenuIcons" placeholder="Select your icon">
                            </div>
                            <div class="form-group col-md-4 col-sm-6">
                                <label for="iconColor" style="margin-bottom:20px">Icon Color</label>
                                <select name="iconColor" id="iconColor" class="form-control" style="width: 100%">
                                    <option value="text-danger" class="bg-danger">Danger</option>
                                    <option value="text-warning" class="bg-warning">warning</option>
                                    <option value="text-info" class="bg-info">Info</option>
                                    <option value="text-primary" class="bg-primary">Primary</option>
                                    <option value="text-success" class="bg-success">Success</option>
                                </select>
                                {{--<input type="text" name="icon_name" class="form-control" id="iconColor" placeholder="Select your icon">--}}
                            </div>

                            <div class="form-group col-md-2">
                                <label for="txtPaginate">Paginate</label>
                                <input type="number" class="form-control" value="10" id="txtPaginate" placeholder="" min="1">
                            </div>


                        </div>
                    </div>
                    <h6>Fields</h6>
                    <div class="mt-2 mb-3">

                        <div class="col-md-12 mb-3">
                            <ul class="instructions">
                                <li>Field Name: it is for table fileds, don't use any special characters.</li>
                                <li>DB Type: Select type of database</li>
                                <li>Validations : If you want add validation to fields, select validation type.</li>
                                <li>HTML Type : select HTML type.</li>
                                <li>Primary : If you want make a field as primary check it.</li>

                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                The Primary key <code>id</code> and timestamps <code>created_at</code> and <code>updated_at</code>
                                will be created automatically!
                            </div>
                        </div>
                        <div class="table-responsive col-md-12">
                            <table class="table table-striped table-bordered" id="table">
                                <thead class="no-border">
                                <tr>
                                    <th>Field Name</th>
                                    <th>DB Type</th>
                                    <th>Validations</th>
                                    <th>Html Type</th>
                                    <th style="width: 68px">Primary</th>
                                    <th style="width: 87px">Searchable</th>
                                    <th style="width: 63px">Fillable</th>
                                    <th style="width: 65px">In Form</th>
                                    <th style="width: 67px">In Index</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody id="container" class="no-border-x no-border-y ui-sortable">

                                </tbody>
                            </table>
                        </div>


                        <div class="form-inline col-md-12" style="padding-top: 10px">
                            <div class="form-group chk-align" style="border-color: transparent;">
                                <button type="button" class="btn btn-primary btn-flat" id="btnAdd"> Add Field
                                </button>
                            </div>
                        </div>

                        <div class="form-inline col-md-12 div_gnr_rst">
                            <div class="form-group btn_generate">
                                <button type="submit" class="btn btn-success btn-flat" id="btnGenerate">Generate
                                </button>
                            </div>

                        </div>
                    </div>
                </form>

                <div class="form-group btn_generate">
                    <button type="button" class="btn btn-default btn-flat" id="btnReset" data-toggle="modal"
                            data-target="#confirm-delete"> Reset
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"
                                aria-hidden="true">&times;
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Confirm Reset</h4>
                    </div>

                    <div class="modal-body">
                        <p style="font-size: 16px">This will reset all of your fields. Do you want to
                            proceed?</p>

                        <p class="debug-url"></p>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-flat btn-default" data-dismiss="modal">No
                        </button>
                        <a id="btnModalReset" class="btn btn-flat btn-danger btn-ok" data-dismiss="modal">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="iconsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Select Icon</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <i class="material-icons text-primary leftsize">home</i>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <i class="material-icons text-primary leftsize">info</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">local_florist</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">edit</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">brush</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">settings_input_component</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">email</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">alarm</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">build</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">face</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">shop</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">language</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">image</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">settings</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">list</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">group</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">visibility</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">translate</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">map</i>
                        </div>
                        <div class="col-md-3 col-sm-4 ">
                            <i class="material-icons text-primary leftsize">shopping_cart</i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@stop
@section('footer_scripts')
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/sweetalert/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/jquery_steps/js/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/pluginjs/validate.js') }}"></script>
    <script src="{{ asset('assets/js/pages/custom_gui_builder.js') }}"></script>
    <script>

        $('input[type=radio]').iCheck({
            checkboxClass: 'iradio_square',
            radioClass: 'iradio_square-blue'
        });

        var modelCheckUrl = "{{ url('admin/modelCheck') }}";
        var generateUrl = "{!! url('') !!}/admin/generator_builder/generate";
        var componentUrl = "{!! url('') !!}/admin/field_template";

    </script>
@stop
