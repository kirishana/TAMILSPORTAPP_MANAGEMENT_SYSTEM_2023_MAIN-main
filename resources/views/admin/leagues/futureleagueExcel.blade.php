

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


<div id="printleaguesf">

<table class="table table-striped text-uppercase table-bordered " id="printleaguesf" width="100%">
<thead class="thead">
            <tr  style="text-align: center">

                <th class="email">Name</th>
                <th >Location</th>
                <th class="phone">Season</th>
                <th class="email"> Duration</th>
                <th>reg.End date</th>
               

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($fuleagues as $league)
            <tr>
                <td>{{$league->name}}</td>
                <td>{{$league->venue->name}}</td>
                <td>
                    {{$league->season->name}}<br>
                
            </td>
                <td>
                {{$league->from_date}} &nbsp;-&nbsp;{{$league->to_date}}
                
            </td>
                <td>{{$league->reg_end_date}}</td>               
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
