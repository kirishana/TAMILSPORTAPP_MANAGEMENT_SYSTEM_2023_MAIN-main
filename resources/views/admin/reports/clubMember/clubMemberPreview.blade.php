<style type="text/css">
    .table {
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
    h4{
        text-align: center;
        text-transform: capitalize;
    }
</style>
<div class="row" id="c-member">
@include('reports.adminPrintHeader')
<h4>club members</h4>

    <br>
    <table class="table table-striped table-bordered text-uppercase club-m" id="table10">
        <thead>
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
                <td>{{$user->dob}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->tel_number}}</td>
                <td>{{$user->userId}}</td>
            
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>