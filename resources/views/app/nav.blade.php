<nav class="navbar navbar-expand-md navbar-dark bg-nav mb-4 rounded-2 px-sm-6 px-3 py-0 py-3 mt-2 text-center" aria-label="navbar">
    <div class="col-3 col-sm-1-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <x-logo/>
        </a>
    </div>
    <form class="d-flex ms-auto me-4 order-md-2 col-4 px-0 px-sm-3" role="search" action="{{route('filter')}}">
        <input class="form-control me-2 bg-dark text-white bg-icon" type="search" name="q"
               value="{{request()->get('q')}}" placeholder="Gözle" aria-label="Search">
    </form>
    <button class="navbar-toggler col-2 col-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbars"
            aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse order-1 col-3 text-primary" id="navbars">
        @auth

            <li class="nav-item ms-5 fw-semibold col text-white">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                    <i class="bi-box-arrow-right"></i> {{ auth()->user()->name }}
                </a>
            </li>
            <form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
                @csrf
            </form>

        @else
            <div class="col-9 row align-items-center mx-auto pt-4 pt-sm-0">
                <ul class="navbar-nav ms-3 mb-2 mb-lg-0  row justify-content-center px-4 px-md-5">
                    <li class="nav-item col">
                        <a class="nav-link fw-semibold h4" href="{{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link fw-semibold h4" href="{{route('products', 0)}}">Products</a>
                    </li>
                    <li class="nav-item col">
                        <a class="nav-link fw-semibold h4" href="{{route('about')}}">About us</a>
                    </li>
                    @auth
                        <li class="nav-item ms-5 fw-semibold col">
                            <a class="nav-link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                                <i class="bi-box-arrow-right"></i> {{ auth()->user()->name }}
                            </a>
                        </li>
                        <form id="logoutForm" action="{{ route('logout') }}" method="post" class="d-none">
                            @csrf
                        </form>
                    {{--@else--}}
                        {{--<li class="nav-item col">--}}
                            {{--<a class="nav-link" href="{{ route('login') }}">--}}
                                {{--<i class="bi-box-arrow-in-right"></i> Admin--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    @endauth
                </ul>
            </div>
        @endauth
    </div>
</nav>
