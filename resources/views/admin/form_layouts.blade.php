@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Form Layouts
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/css/pages/form_layouts.css') }}" rel="stylesheet" type="text/css"/>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Form Layouts</h1>
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
            <li class="active">Form Layouts</li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <ul class="nav  nav-tabs layouts">
                    <li class="active">
                        <a href="#tab1" data-toggle="tab">Form Actions</a>
                    </li>
                    <li>
                        <a href="#tab2" data-toggle="tab">2 Columns</a>
                    </li>
                    <li>
                        <a href="#tab3" data-toggle="tab">Form Striped</a>
                    </li>
                    <li>
                        <a href="#tab4" data-toggle="tab">Form Full Example</a>
                    </li>
                </ul>
                <div class="tab-content mar-top">
                    <div id="tab1" class="tab-pane fade active in">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">receipt</i> Form Actions On Top
                                        </h3>
                                        <span class="pull-right">
                                                    <i class="material-icons clickable">keyboard_arrow_up</i>
                                                    <i class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <form action="#" class="form-horizontal form_action1">
                                            <div class="form-position">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-raised btn-primary">Submit
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" class="btn btn-raised btn-danger">Cancel
                                                    </button>
                                                    &nbsp;
                                                    <button type="reset"
                                                            class="btn btn-raised btn-default hidden-xs reset_btn1">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">perm_identity</i></span>
                                                        <label class="control-label" for="uname1">User name</label>
                                                        <input type="text" id="uname1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">mail_outline</i></span>
                                                        <label class="control-label" for="mail1">Email</label>
                                                        <input type="text" id="mail1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                                        <label class="control-label" for="passw11">Password</label>
                                                        <input type="password" id="passw11" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_iphone</i></span>
                                                        <label class="control-label" for="phn1"> Phone Number
                                                        </label>
                                                        <input type="text" id="phn1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="material-icons">note</i></span>
                                                        <label class="control-label" for="Address1"> Address</label>
                                                        <input type="text" id="Address1" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">message</i></span>
                                                        <label class="control-label" for="message1"> Message</label>
                                                        <textarea id="message1" class="form-control"
                                                                  rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">receipt</i> Form Actions On Bottom
                                        </h3>
                                        <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                    class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <form action="#" class="form-horizontal form_action2">
                                            <div class="form-body">
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">perm_identity</i></span>
                                                        <label class="control-label" for="uname2">User name</label>
                                                        <input type="text" id="uname2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">mail_outline</i></span>
                                                        <label class="control-label" for="mail2">Email</label>
                                                        <input type="text" id="mail2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                                        <label class="control-label" for="passw12">Password</label>
                                                        <input type="password" id="passw12" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_iphone</i></span>
                                                        <label class="control-label" for="phn2"> Phone Number
                                                        </label>
                                                        <input type="text" id="phn2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="material-icons">note</i></span>
                                                        <label class="control-label" for="Address2"> Address</label>
                                                        <input type="text" id="Address2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">message</i></span>
                                                        <label class="control-label" for="message2"> Message</label>
                                                        <textarea id="message2" class="form-control"
                                                                  rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-raised btn-primary">
                                                        Submit
                                                    </button>
                                                    &nbsp;
                                                    <button type="button" class="btn btn-raised btn-danger">Cancel
                                                    </button>
                                                    &nbsp;
                                                    <input type="reset"
                                                           class="btn btn-raised btn-default hidden-xs reset_btn2"
                                                           value="Reset">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">receipt</i> Form Actions On Top &amp; Bottom
                                        </h3>
                                        <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                    class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <form action="#" class="form-horizontal form_action3">
                                            <div class="form-position">
                                                <div class="row">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-raised btn-primary">
                                                            Submit
                                                        </button>
                                                        &nbsp;
                                                        <button type="button" class="btn btn-raised btn-danger">Cancel
                                                        </button>
                                                        &nbsp;
                                                        <input type="reset"
                                                               class="btn btn-raised btn-default hidden-xs reset_btn3"
                                                               value="Reset">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">perm_identity</i></span>
                                                        <label class="control-label" for="uname3">User name</label>
                                                        <input type="text" id="uname3" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">mail_outline</i></span>
                                                        <label class="control-label" for="mail3">Email</label>
                                                        <input type="text" id="mail3" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                                        <label class="control-label" for="passw13">Password</label>
                                                        <input type="password" id="passw13" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_iphone</i></span>
                                                        <label class="control-label" for="phn3"> Phone Number
                                                        </label>
                                                        <input type="text" id="phn3" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="material-icons">note</i></span>
                                                        <label class="control-label" for="Address3"> Address</label>
                                                        <input type="text" id="Address3" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">message</i></span>
                                                        <label class="control-label" for="message3"> Message</label>
                                                        <textarea id="message3" class="form-control"
                                                                  rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-raised btn-primary">
                                                            Submit
                                                        </button>
                                                        &nbsp;
                                                        <button type="button" class="btn btn-raised btn-danger">Cancel
                                                        </button>
                                                        &nbsp;
                                                        <input type="reset"
                                                               class="btn btn-raised btn-default hidden-xs reset_btn3"
                                                               value="Reset">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">receipt</i> Left Aligned
                                        </h3>
                                        <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                    class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <form action="#" class="form_action4">
                                            <div class="form-position ">
                                                <button type="submit" class="btn btn-raised btn-primary">Submit
                                                </button>
                                                &nbsp;
                                                <button type="button" class="btn btn-raised btn-danger">Cancel
                                                </button>
                                                &nbsp;
                                                <input type="reset"
                                                       class="btn btn-raised btn-default hidden-xs reset_btn4"
                                                       value="Reset">
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">perm_identity</i></span>
                                                        <label class="control-label" for="uname4">User name</label>
                                                        <input type="text" id="uname4" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">mail_outline</i></span>
                                                        <label class="control-label" for="mail4">Email</label>
                                                        <input type="text" id="mail4" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                                        <label class="control-label" for="passw14">Password</label>
                                                        <input type="password" id="passw14" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_iphone</i></span>
                                                        <label class="control-label" for="phn4"> Phone Number
                                                        </label>
                                                        <input type="text" id="phn4" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="material-icons">note</i></span>
                                                        <label class="control-label" for="Address4"> Address</label>
                                                        <input type="text" id="Address4" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">message</i></span>
                                                        <label class="control-label" for="message4"> Message</label>
                                                        <textarea id="message4" class="form-control"
                                                                  rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-raised btn-primary">Submit
                                                </button>
                                                &nbsp;
                                                <button type="button" class="btn btn-raised btn-danger">Cancel
                                                </button>
                                                &nbsp;
                                                <input type="reset"
                                                       class="btn btn-raised btn-default hidden-xs reset_btn4"
                                                       value="Reset">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">receipt</i> Right Aligned
                                        </h3>
                                        <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                    class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <form action="#" class="form_action5">
                                            <div class="form-position text-right ">
                                                <button type="submit" class="btn btn-raised btn-primary">Submit
                                                </button>
                                                &nbsp;
                                                <button type="button" class="btn btn-raised btn-danger">Cancel
                                                </button>
                                                &nbsp;
                                                <input type="reset"
                                                       class="btn btn-raised btn-default hidden-xs reset_btn5"
                                                       value="Reset">
                                            </div>
                                            <div class="form-body">
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">perm_identity</i></span>
                                                        <label class="control-label" for="uname5">User name</label>
                                                        <input type="text" id="uname5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">mail_outline</i></span>
                                                        <label class="control-label" for="mail5">Email</label>
                                                        <input type="text" id="mail5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">lock_outline</i></span>
                                                        <label class="control-label" for="passw15">Password</label>
                                                        <input type="password" id="passw15" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">phone_iphone</i></span>
                                                        <label class="control-label" for="phn5"> Phone Number
                                                        </label>
                                                        <input type="text" id="phn5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i
                                                                    class="material-icons">note</i></span>
                                                        <label class="control-label" for="Address5"> Address</label>
                                                        <input type="text" id="Address5" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group label-floating">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="material-icons">message</i></span>
                                                        <label class="control-label" for="message5"> Message</label>
                                                        <textarea id="message5" class="form-control"
                                                                  rows="3"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions text-right ">
                                                <button type="submit" class="btn btn-raised btn-primary">Submit
                                                </button>
                                                &nbsp;
                                                <button type="button" class="btn btn-raised btn-danger">Cancel
                                                </button>
                                                &nbsp;
                                                <input type="reset"
                                                       class="btn btn-raised btn-default hidden-xs reset_btn5"
                                                       value="Reset">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab2" class="tab-pane fade">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">receipt</i> Form 2 Columns Default
                                        </h3>
                                        <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                    class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <form>
                                                <div class="col-md-6">
                                                    <div class="form-group has-success label-floating">
                                                        <label class="control-label" for="fname">First Name
                                                        </label>
                                                        <input type="text" id="fname" class="form-control">
                                                    </div>
                                                    <div class="form-group has-warning label-floating">
                                                        <label class="control-label"
                                                               for="inputWarning12">Password</label>
                                                        <input type="password" id="inputWarning12" class="form-control">
                                                        <span class="help-block">Password strength: Weak</span>
                                                    </div>
                                                    <div class="form-group has-error label-floating">
                                                        <label class="control-label" for="inputError1">Email</label>
                                                        <input type="email" id="inputError1" class="form-control">
                                                        <span class="help-block">Please enter a valid email address</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group has-success has-feedback label-floating">
                                                        <label class="control-label" for="inputSuccess2">Second Name
                                                        </label>
                                                        <input type="text" id="inputSuccess2" class="form-control">
                                                        <span class="form-control-feedback"><i
                                                                    class="material-icons material_size text-success">done</i></span>
                                                        <span class="help-block">Second name is too small</span>
                                                    </div>
                                                    <div class="form-group has-warning has-feedback label-floating">
                                                        <label class="control-label" for="inputWarning2">Confirm
                                                            Password</label>
                                                        <input type="password" id="inputWarning2" class="form-control">
                                                        <span class=" form-control-feedback"><i
                                                                    class="material-icons material_size text-warning">warning</i></span>
                                                        <span class="help-block">Password mis-match</span>
                                                    </div>
                                                    <div class="form-group has-error has-feedback label-floating">
                                                        <label class="control-label" for="inputError2">Confirm Email
                                                        </label>
                                                        <input type="email" id="inputError2" class="form-control">
                                                        <span class="form-control-feedback"><i
                                                                    class="material-icons material_size text-danger">close</i></span>
                                                        <span class="help-block">Email mis-match</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-10">
                                                            <button type="submit" class="btn btn-raised btn-primary">
                                                                Login
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">receipt</i> Personal Details Horizontal
                                        </h3>
                                        <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                    class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <form class="form_action6">
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="firstName3">First Name:
                                                        </label>
                                                        <input type="text" class="form-control" id="firstName3">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="inputEmail3">Email:</label>
                                                        <input type="email" class="form-control" id="inputEmail3">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"
                                                               for="inputPassword4">Password:</label>
                                                        <input type="password" class="form-control" id="inputPassword4">
                                                    </div>
                                                    <label class="dob">Date of Birth:</label>
                                                    <div class="row is-empty">
                                                        <div class="col-md-4  select_margin">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Date</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                    <option>11</option>
                                                                    <option>12</option>
                                                                    <option>13</option>
                                                                    <option>14</option>
                                                                    <option>15</option>
                                                                    <option>16</option>
                                                                    <option>17</option>
                                                                    <option>18</option>
                                                                    <option>19</option>
                                                                    <option>20</option>
                                                                    <option>21</option>
                                                                    <option>22</option>
                                                                    <option>23</option>
                                                                    <option>24</option>
                                                                    <option>25</option>
                                                                    <option>26</option>
                                                                    <option>27</option>
                                                                    <option>28</option>
                                                                    <option>29</option>
                                                                    <option>30</option>
                                                                    <option>31</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 select_margin">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Month</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                    <option>11</option>
                                                                    <option>12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 select_margin">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Year</option>
                                                                    <option>1991</option>
                                                                    <option>1992</option>
                                                                    <option>1993</option>
                                                                    <option>1994</option>
                                                                    <option>1995</option>
                                                                    <option>1996</option>
                                                                    <option>1997</option>
                                                                    <option>1998</option>
                                                                    <option>1999</option>
                                                                    <option>2000</option>
                                                                    <option>2001</option>
                                                                    <option>2002</option>
                                                                    <option>2003</option>
                                                                    <option>2004</option>
                                                                    <option>2005</option>
                                                                    <option>2006</option>
                                                                    <option>2007</option>
                                                                    <option>2008</option>
                                                                    <option>2009</option>
                                                                    <option>2000</option>
                                                                    <option>2011</option>
                                                                    <option>2012</option>
                                                                    <option>2013</option>
                                                                    <option>2014</option>
                                                                    <option>2015</option>
                                                                    <option>2016</option>
                                                                    <option>2017</option>
                                                                    <option>2018</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="ZipCode4">Zip Code:
                                                        </label>
                                                        <input type="text" class="form-control" id="ZipCode4">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="city4">City:</label>
                                                        <input type="text" class="form-control" id="city4">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="news">&nbsp; Send me
                                                                latest news and updates.</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="lastName4">Last Name:
                                                        </label>
                                                        <input type="text" class="form-control" id="lastName4">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="phoneNumber4">Phone:</label>
                                                        <input type="tel" class="form-control" id="phoneNumber4">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="confirmPassword4">Confirm
                                                            Password:
                                                        </label>
                                                        <input type="password" class="form-control"
                                                               id="confirmPassword4">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"
                                                               for="postalAddress4">Address:</label>
                                                        <textarea rows="3" class="form-control"
                                                                  id="postalAddress4"></textarea>
                                                    </div>
                                                    <div class="radio">
                                                        <label class="radio_resp">Gender:</label>
                                                        <label>
                                                            <input type="radio" name="genderRadios"
                                                                   id="genderRadiosmale" value="male">Male</label>
                                                        <label>
                                                            <input type="radio" name="genderRadios"
                                                                   id="genderRadiosfemale" value="female">Female</label>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox" value="agree">&nbsp; I agree to
                                                                the
                                                                <a href="#" class="text-success">Terms and
                                                                    Conditions</a>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-actions">
                                                    <div class="col-md-offset-5 col-md-5">
                                                        <input type="submit" class="btn btn-raised btn-primary"
                                                               value="Submit">
                                                        <input type="reset"
                                                               class="btn btn-raised btn-default reset_btn6"
                                                               value="Reset">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <i class="material-icons">receipt</i> Form 2 Columns Readonly
                                            </h3>
                                            <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                        class="material-icons removepanel clickable">clear</i>
                                                </span>
                                        </div>
                                        <div class="panel-body">
                                            <form action="#" class="form-horizontal">
                                                <h3>Personal</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3  control-label">First Name :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">Jenny</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Last Name :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">Kerry</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Email :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">
                                                                    <a href="mailto:whisfat1935@jourrapide.com"
                                                                       class="text-success">Jenny321@example.com</a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Gender :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">Female</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Birthday :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">10.11.1980</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Phone :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">321-333-5432</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h3>Address</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Address 1 :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">1219 Quiet Subdivision
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Address 2 :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">3536 Petunia Way
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">State :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">Canada</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">City :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">Canada</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Post Code :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">7987678</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label">Conditions :
                                                            </label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">True</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="tab-pane fade">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">notifications</i> Form Bordered Striped
                                        </h3>
                                        <span class="pull-right">
                                                    <i class="material-icons clickable">keyboard_arrow_up</i>
                                                    <i class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body border">
                                        <form action="" enctype="multipart/form-data"
                                              class="form-horizontal form-bordered">
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Static</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">Static text</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-text-input1">Text</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-text-input1" name="example-text-input"
                                                           class="form-control" placeholder="Text">
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-email1">Email</label>
                                                <div class="col-md-6">
                                                    <input type="email" id="example-email1" name="example-email"
                                                           class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-password3">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" id="example-password3" name="example-password"
                                                           class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label"
                                                       for="example-1">Disabled</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-1" name="example-disabled"
                                                           class="form-control" placeholder="Disabled" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input">Textarea</label>
                                                <div class="col-md-6">
                                                    <textarea id="example-textarea-input" name="example-textarea-input"
                                                              rows="7" class="form-control"
                                                              placeholder="Description.."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label"
                                                       for="example-select1">Select</label>
                                                <div class="col-md-6">
                                                    <select id="example-select1" name="example-select"
                                                            class="form-control" size="1">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Bootstrap</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">Javascript</option>
                                                        <option value="4">HTML</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-multiple-select3">Multiple</label>
                                                <div class="col-md-6">
                                                    <select id="example-multiple-select3" name="example-multiple-select"
                                                            class="form-control" size="5" multiple>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                        <option value="4">Option #4</option>
                                                        <option value="5">Option #5</option>
                                                        <option value="6">Option #6</option>
                                                        <option value="7">Option #7</option>
                                                        <option value="8">Option #8</option>
                                                        <option value="9">Option #9</option>
                                                        <option value="10">Option #10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Radios</label>
                                                <div class="col-md-9">
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio1">
                                                            <input type="radio" id="example-radio1"
                                                                   name="example-radios" value="option1">HTML</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio2">
                                                            <input type="radio" id="example-radio2"
                                                                   name="example-radios" value="option2">CSS</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio3">
                                                            <input type="radio" id="example-radio3"
                                                                   name="example-radios"
                                                                   value="option3">Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Radios</label>
                                                <div class="col-md-9 radio">
                                                    <label for="example-inline-radio1">
                                                        <input type="radio" id="example-inline-radio1"
                                                               name="example-inline-radios" value="option1">&nbsp
                                                        HTML</label>
                                                    <label for="example-inline-radio2">
                                                        <input type="radio" id="example-inline-radio2"
                                                               name="example-inline-radios" value="option2">&nbsp
                                                        CSS</label>
                                                    <label for="example-inline-radio3">
                                                        <input type="radio" id="example-inline-radio3"
                                                               name="example-inline-radios" value="option3">&nbsp
                                                        Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox1">
                                                            <input type="checkbox" id="example-checkbox1"
                                                                   name="example-checkbox1" value="option1">&nbsp
                                                            HTML</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox2">
                                                            <input type="checkbox" id="example-checkbox2"
                                                                   name="example-checkbox2" value="option2">&nbsp
                                                            CSS</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox3">
                                                            <input type="checkbox" id="example-checkbox3"
                                                                   name="example-checkbox3" value="option3">&nbsp
                                                            Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Checkboxes</label>
                                                <div class="col-md-9 checkbox">
                                                    <label class="mar-left5" for="example-inline-checkbox1">
                                                        <input type="checkbox" id="example-inline-checkbox1"
                                                               name="example-inline-checkbox1" value="option1">&nbsp;
                                                        HTML</label>
                                                    <label class="mar-left5" for="example-inline-checkbox2">
                                                        <input type="checkbox" id="example-inline-checkbox2"
                                                               name="example-inline-checkbox2" value="option2">&nbsp;
                                                        CSS</label>
                                                    <label class="mar-left5" for="example-inline-checkbox3">
                                                        <input type="checkbox" id="example-inline-checkbox3"
                                                               name="example-inline-checkbox3" value="option3">&nbsp;
                                                        Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col ">
                                                <label class="col-md-3 control-label"
                                                       for="example-file-input1">File</label>
                                                <div class="col-md-9 pad-top20 ">
                                                    <input type="text" readonly="" class="form-control"
                                                           placeholder="Browse...">
                                                    <input type="file" id="example-file-input1"
                                                           name="example-file-input">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-file-multiple-input3">Multiple
                                                    File</label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="text" readonly="" class="form-control"
                                                           placeholder="Browse...">
                                                    <input type="file" id="example-file-multiple-input3"
                                                           name="example-file-multiple-input" multiple>
                                                </div>
                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="submit" class="btn btn-effect-ripple btn-primary">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-effect-ripple btn-default">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">notifications</i> Form Seperated Row Striped
                                        </h3>
                                        <span class="pull-right">
                                                    <i class="material-icons clickable">keyboard_arrow_up</i>
                                                    <i class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body border">
                                        <form action="" enctype="multipart/form-data"
                                              class="form-horizontal form-bordered-row">
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Static</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">Static text</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-text-input2">Text</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-text-input2" name="example-text-input"
                                                           class="form-control" placeholder="Text">
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label" for="example-email2">Email</label>
                                                <div class="col-md-6">
                                                    <input type="email" id="example-email2" name="example-email"
                                                           class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-password1">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" id="example-password1" name="example-password"
                                                           class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label"
                                                       for="example-2">Disabled</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-2" name="example-disabled"
                                                           class="form-control" placeholder="Disabled" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input1">Textarea</label>
                                                <div class="col-md-6">
                                                    <textarea id="example-textarea-input1" name="example-textarea-input"
                                                              rows="7" class="form-control"
                                                              placeholder="Description.."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label"
                                                       for="example-select2">Select</label>
                                                <div class="col-md-6">
                                                    <select id="example-select2" name="example-select"
                                                            class="form-control" size="1">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Bootstrap</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">Javascript</option>
                                                        <option value="4">HTML</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-multiple-select1">Multiple</label>
                                                <div class="col-md-6">
                                                    <select id="example-multiple-select1" name="example-multiple-select"
                                                            class="form-control" size="5" multiple>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                        <option value="4">Option #4</option>
                                                        <option value="5">Option #5</option>
                                                        <option value="6">Option #6</option>
                                                        <option value="7">Option #7</option>
                                                        <option value="8">Option #8</option>
                                                        <option value="9">Option #9</option>
                                                        <option value="10">Option #10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Radios</label>
                                                <div class="col-md-9">
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio11">
                                                            <input type="radio" id="example-radio11"
                                                                   name="example-radios" value="option1">HTML</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio21">
                                                            <input type="radio" id="example-radio21"
                                                                   name="example-radios" value="option2">CSS</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio31">
                                                            <input type="radio" id="example-radio31"
                                                                   name="example-radios"
                                                                   value="option3">Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Radios</label>
                                                <div class="col-md-9 radio">
                                                    <label for="example-inline-radio11">
                                                        <input type="radio" id="example-inline-radio11"
                                                               name="example-inline-radios" value="option1">&nbsp
                                                        HTML</label>
                                                    <label for="example-inline-radio21">
                                                        <input type="radio" id="example-inline-radio21"
                                                               name="example-inline-radios" value="option2">&nbsp
                                                        CSS</label>
                                                    <label for="example-inline-radio31">
                                                        <input type="radio" id="example-inline-radio31"
                                                               name="example-inline-radios" value="option3">&nbsp
                                                        Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col">
                                                <label class="col-md-3 control-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox11">
                                                            <input type="checkbox" id="example-checkbox11"
                                                                   name="example-checkbox1" value="option1">&nbsp
                                                            HTML</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox21">
                                                            <input type="checkbox" id="example-checkbox21"
                                                                   name="example-checkbox2" value="option2">&nbsp
                                                            CSS</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox31">
                                                            <input type="checkbox" id="example-checkbox31"
                                                                   name="example-checkbox3" value="option3">&nbsp
                                                            Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Checkboxes</label>
                                                <div class="col-md-9 checkbox">
                                                    <label class="mar-left5" for="example-inline-checkbox11">
                                                        <input type="checkbox" id="example-inline-checkbox11"
                                                               name="example-inline-checkbox1" value="option1">&nbsp;
                                                        HTML</label>
                                                    <label class="mar-left5" for="example-inline-checkbox21">
                                                        <input type="checkbox" id="example-inline-checkbox21"
                                                               name="example-inline-checkbox2" value="option2">&nbsp;
                                                        CSS</label>
                                                    <label class="mar-left5" for="example-inline-checkbox31">
                                                        <input type="checkbox" id="example-inline-checkbox31"
                                                               name="example-inline-checkbox3" value="option3">&nbsp;
                                                        Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group striped-col ">
                                                <label class="col-md-3 control-label"
                                                       for="example-file-input2">File</label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="text" readonly="" class="form-control"
                                                           placeholder="Browse...">
                                                    <input type="file" id="example-file-input2"
                                                           name="example-file-input">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-file-multiple-input2">Multiple
                                                    File</label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="text" readonly="" class="form-control"
                                                           placeholder="Browse...">
                                                    <input type="file" id="example-file-multiple-input2"
                                                           name="example-file-multiple-input" multiple>
                                                </div>
                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="submit" class="btn btn-effect-ripple btn-primary">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-effect-ripple btn-default">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <i class="material-icons">notifications</i> Form Bordered
                                        </h3>
                                        <span class="pull-right">
                                                    <i class="material-icons clickable">keyboard_arrow_up</i>
                                                    <i class="material-icons removepanel clickable">clear</i>
                                                </span>
                                    </div>
                                    <div class="panel-body border">
                                        <form action=""  enctype="multipart/form-data"
                                              class="form-horizontal form-bordered">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Static</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static">Static text</p>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-text-input">Text</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-text-input" name="example-text-input"
                                                           class="form-control" placeholder="Text">

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-email3">Email</label>
                                                <div class="col-md-6">
                                                    <input type="email" id="example-email3" name="example-email"
                                                           class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-password2">Password</label>
                                                <div class="col-md-6">
                                                    <input type="password" id="example-password2" name="example-password"
                                                           class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-3">Disabled</label>
                                                <div class="col-md-6">
                                                    <input type="text" id="example-3" name="example-disabled"
                                                           class="form-control" placeholder="Disabled" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-textarea-input2">Textarea</label>
                                                <div class="col-md-6">
                                                    <textarea id="example-textarea-input2" name="example-textarea-input"
                                                              rows="7" class="form-control"
                                                              placeholder="Description.."></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-select3">Select</label>
                                                <div class="col-md-6">
                                                    <select id="example-select3" name="example-select"
                                                            class="form-control" size="1">
                                                        <option value="0">Please select</option>
                                                        <option value="1">Bootstrap</option>
                                                        <option value="2">CSS</option>
                                                        <option value="3">Javascript</option>
                                                        <option value="4">HTML</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-multiple-select2">Multiple</label>
                                                <div class="col-md-6">
                                                    <select id="example-multiple-select2" name="example-multiple-select"
                                                            class="form-control" size="5" multiple>
                                                        <option value="1">Option #1</option>
                                                        <option value="2">Option #2</option>
                                                        <option value="3">Option #3</option>
                                                        <option value="4">Option #4</option>
                                                        <option value="5">Option #5</option>
                                                        <option value="6">Option #6</option>
                                                        <option value="7">Option #7</option>
                                                        <option value="8">Option #8</option>
                                                        <option value="9">Option #9</option>
                                                        <option value="10">Option #10</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Radios</label>
                                                <div class="col-md-9">
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio12">
                                                            <input type="radio" id="example-radio12"
                                                                   name="example-radios" value="option1">HTML</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio22">
                                                            <input type="radio" id="example-radio22"
                                                                   name="example-radios" value="option2">CSS</label>
                                                    </div>
                                                    <div class="radio mar-left5">
                                                        <label for="example-radio32">
                                                            <input type="radio" id="example-radio32"
                                                                   name="example-radios"
                                                                   value="option3">Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Radios</label>
                                                <div class="col-md-9 radio">
                                                    <label for="example-inline-radio12">
                                                        <input type="radio" id="example-inline-radio12"
                                                               name="example-inline-radios" value="option1">HTML</label>
                                                    <label for="example-inline-radio22">
                                                        <input type="radio" id="example-inline-radio22"
                                                               name="example-inline-radios" value="option2">CSS</label>
                                                    <label for="example-inline-radio32">
                                                        <input type="radio" id="example-inline-radio32"
                                                               name="example-inline-radios"
                                                               value="option3">Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Checkboxes</label>
                                                <div class="col-md-9">
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox12">
                                                            <input type="checkbox" id="example-checkbox12"
                                                                   name="example-checkbox1" value="option1">&nbsp; HTML</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox22">
                                                            <input type="checkbox" id="example-checkbox22"
                                                                   name="example-checkbox2" value="option2">&nbsp;
                                                            CSS</label>
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label for="example-checkbox32">
                                                            <input type="checkbox" id="example-checkbox32"
                                                                   name="example-checkbox3" value="option3">&nbsp;
                                                            Javascript</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Inline Checkboxes</label>
                                                <div class="col-md-9 checkbox">
                                                    <label class="mar-left5" for="example-inline-checkbox12">
                                                        <input type="checkbox" id="example-inline-checkbox12"
                                                               name="example-inline-checkbox1" value="option1">&nbsp;
                                                        HTML</label>
                                                    <label class="mar-left5" for="example-inline-checkbox22">
                                                        <input type="checkbox" id="example-inline-checkbox22"
                                                               name="example-inline-checkbox2" value="option2">&nbsp;
                                                        CSS</label>
                                                    <label class="mar-left5" for="example-inline-checkbox32">
                                                        <input type="checkbox" id="example-inline-checkbox32"
                                                               name="example-inline-checkbox3" value="option3">&nbsp;
                                                        Javascript</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label"
                                                       for="example-file-input3">File</label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="text" readonly="" class="form-control"
                                                           placeholder="Browse...">
                                                    <input type="file" id="example-file-input3"
                                                           name="example-file-input">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="example-file-multiple-input1">Multiple
                                                    File</label>
                                                <div class="col-md-9 pad-top20">
                                                    <input type="text" readonly="" class="form-control"
                                                           placeholder="Browse...">
                                                    <input type="file" id="example-file-multiple-input1"
                                                           name="example-file-multiple-input" multiple>
                                                </div>
                                            </div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="submit" class="btn btn-effect-ripple btn-primary">
                                                        Submit
                                                    </button>
                                                    <button type="reset" class="btn btn-effect-ripple btn-default">
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab4" class="tab-pane fade">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">notifications</i> Vertical Form Layout
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form>
                                                    <div class="form-group label-floating">
                                                        <label for="inputEmail9" class="control-label">Email</label>
                                                        <input type="email" class="form-control" id="inputEmail9">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label for="pwd8" class="control-label">Password</label>
                                                        <input type="password" class="form-control" id="pwd8">
                                                    </div>
                                                    <div class="checkbox mar-left5">
                                                        <label>
                                                            <input type="checkbox">&nbsp;Remember me
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Login</button>
                                                </form>
                                            </div>
                                        </div>
                                        <!--select2 starts-->
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Inline Form Layout
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-inline" role="form">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="mail9">Email</label>
                                                        <input type="email" class="form-control" id="mail9">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="pwd9">Password</label>
                                                        <input type="password" class="form-control" id="pwd9">
                                                    </div>
                                                    <div class="checkbox ">
                                                        <label class="mar-left5">
                                                            <input type="checkbox" class="mar-right4">&nbsp;Remember me
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary mar-top pull-right">
                                                        Login
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Static Form Control
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="sr-only">Email</label>
                                                        <p class="form-control-static ">harrypotter@mail.com</p>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label for="pwd10" class="control-label">Password</label>
                                                        <input type="password" class="form-control" id="pwd10">
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox">&nbsp;Remember me</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row">
                                                            <button type="submit" class="btn btn-primary">Login
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Grid sizing of Inputs,
                                                    Textareas and Select Boxes
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                        <div class="col-xs-5">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-xs-5">
                                                            <textarea class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-3">
                                                            <select class="form-control">
                                                                <option>Select</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <select class="form-control">
                                                                <option>Select</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-xs-5">
                                                            <select class="form-control">
                                                                <option>Select</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Creating Button Dropdowns
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <div class="input-group-btn">
                                                                    <button type="button"
                                                                            class="btn btn-info btn-raised dropdown-toggle"
                                                                            data-toggle="dropdown">
                                                                        Action
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li>
                                                                            <a href="#">Action</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Another action</a>
                                                                        </li>
                                                                        <li class="divider"></li>
                                                                        <li>
                                                                            <a href="#">Separated link</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <input type="text" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control">
                                                                <div class="input-group-btn">
                                                                    <button type="button"
                                                                            class="btn btn-info btn-raised dropdown-toggle"
                                                                            data-toggle="dropdown">
                                                                        Action
                                                                        <span class="caret"></span>
                                                                    </button>
                                                                    <ul class="dropdown-menu pull-right">
                                                                        <li>
                                                                            <a href="#">Action</a>
                                                                        </li>
                                                                        <li>
                                                                            <a href="#">Another action</a>
                                                                        </li>
                                                                        <li class="divider"></li>
                                                                        <li>
                                                                            <a href="#">Separated link</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                                <hr>
                                                <form>
                                                    <div class="input-group">
                                                        <div class="input-group-btn">
                                                            <button type="button"
                                                                    class="btn btn-warning btn-raised dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <a href="#">Action</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Another action</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Something else here</a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a href="#">Separated link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <input type="text" class="form-control">
                                                        <div class="input-group-btn">
                                                            <button type="button"
                                                                    class="btn btn-warning btn-raised dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li>
                                                                    <a href="#">Action</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Another action</a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">Something else here</a>
                                                                </li>
                                                                <li class="divider"></li>
                                                                <li>
                                                                    <a href="#">Separated link</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Creating Disabled Inputs
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <fieldset disabled="disabled">
                                                        <div class=" col-xs-offset-1 col-xs-10">
                                                            <div class="form-group label-floating">
                                                                <label for="email9" class="control-label">Email</label>
                                                                <input type="email" class="form-control" id="email9">
                                                            </div>
                                                        </div>
                                                        <div class="form-group label-floating">
                                                            <div class=" col-xs-offset-1 col-xs-10">
                                                                <label for="pwd11"
                                                                       class="control-label">Password</label>
                                                                <input type="password" class="form-control" id="pwd11">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-offset-1 col-xs-10">
                                                                <div class="checkbox">
                                                                    <label>
                                                                        <input type="checkbox">&nbsp;Remember me
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-xs-offset-2 col-xs-10">
                                                                <button type="submit"
                                                                        class="btn btn-raised btn-primary">
                                                                    Login
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Supported Form Controls in
                                                    Twitter Bootstrap
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal form_full2">
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="email12">Email:</label>
                                                        <input type="email" class="form-control" id="email12">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="pwd12">Password:</label>
                                                        <input type="password" class="form-control" id="pwd12">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="pwd13">Confirm Password:
                                                        </label>
                                                        <input type="password" class="form-control" id="pwd13">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="fname7">First Name:
                                                        </label>
                                                        <input type="text" class="form-control" id="fname7">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="lname2">Last Name:
                                                        </label>
                                                        <input type="text" class="form-control" id="lname2">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="phone3">Phone:</label>
                                                        <input type="tel" class="form-control" id="phone3">
                                                    </div>
                                                    <label class="dob">Date of Birth:</label>
                                                    <div class="row is-empty">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Date</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                    <option>11</option>
                                                                    <option>12</option>
                                                                    <option>13</option>
                                                                    <option>14</option>
                                                                    <option>15</option>
                                                                    <option>16</option>
                                                                    <option>17</option>
                                                                    <option>18</option>
                                                                    <option>19</option>
                                                                    <option>20</option>
                                                                    <option>21</option>
                                                                    <option>22</option>
                                                                    <option>23</option>
                                                                    <option>24</option>
                                                                    <option>25</option>
                                                                    <option>26</option>
                                                                    <option>27</option>
                                                                    <option>28</option>
                                                                    <option>29</option>
                                                                    <option>30</option>
                                                                    <option>31</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Month</option>
                                                                    <option>1</option>
                                                                    <option>2</option>
                                                                    <option>3</option>
                                                                    <option>4</option>
                                                                    <option>5</option>
                                                                    <option>6</option>
                                                                    <option>7</option>
                                                                    <option>8</option>
                                                                    <option>9</option>
                                                                    <option>10</option>
                                                                    <option>11</option>
                                                                    <option>12</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <select class="form-control">
                                                                    <option>Year</option>
                                                                    <option>1991</option>
                                                                    <option>1992</option>
                                                                    <option>1993</option>
                                                                    <option>1994</option>
                                                                    <option>1995</option>
                                                                    <option>1996</option>
                                                                    <option>1997</option>
                                                                    <option>1998</option>
                                                                    <option>1999</option>
                                                                    <option>2000</option>
                                                                    <option>2001</option>
                                                                    <option>2002</option>
                                                                    <option>2003</option>
                                                                    <option>2004</option>
                                                                    <option>2005</option>
                                                                    <option>2006</option>
                                                                    <option>2007</option>
                                                                    <option>2008</option>
                                                                    <option>2009</option>
                                                                    <option>2000</option>
                                                                    <option>2011</option>
                                                                    <option>2012</option>
                                                                    <option>2013</option>
                                                                    <option>2014</option>
                                                                    <option>2015</option>
                                                                    <option>2016</option>
                                                                    <option>2017</option>
                                                                    <option>2018</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="address7">Address:</label>
                                                        <textarea rows="3" class="form-control"
                                                                  id="address7"></textarea>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="ZipCode">Zip Code:
                                                        </label>
                                                        <input type="text" class="form-control" id="ZipCode">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Inline Radios</label>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="radio radio-primary pull-left">
                                                                    <label>
                                                                        <input type="radio" id="inline-radio51"
                                                                               name="inline-radios"
                                                                               value="male">Male</label>
                                                                </div>
                                                                <div class="radio radio-primary pull-left">
                                                                    <label>
                                                                        <input type="radio" id="inline-radio52"
                                                                               name="inline-radios" value="female">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox">&nbsp;Send me latest news and
                                                                updates.
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="checkbox">
                                                            <label>
                                                                <input type="checkbox">&nbsp;I agree to the
                                                                <a href="#" class="text-success">Terms and
                                                                    Conditions</a>.
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <input type="submit" class="btn btn-primary" value="Submit">
                                                        <input type="reset" class="btn btn-default form_full_reset2"
                                                               value="Reset">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!--select2 ends-->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">notifications</i> Horizontal Form Layout
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <label for="email13"
                                                               class="control-label col-xs-3">Email</label>
                                                        <div class="col-xs-9">
                                                            <input type="email" class="form-control" id="email13">
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="pwd14"
                                                               class="control-label col-xs-3">Password</label>
                                                        <div class="col-xs-9">
                                                            <input type="password" class="form-control" id="pwd14">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-3 col-xs-9">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox"> &nbsp;Remember me
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-xs-offset-3 col-xs-9">
                                                            <button type="submit" class="btn btn-primary">Login
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-warning">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">notifications</i> General Controls
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form action="" enctype="multipart/form-data"
                                                      class="form-horizontal inline form_full1">
                                                    <div class="form-group">
                                                        <label class="control-label">Static</label>
                                                        <p class="form-control-static">Static text</p>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="textinput8">Text</label>
                                                        <input type="text" id="textinput8" name="example-text-input"
                                                               class="form-control">
                                                        <span class="help-block">This is a help text</span>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="email14">Email</label>
                                                        <input type="email" id="email14" name="example-email"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="pwd15">Password</label>
                                                        <input type="password" id="pwd15" name="example-password"
                                                               class="form-control">
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label" for="disabled3">Disabled</label>
                                                        <input type="text" id="disabled3" name="example-disabled"
                                                               class="form-control" disabled>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label"
                                                               for="textarea-input8">Textarea</label>
                                                        <textarea id="textarea-input8" name="example-textarea-input"
                                                                  rows="7" class="form-control"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label"
                                                               for="select12">Select</label>
                                                        <div class="col-md-8">
                                                            <select id="select12" name="example-select"
                                                                    class="form-control" size="1">
                                                                <option value="0">Please select</option>
                                                                <option value="1">Bootstrap</option>
                                                                <option value="2">CSS</option>
                                                                <option value="3">Javascript</option>
                                                                <option value="4">HTML</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="multiple-select12">Multiple</label>
                                                        <div class="col-md-8">
                                                            <select id="multiple-select12"
                                                                    name="example-multiple-select" class="form-control"
                                                                    size="5" multiple>
                                                                <option value="1">Option #1</option>
                                                                <option value="2">Option #2</option>
                                                                <option value="3">Option #3</option>
                                                                <option value="4">Option #4</option>
                                                                <option value="5">Option #5</option>
                                                                <option value="6">Option #6</option>
                                                                <option value="7">Option #7</option>
                                                                <option value="8">Option #8</option>
                                                                <option value="9">Option #9</option>
                                                                <option value="10">Option #10</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Radios</label>
                                                        <div class="col-md-9">
                                                            <div class="radio mar-left5">
                                                                <label for="example-radio1ra">
                                                                    <input type="radio" id="example-radio1ra"
                                                                           name="example-radios"
                                                                           value="option1">HTML</label>
                                                            </div>
                                                            <div class="radio mar-left5">
                                                                <label for="example-radio2ra">
                                                                    <input type="radio" id="example-radio2ra"
                                                                           name="example-radios"
                                                                           value="option2">CSS</label>
                                                            </div>
                                                            <div class="radio mar-left5">
                                                                <label for="example-radio3ra">
                                                                    <input type="radio" id="example-radio3ra"
                                                                           name="example-radios" value="option3">Javascript</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Inline Radios</label>
                                                        <div class="col-md-9">
                                                            <div class="row">
                                                                <div class="radio radio-primary pull-left">
                                                                    <label>
                                                                        <input type="radio" id="inline-radio45"
                                                                               name="inline-radios" value="option1">HTML</label>
                                                                </div>
                                                                <div class="radio radio-primary pull-left">
                                                                    <label>
                                                                        <input type="radio" id="inline-radio46"
                                                                               name="inline-radios" value="option2">CSS</label>
                                                                </div>
                                                                <div class="radio radio-primary pull-left">
                                                                    <label>
                                                                        <input type="radio" id="inline-radio47"
                                                                               name="inline-radios" value="option3">Javascript</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Checkboxes</label>
                                                        <div class="col-md-9">
                                                            <div class="checkbox mar-left5">
                                                                <label for="example-checkbox1ch">
                                                                    <input type="checkbox" id="example-checkbox1ch"
                                                                           name="example-checkbox1" value="option1">&nbsp;HTML</label>
                                                            </div>
                                                            <div class="checkbox mar-left5">
                                                                <label for="example-checkbox2ch">
                                                                    <input type="checkbox" id="example-checkbox2ch"
                                                                           name="example-checkbox2" value="option2">&nbsp;CSS</label>
                                                            </div>
                                                            <div class="checkbox mar-left5">
                                                                <label for="example-checkbox3ch">
                                                                    <input type="checkbox" id="example-checkbox3ch"
                                                                           name="example-checkbox3" value="option3">&nbsp;Javascript</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">Inline Checkboxes
                                                        </label>
                                                        <div class="col-md-9">
                                                            <div class="checkbox pull-left">
                                                                <label>
                                                                    <input type="checkbox" id="inline-checkbox50"
                                                                           name="example-inline-checkbox1"
                                                                           value="option1"> &nbsp;HTML &nbsp;</label>
                                                            </div>
                                                            <div class="checkbox pull-left">
                                                                <label>
                                                                    <input type="checkbox" id="inline-checkbox51"
                                                                           name="example-inline-checkbox2"
                                                                           value="option2"> &nbsp;CSS &nbsp;</label>
                                                            </div>
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input type="checkbox" id="inline-checkbox52"
                                                                           name="example-inline-checkbox3"
                                                                           value="option3"> &nbsp;Javascript &nbsp;
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label class="col-md-3 control-label"
                                                               for="inputFile9">File</label>
                                                        <div class="col-md-9 mar-top">
                                                            <input type="text" readonly="" class="form-control"
                                                                   placeholder="Browse...">
                                                            <input type="file" id="inputFile9">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label" for="inputFile10">Multiple
                                                            File
                                                        </label>
                                                        <div class="col-md-9 mar-top">
                                                            <input type="text" readonly="" class="form-control"
                                                                   placeholder="Browse...">
                                                            <input type="file" id="inputFile10" multiple="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group form-actions">
                                                        <div class="col-md-9 col-md-offset-3">
                                                            <button type="submit"
                                                                    class="btn btn-effect-ripple btn-primary">
                                                                Submit
                                                            </button>
                                                            <button type="reset" class="btn btn-effect-ripple btn-default form_full_reset1">
                                                                Reset
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Height Sizing of Input
                                                    Groups
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floating">
                                                                <div class="input-group input-group-lg"><span
                                                                            class="input-group-addon"><i
                                                                                class="material-icons lg-person">person</i> </span>
                                                                    <label class="control-label" for="input14"></label>
                                                                    <input type="text" id="input14"
                                                                           class="form-control input-lg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floating">
                                                                <div class="input-group input-group-lg"><span
                                                                            class="input-group-addon"><div
                                                                                class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox">
                                                                        </label>
                                                                    </div></span>
                                                                    <label class="control-label" for="input15"></label>
                                                                    <input type="text" id="input15"
                                                                           class="form-control input-lg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floating">
                                                                <div class="input-group input-group-lg">
                                                                            <span class="input-group-addon"><div
                                                                                        class="radio radio-primary">
                                                                        <label>
                                                                            <input type="radio">
                                                                        </label>
                                                                    </div></span>
                                                                    <label class="control-label" for="input16"></label>
                                                                    <input type="text" id="input16"
                                                                           class="form-control input-lg">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floatingr">
                                                                <div class="input-group"><span
                                                                            class="input-group-addon"><i
                                                                                class="material-icons">person</i> </span>
                                                                    <label class="control-label" for="input13"></label>
                                                                    <input type="text" id="input13"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floatingr">
                                                                <div class="input-group"><span
                                                                            class="input-group-addon"><div
                                                                                class="checkbox">
                                                                <label>
                                                                    <input type="checkbox">
                                                                </label>
                                                            </div></span>
                                                                    <label class="control-label" for="input21"></label>
                                                                    <input type="text" id="input21"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floating">
                                                                <div class="input-group">
                                                                            <span class="input-group-addon">
                                                                        <div class="radio radio-primary">
                                                                        <label>
                                                                            <input type="radio">
                                                                        </label>
                                                                    </div></span>
                                                                    <label class="control-label" for="input17"></label>
                                                                    <input type="text" id="input17"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floatingr">
                                                                <div class="input-group input-group-sm"><span
                                                                            class="input-group-addon"><i
                                                                                class="material-icons">person</i>   </span>
                                                                    <label class="control-label" for="input20"></label>
                                                                    <input type="text" id="input20"
                                                                           class="form-control input-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floatingr">
                                                                <div class="input-group input-group-sm"><span
                                                                            class="input-group-addon">
                                                                <div class="checkbox sm-box">
                                                                <label>
                                                                    <input type="checkbox">
                                                                </label>
                                                            </div></span>
                                                                    <label class="control-label" for="input19"></label>
                                                                    <input type="text" id="input19"
                                                                           class="form-control input-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-xs-4">
                                                            <div class="form-group label-floating">
                                                                <div class="input-group input-group-sm">
                                                                            <span class="input-group-addon"><div
                                                                                        class="radio radio-primary sm-radio">
                                                                        <label>
                                                                            <input type="radio">
                                                                        </label>
                                                                    </div></span>
                                                                    <label class="control-label" for="input18"></label>
                                                                    <input type="text" id="input18"
                                                                           class="form-control input-sm">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="panel panel-danger">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Twitter Bootstrap Form
                                                    Validation States
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group has-success label-floating">
                                                        <label class="control-label" for="inputSuccess1">User
                                                            name</label>
                                                        <input type="text" id="inputSuccess1" class="form-control">
                                                        <span class="help-block">User name is available</span>
                                                    </div>
                                                    <div class="form-group has-warning label-floating">
                                                        <label class="control-label"
                                                               for="inputWarning3">Password</label>
                                                        <input type="password" id="inputWarning3" class="form-control">
                                                        <span class="help-block">Password strength: Weak</span>
                                                    </div>
                                                    <div class="form-group has-error label-floating">
                                                        <label class="control-label" for="inputError3">Email</label>
                                                        <input type="email" id="inputError3" class="form-control">
                                                        <span class="help-block">Please enter a valid email address</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Login
                                                        </button>
                                                    </div>
                                                </form>
                                                <form class="form-horizontal">
                                                    <div class="form-group has-success has-feedback label-floating">
                                                        <label class="control-label" for="inputSuccess3">User
                                                            name</label>
                                                        <input type="text" id="inputSuccess3" class="form-control">
                                                        <span class="form-control-feedback"><i
                                                                    class="material-icons material_size text-success">done</i></span>
                                                        <span class="help-block">User name is available</span>
                                                    </div>
                                                    <div class="form-group has-warning has-feedback label-floating">
                                                        <label class="control-label" for="inputWarning">Password</label>
                                                        <input type="password" id="inputWarning" class="form-control">
                                                        <span class="form-control-feedback"><i
                                                                    class="material-icons material_size text-warning">warning</i></span>
                                                        <span class="help-block">Password strength: Weak</span>
                                                    </div>
                                                    <div class="form-group has-error has-feedback label-floating">
                                                        <label class="control-label" for="inputError">Email</label>
                                                        <input type="email" id="inputError" class="form-control">
                                                        <span class="form-control-feedback"><i
                                                                    class="material-icons material_size text-danger">close</i></span>
                                                        <span class="help-block">Please enter a valid email address</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary">Login
                                                        </button>
                                                    </div>
                                                </form>
                                                <!--min length ends-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-info">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="material-icons">assignment</i> Bootstrap Form Inputs
                                                </h3>
                                                <span class="pull-right">
                                                   <i class="material-icons clickable">keyboard_arrow_up</i>                                                     <i
                                                            class="material-icons removepanel clickable">clear</i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                                <form role="form" class="form-horizontal form_full3">
                                                    <div class="form-group label-floating">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                    class="material-icons">mail</i> </span>
                                                                <label class="control-label" for="addon33">Email</label>
                                                                <input type="email" id="addon33" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                    class="material-icons">vpn_key</i> </span>
                                                                <label class="control-label"
                                                                       for="pwd16">Password</label>
                                                                <input type="password" id="pwd16" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-success label-floating ">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                    class="material-icons">email</i> </span>
                                                                <label class="control-label" for="email33">Validation
                                                                    Email
                                                                </label>
                                                                <input type="email" id="email33"
                                                                       class="input-error form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group has-error label-floating ">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                                    class="material-icons">vpn_key</i> </span>
                                                                <label class="control-label" for="pwd17">Validation
                                                                    Password
                                                                </label>
                                                                <input type="password" id="pwd17"
                                                                       class="input-error form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon"><div
                                                                                    class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox">
                                                                        </label>
                                                                    </div></span>
                                                                <label class="control-label" for="input9">Checkbox Left
                                                                </label>
                                                                <input type="text" id="input9" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                <label class="control-label checkbox_right_label"
                                                                       for="input10">Checkbox right
                                                                </label>
                                                                <input type="text" id="input10"
                                                                       class="form-control checkbox_right">
                                                                <span class="input-group-addon">
                                                                        <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox">
                                                                        </label>
                                                                    </div></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                        <span class="input-group-addon"><div
                                                                                    class="radio radio-primary">
                                                                        <label>
                                                                            <input type="radio">
                                                                        </label>
                                                                    </div></span>
                                                                <label class="control-label" for="input12">Radio Left
                                                                </label>
                                                                <input type="text" id="input12" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <div class=" col-md-offset-2 col-md-8">
                                                            <div class="input-group">
                                                                <label class="control-label radio_right_label"
                                                                       for="input11">Radio right
                                                                </label>
                                                                <input type="text" id="input11"
                                                                       class="form-control radio_right">
                                                                <span class="input-group-addon">
                                                                        <div class="radio radio-primary">
                                                                        <label>
                                                                            <input type="radio">
                                                                        </label>
                                                                    </div></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group label-floating">
                                                        <div class="col-md-offset-2 col-md-8">
                                                            <label class="control-label"></label>
                                                            <p class="form-control">email@example.com</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-offset-2 col-md-8">
                                                            <label class="control-label">Readonly</label>
                                                            <input type="text" class="form-control" value="Read the text" readonly="">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-8 col-sm-offset-2">
                                                        <button type="submit" class="btn-success btn">Submit</button>
                                                        <button type="reset" class="btn-danger btn">Cancel</button>
                                                        <button type="reset" class="btn-default btn form_full_reset3">
                                                            Reset
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script src="{{ asset('assets/js/pages/form_reset.js') }}" type="text/javascript"></script>
@stop
