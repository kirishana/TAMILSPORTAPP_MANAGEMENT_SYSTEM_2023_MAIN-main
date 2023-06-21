
<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

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
<div class="row club-t2" id="c-team">
@include('reports.adminPrintHeader')

<h3 style="text-align: center;">CLUB TEAMS</h3>

    <table class="table table-striped table-bordered " style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr  style="text-align: center">

                <th>Club Team Name</th>
                <th>Members</th>
                <th>Age Group</th>
                <th>Gender</th>
                

            </tr>
        </thead>
        <tbody>

                @foreach($teams as $team)
            <tr>
                <td>{{$team->name}}</td>
                
                <td>
                @foreach ($team->users as $user)
                {{$user->first_name}}  {{$user->last_name}}<br>
                 @endforeach
                </td>

                <td>
                   {{ $team->ageGroup->name }}
                    </td>
                    <td>
                      {{ $team->gender_id==1?'Male':'Female'}}
                        </td>
                
            </tr>
            @endforeach
            

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>
</div>

 


