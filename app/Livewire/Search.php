<?php

namespace App\Livewire;


use App\Enums\Store\Sorting;
use App\Enums\Store\Status;
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

    public function mount($search)
    {
        if ($search) {
            $this->reset('searchword');

        }
    }

    public function render()
    {
        dd( $this->products);

        $this->products = ModelsProduct::where('name', 'like', '%' . $this->searchword . '%')->where('status', Status::PUBLISHED->value)->get();

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
            }

            return view('livewire.search');
        }
    }
}
