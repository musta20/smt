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
        $this->products = ModelsProduct::where('name', 'like', '%' . $this->searchword . '%')->get();

        if ($this->filters['categoryId']) {

            $this->products = $this->products->filter(function ($item) {

                return   $item->categories->find($this->filters['categoryId']);
            });
        }


        if ($this->filters['sortType']) {

            switch ($this->filters['sortType']) {
                case Sorting::AVG_COUSTMER->value:
                    $this->products =   $this->products->sortByDesc('rating');
                    break;
                case Sorting::BEST_SELLING->value:
                    $this->products =   $this->products->sortByDesc('order_count');
                    break;
                case Sorting::NEWEST->value:
                    $this->products =   $this->products->sortByDesc('created_at');
                    break;
                case Sorting::HIGHT_TO_LOW->value:

                    $this->products =   $this->products->sortByDesc('price');
                    break;
                case Sorting::LOW_TO_HIGHT->value:
                    $this->products =   $this->products->sortBy('price');
                    break;
                case Status::PUBLISHED->value:
                    $this->products =   $this->products->where('status', Status::PUBLISHED->value);
                    break;
                case Status::DRAFT->value:
                    $this->products =   $this->products->where('status', Status::DRAFT->value);
                    break;
            }
        }

        return view('livewire.admin.product', [

            "allProducts" =>  $this->paginate($this->products, 10),
            "category" => Category::get(),
            "enumStatus" => Status::class

        ]);
    }
}
