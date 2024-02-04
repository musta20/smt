<?php

namespace App\Enums\Identity;
                    

enum Role: string
{
    case VENDER = 'VENDER';
    case ADMIN = 'ADMIN';
    case CUSTOMER = 'CUSTOMER';

}
