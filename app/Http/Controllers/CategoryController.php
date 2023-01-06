<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function getCategoryTree($category, $name){
        if ($category->parent_id == 0){
            return $name;
        }else{
         $parent = Category::find($category->parent_id);
         $name = $parent->name . ' > ' . $name;

         return CategoryController::getCategoryTree($parent, $name);
        }
    }

    public static function getCategoryId($category){
        if ($category->parent_id == 0){
            return $category->id;
        }else{
            $parent = Category::find($category->parent_id);

            return CategoryController::getCategoryTree($parent);
        }
    }

    public function index(){
        $products = Product::orderBy('id')
            ->get();

        $categories = Category::orderBy('id')
            ->get();

        return view('home.index')
            ->with([
                'categories' => $categories,
                'products' => $products,
            ]);
    }

    public function create(){
        $categories = Category::orderBy('id')
            ->get();

        return view('category.create')
            ->with([
                'categories' => $categories,
            ]);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'required|integer|min:1  ',
        ]);

        $obj = new Category();
        $obj->name = $request->name;
        $obj->parent_id = $request->parent_id;
        $obj->save();

        return redirect()->route('home');
    }
}
