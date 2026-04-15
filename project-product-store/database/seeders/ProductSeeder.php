<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([
            'name' => 'iPhone 14',
            'description' => 'Apple smartphone with A15 chip',
            'price' => 999,
            'stock' => 10,
            'category_id' => 1
        ]);
        
        Product::create([
            'name' => 'MacBook Pro',
            'description' => 'Laptop with M2 chip',
            'price' => 1299,
            'stock' => 5,
            'category_id' => 1
        ]);
        
        Product::create([
            'name' => 'The Laravel Book',
            'description' => 'Learn Laravel from scratch',
            'price' => 49,
            'stock' => 20,
            'category_id' => 2
        ]);
        
        Product::create([
            'name' => 'T-Shirt',
            'description' => 'Cotton comfortable t-shirt',
            'price' => 25,
            'stock' => 50,
            'category_id' => 3
        ]);
    }
}