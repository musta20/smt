<?php

namespace App\Http\Controllers;

use App\Enums\Store\Status;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.setting.index');

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
    public function store(StoreSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $siteStatus = $request->siteStatus ? Status::PUBLISHED->value : Status::DRAFT->value;
        $TermPageContent = $request->TermPageContent;

        $visible = [
            "CanReview" => $request->CanReview ? true : false,
            "CanComment" => $request->CanComment ? true : false,
            "showCarousel" => $request->showCarousel ? true : false,
            "showHeadrLinks" => $request->showHeadrLinks ? true : false,
            "showTermPage" => $request->showTermPage ? true : false,
            "showFooterLinks" => $request->showFooterLinks ? true : false
        ];


        $setting = Setting::all();

        $siteStatusRecored = $setting->where('key', 'siteStatus')->first();
        $siteStatusRecored->value=$siteStatus;
        $siteStatusRecored->save();

        $visibleRecored = $setting->where('key', 'visibility')->first();
        $visibleRecored->value=json_encode($visible);
        $visibleRecored->save();

        $TermPageContentRecored = $setting->where('key', 'TermPageContent')->first();
        $TermPageContentRecored->value=$TermPageContent;
        $TermPageContentRecored->save();
        

        $CarouselImageRecord = $setting->where('key', 'CarouselImage')->first();
        $CarouselImageRecord->value=json_encode($request->subFiles);
        $CarouselImageRecord->save();

  
    }


        /**
     * Update the specified resource in storage.
     */
    public function updateSetting(UpdateSettingRequest $request)
    {
        $siteStatus = $request->siteStatus ? Status::PUBLISHED->value : Status::DRAFT->value;
        $TermPageContent = $request->TermPageContent;

        $visible = [
            "CanReview" => $request->CanReview ? true : false,
            "CanComment" => $request->CanComment ? true : false,
            "showCarousel" => $request->showCarousel ? true : false,
            "showHeadrLinks" => $request->showHeadrLinks ? true : false,
            "showTermPage" => $request->showTermPage ? true : false,
            "showFooterLinks" => $request->showFooterLinks ? true : false
        ];


        $setting = Setting::all();

        $siteStatusRecored = $setting->where('key', 'siteStatus')->first();
        $siteStatusRecored->value=$siteStatus;
        $siteStatusRecored->save();

        $visibleRecored = $setting->where('key', 'visibility')->first();
        $visibleRecored->value=json_encode($visible);
        $visibleRecored->save();

        $TermPageContentRecored = $setting->where('key', 'TermPageContent')->first();
        $TermPageContentRecored->value=$TermPageContent;
        $TermPageContentRecored->save();
        

        // $CarouselImageRecord = $setting->where('key', 'CarouselImage')->first();
        // $CarouselImageRecord->value=json_encode($request->subFiles);
        // $CarouselImageRecord->save();

        return redirect()->route('admin.setting.index')->with('OkToast', 'تم اضاقة المنتج');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
