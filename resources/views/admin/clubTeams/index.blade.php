@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
@parent
@stop

{{-- page level styles --}}
@section('header_styles')

<!-- JS & CSS library of MultiSelect plugin -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.css">
<script src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/choices.min.js"></script>
@stop
{{-- Page content --}}
@section('content')

<section class="content-header">

  <!--section starts-->
  <h1>{{ __('sidebar.group_event_regs') }}</h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="material-icons breadmaterial">home</i>
        Dashboard
      </a>
    </li>
    <li>Events</li>
    <li class="active">Teams</li>

  </ol>
</section>
<!--section ends-->
<section class="content paddingleft_right15">
    
    <div class="row">
        <div class="panel panel-primary" style="min-height:700px ;">
                
                <ul class="nav nav-tabs tabs-li" style="background-color: white;color:black;">
                    <li class="active" style="color:white">
                        <a href="#clubTeam" data-toggle="tab" ><span style="color:black">{{ __('sidebar.club_teams') }}</span></a>
                    </li>
                    <li>
                        <a href="#reg" data-toggle="tab"><span style="color:black">{{ __('event.event_registation_for_club') }}</span></a>
                    </li>
                </ul>
            <br />
          
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade active in" id="clubTeam">
                             <div class="row">
                                <div class="error" style="font-size:18px;">* {{ __('event.please_select_the_club_first') }}</div>
<br>
                            <div class="col-md-3">
                                </label>
                                <select  class="club" id="club" placeholder="Select Club" name="cluId">
                                    <option selected>Select Club</option>
                                    @foreach($clubs as $club)
                                    <option value={{ $club->id }} @if($clubId){{$club->id==$clubId ?'selected':''}} @endif>{{ $club->club_name }}</option>
                                    @endforeach
                                </select>
                                
                            </div>        
                                              
                        </div>
                         
                        <div class="panel-body table-responsive">
                            @include('admin.clubTeams.teams')
                        </div>
                        </div>
                        <div class="tab-pane fade" id="reg">
                        <div class="row">
                            

        <div class="panel panel-default">
                <ul class="nav nav-tabs tabs-li" id="nav-tab"style="background-color: grey">
                    <li class="active" style="color:white">
                        <a href="#futureEvents" data-toggle="tab" ><span style="color:white">{{ __('event.upcomming_events') }} </span></a>
                    </li>
                    <li>
                        <a href="#registeredEvents" data-toggle="tab"><span style="color:white">{{ __('event.registed_events') }}</span></a>
                    </li>
                   
                </ul>
            <br/>
          
                    <div id="myTab" class="tab-content">
                        <div class="tab-pane dae active in" id="futureEvents">
                        <p class="m-r-6">                              
                             
                               
                               <div class="panel-body table-responsive">
                                   @include('admin.clubTeams.reg')
                               </div>   
                           </p>
                        </div>
                        <div class="tab-pane fade" id="registeredEvents">
                        <div class="panel-body table-responsive">
                                   @include('admin.clubTeams.registeredEvents')
                               </div> 

                        </div>
                      
                    </div>
               
                            
                      
                    </div>
                     
                </section>
<br />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script>
        $(document).ready(function() {

    var multipleCancelButton = new Choices('#club', {
            removeItemButton: true,
            maxItemCount: 10000,
            searchResultLimit: 10000,
            renderChoiceLimit: 10000
        });

     var club=$('.club').find(":selected").val();
     $(document).ready(function() {
        $('#nav-tab a[href="#{{ old('tab') }}"]').tab('show')
    });

 $.ajax({
            type: 'GET',
            url: '/clubteams/' + club,
          
            success: function(response) {
                $('#varu').html(response.html)  
                $('#table2').html(response.html2)  
                $('#futureEvents'). html(response.html3)


                    }
        });
     
    
    $(".club").on('change', function() {
        var club = $(this).val();
        $.ajax({
            type: 'GET',
            url: '/clubteams/' + club,
          
            success: function(response) {
                $('#varu').html(response.html)  
                $('#table2').html(response.html2)  
                $('#futureEvents'). html(response.html3)


                
                    }
        });

    });

       

    // //gender
    // $(".genders").on('change', function() {
    //     var gender = $(this).val();
    //     $.ajax({
    //         type: 'POST',
    //         url: '/gender/' + gender,
    //         data: {
    //             "_token": "{{ csrf_token() }}",
    //             "gender": gender
    //         },
    //         success: function(response) {
    //           $('#select22').empty();
    //                     $.each(response.users, function(key, item) {
    //                         if(item.is_approved==1){
    //                         $('#select22').append(
    //                             "<option value='" + item.id + "'>" + item.first_name +" "+" "+" "+item.last_name+ "</option>");
    //                         }
    //                     });
                        
    //                 }
    //     });

    // });

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
                    window.location.reload();
                }
            });

        });
        //em=nd

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



