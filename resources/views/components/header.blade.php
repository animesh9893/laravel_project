<div>
    @if(session('logged'))
        <div style="display: flex;flex-direction: row;">
            <a href="/dashboard" style="padding-right: 10px;">dashboard</a>
            <a href="/logout" style="padding-right: 10px;">logout</a>
            <a href="/device" style="padding-right: 10px;">Device</a>
            <a href="/exercise" style="padding-right: 10px;">Exercise</a>
            <div>Logged</div>
        </div>
        <hr>
    @else
        <div>
            <a href="/login">Login</a>
            <a href="/signup">SignUp</a>
        </div>
        <hr>
    @endif

</div>