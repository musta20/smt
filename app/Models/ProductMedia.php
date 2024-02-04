<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class ProductMedia extends Model
{
    use HasFactory;
    use HasUlids;
    use BelongsToTenant;


    protected $fillable = [
        'product_id',
        'media_id',
        'tenant_id'
    ];

    protected $casts = [];



    public function product(): HasOne
    {
        return $this->hasOne(
            related: Product::class,
            foreignKey: 'product_id'
        );
    }

    public function media(): HasOne
    {
        return $this->hasOne(
            related: Media::class,
            foreignKey: 'media_id'
        );
    }
}
