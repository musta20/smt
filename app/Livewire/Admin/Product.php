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
    public $products;

    public function openModel($id)
    {
        $this->CurrentProduct = $this->products->find($id);
        $this->dispatch('modalbox');
    }


    public function filter($filterType, $Value)
    {

        $this->filters[$filterType] = $Value;
    }



    public function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
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
        $products = ModelsProduct::orderByType($this->filters)->where('name', 'like', '%' . $this->searchword . '%')
        ->paginate(10);


      
            
            return view('livewire.admin.product', [

                "allProducts" => $products ,
                "category" => Category::get(),
                "enumStatus" => Status::class

            ]);
    }
}
