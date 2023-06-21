<style  type="text/css">
    
    table {
        border:solid #B2BABB;
        opacity:50;
        border-width: thin;
    }

    table td,
    table th {
        border:solid #B2BABB;
        opacity:50;
        border-width: thin;
        text-transform: capitalize;
        padding-bottom: 5px;
    }
    tr:nth-child(even) {
  background-color: #F4F6F7;
}
    table tr,
    table td {
        padding: 5px;
        text-align: left;
    }
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 70%;
}
    .table .thead-Dark th {
 
        color: white;
        background-color: #3A3B3C;
        text-transform: uppercase;
        line-height:2;
        text-align: center;

 /* border-color: #792700; */

}
h2{
    text-align: center;
}
</style>
<table class="table table-striped table-bordered"  width="100%" style="width: 100%;
border-collapse: collapse;">
        <thead class="thead-Dark">
            <tr  style="text-align: center;padding: 3px;
            width: 1%;
            text-align: left;">
                <th style="width:18%;" >First Name</th>
                <th style="width:18%;" >Last Name</th>

                <th style="width:20%;
                ">E-mail</th>
                <th style="width:10%;
                "class="phone" >Phone</th>
                <th style="width:4%;
                "class="age">Age</th>  
                                <th style="width:18%;" >Club</th>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1)
                                <th>SIL Member</th>
                                @endif
                                @endif
                                @endif
                                <td>Status</td>
    
            </tr>
        </thead>
        <tbody class="text-uppercase">
            @foreach($users as $key=>$user)
            <tr>
                <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->tel_number}}</td>
                    <td><?php $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');$today = Carbon\Carbon::now()->format('Y');$age = $today - $mine; ?>{{ $age }}</td>
                    <td>{{$user->club->club_name}}</td>
                    @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1)
                    <td>{{$user->member_or_not==1 ? 'Yes' : 'No'}}</td>
                    @endif
                    @endif
                    @endif
                    <td>{{$user->is_approved==1 ? 'Approved' : 'Not Approved'}}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
    
