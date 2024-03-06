<?php

namespace App\Livewire\Admin;

use App\Enums\Store\Sorting;
use App\Enums\Store\Status;
use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class Product extends Component
{
    use WithPagination;


    public $filters = [
        "categoryId" => '',
        "sortType" => '',
    ];
    public $CurrentProduct;
    public $searchword = '';
    protected $products;

    public function openModel($id, $name)
    {

        $this->CurrentProduct = (object) [
            "name" => $name,
            "id" => $id
        ];

        $this->dispatch('modalbox');
    }


    public function filter($filterType, $Value)
    {

        $this->filters[$filterType] = $Value;
    }



    public function search()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->reset('searchword');
    }



    public function render()
    {


        $this->products = ModelsProduct::orderByType($this->filters)->where('name', 'like', '%' . $this->searchword . '%')
            ->paginate(10);

        return themeView('livewire.admin.product', [

            "allProducts" => $this->products,
            "category" => Category::get(),
            "enumStatus" => Status::class

        ]);
    }
}
