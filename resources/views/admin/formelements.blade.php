@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Form Elements
    @parent
    @stop

    {{-- page level styles --}}
    @section('header_styles')
    <link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>
            Form Elements
        </h1>
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
            <li class="active">
                Form Elements
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="col-md-6">
                <!-- credit card section -->
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">credit_card</i> Credit Card
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <div class="box-body">
                            <div class="card-wrapper"></div>
                            <br/>
                            <div id="card">
                                <div class="form-group label-floating">
                                    <label class="control-label">Card Number</label>
                                    <input name="number" required type="text" placeholder="" class="form-control" />
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Name on Card</label>
                                    <input name="name" type="text" class="form-control" maxlength="40" required/>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">CVV</label>
                                    <input name="cvc" required type="text" placeholder="" class="form-control" />
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Expiry Date</label>
                                    <input name="expiry" placeholder="" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">business_center</i> Auto Grow
                        </h3>
                                <span class="pull-right clickable">
                                    <i class="material-icons">keyboard_arrow_up</i>
                                </span>
                    </div>
                    <div class="panel-body auto_block">
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Auto Grow Basic
                            </label>
                            <div class="input-group">
                                <textarea class="form-control" data-autogrow rows="3" cols="80"></textarea>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                Heavy padding
                            </label>
                            <div class="input-group">
                                <textarea class="auto2 form-control pd-45" data-autogrow rows="3" cols="80"></textarea>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group label-floating">
                            <label class="control-label">
                                No Scrollbar
                            </label>
                            <div class="input-group">
                                <textarea class="span3 form-control scroll pd" data-autogrow rows="3" cols="80"></textarea>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <div class="form-group label-floating">
                            <label>
                                Initially hidden
                            </label>
                            <div class="input-group">
                                <div class="span4">
                                    <textarea class="span3 form-control display-no" data-autogrow rows="3" cols="80"></textarea>
                                    <a onclick="$(this).closest('.span4').find('textarea').toggle(); $(this).text(this.text=='Hide'?'Show':'Hide');return false;" href="#">Show</a>
                                </div>
                            </div>
                            <!-- /.input group -->
                        </div>
                    </div>
                </div>
                <!-- credit card section ends -->
            </div>
            <div class="col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">settings</i> Bootstrap Input MaxLength
                        </h3>
                    </div>
                    <div class="panel-body">
                        <!--max length starts-->
                        <div class="form-group label-floating">
                            <label for="defaultconfig" class="control-label">
                                Default MaxLength
                            </label>
                            <input maxlength="25" name="defaultconfig" id="defaultconfig" type="text" class="form-control">
                        </div>
                        <div class="form-group label-floating">
                            <label for="thresholdconfig" class="control-label">
                                Threshold value
                            </label>
                            <input type="text" maxlength="25" name="thresholdconfig" class="form-control" id="thresholdconfig" />
                        </div>
                        <div class="form-group label-floating">
                            <label for="moreoptions" class="control-label">Options</label>
                            <input type="text" class="form-control" maxlength="25" name="moreoptions" id="moreoptions" />
                        </div>
                        <div class="form-group label-floating">
                            <label for="alloptions" class="control-label">
                                All the options
                            </label>
                            <input type="text" class="form-control" maxlength="25" name="alloptions" id="alloptions" />
                        </div>
                        <div class="form-group label-floating">
                            <label for="textarea" class="control-label"> Textarea with a limit of 225
                            </label>
                            <textarea id="textarea" class="form-control" maxlength="225" rows="2"></textarea>
                        </div>
                        <div class="form-group label-floating m-t-20">
                            <label for="placement" class="control-label">Position</label>
                            <input type="text" class="form-control" maxlength="25" name="placement" id="placement" />
                        </div>
                        <!--min length ends-->
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

    <!-- date-range-picker -->
    <script src="{{ asset('assets/vendors/autogrow/js/autogrow.min.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrap-maxlength/js/bootstrap-maxlength.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/card/dist/jquery.card.js') }}"  type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/formelements.js') }}"  type="text/javascript"></script>

@stop