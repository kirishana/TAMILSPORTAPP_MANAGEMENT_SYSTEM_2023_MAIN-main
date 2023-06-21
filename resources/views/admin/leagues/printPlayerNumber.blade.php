<style  type="text/css">
    
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    table td,
    table th {
        border: 1px solid black;
        text-align: center;
    }

    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
}
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;

 /* border-color: #792700; */

}
h2{
    text-align: center;
    text-transform: uppercase;
}
</style>
<div class="row" id="printPlayerNumber">
<div class="container">
@include('reports.PrintHeader')
    </div>
    <?php $value = Session::get('dataId'); ?>

<h2>Participants</h2>
<table class="table table-striped table-bordered" id="printPlayerNumber" width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead-Dark">
            <tr  style="text-align: center;padding: 3px;
            width: 1%;
            text-align: left;">

               
                <th>Participant Number</th>
              
              <th>Participant Name</th>
                <th>{{$value?$value:'Organization/Club'}}</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($registrations as $registration)
                        @if($registration->events->count()>0)
                        @if($registration->is_approved==1)

                     <tr>
                <td style="width:20%;">{{ $registration->user->userId }}</td>
                <td>{{$registration->user->first_name}} {{$registration->user->last_name}}</td>
               
                @if($registration->user->club && $registration->user->organization)
            <td  style="text-transform: capitalize;width:45%">{{$registration->user->club->club_name}}</td>
            @elseif($registration->user->organization)
            <td  style="text-transform: capitalize;width:45%">{{$registration->user->organization->name}}</td>
             @elseif($registration->user->club)
            <td  style="text-transform: capitalize;width:45%">{{$registration->user->club->club_name}}</td>
            @else
            
                            <td  style="text-transform: capitalize;width:45%">{{'Independent Player'}}</td>
                            @endif          
                            @endif               
                
            </tr>
            @endif
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($setting?$setting->footer:'') !!}

        </div>
    </section>
  
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>