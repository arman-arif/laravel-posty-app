<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a href="{{ route('blog.index') }}" class="navbar-brand">Laravel Guide</a>
        </div>
        <div>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ route('admin.index') }}">Posts</a></li>
                <li><a href="{{ route('other.about') }}">About</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Username <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>