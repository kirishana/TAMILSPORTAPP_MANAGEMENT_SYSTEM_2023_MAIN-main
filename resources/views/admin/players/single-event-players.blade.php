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
                          
                               
                           
                            
                        </div>
            <div class="panel-body table-responsive">
                <div class="panel-body table-responsive">
                   @if(count($players)==1)
<span style="margin:20px;color:red;font-size:15px;">Time format Eg: (minutes : seconds : milliseconds)or (minutes . seconds . milliseconds)</span>

                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Round Name</th>
                                <th>Results</th>
                                <th>Player Number</th>
                                <th>Player Name</th>

                            </tr>
                        </thead>

                            <tbody>
                                <br>
                                @foreach ($players as $key => $chunk)
                                
                                    <td rowspan="{{$trackCount+1}}">Round {{$key}}</td>

                                    

                                            @foreach ($chunk as $player)
                                            @if($player)
                                            <tr>
                                            <td>
                                                                                          <input type="text"  style="width:38%" class="time" id="time" name="time[]" data-id="{{$player['id']}}" value="{{ $player['pivot']['time']? $player['pivot']['time']:''}}">

                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" id="gender">
                                            <input type="hidden" value="{{ $event->id }}" id="event">
                                    </td>
                                    <td>
                                       

                                       {{ $player['userId']}}
                                       
                               </td>
                                    <td>
                                       

                                       {{ $player['first_name']}}- {{ $player['last_name'] }}
                                       
                               </td>
                               </tr>
@endif
                                            @endforeach




                                       
                                  


                                @endforeach
                                
            </tbody>
                                
                                
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
                                @endif
                                
                                
                   @if(count($players)>1)

                    <table class="table table-striped table-bordered events" id="">
                        <thead>
                            <tr>
                                <th>Round Name</th>
                                <th>Player Number</th>
                                <th>Players</th>

                            </tr>
                        </thead>
                       <form action="/track/heats" method="get" id="myFormId">

                            <tbody>

                                <br>
                                @foreach ($players as $key => $chunk)
                                <tr>
                                    <td>Round {{$key}}</td>

                                    <td>
                                        <div class="row">

                                            @foreach ($chunk as $player)
                                            @if($player)
                                            <input type="checkbox" name="players[]" value="{{$player['id']}}"  data-name="{{$player['first_name']}} - {{$player['last_name']}}"
                                                                    data-id="{{$player['userId']}}">&nbsp;
                                            {{ $player['userId']}}
                                            <br>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" name="gender">
                                            <input type="hidden" value="{{ $event->id }}" name="event">
                                            @endif
                                            @endforeach




                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">

                                            @foreach ($chunk as $player)
                                            @if($player)

                                            {{ $player['first_name']}}- {{ $player['last_name'] }}
                                            <br>
                                            {{-- <input type="text" placeholder="H:i" class="time" id="time" name="time[]" data-id="{{$player['id']}}" value="{{ $player['pivot']['time']? $player['pivot']['time']:''}}"><br>
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                            <input type="hidden" value="{{ $gender->id }}" id="gender">
                                            <input type="hidden" value="{{ $event->id }}" id="event"> --}}
@endif
                                            @endforeach




                                        </div>
                                    </td>

                                </tr>

                                @endforeach
                               
            </tbody>
                                
                               
                                </table>
                                  <div class="row">
                <div class="col-md-10">
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-labeled btn-primary next">
                        Next
                        <span class="btn-label cool_btn_right">
                            <i class="material-icons cool_btn_righ_icon">keyboard_arrow_right</i>
                        </span>
                    </button>
                </div>

            </div>
             </form>
                                @endif 
                                
                   
</div>
</div>
                
</section>
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
        <!--Content-->
        <div class="modal-content">

            <div class="modal-header" style="border-bottom:none">
                <h2 style="text-align:center;margin:0px;font-size:15px;font-weight:bold">Selected Participants</h2>

            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">


                <div class="md-form ml-0 mr-0">
                    <table class="table table-striped" style="border: 1px;" >
                        <tr>
                            <th>Participants Number</th>
                            <th>Participants Name</th>
                        </tr>
                        <tbody id="participants" >
                        </tbody>

                    </table>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success heatsFinal">Update</button>
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
 $(document).ready(function($) {
        window.history.forward();

  $(".finish").on('click', function() {
      
            var id = $(this).attr('data-id');
            $.ajax({
                url: "/gender-user/" + id,
                method: "GET",
                data: {

                },
                                                  

                success: function(response) {
                    $("#users").empty();
                    $('#myModal3').modal('show');
                    $('#id').val(response.id);
                    $.each(response.genderUsers, function(k,user) {
                        var row=user.split('|');
            $("#users").append("<tr>" +
                "<td>" +row[0]+ "</td>" +
                                "<td>" +row[1]+ "</td>" +


                "</tr>");
                    });

                }
            });

        });
    $(".update").on('click', function() {
        var id=$('#id').val();
        window.location.href="/results/"+id;
        // /results/{{ $gender->id }}

    });
   
        $(".time").on('keyup', function() {
            var time = $(this).val();
                        var len=time.length;

            var player = $(this).data("id");
            var id = $("#gender").val();
            var method = $('#_method').val();
            var event = $('#event').val();
            
            $.ajax({
                url: "/event/finish/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "time": time,
                    "player": player,
                    "event": event,
                    "len":len
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });

        });
    
    // $(".finish").on('click', function() {

    //     $("#myFormId").submit();

    // });
    
          $(document).on('click', '.next', function(e) {
            
                    $('#myModal2').modal('show');
                    var selectedLanguage = new Array();
                    $("#participants").empty();
                    $("input[name='players[]']").filter(':checked').each(function() {
                        var pushedValue = $(this).attr('data-id');
                        var name = $(this).attr('data-name')
                        $("#participants").append("<tr>" +
                            "<td>" + pushedValue + "</td>" +
                            "<td>" + name + "</td>" +

                            "</tr>");
                        // selectedLanguage.push(pushedValue);
                    });
                

            });
    // $(".next").on('click', function(e) {
    //     e.preventDefault();
    //     // var userId=$('input[type="checkbox"]').attr('data-id');
    //     var userId=[];
    //     $('input[type="checkbox"]:checked').each(function(){
    //             userId.push($(this).val());
               

    //           });
    //           $.ajax({
    //                 type: 'POST',
    //                 url: '/userId/',
    //                 data: {
    //                     "_token": "{{ csrf_token() }}",
    //                     "userId": userId
    //                 },
    //                 success: function(response) {
    //                 $("#userId").empty();
    //                 $("#username").empty();
    //              $.each(response.userIds, function(key, item) {

    //                  $('#userId').append(
    //                   "<tr>"+"<td>" +item.userId+ "</td>"+"<td>" +item.first_name+ "</td>"+"</tr>");
    //              });
             
                 
             
    //      }
    //  });
    
    
    //     $('#anto').modal('show');
        $(".heatsFinal").on('click',function(){
            $("#myFormId").submit();
        });

    // });

        $(function(){
        $("#error").hide();
        var time=false;
        $(".time").keyup(function(){
             
            var time = $(this).val();
            if(time== '-'){
                $(this).val('59:59:59');
            }
              else{
            var validtime=time.split(/[\s.:]/);
            if(validtime.length==3){  
            if(validtime[0]<60 && validtime[1]<60 && validtime[2]<60)
            {
                // $("#error").hide();
                // $(".time").css("border","2px solid #34F458")

            }else{
               alert("invalid time format please check H:i values");
               $(".finish").prop('disabled',true);
                // $("#error").show();
                // $(".time").css("border","2px solid red")
                // var time=true;               
            }
        }
        if(validtime.length==2){  
            if(validtime[0]<60 && validtime[1]<60 )
            {
       
                $(".finish").prop('disabled',false);
                // $("#error").hide();
                // $(".time").css("border","2px solid #34F458")

            }else{
                alert("invalid time format please check time format");
                              $(".finish").prop('disabled',true);
                            //   $(".finish").css("border","2px solid red");

                // $("#error").show();
                // $(".time").css("border","2px solid red")
                // var time=true;               
            }
        }
        if(validtime.length==1){  
            if(validtime[0]<60 )
            {
                // $("#error").hide();
                // $(".time").css("border","2px solid #34F458")

            }else{
               alert("invalid time format please check H:i values");
                              $(".finish").prop('disabled',true);

                // $("#error").show();
                // $(".time").css("border","2px solid red")
                // var time=true;               
            }
        }            }
        

        });
    });
        
    });
</script>



@stop