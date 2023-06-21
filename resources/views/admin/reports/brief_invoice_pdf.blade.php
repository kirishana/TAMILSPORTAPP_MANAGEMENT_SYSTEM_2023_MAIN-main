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
    <table class="table table-striped table-bordered">
                                            <thead class="thead-Dark">
                                                <th>Player Name</th>
                                                <th>Event</th>
                                                <th>Event Unit Price</th>
                                                <th>Event Discount</th>
                                                <th class=""> Sub Total</th>
                                                <th>Org Discount</th>
                                                <th>total</th>
                                                <th>status</th>
                                            </thead>
                                            @if($registrations->count()>0)
                                            @foreach($registrations as $registration)
                                            @if($registration->events->count()>0)

                                            <?php
                  $total=App\Models\Registration::where('league_id',$league)->where('status','!=',3)->where('is_approved',1)->wherehas('user',function($q) use($registration){
                    $q->where('club_id',$registration->user->club_id);
                   })->sum('totalfee');
                  $paid=App\Models\Registration::where('league_id',$league)->whereIn('status',[1,2])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                    $q->where('club_id',$registration->user->club_id);
                   })->sum('totalfee');
                  $payable=App\Models\Registration::where('league_id',$league)->whereNotIn('status',[1,2,3])->where('is_approved',1)->wherehas('user',function($q) use($registration){
                    $q->where('club_id',$registration->user->club_id);
                   })->sum('totalfee');

                ?>
                                            <tr>
                                                <td>{{$registration->user->first_name}} &nbsp;{{$registration->user->last_name}}
                                                @if($registration->user->member_or_not==1)
                                                    [SIL Member]
                                                    @endif
                                                </td>
                                                <td>
                                                @foreach ($registration->events as $event )
                                                    {{ $event->mainEvent->name }}
                                                    <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($registration->events as $event )
                                                    {{ $iso }} {{ $event->mainEvent->price }}
                                                    <br>
                                                    @endforeach
                                                  
                                                </td>
                                                <td>
                                                @foreach ($registration->events as $event )
                                                  {{ $event->discount }}%
                                                    <br>
                                                    @endforeach
                                                </td>
                                                <td>
                                                @foreach ($registration->events as $event )
                                                    <?php
                                                        $subtotal =($event->mainEvent->price - (($event->discount / 100) * $event->mainEvent->price));
                                                    ?>
                                                    {{ $iso }} {{ $subtotal }}<br>
                                                    @endforeach
                                                </td>
                                                <td>
                                              
                                         @if($registration->user->member_or_not==1)
                                            {{$registration->discount }}%
                                           @else
                                           0%
                                            @endif
                                          
                                                </td>
                                                <?php
                                                 $totalFee=0;
                                                 if($registration->user->club_id == $club){
                                                    $totalFee=$totalFee+$registration->totalfee;
                                                   
                                                    }
                                                

                                                 ?>
                                                <td><strong>{{ $iso }} {{ $totalFee }}</strong></td>
                                                @if($registration->status== 2)
                                
                                <td><span class="label primary">Approved</span></td>
                            
                            @elseif($registration->status== 4)
                                <td><span class="label warning text-dark">pending</span></td>
                            @elseif($registration->status== 3)
                                <td><span class="label danger">rejected</span></td>
                            @elseif($registration->status== 1)
                                <td><span class="label success">Paid</span></td>
                            
                              @endif  
                                            </tr>
                                            @endif
                                            @endforeach
                                            @endif

            </table>
            <br>
            @if($registrations->count()>0)

            <table class="table table-striped table-bordered">

                <tr>
                    <th style="text-align:left">Total Amount</th>
                    <td>{{$iso}}&nbsp;{{$total}}</td>
                </tr>
                <tr>
                    <th style="text-align:left">Total Paid Amount</th>
                    <td>{{$iso}}&nbsp;{{$paid}}</td>
                </tr>
                <tr>
                    <th style="text-align:left">Total Payable Amount</td>
                    <td>{{$iso}}&nbsp;{{$payable}}</td>
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