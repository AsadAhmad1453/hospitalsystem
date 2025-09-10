<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebReq extends Model
{
    use HasFactory;
    protected $table = 'web_reqs';
    protected $guarded = [];
}
