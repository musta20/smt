<?php

namespace App\Livewire\Admin;

use App\Enums\Store\Sorting;
use App\Models\Category;
use App\Models\Product as ModelsProduct;
use Livewire\Component;
use Livewire\WithPagination;

class Product extends Component
{
    use WithPagination;


    public $query = '';
    public $categoryId = '';
    public $sortType = '';

    function sortby($sort)
    {

        $this->sortType = $sort;
        //$this->refresh();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function clear()
    {
        if (!$this->query) $this->reset('query');
    }

    // public function selectCategory()
    // {

    //    // $this->resetPage();

    //     //dd($this->categoryId);
    // }


    public function render()
    {
        if ($this->categoryId) {
            $products = ModelsProduct::where('category_id', $this->categoryId)->where('category_id', $this->categoryId)->paginate(10);
        } else {
            $products = ModelsProduct::where('name', 'like', '%' . $this->query . '%')->paginate(10);
        }
        
        if ($this->sortType) {

            switch ($this->sortType) {
                case Sorting::BEST_SELLING->value:
                    break;
                case Sorting::NEWEST->value:
                    # code...
                    break;
                case Sorting::HIGHT_TO_LOW->value:

                   // dd($this->sortType);

                     $products->sortByDesc('price');
                    break;
                case Sorting::LOW_TO_HIGHT->value:
                    # code...
                    break;
            
            }
        }

        return view('livewire.admin.product', [

            "products" => $products,
            "category" => Category::get()

        ]);
    }
}
