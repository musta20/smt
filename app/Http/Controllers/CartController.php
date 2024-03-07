<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShopCart;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {


        if (Auth::check()) {

            $user = Auth::user();

            ShopCart::firstOrCreate(
                ["product_id" =>  $product->id],
                ["user_id" => $user->id]
            );

            return redirect()->back()->with('OkToast', __('messages.product added'));

        }

        CartService::add(
            (object)  [
            'id' => $product->id,
            'name' => $product->name,
            'image' => $product->image
        ]);


        return redirect()->back()->with('OkToast', __('messages.product added'));
    }

    public function showCart(){

        if (Auth::check()) {

            $user= Auth::user();
            $cart = $user->products;

        }else{
            $cart = CartService::getCart();
        }

        return themeView('cart',['cart' => $cart]);   
    }


    public function removeCart(Product $product){


        if (Auth::check()) {

            $user = Auth::user();

            $productItem =ShopCart::where('user_id',$user->id)->where('product_id',$product->id)->get();
            
           
             $productItem->first()->delete();

            return redirect()->back()->with('OkToast', __('messages.product removed'));

        }

        CartService::remove($product->id);

        return redirect()->back()->with('OkToast',__('messages.product removed'));
    }
}
