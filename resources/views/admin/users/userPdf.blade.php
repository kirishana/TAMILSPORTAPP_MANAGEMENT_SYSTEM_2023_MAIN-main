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
td{
    border: 1px solid #ddd;
    padding:5px;
}
</style>
<div class="row" id="usr">
<div class="container" >
@include('reports.header')
    </div> 
    <h2>USERS</h2>
    <table class="table table-striped  table-bordered users" id="export">
        <thead class="thead">
            <tr  style="text-align: center">
                <th>Name</th>
                <th>E-mail</th>
                <th>DOB</th>
                <th>Role</th>
                <th>Gender</th>
                <th>Mobile</th>
                <th>User Id</th>

            </tr>
        </thead>
        <tbody >

            @foreach($users as $user)
            <tr class="tr">
            <td style="width: 20%;">{{$user->first_name}} {{$user->last_name}}</td>
                <td   style="width: 25%;">{{$user->email}}</td>
                <td style="width: 10%;">{{$user->dob}}</td>
                <td style="width: 14%;">{{$user->roles->pluck('name')->implode(' ')}}</td>
                <td style="width: 7%;">{{$user->gender}}</td>
                <td style="width: 10%;">{{$user->tel_number}}</td>
                <td style="width: 14%;">{{$user->userId}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
        @if($setting){!! html_entity_decode($setting?$setting->footer:'') !!}@endif


        </div>
    </section>
</div>
<script type="text/php">
    if (isset($pdf)) {
        $x = 360;
        $y = 570;
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