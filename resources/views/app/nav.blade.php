<nav class="navbar navbar-expand-md navbar-dark bg-nav mb-4 rounded-2 px-md-3 px-lg-5 px-3 py-0 py-3 mt-2 text-center" aria-label="navbar">
    <div class="col-3 col-md-1-5">
        <a class="navbar-brand" href="{{ route('home') }}">
            <x-logo/>
        </a>
    </div>
    <form class="d-flex ms-auto me-lg-4 order-md-2 col-6 col-md-4 px-0 px-sm-3" role="search" action="{{route('filter')}}">
        <input class="form-control me-2 me-sm-0 bg-dark text-white bg-icon" type="search" name="q"
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
            <div class="pt-4 pt-sm-3 pt-lg-1 col-12 col-lg-10 mx-auto px-md-0 px-lg-4">
                <ul class="navbar-nav mb-2 mb-lg-0 row justify-content-center px-0 ">
                    <li class="nav-item col-lg-3 col-md-2-5 px-md-0 px-lg-2">
                        <a class="nav-link fw-semibold h4" href="{{route('contact')}}">Contact</a>
                    </li>
                    <li class="nav-item col-lg-3 col-md-2-5 px-md-0 px-lg-2">
                        <a class="nav-link fw-semibold h4" href="{{route('products', 0)}}">Products</a>
                    </li>
                    <li class="nav-item col-lg-3 col-md-2-5 px-md-0 px-lg-2">
                        <a class="nav-link fw-semibold h4" href="{{route('about')}}">About us</a>
                    </li>
                    <li class="nav-item col-lg-3 col-md-2-5 px-md-0 px-lg-2">
                        <a class="nav-link fw-semibold h4" href="#catalog">Catalog</a>
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
