<?php

namespace App\Livewire\Admin;

use App\Enums\Store\MediaType;
use App\Enums\Store\Status;
use App\Models\Setting as ModelsSetting;
use App\Models\Store;
use Livewire\Attributes\On;
use Livewire\Component;

class Setting extends Component
{
    public $setting;

    public $siteStatus;

    public $CanComment;

    public $CanReview;

    public $showCarousel;

    public $showFooterLinks;

    public $showAboutPage;

    public $aboutPageContent;

    public $showHeadrLinks;

    public $AllowUsers;

    public $OrderWithoutUsers;

    public $showTermPage;

    public $TermPageContent;

    public $store;

    public $OnlycustomerCanReview;

    public $subFiles = [];

    #[On('addImage')]
    public function updateImageList($imgename)
    {

        $this->subFiles[$imgename] = MediaType::IMAGE->value;
        $CarouselImageRecord = $this->setting->where('key', 'CarouselImage')->first();
        $CarouselImageRecord->value = json_encode($this->subFiles);
        $CarouselImageRecord->save();

    }

    #[On('removeImage')]
    public function removeImageList($imgename)
    {
        $this->subFiles = array_filter($this->subFiles, fn ($type, $name) => $name != $imgename, ARRAY_FILTER_USE_BOTH);
        $CarouselImageRecord = $this->setting->where('key', 'CarouselImage')->first();
        $CarouselImageRecord->value = json_encode($this->subFiles);
        $CarouselImageRecord->save();

    }

    public function mount()
    {
        $this->setting = ModelsSetting::where('tenant_id', tenant('id'))->get();
        $this->store = Store::where('tenant_id', tenant('id'))->first();

        $this->siteStatus = $this->setting->where('key', 'siteStatus')->first()->value == Status::PUBLISHED->value ? true : false;

        $visibility = json_decode($this->setting->where('key', 'visibility')->first()->value);

        $this->CanReview = $visibility->CanReview;
        $this->showCarousel = $visibility->showCarousel;
        $this->showFooterLinks = $visibility->showFooterLinks;
        $this->showTermPage = $visibility->showTermPage;
        $this->showAboutPage = $visibility->showAboutPage;
        $this->showHeadrLinks = $visibility->showHeadrLinks;
        $this->AllowUsers = $visibility->AllowUsers;
        $this->OnlycustomerCanReview = $visibility->OnlycustomerCanReview;

        $this->OrderWithoutUsers = $visibility->OrderWithoutUsers;

        $this->TermPageContent = $this->store->term;
        $this->aboutPageContent = $this->store->about;

        $this->subFiles = (array) json_decode($this->setting->where('key', 'CarouselImage')->first()->value);

    }

    public function render()
    {
        return view('livewire.admin.setting');
    }
}
