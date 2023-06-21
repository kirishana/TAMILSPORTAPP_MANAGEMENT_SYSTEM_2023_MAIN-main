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
<script src="{{ asset('assets/js/pdf.js') }}"></script> 



<div class="row" id="ex">
  
    <div class="container">
        @include('reports.header')
        </div>


    <h2>Event Status</h2>
    <table class="table table-striped table-bordered users text-uppercase" style="width: 100%;" id="table10">
        <thead class="thead">
            <tr>
                <th>NO.</th>
                <th>Event Name</th>
                <th>League Name</th>
                <th>Gender</th>
                <th>Age Group</th>
                <th>Date</th>
                <th>No. of part</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody id="users" style="text-transform:capitalize">

<?php    
$count5=0;
?>            @foreach($genders as $gender)
            @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)
            @if($gender->status==2)
                <?php 
            if($gender->ageGroupEvent->Event->league->to_date >=$today)
            {   
            ?>
            <tr>
                <td style="width:5% ;">{{++$count5}}</td>
                <td style="text-align: left;border: 1px solid #ddd;width:20%;padding:5px;">
                    {{ $gender->ageGroupEvent->Event->mainEvent->name }}
                </td>
                <td style="text-align: left;border: 1px solid #ddd;width:25%;padding:5px;">
                    {{ $gender->ageGroupEvent->Event->league->name }}
                </td>

               
                <td style="text-align: left;border: 1px solid #ddd;width: 10%;padding:5px;">
                    {{ $gender->gender->name }}
                </td>

                <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;">
                    {{ $gender->ageGroupEvent->ageGroup->name }}
                </td>
                <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;">
                    {{ $gender->ageGroupEvent->Event->date }}
                </td>

                @include('testing')


                       @if ($gender->status == 2)
                       <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;">
                           Not Started

                       </td>
                   @elseif($gender->status == 0)
                       <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;"> On Going
                       </td>
                   @elseif($gender->status == 3)
                       <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;">Finalizing
                       </td>
                   @elseif($gender->status == 10)
                       <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;">Cancelled
                       </td>
                   @else
                       <td style="text-align: left;border: 1px solid #ddd;width:10%;padding:5px;">Finished
                       </td>
                   @endif
              

            
            </tr>
            <?php 
        }
        ?>
        @endif
            @endif

            @endforeach


        </tbody>
        </table>
        </div>

        <section class="content-footer">
                @if($setting){!! html_entity_decode($setting->footer) !!}@endif
    
    
        </section>

        <script type="text/php">
            if (isset($pdf)) {
                $x =380;
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

