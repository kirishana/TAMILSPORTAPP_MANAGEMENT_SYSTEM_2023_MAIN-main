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
                    {{ $event->mainEvent->name }} - {{ $gender->gender->name }} - ({{ $gender->ageGroupEvent->ageGroup->name }})
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">

                <div class="panel-body table-responsive">
                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                 <th>Round Name</th>
                                 <th>Results</th>
                                    <th>Teams</th>
                                    <th>Club</th>
                            </tr>
                        </thead>
                        @if($users <= 3)
                        <form class="myFormId" method="get">
                            <tbody>                               
                                <tr>
                                <td rowspan=<?php echo count($players)?>>Round 1</td>
                                    <td>
                                        @foreach ($players as $key => $player)

                                        <input type="number" style="width:40%" class="time" id="time" name="time[]" data-id="{{$player['id']}}" data-userId="{{$player['name']}}"  value="{{ $player['pivot']['time']? $player['pivot']['time']:''}}" min="1">
                                        <br> <br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->id }}" id="gender">
                                        <input type="hidden" value="{{ $event->id }}" id="event">    
                                        @endforeach
                                    </td>   
                                    
                          
                                    <td>
                                        @foreach ($players as $key => $player)
                                        {{ $player['name']}}
                                        <br><br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($players as $key => $player)
                                        {{ $player->club->club_name}}
                                        <br><br>
                                        @endforeach
                                    </td>
                                   
                                </tr>
                                </form>
                        @elseif($users <= $trackCount) 
                        <form class="myFormId" method="get">
                            <tbody>                               
                                <tr>
                                <td rowspan=<?php echo count($players)?>>Round 1</td>
                                @foreach ($players as $key => $player)
                                    <td>
                                        @foreach ($player as $play)

                                        @if($play!=null)
                                        <input type="number" style="width:20%" class="time" id="time" name="time[]" data-id="{{$play['id']}}" data-userId="{{$play['name']}}" value="{{ $play['pivot']['time']? $play['pivot']['time']:''}}" min="1">
                                        <br> <br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->id }}" id="gender">
                                        <input type="hidden" value="{{ $event->id }}" id="event">    
                                        @endif                                   
                                        @endforeach
                                    </td>   
                                    @endforeach       
                                    @foreach ($players as $key => $player)
                          
                                    <td>
                                        @foreach ($player as $play)

                                        @if($play!=null)
                                        {{ $play['name']}}
                                        <br><br>
                                        @endif
                                        @endforeach
                                    </td>
                                    @endforeach
                                    @foreach ($players as $key => $player)
                          
                                    <td>
                                        @foreach ($player as $play)

                                        @if($play!=null)
                                        @php
                                        $club=App\Models\Club::find($play['club_id']);
                                    @endphp
                                        {{ $club->club_name}}
                                        <br><br>
                                        @endif
                                        @endforeach
                                    </td>
                                    @endforeach
                                </tr>
                                </form>
                                @else


                            <tbody>
                                <form id="heats" action="/track/heats" method="get">





                                    @foreach ($players as $key => $player)
                                    <tr>
                                        <td>Round {{$key}}</td>

                                        <td>
                                            @foreach ($player as $play)

                                            @if($play!=null)
                                            <div class="row">
                                                <input type="checkbox" name="players[]" value="{{$play['id']}}" data-name="{{$play['name']}}">

                                                {{ $play['name'] }}
                                                <br>
                                                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                <input type="hidden" value="{{ $gender->id }}" name="gender" id="gender">
                                                <input type="hidden" value="{{ $event->id }}" name="event" id="event">



                                            </div>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($player as $play)
                                            @if($play!=null)
                                            <div class="row">
                                            @php
                                                $club=App\Models\Club::find($play['club_id']);
                                            @endphp
                                                {{ $club->club_name}}
                                                <br>
                                               
                                            </div>
                                            @endif
                                            @endforeach
                                        </td>

                                    </tr>


                                    @endforeach

                                    @endif

                            </tbody>
                    </table>

                </div>
            </div>

            @if($users <= $trackCount)
             <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-labeled btn-primary finish" data-id="{{$gender->id}}">
                        Finish
                        <span class="btn-label cool_btn_right">
                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                        </span>
                    </button>
                </div>

        </div>
        @else
        <div class="row">
            <div class="col-md-10">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-labeled btn-primary updateHeats">
                    Next
                    <span class="btn-label cool_btn_right">
                        <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                    </span>
                </button>

            </div>

        </div>
        @endif
        </form>

</section>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Participants Results</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Team</th>
                                <th>Results</th>
                            </tr>
                        </thead>
                        <tbody id="users"></tbody>
                        <input type="hidden" id="id">
                        <input type="hidden" id="eventSelected">
                        <input type="hidden" id="genderSelected">
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success update">Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>

<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Selected Participants</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <table class="table table-striped" style="border: 1px;">
                        <tr>
                            <th>Teams</th>
                        </tr>
                        <tbody id="participants">
                        </tbody>

                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success heatsUpdate">Update</button>
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

$(".finish").on('click', function() {
        $('#myModal2').modal('show');
            var values = new Array();
            var gender = $("#gender").val();
    
            var event = $('#event').val();   
 
        $('#eventSelected').val(event);
         $('#genderSelected').val(gender);
                    $("#users").empty();
                     var method=2;
                    $("input[type='number']").each(function() {
                        var number = $(this).attr('data-userId');
                        var name=$(this).attr('data-id');
                        var results = $(this).val();
                        $("#users").append("<tr>" +
                            "<td>" + number + "</td>" +
                            "<td>" + results + "</td>" +
                            "<td style='display:none'>" + name + "</td>" +

                             "</tr>");
        });
                
  });
    $(".update").on('click', function() {
    
        var id=$('#genderSelected').val();
        var event=$('#eventSelected').val();
        var method=2;
        var team=new Array();
        var players=new Array();
 $('#users tr').each(function(index, tr) {
 var player=$(this). closest("tr"). children("td:nth-child(3)"). text();
players.push(player);
 var result=$(this). closest("tr"). children("td:nth-child(2)"). text();
team.push(result);
});

    resultsWithPlayers = players.reduce(function (previous, key, index) {
        previous[key] = team[index];
        return previous
    }, {})


              $.ajax({
                 url: "/results/" + id,
                 method: "POST",
                 data: {
                     "event": event,
                     "method":method,
                     "playerResults":resultsWithPlayers,
                },
                 success: function(response) {
                    $('#myModal2').modal('hide');
                     window.location.href=response.url;

                 }
             });
    });
    $(document).on('click', '.updateHeats', function(e) {

        $('#myModal3').modal('show');
        var selectedLanguage = new Array();
        $("#participants").empty();
        $("input[name='players[]']").filter(':checked').each(function() {
            var name = $(this).attr('data-name')
            $("#participants").append("<tr>" +
                "<td>" + name + "</td>" +

                "</tr>");
            // selectedLanguage.push(pushedValue);
        });


    });

    $(".heatsUpdate").on('click', function() {
        $("#heats").submit();
    });
    // $(".finish").on('click', function() {

    //     $("#myFormId").submit();

    //     });
</script>

@stop