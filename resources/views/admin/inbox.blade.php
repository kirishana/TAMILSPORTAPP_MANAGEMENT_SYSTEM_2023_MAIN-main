@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Inbox
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/alertmessage.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/mail_box.css') }}" rel="stylesheet" type="text/css"/>
    <!-- page level css ends-->
@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <h1>Inbox</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/inbox') }}">Email</a>
            </li>
            <li class="active">Inbox</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row web-mail">
            <div class="col-lg-2 col-md-3 col-sm-4">
                <div class="whitebg">
                    <ul>
                        <li class="compose">
                            <a href="{{ URL::to('admin/compose') }}">
                                <i class="material-icons">mode_edit</i>
                                &nbsp; &nbsp;Compose
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/inbox') }}">
                                <i class="material-icons">inbox</i>
                                &nbsp; &nbsp;Inbox
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/sent') }}">
                                <i class="material-icons">check_circle</i>
                                &nbsp; &nbsp; Sent
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/trash') }}">
                                <i class="material-icons">delete</i>
                                &nbsp; &nbsp; Trash
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/spam') }}">
                                <i class="material-icons">visibility_off</i>
                                &nbsp; &nbsp; Spam
                            </a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/draft') }}">
                                <i class="material-icons">drafts</i>
                                &nbsp; &nbsp; Draft (10)
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-10 col-md-9 col-sm-8">
                <div class="whitebg">
                    <table class="table table-striped table-advance table-hover" id="inbox-check">
                        <thead>
                        <tr>
                            <td colspan="6">
                                <div class="col-md-8">
                                    <h4>
                                        <strong>Inbox</strong>
                                    </h4>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="6">
                                <div class="row">
                                    <div class="col-md-8 col-lg-9 col-xs-12">
                                        <div class="checkbox btn-group pull-left table-bordered paddingrightleft_10 paddingtopbottom_5px">
                                            <label>
                                                <input type="checkbox" id="checkall">
                                            </label>
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                                <span class="caret"></span>
                                            </a>
                                            <ul class="dropdown-menu ul">
                                                <!-- dropdown menu links -->
                                                <li>
                                                    <a href="#">All</a>
                                                </li>
                                                <li>
                                                    <a href="#">None</a>
                                                </li>
                                                <li>
                                                    <a href="#">Read</a>
                                                </li>
                                                <li>
                                                    <a href="#">UnRead</a>
                                                </li>
                                                <li>
                                                    <a href="#">Starred</a>
                                                </li>
                                                <li>
                                                    <a href="#">Unstarred</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="btn-group pull-left table-bordered paddingrightleft_10 paddingtopbottom_5px margin_left refresh-icon">
                                            <i class="material-icons mate-icon-refresh">refresh</i>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-3 col-xs-12">
                                        <div class="pull-right">
                                            <ul class="pagination ">
                                                <li class="disabled"><a href="javascript:void(0)">«</a></li>
                                                <li>
                                                    <a>1 - 18 of 228</a>
                                                </li>
                                                <li><a href="javascript:void(0)">»</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr data-messageid="1" class="unread">
                            <td style="width:4%;" class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td style="width:2%; center:block;" class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td style="width:22%;" class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">John</a>
                            </td>
                            <td style="width:56%;" class="view-message ">
                                <a href="view_mail">Fwd: Make changes as needed</a>
                            </td>
                            <td style="width:3%;" class="view-message inbox-small-cells">
                                <a href="view_mail">
                                    <i class="material-icons">attach_file</i>
                                </a>
                            </td>
                            <td style="width:13%;" class="view-message text-right">
                                <a href="view_mail">16:30 PM</a>
                            </td>
                        </tr>
                        <tr data-messageid="2" class="unread">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Marin</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="3">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Jenny</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Mobile-First Type & Layout</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="4">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Twiter</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">This looks like borrows page</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="5">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Grace</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="6">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Kimy</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Analysis on Views</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail">
                                    <i class="material-icons">attach_file</i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="7">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Tony</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail">
                                    <i class="material-icons">attach_file</i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="8">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Sandy</a>
                            </td>
                            <td class="view-message view-message">
                                <a href="view_mail">Analysis on Views</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="9">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Avin</a>
                            </td>
                            <td class="view-message view-message">
                                <a href="view_mail">Mobile-First Type & Layout</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="10">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">MJ</a>
                            </td>
                            <td class="view-message view-message">
                                <a href="view_mail">Make changes as needed</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="11">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Lofer</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Welcome back to here</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="12">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="hidden-xs">
                                <span class="view-message hidden-xs">
                                    <a href="view_mail">
                                        <img data-src="holder.js/25x25/#000:#fff"
                                             class="img-circle img-responsive pull-left" alt="Image">Renny
                                    </a>
                                </span>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Dolor sit amet, consectetuer adipiscing</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail">
                                    <i class="material-icons">attach_file</i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="13">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Benny</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">This looks like borrows page</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail">
                                    <i class="material-icons">attach_file</i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="14">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="hidden-xs">
                                <span class="view-message hidden-xs">
                                    <a href="view_mail">
                                        <img data-src="holder.js/25x25/#000:#fff"
                                             class="img-circle img-responsive pull-left" alt="Image">Grace
                                    </a>
                                </span>
                            </td>
                            <td class="view-message view-message">
                                <a href="view_mail">Analysis on Views</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="15">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Mike</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="16">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Clark</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Make changes as needed</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        <tr data-messageid="17">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">Robin</a>
                            </td>
                            <td class="view-message">
                                <a href="view_mail">Mobile-First Type & Layout</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail"></a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 15</a>
                            </td>
                        </tr>
                        <tr data-messageid="18">
                            <td class="inbox-small-cells">
                                <div class="checkbox checker">
                                    <label>
                                        <input type="checkbox" class="mail-checkbox">
                                    </label>
                                </div>
                            </td>
                            <td class="inbox-small-cells">
                                <i class="material-icons rating">star_rate</i>
                            </td>
                            <td class="view-message hidden-xs">
                                <a href="view_mail">
                                    <img data-src="holder.js/25x25/#000:#fff"
                                         class="img-circle img-responsive pull-left" alt="Image">FB</a>
                            </td>
                            <td class="view-message view-message">
                                <a href="view_mail">Ya comin' to our July webinar?</a>
                            </td>
                            <td class="view-message inbox-small-cells">
                                <a href="view_mail">
                                    <i class="material-icons">attach_file</i>
                                </a>
                            </td>
                            <td class="view-message text-right">
                                <a href="view_mail">June 14</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript">
        $('#slimscrollside').slimscroll({
            height: '700px',
            size: '3px',
            color: 'black',
            opacity: .3
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#inbox-check #checkall").click(function () {

                if ($("#inbox-check #checkall").is(':checked')) {
                    $("#inbox-check input[type=checkbox]").each(function () {
                        $(this).prop("checked", true);
                    });
                } else {
                    $("#inbox-check input[type=checkbox]").each(function () {
                        $(this).prop("checked", false);
                    });
                }
            });
        });
    </script>

@stop
