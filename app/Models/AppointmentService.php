<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentService extends Model
{
    use HasFactory;
    protected $table = 'appointment_services';
    protected $guarded = [];


    /**
     * Get the appointment that owns this pivot.
     */
    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }

    /**
     * Get the service associated with this pivot.
     */
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }


}
