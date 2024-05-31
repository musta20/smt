<?php

namespace App\Models\Conserns;

use App\Scope\TenantScope;

trait BelongsToTenant
{
    protected static function booted()
    {
        // parent::boot();
        static::addGlobalScope(new TenantScope);
    }
}
