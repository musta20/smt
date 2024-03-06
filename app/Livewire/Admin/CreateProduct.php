<?php

namespace App\Livewire\Admin;

use App\Enums\Store\MediaType;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;

    public $productCategorys = [];

    public $product;

    public $CanComment = false;

    public $CanReview = false;

    public $status = false;

    public $subFiles = [];

    public $photo;

    #[On('addImage')] 
    public function updateImageList($imgename)
    {
        $this->subFiles[$imgename] = MediaType::IMAGE->value;
    }
    #[On('removeImage')] 
    public function removeImageList($imgename)
    {
        $this->subFiles = array_filter($this->subFiles, fn ($type, $name) => $name != $imgename, ARRAY_FILTER_USE_BOTH);
    }



    public function removeImage()
    {
        
        $this->reset('photo');
    }

    public function addCategory($categoryId)
    {

        if (!in_array($categoryId, $this->productCategorys)) {
            $this->productCategorys[] = $categoryId;
        }
    }

    public function removeCategory($categoryId)
    {
        $copy = $this->productCategorys;


        $this->productCategorys = array_filter($copy, fn ($item) =>  $categoryId != $item);
    }

    public function openModel($id)
    {
        $this->dispatch('modalbox');
    }



    public function render()
    {



        return themeView('livewire.admin.create-product', [
            "categories" => Category::get(),

        ]);
    }
}
