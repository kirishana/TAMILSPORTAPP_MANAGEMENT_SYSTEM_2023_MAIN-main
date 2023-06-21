<table class="table table-striped table-bordered" id="filter1">
                                            <thead class="thead-Dark">
                                                <th>Event</th>
                                                <th>Gender</th>
                                                <th>AgeGroup</th>
                                                <th>Team</th>
                                                <th>Event &nbsp; Unit Price</th>
                                                <th>Event &nbsp; Discount</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                            </thead>
        
            @if($GroupRegistrations!=null)         
@foreach($GroupRegistrations as $GroupRegistration)

<tr>

    <td>
    {{$GroupRegistration->ageGroupGender->ageGroupEvent->Event->mainEvent->name}}
    </td>
    <td>
    {{$GroupRegistration->ageGroupGender->gender->name}}
    </td>
    
    <td>
    {{$GroupRegistration->ageGroupGender->ageGroupEvent->ageGroup->name}}
    </td>
    <td>
        @foreach($GroupRegistration->teams as $team)
                   <ul>
                    <li>{{$team->name}}</li>
                   </ul>
        @endforeach
    
    </td>
    <td>
    {{$iso}}&nbsp;{{$GroupRegistration->ageGroupGender->ageGroupEvent->Event->mainEvent->price}}
    </td>
    <td>
    {{$GroupRegistration->ageGroupGender->ageGroupEvent->Event->discount}}%
    </td>
    <td>
    {{$iso}}&nbsp;{{$GroupRegistration->totalfee}}
    </td>
    <td>
   
                   @if($GroupRegistration->status== 1)
                                
                                <span class="label success">Paid</span><br><br><br>
                             
                             @elseif($GroupRegistration->status== 0)
                             <span class="label warning text-dark">pending</span><br><br>
                             @elseif($GroupRegistration->status== 2)
                             <span class="label primary">Approved</span><br><br>
                             @elseif($GroupRegistration->status== 3)
                             <span class="label danger">Rejected</span><br><br>
                             
                               @endif                          

    </td>
    
   
</tr>
@endforeach   
</table>
@endif
@if($grandtotal>0)         

<table class="table table-striped table-bordered">
                <tr>
                    <th style="text-align:left">Total Amount</th>
                    <td>
                    {{$iso}}&nbsp;{{$grandtotal}}
                    </td>
                </tr>
                <tr>
                    <th style="text-align:left">Total Paid Amount</th>
                    <td>{{$iso}}&nbsp;{{$paid1}}</td>

                </tr>
                <tr>
                    <th style="text-align:left">Total Payable Amount</td>
                    <td>{{$iso}}&nbsp;{{$payableG}}</td>
                </tr>
            </table>                     
@endif