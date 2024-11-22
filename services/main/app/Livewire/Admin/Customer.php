<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Customer extends Component
{
    public $users;

    public $user;

    public function openModel($id)
    {
        $this->user = $this->users->find($id);
        $this->dispatch('modalbox');
    }

    public function render()
    {
        return view('livewire.admin.customer');
    }
}
