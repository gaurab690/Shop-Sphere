<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronics = Category::where('name', 'Electronics')->first();
        $clothing = Category::where('name', 'Clothing')->first();

        Product::create([
            'name' => 'Laptop',
            'description' => 'High performance laptop',
            'price' => 1000.00,
            'stock' => 50,
            'category_id' => $electronics->id,
            'image' => 'laptop.jpg',
        ]);

        Product::create([
            'name' => 'T-shirt',
            'description' => 'Comfortable cotton t-shirt',
            'price' => 20.00,
            'stock' => 100,
            'category_id' => $clothing->id,
            'image' => 'tshirt.jpg',
        ]);
    }
}
