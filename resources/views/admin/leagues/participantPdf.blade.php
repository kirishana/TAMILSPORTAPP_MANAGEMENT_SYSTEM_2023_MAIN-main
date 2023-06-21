<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
        /* width: 8%; */
    }

    table tr,
    table td {
        padding: 3px;
        width: 1%;
    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;

 /* border-color: #792700; */

}
</style>
<div>
    <div class="container" style="width:705px;height:120px;">
        @if($header)
        <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('organization/header/'.$header .'') }}">

        @else
        <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('assets/images/authors/avatar5.png')}}">
        @endif
    </div>

</div>
<div class="panel-body table-responsive">

    <table class="table table-striped table-bordered text-uppercase" id="showall">
        <thead class="thead-Dark">
            <tr>
                <th>Age Groups</th>
                <th>Participant No</th>
                <th>First Name</th>
                <th>Surname</th>
                <th>Events</th>

            </tr>
        </thead>
<tbody class="text-uppercase">
        @foreach ($registrations as $registration)
        <?php
        $mine = Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $league->to_date)->format('Y');
        $age = $league1 - $mine;
        $events = array();
        $regs = array();
        ?>

        <tr>
            <td>{{$age}} {{$registration->user->gender}}</td>
            <td>{{$registration->user->userId}}</td>
            <td>{{$registration->user->first_name}}</td>
            <td>{{$registration->user->last_name}}</td>
            @foreach ($registration->events as $eventName )
            <td>{{$eventName->mainEvent->name}}</td>
            @endforeach
            @endforeach
            <?php

            // var_dump($regs);
            ?>
        </tr>
        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>