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
                    {{ $event->mainEvent->name }} - {{ $gender->gender->name }} - ({{ $ageGroup }})
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Round Name</th>
                                <th>Player Number</th>
                                <th>Players</th>
                            </tr>
                        </thead>


                        <tbody>
                            @if(Auth::user()->hasRole(6))

                            <form action="/track/heats" method="get" id="myFormId">
                                @else
                                <form action="/track/heats/starter" method="get">

                                    @endif
                                    <br>
                                    @foreach ($players as $key => $chunk)
<tr>
                                        <td>Round {{$key++}}</td>

                                        <td>
                                            <div class="row">

                                                @foreach ($chunk as $player)
                                                @if(Auth::user()->hasRole(6))
@if($player)

<input type="checkbox" name="players[]" value="{{$player['id']}}" data-id="{{ $player['userId'] }}" data-name="{{$player['first_name']}}">
@endif
@endif

@if($event->mainEvent->event_category_id==1)
@if($player)
{{ $player['userId'] }}
@endif 
 <br>
                                                
                                                @endif
                                                @if($event->mainEvent->event_category_id==3)
{{ $player->name }}
@endif
                                              
                                                
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                <input type="hidden" value="{{ $gender->id }}" name="gender">
                                                <input type="hidden" value="{{ $event->id }}" name="event">
                                                @endforeach




                                            </div>
                                        </td>
                                        <td>
                                            <div class="row">

                                                @foreach ($chunk as $player)

                                                @if($event->mainEvent->event_category_id==3)
{{ $player->name }}
@endif
@if($event->mainEvent->event_category_id==1)
@if($player)

                                                {{ $player['first_name'] }} - {{ $player['last_name'] }}
                                                @endif
                                                @endif                                                
                                                <br>
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                <input type="hidden" value="{{ $gender->id }}" name="gender">
                                                <input type="hidden" value="{{ $event->id }}" name="event">
                                                @endforeach




                                            </div>
                                        </td>

                                    </tr>


                </div>
                </td>


                </tr>
                @endforeach

                </tbody>
                </table>

            </div>
        </div>

        <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
                @if(Auth::user()->hasRole(6))
                <button type="button" class="btn btn-labeled btn-primary next">
                    Next
                    <span class="btn-label cool_btn_right">
                        <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                    </span>
                </button>
                @else
                <button type="submit" class="btn btn-labeled btn-primary">
                    Next
                    <span class="btn-label cool_btn_right">
                        <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                    </span>
                </button>
                @endif
            </div>

        </div>
        </form>

</section>

<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Selected Participants</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <table class="table table-striped" style="border: 1px;" >
                        <tr>
                            <th>Participants Number</th>
                            <th>Participants Name</th>
                        </tr>
                        <tbody id="participants" >
                        </tbody>

                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success heatsFinal">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>

<script>
          $(document).on('click', '.next', function(e) {
            $('#myModal2').modal('show');
            var selectedLanguage = new Array();
            $("#participants").empty();
            $("input[name='players[]']").filter(':checked').each(function() {
                var pushedValue = $(this).attr('data-id');
                var name = $(this).attr('data-name')
                $("#participants").append("<tr>" +
                    "<td>" + pushedValue + "</td>" +
                    "<td>" + name + "</td>" +

                    "</tr>");
                // selectedLanguage.push(pushedValue);
            });
        

    });
    $(".heatsFinal").on('click',function(){
            $("#myFormId").submit();
        });
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