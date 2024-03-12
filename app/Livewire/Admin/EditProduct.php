<?php

namespace App\Livewire\Admin;

use App\Enums\Store\Status;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public $product;

    public $CanComment;

    public $CanReview;

    public $status;

    public $subFiles = [];

    public $photo;

    public $productCategorys = [];

    public function updatedPhoto()
    {
        $imgename  = $this->photo->store();
        $this->product->image = $imgename;
        $this->product->save();
    }

    public function removeImage()
    {
        Storage::disk('media')->delete($this->product->image);
        $this->product->image = null;
        $this->product->save();
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

    public function mount($product)
    {

        $this->product = $product;

        $this->productCategorys = $product->categories->pluck('id')->toArray();
   
        $this->status = $product->status == Status::PUBLISHED->value ? true : false;

        $this->CanReview = $product->visible['CanReview'];


        $this->subFiles = $product->media->pluck('type.value', 'name')->toArray();
    }

    public function render()
    {
        return themeView('livewire.admin.edit-product', [
            "category" => Category::where('tenant_id',tenant('id'))->get(),

        ]);
    }
}
