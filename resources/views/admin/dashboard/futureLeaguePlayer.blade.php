<table class="table table-hover tableFixHead empty" id="futureLeague"  style="background-color:#fff;height:;">
                <thead>
                    <tr>
                        <th style="text-align:left;">League</th>
                        <th style="text-align:left;">Events</th>
                        <th style="text-align:left;">Registered Events</th>
                    </tr>
                </thead>
                <tbody style="background-color:#fff;height:260px;">
                @foreach($futureLeagues as $futureLeague)
                    @if($futureLeague->to_date > Carbon\Carbon::now()&& $futureLeague->from_date > Carbon\Carbon::now())
                   

                            <tr>
                                    <td>{{ $futureLeague->name }}</td>
                                   <td>
                                   @foreach($futureLeague->events as $event)
                                            @if($event->mainEvent->event_category_id!=3)
                                                @foreach($event->ageGroups as $ageGroup)

                                                    <?php
                        $userGender = Auth::user()->gender == 'male' ? 1 : 2;
                       $mine = Carbon\Carbon::createFromFormat('Y-m-d',  Auth::user()->dob)->format('Y');
                       $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $futureLeague->to_date)->format('Y');
                       $age = $league1 - $mine;
                       $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                       $exp = preg_split("/-/", $ageGroup->name);
                       if (isset($exp[1])) {
                        if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>
                                            @foreach($AgeGroupGenders as $AgeGroupGender)
                                                        @if($AgeGroupGender->gender_id==$userGender)
                                                            @if($AgeGroupGender->status!=10)
                                                           
                                                               <ul>
                                                                <li>{{$event->mainEvent->name}}</li>
                                                               </ul> 
                                                            @endif
                                                        @endif
                                                    
                                                        @endforeach
                                                   
                                                    <?php
                        }
                    }
                    if ($exp[0] == $age) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>


                                            @foreach($AgeGroupGenders as $AgeGroupGender)
                                                        @if($AgeGroupGender->gender_id==$userGender)
                                                            @if($AgeGroupGender->status!=10)
                                                           
                                                               <ul>
                                                                <li>{{$event->mainEvent->name}}</li>
                                                               </ul> 
                                                            @endif
                                                        @endif
                                                    
                                                        @endforeach

                                                    <?php
                    }
                    ?>
                                                @endforeach
                                            @endif
                                        @endforeach
                                   </td>
                                   <td>
                                   @foreach($futureLeague->events as $event)
                                            @if($event->mainEvent->event_category_id!=3)
                                                @foreach($event->ageGroups as $ageGroup)

                                                    <?php
                        $userGender = Auth::user()->gender == 'male' ? 1 : 2;
                       $mine = Carbon\Carbon::createFromFormat('Y-m-d',  Auth::user()->dob)->format('Y');
                       $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $futureLeague->to_date)->format('Y');
                       $age = $league1 - $mine;
                       $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                       $exp = preg_split("/-/", $ageGroup->name);
                       if (isset($exp[1])) {
                        if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>
                                           <?php $reg=App\Models\Registration::where('user_id',Auth::user()->id)->where('league_id',$futureLeague->id)->get(); ?>
                                                                @if($reg!=null)
                                                                @foreach($reg as $regist)
                                                                @foreach($regist->events as $event1)
                                                                @if($event1->id==$event->id)
                                                                    <ul>
                                                                        <li>{{$event->mainEvent->name}}</li>
                                                                    </ul>
                                                                @endif
                                                                @endforeach
                                                                @endforeach
                                                                @endif
                                                   
                                                    <?php
                        }
                    }
                    if ($exp[0] == $age) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>

  <?php $reg=App\Models\Registration::where('user_id',Auth::user()->id)->where('league_id',$futureLeague->id)->get(); ?>
                                                                @if($reg!=null)
                                                                @foreach($reg as $regist)
                                                                @foreach($regist->events as $event1)
                                                                @if($event1->id==$event->id)
                                                                    <ul>
                                                                        <li>{{$event->mainEvent->name}}</li>
                                                                    </ul>
                                                                @endif
                                                                @endforeach
                                                                @endforeach
                                                                @endif
                                                   
                                                    <?php
                    }
                    ?>
                                                @endforeach
                                            @endif
                                        @endforeach
                                   </td>
                                       

                            </tr>
                        @endif
                    @endforeach




                    @if(Auth::user()->children)
                @foreach(Auth::user()->children as $child)
                @foreach($futureLeagues as $futureLeague)
                    @if($futureLeague->to_date > Carbon\Carbon::now()&& $futureLeague->from_date > Carbon\Carbon::now())
                            <tr>
                                    <td>{{ $futureLeague->name }}&nbsp;[for {{$child->first_name}}]</td>
                                   
                                   
                                    <td>
                                   @foreach($futureLeague->events as $event)
                                            @if($event->mainEvent->event_category_id!=3)
                                                @foreach($event->ageGroups as $ageGroup)

                                                    <?php
                        $userGender =$child->gender == 'male' ? 1 : 2;
                       $mine = Carbon\Carbon::createFromFormat('Y-m-d', $child->dob)->format('Y');
                       $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $futureLeague->to_date)->format('Y');
                       $age = $league1 - $mine;
                       $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                       $exp = preg_split("/-/", $ageGroup->name);
                       if (isset($exp[1])) {
                        if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>
                                            @foreach($AgeGroupGenders as $AgeGroupGender)
                                                        @if($AgeGroupGender->gender_id==$userGender)
                                                            @if($AgeGroupGender->status!=10)
                                                           
                                                               <ul>
                                                                <li>{{$event->mainEvent->name}}</li>
                                                               </ul> 
                                                            @endif
                                                        @endif
                                                    
                                                        @endforeach
                                                   
                                                    <?php
                        }
                    }
                    if ($exp[0] == $age) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>


                                            @foreach($AgeGroupGenders as $AgeGroupGender)
                                                        @if($AgeGroupGender->gender_id==$userGender)
                                                            @if($AgeGroupGender->status!=10)
                                                           
                                                               <ul>
                                                                <li>{{$event->mainEvent->name}}</li>
                                                               </ul> 
                                                            @endif
                                                        @endif
                                                    
                                                        @endforeach

                                                    <?php
                    }
                    ?>
                                                @endforeach
                                            @endif
                                        @endforeach
                                   </td>
                                    <td>
                                   @foreach($futureLeague->events as $event)
                                            @if($event->mainEvent->event_category_id!=3)
                                                @foreach($event->ageGroups as $ageGroup)

                                                    <?php
                        $userGender =$child->gender == 'male' ? 1 : 2;
                       $mine = Carbon\Carbon::createFromFormat('Y-m-d', $child->dob)->format('Y');
                       $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $futureLeague->to_date)->format('Y');
                       $age = $league1 - $mine;
                       $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $ageGroup->id)->first();
                       $exp = preg_split("/-/", $ageGroup->name);
                       if (isset($exp[1])) {
                        if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>
                          <?php $reg=App\Models\Registration::where('user_id',Auth::user()->id)->where('league_id',$futureLeague->id)->get(); ?>

                                           @if($reg!=null)
                                                                @foreach($reg as $regist)
                                                                @foreach($regist->events as $event1)
                                                                @if($event1->id==$event->id)
                                                                    <ul>
                                                                        <li>{{$event->mainEvent->name}}</li>
                                                                    </ul>
                                                                @endif
                                                                @endforeach
                                                                @endforeach
                                                                @endif
                                                   
                                                   
                                                    <?php
                        }
                    }
                    if ($exp[0] == $age) {
                        ?>
                                                    <?php
                         $AgeGroupGenders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                        ?>
                          <?php $reg=App\Models\Registration::where('user_id',Auth::user()->id)->where('league_id',$futureLeague->id)->get(); ?>



                                                    @if($reg!=null)
                                                                @foreach($reg as $regist)
                                                                @foreach($regist->events as $event1)
                                                                @if($event1->id==$event->id)
                                                                    <ul>
                                                                        <li>{{$event->mainEvent->name}}</li>
                                                                    </ul>
                                                                @endif
                                                                @endforeach
                                                                @endforeach
                                                                @endif
                                                   

                                                    <?php
                    }
                    ?>
                                                @endforeach
                                            @endif
                                        @endforeach
                                   </td>

                            </tr>
                        @endif
                    @endforeach
                    @endforeach
                    @endif
</tbody>
            </table>