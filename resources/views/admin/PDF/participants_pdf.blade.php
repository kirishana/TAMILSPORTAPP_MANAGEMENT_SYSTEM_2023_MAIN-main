<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        margin: auto;
       
    }
    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;
        border: 1px solid #ddd;

    }

     td {
        width: 1px;
    }
  .thead {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
h2 {
    text-align: center;
    text-transform: uppercase;
}
td{
    border: 1px solid #ddd;
    padding:5px;
}
</style>
<div class="row" id="suvarna">
            @include('reports.header')
</br>
    @if($eventTitle!=null||$AgeTitle!=null||$GenTitle!=null||$leagueTitle!=null)
<div style="text-align:center;"> 
<strong>@if($leagueTitle) <span style="font-size:30px;">{{$leagueTitle->name}}</span> @endif
<strong>@if($eventTitle) <span style="font-size:30px;">{{$eventTitle->name}}</span> @endif
               @if($AgeTitle) <span style="font-size:30px;">({{$AgeTitle->name}})@endif
               @if($GenTitle)
              @if($GenTitle->name=="Male") <span style="color:green;font-size:20px;">{{$GenTitle->name}}  </span>
              @else
              <span style="color:red;font-size:20px;">{{$GenTitle->name}}                </span>

                @endif
               
                @endif</strong>
                </div>
@else
<h2>Participants</h2>
@endif
<br>
    <table class="table table-striped table-bordered text-uppercase filter" style="margin-left:0px" id="exp">
        <thead class="thead">
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

        @foreach($registrations as  $registration)
        @if($registration->events->count()>0)

                @php
                    $club=App\Models\Club::where('id',$registration->user->club_id)->first();
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d',$registration->league->from_date)->format('Y');
                    $age = $league1 - $mine;
                @endphp

                <tr>
                    <td style="width:30%;">
                        {{ $registration->user->first_name }} &nbsp;{{ $registration->user->last_name }}
                    </td>
<td style="width:10%">{{ $registration->user->userId }}</td>
                    <td style="width:10%;">
                        {{ $age }} &nbsp;years
                    </td>
                    <td style="width:10%;">
                        {{ $registration->user->gender }}
                    </td>
                    <td style="width:20%;">
                        {{$club?$club->club_name:'-'}}
                    </td>

                    <td style="width:20%;">
                            <ul class="text-left">
                                @foreach($registration->events as $event)
                                    <li>
                                        {{ $event->mainEvent->name }}
                                    </li>
                                @endforeach
                            </ul>
                    </td>
        </tr>
@endif
            @endforeach
            @endif
        @if($filter!=null)

        @foreach($registrations as  $registration)
        @if($registration->events->count()>0)

                @php
                    $club=App\Models\Club::where('id',$registration->user->club_id)->first();
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
                    $league1 = Carbon\Carbon::createFromFormat('Y-m-d',$registration->league->from_date)->format('Y');
                    $age = $league1 - $mine;
                @endphp

                <tr>
                    <td style="width:30%;">
                        {{ $registration->user->first_name }} &nbsp;{{ $registration->user->last_name }}
                    </td>
<td style="width:10%">{{ $registration->user->userId }}</td>
                    <td style="width:10%;">
                        {{ $age }} &nbsp;years
                    </td>
                    <td style="width:10%;">
                        {{ $registration->user->gender }}
                    </td>
                    <td style="width:20%;">
                        {{$club?$club->club_name:'-'}}
                    </td>

                    <td style="width:20%;">
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
        </tr>
@endif
            @endforeach
            @endif

    </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
    <body>      
    <script type="text/php">
    if (isset($pdf)) {
        $x = 380;
        $y = 570;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

</script>
