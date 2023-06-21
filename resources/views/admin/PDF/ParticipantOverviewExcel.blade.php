
<div class="col-md-12" id="">

  
<table class="table table-striped  table-bordered filter1" id="table10" style="text-transform: capitalize;">
        <thead class="table thead-Dark">
            <?php $list_main_events=App\Models\MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->wherehas('events',function($q)use($ongngLeagues){
                $q->wherehas('league',function($q) use($ongngLeagues){
                    $q->where('id',$ongngLeagues?$ongngLeagues->id:'');
                });
            })->get(); 
            ?>
                <tr>
                <th>AgeGroup</th>
                <th>Gender</th>
                <th>Participant's &nbsp; Name</th>
                <th>Part.Number</th>
                <th>Club</th>
            @foreach($list_main_events as $mainevent)
           @if($mainevent->event_category_id!=3)
                <th>{{$mainevent->name}}</th>
            @endif
        
            @endforeach
            </tr>
        </thead>
  
        @foreach($ageGroupnames as $ageGroupname)
                                            <?php  
                                            $registrations =App\Models\Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->where('league_id',$ongngLeagues?$ongngLeagues->id:'')->wherehas('user',function($q){
                                                $q->where('is_approved',1)->wherehas('ageGroupGenders',function($q){
                                                 $q->where('status',1);
                                                });
                                            })->get()->sortBy('user.club_id');
                                            $regCount=array();
                                            ?>
     
                                         
                                                @foreach($registrations as $registration)
                                                @if($registration->events->count()>0)
                                                @if($registration->gender==1)
                                                <?php
                                                                $userGender = $registration->user->gender == 'male' ? 1 : 2;
                                                                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                                                                $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $ongngLeagues->to_date)->format('Y');
                                                                $age = $league1 - $mine;
                                                                $exp = preg_split("/-/", $ageGroupname->name);
                                                                if (isset($exp[1])) {
                                                                    if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                                ?>
                                                                          <tr>
                                                <td>{{$ageGroupname->name}}</td>
                                                <td>Male</td>
                                                                        <td>{{$registration->user->first_name}}&nbsp;{{$registration->user->last_name}}</td>
                                                                        <td>{{$registration->user->userId}}</td>
                                                                        <td>{{$registration->user->club->club_name}}</td>
                                                                    
                                                                        @foreach($list_main_events as $event1)
            @if($event1->event_category_id !=3)
                <td>
               <?php 
                              $gender=$registration->user->id=='male'?1:2;
                $users1= DB::table('age_group_gender_user')->where('league_id',$registration->league->id)->where('user_id','=',$registration->user->id)
                ->join('age_group_genders', 'age_group_gender_user.age_group_gender_id', '=', 'age_group_genders.id')
                ->join('age_group_event', 'age_group_genders.age_group_event_id', '=', 'age_group_event.id')
                ->select('age_group_gender_user.marks as marks','age_group_event.event_id as eventId')->get();


               ?>
       @foreach($users1 as $user1)
       <?php $eventsid=App\Models\Event::find($user1->eventId); 
       ?>
                    @if($event1->id == $eventsid->main_event_id)
                    @if($user1->marks ==NULL)
                    &#10003;
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->first_place)
                    {{1}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->second_place)
                    {{2}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->third_place)
                    {{3}}
                    @endif
                    @endif
                  @endforeach
                 
                </td>
                @endif

                @endforeach

                                                                        </tr>
                                                                        
                                                                    <?php
                                                                    }
                                                                }
                                                                if ($exp[0] == $age) {
                                                                    ?>

<tr>
                                                <td>{{$ageGroupname->name}}</td>
                                                <td>Male</td>
                                                                        <td>{{$registration->user->first_name}}&nbsp;{{$registration->user->last_name}}</td>
                                                                        <td>{{$registration->user->userId}}</td>
                                                                        <td>{{$registration->user->club->club_name}}</td>
                                                                      
                                                                        @foreach($list_main_events as $event1)
            @if($event1->event_category_id !=3)
                <td>
               <?php 
                              $gender=$registration->user->id=='male'?1:2;
                $users1= DB::table('age_group_gender_user')->where('league_id',$registration->league->id)->where('user_id','=',$registration->user->id)
                ->join('age_group_genders', 'age_group_gender_user.age_group_gender_id', '=', 'age_group_genders.id')
                ->join('age_group_event', 'age_group_genders.age_group_event_id', '=', 'age_group_event.id')
                ->select('age_group_gender_user.marks as marks','age_group_event.event_id as eventId')->get();


               ?>
       @foreach($users1 as $user1)
       <?php $eventsid=App\Models\Event::find($user1->eventId); 
       ?>
                    @if($event1->id == $eventsid->main_event_id)
                    @if($user1->marks ==NULL)
                    &#10003;
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->first_place)
                    {{1}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->second_place)
                    {{2}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->third_place)
                    {{3}}
                    @endif
                    @endif
                  @endforeach
                 
                </td>
                @endif

                @endforeach

                                                                        </tr>
                                                                   
                                                                <?php
                                                                }
                                                                ?>
                                               @endif
                                               @endif                                             
                                                @endforeach

                                           
                                           

                                          
                                            <?php  
                                             $registrations =App\Models\Registration::where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->where('league_id',$ongngLeagues?$ongngLeagues->id:'')->wherehas('user',function($q){
                                                $q->where('is_approved',1)->wherehas('ageGroupGenders',function($q){
                                                 $q->where('status',1);
                                                });
                                            })->get()->sortBy('user.club_id');
                                            $regCount=array();
                                            ?>                                           
                                                @foreach($registrations as $registration)
                                                @if($registration->events->count()>0)
                                                @if($registration->gender==2)
                                                <?php
                                                                $userGender = $registration->user->gender == 'male' ? 1 : 2;
                                                                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                                                                $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $ongngLeagues->to_date)->format('Y');
                                                                $age = $league1 - $mine;
                                                                $exp = preg_split("/-/", $ageGroupname->name);
                                                                if (isset($exp[1])) {
                                                                    if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                                ?>
                                                                         <tr>
                                                <td>{{$ageGroupname->name}}</td>
                                                <td>female</td>
                                                                        <td>{{$registration->user->first_name}}&nbsp;{{$registration->user->last_name}}</td>
                                                                        <td>{{$registration->user->userId}}</td>
                                                                        <td>{{$registration->user->club->club_name}}</td>
                                                                    
                                                                        @foreach($list_main_events as $event1)
            @if($event1->event_category_id !=3)
                <td>
               <?php 
                              $gender=$registration->user->id=='male'?1:2;
                $users1= DB::table('age_group_gender_user')->where('league_id',$registration->league->id)->where('user_id','=',$registration->user->id)
                ->join('age_group_genders', 'age_group_gender_user.age_group_gender_id', '=', 'age_group_genders.id')
                ->join('age_group_event', 'age_group_genders.age_group_event_id', '=', 'age_group_event.id')
                ->select('age_group_gender_user.marks as marks','age_group_event.event_id as eventId')->get();


               ?>
       @foreach($users1 as $user1)
       <?php $eventsid=App\Models\Event::find($user1->eventId); 
       ?>
                    @if($event1->id == $eventsid->main_event_id)
                    @if($user1->marks ==NULL)
                    &#10003;
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->first_place)
                    {{1}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->second_place)
                    {{2}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->third_place)
                    {{3}}
                    @endif
                    @endif
                  @endforeach
                 
                </td>
                @endif

                @endforeach
                                                                        </tr>
                                                                        
                                                                    <?php
                                                                    }
                                                                }
                                                                if ($exp[0] == $age) {
                                                                    ?>
  <tr>
                                                <td>{{$ageGroupname->name}}</td>
                                                <td>female</td>
                                                                        <td>{{$registration->user->first_name}}&nbsp;{{$registration->user->last_name}}</td>
                                                                        <td>{{$registration->user->userId}}</td>
                                                                        <td>{{$registration->user->club->club_name}}</td>
                                                                    
                                                                        @foreach($list_main_events as $event1)
            @if($event1->event_category_id !=3)
                <td>
               <?php 
                              $gender=$registration->user->id=='male'?1:2;
                $users1= DB::table('age_group_gender_user')->where('league_id',$registration->league->id)->where('user_id','=',$registration->user->id)
                ->join('age_group_genders', 'age_group_gender_user.age_group_gender_id', '=', 'age_group_genders.id')
                ->join('age_group_event', 'age_group_genders.age_group_event_id', '=', 'age_group_event.id')
                ->select('age_group_gender_user.marks as marks','age_group_event.event_id as eventId')->get();


               ?>
       @foreach($users1 as $user1)
       <?php $eventsid=App\Models\Event::find($user1->eventId); 
       ?>
                    @if($event1->id == $eventsid->main_event_id)
                    @if($user1->marks ==NULL)
                    &#10003;
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->first_place)
                    {{1}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->second_place)
                    {{2}}
                    @endif
                    @if($user1->marks == $event1->organization->athelaticsetting->third_place)
                    {{3}}
                    @endif
                    @endif
                  @endforeach
                 
                </td>
                @endif

                @endforeach
                                                                        </tr>
                                                                   
                                                                <?php
                                                                }
                                                                ?>
                                               @endif
                                               @endif                                             
                                                @endforeach

                                           

                                            @endforeach
                                            </table>
</div>



