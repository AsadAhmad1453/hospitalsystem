<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ctscan extends Model
{
    use HasFactory;

    protected $table = 'ct_scans';
    protected $guarded = [];
}
