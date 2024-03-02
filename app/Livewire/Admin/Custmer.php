<?php

namespace App\Livewire\Admin;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;


class Custmer extends Component
{
    
    public $users;
    public $user;

    public function openModel($id)
    {
        $this->user= $this->users->find($id);
        $this->dispatch('modalbox'); 
    }

    public function render()
    {
        return view('livewire.admin.custmer');
    }
}
