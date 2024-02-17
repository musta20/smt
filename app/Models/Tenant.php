<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Models\Domain;

class Tenant extends BaseTenant
{
    use HasDomains;
    use HasFactory;
    use SoftDeletes;

    public function domain():HasOne{
    return $this->hasOne(
        related:Domain::class,
        foreignKey:'tenant_id'

    );
    }
}

