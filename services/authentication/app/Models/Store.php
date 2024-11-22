<?php

namespace App\Models;

use App\Enums\Store\Currency;
use App\Enums\Store\Status;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Store extends Model
{
    use BelongsToTenant;
    use HasFactory;
    use HasUlids;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'domain',
        'favicon',
        'specialty',
        'logo',
        'address',
        'location',
        'phone',
        'cover',
        'description',
        'currency',
        'status',
        'user_id',
        'tenant_id',
        'SocialMedia',
    ];

    protected $casts = [
        'currency' => Currency::class,
        'status' => Status::class,
    ];

    public function getRelationshipToPrimaryModel(): string
    {
        return 'user';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }

    public function category(): HasMany
    {
        return $this->hasMany(
            related: Category::class,
            foreignKey: 'store_id'
        );
    }

    public function product(): HasMany
    {
        return $this->hasMany(
            related: Product::class,
            foreignKey: 'store_id'
        );
    }
}
