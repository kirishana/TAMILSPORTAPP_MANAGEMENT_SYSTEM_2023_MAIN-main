<table class="table table-hover table-responsive"  style="border:grey;">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>AgeGroup</th>
                          <th>Gender</th>
                          <th>Members</th>
                          <th style="text-align:center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($teams->count()>0)

                        @foreach ($teams as $key=>$team)
                        <tr>
                          <td>
                            {{++$key}}
                          </td>
                          <td>{{$team->name}}</td>
                          <td>{{ $team->ageGroup->name }}</td>
                          <td>{{ $team->gender->name }}</td>
                          <td>
                            @foreach ($team->users as $user)

                            {{$user->first_name}}  {{$user->last_name}}<br>
                            @endforeach

                          </td>
                          <td>
                          <a href="/team/edit/{{ $team->id }}"><button class="btn btn-primary edit" style="padding: 2px 6px"data-toggle="tooltip" data-placement="bottom" title="Edit"   value="{{ $team->id }}"><i class="material-icons text-light ">edit</i></button>
                          </a>
                         <button style="padding: 2px 4px" class=" btn btn-danger delete" data-id="{{ $team->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><i class="material-icons" style="margin-bottom:5px">delete</i></button>
                          </td>
                        </tr>
                        @endforeach

                        @endif
                      </tbody>
                    </table>
                    {{ $teams->links('vendor.pagination1') }}



           <script>
             $('.delete').on('click',  function() {
            var id = $(this).attr('data-id');
            $('#deleted_id').val(id);
             $('#myModalDelete').modal('show');

        });

           </script>         
                    <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Remove Team</h4>
                </div>
                <input type="hidden" id="deleted_id">
                <input type='hidden' name='data_id' id="del_id" />
                <input name="_method" type="hidden" value="DELETE">

                <div class="modal-body">
                    Are you sure you want to remove this team permanently?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger yes" value='Yes' />
                </div>
            </div>
        </div>
    </div>