<style type="text/css">
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
</style>
<div class="row" id="ex">
@include('reports.adminPrintHeader')
<br>
<br>
    <table class="table table-striped table-bordered organizations" id="export">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>City</th>
                <th>Country</th>
                <th>Season</th>
            </tr>
        </thead>
        <tbody>

            @foreach($organizations as $org)
            <tr>
                <td>{{ $org->name }}</td>
                <td style="text-transform: none;">{{ $org->email }}</td>
                <td>{{$org->tpnumber}}</td>
                <td>{{ $org->city }}</td>
                <td>{{ $org->country->name }}</td>
                <td>{{ $org->season->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            {!! html_entity_decode($general?$general->footer:'') !!}


        </div>
    </section>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>