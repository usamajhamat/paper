
@if($location=='paper')
    @foreach($notifications as $notification)
        @if($notification->notification_id==$notificationId)
            <option value="{{$notification->notification_id}}" selected>{{$notification->notification_name}}</option>
        @else
            <option value="{{$notification->notification_id}}">{{$notification->notification_name}}</option>
        @endif
    @endforeach

    @elseif($location=='modal')
    @foreach($notifications as $notification)
        <tr>
            <th scope="row">{{$notification->notification_name}}</th>
            <td  class="material-switch">
                @if($notification->notification_status==1)
                    <input data-id="{{$notification->notification_id}}" id="notificationsuccess{{$notification->notification_id}}" name="notificationstatuson" class="userStatus notificationstatus" type="checkbox" checked/>
                    <label for="notificationsuccess{{$notification->notification_id}}" class="label-success"></label>
                @else
                    <input data-id="{{$notification->notification_id}}" id="notificationsuccess{{$notification->notification_id}}" name="notificationstatusoff" class="userStatus notificationstatus" type="checkbox"/>
                    <label for="notificationsuccess{{$notification->notification_id}}" class="label-success"></label>
                @endif
            </td>

            <td>
                <a class="btn btn-sm btn-info edit" href="{{route('notification-edit',$notification->notification_id)}}"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-sm btn-danger remove" href="{{route('notification-remove',$notification->notification_id)}}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    @endforeach
@endif