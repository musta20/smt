<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public $storename = 'musta';
    public $storename2 = 'reem';

    public $tenant;
    public $tenant2;
    public $user;
    public function run(): void
    {


        $this->callWith(
            [ 
                TenantSeeder::class,
                PermissionSeeder::class,
                UserSeeder::class,
                StoreSeeder::class,
                CategorySeeder::class,
                ProductSeeder::class,
                SettingSeeder::class,
                SettingSeeder::class,
                CommentSeeder::class
            ],
            [
                "storename" => $this->storename, "storename2" => $this->storename2
            ]
        );
        

    }
}
