<ul>
    @if(!session()->has("user"))
    <li><a href='{{ url("/login") }}'>Login</a></li>
    @else
    <li><a href='{{ url("/home") }}'>Home</a></li>
    <li><a href='{{ url("/logout") }}'>Logout</a></li>
    @endif
    @if(session()->has("user") && session("user")->roleId == 1)
    <li><a href="{{ url("/admin") }}">Admin</a></li>
    @endif
</ul>
