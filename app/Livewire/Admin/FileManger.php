<?php

namespace App\Livewire\Admin;

use App\Enums\Store\MediaType;
use App\Models\Media;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Modelable;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileManger extends Component
{

    use WithFileUploads;

    #[Validate(['photo.*' => 'image|max:1024'])]
    public $photo;

    #[Modelable]
    public $files;

    public $product;

    public function updatedPhoto()
    {
        foreach ($this->photo as $imge) {
            $imgename  = $imge->store();

            $this->files[$imgename] = MediaType::IMAGE->value;

            if ($this->product) {
                Media::create(
                    [
                        'name' => $imgename,
                        'type' => MediaType::IMAGE->value,
                        'product_id' => $this->product->id,
                        'user_id' => auth()->user()->id,
                        'tenant_id' => tenant('id')
                    ]
                );
            }
        }
    }


    public function  remove($imageName)
    {
        if ($this->product) {
            Media::where('name', $imageName)->first()->delete();
        }
        Storage::disk('media')->delete($imageName);

        $this->files = array_filter($this->files, fn ($type, $name) => $name != $imageName, ARRAY_FILTER_USE_BOTH);
    }


    public function render()
    {
        return view('livewire.admin.file-manger');
    }
}
