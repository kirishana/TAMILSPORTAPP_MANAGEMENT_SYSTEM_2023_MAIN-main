
                        <div id="table2">
                         @if($club1=="hi")
                         <center><h3><span style="color:red;">{{App\Models\Club::find(Session::get('clubId'))->club_name}}'s Events </span></h3></center>
                         @endif
                         <table class="table table-striped table-bordered" 
                                            style="text-transform: capitalize;">
                                            <div class="row">
                                                <thead class="thead-Dark">
                                                    <tr>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">League</th>
                                                        </div>
                                                       
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Events</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Age Group</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Gender</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Team</th>
                                                        </div>
                                                       
                                                        <div class="col-md-3">
                                                            <th style="text-align: center;">Actions</th>
                                                        </div>

                                                    </tr>
                                                </thead>
                                            </div>
                                            @foreach ($leagueEvents as $league)
                                            @if($league->organization_id==Auth::user()->organization_id)
                                                @if ($league->groupRegistrations->count() > 0)
                                                    @foreach ($league->groupRegistrations as $group)
                                                        @if ($group->club_id == Session::get('clubId'))
                                                            @php
                                                                $ageGroupGender = App\Models\AgeGroupGender::find($group->age_group_gender_id);
                                                            @endphp
                                                            <tr>
                                                                 <td>

                                                                    {{ $group->event->league->name }}
                                                                    <br>


                                                                <td>

                                                                    {{ $group->event->mainEvent->name }}
                                                                    <br>


                                                                </td>

                                                                <td>
                                                                    @php
                                                                        $ageGroupEvent = App\Models\AgeGroupGender::where('id', $group->age_group_gender_id)->first()->age_group_event_id;
                                                                        $ageGroup = App\Models\AgeGroupEvent::where('id', $ageGroupEvent)->first()->age_group_id;
                                                                        $name = App\Models\AgeGroup::where('id', $ageGroup)->first()->name;
                                                                    @endphp
                                                                    {{ $name }} <br>
                                                                </td>

                                                                <td>
                                                                    @php
                                                                        $ageGroupEvent = App\Models\AgeGroupGender::where('id', $group->age_group_gender_id)->first()->gender_id;
                                                                    @endphp
                                                                    @if ($ageGroupEvent == 1)
                                                                        {{ 'Male' }}
                                                                    @else
                                                                        {{ 'Female' }}
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @foreach ($group->teams as $team)
                                                                        {{ $team->name }}
                                                                        <br>
                                                                    @endforeach

                                                                </td>


                                                                <td>
                                                                    @if ($group->status == 0)

                                                                        <a
                                                                            href="/group-event/edit/{{ $group->age_group_gender_id }}">
                                                                            <button type="button" class="btn btn-primary"
                                                                                id="btn15">Edit</button></a>
                                                                            <button type="button" class=" btn btn-danger deleteGroupEvent" data-id="{{ $group->id }}" data-toggle="tooltip" data-placement="top" title="Delete">Delete</button>

                                                                    @endif
                                                                </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                                @endif
                                            @endforeach

                                        </table>
                        </div>
                                        <div class="modal fade" id="myModalDeleteTwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Delete Registered Event</h4>
                </div>
                <input type="hidden" id="groupId">
                <input type='hidden' name='data_id' id="del_id" />
                <input name="_method" type="hidden" value="DELETE">

                <div class="modal-body">
                    Are you sure you want to delete this Registered Event?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger yesDelete" value='Yes' />
                </div>
            </div>
        </div>
    </div>
    <script>
         $('.deleteGroupEvent').on('click',  function() {
            var id = $(this).data('id');
            $('#groupId').val(id);
             $('#myModalDeleteTwo').modal('show');

        });

        $(document).on('click', '.yesDelete', function(e) {
            e.preventDefault();
            var id = $('#groupId').val();
            $.ajax({
                type: "GET",
                url: "/group-event/delete-register/" + id,
                data: {
                    'id': id
                },
                success: function(response) {
                    $('#table2').html(response.html)  

                }
            });

        });
    </script>