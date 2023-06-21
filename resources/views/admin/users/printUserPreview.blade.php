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
</style>
<div class="row" id="usr">
<div class="container">
@include('reports.PrintHeader')

    </div>
    <br>
    <br>
    <br>
    <table class="table table-striped table-bordered users" id="export">
        <thead class="thead-Dark">
            <tr class="filters" style="text-align: center">
                <th>Name</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Gender</th>
                <th>Contact Number</th>
                <th>User Id</th>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th style="border: 1px solid black;">Sil Member</th>
                @endif
                @endif
                @endif
            </tr>
        </thead>
        <tbody>

            @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td style="text-transform: none">{{$user->email}}</td>
                <td>{{$user->roles->pluck('name')->implode(' ') }}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->tel_number}}</td>
                <td style="width: 10%;">{{$user->userId}}</td>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <td style="width:10%;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                @endif
                @endif
                @endif
            </tr>
            @endforeach

        </tbody>
    </table>
    <section class="content-footer">
        <div class="col-md-1">
            @if($setting){!! html_entity_decode($setting->footer) !!}@endif


        </div>
    </section>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>