<style>
    @font-face {
        font-family: 'NooriNastaleeq';
        src: url('{{asset("public/assets/urdufonts/JameelNooriNastaleeqRegular.ttf")}}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }
    #notification-text{
        font-size:20px;
        font-weight:bold;
        color:black;
        margin-right:20px;
        text-transform:capitalize;
        font-family: NooriNastaleeq, sans-serif;
        /*text-shadow: 0 0 5px #FF0000, 0 0 8px #0000FF;*/
    }
</style>

<header>
        <div class="alert alert-icon" role="alert">
            <marquee scrollamount="3" direction="right">
                @foreach($notifications as $notification)
                    <span id="notification-text">
                        {{ $notification->notification_name }}<img src="{{asset('public/assets/img/notify_ico.png')}}" style="margin-left:2%;" width="20px"height="20px" >
                    </span>
                    {{--<img src="{{asset('public/assets/img/notify_ico.png')}}" width="20px"height="20px" >--}}
                @endforeach
            </marquee>
        </div>
</header>