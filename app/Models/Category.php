<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false;

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function sub_category()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function parent_category()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
