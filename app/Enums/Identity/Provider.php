<?php

namespace App\Enums\Identity;

enum Provider :string
{
    case EMAIL = 'EMAIL';
    case FACEBOOK = 'FACEBOOK';
    case GOOGLE = 'GOOGLE';
}
