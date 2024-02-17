<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\Identity\Provider;
use App\Enums\Identity\Role;
use App\Models\Conserns\BelongsToTenant;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant as ConcernsBelongsToTenant;

class User extends Authenticatable
{
    use    HasApiTokens;
    use    HasFactory;
    use    Notifiable;
    use    HasUlids;
    use    ConcernsBelongsToTenant;
    use    SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'last_name',
        'role',
        'provider',
        'provider_id',
        'avatar',
        'country',
        'email',
        'password',
        'tenant_id'
    ];





    public function store(): HasOne
    {

        return $this->hasOne(
            related: Store::class,
            foreignKey: 'user_id'
        );
    }



    public function media(): HasMany
    {
        return $this->hasMany(
            related: Media::class,
            foreignKey: 'user_id'
        );
    }

    public function tenant(): BelongsTo | Collection
    {
        return $this->belongsTo(
            related: Tenant::class,
            foreignKey: 'tenant_id'
        );
    }



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'role' => Role::class,
        'provider' => Provider::class
    ];
}
