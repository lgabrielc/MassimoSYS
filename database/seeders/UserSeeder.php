<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Luis Gabriel Coaquira Calloapaza',
            'email' => 'kidmeg100@hotmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Admin');
        User::create([
            'name' => 'Luz Maria Torres',
            'email' => 'kidmeg200@hotmail.com',
            'password' => bcrypt('12345678'),
        ])->assignRole('Mesero');
    }
}
