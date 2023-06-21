@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
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

<link rel="stylesheet" href="{{ asset('assets/vendors/Buttons/css/buttons.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/pages/advbuttons.css') }}" />
<style>
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
                    @php
                    $ageGroup=App\Models\AgeGroupEvent::where('id',$event->age_group_event_id)->first();
                    $ev=App\Models\Event::where('id',$ageGroup->event_id)->first();
                    @endphp
                    Edit {{$ev->mainEvent->name}}

                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
                <div class="row">
                    <div class="nav-tabs-custom">


                        <div class="tab-content">


                            <div class="tab-pane fade active in" id="tab4">

                                <div class="panel-body">
                                    <div class="panel-group" id="accordion">


                                        <form id="myFormId" action="/group-event/register" method="POST">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <div class="panel panel-default wow fadInLeft">

                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">

                                                            <table class="text-uppercase">
                                                                <tr>
                                                                    <th>Event Name</th>
                                                                    <th>Gender</th>
                                                                    <th>Age Group</th>
                                                                    <th>Team</th>
                                                                </tr>
                                                                <hr>
                                                                <form id=" myFormId" action="/group-event/invoice" method="POST">
                                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                                    <tr>

                                                                        @php
                                                                        $ageGroup=App\Models\AgeGroupEvent::where('id',$event->age_group_event_id)->first();
                                                                        $ev=App\Models\Event::where('id',$ageGroup->event_id)->first();
                                                                        @endphp

                                                                        <td style="width:25%">
                                                                            {{ $ev->mainEvent->name }}
                                                                        </td>
                                                                        <td style="width:25%">
                                                                            {{ $event->gender->name }}
                                                                        </td>
                                                                        @php
                                                                        $ageGroup=App\Models\AgeGroupEvent::where('id',$event->age_group_event_id)->first();
                                                                        $ev=App\Models\AgeGroupEvent::where('id',$ageGroup->id)->first();
                                                                        $ageGroup=App\Models\AgeGroup::where('id',$ev->age_group_id)->first();
                                                                        @endphp
                                                                        <td style="width:25%">
                                                                            {{ $ageGroup->name }}
                                                                        </td>



                                                                        <td style="width:25%">
                                                                            <div id="teams" class="col-md-12">
                                                                                <div class="form-group">


                                                                                    <select name="members[]" class="form-control multiselect" multiple>
                                                                                        @foreach ($teams as $team)
                                       <?php
                                        $exp = preg_split("/-/", $ageGroup->name);
                                        $teamAge=preg_split("/-/", $team->ageGroup->name);
                                                                    if (isset($exp[1])) {
                                                                        if (($exp[0] < $teamAge[0] || $exp[0]==$teamAge[0]) && ($exp[1] == $teamAge[1] || $exp[1] > $teamAge[1])) {
                                                                    
?>                                        
                                        @if($event->gender_id==$team->gender_id)
                                        @if($team->status==1)
                                      <option value="{{$team->id}}" @foreach ($team1 as $tea){{
                                                                                            $team->id==$tea->id?'selected':''}} @endforeach> {{$team->name}} </option>
                                        @endif
                                        @endif
                                        <?php 
                                                                        }
                                            }
                                                                        ?>
                                        @endforeach
                                                                                        
                                                                                           
                                                                                    </select>
                                                                                </div>


                                                                            </div>
                                                        </div>
                                                        </td>
                                                        @php
                                                        $ageGroup=App\Models\AgeGroupEvent::where('id',$event->age_group_event_id)->first();
                                                        $ev=App\Models\Event::where('id',$ageGroup->event_id)->first();
                                                        @endphp

                                                        <input type="hidden" name="org" value="{{$ev->organization_id}}">
                                                        <input type="hidden" name="gender" value="{{ $event->id }}">
                                                        <input type="hidden" name="reg" value="{{ $member->id }}">


                                                        <td>
                                                                <button type="submit" name="event" value="{{ $event->id }}" class="btn btn-primary">
                                                                    Update
                                                                   
                                                                </button>
                                                        </td>


                                                        </tr>



                                                        </table>



                                                    </div>

                                                </div>
                                                <br>


                                                {{-- <div class="row">
                                                            <div class="col-md-6">
                                                            </div>
                                                            
                                                    </div> --}}
                                            </div>
                                    </div>
                                  
                                    </form>

                                </div>
                                <!-- nav-tabs-custom -->
                            </div>
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
@stop






{{-- page level scripts --}}
@section('footer_scripts')

<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>


<!-- <script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script> -->

<script>
    $(document).ready(function() {
        $("button").click(function() {
            var id = $(this).closest("tr").find("#teams");
            var submit = $(this).closest("tr").find("#submit");

            id.toggle("show");
            submit.toggle("show");
        });
    });
    $(document).ready(function() {
        $('.multiselect').multiselect({
            buttonWidth: '160px',
            includeSelectAllOption: true,
            nonSelectedText: 'Add Teams'
        });
    });

    function getSelectedValues() {
        var selectedVal = $(".multiselect").val();
        for (var i = 0; i < selectedVal.length; i++) {
            function innerFunc(i) {
                setTimeout(function() {
                    location.href = selectedVal[i];
                }, i * 2000);
            }
            innerFunc(i);
        }
    }

    // $(document).on('click', '.terms', function(e) {
    //     e.preventDefault();
    //     var id = $(this).val();
    //     $('#mine').modal('show');

    //     $.ajax({
    //         type: "GET",
    //         data: {
    //             "id": id
    //         },
    //         url: "/event/group/show",

    //         success: function(response) {
    //             var tr = "<tr><td style='width:25%;'>" + response.event.main_event.name + "</td><td>" + response.event.rules + "</td></tr>";
    //             $("#rules").append(tr);
    //             $('#id').val(id);
    //         }
    //     });

    // });
    // $("input[name='terms']").change(function() {
    //     // alert('hi');
    //     var id = $('#id').val();
    //     $("#myFormId").submit();
    // });
</script>




@stop