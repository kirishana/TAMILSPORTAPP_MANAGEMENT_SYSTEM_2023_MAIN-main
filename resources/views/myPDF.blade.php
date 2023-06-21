
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
        }
    
        table td,
        table th {
            border: 1px solid black;
            text-align: center;
            /* width: 8%; */
        }
    
        table tr,
        table td {
            padding: 3px;
            width: 1%;
        }
       
    </style>
   
    <div class="row" id="ex">
    <div class="container" style="width:705px;height:120px;">
                @if($header)
                <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('organization/header/'.$header .'') }}">
    
                @else
                <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('assets/images/authors/avatar5.png')}}">
                @endif
            </div>

    </div>
        <div>
            <div class="container" style="width:705px;">
                <div class="row" style="height:60px;">
                    <?php
                   $league = Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
                 $exp = preg_split("/-/", $Agegroup->name);
                 if(isset($exp[1])){
                     $start=$league-$exp[0];
                     $end=$league-$exp[1];
                      $final=$start.'-'.$end;

                 }else{
                     $final=$league-$exp[0];
                 }
                    ?>
                      <div style="text-align:center;"><strong><span style="font-size:40px;">{{ $event->mainEvent->name }}</span> <span style="font-size:30px;">  ({{ $Agegroup->name }} @if($AgeGroupGender->gender->name=="Male")<span style="color:green;">{{ $AgeGroupGender->gender->name }})</span>@else <span style="color:red;">{{ $AgeGroupGender->gender->name }})</span>@endif</span><span style="font-size:25px;">&nbsp; [{{$final}}]</span></strong></div>
                </div>
                <br>
                <div class="row">
               <div class="col-md-6">Starter:{{ $AgeGroupGender->starter?$AgeGroupGender->starter->first_name :''}}- {{ $AgeGroupGender->starter?$AgeGroupGender->starter->last_name:'' }}</div>
               <div class="col-md-6 pull-right" >Judge:{{ $AgeGroupGender->judge?$AgeGroupGender->judge->first_name :''}}- {{ $AgeGroupGender->judge?$AgeGroupGender->judge->last_name:'' }}</div>
               <div class="col-md-6 pull-right">Event Time:{{ $AgeGroupGender->time?$AgeGroupGender->time:'' }}</div>
                </div>
                <div class="row">

                <div class="col-md-6"style="margin-left:450px;">Started Time:</div>
                
               <div class="col-md-6" style="margin-left:450px;" >Finished Time:</div>
                </div>
               
            </div>
    
        </div>
        <br>
        <br>
        <br>
        @if($event->mainEvent->event_category_id==1)
        <table class="table table-striped table-bordered users" id="users">
            <thead>
                <tr class="filters" style="text-align: center">
                   
                    <th>Club</th>
                    <th>Participant Name</th>
                    <th>Participant Number</th>
                    <th>Time</th>
                    <th>Results</th>

                  
                </tr>
            </thead>
           
            <tbody>

            
                @if($AgeGroupGender->status==3||$AgeGroupGender->status==4)
               
                   
                    @foreach($genderUsers as $genderUser)
                    <?php 
                    $user=App\User::find($genderUser->user_id);
                     ?>
                    <tr>
                        <td>{{$user->club->club_name}}</td>
                    <td>{{ $user->first_name }} - {{ $user->last_name }}</td>
                    <td>{{ $user->userId }}</td>
                    
                    <td></td>
                    <td></td>
                    </tr>
                    @endforeach
               @else
                @foreach ($event->registrations as $registration)
                        @if($registration->is_approved==1)
<?php
$gen=$registration->user->gender=='male'?1:2;
?>
                @if ($AgeGroupGender->gender_id == $gen)   
                        @if($registration->user->is_approved==1)

                <?php
        $mine=Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
         $league1=Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
         $age=$league1-$mine;
        $exp = preg_split("/-/", $Agegroup->name);
        if (isset($exp[1])){
    
            if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                $user=$registration->user;
        ?>
            <tr>
                                        <td>{{$registration->user->club->club_name}}</td>

<td>{{ $registration->user->first_name }} - {{ $registration->user->last_name }}</td>
                    <td>{{ $registration->user->userId }}</td>
                  
<td></td>
<td></td>
            </tr>

                <?php

            }
        }
          elseif ($exp[0] == $age) {
            

            ?>
            <tr>
                                        <td>{{$registration->user->club->club_name}}</td>

<td>{{ $registration->user->first_name }} - {{ $registration->user->last_name }}</td>
<td>{{ $registration->user->userId }}</td>

<td></td>
<td></td>
</tr>

                <?php }
            ?>
            @endif
              @endif
              @endif

        @endforeach
        @endif     
    
            </tbody>
        </table>
        




<br><br>

        <table>
                <tr>
                   
                  <pre style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"><strong>Checked By:                                                                                                          Approved By:</strong></pre>
                  <h3>Comments:</h3>

                  
                </tr>
           
           
        </table>
        @endif
        <!--end-->
        <section class="content-footer">
            <div class="col-md-1">
    
    
            </div>
        </section>
        <script type="text/php">
            if (isset($pdf)) {
                $x = 250;
                $y = 800;
                $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                $font = null;
                $size = 12;
                $color = array(0,0,0);
                $word_space = 0.0;  //  default
                $char_space = 0.0;  //  default
                $angle = 0.0;   //  default
                $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
            }
        </script>
    </div>
    
   
