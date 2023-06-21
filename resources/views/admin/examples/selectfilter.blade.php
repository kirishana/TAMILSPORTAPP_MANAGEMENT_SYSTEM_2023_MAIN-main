@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    Typeahead
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet"/>

    <style>
        body {
            overflow: -webkit-paged-x;
        }

        .select2-container {
            width: 100% !important;
        }

        /*github repository css*/
        .select2-result-repository__avatar {
            float: left;
            width: 60px;
            margin-right: 10px;
        }

        .select2-result-repository__avatar img {
            width: 100%;
            height: auto;
            border-radius: 2px;
        }

        .select2-result-repository__meta {
            margin-left: 70px;
        }
    </style>
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Select2Filter from Database</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Laravel Examples</a></li>
            <li class="active">Typeahead</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-primary" id="hidepanel1">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">info</i> Ajax Data
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons clickable">keyboard_arrow_up</i>

                                </span>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="tag_list">Country:</label>
                                <select id="tag_list" name="tag_list" class="form-control" width="100%"></select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">info</i> Multi select
                        </h3>
                        <span class="pull-right">
                                    <i class="material-icons clickable">keyboard_arrow_up</i>

                                </span>
                    </div>
                    <div class="panel-body">
                        <form>
                            <div class="form-group">
                                <label for="tag_list">Country:</label>
                                <select id="multiSelect" name="tag_list[]" class="form-control" width="100%"
                                        multiple></select>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->


    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script language="javascript" type="text/javascript"
            src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
    <script>
        var path = "{{ route('admin.selectfilter.find') }}";
        $('#tag_list').select2({
            placeholder: "Search country...",
            ajax: {
                url: path,
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
        $('#multiSelect').select2({
            placeholder: "Search country...",
            ajax: {
                url: path,
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });


    </script>

@stop
