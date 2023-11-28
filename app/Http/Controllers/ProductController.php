<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function index()
    {
        $products = Product::active()->paginate(5);
        
        return view('products.index', compact('products'));
    }

}
