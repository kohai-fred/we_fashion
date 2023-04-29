<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;

class ProductController extends Controller
{
    public function show(string $slug, Product $product)
    {
        $expectedSlug = $product->getSlug();
        if ($slug !== $expectedSlug) {
            return to_route('product.show', ['slug' => $expectedSlug, 'product' => $product]);
        };

        return view('product', [
            'product' => $product,
            'categories' => Category::all(),
            'sizes' => Size::pluck('name', 'id'),
        ]);
    }
}
