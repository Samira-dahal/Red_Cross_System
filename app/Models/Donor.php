<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BloodType;
use App\Models\User;

class Donor extends Model
{
    protected $table = 'donors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'temporary_address',
        'permanent_address',
        'mobile_number',
        'secondary_number',
        'email',
        'bloodtype_id',
        'photo',
        'created_by',
        'created_date',
        'status',
    ];

    // Cast created_date to a datetime instance
    protected $casts = [
        'created_date' => 'datetime',
    ];

    protected $dates = ['created_date'];

    /**
     * Define a relationship with the BloodType model.
     */
    public function bloodtype()
    {
        return $this->belongsTo(BloodType::class);
    }

    /**
     * Define a relationship with the User model for created_by.
     * This allows you to fetch details of the user who created the donor.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // In Donor.php Model
    public function donations()
    {
        return $this->hasMany(Donation::class);
    }

}
