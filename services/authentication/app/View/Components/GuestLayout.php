<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public $thecomponent = 'hi uam commiug from the class pgp component';

    public function render(): View
    {

        return themeView('layouts.guest');
    }
}
