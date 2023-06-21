
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="material-icons notify" style="color:white;">notifications</i>
        <span class="label label-danger" style="padding-top:3px;">{{auth()->user()->unreadNotifications->count()}}</span>
    </a>
    <ul class=" notifications dropdown-menu">
        <li class="dropdown-title">You have {{auth()->user()->unreadNotifications->count()}} notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">

            @foreach(auth()->user()->unreadNotifications as $notification)
            @if($notification->type=='App\Notifications\Adminmessage')
        
                <li style="background-color:lightgray">
                    <i class="material-icons warning notifi_icons">alarm</i>
                    <a href="{{ URL::to('/view_notification',$notification->id) }}" style="width:40%;overflow-x: hidden;">{{$notification->data['content_title']}}..</a>
                    
                    <small class="pull-right">
                       <a class="btn-primary btn-sm" type="submit" href="{{ URL::to('/view_notification',$notification->id) }}" >View</a>
                           
            
                    </small>
                </li>
                @elseif($notification->type=='App\Notifications\CancelledEventNotification')
                <li style="background-color:lightgray">
                <i class="material-icons warning notifi_icons">alarm</i>
                <a href="{{ URL::to('/view_notification/event',$notification->id) }}">Event Cancelled</a>
                <small class="pull-right">
                    <span class="material-icons paddingright_10"></span>
                        <a class="btn-primary btn-sm" type="submit" href="{{ URL::to('/view_notification/event',$notification->id) }}"  >View</a>
        
                </small>
                </li>
                @elseif($notification->type=='App\Notifications\PostponedEventNotification')
                <li style="background-color:lightgray">
                <i class="material-icons warning notifi_icons">alarm</i>
                <a href="{{ URL::to('/view_notification/event',$notification->id) }}">Heats Event Postponed</a>
                <small class="pull-right">
                    <span class="material-icons paddingright_10"></span>
                        <a class="btn-primary btn-sm" type="submit" href="{{ URL::to('/view_notification/event',$notification->id) }}" >View</a>
        
                </small>
                </li>
                @endif
                @endforeach
                @foreach(auth()->user()->readNotifications as $notification)
                @if($notification->type=='App\Notifications\Adminmessage')
                <li style="background-color:white">
                    <i class="material-icons warning notifi_icons">alarm</i>
                    <a href="{{ URL::to('/view_notification',$notification->id) }}" style="width:40%;overflow-x: hidden;">{{$notification->data['content_title']}}</a>
                    <small class="pull-right">
                        <span class="material-icons paddingright_10"></span>
                            <a class="btn-primary btn-sm" type="submit" href="{{ URL::to('/view_notification',$notification->id) }}" >View</a>
            
                    </small>

                    
                </li>
                @elseif($notification->type=='App\Notifications\CancelledEventNotification')
                <li style="background-color:white">
                    <i class="material-icons warning notifi_icons">alarm</i>
                <a href="{{ URL::to('/view_notification/event',$notification->id) }}">Event Cancelled</a>
                <small class="pull-right">
                    <span class="material-icons paddingright_10"></span>
                        <a class="btn-primary btn-sm" type="submit" href="{{ URL::to('/view_notification/event',$notification->id) }}" >View</a>
        
                </small>
                </li>
                @elseif($notification->type=='App\Notifications\PostponedEventNotification')
                <li style="background-color:white">
                <i class="material-icons warning notifi_icons">alarm</i>
                <a href="{{ URL::to('/view_notification/event',$notification->id) }}">Heats Event Postponed</a>
                <small class="pull-right">
                    <span class="material-icons paddingright_10"></span>
                        <a class="btn-primary btn-sm" type="submit" href="{{ URL::to('/view_notification/event',$notification->id) }}" >View</a>
        
                </small>
                </li>
                @endif
                @endforeach
            </ul>
        </li>
    </ul>
</li>
