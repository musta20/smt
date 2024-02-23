<?php

namespace App\Livewire\Admin;

use App\Enums\Store\Status;
use App\Models\Setting as ModelsSetting;
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

    public $showTermPage;

    public $TermPageContent;

    public $subFiles = [];

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

        
        $this->TermPageContent = $this->setting->where('key', 'TermPageContent')->first()->value;
        $this->subFiles = json_decode($this->setting->where('key', 'CarouselImage')->first()->value);
    }

    public function render()
    {
        return view('livewire.admin.setting');
    }
}
