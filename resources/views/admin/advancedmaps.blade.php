@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Advanced Maps
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gmaps/css/examples.css') }}"/>
    <style>
        body {
            margin : 0;
        }
        .responsive_map {
            display: block;
            width: 95%;
            margin: 0 auto;
        }
        @media (max-width:320px){
            #geocoding_form .form-group.label-floating{
                margin:28px 55px 0 0;
            }
            .btn_advance1{
                margin-top:0;
            }
        }
    </style>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Advanced Maps</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#"> Maps</a></li>
            <li class="active">Advanced Maps</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">search</i>
                            Search Place</h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <form method="post" id="geocoding_form">
                                <div class="form-group label-floating input">
                                    <label class="control-label" for="address">Type here to search</label>
                                    <div class="input-group">
                                        <input type="text" id="address" name="address" size="28"
                                               class="form-control">
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-primary btn-raised" value="Search">
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <br/>
                        <div id="map1" class="gmap responsive_map"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="material-icons">search</i>
                            Search Routes</h4>
                        <span class="pull-right">
                            <i class="material-icons showhide clickable">keyboard_arrow_up</i>
                            <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div id="map" class="large responsive_map"></div>
                        <div class="row ">
                            <div class="col-md-12">
                                <a href="#" class="btn btns btn-raised btn-primary btn-responsive btn-small btn-advance"
                                   id="get_route">Get route</a>
                                <a href="#" class="btn btns btn-raised btn-primary btn-responsive btn-small btn-advance"
                                   id="back">&laquo; Back</a>
                                <a href="#" class="btn btns btn-raised btn-primary btn-responsive btn-small btn-advance btn_advance1"
                                   id="forward">Forward &raquo;</a>
                            </div>
                        </div>
                        <div class="row">
                            <ul id="steps"></ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?libraries=places,geometry&key={{ env('GOOGLE_MAPS_API_KEY') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/js/gmaps.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/adv_maps.js') }}"></script>

@stop
