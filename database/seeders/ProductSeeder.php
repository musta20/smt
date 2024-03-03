<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder

{


    /**
     * Run the database seeds.
     */
    public function run($storename, $storename2): void
    {

        $tenant = Tenant::get()->where('name',$storename)->first();

        $tenant2 = Tenant::get()->where('name',$storename2)->first();

        $tenantpath = storage_path() . '/tenant' . $tenant->id . '/app/public/media';
        
        $tenantpath2 = storage_path() . '/tenant' . $tenant2->id . '/app/public/media';

        $category = Category::get()->where('tenant_id', $tenant->id);
        $category2 = Category::get()->where('tenant_id', $tenant2->id);
        $store = Store::get()->where('title', $storename2)->first();
        $store2 = Store::get()->where('title', $storename2)->first();

        for ($count = 0; $count < 60; $count++) {

            Product::factory()->hasAttached(
                $category->random(3),
                ['tenant_id' => $tenant->id]
            )->for($tenant)->for($store)->withImage($tenantpath)->create();


            Product::factory()->hasAttached(
                $category2->random(3),
                ['tenant_id' => $tenant2->id]
            )->for($tenant2)->for($store2)->withImage($tenantpath2)->create();
        }
    }
}
