<?php

namespace Database\Factories;

use App\Enums\Store\Currency;
use App\Enums\Store\Status;
use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
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
            'name'=>$this->faker->word(),
            'logo' => $this->faker->imageUrl(
                width: 150,
                height: 100,
                format: 'png'
            ),
            'cover' => $this->faker->imageUrl(600, 400),
            'description' => $this->faker->realText(
                maxNbChars: 300,
                indexSize: 4
            ),
            'tenant_id'=>Tenant::factory(),

            'currency' => Currency::EGP,
            'Status' => Status::CREATED,
            'user_id' => User::factory()->create()
        ];
    }
}
