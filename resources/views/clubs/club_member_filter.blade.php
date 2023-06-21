
                    

@foreach($users as $user)
<tr>
    <td>{{$user->first_name}}</td>
    <td>{{$user->last_name}}</td>
    <td>
        <?php 
        $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
       $today = Carbon\Carbon::now()->format('Y');
       $age=$today-$mine;
       ?>
{{$age}}
    </td>
        <td>{{$user->gender}}</td>

    <td style="text-transform: none;">{{$user->email}}</td>
    @if($user->is_approved== 1)
    <td>Approved</td>
    @else
    <td>pending</td>

@endif

 <td>{{ $user->created_at->format('m/d/Y') }}</td>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
 <td style="width:9%%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
    @endif
    @endif
    @endif
   
   @if($user->is_approved==2)
                <td id="">

                
                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                                                                    <a href="/members/edit/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="Edit Member"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                                <a href="/member/events/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Events"><i class="material-icons text-light leftsize">event</i>

                <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Decline"><i class="material-icons" style="margin-bottom:5px">highlight_off</i></button>
                
                </td>
                @elseif($user->is_approved == 1)
                <td id="">
                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                    <a href="/members/edit/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="Edit Member"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                                <a href="/member/events/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Events"><i class="material-icons text-light leftsize">event</i>
</button></a>

                    <button style="padding: 2px 4px" class=" btn btn-danger decline" value="{{$user->id}}"  ata-toggle="tooltip" data-placement="top" title="Remove"><i class="material-icons" style="margin-bottom:5px">delete</i></button>

                </td>
                @elseif($user->is_approved == 0)
                <td id="">
                    <a href="/users/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-primary" ata-toggle="tooltip" data-placement="top" title="View User"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                                                                    <a href="/members/edit/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="Edit Member"><i class="material-icons" style="margin-bottom:5px">edit</i></button></a>

                           <a href="/member/events/{{Crypt::encrypt($user->id)}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Events">                <i class="material-icons text-light leftsize">event</i>
</button></a>

                <button style="padding: 2px 4px" class=" btn btn-success approve" value="{{$user->id}}" ata-toggle="tooltip" data-placement="top" title="Approve"><i class="material-icons" style="margin-bottom:5px">check_circle</i></button>
                </td>
                @endif
</tr>
@endforeach
<tr>
        <td colspan="9">
        <span style="float: left;margin-top:10px;">Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries</span>
        <span style="float: right;">{{$users->links('vendor.pagination1')}}</span>
        </td>
    </tr>

   

                <script>//decline

  $('.decline').on('click', function() {
        var id = $(this).val();
            $('#deleted_id').val(id);
             $('#myModalDelete').modal('show');

        });

        $(document).on('click', '.yes', function(e) {
            e.preventDefault();
            var id = $('#deleted_id').val();
            var method = $('#_method').val();

           $.ajax({
            type : 'DELETE',
            url: "/user/delete/"+id,
            method:"DELETE", 
            data:  {        "_token": "{{ csrf_token() }}",
                    'id':id},
            success:function (res) {
                Swal.fire({
                    title: 'Deleted',
                    text: 'Deleted Successfully!',
                    });
                    window.location=res.url;   
            },
            error: function (response, status, error) {
                if (response.status === 422) {
                   
                };
            },
        });

        });
</script>

