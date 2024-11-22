<?php

namespace Database\Seeders;

use App\Enums\Store\MediaType;
use App\Models\Category;
use App\Models\Media;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function addMediaImage($tenant, $product, $tenantpath)
    {
        $imagePath = storage_path() . '/Images/';

        for ($i = 0; $i < 3; $i++) {
            $productMediaImage = collect(SeederData::$imageName)->random();
            Process::run('cp ' . $imagePath . '/' . $productMediaImage . ' ' . $tenantpath . '/' . $productMediaImage);

            Media::create(
                [
                    'name' => $productMediaImage,
                    'type' => MediaType::IMAGE->value,
                    'product_id' => $product->id,
                    'tenant_id' => $tenant->id,
                ]
            );

        }
    }

    public function run($storename, $storename2): void
    {

        $tenant = Tenant::get()->where('name', $storename)->first();

        $tenant2 = Tenant::get()->where('name', $storename2)->first();

        $tenantpath = storage_path() . '/tenant' . $tenant->id . '/app/public/media';

        $tenantpath2 = storage_path() . '/tenant' . $tenant2->id . '/app/public/media';

        $category = Category::get()->where('tenant_id', $tenant->id);
        $category2 = Category::get()->where('tenant_id', $tenant2->id);
        $store = Store::get()->where('title', $storename2)->first();
        $store2 = Store::get()->where('title', $storename2)->first();

        $imagePath = storage_path() . '/Images/';
        $tenantpath = storage_path() . '/tenant' . $tenant->id . '/app/public/media';

        for ($count = 0; $count < 60; $count++) {

            $productImage = collect(SeederData::$imageName)->random();

            Process::run('cp ' . $imagePath . '/' . $productImage . ' ' . $tenantpath . '/' . $productImage);

            $product = Product::factory()
                ->state(new Sequence(
                    fn (Sequence $sequence) => [
                        'name' => collect(SeederData::$arabicProduct)->random(),
                        'image' => $productImage,
                    ]
                ))
                ->hasAttached(
                    $category->random(3),
                    ['tenant_id' => $tenant->id]
                )->for($tenant)->for($store)->create();

            $this->addMediaImage($tenant, $product, $tenantpath);

            Product::factory()->hasAttached(
                $category2->random(3),
                ['tenant_id' => $tenant2->id]
            )->for($tenant2)->for($store2)->withImage($tenantpath2)->create();
        }
    }
}
