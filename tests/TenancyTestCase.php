<?php

namespace Tests;

use App\Models\Tenant;
use Faker\Factory;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\URL;

abstract class TenancyTestCase extends BaseTestCase  
{
    use CreatesApplication;

    public $tenancy = true;

    protected function setUp(): void
    {
        parent::setUp();

        if ($this->tenancy) {
            $this->initializeTenancy();

            config(['app.url' => 'http://'.tenant()->domain->domain]);
            URL::forceRootUrl('http://'.tenant()->domain->domain);
        }
    }

    public function initializeTenancy()
    {
        $tenant = Tenant::create();
        $domain = Factory::create()->word();

        $tenant->domains()->create([
            'domain' =>  $domain  . '.' . env('APP_DOMAIN'),
            'name' =>  $domain
        ]);

        tenancy()->initialize($tenant);
    }
}
