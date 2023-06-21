<style type="text/css">
 .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    table td,
    table th {
        padding-bottom: 5px;
        padding-top: 5px;
        line-height: 1;
        border: 1px solid #ddd;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
   .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
</style>


</style>
<div class="row" id="clubPoints">
<div class="container">
    @include('reports.header')


    </div>
@if($league!=null)
  <h2 style="text-align:center;"><strong>Club Points : {{$league->name}}</strong></h2>
  @endif
  <table class="table table-striped table-bordered">
                        <thead class="thead-Dark">
                                <tr>
                                    <th>Clubs</th>
                                    <th colspan="5">Points</th>

                                </tr>
                                <tr>
                                    <th></th>
                                    <th>Individual Events Points</th>
                                    <th>Group Events Points</th>

                                    <th>Marathon Points</th>
                                    <th>Club Participation Points</th>
                                    <th>Total</th>

                                </tr>
                            </thead>
                             @if($league!=null)
                            <tbody id="clubs" style="text-transform:capitalize;">
                                <?php
                                $genders = array();
                                ?>
                                @foreach($events as $event)
                                @if($event->mainEvent->event_category_id==3)
                                @php
                                $ageGroupEvents=App\Models\AgeGroupEvent::where('event_id',$event->id)->get();
                                foreach($ageGroupEvents as $ageEvent){
                                $ageGroupgenders=App\Models\AgeGroupGender::where('age_group_event_id',$ageEvent->id)->get();
                                foreach($ageGroupgenders as $gender){
                                $genders[]=$gender;
                                }
                                }
                                @endphp
                                @endif
                                @endforeach
                               
                                <?php
                                        
                                        $teams = DB::table('age_group_gender_team')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '!=', null)
                                            ->get();

                                        $clubs = [];
                                        $compareClubs = [];
                                        
                                        ?>
                                        @if ($teams->count() > 0)
                                            @foreach ($teams as $team)
                                                <?php
                                                $cls = App\Models\Team::find($team->team_id);
                                                $clubs[] = $cls;
                                                $compareClubs[] = $cls->club_id;
                                                $total = [];
                                                ?>
                                            @endforeach
                                        @else
                                            <?php
                                            $clubs[] = null;
                                            $compareClubs[] = null;
                                            ?>
                                        @endif
                                        <?php
                                        $result = collect($clubs)->groupBy('club_id');
                                        ?>
                                        
                                        <?php
                                        
                                        $participatedTeams = DB::table('age_group_gender_team')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '=', null)
                                            ->get();
                                            
                                        $participatedClubs = [];
                                        $compareParticipatedClubs = [];
                                        
                                        ?>
                                        @if ($participatedTeams->count() > 0)
                                            @foreach ($participatedTeams as $team)
                                                <?php
                                                $cls1 = App\Models\Team::find($team->team_id);
                                                $participatedClubs[] = $cls1;
                                                $compareParticipatedClubs[] = $cls1->club_id;
                                                $total = [];
                                                ?>
                                            @endforeach
                                        @else
                                            <?php
                                            $participatedClubs[] = null;
                                            $compareParticipatedClubs[] = null;
                                            ?>
                                        @endif
                                        <?php
                                        $participatedResult = collect($participatedClubs)->groupBy('club_id');
                                        ?>




                                        <?php
                                        $users = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '!=', null)
                                            ->get();
                                            $participatedUsers = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->where('marks', '=', null)
                                            ->get();
                                        $allUsers = DB::table('age_group_gender_user')
                                            ->where('league_id', $league->id)
                                            ->get()
                                            ->unique('user_id');
                                        // dd($allUsers->count());
                                        $userClubs = [];
                                        $userCompareClubs = [];
                                        $userParticipatedClubs = [];
                                        $userParticipatedCompareClubs = [];
                                        ?>

                                        @foreach ($participatedUsers as $user)
                                            <?php
                                            $cls1 = App\User::find($user->user_id);
                                            $userParticipatedClubs[] = $cls1;
                                            $userParticipatedCompareClubs[] = $cls1->club_id;
                                            ?>
                                        @endforeach

                                        @foreach ($users as $user)
                                            <?php
                                            $cls1 = App\User::find($user->user_id);
                                            $userClubs[] = $cls1;
                                            $userCompareClubs[] = $cls1->club_id;
                                            $total = [];
                                            ?>
                                        @endforeach




                                        <?php
                                        $result1 = collect($userClubs)->groupBy('club_id');

                                        $intersects = array_intersect($compareClubs, $userCompareClubs);
                                        $merge=array_merge($compareClubs, $userCompareClubs);
                                        $intersects2 = array_intersect($compareParticipatedClubs, $userParticipatedCompareClubs);                                        
                                        $differ=array_diff($intersects2,$merge);
                                        $participatedUnique=array_unique($differ);
                                        $unique = array_unique($intersects);
                                        $marathonPoints = App\Models\MarathonPoint::where('league_id', $league->id)->get();
                                        
                                        ?>
                                        @php
                                            
                                            $check = [];
                                        @endphp
                                        @foreach ($unique as $club)
                                            @php
                                                $total = 0;
                                                $total1 = 0;
                                                $total4 = 0;
                                                $total7 = 0;
                                                $cl = App\Models\Club::find($club);
                                            @endphp
                                            <tr>
                                                <td>

                                                    {{ $cl->club_name }}

                                                </td>
                                                <?php
                                                ?>


                                                @foreach ($teams as $user)
                                                    @php
                                                        $userDet = App\Models\Team::find($user->team_id);
                                                    @endphp
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total += $user->marks;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @php
                                                    
                                                @endphp
                                                @foreach ($users as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total1 += $user->marks;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($marathonPoints as $marathonPoint)
                                                    @if ($marathonPoint->club_id == $cl->id)
                                                        @php
                                                            $total4 += $marathonPoint->points;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($allUsers as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total7 += 1;
                                                            // $check[]=$userDet->userId
                                                        @endphp
                                                    @endif
                                                @endforeach





                                                <td> @php echo $total1 @endphp </td>
                                                <td> @php echo $total @endphp </td>
                                                <td> @php echo $total4 @endphp </td>
                                                <td> @php echo $total7 @endphp </td>
                                                <td> @php echo $total+$total1+$total4+$total7 @endphp </td>

                                            </tr>
                                        @endforeach
                                        <?php
                                        
                                        $all = array_merge($compareClubs, $userCompareClubs);
                                        $uniqueAll = array_unique($all);
                                        $diff = array_diff($uniqueAll, $unique);
                                        $marathonPoints = App\Models\MarathonPoint::where('league_id', $league->id)->get();
                                        
                                        ?>
                                        @php
                                            
                                        @endphp
                                        @foreach ($diff as $club)
                                            @if ($club != null)
                                                @php
                                                    $total3 = 0;
                                                    $total2 = 0;
                                                    $total5 = 0;
                                                    $total6 = 0;
                                                    $cl = App\Models\Club::find($club);
                                                @endphp
                                                <tr>
                                                    <td>

                                                        {{ $cl->club_name }}

                                                    </td>
                                                    @if ($teams != null)
                                                        @foreach ($teams as $user)
                                                            @php
                                                                $userDet = App\Models\Team::find($user->team_id);
                                                            @endphp
                                                            @if ($userDet->club_id == $cl->id)
                                                                @php
                                                                    $total3 += $user->marks;
                                                                @endphp
                                                            @endif
                                                        @endforeach
                                                    @endif

                                                    @foreach ($users as $user)
                                                        @php
                                                            $userDet = App\User::find($user->user_id);
                                                        @endphp
                                                        @if ($userDet->club_id == $cl->id)
                                                            @php
                                                                $total2 += $user->marks;
                                                            @endphp
                                                        @endif
                                                    @endforeach

                                                    @foreach ($allUsers as $user)
                                                        @php
                                                            $userDet = App\User::find($user->user_id);
                                                        @endphp
                                                        @if ($userDet->club_id == $cl->id)
                                                            @php
                                                                $total6 += 1;
                                                            @endphp
                                                        @endif
                                                    @endforeach


                                                    @foreach ($marathonPoints as $marathonPoint)
                                                        @if ($marathonPoint->club_id == $cl->id)
                                                            @php
                                                                $total5 += $marathonPoint->points;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    <td> @php echo $total2 @endphp</td>
                                                    <td> @php echo $total3 @endphp </td>
                                                    <td> @php echo $total5 @endphp </td>
                                                    <td> @php echo $total6 @endphp </td>
                                                    <td>
                                                        @if ($total3 == 0)
                                                            @php echo $total2+$total5+$total6 @endphp
                                                        @else
                                                            @php echo $total3+$total5+$total6 @endphp
                                                        @endif
                                                    </td>

                                                    {{-- @php echo $total3+$total5 @endphp --}}
                                                    {{-- @php echo $total2 @endphp @endif --}}




                                                </tr>
                                            @endif
                                        @endforeach
<!--participated club -->
 @foreach ($participatedUnique as $club)
                                            @php
                                                $total8 = 0;
                                                $total9 = 0;
                                                
                                                $cl = App\Models\Club::find($club);
                                            @endphp
                                            <tr>
                                                <td>

                                                    {{ $cl->club_name }}

                                                </td>
                                                <?php
                                                ?>


                                               
                                                
                                                @foreach ($marathonPoints as $marathonPoint)
                                                    @if ($marathonPoint->club_id == $cl->id)
                                                        @php
                                                            $total8 += $marathonPoint->points;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                                @foreach ($allUsers as $user)
                                                    @php
                                                        $userDet = App\User::find($user->user_id);
                                                    @endphp
                                                    
                                                    @if ($userDet->club_id == $cl->id)
                                                        @php
                                                            $total9 += 1;
                                                            // $check[]=$userDet->userId
                                                        @endphp
                                                    @endif
                                                @endforeach





                                                <td> @php echo 0 @endphp </td>
                                                <td> @php echo 0 @endphp </td>
                                                <td> @php echo $total8 @endphp </td>
                                                <td> @php echo $total9 @endphp </td>
                                                <td> @php echo $total8+$total9 @endphp </td>

                                            </tr>
                                        @endforeach
<!--end-->


    
                               
                            </tbody>
                            @endif
                        </table>
     <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting?$setting->footer:'') !!}@endif


        </div>
    </section>
    
<script type="text/php">
    if (isset($pdf)) {
        $x = 390;
        $y = 570;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
     