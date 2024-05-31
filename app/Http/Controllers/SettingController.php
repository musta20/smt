<?php

namespace App\Http\Controllers;

use App\Enums\Store\Status;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use App\Models\Store;

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     */
    public function updateSetting(UpdateSettingRequest $request)
    {
        $siteStatus = $request->siteStatus ? Status::PUBLISHED->value : Status::DRAFT->value;
        $TermPageContent = $request->TermPageContent;
        $aboutPageContent = $request->aboutPageContent;

        $store = Store::where('tenant_id',tenant('id'))->first();

        $store->term  = $TermPageContent;
        $store->about  = $aboutPageContent;

        $store->save();
        $visible = [
            "CanReview" => $request->CanReview ? true : false,
            "showCarousel" => $request->showCarousel ? true : false,
            "showAboutPage" => $request->showTermPage ? true : false,

            "showHeadrLinks" => $request->showHeadrLinks ? true : false,
            "showTermPage" => $request->showTermPage ? true : false,
            "showFooterLinks" => $request->showFooterLinks ? true : false,

            "AllowUsers" => $request->AllowUsers ? true : false,
            "OrderWithoutUsers" => $request->OrderWithoutUsers ? true : false,

            "OnlycustomerCanReview" => $request->OnlycustomerCanReview ? true : false

            

        ];
        $tenant = tenant();

        if ($siteStatus != Status::PUBLISHED->value) {
            $tenant->putDownForMaintenance(['allowed' => ['/admin']]);
        } else {
            $tenant->update(['maintenance_mode' => null]);
        }

        $setting = Setting::where('tenant_id',tenant('id'))->get();

        $siteStatusRecored = $setting->where('key', 'siteStatus')->first();
        $siteStatusRecored->value = $siteStatus;
        $siteStatusRecored->save();

        $visibleRecored = $setting->where('key', 'visibility')->first();
        $visibleRecored->value = json_encode($visible);
        $visibleRecored->save();

        return redirect()->route('admin.setting.index')->with('OkToast', __('messages.setting updated'));
    }
}
