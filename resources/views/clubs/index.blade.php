@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Events
    Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
  
    <style>
        .button-alignment {
            margin-top: 5px;
        }

        @media (max-width:340px) {
            .button-group .button {
                padding: 0 10px !important;
            }
        }

        .modal-body {
            word-break: break-all;
        }

    </style>
@stop


{{-- Page content --}}


@section('content')

    <section class="content-header">
        <h1>Events</h1>
        <ol class="breadcrumb">
            <li>
                <a href="/admin">
                    <i class="material-icons breadmaterial">home</i>
                    Dashboard
                </a>
            </li>
            <li><a href=""> Events</a></li>
            <li class="active">All Events</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                        Events

                    </h4>

                </div>
                <br />
                <div class="panel-body table-responsive">
                    <div class="row">
                        <div class="nav-tabs-custom">

                            <ul class="nav nav-tabs custom_tab" >
                                <li class="active">
                                    <a class="panel-title" href="#tab4" data-toggle="tab">
                                        <span style="color:Black;">Future Events</span></a>
                                </li>
                                <li>
                                    <a class="panel-title" href="#tab5" data-toggle="tab">
                                        <span style="color:Black;">Upcoming Events</span></a>
                                </li>
                                <li>
                                    <a class="panel-title" href="#tab6" data-toggle="tab">
                                        <span style="color:Black;">Past Events</span></a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane" id="tab6">
                                    <div class="panel-body table-responsive" style="height:1000px">

                                        <table class="table table-striped table-hover table-bordered" id="table2"
                                            style="text-transform: capitalize;">
                                            <tr>
                                                <thead class="thead-Dark" style="text-align: center;">
                                                    <div class="col-md-3">
                                                        <th style="text-align: center;">League</th>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <th style="text-align: center;">Organization</th>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <th style="text-align: center;">Events</th>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <th style="text-align: center;">Age Group</th>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <th style="text-align: center;">Gender</th>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <th style="text-align: center;">Team</th>
                                                    </div>
                                                    <div class="col-md-3">

                                                        <th style="text-align: center;">Venue</th>
                                                    </div>

                                            </tr>
                                            </thead>


                                            </tr>

                                            @foreach ($leaguePastEvents as $league)
                                                @if ($league->groupRegistrations->count() > 0)
                                                    @foreach ($league->groupRegistrations as $group)
                                                        <tr>
                                                            @if ($group->club_id == Auth::user()->club_id)
                                                                <td>{{ $league->name }}</td>
                                                            @endif
                                                            @if ($group->club_id == Auth::user()->club_id)
                                                                <td>
                                                                    {{ $league->organization->name }}
                                                                </td>
                                                            @endif
                                                            @if ($group->club_id == Auth::user()->club_id)
                                                                <td>

                                                                    {{ $group->event->mainEvent->name }}
                                                                    <br>


                                                                </td>
                                                                @endif @if ($group->club_id == Auth::user()->club_id)
                                                                    <td>
                                                                        @php
                                                                            $ageGroupEvent = App\Models\AgeGroupGender::where('id', $group->age_group_gender_id)->first()->age_group_event_id;
                                                                            $ageGroup = App\Models\AgeGroupEvent::where('id', $ageGroupEvent)->first()->age_group_id;
                                                                            $name = App\Models\AgeGroup::where('id', $ageGroup)->first()->name;
                                                                        @endphp
                                                                        {{ $name }} <br>
                                                                    </td>
                                                                    @endif @if ($group->club_id == Auth::user()->club_id)
                                                                        <td>
                                                                            @php
                                                                                $ageGroupEvent = App\Models\AgeGroupGender::where('id', $group->age_group_gender_id)->first()->gender_id;
                                                                            @endphp
                                                                            @if ($ageGroupEvent == 1)
                                                                                {{ 'Male' }}
                                                                            @else
                                                                                {{ 'Female' }}
                                                                            @endif
                                                                        </td>
                                                                        @endif @if ($group->club_id == Auth::user()->club_id)
                                                                            
                                                                                
                                                                                <td>
                                                                                    @foreach ($group->teams as $team)
                                                                                    {{ $team->name }}
                                                                                    <br>
                                                                                      @endforeach
                                                                                    </td>
                                                                              

                                                                            
                                                                        @endif
                                                                        @if ($group->club_id == Auth::user()->club_id)
                                                                            <td>{{ $league->venue->name }}</td>
                                                                        @endif


                                                        </tr>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            </tr>


                                        </table>
                                    </div>



                                </div>

                                <div class="tab-pane" id="tab5">
                                    <h2 class="hidden">&nbsp;</h2>
                                    <div class="panel-body table-responsive" style="height:1000px;">
                                        <table class="table table-striped table-hover table-bordered" id="table2"
                                            style="text-transform: capitalize;">
                                            <div class="row">
                                                <thead class="thead-Dark">
                                                    <tr>
                                                        <div class="col-md-3">
                                                            <th style="text-align: center;">League</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Organization</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Events</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                        <th style="text-align: center;">Age Group</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Gender</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Team</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Venue</th>
                                                        </div>
                                                        <div class="col-md-3">

                                                            <th style="text-align: center;">Date & Time</th>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <th style="text-align: center;">Actions</th>
                                                        </div>

                                                    </tr>
                                                </thead>
                                            </div>
                                            @foreach ($leagueEvents as $league)
                                                @if ($league->groupRegistrations->count() > 0)
                                                    @foreach ($league->groupRegistrations as $group)
                                                        @if ($group->club_id == Auth::user()->club_id)
                                                            @php
                                                                $ageGroupGender = App\Models\AgeGroupGender::find($group->age_group_gender_id);
                                                            @endphp
                                                            <tr>
                                                                <td>{{ $league->name}}</td>

                                                                <td>
                                                                    {{ $league->organization->name }}
                                                                </td>

                                                                <td>

                                                                    {{ $group->event->mainEvent->name }}
                                                                    <br>


                                                                </td>

                                                                <td>
                                                                    @php
                                                                        $ageGroupEvent = App\Models\AgeGroupGender::where('id', $group->age_group_gender_id)->first()->age_group_event_id;
                                                                        $ageGroup = App\Models\AgeGroupEvent::where('id', $ageGroupEvent)->first()->age_group_id;
                                                                        $name = App\Models\AgeGroup::where('id', $ageGroup)->first()->name;
                                                                    @endphp
                                                                    {{ $name }} <br>
                                                                </td>

                                                                <td>
                                                                    @php
                                                                        $ageGroupEvent = App\Models\AgeGroupGender::where('id', $group->age_group_gender_id)->first()->gender_id;
                                                                    @endphp
                                                                    @if ($ageGroupEvent == 1)
                                                                        {{ 'Male' }}
                                                                    @else
                                                                        {{ 'Female' }}
                                                                    @endif
                                                                </td>

                                                                <td>
                                                                    @foreach ($group->teams as $team)
                                                                        {{ $team->name }}
                                                                        <br>
                                                                    @endforeach

                                                                </td>

                                                                <td>{{ $league->venue->name }}</td>
                                                                <td>@php echo Carbon\Carbon::parse($group->event->date)->format('d.m.Y'); @endphp
                                                                    ({{ $ageGroupGender->time }})</td>


                                                                <td>
                                                                    @if ($group->status == 0)
                                                                                       @if($league->reg_end_date > Carbon\Carbon::now()->format('Y-m-d')||$league->reg_end_date == Carbon\Carbon::now()->format('Y-m-d'))

                                                                        <a
                                                                            href="/group-event/edit/{{ $group->age_group_gender_id }}">
                                                                            <button type="button" class="btn btn-primary"
                                                                                id="btn15">Edit</button></a>
                                                                                                        <button type="button" class=" btn btn-danger delete" data-id="{{ $group->id }}" data-toggle="tooltip" data-placement="top" title="Delete">Delete</button>

                                                                    @endif
                                                                    @endif
                                                                </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                        </table>

                                    </div>
                                </div>
                                <div class="tab-pane fade active in" id="tab4">

                                   

                               <div class="panel-body table-responsive">
                                   @include('clubs.futureEvents')
                               </div>   
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--main content end-->
                </div>
            </div>
        </div>
        </div>
        </div>

    </section>
    <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Delete Registered Event</h4>
                </div>
                <input type="hidden" id="deleted_id">
                <input type='hidden' name='data_id' id="del_id" />
                <input name="_method" type="hidden" value="DELETE">

                <div class="modal-body">
                    Are you sure you want to delete this Registered Event?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-danger varu" value='Yes' />
                </div>
            </div>
        </div>
    </div>
@stop






{{-- page level scripts --}}
@section('footer_scripts')

    

    <script>
   $(".register").click(function() {
            $(this).attr('disabled',true);
            var id = $('#id').val();
            var token=$('#_token').val();
            var members=$('#mem').val();
            $('#myFormId').append('<input type="hidden" name="gender" value=' + id + '>');
            $('#myFormId').append('<input type="hidden" name="_token" value=' + token + '>');
            $('#myFormId').append('<input type="hidden" name="member" value=' + members + '>');

            $("#myFormId").submit();
        });
$('#nav-tab a[href="#{{ old('tab') }}"]').tab('show')

;
        $(document).ready(function() {
            $('.edit').click(function() {
                swal({
                    title: "Uanble to edit!",
                    text: "You cant'edit the Event once you paid.",
                    type: "success",
                    timer: 2000
                });

            });
           
        });
        
         $('.delete').on('click',  function() {
            var id = $(this).data('id');
            $('#deleted_id').val(id);
             $('#myModalDelete').modal('show');

        });

        $(document).on('click', '.varu', function(e) {
            e.preventDefault();
            var id = $('#deleted_id').val();
            $.ajax({
                type: "GET",
                url: "/group-event/delete-register/" + id,
                data: {
                    'id': id
                },
                success: function(response) {
                    window.location.reload();
                }
            });

        });
    </script>      
@stop
 