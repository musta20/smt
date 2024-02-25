<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
use Illuminate\Support\Facades\Storage;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($storename, $storename2)
    {
        $tenant = Tenant::get()->where('name',$storename)->first();

        $tenant2 = Tenant::get()->where('name',$storename2)->first();

        $user = User::where('email', $storename . '@' . $storename . '.com')->first();
        $user2 = User::where('email', $storename2 . '@' . $storename2 . '.com')->first();
        //Artisan::call('storage:link');



        // $logopath = resource_path() . '/images/logo/logo-icon.svg';
        // $Faviconpath = resource_path() . '/images/favicon.ico';
        
        $tenantpath = storage_path() . '/tenant' . $tenant->id . '/app/public/media';
        $tenantpath2 = storage_path() . '/tenant' . $tenant2->id . '/app/public/media';


        // Storage::copy($logopath ,$tenantpath."/logo-icon.svg");
        // Storage::copy($logopath ,$tenantpath2."/logo-icon.svg");

        // Storage::copy($Faviconpath ,$tenantpath."/favicon.ico");
        // Storage::copy($Faviconpath ,$tenantpath2."/favicon.ico");

        $storename = "musta";
        $storename2 = "reem";
        $tenant = Tenant::get()->where('name',$storename)->first();

        $tenant2 = Tenant::get()->where('name',$storename2)->first();
     //Artisan::call('storage:link');



        $logopath = storage_path() . '/logo/logo-icon.svg';
        $Faviconpath = storage_path() . '/logo/favicon.ico';
        
        $tenantpath = storage_path() . '/tenant' . $tenant->id . '/app/public/media';
        $tenantpath2 = storage_path() . '/tenant' . $tenant2->id . '/app/public/media';

        Process::run("cp ".$Faviconpath." ".$tenantpath."/favicon.ico");
        Process::run("cp ".$logopath." ".$tenantpath."/logo-icon.svg");
       
        Process::run("cp ".$Faviconpath." ".$tenantpath2."/favicon.ico");
        Process::run("cp ".$logopath." ".$tenantpath2."/logo-icon.svg");


        Store::factory()->for($tenant)->for($user)->create([
            'title' => $storename
        ]);

        Store::factory()->for($tenant2)->for($user2)->create([
            'title' => $storename2
        ]);
    }
}
