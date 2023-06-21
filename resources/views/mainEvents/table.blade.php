
                                            <?php 
                                            $count=1;
                                            ?>
                                            @foreach($mainEvents as $mainEvent)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td>{{$mainEvent->name}}</td>
                                                <td>{{$mainEvent->price}}</td>
                                                <td>{{$mainEvent->discount}}%</td>
                                                <td>{{$mainEvent->eventCategory->name}}</td>
                                                <td>
                                                <button  class="btn btn-primary change" style=" margin:0; padding: 2px 6px;text-transform:none;" value="{{$mainEvent->id}}"><i class="material-icons text-light" style="font-size:16px;margin-left:auto;top:-2.8px;margin-right:auto;">edit</i></button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="6">
                                                <span style="float: left;margin-top:10px;text-transform:lowercase;">{{ __('staffs.showing') }} {{ $mainEvents->firstItem() }} to {{ $mainEvents->lastItem() }} of {{ $mainEvents->total() }} {{ __('staffs.entries') }}</span>     
                                            
                                            <span style="float: right;">{{$mainEvents->links('vendor.pagination')}}</span>   
                                                </td>
                                            </tr>
                                            