<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyTimeSlot extends Model
{
    protected $fillable = [
        'property_id',
        'start_time',
        'end_time',
        'date',
        'status',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function appointmentBookings()
    {
        return $this->hasMany(AppointmentBooking::class);
    }
}
