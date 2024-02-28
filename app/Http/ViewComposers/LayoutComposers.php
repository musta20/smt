<?php

namespace App\Http\ViewComposers;

use App\Models\Store;
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
        // Dependencies automatically resolved by service container...
        $uri = url()->current();

        //dd(strpos($uri, 'admin'));

        if (!strpos($uri, 'admin') &&  tenant('id')) {
            
            $store =  Store::where('tenant_id', tenant('id'))->first();
            $this->props = [
                "logo" =>  $store->logo,
                "favicon" =>  $store->favicon,
                "title" => $store->title,
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
