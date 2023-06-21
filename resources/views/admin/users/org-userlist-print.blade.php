<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
        text-transform: capitalize;
    }

    tr:nth-child(even) {
        background-color: #F4F6F7;
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

    .table .thead-Dark th {

        color: #fffffc;
        /* opacity: 0.8; */
        /* background-color: ; */

        /* border-color: #792700; */

    }
</style>
<div class="row" id="orgPrint1">
<div class="container">
@include('reports.PrintHeader')
    </div> 
    <br>
    <table class="table table-striped table-bordered" id="printstaff" width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead-Dark">
            <tr style="text-align: center;padding: 3px;
            width: 1%;
            text-align: left;">
                <th style="border: 1px solid black;">No.</th>

                <th style="border: 1px solid black;">First Name</th>
                <th style="border: 1px solid black;">Last Name</th>
                <th style="border: 1px solid black;
                ">E-mail</th>
                <th style="border: 1px solid black;
                " class="phone">Mobile</th>
                <th style="border: 1px solid black;
                " class="age">Age</th>
                <th style="border: 1px solid black;
                " class="role">Role</th>
                <th style="border: 1px solid black;
                " class="country">Club</th>
                 @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
                <th style="border: 1px solid black;">Sil Member</th>
                @endif
                @endif
                @endif


            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($users as $key=>$user)
            <tr style="padding: 3px;
            width: 1%;
            text-align: left;">
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;">{{++$key}}</td>
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;">{{$user->first_name}}</td>
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;">{{$user->last_name}}</td>
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;text-transform: lowercase;">{{$user->email}}</td>
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;">{{$user->tel_number}}</td>
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;"><?php 
                    $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                    $today = Carbon\Carbon::now()->format('Y');
                    $age = $today - $mine;
?>{{ $age }}</td>
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;">{{$user->roles->pluck('name')->implode(' ')}}</td>
               
                <td style="padding: 3px;
                width: 1%;
                text-align: left;border: 1px solid black;">{{$user->club ? $user->club->club_name : ''}}</td>
                @if(Auth::user()->organization)
                @if(Auth::user()->organization->orgsetting)
                @if(Auth::user()->organization->orgsetting->active==1)
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