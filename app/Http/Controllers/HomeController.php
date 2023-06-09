<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where(['published' => true])->orderBy('created_at', 'desc')->paginate(6);
        return view('home', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }
}
