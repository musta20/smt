<?php

namespace App\Models;

use App\Enums\Store\Sorting;
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
        'image',
        'view_count',
        'status',
        'tag',
        'visible',
        'category_id',
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

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function comment(): HasMany
    {
        return $this->hasMany(
            related: Comment::class,
            foreignKey: "product_id"
        );
    }

    public function scopeOrderByType($query, $orderType)
    {

        if ($orderType['categoryId']) {

            $query->whereHas('categories', function ($query) use ($orderType){
                $query->where('id', $orderType['categoryId']);
            });

     
        }

        switch ($orderType['sortType']) {
            case Sorting::AVG_COUSTMER->value:
                $query->orderBy('rating', 'desc');
                break;
            case Sorting::BEST_SELLING->value:
                $query->orderBy('order_count', 'desc');
                break;
            case Sorting::NEWEST->value:
                $query->orderBy('created_at', 'desc');
                break;
            case Sorting::HIGHT_TO_LOW->value:
                $query->orderBy('price', 'desc');
                break;
            case Sorting::LOW_TO_HIGHT->value:
                $query->orderBy('price');
                break;
        }

        return $query;
    }

    public function store(): BelongsTo
    {
        return $this->belongsTo(
            related: Store::class,
            foreignKey: 'store_id'
        );
    }
}
