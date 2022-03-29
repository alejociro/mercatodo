<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'document',
        'phone',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shoppingCarts():HasMany
    {
        return $this->hasMany(ShoppingCart::class);
    }

    public function shoppingCartUser():ShoppingCart
    {
        return $this->shoppingCarts()->latest()->first() ?? $this->shoppingCarts()->create();
    }

    public function shoppingCartUserCreate(): ShoppingCart
    {
        return $this->shoppingCarts()->create();
    }

    public function payments():HasMany
    {
        return $this->hasMany(Payment::class);
    }


}
