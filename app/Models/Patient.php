<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Patient extends Model
{
    use HasFactory;
    
    protected $table = 'patients';
    protected $guarded = [];
    
    // Map the actual database column names
    protected $fillable = [
        'unique_number',
        'name', 
        'age',
        'sex',
        'city',
        'email',
        'phone',
        'address',
        'dateofbirth',
        'cnic',
        'patient_status',
        'payment_status',
        'doctor_id',
        'nurse_id',
        'dc_id'
    ];


    public function setUniqueNumberAttribute($value)
    {
        $this->attributes['unique_number'] = strtoupper($value);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }

    public function dataCollector()
    {
        return $this->belongsTo(User::class, 'dc_id');
    }

    // Alias for backward compatibility - returns the primary user (doctor)
    public function user()
    {
        return $this->doctor();
    }

    public function round()
    {
        return $this->hasOne(Round::class);
    }

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function latestMedicalRecord()
    {
        return $this->hasOne(MedicalRecord::class)->latestOfMany();
    }

    public function appointmentRequest()
    {
        return $this->hasOne(Appointment::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    // Add relationship to the owning user account
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }


}
