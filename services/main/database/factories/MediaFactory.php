<?php

namespace Database\Factories;

use App\Enums\Store\MediaType;
use App\Models\Media;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Media>
 */
class MediaFactory extends Factory
{
    protected $model = Media::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'type' => MediaType::IMAGE->value,
            'user_id' => User::factory()->create(),
            // 'tenant_id'=>Tenant::factory(),

        ];
    }
}
