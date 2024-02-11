<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\Store;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->realText(
                maxNbChars: 160,
                indexSize: 4
            ),
            'price'=>rand(456,5100),
            'order_url'=>$this->faker->url(),
            'image'=>$this->faker->imageUrl(250,160),
            'older_price'=>rand(465,3351),
            'order_count'=>rand(465,3351),
            'discount'=>rand(10,100),
            'rating'=>rand(1,5),
            'category_id'=>Category::factory()->create(),
            'store_id'=>Store::factory()->create(),
            'tenant_id'=>Tenant::factory(),

           'created_at'=>$this->faker->dateTime()
        ];
    }
}
