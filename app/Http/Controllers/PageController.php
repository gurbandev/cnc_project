<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $products = Product::orderBy('id')
            ->get();

        return view('home.index')
            ->with([
                'products' => $products,
            ]);
    }

    public function contact(){
        return view('home.contact');
    }

}
