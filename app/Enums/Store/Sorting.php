<?php
namespace App\Enums\Store;

enum Sorting:string 
{
    case NEWEST = 'NEWEST';
    case AVG_COUSTMER = 'AVG_COUSTMER';
    case BEST_SELLING = 'BEST_SELLING';
    case LOW_TO_HIGHT = 'LOW_TO_HIGHT';
    case HIGHT_TO_LOW = 'HIGHT_TO_LOW';
}

?>