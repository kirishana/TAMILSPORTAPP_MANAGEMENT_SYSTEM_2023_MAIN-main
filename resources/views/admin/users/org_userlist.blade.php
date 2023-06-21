   
            @foreach($users as $user)
            @if($user->is_approved==1)

            <tr>
            <td style="width:15%;text-transform:capitalize;">{{$user->first_name}}</td>

                <td style="width:15%;text-transform:capitalize;">{{$user->last_name}}</td>
                <td style="width:15%;text-transform:none;">{{$user->email}}</td>

                <td style="width:12%" > 
                @if($user->email!=null)
                <select class="role2" data-user="{{$user->id}}">
                <option disabled selected>{{$user->roles->pluck('name')[0]}}</option>
                @if($user->club_id == '' && $user->organization_id != 'Null')
                @foreach ($rolesforOnlyOrgUsers as $role)
                <option value="{{ $role->id }}" > {{ $role->name }}</option>              
                @endforeach
                @endif
                @if($user->club_id != '' && $user->organization_id != 'Null')
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" > {{ $role->name }}</option>              
                @endforeach
                @endif
              
                </select>
                @else
                {{$user->roles->pluck('name')[0]}}
                    @endif
                </td>
            
                  <td style="width:5%"><?php 
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                    $today = Carbon\Carbon::now()->format('Y');
                    $age = $today - $mine;
?>{{ $age }}</td>                
                <td style="width:5%;text-transform:capitalized;">{{$user->gender}}</td>
                <td style="width:8%;text-transform:capitalized;">{{$user->tel_number}}</td>

              
                    
                <td style="width:13%;text-transform:capitalized;">{{$user->club ? $user->club->club_name : ''}}</td>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <td style="width:5%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                @endif
                @endif
                @endif

                
                @if($user->is_approved==2)
                <td id="" style="width:8%">
                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-danger decline" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                
                </td>
                @elseif($user->is_approved == 1)
                <td id="" style="width:8%">
                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-danger decline" value="{{$user->id}}"  ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                </td>
                @else($user->is_approved == 0)
                <td id="" style="width:8%">
                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                </td>
                @endif
            </tr>
            @endif
            @endforeach
   	    <tr>
            <td colspan="10">
            <span style="float: left;margin-top:10px;">{{ __('staffs.showing') }} {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} {{ __('staffs.entries') }}</span>
    
    <span style="float: right;">{{$users->links('vendor.pagination')}}</span>
            </td>
        </tr>
    <!-- <div class="col-md-12">
        <span style="float: left;margin-top:10px;">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</span>
    
        <span style="float: right;">{{$users->links('vendor.pagination')}}</span>
    </div> -->
