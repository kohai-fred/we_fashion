<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(5)->create();
        $categories = Category::pluck('id')->toArray();
        $sizes = Size::pluck('id')->toArray();

        foreach ($products as $product) {
            // Random category for table relation category_product
            $categoryId = array_rand($categories);
            $product->categories()->sync([$categories[$categoryId]]);
            // Random size for table relation product_size
            shuffle($sizes);
            $randSize = [];
            for ($i = 0; $i < rand(1, count($sizes)); $i++) {
                $randSize[] = $sizes[$i];
            }
            $product->sizes()->sync($randSize);
        }
    }
}
