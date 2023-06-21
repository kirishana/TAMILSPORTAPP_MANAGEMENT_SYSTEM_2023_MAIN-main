<html>

<head>
    <style>
                @page { margin: 0;size: 1280px 776px; }

                .background {
            background-image: url({{ asset('organization/player/'.$header.'')}});
        background-size: 100%;   
        height: 100%;
        }
        
    </style>
</head>

<body>
    @foreach ($registrations as $registration)
@if($registration->events->count() > 0)

    <div class="background"><span>
        <p style="margin-bottom:0px;padding-bottom:0px;padding-top: 140px;font-size:200px;font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;text-align: center"><strong>{{ $registration->user->userId }}</strong><br>
        </p> 
        <center><span style="font-size:60px;">{{$registration->user->first_name}} {{$registration->user->last_name}}</span></center>

            
        </span></div>
        <div class="background"><span>
        <p style="margin-bottom:0px;padding-bottom:0px;padding-top: 140px;font-size:200px;font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;text-align: center"><strong>{{ $registration->user->userId }}</strong><br>
        </p> 
        <center><span style="font-size:60px;">{{$registration->user->first_name}} {{$registration->user->last_name}}</span></center>

            
        </span></div>
@endif

    @endforeach

</body>

</html>