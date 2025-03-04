<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_number',
        'user_id',
        'gas_type_id',
        'outlet_id',
        'quantity',  // Add this
        'status',
        'notes',
        'empty_cylinder_received',
        'payment_received',
        'amount',
        'expected_pickup_date'
    ];

    protected $casts = [
        'empty_cylinder_received' => 'boolean',
        'payment_received' => 'boolean',
        'expected_pickup_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gasType()
    {
        return $this->belongsTo(GasType::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function token()
    {
        return $this->hasOne(Token::class);
    }

    public function generateRequestNumber()
    {
        // Format: GR-YYMMDD-XXXX (GR = Gas Request, YYMMDD = Date, XXXX = Random)
        $prefix = 'GR-' . date('ymd') . '-';
        $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4));
        $this->request_number = $prefix . $random;

        return $this;
    }

}
