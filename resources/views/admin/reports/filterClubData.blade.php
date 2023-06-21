<div class="col-md-12">
    <table class="table table-striped  table-bordered organizations" id="table10" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr>
                <th>Club Name</th>
                <th class="org">Club NO</th>
                <th>Email</th>
                <th class="phone">Mobile</th>
                <th>City</th>
                <th>Country</th>
                <th>Season</th>
            </tr>
        </thead>
        <tbody>

            @foreach($clubs as $org)
            <tr>
                <td style="width:25%;">{{ $org->club_name }}</td>
                <td style="width:12%;">{{ $org->club_registation_num }}</td>
                <td style="text-transform:none;width:25%;">{{ $org->club_email }}</td>
                <td style="width:10%;">{{$org->tpnumber}}</td>
                <td style="width:10%;">{{ $org->city }}</td>
                <td style="width:10%;">{{ $org->country->name }}</td>
                <td style="width:5%;">{{ $org->season->name }}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>