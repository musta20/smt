<?php

namespace Database\Factories;

use App\Models\Media;
use App\Models\ProductMedia;
use App\Models\Product;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductMedia>
 */
      
class ProductMediaFactory extends Factory
{
        protected $model = ProductMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
          'product_id'=>Product::factory()->create(),
          'media_id'=>Media::factory()->create() ,
          'tenant_id'=>Tenant::factory(),
 
        ];
    }
}
