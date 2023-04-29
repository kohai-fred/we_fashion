<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Http\UploadedFile;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $products = Product::factory(80)->create();
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

            // Check product category and save random image
            $category = Category::find($categories[$categoryId]);
            if ($category->name == 'homme') {
                $imagesArray = 'images_seeder/hommes';
                $product['title'] = $this->setProductTitle('homme');
            } else {
                $imagesArray = 'images_seeder/femmes';
                $product['title'] = $this->setProductTitle('femme');
            }

            $imageFiles = public_path($imagesArray);
            $chemin = join(DIRECTORY_SEPARATOR, [base_path(), $imagesArray, '*']);
            $imageFiles = File::glob($chemin);
            $imagePath = $imageFiles[array_rand($imageFiles)];
            $image = new UploadedFile($imagePath, 'product.jpg', 'image/jpeg', null, true);
            $product['image'] = $image->store('product', 'public');
            $product->update($product->getAttributes());
        }
    }

    private function setProductTitle(string $gender): string
    {
        $faker = Faker::create();
        if ($gender === 'homme') {
            $title = $faker->firstNameMale();
        } else {
            $title = $faker->firstNameFemale();
        }
        if (strlen($title) < 5) {
            $title = $title . ' ' . $faker->lastName();
        }
        return $title;
    }
}
