           @if (Auth::guard('web')->user()->can('edit-cancellation'))     

<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

<td><input type="checkbox" class="deleteAll" style="width: 18px;
margin-left:15px;" title="Select All"> &nbsp;
<button style="padding: 2px 4px" class=" btn btn-danger delete" title="Cancel"><i class="material-icons" style="margin-bottom:5px">delete</i></button></td>
</tr>
@endif
@foreach ($genders as $gender)
    @if ($gender->ageGroupEvent->Event->organization_id == Auth::user()->organization_id || $gender->ageGroupEvent->Event->organization_id == $id)
    @if($gender->ageGroupEvent->Event->season->status==1)

    @if($gender->status==2)

        <?php 
    if($gender->ageGroupEvent->Event->league->to_date >=$today)
    {   
    ?>
    
        <tr class="users2" >
            <td style="text-align: left;">
                {{ $gender->ageGroupEvent->Event->mainEvent->name }}
            </td>
            <td style="text-align: left;">
                {{ $gender->ageGroupEvent->Event->league->name }}
            </td>

         
            <td style="text-align: left;">
                {{ $gender->gender->name }}
            </td>

            <td style="text-align: left;">
                {{ $gender->ageGroupEvent->ageGroup->name }}
            </td>

            <td style="text-align: left;">
                @php echo Carbon\Carbon::parse($gender->ageGroupEvent->Event->date)->format('d.m.Y'); @endphp
            </td>
            @if ($gender->status == 2)
                <td style="text-align: left;">
                    <h5><span class="label label-primary">Not Started</span></h5>

                </td>
            @elseif($gender->status == 0)
                <td style="text-align: left;"> <span class="label label-warning">On Going </span>
                </td>
            @elseif($gender->status == 3)
                <td style="text-align: left;"> <span class="label label-warning">Finalizing </span>
                </td>
            @elseif($gender->status == 10)
                <td style="text-align: left;"> <span class="label label-danger">Cancelled </span>
                </td>
            @else
                <td style="text-align: left;"> <span class="label label-success">Finished</span>
                </td>
            @endif
         
           
            @include('testing')
         
           @if (Auth::guard('web')->user()->can('edit-cancellation'))     

            <td >
                @if ($gender->status == 2)
                    <div>
                        <div class="col-md-6">
                            <label style="text-align: center;">
                                <input type="checkbox" {{ $gender->status == 10 ? 'checked' : '' }}
                                    data-id="{{ $gender->id }}" class="toggle_btn" name="deleteIds[]">
                            </label>
                        </div>

                    </div>
                @endif
            </td>
@endif
          

        </tr>
        <?php 
}
?>
@endif
@endif
    @endif
@endforeach
<script>
$('.deleteAll').on('change', function() {
        var ids=$("input[name='deleteIds[]']").prop('checked', $(this).prop("checked"));
    });
    </script>

