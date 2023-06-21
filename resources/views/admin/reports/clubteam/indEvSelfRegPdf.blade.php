<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: uppercase;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    table td,
    table th {
        padding-bottom: 5px;
        padding-top: 5px;
        line-height: 1;
        border: 1px solid #ddd;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
</style>
<div class="row" id="print">
<div class="container">
@include('reports.adminHeader')
    </div>
<h2 style="text-transform:uppercase ;text-align:center;">Individual Events Registered By Participants</h2>
<table class="table table-striped table-bordered" id="individual" style="text-transform: capitalize;">
        <thead class="thead-Dark">
            <tr  style="text-align: center">

                <th>Participant's &nbsp; Name</th>
                <th>League</th>
                <th>Event</th>
                <th>Age</th>
                <th>Gender</th>
            </tr>
        </thead>
        <tbody >

        @if($filter==null)
        @foreach($registations as $registation)
        
            <tr>    
                <td>{{ $registation->user->first_name }}&nbsp;{{ $registation->user->last_name }}</td>

                <td>{{ $registation->league->name }}</td>
                <td>
                            <ul class="text-left">

                                @foreach($registation->events as $event)
                                    <li>
                                        {{ $event->mainEvent->name }}
                                    </li>
                                @endforeach
                            </ul>
                       

                    </td>
                </td>
                <td>
               <?php 
               $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registation->user->dob)->format('Y');
               $today = Carbon\Carbon::now()->format('Y');
               $age = $today - $mine;
               ?>
               {{$age}}
                </td>
                <td>
                {{ $registation->user->gender }}
                </td>
                               
            </tr>
        @endforeach
                @endif
        @if($filter!=null)
        @foreach($registations as $registation)
        
            <tr>    
                <td>{{ $registation->user->first_name }}&nbsp;{{ $registation->user->last_name }}</td>

                <td>{{ $registation->league->name }}</td>
                <td>
                            <ul class="text-left">
                                @foreach($registation->events as $event)
                                @if($event->mainEvent->id==$filter)
                                    <li>
                                        {{ $event->mainEvent->name }}
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                    </td>
                <td>
               <?php 
               $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registation->user->dob)->format('Y');
               $today = Carbon\Carbon::now()->format('Y');
               $age = $today - $mine;
               ?>
               {{$age}}
                </td>
                <td>
                {{ $registation->user->gender }}
                </td>
                               
            </tr>
        @endforeach
                @endif

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>


</div>

<script type="text/php">
    if (isset($pdf)) {
        $x = 360;
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>