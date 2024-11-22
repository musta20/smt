<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Store;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($storename, $storename2): void
    {
        $tenant = Tenant::get()->where('name', $storename)->first();

        $tenant2 = Tenant::get()->where('name', $storename2)->first();

        $store = Store::where('title', $storename2)->get()->first();
        $store2 = Store::where('title', $storename2)->get()->first();

        Category::factory()->count(10)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['name' => collect(SeederData::$arabicCategories)->random()],
            ))
            ->for($tenant)->for($store)->create();

        Category::factory()->count(10)
            ->state(new Sequence(
                fn (Sequence $sequence) => ['name' => collect(SeederData::$arabicCategories)->random()],
            ))
            ->for($tenant2)->for($store2)->create();
    }
}
