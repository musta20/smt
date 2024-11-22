<?php

namespace Database\Factories;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),

            'provider' => Provider::EMAIL->value,

            //'role' => Role::CUSTOMER->value,
            //Role::CUSTOMER->value
            'password' => Hash::make('password'),
            'tenant_id' => Tenant::factory(),
            'avatar' => $this->faker->imageUrl(550, 400),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function withVenderRole()
    {
        return $this->afterMaking(function (User $user) {
            $user->assignRole(Role::VENDER->value);
        });
    }

    public function withrole($role): static
    {
        return $this->afterMaking(function (User $user) use ($role) {
            $user->assignRole($role);
        });
    }
}
