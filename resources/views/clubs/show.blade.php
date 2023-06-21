@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
View Club Details
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/vendors/x-editable/css/bootstrap-editable.css') }}" rel="stylesheet"/>
<link href="{{ asset('assets/css/pages/user_profile.css') }}" rel="stylesheet"/>
@stop
{{-- Page content --}}
@section('content')
    <section class="content-header">
        <!--section starts-->
        <h1>{{ __('sidebar.clubs') }}</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin/">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li>Clubs</li>

            <li class="active">View</li>
        </ol>
    </section>
    <!--section ends-->


<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  leftsize">group</i>
                    {{ $club->club_name }} {{ __('club.info') }}
                </h4>
            </div>

            <!-- <div class="panel-body">
                <div class="row">
                    <div class="col-lg-12">
                        <img src="{{ asset('assets/images/authors/avatar5.png') }}" alt="..." class="img-responsive" style="border-radius: 50%; widt:150px;height:150px;"/>
                    </div>
                </div>
            </div> -->


            <div class="panel-body">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                <a href="/club/edit/{{$club->id}}">                                                
                                                    <button  class="btn btn-primary" style="float:right">{{ __('club.edit') }}</button>
                                                </a>
                                                <table class="table table-bordered" id="clubs">


                                                    <tr>
                                                        <th>{{ __('club.reg_no') }}</th>
                                                            <td>{{$club->club_registation_num}}</td>
                                                        </tr> 
                                                    <tr>
                                                        <td>{{ __('club.club_name') }}</td>
                                                        <td>
                                                            {{ $club->club_name }}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('dashboard.email') }}</td>
                                                        <td>  {{ $club->club_email }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{ __('club.establish_date') }}
                                                        </td>
                                                        <td>
                                                            {{ $club->club_start_date }}
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>{{ __('club.mobile') }}</td>
                                                        <td>
                                                            {{ $club->mobile }}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('dashboard.phone_no') }}</td>
                                                        <td>
                                                            {{ $club->tpnumber }}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('dashboard.address') }}</td>
                                                        <td>
                                                            {{ $club->address }}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('dashboard.city') }}</td>
                                                        <td>
                                                            {{ $club->city }}
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('dashboard.postal_code') }}</td>
                                                        <td>  {{ $club->postal }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            {{ __('club.country') }}
                                                        </td>
                                                        <td>
                                                            {{ $club->country->name}}
                                                        </td>
                                                    </tr>
                                                    </table>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>





            <!-- <div class="row">
                    <div class="col-lg-5">
                        <div class="table-responsive"> -->
                                                    <!-- <table class="table table-bordered" id="clubs">

                                                        <tr>
                                                            <td>Club Register Number</td>
                                                            <td>
                                                                {{ $club->club_registation_num }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Club Name</td>
                                                            <td>
                                                                {{ $club->club_name }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Club Email</td>
                                                              <td>  {{ $club->club_email }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Club Start Date
                                                            </td>
                                                            <td>
                                                                {{ $club->club_start_date }}
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>Mobile Number</td>
                                                            <td>
                                                                {{ $club->mobile }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Telephone Number</td>
                                                            <td>
                                                                {{ $club->tpnumber }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td>
                                                                {{ $club->address }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>City</td>
                                                            <td>
                                                                {{ $club->city }}
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>Postal Code</td>
                                                              <td>  {{ $club->postal }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                Country
                                                            </td>
                                                            <td>
                                                                {{ $club->country }}
                                                            </td>
                                                        </tr>
                                                    </table> -->         
                                                <!-- </div>
                                            </div>
            </div> -->
        </div>
    </div>
</section>
    
    

@stop
