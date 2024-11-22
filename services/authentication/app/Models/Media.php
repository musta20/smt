<?php

namespace App\Models;

use App\Enums\Store\MediaType;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Media extends Model
{
    use BelongsToTenant;
    use HasFactory;
    use HasUlids;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'type',
        'user_id',
        'product_id',
        'tenant_id',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'product_id'
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id'
        );
    }
}
