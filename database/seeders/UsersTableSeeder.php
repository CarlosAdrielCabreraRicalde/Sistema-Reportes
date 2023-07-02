<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name'=>'Yeffer',
            'email'=>'simehuaranccay@gmail.com',
            'password'=>bcrypt('simeh2005'),
            'role'=>'0'
        ]);

        User::create([
            'name'=>'Alonso',
            'email'=>'support@gmail.com',
            'password'=>bcrypt('simeh2005'),
            'role'=>'1'
        ]);

        User::create([
            'name'=>'Yeffer',
            'email'=>'cliente@gmail.com',
            'password'=>bcrypt('simeh2005'),
            'role'=>'2'
        ]);
    }
}
