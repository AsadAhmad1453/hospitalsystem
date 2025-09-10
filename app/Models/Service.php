<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $guarded = [];

    public function appointments()
    {
        return $this->belongsToMany(
            Appointment::class,       // Corrected (not AppointmentRequest)
            'appointment_services',
            'service_id',
            'appointment_id'
        );
    }
}
