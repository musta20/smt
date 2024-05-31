<?php

namespace Database\Seeders;

use App\Enums\Identity\Role;
use App\Models\Permission;
use App\Models\Role as ModelsRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as PermissionModelsRole;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // PermissionModelsRole
        $Admin = ModelsRole::create(['name' => Role::ADMIN->value]);
        $Vender = ModelsRole::create(['name' => Role::VENDER->value]);
        $Customer = ModelsRole::create(['name' => Role::CUSTOMER->value]);

        $MangmentVender = Permission::create(['name' =>  Role::VENDER->value]);

        $Vender->givePermissionTo($MangmentVender);
        $Admin->givePermissionTo($MangmentVender);


    }
}
