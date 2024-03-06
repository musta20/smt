<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Category extends Model
{
    use HasFactory;
    use HasUlids;
    use BelongsToTenant;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'store_id',
        'tenant_id'
    ];

    protected $casts = [];

    public function store(): BelongsTo
    {
        return $this->belongsTo(
            related: Store::class,
            foreignKey: 'store_id'
        );
    }

    public function products():BelongsToMany
    {
        return $this->belongsToMany(Product::class,'category_products');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(
            related: Category::class,
            foreignKey: 'category_id'
        );
    }

    public function tenant(): BelongsTo {

        return $this->belongsTo(
            related:Tenant::class,
            foreignKey:'tenant_id'
        );

    }

    public function subCategory(): HasMany
    {
        return $this->hasMany(
            related: Category::class,
            foreignKey: 'id'
        );
    }
}
