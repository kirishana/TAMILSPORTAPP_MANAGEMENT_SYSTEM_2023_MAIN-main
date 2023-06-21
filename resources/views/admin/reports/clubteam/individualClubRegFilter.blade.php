<table class="table table-striped table-bordered" id="self" style="text-transform: capitalize;">
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