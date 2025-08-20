<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenPatient extends Model
{
    use HasFactory;
    protected $table = 'open_patients';
    protected $guarded = [];
}
