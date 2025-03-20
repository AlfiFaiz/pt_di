<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AircraftProgram extends Model
{
    protected $fillable = ['program', 'aircraft_type', 'registration', 'customer', 'image'];

    public function orders()
    {
        return $this->hasMany(EngineeringOrder::class, 'aircraft_id');
    }
}

