<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::with('parent')
            ->with('children')
            ->get();


        return view('category.index')
            ->with([
                'categories' => $categories,
            ]);
    }


    public function adminShow($id)
    {
        $category = Category::where('id', $id)
            ->get();

        $category = $category[0];

        $products = Product::where('category_id', $id)
            ->orderBy('id', 'desc')
            ->get();


        return view('category.admin_show')
            ->with([
                'category' => $category,
                'products' => $products,
            ]);
    }

    public function bitShow($id){

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
            'parent_id' => 'required|integer|min:1',
        ]);

        $obj = new Category();
        $obj->name = $request->name;
        $obj->parent_id = $request->parent_id;
        $obj->save();

        if ($request->has('image')) {
            // generate name
            $name = str()->random(15) . '.jpg';
            // save normal
            Storage::putFileAs('public/categories', $request->image, $name);
            // save small
            $imageSm = Image::make($request->image);
            $imageSm->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageSm = (string)$imageSm->encode('jpg', 90);
            Storage::put('public/categories/sm/' . $name, $imageSm);
            // update obj
            $obj->image = $name;
            $obj->update();
        }

        return redirect()->back()
            ->with('success create product');
    }


    public function edit($id)
    {
        $old_category = Category::find($id);
        $categories = Category::orderBy('id')
            ->get();


        return view('category.edit')
            ->with([
                'old_category' => $old_category,
                'categories' => $categories,
            ]);

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $obj = Category::findOrFail($id);
        $obj->name = $request->name;
        $obj->parent_id = $request->parent_id;
        $obj->update();

        if ($request->has('image')) {
            if ($obj->image) {
                Storage::delete('public/categories/' . $obj->image);
                Storage::delete('public/categories/sm/' . $obj->image);
            }
            // generate name
            $name = str()->random(15) . '.jpg';
            // save normal
            Storage::putFileAs('public/categories', $request->image, $name);
            // save small
            $imageSm = Image::make($request->image);
            $imageSm->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageSm = (string)$imageSm->encode('jpg', 90);
            Storage::put('public/categories/sm/' . $name, $imageSm);
            // update obj
            $obj->image = $name;
            $obj->update();
            return redirect()->route('home');
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()->back()
            ->with('success', 'success delete product');
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
            $name = $parent->name . ' / ' . $name;

            return CategoryController::getCategoryTree($parent, $name);
        }
    }

    public static function getCategoryId($category_id)
    {
        $category = Category::find($category_id);

//        $category = $category[0];
//            return $category->parent_id;

        if (!$category->parent_id) {
            return $category->id;
        } else {
            $parent = Category::find($category->parent_id);
            return CategoryController::getCategoryId($parent->id);
        }
    }

    public static function getProductCount($category_id)
    {
        $products = Product::where('category_id', $category_id)
            ->get();

        return count($products);
    }


    public static function categoryList()
    {
        return Category::where('parent_id' == 0)->with('children')->get();
    }

    public static function findParent($parent, $name)
    {

        $parent = Category::where('id', $parent->id)
            ->with('parent')
            ->get();


        $parent = $parent[0];

        $name = $parent->name . ' / ' . $name;

        if ($parent->parent){
            $name = $parent->parent->name . ' / ' . $parent->name. ' / ';
            return $name;
        }else{
            return $name;
        }


    }

}
