<table class="table table-striped table-bordered" id="clubEvents" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr  style="text-align: center">

                <th>Organization</th>
                <th>League</th>
                <th>Event</th>
                <th>Age Group</th>
                <th>Gender</th>
                <th>Team Name</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody >



        @foreach($group_registations as $group_registation)
        @if($group_registation->club_id ==Auth::user()->club_id)
        
            <tr>    
                <td>{{ $group_registation->organization->name }}</td>

                <td>{{ $group_registation->league->name }}</td>



                <td>{{$group_registation->ageGroupGender->ageGroupEvent->Event->mainEvent->name}}</td>

                
                <td>
                    {{$group_registation->ageGroupGender->ageGroupEvent->ageGroup->name}}

                </td>

                
                

                <td>
                    {{$group_registation->ageGroupGender->gender->name}}

               </td>

                <td>
                @foreach ($group_registation->teams as $team)
                    {{ $team->name }} <br>
                    @endforeach
                </td>
                @if($group_registation->ageGroupGender->status==2)
                                <td>
                                    <span class="label label-primary">Not Started</span>

                                </td>
                                @elseif($group_registation->ageGroupGender->status==0)
                                <td> <span class="label label-warning">On Going </span>
                                </td>
                                @elseif($group_registation->ageGroupGender->status==1)
                                 <td> <span class="label label-success">Finished</span>
                                </td>
                                @endif
            </tr>
            @endif
        @endforeach
                

        </tbody>
    </table>
