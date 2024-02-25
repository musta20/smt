<?php

namespace App\Http\Controllers;

use App\Models\Product;

class SiteController extends Controller
{
    
    public function index()
    {
        $product = Product::latest()->take(10)->get();

        return view('index', [
            'products' => $product
        ]);
    }

    public function product(Product $product)
    {

        $recomendedProduct = Product::latest()->take(5)->get();

        return view('product', [
            'product' => $product,
            'recomendedProduct'=>$recomendedProduct
        ]);

    }
}
