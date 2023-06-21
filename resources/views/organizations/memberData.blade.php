<table class="table table-striped table-bordered table-capitalized members" style="width: 100%;
border-collapse: collapse;" id="table1">               
 <thead class="thead-Dark">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th class="phone">Phone</th>
            <th class="age">Age</th>
            <th class="regDate">Reg Date</th>
            <th>Club</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td style="text-transform: none;">{{ $user->email }}</td>
            <td>{{ $user->tel_number }}</td>
            <td><?php 
                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                    $age = $today - $mine;
                ?>{{ $age }}</td>
            <td style="width:10%">{{ $user->created_at->format('d/m/Y') }}</td>
            <td style="width:23%">{{ $user->club?$user->club->club_name:'' }}</td>
            <td style="width:7%">
            @if ($user->is_approved == 2) 
              
        
        
              <a href="/users/{{ $user->id }}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px;color:white">visibility</i></button></a>
                                
              <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
              <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
            
                       @elseif ($user->is_approved == 1) 
            
                    <a href="/users/{{ $user->id }}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px;color:white">visibility</i></button></a>
                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>

            
            
                    @elseif ($user->is_approved == 0) 
            
                    <a href="/users/{{ $user->id }}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px;color:white;font-size:14px">visibility</i></button></a>
                    <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{ $user->id }}" data-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>                        
            
                @endif
            </td>
        </tr>
        @endforeach
</table>