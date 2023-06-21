              
    
<table class="table table-responsive table-striped text-uppercase table-bordered" style="overflow-x:scroll;width:100%;"  id="users" >
                    <thead class="thead-Dark">
                        <tr  style="text-align: center">
                            <th width="8%">Name</th>
                            <th>E-mail</th>
                            <th class="phone">Mobile</th>
                            <th class="age">Age</th>
                            <th class="role">Role</th>
                            <th class="country">Country</th>
                            @if($org)
                @if($org->orgsetting)
                @if($org->orgsetting->active==1)
                <th>Sil Member</th>
                @endif
                @endif
                @endif

                            <th  width="4%">Actions</th>

                           
            
                        </tr>
                    </thead>
                    <tbody style="text-transform:capitalize">
           @foreach($users as $user)
            <tr>
                <td style="width: 10%">{{$user->first_name}} {{$user->last_name}}</td>
                <td   style="text-transform:none">{{$user->email}}</td>
                <td style="width: 7%">{{$user->tel_number}}</td>
                <td><?php
                
                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                    $age = $today - $mine; ?>{{ $age }}</td>
                 <td style="width:8%;"> 
                    <select  class="role2" data-user="{{$user->id}}">

                <option disabled selected>{{$user->roles->pluck('name')[0]}}</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}" > {{ $role->name }}</option>
                
                @endforeach
                </select>
                </td> 
                <td style="width: 10%">{{$user->country ? $user->country->name : ''}}</td>
                @if($org)
                @if($org->orgsetting)
                @if($org->orgsetting->active==1)
                <td style="width:5%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                @endif
                @endif
                @endif
                @if($user->is_approved==2)
                <td style="padding-bottom:0px;margin-bottom:0px;width: 6%">
                <a href="/user/view/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                
                </td>
                @elseif($user->is_approved == 1)
                <td  style="padding-bottom:0px;margin-bottom:0px;width: 5%">
                <a href="/user/view/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{$user->id}}"  ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                </td>
                @else($user->is_approved == 0)
                <td  style="padding-bottom:0px;margin-bottom:0px;width: 5%">
                <a href="/user/view/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                </td>
                @endif
            </tr>
            @endforeach
    </tbody>
</table>
<div class="col-md-12">
    <span style="float: left;margin-top:10px;margin-bottom:20px;">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</span>     
<span style="float: right;margin-bottom:20px;">{{$users->links('vendor.pagination')}}</span>     
    </div>
   