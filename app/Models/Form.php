<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = 'forms';
    protected $guarded = [];


    public function questions()
    {
        return $this->hasMany(Question::class, 'form_id');
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'form_sections', 'form_id', 'section_id');
    }
}
