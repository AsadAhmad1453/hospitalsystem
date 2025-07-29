<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    protected $guarded = [];


    public function setUniqueNumberAttribute($value)
    {
        $this->attributes['unique_number'] = strtoupper($value);
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

}
