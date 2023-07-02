<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Level;


class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([ // 1
        	'name' => 'Atención por teléfono',
        	'project_id' => 1
    	]);
    	Level::create([ // 2
        	'name' => 'Envío de técnico',
        	'project_id' => 1
    	]);

    	Level::create([ // 3
        	'name' => 'Mesa de ayuda',
        	'project_id' => 2
    	]);
    	Level::create([ // 4
        	'name' => 'Consulta especializada',
        	'project_id' => 2
    	]);
    }
}
