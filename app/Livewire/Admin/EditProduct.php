<?php

namespace App\Livewire\Admin;

use App\Enums\Store\Status;
use App\Models\Category;
use Livewire\Component;

class EditProduct extends Component
{
    public $product;

    public $switcherToggle =[];
    
    public $files =[];
    
    public $productCategorys = [];


    public function settoogle($index){
        $this->switcherToggle[$index] = !$this->switcherToggle[$index];
    }

    public function addCategory($categoryId)
    {

        if (!in_array($categoryId,$this->productCategorys)) {
            $this->productCategorys[] = $categoryId;
        }
    }

    public function removeCategory($categoryId)
    {
        $copy = $this->productCategorys;
        

        $this->productCategorys = array_filter($copy, fn ($item) =>  $categoryId != $item);
        
        
    }


    public function mount($product)
    {
        $this->product = $product;
        $this->productCategorys = $product->categorys->pluck('id')->toArray();

       $this->switcherToggle[0] = $product->status == Status::PUBLISHED ? true:false;
       $this->switcherToggle[1] = $product->visible['CanRate'];
       $this->switcherToggle[2] = $product->visible['CanCommint'];
       
       $this->files = $product->media->pluck('type.value','name')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.edit-product', [
            "category" => Category::get(),

        ]);
    }
}
