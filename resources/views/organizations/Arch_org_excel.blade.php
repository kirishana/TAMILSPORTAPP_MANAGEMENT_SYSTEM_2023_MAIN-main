

<table class="table table-striped text-uppercase table-bordered" id="arch-orgprint"  width="100%">
<thead class="thead">
            <tr  style="text-align: center">

                <th>Org.No</th>
                <th>Name</th>
                <th >email</th>
                <th>mobile</th>
                <th> city</th>
                <th>country</th>
               

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($Archivedorganizations as $organization)
            <tr>
                <td>{{$organization->orgnum?$organization->orgnum:''}}</td>
                <td>{{$organization->name}}</td>
                <td style="text-transform: none;" >
                    {{$organization->email}}<br>
                
            </td>
                <td>
                {{$organization->mobile}}
                
            </td>
                <td>{{$organization->city}}</td>               
                <td>{{$organization->country->name}}</td>               
            </tr>
            @endforeach

        </tbody>
    </table>
</div>


