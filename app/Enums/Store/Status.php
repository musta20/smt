<?php
namespace App\Enums\Store;

enum Status:string 
{
    case PUBLISHED = 'PUBLISHED';
    case DRAFT = 'DRAFT';
    case CREATED = 'CREATED';
}

?>