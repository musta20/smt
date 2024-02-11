<?php

namespace App\Livewire\Admin;

use App\Enums\Store\Sorting;
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

    public $searchword = '';


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
        $products = ModelsProduct::where('name', 'like', '%' . $this->searchword . '%')->get();

        if ($this->filters['categoryId']) {

            $products = $products->where('category_id', $this->filters['categoryId']);
            
        }


        if ($this->filters['sortType']) {

            switch ($this->filters['sortType']) {
                case Sorting::AVG_COUSTMER->value:
                    $products =   $products->sortByDesc('rating');
                    break;
                case Sorting::BEST_SELLING->value:
                    $products =   $products->sortByDesc('order_count');
                    break;
                case Sorting::NEWEST->value:
                    $products =   $products->sortByDesc('created_at');
                    break;
                case Sorting::HIGHT_TO_LOW->value:

                    $products =   $products->sortByDesc('price');
                    break;
                case Sorting::LOW_TO_HIGHT->value:
                    $products =   $products->sortBy('price');
                    break;
            }
        }

        return view('livewire.admin.product', [

            "products" =>  $this->paginate($products, 10),
            "category" => Category::get()

        ]);
    }
}
