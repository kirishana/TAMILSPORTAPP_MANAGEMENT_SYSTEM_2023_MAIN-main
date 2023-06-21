
        @foreach($genders as $gender)
        @if($gender->ageGroupEvent->Event->organization_id==Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id==$id)

<tr>
<td>{{$gender->ageGroupEvent->Event->league->name}}
    <td>
        {{ $gender->ageGroupEvent->Event->mainEvent->name }}
    </td>
    <td>
        {{ $gender->gender->name }}
    </td>

    <td>
        {{ $gender->ageGroupEvent->ageGroup->name }}
    </td>
    @if($gender->status==2)
    <td>
        <h5><span class="label label-primary">Not Started</span></h5>
    </td>
    @elseif($gender->status==0)
    <td> <span class="label label-warning">On Going </span>
    </td>
    @elseif($gender->status==3)
    <td> <span class="label label-warning">Finalizing </span>
    </td>
    @else
    <td> <span class="label label-success">Finished</span>
    </td>
    @endif
    <td>{{$gender->starter?$gender->starter->first_name:''}}</td>

  <td>{{$gender->judge?$gender->judge->first_name:''}}</td>
  <td>
    {{ $gender->ageGroupEvent->Event->date }}
</td>
<td>
    {{ $gender->time }}
</td>
</tr>
        @endif
        @endforeach
