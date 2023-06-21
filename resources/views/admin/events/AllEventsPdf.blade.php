<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       text-transform: capitalize;
       /* background-color: red; */
    }

    table td,
    table th {
        padding-bottom: 5px;
        line-height: 2;
        border: 1px solid #ddd;

    }

     td {
        width: 1px;
    }
  .thead {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F6;
}
h2 {
    text-align: center;
}
</style>
    <script src="{{ asset('assets/js/pdf.js') }}"></script> 



    <div class="row" id="ex">
        <div>
            <div class="container">
                @include('reports.header')
            
            
                </div>
    
        </div>
        <br>
        @if($eventTitle!=null||$AgeTitle!=null||$GenTitle!=null||$LeagueTitle)
                <div style="text-align:center;">
                <strong><span style="font-size:30px;">@if($LeagueTitle){{$LeagueTitle[0]}}@endif</span>&nbsp;<br>
                <strong><span style="font-size:30px;">@if($eventTitle){{$eventTitle[0]}}@endif</span> 
               
                @if($AgeTitle)<span style="font-size:30px;">({{$AgeTitle[0]}} @endif
                @if($GenTitle)
              @if($GenTitle[0]=="Male") <span style="color:green;">{{$GenTitle[0]}}  </span>
              @else
              <span style="color:red;">{{$GenTitle[0]}}
                </span>)
                @endif
            
            </strong>

                @endif
                </div>
@endif
        <br>
        <table class="table table-striped table-bordered users text-uppercase" id="table10">
            <thead class="thead">
                <tr>
                    <th>NO.</th>
                    <th>Event Name</th>
                    <th>League Name</th>
                    <th>Event Organizer</th>
                    <th>Gender</th>
                    <th>Age Group</th>
                    <th>Judge</th>
                    <th>Starter</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody id="users" class="text-uppercase">
<?php 
    $count=0;
?>
                @foreach($genders as $gender)
                @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)
                            @if($gender->ageGroupEvent->Event->league->to_date>Carbon\Carbon::now()) 

                <tr>
                    <td>{{++$count}}</td>
                    <td style="width:15%">
                        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                    </td>
                    <td style="width:15%">
                        {{ $gender->ageGroupEvent->Event->league->name }}
                    </td>

                    <td style="width:20%">
                        {{ $gender->ageGroupEvent->Event->user->first_name }}
                    </td>
                    <td style="width:10%">
                        {{ $gender->gender->name }}
                    </td>

                    <td style="width:10%">
                        {{ $gender->ageGroupEvent->ageGroup->name }}
                    </td>


                    <td style="width:10%">
                        {{$gender->starter?$gender->starter->first_name:''}}
                    </td>

                    <td style="width:10%">
                        {{$gender->judge?$gender->judge->first_name:''}}

                    </td>
                    <td style="width:10%">
                        {{ $gender->time?$gender->time:''}}
                    </td>

                
                </tr>
               @endif 
                @endif

                @endforeach


            </tbody>
            </table>

            <section class="content-footer">
                    @if($setting){!! html_entity_decode($setting->footer) !!}@endif
        
        
            </section>

            <script type="text/php">
                if (isset($pdf)) {
                    $x = 370;
                    $y = 570;
                    $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
                    $font = null;
                    $size = 12;
                    $color = array(0,0,0);
                    $word_space = 0.0;  //  default
                    $char_space = 0.0;  //  default
                    $angle = 0.0;   //  default
                    $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
                }
            </script>
           
    </div>
