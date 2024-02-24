<?php

namespace App\Livewire\Admin;

use App\Enums\Store\MediaType;
use App\Enums\Store\Status;
use App\Models\Setting as ModelsSetting;
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

    public $showHeadrLinks;

    public $AllowUsers;

    public $OrderWithoutUsers;

    public $showTermPage;

    public $TermPageContent;

    public $subFiles = [];

    #[On('addImage')] 
    public function updateImageList($imgename)
    {

        $this->subFiles[$imgename] = MediaType::IMAGE->value;
        $CarouselImageRecord = $this->setting->where('key', 'CarouselImage')->first();
        $CarouselImageRecord->value=json_encode($this->subFiles);
        $CarouselImageRecord->save();

    }
    
    #[On('removeImage')] 
    public function removeImageList($imgename)
    {
        $this->subFiles = array_filter($this->subFiles, fn ($type, $name) => $name != $imgename, ARRAY_FILTER_USE_BOTH);
        $CarouselImageRecord = $this->setting->where('key', 'CarouselImage')->first();
        $CarouselImageRecord->value=json_encode($this->subFiles);
        $CarouselImageRecord->save();

    }

    public function mount()
    {
        $this->setting = ModelsSetting::all();

        $this->siteStatus = $this->setting->where('key', 'siteStatus')->first()->value == Status::PUBLISHED->value ? true : false;

        $visibility = json_decode($this->setting->where('key', 'visibility')->first()->value);

        $this->CanReview = $visibility->CanReview;
        $this->CanComment = $visibility->CanComment;
        $this->showCarousel = $visibility->showCarousel;
        $this->showFooterLinks = $visibility->showFooterLinks;
        $this->showTermPage = $visibility->showTermPage;
        $this->showHeadrLinks = $visibility->showHeadrLinks;

        $this->AllowUsers = $visibility->AllowUsers;
        $this->OrderWithoutUsers = $visibility->OrderWithoutUsers;
    
        
        $this->TermPageContent = $this->setting->where('key', 'TermPageContent')->first()->value;

        $this->subFiles = (array) json_decode($this->setting->where('key', 'CarouselImage')->first()->value);


        
    }

    public function render()
    {
        return view('livewire.admin.setting');
    }
}
