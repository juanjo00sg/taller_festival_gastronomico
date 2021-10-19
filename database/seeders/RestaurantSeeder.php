<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurants')->insert([
            [
                'user_id' => 1,
                'name' => 'La vaca loca',
                'description' => 'Comida de vaca muy buena',
                'city' => 'Manizales',
                'phone' => '1234567890',
                'category_id' => 1,
                'delivery' => 'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'facebook' => 'La vaca loca',
                'instagram' => 'LaVacaLoca',
                'twitter' => 'LaVacaLoca',
                'youtube' => 'La vaca loca'

            ],
            [
                'user_id' => 1,
                'name' => 'La hamburguesa loca',
                'description' => 'Ricas hamburguesas',
                'city' => 'Pereira',
                'phone' => '1234567890',
                'category_id' => 2,
                'delivery' => 'n',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'facebook' => 'La hamburguesa loca',
                'instagram' => 'LaHamburguesaLoca',
                'twitter' => 'LaHamburguesaLoca',
                'youtube' => 'La hamburguesa loca'
            ],
            [
                'user_id' => 2,
                'name' => 'La pizza feliz',
                'description' => 'Rica comida italiana',
                'city' => 'Armenia',
                'phone' => '1234567890',
                'category_id' => 3,
                'delivery' => 'n',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'facebook' => 'La pizza feliz',
                'instagram' => 'LaPizzaFeliz',
                'twitter' => 'LaPizzaFeliz',
                'youtube' => 'La Pizza Feliz'
            ],
            [
                'user_id' => 2,
                'name' => 'La Pasta Elegante',
                'description' => 'Comida italiana Autentica',
                'city' => 'Palestina',
                'phone' => '1234567890',
                'category_id' => 3,
                'delivery' => 'y',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'facebook' => 'La pizza feliz',
                'instagram' => 'LaPizzaFeliz',
                'twitter' => 'LaPizzaFeliz',
                'youtube' => 'La Pizza Feliz'
            ]
        ]);
    }
}
