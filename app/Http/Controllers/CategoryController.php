<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    public function index(){
        $categories = Category::orderBy('id')
            ->get();

        return view('home.index')
            ->with([
                'categories' => $categories
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
            'parent_id' => 'required|string|max:255',
        ]);

        $obj = new Category();
        $obj->name = $request->name;
        $obj->parent_id = $request->parent_id;
        $obj->save();

        return redirect()->route('home');
    }
}
