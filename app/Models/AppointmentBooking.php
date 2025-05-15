<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentBooking extends Model
{
    protected $fillable = [
        'property_id',
        'user_id',
        'time_slot_id',
        'status',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function timeSlot()
    {
        return $this->belongsTo(PropertyTimeSlot::class, 'time_slot_id');
    }
}
