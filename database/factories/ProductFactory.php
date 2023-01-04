<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = DB::table('categories')->inRandomOrder()->first();
        return [
            'category_id' => $category->id,
            'name' => fake()->streetName(),
            'barcode' => fake()->unique()->isbn13(),
        ];
    }
}
