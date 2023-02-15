<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;
use function Symfony\Component\Console\Style\success;

class PageController extends Controller
{

    public function index(){
        $products = Product::orderBy('id', 'desc')
            ->take(9)
            ->get();

        $categories = Category::orderBy('id')
            ->get();


        return view('home.index')
            ->with([
                'categories' => $categories,
                'products' => $products,
            ]);
    }

    public function contact(){
        return view('home.contact');
    }

    public function about(){
        return view('home.about');
    }


    public function filter(Request $request){

        $q = $request->q ?: null;

        $products = Product::when($q, function($query, $q){
           return $query->where(function ($query) use ($q){
             $query->orWhere('name', 'like', '%'.$q.'%');
             $query->orWhere('barcode', 'like', '%'.$q.'%');
           });
        });
        $products = $products
            ->with('category')
            ->get();

        $success = null;

        foreach ($products as $product)


        $category = $products['category'];

        return $category;

        if (isset($products[0])){
            $success = true;
        }

        return view('home.filter')
            ->with([
                'products' => $products,
                'success' => $success,
            ]);
    }
}
