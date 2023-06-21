
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
   <div class="row" id="ex" style="page-break-before: always;">
        <div class="container" style="width:705px;height:120px;">
                   @if($header)
                   <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('organization/header/'.$header .'') }}">
       
                   @else
                   <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('assets/images/authors/avatar5.png')}}">
                   @endif
               </div>
           <div>
               <div class="container" style="width:705px;">
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
                   <div class="row" style="height:60px;">
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
           <table class="table table-striped table-bordered users" id="users" style=" width: 100%;
           border-collapse: collapse;">
               <thead>
                   <tr class="filters" style="text-align: center; padding: 3px;
                   width: 1%;">
                      
    <th style=" border: 1px solid black;
                       text-align: center;">Club</th> 
                       <th style=" border: 1px solid black;
                       text-align: center;">Participant Name</th>
                       <th style=" border: 1px solid black;
                       text-align: center;">Participant Number</th>
                     
                       <th style=" border: 1px solid black;
                       text-align: center;">Time</th>
   
     <th style=" border: 1px solid black;
                       text-align: center;">Results</th>
                     
                   </tr>
               </thead>
              
               <tbody>
   
                   @if($AgeGroupGender->status==3 ||$AgeGroupGender->status==4)
                  <?php 
                  $genderUsers=DB::table('age_group_gender_user')->where('age_group_gender_id',$AgeGroupGender->id)->get();
                  ?>
                      
                   @foreach($genderUsers as $genderUser)
                   <?php 
                   $user=App\User::find($genderUser->user_id);
                    ?>
                   <tr>
                                          <td>{{ $user->club->club_name }}</td>

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
               <tr style="text-align: center; padding: 3px;
               width: 1%;">
                                                             <td>{{ $registration->user->club->club_name }}</td>

   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
   width: 1%;">{{ $registration->user->first_name }} - {{ $registration->user->last_name }}</td>
                       <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;">{{ $registration->user->userId }}</td>
                     
   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
   width: 1%;"></td>
   <td></td>
               </tr>
   
                   <?php
   
               }
           }
             elseif ($exp[0] == $age) {
               
   
               ?>
               <tr>
                                                             <td>{{ $registration->user->club->club_name }}</td>

   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;">{{ $registration->user->first_name }} - {{ $registration->user->last_name }}</td>
   <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;">{{ $registration->user->userId }}</td>
   
   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;"></td>
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
           @endif
   
   
           <!-- field-->
   
           @if($event->mainEvent->event_category_id==2)
           <table class="table table-striped table-bordered users" id="users" style=" width: 100%;
           border-collapse: collapse;">
               <thead>
                   <tr class="filters" style="text-align: center">
                      
    <th style=" border: 1px solid black;
                       text-align: center;">Club</th>
                       <th style=" border: 1px solid black;
                       text-align: center;">Participant Name</th>
                       <th style=" border: 1px solid black;
                       text-align: center;">Participant Number</th>
                     
                       <th style=" border: 1px solid black;
                       text-align: center;">Round One</th>
                       <th style=" border: 1px solid black;
                       text-align: center;">Round Two</th>
                       <th style=" border: 1px solid black;
                       text-align: center;">Round Three</th>
    <th style=" border: 1px solid black;
                       text-align: center;">Results</th>
                     
                   </tr>
               </thead>
              
               <tbody>
   
               
                   @foreach ($event->registrations as $registration)
                
@if($registration->is_approved==1)
@if($registration->user->is_approved==1)
<?php
$gen=$registration->user->gender=='male'?1:2;
?>
                @if ($AgeGroupGender->gender_id == $gen)                     <?php
           $mine=Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
            $league1=Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
            $age=$league1-$mine;
           $exp = preg_split("/-/", $Agegroup->name);
           if (isset($exp[1])){
       
               if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                   $user=$registration->user;
           ?>
               <tr style=" padding: 3px;
               width: 1%;">
                                                             <td>{{ $registration->user->club->club_name }}</td>

   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;">{{ $registration->user->first_name }} - {{ $registration->user->last_name }}</td>
                       <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;">{{ $registration->user->userId }}</td>
                     
                       <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;"></td>
                       <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;"></td>
                       <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;"></td>        
               <td></td></tr>
   
                   <?php
   
               }
           }
             elseif ($exp[0] == $age) {
               
   
               ?>
               <tr style=" padding: 3px;
               width: 1%;">
                                                             <td>{{ $registration->user->club->club_name }}</td>

   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;">{{ $registration->user->first_name }} - {{ $registration->user->last_name }}</td>
   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;">{{ $registration->user->userId }}</td>
   
   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;"></td>
   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;"></td>
   <td style=" border: 1px solid black;
   text-align: center; padding: 3px;
               width: 1%;"></td>
               <td></td>
   </tr>
   
                   <?php }
               ?>
               @endif
                 @endif
                 @endif
           @endforeach
   
                  
       
               </tbody>
           </table>

      
           @endif
           <!--end-->
   
   
           
           <!-- field-->
   
           @if($event->mainEvent->event_category_id==3)
           <table class="table table-striped table-bordered users" id="users" style=" width: 100%;
           border-collapse: collapse;">
               <thead>
                   <tr class="filters" style="text-align: center; padding: 3px;
                   width: 1%;">
                      
    <th style=" border: 1px solid black;
                       text-align: center;">Club</th>
                       <th style=" border: 1px solid black;
                       text-align: center;">Team Name</th>
                    
                       <th style=" border: 1px solid black;
                       text-align: center;">Time</th>
                       
    <th style=" border: 1px solid black;
                       text-align: center;">Results</th>
                     
                   </tr>
               </thead>
             
               <tbody>
   
               
                 
                   <?php 
                   $registrations = App\Models\GroupRegistration::where('age_group_gender_id', $AgeGroupGender->id)->get();
                   ?>
              
              @foreach ($registrations as $registration)
                   @foreach($registration->teams as $team)
                   <tr style=" padding: 3px;
                   width: 1%;">
                        <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;">{{ $team->club->club_name}}</td>
                       <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;">{{ $team->name}}</td>
               
                       <td style=" border: 1px solid black;
                       text-align: center; padding: 3px;
               width: 1%;"></td>
               <td></td>
                 </tr>
               @endforeach
               @endforeach
               </tbody>
           </table>
           @endif
           <table>
            <tr>
               
              <pre style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"><strong>Checked By:                                                                                                          Approved By:</strong></pre>
              <h3>Comments:</h3>

              
            </tr>
       
       
    </table>
           <!--end-->
           <section class="content-footer">
               <div class="col-md-1">
       
       
               </div>
           </section>
           <script type="text/php">
               if (isset($pdf)) {
                   $pdf->page_script('
                   if($PAGE_NUM>1){
                  $font = $fontMetrics->getFont("helvetica", "bold");
       $current_page = $PAGE_NUM-1;
       $total_pages = $PAGE_COUNT-1;
       $pdf->text(250, 800, "Page: $current_page of $total_pages", $font, 12, array(0,0,0));
                 
                       
                   }
                   '); 
               }
              
           </script>
       </div>
           
      
   