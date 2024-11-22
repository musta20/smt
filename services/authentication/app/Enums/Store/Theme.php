<?php

namespace App\Enums\Store;

enum Theme: string
{
    case NORDIC = 'newStyle';
    case DEFAULT = 'Default';
    case COFFEE = 'coffee';
    case SOLID = 'solid';

    public static function values()
    {
        return [
            self::NORDIC->value,
            self::DEFAULT->value,
            self::COFFEE->value,
            self::SOLID->value,
        ];
    }
}
