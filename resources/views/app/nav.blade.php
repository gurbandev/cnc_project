<nav class="navbar navbar-expand-md navbar-dark bg-black" aria-label="navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="bi-cart4"></i> HOME</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbars"
                aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbars">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu dropdown-head">
                        <div class="dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Stanoklar
                            </button>
                            <ul class="dropdown-menu dropdown-body">
                                @foreach($categories as $category)
                                    @if($category->parent_id == 1)
                                        <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                                @if($category->parent_id == 0)
                                    <li><a class="dropdown-item" href="#">yok</a></li>
                                @endif
                            </ul>
                        </div>

                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Pycaklar
                            </button>
                            <ul class="dropdown-menu dropdown-body">
                                @foreach($categories as $category)
                                    @if($category->parent_id == 2)
                                        <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Zapjaslar
                            </button>
                            <ul class="dropdown-menu dropdown-body">
                                @foreach($categories as $category)
                                    @if($category->parent_id == 3)
                                        <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Gurlusuk harytlary
                            </button>
                            <ul class="dropdown-menu dropdown-body">
                                @foreach($categories as $category)
                                    @if($category->parent_id == 4)
                                        <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>

                        <div class="btn-group dropend">
                            <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Beylekiler
                            </button>
                            <ul class="dropdown-menu dropdown-body">
                                @foreach($categories as $category)
                                    @if($category->parent_id == 5)
                                        <li><a class="dropdown-item" href="#">{{$category->name}}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </ul>
                </li>


                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Pycaklar
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($products as $product)
                            @auth
                                <li class="text-center">
                                    <form method="POST" action={{route('products.delete', $product->id)}}>
                                        @csrf
                                        @method('delete')

                                        <div class="modal-footer">
                                            <span class="text-start">{{$product->name}}</span>
                                            <button type="submit" class="btn btn-sm btn-danger"><strong>Delete</strong></button>
                                        </div>
                                    </form>
                                </li>
                            @endauth
                        @endforeach
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        Pycaklar
                    </a>
                    <ul class="dropdown-menu">
                        @foreach($products as $product)
{{--                            {{\App\Http\Controllers\ProductController::getCategory_id($product->category_id)}}--}}
                            @auth
                                <li class="text-center"><a class="dropdown-item" href="{{route('products.edit', $product->id)}}">{{$product->name}}</a></li>
                            @endauth
                        @endforeach
                    </ul>
                </li>

                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-plus-circle"></i> gosmak
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('machines.create') }}">
                                    Stanok gosmak
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('bits.create') }}">
                                    pycak gosmak
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('products.create') }}">
                                    Beyleki harytlar gosmak
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('categories.create') }}">
                                    Kategorya gosmak
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('attributes.create') }}">
                                    Ayratynlyk gosmak
                                </a>
                            </li>
                        </ul>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
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