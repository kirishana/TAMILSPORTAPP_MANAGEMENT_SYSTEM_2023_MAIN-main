<table class="table table-striped table-bordered text-uppercase excelExport"  width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead>
            <tr>

            <th>First Name</th>
            <th>Last Name</th>

                <th>E-mail</th>
                <th>Role</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>Club</th>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th>SIL Member</th>
                @endif
                @endif
                @endif
                <th>Status</th>

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($users as $user)
            <tr>
            <td>{{$user->first_name}}</td>
            <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->roles->pluck('name')->implode(' ')}}</td>
                <td><?php 
                                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                                    $age = $today - $mine;
                                ?>{{ $age }}</td>
                <td>{{$user->gender}}</td>

                <td>{{$user->tel_number}}</td>
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