@extends('admin/layouts/default')


{{-- Page title --}}
@section('title')
Payments
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
@stop


{{-- Page content --}}
@section('content')
<section class="content-header">
    <h1>Payments</h1>
    <ol class="breadcrumb">
        <li>
            <a href="">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li>Payments</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Payments
                    </h3>

                </div>
                <div class="panel-body">
                    <!--main content-->
                    <div class="row">

                        <div class="col-md-12">
                            @if($errors->any())
                            <div id="notification_remove">
                                @foreach ($errors->all() as $error)
                                <div class="text-danger">{{ $error }}</div>
                                @endforeach
                            </div>
                            @endif


                            <div>

                                <ul style="background:none" class="nav nav-tabs ">
                                    <li class="active">
                                        <a class="panel-title" href="#tab1" data-toggle="tab">
                                            Individual Event Payments</a>
                                    </li>
                                    <li>
                                        <a class="panel-title" href="#tab2" data-toggle="tab">
                                            Group Event Payments</a>
                                    </li>


                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="tab1">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <table class="table table-striped table-bordered" id="table2" style="text-transform: capitalize;">
                                            <thead class="thead-Dark">
                                                <tr>
                                                    <th style="text-align: center;">League</th>
                                                    <th style="text-align: center;">Organization Name</th>
                                                    <th style="text-align: center;">Venue</th>
                                                    <th style="text-align: center;">Total Amount</th>

                                                    <th style="text-align: center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($leagueIndividualEvents as $league)
                                                <?php
                                                $clubs = array();

                                                $clubCount = 0;
                                                $total = 0;
                                                foreach ($league->registrations->where('payment_method', 0) as $reg) {
                                                    if ($reg->user->club_id == Auth::user()->club_id) {
                                                        if($reg->is_approved==1){

                                                     $clubCount++;
                                                    }
                                                }
                                                }
                                                
                                                if ($clubCount > 0) {
                                                ?>

                                                    <tr>

                                                        <td>{{ $league->name }}</td>
                                                        <td>
                                                            {{ $league->organization->name }}
                                                        </td>
                                                        <td>{{ $league->venue->name }}</td>
                                                        @php
                                                        foreach($league->registrations->where('payment_method',0) as $group){
                                                        if($group->user->club_id == Auth::user()->club_id){
                                                            if($group->is_approved==1){
                                                                $total=$total+$group->totalfee;

                                                            }
                                                        }
                                                        }
                                                        @endphp
                                                        <td class="total" value="{{$total}}"> {{ $iso }} {{$total}}</td>
                                                        <td><a href="/info/single-events/{{$league->id}}"><button style="padding: 2px 4px" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="View Invoice"><img style="margin:3px;" src="{{ asset('assets/images/icons/invoice.png') }}"></button></a></td>



                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="row col-md-12 col-sm-12 col-lg-12 align-left">
                                        <a class="previous"  href="#tab2" data-toggle="tab">
                                        Next&raquo;
                                        </a>
                                        </div>
                                        


                                    </div>
                                    <div class="tab-pane fade" id="tab2" disabled="disabled">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <table class="table table-striped table-bordered" id="table2" style="text-transform: capitalize;">
                                            <thead class="thead-Dark">
                                                <tr>
                                                    <th style="text-align: center;">League</th>
                                                    <th style="text-align: center;">Organization Name</th>
                                                    <th style="text-align: center;">Amount</th>
                                                    <th style="text-align: center;">Venue</th>
                                                    <th style="text-align: center;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                   @foreach ($leagueIndividualEvents as $league)
                                                <?php
                                                $clubGroupCount = 0;
                                                $totalGroup = 0;
                                                foreach ($league->groupRegistrations->where('payment_method', 0) as $reg) {
                                                    if ($reg->club_id == Auth::user()->club_id) {
                                                     $clubGroupCount++;
                                                }
                                                }

                                                if ($clubGroupCount > 0) {
                                                ?>

                                                    <tr>

                                                        <td>{{ $league->name }}</td>
                                                        <td>
                                                            {{ $league->organization->name }}
                                                        </td>
                                                        @php
                                                        foreach ($league->groupRegistrations->where('payment_method', 0) as $reg) {
                                                    if ($reg->club_id == Auth::user()->club_id) {
                                                                $totalGroup=$totalGroup+$reg->totalfee;

                                                            }
                                                        }
                                                        @endphp
                                                        <?php
                                                         if ($clubGroupCount > 0){
                                                            ?>
                                                        <td class="total" value="{{$totalGroup}}"> {{ $iso }} {{$totalGroup}}</td>
                                                                                                                <td>{{ $league->venue->name }}</td>

 @if($league->status==0)

                                                    <td><a href="/invoice/future/group/{{ $league->id }}"><button style="padding: 2px 4px" value="{{ $league->id }}" class=" btn btn-info" data-toggle="tooltip" data-placement="top" title="View Invoice"><img style="margin:3px;" src="{{ asset('assets/images/icons/invoice.png') }}"></button></a></td>
                                                    
                                                    @endif


                                                    </tr>
                                                    <?php 
                                                         }
                                                         ?>
                                                <?php
                                                }
                                                ?>
                                                @endforeach
                                               
                                            </tbody>
                                        </table>
                                        <a class="next" href="#tab1" data-toggle="tab">
                                            &laquo;Previous
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--row end-->
</section>
@stop

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script>
    // $('.total[value="0"]').closest("tr").hide();
    $(document).ready(function($){
      $('.previous').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});
$('.next').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
    });
    $(document).on('click', '.invoice', function() {
        var transId = $(this).attr('data-transId');
        var league = $(this).val();
        $.ajax({
            type: "GET",
            data: {
                "transId": transId,
                "league": league,
            },
            url: "/invoice/future",

            success: function(response) {
                window.location.href = response.url;
            }
        });

    });
</script>
@stop