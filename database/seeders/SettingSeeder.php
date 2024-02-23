<?php

namespace Database\Seeders;

use App\Enums\Store\Status;
use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($tenant): void
    {
        Setting::factory()->count(4)->for($tenant)
        ->sequence([
            "key" => "siteStatus",
            "value" => Status::PUBLISHED->value,
        ],
        [
            "key" => "visibility",
            "value" => json_encode([
                "CanComment" => false,
                "CanReview" => false,
                "showCarousel" => true,
                "showFooterLinks" => false,
                "showTermPage" => false,
                "showHeadrLinks"=>false
            ])
        ],
        [
            "key" => "CarouselImage",
            "value" => json_encode([])
        ],
        [
            "key" => "TermPageContent",
            "value" => ""
        ])
        ->create();
    }
}
