<?php

namespace App\Livewire\Admin;

use App\Models\Store as StoreModel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Store extends Component
{
    use WithFileUploads;
    public $photo;
    public $faviconImge;
    public $store;
    public $SocialMedia;
    public function updatedPhoto()
    {
        $imgename  = $this->photo->store();
        $this->store->logo = $imgename;
        $this->store->save();
    }

    public function removeImage()
    {
        Storage::disk('media')->delete($this->store->logo);
        $this->store->logo = null;
        $this->store->save();
    }

    public function updatedFaviconImge()
    {
        $imgename  = $this->faviconImge->store();
        $this->store->favicon = $imgename;
        $this->store->save();
    }

    public function removeFavicon()
    {
        Storage::disk('media')->delete($this->store->favicon);
        $this->store->favicon = null;
        $this->store->save();
    }

    public function mount(){

        $this->store=StoreModel::first();

        $this->SocialMedia = json_decode($this->store->SocialMedia);

    }
    public function render()
    {
        return themeView('livewire.admin.store');
    }
}
