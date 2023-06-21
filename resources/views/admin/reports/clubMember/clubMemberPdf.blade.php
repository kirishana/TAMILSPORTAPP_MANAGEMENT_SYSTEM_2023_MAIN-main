<style type="text/css">
    .table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;

    }

    table td,
    table th {
        padding-bottom: 5px;
        line-height: 1.5;
        border: 1px solid #ddd;

    }
    tr:nth-child(even) {
  background-color: #F4F6F6;
}
    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .table .thead-Dark th {
 
 color: #fffffc;
 /* opacity: 0.8; */
 background-color: #3A3B3C;

 /* border-color: #792700; */

}
</style>
<div class="row" id="c-member">
<div class="container">
@include('reports.adminHeader')
    </div>


    <br>
    <h3 style="text-align: center;">CLUB MEMBERS</h3>
    <table class="table table-striped table-bordered text-uppercase club-m" id="export-cm">
        <thead class="thead-Dark">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>User Id</th>
               
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td style="text-transform:none;">{{$user->email}}</td>
                <td  style="width: 10%;">{{$user->dob}}</td>
                <td  style="width: 10%;">{{$user->gender}}</td>
                <td>{{$user->tel_number}}</td>
                <td style="width: 9%;">{{$user->userId}}</td>
            
            </tr>
@endforeach
        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
        @if($general){!! html_entity_decode($general->footer) !!}@endif


        </div>
    </section>
</div>
    <script type="text/php">
    if (isset($pdf)) {
        $x = 380;
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>