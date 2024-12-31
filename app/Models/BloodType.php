<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $table = 'bloodtypes';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
