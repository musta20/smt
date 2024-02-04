<?php

namespace App\Models;

use App\Models\Conserns\BelongsToTenant;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    use HasUlids;
    use BelongsToTenant;


    protected $fillable = [
        'category_id',
        'name',
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
