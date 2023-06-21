<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;

    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }

</style>


<div class="row t" id="teamPrint">
@include('reports.PrintHeader')
    <br>
    </br>
    </br>
<table class="table table-striped text-uppercase table-bordered " id="">
        <thead class="thead-Dark">
            <tr>
                <th>Club Name </th>
                <th>Team Name </th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Event</th>
              
            </tr>
        </thead>
        <tbody style="text-transform:capitalize">

@foreach($groupRegistrations as $groupRegistration)

    <tr>
        <td>{{$groupRegistration->club->club_name}}</td>
        <td>
            @foreach($groupRegistration->teams as $team)
            <ul>
                <li>
                {{$team->name}}
                </li>
            </ul>
            @endforeach
</td>
<td>{{$groupRegistration->ageGroupGender->gender->name}}</td>
<td>{{$groupRegistration->ageGroupGender->ageGroupEvent->ageGroup->name}}</td>
<td>{{$groupRegistration->ageGroupGender->ageGroupEvent->Event->mainEvent->name}}</td>

    </tr>
    @endforeach
    </tbody>
    </table>
</div>
