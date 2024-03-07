<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $setting = Setting::where('tenant_id', tenant('id'))->get();

        $visibleRecored = $setting->where('key', 'visibility')->first();

        $visible = json_decode($visibleRecored->value);

        $product = Product::findorfail($request->product_id);
        
        $CanReviewProduct = json_decode($product->visible);

        if ($CanReviewProduct->CanReview && $visible->CanReview && $visible->OnlycustomerCanReview) {

            $user = auth()->user();
            Comment::create([
                'comment' => $request->comment,
                'rating' => $request->rating,
                'product_id' => $request->product_id,
                'user_id' => $user->id,
                'tenant_id' => tenant('id')
            ]);

            return redirect()->back()->with('OkToast', __('messages.review added'));

        }

        return redirect()->back()->with('ErorrToast', __('messages.error'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
