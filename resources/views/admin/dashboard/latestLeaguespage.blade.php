<table class="table table-hover" id="" style="height:300px;">
                        <thead>
                            <tr>
                                        <th style="text-align: left;padding-bottom:27px">League</th>
                                        <th style="text-align: left;padding-bottom:27px">Organization</th>
                                        <th style="text-align: left;padding-bottom:27px">Player Count</th>
                            </tr>
                        </thead>


                        <tbody>
                                    @foreach($latestLeagues as $latestLeague)
                                    <tr>
                                        <td>{{ $latestLeague->name }}</td>
                                        <td>{{ $latestLeague->organization->name }}</td>                                   
                                        <td>
                                            @php
                                            $users=array();
                                                @endphp
                                            @foreach ($latestLeague->registrations as $reg)
                                            @if($reg->user->club_id ==Auth::user()->club_id)
                                            @php
                                                $users[]=$reg->user
                                            @endphp
                                            @endif
                                         @endforeach
                                         {{ count($users) }}
                                     </td>
                                    </tr>
                                    @endforeach
                                 </tbody>
                    </table>
                   
                    <span style="float: right;margin-bottom:20px;">{{$latestLeagues->links('vendor.pagination')}}</span>
