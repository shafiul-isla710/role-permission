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
        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product one',
            'price' => 100,
            'qty' => 10
        ]);

        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product one',
            'price' => 100,
            'qty' => 10
        ]);

        Product::create([
            'name' => 'Product 1',
            'description' => 'Description of Product one',
            'price' => 100,
            'qty' => 10
        ]);
    }
}
