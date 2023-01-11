<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){

        $search = $_GET['search'];

        if ($search){
            $categories = Category::where('name', 'LIKE', '%'.$search.'%')->get();
        }else{
            $categories = Category::orderBy('id')
                ->get();
        }

        return view('category.index')
            ->with([
                'categories' => $categories,
            ]);
    }
    public function create()
    {
        $categories = Category::orderBy('id')
            ->get();

        return view('category.create')
            ->with([
                'categories' => $categories,
            ]);
    }


    public function store(Request $request)
    {
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

    public function show($id)
    {
        $category = Category::where('id', $id)
            ->get();

        $category = $category[0];

        $products = Product::where('category_id', $id)
            ->orderBy('id', 'desc')
            ->get();

        return view('category.show')
            ->with([
                'category' => $category,
                'products' => $products,
            ]);
    }

    public function edit($id){
        $obj = Product::findOrFail($id);

        $categories = Category::where('id', $obj->category_id)
            ->orderBy('id', 'desc')
            ->get();

        $attributes = AttributeValue::orderBy('id')
            ->get();

        return view('category.edit')
            ->with([
                'obj' => $obj,
                'categories' => $categories,
                'attributes' => $attributes,
            ]);
     }



//    static function
    public static function getSubcategory($category)
    {
        if (Category::where('parent_id', $category->id)) {
            $subcategory = Category::where('parent_id', $category->id)
                ->get();

            return $subcategory;
        } else {
            return false;
        }
    }


    public static function getCategoryTree($category, $name)
    {
        if ($category->parent_id == 0) {
            return $name;
        } else {
            $parent = Category::find($category->parent_id);
            $name = $parent->name . ' > ' . $name;

            return CategoryController::getCategoryTree($parent, $name);
        }
    }

    public static function getCategoryId($category)
    {
        if ($category->parent_id == 0) {
            return $category->id;
        } else {
            $parent = Category::find($category->parent_id);
            return CategoryController::getCategoryId($parent);
        }
    }

    public static function getProductCount($category_id)
    {
        $products = Product::where('category_id', $category_id)
            ->get();
        return count($products);
    }
}
