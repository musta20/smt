<?php

namespace Database\Seeders;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Models\Role as ModelsRole;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($storename,$storename2)
    {
        $tenant = Tenant::get()->where('name',$storename)->first();

        $tenant2 = Tenant::get()->where('name',$storename2)->first();
       
        $vernderRole = ModelsRole::findByName(Role::VENDER->value);

        $customerRole = ModelsRole::findByName(Role::CUSTOMER->value);
        
        $user =  User::factory()->for($tenant)->withrole($vernderRole)->create([
            'name' => $storename,
            'last_name' => 'osman',
            'provider' => Provider::EMAIL,
            'avatar' => 'https://github.com/musta20.png',
            'email' => $storename.'@'.$storename.'.com',
            'password' => Hash::make('1234')
        ]);

        $user2 =  User::factory()->for($tenant2)->withrole($vernderRole)->create([
            'name' => $storename2,
            'last_name' => 'reem',
            'provider' => Provider::EMAIL,
            'avatar' => 'https://github.com/musta20.png',
            'email' => $storename2.'@'.$storename2.'.com',
            'password' => Hash::make('1234')
        ]);

        User::factory()->for($tenant2)->withrole($customerRole)->create([
            'name' => 'userTest',
            'last_name' => 'userTest',
            'provider' => Provider::EMAIL,
            'avatar' => 'https://github.com/musta20.png',
            'email' => 'userTest@userTest.com',
            'password' => Hash::make('1234')
        ]);

        User::factory()->for($tenant)->withrole($customerRole)->create([
            'name' => 'userTest',
            'last_name' => 'userTest',
            'provider' => Provider::EMAIL,
            'avatar' => 'https://github.com/musta20.png',
            'email' => 'userTest2@userTest.com',
            'password' => Hash::make('1234')
        ]);
        User::factory(10)->for($tenant)->withrole($customerRole)->create();
        User::factory(10)->for($tenant2)->withrole($customerRole)->create();
    }
}
