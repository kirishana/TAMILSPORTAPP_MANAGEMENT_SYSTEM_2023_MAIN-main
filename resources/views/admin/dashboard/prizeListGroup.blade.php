
    <table class="table table-hover tableFixHead group" id="num" style="height:300px;">
        <thead>
            <tr>
                <th style="text-align: left">Name</th>
                <th style="text-align: left">Event</th>
                <th style="text-align: left">Age Group</th>
                <th style="text-align: left">Gender</th>
                <th style="text-align: left">Status</th>
                <th style="text-align: left">Certificate Given</th>

            </tr>
        </thead>

        <tbody>
                                @foreach($eventsG as $ongoingLeague)
                                @foreach ($ongoingLeague->groupRegistrations as $reg)
                                        @if($reg->club_id ==Auth::user()->club_id)
                                        @foreach ($reg->teams as $team)

                                <tr>
                                    <td>{{ $team->name }}</td>
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
                                @else
                                <td> <span class="label label-success">Finished</span>
                                </td>
                                @endif
                                @if($reg->ageGroupGender->prize_given==0)
                                <td>
                                    <span class="label label-warning">No</span>

                                </td>
                               
                                @else
                                <td> <span class="label label-success">Yes</span>
                                </td>
                                @endif
                                @endforeach

                                        @endif
                                     @endforeach
                                </tr>

                                @endforeach
                             </tbody>
    </table>
