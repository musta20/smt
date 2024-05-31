<?php

namespace Tests;

use App\Models\Tenant;
use App\Models\User;
use Database\Seeders\SettingSeeder;
use Database\Seeders\TestSeeder;
use Faker\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Event;
use Stancl\Tenancy\Events\TenantCreated;

abstract class TenancyTestCase extends BaseTestCase
{
    use CreatesApplication;

    public $tenancy = true;

    protected function setUp(): void
    {
        parent::setUp();
        Event::fake([TenantCreated::class]);

        if ($this->tenancy) {
            $this->initializeTenancy();

            $tenantDomain = tenant()->domain->domain;
            config(['app.url' => 'https://'.$tenantDomain]);
            URL::forceRootUrl('https://'.$tenantDomain);

                (new TestSeeder())->run(tenant(), User::factory()->create());

        }
    }

    public function initializeTenancy()
    {

        Event::fake([TenantCreated::class]);

        $domain = Factory::create()->word();

        $tenant = Tenant::create([
            'name' =>$domain,

        ]);



        $tenant->domains()->create([
            'domain' =>  $domain  . '.' . config('app.domain'),
            'name' =>  $domain
        ]);

        tenancy()->initialize($tenant);
    }
}
