@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Show Notification
@parent
@stop

    {{-- page level styles --}}
    @section('header_styles')
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet" />

    @stop
        {{-- Page content --}}
        @section('content')
        <section class="content-header">

            <!-- section starts -->
            <h1>Notifications</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/admin/">
                        <i class="material-icons breadmaterial">home</i>
                        Dashboard
                    </a>
                </li>
                <li class="active">Notifications</li>

            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">

                    <div class="tab-content mar-top">
                        <div id="tab1" class="tab-pane fade active in">
                            <div class="row">
                                <div class="col-lg-12">
                                    <section class="content paddingleft_right15">
                                        <div class="row">
                                            <div class="panel">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">
                                                        <i class="bi bi-chat-square"></i>
                                                        Notifications

                                                    </h3>

                                                </div>
                                                <div class="table-responsive">
                                                    <div class="panel-body">
                                                        <!-- <div class="col-md-0"></div>  -->
                                                        <!-- <div class="col-md-5">  -->
                                                        <div class="col-md-3">
                                                        </div>
                                                        <div class="table-responsive">
                                                            <div class="col-md-8">
                                                                <table class="table table-bordered table-striped">
                                                                    
                                                                    <tr>

                                                                        <th class="col-md-3">Organization</th>
                                                                        <td>{{ $notification->data['org'] }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th class="col-md-3">League</th>
                                                                        <td>{{ $notification->data['league'] }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th class="col-md-3">Event</th>
                                                                        <td>{{ $notification->data['name'] }}
                                                                        </td>
                                                                    </tr>
                                                                    @if(Auth::user()->hasRole(5)||Auth::user()->hasRole(6)||Auth::user()->hasRole(3))
                                                                    <tr>

                                                                        <th class="col-md-3">AgeGroup</th>
                                                                        <td>{{ $notification->data['ageGroup'] }}
                                                                        </td>
                                                                    </tr>
                                                                    <tr>

                                                                        <th class="col-md-3">Gender</th>
                                                                        <td>{{ $notification->data['gender'] }}
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                    <tr>
                                                                        <th class="col-md-3">Information</th>
                                                                        <td class="text-justify">
                                                                            {{ $notification->data['body'] }}
                                                                        </td>
                                                                    </tr>
                                                                   
                                                                </table>

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
                </div>
            </div>
        </section>
        </div>
        </section>
        @endsection
