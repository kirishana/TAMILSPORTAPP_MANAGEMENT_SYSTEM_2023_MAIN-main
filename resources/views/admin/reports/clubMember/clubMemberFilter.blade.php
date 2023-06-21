<div class="col-md-12">
    <table class="table table-striped table-bordered club-m" id="table10" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>User Id</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td style="text-transform: none;">{{$user->email}}</td>
                <td>{{$user->dob}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->tel_number}}</td>
                <td>{{$user->userId}}</td>
            
            </tr>
@endforeach
        </tbody>
    </table>
</div>