<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
            <a href="#blogs" class="nav-link">Blogs</a>
            @auth
                <img width="40" height="40" class="rounded-circle"
                    src="{{ asset('images/' . auth()->user()->avatar) }}" />
                <a href="/" class="nav-link">{{ auth()->user()->name }}</a>
                @can('admin')
                    <a href="{{ route('blogs.index') }}" class="nav-link">Dashboard</a>
                @endcan
                <form action="/logout" method="post">
                    @csrf
                    <button class="nav-link btn btn-link" type="submit">Logout</button>
                </form>
            @else
                <a href="/register" class="nav-link">Register</a>
                <a href="/login" class="nav-link">Login</a>
            @endauth
            <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
    </div>
</nav>
