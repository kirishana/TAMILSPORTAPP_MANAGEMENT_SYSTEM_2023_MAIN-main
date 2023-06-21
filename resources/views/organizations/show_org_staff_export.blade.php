
<table>
        <thead class="thead-Dark">
            <tr>

                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Mobile</th>
                <th>Age</th>
                <th>Role</th>
                <th>Club</th>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th>SIL member</th>
                @endif
                @endif
                @endif
                  <th>status</th>


            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}} </td>
                <td>{{$user->last_name}}</td>

                <td>{{$user->email}}</td>
                <td >{{$user->tel_number}}</td>
                <td><?php $age=Carbon\Carbon::parse($user->dob)->diff(Carbon\Carbon::now())->y ?>{{ $age }}</td>
                <td>{{$user->roles->pluck('name')->implode(' ')}}</td>
                <td>{{$user->club ? $user->club->club_name : ''}}</td>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <td>{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                @endif
                @endif
                @endif
                <td>{{$user->is_approved==1 ? 'Approved' : 'Not Approved'}}</td>

            </tr>
            @endforeach

        </tbody>
    </table>
