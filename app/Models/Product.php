<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Product extends Model
{
    use HasFactory;
    use HasUlids;
    use BelongsToTenant;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'price',
        'order_url',
        'older_price',
        'discount',
        'store_id',
        'status',
        'tag',
        'visible',
        'category_id',
        'category_product_id',
        'tenant_id'
    ];

    protected $casts = [
        'price' => 'float',
        'older_price' => 'float',
        'dicount' => 'integer',
        'visible' => AsCollection::class,
        'tag' => AsCollection::class

    ];
    public function media(): HasMany
    {

        return $this->hasMany(
            related: Media::class,
            foreignKey: 'product_id'
        );
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id'
        );
    }

    public function categorys(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(
            related: Store::class,
            foreignKey: 'store_id'
        );
    }
}
