<footer>
    <link href="css/app.css" rel="stylesheet" type="text/css">
    @if (Auth::check())
    <div class="column" style="text-align:center;">
        <ul class="list-inline">
            <li>
                <h1><a href="{{ url('/events') }}"><span class="glyphicon glyphicon-home"></h1> &nbsp;</span></a>
            </li>
            <li>
                 <h1>&nbsp;&nbsp;&nbsp;<a href="{{ url('/events/create') }}"><span class="glyphicon glyphicon-edit"></h1>&nbsp;</span></a>
            </li>
            <li>
                <h1>&nbsp;&nbsp;&nbsp;<a href="{{ url('/events.profile') }}"><span class="glyphicon glyphicon-user"></h1>&nbsp;</span></a>
            </li>
             <li>
                <h1>&nbsp;&nbsp;&nbsp;<a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-out"></h1>&nbsp;</span></a>
            </li>
        </ul>
    </div>
    @else
     <div class="column" style="text-align:center;">
        <ul class="list-inline">
            {!! link_to_route('signup.get', 'Signup', null, ['class' => 'btn btn-info']) !!}
            &nbsp;&nbsp;&nbsp;{!! link_to_route('login', 'Login', null, ['class' => 'btn btn-warning']) !!}
        </ul>
     </div>
    @endif
    <div class="text-center text-muted">© 2018 SASORICH.</div>
</footer>