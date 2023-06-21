
<div class="row" id="player">
<table class="table table-striped table-bordered part" id="table10">
        <thead class="thead-Dark">
            <tr>
                <th>Name</th>
                <th>Organization Name</th>
                <th>League Name</th>
                <th>Event Name</th>
            </tr>
        </thead>

        <tbody style="text-transform:capitalize;">

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
                            @if($user->is_approved==1)

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
    <body>      
    <script type="text/php">
    if (isset($pdf)) {
        $x = 250;
        $y = 820;
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