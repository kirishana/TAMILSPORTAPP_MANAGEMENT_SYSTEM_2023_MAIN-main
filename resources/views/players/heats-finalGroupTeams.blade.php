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
                <form action="/events" method="get">
                    <table class="table table-striped table-bordered events" style="width:80%;margin-right:auto;margin-left:auto;">
                        <thead class="thead-Dark">
                        <tr>
                            <th>Final List Teams</th>
                            <th>Club</th>
                        </tr>
                    </thead>
                    <tbody>
                                    <input type="hidden" value="{{ $gender->id }}" name="participants">

                                    @foreach ($players as $player)
                                    <tr>
                                    <td>
                                    {{ $player->name }}

                                    </td>
                                   <td>
                                    {{ $player->club->club_name }}
                                   </td>




                            </tr>
                            @endforeach

                        
                       

                    </tbody>




                </table>
                <div class="row" style="width:80%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-11">
                        {{-- <label class="control-label" for="dob">Heats Final Round Date</label>
                        <input id="" name="finalDate"  type="date" min="{{ $today }}" class="form-control">                   --}}
                    </div>
                    <div class="col-md-1">
                <button class="btn btn-success" type="submit" style="text-transform:uppercase">Finish</button>
                    </div>
            </form>
            </div>
        </div>


       
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
                url: "/event/heats/finish/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "time": time,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    $('.events').html(response['html']);
                }
            });

        });



        $(".rank").on('change', function() {
            var rank = $(this).val();
            var player = $(this).data("id");
            var id = $("#gender").val();
            var method = $('#_method').val();
            var event = $('#event').val();
            $.ajax({
                url: "/event/heats/finish/rank/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "rank": rank,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    $('.events').html(response['html']);
                }
            });

        });
    });
</script>

@stop