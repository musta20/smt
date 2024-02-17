<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class CategoryProduct extends Model
{
    use HasFactory;
    use HasUlids;
    use BelongsToTenant;
    use SoftDeletes;



    
    protected $fillable = [
        'category_id',
        'product_id',
        'tenant_id'
    ];

    public function product(): BelongsTo
    {
        return $this->BelongsTo(Product::class);
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }
}
