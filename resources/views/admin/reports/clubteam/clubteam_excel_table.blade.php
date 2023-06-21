<table class="table table-striped table-bordered club-t" id="club-t" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr  style="text-align: center">

                <th>Club Team Name</th>
                <th>Members</th>
                <th>Age Group</th>
                <th>Gender</th>
                

            </tr>
        </thead>
        <tbody>

                @foreach($teams as $team)
            <tr>
                <td>{{$team->name}}</td>
                
                <td>
                @foreach ($team->users as $user)
                {{$user->first_name}}  {{$user->last_name}}<br>
                 @endforeach
                </td>

                <td>
                    {{ $team->ageGroup->name }}
                     </td>
                     <td>
                       {{ $team->gender_id==1?'Male':'Female'}}
                         </td>
                
            </tr>
            @endforeach
            

        </tbody>
    </table>