
@if($location=='paper')
    @foreach($alerts as $alert)
        @if($alert->alert_id==$alertId)
            <option value="{{$alert->alert_id}}" selected>{{$alert->alert_name}}</option>
        @else
            <option value="{{$alert->alert_id}}">{{$alert->alert_name}}</option>
        @endif
    @endforeach

    @elseif($location=='modal')
    @foreach($alerts as $alert)
        <tr>
            <th scope="row">{{$alert->alert_name}}</th>
            <td>
                <label class="colorinput">
                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="dark" class="colorinput-input" @if($alert->alert_color=='dark') checked @endif/>
                    <span class="colorinput-color bg-dark"></span>
                </label>
                <label class="colorinput">
                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="danger" class="colorinput-input" @if($alert->alert_color=='danger') checked @endif/>
                    <span class="colorinput-color bg-danger"></span>
                </label>
                <label class="colorinput">
                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="warning" class="colorinput-input" @if($alert->alert_color=='warning') checked @endif/>
                    <span class="colorinput-color bg-warning"></span>
                </label>
                <label class="colorinput">
                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="info" class="colorinput-input" @if($alert->alert_color=='info') checked @endif/>
                    <span class="colorinput-color bg-info"></span>
                </label>
                <label class="colorinput">
                    <input name="alert_color{{$alert->alert_id}}" onclick="alertOne(this)" id="{{$alert->alert_id}}" type="checkbox" value="success" class="colorinput-input" @if($alert->alert_color=='success') checked @endif/>
                    <span class="colorinput-color bg-success"></span>
                </label>
            </td>
            <td  class="material-switch">
                @if($alert->alert_status==1)
                    <input data-id="{{$alert->alert_id}}" id="alertsuccess{{$alert->alert_id}}" name="alertstatuscomplete" class="userStatus alertstatus" type="checkbox" checked/>
                    <label for="alertsuccess{{$alert->alert_id}}" class="label-success"></label>
                @else
                    <input data-id="{{$alert->alert_id}}" id="alertsuccess{{$alert->alert_id}}" name="alertstatusincomplete" class="userStatus alertstatus" type="checkbox"/>
                    <label for="alertsuccess{{$alert->alert_id}}" class="label-success"></label>
                @endif
            </td>

            <td>
                <a class="btn btn-sm btn-info edit" href="{{route('alert-edit',$alert->alert_id)}}"><i class="fa fa-edit"></i> Edit</a>
                <a class="btn btn-sm btn-danger remove" href="{{route('alert-remove',$alert->alert_id)}}"><i class="fa fa-trash"></i> Delete</a>
            </td>
        </tr>
    @endforeach
@endif