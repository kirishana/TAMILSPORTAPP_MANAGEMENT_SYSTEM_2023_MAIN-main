
<style type="text/css">
    table {
        width: 100%;
        border-collapse: collapse;
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
</style>
<link href="{{ asset('assets/css/tableHeader.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/tableHead.css') }}" rel="stylesheet" type="text/css" />
<table class="table table-striped text-uppercase table-bordered users"  width="100%">
<thead class="thead-Dark">
            <tr  style="text-align: center">

                <th class="email">FirstName</th>
                <th class="email">LastName</th>
                <th >Email</th>
                <th class="phone">Mobile</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Organization</th>
                <th>Club</th>
                @if(auth()->user()->organization->orgsetting!=null)
                @if(auth()->user()->organization->orgsetting->active==1)
                <th>SIL Member</th>
                @endif
                @endif
                <th>Password</th>
               

            </tr>
           
        </thead>
    
    </table>
 