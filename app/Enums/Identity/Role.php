<?php

namespace App\Enums\Identity;
                    

enum Role: string
{
    case VENDER = 'VENDER';
    case ADMIN = 'ADMIN';
    case CUSTOMER = 'CUSTOMER';


    public static function getRandomRole(): self
    {
        $cases = self::cases();
        $randomIndex = rand(0, count($cases) - 1);
        return $cases[$randomIndex];
    }
}
