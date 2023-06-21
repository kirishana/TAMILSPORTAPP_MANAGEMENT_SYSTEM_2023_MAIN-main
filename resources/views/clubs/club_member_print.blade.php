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
   
    .td{
        width: auto;
    }
    h3{
    text-align: center;
    text-transform: uppercase;
}
</style>

<div id="printUsers">
@include('reports.adminPrintHeader')

<h3>Club members</h3>
<table class="table table-bordered table-striped users" width="100%">
                    <thead class="thead-Dark">
                        <tr>
                            <th style="text-align: center">First Name</th>
                            <th style="text-align: center">Last Name</th>
                            <th style="text-align: center;">gender</th>
                            <th style="text-align: center;">Age</th>
                            <th style="text-align: center;">E-mail</th>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
                            <th style="text-align: center">SIL Member</th>
                            @endif
                            @endif
                            @endif
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Registered Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>

@foreach($users as $user)
<tr>
    <td>{{$user->first_name}}</td>
    <td>{{$user->last_name}}</td>
    <td>{{$user->gender}}</td>
    <td>
        <?php 
       $mine = Carbon\Carbon::createFromFormat('Y-m-d', $user->dob)->format('Y');
       $today = Carbon\Carbon::now()->format('Y');
       $age=$today-$mine;

       ?>
       {{$age}}
    </td>
    <td style="text-transform: none;">{{$user->email}}</td>
                            @if(Auth::user()->organization)
                            @if(Auth::user()->organization->orgsetting)
                            @if(Auth::user()->organization->orgsetting->active==1) 
                            <th>{{$user->member_or_not==1 ? 'Yes' : 'No'}}</th>
                            @endif
                            @endif
                            @endif
    @if($user->is_approved==1)
    <td>Approved</td>
    @else
    <td>pending</td>

@endif

<td>
  <?php 
                    $u=preg_split('/ /',$user->created_at);
     ?>
     {{$u[0]}}
   </td>
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