<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}" />
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="{{ asset('assets/vendors/morrisjs/morris.css') }}">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="table-scrollable results">
    <h1 style="text-align: center;padding:30px;">{{ $league->name }}'s Event Results</h1>
    <div style="padding:20px;">
        <div class="row">
            <div class="col-md-12">
                <div id="club-first-counts"></div>
    
            </div>
    
            
        </div>
    
    <div class="row">
        <div class="col-md-6">
            <div id="eventByStatus" style="min-width:500px;height:500px;padding-bottom:50px;"></div>

        </div>

        <div class="col-md-6">
            <div id="club-points"></div>

                </div>
    </div>
    <div class="row">
        <div class="col-md-12">
    <table class="table table-bordered table-hover" >
        <thead style="background-color: black;color:white;text-transform:uppercase;padding:3px;text-align:center;">
              <tr>
                <th>Event</th>
                <th>age Group</th>
                <th>Gender</th>
                <th colspan="3" style="text-align:center">Winners</th>

            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>First</th>
                <th>Second</th>
                <th>Third</th>

            </tr>
        </thead>

@if($genders!=null)

        <tbody>
            @foreach($genders as $gender)
            @if($gender->status==1)
            @if($gender->ageGroupEvent->Event->league_id==$league->id)
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
    <tr>
    
        <td>
            {{ $gender->ageGroupEvent->Event->mainEvent->name }}
        </td>
        <td>
            {{ $gender->ageGroupEvent->ageGroup->name }}
        </td>
        <td>
            {{ $gender->gender->name }}
        </td>
          

        <?php
        
   $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time',"!=",'')->where('marks',$gender->first_place)->get();
                    $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time',"!=",'')->where('marks',$gender->second_place)->get();
                    $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time',"!=",'')->where('marks',$gender->third_place)->get();
?>

@if($users1)
@if($users1->count()>0)

<td style="width: 20%;">
    @foreach($users1 as $use)
<?php 
$user=App\User::find($use->user_id);
?>
    
    [{{$user->userId}}] {{$user->first_name}} {{$user->last_name}}
    <br>
        <span><strong>{{$user->club->club_name}}</strong>
          </span>
    <br>
   

    @endforeach
</td>
    @else
    <td>&nbsp;</td>
@endif
@endif

@if($users2)
@if($users2->count()>0)


<td style="width: 15%;">
    @foreach($users2 as $use)
    <?php 
$user=App\User::find($use->user_id);
?>
    [{{$user->userId}}] {{$user->first_name}} {{$user->last_name}}
    <br>
        <span><strong>{{$user->club->club_name}}</strong>
          </span>
    <br>
    @endforeach
</td>
@else
    <td>&nbsp;</td>
@endif
@endif



@if($users3)
@if($users3->count()>0)


<td style="width: 15%;">
    @foreach($users3 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
   [{{$user->userId}}] {{$user->first_name}} {{$user->last_name}}
   <br>
       <span><strong>{{$user->club->club_name}}</strong>
         </span>
   <br>
    @endforeach
</td>
@else
    <td>&nbsp;</td>
@endif
@endif

      
       
    
    
     
    </tr>
    @endif
    @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
    <tr>
        <td>
            {{ $gender->ageGroupEvent->Event->mainEvent->name }}
        </td>
        <td>
              {{ $gender->ageGroupEvent->ageGroup->name }}
        </td>

        <td>
            {{ $gender->gender->name }}
          
        </td>
        
       
        <?php
         
   
                    $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
                    $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
                    $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                    ?>


 
   {{-- <td>{{ $users1->count() }}</td>
   <td>{{ $users2->count() }}</td>
   <td>{{ $users3->count() }}</td> --}}
        @if($users1)
@if($users1->count()>0)
        <td>
            @foreach($users1 as $users)

          <?php 
          $user=App\User::find($users->user_id)
          ?>
         {{$user->first_name}} {{$user->last_name}} <br> <strong>{{$user->club->club_name}}</strong>
            <br>
                      @endforeach
        </td>
@else
<td>&nbsp;</td>
@endif
        @endif

       
        @if($users2)
@if($users2->count()>0)

        <td>
            @foreach($users2 as $users)
            <?php 
          $user=App\User::find($users->user_id)
          ?>
           {{$user->first_name}} {{$user->last_name}} <br> <strong>{{$user->club->club_name}}</strong>
            <br>
            
            @endforeach
        </td>
        @else
        <td>&nbsp;</td>
        @endif
        @endif


        @if($users3)
        @if($users3->count()>0)
        <td>
            @foreach($users3 as $users)

          <?php 
          $user=App\User::find($users->user_id)
          ?>
         {{$user->first_name}} {{$user->last_name}} <br> <strong>{{$user->club->club_name}}</strong>
            <br>
                      @endforeach
        </td>
        @else
<td>&nbsp;</td>
@endif
        @endif

    </tr>
    @endif
    
  
        
                @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==3)
                <tr>
        
                    <td>
                        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                    </td>
                    <td>
                       {{ $gender->ageGroupEvent->ageGroup->name }}
                    </td>
        
                    <td>
                         {{ $gender->gender->name }}
                        
                    </td>
                   
                 
                     @if($gender->status==1)
    
     <?php
       $users1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time',"!=",null)->where('marks',$gender->group_first_place)->get();
       $users2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time',"!=",null)->where('marks',$gender->group_second_place)->get();
       $users3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('time',"!=",null)->where('marks',$gender->group_third_place)->get();
    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
               
                       
    
                        @endforeach
                    </td>
                        @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
                    @if($users2)
                    @if($users2->count()>0)

    
                    <td style="width: 15%;">
                        @foreach($users2 as $use)
                       <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                        @endforeach
                    </td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
    
                  
                    @if($users3)
                    @if($users3->count()>0)

    
                    <td style="width: 15%;">
                        @foreach($users3 as $use)
                         <?php 
    $team=App\Models\Team::find($use->team_id);
    ?>
                       
                        {{$team->name}}
                        <br>
                       
                        @endforeach
                    </td>
                    @else
                        <td>&nbsp;</td>
                    @endif
                    @endif
    
              
                
                @else
    
                @endif
    
        
                </tr>
                @endif
                @endif

             
@endif
            @endforeach
        </tbody>
        @endif
      

    </table>
        </div>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://www.pakainfo.com/jquery/js/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script type="text/javascript" src="{{asset('assets/js/echarts.min.js')}}"></script>
    <script>
        //piechart
        google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart2);

            function drawChart2() {

                var data = google.visualization.arrayToDataTable([
                   
                    ['Events', 'Event Status'],

                    @php
                    foreach ($eventStatus as $d) {
                        $status= $d->status;

if ($status==2) {
  $name= "NOT STARTED";
} 
elseif ($status==0) {
  $name= "ON GOING";
} 
elseif ($status==1) {
  $name= "FINISHED";
}
elseif ($status==10) {
  $name= "CANCELLED";
}
else {
  $name= "HEATS FINAL ROUND";
}
                       
                        echo "['" .$name. "', " . $d->count_row . '],';
                    }
                  

                    @endphp
                ]);

                var options = {
                    is3D: true,
                    title:'Event Status',
                };

                var chart = new google.visualization.PieChart(document.getElementById('eventByStatus'));

                chart.draw(data, options);
            }

      
        //end
        //barchartforpoints
        var clubs = <?php echo json_encode($merge); ?>;
            var clubNames = [];
            for (var j = 0; j < clubs.length; j++) {
                clubNames.push(clubs[j])
            }
           
            var firstPlaceCount = <?php echo json_encode($totas); ?>;
            var firstPlaceCounts = [];
            for (var i = 0; i < firstPlaceCount.length; i++) {
                firstPlaceCounts.push(firstPlaceCount[i])
            }
            var firstPlaceClubCounts = firstPlaceCounts.map(i => Number(i))
           
            var secondPlaceCount = <?php echo json_encode($marathaonTotal); ?>;
            var secondPlaceCounts = [];
            for (var i = 0; i < secondPlaceCount.length; i++) {
                secondPlaceCounts.push(secondPlaceCount[i])
            }
            var secondPlaceClubCounts = secondPlaceCounts.map(i => Number(i))

            var thirdPlaceCount = <?php echo json_encode($cluParticipantCounts); ?>;
            var thirdPlaceCounts = [];
            for (var i = 0; i < thirdPlaceCount.length; i++) {
                thirdPlaceCounts.push(thirdPlaceCount[i])
            }
            var thirdPlaceClubCounts = thirdPlaceCounts.map(i => Number(i))
           
            $('#club-points').highcharts({
                chart: {
                    type: 'column'
                },

                title: {
                    text: 'Club Points'
                },




                xAxis: {
                    categories: clubNames
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Number of WinCounts'
                    }
                },

                tooltip: {
                    formatter: function() {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'Total: ' + this.point.stackTotal;
                    }
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: [{
                    
                    name: 'Individual+Group Events',
                    data: firstPlaceClubCounts,
                    stack: 'yes'
                },
                {
                    name: 'Marathon Points',
                    data: secondPlaceClubCounts,
                    stack: 'no'
                },

                  {
                      name: 'Club Participant Points',
                    data: thirdPlaceClubCounts,
                    stack: 'notneed'
                  }, 
                
                   
                ]
            });

      
        //end
        
    //reults
            var clubs = <?php echo json_encode($clubLists); ?>;
            var clubNames = [];
            for (var j = 0; j < clubs.length; j++) {
                clubNames.push(clubs[j])
            }
            var firstPlaceCount = <?php echo json_encode($firstPlaceCount); ?>;
            var firstPlaceCounts = [];
            for (var i = 0; i < firstPlaceCount.length; i++) {
                firstPlaceCounts.push(firstPlaceCount[i])
            }
            var firstPlaceClubCounts = firstPlaceCounts.map(i => Number(i))
            var secondPlaceCount = <?php echo json_encode($secondPlaceCount); ?>;
            var secondPlaceCounts = [];
            for (var i = 0; i < secondPlaceCount.length; i++) {

                secondPlaceCounts.push(secondPlaceCount[i])
            }
            var secondPlaceClubCounts = secondPlaceCounts.map(i => Number(i));

            var thirdPlaceCount = <?php echo json_encode($thirdPlaceCount); ?>;
            var thirdPlaceCounts = [];
            for (var i = 0; i < thirdPlaceCount.length; i++) {

                thirdPlaceCounts.push(thirdPlaceCount[i])
            }
            var thirdPlaceClubCounts = thirdPlaceCounts.map(i => Number(i));
            
            $('#club-first-counts').highcharts({

                chart: {
                    type: 'column'
                },

                title: {
                    text: 'Total Winners, group by Club for single events'
                },




                xAxis: {
                    categories: clubNames
                },

                yAxis: {
                    allowDecimals: false,
                    min: 0,
                    title: {
                        text: 'Number of WinCounts'
                    }
                },

                tooltip: {
                    formatter: function() {
                        return '<b>' + this.x + '</b><br/>' +
                            this.series.name + ': ' + this.y + '<br/>' +
                            'Total: ' + this.point.stackTotal;
                    }
                },

                plotOptions: {
                    column: {
                        stacking: 'normal'
                    }
                },

                series: [{

                        name: 'First Place',
                        data: firstPlaceClubCounts,
                        stack: 'yes'
                    },
                    {
                        name: 'Second Place',
                        data: secondPlaceClubCounts,
                        stack: 'no'
                    },

                      {
                          name: 'Third Place',
                        data: thirdPlaceClubCounts,
                        stack: 'notneed'
                      }, 
                    // {
                    //     name: 'Not Paid GroupEvent',
                    //     data: groupEventTotalGroupCounts,
                    //     stack: 'notpaid'
                    //   },
                ]
            });

            //end
            </script>
</div>
