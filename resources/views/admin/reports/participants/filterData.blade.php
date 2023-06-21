<div class="col-md-12">
    <table class="table table-striped text-uppercase  table-bordered partiest" id="table10">
        <thead class="thead-Dark">
            <tr>
                <th>Player Name</th>
                <th>User Id</th>
                <th>Contact Number</th>
            </tr>
        </thead>
        <tbody>
@if($participants!=null)
            @foreach($participants as $participant)
            @foreach($participant->users as $user)
            <tr>
                <td>{{ $user->first_name }}-{{ $user->last_name }}</td>
                <td>{{{ $user->userId}}}</td>
                <td>{{$user->tpnumber}}</td>
            </tr>
            @endforeach
            @endforeach
            @endif

        </tbody>
    </table>
</div>