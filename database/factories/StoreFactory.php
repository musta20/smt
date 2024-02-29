<?php

namespace Database\Factories;

use App\Enums\Store\Currency;
use App\Enums\Store\Status;
use App\Models\Store;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    protected $model = Store::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'domain'=>$this->faker->word(),
            'title'=>$this->faker->word(),
        
            'cover' => $this->faker->imageUrl(600, 400),
            'description' => $this->faker->realText(
                maxNbChars: 300,
                indexSize: 4
            ),
            'description' => $this->faker->realText(
                maxNbChars: 600,
                indexSize: 4
            ),
            'term' => $this->faker->realText(
                maxNbChars: 900,
                indexSize: 4
            ),
            'about' => $this->faker->realText(
                maxNbChars: 900,
                indexSize: 4
            ),
            // 'tenant_id'=>Tenant::factory()->create(),
            // 'user_id' => User::factory()->create(),
            'logo'=>'logo-icon.svg',
            'favicon'=>'favicon.ico',
            'currency' => Currency::EGP,
            'Status' => Status::CREATED,
        ];
    }


    public function withLogo($path): Factory
    {

        return $this->state(fn (array $attributes) => ['logo' => $this->faker->image($path, 100, 100, 'products', false)]);
    }

    public function withFavicon($path): Factory
    {

        return $this->state(fn (array $attributes) => ['favicon' => $this->faker->image($path, 100, 100, 'products', false)]);
    }

}
