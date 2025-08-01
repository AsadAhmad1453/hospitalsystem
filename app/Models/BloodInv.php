<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodInv extends Model
{
    use HasFactory;
    protected $table = 'blood_investigation';
    protected $guarded = [];
}
