<?php

namespace App\Models;

use App\Models\Conserns\BelongsToTenant;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;
    use HasUlids;
    use BelongsToTenant;


    protected $fillable = [
        'name',
        'description',
        'price',
        'order_url',
        'older_price',
        'discount',
        'store_id',
        'tag',
        'category_id',
        'tenant_id'
    ];

    protected $casts = [
        'price' => 'float',
        'older_price' => 'float',
        'dicount' => 'integer',
        'tag' => AsCollection::class

    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id'
        );
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'category_id'
        );
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(
            related: Store::class,
            foreignKey: 'store_id'
        );
    }
}
