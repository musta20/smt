<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use App\Models\Setting;
use App\Models\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LayoutComposers
{
    /**
     * The user repository implementation.
     *
     * @var UserRepository
     */
    protected $props = [];

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
     * @return void
     */
    public function __construct()
    {
        $uri = url()->current();


        if (!strpos($uri, 'admin') &&  tenant('id')) {
            $setting = Setting::where('tenant_id',tenant('id'))->get();

            $visibleRecored = $setting->where('key', 'visibility')->first();
         
            $visible = json_decode($visibleRecored?->value);

            $store =  Store::where('tenant_id', tenant('id'))->first();

            $SocialMedia = (array) json_decode($store->SocialMedia);

            $categoryLink = $visible->showHeadrLinks ? Category::latest()->get(['name', 'id']) : null;

            $userCart = [];
            
            if(Auth::check()){
                $userCart = Auth::user()->products;
            }

            $this->props = [
                "logo" =>  $store->logo,
                "SocialMedia" =>$SocialMedia,
                "favicon" =>  $store->favicon,
                "title" => $store->title,
                "visible"=>$visible ,
                "store"=>$store,
                "userCart"=>$userCart,
                "setting"=> $setting ,
                "categoryLink"=>$categoryLink,
                "description" =>  $store->description
            ];
        }
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with($this->props);
    }
}
