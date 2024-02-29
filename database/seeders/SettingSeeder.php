<?php

namespace Database\Seeders;

use App\Enums\Store\Status;
use App\Models\Setting;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($storename, $storename2): void
    {
        $tenant = Tenant::get()->where('name', $storename)->first();

        $tenant2 = Tenant::get()->where('name', $storename2)->first();
        Setting::factory()->count(3)->for($tenant)
            ->sequence(
                [
                    "key" => "siteStatus",
                    "value" => Status::PUBLISHED->value,
                ],
                [
                    "key" => "visibility",
                    "value" => json_encode([
                        "CanReview" => false,
                        "showCarousel" => true,
                        "showFooterLinks" => false,
                        "showTermPage" => false,
                        "showAboutPage" => false,
                        "showHeadrLinks" => false,
                        "AllowUsers" => false,
                        
                        "OrderWithoutUsers" => false,
                    ])
                ],
                [
                    "key" => "CarouselImage",
                    "value" => json_encode([])
                ],
          
            )
            ->create();
    
        Setting::factory()->count(3)->for($tenant2)
            ->sequence(
                [
                    "key" => "siteStatus",
                    "value" => Status::PUBLISHED->value,
                ],
                [
                    "key" => "visibility",
                    "value" => json_encode([
                        "CanReview" => false,
                        "showCarousel" => true,
                        "showFooterLinks" => false,
                        "showTermPage" => false,
                        "showAboutPage" => false,
                        "showHeadrLinks" => false,
                        "AllowUsers" => false,

                        "OrderWithoutUsers" => false,
                    ])
                ],
                [
                    "key" => "CarouselImage",
                    "value" => json_encode([])
                ],
             
          
            )
            ->create();
    
        }
}
