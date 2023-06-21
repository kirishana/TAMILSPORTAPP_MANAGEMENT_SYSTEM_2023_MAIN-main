<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: uppercase;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: left;
    }

    table tr,
    table td {
        padding: 5px;
    }
    .thead th{
        text-transform: uppercase;
        text-align: center;
        background-color: #515763;

    }
    .center{

    
        margin-left: auto;
        margin-right: auto;
    }
</style>
<div class="row" id="eventLists">

<div class="container">
@include('reports.PrintHeader')
</div>
<br>
    <table class="table table-striped table-bordered text-uppercase showall" style="width: 100%;" id="table2">
        <thead  class="thead">
            <tr>
                <th>League</th>
                <th>EventName</th>
                <th>Venue</th>
                <th>EventOrganizer</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Date</th>

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($events as $event)
            @if($event->league->to_date>=Carbon\Carbon::now()->format('Y-m-d'))

            <tr>
                <td style="width: 20%;">{{ $event->league->name }}</td>

                <td>
                    {{ $event->mainEvent->name }}
                </td>
                <td>{{ $event->league->venue->name }}</td>
                <td>
                    {{ $event->user->first_name }}
                </td>
                @php
                $ages = $event->ageGroups;

                @endphp
                @foreach ($ages as $age)
                {{-- {{ $age}} --}}
                @php
                $eventAgeGroupIds = App\Models\AgeGroupEvent::where('event_id', $event->id)->get();
                @endphp
                @foreach ($eventAgeGroupIds as $eventAgeGroupId)

                @php
                $AgeGroupIds = App\Models\AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();

                @endphp
                @endforeach
                @endforeach

                <td style="width: 10%;">
                    @foreach ($AgeGroupIds as $AgeGroupId)

                    {{ $AgeGroupId->gender->name }}<br>
                    @endforeach

                </td>


                <td style="width: 10%;">
                    @foreach($event->ageGroups as $ageGroup)
                    {{ $ageGroup->name }}<br>
                    @endforeach
                </td>

                <td style="width: 15%;">
                    @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp
                </td>



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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>