@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<style>
    .example::-webkit-scrollbar {
            display: none;
        }

        .example {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
</style>
@stop
{{-- Page content --}}
@section('content')

<section class="content-header">

  <!--section starts-->
  <h1>Clubs</h1>
  <ol class="breadcrumb">
    <li>
      <a href="/admin/">
        <i class="material-icons breadmaterial">home</i>
        Dashboard
      </a>
    </li>
    <li class="active">Teams</li>

  </ol>
</section>
<!--section ends-->


<section class="content paddingleft_right15">
  <div class="row">
  <div class="col-md-6">
    <div class="panel panel-primary ">
      <div class="panel-heading">
        <h4 class="panel-title">
          <i class="material-icons  6:34 PM 9/24/2021">brightness_4</i>
          Club Teams
        </h4>
      </div>
      <div class="panel-body">
          <div class="col-md-11">
            @if(isset($team))

            <form class="form_action6" action="/team/{{ $team->id }}/update" method="POST">
              {{-- <input type="hidden" name="_method" value="PUT"> --}}
              <input name="_token" type="hidden" value="{{ csrf_token() }}" />

              @else
            <form class="form_action6" action="/team/store" method="POST">
              <input name="_token" type="hidden" value="{{ csrf_token() }}" />
              @endif
            <div class="form-group label-floating">
              <label class="control-label">Team Name</label>
              <input name="name" id="name" type="text" value="@if($team!=null){{ $team->name }}  @endif  {!! old('name') !!}"class="form-control name" maxlength="40" required />
            </div>
          </div>
       
          <div class="col-md-11">
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
                <option value="{{$user->id}}" @if(isset($team))@if($team->users->count()>0){{(in_array($user->id, $selected)) ? 'selected' : '' }} @endif @endif>  {{$user->first_name}} {{ $user->last_name }} </option> 
                @endif
                @endforeach
                @endif
              </select>
            </div>
           

        
          </div>
          <div class="col-md-11">
            <button style="margin-top:30px;border-radius:30px;" type="submit" class="btn btn-success btn-sm team pull-right">@if(isset($team))UPDATE @else ADD @endif</button>
          </div>
        </div>
      </form>
      </div>
</div>
        <div class="col-md-6">
          
            <div>
              <div class="portlet box primary">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="material-icons">brightness_4</i>Teams
                  </div>
                </div>
                <div class="portlet-body">
                  <div  id="teams" style="overflow-x:scroll;"  class="example">
                  @include('teams.teamsTable')
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>
  </div>
  </div>

  </div>
  <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
      <!--Content-->
      <div class="modal-content">


        <!--Body-->
        <div class="modal-body text-center mb-1">


          <div class="md-form ml-0 mr-0">
            <input type="hidden" id="deleted_id">
            Are You Sure!
          </div>
          <div class="modal-body">
            <p>You Want to Archive this Season?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success deleteRole">Yes</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>

      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Login with Avatar Form-->
  </div>


  <!--Modal: Login with Avatar Form-->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
      <!--Content-->
      <div class="modal-content">

        <div class="modal-header" style="border-bottom:none">
          <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Edit Season</h2>

        </div>
        <!--Body-->
        <div class="modal-body text-center mb-1">


          <div class="md-form ml-0 mr-0">
            <input type="hidden" id="id">
            <input name="_method" type="hidden" value="PUT">
            <input type="text" name="name" id="name" class="form-control form-control-sm validate ml-0">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-success update">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>

      </div>
      <!--/.Content-->
    </div>
  </div>
  <!--Modal: Login with Avatar Form-->
  </div>

</section>
<br />

<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

<script>
    $(".ageGroup").on('change', function() {
        var age = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/ageGroup/' + age,
            data: {
                "_token": "{{ csrf_token() }}",
                "age": age
            },
            success: function(response) {
                        $('#select22').empty();
                        $.each(response.users, function(key, item) {
                            if(item.is_approved==1){
                            $('#select22').append(
                                "<option value='" + item.id + "'>" + item.first_name +item.last_name+ "</option>");
                            }
                        });  
                    }
        });
    });
    //gender
    $(".genders").on('change', function() {
        var gender = $(this).val();
        $.ajax({
            type: 'POST',
            url: '/gender/'+gender,
            data: {
                "_token": "{{ csrf_token() }}",
                "gender": gender
            },
            success: function(response) {
              $('#select22').empty();
                        $.each(response.users, function(key, item) {
                            if(item.is_approved==1){
                            $('#select22').append(
                                "<option value='" + item.id + "'>" + item.first_name +" "+" "+" "+item.last_name+ "</option>");
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

        $(document).on('click', '.yes', function(e) {
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
                );
                $('#myModalDelete').modal('hide')
              }
              else{
                // $("#teams").load(location.href + " #teams");
                // $('#myModalDelete').modal('hide')

                    window.location.reload();
                }
              }
            });

        });
        //em=nd

     



  // $(document).on('click', '.edit', function(e) {
  //   e.preventDefault();
  //   var id = $(this).val();
  //   $.ajax({
  //     type: "GET",
  //     url: "/team/edit/" + id,
  //     data: {
  //       // "_token": "{{ csrf_token() }}",

  //       "id": id,
  //     },

  //     dataType: "json",
  //     success: function(response) {


  //     }
  //   });
  // });
  // $(document).on('click', '.team', function(e) {
  //   e.preventDefault();
  //   var name = $('.name').val();
  //   var members = new Array(); //storing the selected values inside an array

  //   $('.members :selected').each(function(i, selected) {
  //     members[i] = $(selected).val();
  //   });
  //   $.ajax({
  //     type: "POST",
  //     url: "/team/store",
  //     data: {
  //       "_token": "{{ csrf_token() }}",
  //       "members": members,
  //       "name": name,
  //     },

  //     dataType: "json",
  //     success: function(response) {
  //       $('.members').val('');
  //       $('.name').val('');
  //       window.location.href = response.url;

  //     }
  //   });
  // });

  $(document).on('click', '.pagination a', function (e) {
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1];
            fetch_data(page);
            function fetch_data(page) {
            // console.log(page);
            $.ajax({
                url: '/teams/pagination?page='+page,
              success:function(response)
              {
                $('#teams').html(response['html']);
              } 
            })
        }
        });
</script>
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
                    <input type="submit" class="btn btn-danger yes" value='Yes' />
                </div>
            </div>
        </div>
    </div>

@endsection