

<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: uppercase;

    }

    table td,
    table th {
        border: 1px solid black;
    }

    table tr,
    table td {
        padding: 3px;
        width: 1%;
        text-align: left;

    }
    .thead{
        color: white;
        background-color: #3A3B3C;
        text-transform: uppercase;


    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
h2 {
    text-align: center;
    text-transform: uppercase;
}
</style>


<div id="orgprint">

<table class="table table-striped text-uppercase table-bordered" id="orgprint"  width="100%">
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

            @foreach($organizations as $organization)
            <tr>
                <td>{{$organization->orgnum?$organization->orgnum:''}}</td>
                <td>{{$organization->name}}</td>
                <td >
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

