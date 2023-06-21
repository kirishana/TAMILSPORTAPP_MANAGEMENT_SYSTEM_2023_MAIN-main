<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    table td,
    table th {
        padding-bottom: 5px;
        line-height: 1.5;
        border: 1px solid #ddd;
    }

    table tr,
    table td {
        padding: 3px;
        width: 1%;
        text-align: left;

    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;
 text-transform: uppercase;
 font-size: 12px;

 /* border-color: #792700; */

}
</style>
<div class="row" id="usr">
<div class="container">
@include('reports.adminHeader')
    </div>
<h3 style="text-align: center;">CLUB EVENTS</h3>

    <table class="table table-striped table-bordered users" id="export">
        <thead class="thead-Dark">
            <tr>

                <th style="width:3%;">Organization</th>
                <th style="width:3%;">League</th>
                <th style="width:2%;">Event</th>
                <th style="width:1%;">Age Group</th>
                <th style="width:2%;">Gender</th>
                <th style="width:3%;">Team Name</th>
                <th style="width:2%;">Status</th>
            </tr>
        </thead>
        <tbody class="text-uppercase">



            @foreach($group_registations as $group_registation)
            @if($group_registation->club_id ==Auth::user()->club_id)
            
                <tr>    
                    <td>{{ $group_registation->organization->name }}</td>
    
                    <td>{{ $group_registation->league->name }}</td>
    
    
    
                    <td>{{$group_registation->ageGroupGender->ageGroupEvent->Event->mainEvent->name}}</td>
    
                    
                    <td>
                        {{$group_registation->ageGroupGender->ageGroupEvent->ageGroup->name}}
    
                    </td>
    
                    
                    
    
                    <td>
                        {{$group_registation->ageGroupGender->gender->name}}
    
                   </td>
    
                    <td>
                    @foreach ($group_registation->teams as $team)
                        {{ $team->name }} <br>
                        @endforeach
                    </td>
                    @if($group_registation->ageGroupGender->status==2)
                                    <td>
                                        <span class="label label-primary">Not Started</span>
    
                                    </td>
                                    @elseif($group_registation->ageGroupGender->status==0)
                                    <td> <span class="label label-warning">On Going </span>
                                    </td>
                                    @elseif($group_registation->ageGroupGender->status==1)
                                     <td> <span class="label label-success">Finished</span>
                                    </td>
                                    @endif
                </tr>
                @endif
            @endforeach
                    
                

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>
    <script type="text/php">
        if (isset($pdf)) {
            $x = 270;
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
    
</div>


 


<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>