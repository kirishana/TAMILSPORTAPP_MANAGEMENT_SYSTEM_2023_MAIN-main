<table class="table table-hover" id="leagueStatus" style="height:300px;">
                        <thead>
                            <tr>
                            <th style="text-align: left">League</th>
                                    <th style="text-align: left">Organization</th>
                                    <th style="text-align: left">Event</th>                                    
                                    <th style="text-align: left">Age Group</th>
                                    <th style="text-align: left">Gender</th>
                                    <th style="text-align: left">Status</th>

                            </tr>
                        </thead>


                        <tbody>
                                @foreach($ongoingLeagues2 as $ongoingLeague)
                                @if($ongoingLeague->groupRegistrations->count()>0)

                               
                                        @foreach ($ongoingLeague->groupRegistrations as $reg)
                                        @if($reg->club_id ==Auth::user()->club_id)
                                        <tr>
                                            <td>{{ $ongoingLeague->name }}</td>
                                            <td>{{ $ongoingLeague->organization->name }}</td>                                   
                                                @php
                                                $teams=array();
                                                    @endphp
                                        <td>{{$reg->ageGroupGender->ageGroupEvent->Event->mainEvent->name}}</td>
                                        <td>{{$reg->ageGroupGender->ageGroupEvent->ageGroup->name}}</td>
                                        @if($reg->ageGroupGender->gender_id==2)
                                <td>
                                    Female
                                </td>
                                @else
                                <td> Male
                                </td>
                                @endif
                                        @if($reg->ageGroupGender->status==2)
                                <td>
                                    <span class="label label-primary">Not Started</span>

                                </td>
                                @elseif($reg->ageGroupGender->status==0)
                                <td> <span class="label label-warning">On Going </span>
                                </td>
                                @elseif($reg->ageGroupGender->status==3)
                                <td> <span class="label label-warning">Finalizing </span>
                                </td>
                                @elseif($reg->ageGroupGender->status==4)
                                <td> <span class="label label-warning">Processing</span>
                                </td>
                                @elseif($reg->ageGroupGender->status==10)
                                <td> <span class="label label-danger">Cancelled</span>
                                </td>
                                @else
                                <td> <span class="label label-success">Finished</span>
                                </td>
                                @endif
                            </tr>
                                        @endif
                                     @endforeach                            
                              
                                @endif
                                @endforeach
                             </tbody>

                    </table>
                                       {{-- <span style="float: right;margin-bottom:30px;bottom:0px;">{{$ongoingLeagues2->links('vendor.pagination1')}}</span> --}}

                    
