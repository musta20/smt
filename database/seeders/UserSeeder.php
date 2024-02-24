<?php

namespace Database\Seeders;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Models\Role as ModelsRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($tenant)
    {
        $user =  User::factory()->for($tenant)->create([
            'name' => 'musta',
            'last_name' => 'osman',
            'role' => Role::VENDER,
            'provider' => Provider::EMAIL,
            'avatar' => 'https://github.com/musta20.png',
            'email' => 'admin@admin.com',
            'password' => Hash::make('1234')
        ]);
        $vernderRole = ModelsRole::findByName(Role::VENDER->value);

        $user->assignRole($vernderRole);

        return $user;
    }
}
