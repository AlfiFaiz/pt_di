<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AircraftProgram extends Model
{
    use HasFactory;

    protected $fillable = [
        'program', 'aircraft_type', 'registration', 'customer', 'image'
    ];

    // Relasi ke EngineeringOrder
    public function engineeringOrders()
    {
        return $this->hasMany(EngineeringOrder::class, 'aircraft_id');
    }
}

