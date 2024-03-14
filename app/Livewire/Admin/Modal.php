<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Modal extends Component
{
    public function close(){
        dd('close');
    }
    public function render()
    {
        return view('livewire.admin.modal');
    }
}
