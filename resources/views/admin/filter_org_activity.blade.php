 @foreach($activityLogs as $activity)
            <tr>
    <td>{{$activity->subject->first_name}}&nbsp;{{$activity->subject->last_name}} </td>
               <td>{{$activity->subject->roles->pluck('name')->implode(' ')}}</td>
               <td>{{$activity->description}}</td>
               <?php $data = json_decode($activity->properties, true);
 ?>
               <td>{{$data['attributes']['ip_address']}}</td>
                <td>{{$activity->causer->first_name}}&nbsp;{{$activity->causer->last_name}} </td>
               <td>{{$activity->created_at->format('Y-m-d H:i:s')}}</td>
            </tr>
            @endforeach
             <tr>
            <td colspan="10">
            <span style="float: left;margin-top:10px;">{{ __('staffs.showing') }} {{ $activityLogs->firstItem() }} to {{ $activityLogs->lastItem() }} of {{ $activityLogs->total() }} {{ __('staffs.entries') }}</span>
    
    <span style="float: right;">{{$activityLogs->links('vendor.pagination')}}</span>
            </td>
        </tr>