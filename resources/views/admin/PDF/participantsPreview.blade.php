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


<div class="row" id="suvarna">
@include('reports.PrintHeader')
    <br>
    </br>
    </br>

    <table class="table table-striped text-uppercase table-bordered filter" id="exp">
        <thead>
            <tr>
                <th>Name </th>
                <th>Participant Number</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Club</th>
                <th>Event</th>
            </tr>
        </thead>
        @if($filter==null)
        <tbody style="text-transform:capitalize">
            @foreach($registrations as  $registration)
            @if($registration->events->count()>0)
                @php
                    $club=App\Models\Club::where('id',$registration->user->club_id)->first();
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d',$registration->league->from_date)->format('Y');
                    $age = $league1 - $mine;
                @endphp

                <tr>
                    <td>
                        {{ $registration->user->first_name }} &nbsp;{{ $registration->user->last_name }}
                    </td>
<td>{{ $registration->user->userId }}</td>
                    <td>
                        {{ $age }} &nbsp;years
                    </td>
                   
                    <td>
                        {{ $registration->user->gender }}
                    </td>
                    <td>
                        {{$club?$club->club_name:'-'}}
                    </td>
                    <td>
                            <ul class="text-left">
                                @foreach($registration->events as $event)
                                    <li>
                                        {{ $event->mainEvent->name }}
                                    </li>
                                @endforeach
                            </ul>
                    </td>
                    
@endif
            @endforeach
        </tbody>
@endif
        @if($filter!=null)
        <tbody>
            @foreach($registrations as  $registration)
            @if($registration->events->count()>0)
                @php
                    $club=App\Models\Club::where('id',$registration->user->club_id)->first();
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d',$registration->league->from_date)->format('Y');
                    $age = $league1 - $mine;
                @endphp

                <tr>
                    <td>
                        {{ $registration->user->first_name }} &nbsp;{{ $registration->user->last_name }}
                    </td>
<td>{{ $registration->user->userId }}</td>
                    <td>
                        {{ $age }} &nbsp;years
                    </td>
                   
                    <td>
                        {{ $registration->user->gender }}
                    </td>
                    <td>
                        {{$club?$club->club_name:'-'}}
                    </td>
                    <td>
                            <ul class="text-left">
                                @foreach($registration->events as $event)
                                @if($event->mainEvent->id==$filter)
                                    <li>
                                        {{ $event->mainEvent->name }}
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                    </td>
                    
@endif
            @endforeach
        </tbody>
@endif
    </table>

    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

</script>