<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BitController extends Controller
{

    public function show($id)
    {

        $category = Category::find($id);

        $products = Product::where('category_id', $category->id)
            ->get();

        return view('bit.in_show')
            ->with([
                'products' => $products,
                'category' => $category,
            ]);
    }

//    create page
    public function create()
    {
        $categories = Category::orderBy('id')
            ->get();

        $attributes = AttributeValue::orderBy('id')
            ->get();

        return view('bit.create')
            ->with([
                'categories' => $categories,
                'attributes' => $attributes,
            ]);
    }


//    store creating
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'category_id' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',

            'head_diameter_id' => 'nullable|integer|min:0',
            'working_area_bit_id' => 'nullable|integer|min:0',
            'bottom_diameter_id' => 'nullable|integer|min:0',
            'bottom_zone_id' => 'nullable|integer|min:0',
        ]);

        $obj = new Product();
        $obj->name = $request->name;
        $obj->barcode = $request->barcode;
        $obj->category_id = $request->category_id;
        $obj->description = $request->description;
        $obj->head_diameter_id = $request->head_diameter_id;
        $obj->working_area_bit_id = $request->working_area_bit_id;
        $obj->working_area_id = $request->working_area_id;
        $obj->bottom_diameter_id = $request->bottom_diameter_id;
        $obj->bottom_zone_id = $request->bottom_zone_id;
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
            $imageSm->resize(350, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageSm = (string)$imageSm->encode('jpg', 90);
            Storage::put('public/products/sm/' . $name, $imageSm);
            // update obj
            $obj->image = $name;
            $obj->update();
        }

        return redirect()->back();
    }


//    edit page
    public function edit($id)
    {
        $obj = Product::findOrFail($id);

//        return $obj;

        $categories = Category::orderBy('id')
            ->get();

        $attributes = AttributeValue::orderBy('id')
            ->get();

        return view('bit.edit')
            ->with([
                'obj' => $obj,
                'categories' => $categories,
                'attributes' => $attributes,
            ]);
    }


//    edit updating
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'barcode' => 'nullable|string|max:255',
            'category_id' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',

            'head_diameter_id' => 'nullable|integer|min:0',
            'working_area_bit_id' => 'nullable|integer|min:0',
            'bottom_diameter_id' => 'nullable|integer|min:0',
            'bottom_zone_id' => 'nullable|integer|min:0',
        ]);

        $obj = Product::findOrFail($id);
        $obj->name = $request->name;
        $obj->barcode = $request->barcode;
        $obj->category_id = $request->category_id;
        $obj->description = $request->description;
        $obj->head_diameter_id = $request->head_diameter_id;
        $obj->working_area_bit_id = $request->working_area_bit_id;
        $obj->working_area_id = $request->working_area_id;
        $obj->bottom_diameter_id = $request->bottom_diameter_id;
        $obj->bottom_zone_id = $request->bottom_zone_id;
        $obj->motor_id = null;
        $obj->weight_id = null;
        $obj->maxWorking_speed_id = null;
        $obj->maxTraveling_speed_id = null;
        $obj->update();

        if ($request->has('image')) {
            if ($obj->image) {
                Storage::delete('public/products/' . $obj->image);
                Storage::delete('public/products/sm/' . $obj->image);
            }
            // generate name
            $name = str()->random(15) . '.jpg';
            // save normal
            Storage::putFileAs('public/products', $request->image, $name);
            // save small
            $imageSm = Image::make($request->image);
            $imageSm->resize(350, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageSm = (string)$imageSm->encode('jpg', 90);
            Storage::put('public/products/sm/' . $name, $imageSm);
            // update obj
            $obj->image = $name;
            $obj->update();

            return redirect()->back();

        }
    }
}
