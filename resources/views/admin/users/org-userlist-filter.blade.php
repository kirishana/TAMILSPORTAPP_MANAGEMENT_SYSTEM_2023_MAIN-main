
                        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->email}}</td>
                
                <td> {{$user->roles->pluck('name')[0]}}</td>
                <td><?php $age=Carbon\Carbon::parse($user->dob)->diff(Carbon\Carbon::now())->y ?>{{ $age }}
                </td>
                <td>{{$user->club ? $user->club->club_name : ''}}</td>
                <td>{{ $user->created_at->format('m/d/Y') }}</td>
                @if($user->is_approved==2)
                <td id="">
                <a href="/user/view/{{ Auth::user()->id }}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                
                </td>
                @elseif($user->is_approved == 1)
                <td id="">
                    <a href="/user/view/{{ Auth::user()->id }}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{$user->id}}"  ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                </td>
                @else($user->is_approved == 0)
                <td id="">
                <a href="/user/view/{{ Auth::user()->id }}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                </td>
                @endif
            </tr>
            @endforeach
            
           
                      