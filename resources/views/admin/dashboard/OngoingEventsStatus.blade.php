<table class="table table-hover" id="count" style="height:300px">
                        <thead>
                            <tr>
                                <th style="text-align: left">Event</th>
                                <th style="text-align: left">Age Group</th>
                                <th style="text-align: left">Gender</th>
                                <th style="text-align: left">Status</th>
                                <th style="text-align: left">Certificate Given</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($ongngLeagues1 != null)
                                @foreach ($genders as $gender)
                                    @if ($gender->ageGroupEvent->Event->organization_id == Auth::user()->organization_id ? Auth::user()->organization_id : $id)
                                        @if ($gender->ageGroupEvent->Event->league_id == $ongngLeagues1->id)
                                            <tr>
                                                <td>
                                                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                                                </td>
                                                <td>
                                                    {{ $gender->ageGroupEvent->ageGroup->name }}
                                                </td>
                                                <td>
                                                    {{ $gender->gender->name }}
                                                </td>

                                                @if ($gender->status == 2)
                                                    <td>
                                                        <span class="label label-primary">Not Started</span>

                                                    </td>
                                                @elseif($gender->status == 0)
                                                    <td> <span class="label label-warning">On Going </span>
                                                    </td>
                                                @elseif($gender->status == 3)
                                                    <td> <span class="label label-warning">Finalizing </span>
                                                    </td>
                                                @elseif($gender->status == 4)
                                                    <td> <span class="label label-warning">Processing</span>
                                                    </td>
                                                @elseif($gender->status == 10)
                                                    <td> <span class="label label-danger">Cancelled</span>
                                                    </td>
                                                @else
                                                    <td> <span class="label label-success">Finished</span>
                                                    </td>
                                                @endif
                                                @if ($gender->status == 10)
                                                @else
                                                    @if ($gender->prize_given == 1)
                                                        <td>
                                                            <span class="label label-success">Yes</span>

                                                        </td>
                                                    @else
                                                        <td> <span class="label label-warning">No</span>
                                                        </td>
                                                    @endif
                                                @endif

                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>