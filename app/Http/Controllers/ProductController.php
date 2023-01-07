<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function create(){
        $categories = Category::orderBy('id')
            ->get();

        $attributes = AttributeValue::orderBy('id')
            ->get();

        return view('product.create')
            ->with([
                'categories' => $categories,
                'attributes' => $attributes,
            ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'category_id' => 'required|integer|min:0',
        ]);

        $obj = new Product();
        $obj->name = $request->name;
        $obj->barcode = $request->barcode;
        $obj->category_id = $request->category_id;
        $obj->description = $request->description;
        $obj->head_diameter_id = null;
        $obj->working_area_bit_id = null;
        $obj->working_area_id = null;
        $obj->bottom_diameter_id = null;
        $obj->bottom_zone_id = null;
        $obj->motor_id = null;
        $obj->weight_id = null;
        $obj->maxWorking_speed_id = null;
        $obj->maxTraveling_speed_id = null;
        $obj->save();

        if ($request->has('image')) {
            // generate name
            $name = str()->random(15) . '.jpg';
            // save normal
            Storage::putFileAs('public/products', $request->image, $name);
            // save small
            $imageSm = Image::make($request->image);
            $imageSm->resize(200, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageSm = (string)$imageSm->encode('jpg', 90);
            Storage::put('public/products/sm/' . $name, $imageSm);
            // update obj
            $obj->image = $name;
            $obj->update();
        }

        return redirect()->route('home');
    }

    public function delete($id){
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('home');
    }


    public static function getCategory_id ($category_id){
        $category = Category::find($category_id);
        $parent = Category::find($category->parent_id);

        if ($category->parent_id == 0){
            return $category->id;
        }else{
            return ProductController::getCategory_id($parent);
        }
    }


}
