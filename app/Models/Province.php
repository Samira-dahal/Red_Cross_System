<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'country_id'];

    public  function country()
    {
        return $this->belongsTo(Province::class);
    }
}
