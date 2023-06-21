<style type="text/css">
      table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
    }

     td {
        width: 1px;
    }
</style>
<div class="row starters" id="starters">
<div class="container">
@include('reports.PrintHeader')
    </div>
    <br>
    <br>
    <br>
    <table class="table table-striped table-bordered" style="text-transform: capitalize;">
        <thead>
            <tr>
                <th>League</th>
                <th>Event</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Status</th>
                <th>Starter</th>
                <th>Judge</th>

            </tr>

        </thead>
        <tbody>
            @foreach($genders as $gender)
            @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)

            <tr>
                <td>{{$gender->ageGroupEvent->Event->league->name}}
                <td>
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td>
                    {{ $gender->gender->name }}
                </td>

                <td>
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                @if($gender->status==2)
                <td>
                    <h5>Not Started</h5>

                </td>
                @elseif($gender->status==0)
                <td> >On Going 
                </td>
                @elseif($gender->status==3)
                <td> Finalizing 
                </td>
                @else
                <td>Finished
                </td>
                @endif
                <td>{{$gender->starter?$gender->starter->first_name:''}}</td>

                <td>{{$gender->judge?$gender->judge->first_name:''}}</td>

            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($setting?$setting->footer:'') !!}


        </div>
    </section>
</div>