<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
        protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word(),
            'category_id'=>null,
            'store_id'=>Store::factory()->create(),
            'tenant_id'=>Tenant::factory(),

        ];
    }
}
