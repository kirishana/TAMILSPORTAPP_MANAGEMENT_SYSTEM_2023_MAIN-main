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
    .thead{
        text-align: center;
        text-transform: uppercase;
    }
    h4{
        text-align: center;
        text-transform: capitalize;
    }
</style>
<div class="row self" id="eventprnt20">
@include('reports.adminPrintHeader')
    <br>
    <h4>INDIVIDUAL EVENTS REGISTERED BY CLUB ADMIN</h4>
<table class="table table-striped table-bordered" id="" style="text-transform: capitalize;">
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
        @foreach($clubregistations as $registation)
        
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
        @foreach($clubregistations as $registation)
        
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

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>