<table>
                            <tr>
                                <th class="sorting" data-sorting_type="asc" data-column_name="number" style="cursor: pointer"><span style="float: left;" id="number_icon"><i class="fas fa-arrows-alt-v"></i></span>Participant Number</th>
                                <th>Participant Name</th>
                                <th>Organization/Club</th>
                            </tr>
                        <tbody id="excelPlayerNumber">
                        @foreach ($registrations as $registration)
        @if($registration->league->to_date>Carbon\Carbon::now())
        @if($registration->events->count()>0)
        @if($registration->is_approved==1)
        <tr>
            <td style="text-transform:none;width:10%">{{ $registration->user->userId }}
            </td>
            <td style="text-transform: capitalize;width:35%">{{$registration->user->first_name}} {{$registration->user->last_name}}</td>
            <!-- <td style="text-transform: capitalize;width:10%">
        @if($registration->is_approved==2)
        <span class="label label-warning" style="font-size:14px;">Pending</span>
        @elseif($registration->is_approved==1)
        <span class="label label-success" style="font-size:14px;">Approved</span>
        @endif

    </td> -->
            @if($registration->user->club && $registration->user->organization)
            <td  style="text-transform: capitalize;width:45%">{{$registration->user->club->club_name}}</td>
            @elseif($registration->user->organization)
            <td  style="text-transform: capitalize;width:45%">{{$registration->user->organization->name}}</td>
             @elseif($registration->user->club)
            <td  style="text-transform: capitalize;width:45%">{{$registration->user->club->club_name}}</td>
            @else
            
                            <td  style="text-transform: capitalize;width:45%">{{'Independent Player'}}</td>
                            @endif
                            @endif
        

        </tr>
        @endif
@endif
        @endforeach
                        </tbody>
</table>