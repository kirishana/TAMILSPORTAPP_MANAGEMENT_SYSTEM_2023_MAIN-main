@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Google Maps
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/gmaps/css/examples.css') }}"/>
    <style>
        body{
            margin:0;
        }
        .gmap {
            width: 100%;
            height: 300px;
        }
        .gm-fullscreen-control{
            z-index: 2147483647;
        }
        @media (max-width:320px){
            #gmap-types .gm-style div:nth-child(7){
                margin:10px 0 !important;
            }
        }
    </style>
    <!--end of page level css-->

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Google Maps</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href="#">Maps</a></li>
            <li class="active">Google Maps</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4 class="panel-title">Basic</h4>
                                <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-top" class="gmap"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">Terrain</h4>
                                <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-terrain" class="gmap"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">Satellite</h4>
                                <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-satellite" class="gmap"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h4 class="panel-title">Markers</h4>
                                <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-markers" class="gmap"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h4 class="panel-title">Styled Maps</h4>
                                <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-styled" class="gmap"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Basic charts strats here-->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h4 class="panel-title">Map Types</h4>
                                <span class="pull-right">
                                    <i class="material-icons showhide clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body" style="padding:10px !important;">
                        <div id="gmap-types" class="gmap"></div>
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
            src="http://maps.googleapis.com/maps/api/js?libraries=geometry&key={{ env('GOOGLE_MAPS_API_KEY') }}">
    </script>
    <script type="text/javascript" src="{{ asset('assets/vendors/gmaps/js/gmaps.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/custommaps.js') }}"></script>

@stop
