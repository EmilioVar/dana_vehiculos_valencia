<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avistamiento extends Model
{
    protected $fillable = [
        'matricula',
        'lat',
        'lon',
        'status',
        'personas',
        'observaciones',
    ];
    
}
