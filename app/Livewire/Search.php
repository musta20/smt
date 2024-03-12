<?php

namespace App\Livewire;


use App\Enums\Store\Status;
use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Search extends Component
{
    use WithPagination;


    public $filters = [
        "categoryId" => '',
        "sortType" => '',
    ];
    public $CurrentProduct;
    public $searchword = '';
    public $products;


    public function filter($filterType, $Value)
    {

        $this->filters[$filterType] = $Value;
    }



    public function searchWord()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->reset('searchword');
    }

    public function mount($keyword)
    {
        if ($keyword) {
            $this->searchword = $keyword;
        }
    }

    public function render()
    {

        $products = ModelsProduct::orderByType($this->filters,false)->where('name', 'like', '%' . $this->searchword . '%')
            ->where('status', Status::PUBLISHED->value)
            ->paginate(10);

 
        return themeView('livewire.search', [

            "allProducts" => $products, 
            "category" => Category::where('tenant_id',tenant('id'))->get(),
            "enumStatus" => Status::class

        ]);
    }
}
