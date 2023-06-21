@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Sliders
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/vendors/ion.rangeslider/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/ion.rangeslider/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-slider/css/bootstrap-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/materialsliders/css/base.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/materialsliders/css/prism.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/materialsliders/css/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/pages/ion.css') }}" />
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Sliders</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="material-icons breadmaterial">home</i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">UI Components</a>
                    </li>
                    <li class="active">Sliders</li>
                </ol>
            </section>
            <!--section ends-->
<section class="content">
    <!--main content-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">tune</i> Ion Range Sliders
                    </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                </div>
                <div class="panel-body" id="slim1">
                    <!--ion-->
                    <div class="row">
                        <form role="form" class="form-horizontal form-bordered">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Basic Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_1" class="form-control" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Money Range</label>
                                    <div class="col-md-10">
                                        <input id="example_2" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Gold Range</label>
                                    <div class="col-md-10">
                                        <input id="example_3" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Temperature Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_4" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Month Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_5" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Year Range</label>
                                    <div class="col-md-10">
                                        <input id="example_6" type="text" name="" value="" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Year Slider</label>
                                    <div class="col-md-10">
                                        <input id="example_7" type="text" name="" value="" />
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!--ion ends-->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">tune</i> Bootstrap Sliders
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body" id="slim2">
                    <!--slider-->
                    <div class="row">
                        <form role="form" class="form-horizontal form-bordered">
                            <div class="form-body">
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Basic Slider</label>
                                    <div class="col-md-10">
                                        <input id="ex1" data-slider-id='ex1Slider' type="text" class="slider-handle min-slider-handle round"  data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Money Range</label>
                                    <div class="col-md-10"> <b>€ 10</b>
                                         <input id="ex2" data-slider-id='ex2Slider' type="text" class="span2" value="" data-slider-min="10" data-slider-max="1000" data-slider-step="5" data-slider-value="[250,450]"/>
                                        <b class="slider-padding">€ 1000</b>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Color Range</label>
                                    <div class="col-md-10">
                                        <div class="well">
                                            <p>
                                                <b>R</b>
                                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="RC" id="R" data-slider-tooltip="hide" data-slider-handle="square" />
                                            </p>
                                            <p>
                                                <b>G</b>
                                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="GC" id="G" data-slider-tooltip="hide" data-slider-handle="round" />
                                            </p>
                                            <p>
                                                <b>B</b>
                                                <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="255" data-slider-step="1" data-slider-value="128" data-slider-id="BC" id="B" data-slider-tooltip="hide" data-slider-handle="triangle" />
                                            </p>
                                            <div id="ex3"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Vertical Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex4"  data-slider-id='ex3Slider'type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="-3" data-slider-orientation="vertical"  data-slider-reversed="true" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Destroy</label>
                                        <div class="col-md-10">
                                            <input id="ex5" data-slider-id='ex4Slider' type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="0"/>
                                            <button type="button" id="destroyEx5Slider" class='btn btn-danger'>Click to Destroy</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Current Range</label>
                                        <div class="col-md-10">
                                            <input id="ex6" data-slider-id='ex5Slider' type="text" data-slider-min="-5" data-slider-max="20" data-slider-step="1" data-slider-value="3"/>
                                            <span id="ex6CurrentSliderValLabel">
                                                Current Slider Value:
                                                <span id="ex6SliderVal">3</span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label" id="slider_enabled">Disable Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex7" type="text" data-slider-id='ex6Slider'data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="5" data-slider-enabled="false"/>
                                            <input id="ex7-enabled" type="checkbox" class="slider-padding" /> <span id="enable_text">Enabled</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Tooltip Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex8" data-slider-id='ex7Slider' type="text" data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="14"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Step Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex9" type="text" data-slider-handle="custom"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Marks and Lables</label>
                                        <div class="col-md-10 ">
                                            <input id="ex10"  data-slider-id='ex8Slider' type="text" data-slider-ticks="[0, 100, 200, 300, 400]" data-slider-ticks-snap-bounds="30" data-slider-ticks-labels='["$0", "$100", "$200", "$300", "$400"]' data-slider-ticks-positions="[0, 30, 60, 80, 100]" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Hidden Slider</label>
                                        <div class="col-md-10 ">
                                            <a class="btn btn-primary" href="" id="ex20a">Show</a>
                                            <div class="well" style="display:none">
                                                <span id="ex18-label-1" class="hidden">Example slider label</span>
                                                <input id="ex11" type="text"
                                                       data-provide="slider"
                                                       data-slider-ticks="[1, 2, 3]"
                                                       data-slider-ticks-labels='["short", "medium", "long"]'
                                                       data-slider-min="1"
                                                       data-slider-max="3"
                                                       data-slider-step="1"
                                                       data-slider-value="3"
                                                       data-slider-id='ex9Slider'
                                                       data-slider-tooltip="hide" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Reset Slider</label>
                                        <div class="col-md-10 ">


                                                <div class="well">
                                                    <input id="ex12" data-slider-id="ex26Slider" type="text" class="slider-handle min-slider-handle round"data-slider-min="0" data-slider-max="20" data-slider-step="1" data-slider-value="10"/>
                                                    <button id="ex12_Refresh" class='btn btn-primary'>Reset</button>

                                                </div>

                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="col-md-2 control-label">Precision Slider</label>
                                        <div class="col-md-10">
                                            <input id="ex13" class="slider form-control round" data-slider-id='ex9'  type="text" data-slider-precision="2.5" data-slider-step="0.01" data-slider-value="8.115"/>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!--slider ends-->
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-success material">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="material-icons">tune</i> Material Sliders
                    </h3>
                    <span class="pull-right clickable">
                        <i class="material-icons">keyboard_arrow_up</i>
                    </span>
                </div>
                <div class="panel-body">
                    <!--slider-->
                    <!--slider ends-->
                    <!-- noUIslider-->
                    <div class="form-group">
                        <label class="col-md-2 control-label">Color Picker</label>
                        <div class="col-md-10">
                            <div class="view">
                                <div id="colorpicker">
                                    <div class="sliders" id="red"></div>
                                    <div class="sliders" id="green"></div>
                                    <div class="sliders" id="blue"></div>
                                    <div id="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Custom connect</label>
                        <div class="col-md-10">
                            <div id="connect"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Using HTML5 input</label>
                        <div class="col-md-10">
                            <div class="example">
                                <div id="html5"></div>
                                <select id="input-select"></select>
                                <input type="number" min="-20" max="40" step="1" id="input-number">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Non linear sliders</label>
                        <div class="col-md-10">
                            <div id="nonlinear"></div>
                            <span class="example-val" id="lower-value"></span>
                            <span id="lower-offset"></span>
                            <span class="example-val" id="upper-value"></span>
                            <span id="upper-offset"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Working with dates</label>
                        <div class="col-md-10">
                            <div id="slider-date"></div>
                            <span class="example-val pull-left" id="event-start"></span>
                            <span class="example-val endslider pull-right" id="event-end"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--main content ends-->
</section>
<!-- content -->


    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/vendors/ion.rangeslider/js/ion.rangeSlider.js') }}" ></script>
    <script src="{{ asset('assets/vendors/bootstrap-slider/js/bootstrap-slider.js') }}" ></script>
    <script src="{{ asset('assets/vendors/materialsliders/js/wNumb.js') }}"></script>
    <script src="{{ asset('assets/vendors/materialsliders/js/nouislider.min.js') }}"></script>
   <script src="{{ asset('assets/js/pages/sliders.js') }}"></script>

@stop
