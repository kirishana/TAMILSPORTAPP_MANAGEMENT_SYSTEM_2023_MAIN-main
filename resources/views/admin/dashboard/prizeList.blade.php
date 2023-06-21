
    <table class="table table-hover prizesingle tableFixHead" id="ongEventStatus" style="height:300px;">
        <thead>
            <tr>
                <th style="text-align: left">Name</th>
                <th style="text-align: left">Event</th>
                <th style="text-align: left">Status</th>
                <th style="text-align: left">Certificate Given</th>

            </tr>
        </thead>

        <tbody>
            @foreach($eventsS as $ongoingLeague)
                @foreach($ongoingLeague->registrations as $reg)
                    @if($reg->user->club_id ==Auth::user()->club_id) 
                        @foreach($reg->events as $event)

                            <tr class="name">
                                <td>{{ $reg->user->first_name }}&nbsp;{{ $reg->user->last_name }}                           
                                </td>
                                <td>{{ $event->mainEvent->name }}
                                </td>
                        
                                @if($reg->status==0)

                                    <td>
                                        <span class="label label-success">finished</span>

                                    </td>
                                @elseif($reg->status==1)

                                    <td> <span class="label label-warning">On Going </span>
                                    </td>
                                @else

                                    <td> <span class="label label-primary">Not Started </span>
                                    </td>
                                @endif
                                @if($reg->prize_given==1)

                                    <td>
                                        <span class="label label-success">Yes</span>

                                    </td>
                                @elseif($reg->prize_given==0)

                                    <td> <span class="label label-warning">No </span>
                                    </td>

                                @endif

                            </tr>

                        @endforeach
                    @endif

                @endforeach
            @endforeach
        </tbody>
        
    </table>
   



