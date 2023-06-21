

<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }

    table td,
    table th {
        border: 1px solid black;
    }

    table tr,
    table td {
        padding: 3px;
        width: 1%;
        text-align: left;

    }
    .thead{
        color: white;
        background-color: #3A3B3C;
        text-transform: uppercase;


    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
h2 {
    text-align: center;
    text-transform: uppercase;
}
</style>


<div id="clubprint">
@include('reports.adminPrintHeader')


   <h2>Clubs</h2>
<table class="table table-striped table-bordered" id="clubprint" style="width: 100%">
<thead class="thead">
            <tr  style="text-align: center">

                <th>Club Name</th>
                <th>Club Reg Number</th>
                <th >club email</th>
                <th>mobile</th>
                <th> Members</th>
                <th>Est.Date</th>
               

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($clubs as $club)
            <tr>
                <td>{{$club->club_name}}</td>
                <td>{{$club->club_registation_num}}</td>
                <td style="text-transform: none;" >
                    {{$club->club_email}}<br>
                
            </td>
                <td>
                {{$club->mobile}}
                
            </td>
            <td>{{$club->users->count()}}</td>
                <td>
                    <?php 

                    $estdate=preg_split('/ /',$club->created_at);
                    
                    ?>{{$estdate[0]}}</td>               
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
<section class="content-footer">
        <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>

