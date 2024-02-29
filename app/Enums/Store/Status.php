<?php
namespace App\Enums\Store;

enum Status:string 
{
    case PUBLISHED = 'PUBLISHED';
    case DRAFT = 'DRAFT';
    case CREATED = 'CREATED';



    public static function getRandomStatus(): self
    {
        $cases = self::cases();
        $randomIndex = rand(0, count($cases) - 1);
        return $cases[$randomIndex];
    }
}


?>