<?php

namespace Database\Seeders;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Models\Product as ModelsProduct;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ProductSeeder extends Seeder  

{
    
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $storename = fake()->word();

        $tenant =  Tenant::create();

        $tenant->domains()->create([
            'domain' =>  $storename . '.' . env('APP_DOMAIN'),
            'name' =>  $storename
        ]);


        $user =  User::factory()->for($tenant)->create([
            'name' => $storename,
            'last_name' => $storename,

            'password' => Hash::make('1234')

        ]);

        $store =  Store::factory()->for($tenant)->for($user)->create([
            'name' => $storename
        ]);



        ModelsProduct::factory()->for($tenant)->for($store)->withImage(storage_path().'/tenant'.$tenant->id.'/app/public/media')->create();
    }
}
