<div class="col-md-12">
    <table class="table table-striped  table-bordered users" id="users" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr class="filters" style="text-align: center">

                <th>Name</th>
                <th>E-mail</th>
                <th>DOB</th>
                <th>Role</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>Club</th>
                <th>User Id</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td   style="text-transform: none;">{{$user->email}}</td>
                <td  style="width:10%;"> @php echo Carbon\Carbon::parse($user->dob)->format('d.m.Y'); @endphp
                </td>
                <td style="width:18%;">{{$user->roles->pluck('name')->implode(' ') }}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->tel_number}}</td>
                <td>{{$user->club_id?$user->club->club_name:''}}</td>
                <td style="width: 8%;">{{$user->userId}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>