
<div class="row" id="teamEdit">
    @if($club1=="hi") 
   <div class="col-md-6">


            <form class="form_action6" action="/team/{{ $team->id }}/update" method="POST">

              <input name="_token" type="hidden" value="{{ csrf_token() }}" />

           
                
            <div class="form-group label-floating">
              <label class="control-label">Team Name</label>
              <input name="name" id="name" type="text" value="@if($team!=null){{ $team->name }}  @endif  {!! old('name') !!}"class="form-control name" maxlength="40" required />
            </div>
       
            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
            <div class="form-group">
              <label for="select22" class="control-label">
              AgeGroup
              </label>
              <select id="select2" name="ageGroup" class="form-control ageGroup" required>
                <option selected disabled>Select AgeGroup</option>
                @foreach($ageGroups as $ageGroup)
                <option value="{{$ageGroup->id}}" @if(isset($team)){{ $team->age_group_id==$ageGroup->id ? 'selected' : '' }} @endif>  {{ $ageGroup->name }} </option> 
                @endforeach
              </select>
                                                      {!! $errors->first('ageGroup', '<span class="help-block">:message</span>') !!}

            </div>
            <div class="form-group">
              <label for="select22" class="control-label">
                Gender
              </label>
              <select id="select2" name="genders" class="form-control genders" required>
                <option selected disabled>Select Gender</option>

                @foreach($genders as $gender)
                <option value="{{$gender->id}}"  @if(isset($team)){{ $team->gender_id==$gender->id ? 'selected' : '' }} @endif>  {{$gender->name}}</option> 
                @endforeach
              </select>
                                                      {!! $errors->first('genders', '<span class="help-block">:message</span>') !!}

            </div>
           
            @if(isset($team))
            @if($team->users->count()>0)
            <?php 
            $selectred=array();
                      foreach($team->users as $user){
                        $selected[]=$user->id;
                      }
            ?>
            @endif
            @endif
            <div class="form-group">
              <label for="select22" class="control-label">
            
                Members
              </label>
              <select id="select22" name="members[]" class="form-control members" multiple>
                @if(isset($team))
                @foreach($users as $user)
                @if($user->is_approved==1)
                <option value="{{$user->id}}" @if(isset($team))@if($team->users->count()>0){{ (in_array($user->id, $selected)) ? 'selected' : '' }} @endif @endif>  {{$user->first_name}} {{ $user->last_name }} </option> 
                @endif
                @endforeach
                @endif
              </select>
            </div>
           

        
          <div class="col-md-11">
            <button style="margin-top:30px;border-radius:30px;" type="submit" class="btn btn-success btn-sm team pull-right">UPDATE</button>
          </div>
      </form>
   </div>

 
@endif
    @if($club1=="hi")      
<div class="col-md-6">
    
    <table class="table table-hover" style="border:grey;">
        <thead class="thead-Dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>AgeGroup</th>
                <th>Gender</th>
                <th>Members</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($teams->count() > 0)

                @foreach ($teams as $key => $team)
                    <tr>
                        <td>
                            {{ ++$key }}
                        </td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->ageGroup->name }}</td>
                        <td>{{ $team->gender->name }}</td>
                        <td>
                            @foreach ($team->users as $user)
                                {{ $user->first_name }} {{ $user->last_name }}<br>
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
</div>  

    @endif

</div>

<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script>
        $(document).on('click', '.add', function(e) {
        var ageGroup=$('.ageGroup').find(":selected").val();
        var gender=$('.genders').find(":selected").val();
        if(ageGroup=="none" && gender=="none"){
            $('.gr').show();
            $('.gender').show();
        }
        if(ageGroup=="none"){
            $('.gr').show();
        }
        else if(gender=="none"){
$('.gender').show();
        }
        else{
$('#submit').submit();
            $('.gr').hide();
            $('.gender').hide();

        }
    
    });
         $(".ageGroup").on('change', function() {
            var age = $(this).val();
            var club=$(this).data('club');

            $.ajax({
                type: 'POST',
                url: '/ageGroup/' + age,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "age": age,
                    "club":club
                },
                success: function(response) {
                    $('#select22').empty();


                    $.each(response.users, function(key, item) {
                        if (item.is_approved == 1) {
                            $('#select22').append(
                                "<option value='" + item.id + "'>" + item.first_name + item
                                .last_name + "</option>");
                        }
                    });


                }
            });

        });
        //gender
        $(".genders").on('change', function() {
            var gender = $(this).val();
            var club=$(this).data('club');
            $.ajax({
                type: 'POST',
                url: '/gender/' + gender,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "gender": gender,
                    "club":club
                },
                success: function(response) {
                    $('#select22').empty();
                    $.each(response.users, function(key, item) {
                        if (item.is_approved == 1) {
                            $('#select22').append(
                                "<option value='" + item.id + "'>" + item.first_name + " " +
                                " " + " " + item.last_name + "</option>");
                        }
                    });

                }
            });

        });
        </script>