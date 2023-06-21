<table class="table table-striped  table-bordered " id="over" style="text-transform: capitalize;">
                                    
<?php $list_main_events=App\Models\MainEvent::where('organization_id', Auth::user()->organization_id !== null ? Auth::user()->organization_id : $id)->wherehas('events',function($q)use($ongngLeagues){
                $q->wherehas('league',function($q) use($ongngLeagues){
                    $q->where('id',$ongngLeagues?$ongngLeagues->id:'');
                });
            })->get(); 
            ?>
                                                      <thead>
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
                                             $registrations = App\Models\Registration::where('league_id',$ongngLeagues->id)->where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
                                                $q->where('is_approved',1);
                                            })->wherehas('events',function($q) use($ageGroupname){
                                                $q->wherehas('ageGroups',function($q) use($ageGroupname){
                                                    $q->where('age_group_id',$ageGroupname->id);
                                                });
                                            })->get();
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
                                                        @foreach($registration->events as $event)

                                                            @if($event->main_event_id == $event1->id)
                                                            &#10003;
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
                                                        @foreach($registration->events as $event)

                                                            @if($event->main_event_id == $event1->id)
                                                            &#10003;
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
                                             $registrations = App\Models\Registration::where('league_id',$ongngLeagues->id)->where([['organization_id', Auth::user()->organization_id ? Auth::user()->organization_id : $id],['is_approved','=',1]])->wherehas('user',function($q){
                                                $q->where('is_approved',1);
                                            })->wherehas('events',function($q) use($ageGroupname){
                                                $q->wherehas('ageGroups',function($q) use($ageGroupname){
                                                    $q->where('age_group_id',$ageGroupname->id);
                                                });
                                            })->get();
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
                                                        @foreach($registration->events as $event)

                                                            @if($event->main_event_id == $event1->id)
                                                            &#10003;
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
                                                        @foreach($registration->events as $event)

                                                            @if($event->main_event_id == $event1->id)
                                                            &#10003;
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