<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nic',
        'address',
        'user_type',
        'password',
        'is_verified',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_verified' => 'boolean',
    ];

    public function businessProfile()
    {
        return $this->hasOne(BusinessProfile::class);
    }

    public function verificationCodes()
    {
        return $this->hasMany(VerificationCode::class);
    }

    public function isAdmin()
    {
        return $this->user_type === 'admin';
    }

    public function isOutletManager()
    {
        return $this->user_type === 'outlet_manager';
    }

    public function isBusinessCustomer()
    {
        return $this->user_type === 'business';
    }

    public function isCustomer()
    {
        return $this->user_type === 'customer';
    }

    public function needsVerification()
    {
        return in_array($this->user_type, ['customer', 'business']) && !$this->is_verified;
    }
}
