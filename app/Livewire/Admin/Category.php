<?php

namespace App\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{

    public $CurrentProduct;
    public $category;
    public function openModel($id)
    {
        $this->CurrentProduct= $this->category->find($id);
        $this->dispatch('modalbox'); 
    }
    
    public function mount(){
        $this->category = ModelsCategory::where('tenant_id',tenant('id'))->get();
    }

    public function render()
    {
        return themeView('livewire.admin.category');
    }
}
