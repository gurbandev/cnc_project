<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['name' => 'stanoklar', 'parent_id' =>[['name' => null, 'parent_id' => null]]],
            ['name' => 'pycaklar', 'parent_id' =>[
                ['name' => 'arden', 'parent_id' =>[
                    ['name' => 'kesim', 'parent_id' => null],
                    ['name' => '3D', 'parent_id' => null],
                    ['name' => 'figura', 'parent_id' => null],
                    ['name' => 'gradus', 'parent_id' => null]
                ]],
                ['name' => 'beylekiler', 'parent_id' =>[
                    ['name' => 'kesim', 'parent_id' => null],
                    ['name' => '3D', 'parent_id' => null],
                    ['name' => 'figura', 'parent_id' => null],
                    ['name' => 'gradus', 'parent_id' => null]
                ],],
            ]],
            ['name' => 'zapjaslar', 'parent_id' =>[['name' => null, 'parent_id' => null]]],
            ['name' => 'gurlusuk harytlary', 'parent_id' =>[['name' => null, 'parent_id' => null]]],
            ['name' => 'beylekiler', 'parent_id' =>[['name' => null, 'parent_id' => null]]],
            ['name' => 'ayna gurallar', 'parent_id' => [['name' => null, 'parent_id' => null]]],
        ];

        for ($i=0; $i<count($objs); $i++){
            $category = Category::create([
               'name' => $objs[$i]['name']
            ]);

            for ($j=0; $j<count($objs[$i]['parent_id']); $j++){
                if ($objs[$i]['parent_id'][$j]['name']){
                    $firstParent = Category::create([
                        'parent_id' => $category->id,
                        'name' => $objs[$i]['parent_id'][$j]['name'],
                    ]);
                };

                if ($objs[$i]['parent_id'][$j]['parent_id']){
                    for ($a=0; $a<count($objs[$i]['parent_id'][$j]['parent_id']); $a++){
                        if ($objs[$i]['parent_id'][$j]['parent_id'][$a]['name']){
                            Category::create([
                                'parent_id' => $firstParent->id,
                                'name' => $objs[$i]['parent_id'][$j]['parent_id'][$a]['name'],
                            ]);
                        }
                    }
                }

            }
        }
    }
}
