<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
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
            'name' => $storename
        ]);

        $store2 =  Store::factory()->for($tenant2)->for($user2)->create([
            'name' => $storename2
        ]);







        $category1 = Category::factory(10)->for($tenant)->for($store)->create();
        $category2 = Category::factory(10)->for($tenant2)->for($store2)->create();

        // Product::factory()->for($tenant)->for($store)->for($category1->random(1))->create([
        //     'name' => 'Squadra Mesh Leather Panel Side Elastic Side Slip-On Shoes for Men',
        //     'description' => "About this item
        //     Style : Experience simplicityshoes are lightweight to survive the day's fatigue in total comfort.
        //      ZONTA offers a lightweight and comfortable experience to enjoy every step of your day without fatigue.",
        //     'price' => 350
        // ]);
        //dd($category1);

        foreach ($category1 as $item) {
            Product::factory(10)->for($tenant)->for($store)->for($item)->create();
        }

        foreach ($category2 as $item) {
            Product::factory(10)->for($tenant2)->for($store2)->for($item)->create();
        }
    }
}
