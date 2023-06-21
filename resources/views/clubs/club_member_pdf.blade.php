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
        border-width: thin;    }

    table tr,
    table td {
        padding: 3px;
        width: 1%;
        text-align: left;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    h2{
        text-align: center;
    }
    .td{
        width: auto;
    }
    .thead{
        text-align: center;
        text-transform: uppercase;
        color: #fffffc;
        background-color: #3A3B3C;
        border: white;

    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;

 /* border-color: #792700; */

}
h3{
    text-align: center;
    text-transform: uppercase;
}
</style>
@include('reports.adminHeader')

<h3>Club members</h3>
<table class="table table-bordered text-uppercase table-striped" width="100%">
                    <thead class="thead">
                        <tr>
                            <th style="text-align: center">first Name</th>
                            <th style="text-align: center">last Name</th>
                            <th style="text-align: center;width: 15px;">Age </th>
                            <th style="text-align: center;width: 15px;">gender </th>
                            <th style="text-align: center;">E-mail</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Registered Date</th>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
                            <th style="text-align: center">Sil Member</th>
                            @endif
                            @endif
                            @endif
                        </tr>
                    </thead>
                    
                    <tbody>

@foreach($users as $user)
<tr>
    <td style="width:15%">{{$user->first_name}} </td>
    <td style="width:15%"> {{$user->last_name}}</td>
    <td style="width: 8%;">
        <?php 
       $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
       $today = Carbon\Carbon::now()->format('Y');
       $age = $today - $mine; ?>{{ $age }}</td>
    </td>
    <td style="text-transform: none;width:10%;">{{$user->gender}}</td>
    <td style="text-transform: none;width:30%;">{{$user->email}}</td>
    @if($user->status==0)
    <td style="width:10%;">Approved</td>
    @else
    <td style="width:10%;">pending</td>

@endif
<td>
  <?php 
                    $u=preg_split('/ /',$user->created_at);
     ?>
     {{$u[0]}}
   </td>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
   <td style="width:10%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
@endif
@endif
@endif
</tr>

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
        $x = 370;
        $y = 560;
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
