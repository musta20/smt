<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Setting;

class SiteController extends Controller
{
    
    public function index()
    {
        $setting = Setting::all();

        $product = Product::latest()->take(10)->get();
        $visibleRecored = $setting->where('key', 'visibility')->first();
        $visible =json_decode($visibleRecored->value);
       // dd($visible);
        $CarouselImage= (array) json_decode($setting->where('key', 'CarouselImage')->first()->value);

        return view('index', [
            'visible'=> $visible,
            'products' => $product,
            'CarouselImage'=>$CarouselImage
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
