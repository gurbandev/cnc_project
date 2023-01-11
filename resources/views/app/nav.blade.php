<nav class="navbar navbar-expand-md navbar-dark bg-black" aria-label="navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="bi-cart4"></i> HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars"
                aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav ms-3 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{route('contact')}}">Cantact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="#">About us</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <form class="d-flex me-5" role="search" action="{{route('categories.index')}}">
                    <input class="form-control me-2" type="search" name="search" placeholder="Haryt Barkody giriň" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">Search</button>
                </form>
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                            <i class="bi-box-arrow-right"></i> {{ auth()->user()->name }}
                        </a>
                    </li>
                    <form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
                        @csrf
                    </form>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi-box-arrow-in-right"></i> Admin giris
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>