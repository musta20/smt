<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($storename, $storename2): void
    {

        $tenant =  Tenant::create([
            'name' =>  $storename,
            'theme' =>  ""
        ]);
        $tenant2 =  Tenant::create([
            'name' =>  $storename2,
            'theme' =>  ""
        ]);


        $tenant->domains()->create([
            'domain' =>  $storename . '.' . config('app.domain'),
            'name' =>  $storename
        ]);

        $tenant2->domains()->create([
            'domain' =>  $storename2 . '.' . config('app.domain'),
            'name' =>  $storename2

        ]);
    }
}
