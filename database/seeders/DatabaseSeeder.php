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
    public $storename = 'musta';
    public $storename2 = 'reem';

    public $tenant;
    public $tenant2;
    public $user;
    public function run(): void
    {


        $this->callWith(
            [ 
                TenantSeeder::class,
                permissionSeeder::class,
                UserSeeder::class,
                StoreSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                SettingSeeder::class

            ],
            [
                "storename" => $this->storename, "storename2" => $this->storename2
            ]
        );
        
        // $this->callWith(permissionSeeder::class);
        // $this->callWith(TenantSeeder::class, ["storename" => $this->storename, "storename2" => $this->storename2]);
        // $this->callWith(UserSeeder::class, ["storename" => $this->storename, "storename2" => $this->storename2]);
        // $this->callWith(StoreSeeder::class, ["storename" => $this->storename, "storename2" => $this->storename2]);
        // $this->callWith(CategorySeeder::class, ["storename" => $this->storename, "storename2" => $this->storename2]);
        
        // $userseed = new UserSeeder();
        // $this->user = $userseed->run($this->tenant);

        // $storeseed =  new StoreSeeder();
        // $store = $storeseed->run($this->tenant, $this->user, $this->storename);

        // $category1 =   Category::factory(10)->for($this->tenant)->for($store)->create();


        // $this->callWith(
        //     [
        //         SettingSeeder::class,
        //         ProductSeeder::class,
        //     ],
        //     [
        //         "tenant" => $this->tenant, "category" => $category1,
        //         "store" => $store
        //     ]
        // );
    }
}
