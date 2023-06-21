<style type="text/css">
     table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    table td,
    table th {
        border:solid #B2BABB;
        opacity:50;
        border-width: thin;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .table .thead-Dark th {
 
        color: white;
        background-color: #3A3B3C;
        text-transform: uppercase;
        padding-top: 5px;
        padding-bottom: 5px;

 /* border-color: #792700; */

}
tr:nth-child(even) {
  background-color: #F4F6F7;
}
h2 {
    text-align: center;
    text-transform: uppercase;

}
</style>
<div class="row" id="print">
<div class="container" style="width:705px;height:120px;">
    @if($header)
            <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('organization/header/'.$header .'') }}">

            @else
            <img class="img-fluid" style="width:705px;height:120px;" src="{{ asset('assets/images/authors/avatar5.png')}}">
            @endif

    </div>
   
    <h2> {{$leagueName->name}}--{{$clubName->club_name}}</h2>
    <table class="table table-striped table-bordered" id="filter1">
                                            <thead class="thead-Dark">
                                                <th>Event</th>
                                                <th>Gender</th>
                                                <th>AgeGroup</th>
                                                <th>Team</th>
                                                <th>Event &nbsp; Unit Price</th>
                                                <th>Event &nbsp; Discount</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                            </thead>
        
            @if($GroupRegistrations!=null)         
@foreach($GroupRegistrations as $GroupRegistration)

<tr>

    <td>
    {{$GroupRegistration->ageGroupGender->ageGroupEvent->Event->mainEvent->name}}
    </td>
    <td>
    {{$GroupRegistration->ageGroupGender->gender->name}}
    </td>
    
    <td>
    {{$GroupRegistration->ageGroupGender->ageGroupEvent->ageGroup->name}}
    </td>
    <td>
        @foreach($GroupRegistration->teams as $team)
                   <ul>
                    <li>{{$team->name}}</li>
                   </ul>
        @endforeach
    
    </td>
    <td>
    {{$iso}}&nbsp;{{$GroupRegistration->ageGroupGender->ageGroupEvent->Event->mainEvent->price}}
    </td>
    <td>
    {{$GroupRegistration->ageGroupGender->ageGroupEvent->Event->discount}}%
    </td>
    <td>
  
    {{$iso}}&nbsp;{{$GroupRegistration->totalfee}}
    </td>
    <td>
    @if($GroupRegistration->status== 1)
                                
                                <span class="label success">Paid</span><br><br><br>
                             
                             @elseif($GroupRegistration->status== 0)
                             <span class="label warning text-dark">pending</span><br><br>
                             @elseif($GroupRegistration->status== 2)
                             <span class="label primary">Approved</span><br><br>
                             @elseif($GroupRegistration->status== 3)
                             <span class="label danger">Rejected</span><br><br>
                             
                               @endif   
    </td>
    
   
</tr>
@endforeach   
</table>
@endif
<br>

@if($grandtotal>0)         

<table class="table table-striped table-bordered">
                <tr>
                    <th style="text-align:left">Total Amount</th>
                    <td>
                    {{$iso}}&nbsp;{{$grandtotal}}
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left">Total Paid Amount</th>
                    <td>{{$iso}}&nbsp;{{$paid1}}</td>

                </tr>
                <tr>
                    <th style="text-align:left">Total Payable Amount</td>
                    <td>{{$iso}}&nbsp;{{$payableG}}</td>
                </tr>
            </table>                     
@endif     
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>


</div>
<script type="text/php">
    if (isset($pdf)) {
        $x = 250;
        $y = 820;
        $text = "Page {PAGE_NUM} of {PAGE_COUNT}";
        $font = null;
        $size = 14;
        $color = array(0,0,0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
    }
</script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>