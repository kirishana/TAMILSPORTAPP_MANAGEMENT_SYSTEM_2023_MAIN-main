<table class="table table-striped table-bordered events">
    <thead>
        <tr>
            <th>Round Name</th>
            <th>Players</th>
        </tr>
    </thead>

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
                    <br>
                    @if(Auth::user()->organization->athelaticsetting->heat_method==1)
                    @if(Auth::user()->hasRole(6))

                    <input type="text" placeholder="H:i" class="time" id="time" name="time" data-id="{{$player->id}}" value="">
                    @endif
                    <br>
                    @else
                    @if(Auth::user()->hasRole(6))

                    <input type="text" class="rank" id="time" name="rank" data-id="{{$player->id}}" value="">

                    @endif
                    <br>
                    @endif
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

                    @if(Auth::user()->organization->athelaticsetting->heat_method==1)
                    @if(Auth::user()->hasRole(6))

                    <input type="text" placeholder="H:i" class="time" id="time" name="time" data-id="{{$player->id}}" value="">
                    @endif
                    <br>

                    @else
                    @if(Auth::user()->hasRole(6))

                    <input type="text" class="rank" id="time" name="rank" data-id="{{$player->id}}" value="">

                    @endif
                    <br>
                    @endif
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
        $sormam = $allplayers;
        $playerLists = array();

        ?>
        @foreach($sormam as $sor)

        <?php
        $playerLists[] = $sor
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
                echo $res;
            ?>
                <?php
                $ageGrp = DB::table('age_group_gender_team')->where('team', $res)->where('age_group_gender_id', $gender->id)->first();
                ?>


                @if(Auth::user()->organization->athelaticsetting->heat_method==1)
                @if(Auth::user()->hasRole(6))

                <input type="text" placeholder="H:i" class="time" id="time" name="time" data-id="<?php echo $res ?>" value="">
                @endif
                <br>
                @else
                @if(Auth::user()->hasRole(6))

                <input type="text" class="rank" id="time" name="rank" data-id="<?php echo $res ?>" value="">

                @endif
                <br>
                @endif


            <?php
            }
            ?>
        </td>

        @endif
    </tbody>

</table>
<div class="row">
    <div class="col-md-10">
    </div>
    <div class="col-md-2">
        <a href="/results/{{ $gender->id }}"><button type="button" class="btn btn-labeled btn-primary">
                Finish
                <span class="btn-label cool_btn_right">
                    <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                </span>
            </button>
        </a>
    </div>

</div>
</div>
</div>


</form>