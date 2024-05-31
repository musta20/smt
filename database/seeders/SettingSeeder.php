<?php

namespace Database\Seeders;

use App\Enums\Store\Lang;
use App\Enums\Store\MediaType;
use App\Enums\Store\Status;
use App\Models\Setting;
use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Process;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($storename, $storename2): void
    {
        $tenant = Tenant::get()->where('name', $storename)->first();
        $CarouselImage = [];
        if ($storename2) {
            $tenant2 = Tenant::get()->where('name', $storename2)->first();
        }

        $imagePath = storage_path().'/Images/';

        for ($i = 0; $i < 3; $i++) {
            $Image = collect(SeederData::$imageName)->random();

            $tenantpath = storage_path().'/tenant'.$tenant->id.'/app/public/media';

            Process::run('cp '.$imagePath.'/'.$Image.' '.$tenantpath.'/'.$Image);

            $CarouselImage[$Image] = MediaType::IMAGE->value;

        }

        Setting::factory()->count(4)->for($tenant)
            ->sequence(
                [
                    'key' => 'siteStatus',
                    'value' => Status::PUBLISHED->value,
                ],
                [
                    'key' => 'visibility',
                    'value' => json_encode([
                        'CanReview' => false,
                        'showCarousel' => true,
                        'showFooterLinks' => false,
                        'showTermPage' => false,
                        'showAboutPage' => false,
                        'showHeadrLinks' => false,
                        'AllowUsers' => false,
                        'OnlycustomerCanReview' => false,
                        'OrderWithoutUsers' => false,
                    ]),
                ],
                [
                    'key' => 'CarouselImage',
                    'value' => json_encode($CarouselImage),
                ],
                [
                    'key' => 'lang',
                    'value' => Lang::AR->value,
                ],

            )
            ->create();

        if ($storename2) {
            Setting::factory()->count(4)->for($tenant2)
                ->sequence(
                    [
                        'key' => 'siteStatus',
                        'value' => Status::PUBLISHED->value,
                    ],
                    [
                        'key' => 'visibility',
                        'value' => json_encode([
                            'CanReview' => false,
                            'showCarousel' => true,
                            'showFooterLinks' => false,
                            'showTermPage' => false,
                            'showAboutPage' => false,
                            'showHeadrLinks' => false,
                            'AllowUsers' => false,
                            'OnlycustomerCanReview' => false,
                            'OrderWithoutUsers' => false,
                        ]),
                    ],
                    [
                        'key' => 'CarouselImage',
                        'value' => json_encode([]),
                    ],
                    [
                        'key' => 'lang',
                        'value' => Lang::AR->value,
                    ],

                )
                ->create();
        }
    }
}
