<link type="text/css" href="{{ asset('assets/vendors/bootstrap-multiselect/css/bootstrap-multiselect.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/all.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/vendors/iCheck/css/line/line.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/formelements.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/pages/customform_elements.css') }}" rel="stylesheet" />
<div class="row" id="futureEvents1">
   <div class="row">
    
           <div class="col-md-3" style="margin-left:20px;">
                                            <select id="select26" class="form-control select2 league">
                                             @if($selectedLeague!=null)
                                                <option disabled selected> Select League</option>
                                                @foreach($leagues as $league1)  
                                               
                                                @if($selectedLeague->id==$league1->id)
                                             <option selected value="{{ $league1->id }}">{{ $league1->name }}</option>
                                                @else                                         
                                                <option value="{{ $league1->id }}">{{ $league1->name }}</option>
                                                @endif
                                                @endforeach
                                                @else
                                                <option disabled selected> Select League</option>
                                                @foreach($leagues as $league1)  
                                               
                                                                                    
                                                <option value="{{ $league1->id }}">{{ $league1->name }}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                        </div>

                                        
        <div class="panel-body" >
        <div class="col-lg-12 col-md-12 col-sm-12">
        <table class="table table-striped text-uppercase table-bordered"  id="users" >
                    <thead class="thead-Dark">
                        <tr  style="text-align: center">
                            <th width="8%">Event</th>
                            <th>Event Date</th>
                            <th class="phone">Gender</th>
                            <th class="age">Age Group</th>
                            <th>Team Available 
                    </th>

                            <th  class="age">Teams  
                                </th>
                               
<th></th>
                           
            
                        </tr>
                    </thead>

                    @if($selectedLeague!=null)
                    <tbody class="">
                        @foreach ($selectedLeague->events as $event)
                        {{-- <form id="myFormId" action="/group-event/invoice" method="POST"> --}}
                            <form id="myFormId" action="/group-event/register" method="POST">

                            <input name="_token" id="_token" type="hidden" value="{{ csrf_token() }}" />
                        @php
                              $regs=array();
                              $teamCount=0;
                        @endphp
                        @foreach(Auth::user()->club->groupRegistrations as $registration)
                        <?php
                        $regs[] = $registration?$registration->age_group_gender_id:'';
                        ?>
                        @endforeach
                        @if ($event->mainEvent->event_category_id == 3)
                        @php
                        $ages = App\Models\AgeGroupEvent::where('event_id', $event->id)->get();
                        @endphp
                        @foreach ($ages as $age)
                        @php
                        $genders = App\Models\AgeGroupGender::where('age_group_event_id', $age->id)
                        ->latest()
                        ->get();
                        @endphp
                            <input type="hidden" id="event" value="{{ $event->id }}">
                            @foreach ($genders as $gender)
                            @if($gender->status!=10)
                            <?php
                        
                            if (!in_array($gender->id, $regs)) {
                            ?>
                    <tr>
                       

                        <td style="width:15%">
                            {{ $event->mainEvent->name }}
                        </td>
                        <td style="width:15%">
                        @php echo Carbon\Carbon::parse($event->date)->format('d.m.Y'); @endphp

                        </td>
                        <td style="width:5%">
                            {{ $gender->gender->name }}
                        </td>
                        @php
                        $ageGroup = App\Models\AgeGroup::where('id', $age->age_group_id)->first();
                        @endphp
                        <td style="width:5%">
                            {{ $ageGroup->name }}
                        </td>
                        <td style="width:5%"> 
                        @foreach ($teams as $team)
                        
                                       @if($ageGroup->name==$team->ageGroup->name)
                                        @if($gender->gender_id==$team->gender_id)
                                        @if($team->status==1)
                                        <?php
                                        $teamCount++;
                                        if($teamCount>0){
                                        ?>
                                       <span class="btn btn-success">Yes</span>
                                       <?php
                                        }
                                        break;
                                        ?>
                                        @else
                                        @endif
                                        @endif
                                        @endif
                                        
@endforeach


                                        </td>

                        
                        <td style="width:40%">
                            <div id="teams"  class="col-md-12 teams">
                                <div class="form-group">
                                    
                                    <select name="members[]" id="members" class="form-control multiselect members" required multiple>
                                       
                                        @foreach ($teams as $team)

@if($ageGroup->name==$team->ageGroup->name)
                                        @if($gender->gender_id==$team->gender_id)
                                        @if($team->status==1)
                                        <option value="{{ $team->id }}">

                                            {{ $team->name }}
                                        </option>
                                        @endif
                                        @endif
                                      @endif
                                        @endforeach
                                    </select>
                                </div>
                                <span style="color:red;font-size:16px;display:none;"  id="added<?php echo $gender['id']; ?>">*Please Select the Team First</span>
                            </div>
            </div>
            </td>


            <td style="width:10%">
                <div class="col-md-2 submit" id="submit" >
                    <button type="button" name="event" value="{{ $gender->id }}" class="btn btn-labeled btn-primary terms">
                        Next
                        <span class="btn-label cool_btn_right">
                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                        </span>
                    </button>
                </div>
            </td>
            
            <?php 
                            }
                            
                            ?>
            </tr>
                                                    @endif
                                                    
            

            @endforeach
            @endforeach
            @endif
        </form>

            @endforeach
    </tbody>
           
    @endif

</table>
    </div>
</div>
                        </div>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-multiselect/js/bootstrap-multiselect.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/bootstrap-switch/js/bootstrap-switch.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/vendors/switchery/js/switchery.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ asset('assets/js/pages/custom_elements.js') }}"></script>
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
  $(".league").on('change', function() {
                var league = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '/league/group-events/'+league,
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {                        
                            $('#futureEvents1'). html(response['html'])
                        }
         });
     });

 

            $('.multiselect').multiselect({
                buttonWidth: '160px',
                includeSelectAllOption: true,
                nonSelectedText: 'Add Teams'
            });


        $(document).on('click', '.terms', function(e) {
           
            if($(this).closest("tr").find("#members").val()==null){
                $('#added'+$(this).val()).show();
            }
            else{
              $('#added'+$(this).val()).hide();
            e.preventDefault();
            var id = $(this).val();
             var selected = $(this).closest("tr").find("#members").val();
        
            $('#modal-1').modal('show');

            $.ajax({
                type: "GET",
                data: {
                    "id": id,
                    "selected":selected
                },
                url: "/event/group/show",

                success: function(response) {
                    
                    var teams=new Array();

$.each(response.teams, function(index,team ) {

// team.split(",").join("\n");
teams.push(team + '<br>');


});
var a =teams.join("\n");

                    var date=new Date(response.event.date);
                   var year=date.getFullYear();
                   var month=date.getMonth()+1;
                   var day=date.getDate();
                   var finalDate=(day+"."+month+"."+year);
                    $("#rules").empty();
                    var tr = "<tr><td style='width:40%;'>" + response.event.main_event.name +
                        "</td><td style='width:40%;'>" + finalDate +
                            "<td style='width:60%;'>"+a+"</td>"
                        "</td></tr>";
                    $("#rules").append(tr);
                    var memberDet=new Array();

                    $.each(response.members, function( index,member ) {
  var member1=member;
    $('#member').val(member1);

    memberDet.push(member1);
                  
});
$('#mem').val(memberDet);
                    $('#id').val(id);
                }
            });
            }

        });
      
            </script>
           
              <div class="modal fade modal-fade-in-scale-up" tabindex="-1" id="modal-1" role="dialog"
             aria-labelledby="modalLabelfade" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title" id="modalLabelfade">Event Registration confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Are you sure, you want to register below events?</h4>
                       <table>
                        <tr>
                            <th>
                                Event
                            </th>
                            <th>Date</th>
                            <th>Selected Teams</th>
                        </tr>
                                                <tbody id="rules"></tbody>
                                            </table>
                                              <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" id="id" name="gender" value="">
                                            <input type="hidden" class="members" id="mem" name="memberTeams[]" value="">
                                            <input name="_token" id="_token" type="hidden" value="{{ csrf_token() }}" />

                                        </div>
                                    </div>
                       
                    </div>
                     <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
                            <button type="button" class="btn btn-primary register" name="terms">Register</button>
                        </div>
                </div>
            </div>
        </div>
                    


