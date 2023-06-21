@foreach($users as $user)

<tr>
    <td style="width: 15%;text-transform:none">{{ $user->first_name }}</td>
    <td style="width: 15%;text-transform:none">{{ $user->last_name }}</td>
    <td style="width: 12%;text-transform:none">{{ $user->club?$user->club->club_name:'' }}</td>

    <td style="width:15%;text-transform:none">{{ $user->email }}</td>
    <td style="width: 8%">{{ $user->tel_number }}</td>
    @if(Auth::user()->hasRole(4))
    <td style="width: 12%">
          {{$user->roles->pluck('name')[0]}}
           
    </td>
    @else
    <td style="width: 12%">
        <select class="role2" data-user="{{$user->id}}">
            <option disabled selected>{{$user->roles->pluck('name')[0]}}</option>
            @foreach ($roles as $role)
            <option value="{{ $role->id }}"> {{ $role->name }}</option>

            @endforeach
        </select>
    </td>
    @endif
    <td style="width:7%">{{ $user->created_at->format('d.m.Y') }}</td>
    @if(Auth::user()->organization)
    @if(Auth::user()->organization->orgsetting)
    @if(Auth::user()->organization->orgsetting->active==1)
    <td style="width:10%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
    @endif
    @endif
    @endif
    @if(Auth::user()->hasRole(4))
    @else
    @if($user->is_approved==2)
    <td style="width:8%">
        <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
        <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
        <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-danger decline" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>

    </td>
    @elseif($user->is_approved == 1)
    <td style="width:8%">
        <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
        <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-danger decline" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
    </td>
    @else($user->is_approved == 0)
    <td style="width:8%">
        <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
        <button style="padding: 2px 4px;border-radius: 4px;" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
    </td>
    @endif
    @endif
</tr>
@endforeach
<tr>
<td colspan="9">
<span style="float: left;margin-top:10px;">{{ __('staffs.showing') }} {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} {{ __('staffs.entries') }}</span>
<span style="float: right;">{{$users->links('vendor.pagination')}}</span>
</td>
</tr>


