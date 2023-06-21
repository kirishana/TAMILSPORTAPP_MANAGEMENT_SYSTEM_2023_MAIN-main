<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
    }
    table td,
    table th {
        padding-bottom: 5px;
        line-height: 1;
        border: 1px solid #ddd;

    }

     td {
        width: 1px;
    }
  .thead {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
h2 {
    text-align: center;
}
td{
    text-align: left;
    border: 1px solid #ddd;width: 30%;
    padding:5px;
}
</style>
@include('reports.adminHeader')

<h3 style="text-align:center">GROUP EVENTS RESULTS</h3>
<table class="table table-striped text-uppercase table-bordered group" id="export">
    <thead class="thead">
        <tr style="text-align: center">

            <th>Event </th>
            <th>League</th>
            <th>Team </th>
            <th>Age Group</th>
            <th>Gender</th>
            <th>Status</th>
            <th colspan="3">Winners</th>
        </tr>
        <tr style="background-color: #3A3B3C;text-transform: uppercase;">

            <th>

            </th>
            <th>

            </th>
            <th>

            </th>
            <th>

            </th>
            <th>

            </th>
            <th>

            </th>
            <th>
                First
            </th>
            <th>
                Second
            </th>
            <th>
                Third
            </th>

        </tr>
    </thead>
    <tbody class="text-uppercase">



    @foreach($groupRegistrations as $groupRegistration)
        @if($groupRegistration->club_id==Auth::user()->club_id)

            <tr>

                <td style="width: 20%;">{{ $groupRegistration->ageGroupGender->ageGroupEvent->Event->mainEvent->name }}</td>
                <td style="width: 20%;">{{ $groupRegistration->league->name }}</td>
                <td>   @foreach($groupRegistration->teams as $team)
                        {{ $team->name }}
                    @endforeach
                </td>
                <td style="width: 10%;">{{ $groupRegistration->ageGroupGender->ageGroupEvent->ageGroup->name }}</td>
                <td style="width: 12%;">{{ $groupRegistration->ageGroupGender->gender->name }}</td>

                @if($groupRegistration->ageGroupGender->status==2)
                                <td style="width: 10%;">
                                    <span class="label label-primary">Not Started</span>

                                </td style="width: 10%;">
                                @elseif($groupRegistration->ageGroupGender->status==0)
                                <td style="width: 10%;"> <span class="label label-warning">On Going </span>
                                </td>
                                @else
                                <td style="width: 10%;"> <span class="label label-success">Finished</span>
                                </td>
                                @endif

                            
                              
                              <?php
                    $teams1=DB::table('age_group_gender_team')->where('age_group_gender_id',$groupRegistration->age_group_gender_id)->where('marks',$groupRegistration->ageGroupGender->group_first_place)->get();
                    $teams2=DB::table('age_group_gender_team')->where('age_group_gender_id',$groupRegistration->age_group_gender_id)->where('marks',$groupRegistration->ageGroupGender->group_second_place)->get();
                    $teams3=DB::table('age_group_gender_team')->where('age_group_gender_id',$groupRegistration->age_group_gender_id)->where('marks',$groupRegistration->ageGroupGender->group_third_place)->get();
            // dd($groupRegistration->ageGroupGender->gender->name);
                ?>

             @if($teams1)
             @if($teams1->count()>0)
          

                    <td>
                           @foreach($teams1 as $time)
    
                    <?php
                    $team = DB::table('teams')->where('id', $time->team_id)->first();
                    // dd($team->name);

                    ?>
                    @if($groupRegistration->ageGroupGender->status==1)
                        {{$team->name}}
                        <br>
                         @endif
                    @endforeach
                    </td>
                   
                    @else
                    <td>&nbsp;</td>
                    @endif
                    @endif

                    @if($teams2)
             @if($teams2->count()>0)
                

                    <td>
                     @foreach($teams2 as $time)
    
                    <?php
                    $team = DB::table('teams')->where('id', $time->team_id)->first();
                    ?>
                    @if($groupRegistration->ageGroupGender->status==1)
                        {{$team->name}}
                        <br>
                         @endif
                    @endforeach
                    </td>
                   
                    @else
                    <td>&nbsp;</td>
                    @endif
                    @endif

                    @if($teams3)
             @if($teams3->count()>0)
                
                    <td>
                     @foreach($teams3 as $time)
    
                    <?php
                    $team = DB::table('teams')->where('id', $time->team_id)->first();

                    ?>
                    @if($groupRegistration->ageGroupGender->status==1)
                        {{$team->name}}
                        <br>
                        @endif
                    @endforeach
                    </td>
                    
                    @else
                    <td>&nbsp;</td>
                    @endif
                    @endif
            </tr>
@endif
        @endforeach


    </tbody>
</table>
<section class="content-footer">
        <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>
<script type="text/php">
    if (isset($pdf)) {
        $x = 360;
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
 


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>