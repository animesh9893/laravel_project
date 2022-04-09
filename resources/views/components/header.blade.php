<div>
    @if(session('logged')==1)
        <div style="display: flex;flex-direction: row;">
            <a href="/logout" style="padding-right: 10px;">logout</a>
            <a href="/device" style="padding-right: 10px;">Device</a>
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