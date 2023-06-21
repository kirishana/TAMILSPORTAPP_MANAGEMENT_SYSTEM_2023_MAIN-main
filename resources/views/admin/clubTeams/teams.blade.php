<style>
    .modal-backdrop{
        display:none;
    }
    </style>
<div class="row" id="varu">
    @if($club1=="hi") 
   <div class="col-md-6">


           
            <form class="form_action6" action="/team/store" method="POST">
                <input type="hidden" name="club" value="{{ $club->id }}">

              <input name="_token" type="hidden" value="{{ csrf_token() }}" />
            <div class="form-group label-floating">
              <label class="control-label">Team Name</label>
              <input name="name" id="name" type="text"class="form-control name" maxlength="40" required />
            </div>
       
            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
            <div class="form-group">
              <label for="select22" class="control-label">
              AgeGroup
              </label>
              <select id="select2" name="ageGroup" data-club="{{ $club->id }}" class="form-control ageGroup" required>
                <option selected disabled>Select AgeGroup</option>
                @foreach($ageGroups as $ageGroup)
                <option value="{{$ageGroup->id}}">  {{ $ageGroup->name }} </option> 
                @endforeach
              </select>
                                                      {!! $errors->first('ageGroup', '<span class="help-block">:message</span>') !!}

            </div>
            <div class="form-group">
              <label for="select22" class="control-label">
                Gender
              </label>
              <select id="select2" name="genders" data-club="{{ $club->id }}" class="form-control genders" required>
                <option selected disabled>Select Gender</option>

                @foreach($genders as $gender)
                <option value="{{$gender->id}}" >  {{$gender->name}}</option> 
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
              <select id="select22" name="members[]" style="width:100%" class="form-control members" multiple>
                @if($users!=null)
                @foreach($users as $user)
                @if($user->is_approved==1)
                <option value="{{$user->id}}" >  {{$user->first_name}} {{ $user->last_name }} </option> 
                @endif
                @endforeach
                @endif
              </select>
            </div>
           

        
          <div class="col-md-11">
            <button style="margin-top:30px;border-radius:30px;" type="submit" class="btn btn-success btn-sm team pull-right">@if(isset($team))UPDATE @else ADD @endif</button>
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
                        <button  class="btn btn-primary change" style="padding: 2px 4px" value="{{$team->id}}"><i class="material-icons text-light" style="margin-bottom:5px">edit</i></button>

                         
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
@if($club1=="hi")
                <!--Modal: Login with Avatar Form-->
   <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

                <div class="modal-header" style="border-bottom:none">
                    <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edit Team</h2>

                </div>
                <!--Body-->
                <div class="modal-body text-center mb-1">


                    <div class="md-form ml-0 mr-0">
                        <input type="hidden" id="teamId">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="text" name="name" id="teamName" class="form-control form-control-sm validate ml-0" >

                    </div>
                    <div class="md-form ml-0 mr-0">
                    <div class="form-group">
              <label for="select22" class="control-label">
              AgeGroup
              </label>
              <select id="select2" name="ageGroup" class="form-control age-group" required>
                <option selected disabled>Select AgeGroup</option>
                @foreach($ageGroups as $ageGroup)
                <option value="{{$ageGroup->id}}">  {{ $ageGroup->name }} </option> 
                @endforeach
              </select>
                                                      {!! $errors->first('ageGroup', '<span class="help-block">:message</span>') !!}

            </div>
            <div class="form-group">
              <label for="select22" class="control-label">
                Gender
              </label>
              <select id="select2" name="genders" class="form-control gender" required>
                <option selected disabled>Select Gender</option>

                @foreach($genders as $gender)
                <option value="{{$gender->id}}">  {{$gender->name}}</option> 
                @endforeach
              </select>
                                                      {!! $errors->first('genders', '<span class="help-block">:message</span>') !!}

            </div>
           
         
           
            <div class="form-group">
              <label for="select22" class="control-label">
            
                Members
              </label>
              <select id="select24" name="members[]" class="form-control members" multiple style="width:100%">
                @if($users!=null)
                @foreach($users as $user)
                @if($user->is_approved==1)
                <option value="{{$user->id}}">  {{$user->first_name}} {{ $user->last_name }} </option> 
                @endif
                @endforeach
                @endif
              </select>
            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success updateTeam">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </div>

            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Login with Avatar Form--> 

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
                    <input type="submit" class="btn btn-danger yesCancel" value='Yes' />
                </div>
            </div>
        </div>
    </div>
                     @endif  
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>

        $('.change').on('click', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $('#myModal2').modal('show');
            $.ajax({
                type: "GET",
                url: "/team/edit/" + id,

                success: function(response) {
            
                    $('#teamId').val(response.id);
                        $('#teamName').val(response.team.name);
                        if(response.count==0){
                        $('.gender').val(response.team.gender_id);                      
                        $('.age-group').val(response.team.age_group_id);
                        $('.members').val(response.team.users.id);
                        }else{
                        $('.gender').val(response.team.gender_id);
                        $('.age-group').val(response.team.age_group_id);                        
                         $('.gender').prop('disabled',true);
                        $('.age-group').prop('disabled',true);
                        $('.members').val(response.team.users.id);
                        }
                }
            });
        });
        $('.updateTeam').on('click', function(e) {
            e.preventDefault();
            var id = $('#teamId').val();
            var name = $('#teamName').val();
            var gender = $('.gender').val();
            var ageGroup = $('.age-group').val();
            var members = $('#select24').val();


            var method = $('#_method').val();
            $.ajax({
                type: "PUT",
                url: "/team/club/update/" + id,
                data: {
                    "_token": "{{ csrf_token() }}",
                    "name": name,
                    "gender": gender,
                    "ageGroup": ageGroup,
                    "members": members
                },

                dataType: "json",
                success: function(response) {
                    $('#myModal2').modal('hide');
                    $('#varu').html(response.html); 
                }
            });
        });
        $('.add').on('click', function(e) {
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

        $('.delete').on('click',  function() {
            var id = $(this).attr('data-id');
            $('#deleted_id').val(id);
             $('#myModalDelete').modal('show');

        });

        $(document).on('click', '.yesCancel', function(e) {
            e.preventDefault();
            var id = $('#deleted_id').val();

            $.ajax({
                type: "DELETE",
                url: "/team/delete/" + id,
                dataType: "json",
                data: {
                    'id': id
                },
                success: function(response) {
                  if (response.deleted=='nodelete'){
        
                    Swal.fire(
                  'You can not delete the team',
  'Because it is already registered for events',
  'error',
                );                $('#myModalDelete').modal('hide');
                $('#varu').html(response.html); 

              }
              else{

              
                $('#varu').html(response.html); 


                    
                }
              }
            });

        });
        </script>