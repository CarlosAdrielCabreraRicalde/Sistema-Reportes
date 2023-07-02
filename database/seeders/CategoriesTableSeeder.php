<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create([
            'name'=>'Categoria A1',
            'project_id'=>1
        ]);

        Category::create([
            'name'=>'Categoria A2',
            'project_id'=>1
        ]);

        Category::create([
            'name'=>'Categoria B1',
            'project_id'=>2
        ]);
        Category::create([
            'name'=>'Categoria B1',
            'project_id'=>2
        ]);
    }
}
