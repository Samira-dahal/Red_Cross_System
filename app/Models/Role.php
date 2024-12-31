<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $tables = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
}
