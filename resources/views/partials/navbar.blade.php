<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
    <a class="navbar-brand" href="/">B26</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === '/' ? 'active' : "" }}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === 'about' ? 'active' : "" }} " href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === 'blog' ? 'active' : "" }} " href="/blog">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === 'categories' ? 'active' : "" }} " href="/categories">Categories</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            @auth 
                {{-- yang akan tampil jika user sudah login  --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        wellcome back, {{ auth()->user()->name }} 
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard">  <i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <form action="/logout" method="post">
                            @csrf 
                            <button type="submit" class="dropdown-item">
                                <i class="bi bi-box-arrow-in-left"></i> Log out
                            </button>
                        </form>
                    </ul>
                </li>
            @else 
                {{-- yang akan tampil jika user belum login  --}}
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ Request::path() === 'login' ? 'active' : "" }} ">
                        <i class="bi bi-box-arrow-right" style="width: 500px"></i> Login 
                    </a>
                </li>
            @endauth
        </ul>
    </div>
    </div>
</nav>

