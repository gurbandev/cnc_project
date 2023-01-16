<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class MachineController extends Controller
{
    public function create(){
        $categories = Category::orderBy('id')
            ->get();

        $attributes = AttributeValue::orderBy('id')
            ->get();

        return view('machine.create')
            ->with([
                'categories' => $categories,
                'attributes' => $attributes,
            ]);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',

            'working_area_id' => 'nullable|integer|min:0',
            'motor_id' => 'nullable|integer|min:0',
            'weight_id' => 'nullable|integer|min:0',
            'maxWorking_speed_id' => 'nullable|integer|min:0',
            'maxTraveling_speed_id' => 'nullable|integer|min:0',
        ]);

        $obj = new Product();
        $obj->name = $request->name;
        $obj->category_id = $request->category_id;
        $obj->description = $request->description;
        $obj->barcode = null;
        $obj->head_diameter_id = null;
        $obj->working_area_bit_id = null;
        $obj->bottom_diameter_id = null;
        $obj->bottom_zone_id = null;
        $obj->working_area_id = $request->working_area_id;
        $obj->motor_id = $request->motor_id;
        $obj->weight_id = $request->weight_id;
        $obj->maxWorking_speed_id = $request->maxWorking_speed_id;
        $obj->maxTraveling_speed_id = $request->maxTraveling_speed_id;
        $obj->save();

        if ($request->has('image')) {
            // generate name
            $name = str()->random(15) . '.jpg';
            // save normal
            Storage::putFileAs('public/products', $request->image, $name);
            // save small
            $imageSm = Image::make($request->image);
            $imageSm->resize(200, 200, function ($constraint) {
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
    public function edit($id){
        $obj = Product::findOrFail($id);

        $categories = Category::orderBy('id')
            ->get();

        $attributes = AttributeValue::orderBy('id')
            ->get();

        return view('machine.edit')
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
            'category_id' => 'required|integer|min:0',
            'description' => 'nullable|string|max:1000',

            'working_area_id' => 'nullable|integer|min:0',
            'motor_id' => 'nullable|integer|min:0',
            'weight_id' => 'nullable|integer|min:0',
            'maxWorking_speed_id' => 'nullable|integer|min:0',
            'maxTraveling_speed_id' => 'nullable|integer|min:0',
        ]);

        $obj = Product::findOrFail($id);
        $obj->name = $request->name;
        $obj->category_id = $request->category_id;
        $obj->description = $request->description;
        $obj->barcode = null;
        $obj->head_diameter_id = null;
        $obj->working_area_bit_id = null;
        $obj->bottom_diameter_id = null;
        $obj->bottom_zone_id = null;
        $obj->working_area_id = $request->working_area_id;
        $obj->motor_id = $request->motor_id;
        $obj->weight_id = $request->weight_id;
        $obj->maxWorking_speed_id = $request->maxWorking_speed_id;
        $obj->maxTraveling_speed_id = $request->maxTraveling_speed_id;
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
            $imageSm->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            });
            $imageSm = (string)$imageSm->encode('jpg', 90);
            Storage::put('public/products/sm/' . $name, $imageSm);
            // update obj
            $obj->image = $name;
            $obj->update();

            return redirect()->back()
                ->with('succes update product');
        }
    }
}
