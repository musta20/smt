<?php

namespace App\Http\Controllers;

use App\Enums\Store\Status;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Media;
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
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    //StoreProductRequest
    public function store(StoreProductRequest $request)
    {

        $imgename  = $request->file('image')->store('/','media');

        $visible = [
            "CanReview" => $request->CanReview ? true : false,
        ];

        $newCategory = $request->category;


        $status = $request->status ? Status::PUBLISHED->value : Status::DRAFT->value;

        $product = Product::create([
            'image' => $imgename,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'order_url' => $request->order_url,
            'discount' => $request->discount,
            'older_price' => $request->older_price,
            'status' => $status,
            'tenant_id' => tenant('id'),
            'visible' => $visible
        ]);

        $product->categories()->syncWithPivotValues($newCategory, ['tenant_id' => tenant('id')]);

        if ($request->subFiles) {
            foreach ($request->subFiles as $item) {
                $file=json_decode($item);

                Media::create(
                    [
                        'name' => $file->name,
                        'type' => $file->type,
                        'product_id' => $product->id,
                        'user_id' => auth()->user()->id,
                        'tenant_id' => tenant('id')
                    ]
                );
            }
        }




        return redirect()->route('admin.product.edit', $product->id)->with('OkToast', __('messages.product added'));
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
        ];

        $newCategory = $request->category;

        $product->categories()->syncWithPivotValues($newCategory, ['tenant_id' => tenant('id')]);

        $status = $request->status ? Status::PUBLISHED->value : Status::DRAFT->value;

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'order_url' => $request->order_url,
            'discount' => $request->discount,
            'older_price' => $request->older_price,
            'status' => $status,
            'visible' => $visible
        ]);

        return redirect()->route('admin.product.edit', $product->id)->with('OkToast', __("messages.product updated"));

        // return redirect()->route('admin.product.edit',$product->id)->with('ErorrToast', "الرجاء مراجعة الاخطاء");

        // return redirect()->route('admin.product.edit',$product->id)->with('ErorrToast', "الرجاء مراجعة الاخطاء");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.product.index')->with('OkToast',  __("messages.product deleted"));
    }
}
