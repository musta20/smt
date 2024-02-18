<?php

namespace App\Http\Controllers;

use App\Enums\Store\Status;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {

        return view('admin.product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {


        $visible = [
            "CanReview" => $request->CanReview ? true : false,
            "CanComment" => $request->CanComment ? true : false
        ];

        // dd($request->category);
        $newCategory = $request->category;

 
        $product->categories()->syncWithPivotValues($newCategory,['tenant_id'=>tenant('id')]);

        // $currentCategory = $product->categorys->pluck('id')->toArray();

        // $deatchedCategory = array_diff($currentCategory, $newCategory);
        // $exicstCategory = array_intersect($currentCategory, $newCategory);
        // $attachedCategory = array_diff($newCategory, $exicstCategory);

        // if ($deatchedCategory) {
        //     $product->categorys()->detach($deatchedCategory);
        // }

        // if ($attachedCategory) {
        //     $product->categorys()->attach($attachedCategory);
        // }
        //dd($deatchedCategory,$attachedCategory);

        // dd(array_diff( $currentCategory,$category));

        //  dd(array_intersect( $currentCategory,$category));

        //array_intersect
        //$product->categorys();


        $status = $request->status ? Status::PUBLISHED->value : Status::DRAFT->value;

        $product->update([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'price' => $request->price,
            'order_url' => $request->order_url,
            'discount' => $request->discount,
            'older_price' => $request->older_price,
            'status' => $status,
            'visible' => $visible
        ]);

        return redirect()->route('admin.product.edit', $product->id)->with('OkToast', "تم تحديث بيانات المنتج");

        // return redirect()->route('admin.product.edit',$product->id)->with('ErorrToast', "الرجاء مراجعة الاخطاء");

        // return redirect()->route('admin.product.edit',$product->id)->with('ErorrToast', "الرجاء مراجعة الاخطاء");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
