<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'address',
        'contact_number',
        'has_stock',
        'is_accepting_orders',
        'manager_user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'has_stock' => 'boolean',
        'is_accepting_orders' => 'boolean',
    ];

    /**
     * Get the manager user that is associated with the outlet.
     */
    public function managerUser()
    {
        return $this->belongsTo(User::class, 'manager_user_id');
    }

    /**
     * Get all gas requests for this outlet.
     */
    public function gasRequests()
    {
        return $this->hasMany(GasRequest::class);
    }

    /**
     * Get all delivery schedules for this outlet.
     */
    public function deliverySchedules()
    {
        return $this->hasMany(DeliverySchedule::class);
    }

    /**
     * Get all tokens associated with this outlet.
     */
    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    /**
     * Check if the outlet can accept new orders based on stock and settings.
     *
     * @return bool
     */
    public function canAcceptOrders()
    {
        return $this->has_stock && $this->is_accepting_orders;
    }

    /**
     * Get upcoming delivery schedule for this outlet.
     */
    public function upcomingDelivery()
    {
        return $this->hasOne(DeliverySchedule::class)
            ->where('delivery_date', '>=', now())
            ->orderBy('delivery_date', 'asc');
    }
}
