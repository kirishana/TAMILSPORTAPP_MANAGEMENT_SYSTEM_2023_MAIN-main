@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Events
Tamil Sangam
@stop

{{-- page level styles --}}
@section('header_styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages/tab.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
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
</style>
@stop



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
                    {{ $event->mainEvent->name }} - {{ $gender->gender->name }} - ({{ $ageGroup }})
                </h4>

            </div>
            <br />

            <div class="panel-body table-responsive">
 @if(count($players)<=$trackCount)
 <div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
  <input class="form-check-input"  type="radio" name="method" id="inlineRadio1" value="1">
  <label class="form-check-label" for="inlineRadio1">Time</label>
  <input class="form-check-input" type="radio" name="method" id="inlineRadio2" value="2">
  <label class="form-check-label" for="inlineRadio2">Rank</label>
</div>
    <div class="col-md-4"></div>
</div>
            @endif
            <h4 class="length" style="display:none;text-align:center;color:red;">Please insert the values</h4>

                <div class="panel-body table-responsive timeBasis" style="display:none">
                    <span style="margin:20px;color:red;font-size:15px;">Time format Eg: (minutes : seconds : milliseconds)or (minutes . seconds . milliseconds)</span>

                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Results</th>
                                <th>Participant Number</th>
                                <th>Paticipant Name</th>
                            </tr>
                        </thead>

                            <tbody>

                                @foreach ($players as $player)

                                <tr>

                                    <td>
                                        <div class="row">

                                                   <input type="text" maxlength="8" pattern="" required  style="width:25%"class="time" id="time" name="time[]" data-id="{{$player->id}}"  data-userId="{{$player->userId}}" value="{{ $player->pivot->time? $player->pivot->time:''}}"oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                                                           <span style="background-color:red;display:none;" class="badge badge-success" id="added<?php echo $player['id']; ?>">Time format is wrong . please check the time format (Eg: minutes:seconds:milliseconds)</span>

                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" id="gender">
                                            <input type="hidden" value="{{ $event->id }}" id="event">





                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                                   
                                            {{ $player->userId }}
                                      <br>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" id="gender">
                                            <input type="hidden" value="{{ $event->id }}" id="event">





                                        </div>
                                    </td>
  <td>
                                       
                                                   
                                            {{ $player->first_name }} - {{$player->last_name}}
                                      <br>
                                           

                                           
                                    </td>
                                    @endforeach

                                </tr>

                                
                    </table>
            <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <button type="button" data-id="{{$gender->id}}" class="btn btn-labeled btn-primary finish">
                        Finish
                        <span class="btn-label cool_btn_right">
                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                        </span>
                    </button>

                </div>

            </div>
                </div>
                <!--rank-->
                       <div class="panel-body table-responsive rankBasis" style="display:none">
                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Results</th>
                                <th>Participant Number</th>
                                <th>Paticipant Name</th>
                            </tr>
                        </thead>

                            <tbody>

                                @foreach ($players as $player)

                                <tr>

                                    <td>
                                        <div class="row">

                                                   <input type="number"   min="1" style="width:25%"class="time" id="time" name="time[]" data-id="{{$player->id}}"  data-userId="{{$player->userId}}" value="{{ $player->pivot->time? $player->pivot->time:''}}">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" id="gender">
                                            <input type="hidden" value="{{ $event->id }}" id="event">





                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                                   
                                            {{ $player->userId }}
                                      <br>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" id="gender">
                                            <input type="hidden" value="{{ $event->id }}" id="event">





                                        </div>
                                    </td>
  <td>
                                       
                                                   
                                            {{ $player->first_name }} - {{$player->last_name}}
                                      <br>
                                           

                                           
                                    </td>
                                    @endforeach

                                </tr>

                                
                    </table>
            <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <button type="button" data-id="{{$gender->id}}" class="btn btn-labeled btn-primary finish">
                        Finish
                        <span class="btn-label cool_btn_right">
                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                        </span>
                    </button>

                </div>

            </div>
                </div>
   
            
            

</section>
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Participants Results</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Participant Number</th>
                                <th>Results</th>
                            </tr>
                        </thead>
                        <tbody id="users"></tbody>
                        <input type="hidden" id="id">
                        <input type="hidden" id="eventSelected">
                        <input type="hidden" id="genderSelected">
                    </table>

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

@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>

<script>
     $('input[name=method]').change(function() { 
    var value=$(this).val();
    if(value==1){
        $('.timeBasis').show();
        $('.rankBasis').hide();
                $(".finish").prop('disabled',false);

    }
    else{
        $('.rankBasis').show();
        $('.timeBasis').hide();
                $(".finish").prop('disabled',false);

    }
});

  $(".finish").on('click', function() {
        // $('#myModal2').modal('show');
            var values = new Array();
            var gender = $("#gender").val();
            var event = $('#event').val();   
        $('#eventSelected').val(event);
         $('#genderSelected').val(gender);
                    $("#users").empty();
                     var method=$('input[name="method"]:checked').val();
            
            if(method==1){
                var length=$('input[type="text"]').filter(function(input){
            return $(this).val() != "";
        }).length;
               
               if(length==0){
                   $('.length').show();
                   
               }else{
                   $('.length').hide();
                           $('#myModal2').modal('show');
                  $("input[type='text']").each(function() {
                        var number = $(this).attr('data-userId');
                        var results = $(this).val();
                        $("#users").append("<tr>" +
                            "<td>" + number + "</td>" +
                            "<td>" + results + "</td>" +
                             "</tr>");
        });
               }
                }else{
                    var length=$('input[type="number"]').filter(function(input){
            return $(this).val() != "";
        }).length;
               if(length==0){
                   $('.length').show();
                   
               }else{
                         $('.length').hide();
                           $('#myModal2').modal('show');
                    $("input[type='number']").each(function() {
                        var number = $(this).attr('data-userId');
                        var results = $(this).val();
                        $("#users").append("<tr>" +
                            "<td>" + number + "</td>" +
                            "<td>" + results + "</td>" +
                             "</tr>");
        });
               }
                }
  });
    $(".update").on('click', function() {
        var id=$('#genderSelected').val();
        var event=$('#eventSelected').val();
        var method=$('input[name="method"]:checked').val();
        var results=new Array();
        var players=new Array();
 $('#users tr').each(function(index, tr) {
 var player=$(this). closest("tr"). children("td:first"). text();
players.push(player);
 var result=$(this). closest("tr"). children("td:nth-child(2)"). text();
results.push(result);
});

    resultsWithPlayers = players.reduce(function (previous, key, index) {
        previous[key] = results[index];
        return previous
    }, {})


              $.ajax({
                 url: "/results/" + id,
                 method: "POST",
                 data: {
                     "event": event,
                     "method":method,
                     "playerResults":resultsWithPlayers,
                },
                 success: function(response) {
                    $('#myModal2').modal('hide');
                     window.location.href=response.url;

                 }
             });
    });
    $(document).ready(function($) {
             $(".time").on('keyup', function() {
            var method=$('input[name="method"]:checked').val();
            var time=$(this).val();
            var player = $(this).data("id");
            console.log(time);

            if(method==1){
                 if(time==""){   
                    $(".finish").prop('disabled',false);
                    $('#added'+player).hide(); 
                }else{
            var validtime=time.split(/[\s.:]/);
                 if(validtime.length==1){  
                $('#added'+player).show();
                $(".finish").prop('disabled',true);
                     
            
        }
           if(validtime.length==2){  
               if(validtime[0]==''){
                    $('#added'+player).show();
                $(".finish").prop('disabled',true);
                }
            else if(time.charAt(time.length-1)=='.'||time.charAt(time.length-1)==':'){
                $('#added'+player).show();
                $(".finish").prop('disabled',true);

            }
            else if(validtime[0]<60 && validtime[1]<60 )
            {
                
                    $(".finish").prop('disabled',false);
                    $('#added'+player).hide();
            }else{
                $('#added'+player).show();
                 $(".finish").prop('disabled',true);
                          
            }
        }
   
            if(validtime.length==3){  
                if(validtime[0]==''){
                    $('#added'+player).show();
                $(".finish").prop('disabled',true);
                }
                  else if(time.charAt(time.length-1)=='.'||time.charAt(time.length-1)==':'){
                $('#added'+player).show();
                $(".finish").prop('disabled',true);

            }
            else if(validtime[0]<60 && validtime[1]<60 && validtime[2]<60)
            {
                 $(".finish").prop('disabled',false);
                  $('#added'+player).hide();

            }else{
                $('#added'+player).show();
                $(".finish").prop('disabled',true);

                            
            }
        }
     
     if(validtime.length>3){
          $('#added'+player).show();
                $(".finish").prop('disabled',true);
     }

            }
           

                   
            }
            else{
       
            
            }
            
            
        });
    });
  
</script>

@stop