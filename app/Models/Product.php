<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function values(){
        return $this->belongsToMany(AttributeValue::class, 'product_attribute_value');
    }

    public function working_area_id(){
        return $this->belongsTo(AttributeValue::class, 'working_area_id');
    }

    public function motor_id(){
        return $this->belongsTo(AttributeValue::class, 'motor_id');
    }

    public function weight_id(){
        return $this->belongsTo(AttributeValue::class, 'weight_id');
    }

    public function maxWorking_speed_id(){
        return $this->belongsTo(AttributeValue::class, 'maxWorking_speed_id');
    }

    public function maxTraveling_speed_id(){
        return $this->belongsTo(AttributeValue::class, 'maxTraveling_speed_id');
    }

    public function head_diameter_id(){
        return $this->belongsTo(AttributeValue::class, 'head_diameter_id');
    }

    public function bottom_diameter_id(){
        return $this->belongsTo(AttributeValue::class, 'bottom_diameter_id');
    }

    public function bottom_zone_id(){
        return $this->belongsTo(AttributeValue::class, 'bottom_zone_id');
    }
}
