
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
    h4{
        text-align: center;
    }
    .td{
        width: auto;
    }
</style>
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />

<div class="row" id="printUsers">
    @include('reports.adminPrintHeader')
<center><h4>USERS</h4> </center>     
<table class="table table-striped table-bordered users"  style="width: 100%;">
        <thead>
            <tr  style="text-align: center">

                <th>Name</th>
                <th >E-mail</th>
                <th>Mobile</th>
                <th>Age</th>
                <th>Role</th>
                <th>Country</th>
                @if($org)
                @if($org->orgsetting)
                @if($org->orgsetting->active==1)
                <th>Sil Member</th>                
                @endif
                @endif
                @endif


            </tr>
        </thead>
        <tbody>
            @foreach($users2 as $user)
            <tr>
                <td style="width: 20%">{{$user->first_name}} {{$user->last_name}}</td>
                <td   style="text-transform:none">{{$user->email}}</td>
                <td style="width: 7%">{{$user->tel_number}}</td>
                <td><?php
                
                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                    $age = $today - $mine; ?>{{ $age }}</td>
                 <td style="width:8%;"> 

               {{$user->roles->pluck('name')[0]}}
               
                </td> 
                <td style="width: 10%">{{$user->country ? $user->country->name : ''}}</td>
                 @if($org)
                @if($org->orgsetting)
                @if($org->orgsetting->active==1)
                <td style="width:5%;text-transform:capitalized;">{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                @endif
                @endif
                @endif
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