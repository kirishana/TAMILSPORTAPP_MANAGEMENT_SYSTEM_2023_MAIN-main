
           @foreach ($genders as $key=>$gender)
            @if ($gender->ageGroupEvent->Event->organization_id == Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id == $id)
                        @if ($gender->ageGroupEvent->Event->user_id == Auth::user()->id)

                        @if($gender->ageGroupEvent->Event->league->to_date >= Carbon\Carbon::now()->format('Y-m-d'))                
                <tr class="users2">
                    <td>
                        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                    </td>
                    <td>
                        {{ $gender->ageGroupEvent->Event->league->name }}
                    </td>
                    <td>
                        {{ $gender->gender->name }}
                    </td>

                    <td>
                        {{ $gender->ageGroupEvent->ageGroup->name }}
                    </td>

                    <td>
                        {{ $gender->ageGroupEvent->Event->date }}
                    </td>
                    @if ($gender->status == 2)
                        <td>
                            <h5><span class="label label-primary">Not Started</span></h5>

                        </td>
                    @elseif($gender->status == 0)
                        <td> <span class="label label-warning">On Going </span>
                        </td>
                    @elseif($gender->status == 3||$gender->status == 4)
                        <td> <span class="label label-warning">Finalizing </span>
                        </td>
                    @elseif($gender->status == 10)
                        <td> <span class="label label-danger">Cancelled </span>
                        </td>
                    @else
                        <td> <span class="label label-success">Finished</span>
                        </td>
                    @endif
                    @if (Auth::guard('web')->user()->can('Assign-event'))
                        <td>
                            <select name="judge" class="judge" id="judge" data-id="{{ $gender->id }}"
                                style="width: 120px;height:35px;">
                                <option disabled selected>select Judge</option>
                                @foreach ($judges as $judge)
                                    <option value="{{ $judge->id }}"
                                        {{ $gender->judge_id == $judge->id ? 'selected' : '' }}>{{ $judge->first_name }} {{ $judge->last_name }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
@if( $gender->ageGroupEvent->Event->mainEvent->event_category_id==2)
<td></td>
@else
                        <td>
                            <select name="starter" class="starter" id="starter" data-id="{{ $gender->id }}"
                                style="width: 120px;height:35px;">
                                <option disabled selected>select Starter</option>
                                @foreach ($starters as $judge)
                                    <option value="{{ $judge->id }}"
                                        {{ $gender->starter_id == $judge->id ? 'selected' : '' }}>
                                        {{ $judge->first_name }} {{ $judge->last_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        @endif
                        <td>
                            <input type="time" class="time" id="time" name="time"
                                data-id="{{ $gender->id }}" value="{{ $gender->time ? $gender->time : '' }}"
                                style="width:100px; padding-bottom:0"><br>
                        </td>
                    @endif
                   
                    <td>
                        <center>
                            <a href="#" class="btn btn-primary btn-xs show"
                                 title="View Rules"
                                data-toggle="modal" data-id="{{ $gender->ageGroupEvent->Event->id }}"data-target="#rules"><img style="margin-top:0px" src="{{ asset('assets/images/icons/rules.png') }}"></a>
                        </center>
                    </td>
                    <?php
                            $genderUsers=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks','!=',null)->count();
 $prize=DB::table('age_group_gender_user')->where('age_group_gender_id',$gender->id)->where('marks','!=',null)->where('prize_given',1)->count();
    if($genderUsers&& $prize !=0){           
 if($genderUsers==$prize){
     $gender=App\Models\AgeGroupGender::find($gender->id);
                       $gender->prize_given=1;
                       $gender->save();
                   }
                }
                   ?>
                                       

                    <td>
                        @if($gender->status == 10)
                                       @else
                        <div class="col-md-6">
                            <input type="checkbox" {{ $gender->prize_given == 1 ? 'checked' : '' }}
                                data-id="{{ $gender->id }}" id="prizeGiven" class="prize" onclick="return false;"
                                value="{{ $gender->prize_given == 1 ? 0 : 1 }}">
                        </div>
                        @endif
                    </td>

                  
                    <td>
                        @if($gender->status == 10 || $gender->status==1)
                        @else
                        <center>
                            <a href="/participants/{{ $gender->id }}/export" target="_blank"
                                title="Export Participants"> <img src="{{ asset('assets/images/pdf.png') }}"
                                    style="width:25px;height:25px;" class="img-responsive" />
                            </a>
                        </center>
                        @endif

                    </td>
                   

                </tr>
                @endif
               @endif
            @endif
        @endforeach
  

    <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="rules" role="dialog"
        aria-labelledby="modalLabelfade" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="modalLabelfade">Rules</h4>
                </div>
                <div class="modal-body">
                    <p id="suvarna" name="rules"><br></p>

                </div>
                <div class="modal-footer">
                    <button class="btn  btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
  
<script>
            $(document).on('click', '.show', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "/event/genders/rules/" + id,
            data: {
                "id": id,
            },

            success: function(response) {
                $('#suvarna').html(response.event.rules);


            }
        });
    });
$(document).on('change', '.judge', function(e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var judge = $(this).val();
    $.ajax({
        type: "POST",
        url: "/event/assign/" + id,
        data: {
            "judge": judge,
            "id": id,
        },
        success: function(response) {}
    });
});
$(document).on('change', '.starter', function(e) { 
    e.preventDefault();
    var id = $(this).attr('data-id');
    var starter = $(this).val();
    // alert(starter);
    $.ajax({
        type: "POST",
        url: "/event/assign/starter/" + id,
        data: {
            "starter": starter,
            "id": id,
        },
        success: function(response) {}
    });
});
$(document).on('change', '.time', function(e) {
    e.preventDefault();
    var id = $(this).attr('data-id');
    var time = $(this).val();
    $.ajax({
        type: "POST",
        url: "/event/assign/time/" + id,
        data: {
            "time": time,
            "id": id,
        },
        success: function(response) {}
    });
});
</script>
