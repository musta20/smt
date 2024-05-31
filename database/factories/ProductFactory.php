<?php

namespace Database\Factories;

use App\Enums\Store\Status;
use App\Models\Product;
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
            'price' => rand(456, 5100),
            'status' => Status::getRandomStatus()->value,
            'order_url' => $this->faker->url(),
            'image' => $this->faker->imageUrl(250, 160),
            'older_price' => rand(465, 3351),
            'order_count' => rand(465, 3351),
            'view_count' => rand(3, 7465),
            'discount' => rand(10, 100),
            'rating' => rand(1, 5),
            'visible' => ['CanReview' => $this->faker->boolean()],

            'created_at' => $this->faker->dateTime(),
        ];
    }

    public function withReview()
    {

        return $this->state(fn (array $attributes) => ['visible' => ['CanReview' => true]]);

    }

    public function withRealImage($path): Factory
    {

        return $this->state(fn (array $attributes) => ['image' => $path]);
    }

    public function withImage($path): Factory
    {

        return $this->state(fn (array $attributes) => ['image' => $this->faker->image($path, 640, 480, 'products', false)]);
    }

    //            'image' => $this->faker->image(storage_path(),250, 160),

}
