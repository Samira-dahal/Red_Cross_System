<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_name',
        'location',
        'province_id',
        'country_id',
        'created_by',
        'created_date',
        'status',
    ];

    /**
     * Relationship with Province model.
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Relationship with Country model.
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Relationship with User model for the creator.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
