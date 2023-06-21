<html>
    <head>
        <style>
                    .background{
                background-image: url({{ asset('organization/player/'.$header.'') }});
                background-size: 100%;
                background-repeat: no-repeat;
                margin:0px;
                padding:0px;
            height:465px;                
            }
        </style>
    </head>
    <body>
        @foreach ($event->registrations as $registration)
           
                <?php
       
        $mine=Carbon\Carbon::createFromFormat('Y-m-d', $registration->user->dob)->format('Y');
         $league1=Carbon\Carbon::createFromFormat('Y-m-d', $event->league->to_date)->format('Y');
         $age=$league1-$mine;
        $exp = preg_split("/-/", $Agegroup->name);
        if (isset($exp[1])){
    
            if (($exp[0] == $age || $exp[0] < $age) && ($exp[1] == $age || $exp[1] > $age)) {
        ?>
                @if ($AgeGroupGender->gender_id == $registration->gender)

                <div class="background"><span><p style="padding-top: 25px;font-size:160px;font-family: Arial, Helvetica, sans-serif;text-align: center">{{ $registration->user->userId }}</p></span></div>
                <div class="background"><span><p style="padding-top: 25px;font-size:160px;font-family: Arial, Helvetica, sans-serif;text-align: center">{{ $registration->user->userId }}</p></span></div>

                @endif
                <?php

            }
        }
        
            
          elseif ($exp[0] == $age) {
            

            ?>
            <div class="background"><span><p style="padding-top: 25px;font-size:160px;font-family: Arial, Helvetica, sans-serif;text-align: center">{{ $registration->user->userId }}</p></span></div>
            <div class="background"><span><p style="padding-top: 25px;font-size:160px;font-family: Arial, Helvetica, sans-serif;text-align: center">{{ $registration->user->userId }}</p></span></div>
        
                <?php }
            ?>
        @endforeach
      
    </body>
</html>
