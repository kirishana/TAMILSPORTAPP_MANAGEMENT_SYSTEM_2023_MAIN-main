

        @foreach($events as $event)
        @if(Auth::user()->hasRole(4))
        @if($event->user_id==Auth::user()->id)
        @if($event->league->to_date>=Carbon\Carbon::now()->format('Y-m-d'))
        <tr>
            <td style="width:15%;">
                {{ $event->mainEvent->name }}
            </td>
            <td style="width:20%;">{{ $event->league->name }}</td>

            <td style="width:20%;">{{ $event->league->venue->name }}</td>
            <td style="width:10%;">
                {{ $event->user->first_name }} {{ $event->user->last_name }}
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
            $genders=array();
            $AgeGroupIds = App\Models\AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
            $genders[]=$AgeGroupIds;
            @endphp
            @endforeach
            @endforeach
            <td style="width:8%;">
                @foreach ($genders as $gender)
                @foreach ($gender as $AgeGroupId )
                {{ $AgeGroupId->gender->name }}<br>
                @endforeach
                @endforeach
            </td>

            <td style="width:7%;">
                @foreach($event->ageGroups as $ageGroup)
                {{ $ageGroup->name }}<br>
                @endforeach
            </td>

            <td style="width:8%;">
                @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp            </td>
                                 @if (Auth::guard('web')->user()->can('editevent')|| (Auth::guard('web')->user()->can('deleteevent')))

            <td style="width:5%;">
                
                @if($event->mainEvent->event_category_id==1||$event->mainEvent->event_category_id==2)
                @if($event->registrations->count()==null)

                <a href="/league/edit/event/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                @else
                  <a href="/league/edit/event/date/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                @endif
                @endif

                   @if($event->mainEvent->event_category_id==3)
                  
                @if($event->groupRegistrations->count()==null)

                <a href="/league/edit/event/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                @else
                  <a href="/league/edit/event/date/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                @endif
                @endif
                @if($event->mainEvent->event_category_id==1||$event->mainEvent->event_category_id==2)
                @if($event->registrations->count()==null)
                <a href="#" data-id="{{ $event->id }}" class="btn btn-danger deleteEvent" style="padding: 2px 4px"><i class="material-icons" style="margin-bottom:5px">delete</i></a>
                @endif
                @endif
                @if($event->mainEvent->event_category_id==3)
                @if($event->groupRegistrations->count()==null)
                <a href="#" data-id="{{ $event->id }}" class="btn btn-danger deleteEvent" style="padding: 2px 4px" ><i class="material-icons" style="margin-bottom:5px">delete</i></a>
                @endif
                @endif
               
               
               
            </td>
            @endif
            <td style="width:3%;">


            <button style="padding: 2px 4px" class=" btn btn-primary show" data-id="{{ $event->id }}"  title="View Rules" data-toggle="modal" data-target="#rules"><img style="font-size:14px;margin-bottom:5px;" src="{{ asset('assets/images/icons/rules.png') }}"> </button>

            </td>

        </tr>
        @endif
        @endif
        @else
        @if($event->league->to_date>=Carbon\Carbon::now()->format('Y-m-d'))
        <tr>
            <td style="width:15%;">
                {{ $event->mainEvent->name }}
            </td>
            <td style="width:20%;">{{ $event->league->name }}</td>

            <td style="width:20%;">{{ $event->league->venue->name }}</td>
            <td style="width:10%;">
                {{ $event->user->first_name }} {{ $event->user->last_name }}
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
            $genders=array();
            $AgeGroupIds = App\Models\AgeGroupGender::where('age_group_event_id', $eventAgeGroupId->id)->get();
            $genders[]=$AgeGroupIds;
            @endphp
            @endforeach
            @endforeach
            <td style="width:8%;">
                @foreach ($genders as $gender)
                @foreach ($gender as $AgeGroupId )
                {{ $AgeGroupId->gender->name }}<br>
                @endforeach
                @endforeach
            </td>

            <td style="width:7%;">
                @foreach($event->ageGroups as $ageGroup)
                {{ $ageGroup->name }}<br>
                @endforeach
            </td>

            <td style="width:8%;">
                @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp            </td>

                 @if (Auth::guard('web')->user()->can('editevent')|| (Auth::guard('web')->user()->can('deleteevent')))
            <td style="width:5%;">
                     
                @if($event->mainEvent->event_category_id==1||$event->mainEvent->event_category_id==2)
                @if($event->registrations->count()==null)

                <a href="/league/edit/event/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                @else
                  <a href="/league/edit/event/date/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                @endif
                @endif

                   @if($event->mainEvent->event_category_id==3)
                  
                @if($event->groupRegistrations->count()==null)

                <a href="/league/edit/event/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>
                @else
                  <a href="/league/edit/event/date/{{$event->id}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="edit"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                @endif
                @endif
                @if($event->mainEvent->event_category_id==1||$event->mainEvent->event_category_id==2)
                @if($event->registrations->count()==null)
                <a href="#" data-id="{{ $event->id }}" class="btn btn-danger deleteEvent" style="padding: 2px 4px"><i class="material-icons" style="margin-bottom:5px">delete</i></a>
                @endif
                @endif
                @if($event->mainEvent->event_category_id==3)
                @if($event->groupRegistrations->count()==null)
                <a href="#" data-id="{{ $event->id }}" class="btn btn-danger deleteEvent" style="padding: 2px 4px" ><i class="material-icons" style="margin-bottom:5px">delete</i></a>
                @endif
                @endif
             
                <!--@if($event->mainEvent->event_category_id==3)-->
                <!--@if($event->groupRegistrations->count()==null)-->
                <!--<a href="#" data-id="{{ $event->id }}" class="btn btn-danger deleteEvent" style="padding: 2px 4px" data-toggle="modal" data-target="#deleteModal"><i class="material-icons" style="margin-bottom:5px">delete</i></a>-->
                <!--@endif-->
                <!--@endif-->
            </td>
            @endif
            <td style="width:3%;">

                <button style="padding: 2px 4px" class=" btn btn-primary show" data-id="{{ $event->id }}"  title="View Rules" data-toggle="modal" data-target="#rules"><img style="font-size:14px;margin-bottom:5px;" src="{{ asset('assets/images/icons/rules.png') }}"> </button>

            </td>

        </tr>
        @endif
        @endif
        @endforeach
    
<script>

$(document).on('click', '.deleteEvent', function() {
        var id = $(this).attr("data-id")
        $('#deleteModal').modal('show');
        $('#deleted_id').val(id);

    });
$(document).on('click', '.yes', function(e) {
    e.preventDefault();
    var id = $('#deleted_id').val();
    var method = $('#_method').val();

    $.ajax({
        type: "GET",
        url: "/events/delete/" + id,
        dataType: "json",
        data: {
            'id': id
        },
        success: function(response) {
            window.location.reload();
        }
    });

});
</script>