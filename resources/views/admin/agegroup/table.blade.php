
                                            <?php 
                                            $count=1;
                                            ?>
                                            @foreach($AgeGroups as $key=>$age)
                                            <tr>
                                                <td>{{$count++}}</td>
                                                <td>{{$age->name}}</td>
                                                @if($age->status==1)
                                                <td style="text-align:left;width:15px;">

                                                          {{-- <button  class="btn btn-primary enable" style=" margin:0; padding: 2px 6px;text-transform:none;" >Enable</button> --}}
                                                          <button type="button" class="btn btn-primary btn-xs enable" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" id="{{$age->id}}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;" data-toggle="tooltip" data-placement="bottom"title="Activate">thumb_up</i></button>

                                                        </td>
                                                   @else
                                                   <td style="text-align:left;width:15px;">

                                                       <button type="button" class="btn btn-danger btn-xs disable" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" id="{{$age->id}}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;" data-toggle="tooltip" data-placement="bottom"title="Deactivate">thumb_down</i></button>   
                                                       <button type="button" class="btn btn-danger btn-xs delete" style="width:22px;height:22px;margin:0px;padding:4px 0 px 4px 6px;" id="{{$age->id}}"><i class="material-icons text-light" style="font-size:14px;left:-6px;top:-2.8px;" data-toggle="tooltip" data-placement="bottom"title="Delete">highlight_off</i></button>   
 
                                                    </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3">
                                                <span style="float: left;margin-top:10px;text-transform:lowercase;"> {{ __('staffs.showing') }} {{ $AgeGroups->firstItem() }} to {{ $AgeGroups->lastItem() }} of {{ $AgeGroups->total() }}  {{ __('staffs.entries') }}</span>     
                                            
                                            <span style="float: right;">{{$AgeGroups->links('vendor.pagination')}}</span>    
                                                </td>
                                            </tr>
                                       