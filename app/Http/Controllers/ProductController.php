<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $categories = Category::orderBy('id')
            ->get();

        return view('product.create')
            ->with([
                'categories' => $categories,
            ]);
    }

    public function store(Request $request){
        return redirect()->route('home');
    }
}
