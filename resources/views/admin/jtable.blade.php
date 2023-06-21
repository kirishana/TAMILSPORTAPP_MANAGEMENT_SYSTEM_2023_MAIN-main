@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    JTable
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/vendors/jtable/themes/metro/blue/jtable.css') }}"/>
    <link href="{{ asset('assets/css/pages/jtablemetroblue_jquery-ui.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/iCheck/css/all.css') }}"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/pages/jtable.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .jtable-input-label{
            display:none;
        }
    </style>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>JTable</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">DataTables</a>
            </li>
            <li class="active">JTable</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">

            <div class="col-md-12">
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                <div class="portlet box primary">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="material-icons">reorder</i>  JTable
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="filtering">

                            <form class="form-inline" >

                                    <div class="form-group label-floating mr-10">
                                        <label class="control-label" for="name">First Name</label>
                                        <input id="name" name="name" type="text" class="form-control">
                                    </div>


                                    <div class="form-group label-floating mr-10">
                                        <label class="control-label" for="lname">LastName</label>
                                        <input id="lname" name="lname" type="text" class="form-control">
                                    </div>

                                <div class="form-group">
                                <button type="submit" class="btn btn-primary" id="LoadRecordsButton">Filter</button>
                                </div>
                            </form>
                            <br>
                        </div>
                        <div id="StudentTableContainer">
                        </div>
                        <br>
                        <button id="DeleteAllButton" class="btn btn-primary">Delete all selected records</button>
                    </div>
                </div>
                <!-- END SAMPLE TABLE PORTLET-->
            </div>

        </div>
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')
{{--    <script src="{{ asset('assets/vendors/jtable/js/jquery.jtable.js') }}"></script>--}}
    <script src="{{ asset('assets/js/pages/jtable_custom.js') }}"></script>
    <script src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {

            //Prepare jtable plugin
            $('#StudentTableContainer').jtable({
                title: 'Employee List',
                paging: true, //Enable paging
                pageSize: 10, //Set page size (default: 10)
                sorting: true, //Enable sorting
                defaultSorting: 'firstname ASC', //Set default sorting
                selecting: true, //Enable selecting
                multiselect: true, //Allow multiple selecting
                selectingCheckboxes: true,
                //selectOnRowClick: false, //Enable this to only select using checkboxes
                ajaxSettings: {
                    type: 'GET',
                    dataType: 'json'
                },
                actions: {
                    listAction:  "{{ url('admin/jtable/index') }}",
                    deleteAction: function (postData) {
                        return $.Deferred(function ($dfd) {
                            $.ajax({
                                url: "{{ url('admin/jtable/delete') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: postData,
                                success: function (data) {
                                    $dfd.resolve(data);
                                },
                                error: function () {
                                    $dfd.reject();
                                }
                            });
                        });
                    },
                    updateAction: function (postData) {
                        return $.Deferred(function ($dfd) {
                            $.ajax({
                                url: "{{ url('admin/jtable/update') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: postData,
                                success: function (data) {
                                    console.log('success');
                                    $dfd.resolve(data);
                                },
                                error: function (data) {
                                    console.log('error');
                                    console.log(data);
                                    $dfd.reject();
                                }
                            });
                        });
                    },
                    createAction: function (postData) {
                        console.log("creating from custom function...");
                        return $.Deferred(function ($dfd) {
                            $.ajax({
                                url: "{{ url('admin/jtable/store') }}",
                                type: 'POST',
                                dataType: 'json',
                                data: postData,
                                success: function (data) {
                                    console.log('success');
                                    $dfd.resolve(data);
                                },
                                error: function (data) {
                                    console.log('error');
                                    console.log(data);
                                    $dfd.reject();
                                }
                            });
                        });
                    }
                },
                fields: {
                    id: {
                        key: true,
                        create: false,
                        edit: false,
                        list: false
                    },
                    firstname: {
                        title: 'First Name',
                        width: '23%',
                        inputClass: 'validate[required], form-control'
                    },
                    lastname: {
                        title: 'last Name',
                        width: '23%',
                        inputClass: 'validate[required], form-control'
                    },
                    age: {
                        title: 'Age',
                        width: '15%',
                        inputClass: 'validate[required], form-control'
                    },
                    job: {
                        title: 'Job',
                        width: '23%',
                        inputClass: 'validate[required], form-control'
                    },
                    email: {
                        title: 'Email address',
                        width: '15%',
                        inputClass: 'validate[required,custom[email]], form-control'
                    }

                }
            });




            //Load student list from server
            $('#StudentTableContainer').jtable('load');

            //Delete selected students
            $('#DeleteAllButton').button().click(function () {
                var $selectedRows = $('#StudentTableContainer').jtable('selectedRows');
                $('#StudentTableContainer').jtable('deleteRows', $selectedRows);
            });
            //Re-load records when user click 'load records' button.
            $('#LoadRecordsButton').click(function (e) {
                e.preventDefault();
                $('#StudentTableContainer').jtable('load', {
                    firstname: $('#name').val(),
                    lastname: $('#lname').val()
                });
            });

            //Load all records when page is first shown
            $('#LoadRecordsButton').click();

            $('.jtable-left-area select').addClass('form-control');
            $('button').addClass('btn btn-default');
            $('#AddRecordDialogSaveButton, #EditDialogSaveButton').removeClass('btn-default').addClass('btn-primary');
            $('#DeleteDialogButton').removeClass('btn-default').addClass('btn-danger');
            $('#DeleteAllButton,#LoadRecordsButton').removeClass('btn-default');
        });

        $('body').on('click','.jtable-toolbar-item-add-record,.jtable-edit-command-button',function(){
            setTimeout(function(){
                var isValid = true;
                $('input').each(function() {
                    if ( $(this).val() === '' )
                        isValid = false;
                    $(this).parent().addClass('is-empty');
                });
            });
        });


    </script>

@stop
