<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductFormRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $productData = $this->extractData(new Product(), $request);
        $productData['reference'] = uniqid('wf_');
        $product = Product::create($productData);
        $this->synchronizesWithOtherTable($product, $request);

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
        $product->update($this->extractData($product, $request));
        $this->synchronizesWithOtherTable($product, $request);
        return to_route('admin.product.index')->with('success', 'Le produit a bien été modifié.');
    }

    private function synchronizesWithOtherTable(Product $product, ProductFormRequest $request): void
    {
        $product->categories()->sync($request->validated('categories'));
        $product->sizes()->sync($request->validated('sizes'));
    }

    private function extractData(Product $product, ProductFormRequest $request): array
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('image');
        if ($image === null || $image->getError()) {
            return $data;
        }

        // If the image exists, we delete it to replace it. This avoids ghost images
        $this->deleteImage($product);

        $data['image'] = $image->store('product', 'public');
        return $data;
    }

    private function deleteImage(Product $product): void
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // We have to delete the image in the app if we delete the product.
        $this->deleteImage($product);
        $product->delete();
        return to_route('admin.product.index')->with('success', 'Le produit a bien été supprimé.');
    }
}
