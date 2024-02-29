<?php

namespace App\Http\Controllers;

use App\Enums\Store\Status;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class SiteController extends Controller
{

    public function index()
    {


        $setting = Setting::all();
        $product = Product::where('status', Status::PUBLISHED->value)->latest()->take(50)->get();
        $visibleRecored = $setting->where('key', 'visibility')->first();
        $visible = json_decode($visibleRecored->value);
        $CarouselImage = (array) json_decode($setting->where('key', 'CarouselImage')->first()->value);

        return view('index', [
            'visible' => $visible,
            'products' => $product,
            'CarouselImage' => $CarouselImage
        ]);
    }

    public function termPage()
    {

        return view('term');
    }

    public function search(Request $request)
    {
        return view('search', ['search' => $request->search]);
    }
    public function contactPage()
    {
        return view('term');
    }

    public function aboutPage()
    {
        return view('about');
    }
    public function category(Category $category)
    {
        $category->products = $category->products->where('status', Status::PUBLISHED->value);
        return view('category', [
            'category' => $category,
        ]);
    }

    public function product(Product $product)
    {
        //  dd($product->visible);

        if ($product->status != Status::PUBLISHED->value) return     abort(404);
        $recomendedProduct = Product::where('status', Status::PUBLISHED->value)->latest()->take(5)->get();

        $allRating = [
            5 => count($product->comment->where('rating', 5)),
            4 => count($product->comment->where('rating', 4)),
            3 => count($product->comment->where('rating', 3)),
            2 => count($product->comment->where('rating', 2)),
            1 => count($product->comment->where('rating', 1)),
        ];

        $totalRating = 0;
        $product->visible = json_decode($product->visible);

        if (array_sum($allRating) > 0) {

            $r =   array_map(function ($n, $i) {
                return $n * $i;
            }, $allRating, array_keys($allRating));

            $totalRating = array_sum($r) / array_sum($allRating);
        }

        return view('product', [
            'product' => $product,
            'totalRating' => $totalRating,
            'allRating' => $allRating,
            'recomendedProduct' => $recomendedProduct
        ]);
    }
}
