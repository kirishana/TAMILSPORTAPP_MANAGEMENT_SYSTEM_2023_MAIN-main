
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

                <th class="email">Name</th>
                <th >E-mail</th>
                <th class="phone">Mobile</th>
                <th class="email">Role</th>
                <th>DOB</th>
                <th class="phone">Age</th>
                @if($org)
                @if($org->orgsetting)
                @if($org->orgsetting->active==1)
                <th>Sil Member</th>                
                @endif
                @endif
                @endif
               

            </tr>
        </thead>
        <tbody class="text-uppercase">

            @foreach($users as $user)
            <tr>
                <td>{{$user->first_name}} {{$user->last_name}}</td>
                <td style="text-transform: none;">{{$user->email}}</td>
                <td>{{$user->tel_number}}</td>
                <td>{{$user->roles->pluck('name')->implode(' ')}}</td>
                <td>{{ $user->dob }}</td>
                <td><?php 
                $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
                                                                    $today = Carbon\Carbon::now()->format('Y');
                                                                    $age = $today - $mine;
                ?>{{ $age }}</td>
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
 