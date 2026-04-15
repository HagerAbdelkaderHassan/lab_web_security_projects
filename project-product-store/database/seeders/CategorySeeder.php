<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Electronics', 'description' => 'Gadgets, phones, laptops']);
        Category::create(['name' => 'Books', 'description' => 'Fiction, non-fiction, educational']);
        Category::create(['name' => 'Clothing', 'description' => 'Men, women, kids fashion']);
    }
}