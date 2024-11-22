<?php

namespace Database\Seeders;

use App\Enums\Store\SocialMedia;
use App\Enums\Store\Status;
use App\Models\Setting;
use App\Models\Store;
use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run($tenant, $user): void
    {

        //(new PermissionSeeder())->run();
        $this->call(PermissionSeeder::class);

        Store::factory()->for($tenant)->for($user)->create([
            'title' => 'Test store',
            'SocialMedia' => json_encode(
                [
                    SocialMedia::FACEBOOK->value => '',
                    SocialMedia::X->value => '',
                    SocialMedia::INSTAGRAM->value => '',
                    SocialMedia::WHATSAPP->value => '',
                    SocialMedia::SNAPCHAT->value => '',
                    SocialMedia::YOUTUBE->value => '',
                    SocialMedia::TIKTOK->value => '',
                    SocialMedia::TELEGRAM->value => '',

                ]
            ),
        ]);
        Setting::factory()->count(3)->for($tenant)
            ->sequence(
                [
                    'key' => 'siteStatus',
                    'value' => Status::PUBLISHED->value,
                ],
                [
                    'key' => 'visibility',
                    'value' => json_encode([
                        'CanReview' => true,
                        'showCarousel' => true,
                        'showFooterLinks' => false,
                        'showTermPage' => false,
                        'showAboutPage' => false,
                        'showHeadrLinks' => false,
                        'AllowUsers' => true,
                        'OnlycustomerCanReview' => true,
                        'OrderWithoutUsers' => false,
                    ]),
                ],
                [
                    'key' => 'CarouselImage',
                    'value' => json_encode([]),
                ],

            )
            ->create();

    }
}
