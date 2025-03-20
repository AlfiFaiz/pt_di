<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class EngineeringOrder extends Model
{
    protected $fillable = ['aircraft_id', 'engineering_order_no', 'subject_title', 'start_date', 'finish_date', 'type_order', 'insp_stamp'];

    public function aircraftProgram()
    {
        return $this->belongsTo(AircraftProgram::class, 'aircraft_id');
    }
}
