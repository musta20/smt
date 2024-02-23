<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder

{
    

    /**
     * Run the database seeds.
     */
    public function run($category,$tenant,$store): void
    {

        $tenantpath= storage_path() . '/tenant' . $tenant->id . '/app/public/media';

        for ($count = 0; $count < 20; $count++) {

            Product::factory()->hasAttached(
                $category->random(3),
                ['tenant_id' => $tenant->id]
            )->for($tenant)->for($store)->withImage($tenantpath)->create();
        }
    }
}
