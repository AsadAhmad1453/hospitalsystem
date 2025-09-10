<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointment_requests';
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function services()
    {
        return $this->belongsToMany(
            Service::class,           // Related model
            'appointment_services',   // Pivot table
            'appointment_id',         // Foreign key on pivot (this model)
            'service_id'              // Foreign key on pivot (services table)
        );
    }
}
