<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodInv extends Model
{
    use HasFactory;
    protected $table = 'blood_investigation';
    protected $guarded = [];

    // Relationships
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    // Alias for backward compatibility
    public function user()
    {
        return $this->doctor();
    }
}
