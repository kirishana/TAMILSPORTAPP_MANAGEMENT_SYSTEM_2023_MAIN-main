<style>
  .copied {
  font-family: 'Montserrat', sans-serif;
  display: none;
}
table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
    }

    table tr,
    table td {
        padding: 3px;
        width: 1%;
        text-align: left;

    }
</style>
<div class="table-scrollable results">

<div class="row">      
    <div class="col-md-6">
        @if($league)
      <a class="copy_text" href="{{$general->website_url }}out-frame-results/{{$league->id}}" style="font-family:arial;color:black;"><button class="btn btn-primary" style="text-transform:capitalize">Click to copy</button></a> 
    @endif
        <div id="copied-success" class="copied">
  <span>Copied!</span>
</div>
</div>
</div>
    <table class="table table-bordered table-hover">
    <thead class="thead-Dark">
            <tr>
                <th style="width:5%">Event</th>
                <th style="width:5%">Gender</th>
                <th style="width:5%">AgeGroup</th>
                <th style="width:5%">Status</th>
                <th colspan="3">Winners</th>

            </tr>
            <tr>
                <th></th>
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
            @if($gender->ageGroupEvent->Event->league_id==$league->id)
                @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==1)
    
            <tr>
    
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                <td>
                    <span class="label label-primary">Not Started</span>
    
                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
           
    
              
                @if($gender->status==1)
     <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('time','!=','')->where('marks',$gender->third_place)->get();
    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                                  @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
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
                                    @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
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
                                  @if ($user->profile_pic)
                                            <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                width="50" height="50" style="border-radius:50%">
                                                <br>
                                                [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @else
                                            [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                            <br>
                                                <?php
                                                $explodeTime = explode(":", $use->time);
                                                if (count($explodeTime) == 3) {
                                                ?>
                                                <span><strong>Time</strong>
                                                <?php
                                                } else {
                                                ?>
                                                <span><strong>Rank</strong>
                                                <?php
                                                }
                                                ?>
                                                : {{ $use->time }}</span>
                                        @endif
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
    
            @if($gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
            <tr>
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                    <td>
                        <span class="label label-primary">Not Started</span>
    
                    </td>
                    @elseif($gender->status==0)
                    <td> <span class="label label-warning">On Going </span>
                    </td>
                    @elseif($gender->status==3)
                    <td> <span class="label label-warning">Finalizing </span>
                    </td>
                    @elseif($gender->status==4)
                    <td> <span class="label label-warning">Processing</span>
                    </td>
                    @elseif($gender->status==10)
                    <td> <span class="label label-danger">Cancelled</span>
                    </td>
                    @else
                    <td> <span class="label label-success">Finished</span>
                    </td>
                    @endif
                    <?php
       $users1=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->first_place)->get();
       $users2=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->second_place)->get();
       $users3=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks',$gender->third_place)->get();
                    ?>
    
                    @if($users1)
                    @if($users1->count()>0)
    
                    <td style="width: 20%;">
                        @foreach($users1 as $use)
    <?php 
    $user=App\User::find($use->user_id);
    ?>
                            @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
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
                            @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
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
                           @if ($user->profile_pic)
                                                <img src="/profile/{{ $user->profile_pic }}" alt="Tamil Sangam"
                                                    width="50" height="50" style="border-radius:50%">
                                                    <br>
                                                    [{{ $user->userId }}] {{ $user->first_name }} {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @else
                                                [{{ $user->userId }}] {{ $user->first_name }}
                                                {{ $user->last_name }}
                                                <br>
                                                <span class="round"> <strong> Round 1 </strong> {{ $use->one }}m</span><br>
                                                <span class="round"> <strong> Round 2 </strong> {{ $use->two }}m</span><br>
                                                <span class="round"> <strong> Round 3 </strong> {{ $use->third }}m</span><br>
                                            @endif
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
    
                <td style="width: 15%;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="width: 10%;">
                    {{ $gender->gender->name }}
                </td>
    
                <td style="width: 10%;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                        <td style="width: 10%;">
                            <span class="label label-primary">Not Started</span>
    
                        </td>
                        @elseif($gender->status==0)
                        <td style="width: 10%;"> <span class="label label-warning">On Going </span>
                        </td>
                        @elseif($gender->status==3)
                        <td style="width: 10%;"> <span class="label label-warning">Finalizing </span>
                        </td>
                        @elseif($gender->status==10)
                        <td style="width: 10%;"> <span class="label label-danger">Cancelled </span>
                        </td>
                        @else
                        <td style="width: 10%;"> <span class="label label-success">Finished</span>
                        </td>
                        @endif
              
                @if($gender->status==1)
    
     <?php
       $users1=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_first_place)->get();
       $users2=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_second_place)->get();
       $users3=DB::table('age_group_gender_team')->where('age_group_gender_id',$gender->id)->where('marks',$gender->group_third_place)->get();
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
    
              
                

                @endif
    
    
    
            </tr>
            @endif
            @endif
            @endforeach
        </tbody>
        @endif
    </table>


</div>
<script>
    $(".copy_text").click(function(e) {
        e.preventDefault();
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(this).attr('href')).select();
        document.execCommand("copy");
        $temp.remove();
        $('#copied-success').fadeIn(800);
  $('#copied-success').fadeOut(800);
    })
</script>