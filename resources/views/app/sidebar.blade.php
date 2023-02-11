<div class="flex-shrink-0 p-3 bg-white text-capitalize">
    <h1 class="border-bottom pb-3 mb-3">Admin panel</h1>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <button class="btn btn-yellow d-inline-flex align-items-center rounded border-0 collapsed col-12 px-4"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                <p class="fw-semibold mb-0 fs-5">Category Show</p>
                <i class="bi bi-caret-right-fill ms-auto"></i>
            </button>
            <div class="collapse pt-1" id="home-collapse">
                <ul class=" list-unstyled fw-normal pb-1 small">
                    @foreach($categories as $category)
                        @if(count($category->children) == 0)
                            <li class="mb-1 ms-4">
                                <a class="btn border-0 btn-yellow col-8 text-start" href="{{route('categories.admin.show', $category->id)}}">{{$category->name}}</a>
                            </li>
                        @else
                            <li class="mb-1 ms-4">
                                <button class="btn border-0 btn-yellow align-items-center rounded collapsed mb-1 col-12 text-start  " data-bs-toggle="collapse" data-bs-target="#{{$category->name}}" aria-expanded="false">
                                    <span class="text-capitalize fw-semibold">{{$category->name}}</span>
                                    <i class="bi bi-caret-right-fill"></i>
                                </button>
                                <div class="collapse" id="{{$category->name}}" style="">
                                    <ul class=" list-unstyled fw-normal pb-1 small">
                                        <li>
                                            <a href="{{route('categories.admin.show', $category->id)}}" class="btn btn-yellow border-0 ms-4 col-8 text-start text-secondary fw-bold">
                                                <span class="text-capitalize">Ahlisini gor </span> <i class="bi bi-caret-right-fill"></i>
                                            </a>
                                        </li>
                                        @foreach($category->children as $subcategory)
                                            @if(count($subcategory->children))
                                            <li class="mb-1 ms-4">
                                                <button class="btn border-0 btn-yellow align-items-center rounded collapsed col-12 text-start" data-bs-toggle="collapse" data-bs-target="#{{$subcategory->name}}" aria-expanded="false">
                                                    <span class="text-capitalize fw-semibold">{{$subcategory->name}}</span>
                                                    <i class="bi bi-caret-right-fill"></i>
                                                </button>
                                                <div class="collapse" id="{{$subcategory->name}}" style="">
                                                    <ul class=" list-unstyled fw-normal pb-1 small">
                                                        <li>
                                                            <a href="{{route('categories.admin.show', $subcategory->id)}}" class="btn btn-yellow border-0 ms-4 col-8 text-start text-secondary fw-bold">
                                                                <span class="text-capitalize">Ahlisini gor </span> <i class="bi bi-caret-right-fill"></i>
                                                            </a>
                                                        </li>
                                                        @foreach($subcategory->children as $child)
                                                            <li class="ms-4">
                                                                <a href="{{route('categories.admin.show', $child->id)}}" class="btn btn-yellow border-0 py-1 my-1 col-5 text-start ">
                                                                    <span class="text-capitalize">{{$child->name}}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                            @else
                                                <li class="ms-4">
                                                    <a href="{{route('categories.admin.show', $subcategory->id)}}" class="btn btn-yellow border-0 col-7 text-start ">
                                                        <span class="text-capitalize">{{$subcategory->name}}</span>
                                                    </a>
                                                </li>
                                            @endif
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
            <button class="btn btn-yellow d-inline-flex align-items-center rounded border-0 collapsed col-12 px-4" data-bs-toggle="collapse" data-bs-target="#Product-create" aria-expanded="false">
                <p class="fw-semibold mb-0 fs-5">Create</p>
                <i class="bi bi-caret-right-fill ms-auto"></i>
            </button>
            <div class="collapse" id="Product-create" style="">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ms-4 pt-0">
                    @foreach($categories as $category)
                        @if($category->id == 1)
                            <li class="pt-1"><a href="{{route('machines.create')}}" class="btn btn-yellow text-capitalize border-0 col-8 text-start">{{$category->name}}</a></li>
                        @elseif($category->id == 2)
                            <li class="pt-1"><a href="{{route('bits.create')}}" class="btn btn-yellow text-capitalize border-0 col-8 text-start">{{$category->name}}</a></li>
                        @else
                            <li class="pt-1"><a href="{{route('products.create')}}" class="btn btn-yellow text-capitalize border-0 col-8 text-start">{{$category->name}}</a></li>
                        @endif
                    @endforeach
                        <li><a href="{{route('attributes.create')}}" class="btn btn-yellow text-capitalize border-0 col-7 text-start">Ayratynlyk</a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="{{route('categories.index')}}" class="btn btn-yellow border-0 fw-semibold fs-5 px-4 col-12 text-start">Category edit</a>
        </li>
    </ul>
</div>