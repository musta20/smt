<?php

namespace App\Http\Controllers;

use App\Enums\Store\SocialMedia;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.store.index');
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
    public function store(StoreStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {


        $SocialMedia =  json_encode([
                SocialMedia::FACEBOOK->value =>  $request->facebook,
                SocialMedia::X->value => $request->x,
                SocialMedia::INSTAGRAM->value =>  $request->instagram,
                SocialMedia::TELEGRAM->value =>  $request->telegram,
                SocialMedia::WHATSAPP->value => $request->whatsapp,
                SocialMedia::SNAPCHAT->value => $request->snapchat,
                SocialMedia::YOUTUBE->value => $request->youtube,
                SocialMedia::TIKTOK->value => $request->tiktok,
        ]);

        $store->update([
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'location' => $request->location,
            'phone' => $request->phone,
            'email' => $request->email,
            'specialty' => $request->specialty,
            'SocialMedia' => $SocialMedia,
        ]);



        return redirect()->route('admin.store.index')->with('OkToast', 'تم اضاقة المنتج');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
