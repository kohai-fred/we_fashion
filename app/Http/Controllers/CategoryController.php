<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        $id = $request->route('id');
        $category = Category::find($id);
        $products = Product::whereHas('categories', function ($query) use ($category) {
            $query->where('id', $category->id)->orderBy('created_at', 'desc');
        })->paginate(6);

        return view('category', [
            'products' => $products,
            'categories' => Category::all(),
        ]);
    }
}
