<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::truncate();

        Product::create([
            'category' => 'Combo',
            'tag' => 'Premium',
            'badge' => 'La Bambucha',
            'name' => 'Combo Resuelve',
            'description' => '5 perros normales con salchicha, cebolla, ensalada, papitas + 1 refresco de 1 litro.',
            'price' => 8.00,
        ]);

        Product::create([
            'category' => 'Burger',
            'tag' => 'Premium',
            'badge' => 'La Bambucha',
            'name' => 'Súper Burger',
            'description' => 'Carne artesanal de 150g, pan especial, lechuga, tomate, tocineta crujiente y salsa secreta.',
            'price' => 6.50,
        ]);
    }
}
