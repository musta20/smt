<?php

namespace App\Observers;

use App\Models\CategoryProduct;
use Exception;

class CategoryProductObserver
{

    public function creating(CategoryProduct $categoryProduct): void{
        dd(tenant('id'));
        if(tenant('id')){

            $categoryProduct->tenant_id=tenant('id');
        }else{
            throw new Exception("tenant not idenfited", 1);
            
        }
    }
    /**
     * Handle the CategoryProduct "created" event.
     */
    public function created(CategoryProduct $categoryProduct): void
    {
        //
    }

    /**
     * Handle the CategoryProduct "updated" event.
     */
    public function updated(CategoryProduct $categoryProduct): void
    {
        //
    }

    /**
     * Handle the CategoryProduct "deleted" event.
     */
    public function deleted(CategoryProduct $categoryProduct): void
    {
        //
    }

    /**
     * Handle the CategoryProduct "restored" event.
     */
    public function restored(CategoryProduct $categoryProduct): void
    {
        //
    }

    /**
     * Handle the CategoryProduct "force deleted" event.
     */
    public function forceDeleted(CategoryProduct $categoryProduct): void
    {
        //
    }
}
