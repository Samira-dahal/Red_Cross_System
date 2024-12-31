<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';
    protected $primaryKey = 'id';

    protected $fillable = [
        'donor_id',
        'quantity',
        'branch_id',
        'bag_no',
        'campaign_id',
        'created_by',
        'donation_date',
        'expiry_date',
        'status',
    ];


    protected $dates = ['created_date', 'donation_date', 'expiry_date'];



    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }


    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public $timestamps = true;
}
