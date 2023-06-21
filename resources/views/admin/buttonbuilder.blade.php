@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Buttons Builder
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/css/pages/buttonbuilder2.css') }}" rel="stylesheet"/>
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Button Builder</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Builders</a>
                    </li>
                    <li class="active">Button Builder</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissable visible-xs visible-md">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                May not work properly in touch enabled devices as it as requires drag and drop.
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">crop_square</i>
                        Button Builder
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body">
                    <!-- button Builder. -->
                    <div class="row">
                        <div class="col-md-6">
                            <p class="lead">Generated code</p>
                            <div class="well">
                                <div id="result">
                                    <div id="button">
                                        <a href="#" class="btn btn-raised btn-sm btn-primary">
                                            <span class="glyphicon glyphicon-check"></span>
                                            Default text here
                                        </a>
                                    </div>
                                    <br>
                                    <p>
                                        Generated Code
                                        <input id="output" type="text" class="form-control input-block-level" placeholder="Output"></p>
                                </div>
                            </div>
                            <p></p>
                            <div id="carbonads-container"></div>
                            <p></p>
                            <hr></div>
                        <div class="col-md-6">
                            <p class="lead">Button text :</p>
                            <p id="input">
                                <input id="name" autocomplete="off" class="form-control" type="text" placeholder="Please enter your button name"></p>
                            <p class="lead">Color :</p>
                            <div id="types" class="btn-group">
                                <button name="color" type="button" class="btn btn-default border-none" value="btn-default">Default</button>
                                <button name="color" type="button" class="btn btn-primary" value="btn-primary">Primary</button>
                                <button name="color" type="button" class="btn btn-info" value="btn-info">Info</button>
                                <button name="color" type="button" class="btn btn-success" value="btn-success">Success</button>
                                <button name="color" type="button" class="btn btn-warning" value="btn-warning">Warning</button>
                                <button name="color" type="button" class="btn btn-danger" value="btn-danger">Danger</button>
                            </div>
                            <p class="lead">Size :</p>
                            <div id="sizes">
                                <p>
                                    <button class="btn btn-xs btn-raised btn-primary" value="btn-xs" type="button">Mini</button>
                                    <button class="btn btn-sm btn-raised btn-primary" value="btn-sm" type="button">Small</button>
                                    <button class="btn btn-md btn-raised btn-primary" value="btn-md" type="button">Default</button>
                                    <button class="btn btn-primary btn-raised btn-lg" value="btn-lg" type="button">Large</button>
                                </p>
                                <p>
                                    <a href="#" class="btn btn-raised btn-primary btn-block" data-toggle="button">Full width button</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="icons">
                                <p class="lead">Icon :</p>
                                <div class="row">
                                    <div class="form-group">
                                        <label for="search" class="col-md-2 m-b-5 control-label">Search icons :</label>
                                        <div class="col-md-4 m-b-5">
                                            <input type="text" autocomplete="off" class="typeahead form-control" id="search" placeholder="Search icon">
                                        </div>
                                    </div>
                                    <div class="col-md-6 m-b-5">
                                        Icon position :
                                        <div id="icon-position" class="btn-group">
                                            <button class="btn btn-default" value="left" type="button">
                                                <i class="material-icons">keyboard_arrow_left</i>
                                                &nbsp; &nbsp;Left
                                            </button>
                                            <button class="btn btn-default" value="right" type="button">
                                                Right &nbsp; &nbsp;
                                                <i class="material-icons">keyboard_arrow_right</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="bs-glyphicons">
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">adjust</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_align_center</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_align_justify</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_align_left</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_align_right</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">arrow_downward</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">arrow_upward</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">stars</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">fast_rewind</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">not_interested</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">done</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">add_alert</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_bold</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">book</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">bookmark</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">library_books</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">hourglass_full</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">perm_phone_msg</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">shopping_cart</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">phonelink_lock</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">add_a_photo</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">hotel</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">movie</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">music_video</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">radio</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">recent_actors</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">surround_sound</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">business</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">call_split</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">chat</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">block</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">cloud</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">cloud_circle</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">cloud_done</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">cloud_download</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">cloud_off</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">copyright</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">credit_card</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">headset</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">font_download</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">attach_file</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">attach_money</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">highlight</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">insert_invitation</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">edit_location</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">eject</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">remove_circle_outline</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">videocam</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">content_cut</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">import_export</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">remove_red_eye</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">panorama_fish_eye</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">vpn_key</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">keyboard</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">live_help</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">email</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">dialpad</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">import_contacts</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">invert_colors_off</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">confirmation_number</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">flag</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">flash_auto</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">flash_off</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">flash_on</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">shuffle</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">create_new_folder</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">folder</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">folder_open</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">folder_shared</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">folder_special</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">fullscreen</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">fullscreen_exit</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">battery_charging_full</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">battery_full</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">voicemail</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">stop_screen_share</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">thumb_down</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">thumb_up</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">thumbs_up_down</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">hd</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">contact_mail</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">healing</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">loop</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">mic</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">snooze</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">content_copy</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">gesture</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">drafts</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">mail</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">move_to_inbox</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">next_week</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">save</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">select_all</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">send</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">airplanemode_active</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">airplanemode_inactive</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">bluetooth</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">bluetooth_searching</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">brightness_auto</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">brightness_high</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">brightness_medium</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">gps_fixed</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">gps_not_fixed</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">network_wifi</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">sd_storage</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">wifi_tethering</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_color_fill</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_shapes</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">space_bar</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">strikethrough_s</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">device_hub</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">devices_other</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">router</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">scanner</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">security</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">sim_card</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">smartphone</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">speaker</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">tablet_android</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">toys</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">watch</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">assistant</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">blur_circular</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">blur_linear</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">blur_on</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">blur_off</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">brightness_1</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">brightness_2</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">brush</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">color_lens</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">compare</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">crop_free</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">nature</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">nature_people</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">wb_incandescent</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">directions</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">directions_run</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_bar</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_cafe</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_car_wash</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_dining</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_gas_station</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_mall</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_offer</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">local_pizza</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">satellite</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">zoom_out_map</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">traffic</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">network_check</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">child_care</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">pool</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">group</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">school</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">location_city</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">fitness_center</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">golf_course</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">search</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">youtube_searched_for</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">settings</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">repeat</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">skip_next</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">skip_previous</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">volume_down</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">swap_calls</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">refresh</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">pause</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">pause_circle_filled</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">pause_circle_outline</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">mic</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">mic_none</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">mic_off</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">playlist_add_check</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">sort</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">send</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-text-width"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">forward</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">list</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">view_list</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_list_bulleted</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">format_list_numbered</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">publish</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">pan_tool</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">toc</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">touch_app</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">stop</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">present_to_all</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">text_fields</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">vertical_align_center</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">vertical_align_bottom</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">vertical_align_top</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <span class="glyphicon glyphicon-user"></span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">desktop_mac</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">desktop_windows</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">laptop</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">laptop_chromebook</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">laptop_mac</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">backspace</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">add</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">add_box</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">add_circle</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">add_circle_outline</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">zoom_in</i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="btn btn-default">
                                                    <i class="material-icons">zoom_out</i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--button builder ends--> </div>
            </div>
        </div>
    </div>
    <!--main content ends--> </section>
<!-- content -->
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <script src="{{ asset('assets/js/pages/scripts.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/underscore/js/underscore-min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/backbone/js/backbone-min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/buttonbuilder.js') }}"  type="text/javascript"></script>
    
@stop