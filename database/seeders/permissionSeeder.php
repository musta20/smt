<?php

namespace Database\Seeders;

use App\Enums\Identity\Role;
use App\Models\Permission;
use App\Models\Role as ModelsRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role as PermissionModelsRole;

class permissionSeeder extends Seeder
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

        // $CustomerMangment = Permission::create(['name' => 'Customer']);
        // $CustomerSetting= Permission::create(['name' => 'Setting']);

        // $CategoryServices = Permission::create(['name' => 'Category/Services']);
        // $Setting = Permission::create(['name' => 'Setting']);
        // $Users = Permission::create(['name' => 'Users']);
        // $jobs = Permission::create(['name' => 'jobs']);
        // $Logs = Permission::create(['name' => 'Logs']);
        // $Employee = Permission::create(['name' => 'Employee']);
        // $Reviews = Permission::create(['name' => 'Reviews']);
        // $task = Permission::create(['name' => 'Task']);
        // $TaskMangment = Permission::create(['name' => 'TaskMangment']);
        // $Report = Permission::create(['name' => 'Report']);



        
        // $Worker->givePermissionTo($Massages);

        // $Worker->givePermissionTo($Order);


        // $Manger->givePermissionTo($Massages);
        // $Manger->givePermissionTo($Order);
        // $Manger->givePermissionTo($CategoryServices);
        // $Manger->givePermissionTo($jobs);


        // $Admin->givePermissionTo($Massages);
        // $Admin->givePermissionTo($Order);
        // $Admin->givePermissionTo($CategoryServices);
        // $Admin->givePermissionTo($Setting);
        // $Admin->givePermissionTo($Users);
        // $Admin->givePermissionTo($jobs);
        // $Admin->givePermissionTo($Report);

        // $Admin->givePermissionTo($Logs);
        // $Admin->givePermissionTo($Employee);
        // $Admin->givePermissionTo($Reviews);
        // $Admin->givePermissionTo($task);

    }
}
