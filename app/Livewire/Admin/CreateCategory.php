<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class CreateCategory extends Component
{
    public $CurrentProduct;
    public $category;
    public $categories;

    public function openModel($id)
    {
        $this->CurrentProduct= $this->categories->find($id);
        $this->dispatch('modalbox'); 
    }
    
    public function mount(){
        $this->categories = Category::all();

        $this->category = Category::all();
    }

    public function render()
    {
        return view('livewire.admin.create-category');
    }
}
