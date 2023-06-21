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
        text-align: left;
        border: 1px solid black;


    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
text-transform: uppercase;
 /* border-color: #792700; */

}
h2{
    text-align: center;
    text-transform: capitalize;
}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
</style>
<div class="row" id="e-print">
   @include('reports.adminHeader')
   <br>
    <h2>Events</h2>
   
    <br>
    <table class="table table-striped table-bordered eve" id="export-p">
        <thead class="thead-Dark">
            <tr>
            <th>Name</th>
            <th>Organization</th>
            <th>League</th>
            <th>Event</th>
            <th>Date</th>
            <th>Time</th>


            </tr>
        </thead>
        <tbody class="text-uppercase">
        <?php
    $child_id=array();
    if(Auth::user()->children){
        $user_ids=Auth::user()->children;
        foreach($user_ids as $user_id){
            $child_id[]=$user_id->id;
        } 

    }else{
            $child_id[]=null;
    }
 

      array_push($child_id,Auth::user()->id);

    ?>
      
 @if($filter==null)


@foreach($Leagues as $League)
@php ($first = true) @endphp
@php ($second = true) @endphp

@foreach($League->registrations->whereIn('user_id',$child_id) as $reg)
 
<tr>
    
    @if($first == true)
    <td rowspan="{{$League->registrations->whereIn('user_id',$child_id)->count()}}"> {{$League->name}} </td>
    @php ($first = false) @endphp
    @endif
    @if($second == true)
    <td rowspan="{{$League->registrations->whereIn('user_id',$child_id)->count()}}"> {{$League->organization->name}} </td>
    @php ($second = false) @endphp
    @endif
    <td> {{ $reg->user->first_name}} </td>
    <td> 

      @foreach($reg->events as $event)
      <ul>
        <li>
        {{ $event->mainEvent->name }}
        </li>
      </ul>
      
      @endforeach
    </td>
    <td> 

        @foreach($reg->events as $event)
        <ul>
            <li>{{ $event->date }}</li>
        </ul>
        
        @endforeach
      </td>
      <td>
                @foreach($reg->events as $event)
                @foreach($event->ageGroups as $agegroup)
                                                        <?php
                                                        $userGender =$reg->user->gender == 'male' ? 1 : 2;
                                                        $mine = Carbon\Carbon::createFromFormat('Y-m-d', $reg->user->dob)->format('Y');
                                                        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $League->to_date)->format('Y');
                                                        $age = $league1 - $mine;
                                                        $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $agegroup->id)->first();
                                                        $exp = preg_split("/-/", $agegroup->name);
                                                        if (isset($exp[1])) {
                                                            if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                        ?>
                                                                <?php
                                                                $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                                                ?>

                                                                @foreach($genders as $gender)
                                                                @if($gender->gender_id==$userGender)
                                                                <ul>
                                                                    <li>
                                                                    {{$gender->time}}
                                                                    </li>
                                                                </ul>
                                                                @endif
                                                                @endforeach
                                                            <?php
                                                            }
                                                        }
                                                        if ($exp[0] == $age) {
                                                            ?>
                                                            <?php
                                                            $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                                            ?>

                                                            @foreach($genders as $gender)
                                                            @if($gender->gender_id==$userGender)
                                                            <ul>
                                                                    <li>
                                                                    {{$gender->time}}
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                            @endforeach
                                                        <?php
                                                        }
                                                        ?>
                                 @endforeach
                                 @endforeach

           </td>            

                    </tr>
                    @endforeach
                    @endforeach






@endif

@if($filter!=null)

@foreach($Leagues as $League)
@php ($first = true) @endphp
@php ($second = true) @endphp

@foreach($League->registrations->whereIn('user_id',$children) as $reg)

<tr>
    
    @if($first == true)
    <td rowspan="{{$League->registrations->whereIn('user_id',$children)->count()}}"> {{$League->name}} </td>
    @php ($first = false) @endphp
    @endif
    @if($second == true)
    <td rowspan="{{$League->registrations->whereIn('user_id',$children)->count()}}"> {{$League->organization->name}} </td>
    @php ($second = false) @endphp
    @endif
    <td>  
        @php $count=0; @endphp
        @foreach($reg->events as $event)
        @php $count++; @endphp

    {{ $reg->user->first_name}}
    @php if($count==1){
        break;
    } @endphp

      @endforeach
    </td>
    <td> 

      @foreach($reg->events as $event)
      @if($event->main_event_id==$filter)
      <ul>
        <li>{{ $event->mainEvent->name }}</li>
      </ul>
      @endif
      @endforeach
    </td>
    <td> 

        @foreach($reg->events as $event)
        @if($event->main_event_id==$filter)
        <ul>
            <li>
            {{ $event->date }}
            </li>
        </ul>
       
        @endif
        @endforeach
      </td>
      <td>
                @foreach($reg->events as $event)
                @if($event->mainEvent->id==$filter)
                @foreach($event->ageGroups as $agegroup)
                                                        <?php
                                                        $userGender =$reg->user->gender == 'male' ? 1 : 2;
                                                        $mine = Carbon\Carbon::createFromFormat('Y-m-d', $reg->user->dob)->format('Y');
                                                        $league1 = Carbon\Carbon::createFromFormat('Y-m-d', $League->to_date)->format('Y');
                                                        $age = $league1 - $mine;
                                                        $ageGroupEvent = App\Models\AgeGroupEvent::where('event_id', $event->id)->where('age_group_id', $agegroup->id)->first();
                                                        $exp = preg_split("/-/", $agegroup->name);
                                                        if (isset($exp[1])) {
                                                            if (($exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
                                                        ?>
                                                                <?php
                                                                $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                                                ?>

                                                                @foreach($genders as $gender)
                                                                @if($gender->gender_id==$userGender)
                                                                <ul>
                                                                    <li>
                                                                    {{$gender->time}}
                                                                    </li>
                                                                </ul>
                                                                @endif
                                                                @endforeach
                                                            <?php
                                                            }
                                                        }
                                                        if ($exp[0] == $age) {
                                                            ?>
                                                            <?php
                                                            $genders = App\Models\AgeGroupGender::where('age_group_event_id', $ageGroupEvent->id)->get();
                                                            ?>

                                                            @foreach($genders as $gender)
                                                            @if($gender->gender_id==$userGender)
                                                            <ul>
                                                                    <li>
                                                                    {{$gender->time}}
                                                                    </li>
                                                                </ul>
                                                            @endif
                                                            @endforeach
                                                        <?php
                                                        }
                                                        ?>
                                 @endforeach
                                 @endif
                                 @endforeach

           </td>           

                    </tr>
                    @endforeach
                    @endforeach

                    @endif




</table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>
</div>
<script type="text/php">
    if (isset($pdf)) {
        $x = 380;
        $y = 560;
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