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
        $visible = json_decode($visibleRecored->value);
        $CarouselImage = (array) json_decode($setting->where('key', 'CarouselImage')->first()->value);

        return view('index', [
            'visible' => $visible,
            'products' => $product,
            'CarouselImage' => $CarouselImage
        ]);
    }

    public function product(Product $product)
    {

        $recomendedProduct = Product::latest()->take(5)->get();

        $allRating = [
            5 => count($product->comment->where('rating', 5)),
            4 => count($product->comment->where('rating', 4)),
            3 => count($product->comment->where('rating', 3)),
            2 => count($product->comment->where('rating', 2)),
            1 => count($product->comment->where('rating', 1)),
        ];

        $r =   array_map(function ($n, $i) {
            return $n * $i;
        }, $allRating, array_keys($allRating));

        $totalRating = array_sum($r) / array_sum($allRating);

        return view('product', [
            'product' => $product,
            'totalRating' => $totalRating,
            'allRating' => $allRating,
            'recomendedProduct' => $recomendedProduct
        ]);
    }
}
