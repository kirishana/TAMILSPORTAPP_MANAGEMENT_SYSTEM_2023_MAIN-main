@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<style>
    @media (max-width:340px) {
        .button-group .button {
            padding: 0 10px !important;
        }
    }
</style>
@stop



@section('content')
<section class="content-header">
    <h1>Events</h1>
    <ol class="breadcrumb">
        <li>
            <a href="/admin">
                <i class="material-icons breadmaterial">home</i>
                Dashboard
            </a>
        </li>
        <li><a href=""> Events</a></li>
        <li class="active">All Events</li>
    </ol>
</section>

<!-- Main content -->
<section class="content paddingleft_right15">
    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    {{ $event->mainEvent->name }} - {{ $gender->gender->name }}-({{$gender->ageGroupEvent->ageGroup->name}})
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Round Name</th>
                                <th>Track Number</th>
                                <th>Player Number</th>
                                <th>Player Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="/track/heats/starter" method="get">
                                <input type="hidden" value="{{ $gender->id }}" name="gender">
                                <input type="hidden" value="{{ $event->id }}" name="event">
                            <br>
                            @foreach ($players as $key => $chunk)
                            
                            <tr>
                                <td>Round {{$key}}</td>
 <td>
                                    <div class="row">

                                        @foreach ($chunk as $ch=>$player)
                                        @if($player)
                                        {{ ++$ch}} <br>
                                       @endif
                                        @endforeach




                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        @foreach ($chunk as $player)
                                        @if($player)
                                        @if($player['userId'])
                                        {{ $player['userId']}} <br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->id }}" id="gender">
                                        <input type="hidden" value="{{ $event->id }}" id="event">
                                        @endif
                                        @endif
                                        @endforeach




                                    </div>
                                </td>
                                <td>
                                    <div class="row">

                                        @foreach ($chunk as $player)
                                        @if($player)
                                        {{ $player['first_name']}}- {{ $player['last_name']}} <br>
                                        @endif
                                        @endforeach




                                    </div>
                                </td>

                            </tr>

                            @endforeach
                        </table>

                        @if(count($players)==1) 

            @else
            <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-labeled btn-primary">
                        Next
                        <span class="btn-label cool_btn_right">
                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                        </span>
                    </button>

                </div>

            </div>
            @endif
            </form>
        </div>
</section>


@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function($) {
        $(".time").on('change', function() {
            var time = $(this).val();
            var player = $(this).data("id");
            var id = $("#gender").val();
            var method = $('#_method').val();
            var event = $('#event').val();
            $.ajax({
                url: "/event/finish/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "time": time,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    window.location.href = response.url;

                }
            });

        });
    });
</script>

@stop