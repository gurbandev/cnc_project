<div class="flex-shrink-0 p-3 bg-white text-capitalize ">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <img class="img-fluid" src="{{asset('img/logo/arden.png')}}" alt="">
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-yellow d-inline-flex align-items-center rounded border-0 collapsed"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                <p class="fw-semibold mb-0">Category Show <i class="bi bi-caret-right-fill"></i></p>
            </button>
            <div class="collapse" id="home-collapse">
                <ul class=" list-unstyled fw-normal pb-1 small">
                    @foreach($categories as $category)
                        @if(count(\App\Http\Controllers\CategoryController::getSubcategory($category)) == 0)
                            <li class="mb-1 ms-3"><a class="btn border-0 btn-yellow" href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
                            </li>
                        @else
                            <li class="mb-1 ms-3">
                                <button class="btn border-0 btn-yellow align-items-center rounded collapsed mb-1"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#{{$category->name}}" aria-expanded="false">
                                    <span class="text-capitalize fw-semibold">{{$category->name}}</span>
                                    <i class="bi bi-caret-right-fill"></i>
                                </button>
                                <div class="collapse" id="{{$category->name}}" style="">
                                    <ul class=" list-unstyled fw-normal pb-1 small">
                                        @foreach(\App\Http\Controllers\CategoryController::getSubcategory($category) as $subcategory)
                                            <li class="mb-1 ms-2">
                                                <button class="btn border-0 btn-yellow align-items-center rounded collapsed"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#{{$subcategory->name}}" aria-expanded="false">
                                                    <span class="text-capitalize fw-semibold">{{$subcategory->name}}</span>
                                                    <i class="bi bi-caret-right-fill"></i>
                                                </button>
                                                <div class="collapse" id="{{$subcategory->name}}" style="">
                                                    <ul class=" list-unstyled fw-normal pb-1 small">
                                                        @foreach(\App\Http\Controllers\CategoryController::getSubcategory($subcategory) as $child)
                                                            <li
                                                                    class="ms-4"><a href="{{route('categories.show', $child->id)}}" class="btn btn-yellow border-0 py-0 my-1"><span class="text-capitalize">{{$child->name}}</span></a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </li>
                            @endforeach
                </ul>
            </div>
        </li>
        <li class="mb-1">
                <button class="btn btn-yellow d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#Product-create" aria-expanded="false">
                <span class="fw-semibold mb-0">Create <i class="bi bi-caret-right-fill"></i></span>
            </button>
            <div class="collapse" id="Product-create" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    @foreach($categories as $category)
                        @if($category->id == 1)
                        <li><a href="{{route('machines.create')}}" class="btn btn-yellow text-capitalize border-0 ">{{$category->name}}</a></li>
                        @elseif($category->id == 2)
                            <li><a href="{{route('bits.create')}}" class="btn btn-yellow text-capitalize border-0 ">{{$category->name}}</a></li>
                        @else
                            <li><a href="{{route('products.create')}}" class="btn btn-yellow text-capitalize border-0 ">{{$category->name}}</a></li>
                        @endif
                    @endforeach
                        <li><a href="{{route('attributes.create')}}" class="btn btn-yellow text-capitalize border-0 ">Ayratynlyk</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="{{route('categories.index')}}" class="btn btn-yellow border-0 fw-semibold">Category edit</a>
        </li>
    </ul>
</div>