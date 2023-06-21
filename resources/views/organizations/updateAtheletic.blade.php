<div class="atheletic">
@if(isset($leagues->athelaticsetting))
                                <form class="form_action6" action="/athletic-setting/{{ $leagues->athelaticsetting->id }}/update" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                    @else

                                    <form class="form_action6" action="/athletic-setting/store" method="POST">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" />

                                        @endif
                                       
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                <input type="hidden" name="league_id" value="{{ $leagues->id }}">
                                                    <label class="control-label" for="inputEmail3">Total Events can play <span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="total" class="form-control" id="inputEmail3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->total_events:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="firstName3">Max Played Track Events <span style="color:red;"> <b> * </b></span>
                                                    </label>
                                                    <input type="number" class="form-control" name="trackCount" id="firstName3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->track_events:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">Max Played Field Events <span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="fieldCount" class="form-control" id="inputEmail3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->field_events:'' }}">
                                                </div>
                                            </div>


                                        </div>


                                        @if($leagues->athelaticsetting)

                                        {{-- <div class="row">
                                           

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="inputEmail3"> Track Events & Group Events Heats Method <span style="color:red;"> <b> * </b></span></label><br> <br>
                                                    <input type="radio" name="rank" value="1" {{$athletic->heat_method==1?'checked':''}}> &nbsp;By Time &nbsp; &nbsp; &nbsp;
                                                    <input type="radio" name="rank" value="0" {{$athletic->heat_method==0?'checked':''}}> &nbsp;By Rank

                                                </div>
                                            </div>
                                        </div> --}}
                                        @endif

                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group" id="members">
                                                    <label class="control-label" for="inputEmail3">Individual Event Points <span style="color:red;"> <b> * </b></span></label>
                                                    
                                                </div>
                                            </div>
</div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">First Place<span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="first_place" class="form-control" id="inputEmail3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->first_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <input type="hidden" name="org_id" value="{{ Auth::user()->organization_id }}">
                                                    <label class="control-label" for="firstName3">Second Place<span style="color:red;"> <b> * </b></span>
                                                    </label>
                                                    <input type="number" class="form-control" name="second_place" id="firstName3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->second_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">Third Place <span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="third_place" class="form-control" id="inputEmail3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->third_place:'' }}">
                                                </div>
                                            </div>


                                        </div>
                               
                                        <div class="row">
                                        <div class="col-md-4">
                                                <div class="form-group" id="members">
                                                    <label class="control-label" for="inputEmail3">Group Event Points <span style="color:red;"> <b> * </b></span></label>
                                                    
                                                </div>
                                            </div>
</div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">First Place<span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="group_first_place" class="form-control" id="inputEmail3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->group_first_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <input type="hidden" name="org_id" value="{{ Auth::user()->organization_id }}">
                                                    <label class="control-label" for="firstName3">Second Place<span style="color:red;"> <b> * </b></span>
                                                    </label>
                                                    <input type="number" class="form-control" name="group_second_place" id="firstName3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->group_second_place:'' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group label-floating">
                                                    <label class="control-label" for="inputEmail3">Third Place <span style="color:red;"> <b> * </b></span></label>
                                                    <input type="number" name="group_third_place" class="form-control" id="inputEmail3" value="{{ $leagues->athelaticsetting?$leagues->athelaticsetting->group_third_place:'' }}">
                                                </div>
                                            </div>


                                        </div>

                                        <div class="form-group form-actions">
                                            <div class="row">
                                                <div class="col-md-10"></div>
                                                <div class="col-md-2"><input style="float:right" type="submit" class="btn btn-raised btn-primary" value="Submit"></div>
                                            </div>
                                        </div>

                            </div>
                            </form>
                        </div>