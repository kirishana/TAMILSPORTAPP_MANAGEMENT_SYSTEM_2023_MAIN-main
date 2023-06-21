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
                        <thead class="thead-Dark">
                            <tr>
                                <th>Round Name</th>
                                <th>Players</th>
                            </tr>
                        </thead>
                        @if(Auth::user()->organization->athelaticsetting->track_event_method==1)
                        <form action="/results" id="myFormId" method="get">

                        <tbody>

                            <br>
                            @foreach ($players as $key => $chunk)
                            @if($lastPlayerCount==1||$lastPlayerCount==2)

                            <tr>
                                <td>Round {{++$key}}</td>

                                <td>
                                    <div class="row">

                                        @foreach ($chunk->take($playerCpunt) as $player)
                                        {{ $player->first_name }}
                                        <input type="text" placeholder="H:i" class="time" id="time" name="time[]" data-id="{{$player->id}}" value="{{ $player->pivot->time? $player->pivot->time:''}}"><br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->id }}" id="gender">
                                        <input type="hidden" value="{{ $event->id }}" id="event">
                                        
                                        @endforeach




                                    </div>
                                </td>

                            </tr>

                            @else
                            <tr>
                                <td>Round {{++$key}}</td>

                                <td>
                                    <div class="row">
                                        <?php
                                        $array = array();

                                        ?>

                                        @foreach ($chunk as $player)

                                        {{ $player->first_name }}
                                        <input type="text" placeholder="H:i" class="time" id="time" name="time[]" data-id="{{$player->id}}" value="{{ $player->pivot->time? $player->pivot->time:''}}"><br>
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                        <input type="hidden" value="{{ $gender->id }}" id="gender">
                                        <input type="hidden" value="{{ $event->id }}" id="event">
                                        <?php
                                        $array[] = $player->id;

                                        ?>
                                        @endforeach



                                    </div>
                                </td>


                            </tr>
                            @endif
                            @endforeach
                            @if($lastPlayerCount==1||$lastPlayerCount==2)

                            <?php
                            $user = App\Models\AgeGroupGender::where('id', $gender->id)->first();
                            $sormam = $user->teams;
                            $playerLists = array();

                            ?>
                            @foreach($sormam as $sor)

                            <?php
                            $playerLists[] = $sor->id
                            ?>
                            @endforeach
                            <?php
                            $lists = array();
                            ?>
                            @foreach ($players as $key=>$chunk)
                            @foreach ($chunk->take($playerCpunt) as $player)
                            <?php
                            $lists[] = $player->id;
                            ?>
                            @endforeach
                            @endforeach
                            <?php
                            $array1 = $lists;
                            $array2 = $playerLists;
                            $result = array_diff($array2, $array1);
                            // print_r($result);
                            ?>


                            <td style="border-top: 2px solid white;">
                            </td>
                            <td style="border-top: 2px solid white;">
                                <?php
                                 foreach ($result as $res) {
                                        $attr = \App\Models\Team::whereIn('id', [$res])->first();

                                        echo $attr->name;
                                     
                                    ?>
                               
                                    <?php
                                    $ageGrp = DB::table('age_group_gender_team')->where('team_id', $attr->id)->where('age_group_gender_id', $gender->id)->first();
                                    ?>
                                    <input type="text" class="time" id="time" placeholder="H:i" name="time[]" data-id="<?php echo $attr->id ?>" value="{{ $ageGrp->time ? $ageGrp->time:'' }}"><br>


                                <?php
                                }
                                ?>
                            </td>

                            @endif
                        </tbody>
                    </form>
                        @endif
                        @if(Auth::user()->organization->athelaticsetting->track_event_method==0)

                        <tbody>
                            <form action="/track/heats" method="get">

                                <br>
                                @foreach ($players as $key => $chunk)
                                @if($lastPlayerCount==1||$lastPlayerCount==2)
                                <tr>
                                    <td>Round {{++$key}}</td>

                                    <td>
                                        <div class="row">

                                            @foreach ($chunk->take($playerCpunt) as $player)
                                            {{ $player->first_name }}
                                            <input type="checkbox" name="players[]" value="{{$player->id}}"><br>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" name="gender">
                                            <input type="hidden" value="{{ $event->id }}" name="event">
                                            @endforeach




                                        </div>
                                    </td>

                                </tr>

                                @else
                                <tr>
                                    <td>Round {{++$key}}</td>

                                    <td>
                                        <div class="row">
                                            <?php
                                            $array = array();

                                            ?>

                                            @foreach ($chunk as $player)

                                            {{ $player->first_name }}
                                            <input type="checkbox" name="players[]" value="{{$player->id}}"><br>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" name="gender">
                                            <input type="hidden" value="{{ $event->id }}" name="event">
                                            <?php
                                            $array[] = $player->id;

                                            ?>
                                            @endforeach



                                        </div>
                                    </td>


                                </tr>
                                @endif
                                @endforeach
                                @if($lastPlayerCount==1||$lastPlayerCount==2)

                                <?php
                                $user = App\Models\AgeGroupGender::where('id', $gender->id)->first();
                                $sormam = $user->teams;
                                $playerLists = array();

                                ?>
                                @foreach($sormam as $sor)

                                <?php
                                $playerLists[] = $sor->id
                                ?>
                                @endforeach
                                <?php
                                $lists = array();
                                ?>
                                @foreach ($players as $key=>$chunk)
                                @foreach ($chunk->take($playerCpunt) as $player)
                                <?php
                                $lists[] = $player->id;
                                ?>
                                @endforeach
                                @endforeach
                                <?php
                                $array1 = $lists;
                                $array2 = $playerLists;
                                $result = array_diff($array2, $array1);
                                ?>


                                <td style="border-top: 2px solid white;">
                                </td>
                                <td style="border-top: 2px solid white;">
                                    <?php
                                    foreach ($result as $res) {
                                        $attr = \App\Models\Team::whereIn('id', [$res])->first();

                                        echo $attr->name;
                                    ?>
                                    
                                        <input type="checkbox" name="players[]" value="<?php echo $attr->id; ?>"><br>

                                    <?php
                                    }
                                    ?>
                                </td>

                                @endif
                        </tbody>
                        @endif
                    </table>

                </div>
            </div>
            @if(Auth::user()->organization->athelaticsetting->track_event_method==1)

            <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-labeled btn-primary finish">
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
                    // window.location.href = response.url;

                }
            });

        });
    });
    $(".finish").on('click', function() {
    
        $("#myFormId").submit();

        });
  
</script>

@stop