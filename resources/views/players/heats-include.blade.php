 @if(auth()->user()->hasRole(6))
                        <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
  <input class="form-check-input"  type="radio" name="method" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">Time</label>
  <input class="form-check-input" type="radio" name="method" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">Rank</label>
</div>
    <div class="col-md-4"></div>
</div>
@endif  
<table class="table table-striped table-bordered events" style="width:60%;margin-right:auto;margin-left:auto;">
    <thead class="thead-Dark">
        <tr>
            @if(Auth::user()->hasRole(6))
            <th>Results</th>
            @endif
            @if($event->mainEvent->event_category_id==3)
            <th>Teams</th>
            @else
            <th>Player Number</th>
            @endif
            @if($event->mainEvent->event_category_id==1)
            <th>Players</th>
            @endif
        </tr>
    </thead>
@if(Auth::user()->hasRole(6))
<h4 class="length" style="display:none;text-align:center;color:red;">Please insert the values</h4>

       <tbody class="rankBasis" style="display:none;">     
       @else
           <tbody>    
       @endif
        @foreach ($players as $key => $player)

        <tr>
            @if(Auth::user()->hasRole(6))

            <td>

                <input type="number" class="rank" id="time" name="rank" data-id="{{$player->id}}" data-userId="{{$player->userId}}" value="{{ $player->pivot->time? $player->pivot->time:''}}" style="width:25%" min="1">

                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input type="hidden" value="{{ $gender->id }}" id="gender">
                <input type="hidden" value="{{ $event->id }}" id="event">




        </td>
        @endif

            <td>
                <div class="row">

                    @if($event->mainEvent->event_category_id==1)
                    <div>
                    {{ $player->userId }}
                    </div>
                    @endif
                    @if($event->mainEvent->event_category_id==3)

                    {{ $player->name }}
                    @endif
</td>

            @if($event->mainEvent->event_category_id==1)

            <td>
                <div class="row">

                    @if($event->mainEvent->event_category_id==1)
                    {{ $player->first_name }} - {{ $player->last_name }}
                    <br>
                    @endif  
                </div>
            </td>
            @endif
            @endforeach
        </tr>


    </tbody>
    <!--time -->
    
       <tbody class="timeBasis" style="display:none">   

        @foreach ($players as $key => $player)

        <tr>
            @if(Auth::user()->hasRole(6))

            <td>

                <input type="text" class="rank" id="time" name="time" data-id="{{$player->id}}" data-userId="{{$player->userId}}" value="{{ $player->pivot->time? $player->pivot->time:''}}" style="width:45%">
            <span style="background-color:red;display:none;" class="badge badge-success" id="added<?php echo $player['id']; ?>">Time format is wrong . please check the time format (Eg: minutes:seconds:milliseconds)</span>
                <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                <input type="hidden" value="{{ $gender->id }}" id="gender">
                <input type="hidden" value="{{ $event->id }}" id="event">




        </td>
        @endif

            <td>
                <div class="row">

                    @if($event->mainEvent->event_category_id==1)
                    <div>
                    {{ $player->userId }}
                    </div>
                    @endif
                    @if($event->mainEvent->event_category_id==3)

                    {{ $player->name }}
                    @endif
</td>

            @if($event->mainEvent->event_category_id==1)

            <td>
                <div class="row">

                    @if($event->mainEvent->event_category_id==1)
                    {{ $player->first_name }} - {{ $player->last_name }}
                    <br>
                    @endif  
                </div>
            </td>
            @endif
            @endforeach
        </tr>


    </tbody>

</table>
    @if(Auth::user()->hasRole(6))

    <div class="col-md-10 " >
    </div>
    <div class="col-md-2 timeBase" style="display:none;">
        <button type="button" data-id="{{$gender->id}}" class="btn btn-labeled btn-primary finish">
                Finish
                <span class="btn-label cool_btn_right">
                    <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                </span>
            </button>
    
    @else
    @endif


<script>
$('input[name=method]').change(function() { 
    var value=$(this).val();
    if(value==1){
        $('.timeBasis').show();
        $('.timeBase').show();
        $('.rankBasis').hide();
        $(".finish").prop('disabled',false);
    }
    else{
        $('.rankBasis').show();
        $('.timeBasis').hide();
         $('.timeBase').show();
         $(".finish").prop('disabled',false);
    }
});
      
</script>





