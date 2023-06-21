

<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
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


<div class="venue" id="printVenues">
<div class="container">
@include('reports.PrintHeader')
    </div> 
    <h2>Venues</h2>
<table class="table table-striped text-uppercase table-bordered " width="100%">
<thead class="thead-Dark">
            <tr  style="text-align: center">

                <th class="email">Name</th>
                <th >E-mail</th>
                <th class="phone">Track details</th>
                <th class="email">field details</th>
                <th>contact no</th>
               

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($Venues as $venue)
            <tr>
                <td>{{$venue->name}}</td>
                <td style="text-transform: none;">{{$venue->email}}</td>
                <td>@foreach($venue->venueDetails as $track)
                    {{$track->track_event_name}}&nbsp;-&nbsp;{{$track->track_event_count}}<br>
                
                @endforeach
            </td>
                <td>
                @foreach($venue->venueFieldDetails as $track)
                    {{$track->field_event_name}}<br>
                
                @endforeach
            </td>
                <td>{{ $venue->mobile }}</td>               
            </tr>
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
