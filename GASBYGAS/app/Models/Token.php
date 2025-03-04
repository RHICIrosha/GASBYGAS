<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = [
        'token_number', 'gas_request_id', 'user_id', 'outlet_id',
        'valid_from', 'valid_until', 'is_active', 'status'
    ];

    protected $casts = [
        'valid_from' => 'date',
        'valid_until' => 'date',
        'is_active' => 'boolean',
    ];

    public function gasRequest()
    {
        return $this->belongsTo(GasRequest::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function generateTokenNumber()
    {
        // Format: TK-YYMMDD-XXXX (TK = Token, YYMMDD = Date, XXXX = Random)
        $prefix = 'TK-' . date('ymd') . '-';
        $random = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 4));
        $this->token_number = $prefix . $random;

        return $this;
    }
}
