<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Enums\Store\Status;
use App\Models\Category;
use App\Models\CategoryProduct;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $storename = 'musta';
        $storename2 = 'reem';

        $tenant =  Tenant::create();
        $tenant2 =  Tenant::create();

        //  dd($tenant->id);

        $tenant->domains()->create([
            'domain' =>  $storename . '.' . env('APP_DOMAIN'),
            'name' =>  $storename
        ]);
        $tenant2->domains()->create([
            'domain' =>  $storename2 . '.' . env('APP_DOMAIN'),
            'name' =>  $storename2

        ]);

        $user =  User::factory()->for($tenant)->create([
            'name' => 'musta',
            'last_name' => 'osman',
            'role' => Role::VENDER,
            'provider' => Provider::EMAIL,
            'avatar' => 'https://github.com/musta20.png',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234')

        ]);

        $user2 =  User::factory()->for($tenant2)->create([
            'name' => 'reem',
            'last_name' => 'reem',
            'role' => Role::VENDER,
            'provider' => Provider::EMAIL,
            'avatar' => 'https://github.com/musta20.png',
            'email' => 'reem@reem.com',
            'password' => Hash::make('1234')

        ]);

    
        $store =  Store::factory()->for($tenant)->for($user)->create([
            'title' => $storename
        ]);

        $store2 =  Store::factory()->for($tenant2)->for($user2)->create([
            'title' => $storename2
        ]);


        $item = [
            
        ];
        Setting::factory()->count(4)->for($tenant)
        ->sequence([
            "key" => "siteStatus",
            "value" => Status::PUBLISHED->value,
        ],
        [
            "key" => "visibility",
            "value" => json_encode([
                "CanComment" => false,
                "CanReview" => false,
                "showCarousel" => true,
                "showFooterLinks" => false,
                "showTermPage" => false,
                "showHeadrLinks"=>false
            ])
        ],
        [
            "key" => "CarouselImage",
            "value" => json_encode([])
        ],
        [
            "key" => "TermPageContent",
            "value" => ""
        ])
        ->create();


     

        $tenantpath1 = storage_path() . '/tenant' . $tenant->id . '/app/public/media';
        $tenantpath2 = storage_path() . '/tenant' . $tenant2->id . '/app/public/media';
        $category1 =   Category::factory(10)->for($tenant)->for($store)->create();
        $category2 =   Category::factory(10)->for($tenant2)->for($store2)->create();


        for ($count = 0; $count < 20; $count++) {

            Product::factory()->hasAttached(
                $category1->random(3),
                ['tenant_id' => $tenant->id]
            )->for($tenant)->for($store)->withImage($tenantpath1)->create();

            Product::factory()->hasAttached(
                $category2->random(3),
                ['tenant_id' => $tenant2->id]
            )->for($tenant2)->for($store2)->withImage($tenantpath2)->create();
        }



        // Product::factory(40)->hasAttached(
        //     Category::factory(3)->for($tenant2)->for($store2)->create(),
        //     ['tenant_id' => $tenant2->id]
        // )->for($tenant2)->for($store2)->withImage($tenantpath2)->create();
        // $product1 =   Product::factory(80)->for($tenant)->for($store)->withImage($tenantpath1)->create();
        //  $product2 =   Product::factory(50)->for($tenant2)->for($store2)->withImage($tenantpath2)->create();
        // ModelsProduct::factory()->for($tenant)->for($store)->withImage(
        //     storage_path().'/tenant'.$tenant->id.'/app/public/media'
        //     )->create();
        // foreach ($product1 as $item) {
        //     // CategoryProduct::factory()->for($tenant)->create([
        //     //     'tenant_id'=
        //     //     'category_id'=>$category1->random()->id,
        //     //     'product_id'=>$item->id,
        //     // ]);
        //   //  CategoryProduct::factory()->for($item)->for($tenant)->for($category11->random())->create();
        // }
        // foreach ($product2 as $item) {
        //     // CategoryProduct::factory()->for($item)->for($tenant2)->for($category2->random())->create();
        //     // CategoryProduct::factory()->for($item)->for($tenant2)->for($category22->random())->create();
        // }
    }
}
