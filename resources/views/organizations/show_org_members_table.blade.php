@foreach($users as $user)
                    @if($user->is_approved!=10)
                        <tr>
                            <td>{{ $user->first_name }}</td>
                            <td>{{ $user->last_name }}</td>
                            <td style="text-transform: none;">{{ $user->email }}</td>
                            <td>{{ $user->tel_number }}</td>
                            <td><?php 
                                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');$today = Carbon\Carbon::now()->format('Y');$age = $today - $mine;
                                ?>{{ $age }}</td>
                            <td style="width:10%">{{ $user->created_at->format('d.m.Y') }}</td>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1)
                            <td style="width:7%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                            @endif
                            @endif
                            @endif
                            <td style="width:18%">{{ $user->club?$user->club->club_name:'' }}</td>
                            <td style="width:10%">
                            @if ($user->is_approved == 2) 
                        
                                <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>                                                
                              <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                              <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                            
                                       @elseif ($user->is_approved == 1)                             
                                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                                    <a href="/org-member/events/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" data-toggle="tooltip" data-placement="top" title="View Events" ><i class="material-icons" style="margin-bottom:5px">event</i></button></a>
                            
                                    @elseif ($user->is_approved == 0)                            
                                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                                    <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>                        
                            
                                @endif
                            </td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
        <td colspan="9">
        <span style="float: left;margin-top:10px;">{{ __('staffs.showing') }} {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} {{ __('staffs.entries') }}</span>
        <span style="float: right;">{{$users->links('vendor.pagination')}}</span>
        </td>
    </tr>
       