<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GasType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'weight',
        'category',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'weight' => 'decimal:2',
    ];

    /**
     * Get all gas requests for this gas type.
     */
    public function gasRequests()
    {
        return $this->hasMany(GasRequest::class);
    }

    /**
     * Check if this gas type is for domestic use.
     *
     * @return bool
     */
    public function isDomestic()
    {
        return $this->category === 'domestic';
    }

    /**
     * Check if this gas type is for commercial use.
     *
     * @return bool
     */
    public function isCommercial()
    {
        return $this->category === 'commercial';
    }

    /**
     * Check if this gas type is for industrial use.
     *
     * @return bool
     */
    public function isIndustrial()
    {
        return $this->category === 'industrial';
    }

    /**
     * Check if this gas type is portable.
     *
     * @return bool
     */
    public function isPortable()
    {
        return $this->category === 'portable';
    }

    /**
     * Check if this gas type is for special use.
     *
     * @return bool
     */
    public function isSpecial()
    {
        return $this->category === 'special';
    }
}
