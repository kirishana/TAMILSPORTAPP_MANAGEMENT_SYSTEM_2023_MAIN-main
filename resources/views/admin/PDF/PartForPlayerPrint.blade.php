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
    h2{
        text-align: center;
        text-transform: capitalize;
    }

</style>


<div class="row" id="player">
<div class="container">
@include('reports.PrintHeader')
    </div>
    <h2>Participants</h2>
<table class="table table-striped table-bordered part" id="table10">
        <thead>
            <tr>
                <th>Name</th>
                <th>Organization Name</th>
                <th>League Name</th>
                <th>Event Name</th>
            </tr>
        </thead>

        <tbody>

                @if($filter!=null)
                @foreach($userregistrations as $registration)

            
                    <?php
        $users=DB::table('event_registration')->where('event_id',$filter)->get();
      
        ?>
                    @foreach($users as $user)
                        <?php
        $reg=App\Models\Registration::find($user->registration_id); 
        ?>
                        <?php
      
        $user = Carbon\Carbon::createFromFormat('Y-m-d', $reg->user->dob)->format('Y');
        $mine = Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->dob)->format('Y');

        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $reg->league->to_date)->format('Y');
        $ageUser = $league1 - $user;
       $age=$league1-$mine;
       ?>


                        @if($ageUser==$age)
                            @if($reg->user->gender==Auth::user()->gender)

                                <tr>
                                    <td>
                                        {{ $reg->user->first_name }}&nbsp; {{ $reg->user->last_name }}
                                    </td>
                                    <td>
                                        {{ $reg->organization->name }}
                                    </td>
                                    <td>
                                        {{ $reg->league->name }}

                                    </td>
                                  <td>
                                      <?php 
                                      $event=App\Models\Event::find($filter)
                                      ?>
                                      {{$event->mainEvent->name}}
                                  </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    @endforeach
                    @endif
                    @if($filter==null)

                    @foreach($userregistrations as $registration)
                @foreach($registration->events as $eventReg)

                    <?php
        $users=DB::table('event_registration')->where('event_id',$eventReg->id)->get();
        ?>

                    @foreach($users as $user)
                        <?php
        $reg=App\Models\Registration::find($user->registration_id); 
        ?>
                        <?php
      
        $user = Carbon\Carbon::createFromFormat('Y-m-d', $reg->user->dob)->format('Y');
        $mine = Carbon\Carbon::createFromFormat('Y-m-d', Auth::user()->dob)->format('Y');

        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $registration->league->to_date)->format('Y');
        $ageUser = $league1 - $user;
       $age=$league1-$mine;
       ?>


                        @if($ageUser==$age)
                            @if($reg->user->gender==Auth::user()->gender)

                                <tr>
                                    <td>
                                        {{ $reg->user->first_name }}&nbsp; {{ $reg->user->last_name }}
                                    </td>
                                    <td>
                                        {{ $reg->organization->name }}
                                    </td>
                                    <td>
                                        {{ $reg->league->name }}

                                    </td>
                                  <td>
                                      {{$eventReg->mainEvent->name}}
                                  </td>
                                </tr>
                            @endif
                        @endif
                    @endforeach
                    <!--  -->
                    @endforeach
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
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });

</script>
