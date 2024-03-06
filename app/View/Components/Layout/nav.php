<?php

namespace App\View\Components\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class nav extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return themeView('components.layout.nav');
    }
}

// <?php

// namespace App\View\Components\Layout;

// use App\Models\Setting;
// use App\Models\Store;
// use Closure;
// use Illuminate\Contracts\View\View;
// use Illuminate\View\Component;

// class layout extends Component
// {
//     /**
//      * Create a new component instance.
//      */
    

//      public function __construct(
//         public Store  $store,
//         public Setting  $setting,
//         public String  $logo,
//         public String  $favicon,
//         public String  $title,
//         public String  $description,
//         )
//     {
//      //   public $setting = Setting::where('tenant_id',tenant('id'))->get();
//      dd('loded');

//          $store = Store::where('tenant_id',tenant('id'))->first();
//          $logo =  $store->logo;
//          $favicon =  $store->favicon;
//          $title =  $store->title;
//          $description =  $store->description;
//       //  public $siteStatusRecored =  $setting->where('key', 'siteStatus')->first();
//     }      


//     /**
//      * Get the view / contents that represent the component.
//      */
  
//     public function render(): View|Closure|string
//     {
        
//         return view('components.layout');
//     }
// }
