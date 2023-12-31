@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Font Icons
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/ionicons/css/ionicons.min.css') }}" />
    <link href="{{ asset('assets/css/pages/icon.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Font Icons</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">UI Features</a>
                    </li>
                    <li class="active">Font Icons</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content paddingleft_right15">
    <!--main content-->
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">
                <i class="material-icons">notifications</i> Icons
            </h3>
            <span class="pull-right clickable">
                            <i class="material-icons">keyboard_arrow_up</i>
                        </span>
        </div>
        <div class="panel-body" id="slim">
            <div class='row'>
                <div class='col-xs-12'>
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#fa-icons" data-toggle="tab">Font Awesome</a>
                            </li>
                            <li>
                                <a href="#glyphicons" data-toggle="tab">Glyphicons</a>
                            </li>
                            <li>
                                <a href="#ionicons" data-toggle="tab">Ionicons</a>
                            </li>
                            <li>
                                <a href="#lineicons" data-toggle="tab">Simple Line Icons</a>
                            </li>
                            <li>
                                <a href="#material" data-toggle="tab">Material Icons</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- Font Awesome icons -->
                            <div class="tab-pane active" id="fa-icons">
                                <div class="input-group col-lg-4 center">
                                    <span class="input-group-addon" id="basic-addon1" style="vertical-align:text-top"><i class=". ion ion-ios-search"></i></span>
                                    <input type="text" class="form-control" placeholder="search icon" aria-describedby="basic-addon1" id="search">
                                </div>

                                <ul class="pl-0 list-inline">
                                    <li class="list-inline-item clr" data-toggle="tooltip"
                                        data-original-title="fab fa-500px">
                                        <div class="iconview  "><i class=". fa-2x fab fa-500px" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fab fa-accessible-icon" data-filter="fa-accessible-icon">
                                        <div class="iconview   "><i class=". fa-2x fab fa-accessible-icon"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fab fa-accusoft" data-filter="fa-accusoft">
                                        <div class="iconview "><i class=". fa-2x fab fa-accusoft" data-filter="fa-accusoft" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fab fa-acquisitions-incorporated">
                                        <div class="iconview "><i class=". fa-2x fab fa-acquisitions-incorporated"
                                                                                                   data-filter="fa-acquisitions-incorporated"  ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fas fa-ad">
                                        <div class="iconview "><i class=". fa-2x fas fa-ad" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fas fa-address-book">
                                        <div class="iconview "><i class=". fa-2x fas fa-address-book"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="far fa-address-book">
                                        <div class="iconview "><i class=". fa-2x far fa-address-book"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fas fa-address-card">
                                        <div class="iconview "><i class=". fa-2x fas fa-address-card"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-address-card">
                                        <div class="iconview "><i class=". fa-2x far fa-address-card"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-adjust">
                                        <div class="iconview "><i class=". fa-2x fas fa-adjust" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-adn">
                                        <div class="iconview "><i class=". fa-2x fab fa-adn" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-adobe">
                                        <div class="iconview "><i class=". fa-2x fab fa-adobe" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-adversal">
                                        <div class="iconview "><i class=". fa-2x fab fa-adversal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-affiliatetheme">
                                        <div class="iconview "><i class=". fa-2x fab fa-affiliatetheme"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-air-freshener">
                                        <div class="iconview "><i class=". fa-2x fas fa-air-freshener"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-algolia">
                                        <div class="iconview "><i class=". fa-2x fab fa-algolia" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-align-center">
                                        <div class="iconview "><i class=". fa-2x fas fa-align-center"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-align-justify">
                                        <div class="iconview "><i class=". fa-2x fas fa-align-justify"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-align-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-align-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-align-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-align-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-alipay">
                                        <div class="iconview "><i class=". fa-2x fab fa-alipay" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fas fa-allergies">
                                        <div class="iconview "><i class=". fa-2x fas fa-allergies" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="fab fa-amazon">
                                        <div class="iconview "><i class=". fa-2x fab fa-amazon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-amazon-pay">
                                        <div class="iconview "><i class=". fa-2x fab fa-amazon-pay"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ambulance">
                                        <div class="iconview "><i class=". fa-2x fas fa-ambulance" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-american-sign-language-interpreting">
                                        <div class="iconview "><i class=". fa-2x fas fa-american-sign-language-interpreting"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-amilia">
                                        <div class="iconview "><i class=". fa-2x fab fa-amilia" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-anchor">
                                        <div class="iconview "><i class=". fa-2x fas fa-anchor" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-android">
                                        <div class="iconview "><i class=". fa-2x fab fa-android" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-angellist">
                                        <div class="iconview "><i class=". fa-2x fab fa-angellist" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-double-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-double-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-double-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-double-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-double-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-double-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-double-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-double-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angle-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-angle-up" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-angry">
                                        <div class="iconview "><i class=". fa-2x fas fa-angry" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-angry">
                                        <div class="iconview "><i class=". fa-2x far fa-angry" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-angrycreative">
                                        <div class="iconview "><i class=". fa-2x fab fa-angrycreative"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-angular">
                                        <div class="iconview "><i class=". fa-2x fab fa-angular" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ankh">
                                        <div class="iconview "><i class=". fa-2x fas fa-ankh" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-app-store">
                                        <div class="iconview "><i class=". fa-2x fab fa-app-store" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-app-store-ios">
                                        <div class="iconview "><i class=". fa-2x fab fa-app-store-ios"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-apper">
                                        <div class="iconview "><i class=". fa-2x fab fa-apper" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-apple">
                                        <div class="iconview "><i class=". fa-2x fab fa-apple" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-apple-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-apple-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-apple-pay">
                                        <div class="iconview "><i class=". fa-2x fab fa-apple-pay" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-archive">
                                        <div class="iconview "><i class=". fa-2x fas fa-archive" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-archway">
                                        <div class="iconview "><i class=". fa-2x fas fa-archway" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-alt-circle-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-alt-circle-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-arrow-alt-circle-down">
                                        <div class="iconview "><i class=". fa-2x far fa-arrow-alt-circle-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-alt-circle-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-alt-circle-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-arrow-alt-circle-left">
                                        <div class="iconview "><i class=". fa-2x far fa-arrow-alt-circle-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-alt-circle-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-alt-circle-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-arrow-alt-circle-right">
                                        <div class="iconview "><i class=". fa-2x far fa-arrow-alt-circle-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-alt-circle-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-alt-circle-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-arrow-alt-circle-up">
                                        <div class="iconview "><i class=". fa-2x far fa-arrow-alt-circle-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-circle-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-circle-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-circle-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-circle-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-circle-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-circle-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-circle-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-circle-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrow-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrow-up" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrows-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrows-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrows-alt-h">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrows-alt-h"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-arrows-alt-v">
                                        <div class="iconview "><i class=". fa-2x fas fa-arrows-alt-v"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-artstation">
                                        <div class="iconview "><i class=". fa-2x fab fa-artstation"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-assistive-listening-systems">
                                        <div class="iconview "><i class=". fa-2x fas fa-assistive-listening-systems"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-asterisk">
                                        <div class="iconview "><i class=". fa-2x fas fa-asterisk" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-asymmetrik">
                                        <div class="iconview "><i class=". fa-2x fab fa-asymmetrik"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-at">
                                        <div class="iconview "><i class=". fa-2x fas fa-at" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-atlas">
                                        <div class="iconview "><i class=". fa-2x fas fa-atlas" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-atlassian">
                                        <div class="iconview "><i class=". fa-2x fab fa-atlassian" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-atom">
                                        <div class="iconview "><i class=". fa-2x fas fa-atom" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-audible">
                                        <div class="iconview "><i class=". fa-2x fab fa-audible" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-audio-description">
                                        <div class="iconview "><i class=". fa-2x fas fa-audio-description"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-autoprefixer">
                                        <div class="iconview "><i class=". fa-2x fab fa-autoprefixer"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-avianex">
                                        <div class="iconview "><i class=". fa-2x fab fa-avianex" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-aviato">
                                        <div class="iconview "><i class=". fa-2x fab fa-aviato" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-award">
                                        <div class="iconview "><i class=". fa-2x fas fa-award" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-aws">
                                        <div class="iconview "><i class=". fa-2x fab fa-aws" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-baby">
                                        <div class="iconview "><i class=". fa-2x fas fa-baby" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-baby-carriage">
                                        <div class="iconview "><i class=". fa-2x fas fa-baby-carriage"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-backspace">
                                        <div class="iconview "><i class=". fa-2x fas fa-backspace" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-backward">
                                        <div class="iconview "><i class=". fa-2x fas fa-backward" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bacon">
                                        <div class="iconview "><i class=". fa-2x fas fa-bacon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-balance-scale">
                                        <div class="iconview "><i class=". fa-2x fas fa-balance-scale"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ban">
                                        <div class="iconview "><i class=". fa-2x fas fa-ban" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-band-aid">
                                        <div class="iconview "><i class=". fa-2x fas fa-band-aid" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-bandcamp">
                                        <div class="iconview "><i class=". fa-2x fab fa-bandcamp" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-barcode">
                                        <div class="iconview "><i class=". fa-2x fas fa-barcode" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bars">
                                        <div class="iconview "><i class=". fa-2x fas fa-bars" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-baseball-ball">
                                        <div class="iconview "><i class=". fa-2x fas fa-baseball-ball"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-basketball-ball">
                                        <div class="iconview "><i class=". fa-2x fas fa-basketball-ball"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bath">
                                        <div class="iconview "><i class=". fa-2x fas fa-bath" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-battery-empty">
                                        <div class="iconview "><i class=". fa-2x fas fa-battery-empty"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-battery-full">
                                        <div class="iconview "><i class=". fa-2x fas fa-battery-full"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-battery-half">
                                        <div class="iconview "><i class=". fa-2x fas fa-battery-half"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-battery-quarter">
                                        <div class="iconview "><i class=". fa-2x fas fa-battery-quarter"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-battery-three-quarters">
                                        <div class="iconview "><i class=". fa-2x fas fa-battery-three-quarters"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bed">
                                        <div class="iconview "><i class=". fa-2x fas fa-bed" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-beer">
                                        <div class="iconview "><i class=". fa-2x fas fa-beer" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-behance">
                                        <div class="iconview "><i class=". fa-2x fab fa-behance" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-behance-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-behance-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bell">
                                        <div class="iconview "><i class=". fa-2x fas fa-bell" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-bell">
                                        <div class="iconview "><i class=". fa-2x far fa-bell" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bell-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-bell-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-bell-slash">
                                        <div class="iconview "><i class=". fa-2x far fa-bell-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bezier-curve">
                                        <div class="iconview "><i class=". fa-2x fas fa-bezier-curve"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bible">
                                        <div class="iconview "><i class=". fa-2x fas fa-bible" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bicycle">
                                        <div class="iconview "><i class=". fa-2x fas fa-bicycle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-bimobject">
                                        <div class="iconview "><i class=". fa-2x fab fa-bimobject" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-binoculars">
                                        <div class="iconview "><i class=". fa-2x fas fa-binoculars"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-biohazard">
                                        <div class="iconview "><i class=". fa-2x fas fa-biohazard" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-birthday-cake">
                                        <div class="iconview "><i class=". fa-2x fas fa-birthday-cake"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-bitbucket">
                                        <div class="iconview "><i class=". fa-2x fab fa-bitbucket" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-bitcoin">
                                        <div class="iconview "><i class=". fa-2x fab fa-bitcoin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-bity">
                                        <div class="iconview "><i class=". fa-2x fab fa-bity" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-black-tie">
                                        <div class="iconview "><i class=". fa-2x fab fa-black-tie" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-blackberry">
                                        <div class="iconview "><i class=". fa-2x fab fa-blackberry"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-blender">
                                        <div class="iconview "><i class=". fa-2x fas fa-blender" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-blender-phone">
                                        <div class="iconview "><i class=". fa-2x fas fa-blender-phone"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-blind">
                                        <div class="iconview "><i class=". fa-2x fas fa-blind" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-blog">
                                        <div class="iconview "><i class=". fa-2x fas fa-blog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-blogger">
                                        <div class="iconview "><i class=". fa-2x fab fa-blogger" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-blogger-b">
                                        <div class="iconview "><i class=". fa-2x fab fa-blogger-b" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-bluetooth">
                                        <div class="iconview "><i class=". fa-2x fab fa-bluetooth" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-bluetooth-b">
                                        <div class="iconview "><i class=". fa-2x fab fa-bluetooth-b"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bold">
                                        <div class="iconview "><i class=". fa-2x fas fa-bold" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bolt">
                                        <div class="iconview "><i class=". fa-2x fas fa-bolt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bomb">
                                        <div class="iconview "><i class=". fa-2x fas fa-bomb" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bone">
                                        <div class="iconview "><i class=". fa-2x fas fa-bone" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bong">
                                        <div class="iconview "><i class=". fa-2x fas fa-bong" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-book">
                                        <div class="iconview "><i class=". fa-2x fas fa-book" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-book-dead">
                                        <div class="iconview "><i class=". fa-2x fas fa-book-dead" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-book-medical">
                                        <div class="iconview "><i class=". fa-2x fas fa-book-medical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-book-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-book-open" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-book-reader">
                                        <div class="iconview "><i class=". fa-2x fas fa-book-reader"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bookmark">
                                        <div class="iconview "><i class=". fa-2x fas fa-bookmark" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-bookmark">
                                        <div class="iconview "><i class=". fa-2x far fa-bookmark" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bowling-ball">
                                        <div class="iconview "><i class=". fa-2x fas fa-bowling-ball"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-box">
                                        <div class="iconview "><i class=". fa-2x fas fa-box" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-box-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-box-open" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-boxes">
                                        <div class="iconview "><i class=". fa-2x fas fa-boxes" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-braille">
                                        <div class="iconview "><i class=". fa-2x fas fa-braille" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-brain">
                                        <div class="iconview "><i class=". fa-2x fas fa-brain" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bread-slice">
                                        <div class="iconview "><i class=". fa-2x fas fa-bread-slice"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-briefcase">
                                        <div class="iconview "><i class=". fa-2x fas fa-briefcase" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-briefcase-medical">
                                        <div class="iconview "><i class=". fa-2x fas fa-briefcase-medical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-broadcast-tower">
                                        <div class="iconview "><i class=". fa-2x fas fa-broadcast-tower"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-broom">
                                        <div class="iconview "><i class=". fa-2x fas fa-broom" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-brush">
                                        <div class="iconview "><i class=". fa-2x fas fa-brush" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-btc">
                                        <div class="iconview "><i class=". fa-2x fab fa-btc" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bug">
                                        <div class="iconview "><i class=". fa-2x fas fa-bug" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-building">
                                        <div class="iconview "><i class=". fa-2x fas fa-building" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-building">
                                        <div class="iconview "><i class=". fa-2x far fa-building" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bullhorn">
                                        <div class="iconview "><i class=". fa-2x fas fa-bullhorn" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bullseye">
                                        <div class="iconview "><i class=". fa-2x fas fa-bullseye" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-burn">
                                        <div class="iconview "><i class=". fa-2x fas fa-burn" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-buromobelexperte">
                                        <div class="iconview "><i class=". fa-2x fab fa-buromobelexperte"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bus">
                                        <div class="iconview "><i class=". fa-2x fas fa-bus" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-bus-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-bus-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-business-time">
                                        <div class="iconview "><i class=". fa-2x fas fa-business-time"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-buysellads">
                                        <div class="iconview "><i class=". fa-2x fab fa-buysellads"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calculator">
                                        <div class="iconview "><i class=". fa-2x fas fa-calculator"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-calendar">
                                        <div class="iconview "><i class=". fa-2x far fa-calendar" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-calendar-alt">
                                        <div class="iconview "><i class=". fa-2x far fa-calendar-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar-check">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar-check"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-calendar-check">
                                        <div class="iconview "><i class=". fa-2x far fa-calendar-check"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar-day">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar-day"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar-minus">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar-minus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-calendar-minus">
                                        <div class="iconview "><i class=". fa-2x far fa-calendar-minus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar-plus">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar-plus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-calendar-plus">
                                        <div class="iconview "><i class=". fa-2x far fa-calendar-plus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar-times">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar-times"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-calendar-times">
                                        <div class="iconview "><i class=". fa-2x far fa-calendar-times"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-calendar-week">
                                        <div class="iconview "><i class=". fa-2x fas fa-calendar-week"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-camera">
                                        <div class="iconview "><i class=". fa-2x fas fa-camera" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-camera-retro">
                                        <div class="iconview "><i class=". fa-2x fas fa-camera-retro"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-campground">
                                        <div class="iconview "><i class=". fa-2x fas fa-campground"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-canadian-maple-leaf">
                                        <div class="iconview "><i class=". fa-2x fab fa-canadian-maple-leaf"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-candy-cane">
                                        <div class="iconview "><i class=". fa-2x fas fa-candy-cane"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cannabis">
                                        <div class="iconview "><i class=". fa-2x fas fa-cannabis" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-capsules">
                                        <div class="iconview "><i class=". fa-2x fas fa-capsules" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-car">
                                        <div class="iconview "><i class=". fa-2x fas fa-car" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-car-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-car-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-car-battery">
                                        <div class="iconview "><i class=". fa-2x fas fa-car-battery"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-car-crash">
                                        <div class="iconview "><i class=". fa-2x fas fa-car-crash" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-car-side">
                                        <div class="iconview "><i class=". fa-2x fas fa-car-side" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-square-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-square-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-caret-square-down">
                                        <div class="iconview "><i class=". fa-2x far fa-caret-square-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-square-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-square-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-caret-square-left">
                                        <div class="iconview "><i class=". fa-2x far fa-caret-square-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-square-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-square-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-caret-square-right">
                                        <div class="iconview "><i class=". fa-2x far fa-caret-square-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-square-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-square-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-caret-square-up">
                                        <div class="iconview "><i class=". fa-2x far fa-caret-square-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-caret-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-caret-up" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-carrot">
                                        <div class="iconview "><i class=". fa-2x fas fa-carrot" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cart-arrow-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-cart-arrow-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cart-plus">
                                        <div class="iconview "><i class=". fa-2x fas fa-cart-plus" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cash-register">
                                        <div class="iconview "><i class=". fa-2x fas fa-cash-register"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cat">
                                        <div class="iconview "><i class=". fa-2x fas fa-cat" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-amazon-pay">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-amazon-pay"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-amex">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-amex" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-apple-pay">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-apple-pay"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-diners-club">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-diners-club"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-discover">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-discover"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-jcb">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-jcb" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-mastercard">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-mastercard"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-paypal">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-paypal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-stripe">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-stripe" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cc-visa">
                                        <div class="iconview "><i class=". fa-2x fab fa-cc-visa" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-centercode">
                                        <div class="iconview "><i class=". fa-2x fab fa-centercode"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-centos">
                                        <div class="iconview "><i class=". fa-2x fab fa-centos" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-certificate">
                                        <div class="iconview "><i class=". fa-2x fas fa-certificate"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chair">
                                        <div class="iconview "><i class=". fa-2x fas fa-chair" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chalkboard">
                                        <div class="iconview "><i class=". fa-2x fas fa-chalkboard"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chalkboard-teacher">
                                        <div class="iconview "><i class=". fa-2x fas fa-chalkboard-teacher"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-charging-station">
                                        <div class="iconview "><i class=". fa-2x fas fa-charging-station"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chart-area">
                                        <div class="iconview "><i class=". fa-2x fas fa-chart-area"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chart-bar">
                                        <div class="iconview "><i class=". fa-2x fas fa-chart-bar" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-chart-bar">
                                        <div class="iconview "><i class=". fa-2x far fa-chart-bar" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chart-line">
                                        <div class="iconview "><i class=". fa-2x fas fa-chart-line"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chart-pie">
                                        <div class="iconview "><i class=". fa-2x fas fa-chart-pie" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-check">
                                        <div class="iconview "><i class=". fa-2x fas fa-check" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-check-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-check-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-check-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-check-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-check-double">
                                        <div class="iconview "><i class=". fa-2x fas fa-check-double"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-check-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-check-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-check-square">
                                        <div class="iconview "><i class=". fa-2x far fa-check-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cheese">
                                        <div class="iconview "><i class=". fa-2x fas fa-cheese" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess-bishop">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess-bishop"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess-board">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess-board"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess-king">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess-king"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess-knight">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess-knight"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess-pawn">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess-pawn"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess-queen">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess-queen"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chess-rook">
                                        <div class="iconview "><i class=". fa-2x fas fa-chess-rook"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-circle-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-circle-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-circle-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-circle-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-circle-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-circle-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-circle-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-circle-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-chevron-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-chevron-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-child">
                                        <div class="iconview "><i class=". fa-2x fas fa-child" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-chrome">
                                        <div class="iconview "><i class=". fa-2x fab fa-chrome" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-church">
                                        <div class="iconview "><i class=". fa-2x fas fa-church" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-circle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-circle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-circle-notch">
                                        <div class="iconview "><i class=". fa-2x fas fa-circle-notch"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-city">
                                        <div class="iconview "><i class=". fa-2x fas fa-city" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-clinic-medical">
                                        <div class="iconview "><i class=". fa-2x fas fa-clinic-medical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-clipboard">
                                        <div class="iconview "><i class=". fa-2x fas fa-clipboard" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-clipboard">
                                        <div class="iconview "><i class=". fa-2x far fa-clipboard" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-clipboard-check">
                                        <div class="iconview "><i class=". fa-2x fas fa-clipboard-check"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-clipboard-list">
                                        <div class="iconview "><i class=". fa-2x fas fa-clipboard-list"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-clock">
                                        <div class="iconview "><i class=". fa-2x fas fa-clock" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-clock">
                                        <div class="iconview "><i class=". fa-2x far fa-clock" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-clone">
                                        <div class="iconview "><i class=". fa-2x fas fa-clone" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-clone">
                                        <div class="iconview "><i class=". fa-2x far fa-clone" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-closed-captioning">
                                        <div class="iconview "><i class=". fa-2x fas fa-closed-captioning"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-closed-captioning">
                                        <div class="iconview "><i class=". fa-2x far fa-closed-captioning"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-download-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-download-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-meatball">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-meatball"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-moon">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-moon"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-moon-rain">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-moon-rain"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-rain">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-rain"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-showers-heavy">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-showers-heavy"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-sun">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-sun" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-sun-rain">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-sun-rain"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cloud-upload-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-cloud-upload-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cloudscale">
                                        <div class="iconview "><i class=". fa-2x fab fa-cloudscale"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cloudsmith">
                                        <div class="iconview "><i class=". fa-2x fab fa-cloudsmith"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cloudversify">
                                        <div class="iconview "><i class=". fa-2x fab fa-cloudversify"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cocktail">
                                        <div class="iconview "><i class=". fa-2x fas fa-cocktail" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-code">
                                        <div class="iconview "><i class=". fa-2x fas fa-code" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-code-branch">
                                        <div class="iconview "><i class=". fa-2x fas fa-code-branch"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-codepen">
                                        <div class="iconview "><i class=". fa-2x fab fa-codepen" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-codiepie">
                                        <div class="iconview "><i class=". fa-2x fab fa-codiepie" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-coffee">
                                        <div class="iconview "><i class=". fa-2x fas fa-coffee" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cog">
                                        <div class="iconview "><i class=". fa-2x fas fa-cog" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cogs">
                                        <div class="iconview "><i class=". fa-2x fas fa-cogs" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-coins">
                                        <div class="iconview "><i class=". fa-2x fas fa-coins" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-columns">
                                        <div class="iconview "><i class=". fa-2x fas fa-columns" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comment">
                                        <div class="iconview "><i class=". fa-2x fas fa-comment" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-comment">
                                        <div class="iconview "><i class=". fa-2x far fa-comment" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comment-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-comment-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-comment-alt">
                                        <div class="iconview "><i class=". fa-2x far fa-comment-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comment-dollar">
                                        <div class="iconview "><i class=". fa-2x fas fa-comment-dollar"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comment-dots">
                                        <div class="iconview "><i class=". fa-2x fas fa-comment-dots"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-comment-dots">
                                        <div class="iconview "><i class=". fa-2x far fa-comment-dots"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comment-medical">
                                        <div class="iconview "><i class=". fa-2x fas fa-comment-medical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comment-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-comment-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comments">
                                        <div class="iconview "><i class=". fa-2x fas fa-comments" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-comments">
                                        <div class="iconview "><i class=". fa-2x far fa-comments" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-comments-dollar">
                                        <div class="iconview "><i class=". fa-2x fas fa-comments-dollar"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-compact-disc">
                                        <div class="iconview "><i class=". fa-2x fas fa-compact-disc"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-compass">
                                        <div class="iconview "><i class=". fa-2x fas fa-compass" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-compass">
                                        <div class="iconview "><i class=". fa-2x far fa-compass" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-compress">
                                        <div class="iconview "><i class=". fa-2x fas fa-compress" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-compress-arrows-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-compress-arrows-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-concierge-bell">
                                        <div class="iconview "><i class=". fa-2x fas fa-concierge-bell"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-confluence">
                                        <div class="iconview "><i class=". fa-2x fab fa-confluence"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-connectdevelop">
                                        <div class="iconview "><i class=". fa-2x fab fa-connectdevelop"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-contao">
                                        <div class="iconview "><i class=". fa-2x fab fa-contao" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cookie">
                                        <div class="iconview "><i class=". fa-2x fas fa-cookie" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cookie-bite">
                                        <div class="iconview "><i class=". fa-2x fas fa-cookie-bite"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-copy">
                                        <div class="iconview "><i class=". fa-2x fas fa-copy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-copy">
                                        <div class="iconview "><i class=". fa-2x far fa-copy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-copyright">
                                        <div class="iconview "><i class=". fa-2x fas fa-copyright" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-copyright">
                                        <div class="iconview "><i class=". fa-2x far fa-copyright" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-couch">
                                        <div class="iconview "><i class=". fa-2x fas fa-couch" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cpanel">
                                        <div class="iconview "><i class=". fa-2x fab fa-cpanel" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-by">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-by"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-nc">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-nc"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-nc-eu">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-nc-eu"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-nc-jp">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-nc-jp"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-nd">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-nd"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-pd">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-pd"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-pd-alt">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-pd-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-remix">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-remix"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-sa">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-sa"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-sampling">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-sampling"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-sampling-plus">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-sampling-plus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-share">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-share"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-creative-commons-zero">
                                        <div class="iconview "><i class=". fa-2x fab fa-creative-commons-zero"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-credit-card">
                                        <div class="iconview "><i class=". fa-2x fas fa-credit-card"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-credit-card">
                                        <div class="iconview "><i class=". fa-2x far fa-credit-card"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-critical-role">
                                        <div class="iconview "><i class=". fa-2x fab fa-critical-role"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-crop">
                                        <div class="iconview "><i class=". fa-2x fas fa-crop" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-crop-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-crop-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cross">
                                        <div class="iconview "><i class=". fa-2x fas fa-cross" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-crosshairs">
                                        <div class="iconview "><i class=". fa-2x fas fa-crosshairs"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-crow">
                                        <div class="iconview "><i class=". fa-2x fas fa-crow" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-crown">
                                        <div class="iconview "><i class=". fa-2x fas fa-crown" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-crutch">
                                        <div class="iconview "><i class=". fa-2x fas fa-crutch" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-css3">
                                        <div class="iconview "><i class=". fa-2x fab fa-css3" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-css3-alt">
                                        <div class="iconview "><i class=". fa-2x fab fa-css3-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cube">
                                        <div class="iconview "><i class=". fa-2x fas fa-cube" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cubes">
                                        <div class="iconview "><i class=". fa-2x fas fa-cubes" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-cut">
                                        <div class="iconview "><i class=". fa-2x fas fa-cut" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-cuttlefish">
                                        <div class="iconview "><i class=". fa-2x fab fa-cuttlefish"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-d-and-d">
                                        <div class="iconview "><i class=". fa-2x fab fa-d-and-d" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-d-and-d-beyond">
                                        <div class="iconview "><i class=". fa-2x fab fa-d-and-d-beyond"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dashcube">
                                        <div class="iconview "><i class=". fa-2x fab fa-dashcube" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-database">
                                        <div class="iconview "><i class=". fa-2x fas fa-database" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-deaf">
                                        <div class="iconview "><i class=". fa-2x fas fa-deaf" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-delicious">
                                        <div class="iconview "><i class=". fa-2x fab fa-delicious" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-democrat">
                                        <div class="iconview "><i class=". fa-2x fas fa-democrat" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-deploydog">
                                        <div class="iconview "><i class=". fa-2x fab fa-deploydog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-deskpro">
                                        <div class="iconview "><i class=". fa-2x fab fa-deskpro" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-desktop">
                                        <div class="iconview "><i class=". fa-2x fas fa-desktop" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dev">
                                        <div class="iconview "><i class=". fa-2x fab fa-dev" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-deviantart">
                                        <div class="iconview "><i class=". fa-2x fab fa-deviantart"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dharmachakra">
                                        <div class="iconview "><i class=". fa-2x fas fa-dharmachakra"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dhl">
                                        <div class="iconview "><i class=". fa-2x fab fa-dhl" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-diagnoses">
                                        <div class="iconview "><i class=". fa-2x fas fa-diagnoses" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-diaspora">
                                        <div class="iconview "><i class=". fa-2x fab fa-diaspora" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-d20">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-d20" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-d6">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-d6" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-five">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-five" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-four">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-four" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-one">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-one" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-six">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-six" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-three">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-three"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dice-two">
                                        <div class="iconview "><i class=". fa-2x fas fa-dice-two" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-digg">
                                        <div class="iconview "><i class=". fa-2x fab fa-digg" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-digital-ocean">
                                        <div class="iconview "><i class=". fa-2x fab fa-digital-ocean"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-digital-tachograph">
                                        <div class="iconview "><i class=". fa-2x fas fa-digital-tachograph"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-directions">
                                        <div class="iconview "><i class=". fa-2x fas fa-directions"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-discord">
                                        <div class="iconview "><i class=". fa-2x fab fa-discord" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-discourse">
                                        <div class="iconview "><i class=". fa-2x fab fa-discourse" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-divide">
                                        <div class="iconview "><i class=". fa-2x fas fa-divide" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dizzy">
                                        <div class="iconview "><i class=". fa-2x fas fa-dizzy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-dizzy">
                                        <div class="iconview "><i class=". fa-2x far fa-dizzy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dna">
                                        <div class="iconview "><i class=". fa-2x fas fa-dna" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dochub">
                                        <div class="iconview "><i class=". fa-2x fab fa-dochub" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-docker">
                                        <div class="iconview "><i class=". fa-2x fab fa-docker" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dog">
                                        <div class="iconview "><i class=". fa-2x fas fa-dog" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dollar-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-dollar-sign"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dolly">
                                        <div class="iconview "><i class=". fa-2x fas fa-dolly" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dolly-flatbed">
                                        <div class="iconview "><i class=". fa-2x fas fa-dolly-flatbed"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-donate">
                                        <div class="iconview "><i class=". fa-2x fas fa-donate" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-door-closed">
                                        <div class="iconview "><i class=". fa-2x fas fa-door-closed"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-door-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-door-open" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dot-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-dot-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-dot-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-dot-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dove">
                                        <div class="iconview "><i class=". fa-2x fas fa-dove" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-download">
                                        <div class="iconview "><i class=". fa-2x fas fa-download" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-draft2digital">
                                        <div class="iconview "><i class=". fa-2x fab fa-draft2digital"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-drafting-compass">
                                        <div class="iconview "><i class=". fa-2x fas fa-drafting-compass"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dragon">
                                        <div class="iconview "><i class=". fa-2x fas fa-dragon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-draw-polygon">
                                        <div class="iconview "><i class=". fa-2x fas fa-draw-polygon"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dribbble">
                                        <div class="iconview "><i class=". fa-2x fab fa-dribbble" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dribbble-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-dribbble-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dropbox">
                                        <div class="iconview "><i class=". fa-2x fab fa-dropbox" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-drum">
                                        <div class="iconview "><i class=". fa-2x fas fa-drum" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-drum-steelpan">
                                        <div class="iconview "><i class=". fa-2x fas fa-drum-steelpan"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-drumstick-bite">
                                        <div class="iconview "><i class=". fa-2x fas fa-drumstick-bite"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-drupal">
                                        <div class="iconview "><i class=". fa-2x fab fa-drupal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dumbbell">
                                        <div class="iconview "><i class=". fa-2x fas fa-dumbbell" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dumpster">
                                        <div class="iconview "><i class=". fa-2x fas fa-dumpster" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dumpster-fire">
                                        <div class="iconview "><i class=". fa-2x fas fa-dumpster-fire"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-dungeon">
                                        <div class="iconview "><i class=". fa-2x fas fa-dungeon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-dyalog">
                                        <div class="iconview "><i class=". fa-2x fab fa-dyalog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-earlybirds">
                                        <div class="iconview "><i class=". fa-2x fab fa-earlybirds"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ebay">
                                        <div class="iconview "><i class=". fa-2x fab fa-ebay" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-edge">
                                        <div class="iconview "><i class=". fa-2x fab fa-edge" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-edit">
                                        <div class="iconview "><i class=". fa-2x fas fa-edit" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-edit">
                                        <div class="iconview "><i class=". fa-2x far fa-edit" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-egg">
                                        <div class="iconview "><i class=". fa-2x fas fa-egg" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-eject">
                                        <div class="iconview "><i class=". fa-2x fas fa-eject" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-elementor">
                                        <div class="iconview "><i class=". fa-2x fab fa-elementor" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ellipsis-h">
                                        <div class="iconview "><i class=". fa-2x fas fa-ellipsis-h"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ellipsis-v">
                                        <div class="iconview "><i class=". fa-2x fas fa-ellipsis-v"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ello">
                                        <div class="iconview "><i class=". fa-2x fab fa-ello" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ember">
                                        <div class="iconview "><i class=". fa-2x fab fa-ember" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-empire">
                                        <div class="iconview "><i class=". fa-2x fab fa-empire" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-envelope">
                                        <div class="iconview "><i class=". fa-2x fas fa-envelope" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-envelope">
                                        <div class="iconview "><i class=". fa-2x far fa-envelope" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-envelope-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-envelope-open"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-envelope-open">
                                        <div class="iconview "><i class=". fa-2x far fa-envelope-open"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-envelope-open-text">
                                        <div class="iconview "><i class=". fa-2x fas fa-envelope-open-text"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-envelope-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-envelope-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-envira">
                                        <div class="iconview "><i class=". fa-2x fab fa-envira" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-equals">
                                        <div class="iconview "><i class=". fa-2x fas fa-equals" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-eraser">
                                        <div class="iconview "><i class=". fa-2x fas fa-eraser" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-erlang">
                                        <div class="iconview "><i class=". fa-2x fab fa-erlang" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ethereum">
                                        <div class="iconview "><i class=". fa-2x fab fa-ethereum" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ethernet">
                                        <div class="iconview "><i class=". fa-2x fas fa-ethernet" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-etsy">
                                        <div class="iconview "><i class=". fa-2x fab fa-etsy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-euro-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-euro-sign" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-exchange-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-exchange-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-exclamation">
                                        <div class="iconview "><i class=". fa-2x fas fa-exclamation"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-exclamation-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-exclamation-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-exclamation-triangle">
                                        <div class="iconview "><i class=". fa-2x fas fa-exclamation-triangle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-expand">
                                        <div class="iconview "><i class=". fa-2x fas fa-expand" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-expand-arrows-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-expand-arrows-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-expeditedssl">
                                        <div class="iconview "><i class=". fa-2x fab fa-expeditedssl"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-external-link-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-external-link-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-external-link-square-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-external-link-square-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-eye">
                                        <div class="iconview "><i class=". fa-2x fas fa-eye" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-eye">
                                        <div class="iconview "><i class=". fa-2x far fa-eye" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-eye-dropper">
                                        <div class="iconview "><i class=". fa-2x fas fa-eye-dropper"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-eye-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-eye-slash" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-eye-slash">
                                        <div class="iconview "><i class=". fa-2x far fa-eye-slash" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-facebook">
                                        <div class="iconview "><i class=". fa-2x fab fa-facebook" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-facebook-f">
                                        <div class="iconview "><i class=". fa-2x fab fa-facebook-f"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-facebook-messenger">
                                        <div class="iconview "><i class=". fa-2x fab fa-facebook-messenger"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-facebook-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-facebook-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fantasy-flight-games">
                                        <div class="iconview "><i class=". fa-2x fab fa-fantasy-flight-games"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fast-backward">
                                        <div class="iconview "><i class=". fa-2x fas fa-fast-backward"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fast-forward">
                                        <div class="iconview "><i class=". fa-2x fas fa-fast-forward"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fax">
                                        <div class="iconview "><i class=". fa-2x fas fa-fax" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-feather">
                                        <div class="iconview "><i class=". fa-2x fas fa-feather" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-feather-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-feather-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fedex">
                                        <div class="iconview "><i class=". fa-2x fab fa-fedex" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fedora">
                                        <div class="iconview "><i class=". fa-2x fab fa-fedora" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-female">
                                        <div class="iconview "><i class=". fa-2x fas fa-female" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fighter-jet">
                                        <div class="iconview "><i class=". fa-2x fas fa-fighter-jet"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-figma">
                                        <div class="iconview "><i class=". fa-2x fab fa-figma" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file">
                                        <div class="iconview "><i class=". fa-2x fas fa-file" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file">
                                        <div class="iconview "><i class=". fa-2x far fa-file" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-alt">
                                        <div class="iconview "><i class=". fa-2x far fa-file-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-archive">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-archive"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-archive">
                                        <div class="iconview "><i class=". fa-2x far fa-file-archive"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-audio">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-audio"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-audio">
                                        <div class="iconview "><i class=". fa-2x far fa-file-audio"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-code">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-code" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-code">
                                        <div class="iconview "><i class=". fa-2x far fa-file-code" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-contract">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-contract"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-csv">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-csv" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-download">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-download"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-excel">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-excel"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-excel">
                                        <div class="iconview "><i class=". fa-2x far fa-file-excel"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-export">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-export"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-image">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-image"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-image">
                                        <div class="iconview "><i class=". fa-2x far fa-file-image"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-import">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-import"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-invoice">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-invoice"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-invoice-dollar">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-invoice-dollar"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-medical">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-medical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-medical-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-medical-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-pdf">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-pdf" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-pdf">
                                        <div class="iconview "><i class=". fa-2x far fa-file-pdf" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-powerpoint">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-powerpoint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-powerpoint">
                                        <div class="iconview "><i class=". fa-2x far fa-file-powerpoint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-prescription">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-prescription"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-signature">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-signature"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-upload">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-upload"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-video">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-video"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-video">
                                        <div class="iconview "><i class=". fa-2x far fa-file-video"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-file-word">
                                        <div class="iconview "><i class=". fa-2x fas fa-file-word" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-file-word">
                                        <div class="iconview "><i class=". fa-2x far fa-file-word" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fill">
                                        <div class="iconview "><i class=". fa-2x fas fa-fill" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fill-drip">
                                        <div class="iconview "><i class=". fa-2x fas fa-fill-drip" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-film">
                                        <div class="iconview "><i class=". fa-2x fas fa-film" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-filter">
                                        <div class="iconview "><i class=". fa-2x fas fa-filter" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fingerprint">
                                        <div class="iconview "><i class=". fa-2x fas fa-fingerprint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fire">
                                        <div class="iconview "><i class=". fa-2x fas fa-fire" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fire-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-fire-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fire-extinguisher">
                                        <div class="iconview "><i class=". fa-2x fas fa-fire-extinguisher"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-firefox">
                                        <div class="iconview "><i class=". fa-2x fab fa-firefox" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-first-aid">
                                        <div class="iconview "><i class=". fa-2x fas fa-first-aid" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-first-order">
                                        <div class="iconview "><i class=". fa-2x fab fa-first-order"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-first-order-alt">
                                        <div class="iconview "><i class=". fa-2x fab fa-first-order-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-firstdraft">
                                        <div class="iconview "><i class=". fa-2x fab fa-firstdraft"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fish">
                                        <div class="iconview "><i class=". fa-2x fas fa-fish" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-fist-raised">
                                        <div class="iconview "><i class=". fa-2x fas fa-fist-raised"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-flag">
                                        <div class="iconview "><i class=". fa-2x fas fa-flag" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-flag">
                                        <div class="iconview "><i class=". fa-2x far fa-flag" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-flag-checkered">
                                        <div class="iconview "><i class=". fa-2x fas fa-flag-checkered"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-flag-usa">
                                        <div class="iconview "><i class=". fa-2x fas fa-flag-usa" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-flask">
                                        <div class="iconview "><i class=". fa-2x fas fa-flask" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-flickr">
                                        <div class="iconview "><i class=". fa-2x fab fa-flickr" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-flipboard">
                                        <div class="iconview "><i class=". fa-2x fab fa-flipboard" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-flushed">
                                        <div class="iconview "><i class=". fa-2x fas fa-flushed" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-flushed">
                                        <div class="iconview "><i class=". fa-2x far fa-flushed" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fly">
                                        <div class="iconview "><i class=". fa-2x fab fa-fly" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-folder">
                                        <div class="iconview "><i class=". fa-2x fas fa-folder" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-folder">
                                        <div class="iconview "><i class=". fa-2x far fa-folder" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-folder-minus">
                                        <div class="iconview "><i class=". fa-2x fas fa-folder-minus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-folder-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-folder-open"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-folder-open">
                                        <div class="iconview "><i class=". fa-2x far fa-folder-open"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-folder-plus">
                                        <div class="iconview "><i class=". fa-2x fas fa-folder-plus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-font">
                                        <div class="iconview "><i class=". fa-2x fas fa-font" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-font-awesome">
                                        <div class="iconview "><i class=". fa-2x fab fa-font-awesome"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-font-awesome-alt">
                                        <div class="iconview "><i class=". fa-2x fab fa-font-awesome-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-font-awesome-flag">
                                        <div class="iconview "><i class=". fa-2x fab fa-font-awesome-flag"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fonticons">
                                        <div class="iconview "><i class=". fa-2x fab fa-fonticons" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fonticons-fi">
                                        <div class="iconview "><i class=". fa-2x fab fa-fonticons-fi"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-football-ball">
                                        <div class="iconview "><i class=". fa-2x fas fa-football-ball"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fort-awesome">
                                        <div class="iconview "><i class=". fa-2x fab fa-fort-awesome"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fort-awesome-alt">
                                        <div class="iconview "><i class=". fa-2x fab fa-fort-awesome-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-forumbee">
                                        <div class="iconview "><i class=". fa-2x fab fa-forumbee" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-forward">
                                        <div class="iconview "><i class=". fa-2x fas fa-forward" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-foursquare">
                                        <div class="iconview "><i class=". fa-2x fab fa-foursquare"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-free-code-camp">
                                        <div class="iconview "><i class=". fa-2x fab fa-free-code-camp"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-freebsd">
                                        <div class="iconview "><i class=". fa-2x fab fa-freebsd" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-frog">
                                        <div class="iconview "><i class=". fa-2x fas fa-frog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-frown">
                                        <div class="iconview "><i class=". fa-2x fas fa-frown" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-frown">
                                        <div class="iconview "><i class=". fa-2x far fa-frown" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-frown-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-frown-open"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-frown-open">
                                        <div class="iconview "><i class=". fa-2x far fa-frown-open"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-fulcrum">
                                        <div class="iconview "><i class=". fa-2x fab fa-fulcrum" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-funnel-dollar">
                                        <div class="iconview "><i class=". fa-2x fas fa-funnel-dollar"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-futbol">
                                        <div class="iconview "><i class=". fa-2x fas fa-futbol" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-futbol">
                                        <div class="iconview "><i class=". fa-2x far fa-futbol" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-galactic-republic">
                                        <div class="iconview "><i class=". fa-2x fab fa-galactic-republic"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-galactic-senate">
                                        <div class="iconview "><i class=". fa-2x fab fa-galactic-senate"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-gamepad">
                                        <div class="iconview "><i class=". fa-2x fas fa-gamepad" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-gas-pump">
                                        <div class="iconview "><i class=". fa-2x fas fa-gas-pump" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-gavel">
                                        <div class="iconview "><i class=". fa-2x fas fa-gavel" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-gem">
                                        <div class="iconview "><i class=". fa-2x fas fa-gem" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-gem">
                                        <div class="iconview "><i class=". fa-2x far fa-gem" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-genderless">
                                        <div class="iconview "><i class=". fa-2x fas fa-genderless"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-get-pocket">
                                        <div class="iconview "><i class=". fa-2x fab fa-get-pocket"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gg">
                                        <div class="iconview "><i class=". fa-2x fab fa-gg" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gg-circle">
                                        <div class="iconview "><i class=". fa-2x fab fa-gg-circle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ghost">
                                        <div class="iconview "><i class=". fa-2x fas fa-ghost" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-gift">
                                        <div class="iconview "><i class=". fa-2x fas fa-gift" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-gifts">
                                        <div class="iconview "><i class=". fa-2x fas fa-gifts" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-git">
                                        <div class="iconview "><i class=". fa-2x fab fa-git" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-git-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-git-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-github">
                                        <div class="iconview "><i class=". fa-2x fab fa-github" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-github-alt">
                                        <div class="iconview "><i class=". fa-2x fab fa-github-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-github-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-github-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gitkraken">
                                        <div class="iconview "><i class=". fa-2x fab fa-gitkraken" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gitlab">
                                        <div class="iconview "><i class=". fa-2x fab fa-gitlab" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gitter">
                                        <div class="iconview "><i class=". fa-2x fab fa-gitter" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-glass-cheers">
                                        <div class="iconview "><i class=". fa-2x fas fa-glass-cheers"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-glass-martini">
                                        <div class="iconview "><i class=". fa-2x fas fa-glass-martini"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-glass-martini-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-glass-martini-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-glass-whiskey">
                                        <div class="iconview "><i class=". fa-2x fas fa-glass-whiskey"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-glasses">
                                        <div class="iconview "><i class=". fa-2x fas fa-glasses" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-glide">
                                        <div class="iconview "><i class=". fa-2x fab fa-glide" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-glide-g">
                                        <div class="iconview "><i class=". fa-2x fab fa-glide-g" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-globe">
                                        <div class="iconview "><i class=". fa-2x fas fa-globe" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-globe-africa">
                                        <div class="iconview "><i class=". fa-2x fas fa-globe-africa"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-globe-americas">
                                        <div class="iconview "><i class=". fa-2x fas fa-globe-americas"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-globe-asia">
                                        <div class="iconview "><i class=". fa-2x fas fa-globe-asia"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-globe-europe">
                                        <div class="iconview "><i class=". fa-2x fas fa-globe-europe"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gofore">
                                        <div class="iconview "><i class=". fa-2x fab fa-gofore" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-golf-ball">
                                        <div class="iconview "><i class=". fa-2x fas fa-golf-ball" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-goodreads">
                                        <div class="iconview "><i class=". fa-2x fab fa-goodreads" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-goodreads-g">
                                        <div class="iconview "><i class=". fa-2x fab fa-goodreads-g"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-google">
                                        <div class="iconview "><i class=". fa-2x fab fa-google" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-google-drive">
                                        <div class="iconview "><i class=". fa-2x fab fa-google-drive"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-google-play">
                                        <div class="iconview "><i class=". fa-2x fab fa-google-play"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-google-plus">
                                        <div class="iconview "><i class=". fa-2x fab fa-google-plus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-google-plus-g">
                                        <div class="iconview "><i class=". fa-2x fab fa-google-plus-g"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-google-plus-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-google-plus-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-google-wallet">
                                        <div class="iconview "><i class=". fa-2x fab fa-google-wallet"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-gopuram">
                                        <div class="iconview "><i class=". fa-2x fas fa-gopuram" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-graduation-cap">
                                        <div class="iconview "><i class=". fa-2x fas fa-graduation-cap"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gratipay">
                                        <div class="iconview "><i class=". fa-2x fab fa-gratipay" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-grav">
                                        <div class="iconview "><i class=". fa-2x fab fa-grav" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-greater-than">
                                        <div class="iconview "><i class=". fa-2x fas fa-greater-than"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-greater-than-equal">
                                        <div class="iconview "><i class=". fa-2x fas fa-greater-than-equal"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grimace">
                                        <div class="iconview "><i class=". fa-2x fas fa-grimace" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grimace">
                                        <div class="iconview "><i class=". fa-2x far fa-grimace" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin">
                                        <div class="iconview "><i class=". fa-2x far fa-grin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-alt">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-beam">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-beam" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-beam">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-beam" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-beam-sweat">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-beam-sweat"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-beam-sweat">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-beam-sweat"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-hearts">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-hearts"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-hearts">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-hearts"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-squint">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-squint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-squint">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-squint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-squint-tears">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-squint-tears"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-squint-tears">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-squint-tears"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-stars">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-stars"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-stars">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-stars"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-tears">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-tears"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-tears">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-tears"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-tongue">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-tongue"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-tongue">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-tongue"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-tongue-squint">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-tongue-squint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-tongue-squint">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-tongue-squint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-tongue-wink">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-tongue-wink"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-tongue-wink">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-tongue-wink"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grin-wink">
                                        <div class="iconview "><i class=". fa-2x fas fa-grin-wink" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-grin-wink">
                                        <div class="iconview "><i class=". fa-2x far fa-grin-wink" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grip-horizontal">
                                        <div class="iconview "><i class=". fa-2x fas fa-grip-horizontal"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grip-lines">
                                        <div class="iconview "><i class=". fa-2x fas fa-grip-lines"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grip-lines-vertical">
                                        <div class="iconview "><i class=". fa-2x fas fa-grip-lines-vertical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-grip-vertical">
                                        <div class="iconview "><i class=". fa-2x fas fa-grip-vertical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gripfire">
                                        <div class="iconview "><i class=". fa-2x fab fa-gripfire" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-grunt">
                                        <div class="iconview "><i class=". fa-2x fab fa-grunt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-guitar">
                                        <div class="iconview "><i class=". fa-2x fas fa-guitar" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-gulp">
                                        <div class="iconview "><i class=". fa-2x fab fa-gulp" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-h-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-h-square" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hacker-news">
                                        <div class="iconview "><i class=". fa-2x fab fa-hacker-news"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hacker-news-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-hacker-news-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hackerrank">
                                        <div class="iconview "><i class=". fa-2x fab fa-hackerrank"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hamburger">
                                        <div class="iconview "><i class=". fa-2x fas fa-hamburger" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hammer">
                                        <div class="iconview "><i class=". fa-2x fas fa-hammer" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hamsa">
                                        <div class="iconview "><i class=". fa-2x fas fa-hamsa" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-holding">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-holding"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-holding-heart">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-holding-heart"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-holding-usd">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-holding-usd"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-lizard">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-lizard"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-lizard">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-lizard"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-middle-finger">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-middle-finger"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-paper">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-paper"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-paper">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-paper"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-peace">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-peace"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-peace">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-peace"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-point-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-point-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-point-down">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-point-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-point-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-point-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-point-left">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-point-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-point-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-point-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-point-right">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-point-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-point-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-point-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-point-up">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-point-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-pointer">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-pointer"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-pointer">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-pointer"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-rock">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-rock" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-rock">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-rock" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-scissors">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-scissors"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-scissors">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-scissors"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hand-spock">
                                        <div class="iconview "><i class=". fa-2x fas fa-hand-spock"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hand-spock">
                                        <div class="iconview "><i class=". fa-2x far fa-hand-spock"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hands">
                                        <div class="iconview "><i class=". fa-2x fas fa-hands" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hands-helping">
                                        <div class="iconview "><i class=". fa-2x fas fa-hands-helping"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-handshake">
                                        <div class="iconview "><i class=". fa-2x fas fa-handshake" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-handshake">
                                        <div class="iconview "><i class=". fa-2x far fa-handshake" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hanukiah">
                                        <div class="iconview "><i class=". fa-2x fas fa-hanukiah" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hard-hat">
                                        <div class="iconview "><i class=". fa-2x fas fa-hard-hat" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hashtag">
                                        <div class="iconview "><i class=". fa-2x fas fa-hashtag" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hat-wizard">
                                        <div class="iconview "><i class=". fa-2x fas fa-hat-wizard"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-haykal">
                                        <div class="iconview "><i class=". fa-2x fas fa-haykal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hdd">
                                        <div class="iconview "><i class=". fa-2x fas fa-hdd" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hdd">
                                        <div class="iconview "><i class=". fa-2x far fa-hdd" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-heading">
                                        <div class="iconview "><i class=". fa-2x fas fa-heading" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-headphones">
                                        <div class="iconview "><i class=". fa-2x fas fa-headphones"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-headphones-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-headphones-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-headset">
                                        <div class="iconview "><i class=". fa-2x fas fa-headset" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-heart">
                                        <div class="iconview "><i class=". fa-2x fas fa-heart" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-heart">
                                        <div class="iconview "><i class=". fa-2x far fa-heart" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-heart-broken">
                                        <div class="iconview "><i class=". fa-2x fas fa-heart-broken"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-heartbeat">
                                        <div class="iconview "><i class=". fa-2x fas fa-heartbeat" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-helicopter">
                                        <div class="iconview "><i class=". fa-2x fas fa-helicopter"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-highlighter">
                                        <div class="iconview "><i class=". fa-2x fas fa-highlighter"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hiking">
                                        <div class="iconview "><i class=". fa-2x fas fa-hiking" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hippo">
                                        <div class="iconview "><i class=". fa-2x fas fa-hippo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hips">
                                        <div class="iconview "><i class=". fa-2x fab fa-hips" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hire-a-helper">
                                        <div class="iconview "><i class=". fa-2x fab fa-hire-a-helper"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-history">
                                        <div class="iconview "><i class=". fa-2x fas fa-history" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hockey-puck">
                                        <div class="iconview "><i class=". fa-2x fas fa-hockey-puck"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-holly-berry">
                                        <div class="iconview "><i class=". fa-2x fas fa-holly-berry"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-home">
                                        <div class="iconview "><i class=". fa-2x fas fa-home" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hooli">
                                        <div class="iconview "><i class=". fa-2x fab fa-hooli" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hornbill">
                                        <div class="iconview "><i class=". fa-2x fab fa-hornbill" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-horse">
                                        <div class="iconview "><i class=". fa-2x fas fa-horse" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-horse-head">
                                        <div class="iconview "><i class=". fa-2x fas fa-horse-head"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hospital">
                                        <div class="iconview "><i class=". fa-2x fas fa-hospital" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hospital">
                                        <div class="iconview "><i class=". fa-2x far fa-hospital" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hospital-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-hospital-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hospital-symbol">
                                        <div class="iconview "><i class=". fa-2x fas fa-hospital-symbol"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hot-tub">
                                        <div class="iconview "><i class=". fa-2x fas fa-hot-tub" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hotdog">
                                        <div class="iconview "><i class=". fa-2x fas fa-hotdog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hotel">
                                        <div class="iconview "><i class=". fa-2x fas fa-hotel" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hotjar">
                                        <div class="iconview "><i class=". fa-2x fab fa-hotjar" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hourglass">
                                        <div class="iconview "><i class=". fa-2x fas fa-hourglass" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-hourglass">
                                        <div class="iconview "><i class=". fa-2x far fa-hourglass" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hourglass-end">
                                        <div class="iconview "><i class=". fa-2x fas fa-hourglass-end"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hourglass-half">
                                        <div class="iconview "><i class=". fa-2x fas fa-hourglass-half"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hourglass-start">
                                        <div class="iconview "><i class=". fa-2x fas fa-hourglass-start"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-house-damage">
                                        <div class="iconview "><i class=". fa-2x fas fa-house-damage"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-houzz">
                                        <div class="iconview "><i class=". fa-2x fab fa-houzz" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-hryvnia">
                                        <div class="iconview "><i class=". fa-2x fas fa-hryvnia" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-html5">
                                        <div class="iconview "><i class=". fa-2x fab fa-html5" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-hubspot">
                                        <div class="iconview "><i class=". fa-2x fab fa-hubspot" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-i-cursor">
                                        <div class="iconview "><i class=". fa-2x fas fa-i-cursor" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ice-cream">
                                        <div class="iconview "><i class=". fa-2x fas fa-ice-cream" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-icicles">
                                        <div class="iconview "><i class=". fa-2x fas fa-icicles" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-id-badge">
                                        <div class="iconview "><i class=". fa-2x fas fa-id-badge" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-id-badge">
                                        <div class="iconview "><i class=". fa-2x far fa-id-badge" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-id-card">
                                        <div class="iconview "><i class=". fa-2x fas fa-id-card" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-id-card">
                                        <div class="iconview "><i class=". fa-2x far fa-id-card" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-id-card-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-id-card-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-igloo">
                                        <div class="iconview "><i class=". fa-2x fas fa-igloo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-image">
                                        <div class="iconview "><i class=". fa-2x fas fa-image" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-image">
                                        <div class="iconview "><i class=". fa-2x far fa-image" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-images">
                                        <div class="iconview "><i class=". fa-2x fas fa-images" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-images">
                                        <div class="iconview "><i class=". fa-2x far fa-images" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-imdb">
                                        <div class="iconview "><i class=". fa-2x fab fa-imdb" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-inbox">
                                        <div class="iconview "><i class=". fa-2x fas fa-inbox" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-indent">
                                        <div class="iconview "><i class=". fa-2x fas fa-indent" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-industry">
                                        <div class="iconview "><i class=". fa-2x fas fa-industry" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-infinity">
                                        <div class="iconview "><i class=". fa-2x fas fa-infinity" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-info">
                                        <div class="iconview "><i class=". fa-2x fas fa-info" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-info-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-info-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-instagram">
                                        <div class="iconview "><i class=". fa-2x fab fa-instagram" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-intercom">
                                        <div class="iconview "><i class=". fa-2x fab fa-intercom" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-internet-explorer">
                                        <div class="iconview "><i class=". fa-2x fab fa-internet-explorer"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-invision">
                                        <div class="iconview "><i class=". fa-2x fab fa-invision" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ioxhost">
                                        <div class="iconview "><i class=". fa-2x fab fa-ioxhost" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-italic">
                                        <div class="iconview "><i class=". fa-2x fas fa-italic" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-itunes">
                                        <div class="iconview "><i class=". fa-2x fab fa-itunes" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-itunes-note">
                                        <div class="iconview "><i class=". fa-2x fab fa-itunes-note"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-java">
                                        <div class="iconview "><i class=". fa-2x fab fa-java" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-jedi">
                                        <div class="iconview "><i class=". fa-2x fas fa-jedi" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-jedi-order">
                                        <div class="iconview "><i class=". fa-2x fab fa-jedi-order"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-jenkins">
                                        <div class="iconview "><i class=". fa-2x fab fa-jenkins" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-jira">
                                        <div class="iconview "><i class=". fa-2x fab fa-jira" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-joget">
                                        <div class="iconview "><i class=". fa-2x fab fa-joget" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-joint">
                                        <div class="iconview "><i class=". fa-2x fas fa-joint" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-joomla">
                                        <div class="iconview "><i class=". fa-2x fab fa-joomla" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-journal-whills">
                                        <div class="iconview "><i class=". fa-2x fas fa-journal-whills"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-js">
                                        <div class="iconview "><i class=". fa-2x fab fa-js" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-js-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-js-square" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-jsfiddle">
                                        <div class="iconview "><i class=". fa-2x fab fa-jsfiddle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-kaaba">
                                        <div class="iconview "><i class=". fa-2x fas fa-kaaba" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-kaggle">
                                        <div class="iconview "><i class=". fa-2x fab fa-kaggle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-key">
                                        <div class="iconview "><i class=". fa-2x fas fa-key" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-keybase">
                                        <div class="iconview "><i class=". fa-2x fab fa-keybase" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-keyboard">
                                        <div class="iconview "><i class=". fa-2x fas fa-keyboard" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-keyboard">
                                        <div class="iconview "><i class=". fa-2x far fa-keyboard" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-keycdn">
                                        <div class="iconview "><i class=". fa-2x fab fa-keycdn" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-khanda">
                                        <div class="iconview "><i class=". fa-2x fas fa-khanda" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-kickstarter">
                                        <div class="iconview "><i class=". fa-2x fab fa-kickstarter"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-kickstarter-k">
                                        <div class="iconview "><i class=". fa-2x fab fa-kickstarter-k"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-kiss">
                                        <div class="iconview "><i class=". fa-2x fas fa-kiss" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-kiss">
                                        <div class="iconview "><i class=". fa-2x far fa-kiss" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-kiss-beam">
                                        <div class="iconview "><i class=". fa-2x fas fa-kiss-beam" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-kiss-beam">
                                        <div class="iconview "><i class=". fa-2x far fa-kiss-beam" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-kiss-wink-heart">
                                        <div class="iconview "><i class=". fa-2x fas fa-kiss-wink-heart"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-kiss-wink-heart">
                                        <div class="iconview "><i class=". fa-2x far fa-kiss-wink-heart"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-kiwi-bird">
                                        <div class="iconview "><i class=". fa-2x fas fa-kiwi-bird" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-korvue">
                                        <div class="iconview "><i class=". fa-2x fab fa-korvue" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-landmark">
                                        <div class="iconview "><i class=". fa-2x fas fa-landmark" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-language">
                                        <div class="iconview "><i class=". fa-2x fas fa-language" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-laptop">
                                        <div class="iconview "><i class=". fa-2x fas fa-laptop" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-laptop-code">
                                        <div class="iconview "><i class=". fa-2x fas fa-laptop-code"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-laptop-medical">
                                        <div class="iconview "><i class=". fa-2x fas fa-laptop-medical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-laravel">
                                        <div class="iconview "><i class=". fa-2x fab fa-laravel" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-lastfm">
                                        <div class="iconview "><i class=". fa-2x fab fa-lastfm" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-lastfm-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-lastfm-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-laugh">
                                        <div class="iconview "><i class=". fa-2x fas fa-laugh" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-laugh">
                                        <div class="iconview "><i class=". fa-2x far fa-laugh" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-laugh-beam">
                                        <div class="iconview "><i class=". fa-2x fas fa-laugh-beam"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-laugh-beam">
                                        <div class="iconview "><i class=". fa-2x far fa-laugh-beam"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-laugh-squint">
                                        <div class="iconview "><i class=". fa-2x fas fa-laugh-squint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-laugh-squint">
                                        <div class="iconview "><i class=". fa-2x far fa-laugh-squint"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-laugh-wink">
                                        <div class="iconview "><i class=". fa-2x fas fa-laugh-wink"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-laugh-wink">
                                        <div class="iconview "><i class=". fa-2x far fa-laugh-wink"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-layer-group">
                                        <div class="iconview "><i class=". fa-2x fas fa-layer-group"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-leaf">
                                        <div class="iconview "><i class=". fa-2x fas fa-leaf" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-leanpub">
                                        <div class="iconview "><i class=". fa-2x fab fa-leanpub" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-lemon">
                                        <div class="iconview "><i class=". fa-2x fas fa-lemon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-lemon">
                                        <div class="iconview "><i class=". fa-2x far fa-lemon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-less">
                                        <div class="iconview "><i class=". fa-2x fab fa-less" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-less-than">
                                        <div class="iconview "><i class=". fa-2x fas fa-less-than" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-less-than-equal">
                                        <div class="iconview "><i class=". fa-2x fas fa-less-than-equal"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-level-down-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-level-down-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-level-up-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-level-up-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-life-ring">
                                        <div class="iconview "><i class=". fa-2x fas fa-life-ring" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-life-ring">
                                        <div class="iconview "><i class=". fa-2x far fa-life-ring" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-lightbulb">
                                        <div class="iconview "><i class=". fa-2x fas fa-lightbulb" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-lightbulb">
                                        <div class="iconview "><i class=". fa-2x far fa-lightbulb" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-line">
                                        <div class="iconview "><i class=". fa-2x fab fa-line" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-link">
                                        <div class="iconview "><i class=". fa-2x fas fa-link" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-linkedin">
                                        <div class="iconview "><i class=". fa-2x fab fa-linkedin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-linkedin-in ">
                                        <div class="iconview "><i class=". fa-2x fab fa-linkedin-in "
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-linode">
                                        <div class="iconview "><i class=". fa-2x fab fa-linode" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-linux">
                                        <div class="iconview "><i class=". fa-2x fab fa-linux" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-lira-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-lira-sign" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-list">
                                        <div class="iconview "><i class=". fa-2x fas fa-list" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-list-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-list-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-list-alt">
                                        <div class="iconview "><i class=". fa-2x far fa-list-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-list-ol">
                                        <div class="iconview "><i class=". fa-2x fas fa-list-ol" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-list-ul">
                                        <div class="iconview "><i class=". fa-2x fas fa-list-ul" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-location-arrow">
                                        <div class="iconview "><i class=". fa-2x fas fa-location-arrow"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-lock">
                                        <div class="iconview "><i class=". fa-2x fas fa-lock" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-lock-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-lock-open" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-long-arrow-alt-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-long-arrow-alt-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-long-arrow-alt-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-long-arrow-alt-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-long-arrow-alt-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-long-arrow-alt-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-long-arrow-alt-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-long-arrow-alt-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-low-vision">
                                        <div class="iconview "><i class=". fa-2x fas fa-low-vision"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-luggage-cart">
                                        <div class="iconview "><i class=". fa-2x fas fa-luggage-cart"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-lyft">
                                        <div class="iconview "><i class=". fa-2x fab fa-lyft" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-magento">
                                        <div class="iconview "><i class=". fa-2x fab fa-magento" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-magic">
                                        <div class="iconview "><i class=". fa-2x fas fa-magic" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-magnet">
                                        <div class="iconview "><i class=". fa-2x fas fa-magnet" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mail-bulk">
                                        <div class="iconview "><i class=". fa-2x fas fa-mail-bulk" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-mailchimp">
                                        <div class="iconview "><i class=". fa-2x fab fa-mailchimp" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-male">
                                        <div class="iconview "><i class=". fa-2x fas fa-male" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-mandalorian">
                                        <div class="iconview "><i class=". fa-2x fab fa-mandalorian"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-map">
                                        <div class="iconview "><i class=". fa-2x fas fa-map" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-map">
                                        <div class="iconview "><i class=". fa-2x far fa-map" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-map-marked">
                                        <div class="iconview "><i class=". fa-2x fas fa-map-marked"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-map-marked-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-map-marked-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-map-marker">
                                        <div class="iconview "><i class=". fa-2x fas fa-map-marker"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-map-marker-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-map-marker-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-map-pin">
                                        <div class="iconview "><i class=". fa-2x fas fa-map-pin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-map-signs">
                                        <div class="iconview "><i class=". fa-2x fas fa-map-signs" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-markdown">
                                        <div class="iconview "><i class=". fa-2x fab fa-markdown" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-marker">
                                        <div class="iconview "><i class=". fa-2x fas fa-marker" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mars">
                                        <div class="iconview "><i class=". fa-2x fas fa-mars" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mars-double">
                                        <div class="iconview "><i class=". fa-2x fas fa-mars-double"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mars-stroke">
                                        <div class="iconview "><i class=". fa-2x fas fa-mars-stroke"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mars-stroke-h">
                                        <div class="iconview "><i class=". fa-2x fas fa-mars-stroke-h"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mars-stroke-v">
                                        <div class="iconview "><i class=". fa-2x fas fa-mars-stroke-v"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mask">
                                        <div class="iconview "><i class=". fa-2x fas fa-mask" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-mastodon">
                                        <div class="iconview "><i class=". fa-2x fab fa-mastodon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-maxcdn">
                                        <div class="iconview "><i class=". fa-2x fab fa-maxcdn" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-medal">
                                        <div class="iconview "><i class=". fa-2x fas fa-medal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-medapps">
                                        <div class="iconview "><i class=". fa-2x fab fa-medapps" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-medium">
                                        <div class="iconview "><i class=". fa-2x fab fa-medium" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-medium-m">
                                        <div class="iconview "><i class=". fa-2x fab fa-medium-m" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-medkit">
                                        <div class="iconview "><i class=". fa-2x fas fa-medkit" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-medrt">
                                        <div class="iconview "><i class=". fa-2x fab fa-medrt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-meetup">
                                        <div class="iconview "><i class=". fa-2x fab fa-meetup" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-megaport">
                                        <div class="iconview "><i class=". fa-2x fab fa-megaport" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-meh">
                                        <div class="iconview "><i class=". fa-2x fas fa-meh" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-meh">
                                        <div class="iconview "><i class=". fa-2x far fa-meh" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-meh-blank">
                                        <div class="iconview "><i class=". fa-2x fas fa-meh-blank" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-meh-blank">
                                        <div class="iconview "><i class=". fa-2x far fa-meh-blank" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-meh-rolling-eyes">
                                        <div class="iconview "><i class=". fa-2x fas fa-meh-rolling-eyes"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-meh-rolling-eyes">
                                        <div class="iconview "><i class=". fa-2x far fa-meh-rolling-eyes"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-memory">
                                        <div class="iconview "><i class=". fa-2x fas fa-memory" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-mendeley">
                                        <div class="iconview "><i class=". fa-2x fab fa-mendeley" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-menorah">
                                        <div class="iconview "><i class=". fa-2x fas fa-menorah" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mercury">
                                        <div class="iconview "><i class=". fa-2x fas fa-mercury" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-meteor">
                                        <div class="iconview "><i class=". fa-2x fas fa-meteor" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-microchip">
                                        <div class="iconview "><i class=". fa-2x fas fa-microchip" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-microphone">
                                        <div class="iconview "><i class=". fa-2x fas fa-microphone"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-microphone-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-microphone-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-microphone-alt-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-microphone-alt-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-microphone-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-microphone-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-microscope">
                                        <div class="iconview "><i class=". fa-2x fas fa-microscope"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-microsoft">
                                        <div class="iconview "><i class=". fa-2x fab fa-microsoft" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-minus">
                                        <div class="iconview "><i class=". fa-2x fas fa-minus" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-minus-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-minus-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-minus-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-minus-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-minus-square">
                                        <div class="iconview "><i class=". fa-2x far fa-minus-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mitten">
                                        <div class="iconview "><i class=". fa-2x fas fa-mitten" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-mix">
                                        <div class="iconview "><i class=". fa-2x fab fa-mix" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-mixcloud">
                                        <div class="iconview "><i class=". fa-2x fab fa-mixcloud" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-mizuni">
                                        <div class="iconview "><i class=". fa-2x fab fa-mizuni" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mobile">
                                        <div class="iconview "><i class=". fa-2x fas fa-mobile" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mobile-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-mobile-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-modx">
                                        <div class="iconview "><i class=". fa-2x fab fa-modx" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-monero">
                                        <div class="iconview "><i class=". fa-2x fab fa-monero" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-money-bill">
                                        <div class="iconview "><i class=". fa-2x fas fa-money-bill"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-money-bill-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-money-bill-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-money-bill-alt">
                                        <div class="iconview "><i class=". fa-2x far fa-money-bill-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-money-bill-wave">
                                        <div class="iconview "><i class=". fa-2x fas fa-money-bill-wave"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-money-bill-wave-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-money-bill-wave-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-money-check">
                                        <div class="iconview "><i class=". fa-2x fas fa-money-check"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-money-check-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-money-check-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-monument">
                                        <div class="iconview "><i class=". fa-2x fas fa-monument" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-moon">
                                        <div class="iconview "><i class=". fa-2x fas fa-moon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-moon">
                                        <div class="iconview "><i class=". fa-2x far fa-moon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mortar-pestle">
                                        <div class="iconview "><i class=". fa-2x fas fa-mortar-pestle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mosque">
                                        <div class="iconview "><i class=". fa-2x fas fa-mosque" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-motorcycle">
                                        <div class="iconview "><i class=". fa-2x fas fa-motorcycle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mountain">
                                        <div class="iconview "><i class=". fa-2x fas fa-mountain" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mouse-pointer">
                                        <div class="iconview "><i class=". fa-2x fas fa-mouse-pointer"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-mug-hot">
                                        <div class="iconview "><i class=". fa-2x fas fa-mug-hot" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-music">
                                        <div class="iconview "><i class=". fa-2x fas fa-music" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-napster">
                                        <div class="iconview "><i class=". fa-2x fab fa-napster" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-neos">
                                        <div class="iconview "><i class=". fa-2x fab fa-neos" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-network-wired">
                                        <div class="iconview "><i class=". fa-2x fas fa-network-wired"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-neuter">
                                        <div class="iconview "><i class=". fa-2x fas fa-neuter" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-newspaper">
                                        <div class="iconview "><i class=". fa-2x fas fa-newspaper" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-newspaper">
                                        <div class="iconview "><i class=". fa-2x far fa-newspaper" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-nimblr">
                                        <div class="iconview "><i class=". fa-2x fab fa-nimblr" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-nintendo-switch">
                                        <div class="iconview "><i class=". fa-2x fab fa-nintendo-switch"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-node">
                                        <div class="iconview "><i class=". fa-2x fab fa-node" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-node-js">
                                        <div class="iconview "><i class=". fa-2x fab fa-node-js" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-not-equal">
                                        <div class="iconview "><i class=". fa-2x fas fa-not-equal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-notes-medical">
                                        <div class="iconview "><i class=". fa-2x fas fa-notes-medical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-npm">
                                        <div class="iconview "><i class=". fa-2x fab fa-npm" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ns8">
                                        <div class="iconview "><i class=". fa-2x fab fa-ns8" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-nutritionix">
                                        <div class="iconview "><i class=". fa-2x fab fa-nutritionix"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-object-group">
                                        <div class="iconview "><i class=". fa-2x fas fa-object-group"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-object-group">
                                        <div class="iconview "><i class=". fa-2x far fa-object-group"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-object-ungroup">
                                        <div class="iconview "><i class=". fa-2x fas fa-object-ungroup"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-object-ungroup">
                                        <div class="iconview "><i class=". fa-2x far fa-object-ungroup"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-odnoklassniki">
                                        <div class="iconview "><i class=". fa-2x fab fa-odnoklassniki"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-odnoklassniki-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-odnoklassniki-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-oil-can">
                                        <div class="iconview "><i class=". fa-2x fas fa-oil-can" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-old-republic">
                                        <div class="iconview "><i class=". fa-2x fab fa-old-republic"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-om">
                                        <div class="iconview "><i class=". fa-2x fas fa-om" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-opencart">
                                        <div class="iconview "><i class=". fa-2x fab fa-opencart" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-openid">
                                        <div class="iconview "><i class=". fa-2x fab fa-openid" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-opera">
                                        <div class="iconview "><i class=". fa-2x fab fa-opera" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-optin-monster">
                                        <div class="iconview "><i class=". fa-2x fab fa-optin-monster"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-osi">
                                        <div class="iconview "><i class=". fa-2x fab fa-osi" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-otter">
                                        <div class="iconview "><i class=". fa-2x fas fa-otter" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-outdent">
                                        <div class="iconview "><i class=". fa-2x fas fa-outdent" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-page4">
                                        <div class="iconview "><i class=". fa-2x fab fa-page4" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pagelines">
                                        <div class="iconview "><i class=". fa-2x fab fa-pagelines" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pager">
                                        <div class="iconview "><i class=". fa-2x fas fa-pager" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-paint-brush">
                                        <div class="iconview "><i class=". fa-2x fas fa-paint-brush"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-paint-roller">
                                        <div class="iconview "><i class=". fa-2x fas fa-paint-roller"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-palette">
                                        <div class="iconview "><i class=". fa-2x fas fa-palette" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-palfed">
                                        <div class="iconview "><i class=". fa-2x fab fa-palfed" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pallet">
                                        <div class="iconview "><i class=". fa-2x fas fa-pallet" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-paper-plane">
                                        <div class="iconview "><i class=". fa-2x fas fa-paper-plane"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-paper-plane">
                                        <div class="iconview "><i class=". fa-2x far fa-paper-plane"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-paperclip">
                                        <div class="iconview "><i class=". fa-2x fas fa-paperclip" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-parachute-box">
                                        <div class="iconview "><i class=". fa-2x fas fa-parachute-box"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-paragraph">
                                        <div class="iconview "><i class=". fa-2x fas fa-paragraph" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-parking">
                                        <div class="iconview "><i class=". fa-2x fas fa-parking" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-passport">
                                        <div class="iconview "><i class=". fa-2x fas fa-passport" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pastafarianism">
                                        <div class="iconview "><i class=". fa-2x fas fa-pastafarianism"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-paste">
                                        <div class="iconview "><i class=". fa-2x fas fa-paste" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-patreon">
                                        <div class="iconview "><i class=". fa-2x fab fa-patreon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pause">
                                        <div class="iconview "><i class=". fa-2x fas fa-pause" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pause-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-pause-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-pause-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-pause-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-paw">
                                        <div class="iconview "><i class=". fa-2x fas fa-paw" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-paypal">
                                        <div class="iconview "><i class=". fa-2x fab fa-paypal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-peace">
                                        <div class="iconview "><i class=". fa-2x fas fa-peace" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pen">
                                        <div class="iconview "><i class=". fa-2x fas fa-pen" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pen-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-pen-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pen-fancy">
                                        <div class="iconview "><i class=". fa-2x fas fa-pen-fancy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pen-nib">
                                        <div class="iconview "><i class=". fa-2x fas fa-pen-nib" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pen-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-pen-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pencil-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-pencil-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pencil-ruler">
                                        <div class="iconview "><i class=". fa-2x fas fa-pencil-ruler"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-penny-arcade">
                                        <div class="iconview "><i class=". fa-2x fab fa-penny-arcade"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-people-carry">
                                        <div class="iconview "><i class=". fa-2x fas fa-people-carry"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pepper-hot">
                                        <div class="iconview "><i class=". fa-2x fas fa-pepper-hot"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-percent">
                                        <div class="iconview "><i class=". fa-2x fas fa-percent" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-percentage">
                                        <div class="iconview "><i class=". fa-2x fas fa-percentage"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-periscope">
                                        <div class="iconview "><i class=". fa-2x fab fa-periscope" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-person-booth">
                                        <div class="iconview "><i class=". fa-2x fas fa-person-booth"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-phabricator">
                                        <div class="iconview "><i class=". fa-2x fab fa-phabricator"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-phoenix-framework">
                                        <div class="iconview "><i class=". fa-2x fab fa-phoenix-framework"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-phoenix-squadron">
                                        <div class="iconview "><i class=". fa-2x fab fa-phoenix-squadron"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-phone">
                                        <div class="iconview "><i class=". fa-2x fas fa-phone" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-phone-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-phone-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-phone-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-phone-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-phone-volume">
                                        <div class="iconview "><i class=". fa-2x fas fa-phone-volume"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-php">
                                        <div class="iconview "><i class=". fa-2x fab fa-php" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pied-piper">
                                        <div class="iconview "><i class=". fa-2x fab fa-pied-piper"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pied-piper-alt">
                                        <div class="iconview "><i class=". fa-2x fab fa-pied-piper-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pied-piper-hat">
                                        <div class="iconview "><i class=". fa-2x fab fa-pied-piper-hat"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pied-piper-pp">
                                        <div class="iconview "><i class=". fa-2x fab fa-pied-piper-pp"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-piggy-bank">
                                        <div class="iconview "><i class=". fa-2x fas fa-piggy-bank"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pills">
                                        <div class="iconview "><i class=". fa-2x fas fa-pills" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pinterest">
                                        <div class="iconview "><i class=". fa-2x fab fa-pinterest" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pinterest-p">
                                        <div class="iconview "><i class=". fa-2x fab fa-pinterest-p"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pinterest-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-pinterest-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pizza-slice">
                                        <div class="iconview "><i class=". fa-2x fas fa-pizza-slice"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-place-of-worship">
                                        <div class="iconview "><i class=". fa-2x fas fa-place-of-worship"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-plane">
                                        <div class="iconview "><i class=". fa-2x fas fa-plane" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-plane-arrival">
                                        <div class="iconview "><i class=". fa-2x fas fa-plane-arrival"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-plane-departure">
                                        <div class="iconview "><i class=". fa-2x fas fa-plane-departure"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-play">
                                        <div class="iconview "><i class=". fa-2x fas fa-play" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-play-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-play-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-play-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-play-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-playstation">
                                        <div class="iconview "><i class=". fa-2x fab fa-playstation"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-plug">
                                        <div class="iconview "><i class=". fa-2x fas fa-plug" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-plus">
                                        <div class="iconview "><i class=". fa-2x fas fa-plus" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-plus-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-plus-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-plus-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-plus-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-plus-square">
                                        <div class="iconview "><i class=". fa-2x far fa-plus-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-podcast">
                                        <div class="iconview "><i class=". fa-2x fas fa-podcast" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-poll">
                                        <div class="iconview "><i class=". fa-2x fas fa-poll" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-poll-h">
                                        <div class="iconview "><i class=". fa-2x fas fa-poll-h" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-poo">
                                        <div class="iconview "><i class=". fa-2x fas fa-poo" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-poo-storm">
                                        <div class="iconview "><i class=". fa-2x fas fa-poo-storm" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-poop">
                                        <div class="iconview "><i class=". fa-2x fas fa-poop" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-portrait">
                                        <div class="iconview "><i class=". fa-2x fas fa-portrait" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pound-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-pound-sign"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-power-off">
                                        <div class="iconview "><i class=". fa-2x fas fa-power-off" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-pray">
                                        <div class="iconview "><i class=". fa-2x fas fa-pray" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-praying-hands">
                                        <div class="iconview "><i class=". fa-2x fas fa-praying-hands"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-prescription">
                                        <div class="iconview "><i class=". fa-2x fas fa-prescription"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-prescription-bottle">
                                        <div class="iconview "><i class=". fa-2x fas fa-prescription-bottle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-prescription-bottle-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-prescription-bottle-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-print">
                                        <div class="iconview "><i class=". fa-2x fas fa-print" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-procedures">
                                        <div class="iconview "><i class=". fa-2x fas fa-procedures"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-product-hunt">
                                        <div class="iconview "><i class=". fa-2x fab fa-product-hunt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-project-diagram">
                                        <div class="iconview "><i class=". fa-2x fas fa-project-diagram"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-pushed">
                                        <div class="iconview "><i class=". fa-2x fab fa-pushed" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-puzzle-piece">
                                        <div class="iconview "><i class=". fa-2x fas fa-puzzle-piece"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-python">
                                        <div class="iconview "><i class=". fa-2x fab fa-python" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-qq">
                                        <div class="iconview "><i class=". fa-2x fab fa-qq" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-qrcode">
                                        <div class="iconview "><i class=". fa-2x fas fa-qrcode" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-question">
                                        <div class="iconview "><i class=". fa-2x fas fa-question" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-question-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-question-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-question-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-question-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-quidditch">
                                        <div class="iconview "><i class=". fa-2x fas fa-quidditch" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-quinscape">
                                        <div class="iconview "><i class=". fa-2x fab fa-quinscape" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-quora">
                                        <div class="iconview "><i class=". fa-2x fab fa-quora" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-quote-left">
                                        <div class="iconview "><i class=". fa-2x fas fa-quote-left"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-quote-right">
                                        <div class="iconview "><i class=". fa-2x fas fa-quote-right"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-quran">
                                        <div class="iconview "><i class=". fa-2x fas fa-quran" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-r-project">
                                        <div class="iconview "><i class=". fa-2x fab fa-r-project" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-radiation">
                                        <div class="iconview "><i class=". fa-2x fas fa-radiation" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-radiation-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-radiation-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-rainbow">
                                        <div class="iconview "><i class=". fa-2x fas fa-rainbow" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-random">
                                        <div class="iconview "><i class=". fa-2x fas fa-random" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-raspberry-pi">
                                        <div class="iconview "><i class=". fa-2x fab fa-raspberry-pi"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ravelry">
                                        <div class="iconview "><i class=". fa-2x fab fa-ravelry" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-react">
                                        <div class="iconview "><i class=". fa-2x fab fa-react" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-reacteurope">
                                        <div class="iconview "><i class=". fa-2x fab fa-reacteurope"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-readme">
                                        <div class="iconview "><i class=". fa-2x fab fa-readme" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-rebel">
                                        <div class="iconview "><i class=". fa-2x fab fa-rebel" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-receipt">
                                        <div class="iconview "><i class=". fa-2x fas fa-receipt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-recycle">
                                        <div class="iconview "><i class=". fa-2x fas fa-recycle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-red-river">
                                        <div class="iconview "><i class=". fa-2x fab fa-red-river" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-reddit">
                                        <div class="iconview "><i class=". fa-2x fab fa-reddit" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-reddit-alien">
                                        <div class="iconview "><i class=". fa-2x fab fa-reddit-alien"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-reddit-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-reddit-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-redhat">
                                        <div class="iconview "><i class=". fa-2x fab fa-redhat" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-redo">
                                        <div class="iconview "><i class=". fa-2x fas fa-redo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-redo-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-redo-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-registered">
                                        <div class="iconview "><i class=". fa-2x fas fa-registered"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-registered">
                                        <div class="iconview "><i class=". fa-2x far fa-registered"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-renren">
                                        <div class="iconview "><i class=". fa-2x fab fa-renren" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-reply">
                                        <div class="iconview "><i class=". fa-2x fas fa-reply" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-reply-all">
                                        <div class="iconview "><i class=". fa-2x fas fa-reply-all" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-replyd">
                                        <div class="iconview "><i class=". fa-2x fab fa-replyd" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-republican">
                                        <div class="iconview "><i class=". fa-2x fas fa-republican"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-researchgate">
                                        <div class="iconview "><i class=". fa-2x fab fa-researchgate"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-resolving">
                                        <div class="iconview "><i class=". fa-2x fab fa-resolving" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-restroom">
                                        <div class="iconview "><i class=". fa-2x fas fa-restroom" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-retweet">
                                        <div class="iconview "><i class=". fa-2x fas fa-retweet" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-rev">
                                        <div class="iconview "><i class=". fa-2x fab fa-rev" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ribbon">
                                        <div class="iconview "><i class=". fa-2x fas fa-ribbon" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ring">
                                        <div class="iconview "><i class=". fa-2x fas fa-ring" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-road">
                                        <div class="iconview "><i class=". fa-2x fas fa-road" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-robot">
                                        <div class="iconview "><i class=". fa-2x fas fa-robot" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-rocket">
                                        <div class="iconview "><i class=". fa-2x fas fa-rocket" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-rocketchat">
                                        <div class="iconview "><i class=". fa-2x fab fa-rocketchat"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-rockrms">
                                        <div class="iconview "><i class=". fa-2x fab fa-rockrms" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-route">
                                        <div class="iconview "><i class=". fa-2x fas fa-route" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-rss">
                                        <div class="iconview "><i class=". fa-2x fas fa-rss" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-rss-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-rss-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ruble-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-ruble-sign"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ruler">
                                        <div class="iconview "><i class=". fa-2x fas fa-ruler" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ruler-combined">
                                        <div class="iconview "><i class=". fa-2x fas fa-ruler-combined"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ruler-horizontal">
                                        <div class="iconview "><i class=". fa-2x fas fa-ruler-horizontal"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ruler-vertical">
                                        <div class="iconview "><i class=". fa-2x fas fa-ruler-vertical"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-running">
                                        <div class="iconview "><i class=". fa-2x fas fa-running" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-rupee-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-rupee-sign"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sad-cry">
                                        <div class="iconview "><i class=". fa-2x fas fa-sad-cry" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-sad-cry">
                                        <div class="iconview "><i class=". fa-2x far fa-sad-cry" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sad-tear">
                                        <div class="iconview "><i class=". fa-2x fas fa-sad-tear" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-sad-tear">
                                        <div class="iconview "><i class=". fa-2x far fa-sad-tear" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-safari">
                                        <div class="iconview "><i class=". fa-2x fab fa-safari" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sass">
                                        <div class="iconview "><i class=". fa-2x fab fa-sass" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-satellite">
                                        <div class="iconview "><i class=". fa-2x fas fa-satellite" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-satellite-dish">
                                        <div class="iconview "><i class=". fa-2x fas fa-satellite-dish"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-save">
                                        <div class="iconview "><i class=". fa-2x fas fa-save" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-save">
                                        <div class="iconview "><i class=". fa-2x far fa-save" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-schlix">
                                        <div class="iconview "><i class=". fa-2x fab fa-schlix" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-school">
                                        <div class="iconview "><i class=". fa-2x fas fa-school" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-screwdriver">
                                        <div class="iconview "><i class=". fa-2x fas fa-screwdriver"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-scribd">
                                        <div class="iconview "><i class=". fa-2x fab fa-scribd" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-scroll">
                                        <div class="iconview "><i class=". fa-2x fas fa-scroll" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sd-card">
                                        <div class="iconview "><i class=". fa-2x fas fa-sd-card" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-search">
                                        <div class="iconview "><i class=". fa-2x fas fa-search" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-search-dollar">
                                        <div class="iconview "><i class=". fa-2x fas fa-search-dollar"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-search-location">
                                        <div class="iconview "><i class=". fa-2x fas fa-search-location"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-search-minus">
                                        <div class="iconview "><i class=". fa-2x fas fa-search-minus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-search-plus">
                                        <div class="iconview "><i class=". fa-2x fas fa-search-plus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-searchengin">
                                        <div class="iconview "><i class=". fa-2x fab fa-searchengin"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-seedling">
                                        <div class="iconview "><i class=". fa-2x fas fa-seedling" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sellcast">
                                        <div class="iconview "><i class=". fa-2x fab fa-sellcast" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sellsy">
                                        <div class="iconview "><i class=". fa-2x fab fa-sellsy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-server">
                                        <div class="iconview "><i class=". fa-2x fas fa-server" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-servicestack">
                                        <div class="iconview "><i class=". fa-2x fab fa-servicestack"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shapes">
                                        <div class="iconview "><i class=". fa-2x fas fa-shapes" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-share">
                                        <div class="iconview "><i class=". fa-2x fas fa-share" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-share-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-share-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-share-alt-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-share-alt-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-share-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-share-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-share-square">
                                        <div class="iconview "><i class=". fa-2x far fa-share-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shekel-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-shekel-sign"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shield-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-shield-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ship">
                                        <div class="iconview "><i class=". fa-2x fas fa-ship" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shipping-fast">
                                        <div class="iconview "><i class=". fa-2x fas fa-shipping-fast"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-shirtsinbulk">
                                        <div class="iconview "><i class=". fa-2x fab fa-shirtsinbulk"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shoe-prints">
                                        <div class="iconview "><i class=". fa-2x fas fa-shoe-prints"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shopping-bag">
                                        <div class="iconview "><i class=". fa-2x fas fa-shopping-bag"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shopping-basket">
                                        <div class="iconview "><i class=". fa-2x fas fa-shopping-basket"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shopping-cart">
                                        <div class="iconview "><i class=". fa-2x fas fa-shopping-cart"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-shopware">
                                        <div class="iconview "><i class=". fa-2x fab fa-shopware" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shower">
                                        <div class="iconview "><i class=". fa-2x fas fa-shower" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-shuttle-van">
                                        <div class="iconview "><i class=". fa-2x fas fa-shuttle-van"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-sign" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sign-in-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-sign-in-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sign-language">
                                        <div class="iconview "><i class=". fa-2x fas fa-sign-language"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sign-out-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-sign-out-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-signal">
                                        <div class="iconview "><i class=". fa-2x fas fa-signal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-signature">
                                        <div class="iconview "><i class=". fa-2x fas fa-signature" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sim-card">
                                        <div class="iconview "><i class=". fa-2x fas fa-sim-card" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-simplybuilt">
                                        <div class="iconview "><i class=". fa-2x fab fa-simplybuilt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sistrix">
                                        <div class="iconview "><i class=". fa-2x fab fa-sistrix" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sitemap">
                                        <div class="iconview "><i class=". fa-2x fas fa-sitemap" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sith">
                                        <div class="iconview "><i class=". fa-2x fab fa-sith" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-skating">
                                        <div class="iconview "><i class=". fa-2x fas fa-skating" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sketch">
                                        <div class="iconview "><i class=". fa-2x fab fa-sketch" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-skiing">
                                        <div class="iconview "><i class=". fa-2x fas fa-skiing" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-skiing-nordic">
                                        <div class="iconview "><i class=". fa-2x fas fa-skiing-nordic"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-skull">
                                        <div class="iconview "><i class=". fa-2x fas fa-skull" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-skull-crossbones">
                                        <div class="iconview "><i class=". fa-2x fas fa-skull-crossbones"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-skyatlas">
                                        <div class="iconview "><i class=". fa-2x fab fa-skyatlas" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-skype">
                                        <div class="iconview "><i class=". fa-2x fab fa-skype" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-slack">
                                        <div class="iconview "><i class=". fa-2x fab fa-slack" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-slack-hash">
                                        <div class="iconview "><i class=". fa-2x fab fa-slack-hash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-slash" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sleigh">
                                        <div class="iconview "><i class=". fa-2x fas fa-sleigh" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sliders-h">
                                        <div class="iconview "><i class=". fa-2x fas fa-sliders-h" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-slideshare">
                                        <div class="iconview "><i class=". fa-2x fab fa-slideshare"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-smile">
                                        <div class="iconview "><i class=". fa-2x fas fa-smile" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-smile">
                                        <div class="iconview "><i class=". fa-2x far fa-smile" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-smile-beam">
                                        <div class="iconview "><i class=". fa-2x fas fa-smile-beam"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-smile-beam">
                                        <div class="iconview "><i class=". fa-2x far fa-smile-beam"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-smile-wink">
                                        <div class="iconview "><i class=". fa-2x fas fa-smile-wink"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-smile-wink">
                                        <div class="iconview "><i class=". fa-2x far fa-smile-wink"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-smog">
                                        <div class="iconview "><i class=". fa-2x fas fa-smog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-smoking">
                                        <div class="iconview "><i class=". fa-2x fas fa-smoking" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-smoking-ban">
                                        <div class="iconview "><i class=". fa-2x fas fa-smoking-ban"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sms">
                                        <div class="iconview "><i class=". fa-2x fas fa-sms" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-snapchat">
                                        <div class="iconview "><i class=". fa-2x fab fa-snapchat" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-snapchat-ghost">
                                        <div class="iconview "><i class=". fa-2x fab fa-snapchat-ghost"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-snapchat-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-snapchat-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-snowboarding">
                                        <div class="iconview "><i class=". fa-2x fas fa-snowboarding"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-snowflake">
                                        <div class="iconview "><i class=". fa-2x fas fa-snowflake" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-snowflake">
                                        <div class="iconview "><i class=". fa-2x far fa-snowflake" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-snowman">
                                        <div class="iconview "><i class=". fa-2x fas fa-snowman" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-snowplow">
                                        <div class="iconview "><i class=". fa-2x fas fa-snowplow" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-socks">
                                        <div class="iconview "><i class=". fa-2x fas fa-socks" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-solar-panel">
                                        <div class="iconview "><i class=". fa-2x fas fa-solar-panel"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-alpha-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-alpha-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-alpha-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-alpha-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-amount-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-amount-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-amount-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-amount-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-down" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-numeric-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-numeric-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-numeric-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-numeric-up"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sort-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-sort-up" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-soundcloud">
                                        <div class="iconview "><i class=". fa-2x fab fa-soundcloud"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sourcetree">
                                        <div class="iconview "><i class=". fa-2x fab fa-sourcetree"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-spa">
                                        <div class="iconview "><i class=". fa-2x fas fa-spa" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-space-shuttle">
                                        <div class="iconview "><i class=". fa-2x fas fa-space-shuttle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-speakap">
                                        <div class="iconview "><i class=". fa-2x fab fa-speakap" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-spider">
                                        <div class="iconview "><i class=". fa-2x fas fa-spider" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-spinner">
                                        <div class="iconview "><i class=". fa-2x fas fa-spinner" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-splotch">
                                        <div class="iconview "><i class=". fa-2x fas fa-splotch" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-spotify">
                                        <div class="iconview "><i class=". fa-2x fab fa-spotify" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-spray-can">
                                        <div class="iconview "><i class=". fa-2x fas fa-spray-can" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-square" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-square">
                                        <div class="iconview "><i class=". fa-2x far fa-square" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-square-full">
                                        <div class="iconview "><i class=". fa-2x fas fa-square-full"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-square-root-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-square-root-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-squarespace">
                                        <div class="iconview "><i class=". fa-2x fab fa-squarespace"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-stack-exchange">
                                        <div class="iconview "><i class=". fa-2x fab fa-stack-exchange"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-stack-overflow">
                                        <div class="iconview "><i class=". fa-2x fab fa-stack-overflow"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-stamp">
                                        <div class="iconview "><i class=". fa-2x fas fa-stamp" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-star">
                                        <div class="iconview "><i class=". fa-2x fas fa-star" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-star">
                                        <div class="iconview "><i class=". fa-2x far fa-star" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-star-and-crescent">
                                        <div class="iconview "><i class=". fa-2x fas fa-star-and-crescent"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-star-half">
                                        <div class="iconview "><i class=". fa-2x fas fa-star-half" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-star-half">
                                        <div class="iconview "><i class=". fa-2x far fa-star-half" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-star-half-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-star-half-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-star-of-david">
                                        <div class="iconview "><i class=". fa-2x fas fa-star-of-david"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-star-of-life">
                                        <div class="iconview "><i class=". fa-2x fas fa-star-of-life"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-staylinked">
                                        <div class="iconview "><i class=". fa-2x fab fa-staylinked"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-steam">
                                        <div class="iconview "><i class=". fa-2x fab fa-steam" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-steam-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-steam-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-steam-symbol">
                                        <div class="iconview "><i class=". fa-2x fab fa-steam-symbol"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-step-backward">
                                        <div class="iconview "><i class=". fa-2x fas fa-step-backward"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-step-forward">
                                        <div class="iconview "><i class=". fa-2x fas fa-step-forward"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-stethoscope">
                                        <div class="iconview "><i class=". fa-2x fas fa-stethoscope"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-sticker-mule">
                                        <div class="iconview "><i class=". fa-2x fab fa-sticker-mule"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sticky-note">
                                        <div class="iconview "><i class=". fa-2x fas fa-sticky-note"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-sticky-note">
                                        <div class="iconview "><i class=". fa-2x far fa-sticky-note"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-stop">
                                        <div class="iconview "><i class=". fa-2x fas fa-stop" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-stop-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-stop-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-stop-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-stop-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-stopwatch">
                                        <div class="iconview "><i class=". fa-2x fas fa-stopwatch" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-store">
                                        <div class="iconview "><i class=". fa-2x fas fa-store" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-store-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-store-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-strava">
                                        <div class="iconview "><i class=". fa-2x fab fa-strava" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-stream">
                                        <div class="iconview "><i class=". fa-2x fas fa-stream" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-street-view">
                                        <div class="iconview "><i class=". fa-2x fas fa-street-view"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-strikethrough">
                                        <div class="iconview "><i class=". fa-2x fas fa-strikethrough"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-stripe">
                                        <div class="iconview "><i class=". fa-2x fab fa-stripe" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-stripe-s">
                                        <div class="iconview "><i class=". fa-2x fab fa-stripe-s" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-stroopwafel">
                                        <div class="iconview "><i class=". fa-2x fas fa-stroopwafel"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-studiovinari">
                                        <div class="iconview "><i class=". fa-2x fab fa-studiovinari"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-stumbleupon">
                                        <div class="iconview "><i class=". fa-2x fab fa-stumbleupon"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-stumbleupon-circle">
                                        <div class="iconview "><i class=". fa-2x fab fa-stumbleupon-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-subscript">
                                        <div class="iconview "><i class=". fa-2x fas fa-subscript" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-subway">
                                        <div class="iconview "><i class=". fa-2x fas fa-subway" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-suitcase">
                                        <div class="iconview "><i class=". fa-2x fas fa-suitcase" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-suitcase-rolling">
                                        <div class="iconview "><i class=". fa-2x fas fa-suitcase-rolling"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sun">
                                        <div class="iconview "><i class=". fa-2x fas fa-sun" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-sun">
                                        <div class="iconview "><i class=". fa-2x far fa-sun" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-superpowers">
                                        <div class="iconview "><i class=". fa-2x fab fa-superpowers"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-superscript">
                                        <div class="iconview "><i class=". fa-2x fas fa-superscript"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-supple">
                                        <div class="iconview "><i class=". fa-2x fab fa-supple" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-surprise">
                                        <div class="iconview "><i class=". fa-2x fas fa-surprise" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-surprise">
                                        <div class="iconview "><i class=". fa-2x far fa-surprise" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-suse">
                                        <div class="iconview "><i class=". fa-2x fab fa-suse" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-swatchbook">
                                        <div class="iconview "><i class=". fa-2x fas fa-swatchbook"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-swimmer">
                                        <div class="iconview "><i class=". fa-2x fas fa-swimmer" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-swimming-pool">
                                        <div class="iconview "><i class=". fa-2x fas fa-swimming-pool"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-synagogue">
                                        <div class="iconview "><i class=". fa-2x fas fa-synagogue" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sync">
                                        <div class="iconview "><i class=". fa-2x fas fa-sync" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-sync-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-sync-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-syringe">
                                        <div class="iconview "><i class=". fa-2x fas fa-syringe" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-table">
                                        <div class="iconview "><i class=". fa-2x fas fa-table" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-table-tennis">
                                        <div class="iconview "><i class=". fa-2x fas fa-table-tennis"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tablet">
                                        <div class="iconview "><i class=". fa-2x fas fa-tablet" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tablet-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-tablet-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tablets">
                                        <div class="iconview "><i class=". fa-2x fas fa-tablets" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tachometer-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-tachometer-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tag">
                                        <div class="iconview "><i class=". fa-2x fas fa-tag" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tags">
                                        <div class="iconview "><i class=". fa-2x fas fa-tags" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tape">
                                        <div class="iconview "><i class=". fa-2x fas fa-tape" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tasks">
                                        <div class="iconview "><i class=". fa-2x fas fa-tasks" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-taxi">
                                        <div class="iconview "><i class=". fa-2x fas fa-taxi" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-teamspeak">
                                        <div class="iconview "><i class=". fa-2x fab fa-teamspeak" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-teeth">
                                        <div class="iconview "><i class=". fa-2x fas fa-teeth" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-teeth-open">
                                        <div class="iconview "><i class=". fa-2x fas fa-teeth-open"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-telegram">
                                        <div class="iconview "><i class=". fa-2x fab fa-telegram" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-telegram-plane">
                                        <div class="iconview "><i class=". fa-2x fab fa-telegram-plane"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-temperature-high">
                                        <div class="iconview "><i class=". fa-2x fas fa-temperature-high"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-temperature-low">
                                        <div class="iconview "><i class=". fa-2x fas fa-temperature-low"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-tencent-weibo">
                                        <div class="iconview "><i class=". fa-2x fab fa-tencent-weibo"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tenge">
                                        <div class="iconview "><i class=". fa-2x fas fa-tenge" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-terminal">
                                        <div class="iconview "><i class=". fa-2x fas fa-terminal" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-text-height">
                                        <div class="iconview "><i class=". fa-2x fas fa-text-height"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-text-width">
                                        <div class="iconview "><i class=". fa-2x fas fa-text-width"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-th">
                                        <div class="iconview "><i class=". fa-2x fas fa-th" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-th-large">
                                        <div class="iconview "><i class=". fa-2x fas fa-th-large" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-th-list">
                                        <div class="iconview "><i class=". fa-2x fas fa-th-list" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-the-red-yeti">
                                        <div class="iconview "><i class=". fa-2x fab fa-the-red-yeti"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-theater-masks">
                                        <div class="iconview "><i class=". fa-2x fas fa-theater-masks"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-themeco">
                                        <div class="iconview "><i class=". fa-2x fab fa-themeco" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-themeisle">
                                        <div class="iconview "><i class=". fa-2x fab fa-themeisle" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thermometer">
                                        <div class="iconview "><i class=". fa-2x fas fa-thermometer"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thermometer-empty">
                                        <div class="iconview "><i class=". fa-2x fas fa-thermometer-empty"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thermometer-full">
                                        <div class="iconview "><i class=". fa-2x fas fa-thermometer-full"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thermometer-half">
                                        <div class="iconview "><i class=". fa-2x fas fa-thermometer-half"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thermometer-quarter">
                                        <div class="iconview "><i class=". fa-2x fas fa-thermometer-quarter"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thermometer-three-quarters">
                                        <div class="iconview "><i class=". fa-2x fas fa-thermometer-three-quarters"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-think-peaks">
                                        <div class="iconview "><i class=". fa-2x fab fa-think-peaks"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thumbs-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-thumbs-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-thumbs-down">
                                        <div class="iconview "><i class=". fa-2x far fa-thumbs-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thumbs-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-thumbs-up" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-thumbs-up">
                                        <div class="iconview "><i class=". fa-2x far fa-thumbs-up" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-thumbtack">
                                        <div class="iconview "><i class=". fa-2x fas fa-thumbtack" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-ticket-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-ticket-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-times">
                                        <div class="iconview "><i class=". fa-2x fas fa-times" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-times-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-times-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-times-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-times-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tint">
                                        <div class="iconview "><i class=". fa-2x fas fa-tint" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tint-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-tint-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tired">
                                        <div class="iconview "><i class=". fa-2x fas fa-tired" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-tired">
                                        <div class="iconview "><i class=". fa-2x far fa-tired" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-toggle-off">
                                        <div class="iconview "><i class=". fa-2x fas fa-toggle-off"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-toggle-on">
                                        <div class="iconview "><i class=". fa-2x fas fa-toggle-on" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-toilet">
                                        <div class="iconview "><i class=". fa-2x fas fa-toilet" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-toilet-paper">
                                        <div class="iconview "><i class=". fa-2x fas fa-toilet-paper"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-toolbox">
                                        <div class="iconview "><i class=". fa-2x fas fa-toolbox" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tools">
                                        <div class="iconview "><i class=". fa-2x fas fa-tools" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tooth">
                                        <div class="iconview "><i class=". fa-2x fas fa-tooth" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-torah">
                                        <div class="iconview "><i class=". fa-2x fas fa-torah" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-torii-gate">
                                        <div class="iconview "><i class=". fa-2x fas fa-torii-gate"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tractor">
                                        <div class="iconview "><i class=". fa-2x fas fa-tractor" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-trade-federation">
                                        <div class="iconview "><i class=". fa-2x fab fa-trade-federation"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-trademark">
                                        <div class="iconview "><i class=". fa-2x fas fa-trademark" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-traffic-light">
                                        <div class="iconview "><i class=". fa-2x fas fa-traffic-light"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-train">
                                        <div class="iconview "><i class=". fa-2x fas fa-train" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tram">
                                        <div class="iconview "><i class=". fa-2x fas fa-tram" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-transgender">
                                        <div class="iconview "><i class=". fa-2x fas fa-transgender"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-transgender-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-transgender-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-trash">
                                        <div class="iconview "><i class=". fa-2x fas fa-trash" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-trash-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-trash-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-trash-alt">
                                        <div class="iconview "><i class=". fa-2x far fa-trash-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-trash-restore">
                                        <div class="iconview "><i class=". fa-2x fas fa-trash-restore"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-trash-restore-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-trash-restore-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tree">
                                        <div class="iconview "><i class=". fa-2x fas fa-tree" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-trello">
                                        <div class="iconview "><i class=". fa-2x fab fa-trello" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-tripadvisor">
                                        <div class="iconview "><i class=". fa-2x fab fa-tripadvisor"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-trophy">
                                        <div class="iconview "><i class=". fa-2x fas fa-trophy" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-truck">
                                        <div class="iconview "><i class=". fa-2x fas fa-truck" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-truck-loading">
                                        <div class="iconview "><i class=". fa-2x fas fa-truck-loading"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-truck-monster">
                                        <div class="iconview "><i class=". fa-2x fas fa-truck-monster"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-truck-moving">
                                        <div class="iconview "><i class=". fa-2x fas fa-truck-moving"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-truck-pickup">
                                        <div class="iconview "><i class=". fa-2x fas fa-truck-pickup"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tshirt">
                                        <div class="iconview "><i class=". fa-2x fas fa-tshirt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tty">
                                        <div class="iconview "><i class=". fa-2x fas fa-tty" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-tumblr">
                                        <div class="iconview "><i class=". fa-2x fab fa-tumblr" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-tumblr-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-tumblr-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-tv">
                                        <div class="iconview "><i class=". fa-2x fas fa-tv" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-twitch">
                                        <div class="iconview "><i class=". fa-2x fab fa-twitch" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-twitter">
                                        <div class="iconview "><i class=". fa-2x fab fa-twitter" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-twitter-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-twitter-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-typo3">
                                        <div class="iconview "><i class=". fa-2x fab fa-typo3" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-uber">
                                        <div class="iconview "><i class=". fa-2x fab fa-uber" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ubuntu">
                                        <div class="iconview "><i class=". fa-2x fab fa-ubuntu" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-uikit">
                                        <div class="iconview "><i class=". fa-2x fab fa-uikit" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-umbrella">
                                        <div class="iconview "><i class=". fa-2x fas fa-umbrella" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-umbrella-beach">
                                        <div class="iconview "><i class=". fa-2x fas fa-umbrella-beach"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-underline">
                                        <div class="iconview "><i class=". fa-2x fas fa-underline" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-undo">
                                        <div class="iconview "><i class=". fa-2x fas fa-undo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-undo-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-undo-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-uniregistry">
                                        <div class="iconview "><i class=". fa-2x fab fa-uniregistry"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-universal-access">
                                        <div class="iconview "><i class=". fa-2x fas fa-universal-access"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-university">
                                        <div class="iconview "><i class=". fa-2x fas fa-university"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-unlink">
                                        <div class="iconview "><i class=". fa-2x fas fa-unlink" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-unlock">
                                        <div class="iconview "><i class=". fa-2x fas fa-unlock" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-unlock-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-unlock-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-untappd">
                                        <div class="iconview "><i class=". fa-2x fab fa-untappd" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-upload">
                                        <div class="iconview "><i class=". fa-2x fas fa-upload" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ups">
                                        <div class="iconview "><i class=". fa-2x fab fa-ups" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-usb">
                                        <div class="iconview "><i class=". fa-2x fab fa-usb" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user">
                                        <div class="iconview "><i class=". fa-2x fas fa-user" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-user">
                                        <div class="iconview "><i class=". fa-2x far fa-user" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-alt" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-alt-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-alt-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-astronaut">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-astronaut"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-check">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-check"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-circle">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-user-circle">
                                        <div class="iconview "><i class=". fa-2x far fa-user-circle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-clock">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-clock"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-cog">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-cog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-edit">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-edit" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-friends">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-friends"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-graduate">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-graduate"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-injured">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-injured"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-lock">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-lock" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-md">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-md" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-minus">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-minus"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-ninja">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-ninja"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-nurse">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-nurse"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-plus">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-plus" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-secret">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-secret"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-shield">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-shield"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-tag">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-tag" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-tie">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-tie" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-user-times">
                                        <div class="iconview "><i class=". fa-2x fas fa-user-times"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-users">
                                        <div class="iconview "><i class=". fa-2x fas fa-users" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-users-cog">
                                        <div class="iconview "><i class=". fa-2x fas fa-users-cog" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-usps">
                                        <div class="iconview "><i class=". fa-2x fab fa-usps" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-ussunnah">
                                        <div class="iconview "><i class=". fa-2x fab fa-ussunnah" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-utensil-spoon">
                                        <div class="iconview "><i class=". fa-2x fas fa-utensil-spoon"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-utensils">
                                        <div class="iconview "><i class=". fa-2x fas fa-utensils" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vaadin">
                                        <div class="iconview "><i class=". fa-2x fab fa-vaadin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-vector-square">
                                        <div class="iconview "><i class=". fa-2x fas fa-vector-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-venus">
                                        <div class="iconview "><i class=". fa-2x fas fa-venus" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-venus-double">
                                        <div class="iconview "><i class=". fa-2x fas fa-venus-double"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-venus-mars">
                                        <div class="iconview "><i class=". fa-2x fas fa-venus-mars"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-viacoin">
                                        <div class="iconview "><i class=". fa-2x fab fa-viacoin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-viadeo">
                                        <div class="iconview "><i class=". fa-2x fab fa-viadeo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-viadeo-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-viadeo-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-vial">
                                        <div class="iconview "><i class=". fa-2x fas fa-vial" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-vials">
                                        <div class="iconview "><i class=". fa-2x fas fa-vials" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-viber">
                                        <div class="iconview "><i class=". fa-2x fab fa-viber" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-video">
                                        <div class="iconview "><i class=". fa-2x fas fa-video" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-video-slash">
                                        <div class="iconview "><i class=". fa-2x fas fa-video-slash"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-vihara">
                                        <div class="iconview "><i class=". fa-2x fas fa-vihara" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vimeo">
                                        <div class="iconview "><i class=". fa-2x fab fa-vimeo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vimeo-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-vimeo-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vimeo-v">
                                        <div class="iconview "><i class=". fa-2x fab fa-vimeo-v" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vine">
                                        <div class="iconview "><i class=". fa-2x fab fa-vine" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vk">
                                        <div class="iconview "><i class=". fa-2x fab fa-vk" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vnv">
                                        <div class="iconview "><i class=". fa-2x fab fa-vnv" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-volleyball-ball">
                                        <div class="iconview "><i class=". fa-2x fas fa-volleyball-ball"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-volume-down">
                                        <div class="iconview "><i class=". fa-2x fas fa-volume-down"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-volume-mute">
                                        <div class="iconview "><i class=". fa-2x fas fa-volume-mute"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-volume-off">
                                        <div class="iconview "><i class=". fa-2x fas fa-volume-off"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-volume-up">
                                        <div class="iconview "><i class=". fa-2x fas fa-volume-up" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-vote-yea">
                                        <div class="iconview "><i class=". fa-2x fas fa-vote-yea" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-vr-cardboard">
                                        <div class="iconview "><i class=". fa-2x fas fa-vr-cardboard"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-vuejs">
                                        <div class="iconview "><i class=". fa-2x fab fa-vuejs" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-walking">
                                        <div class="iconview "><i class=". fa-2x fas fa-walking" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wallet">
                                        <div class="iconview "><i class=". fa-2x fas fa-wallet" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-warehouse">
                                        <div class="iconview "><i class=". fa-2x fas fa-warehouse" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-water">
                                        <div class="iconview "><i class=". fa-2x fas fa-water" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-weebly">
                                        <div class="iconview "><i class=". fa-2x fab fa-weebly" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-weibo">
                                        <div class="iconview "><i class=". fa-2x fab fa-weibo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-weight">
                                        <div class="iconview "><i class=". fa-2x fas fa-weight" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-weight-hanging">
                                        <div class="iconview "><i class=". fa-2x fas fa-weight-hanging"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-weixin">
                                        <div class="iconview "><i class=". fa-2x fab fa-weixin" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-whatsapp">
                                        <div class="iconview "><i class=". fa-2x fab fa-whatsapp" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-whatsapp-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-whatsapp-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wheelchair">
                                        <div class="iconview "><i class=". fa-2x fas fa-wheelchair"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-whmcs">
                                        <div class="iconview "><i class=". fa-2x fab fa-whmcs" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wifi">
                                        <div class="iconview "><i class=". fa-2x fas fa-wifi" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wikipedia-w">
                                        <div class="iconview "><i class=". fa-2x fab fa-wikipedia-w"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wind">
                                        <div class="iconview "><i class=". fa-2x fas fa-wind" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-window-close">
                                        <div class="iconview "><i class=". fa-2x fas fa-window-close"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-window-close">
                                        <div class="iconview "><i class=". fa-2x far fa-window-close"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-window-maximize">
                                        <div class="iconview "><i class=". fa-2x fas fa-window-maximize"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-window-maximize">
                                        <div class="iconview "><i class=". fa-2x far fa-window-maximize"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-window-minimize">
                                        <div class="iconview "><i class=". fa-2x fas fa-window-minimize"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-window-minimize">
                                        <div class="iconview "><i class=". fa-2x far fa-window-minimize"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-window-restore">
                                        <div class="iconview "><i class=". fa-2x fas fa-window-restore"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="far fa-window-restore">
                                        <div class="iconview "><i class=". fa-2x far fa-window-restore"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-windows">
                                        <div class="iconview "><i class=". fa-2x fab fa-windows" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wine-bottle">
                                        <div class="iconview "><i class=". fa-2x fas fa-wine-bottle"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wine-glass">
                                        <div class="iconview "><i class=". fa-2x fas fa-wine-glass"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wine-glass-alt">
                                        <div class="iconview "><i class=". fa-2x fas fa-wine-glass-alt"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wix">
                                        <div class="iconview "><i class=". fa-2x fab fa-wix" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wizards-of-the-coast">
                                        <div class="iconview "><i class=". fa-2x fab fa-wizards-of-the-coast"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wolf-pack-battalion">
                                        <div class="iconview "><i class=". fa-2x fab fa-wolf-pack-battalion"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-won-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-won-sign" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wordpress">
                                        <div class="iconview "><i class=". fa-2x fab fa-wordpress" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wordpress-simple">
                                        <div class="iconview "><i class=". fa-2x fab fa-wordpress-simple"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wpbeginner">
                                        <div class="iconview "><i class=". fa-2x fab fa-wpbeginner"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wpexplorer">
                                        <div class="iconview "><i class=". fa-2x fab fa-wpexplorer"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wpforms">
                                        <div class="iconview "><i class=". fa-2x fab fa-wpforms" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-wpressr">
                                        <div class="iconview "><i class=". fa-2x fab fa-wpressr" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-wrench">
                                        <div class="iconview "><i class=". fa-2x fas fa-wrench" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-x-ray">
                                        <div class="iconview "><i class=". fa-2x fas fa-x-ray" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-xbox">
                                        <div class="iconview "><i class=". fa-2x fab fa-xbox" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-xing">
                                        <div class="iconview "><i class=". fa-2x fab fa-xing" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-xing-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-xing-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-y-combinator">
                                        <div class="iconview "><i class=". fa-2x fab fa-y-combinator"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-yahoo">
                                        <div class="iconview "><i class=". fa-2x fab fa-yahoo" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-yandex">
                                        <div class="iconview "><i class=". fa-2x fab fa-yandex" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-yandex-international">
                                        <div class="iconview "><i class=". fa-2x fab fa-yandex-international"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-yarn">
                                        <div class="iconview "><i class=". fa-2x fab fa-yarn" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-yelp">
                                        <div class="iconview "><i class=". fa-2x fab fa-yelp" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-yen-sign">
                                        <div class="iconview "><i class=". fa-2x fas fa-yen-sign" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fas fa-yin-yang">
                                        <div class="iconview "><i class=". fa-2x fas fa-yin-yang" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-yoast">
                                        <div class="iconview "><i class=". fa-2x fab fa-yoast" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-youtube">
                                        <div class="iconview "><i class=". fa-2x fab fa-youtube" ></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-youtube-square">
                                        <div class="iconview "><i class=". fa-2x fab fa-youtube-square"
                                            ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fab fa-zhihu">
                                        <div class="iconview "><i class=". fa-2x fab fa-zhihu" ></i>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- /#fa-icons -->
                            <!-- glyphicons-->
                            <div class="tab-pane" id="glyphicons">
                                <div class="input-group col-lg-4 ">
                                    <span class="input-group-addon" id="basic-addon1" style="vertical-align:text-top"><i class=". ion ion-ios-search"></i></span>
                                    <input type="text" class="form-control" placeholder="search icon" aria-describedby="basic-addon1" id="search4">
                                </div>

                                <ul class= "pl-0 list-inline">
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-adjust">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-adjust . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-align-center">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-align-center . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-align-justify">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-align-justify . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-align-left">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-align-left . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-align-right">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-align-right . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-arrow-down">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-arrow-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-arrow-left">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-arrow-left . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-arrow-right">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-arrow-right . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-arrow-up">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-arrow-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-asterisk">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-asterisk . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-backward">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-backward . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-ban-circle">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-ban-circle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-barcode">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-barcode . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-bell">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-bell . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-bold">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-bold . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-book">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-book . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-bookmark">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-bookmark . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-briefcase">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-briefcase . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-bullhorn">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-bullhorn . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-calendar">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-calendar . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-camera">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-camera . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-certificate">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-certificate . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-check">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-check . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-chevron-down">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-chevron-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-chevron-left">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-chevron-left . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-chevron-right">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-chevron-right . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-chevron-up">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-chevron-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-circle-arrow-down">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-circle-arrow-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-circle-arrow-left">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-circle-arrow-left . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-circle-arrow-right">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-circle-arrow-right . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-circle-arrow-up">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-circle-arrow-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-cloud">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-cloud . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-cloud-download">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-cloud-download . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-cloud-upload">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-cloud-upload . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-cog">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-cog . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-collapse-down">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-collapse-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-collapse-up">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-collapse-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-comment">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-comment . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-compressed">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-compressed . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-copyright-mark">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-copyright-mark . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-credit-card">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-credit-card . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-cutlery">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-cutlery . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-dashboard">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-dashboard . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-download">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-download . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-download-alt">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-download-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-earphone">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-earphone . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-edit">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-edit . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-eject">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-eject . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-envelope">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-envelope . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-euro">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-euro . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-exclamation-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-exclamation-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-expand">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-expand . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-export">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-export . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-eye-close">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-eye-close . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-eye-open">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-eye-open . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-facetime-video">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-facetime-video . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-fast-backward">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-fast-backward . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-fast-forward">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-fast-forward . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-file">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-file . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-film">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-film . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-filter">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-filter . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-fire">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-fire . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-flag">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-flag . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-flash">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-flash . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-floppy-disk">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-floppy-disk . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-floppy-open">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-floppy-open . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-floppy-remove">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-floppy-remove . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-floppy-save">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-floppy-save . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-floppy-saved">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-floppy-saved . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-folder-close">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-folder-close . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-folder-open">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-folder-open . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-font">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-font . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-forward">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-forward . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-fullscreen">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-fullscreen . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-gbp">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-gbp . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-gift">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-gift . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-glass">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-glass . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-globe">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-globe . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-hand-down">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-hand-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-hand-left">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-hand-left . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-hand-right">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-hand-right . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-hand-up">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-hand-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-hd-video">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-hd-video . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-hdd">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-hdd . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-header">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-header . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-headphones">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-headphones . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-heart">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-heart . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-heart-empty">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-heart-empty . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-home">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-home . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-import">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-import . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-inbox">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-inbox . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-indent-left">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-indent-left . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-indent-right">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-indent-right . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-info-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-info-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-italic">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-italic . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-leaf">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-leaf . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-link">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-link . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-list">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-list . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-list-alt">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-list-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-lock">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-lock . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-log-in">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-log-in . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-log-out">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-log-out . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-magnet">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-magnet . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-map-marker">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-map-marker . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-minus">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-minus . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-minus-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-minus-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-move">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-move . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-music">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-music . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-new-window">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-new-window . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-off">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-off . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-ok">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-ok . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-ok-circle">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-ok-circle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-ok-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-ok-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-open">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-open . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-paperclip">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-paperclip . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-pause">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-pause . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-pencil">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-pencil . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-phone">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-phone . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-phone-alt">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-phone-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-picture">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-picture . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-plane">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-plane . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-play">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-play . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-play-circle">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-play-circle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-plus">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-plus . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-plus-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-plus-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-print">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-print . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-pushpin">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-pushpin . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-qrcode">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-qrcode . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-question-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-question-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-random">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-random . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-record">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-record . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-refresh">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-refresh . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-registration-mark">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-registration-mark . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-remove">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-remove . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-remove-circle">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-remove-circle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-remove-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-remove-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-repeat">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-repeat . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-retweet">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-retweet . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-road">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-road . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-save">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-save . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-saved">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-saved . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-screenshot">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-screenshot . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sd-video">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sd-video . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-search">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-search . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-send">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-send . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-share">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-share . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-share-alt">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-share-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-shopping-cart">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-shopping-cart . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-signal">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-signal . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sort">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sort . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sort-by-alphabet">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sort-by-alphabet . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sort-by-alphabet-alt">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sort-by-alphabet-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sort-by-attributes">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sort-by-attributes . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sort-by-attributes-alt">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sort-by-attributes-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sort-by-order">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sort-by-order . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sort-by-order-alt">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sort-by-order-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sound-5-1">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sound-5-1 . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sound-6-1">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sound-6-1 . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sound-7-1">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sound-7-1 . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sound-dolby">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sound-dolby . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-sound-stereo">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-sound-stereo . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-star">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-star . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-star-empty">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-star-empty . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-stats">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-stats . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-step-backward">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-step-backward . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-step-forward">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-step-forward . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-stop">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-stop . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-subtitles">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-subtitles . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-tag">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-tag . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-tags">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-tags . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-tasks">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-tasks . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-text-height">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-text-height . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-text-width">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-text-width . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-th">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-th . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-th-large">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-th-large . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-th-list">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-th-list . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-thumbs-down">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-thumbs-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-thumbs-up">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-thumbs-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-time">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-time . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-tint">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-tint . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-tower">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-tower . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-transfer">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-transfer . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-trash">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-trash . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-tree-conifer">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-tree-conifer . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-tree-deciduous">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-tree-deciduous . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-unchecked">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-unchecked . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-upload">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-upload . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-usd">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-usd . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-user">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-user . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-volume-down">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-volume-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-volume-off">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-volume-off . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-volume-up">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-volume-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-warning-sign">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-warning-sign . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-wrench">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-wrench . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-zoom-in">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-zoom-in . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="glyphicon-zoom-out">
                                        <div class="iconview ">
                                            <i class="glyphicon glyphicon-zoom-out . fa-2x"></i>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /#glyphicons -->
                            <!--ionicons starts-->
                            <div class="tab-pane" id="ionicons">
                                <div class="tab-pane active" id="fa-icons">
                                    <div class="input-group col-lg-4 center">
                                        <span class="input-group-addon" id="basic-addon1" style="vertical-align:text-top"><i class=". ion ion-ios-search"></i></span>
                                        <input type="text" class="form-control" placeholder="search icon" aria-describedby="basic-addon1" id="search1">
                                    </div>
                                <ul class="pl-0 list-inline">
                                    <ul class="pl-0 list-inline">
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-add-circle-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-add-circle-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-add-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-add-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-add">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-add" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-airplane">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-airplane"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-alarm">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-alarm"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-albums">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-albums"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-alert">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-alert"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-american-football">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-american-football"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-analytics">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-analytics"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-aperture">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-aperture"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-apps">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-apps"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-appstore">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-appstore"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-archive">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-archive"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-back">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-back"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-down">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-down"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropdown-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropdown-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropdown">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropdown"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropleft-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropleft-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropleft">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropleft"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropright-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropright-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropright">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropright"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropup-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropup-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-dropup">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-dropup"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-forward">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-forward"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-round-back">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-round-back"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-round-down">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-round-down"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-round-forward">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-round-forward"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-round-up">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-round-up"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-arrow-up">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-arrow-up"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-at">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-at" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-attach">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-attach"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-backspace">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-backspace"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-barcode">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-barcode"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-baseball">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-baseball"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-basket">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-basket"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-basketball">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-basketball"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-battery-charging">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-battery-charging"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-battery-dead">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-battery-dead"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-battery-full">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-battery-full"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-beaker">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-beaker"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bed">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bed" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-beer">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-beer"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bicycle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bicycle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bluetooth">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bluetooth"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-boat">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-boat"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-body">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-body"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bonfire">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bonfire"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-book">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-book"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bookmark">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bookmark"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bookmarks">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bookmarks"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bowtie">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bowtie"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-briefcase">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-briefcase"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-browsers">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-browsers"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-brush">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-brush"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bug">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bug" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-build">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-build"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bulb">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bulb"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-bus">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-bus" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-business">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-business"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cafe">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cafe"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-calculator">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-calculator"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-calendar">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-calendar"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-call">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-call"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-camera">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-camera"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-car">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-car" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-card">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-card"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cart">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cart"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cash">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cash"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cellular">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cellular"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-chatboxes">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-chatboxes"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-chatbubbles">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-chatbubbles"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-checkbox-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-checkbox-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-checkbox">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-checkbox"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-checkmark-circle-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-checkmark-circle-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-checkmark-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-checkmark-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-checkmark">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-checkmark"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-clipboard">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-clipboard"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-clock">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-clock"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-close-circle-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-close-circle-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-close-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-close-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-close">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-close"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloud-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloud-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloud-done">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloud-done"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloud-download">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloud-download"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloud-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloud-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloud-upload">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloud-upload"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloud">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloud"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloudy-night">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloudy-night"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cloudy">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cloudy"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-code-download">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-code-download"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-code-working">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-code-working"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-code">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-code"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cog">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cog" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-color-fill">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-color-fill"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-color-filter">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-color-filter"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-color-palette">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-color-palette"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-color-wand">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-color-wand"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-compass">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-compass"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-construct">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-construct"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-contact">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-contact"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-contacts">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-contacts"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-contract">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-contract"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-contrast">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-contrast"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-copy">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-copy"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-create">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-create"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-crop">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-crop"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cube">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cube"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-cut">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-cut" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-desktop">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-desktop"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-disc">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-disc"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-document">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-document"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-done-all">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-done-all"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-download">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-download"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-easel">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-easel"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-egg">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-egg" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-exit">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-exit"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-expand">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-expand"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-eye-off">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-eye-off"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-eye">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-eye" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-fastforward">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-fastforward"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-female">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-female"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-filing">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-filing"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-film">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-film"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-finger-print">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-finger-print"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-fitness">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-fitness"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-flag">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-flag"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-flame">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-flame"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-flash-off">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-flash-off"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-flash">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-flash"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-flashlight">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-flashlight"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-flask">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-flask"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-flower">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-flower"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-folder-open">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-folder-open"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-folder">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-folder"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-football">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-football"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-funnel">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-funnel"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-gift">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-gift"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-git-branch">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-git-branch"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-git-commit">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-git-commit"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-git-compare">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-git-compare"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-git-merge">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-git-merge"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-git-network">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-git-network"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-git-pull-request">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-git-pull-request"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-glasses">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-glasses"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-globe">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-globe"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-grid">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-grid"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-hammer">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-hammer"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-hand">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-hand"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-happy">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-happy"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-headset">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-headset"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-heart">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-heart"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-heart-dislike">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-heart-dislike"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-heart-empty">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-heart-empty"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-heart-half">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-heart-half"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-help-buoy">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-help-buoy"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-help-circle-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-help-circle-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-help-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-help-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-help">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-help"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-home">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-home"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-hourglass">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-hourglass"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-ice-cream">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-ice-cream"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-image">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-image"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-images">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-images"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-infinite">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-infinite"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-information-circle-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-information-circle-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-information-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-information-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-information">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-information"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-jet">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-jet" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-journal">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-journal"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-key">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-key" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-keypad">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-keypad"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-laptop">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-laptop"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-leaf">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-leaf"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-link">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-link"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-list-box">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-list-box"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-list">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-list"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-locate">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-locate"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-lock">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-lock"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-log-in">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-log-in"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-log-out">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-log-out"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-magnet">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-magnet"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-mail-open">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-mail-open"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-mail-unread">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-mail-unread"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-mail">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-mail"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-male">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-male"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-man">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-man" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-map">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-map" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-medal">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-medal"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-medical">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-medical"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-medkit">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-medkit"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-megaphone">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-megaphone"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-menu">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-menu"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-mic-off">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-mic-off"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-mic">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-mic" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-microphone">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-microphone"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-moon">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-moon"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-more">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-more"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-move">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-move"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-musical-note">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-musical-note"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-musical-notes">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-musical-notes"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-navigate">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-navigate"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-notifications-off">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-notifications-off"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-notifications-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-notifications-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-notifications">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-notifications"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-nuclear">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-nuclear"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-nutrition">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-nutrition"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-open">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-open"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-options">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-options"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-outlet">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-outlet"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-paper-plane">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-paper-plane"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-paper">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-paper"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-partly-sunny">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-partly-sunny"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pause">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pause"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-paw">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-paw" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-people">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-people"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-person-add">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-person-add"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-person">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-person"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-phone-landscape">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-phone-landscape"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-phone-portrait">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-phone-portrait"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-photos">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-photos"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pie">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pie" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pin">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pin" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pint">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pint"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pizza">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pizza"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-planet">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-planet"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-play-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-play-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-play">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-play"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-podium">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-podium"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-power">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-power"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pricetag">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pricetag"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pricetags">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pricetags"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-print">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-print"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-pulse">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-pulse"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-qr-scanner">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-qr-scanner"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-quote">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-quote"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-radio-button-off">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-radio-button-off"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-radio-button-on">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-radio-button-on"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-radio">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-radio"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-rainy">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-rainy"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-recording">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-recording"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-redo">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-redo"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-refresh-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-refresh-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-refresh">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-refresh"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-remove-circle-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-remove-circle-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-remove-circle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-remove-circle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-remove">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-remove"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-reorder">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-reorder"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-repeat">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-repeat"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-re. fa-2x">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-re. fa-2x"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-restaurant">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-restaurant"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-return-left">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-return-left"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-return-right">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-return-right"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-reverse-camera">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-reverse-camera"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-rewind">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-rewind"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-ribbon">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-ribbon"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-rocket">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-rocket"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-rose">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-rose"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-sad">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-sad" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-save">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-save"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-school">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-school"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-search">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-search"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-send">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-send"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-settings">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-settings"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-share-alt">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-share-alt"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-share">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-share"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-shirt">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-shirt"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-shuffle">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-shuffle"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-skip-backward">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-skip-backward"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-skip-forward">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-skip-forward"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-snow">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-snow"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-speedometer">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-speedometer"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-square-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-square-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-square">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-square"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-star-half">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-star-half"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-star-outline">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-star-outline"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-star">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-star"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-stats">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-stats"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-stopwatch">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-stopwatch"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-subway">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-subway"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-sunny">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-sunny"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-swap">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-swap"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-switch">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-switch"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-sync">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-sync"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-tablet-landscape">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-tablet-landscape"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-tablet-portrait">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-tablet-portrait"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-tennisball">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-tennisball"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-text">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-text"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-thermometer">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-thermometer"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-thumbs-down">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-thumbs-down"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-thumbs-up">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-thumbs-up"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-thunderstorm">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-thunderstorm"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-time">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-time"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-timer">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-timer"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-today">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-today"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-train">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-train"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-transgender">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-transgender"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-trash">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-trash"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-trending-down">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-trending-down"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-trending-up">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-trending-up"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-trophy">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-trophy"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-tv">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-tv" ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-umbrella">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-umbrella"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-undo">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-undo"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-unlock">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-unlock"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-videocam">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-videocam"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-volume-high">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-volume-high"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-volume-low">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-volume-low"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-volume-mute">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-volume-mute"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-volume-off">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-volume-off"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-wallet">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-wallet"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-walk">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-walk"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-warning">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-warning"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-watch">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-watch"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-water">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-water"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-wifi">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-wifi"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-wine">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-wine"
                                                ></i>
                                            </div>
                                        </li>
                                        <li class="list-inline-item  clr " data-toggle="tooltip"
                                            data-original-title="ion ion-md-woman">
                                        <div class="iconview "><i class=". fa-2x ion ion-md-woman"
                                                ></i>
                                            </div>
                                        </li>
                                    </ul>


                                </ul>
                            </div>
                            </div>
                            <!--ionicons ends-->
                            <!--lineicons starts-->
                            <div class="tab-pane" id="lineicons">
                                    <div class="input-group col-lg-4  center">
                                        <span class="input-group-addon" id="basic-addon1" style="vertical-align:text-top"><i class=". ion ion-ios-search"></i></span>
                                        <input type="text" class="form-control" placeholder="search icon" aria-describedby="basic-addon1" id="search2">
                                    </div>
                                <ul class="pl-0 list-inline">
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-user">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-user" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-user-female">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-user-female" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-people">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-people" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-user-follow">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-user-follow" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-user-following">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-user-following" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-user-unfollow">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-user-unfollow" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-trophy">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-trophy" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-speedometer">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-speedometer" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-social-youtube">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-social-youtube" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-social-twitter">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-social-twitter" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-social-tumblr">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-social-tumblr" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-social-facebook">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-social-facebook" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-social-dropbox">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-social-dropbox" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-social-dribbble">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-social-dribbble" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-shield">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-shield" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-screen-tablet">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-screen-tablet" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-screen-smartphone">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-screen-smartphone" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-screen-desktop">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-screen-desktop" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-plane">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-plane" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-notebook">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-notebook" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-mouse">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-mouse" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-magnet">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-magnet" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-magic-wand">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-magic-wand" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-hourglass">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-hourglass" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-graduation">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-graduation" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-ghost">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-ghost" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-game-controller">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-game-controller" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-fire">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-fire" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-envelope-open">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-envelope-open" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-envelope-letter">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-envelope-letter" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-energy">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-energy" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-disc">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-disc" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-cursor-move">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-cursor-move" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-crop">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-crop" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-credit-card">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-credit-card" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-chemistry">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-chemistry" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-bell">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-bell" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-badge">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-badge" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-anchor">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-anchor" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-action-redo">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-action-redo" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-action-undo">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-action-undo" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-bag">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-bag" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-basket">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-basket" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-basket-loaded">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-basket-loaded" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-book-open">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-book-open" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-briefcase">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-briefcase" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-bubbles">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-bubbles" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-calculator">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-calculator" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-call-end">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-call-end" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-call-in">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-call-in" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-call-out">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-call-out" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-compass">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-compass" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-cup">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-cup" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-diamond">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-diamond" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-direction">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-direction" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-directions">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-directions" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-docs">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-docs" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-drawer">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-drawer" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-drop">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-drop" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-earphones">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-earphones" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-earphones-alt">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-earphones-alt" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-feed">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-feed" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-film">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-film" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-folder-alt">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-folder-alt" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-frame">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-frame" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-globe">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-globe" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-globe-alt">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-globe-alt" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-handbag">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-handbag" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-layers">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-layers" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-map">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-map" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-picture">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-picture" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-pin">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-pin" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-playlist">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-playlist" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-present">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-present" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-printer">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-printer" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-puzzle">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-puzzle" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-speech">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-speech" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-vector">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-vector" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-wallet">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-wallet" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-arrow-down">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-arrow-down" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-arrow-left">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-arrow-left" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-arrow-right">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-arrow-right" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-arrow-up">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-arrow-up" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-bulb">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-bulb" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-calendar">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-calendar" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-control-end">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-control-end" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-control-forward">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-control-forward" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-control-pause">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-control-pause" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-control-play">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-control-play" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-control-rewind">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-control-rewind" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-control-start">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-control-start" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-cursor">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-cursor" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-dislike">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-dislike" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-equalizer">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-equalizer" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-graph">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-graph" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-grid">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-grid" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-home">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-home" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-like">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-like" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-list">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-list" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-login">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-login" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-logout">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-logout" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-loop">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-loop" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-microphone">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-microphone" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-music-tone">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-music-tone" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-music-tone-alt">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-music-tone-alt" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-note">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-note" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-pencil">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-pencil" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-pie-chart">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-pie-chart" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-question">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-question" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-rocket">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-rocket" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-share">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-share" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-share-alt">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-share-alt" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-shuffle">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-shuffle" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-. fa-2x-actual">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-. fa-2x-actual" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-. fa-2x-fullscreen">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-. fa-2x-fullscreen" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-support">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-support" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-tag">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-tag" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-trash">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-trash" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-umbrella">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-umbrella" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-wrench">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-wrench" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-ban">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-ban" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-bubble">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-bubble" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-camera">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-camera" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-check">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-check" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-clock">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-clock" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-close">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-close" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-cloud-download">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-cloud-download" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-cloud-upload">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-cloud-upload" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-doc">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-doc" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-envelope">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-envelope" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-eye">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-eye" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-flag">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-flag" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-folder">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-folder" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-heart">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-heart" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-info">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-info" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-key">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-key" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-link">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-link" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-lock">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-lock" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-lock-open">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-lock-open" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-magnifier">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-magnifier" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-magnifier-add">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-magnifier-add" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-magnifier-remove">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-magnifier-remove" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-paper-clip">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-paper-clip" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-paper-plane">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-paper-plane" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-plus">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-plus" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-power">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-power" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-refresh">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-refresh" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-reload">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-reload" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-settings">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-settings" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-star">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-star" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-symbol-female">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-symbol-female" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-symbol-male">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-symbol-male" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-target">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-target" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-volume-1">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-volume-1" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-volume-2">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-volume-2" ></i></div>
                                    </li>
                                    <li class="list-inline-item  clr " data-toggle="tooltip"
                                        data-original-title="icon-volume-off">

                                        <div class="iconview ">
                                            <i class=". fa-2x icon-volume-off" ></i></div>
                                    </li>
                                </ul>
                            </div>
                            <!--lineicons ends-->
                            <!--material icons starts-->
                            <div class="tab-pane" id="material">
                                <div class="input-group col-lg-4  center">
                                    <span class="input-group-addon" id="basic-addon1" style="vertical-align:text-top"><i class=". ion ion-ios-search"></i></span>
                                    <input type="text" class="form-control" placeholder="search icon" aria-describedby="basic-addon1" id="search3">
                                </div>
                                <ul class="pl-0 list-inline">

                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-3d-rotation">
                                        <div class="iconview ">
                                            <i class="mdi mdi-3d-rotation . fa-2x"></i>
                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-accessibility">
                                        <div class="iconview ">
                                            <i class="mdi mdi-accessibility . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-accessible">
                                        <div class="iconview ">
                                            <i class="mdi mdi-accessible . fa-2x"></i>

                                        </div>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-account-balance">
                                        <div class="iconview ">
                                            <i class="mdi mdi-account-balance . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-account-balance-wallet">
                                        <div class="iconview ">
                                            <i class="mdi mdi-account-balance-wallet . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-account-box">
                                        <div class="iconview ">
                                            <i class="mdi mdi-account-box . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-account-circle">
                                        <div class="iconview ">
                                            <i class="mdi mdi-account-circle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-add-shopping-cart">
                                        <div class="iconview ">
                                            <i class="mdi mdi-add-shopping-cart . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-alarm">
                                        <div class="iconview ">
                                            <i class="mdi mdi-alarm . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-alarm-add">
                                        <div class="iconview ">
                                            <i class="mdi mdi-alarm-add . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-alarm-off">
                                        <div class="iconview ">
                                            <i class="mdi mdi-alarm-off . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-alarm-on">
                                        <div class="iconview ">
                                            <i class="mdi mdi-alarm-on . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-all-out">
                                        <div class="iconview ">
                                            <i class="mdi mdi-all-out . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-android">
                                        <div class="iconview ">
                                            <i class="mdi mdi-android . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-announcement">
                                        <div class="iconview ">
                                            <i class="mdi mdi-announcement . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-aspect-ratio">
                                        <div class="iconview ">
                                            <i class="mdi mdi-aspect-ratio . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-assessment">
                                        <div class="iconview ">
                                            <i class="mdi mdi-assessment . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-assignment">
                                        <div class="iconview ">
                                            <i class="mdi mdi-assignment . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-assignment-ind">
                                        <div class="iconview ">
                                            <i class="mdi mdi-assignment-ind . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-assignment-late">
                                        <div class="iconview ">
                                            <i class="mdi mdi-assignment-late . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-assignment-return">
                                        <div class="iconview ">
                                            <i class="mdi mdi-assignment-return . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-assignment-returned">
                                        <div class="iconview ">
                                            <i class="mdi mdi-assignment-returned . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-assignment-turned-in">
                                        <div class="iconview ">
                                            <i class="mdi mdi-assignment-turned-in . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-autorenew">
                                        <div class="iconview ">
                                            <i class="mdi mdi-autorenew . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-backup">
                                        <div class="iconview ">
                                            <i class="mdi mdi-backup . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-book">
                                        <div class="iconview ">
                                            <i class="mdi mdi-book . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-bookmark">
                                        <div class="iconview ">
                                            <i class="mdi mdi-bookmark . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-bookmark-border">
                                        <div class="iconview ">
                                            <i class="mdi mdi-bookmark-border . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-bug-report">
                                        <div class="iconview ">
                                            <i class="mdi mdi-bug-report . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-build">
                                        <div class="iconview ">
                                            <i class="mdi mdi-build . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-cached">
                                        <div class="iconview ">
                                            <i class="mdi mdi-cached . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-camera-enhance">
                                        <div class="iconview ">
                                            <i class="mdi mdi-camera-enhance . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-card-giftcard">
                                        <div class="iconview ">
                                            <i class="mdi mdi-card-giftcard . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-card-membership">
                                        <div class="iconview ">
                                            <i class="mdi mdi-card-membership . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-card-travel">
                                        <div class="iconview ">
                                            <i class="mdi mdi-card-travel . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-change-history">
                                        <div class="iconview ">
                                            <i class="mdi mdi-change-history . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-check-circle">
                                        <div class="iconview ">
                                            <i class="mdi mdi-check-circle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-chrome-reader-mode">
                                        <div class="iconview ">
                                            <i class="mdi mdi-chrome-reader-mode . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-class">
                                        <div class="iconview ">
                                            <i class="mdi mdi-class . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-code">
                                        <div class="iconview ">
                                            <i class="mdi mdi-code . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-compare-arrows">
                                        <div class="iconview ">
                                            <i class="mdi mdi-compare-arrows . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-copyright">
                                        <div class="iconview ">
                                            <i class="mdi mdi-copyright . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-credit-card">
                                        <div class="iconview ">
                                            <i class="mdi mdi-credit-card . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-dashboard">
                                        <div class="iconview ">
                                            <i class="mdi mdi-dashboard . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-date-range">
                                        <div class="iconview ">
                                            <i class="mdi mdi-date-range . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-delete">
                                        <div class="iconview ">
                                            <i class="mdi mdi-delete . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fa-youtube-square">
                                        <div class="iconview ">

                                            <div class="new-badge">New</div>

                                            <i class="mdi mdi-delete-forever . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-description">
                                        <div class="iconview ">
                                            <i class="mdi mdi-description . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-dns">
                                        <div class="iconview ">
                                            <i class="mdi mdi-dns . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-done">
                                        <div class="iconview ">
                                            <i class="mdi mdi-done . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-done-all">
                                        <div class="iconview ">
                                            <i class="mdi mdi-done-all . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-donut-large">
                                        <div class="iconview ">
                                            <i class="mdi mdi-donut-large . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-donut-small">
                                        <div class="iconview ">
                                            <i class="mdi mdi-donut-small . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-eject">
                                        <div class="iconview ">
                                            <i class="mdi mdi-eject . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fa-youtube-square">
                                        <div class="iconview ">

                                            <div class="new-badge">New</div>

                                            <i class="mdi mdi-euro-symbol . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-event">
                                        <div class="iconview ">
                                            <i class="mdi mdi-event . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-event-seat">
                                        <div class="iconview ">
                                            <i class="mdi mdi-event-seat . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-exit-to-app">
                                        <div class="iconview ">
                                            <i class="mdi mdi-exit-to-app . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-explore">
                                        <div class="iconview ">
                                            <i class="mdi mdi-explore . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-extension">
                                        <div class="iconview ">
                                            <i class="mdi mdi-extension . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-face">
                                        <div class="iconview ">
                                            <i class="mdi mdi-face . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-favorite">
                                        <div class="iconview ">
                                            <i class="mdi mdi-favorite . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-favorite-border">
                                        <div class="iconview ">
                                            <i class="mdi mdi-favorite-border . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-feedback">
                                        <div class="iconview ">
                                            <i class="mdi mdi-feedback . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-find-in-page">
                                        <div class="iconview ">
                                            <i class="mdi mdi-find-in-page . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-find-replace">
                                        <div class="iconview ">
                                            <i class="mdi mdi-find-replace . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-fingerprint">
                                        <div class="iconview ">
                                            <i class="mdi mdi-fingerprint . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-flight-land">
                                        <div class="iconview ">
                                            <i class="mdi mdi-flight-land . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-flight-takeoff">
                                        <div class="iconview ">
                                            <i class="mdi mdi-flight-takeoff . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-flip-to-back">
                                        <div class="iconview ">
                                            <i class="mdi mdi-flip-to-back . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-flip-to-front">
                                        <div class="iconview ">
                                            <i class="mdi mdi-flip-to-front . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fa-youtube-square">
                                        <div class="iconview ">

                                            <div class="new-badge">New</div>

                                            <i class="mdi mdi-g-translate . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-gavel">
                                        <div class="iconview ">
                                            <i class="mdi mdi-gavel . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-get-app">
                                        <div class="iconview ">
                                            <i class="mdi mdi-get-app . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-gif">
                                        <div class="iconview ">
                                            <i class="mdi mdi-gif . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-grade">
                                        <div class="iconview ">
                                            <i class="mdi mdi-grade . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-group-work">
                                        <div class="iconview ">
                                            <i class="mdi mdi-group-work . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-help">
                                        <div class="iconview ">
                                            <i class="mdi mdi-help . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-help-outline">
                                        <div class="iconview ">
                                            <i class="mdi mdi-help-outline . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-highlight-off">
                                        <div class="iconview ">
                                            <i class="mdi mdi-highlight-off . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-history">
                                        <div class="iconview ">
                                            <i class="mdi mdi-history . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-home">
                                        <div class="iconview ">
                                            <i class="mdi mdi-home . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-hourglass-empty">
                                        <div class="iconview ">
                                            <i class="mdi mdi-hourglass-empty . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-hourglass-full">
                                        <div class="iconview ">
                                            <i class="mdi mdi-hourglass-full . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-http">
                                        <div class="iconview ">
                                            <i class="mdi mdi-http . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-https">
                                        <div class="iconview ">
                                            <i class="mdi mdi-https . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-important-devices">
                                        <div class="iconview ">
                                            <i class="mdi mdi-important-devices . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-info">
                                        <div class="iconview ">
                                            <i class="mdi mdi-info . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-info-outline">
                                        <div class="iconview ">
                                            <i class="mdi mdi-info-outline . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-input">
                                        <div class="iconview ">
                                            <i class="mdi mdi-input . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-invert-colors">
                                        <div class="iconview ">
                                            <i class="mdi mdi-invert-colors . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-label">
                                        <div class="iconview ">
                                            <i class="mdi mdi-label . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-label-outline">
                                        <div class="iconview ">
                                            <i class="mdi mdi-label-outline . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-language">
                                        <div class="iconview ">
                                            <i class="mdi mdi-language . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-launch">
                                        <div class="iconview ">
                                            <i class="mdi mdi-launch . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-lightbulb-outline">
                                        <div class="iconview ">
                                            <i class="mdi mdi-lightbulb-outline . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-line-style">
                                        <div class="iconview ">
                                            <i class="mdi mdi-line-style . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-line-weight">
                                        <div class="iconview ">
                                            <i class="mdi mdi-line-weight . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-list">
                                        <div class="iconview ">
                                            <i class="mdi mdi-list . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-lock">
                                        <div class="iconview ">
                                            <i class="mdi mdi-lock . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-lock-open">
                                        <div class="iconview ">
                                            <i class="mdi mdi-lock-open . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-lock-outline">
                                        <div class="iconview ">
                                            <i class="mdi mdi-lock-outline . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-loyalty">
                                        <div class="iconview ">
                                            <i class="mdi mdi-loyalty . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-markunread-mailbox">
                                        <div class="iconview ">
                                            <i class="mdi mdi-markunread-mailbox . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-motorcycle">
                                        <div class="iconview ">
                                            <i class="mdi mdi-motorcycle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-note-add">
                                        <div class="iconview ">
                                            <i class="mdi mdi-note-add . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-offline-pin">
                                        <div class="iconview ">
                                            <i class="mdi mdi-offline-pin . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-opacity">
                                        <div class="iconview ">
                                            <i class="mdi mdi-opacity . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-open-in-browser">
                                        <div class="iconview ">
                                            <i class="mdi mdi-open-in-browser . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-open-in-new">
                                        <div class="iconview ">
                                            <i class="mdi mdi-open-in-new . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-open-with">
                                        <div class="iconview ">
                                            <i class="mdi mdi-open-with . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-pageview">
                                        <div class="iconview ">
                                            <i class="mdi mdi-pageview . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-pan-tool">
                                        <div class="iconview ">
                                            <i class="mdi mdi-pan-tool . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-payment">
                                        <div class="iconview ">
                                            <i class="mdi mdi-payment . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-camera-mic">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-camera-mic . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-contact-calendar">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-contact-calendar . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-data-setting">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-data-setting . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-device-information">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-device-information . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-identity">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-identity . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-media">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-media . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-phone-msg">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-phone-msg . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-perm-scan-wifi">
                                        <div class="iconview ">
                                            <i class="mdi mdi-perm-scan-wifi . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-pets">
                                        <div class="iconview ">
                                            <i class="mdi mdi-pets . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-picture-in-picture">
                                        <div class="iconview ">
                                            <i class="mdi mdi-picture-in-picture . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-picture-in-picture-alt">
                                        <div class="iconview ">
                                            <i class="mdi mdi-picture-in-picture-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-play-for-work">
                                        <div class="iconview ">
                                            <i class="mdi mdi-play-for-work . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-polymer">
                                        <div class="iconview ">
                                            <i class="mdi mdi-polymer . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-power-settings-new">
                                        <div class="iconview ">
                                            <i class="mdi mdi-power-settings-new . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-pregnant-woman">
                                        <div class="iconview ">
                                            <i class="mdi mdi-pregnant-woman . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-print">
                                        <div class="iconview ">
                                            <i class="mdi mdi-print . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-query-builder">
                                        <div class="iconview ">
                                            <i class="mdi mdi-query-builder . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-question-answer">
                                        <div class="iconview ">
                                            <i class="mdi mdi-question-answer . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-receipt">
                                        <div class="iconview ">
                                            <i class="mdi mdi-receipt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-record-voice-over">
                                        <div class="iconview ">
                                            <i class="mdi mdi-record-voice-over . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-redeem">
                                        <div class="iconview ">
                                            <i class="mdi mdi-redeem . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fa-youtube-square">
                                        <div class="iconview ">

                                            <div class="new-badge">New</div>

                                            <i class="mdi mdi-remove-shopping-cart . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-reorder">
                                        <div class="iconview ">
                                            <i class="mdi mdi-reorder . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-report-problem">
                                        <div class="iconview ">
                                            <i class="mdi mdi-report-problem . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-restore">
                                        <div class="iconview ">
                                            <i class="mdi mdi-restore . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fa-youtube-square">
                                        <div class="iconview ">

                                            <div class="new-badge">New</div>

                                            <i class="mdi mdi-restore-page . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-room">
                                        <div class="iconview ">
                                            <i class="mdi mdi-room . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-rounded-corner">
                                        <div class="iconview ">
                                            <i class="mdi mdi-rounded-corner . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-rowing">
                                        <div class="iconview ">
                                            <i class="mdi mdi-rowing . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-schedule">
                                        <div class="iconview ">
                                            <i class="mdi mdi-schedule . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-search">
                                        <div class="iconview ">
                                            <i class="mdi mdi-search . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-applications">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-applications . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-backup-restore">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-backup-restore . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-bluetooth">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-bluetooth . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-brightness">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-brightness . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-cell">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-cell . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-ethernet">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-ethernet . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-input-antenna">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-input-antenna . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-input-component">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-input-component . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-input-composite">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-input-composite . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-input-hdmi">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-input-hdmi . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-input-svideo">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-input-svideo . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-overscan">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-overscan . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-phone">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-phone . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-power">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-power . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-remote">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-remote . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-settings-voice">
                                        <div class="iconview ">
                                            <i class="mdi mdi-settings-voice . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-shop">
                                        <div class="iconview ">
                                            <i class="mdi mdi-shop . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-shop-two">
                                        <div class="iconview ">
                                            <i class="mdi mdi-shop-two . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-shopping-basket">
                                        <div class="iconview ">
                                            <i class="mdi mdi-shopping-basket . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-shopping-cart">
                                        <div class="iconview ">
                                            <i class="mdi mdi-shopping-cart . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-speaker-notes">
                                        <div class="iconview ">
                                            <i class="mdi mdi-speaker-notes . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="fa-youtube-square">
                                        <div class="iconview ">

                                            <div class="new-badge">New</div>

                                            <i class="mdi mdi-speaker-notes-off . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-spellcheck">
                                        <div class="iconview ">
                                            <i class="mdi mdi-spellcheck . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-stars">
                                        <div class="iconview ">
                                            <i class="mdi mdi-stars . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-store">
                                        <div class="iconview ">
                                            <i class="mdi mdi-store . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-subject">
                                        <div class="iconview ">
                                            <i class="mdi mdi-subject . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-supervisor-account">
                                        <div class="iconview ">
                                            <i class="mdi mdi-supervisor-account . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-swap-horiz">
                                        <div class="iconview ">
                                            <i class="mdi mdi-swap-horiz . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-swap-vert">
                                        <div class="iconview ">
                                            <i class="mdi mdi-swap-vert . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-swap-vertical-circle">
                                        <div class="iconview ">
                                            <i class="mdi mdi-swap-vertical-circle . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-system-update-alt">
                                        <div class="iconview ">
                                            <i class="mdi mdi-system-update-alt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-tab">
                                        <div class="iconview ">
                                            <i class="mdi mdi-tab . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-tab-unselected">
                                        <div class="iconview ">
                                            <i class="mdi mdi-tab-unselected . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-theaters">
                                        <div class="iconview ">
                                            <i class="mdi mdi-theaters . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-thumb-down">
                                        <div class="iconview ">
                                            <i class="mdi mdi-thumb-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-thumb-up">
                                        <div class="iconview ">
                                            <i class="mdi mdi-thumb-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-thumbs-up-down">
                                        <div class="iconview ">
                                            <i class="mdi mdi-thumbs-up-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-timeline">
                                        <div class="iconview ">
                                            <i class="mdi mdi-timeline . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-toc">
                                        <div class="iconview ">
                                            <i class="mdi mdi-toc . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-today">
                                        <div class="iconview ">
                                            <i class="mdi mdi-today . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-toll">
                                        <div class="iconview ">
                                            <i class="mdi mdi-toll . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-touch-app">
                                        <div class="iconview ">
                                            <i class="mdi mdi-touch-app . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-track-changes">
                                        <div class="iconview ">
                                            <i class="mdi mdi-track-changes . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-translate">
                                        <div class="iconview ">
                                            <i class="mdi mdi-translate . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-trending-down">
                                        <div class="iconview ">
                                            <i class="mdi mdi-trending-down . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-trending-flat">
                                        <div class="iconview ">
                                            <i class="mdi mdi-trending-flat . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-trending-up">
                                        <div class="iconview ">
                                            <i class="mdi mdi-trending-up . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-turned-in">
                                        <div class="iconview ">
                                            <i class="mdi mdi-turned-in . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-turned-in-not">
                                        <div class="iconview ">
                                            <i class="mdi mdi-turned-in-not . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-update">
                                        <div class="iconview ">
                                            <i class="mdi mdi-update . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-verified-user">
                                        <div class="iconview ">
                                            <i class="mdi mdi-verified-user . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-agenda">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-agenda . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-array">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-array . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-carousel">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-carousel . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-column">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-column . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-day">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-day . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-headline">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-headline . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-list">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-list . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-module">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-module . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-quilt">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-quilt . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-stream">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-stream . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-view-week">
                                        <div class="iconview ">
                                            <i class="mdi mdi-view-week . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-visibility">
                                        <div class="iconview ">
                                            <i class="mdi mdi-visibility . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-visibility-off">
                                        <div class="iconview ">
                                            <i class="mdi mdi-visibility-off . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-watch-later">
                                        <div class="iconview ">
                                            <i class="mdi mdi-watch-later . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-work">
                                        <div class="iconview ">
                                            <i class="mdi mdi-work . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-youtube-searched-for">
                                        <div class="iconview ">
                                            <i class="mdi mdi-youtube-searched-for . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-zoom-in">
                                        <div class="iconview ">
                                            <i class="mdi mdi-zoom-in . fa-2x"></i>

                                        </div>
                                    </li>
                                    <li class="list-inline-item  clr" data-toggle="tooltip"
                                        data-original-title="mdi-zoom-out">
                                        <div class="iconview ">
                                            <i class="mdi mdi-zoom-out . fa-2x"></i>

                                        </div>
                                    </li>
                                </ul>

                            </div>
                            <!--material ends-->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
    <!--main content ends-->
</section>
<!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/js/pages/icons.js') }}"></script>
@stop