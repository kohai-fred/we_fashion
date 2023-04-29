<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SoldeController extends Controller
{
    public function index()
    {
        $products = Product::where(['promotion' => true, 'published' => true])->orderBy('created_at', 'desc')->paginate(6);

        return view('solde', [
            'products' => $products,
            'categories' => Category::all()
        ]);
    }
}
