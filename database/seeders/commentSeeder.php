<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Product;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($storename,$storename2): void
    {
        $tenant = Tenant::get()->where('name',$storename)->first();

        $tenant2 = Tenant::get()->where('name',$storename2)->first();


        $products  = Product::get()->where('tenant_id',$tenant->id);
        $products2  = Product::get()->where('tenant_id',$tenant2->id);

        $users = User::get()->where('tenant_id',$tenant->id);
        $users2 = User::get()->where('tenant_id',$tenant2->id);

        foreach ($products as $product) {

            Comment::factory()->for($product)->for($tenant)->for($users->random())->create();
            Comment::factory()->for($product)->for($tenant)->for($users->random())->create();
        }
      
        foreach ($products2 as $product) {

            Comment::factory()->for($product)->for($tenant2)->for($users2->random())->create();
            Comment::factory()->for($product)->for($tenant2)->for($users2->random())->create();
        }
        

    }
}
