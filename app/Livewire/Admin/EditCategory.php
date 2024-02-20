<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;

class EditCategory extends Component
{
    
    public $CurrentProduct;
    public $category;
    public $categories;

    public function openModel($id)
    {
        $this->CurrentProduct= $this->categories->find($id);
        $this->dispatch('modalbox'); 
    }
    
    public function mount($category){
        $this->categories = Category::all();

        $this->category =$category;
    }

 
    public function render()
    {
        return view(
            'livewire.admin.edit-category',
            ["category" => Category::all()]
        );
    }
}
