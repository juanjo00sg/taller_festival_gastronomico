<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Juan José Sánchez Gómez',
                'email' => 'juanj.sanchezg@autonoma.edu.co',
                'password' => Hash::make('hola123'),
                'type' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'Valeria Estrada López',
                'email' => 'valeria.estradal@autonoma.edu.co',
                'password' => Hash::make('hola123'),
                'type' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
