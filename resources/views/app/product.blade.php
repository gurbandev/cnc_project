@auth

    <div class="my-3 border rounded-4 py-2">
        <div class="mx-2">
            <img src="{{$product->image ? Storage::url('products/sm/' . $product->image) : Storage::url('not_found/not_found.png')}}" class="img-fluid rounded mx-auto d-block" alt="">
        </div>
        <div class="text-center">
            {{$product->name}}
        </div>
        <div class="text-center">
            {{$product->barcode}}
        </div>
        @auth
            <div class='row text-center py-1 px-0 mx-0 my-0'>
                @if(\App\Http\Controllers\CategoryController::getCategoryId($product->category_id) == 1)
                    <a class="col" href="{{route('machines.edit', $product->id)}}"><div><i class="bi bi-pencil-fill text-success"></i></div></a>
                @elseif(\App\Http\Controllers\CategoryController::getCategoryId($product->category_id) == 2)
                    <a class="col" href="{{route('bits.edit', $product->id)}}"><div><i class="bi bi-pencil-fill text-success"></i></div></a>
                @else
                    <a class="col " href="{{route('products.edit', $product->id)}}"><div><i class="bi bi-pencil-fill text-success"></i></div></a>
                @endif
                <form class="col" method="POST" action={{route('products.delete', $product->id)}}>
                    @csrf
                    @method('delete')
                    <button class="col border-0 bg-transparent px-4" type="submit"><i class="bi bi-trash3 text-danger"></i></button>
                </form>
            </div>
        @endauth
    </div>

@else

    <a href="{{"products.show", $product->id}}" class="text-decoration-none text-dark">
        <div class="my-3 border rounded-4 py-2">
            <div class="mx-2">
                <img src="{{$product->image ? Storage::url('products/sm/' . $product->image) : Storage::url('not_found/not_found.png')}}" class="img-fluid rounded mx-auto d-block img-resize" alt="">
            </div>
            <div class="text-center">
                {{$product->name}}
            </div>
            <div class="text-center">
                {{$product->barcode}}
            </div>
            @auth
                <div class='row text-center py-1 px-0 mx-0 my-0'>
                    @if(\App\Http\Controllers\CategoryController::getCategoryId($product->category_id) == 1)
                        <a class="col" href="{{route('machines.edit', $product->id)}}"><div><i class="bi bi-pencil-fill text-success"></i></div></a>
                    @elseif(\App\Http\Controllers\CategoryController::getCategoryId($product->category_id) == 2)
                        <a class="col" href="{{route('bits.edit', $product->id)}}"><div><i class="bi bi-pencil-fill text-success"></i></div></a>
                    @else
                        <a class="col " href="{{route('products.edit', $product->id)}}"><div><i class="bi bi-pencil-fill text-success"></i></div></a>
                    @endif
                    <form class="col" method="POST" action={{route('products.delete', $product->id)}}>
                        @csrf
                        @method('delete')
                        <button class="col border-0 bg-transparent px-4" type="submit"><i class="bi bi-trash3 text-danger"></i></button>
                    </form>
                </div>
            @endauth
        </div>
    </a>

@endauth