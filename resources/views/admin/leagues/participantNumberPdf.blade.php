<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
       
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
<div class="row" id="usr">
<?php $value = Session::get('dataId'); ?>

<div class="container">
    @include('reports.header')


    </div>
<h2>Participants</h2>
<table class="table table-striped text-uppercase table-bordered users"  width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead">
            <tr  style="text-align: center;padding: 3px;
            width: 1%;
            text-align: left;">

               <th>No.</th>
                <th>Participant Number</th>
              
              <th>Participants Name</th>
              <th>{{$value?$value:'Organization/Club' }}</th>
            </tr>
        </thead>
        <tbody class="text-uppercase">
<?php 
$count=0;
?>
            @foreach ($registrations as $registration)
            @if($registration->events->count()>0)
            @if($registration->is_approved==1)
                     <tr>
                        <td style="width:6%">{{++$count}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width: 16%;padding:5px;">{{ $registration->user->userId }}</td>
                <td style="text-align: left;border: 1px solid #ddd;width: 27%;padding:5px;">{{$registration->user->first_name}} {{$registration->user->last_name}}</td>
           
                <td style="text-align: left;border: 1px solid #ddd;width: 45%;padding:5px;">{{$registration->user->club?$registration->user->club->club_name:'NorwayTamilSangam'  }}</td>
               
                
            </tr>
            @endif
            @endif
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($setting->footer) !!}


        </div>
    </section>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 250;
            $y = 800;
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
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>