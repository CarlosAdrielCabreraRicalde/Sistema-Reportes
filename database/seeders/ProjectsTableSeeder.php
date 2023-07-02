<?php

namespace Database\Seeders;
use App\Models\Project;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Project::create([
            'name'=>'Proyecto A',
            'description'=>'El proyecto A consiste ne desarrollar un sitio web moderno'
        ]);

        Project::create([
            'name'=>'Proyecto B',
            'description'=>'El proyecto b consiste ne desarrollar una aplicacon android'
        ]);
    }
}
