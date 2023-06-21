<div class="table-responsive col-md-12 ">
    <table class="table table-bordered" width="100%">         
                <div class="table-responsive">
                    <table class="table table-bordered text-uppercase showall" id="table" width="100%">
                        <thead>
                            <tr class="filters" style="text-align: center">
                                <!-- <th>ID</th> -->
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>E-mail</th>
                                <th>Mobile</th>
                                <th>Age</th>
                                <th>Role</th>
                                <th>Country</th>
                                <th>Organization</th>
                                <th>Club</th>
                                <th>Actions</th>
                            </tr>
                        </thead>


                        <tbody>
                        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td style="text-transform: none;">{{$user->email}}</td>
                <td>{{$user->tel_number}}</td>
                <td>{{$user->dob}}</td>
               
                <td>{{$user->roles->pluck('name')[0]}}</td>
                <td>{{$user->country ? $user->country->name : ''}}</td>
                <td>{{$user->organization ? $user->organization->name : ''}}</td>
                <td>{{$user->club ? $user->club->club_name : ''}}</td>
                <!-- <td>{{$user->gender==1?'Male':'Female'}}</td> -->
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
                        </tbody>
                    </table>
                </div>
</div>
 