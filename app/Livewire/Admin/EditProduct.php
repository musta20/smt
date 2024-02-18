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

    public $switcherToggle = [];

    public $CanComment;

    public $CanReview;

    public $status;

    public $files = [];

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

    public function settoogle($index)
    {
        $this->switcherToggle[$index] = !$this->switcherToggle[$index];
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


    public function mount($product)
    {
        $this->product = $product;
        $this->productCategorys = $product->categorys->pluck('id')->toArray();
        

        // $this->switcherToggle[0] = $product->status == Status::PUBLISHED ? true : false;
        // $this->switcherToggle[1] = $product->visible['CanReview'];
        // $this->switcherToggle[2] = $product->visible['CanComment'];
        
        $this->status = $product->status == Status::PUBLISHED ? true : false;
        $this->CanReview = $product->visible['CanReview'];
        $this->CanComment = $product->visible['CanComment'];

        

        $this->files = $product->media->pluck('type.value', 'name')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.edit-product', [
            "category" => Category::get(),

        ]);
    }
}
