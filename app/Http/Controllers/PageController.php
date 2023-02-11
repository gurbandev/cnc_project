<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function PHPSTORM_META\type;

class PageController extends Controller
{

    //    public function show($id){
    //
    //        $product = Product::find($id);
    //
    //        return view('')
    //
    //    }

    public function index(){
        $products = Product::orderBy('id', 'desc')
            ->take(6)
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

    public function products($id){

        if ($id == 0){
            $id = null;
        }

        $categories = Category::where('parent_id', $id)
            ->with('children')
            ->get();


        return view('home.products')
            ->with([
                'categories' => $categories,
            ]);
    }

    public function filter(Request $request){

        $q = $request->q ?: null;

        $products = Product::when($q, function($query, $q){
           return $query->where(function ($query) use ($q){
             $query->orWhere('name', 'like', '%'.$q.'%');
             $query->orWhere('barcode', 'like', '%'.$q.'%');
           });
        });
        $products = $products->get();

        return view('home.filter')
            ->with([
                'products' => $products
            ]);
    }
}
