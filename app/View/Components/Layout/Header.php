<?php

namespace App\View\Components\Layout;

use App\Models\Setting;
use App\Models\Store;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */

    public function __construct(
        public string $logo
    )
    {

    }      


    /**
     * Get the view / contents that represent the component.
     */
  
    public function render(): View|Closure|string
    {      
        

        return view('components.layout.header');
    }
}
