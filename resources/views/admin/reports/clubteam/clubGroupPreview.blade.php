<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .thead{
        text-align: center;
        text-transform: uppercase;
    }
</style>
<div class="row grouppreview" id="prnt">
@include('reports.adminPrintHeader')
<h4></h4>
<br>
<table class="table table-striped  table-bordered">
    <thead class="thead">
        <tr style="text-align: center">

            <th>Event </th>
            <th>League </th>
            <th>Team </th>
            <th>Age Group</th>
            <th>Gender</th>
            <th>Status</th>
            <th colspan="3">Winners</th>
        </tr>
        <tr>

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
                <td style="width: 10%;">{{ $groupRegistration->ageGroupGender->gender->name }}</td>

                @if($groupRegistration->ageGroupGender->status==2)
                                <td style="width: 10%;">
                                    Not Started

                                </td style="width: 10%;">
                                @elseif($groupRegistration->ageGroupGender->status==0)
                                <td style="width: 10%;"> On Going 
                                </td>
                                @else
                                <td style="width: 10%;">Finished
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
    
</div>


 


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>