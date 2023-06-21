@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
{{env('APP_NAME')}}
@stop
<?php 
$general = App\generalSetting::first();
$url=$general->website_url."assets/images/icons/loadingIcon.gif";
?>
<style>
#loader {
position: fixed;
top: 40%;
left:50%;
right:50%;
bottom: 0;
width: 50%;
/* background-image: url(<?php echo $url ?>); */
background-image:url("https://i.stack.imgur.com/kOnzy.gif");
background-repeat: no-repeat;
background-size: 75px 75px;
z-index: 99999;
}
 </style>
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

<link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" type="text/css" rel="stylesheet">
<link href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/pages/wizard.css') }}" rel="stylesheet">
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
    <div id='loader' style="display:none;"></div>


    <div class="row">
        <div class="panel panel-primary ">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <i class="material-icons  6:34 PM 9/24/2021">spa</i>
                    {{ $event->mainEvent->name }} - {{ $gender->gender->name }}
                     <div style="float:right">
                            <a data-id="{{$gender->id}}"  style="color:white" class="newParticipant"><i
                                    class="material-icons  leftsize ">add_circle</i>
                                Add New Participant</a>
                        </div>
                </h4>

            </div>
            <br />
            <div class="nav-tabs-custom">
                @if(Auth::user()->hasRole(6))
                <p style="margin:10px"><span style="color:red;"> <b> * If fowls leaves space </b></span></p>
                <p style="margin:10px"><span style="color:red;"> <b> * Measurements are considered as Meter unit </b></span></p>


                <ul class="nav nav-tabs custom_tab" id="myTab">
                    <li class="active">
                        <a class="panel-title-primary" href="#tab1" data-toggle="tab">
                            Round 1</a>
                    </li>
                    <li>
                        <a class="panel-title" href="#tab2" data-toggle="tab">
                            Round 2</a>
                    </li>
                    <li>
                        <a class="panel-title" href="#tab3" data-toggle="tab">
                            Round 3</a>
                    </li>
                    <li>
                        <a class="panel-title" href="#tab4" data-toggle="tab">
                            Results</a>
                    </li>

                </ul>
                @endif
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab1">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered events" id="">
                                    <thead>
                                        <tr>
                                            <th>Player Number</th>
                                            <th>Player</th>
                                            @if(Auth::user()->hasRole(6))

                                            <th>1st Round </th>
                                            @endif

                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($players as $player)
                                        <tr>
                                            <td>{{ $player->userId }}</td>
                                            <td>{{ $player->first_name }} -  {{ $player->last_name }}</td>

                                            @if(Auth::user()->hasRole(6))

                                            <td>
                                                <div class="row">


                                                    <input type="text" class="first" id="first" name="first" data-id="{{$player->id}}" value="{{ $player->pivot->one? $player->pivot->one:''}}" style="width:100px;">
<br>
                                                    <span style="background-color:red;display:none;" class="badge badge-success" id="added<?php echo $player['id']; ?>">Value format is wrong . please check the  format (Eg: meter.centemeter || meter,centemeter)</span>

                                                    <br>
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                    <input name="_method" type="hidden" value="PUT">

                                                    <input type="hidden" value="{{ $gender->id }}" id="gender">
                                                    <input type="hidden" value="{{ $event->id }}" id="event">




                                                </div>
                                            </td>
                                            @endif


                                        </tr>


                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        @if(Auth::user()->hasRole(6))

                        <div class="row">
                            <div class="col-md-10">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary previous nex" style="float:right" href="#tab2" data-toggle="tab">
                                    Next &raquo;</button>
                            </div>

                        </div>
                        @endif
                    </div>

                    <div class="tab-pane fade" id="tab2">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered events" id="">
                                    <thead>
                                        <tr>
                                            <th>Player Number</th>
                                            <th>Player</th>
                                            <th>2nd Round </th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($players as $player)
                                        <tr>
                                        <td>{{ $player->userId }}</td>
                                            <td>{{ $player->first_name }} -  {{ $player->last_name }}</td>
                                            @if(Auth::user()->hasRole(6))

                                            <td>
                                                <div class="row">


                                                    <input type="text" class="second" id="second" name="second" data-id="{{$player->id}}" value="{{ $player->pivot->two? $player->pivot->two:''}}" style="width:100px;"><br>
                                                    <span style="background-color:red;display:none;" class="badge badge-success" id="addedsecond<?php echo $player['id']; ?>">Value format is wrong . please check the  format (Eg: meter.centemeter || meter,centemeter)</span>

                                                    <br>
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                    <input type="hidden" value="{{ $gender->id }}" id="gender">
                                                    <input type="hidden" value="{{ $event->id }}" id="event">




                                                </div>
                                            </td>
                                            @endif

                                        </tr>


                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                            <button class="btn btn-primary next preone" href="#tab1" data-toggle="tab">
                                    &laquo; Previous
</button>
                            </div>
                            <div class="col-md-2">
                            <button class="btn btn-primary previous nextwo" style="float:right" href="#tab3" data-toggle="tab">
                                    Next &raquo;</button>

                            </div>

                        </div>

                    </div>


                    <div class="tab-pane fade" id="tab3">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <table class="table table-striped table-bordered events" id="">
                                    <thead>
                                        <tr>
                                           <th>Player Number</th>
                                            <th>Player</th>
                                            <th>3rd Round </th>
                                        

                                        </tr>
                                    </thead>


                                    <tbody>

                                        @foreach ($players as $player)
                                        <tr>
                                        <td>{{ $player->userId }}</td>
                                            <td>{{ $player->first_name }} -  {{ $player->last_name }}</td>
                                            @if(Auth::user()->hasRole(6))

                                            <td>
                                                <div class="row">


                                                    <input type="text" class="third" id="third" name="third" data-id="{{$player->id}}" value="{{ $player->pivot->third? $player->pivot->third:''}}" style="width:100px;"><br>
                                                    <span style="background-color:red;display:none;" class="badge badge-success" id="addedthird<?php echo $player['id']; ?>">Value format is wrong . please check the  format (Eg: meter.centemeter || meter,centemeter)</span>

                                                    <br>
                                                    <input name="_token" type="hidden" value="{{ csrf_token() }}" />
                                                    <input type="hidden" value="{{ $gender->id }}" id="gender">
                                                    <input type="hidden" value="{{ $event->id }}" id="event">




                                                </div>
                                            </td>
                                            @endif

                                        </tr>


                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        @if(Auth::user()->hasRole(6))
                        <div class="row">
                            <div class="col-md-10">
                            <button class="btn btn-primary next pretwo" href="#tab2" data-toggle="tab">
                                    &laquo; Previous
</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="finish" data-next="#tab1" data-previous="#tab4" style="float:right">
                                    Finish</button>
                                <input type="hidden" value="{{ $gender->id }}" id="gender" name="gender">
                                <input type="hidden" value="{{ $event->id }}" id="event" name="event">
                            </div>

                        </div>
                        @endif

                    </div>

                    @if(Auth::user()->hasRole(6))
                    <div class="tab-pane fade" id="tab4">
                        <div class="row">
                            <div class="col-md-8">
                                <table class="table table-striped table-bordered events" id="">
                                    <strong>
                                        <p style="text-align:center">Players</p>
                                    </strong>
                                    <thead>
                                        <tr>
                                            <th>Players</th>
                                            <th>1st Round </th>
                                            <th>2nd Round </th>
                                            <th>3rd Round </th>

                                        </tr>
                                    </thead>


                                    <tbody id="varna">


                                    </tbody>
                                </table>

                            </div>
                            <div class="col-md-4">
                                <table class="table table-striped table-bordered events" id="">
                                    <strong>
                                        <p style="text-align:center">Winners</p>
                                    </strong>
                                    <thead>
                                        <tr>
                                            <th>First</th>
                                            <th>Second</th>
                                            <th>Third</th>

                                        </tr>
                                    </thead>



                                    <tbody>
                                        <tr>
                                            <td id="winnersFirst"></td>
                                            <td id="winnersSecond"></td>
                                            <td id="winnersThird"></td>

                                        </tr>
                                    </tbody>

                                </table>

                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <a class="next" href="#tab3" data-toggle="tab">
                                        &laquo; Previous
                                    </a>
                                </div>
                                <div class="col-md-2">
                                       <button class="btn btn-success end" data-id="{{$gender->id}}" style="text-transform:uppercase;">Finish</button>
                                </div>

                            </div>

                        </div>

                    </div>
                    @endif
                </div>


            </div>
        </div>
    </div>

</section>
<!--Modal: Login with Avatar Form-->
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
                    <table class="table table-striped table-bordered events" id="">
                        <tr>
                            <th></th>
                            <th>Participant Name</th>
                                                        <th>Participant Number</th>

                        </tr>
                        <tbody id="users"></tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success add">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>

        </div>
        <!--/.Content-->
    </div>
</div>

<!--Modal: Login with Avatar Form-->

@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script src="{{ asset('assets/js/pages/tabs_accordions.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/select2/js/select2.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapwizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script>
    $('.previous').click(function() {
        $('.nav-tabs > .active').next('li').find('a').trigger('click');
    });
    $('.next').click(function() {
        $('.nav-tabs > .active').prev('li').find('a').trigger('click');
    });
    $('.newParticipant').on('click',function(){
        var gender=$(this).data('id');
         $.ajax({
                url: "/participants/lateComers/"+gender,
                type: "GET",
                
                success: function(response) {
                     $("#users").empty();
                                   $('#myModal2').modal('show');

                     $.each(response.users, function(key, item) {
                         $("#users").append(
                         `<tr>
                          <td><input type="checkbox" data-id="${item.id}" data-gender="${response.gender}" name="players[]"></td>
            <td>${item.first_name}</td>
                                <td>${item.userId}</td>

                </tr>`
                );
                     });
                }
         });
       
    });
    $('.end').on('click',function(){
        
         var id=$(this).attr('data-id');
       $.ajax({
                 url: "/results/" + id,
                 method: "POST",
                 data: {
                   
                },
                 success: function(response) {
                    // $('#myModal3').modal('hide');
                     window.location.href=response.url;

                 }
             });
    });
        $('.add').on('click',function(){
            var selectedLanguage = new Array();
            var gender;
        $("input[name='players[]']").filter(':checked').each(function() {
            var pushedValue = $(this).attr('data-id');
            var name=$(this).attr('data-gender')
        
            gender=name;
            selectedLanguage.push(pushedValue);
        });
         $.ajax({
                url: "/add/registration/"+gender,
                type: "GET",
                data:{
                    "users":selectedLanguage,
                },
                success: function(response) {
                  window.location.reload();
                }
         });
       
    });

        $(".finish").on('click', function() {
          
            var gender = $("#gender").val();
            var event = $("#event").val();
            $('#loader').show();
            $.ajax({
                url: "/field-event/results",
                type: "GET",
                dataType: "json",
                data: {
                    "gender": gender,
                    "event": event
                },
              
                success: function(response) {

                    $('#varna').empty();
                    $('#winnersFirst').empty();
                    $('#winnersSecond').empty();
                    $('#winnersThird').empty();

                    $('#myTab a[href="#tab4"]').tab('show');

                    $.each(response.players, function(key, item) {
                        $('#varna').append(

                            `<tr>
  <td>[${item.userId}] ${item.first_name} ${item.last_name}</td>
  <td>${item.pivot.one!=null?item.pivot.one:'-'}</td>
  <td>${item.pivot.two!=null?item.pivot.two:'-'}</td>
  <td>${item.pivot.third!=null?item.pivot.two:'-'}</td>
</tr>`
                        )
$('#loader').hide();

                    });
                    $.each(response.users, function(key, user) {

                        $('#winnersFirst').append(

                            `[${user.userId}] ${user.first_name} ${user.last_name}`
                        )

                        $('#loader').hide();
                    });
                    $.each(response.users2, function(key, user) {

                        $('#winnersSecond').append(

                            `[${user.userId}] ${user.first_name} ${user.last_name}`
                        )

                        $('#loader').hide();
                    });

                    $.each(response.users3, function(key, user) {

                        $('#winnersThird').append(

                            `[${user.userId}] ${user.first_name} ${user.last_name}`
                        )
                       
                        $('#loader').hide();
                    });
                   
                         }
            });

        });
        $(".first").on('keyup', function() {
            var first = $(this).val();
            var player = $(this).data("id");
    var ar =/^[0-9.,]*$/;
     if(ar.test(first) == false) {
 $('#added'+player).show();
                $(".nex").prop('disabled',true);
         
     }

            else if(first== ''){    
                var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "first": first,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });
                }else{
                    var length=first.split(/[\s.,]/);
                    if(length.length>2){
                        $('#added'+player).show();
                $(".nex").prop('disabled',true);
                    }else{
                        if(length[0]==''){
                             $('#added'+player).show();
                $(".nex").prop('disabled',true);
                        }
                        else{
                        $('#added'+player).hide();
                $(".nex").prop('disabled',false);
                var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "first": first,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });
                        }
                    }

                }
    

        });



        $(".second").on('keyup', function() {
            var second = $(this).val();
            var player = $(this).data("id");
 var ar =/^[0-9.,]*$/;
     if(ar.test(second) == false) {
 $('#addedsecond'+player).show();
                $(".nextwo").prop('disabled',true);
         
     }

            else if(second== ''){    
                var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/second/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "second": second,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });
                }else{
                    var length=second.split(/[\s.,]/);
                    if(length.length>2){
                        $('#addedsecond'+player).show();
                $(".nextwo").prop('disabled',true);
                    }else{
                        if(length[0]==''){
                             $('#addedsecond'+player).show();
                $(".nextwo").prop('disabled',true);
                        }
                        else{
                        $('#addedsecond'+player).hide();
                $(".nextwo").prop('disabled',false);
                var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/second/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "second": second,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });
                    }
                    }

                }

        });




        $(".third").on('keyup', function() {
            var third = $(this).val();
            var player = $(this).data("id");
var ar =/^[0-9.,]*$/;
     if(ar.test(third) == false) {
 $('#addedthird'+player).show();

     }

            else if(third== ''){    
                var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/third/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "third": third,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });
                }else{
                    var length=third.split(/[\s.,]/);
                    if(length.length>2){
                        $('#addedthird'+player).show();
                    }else{
                         if(length[0]==''){
                             $('#addedthird'+player).show();
                        }
                        else{
                        $('#addedthird'+player).hide();
                var id = $("#gender").val();
            var event = $("#event").val();
            // var method = $('#_method').val();
            $.ajax({
                url: "/event/field-event/finish/third/" + id,
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "third": third,
                    "player": player,
                    "event": event
                },
                success: function(response) {
                    // window.location.href = response.url;

                }
            });
                        }
                    }

                }
        });
</script>

@stop