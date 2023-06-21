<table class="table table-hover" id="" style="height: 300px;">
                        <thead>
                            <tr>
                                  
                                    <th style="text-align: left">League</th>
                                    <th style="text-align: left">Organization</th>
                                    <th style="text-align: left">Teams Count</th>
                            </tr>
                        </thead>


                        <tbody>
                                @foreach($TeaamsCount as $latestLeague)
                            
                                                             <tr>
                                    <td>{{ $latestLeague->name }}</td>
                                    <td>{{ $latestLeague->organization->name }}</td>                                   
                                    <td>
                                        @php
                                        $teams=array();
                                            @endphp
                                        @foreach ($latestLeague->groupRegistrations as $reg)
                                        @if($reg->club_id ==Auth::user()->club_id)
                                        @php
$teams[]=$reg->club
                                        @endphp
                                        @endif
                                       
                                     @endforeach
                                     {{ count($teams) }}
                                 </td>
                                </tr>
                                @endforeach
                             </tbody>
                    </table>
                    <span style="float: right;margin-bottom:30px;bottom:0px;">{{$TeaamsCount->links('vendor.pagination1')}}</span>
