<!-- Navigation Start -->
<nav class="navbar navbar-light bg-faded">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Laravel Blog</a>
        <ul class="nav navbar-nav">
            <li class="nav-item {{ Request::is('/') ? "active" : "" }}">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{ Request::is('about') ? "active" : "" }}">
                <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item {{ Request::is('blog') ? "active" : "" }}">
                <a class="nav-link" href="/blog">Blog</a>
            </li>
            <li class="nav-item {{ Request::is('contact') ? "active" : "" }}">
                <a class="nav-link" href="/contact">Contact</a>
            </li>
            @if (Auth::guest())
                <li class="nav-item dropdown float-xs-right"><a href="{{ url('/login') }}" class="nav-link">Login</a></li>
                <li class="nav-item dropdown float-xs-right"><span class="nav-link">&nbsp;|&nbsp;</span></li>
                <li class="nav-item dropdown float-xs-right"><a href="{{ url('/register') }}" class="nav-link">Register</a></li>
            @else
            <li class="nav-item dropdown float-xs-right">
                <a class="userGreeting" href="/admin">Hey, {{ Auth::user()->name }}!</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation"></button>
                <div class="collapse" id="exCollapsingNavbar">
                    <a class="dropdown-item" href="{{ route('posts.index') }}">View Posts</a>
                    <a class="dropdown-item" href="/admin">Dashboard</a>
                    <a href="{{ url('/logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
            @endif
        </ul>
    </div>
</nav>
<!-- Navigation End -->