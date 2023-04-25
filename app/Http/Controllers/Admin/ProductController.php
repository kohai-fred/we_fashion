<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::orderBy('created_at', 'desc')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $product->fill([
            'promotion' => false,
            'published' => false,
            'price' => 0
        ]);

        return view('admin.products.form', [
            'product' => $product,
            'categories' => Category::pluck('name', 'id'),
            'sizes' => Size::pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        $productData = $request->validated();
        $productData['reference'] = uniqid('wf_');
        $product = Product::create($productData);
        $product->categories()->sync($request->validated('categories'));
        $product->sizes()->sync($request->validated('sizes'));

        return to_route('admin.product.index')->with('success', 'Le produit a bien été créé.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.form', [
            'product' => $product,
            'categories' => Category::pluck('name', 'id'),
            'sizes' => Size::pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, Product $product)
    {
        $product->categories()->sync($request->validated('categories'));
        $product->sizes()->sync($request->validated('sizes'));
        $product->update($request->validated());
        return to_route('admin.product.index')->with('success', 'Le produit a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return to_route('admin.product.index')->with('success', 'Le produit a bien été supprimé.');
    }
}
