@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Form Examples
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/formexample.css') }}" rel="stylesheet" />
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Form Examples</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i> Dashboard
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#">Forms</a>
            </li>
            <li class="active">Form Examples</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <!--row starts-->
            <div class="col-md-6">
                <!--lg-6 starts-->
                <!--basic form starts-->
                <div class="panel panel-primary" id="hidepanel1">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">alarm</i> Basic Form 1
                        </h3>
                                <span class="pull-right">
                                    <i class="material-icons clickable">keyboard_arrow_up</i>
                                    <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" action="#" method="post">
                            <fieldset>
                                <!-- Name input-->
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="name">Name</label>
                                        <input id="name" name="name" type="text" class="form-control">
                                    </div>
                                    <!-- Email input-->
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="email">Your E-mail</label>
                                        <input id="email" name="email" type="text" class="form-control">
                                    </div>
                                    <!-- Message body -->
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="message">Your message</label>
                                        <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="inputFile">File Upload</label>
                                        <input type="text" readonly="" class="form-control">
                                        <input type="file" id="inputFile">
                                    </div>
                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class=" text-right">
                                            <a type="submit" href="#" class="btn btn-responsive btn-primary">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!--basic form 2 starts-->
                <div class="panel panel-info" id="hidepanel2">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">build</i> Basic Form 2
                        </h3>
                                <span class="pull-right">
                                     <i class="material-icons clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="#" method="post">
                            <fieldset>
                                <!-- Name input-->
                                <div class="col-md-12">
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="name1">E-mail Address</label>
                                        <input id="name1" name="name" type="text" class="form-control">
                                    </div>
                                    <!-- Email input-->
                                    <div class="form-group label-floating">
                                        <label class="control-label" for="password">Password</label>
                                        <input id="password" name="password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" value="">&nbsp Stay signed in
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Form actions -->
                                    <div class="form-group">
                                        <div class="text-right">
                                            <a type="submit" href="#" class="btn btn-responsive btn-info ">Sign in</a>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <!--panel body ends-->
                </div>
                <!--input form starts-->
                <div class="panel panel-warning" id="hidepanel5">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">card_giftcard</i> Form Inputs
                        </h3>
                                <span class="pull-right">
                                     <i class="material-icons clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="text" class="form-control" placeholder="User name">
                            </div>
                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="form-group input-group">
                                        <span class="input-group-addon">
                                            <i class="fa fa-eur"></i>
                                        </span>
                                <input type="text" class="form-control" placeholder="Font Awesome Icon">
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">$</span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon">.00</span>
                            </div>
                            <div class="form-group input-group">
                                <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </span>
                            </div>
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                                <div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new">Select image</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="...">
                                            </span>
                                    <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--md-6 starts-->
                <!--validation states starts-->
                <div class="panel panel-danger" id="hidepanel4">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">center_focus_strong</i> Validation States
                        </h3>
                        <span class="pull-right">
                            <i class="material-icons clickable">keyboard_arrow_up</i>  <i class="material-icons removepanel clickable">clear</i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <div class="form-group has-success label-floating">
                                <label class="control-label inputsuccess" for="inputSuccess">Input with success</label>
                                <input type="text" class="form-control" id="inputSuccess">
                            </div>
                            <div class="form-group has-warning label-floating">
                                <label class="control-label inputwarning" for="inputWarning">Input with warning</label>
                                <input type="text" class="form-control" id="inputWarning">
                            </div>
                            <div class="form-group has-error error-state label-floating">
                                <label class="control-label inputerror" for="inputError">Input error</label>
                                <input type="text" class="form-control" id="inputError">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--md-6 ends-->
            <div class="col-md-6">
                <!--md-6 starts-->
                <!--form control starts-->
                <div class="panel panel-success" id="hidepanel6">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">share</i> Form Controls
                        </h3>
                                <span class="pull-right">
                                     <i class="material-icons clickable">keyboard_arrow_up</i> <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <form role="form" class="form_controls">
                            <div class="form-group label-floating">
                                <label for="textinput" class="control-label">Text Input</label>
                                <input id="textinput" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="input" class="control-label">Text Input with Placeholder</label>
                                <input id="input" class="form-control" placeholder="Enter text">
                            </div>
                            <div class="form-group">
                                <label>Static Control</label>
                                <p class="form-control-static">email@example.com</p>
                            </div>
                            <div class="form-group label-floating">
                                <label class="control-label">Text area</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Checkboxes</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">&nbsp; Checkbox 1</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" >&nbsp; Checkbox 2</label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" >&nbsp; Checkbox 3</label>
                                </div>
                            </div>
                            <div class="checkbox">
                                <label>Inline Checkboxes</label>
                                <label>Search icons :
                                    <input type="checkbox">&nbsp;1</label>&nbsp; &nbsp;
                                <label>
                                    <input type="checkbox">&nbsp;2</label>&nbsp; &nbsp;
                                <label>
                                    <input type="checkbox">&nbsp;3</label>
                            </div>
                            <div class="form-group">
                                <label>Radio Buttons</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">Radio 1</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2</label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3</label>
                                </div>
                            </div>
                            <div class="radio">
                                <label class="inline_radio">Inline Radio Buttons</label>
                                <label>
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1">1</label>
                                <label>
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2</label>
                                <label>
                                    <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3</label>
                            </div>
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Multiple Selects</label>
                                <select multiple class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"></div>
                                    <div>
                                                <span class="btn btn-primary btn-file">
                                                    <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="...">
                                                </span>
                                        <a href="#" class="btn btn-primary fileinput-exists" data-dismiss="fileinput">Remove</a>
                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label" for="focusedInput1">Write something to make the label float</label>
                                    <input class="form-control" id="focusedInput1" type="text">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-responsive btn-primary">Submit Button</button>
                            <button type="reset" class="btn btn-responsive btn-primary form_controls_reset">Reset Button</button>
                        </form>
                    </div>
                </div>
                <div class="panel panel-default" id="hidepanel3">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="material-icons">forum</i> Disabled Fieldsets
                        </h3>
                                <span class="pull-right">
                                     <i class="material-icons clickable">keyboard_arrow_up</i>                                     <i class="material-icons removepanel clickable">clear</i>
                                </span>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset disabled>
                                <div class="form-group label-floating">
                                    <label for="disabledInput">Disabled input</label>
                                    <input class="form-control" id="disabledInput" type="text" disabled>
                                </div>
                                <div class="form-group label-floating">
                                    <label for="disabledSelect">Disabled select menu</label>
                                    <select id="disabledSelect" class="form-control">
                                        <option>Disabled select</option>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">&nbsp; Disabled Checkbox</label>
                                </div>
                                <button type="submit" class="btn btn-responsive btn-custom btn-primary">Disabled Button
                                </button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
            <!--md-6 ends-->
        </div>
        <!--main content ends-->
    </section>
    <!-- content -->
@stop
{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    <script src="{{ asset('assets/js/pages/form_examples.js') }}" type="text/javascript"></script>

@stop