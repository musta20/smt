<?php

namespace App\Enums\Identity;

enum Provider: string
{
    case EMAIL = 'EMAIL';

    case FACEBOOK = 'FACEBOOK';

    case GOOGLE = 'GOOGLE';

    public static function getRandomProvider(): self
    {
        $cases = self::cases();

        $randomIndex = rand(0, count($cases) - 1);

        return $cases[$randomIndex];
    }
}
