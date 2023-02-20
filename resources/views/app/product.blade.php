@auth

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
                    <button type="button" class="col border-0 bg-transparent px-4" data-bs-toggle="modal" data-bs-target="#trash">
                        <i class="bi bi-trash3 text-danger"></i>
                    </button>

                    <div class="modal fade" id="trash" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mx-2">
                                        <img src="{{$product->image ? Storage::url('products/' . $product->image) : Storage::url('not_found/not_found.png')}}" class="img-fluid rounded mx-auto d-block img-resize" alt="">
                                    </div>
                                    {{$product->name}}
                                    <br>
                                    {{$product->barcode}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="border-0 px-4 btn btn-danger">Delete<i class="bi bi-trash3 text-white ps-2"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
    </div>

@else

    @if(\App\Http\Controllers\CategoryController::getCategoryId($product->category_id) == 2)
        <a href="{{route("bits.show", $product->category_id)}}" class="text-decoration-none text-dark">
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
            </div>
        </a>
    @else
        <a href="{{route("bits.show", $product->category_id)}}" class="text-decoration-none text-dark"
           data-bs-toggle="modal" data-bs-target="#productshow">
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
            </div>
        </a>

        <!-- Modal -->
        <div class="modal fade my-auto" id="productshow" tabindex="-1">
            <div class="modal-dialog modal-center">
                <div class="modal-content">
                    <div class="modal-body py-0 pe-0">
                        <div class="row">
                            <div class="col-6">
                                <img src="{{$product->image ? Storage::url('products/sm/' . $product->image) : Storage::url('not_found/not_found.png')}}" class="img-fluid rounded mx-auto d-block img-resize-modalShow border my-3" alt="">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 order-2">
                                        <div class="">
                                            {{$product->name}}
                                        </div>
                                        <div class="">
                                            {{$product->barcode}}
                                        </div>
                                    </div>
                                    <div class="col-12 order-1">
                                        <button type="button" class="btn border-0 mx-0 px-0 pe-2 float-end" data-bs-dismiss="modal" aria-label="Close"><x-icon.close/></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


@endauth