<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use function Symfony\Component\Uid\Factory\create;

class AttributeValueController extends Controller
{
    public function create(){
        $attributes = Attribute::orderBy('id')
            ->get();

        $attributesV = AttributeValue::orderBy('id')
            ->get();

        return view('attribute.create')
            ->with([
                'attributes' => $attributes,
                'attributesV' => $attributesV,
            ]);
    }

    public function store(Request $request){
        $request->validate([
           'attribute' => 'required|integer|min:0',
           'name' => 'required|string|max:255',
        ]);

        $obj = new AttributeValue();
        $obj->attribute_id = $request->attribute;
        $obj->name = $request->name;
        $obj->save();

        return redirect()->route('home');
    }
}
