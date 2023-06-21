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
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }} - {{ $gender->gender->name }}
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                @if($users->count()<=$trackCount)
@else
                                <th>Round Name</th>
                                @endif
                                <th>Team</th>
                                <th>Club</th>
                            </tr>
                        </thead>
                        <tbody>
                            <form action="/track/heats/starter" method="get">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                            <input type="hidden" value="{{ $gender->id }}" name="gender">
                            @if($users->count()<=$trackCount)
                            <br>
                            @foreach ($players as $key => $player)
                            @if($player)

                                    <tr style="width:20%">
                                
                                        <td style="width:20%">
                                       {{$player['name']}}<br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->ageGroupEvent->Event->id }}" name="event">




                                    </td>
                                            <td style="width:20%">
                                       @php
$club=App\Models\Club::find($player['club_id']);
@endphp
{{$club->club_name}}<br>
                                        

                                    </td>
                                  
                                </tr>
                                @endif
                            @endforeach


                            @elseif($users->count()>$trackCount)
                            
                            @foreach ($players as $key => $player)
@if($player)
                            <tr>
                                <td>Round {{$key}}</td>
                                
                                <td>
                                    @foreach ($player as $key => $play)
@if($play!=null)
{{$play['name']}} <br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->ageGroupEvent->Event->id }}" name="event">




                                    @endif
                                    @endforeach
                                </td>
                                        <td>
                                    @foreach ($player as $key => $play)
@if($play!=null)
@php
$club=App\Models\Club::find($play['club_id']);
@endphp
{{$club->club_name}}
 <br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->ageGroupEvent->Event->id }}" name="event">




                                    @endif
                                    @endforeach
                                </td> 

                            </tr>

@endif
                            @endforeach
                        </div>
                    </table>  
                    @endif
                                @if($users->count()<=$trackCount)
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
            </div>
            </form>

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