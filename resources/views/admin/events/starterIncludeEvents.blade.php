
    <table class="table table-striped table-bordered table-hover events text-uppercase" id="table">
        <thead class="thead-Dark">
            <tr>
                <th>#</th>
                <th>Event Name</th>
                <th>League Name</th>
                <th>Event Organizer</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Actions</th>

            </tr>
        </thead>

        <tbody class="text-uppercase" id="starter">
                
                @foreach($genders as $gender)
                                @if($gender->ageGroupEvent->event->league->to_date>=Carbon\Carbon::now()->format('Y-m-d'))

                @if($gender->starter_id==Auth::user()->id)
            <tr>
                <td>{{$gender->id}}</td>

                <td>
                    {{ $gender->ageGroupEvent->event->mainEvent->name }}
                </td>
                <td>
                    {{ $gender->ageGroupEvent->event->league->name }}
                </td>

                <td>
                    {{ $gender->ageGroupEvent->event->user->first_name }}
                </td>
                <td>
                    {{ $gender->gender->name }}
                </td>
                
                <td>
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>

                <td>
                    {{$gender->ageGroupEvent->event->date}}
                </td>
                <td>{{$gender->time?$gender->time:''}}</td>
                @if($gender->status==2)
                <td>
                    <h5><span class="label label-primary">Not Started</span></h5>

                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
                @if($gender->status==10 || $gender->status==1)
                @else
                @if($gender->status==3 || $gender->status==4)
                <td>
                    <button style="padding: 2px 4px" class=" btn btn-info heatsFinal"  data-id="{{ $gender->id }}" data-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button>
                </td>
                @elseif($gender->status==0)
                <td>
                    <a href="/participants/ongoing/{{$gender->id}}"><button style="padding: 2px 4px" class=" btn btn-info"   data-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button>
                </a>
                </td>
                @else
                <td>
                    <a href="/participants/{{ $gender->id }}/"><button style="padding: 2px 4px"  data-id="{{ $gender->id }}" class=" btn btn-info selectEvent" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                </td>
                @endif
                @endif
            </tr>
            @endif
            @endif
            @endforeach
            <tbody class="text-uppercase" id="judge">
@foreach ($genders as $gender )
@if($gender->ageGroupEvent->event->league->to_date>=Carbon\Carbon::now()->format('Y-m-d'))

            @if($gender->judge_id==Auth::user()->id)
            <tr>

                <td>{{$gender->id}}</td>

                <td>
                    {{ $gender->ageGroupEvent->event->mainEvent->name }}
                </td>
                <td>
                    {{ $gender->ageGroupEvent->event->league->name }}
                </td>

                <td>
                    {{ $gender->ageGroupEvent->event->user->first_name }}
                </td>
                <td>
                    {{ $gender->gender->name }}
                </td>
                
                <td>
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>

                <td>
                    {{$gender->ageGroupEvent->event->date}}
                </td>
                <td>{{$gender->time?$gender->time:''}}</td>
              
                        <div id="visual">
                    @if($gender->status==2)
                <td>
                    <h5><span class="label label-primary">Not Started</span></h5>

                </td>
                @elseif($gender->status==0)
                <td> <span class="label label-warning">On Going </span>
                </td>
                @elseif($gender->status==3)
                <td> <span class="label label-warning">Finalizing </span>
                </td>
                @elseif($gender->status==4)
                <td> <span class="label label-warning">Processing</span>
                </td>
                @elseif($gender->status==10)
                <td> <span class="label label-danger">Cancelled</span>
                </td>
                @else
                <td> <span class="label label-success">Finished</span>
                </td>
                @endif
                        </div>

                @if($gender->status==10||$gender->status==1)
@else
                @if($gender->status==4)
                <td>
                    <a href="/track/heats/{{$gender->id}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                </td>
                @elseif($gender->status==2)
                @if($gender->ageGroupEvent->event->mainEvent->event_category_id==2)
                
                 <td>
                 <button style="padding: 2px 4px"  data-id="{{ $gender->id }}" class=" btn btn-info selectEvent" data-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button>
                </td>
@else
                <td>
                    <a href=""><button style="padding: 2px 4px" data-id="{{ $gender->id }}" class=" btn btn-info event" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                </td>
                                @endif
                                @elseif($gender->status==3)
                                <td>
                                    <a href=""><button style="padding: 2px 4px" data-id="{{ $gender->id }}" class=" btn btn-info finalizingEvent" data-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                                </td>
                @else
                <td>
                    <a href="/players/{{ $gender->id }}/{{$gender->ageGroupEvent->Event->id}}"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a>
                </td>
                @endif
                @endif
            </tr>
            @endif
            @endif
            @endforeach
        
        </tbody>
    </table>
<!--            <audio id="myAudio">-->
<!--  <source src="{{asset('assets/images/alert.wav')}}"  type="audio/wav">-->
<!--</audio>-->
<!--    <video class="video-player" width="320" height="240" controls="controls" controls preload="auto" autoplay="autoplay" loop muted playsinline>-->
<!--  <source src="{{asset('assets/images/video.mp4')}}" type="video/mp4">-->
<!--  Your browser does not support the video tag.-->
<!--</video>-->

  
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>

    //   window.addEventListener('load',function(){
         
        //   var audioCtx=new(window.AudioContext || window.webkitAudioContext)();
        //   var source=audioCtx.createBufferSource();
        //   var xhr=new XMLHttpRequest();
        //   xhr.open('GET','audio-autoplat.wav');
        //   xhr.responseType='arraybuffer';
        //   xhr.addEventListener('load',function(r){
        //       xhr.response,
        //       function(buffer){
        //           source.buffer=buffer;
        //           source.connect('audioCtx.destination');
        //           source.loop=false;
        //       }
        //       });
        //       source.start(0);
        //           xhr.send();
        //   });
        

      var t = document.getElementById('judge');

// $("#judge tr").each(function() {
// $(t.rows[10].cells[0]).empty();
// });
        $(document).ready(function() {

//   if (navigator.userAgent.match(/(iPod|iPhone|iPad)/)) {
//     $("audio").prop('muted', false);
//   }
            // webView.mediaPlaybackRequiresUserAction = NO;
            // document.getElementById("myAudio").muted = true;
                        // document.getElementById("myAudio").play();

            var pusher = new Pusher('86da804dfa2c9602384d', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      if(data.cat==2){

      }
      else{
      if(data.id){
          var table=document.getElementById('judge');
  var t = document.getElementById('judge');
var i=0;
$("#judge tr").each(function() {
  var val1 = $(t.rows[i].cells[0]).text();
  if(val1==data.id){
  if(data.status==2){
      swal({
  title: "Event Started",
  text: data.event+" "+data.ageGroup+" "+data.gender+" "+ "has been started",
  icon: "success",
  button: "Ok",
});
    var new_row = '<tr class="new_row"><td>'+data.ageGender.id+'</td><td>'+data.event+'</td><td>'+data.league+'</td><td>'+data.organizer+'</td><td>'+data.gender+'</td><td>'+data.ageGroup+'</td><td>'+data.date+'</td><td>'+data.time+'</td><td><span class="label label-warning">On Going</span></td><td><a href="/players/'+data.ageGender.id+'/'+data.eventId+'"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td></tr>';
    $(t.rows[i]).replaceWith(new_row);
    
  }
  else if(data.status==4||data.status==0){
       swal({
  title: "Event Started",
  text: data.event+" "+data.ageGroup+" "+data.gender+" "+"has been started",
  icon: "success",
  button: "Ok",
});
    var new_row = '<tr class="new_row"><td>'+data.ageGender.id+'</td><td>'+data.event+'</td><td>'+data.league+'</td><td>'+data.organizer+'</td><td>'+data.gender+'</td><td>'+data.ageGroup+'</td><td>'+data.date+'</td><td>'+data.time+'</td><td><span class="label label-warning">On Going</span></td><td><a href="/track/heats/'+data.ageGender.id+'"><button style="padding: 2px 4px" class=" btn btn-info" ata-toggle="tooltip" data-placement="top" title="View Participants"><i class="material-icons" style="margin-bottom:5px">visibility</i></button></a></td></tr>';
    $(t.rows[i]).replaceWith(new_row);
     
    }
  else if (data.status == 10){
    var new_row = '<tr class="new_row"><td>'+data.ageGender.id+'</td><td>'+data.event+'</td><td>'+data.league+'</td><td>'+data.organizer+'</td><td>'+data.gender+'</td><td>'+data.ageGroup+'</td><td>'+data.date+'</td><td>'+data.time+'</td><td><span class="label label-danger">Cancelled</span></td><td></td></tr>';
    $(t.rows[i]).replaceWith(new_row);

  }

  }

  i++;
});
          
      }
    }
  });
  $(document).on('click', '.finalizingEvent', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "/gender/" + id,
            data: {
                "_token": "{{ csrf_token() }}",

            },

            dataType: "json",
            success: function(response) {
                if (response.gender.status == 3) {
                    $('#modal-4').modal('show');
                } else {

                }

            }
        });



    });
  $(document).on('click', '.selectEvent', function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        $.ajax({
            type: "GET",
            url: "/gender/registration/" + id,
            data: {
                "_token": "{{ csrf_token() }}",

            },

            dataType: "json",
            success: function(response) {
               
if(response.category==3){
     if (response.count<2) {
                    $('#ageGroupGender').val(response.id);

                    $('#modal-3').modal('show');
                    $('.Count').val(response.count);
                } 
                else {
                                          

                                  window.location.href = response.url;
 
                    

                }
}
else if(response.age=='yes'){
    
if (response.count1<2) {
                                        $('#ageGroupGender').val(response.id);

                    $('#modal-3').modal('show');
                    $('.Count').val(response.count1);

                } 
                else {
                                    console.log('11');

                                  window.location.href = response.url;
 
                    

                }
}
else if(response.age=='no'){
                if (response.count2<2) {

                                                          $('#ageGroupGender').val(response.id);

                    $('#modal-3').modal('show');
                    $('.Count').val(response.count2);

                }
                else {
                                    console.log(response.count2);

                                  window.location.href = response.url;
 
                    

                }
}

                

            }
        });



    });
  $('.heatsFinal').on('click',function(){
      var gender=$(this).data('id');
    $.ajax({
            url: " /participants/final/"+gender,
            method: 'GET',
            
            dataType: 'json',
            success: function(response) {
                window.location.href = response.url;
            }
        })
  });
 
});


    $(document).on('click', '.cancel', function(e) {
        e.preventDefault();
        var ageGroupGender = $('.ageGroupGender').val();      
        $.ajax({
            type: "POST",
            url: "/event/cancel/starter/" + ageGroupGender,
            data: {
                "_token": "{{ csrf_token() }}",
                "ageGroupGender": ageGroupGender,
              
            },

            dataType: "json",
            success: function(response) {
                window.location.href = response.url;

            }
        });
     
    });
      $(document).on('click', '.no', function(e) {
        e.preventDefault();
        var ageGroupGender = $('.ageGroupGender').val();  
        var count = $('.Count').val();  
        if(count==0){
            var go_to_url = "/events";
        }else{
            var go_to_url = "/participants/"+ageGroupGender;
        }
   
  document.location.href = go_to_url;    
       
    });
    </script>
     <div class="modal fade slideDown" id="modal-3" role="dialog" aria-labelledby="modalLabelslidebottom">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title" id="modalLabelslidebottom">Event Status</h4>
                    </div>
                    <div class="modal-body">
                        <p>
                            sorry you can't  continue further as Only One player  has been registered for this event. 
                        </p>
                       <p>Are you sure you want to cancel this event?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="ageGroupGender" class="ageGroupGender">
                        <input type="hidden" id="Count" class="Count">
                                                <button class="btn  btn-primary cancel">Yes</button>

                        <button class="btn  btn-danger no" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>