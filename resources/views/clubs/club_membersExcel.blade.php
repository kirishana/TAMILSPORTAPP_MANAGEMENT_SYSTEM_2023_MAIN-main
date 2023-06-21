<table class="table table-bordered table-striped users" width="100%">
                        <tr>
                            <th style="text-align: center">First Name</th>
                            <th style="text-align: center">Last Name</th>
                            <th style="text-align: center">Gender</th>
                            <th style="text-align: center;">Age</th>
                            <th style="text-align: center;">E-mail</th>
                            <th style="text-align: center">Status</th>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
                            <th style="text-align: center">SIL Member</th>
                            @endif
                            @endif
                            @endif
                            <th style="text-align: center">Registered Date</th>
                        </tr>                    
                    <tbody>

@foreach($users as $user)
<tr>
    <td>{{$user->first_name}}</td>
    <td>{{$user->last_name}}</td>
    <td>{{$user->gender}}</td>
    <td>
        <?php 
       $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
       $today = Carbon\Carbon::now()->format('Y');
       $age=$today-$mine;

       ?>
       {{$age}}
    </td>
    <td style="text-transform: none;">{{$user->email}}</td>

    @if($user->status==0)
    <td>Approved</td>
    @else
    <td>pending</td>

@endif
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
<td style="width:%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
@endif
@endif
@endif
<td>
  <?php 
                    $u=preg_split('/ /',$user->created_at);
     ?>
     {{$u[0]}}
   </td>
</tr>

@endforeach
     

      </tbody>
                </table>