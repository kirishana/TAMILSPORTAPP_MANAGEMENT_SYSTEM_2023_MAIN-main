<html>

<head>
    <style>
        @page { margin: 0;size: 874px 1241px; }

        .background {
            background-image: url({{ asset('organization/staffId/'.$header.'')}});
        background-size: 100%;
        height: 100%;
        }
        
    </style>
</head>

<body>
    @foreach ($users as $user)

    <div class="background">
       <center>
       @if($user->profile_pic)
                                                                                <img src="{{ asset('profile/'.$user->profile_pic.'')}}" style="width:215px;height:215px;margin-top:600px;">
          @elseif($user->gender=="male")
                                                                                <img src="{{ asset('assets/images/authors/malelogo.png') }}" style="width:215px;height:215px;margin-top:600px;" />
        @else
                                                                                <img src="{{ asset('assets/images/authors/avatar5.png') }}" style="width:215px;height:215px;margin-top:600px;" />
        @endif
        <h1 style="font-size:40px;">{{ $user->first_name }} - {{ $user->last_name }}</h1>
        <span style="font-size:80px;font-family:Arial, Helvetica, sans-serif;color:#c2051b"><strong>{{$user->roles->pluck('name')->implode(' ')}}</strong></span>
       </center>
         </div>
        
  

    @endforeach

</body>

</html>