    <div class="col-md-12">
        <table class="table table-striped table-bordered organizations" id="table10" style="text-transform: capitalize;">
            <thead class="thead-Dark">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Season</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @foreach($organizations as $org)
                <tr>
                    <td style="width:25%">{{ $org->name }}</td>
                    <td style="width:25%;text-transform:none;">{{ $org->email }}</td>
                    <td style="width:8%">{{$org->tpnumber}}</td>
                    <td style="width:10%">{{ $org->city }}</td>
                    <td style="width:10%">{{ $org->country->name }}</td>
                    <td style="width:5%">{{ $org->season->name }}</td>
                    <td style="width:10%">{{ $org->status==1?'Active':'Disabled' }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>