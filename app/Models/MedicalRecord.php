<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;
    protected $table = 'medical_records';
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

}
